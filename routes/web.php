<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminLessonController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\Admin\UpdateProfileController;
use App\Http\Controllers\Admin\WishlistCourseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::middleware('guest')->group(function () {
  Route::get('/register', [RegisterController::class, 'index'])->name('register');
  Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
  Route::get('/login', [LoginController::class, 'index'])->name('login');
  Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});


Route::middleware('auth')->group(function () {
  Route::post('/logout', LogoutController::class)->name('logout');

  Route::middleware('is_join_course')->group(function () {
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/courses/{course}/{lesson}', [CourseController::class, 'lesson'])->name('courses.lesson');

    Route::delete('/courses/{course}', [WishlistCourseController::class, 'destroy'])->name('my-course.destroy');
  });

  Route::post('/courses/{course}', [WishlistCourseController::class, 'store'])->name('my-course.store');

  Route::get('/profile', [UpdateProfileController::class, 'show'])->name('profile.show');
  Route::get('/profile/edit', [UpdateProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile/edit', [UpdateProfileController::class, 'update'])->name('profile.update');

  Route::get('/my-course', [WishlistCourseController::class, 'index'])->name('my-course.index');

  Route::middleware('is_admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/courses', AdminCourseController::class);
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/lessons', AdminLessonController::class);

    Route::get('/manage-users', [ManageUserController::class, 'index'])->name('manage-users.index');
    Route::get('/manage-users/{user}', [ManageUserController::class, 'show'])->name('manage-users.show');
    Route::get('/manage-users/{user}/edit', [ManageUserController::class, 'edit'])->name('manage-users.edit');
    Route::patch('/manage-users/{user}/edit', [ManageUserController::class, 'update'])->name('manage-users.update');
    Route::delete('/manage-users/{user}', [ManageUserController::class, 'destroy'])->name('manage-users.destroy');
  });
});
