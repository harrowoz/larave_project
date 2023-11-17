<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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

        if(Cart::count()==0){
            return redirect()->route('front.cart');
        }

        if (Auth::check()==false){
            if(!session()->has('url.intended')){
                session(['url.intended'=> url()->current()]);
            }
            
            return redirect()->route('front.login');
        }
        session()->forget('url.intended');
        return view('front.checkout');
    }       
      public function processCheckOut( Request $request) {
        $validator = Validator::make($request->all(),[
            'first_name'=> 'required',
            'last_name'=> 'required',
            'address'=> 'required|min:15',
            'phone'=> 'required',
            'email'=> 'required|email'
        ]);
        if($validator->fails()){
            return response()->json([
                'message'=> 'Please fix the errors',
             'status'=>false,
               'errors'=>$validator->errors()

            ]);
        }
        $user = Auth::user();
        CustomerAddress::updateOrCreate(
            ['user_id'=>$user->id],
            [
                'user_id'=>$user->id,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'address'=>$request->address,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'note'=>$request->note,
            ],
        );
        if($request->payment_method=='cod'){
            $shipping = 0;
            $subTotal = Cart::subtotal(2,'.','');
            $grandTotal = $subTotal + $shipping;
            $order = new Order;
            $order->subtotal = $subTotal;
            $order->shipping = $shipping;
            $order->grand_total = $grandTotal; 

            $order->user_id = $user->id;
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->email = $request->email;
            $order->note = $request->note;
            $order->save();

            foreach (Cart::content() as $key => $item){
                $orderDetail = new OrderDetail;
                $orderDetail-> product_id =$item->id;
                $orderDetail-> order_id =$order->id;
                $orderDetail-> name =$item->name;
                $orderDetail-> qty =$item->qty;
                $orderDetail-> price =$item->price;
                $orderDetail-> total =$item->price*$item->qty;
                $orderDetail->save();
            }
            session()->flash('success','You have successfully placed your order!');
            // Thanh toán xong tự động xóa khỏi giỏ hàng
            Cart::destroy(); 
            
            return response()->json([
                'message'=> 'Order save successfully!',
                'orderId'=>$order->id,
             'status'=>true
            ]);
        } else{

        }
      }
      public function thankyou() {
        return view('front.thanks');
      }
}
