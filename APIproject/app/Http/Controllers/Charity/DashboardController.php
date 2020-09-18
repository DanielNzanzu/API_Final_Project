<?php

namespace App\Http\Controllers\Charity;

use App\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * display the information details page of charity
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details()
    {
        return view('account.charity.details');
    }

    /**
     * display the a listing of donations given to charity
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function donations()
    {
        $donationAll = Donation::all();
        $donations = Donation::where('charity_id', auth()->user()->charity->id)->paginate(5);
        $count = Donation::count();

        return view('account.charity.donations')->with([
            'donationAll' => $donationAll,
            'donations' => $donations,
            'count' => $count,
        ]);
    }

    /**
     * display a donation with details
     *
     * @param $ref
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function donation($ref)
    {
        $donation = Donation::where('ref_number', $ref)->firstOrFail();

        return view('account.charity.donation')
            ->with('donation', $donation);
    }

    public function statistics()
    {
        return view('account.charity.statistics');
    }

    public function donationChart()
    {
        $donations = Donation::where('charity_id', auth()->user()->charity->id);

        $result = $donations->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get(array(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('COUNT(*) as "donationCount"')
            ));

        return response()->json($result);
    }
}
