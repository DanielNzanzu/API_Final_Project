<?php

namespace App\Http\Middleware;

use App\Mail\CodeVerify;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TwoFactorVerify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user->token_2fa_expiry > Carbon::now()){
            return $next($request);
        }

        $user->token_2fa = mt_rand(100000, 999999);
        $user->save();

        //Or Send Email
        Mail::to($user->email)->send(new CodeVerify());

        return redirect()->route('2fa.index');

    }
}
