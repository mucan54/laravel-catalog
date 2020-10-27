<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;
use App\Http\Controllers\AllProductsController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\CustomerMiddleware;

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

Route::get('/', AllProductsController::class)
->name('products')->middleware(CustomerMiddleware::class);


Route::get('sku/{sku}', ProductDetailController::class)
->name('product')->middleware(CustomerMiddleware::class);


Route::any('login', [CustomerController::class,'login'])
->name('login');

Route::any('logout', [CustomerController::class,'logout'])
->name('logout');


Route::get('qr/{sku}/{pass}', [QrController::class, 'page'])
->name('products.qr');
