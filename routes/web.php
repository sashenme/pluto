<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['role:admin']], function() {
Route::get('/admin', function () {
    return view('admin');
});
});

Route::get('/userhome', function () {
    return 'welcome';
})->name('test');
Route::get('/adminhome', function () {
    return view('admin.home');
});

Auth::routes();



Route::group(['middleware' => ['role:user|admin']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('responses','ResponseController');
    Route::get('/home/{id?}', 'HomeController@index')->name('home');
});