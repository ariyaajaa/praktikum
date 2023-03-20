<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;//PANGGIL API
use App\Http\Controllers\AdminController;//PANGGIL API

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//guest routes
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
//admin routes
Route::middleware('admin.api')->prefix('admin')->group (function () {
    Route::post('register',[AdminController::class,'register']);
    Route::get('register',[AdminController::class,'show_register']);
    Route::get('register/{id}',[AdminController::class,'show_register_by_id']);

    Route::get('register/{id}',[AdminController::class,'update_register']);
    Route::get('register/{id}',[AdminController::class,'delete_register']);

    Route::get('activation-account/{id}',[AdminController::class,'activation_account']);
    Route::get('deactivation-account/{id}',[AdminController::class,'deactivation_account']);

    Route::get('create-recipe',[AdminController::class,'create_recipe']);
});
