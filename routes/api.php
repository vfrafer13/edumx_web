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

Route::resource('categories', 'API\CategoryController');

Route::post('login', 'API\UserController@login');

Route::post('upload', 'API\UploadController@upload');

Route::delete('course/{course}/cover', 'API\UploadController@deleteCover');
Route::delete('course/{course}/file', 'API\UploadController@deleteFile');

Route::middleware('auth:api')->group( function () {
    Route::post('logout', 'API\UserController@logout');

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('my/courses', 'API\UserController@courses');

    Route::post('courses/{course}/buy', 'API\CourseController@buy');


    Route::get('paypal/client_token', 'API\PayPal\PayPalController@clientToken');

    Route::post('paypal/checkout', 'API\PayPal\PayPalController@checkout');
});

