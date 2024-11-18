<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_name',
        'client_designation',
        'company_name',
        'company_address',
        'company_phone',
        'company_website',
        'company_email',
        'company_fb_url',
        'company_logo',
        'business_card',
        'client_phone',
        'client_email',
        'client_mailing_address',
        'client_passport_image',
        'client_nid_number',
        'client_nid_image',
        'documents',
        'organizational_name',
        'organizational_phone_number',
        'organizational_whatsapp_number',
        'organizational_email',
        'organizational_address',
        'organizational_website',
        'organizational_fb_url',
        'organizational_logo',
        'organizational_business_card',
        'organizational_other_documents',
        'contact_name',
        'contact_designation',
        'contact_company',
        'contact_phone',
        'contact_whatsapp',
        'contact_email',
        'contact_business_card',
        'contact_nid_number',
        'contact_nid_image',
        'contact_other_documents',
    ];
}
