<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "REG_FirstName" => "required|string",
            "REG_LastName" => "required|string",
            "REG_Email" => "required|email|unique:users,email",
            "REG_Mobile" => "required|numeric|digits:10|unique:users,mobile_no",
            "REG_Password" => "required|string|min:8",
            "REG_ConfirmPassword" => "required|string|same:REG_Password",
            "REG_Terms" => "required|accepted"
        ];
    }

    public function messages(): array
    {
        return [
            "REG_FirstName.required" => "First name is required",
            "REG_LastName.required" => "Last name is required",
            "REG_Email.required" => "Email is required",
            "REG_Email.email" => "Email is invalid",
            "REG_Email.unique" => "Email is already registered",
            "REG_Mobile.required" => "Mobile number is required",
            "REG_Mobile.numeric" => "Mobile number must be a number",
            "REG_Mobile.digits" => "Mobile number must be 10 digits",
            "REG_Mobile.unique" => "Mobile number is already registered",
            "REG_Password.required" => "Password is required",
            "REG_Password.min" => "Password must be at least 8 characters",
            "REG_ConfirmPassword.required" => "Confirm password is required",
            "REG_ConfirmPassword.same" => "Password and confirm password must match",
            "REG_Terms.required" => "You must agree to the terms and conditions",
            "REG_Terms.accepted" => "You must agree to the terms and conditions"
        ];
    }
}
