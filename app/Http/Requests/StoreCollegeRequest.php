<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCollegeRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Change this if you want authorization logic
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:colleges,name',
            'acronym' => 'required|string|max:10|unique:colleges,acronym',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The college name is required.',
            'name.unique' => 'This college name already exists.',
            'acronym.required' => 'The acronym is required.',
            'acronym.unique' => 'This acronym is already in use.',
        ];
    }
}
