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

Route::resource('courses', 'CourseController');
Route::resource('users', 'UserController');

Auth::routes();

Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index');

Route::get('categories/{id}', 'CategoryController@index');
// Route::get('courses/', 'CourseController@index_web');
// Route::get('courses/{id}', 'CourseController@show_web');
Route::get('user_courses/', 'UserCourseController@index_web');