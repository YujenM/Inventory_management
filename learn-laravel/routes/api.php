<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user', 
[\App\Http\Controllers\Auth\SignupController::class, 'signup']);


Route::post('/login', 
[\App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::post('/checksignup',function(){
    echo"Hello World";
});