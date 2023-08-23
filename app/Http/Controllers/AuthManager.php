<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthManager extends Controller
{
    function login(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }

    function registration(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' =>'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        }
        return redirect('login')->with("error", "Login details are wrong");

    }

    function registrationPost(Request $request){
        $request->validate([
            'name'=>'required',
            'email' =>'required|email|unique:users',
            'password' => 'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if (! $user){

            return redirect('registration')->with("error", "Registration failed, Try again");
        }
        return redirect('login')->with("success", "successfully registered, Login to access the app");
    }

    function logout(){
        session()->flush();
        Auth::logout();
        return redirect('login');
    }
}
