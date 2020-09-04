<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/hello','API\AuthApiController@hello');

//Cart Route 
Route::group(['prefix' => 'cart'],function(){
	

Route::get('/','API\CartController@index')->name('carts');
Route::post('/store','API\CartController@store')->name('carts.store');
Route::post('/update/{id}','API\CartController@update')->name('carts.update');
Route::post('/delete/{id}','API\CartController@destroy')->name('carts.delete');


});

