<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/restaurant', CreateRestaurantController::class);
Route::put('/restaurant/{id}', UpdateRestaurantController::class);
Route::get('/restaurant/{id}', ShowRestaurantController::class);
Route::get('/restaurant', ListRestaurantController::class);
Route::delete('/restaurant/{id}', DeleteRestaurantController::class);

/* products */
Route::post('/product', CreateProductController::class);
Route::put('/product/{id}', UpdateProductController::class);
Route::get('/product/{id}', ShowProductController::class);
Route::get('/product', ListProductController::class);
Route::delete('/product/{id}', DeleteProductController::class);
