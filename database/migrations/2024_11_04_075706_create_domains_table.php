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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('purchase_date')->nullable();
            $table->string('reg_firstname')->nullable();
            $table->string('reg_lastname')->nullable();
            $table->string('reg_city')->nullable();
            $table->string('reg_state')->nullable();
            $table->string('reg_zipcode')->nullable();
            $table->string('reg_country')->nullable();
            $table->string('reg_address')->nullable();
            $table->string('person_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mailing_address')->nullable();
            $table->string('nid_number')->nullable();
            $table->string('person_image')->nullable();
            $table->string('nid_image')->nullable();
            $table->string('currency_type')->nullable();
            $table->decimal('rate', 10, 2)->nullable();
            $table->date('renewal_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
