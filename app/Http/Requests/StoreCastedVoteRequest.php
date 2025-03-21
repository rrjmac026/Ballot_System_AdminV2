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
            'voter_id' => [
                'required',
                'exists:voters,voter_id',
                // Prevent duplicate votes for same position
                function ($attribute, $value, $fail) {
                    $exists = \App\Models\CastedVote::where('voter_id', $value)
                        ->where('position_id', $this->position_id)
                        ->exists();
                    
                    if ($exists) {
                        $fail('This voter has already voted for this position.');
                    }
                },
            ],
            'position_id' => 'required|exists:positions,position_id',
            'candidate_id' => 'required|exists:candidates,candidate_id',
        ];
    }

    // Remove candidate_id before it hits the controller
    protected function passedValidation()
    {
        $this->merge([
            'voted_at' => now(),
        ]);
    }
}
