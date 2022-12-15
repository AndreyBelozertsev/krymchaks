<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveSettingsRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'organization' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'email' => ['required','email'],
            'policy'=> ['required']
        ];
    }
}
