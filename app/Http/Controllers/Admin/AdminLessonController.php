<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLessonRequest;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminLessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::latest()->get();

        return view('pages.admin.lessons.index', [
            'lessons' => $lessons
        ]);
    }

    public function create()
    {
        $courses = Course::all();

        if (count($courses) === 0) {
            notify()->error('Courses data is empty!');
            return redirect()->route('admin.courses.create')->with('success', 'Courses data is empty!');
        }

        return view('pages.admin.lessons.create', [
            'courses' => $courses
        ]);
    }

    public function store(AdminLessonRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Lesson::create($data);
        notify()->success('Lesson successfully created!');
        return redirect()->route('admin.lessons.index')->with('success', 'Lesson successfully created!');
    }

    public function show(Lesson $lesson)
    {
        return view('pages.admin.lessons.show', [
            'lesson' => $lesson
        ]);
    }

    public function edit(Lesson $lesson)
    {
        $courses = Course::all();

        return view('pages.admin.lessons.edit', [
            'lesson' => $lesson,
            'courses' => $courses
        ]);
    }

    public function update(AdminLessonRequest $request, Lesson $lesson)
    {
        $data = $request->all();

        if ($request->name !== $lesson->name) {
            $data['slug'] = Str::slug($request->name);
        }

        $lesson->update($data);

        notify()->success('Lesson successfully updated!');
        return redirect()->route('admin.lessons.index')->with('success', 'Lesson successfully updated!');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        notify()->success('Lesson successfully deleted!');
        return redirect()->route('admin.lessons.index')->with('success', 'Lesson successfully deleted!');
    }
}
