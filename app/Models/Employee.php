<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Department;
use App\Models\Designation;
use App\Models\EmployeeContact;
use App\Models\EmployeeDocument;
use App\Models\EmployeeOtherDocs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'employee_name',
        'employee_id',
        'joining_date',
        'company_id',
        'deptID',
        'des_id',
        'employee_grade',
        'gender',
        'dob',
        'religion',
        'blood_group',
        'age',
        'email',
        'password',
        'passport_photo'
    ];
    protected $hidden = [
        'password'
    ];


    protected $casts = [
        'password' => 'hashed',
    ];
    public function department()
    {
        return $this->belongsTo(Department::class, 'deptID','id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id','id');
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'des_id','id');
    }
   // Employee has one contact information
   public function employeeContact()
   {
       return $this->hasOne(EmployeeContact::class, 'employee_id', 'id');
   }

   // Employee has one set of documents
   public function employeeDocument()
   {
       return $this->hasOne(EmployeeDocument::class, 'employee_id', 'id');
   }
   public function others(){
     return $this->belongsTo(EmployeeOtherDocs::class,'employee_id','id');
   }

   public function teams()
   {
       return $this->belongsToMany(Team::class, 'employee_team', 'employee_id', 'team_id');
   }
}
