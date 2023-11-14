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
        if($request->get('price_max') !='' && $request->get('price_min') !=''){
            if($request->get('price_max')==200){
                $products=$products->whereBetween('price',[intval($request->get('price_min')),1000]);
            }else{
              $products=$products->whereBetween('price',[intval($request->get('price_min')),intval($request->get('price_max'))]);   
            }
           
        }

        $products= $products->orderBy('id','DESC');
        $products=$products->paginate(9)->appends([
            'price_max' => $request->get('price_max'),
            'price_min' =>$request->get('price_min'),
        ]);

        $data['categories']=$categories;
        $data['products']=$products;
        $data['priceMax']=(intval($request->get('price_max'))==0)?200: $request->get('price_max');
        $data['priceMin']=intval($request->get('price_min'));
       
        return view('front.shop',$data);
    }
    public function product($slug){  
        $product=Product::where('slug',$slug)->with('product_images')->first();
        if($product==null){
            abort(404);
        }
        $rproducts=Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();  
        $data['product']=$product;
        $data['rproducts']=$rproducts;
        return view('front.product',$data);
    } 
}
