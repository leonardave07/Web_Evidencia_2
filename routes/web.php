<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroeController;


Route::resource('superheroe',SuperheroeController::class);
Auth::routes();

Route::get('/home', [SuperheroeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/',[SuperheroeController::class,'index'])->name('home');
});