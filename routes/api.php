<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProductUpdateController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/products', function() {
    return ProductUpdateController::updateProductsByCsv();
});
Route::get('/categories', function() {
    return ProductUpdateController::updateCategoriesByCsv();
});
