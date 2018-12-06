<?php

namespace App\Http\Controllers;

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
    public function index_web()
    {
        $courses = Course::all();

        return View::make('courses.index')
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return View::make('courses.create', compact('id', 'categories'));
    }

    public function store(Request $request)
    {
        $course = new Course;
        $user_id = Auth::id();
        $course->name           = Input::get('name');
        $course->description    = Input::get('description');
        $course->price          = 34.55;
        $course->category       = Input::get('category');
        $course->instructor     = $user_id;
        $course->duration       = Input::get('duration');
        $course->requirements   = Input::get('requirements');
        $course->rating         = 0;
        $course->topics         = Input::get('topics');
        $course->save();

        $course->users()->attach($user_id);

        return Redirect::to('user_courses');
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