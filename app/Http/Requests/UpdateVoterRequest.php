<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'sex' => 'required|in:M,F',
            'email' => [
                'required',
                'email',
                'unique:voters,email,' . $this->voter->voter_id . ',voter_id'
            ],
            'student_number' => [
                'required',
                'string',
                'max:20',
                'unique:voters,student_number,' . $this->voter->voter_id . ',voter_id'
            ],
            'college_id' => 'required|exists:colleges,college_id',
            'course' => 'required|string|max:255',
            'year_level' => 'required|integer|between:1,4',
            'status' => 'required|in:Active,Inactive',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'student_number.required' => 'The student number is required.',
            'student_number.unique' => 'This student number is already registered.',
            'email.required' => 'The email address is required.',
            'email.unique' => 'This email is already registered.',
            'college_id.required' => 'Please select a college.',
            'college_id.exists' => 'The selected college does not exist.',
            'year_level.required' => 'Year level is required.',
            'year_level.between' => 'Year level must be between 1 and 4.',
            'status.required' => 'Status is required.',
            'status.in' => 'Status must be either Active or Inactive.',
        ];
    }
}
