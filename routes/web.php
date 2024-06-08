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
    Route::prefix('/student')->group(function () {
        Route::get('/dashboard', 'App\Http\Controllers\Route\StudentRouteController@dashboard')
            ->name('student.dashboard');
    });
    Route::middleware('role:Student')->group(function () {

    });

});
