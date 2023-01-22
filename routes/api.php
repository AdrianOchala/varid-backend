<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ProductController;
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


Route::controller(ProductController::class)->group(function () {
    Route::prefix('products')->group(function() {
        Route::get('/', 'getAvailable');
        Route::post('/', 'store');
        Route::put('/{ID}', 'update');
    });
});

Route::controller(CartController::class)->group(function () {
    Route::prefix('carts')->group(function() {
        Route::get('/', 'getAll');
        Route::get('/empty', 'create');

    });
});




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
