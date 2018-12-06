<?php

use Illuminate\Http\Request;
use App\Course;

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

Route::resource('courses', 'API\CourseController');
/*
Route::get('courses', function() {
    // If the Content-Type and Accept headers are set to 'application/json',
    // this will return a JSON structure. This will be cleaned up later.
    return Course::all();
});

Route::get('courses/{id}', function($id) {
    return Course::find($id);
});

Route::post('courses', function(Request $request) {
    return Course::create($request->all);
});

Route::put('courses/{id}', function(Request $request, $id) {
    $article = Course::findOrFail($id);
    $article->update($request->all());

    return $article;
});

Route::delete('courses/{id}', function($id) {
    Course::find($id)->delete();

    return 204;
});

Route::get('courses', 'CourseController@index');
Route::get('courses/{course}', 'CourseController@show');
Route::post('courses', 'CourseController@store');
Route::put('courses/{course}', 'CourseController@update');
Route::delete('courses/{course}', 'CourseController@delete');
*/
