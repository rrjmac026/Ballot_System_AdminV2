<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrganizationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:organizations,name,' . $this->organization->organization_id,
            'description' => 'nullable|string|max:500',
            'college_id' => 'required|exists:colleges,college_id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The organization name is required.',
            'name.unique' => 'This organization name already exists.',
            'college_id.required' => 'You must select a college.',
            'college_id.exists' => 'Selected college does not exist.',
        ];
    }
}
