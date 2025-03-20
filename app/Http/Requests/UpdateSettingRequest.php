<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'election_start' => 'required|date',
            'election_end' => 'required|date|after:election_start',
            'maintenance_mode' => 'boolean',
            'registration_enabled' => 'boolean',
            'voting_enabled' => 'boolean',
            'results_enabled' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'election_end.after' => 'The election end time must be after the start time.',
        ];
    }
}
