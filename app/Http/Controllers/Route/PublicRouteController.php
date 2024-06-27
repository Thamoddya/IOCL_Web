<?php

namespace App\Http\Controllers\Route;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\StudentEnrolledCourse;
use Illuminate\Http\Request;

class PublicRouteController extends Controller
{
    public function index()
    {
        return view('Pages.Public.LandingPage');
    }
    public function home(){
        $userId = auth()->user() ? auth()->user()->id : null;
        $courses = Course::orderBy('created_at', 'desc')->where('status_id', 1)
            ->where('expire_date', '>', now())
            ->take(4)
            ->get();
        foreach ($courses as $course) {
            $course->is_enrolled = $userId ? StudentEnrolledCourse::where('course_id', $course->id)->where('user_id', $userId)
                ->exists() : false;
        }
        return view('Pages.Public.HomePage', compact('courses'));
    }
    public function login(){return view('Pages.Public.LoginPage');}
    public function register()
    {
        return view('Pages.Public.RegisterPage');
    }

    public function getCourse($id)
    {
        $userId = auth()->id();

        $course = Course::where("course_no", $id)->first();

        if (!$course) {
            return redirect()->route('home');
        }
        $course->is_enrolled = $course->isEnrolledByUser($userId);

        return view('Pages.Public.CourseDetails', compact('course'));
    }

    public function courses(Request $request){
        $userId = auth()->id();
        $query = Course::where('status_id', 1)->where('expire_date', '>', now());
        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }
        if ($request->filled('min_price')) {
            $query->where('total_price', '>=', $request->input('min_price'));
        }
        if ($request->filled('max_price')) {
            $query->where('total_price', '<=', $request->input('max_price'));
        }
        $courses = $query->paginate(10); // Adjust the number as per your requirement
        foreach ($courses as $course) {
            $course->is_enrolled = $course->isEnrolledByUser($userId);
        }
        $categories = Category::all();
        return view('Pages.Public.Courses', compact('courses', 'categories'));
    }


}
