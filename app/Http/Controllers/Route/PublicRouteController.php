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
    public function home()
    {
        return view('Pages.Public.HomePage');
    }
    public function login()
    {
        return view('Pages.Public.LoginPage');
    }
    public function register()
    {
        return view('Pages.Public.RegisterPage');
    }
}
