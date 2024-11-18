<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_address',
        'district',
        'zipcode',
        'contact_no',
        'whatsapp_number',
        'land_phone_no',
        'email',
        'company_website',
        'facebook_url',
        'company_logo',
        'registration_no',
        'status'
    ];

    public function employee(){

        return $this->hasMany(Employee::class,'companies_id','id');
    }
}
