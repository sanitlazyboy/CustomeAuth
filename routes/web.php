<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\DataTabel;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/signup', [AuthController::class, 'index'])->name('signup_show');
Route::post('/signup', [AuthController::class, 'store'])->name('signup_post');
Route::get('/login', [AuthController::class, 'loginShow'])->name('login_show');
Route::POST('/login', [AuthController::class, 'login'])->name('login');
Route::get('/thankyou', [AuthController::class, 'thankyou'])->name('thankyou');
Route::resource('/category', CategoryController::class);
Route::resource('/product', ProductController::class);
Route::get('/data', [CategoryController::class, 'one']);
Route::get("/table", [ProductController::class, 'datatable']);