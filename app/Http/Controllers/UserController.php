<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function login(){
        return view('front.login');
    }
    public function register(){
        return view('front.register');
    }
    public function postRegister(Request $request)
    {
        
        $request->merge(['password' => Hash::make($request->password)]);
        try {
            User::create($request->all());
        } catch (\Throwable $th) {
        }
        return redirect()->route('front.login');

    }
    public function postLogin(Request $request)
    {
        
        if (Auth::attempt(['email' => $request -> email, 'password' => $request -> password, ])) {
            // Authentication was successful...
            return redirect()->route('front.home');
        }  return redirect()->back()->with('error','email or password is incorrect');
    }

    public function logout()
    {
        Auth::logout();
      return redirect()->back();
    }
}
