<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UserController;

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
route::get('/shop/{categoriesType?}/{categoriesSlug?}',[ShopController::class,'index'])->name('front.shop');
route::get('/cart',[CartController::class,'cart'])->name('front.cart');
route::post('/add-Cart',[CartController::class,'addToCart'])->name('front.addToCart');
route::post('/update-Cart',[CartController::class,'updateCart'])->name('front.updateCart');
route::post('/delete-item',[CartController::class,'deleteItem'])->name('front.deleteItem.cart');
//route::get('/wishlist',[WishController::class,'wishlist'])->name('front.wishlist');
route::get('/checkout',[CartController::class,'checkout'])->name('front.checkout');
route::get('/product/{slug}',[ShopController::class,'product'])->name('front.product');

route::get('/login',[UserController::class,'login'])->name('front.login');
route::post('/login',[UserController::class,'postLogin'])->name('postLogin');
route::get('/register',[UserController::class,'register'])->name('front.register');
Route::post('/register', [UserController::class, 'postRegister'])->name('postRegister');
route::post('/add-to-wishlist',[WishlistController::class,'addToWishlist'])->name('front.addTowishlist');
route::group(['middleware'=>'auth'],function(){

    route::get('/my-wishlist',[UserController::class,'wishlist'])->name('front.wishlist');
    route::post('/remove-wishlist',[UserController::class,'removeProductFromWishlist'])->name('front.removeProductFromWishlist');
    route::get('/logout',[UserController::class,'logout'])->name('logout');
}
);