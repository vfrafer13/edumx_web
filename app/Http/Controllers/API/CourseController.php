<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Course;
use View;
use Input;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json(Course::all());
    }

    public function category($category_id)
    {
        $courses = Course::where('category', $category_id)->get();
        return response()->json($courses);
    }


    public function show(Course $course)
    {
        return $course;
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());

        return response()->json($course, 200);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json(null, 204);
    }

    public function buy(Course $course)
    {
        $user_id = Auth::id();

        if (!$course->users()->find($user_id)) {
            $course->users()->attach($user_id);
        }

        return response()->json(null, 200);
    }
}