<?php

namespace App\Http\Controllers\Restaurant;

use App\Order;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::where('user_id', auth()->user()->id)->firstOrFail();
        $menuIds = array();
        foreach ($restaurant->menus as $menu){
            array_push($menuIds, $menu->id);
        }
        $orders = Order::whereHas('menus', function ($query) use ($menuIds){
            $query->whereIn('menu_id', $menuIds);
        });

        return view('account.restaurant.orders')->with([
            'orders' => $orders->orderBy('created_at', 'desc')->paginate(5),
            'count' => $orders->count()
        ]);
    }


    /**
     * Show order details & Update form
     *
     * @param  int  $ref
     * @return \Illuminate\Http\Response
     */
    public function show($ref)
    {
        $order = Order::where('ref_number', $ref)->firstOrFail();
        return view('account.restaurant.order')
            ->with('order', $order);
    }


    /**
     * Update the status of an order
     *
     * @param Request $request
     * @param $ref
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $ref)
    {
        $order = Order::where('ref_number', $ref)->firstOrFail();

        $this->validate($request, [
            'status' => 'required|string|max:255'
        ]);

        $order->status = $request->status;
        $order->save();

        return redirect()->back()
            ->with('success', 'Order Status Updated successfully');

    }
}
