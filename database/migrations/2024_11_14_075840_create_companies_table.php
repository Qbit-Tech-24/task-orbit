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
        Schema::create('companies', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->string('company_name');
            $table->text('company_address');
            $table->string('district')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('land_phone_no')->nullable();
            $table->string('email')->nullable();
            $table->string('company_website')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('registration_no')->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
