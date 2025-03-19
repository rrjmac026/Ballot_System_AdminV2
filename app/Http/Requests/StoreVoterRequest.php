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
            'name' => 'required|string|max:255',
            'student_number' => [
                'required',
                'string',
                'unique:voters,student_number'
            ],
            'email' => [
                'required',
                'email',
                'unique:voters,email'
            ],
            'college_id' => 'required|exists:colleges,college_id',
            'course' => 'required|string|max:255',
            'year_level' => 'required|integer|min:1|max:5',
        ];
    }

    public function messages()
    {
        return [
            'student_number.unique' => 'This student number is already registered.',
            'email.unique' => 'This email address is already registered.',
        ];
    }
}
