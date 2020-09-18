<?php

namespace App\Http\Controllers\Admin;

use App\Charity;
use App\Donation;
use App\Http\Controllers\Controller;
use App\Order;
use App\Restaurant;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use function Symfony\Component\VarDumper\Tests\Fixtures\bar;

class DashboardController extends Controller
{
    /**
     * DashboardController new instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applRestaurant = Restaurant::where('status', 'pending')->take(3)->get();
        $orderCount = Order::count();
        $restCount = Restaurant::count();
        $charCount = Charity::count();
        $applCharity = Charity::where('status', 'pending')->take(3)->get();
        $donationTotal = Order::where('is_donation', 1)->sum('total');

        //user Chart data
        $users = User::groupBy('month')
            ->orderBy('month', 'DESC')
            ->get(array(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as "userCount"')
            ));

//        $chart = $this.barChart();

        return view('admin.dashboard')
            ->with([
                'restaurantApplications' => $applRestaurant,
                'charityApplications' => $applCharity,
                'countOrders' => $orderCount,
                'countRestaurants' => $restCount,
                'countCharities' => $charCount,
                'donationTotal' => $donationTotal,
            ]);
    }

    public function barChart()
    {
        $users = User::groupBy('month')
            ->orderBy('month', 'DESC')
            ->get(array(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as "userCount"')
            ));
        return response()->json($users);
    }

    public function orderChart()
    {
        $orders = Order::groupBy('month')
            ->orderBy('month', 'DESC')
            ->get(array(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as "orderCount"')
            ));

        $donations = Donation::groupBy('month')
            ->orderBy('month', 'DESC')
            ->get(array(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as "donationCount"')
            ));
        return response()->json(['orders' => $orders, 'donations' => $donations]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function restaurants()
    {
        $restaurants = Restaurant::orderBy('updated_at', 'desc')->get();
        $count = Restaurant::count();
        return view('admin.restaurant.index')
            ->with([
                'restaurants' => $restaurants,
                'count' => $count,
            ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function charities()
    {
        $charities = Charity::orderBy('updated_at', 'desc')->get();
        $count = Charity::count();
        return view('admin.charity.index')
            ->with([
                'charities' => $charities,
                'count' => $count,
            ]);
    }

    public function restaurant($ref)
    {
        $restaurant = Restaurant::where('ref_number', $ref)->firstOrFail();
        return '<h3>'.$restaurant->name.'</h3>';
    }

    public function charity($ref)
    {
        $charity = Charity::where('ref_number', $ref)->firstOrFail();
        return '<h3>'.$charity->name.'</h3>';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function applicationRestaurants()
    {
        $applications = Restaurant::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();
        $count = Restaurant::where('status', 'pending')->count();
        return view('admin.applications.restaurants')
            ->with([
                'applications' => $applications,
                'count' => $count,
            ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function applicationCharities()
    {
        $applications = Charity::where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();
        $count = Charity::where('status', 'pending')->count();
        return view('admin.applications.charities')
            ->with([
                'applications' => $applications,
                'count' => $count,
            ]);
    }

    /**
     * @param $ref
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function applicationRestaurant($ref)
    {
        $application = Restaurant::where('ref_number', $ref)->firstOrFail();
        $roles = Role::all();

        return view('admin.applications.restaurant')
            ->with([
                'application' => $application,
                'roles' => $roles,
            ]);
    }

    /**
     * @param $ref
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function applicationCharity($ref)
    {
        $application = Charity::where('ref_number', $ref)->firstOrFail();
        $roles = Role::all();

        return view('admin.applications.charity')
            ->with([
                'application' => $application,
                'roles' => $roles,
            ]);
    }

    public function applRestUpdate(Request $request, $ref)
    {
        $this->validate($request, [
            'role' => 'required',
            'status_update' => 'required',
            'user_update' => 'required',
            'user_id' => 'required',
        ]);

        $application = Restaurant::where('ref_number', $ref)->firstOrFail();
        $user = User::findOrFail($request->user_id);
        $role = Role::findOrFail($request->role);

        $user->assignRole($role);

        $application->status = $request->status_update;
        $application->save();

//        $user->user_type = $request->user_update;
//        $user->save();

        return redirect()->back()
            ->with('success', 'Restaurant application updated successfully');
    }

    public function applCharUpdate(Request $request, $ref)
    {
        $this->validate($request, [
            'role' => 'required',
            'status_update' => 'required',
            'user_update' => 'required',
            'user_id' => 'required',
        ]);

        $application = Charity::where('ref_number', $ref)->firstOrFail();
        $user = User::findOrFail($request->user_id);
        $role = Role::findOrFail($request->role);

        $user->assignRole($role);

        $application->status = $request->status_update;
        $application->save();

        $user->user_type = $request->user_update;
        $user->save();

        return redirect()->back()
            ->with('success', 'Charity application updated successfully');
    }
}
