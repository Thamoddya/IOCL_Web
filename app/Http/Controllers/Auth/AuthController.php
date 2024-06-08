<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterStudentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterStudentRequest $request)
    {
        $studentData = $request->validated();

        //Generate IOCL ID
        $ioclId = User::generateUniqueIoclId();

        $student = User::create([
            'iocl_id' => $ioclId,
            'firstName' => $studentData['REG_FirstName'],
            'lastName' => $studentData['REG_LastName'],
            'email' => $studentData['REG_Email'],
            'mobile_no' => $studentData['REG_Mobile'],
            'password' => bcrypt($studentData['REG_Password']),
            'status_id' => 1
        ]);
        $student->assignRole('Student');

        return redirect()->back()->with('success', 'Registration successful');

    }
}
