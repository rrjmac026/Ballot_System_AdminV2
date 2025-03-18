<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCollegeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:colleges,name,' . $this->college->college_id,
            'acronym' => 'required|string|max:10|unique:colleges,acronym,' . $this->college->college_id,
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
