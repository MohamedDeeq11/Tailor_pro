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
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
            $table->string('name');
            $table->string('phonenumber');
            $table->string('Status');
            $table->string('AccessToAllBranchs');
            $table->string('address');
            $table->string('position');
            $table->date('Registered_date');
            $table->string('Refrence_Name');
            $table->string('Refrance_phone');
            $table->string('Refrance_relation');
            $table->string('Refrance_address');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
 
             $table->foreign('company_id')->references('id')->on('companys')->onDelete('cascade');
             $table->foreign('branch_id')->references('id')->on('branchs')->onDelete('cascade');
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
