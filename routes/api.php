<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* TODO Refactor namespaces to groupped use declaration */

use App\Http\Controllers\API\Restaurant\CreateRestaurantController;
use App\Http\Controllers\API\Restaurant\UpdateRestaurantController;
use App\Http\Controllers\API\Restaurant\ShowRestaurantController;
use App\Http\Controllers\API\Restaurant\ListRestaurantController;
use App\Http\Controllers\API\Restaurant\DeleteRestaurantController;

use App\Http\Controllers\API\Product\CreateProductController;
use App\Http\Controllers\API\Product\UpdateProductController;
use App\Http\Controllers\API\Product\ShowProductController;
use App\Http\Controllers\API\Product\ListProductController;
use App\Http\Controllers\API\Product\DeleteProductController;

use App\Http\Controllers\API\Order\CreateOrderController;


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

/* restaurants */
Route::post('/restaurant', CreateRestaurantController::class)->name('restaurant.create');
Route::put('/restaurant/{id}', UpdateRestaurantController::class)->name('restaurant.update');
Route::get('/restaurant/{id}', ShowRestaurantController::class)->name('restaurant.show');
Route::get('/restaurant', ListRestaurantController::class)->name('restaurant.list');
Route::delete('/restaurant/{id}', DeleteRestaurantController::class)->name('restaurant.delete');

/* products */
Route::post('/product', CreateProductController::class)->name('product.create');
Route::put('/product/{id}', UpdateProductController::class)->name('product.update');
Route::get('/product/{id}', ShowProductController::class)->name('product.show');
Route::get('/product', ListProductController::class)->name('product.list');
Route::delete('/product/{id}', DeleteProductController::class)->name('product.delete');

// orders
Route::post('/order', CreateOrderController::class)->name('order.create');
