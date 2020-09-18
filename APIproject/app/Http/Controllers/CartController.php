<?php

namespace App\Http\Controllers;

use App\Charity;
use App\Donation;
use App\Order;
use App\OrderMenu;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['checkout', 'complete']);
    }

    /**
     * Display the cart page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart');
    }

    /**
     * Add a menu to basket.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param slug
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        if($duplicates->isNotEmpty()){
            return redirect()->back()
                ->with('warning', 'The menu already exits in the basket!');
        }

        Cart::add($request->id, $request->name, $request->qty != 0 ? $request->qty : 1 , $request->price)
            ->associate('App\Menu');

        return redirect()->route('home.menu.show', $slug)
            ->with('success', 'Menu added to the basket successfully!');
    }

    /**
     * Complete order.
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $charities = Charity::all();
        if (Cart::instance('default')->count() == 0){
            return redirect()->back()->with('error', 'Basket is empty! Add food items to your basket and checkout');
        }
        return view('checkout')
            ->with('charities', $charities);
    }


    /**
     * Complete order checkout
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function complete(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required',
            'donate' => 'required|string',
        ]);

        $order_data = array(
            'ref_number' => $this->registrationRef(),
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'restaurant_id' => null,
            'subtotal' => Cart::instance('default')->subtotal(),
            'delivery' => 0.00,
            'total' => Cart::instance('default')->total(),
            'is_donation' => $request->donate === 'charity' ? 1 : 0,
        );
        $order = Order::create($order_data);

        //insert food items into order_menu table
        foreach (Cart::instance('default')->content() as $item){
            OrderMenu::create([
                'order_id' => $order->id,
                'menu_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        //create donation
        if($request->donate === 'charity'){
            $donation = Donation::create([
                'ref_number' => 'D'.$this->registrationRef(),
                'user_id' => auth()->user() ? auth()->user()->id : null,
                'order_id' => $order->id,
                'charity_id' => $request->charity,
            ]);

            // SUCCESSFUL
            Cart::instance('default')->destroy();

            $donationId = Crypt::encrypt($donation->id);
            return redirect()
                ->route('charity.thankyou', ['donation' => $donationId]);
        }

        // SUCCESSFUL
        Cart::instance('default')->destroy();

        $orderId = Crypt::encrypt($order->id);
        return redirect()
            ->route('checkout.thankyou', ['order' => $orderId]);
    }

    /**
     * Display a thank you page after successful checkout.
     * @param order
     * @return \Illuminate\Http\Response
     */
    public function thankyou($order)
    {
        if (Cart::instance('default')->count() > 0){
            return redirect()->route('home.cart.index')
                ->with('warning', 'You got items in your basket! Complete Order');
        }

        // decrypt url parameter
        $orderId = Crypt::decrypt($order);
        $order = Order::findOrFail($orderId);
        return view('thankyou')->with('order', $order);
    }

    /**
     * Display a thank you page after successful donation.
     * @param donation
     * @return \Illuminate\Http\Response
     */
    public function charityThankyou($donation)
    {
        if (Cart::instance('default')->count() > 0){
            return redirect()->route('home.cart.index')
                ->with('warning', 'You got items in your basket! Complete Order');
        }

        // decrypt url parameter
        $donationId = Crypt::decrypt($donation);
        $donation = Donation::findOrFail($donationId);
        $order = $donation->order;

        return view('account.charity.thankyou')->with([
            'order' => $order,
            'donation' => $donation
        ]);
    }

    /**
     * Remove menu item from cart
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return redirect()->back()
            ->with('success', 'Menu item removed from basket with success');
    }

    /**
     * generate order reference number
     * @return string
     */
    function registrationRef(){
        $month = Carbon::now()->format('m'); // month of year (01, 12)
        $day = Carbon::now()->format('d'); // day of month (01, 31)

        $orderNumber = $month.$day.$this->randomString(2); // append the above
        return $orderNumber;
    }

    /**
     * generate random string
     * @param $length
     * @return string
     */
    function randomString($length)
    {
        $str = "";
        $characters = array_merge(range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
}
