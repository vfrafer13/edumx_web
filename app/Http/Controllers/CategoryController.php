<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Http\Requests;
use View;
use Input;

class CategoryController
{
    public function index(int $id)
    {
        $cat_courses = Course::where('category', $id)->get();
        $cat = Category::find($id);

        return View::make('categories.index')
            ->with('cat_courses', $cat_courses)
            ->with('cat', $cat);
    }
}