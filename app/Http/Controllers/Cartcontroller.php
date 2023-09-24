<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Cartcontroller extends Controller
{
    public function cart(){
        return view('front.cart');
    }  
    public function checkout(){
        return view('front.checkout');
    }       
    public function contact(){
        return view('front.contact');
    }
    public function product_details(){
        return view('front.product_details');
    }      
}
