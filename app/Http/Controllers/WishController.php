<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishController extends Controller
{
    public function wishlist(){
        return view('front.wishlist');
    }  
}
