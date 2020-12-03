<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controller\Controller;
use App\Http\Controllers\UserController;



Route::redirect('/', '/home', 301);
Route::view('/home', 'home');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/about', function () {
    
    return view('about');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/history', function () {
    return view('history');
});
Route::get('/payment', function () {
    return view('payment');
});
Route::view('/favorite', 'favorite');

Route::get('user/id/{id}', [UserController::class, 'show']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [UserController::class, 'index']);
});