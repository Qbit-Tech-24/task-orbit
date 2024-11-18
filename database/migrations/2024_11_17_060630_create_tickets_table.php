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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id'); 
            $table->unsignedBigInteger('cat_id'); 
            $table->string('ticket_number')->unique();
            $table->string('subject');
            $table->string('project_name');
            $table->string('department');
            $table->enum('status',['Open','Processing','Solved','Suspend','Closed'])->default('Open');
            $table->enum('priority',['High','Medium','Low'])->default('Low');
            $table->longText('msg');
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('client_users')->onDelete('cascade');
            $table->foreign('cat_id')->references('id')->on('ticket_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
