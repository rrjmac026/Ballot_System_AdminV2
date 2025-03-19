<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCastedVoteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'voter_id' => 'required|exists:voters,voter_id',
            'candidate_id' => 'required|exists:candidates,candidate_id',
            'position_id' => 'required|exists:positions,position_id',
            'election_type' => 'required|string|in:SSC,SBO',
        ];
    }

    public function messages()
    {
        return [
            'voter_id.required' => 'Voter selection is required.',
            'voter_id.exists' => 'Selected voter does not exist.',
            'candidate_id.required' => 'Candidate selection is required.',
            'candidate_id.exists' => 'Selected candidate does not exist.',
            'position_id.required' => 'Position selection is required.',
            'position_id.exists' => 'Selected position does not exist.',
            'election_type.required' => 'Election type is required.',
            'election_type.in' => 'Election type must be either SSC or SBO.',
        ];
    }
}
