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

Route::get('users','UserController@index');
Route::get('user/{id}','UserController@show');
Route::post('user','UserController@store');
Route::put('user','UserController@store');
Route::delete('user/{id}','UserController@destroy');


Route::get('questions-sets','QuestionsSetController@index');
Route::get('questions-set/{id}','QuestionsSetController@show');
Route::post('questions-sets','QuestionsSetController@store'); 
Route::put('questions-set','QuestionsSetController@store');
Route::delete('questions-set/{id}','QuestionsSetController@destroy');
