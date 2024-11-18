<?php

namespace App\Models;

use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation_name',
        'designation_shortname',
        'designation_code',
        'status'
    ];

}
