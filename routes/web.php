<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Route\PublicRouteController@index')
    ->name('landing-page')
    ->middleware('check.first.visit');

Route::get('/home', 'App\Http\Controllers\Route\PublicRouteController@home')
    ->name('home');

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
            Route::get('/dashboard', 'App\Http\Controllers\Route\StudentRouteController@dashboard')
                ->name('student.dashboard');

        });
    });

    Route::middleware('role:Admin')->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/dashboard', 'App\Http\Controllers\Route\AdminRouteController@dashboard')
                ->name('admin.dashboard');
            Route::get('/students', 'App\Http\Controllers\Route\AdminRouteController@students')
                ->name('admin.students');
            Route::get('/courses', 'App\Http\Controllers\Route\AdminRouteController@courses')
                ->name('admin.courses');
            Route::get('/course-videos', 'App\Http\Controllers\Route\AdminRouteController@courseVideos')
                ->name('admin.course.videos');
            Route::get('/add-course', 'App\Http\Controllers\Route\AdminRouteController@addCourse')
                ->name('admin.add.course');
            Route::get('/instructors', 'App\Http\Controllers\Route\AdminRouteController@instructors')
                ->name('admin.instructors');
            Route::get('/add-instructor', 'App\Http\Controllers\Route\AdminRouteController@addInstructor')
                ->name('admin.add.instructor');
            Route::get('/add-student', 'App\Http\Controllers\Route\AdminRouteController@addStudent')
                ->name('admin.add.student');


            Route::post('/store-course','App\Http\Controllers\CourseController@store')
                ->name('courses.store');

        });
    });

});
