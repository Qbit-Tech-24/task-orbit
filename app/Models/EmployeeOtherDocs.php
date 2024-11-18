<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeOtherDocs extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id','other_documents'];

}
