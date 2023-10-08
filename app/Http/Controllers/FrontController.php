<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class FrontController extends Controller
{
    public function index(){
        $products=Product::where('is_featured','yes')->where('status',1)->get();
        $data['featuredProducts']=$products;
        $newProducts=Product::orderBy('id','ASC')->where('status',1)->take(8)->get();
        $data['newProducts']=$newProducts;
        return view('front.home',$data);
    }
    public function login(){
        return view('front.login');
    }
    public function register(){
        return view('front.register');
    }
}
