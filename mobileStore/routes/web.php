<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[ProductController::class,'index']);
Route::get('products/insertProduct',[ProductController::class,'insertProduct']);
Route::post('products/store',[ProductController::class,'store']);
Route::get('products/{id}/viewProduct',[ProductController::class,'view']);
Route::get('products/{id}/editProduct',[ProductController::class,'edit']);
Route::put('products/{id}/updateProduct',[ProductController::class,'update']);
Route::get('products/{id}/deleteProduct',[ProductController::class,'delete']);