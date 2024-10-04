<?php

use App\Http\Controllers\CategoryController;
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

Route::resource('/products', ProductController::class);
Route::get('/{category}',[ProductController::class,'FilterByCategory'])->name('category.product');
Route::get('/order/{column}/{direction}/products',[ProductController::class,'OrderBy'])->name('orderBy');
