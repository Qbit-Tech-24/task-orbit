<?php

namespace App\Http\Requests\Client\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email'=> 'required|email|string|max:255',
            'password'=> 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Client email is required.',
            'email.email' => 'Client eamil must be an email.',
            'password.required' => 'Client password is required.',
        ];
    }
}
