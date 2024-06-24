<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// root menegecek admin
// Route::get('test', function(){
//     return view('layouts.front');
// });

// route admin (backend)
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', function(){
        return view('admin.index');
    });
    // untuk route admin lainnya
});

//rote frotend
Route::get('/',[FrontController::class, 'index']);
Route::get('contact',[FrontController::class, 'contact']);
Route::get('shop',[FrontController::class, 'shop']);
Route::get('cart',[FrontController::class, 'cart']);
Route::get('checkout',[FrontController::class, 'checkout']);
Route::get('track',[FrontController::class, 'track']);
Route::get('aboute',[FrontController::class, 'aboute']);
Route::get('detailproduk',[FrontController::class, 'detailproduk']);

