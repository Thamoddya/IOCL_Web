<?php

namespace App\Http\Controllers\Route;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PublicRouteController extends Controller
{
    public function index()
    {
        return view('Pages.Public.LandingPage');
    }
}
