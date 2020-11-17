<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->redirectTo = url()->previous();
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated()
    {
        return redirect(session('link'));
    }

    public function showLoginForm()
    {
        session(['link' => url()->previous()]);
        return view('auth.login');
    }
/*
    public function redirectTo()
    {
        if (session()->has('redirect_to'))
            return session()->pull('redirect_to');

        return $this->redirectTo;
    }*/
}
