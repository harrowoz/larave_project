<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    
    public function addToCart(Request $request){ 
        $product = Product::with('product_images')->find($request->id);
        if ($product == null){
        return response ()->json([
         'status' => false,
         'message' => 'Record not found'
        ]);
    }
    if (Cart::count()>0){
        $cartContent = Cart::content();
        $productAlreadyExist = false;

    foreach ($cartContent as $item) {
        if ($item->id == $product->id) {
            $productAlreadyExist=true; 
        }   
    }
    if($productAlreadyExist == false){
        Cart::add($product->id, $product->title,1, $product->price, ['productImage'=>(!empty($product->product_images))?$product->product_images->first() : '']);
        $status=true;
        $message = $product->title.' added in your cart successfully';
        session()->flash('success',$message);
    }else{
        $status=false;
        $message=$product->title.' already added in cart';
    }
    }else {
        Cart::add ($product->id, $product->title,1, $product->price, ['productImage'=>(!empty($product->product_images))?$product->product_images->first() : '']);
        $status = true;
        $message = $product->title.' added in your cart successfully';
        session()->flash('success',$message);
    }
    return response()->json([
        'status'=>$status,
        'message'=>$message
    ]);
    }
  public function updateCart(Request $request){
        $rowId= $request->rowId;
        $qty=$request->qty;

        $itemInfo=Cart::get($rowId);

        $product=Product::find($itemInfo->id);
        //check qty available in stock

        if($product->track_qty=='yes'){
            if($qty<=$product->qty){
                Cart::update($rowId,$qty);
                $message= 'Cart updated successfully';
                $status=true;
                session()->flash('success',$message);
            }else{
                $message= 'Requested quantity not available in stock';
                $status=false;
                session()->flash('error',$message);
            }
        }else{
            Cart::update($rowId,$qty);
                $message= 'Cart updated successfully';
                $status=true;
                session()->flash('success',$message);
        }
        
        return response()->json([
            'status'=>$status,
            'message'=> $message
        ]);
    }

    public function deleteItem(Request $request){

        $itemInfo=Cart::get($request->rowId);
        if($itemInfo==null){
            $errorMess='Item not found in cart';
            session()->flash('error',$errorMess);
            return response()->json([
                'status'=>false,
                'message'=> $errorMess
            ]); 
        }
        Cart::remove($request->rowId);

        $errorMess='Item removed from cart successfully.';
        session()->flash('success',$errorMess);
        return response()->json([
            'status'=>true,
            'message'=> $errorMess
        ]);
    }
    public function cart(){
        $cartContent=Cart::content();
        $data['cartContent']=$cartContent;
        return view('front.cart',$data);
    } 

    public function checkout(){
        return view('front.checkout');
    }       
      
}
