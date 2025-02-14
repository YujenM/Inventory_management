<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/user', 
[\App\Http\Controllers\Auth\SignupController::class, 'signup']);
?>