<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

class LoginControllerClient extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
 
        if (Auth::guard('user')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('home.client');
        }
        else {
            return \Redirect::back()->withErrors(
                [
                    'errorlogin' => 'Email address or Password is incorrect',
                ]
            );
        }
    }
}