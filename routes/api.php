<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post("/register", [RegisterController::class, "register"]);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/addproduct', [ProductsController::class, 'addproduct']);
Route::get('/lists', [ProductsController::class, 'lists']);
Route::delete('/del/{id}', [ProductsController::class, 'delete']);
Route::get('/getdata/{id}', [ProductsController::class, 'getdata']);
Route::put('/update/{id}', [ProductsController::class, 'update']);
Route::get('/search/{key}',[ProductsController::class,'search']);