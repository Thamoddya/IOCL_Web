<?php

namespace App\Http\Controllers\Route;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Course;
use App\Models\StudentEnrolledCourse;
use Illuminate\Http\Request;

class StudentRouteController extends Controller
{
    public function dashboard()
    {
        $student = auth()->user();
        $enrolledCourseCount = $student->courses->count();
        $enrolledActiveCourses = $student->courses->where('status_id', 1)->count();

        $studentCompletedCourses = StudentEnrolledCourse::where('user_id', $student->user_id)
            ->where('completed', 1)
            ->count();
        $cities = City::all();
        return view('Pages.Student.Pages.StudentHomePage', compact([
            'student',
            'enrolledCourseCount',
            'enrolledActiveCourses',
            'studentCompletedCourses',
            'cities'
        ]));
    }

    public function courses(){
        $student = auth()->user();
        $courses = $student->courses;
        return view('Pages.Student.Pages.StudentAllCourses', compact([
            'courses',
            'student'
        ]));
    }

    public function courseDetails($id)
    {
        $student = auth()->user();
        //Get Course
        $course = Course::where('course_no', $id)->first();
        //check Course is enrolled
        $isEnrolled = $student->courses->contains($course->course_id);
        if (!$isEnrolled) {
            return redirect()->route('student.courses');
        }else{
            $enrollDetails = StudentEnrolledCourse::where('user_id', $student->user_id)
                ->where('course_id', $course->course_id)
                ->first();
            $videos = $course->videos;
            $materials = $course->courseMaterial;
            return view('Pages.Student.Pages.StudentCourse', compact([
                'course',
                'student',
                'enrollDetails',
                'videos',
                'materials'
            ]));
        }

    }

    public function reports()
    {
        $student = auth()->user();
        $transactions = $student->transactions;
        return view('Pages.Student.Pages.StudentReports', compact([
            'transactions',
            'student'
        ]));
    }

}
