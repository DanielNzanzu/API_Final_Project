<?php

namespace App\Http\Controllers\Admin\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('auth.two-factor')->with([
            'title' => 'Verify IDENTITY | ADMIN',
            'homeRoute' => 'admin.dashboard.index',
            'verify2faRoute' => 'admin.2fa.verify',
        ]);
    }

    public function verifyToken(Request $request)
    {
        $request->validate([
            '2fa' => 'required',
        ]);

        $user = Auth::user();

        if($request->input('2fa') == $user->token_2fa){
            $user->token_2fa_expiry = Carbon::now()->addMinutes(config('session.lifetime'));
            $user->save();
            return redirect()->route('admin.dashboard.index');
        } else {
            return back()->withInput();
        }
    }
}
