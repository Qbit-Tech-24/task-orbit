<?php

namespace App\Http\Requests\Employee;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
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
            'email.required' => 'Employee email is required.',
            'email.email' => 'Employee eamil must be an email.',
            'password.required' => 'Employee password is required.',
        ];
    }
}