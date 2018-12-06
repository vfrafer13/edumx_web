<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Course;
use App\User;
use View;
use Input;
use Illuminate\Support\Facades\Auth;

class UserCourseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index_web()
    {
        $id = Auth::id();

        $courses = Course::where('instructor', $id)->get();

        return View::make('user_courses.index')
            ->with('courses', $courses);
    }

    public function index()
    {
        return Course::all();
    }

    public function show_web($id)
    {
        $course = Course::find($id);

        return View::make('courses.show')
            ->with('course', $course);
    }

    public function show(Course $course)
    {
        return $course;
    }

    public function store(Request $request)
    {
        $course = Course::create($request->all());

        return response()->json($course, 201);
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