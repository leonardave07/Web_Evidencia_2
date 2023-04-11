<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PedidoController;


Route::resource('producto',ProductoController::class);
Route::resource('pedido',PedidoController::class);
Auth::routes();

Route::get('/home', [ProductoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/',[ProductoController::class,'index'])->name('home');
    Route::get('/',[PedidoController::class,'index'])->name('home');
});