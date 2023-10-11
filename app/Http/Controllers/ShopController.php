<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Product;
class ShopController extends Controller
{
    public function index(Request $request, $categoriesType=null, $categoriesSlug=null){
        $categories=Categories::orderBy('name','ASC')->where('status',1)->get();
        $products=Product::where('status',1);

        //filter
        if($categoriesType=='man'){
            $category=Categories::where('type','man');
            $products=Product::where('gender','male')->where('status',1);
        }
        if($categoriesType=='women'){
            $category=Categories::where('type','women');
            $products=Product::where('gender','female')->where('status',1);
        }
        if(!empty($categoriesSlug)){
            $category=Categories::where('slug',$categoriesSlug)->first();
            $products=$products->where('category_id',$category->id);
        }

        $products= $products->orderBy('id','DESC');
        $products= $products->get();
        $data['categories']=$categories;
        $data['products']=$products;
        return view('front.shop',$data);
    }
    public function product(){
        return view('front.product');
    } 
    
}
