<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;
class ShopController extends Controller
{
    public function index(){
        $categories=Categories::orderBy('name','ASC')->where('status',1)->get();
        $products= Product::orderBy('id','DESC')->where('status',1)->get();
        $data['categories']=$categories;
        $data['products']=$products;
        return view('front.shop',$data);
    }
    public function product(){
        return view('front.product');
    } 
    
}
