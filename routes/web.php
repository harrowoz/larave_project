<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;

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
route::get('/checkout',[CartController::class,'checkout'])->name('front.checkout');
