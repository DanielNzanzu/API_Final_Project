<?php

namespace App\Http\Controllers\Client;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the client's orders.
     * @return \Illuminate\Http\Response
     */
    public function orders()
    {
        $query = Order::where('user_id', auth()->user()->id);
        $orders = $query->paginate(5);
        $count = $query->count();
        $total = $query->sum('total');

        return view('account.client.orders')->with([
            'count' => $count,
            'orders' => $orders,
            'total' => $total
        ]);
    }

    /**
     * Display a detailed order
     *
     * @param  int  $ref
     * @return \Illuminate\Http\Response
     */
    public function order($ref)
    {
        $order = Order::where('ref_number', $ref)->firstOrFail();

        return view('account.client.order')
            ->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
