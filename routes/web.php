<?php

// use App\Http\Controllers\Seller\Transaction\OrderController as OrderSellerController;
// use App\Http\Controllers\Buyer\Transaction\OrderController as OrderBuyerController;
// use App\Http\Controllers\Profile\ProfileController;
// use App\Http\Controllers\Shop\SellerController;

use App\Http\Controllers\Transaction\CartItemController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ShopController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageController::class, 'dashboard_guest']);

Route::middleware(['auth','page.access:admin'])->group(function(){
    Route::resource('product', ProductController::class);
    Route::resource('user', UserController::class);
    Route::resource('shop', ShopController::class);
    Route::get('/admin', [PageController::class, 'dashboard_admin'])->name('dashboard_admin');
});

Route::middleware(['auth','page.access:user'])->group(function(){
    
    Route::resource('user.cart', CartItemController::class)->shallow();
    Route::post('/user/{id}/cart/update', [CartItemController::class, 'update_quantity']);
    Route::get('my/shop', [PageController::class, 'dashboard_shop'])->name('dashboard_shop');
    Route::resource('shop.product', ProductController::class)->shallow();
    Route::get('user/account/shop/create', [ProfileController::class,'openShop']);
    Route::post('user/account/shop/create', [ShopController::class, 'store'])->name('shop_store');
    Route::get('user/account/profile', [ProfileController::class,'show'])->name('profile');
    Route::put('user/account/{id}/update', [ProfileController::class,'update'])->name('update_profile');
});

Route::get('product/{id}/show', [PageController::class, 'showProduct'])->name('detail_product');

require __DIR__.'/auth.php';
