<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;
use App\Http\Controllers\AllProductsController;
use App\Http\Controllers\ProductDetailController;
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
->name('products');


Route::get('sku/{sku}', ProductDetailController::class)
->name('product');


Route::get('qr/{sku}/{pass}', QrController::class)
->name('products.qr');
