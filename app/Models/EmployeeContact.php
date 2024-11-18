<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'fathers_name',
        'mothers_name',
        'phone_number',
        'office_phone_number',
        'email_address',
        'marital_status',
        'spouse_name',
        'spouse_nid',
        'spouse_phone',
        'present_address',
        'present_district',
        'present_postal_code',
        'permanent_address',
        'permanent_district',
        'permanent_postal_code',
        'emergency_contact_person',
        'emergency_contact_relation',
        'emergency_contact_number',
        'enid_front_image',
        'enid_back_image',
        'address',
        'district',
        'postal_code'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
