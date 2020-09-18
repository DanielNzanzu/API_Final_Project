<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm(){

        session()->put('previousUrl', url()->previous());

        return view ('auth.login')->with([
            'title' => 'LOGIN | ADMIN',
            'homeRoute' => 'admin.dashboard.index',
            'loginRoute' => 'admin.login',
            'forgotPasswordRoute' => 'admin.password.request',
        ]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request){

        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the agent in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard.index'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()
            ->back()
            ->withInput($request->only('email', 'remember'))
            ->with('error', 'Login Failed... please try again!');
    }

    /**
     * Redirect to previous page user was on before signing in.
     * @return mixed
     */
    public function redirectTo(){
        return str_replace(url('/'), '', session()->get('previousUrl', '/admin'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(){
        Auth::guard('admin')->logout();

        return redirect()
            ->route('admin.login')
            ->with('status', 'Admin logged out!');
    }
}
