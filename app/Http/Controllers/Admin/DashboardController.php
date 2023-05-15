<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $courses_count = Course::count();
        $users_count = User::where('role', 'user')->count();

        return view('pages.admin.dashboard', [
            'courses_count' => $courses_count,
            'users_count' => $users_count
        ]);
    }
}
