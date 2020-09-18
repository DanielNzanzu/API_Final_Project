<?php

namespace App\Http\Controllers;

use App\Charity;
use App\Menu;
use App\Order;
use App\Restaurant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuCount = $orderCount = $userServed = null;
        if(auth()->user()->user_type === 'restaurant'){
            $restaurant = Restaurant::where('user_id', auth()->user()->id)->firstOrFail();
            $menuIds = array();
            foreach ($restaurant->menus as $menu){
                array_push($menuIds, $menu->id);
            }
            $menuCount = count($menuIds); // number of menus added by this restaurant
            $orders = Order::whereHas('menus', function ($query) use ($menuIds){
                $query->whereIn('menu_id', $menuIds);
            });
            $orderCount = $orders->count(); // number of orders received by this restaurant
            $userServed = $orders->groupBy('user_id')->count(); // number of users who have ordered food from this restaurant
        }

        $menus = Menu::paginate(3);
        return view('account.dashboard')->with([
            'menus' => $menus,
            'menuCount' => $menuCount,
            'orderCount' => $orderCount,
            'userServed' => $userServed,
        ]);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('account.profile');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function corporate()
    {
        $restaurant = Restaurant::all();
        return view('account.corporate');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function restaurantApplication($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('account.application.restaurant')
            ->with('restaurant', $restaurant);
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function charityApplication($ref)
    {
        $charity = Charity::where('ref_number', $ref)->firstOrFail();
        return view('account.application.charity')
            ->with('charity', $charity);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function application(Request $request)
    {
        if ($request->has('restaurant_application')){
            $this->validate($request, [
                'restaurant_name' => 'required|string|max:255',
                'restaurant_phone' => 'required',
                'restaurant_email' => 'required|email',
                'restaurant_website' => 'required',
                'restaurant_address' => 'required'
            ]);

            $restaurant = new Restaurant;

            $restaurant->ref_number = $this->registrationRef();
            $restaurant->name = $request->restaurant_name;
            $restaurant->user_id = auth()->user() ? auth()->user()->id : null;
            $restaurant->address = $request->restaurant_address;
            $restaurant->phone = $request->restaurant_phone;
            $restaurant->website = $request->restaurant_website;
            $restaurant->email = $request->restaurant_email;

            $restaurant->save();

            return redirect()->route('account.corporate.index')
                ->with('success', 'Your restaurant application has been submitted successfully!');
        }

        if ($request->has('charity_application')){
            $this->validate($request, [
                'charity_name' => 'required|string|max:255',
                'charity_phone' => 'required',
                'charity_email' => 'required|email',
                'charity_website' => 'required|string',
                'charity_address' => 'required',
                'charity_details' => 'required|string'
            ]);

            $charity = new Charity;

            $charity->ref_number = $this->registrationRef();
            $charity->name = $request->charity_name;
            $charity->user_id = auth()->user() ? auth()->user()->id : null;
            $charity->address = $request->charity_address;
            $charity->phone = $request->charity_phone;
            $charity->website = $request->charity_website;
            $charity->email = $request->charity_email;
            $charity->details = $request->charity_details;

            $charity->save();

            return redirect()->route('account.corporate.index')
                ->with('success', 'Your charity application has been submitted successfully!');
        }
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function restaurantUpdate(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);

        $this->validate($request, [
            'restaurant_name' => 'required|string|max:255',
            'restaurant_phone' => 'required',
            'restaurant_email' => 'required|email',
            'restaurant_website' => 'required',
            'restaurant_address' => 'required'
        ]);

        $restaurant->name = $request->restaurant_name;
        $restaurant->address = $request->restaurant_address;
        $restaurant->phone = $request->restaurant_phone;
        $restaurant->website = $request->restaurant_website;
        $restaurant->email = $request->restaurant_email;

        $restaurant->save();

        return back()->with('success', 'Application Updated successfully');

    }

    public function charityUpdate(Request $request, $ref)
    {
        $charity = Charity::where('ref_number', $ref)->firstOrFail();

        $this->validate($request, [
            'charity_name' => 'required|string|max:255',
            'charity_phone' => 'required',
            'charity_email' => 'required|email',
            'charity_website' => 'required|string',
            'charity_address' => 'required',
            'charity_details' => 'required|string'
        ]);

        $charity->name = $request->charity_name;
        $charity->address = $request->charity_address;
        $charity->phone = $request->charity_phone;
        $charity->website = $request->charity_website;
        $charity->email = $request->charity_email;
        $charity->details = $request->charity_details;

        $charity->save();

        return back()->with('success', 'Application Updated successfully');

    }

    function registrationRef(){
        $month = Carbon::now()->format('m'); // month of year (01, 12)
        $day = Carbon::now()->format('d'); // day of month (01, 31)

        //type 1 [restaurant] vs 2 [charity]

        $orderNumber = $month.$day.$this->randomString(2); // append the above
        return $orderNumber;
    }

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
