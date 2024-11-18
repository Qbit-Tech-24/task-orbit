<?php

namespace App\Models;

use App\Models\Designation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['deptName','companies_id','status'];
    public function scopeForCompany($query, $companyId)
    {
        return $query->where('companies_id', $companyId);
    }
    public function designations()
    {
        return $this->hasMany(Designation::class,'deptID','id');
    }

    public function Company(){
        return $this->belongsTo(Company::class,'companies_id');
    }

    public function employee()
    {
        return $this->hasMany(Employee::class, 'deptID','id');
    }

}
