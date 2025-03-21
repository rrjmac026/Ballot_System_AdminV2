<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Modify if you want authentication-based access
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'position_id' => 'required|exists:positions,position_id',
            'partylist_id' => 'required|exists:partylists,partylist_id',
            'college_id' => 'required|exists:colleges,college_id',
            'course' => 'required|string|max:255',
            'platform' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Add this line
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
