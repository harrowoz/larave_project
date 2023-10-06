<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\WishController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/',[FrontController::class,'index'])->name('front.home');
route::get('/shop',[ShopController::class,'index'])->name('front.shop');
route::get('/cart',[CartController::class,'cart'])->name('front.cart');
route::get('/wishlist',[WishController::class,'wishlist'])->name('front.wishlist');
route::get('/checkout',[CartController::class,'checkout'])->name('front.checkout');
route::get('/contact',[ContactController::class,'contact'])->name('front.contact');
route::get('/product_details',[ShopController::class,'product_details'])->name('front.product_details');
route::get('/login',[FrontController::class,'login'])->name('front.login');
route::get('/register',[FrontController::class,'register'])->name('front.register');