<?php

namespace App\Http\Requests\Designation;

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
           
            'designation_name' => ['required', 'string', 'max:255'],
            'designation_shortname' => ['required', 'string', 'max:255'],
            'designation_code' => ['required', 'string', 'max:255'],
            'status' => ['required']
        ];
    }
    public function messages(): array
    {
        return [
            'designation_name.required' => 'Designation name  is required',
            'designation_shortname.required' => 'Designation short name  is required',
            'designation_code.required' => 'Designation code is required'
        ];
    }
}