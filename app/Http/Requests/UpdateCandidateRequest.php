<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'position_id' => [
                'required',
                'exists:positions,position_id',
                Rule::unique('candidates')->where(function ($query) {
                    return $query->where('first_name', $this->first_name)
                                ->where('middle_name', $this->middle_name)
                                ->where('last_name', $this->last_name);
                })->ignore($this->candidate->candidate_id, 'candidate_id')
            ],
            'partylist_id' => 'required|exists:partylists,partylist_id',
            'college_id' => 'required|exists:colleges,college_id',
            'course' => 'required|string|max:255',
            'platform' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
            'position_id.unique' => 'This candidate is already running for a different position.',
        ];
    }
}
