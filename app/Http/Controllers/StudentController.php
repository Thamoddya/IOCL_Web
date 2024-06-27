<?php

namespace App\Http\Controllers;

use App\Models\StudentDetail;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function findStudent(Request $request)
    {
        $iocl_Id = $request->id;
        $student = User::where('iocl_id', $iocl_Id)->with(['studentDetails', 'studentDetails.city'])
            ->first();
        return response()->json($student);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'profileImage' => 'required',
            'cityID' => 'required|exists:cities,city_id',
            'addressLine1' => 'required|string|max:255',
            'addressLine2' => 'nullable|string|max:255',
            'addressLine3' => 'nullable|string|max:255',
        ]);

        $student = auth()->user();

        if ($request->hasFile('profileImage')) {
            $profileImage = $request->file('profileImage');
            $profileImagePath = 'systemUploads/profileImages/' . $student->iocl_id . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('systemUploads/profileImages/'), $profileImagePath);
        }

        // Store user data
        $student->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'profile_pic_path' => $profileImagePath,
        ]);

        // Store student details data
        StudentDetail::create([
            'user_id' => $student->user_id,
            'address_line_1' => $request->addressLine1,
            'address_line_2' => $request->addressLine2,
            'address_line_3' => $request->addressLine3,
            'city_id' => $request->cityID,
        ]);

        return redirect()->back()->with('success', 'Student details saved successfully');
    }
}
