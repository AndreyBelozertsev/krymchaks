<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Worksome\RequestFactories\Concerns\HasFactory;

class SendContactForm extends FormRequest
{

    use HasFactory;
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','min:3'],
            'email' => ['required','email:dns'],
            'message' => ['required','min:8'],
            'agree' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле обязательное для ввода',
            'name.min' => 'Минимальный размер 3 символа',
            'email.required' => 'Поле обязательное для ввода',
            'message.required' => 'Поле обязательное для ввода',
            'message.min' => 'Минимальный размер 8 символов',
            'agree.required' => 'Вы должны согласиться с политикой обработки персональных данных',
        ];
    }
}
