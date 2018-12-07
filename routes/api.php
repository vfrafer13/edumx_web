<?php

use Illuminate\Http\Request;

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

Route::resource('courses', 'API\CourseController');
Route::get('category/{category}', 'API\CourseController@category');

Route::post('login', 'API\UserController@login');


Route::middleware('auth:api')->group( function () {
    Route::post('logout', 'API\UserController@logout');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('my/courses', 'API\UserController@courses');

    Route::post('courses/{course}/buy', 'API\CourseController@buy');
});

