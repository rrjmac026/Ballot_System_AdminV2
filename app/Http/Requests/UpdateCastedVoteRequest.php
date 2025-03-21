<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCastedVoteRequest extends FormRequest
{
    public function authorize()
    {
        // Generally, votes should not be editable after being cast
        return false;
    }

    public function rules()
    {
        return [
            'voter_id' => 'required|exists:voters,voter_id',
            'position_id' => 'required|exists:positions,position_id',
            'election_type' => 'required|in:Regular,Special',
        ];
    }
}
