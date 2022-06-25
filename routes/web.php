<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderManagerController;
use App\Http\Controllers\Admin\CommentProduct;
use App\Http\Controllers\OrderClientController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SearchControllerClient;
use App\Http\Controllers\LoginControllerClient;
use App\Http\Controllers\RegisterControllerClient;
use App\Http\Controllers\ResetPasswordControllerClient;

use App\Http\Controllers\ProductClientController;
use App\Http\Controllers\WebController;

use App\Models\Category;

/*
|--------------------------------------------------------------------------
| W
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


Route::get("/about-us", function() {
    $categories = Category::where('status',1)->take(5)->get();

    return view('about-us', compact("categories"));
})->name('aboutUs');


Route::get("/contact-us", function() {
    $categories = Category::where('status',1)->take(5)->get();

    return view('contact-us', compact("categories"));
})->name('contactUs');
    

Route::get('/user/login', function () {
    return view('login');
})->name('user.login');
Route::post('/user/login', [LoginControllerClient::class, 'login'])->name('user.login');
Route::post('/user/logout', [LoginControllerClient::class, 'logout'])->name('user.logout');

Route::get('/user/register', function () {    
    return view('register');
})->name('user.register');
Route::post('/user/register', [RegisterControllerClient::class, 'register'])->name('user.register');

Route::get('/user/reset', function () {
    return view('resetpassword');
})->name('user.reset');
Route::post('/user/reset', [ResetPasswordControllerClient::class, 'reset'])->name('user.reset');

//home
Route::get('/',[WebController::class,'index'])->name('web.home.index');

//category
Route::get('category',[WebController::class,'category'])->name('web.category');
Route::get('category_test/{slug}',[WebController::class,'category_search_test'])->name('web.category.search_test');
Route::get('category/{price_min}/{price_max}',[WebController::class,'category_search_price'])->name('web.category.search');

Route::get('category/{slug}',[WebController::class,'category_search'])->name('web.category.search');

Route::prefix('product_detail')->group(function() {
    Route::get('/{id}', [ProductClientController::class, 'indexProduct'])->name('product_detail.index');
    Route::post('/comment_product', [ProductClientController::class,'commentProduct']);
});

Route::get('/blank', function () {
    return view('blank');
});

Route::get('/search-product/{text}', [SearchControllerClient::class, 'search'])->name('search-product');

Route::get('/order', [OrderClientController::class, 'order'])->middleware('auth.user')->name('order');
Route::get('/order-detail/{id}', [OrderClientController::class, 'orderDetail'])->middleware('auth.user')->name('order-detail');
Route::post('/order-cancel/{id}', [OrderClientController::class, 'cancelOrder'])->middleware('auth.user')->name('order-cancel');
Route::post('/order-received', [OrderClientController::class, 'receivedOrder'])->middleware('auth.user')->name('order-received');



Route::get("/show-cart-modal", [OrderController::class, 'showCartModal'])->name('showCartModal');
Route::post("/add-to-cart", [OrderController::class, 'addToCart'])->name('addToCart');

Route::get('/checkout', [OrderController::class, 'showCheckout'])->middleware('auth.user')->name('checkout');

Route::post("/checkout", [OrderController::class, 'doCheckout'])->name('do.checkout');

//admin

Route::prefix('admin')->middleware('auth:admin')->group(function(){
    Route::get('/',[HomeController::class,'index'])->name('admin.main');

    Route::prefix('admins')->group(function(){
        Route::get('/',[AdController::class,'index'])->name('admin.admins.index');
        
        Route::get('add',[AdController::class,'create'])->name('admin.admins.add');
        Route::post('store',[AdController::class,'store'])->name('admin.admins.store');

        Route::get('edit/{id}',[AdController::class,'edit'])->name('admin.admins.edit');
        Route::post('update/{id}',[AdController::class,'update'])->name('admin.admins.update');

        Route::get('delete/{id}',[AdController::class,'delete'])->name('admin.admins.delete');
    });

    Route::prefix('category')->group(function(){
        Route::get('/',[CategoryController::class,'index'])->name('admin.category.index');
        
        Route::get('add',[CategoryController::class,'create'])->name('admin.category.add');
        Route::post('store',[CategoryController::class,'store'])->name('admin.category.store');

        Route::get('edit/{id}',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::post('update/{id}',[CategoryController::class,'update'])->name('admin.category.update');

        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('admin.category.delete');
    });

    Route::prefix('banner')->group(function(){
        Route::get('/',[BannerController::class,'index'])->name('admin.banner.index');
        
        Route::get('add',[BannerController::class,'create'])->name('admin.banner.add');
        Route::post('store',[BannerController::class,'store'])->name('admin.banner.store');

        Route::get('edit/{id}',[BannerController::class,'edit'])->name('admin.banner.edit');
        Route::post('update/{id}',[BannerController::class,'update'])->name('admin.banner.update');

        Route::get('delete/{id}',[BannerController::class,'delete'])->name('admin.banner.delete');
    });

    // Route::prefix('gift')->group(function(){
    //     Route::get('/',[GiftController::class,'index'])->name('admin.gift.index');
        
    //     Route::get('add',[GiftController::class,'create'])->name('admin.gift.add');
    //     Route::post('store',[GiftController::class,'store'])->name('admin.gift.store');

    //     Route::get('edit/{id}',[GiftController::class,'edit'])->name('admin.gift.edit');
    //     Route::post('update/{id}',[GiftController::class,'update'])->name('admin.gift.update');

    //     Route::get('delete/{id}',[GiftController::class,'delete'])->name('admin.gift.delete');
    // });

    Route::prefix('product')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('admin.product.index');
        
        Route::get('add',[ProductController::class,'create'])->name('admin.product.add');
        Route::post('store',[ProductController::class,'store'])->name('admin.product.store');

        Route::get('edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
        Route::post('update/{id}',[ProductController::class,'update'])->name('admin.product.update');

        Route::get('delete/{id}',[ProductController::class,'delete'])->name('admin.product.delete');
        Route::get('deleteImage/{id}',[ProductController::class,'deleteImage'])->name('admin.product.deleteImage');
    });

    Route::prefix('comment')->group(function(){
        Route::get('/',[CommentProduct::class,'index'])->name('admin.comment.index');
        Route::get('show/{id}',[CommentProduct::class,'show'])->name('admin.comment.show');
        Route::get('delete/{id}',[CommentProduct::class,'delete'])->name('admin.comment.delete');
    });

    // Route::prefix('discountcode')->group(function(){
    //     Route::get('/',[DiscountCodeController::class,'index'])->name('admin.discountcode.index');
    //     Route::get('add',[DiscountCodeController::class,'create'])->name('admin.discountcode.add');
    //     Route::post('store',[DiscountCodeController::class,'store'])->name('admin.discountcode.store');

    //     Route::get('edit/{id}',[DiscountCodeController::class,'edit'])->name('admin.discountcode.edit');
    //     Route::post('update/{id}',[DiscountCodeController::class,'update'])->name('admin.discountcode.update');

    //     Route::get('delete/{id}',[DiscountCodeController::class,'delete'])->name('admin.discountcode.delete');
    // });

    Route::prefix('users')->group(function(){
        Route::get('/',[AdminUserController::class,'index'])->name('admin.user.index');
        
        Route::get('add',[AdminUserController::class,'create'])->name('admin.user.add');
        Route::post('store',[AdminUserController::class,'store'])->name('admin.user.store');

        Route::get('edit/{id}',[AdminUserController::class,'edit'])->name('admin.user.edit');
        Route::post('update/{id}',[AdminUserController::class,'update'])->name('admin.user.update');

        Route::get('delete/{id}',[AdminUserController::class,'delete'])->name('admin.user.delete');
    });

    Route::prefix('order')->group(function(){
        Route::get('/',[OrderManagerController::class,'index'])->name('admin.order.index');
        Route::get('/detail/{id}',[OrderManagerController::class,'orderDetail'])->name('admin.order.detail');
        Route::post('/confirm', [OrderManagerController::class, 'updateConfirmOrder']);
        Route::post('/ship', [OrderManagerController::class, 'updateShipOrder']);
        Route::post('/destroy', [OrderManagerController::class, 'destroy']);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
