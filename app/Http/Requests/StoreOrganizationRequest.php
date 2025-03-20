<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrganizationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:organizations,name',
            'college_id' => 'nullable|exists:colleges,college_id',
            'description' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.unique' => 'This organization name already exists.',
            'college_id.exists' => 'The selected college does not exist.',
        ];
    }
}
