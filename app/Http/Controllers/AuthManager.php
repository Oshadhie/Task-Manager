<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthManager extends Controller
{   
    //return the view of login
    function login()
    {
        return view ('auth.login');
    }

    //Handle the form of login
    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))
            ->with("error", "Imvalid Email and Password");
    }

    //return the view of register
    function register()
    {
        return view('auth.register');
    }

    //Handle the form of register
    function registerPost(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = $request->password;
        if($user->save()){
            return redirect(route('login'))
                ->with("success", "Registration Successful");
        }
        return redirect(route('register'))
        ->with("error", "Registration Failed");
    }

    //Logout
    function logout()
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
