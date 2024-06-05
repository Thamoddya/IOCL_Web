<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\Route\PublicRouteController@index')
    ->name('landing-page');
