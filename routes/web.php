<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\GiftController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/store', function () {
    return view('store');
});

Route::get('/product', function () {
    return view('product');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/blank', function () {
    return view('blank');
});


//admin

Route::prefix('admin')->middleware('auth')->group(function(){
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
    Route::prefix('gift')->group(function(){
        Route::get('/',[GiftController::class,'index'])->name('admin.gift.index');
        
        Route::get('add',[GiftController::class,'create'])->name('admin.gift.add');
        Route::post('store',[GiftController::class,'store'])->name('admin.gift.store');

        Route::get('edit/{id}',[GiftController::class,'edit'])->name('admin.gift.edit');
        Route::post('update/{id}',[GiftController::class,'update'])->name('admin.gift.update');

        Route::get('delete/{id}',[GiftController::class,'delete'])->name('admin.gift.delete');
    });

    Route::prefix('product')->group(function(){
        Route::get('/',[ProductController::class,'index'])->name('admin.product.index');
        
        Route::get('add',[ProductController::class,'create'])->name('admin.product.add');
        Route::post('store',[ProductController::class,'store'])->name('admin.product.store');

        Route::get('edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
        Route::post('update/{id}',[ProductController::class,'update'])->name('admin.product.update');

        Route::get('delete/{id}',[ProductController::class,'delete'])->name('admin.product.delete');
    });
    Route::prefix('discount')->group(function(){
        Route::get('/',[DiscountController::class,'index'])->name('admin.discount.index');
        
        Route::get('add',[DiscountController::class,'create'])->name('admin.discount.add');
        Route::post('store',[DiscountController::class,'store'])->name('admin.discount.store');

        Route::get('edit/{id}',[DiscountController::class,'edit'])->name('admin.discount.edit');
        Route::post('update/{id}',[DiscountController::class,'update'])->name('admin.discount.update');

        Route::get('delete/{id}',[DiscountController::class,'delete'])->name('admin.discount.delete');
    });

    Route::prefix('discountcode')->group(function(){
        Route::get('/',[DiscountCodeController::class,'index'])->name('admin.discountcode.index');
        Route::get('add',[DiscountCodeController::class,'create'])->name('admin.discountcode.add');
        Route::post('store',[DiscountCodeController::class,'store'])->name('admin.discountcode.store');

        Route::get('edit/{id}',[DiscountCodeController::class,'edit'])->name('admin.discountcode.edit');
        Route::post('update/{id}',[DiscountCodeController::class,'update'])->name('admin.discountcode.update');

        Route::get('delete/{id}',[DiscountCodeController::class,'delete'])->name('admin.discountcode.delete');
    });

    Route::prefix('users')->group(function(){
        Route::get('/',[AdminUserController::class,'index'])->name('admin.user.index')->middleware('can:list_user');
        
        Route::get('add',[AdminUserController::class,'create'])->name('admin.user.add')->middleware('can:add_user');
        Route::post('store',[AdminUserController::class,'store'])->name('admin.user.store');

        Route::get('edit/{id}',[AdminUserController::class,'edit'])->name('admin.user.edit')->middleware('can:edit_user');
        Route::post('update/{id}',[AdminUserController::class,'update'])->name('admin.user.update');

        Route::get('delete/{id}',[AdminUserController::class,'delete'])->name('admin.user.delete')->middleware('can:delete_user');
    });
    
    Route::prefix('receipt')->group(function(){
        Route::get('/',[AdminReceiptController::class,'index'])->name('admin.receipt.index');
        Route::get('add',[AdminReceiptController::class,'create'])->name('admin.receipt.add');
        Route::post('store',[AdminReceiptController::class,'store'])->name('admin.receipt.store');

        Route::get('edit/{id}',[AdminReceiptController::class,'edit'])->name('admin.receipt.edit');
        Route::post('update/{id}',[AdminReceiptController::class,'update'])->name('admin.receipt.update');

        Route::get('delete/{id}',[AdminReceiptController::class,'delete'])->name('admin.receipt.delete');

        Route::get('detailReceipt/{id}',[AdminReceiptController::class,'detailList'])->name('admin.detailReceipt.index');


    });
});