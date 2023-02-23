<?php

use App\Next\Kitchenboxes\Controllers\KitchenbController;
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


//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('index',function(){
   return view('index');
});

Route::post('add',[\App\Next\Kitchenboxes\Controllers\KitchenbController::class,'store'])->name('addbox');
Route::get('box',[KitchenbController::class,'getall']);
