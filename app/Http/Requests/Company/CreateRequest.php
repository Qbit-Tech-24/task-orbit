<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'company_name'=> 'required','string','max:255',
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:1048',
            'company_address'=> 'required'
        ];
    }
    public function messages()
    {
        return [
            'company_name.required' => 'Company Name is required',
            'company_name.string' => 'Company Name must be a string',
            'company_address.required' => 'Company Address is required',
            'company_logo.image' => 'Company logo is an image'
        ];
    }
}
