<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class InstructorController extends Controller
{

    //Get Instructor By ID
    public function getInstructor($instructor_id)
    {
        $instructor = Instructor::find($instructor_id);
        return response()->json($instructor);
    }

    //Update Instructor
    public function updateInstructor(Request $request)
    {

        $instructor = Instructor::where('iocl_id', $request->instructor_id)->first();
        if ($instructor) {

            $instructor->update([
                'name' => $request->instructor_name,
                'mobile' => $request->instructor_mobile,
                'email' => $request->instructor_email,
                'bio' => $request->instructor_bio
            ]);
            return response()->json(['message' => 'success', "data" => $instructor], 200);
        }


    }

    public function deleteInstructor(Request $request)
    {

        $instructor = Instructor::where('iocl_id', $request->instructor_id)->first();
        if ($instructor) {

            if ($instructor->status_id == "2") {
                $instructor->update([
                    'status_id' => "1",
                ]);
                return response()->json(['message' => 'success', "text" => "Instructor Activated Successfully"], 200);
            } else {
                $instructor->update([
                    'status_id' => "2",
                ]);
                return response()->json(['message' => 'success', "text" => "Instructor Deactivated Successfully"], 200);
            }
        }
        return response()->json(['message' => 'Error Updating Status'], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|size:10|unique:instructors,mobile',
            'email' => 'required|email|unique:instructors,email',
            'nic' => 'required|string|max:20|unique:instructors,nic',
            'bio' => 'required|string',
            'profile_image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imagePath = 'profile/' . $request->nic . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('profile'), $imagePath);
        }
        $ioclID = Instructor::generateUniqueIoclId();
        $instructor = Instructor::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'nic' => $request->nic,
            'bio' => $request->bio,
            'img_path' => $imagePath,
            'iocl_id'=>$ioclID,
        ]);

        return response()->json(['message' => 'success'], 201);
    }
}
