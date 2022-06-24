<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('admin.main');
        }
        else {
            return Redirect::back()->withErrors(
                [
                    'errorlogin' => 'Email address or Password is incorrect',
                ]
            );
        }
    }
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     // Auth::guard('admin')->attempt($credentials)
    //     if (Auth::guard('admin')->attempt($credentials)) {
    //         // Authentication passed...
    //         return redirect()->route('admin.main');
    //         // return redirect()->intended('dashboard');
    //     }
    //     else {
    //         return \Redirect::back()->withErrors(
    //             [
    //                 'errorlogin' => 'Email address or Password is incorrect',
    //             ]
    //         );
    //     }
    // }
    // public function guard()
    // {
    //     return Auth::guard('admin');
    // }
}