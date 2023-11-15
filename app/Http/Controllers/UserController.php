<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('front.login');
    }
    public function register(){
        return view('front.register');
    }
    public function postRegister(Request $request)
    {
        
        $request->merge(['password' => Hash::make($request->password)]);
        try {
            User::create($request->all());
        } catch (\Throwable $th) {
        }
        return redirect()->route('front.login');

    }
    public function postLogin(Request $request)
    {
        
        if (Auth::attempt(['email' => $request -> email, 'password' => $request -> password, ])) {
            // Authentication was successful...
            return redirect()->route('front.home');
        }  return redirect()->back()->with('error','email or password is incorrect');
    }

    public function logout()
    {
        Auth::logout();
      return redirect()->back();
    }
    public function wishlist(){
        $wishlists = Wishlist::where('user_id',Auth::user()->id)->with('product')->get();
        $data=[];
        $data['wishlists']= $wishlists;
        return view('front.wishlist',$data);
    }
    public function removeProductFromWishlist(Request $request){
        $wishlist = Wishlist::where('user_id',Auth::user()->id)->where('product_id',$request->id)->first();
        if($wishlist == null){
            session()->flash('error','Product already removed');
            return response()->json([
                'status'=>true,
            ]);
        } else{
            Wishlist::where('user_id',Auth::user()->id)->where('product_id',$request->id)->delete();
            session()->flash('success','Product removed succesfully.');
            return response()->json([
                'status'=>true,
            ]);
        }
    }
}
