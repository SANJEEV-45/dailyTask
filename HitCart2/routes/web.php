<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
// require __DIR__.'/auth.php';


Route::get('/',[AuthController::class,'login'])->name('logout');
Route::view('/login','auth.login')->name('auth-login');
Route::view('/register','auth.register')->name('auth-register');

Route::post('/registration',[AuthController::class,'registration'])->name("User-registration");
Route::post('/loggingIn',[AuthController::class,'validation'])->name("login-validation");

Route::middleware('Auth-check')->group(function(){
    Route::view('/dashboard','products.index')->name('dashboard');
    Route::get('/category/{category_id}',[ProductController::class,'menu'])->name('product.category');
    Route::get('/product/{product_id}',[ProductController::class,'view'])->name('product.view');
});

Route::view('/welcome','welcome')->name('welcome');
