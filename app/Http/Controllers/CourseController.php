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

    public function index()
    {
        $courses = Course::all();

        return view('courses.index')
            ->with('courses', $courses);
    }

    public function show(Course $course)
    {
        return view('courses.show')
            ->with('course', $course);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('courses.create', compact('id', 'categories'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();

        $course = new Course;
        $course->name           = $request->input('name');
        $course->description    = $request->input('description');
        $course->price          = $request->input('price', 0);
        $course->category       = $request->input('category');
        $course->instructor     = $user_id;
        $course->duration       = $request->input('duration');
        $course->requirements   = $request->input('requirements');
        $course->rating         = $request->input('rating', 0);
        $course->topics         = $request->input('topics');
        $course->save();

        $course->users()->attach($user_id);

        return Redirect::to('user_courses');
    }

    public function edit(Course $course)
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('courses.edit', compact('course', 'categories'));
    }

    public function update(Request $request, Course $course)
    {
        $course->update($request->all());

        return redirect()->route('courses.show', ['course' => $course->id]);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect('user_courses');
    }
}