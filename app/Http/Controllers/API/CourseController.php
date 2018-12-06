<?php

namespace App\Http\Controllers\API;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Course;
use App\Category;
use View;
use Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CourseController
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


    public function show(Course $course)
    {
        return $course;
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());

        return response()->json($course, 200);
    }

    public function delete(Course $course)
    {
        $course->delete();

        return response()->json(null, 204);
    }
}