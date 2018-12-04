<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use View;
use Input;

class CategoryController
{
    public function show(int $id)
    {
        $cat_courses = DB::table('courses')->where('category', '==', $id)->get();

        return View::make('category.index')
            ->with('cat_courses', $cat_courses);
    }
}