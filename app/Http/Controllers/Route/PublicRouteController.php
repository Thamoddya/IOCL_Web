<?php

namespace App\Http\Controllers\Route;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class PublicRouteController extends Controller
{
    public function index()
    {
        return view('Pages.Public.LandingPage');
    }
    public function home()
    {
        //Get Latest 4 courses
        $courses = Course::orderBy('created_at', 'desc')
            ->where('status_id', 1)
            ->where('expire_date', '>', now())
            ->take(4)
            ->get();
        return view('Pages.Public.HomePage', compact('courses'));
    }
    public function login()
    {
        return view('Pages.Public.LoginPage');
    }
    public function register()
    {
        return view('Pages.Public.RegisterPage');
    }

    public function getCourse($id)
    {
        $course = Course::where("course_no",$id)->first();

        if(!$course){
            return redirect()->route('home');
        }

        return view('Pages.Public.CourseDetails', compact('course'));
    }
}
