<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'company_name'=> ['string','max:255'],
            'company_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:1048',
        ];
    }
    public function messages()
    {
        return [
            'company_name.string' => 'Company Name is a string',
            'company_logo.image' => 'Company logo is an image'
        ];
    }
}
