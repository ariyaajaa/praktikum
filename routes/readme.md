//API FOR LOGIN AND REGISTER
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;//PANGGIL API

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
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//admin api

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;//PANGGIL API
use App\Http\Controllers\AdminController;//PANGGIL API

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::middleware('admin.api')->prefix('admin')->group (function () {
    Route::post('register',[AdminController::class,'register']);
});

//melihat semua role user
tambahkan
Route::get('register',[AdminController::class,'show_register']);

//membuat fitur id untuk melihat detail akun,melihat paramet id sebagaii kuncinya
Route::get('register/{id}',[AdminController::class,'show_register_by-id']);


//membuat aktivasi account dan nonaktifkannya
Route::get('activation-account/{id}',[AdminController::class,'activation_account']);
    Route::get('deactivation-account/{id}',[AdminController::class,'deactivation_account']);

//membuat 3 model resep

    Route::get('create-recipe',[AdminController::class,'create_recipe']);


