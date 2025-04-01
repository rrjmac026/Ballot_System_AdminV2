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
            'votes' => 'required|array',
            'votes.*.position_id' => [
                'required',
                'exists:positions,position_id',
                function ($attribute, $value, $fail) {
                    $index = explode('.', $attribute)[1];
                    $exists = \App\Models\CastedVote::where('voter_id', $this->voter_id)
                        ->where('position_id', $value)
                        ->exists();
                    
                    if ($exists) {
                        $fail("You have already voted for this position.");
                    }
                },
            ],
            'votes.*.candidate_id' => 'required|exists:candidates,candidate_id',
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
