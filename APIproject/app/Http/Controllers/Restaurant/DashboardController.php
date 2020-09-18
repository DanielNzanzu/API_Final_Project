<?php

namespace App\Http\Controllers\Restaurant;

use App\Order;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function details()
    {
        return view('account.restaurant.details');
    }

    public function statistics()
    {
        return view('account.restaurant.statistics');
    }

    public function orderChart()
    {
        $restaurant = Restaurant::where('user_id', auth()->user()->id)->firstOrFail();
        $menuIds = array();
        foreach ($restaurant->menus as $menu){
            array_push($menuIds, $menu->id);
        }
        $orders = Order::whereHas('menus', function ($query) use ($menuIds){
            $query->whereIn('menu_id', $menuIds);
        });

        $result = $orders->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get(array(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as "orderCount"')
            ));

        return response()->json($result);
    }
}
