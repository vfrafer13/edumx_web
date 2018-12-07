<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function courses(Request $request)
    {
        $courses = $request->user()->courses()->get();

        return view('user_courses.index')
            ->with('courses', $courses);
    }
}
