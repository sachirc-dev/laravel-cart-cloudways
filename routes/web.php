<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Cartcontroller;

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

Route::get('/', [PagesController::class, 'index'])->name('home');
Route::get('/shop', [Productcontroller::class, 'index'])->name('shop');
Route::get('/shop/{id}', [Productcontroller::class, 'show'])->name('product');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('/delete-from-cart/{id}', [CartController::class, 'delete'])->name('delete.from.cart');
Route::post('/update-cart/{id}', [Cartcontroller::class, 'updatecart'])->name('update.from.cart');