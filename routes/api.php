<?php

use App\Http\Controllers\addToCart;
use App\Http\Controllers\AuthControllers\AuthController;
use App\Next\Cart\Controllers\CartController;
use App\Next\Kitchenboxes\Controllers\KitchenbController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/*                                         CRUD ON KITCHEN BOXES                                         */

Route::middleware('auth:api')->controller(KitchenbController::class)->group(function(){
    Route::get('kboxes','getall');
    Route::get('kboxes/{id}','search');
    Route::post('addkbox','store');
    Route::patch('editkbox/{id}','edit');
    Route::delete('deletekbox/{id}','delete');

});
/*
Route::get('kboxes',[KitchenbController::class,'getall']);
Route::get('kboxes/{id}',[KitchenbController::class,'search']);
Route::post('addkbox',[KitchenbController::class,'store']);
Route::patch('editkbox/{id}',[KitchenbController::class,'edit']);
Route::delete('deletekbox/{id}',[KitchenbController::class,'delete']);
*/
/*----------------------------------------------------------------------------------------------------------*/

/*                                         Authentication                                                       */

Route::controller(AuthController::class)->group(function () {
    Route::post('auth/login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});
/*---------------------------------------------------------------------------------------------------------*/
/*                                     cart                                                                  */

Route::middleware('auth:api')->controller(CartController::class)->group(function () {
    Route::post('cart/modifycart', 'modifycart');
    Route::get('cart/showSelectedItems/{user_id}','showSelectedItems');
    Route::get('cart/totalprice/{user_id}', 'totalPrice');
    Route::get('cart/clear/{user_id}','clearcart');


});
