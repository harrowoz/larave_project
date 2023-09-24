<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(){
        return view('front.shop');
    }
    public function product_details(){
        return view('front.product_details');
    } 
    
}
