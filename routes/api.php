<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\InformasiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/informasi', [InformasiController::class, 'informasi']); 
Route::post('/store', [InformasiController::class, 'store']); 
Route::get('/informasi/show/{id}', [InformasiController::class, 'show']); 
Route::post('/informasi/update/{id}', [InformasiController::class, 'update']); 
Route::get('/informasi/destroy/{id}', [InformasiController::class, 'destroy']); 

//Route JWT
Route::post('/register', [RegisterController::class, 'register']); 
Route::post('/login', [LoginController::class, 'login']);

Route::get('/user', [UserController::class, 'user']); 

  