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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'markers'],function(){
    Route::get('', 'App\Http\Controllers\api\V1\MarkerController@index');
    Route::post('/create','App\Http\Controllers\api\V1\MarkerController@store');
    Route::delete('/{id}/delete','App\Http\Controllers\api\V1\MarkerController@destroy');
    Route::put('/{id}/edit','App\Http\Controllers\api\V1\MarkerController@update');
});

