<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name')->nullable();
            $table->string('client_designation')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_fb_url')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('business_card')->nullable();
            $table->string('client_phone')->nullable();
            $table->string('client_email')->nullable();
            $table->string('client_mailing_address')->nullable();
            $table->string('client_passport_image')->nullable();
            $table->string('client_nid_number')->nullable();
            $table->string('client_nid_image')->nullable();
            $table->string('documents')->nullable();
            $table->string('organizational_name')->nullable();
            $table->string('organizational_phone_number')->nullable();
            $table->string('organizational_whatsapp_number')->nullable();
            $table->string('organizational_email')->nullable();
            $table->string('organizational_address')->nullable();
            $table->string('organizational_website')->nullable();
            $table->string('organizational_fb_url')->nullable();
            $table->string('organizational_logo')->nullable();
            $table->string('organizational_business_card')->nullable();
            $table->string('organizational_other_documents')->nullable();
            $table->string('contact_name')->nullable();
            $table->string('contact_designation')->nullable();
            $table->string('contact_company')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_whatsapp')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_business_card')->nullable();
            $table->string('contact_nid_number')->nullable();
            $table->string('contact_nid_image')->nullable();
            $table->string('contact_other_documents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
