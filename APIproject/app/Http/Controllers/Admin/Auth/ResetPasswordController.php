<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /**
     *  Show reset password form
     *
     * @param Request $request
     * @param null $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null){
        return view('auth.passwords.reset',[
            'title' => 'Reset Admin Password',
            'passwordUpdateRoute' => 'admin.password.update',
            'token' => $token,
        ]);
    }

    /**
     * Get the broker to be used during password reset.
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    protected function broker(){
        return Password::broker('admins');
    }


    /**
     * Get the guard to be used during password reset.
     * @return mixed
     */
    protected function guard(){
        return Auth::guard('admin');
    }

}
