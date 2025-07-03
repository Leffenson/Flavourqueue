<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\ProfileController;

//login:
Route::get('/logintst', function () {
    return view('logintst');
})->name('logintst');

//admin:
Route::get('/admin', function () {
    return view('admin');
})->name('admin');

//home:
Route::get('/', [HomeController::class, 'index'])->name('/home');

Route::get('/home', function () {
    $cartCount = session('cart') ? count(session('cart')) : 0;
    return view('home', compact('cartCount'));
})->name('home');


//Menu:
Route::get('/menu', function (){
    $cartCount = session('cart') ? count(session('cart')) : 0;
    return view('menu', compact('cartCount'));
})->name('menu');

//Cuisines:
Route::get('/ind', function () {
    $cartCount = session('cart') ? count(session('cart')) : 0;
    return view('ind', compact('cartCount'));
})->name('ind');

Route::get('/italian', function () {
    $cartCount = session('cart') ? count(session('cart')) : 0;
    return view('italian', compact('cartCount'));
})->name('italian');

Route::get('/chinese', function () {
    $cartCount = session('cart') ? count(session('cart')) : 0;
    return view('chinese', compact('cartCount'));
})->name('chinese');


//FQ
Route::get('/fqi', function () {
    return view('fqi');
})->name('fqi');

Route::get('/fqh', function () {
    return view('fqh');
})->name('fqh');


//cart:
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

Route::post('/cart/clear', function () {
    Session::forget('cart'); // Clear the cart session
    return response()->json(['message' => 'Cart cleared successfully']);
})->name('cart.clear');

Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');

Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::post('/send-otp', [OTPController::class, 'sendOTP'])->name('send.otp');
Route::post('/verify-otp', [OTPController::class, 'verifyOTP'])->name('verify.otp');

Route::post('/logout', function () {
    Auth::logout();
    session()->flush();
    return redirect()->route('logintst');
})->name('logout');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile');