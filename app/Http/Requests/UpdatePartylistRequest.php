<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartylistRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:partylists,name,' . $this->partylist->partylist_id,
            'description' => 'nullable|string|max:500',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The partylist name is required.',
            'name.unique' => 'This partylist name already exists.',
        ];
    }
}
