<?php

namespace App\Http\Requests\Employee;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateRequest extends FormRequest
{
    
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
            'employee_name' => 'required|string|max:255',
            'employee_id' => 'required|string|unique:employees,employee_id|max:50',
            'deptID' => 'required',
            'des_id' => 'required',
            'account_holder_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'ifsc_code' => 'nullable|string|max:255',
            'pan_number' => 'nullable|string|max:255',
            'branch_name' => 'nullable|string|max:255',
            'nid_number' => 'nullable|string|max:255',
            'weekly_holiday' => 'required|string|max:255',
            'emergency_contact_person' => 'nullable|string|max:255',
            'emergency_contact_relation' => 'nullable|string|max:255',
            'fathers_name' => 'required|string|max:255',
            'mothers_name' => 'required|string|max:255',
            'spouse_name' => 'nullable|string|max:255',
            'spouse_nid' => 'nullable|string|max:255',
            'present_district' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'present_postal_code' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'permanent_district' => 'nullable|string|max:255',
            'permanent_postal_code' => 'nullable|string|max:255',
            'phone_number' => 'required|numeric',
            'emergency_contact_number' => 'nullable|numeric',
            'spouse_phone' => 'nullable|numeric',
            'joining_date' => 'required|date',
            'deptID' => 'required|exists:departments,id',
            'des_id' => 'required|exists:designations,id',
            'duty_shift_id' => 'required',
            'marital_status' => 'required|boolean',
            'salary_type' => 'required',
            'employee_grade' => 'nullable|string|max:50',
            'gender' => 'required|in:male,female',
            'dob' => 'required|date|before:today',
            'religion' => 'required|string|max:50',
            'blood_group' => 'nullable|string|max:3',
            'age' => 'required|integer|min:1|max:150',
            'email' => 'required|email|unique:employees,email',
            'email_address' => 'required|email|unique:employee_contacts,email_address',
            'password' => 'required|string|min:6',
            'overtime_enabled' => 'required|boolean',
            'passport_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'enid_front_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'enid_back_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nid_front_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nid_back_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'employee_signature' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'resume' => 'nullable|file|mimes:pdf,doc|max:2048',
            'other_documents.*' => 'nullable|file|max:2048'
        ];
    }
    

    public function messages()
    {
        return [
            'employee_name.required' => 'Employee name is required.',
            'weekly_holiday.required' => 'Employee weekend is required.',
            'email.required' => 'Employee email is required.',
            'salary_type.required' => 'Employee salary type is required.',
            'duty_shift.required' => 'Employee duty shift is required.',
            'password.required' => 'Employee password is required.',
            'joining_date.required' => 'Employee joining date is required.',
            'deptID.required' => 'Employee department is required.',
            'religion.required' => 'Employee religion is required.',
            'dob.required' => 'Employee date of birth is required.',
            'des_id.required' => 'Employee designation is required.',
            'employee_type.required' => 'Employee type is required.',
            'employee_id.required' => 'Employee ID is required.',
            'gender.required' => 'Employee gender is required.',
            'employee_id.unique' => 'Employee ID must be unique.',
            'dob.before' => 'The date of birth must be before today.',
        ];
    }
  
}
