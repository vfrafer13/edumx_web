<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Course;
use View;
use Input;

class CourseController
{
    public function index()
    {
        return Course::all();
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