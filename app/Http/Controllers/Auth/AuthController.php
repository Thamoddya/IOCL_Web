<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterStudentRequest;
use App\Mail\StudentRegisterMail;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(RegisterStudentRequest $request)
    {
        $studentData = $request->validated();
        $ioclId = User::generateUniqueIoclId();
        $student = User::create([
            'iocl_id' => $ioclId,
            'firstName' => $studentData['REG_FirstName'],
            'lastName' => $studentData['REG_LastName'],
            'email' => $studentData['REG_Email'],
            'mobile_no' => $studentData['REG_Mobile'],
            'password' => Hash::make($studentData['REG_Password']),
            'status_id' => 1
        ]);
        $student->assignRole('Student');
        // Send email
        Mail::to($student->email)->send(new StudentRegisterMail($student));
        return redirect()->back()->with('success', 'Registration successful');
    }
    public function login(Request $request){
        $studentData = json_decode($request->getContent(), true);
        if (auth()->attempt(['email' => $studentData['LOG_Email'], 'password' => $studentData['LOG_Password']])) {
            $token = auth()->user()->createToken('authToken')->plainTextToken;
            $student = auth()->user();
            $roleName = $student->getRoleNames();
            return response()->json(
                ['attempt' => 'success', 'token' => $token, 'student' => $student, 'role'=> $roleName], 200);
        };
        return response()->json(['attempt' => 'failed']);
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        //Remove all sessions and clean the project
        auth()->logout();
        return redirect()->route('login');
    }
}
