<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'student_number' => 'required|string|max:20|unique:voters,student_number',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'email' => 'required|email|unique:voters,email',
            'password' => 'required|string|min:6|confirmed',
            'college_id' => 'required|exists:colleges,college_id',
            'course' => 'nullable|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ];
    }

    public function messages()
    {
        return [
            'student_number.required' => 'The student number is required.',
            'student_number.unique' => 'This student number already exists.',
            'email.required' => 'The email address is required.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'A password is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'college_id.required' => 'You must select a college.',
            'college_id.exists' => 'Selected college does not exist.',
            'status.required' => 'Voter status is required.',
            'status.in' => 'Voter status must be either Active or Inactive.',
        ];
    }
}
