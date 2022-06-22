<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterControllerClient extends Controller
{
    public function register(Request $request){
      $validated = $request->validate([
        'name' => ['required', 'string', 'max:20'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['required', 'min:10', 'numeric'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = $request->phone;
    $user->avatar = 1;
    $user->referral_code = 1;
    $user->password = Hash::make($request->password);
    $user->save();
    if($user->save()){
      return view('register')->with('success','Register Account Successfully!');
    }
    }
}

