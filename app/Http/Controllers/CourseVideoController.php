<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;

class CourseVideoController extends Controller
{
    public function upload(Request $request)
    {
        //Get Course by course no
        $course = Course::where("course_no", $request->input('course_id'))->first();
        if (!$course) {
            return response()->json(['error' => 'Course not found.','course_no'=>$request->input('course_id')], 200);
        };

        if ($request->file('video_file')) {
            // Handle the file upload
            $file = $request->file('video_file');
            $path = 'course/videos/' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('course/videos/'), $path);

            CourseVideo::create([
                'course_id' => $course->course_id,
                'video_path' => $path,
                'video_title' => $request->input('video_title'),
                'video_description' => $request->input('video_description'),
                'status_id' => 1,
            ]);

            return response()->json(['message' => 'success']);
        }

        return response()->json(['error' => 'Video upload failed.'], 500);
    }
}
