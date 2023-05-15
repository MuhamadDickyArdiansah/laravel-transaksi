<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(6)->withQueryString();

        return view('pages.base.categories.index', [
            'categories' => $categories
        ]);
    }

    public function show(Category $category)
    {
        $courses = Course::where('category_id', $category->id)->latest()->paginate(6)->withQueryString();

        return view('pages.base.categories.show', [
            'category' => $category,
            'courses' => $courses
        ]);
    }
}
