<?php

namespace App\Http\Requests\Designation;

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
            'deptID' => ['integer'],
            'designation_name' => ['string', 'max:255'],
            'designation_shortname' => ['string', 'max:255'],
            'designation_code' => ['string', 'max:255']
        ];
    }
    public function messages(): array
    {
        return [
            'deptID.integer' => 'Department ID is integer',
            'designation_name.string' => 'Designation name is string',
            'designation_shortname.string' => 'Designation short name is string',
            'designation_code.string' => 'Designation code is string'
        ];
    }
}
