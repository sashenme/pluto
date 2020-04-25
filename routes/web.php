<?php

use Illuminate\Support\Facades\Auth;
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



Route::get('/userhome', function () {
    return view('user.home');
})->name('test');
Route::get('/adminhome', function () {
    return view('admin.home');
});



Auth::routes();



Route::group(['middleware' => ['role:user|admin']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
    Route::resource('responses', 'ResponseController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/daily-quiz/{id?}', 'HomeController@dailyQuiz')->name('dailyQuiz');
});

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::get('/admin', function () {
        return view('admin.home');
    })->name('admin'); 
    Route::post('/user/{id}/updateUser', 'UserController@update')->name('updateUser');
    Route::resource('questions-sets', 'QuestionsSetController');
    Route::post('/questions-sets/{id}/update-questions-sets','QuestionsSetController@update')->name('updateQuestionSets');
    Route::resource('questions','QuestionController');
    Route::post('/questions/{id}/updateQuestions', 'QuestionController@update')->name('updateQuestions');
});
