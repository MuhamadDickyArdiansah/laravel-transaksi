<?php

namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCourseRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->get();

        return view('pages.admin.courses.index', [
            'courses' => $courses
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        if (count($categories) === 0) {
            notify()->error('Categories data is empty!');
            return redirect()->route('admin.categories.create')->with('success', 'Categories data is empty!');
        }

        return view('pages.admin.courses.create', [
            'categories' => $categories
        ]);
    }

    public function store(AdminCourseRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->file('image')) {
            $image_file = $request->file('image');
            $image_name = time() . "_" . $image_file->getClientOriginalName();
            $image_file->move(public_path('assets/images/courses'), $image_name);
            $data['image'] = $image_name;
        }

        Course::create($data);
        notify()->success('Layanan berhasil dibuat!');
        return redirect()->route('admin.courses.index')->with('success', 'Layanan berhasil dibuat!');
    }

    public function show(Course $course)
    {
        return view('pages.admin.courses.show', [
            'course' => $course
        ]);
    }

    public function edit(Course $course)
    {
        $categories = Category::all();

        return view('pages.admin.courses.edit', [
            'course' => $course,
            'categories' => $categories
        ]);
    }

    public function update(AdminCourseRequest $request, Course $course)
    {
        $data = $request->all();

        if ($request->name !== $course->name) {
            $data['slug'] = Str::slug($request->name);
        }

        if ($request->file('image')) {
            if ($course->image !== null) {
                unlink(public_path('assets/images/courses/' . $course->image));
            }

            $image_file = $request->file('image');
            $image_name = time() . "_" . $image_file->getClientOriginalName();
            $image_file->move(public_path('assets/images/courses'), $image_name);
            $data['image'] = $image_name;
        }

        $course->update($data);
        notify()->success('Layanan berhasil diubah!');
        return redirect()->route('admin.courses.index')->with('success', 'Layanan berhasil diubah!');
    }

    public function destroy(Course $course)
    {
        if ($course->image !== null) {
            unlink(public_path('assets/images/courses/' . $course->image));
        }

        $course->delete();
        notify()->success('Layanan berhasil dihapus!');
        return redirect()->route('admin.courses.index')->with('success', 'Layanan berhasil dihapus!');
    }
}
