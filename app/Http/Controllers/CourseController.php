<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseMaterial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function store(Request $request)
    {
        $course_no = "C" . rand(100000, 999999);
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'total_price' => 'required|numeric',
            'expire_date' => 'required|date',
            'instructor_id' => 'required|integer|exists:instructors,instructor_id',
            'category_id' => 'required|integer|exists:categories,category_id',
            'course_image' => 'required|image|max:2048',
        ]);
        if ($validator->fails()) {return redirect()->back()->withErrors($validator)->withInput();}
        $image = $request->file('course_image');
        $imagePath = 'course/main/' . $course_no . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('course/main/'), $imagePath);
        $expireDateInput = $request->input('expire_date');
        try {
            $expireDate = \DateTime::createFromFormat('l d F Y', $expireDateInput);
            if (!$expireDate) {throw new \Exception("Invalid date format");}
            $expireDateFormatted = $expireDate->format('Y-m-d');
        } catch (\Exception $e) {return redirect()->back()->withErrors(['expire_date' => 'Invalid date format'])->withInput();}
        $course = Course::create(['course_no' => $course_no, 'title' => $request->input('title'), 'description' => $request->input('description'), 'price' => $request->input('price'), 'total_price' => $request->input('total_price'), 'expire_date' => $expireDate, 'instructor_id' => $request->input('instructor_id'), 'category_id' => $request->input('category_id'),
            'image_path' => $imagePath,
            'status_id' => 2
        ]);
        return redirect()->route('admin.courses')->with('success', 'Course created successfully.');
    }

    public function updateStatus(Request $request){
        $course_no = $request->course_no;
        $course = Course::where('course_no', $course_no)->first();
        if ($course) {
            if ($course->status_id == "2") {$course->update(['status_id' => "1",]);
                return response()->json(['message' => 'success', "text" => "Course Activated Successfully"], 200);
            } else {
                $course->update(['status_id' => "2",]);
                return response()->json(['message' => 'success', "text" => "Course Deactivated Successfully"], 200);
            }
        }return response()->json(['message' => 'Error Updating Course Status'], 200);
    }
    public function getCourseDetails($course_id)
    {
        $course = Course::where('course_id', $course_id)->with(['instructor', 'category'])->first();
        if ($course) {
            $response = [
                'course_no' => $course->course_no,
                'title' => $course->title,
                'description' => $course->description,
                'price' => $course->price,
                'total_price' => $course->total_price,
                'expire_date' => $course->expire_date,
                'status_id' => $course->status_id,
                'instructor' => $course->instructor->name,
                'category' => $course->category->name,
                'image_path' => $course->image_path,
                'studentCount' => $course->students->count(),
                'videoCount' => $course->videos->count(),
                'courseMaterialCount' => $course->courseMaterial->count(),
                'totalEarned' => $course->totalEarned->sum('total_paid'),
                'videos' => $course->videos,
            ];
            return response()->json(['message' => 'success', 'course' => $response], 200);
        }
        return response()->json(['message' => 'Course Not Found'], 200);
    }
    public function search(Request $request){
        $query = $request->get('query');
        $courses = Course::where('title', 'LIKE', "%{$query}%")->orWhere('description', 'LIKE', "%{$query}%")->get();
        return response()->json($courses);}
    public function uploadMaterial(Request $request){
        $course_no = $request->course_id;
        $course = Course::where('course_id', $course_no)->first();
        if ($course) {
            $materialPath = null;
            if ($request->hasFile('doc')) {
                $material = $request->file('doc');
                $materialPath = 'course/material/' . $course_no.uniqid() . '.' . $material->getClientOriginalExtension();
                $material->move(public_path('course/material/'), $materialPath);
            }
            CourseMaterial::create(['course_id' => $course_no, 'material_title' => $request->title, 'material_yt_link' => $request->yt_link, 'material_doc_path' => $materialPath, 'status_id' => 1,]);
            return response()->json(['message' => 'success', 'text' => 'Material Uploaded Successfully'], 200);
        }
        return response()->json(['message' => 'error', 'text' => 'Course Not Found'], 200);
    }
    public function updateCourseDetails(Request $request){
        $course_no = $request->course_no;
        $course = Course::where('course_no', $course_no)->first();
        if ($course) {
            $course->update(['title' => $request->title, 'description' => $request->description, 'price' => $request->price, 'total_price' => $request->total_price, 'expire_date' => $request->expire_date, 'instructor_id' => $request->instructor_id, 'category_id' => $request->category_id,]);
            return response()->json(['message' => 'success', 'text' => 'Course Updated Successfully'], 200);
        }
        return response()->json(['message' => 'error', 'text' => 'Course Not Found'], 200);
    }
}
