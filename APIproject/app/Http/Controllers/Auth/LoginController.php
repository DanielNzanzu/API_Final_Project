<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        session()->put('previousUrl', url()->previous());

        return view ('auth.login')->with([
            'title' => 'SIGN IN',
            'homeRoute' => 'home.index',
            'loginRoute' => 'login',
            'forgotPasswordRoute' => 'password.request',
        ]);
    }

    /**
     * Redirect to previous page user was on before signing in.
     * @return mixed
     */
    public function redirectTo(){
        return str_replace(url('/'), '', session()->get('previousUrl', '/'));
    }

    public function authenticated()
    {
        $user = Auth::user();
        $user->save();

        return redirect('/account');
    }

    /**
     * Override logout method to prevent logout to flush sessions of all other auth (e.g. Auth::guard('admin')
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){
        Auth::logout();

        if(Cart::instance('default')->count() > 0 ){
            Cart::instance('default')->destroy();
        }

        return redirect('/')->with('status','User has been logged out!');
    }
}
