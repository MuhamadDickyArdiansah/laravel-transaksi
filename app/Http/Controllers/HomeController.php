<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->limit(3)->get();

        return view('pages.base.home', [
            'courses' => $courses
        ]);
    }
}
