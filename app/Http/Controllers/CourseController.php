<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(6)->withQueryString();

        return view('pages.base.courses.index', [
            'courses' => $courses
        ]);
    }

    public function show(Course $course)
    {
        return view('pages.base.courses.show', [
            'course' => $course
        ]);
    }

    public function lesson(Course $course, Lesson $lesson)
    {
        $latest_lesson = Lesson::latest()->first();

        return view('pages.base.courses.lesson', [
            'course' => $course,
            'lesson' => $lesson,
            'next_lesson_slug' => $lesson->next,
            'prev_lesson_slug' => $lesson->previous,
            'latest_lesson' => $latest_lesson
        ]);
    }
}
