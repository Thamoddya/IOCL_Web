<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/getInstructor/{id}', 'App\Http\Controllers\InstructorController@getInstructor')->name('get.Instructor');
Route::post('/updateInstructor', 'App\Http\Controllers\InstructorController@updateInstructor')->name('update.Instructor');
Route::post('/deleteInstructor', 'App\Http\Controllers\InstructorController@deleteInstructor')->name('delete.Instructor');
Route::post('/instructor/store', [\App\Http\Controllers\InstructorController::class, 'store'])->name('instructor.store');
Route::post('/getStudent/{id}', [\App\Http\Controllers\StudentController::class, 'findStudent'])->name('student.find');
Route::post('/course/stateChange', [\App\Http\Controllers\CourseController::class, 'updateStatus'])->name('course.status.update');
Route::post('/getCourseDetails/{id}', [\App\Http\Controllers\CourseController::class, 'getCourseDetails'])->name('course.details');
Route::post('/course/addVideo', [\App\Http\Controllers\CourseVideoController::class, 'upload'])->name('upload.video');
Route::get('/search-courses', [\App\Http\Controllers\CourseController::class, 'search'])->name('search.courses');
Route::post('/upload-material', [\App\Http\Controllers\CourseController::class, 'uploadMaterial'])->name('upload.material');
Route::post('/updateCourseDetails', [\App\Http\Controllers\CourseController::class, 'updateCourseDetails'])->name('update.course');
