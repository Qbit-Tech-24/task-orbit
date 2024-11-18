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
        Schema::create('employee_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('office_phone_number')->nullable();
            $table->string('email_address')->nullable();
            $table->enum('marital_status', ['married', 'unmarried'])->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_nid')->nullable();
            $table->string('spouse_phone')->nullable();
            // Present Address
            $table->text('present_address')->nullable();
            $table->string('present_district')->nullable();
            $table->string('present_postal_code')->nullable();
            // Permanent Address
            $table->text('permanent_address')->nullable();
            $table->string('permanent_district')->nullable();
            $table->string('permanent_postal_code')->nullable();
            // Emergency Contact Details
            $table->string('emergency_contact_person')->nullable();
            $table->string('emergency_contact_relation')->nullable();
            $table->string('emergency_contact_number')->nullable();
            $table->string('enid_front_image')->nullable();
            $table->string('enid_back_image')->nullable();
            $table->text('address')->nullable();
            $table->string('district')->nullable();
            $table->string('postal_code')->nullable();
            $table->timestamps();
            // Foreign key constraint
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_contacts');
    }
};
