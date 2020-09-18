<div>
    <h3>Message from CheapFood - User Auth Verification</h3><br/>
    Hello! @auth {{ Auth::user()->firstname.' '.Auth::user()->lastname }} @endauth
    <br/>
    <p>
        This is your verification code <strong>{{ $code2fa }}</strong>. Please enter it in the space required to complete your login.
    </p>
</div>