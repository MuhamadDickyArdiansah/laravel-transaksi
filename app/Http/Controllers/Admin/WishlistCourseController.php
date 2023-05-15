<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistCourseController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->with('course')->latest()->get();

        return view('pages.admin.wishlists.index', [
            'wishlists' => $wishlists
        ]);
    }

    public function store(Course $course)
    {
        $wishlists = Wishlist::where('user_id', auth()->user()->id)->where('course_id', $course->id)->latest()->get();

        if (count($wishlists) === 0) {
            Wishlist::create([
                'course_id' => $course->id,
                'user_id' => auth()->user()->id
            ]);
            notify()->success('Layanan berhasil dipesan!');
        }
        return redirect()->route('courses.show', [$course->slug]);
    }

    public function destroy(Course $course)
    {
        $course->wishlist->delete();
        notify()->success('Layanan sudah selesai!');
        return redirect()->route('courses.index')->with('success', 'Layanan sudah selesai!');
    }
}
