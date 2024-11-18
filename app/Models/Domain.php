<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'domain_name',
        'purchase_date',
        'reg_firstname',
        'reg_lastname',
        'reg_city',
        'reg_state',
        'reg_zipcode',
        'reg_country',
        'reg_address',
        'person_name',
        'email',
        'phone',
        'mailing_address',
        'nid_number',
        'person_image',
        'nid_image',
        'currency_type',
        'rate',
        'renewal_date',
    ];
}
