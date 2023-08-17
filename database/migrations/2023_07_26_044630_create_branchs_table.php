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
        Schema::create('branchs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('branch_name');
            $table->string('phone_number');
            $table->string('address');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        
            // Define foreign key constraint for company_id
            $table->foreign('company_id')->references('id')->on('companys')->onDelete('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branchs');
    }
};
