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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('employee_id')->unique()->nullable();
            $table->date('joining_date')->nullable();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade')->nullable();
            $table->foreignId('deptID')->constrained('departments')->onDelete('cascade')->nullable();
            $table->foreignId('des_id')->constrained('designations')->onDelete('cascade')->nullable();
            $table->string('employee_grade')->nullable();
            $table->enum('gender', ['male', 'female'])->default('male')->nullable();
            $table->date('dob')->nullable();
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->integer('age')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('passport_photo')->nullable();
            $table->timestamps();

            // Foreign key relationship with 'departments' table for department ID
            // $table->foreign('deptID')->references('id')->on('departments')
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
