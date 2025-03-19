<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePositionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:positions,name,' . $this->position->position_id,
            'organization_id' => 'required|exists:organizations,organization_id',
            'max_winners' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The position name is required.',
            'name.unique' => 'This position name already exists.',
            'organization_id.required' => 'You must select an organization.',
            'organization_id.exists' => 'Selected organization does not exist.',
            'max_winners.required' => 'The number of winners is required.',
            'max_winners.integer' => 'The number of winners must be an integer.',
            'max_winners.min' => 'The number of winners must be at least 1.',
        ];
    }
}
