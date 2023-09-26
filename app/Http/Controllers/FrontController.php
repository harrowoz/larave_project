<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front.home');
    }
    public function login(){
        return view('front.login');
    }
    public function register(){
        return view('front.register');
    }
}
