<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'partylist_id' => 'nullable|exists:partylists,partylist_id',
            'organization_id' => 'required|exists:organizations,organization_id',
            'position_id' => 'required|exists:positions,position_id',
            'college_id' => 'required|exists:colleges,college_id',
            'course' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'The first name is required.',
            'last_name.required' => 'The last name is required.',
            'organization_id.required' => 'You must select an organization.',
            'position_id.required' => 'You must select a position.',
            'college_id.required' => 'You must select a college.',
            'partylist_id.exists' => 'Selected partylist does not exist.',
        ];
    }
}
