<?php

namespace App\Http\Requests\Employee;

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
    public function rules() 
    {
        return [
            'employee_name' => 'string|max:255',
            'account_holder_name' => 'string|max:255',
            'account_number' => 'string|max:255',
            'bank_name' => 'string|max:255',
            'ifsc_code' => 'string|max:255',
            'pan_number' => 'string|max:255',
            'branch_name' => 'string|max:255',
            'nid_number' => 'string|max:255',
            'weekly_holiday' => 'string|max:255',
            'emergency_contact_person' => 'string|max:255',
            'emergency_contact_relation' => 'string|max:255',
            'fathers_name' => 'string|max:255',
            'mothers_name' => 'string|max:255',
            'spouse_name' => 'string|max:255',
            'spouse_nid' => 'string|max:255',
            'present_district' => 'string|max:255',
            'district' => 'string|max:255',
            'present_postal_code' => 'string|max:255',
            'postal_code' => 'string|max:255',
            'permanent_district' => 'string|max:255',
            'permanent_postal_code' => 'string|max:255',
            'phone_number' => 'numeric',
            'emergency_contact_number' => 'numeric',
            'spouse_phone' => 'numeric',
            'joining_date' => 'date',
            'deptID' => 'exists:departments,id',
            'des_id' => 'exists:designations,id',
            'duty_shift' => 'required',
            'marital_status' => 'boolean',
            'salary_type' => 'required',
            'employee_grade' => 'string|max:50',
            'employee_type' => 'string|in:one,two',
            'gender' => 'in:male,female',
            'dob' => 'date|before:today',
            'religion' => 'string|max:50',
            'blood_group' => 'string|max:3',
            'age' => 'integer|min:1|max:150',
            'email_address' => 'email',
            'overtime_enabled' => 'boolean',
            'passport_photo' => 'image|mimes:jpg,jpeg,png|max:2048',
            'enid_front_image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'enid_back_image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'nid_front_image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'nid_back_image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'employee_signature' => 'image|mimes:jpg,jpeg,png|max:2048',
            'resume' => 'file|mimes:pdf,doc|max:2048',
            'other_documents.*' => 'file|max:2048'
        ];
    }
    

    public function messages()
    {
        return [
            'employee_name.string' => 'Employee name is string.',
            'weekly_holiday.string' => 'Employee weekend is string.',
            'email.email' => 'Employee email is an email.',
            'joining_date.date' => 'Employee joining date is a date.',
            'deptID.integer' => 'Employee department is an integer.',
            'religion.string' => 'Employee religion is string.',
            'dob.date' => 'Employee date of birth is a date.',
            'des_id.integer' => 'Employee designation is required.',
            'employee_id.string' => 'Employee ID is a string.',
            'dob.before' => 'The date of birth must be before today.'
        ];
    }
}
