<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function findStudent(Request $request)
    {
        $iocl_Id = $request->id;
        $student = User::where('iocl_id', $iocl_Id)->with(['studentDetails','studentDetails.city'])
            ->first();
        return response()->json($student);
    }
}
