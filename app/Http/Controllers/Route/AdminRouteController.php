<?php

namespace App\Http\Controllers\Route;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Instructor;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminRouteController extends Controller{
    public function dashboard(){
        $admin = auth()->user();
        $totalTransactionPriceSum = Transaction::where('created_at', '>=', now()->startOfMonth())->sum('total_paid');
        $getTotalStudentsCount = User::role('Student')->count();
        $studentsCreatedThisMonth = User::role('Student')->where('created_at', '>=', Carbon::now()->startOfMonth())->count();
        $getAllCourseCount = Course::count();
        return view('Pages.Admin.Pages.AdminHome',compact(['admin', 'totalTransactionPriceSum','getTotalStudentsCount', 'studentsCreatedThisMonth', 'getAllCourseCount']));}
    public function students(){
        $admin = auth()->user();
        $students = User::role('Student')->with('studentDetails')->get();
        return view('Pages.Admin.Pages.AdminStudents',compact(['admin', 'students']));}
    public function courses(){
        $admin = auth()->user();
        $courses = Course::all();
        return view('Pages.Admin.Pages.AdminCourses',compact(['admin', 'courses']));}
    public function courseVideos(){
        $admin = auth()->user();
        $courses = Course::all();
        return view('Pages.Admin.Pages.AdminCourseVideos',compact(['admin', 'courses']));}
    public function instructors(){
        $admin = auth()->user();
        $instructors = Instructor::all();
        return view('Pages.Admin.Pages.AdminInstructors',compact(['admin', 'instructors']));}
    public function addInstructor()
    {
        $admin = auth()->user();
        return view('Pages.Admin.Pages.AdminAddInstructor',compact([
            'admin',
        ]));
    }
    public function addStudent()
    {
        $admin = auth()->user();
        return view('Pages.Admin.Pages.AdminAddStudent',compact([
            'admin',
        ]));
    }
    public function addCourse()
    {
        $instructors = Instructor::all();
        $categories = Category::all();
        $admin = auth()->user();
        return view('Pages.Admin.Pages.AdminAddCourse',compact([
            'admin',
            'instructors',
            'categories'
        ]));
    }

}
