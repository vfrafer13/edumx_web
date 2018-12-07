<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index');

Route::resource('courses', 'CourseController');
Route::resource('users', 'UserController');

Route::get('my/courses', 'UserController@courses')
    ->name('users.courses')
    ->middleware('auth');

Route::get('my/courses/{course}', 'CourseController@show')
    ->name('users.courses.show')
    ->middleware('auth');


Route::post('courses/{course}/buy', 'CourseController@buy')
    ->name('courses.buy')
    ->middleware('auth');


Route::get('categories/{id}', 'CategoryController@index');
