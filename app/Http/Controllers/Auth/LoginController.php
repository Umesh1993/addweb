<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\UserLoggedIn;
use App\Events\UserLoggedOut;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if(Auth::attempt($request->only('email','password'))){
            $user = Auth::user();
            event(new UserLoggedIn($user));

            return redirect('dashboard');
        } else {
            return redirect('/')->withErrors(['msg' => 'Credential wrong, please try again..']);
        }
    } 


    public function logout(Request $request)
    {
        $user = Auth::user();
        Auth::logout();
        event(new UserLoggedOut($user));
        return redirect('/');
    }
}
