<?php

namespace App\Http\Controllers\Route;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentRouteController extends Controller
{
    public function dashboard()
    {

        return view('Pages.Student.StudentHomePage');
    }
}
