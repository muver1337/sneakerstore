<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'login' => ['required', 'unique:users', 'alpha', 'regex:/^[a-zA-Z]{3,20}$/'],
            'password' => ['required'],
            'email' => 'required|email|unique:users',
        ];

    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'login' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль'
        ];
    }

    public function messages()
    {
        return [
            'login.regex' => ':attribute Логин должен содержать заглавные и прописные буквы, без пробелов.',
            'password.regex' => ':attribute Должен содержать более 8 симоволов.'
        ];
    }
}
