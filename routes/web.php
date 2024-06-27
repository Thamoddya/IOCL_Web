<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Route\PublicRouteController@index')
    ->name('landing-page')
    ->middleware('check.first.visit');

Route::get('/home', 'App\Http\Controllers\Route\PublicRouteController@home')
    ->name('home');
Route::get('/courses', 'App\Http\Controllers\Route\PublicRouteController@courses')->name('courses');
Route::get('/course/{id}', 'App\Http\Controllers\Route\PublicRouteController@getCourse')->name('get.course');

Route::get('/login', 'App\Http\Controllers\Route\PublicRouteController@login')
    ->name('login');
Route::get('/register', 'App\Http\Controllers\Route\PublicRouteController@register')
    ->name('register');

Route::prefix('/auth')->group(function () {

    Route::post('/register-process', 'App\Http\Controllers\Auth\AuthController@register')
        ->name('auth.register');

    Route::post('/login-process','App\Http\Controllers\Auth\AuthController@login')
        ->name('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::middleware('role:Student')->group(function () {
        Route::prefix('/student')->group(function () {
            Route::get('/dashboard', 'App\Http\Controllers\Route\StudentRouteController@dashboard')->name('student.dashboard');
            Route::get('/courses', 'App\Http\Controllers\Route\StudentRouteController@courses')->name('student.courses');
            Route::get('/course-details/{id}', 'App\Http\Controllers\Route\StudentRouteController@courseDetails')->name('student.course.details');
            Route::get('/reports', 'App\Http\Controllers\Route\StudentRouteController@reports')->name('student.reports');
            Route::post('/complete-student','App\Http\Controllers\StudentController@store')->name('student.complete');
        });
    });
    Route::middleware('role:Admin')->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/dashboard', 'App\Http\Controllers\Route\AdminRouteController@dashboard')->name('admin.dashboard');
            Route::get('/students', 'App\Http\Controllers\Route\AdminRouteController@students')->name('admin.students');
            Route::get('/courses', 'App\Http\Controllers\Route\AdminRouteController@courses')->name('admin.courses');
            Route::get('/course-videos', 'App\Http\Controllers\Route\AdminRouteController@courseVideos')->name('admin.course.videos');
            Route::get('/add-course', 'App\Http\Controllers\Route\AdminRouteController@addCourse')->name('admin.add.course');
            Route::get('/instructors', 'App\Http\Controllers\Route\AdminRouteController@instructors')->name('admin.instructors');
            Route::get('/add-instructor', 'App\Http\Controllers\Route\AdminRouteController@addInstructor')->name('admin.add.instructor');
            Route::get('/add-student', 'App\Http\Controllers\Route\AdminRouteController@addStudent')->name('admin.add.student');
            Route::post('/store-course','App\Http\Controllers\CourseController@store')->name('courses.store');
        });
    });
    Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/add/{id}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::post('/checkout', [\App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/payment/store', [\App\Http\Controllers\CartController::class, 'store'])->name('payment.store');

    //Logout
    Route::get('/logout', 'App\Http\Controllers\Auth\AuthController@logout')
        ->name('auth.logout');
});
