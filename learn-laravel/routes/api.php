<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetUser;
// use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\productcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/user', 
[\App\Http\Controllers\Auth\SignupController::class, 'signup']);


Route::post('/login', 
[\App\Http\Controllers\UserLogin::class, 'login']);

// Route::get("/getuser",[\App\Http\Controllers\getuser::class , 'getuser']);
// Route::middleware('auth:sanctum')->get('/getuser', [GetUser::class, 'getuser']);
Route::middleware('auth:api')->get('/getuser', [GetUser::class, 'getUser']);
Route::get('/getproducts/{user_id}', [ProductController::class, 'getproducts']);
Route::post('/createproduct/{user_id}', [ProductController::class, 'createProduct']);
Route::put('/updateproduct/{user_id}/{product_id}', [ProductController::class, 'updateProduct']);
Route::delete('/deleteproduct/{user_id}/{product_id}', [ProductController::class, 'deleteProduct']);

