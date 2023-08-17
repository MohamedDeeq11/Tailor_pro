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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('branch_id');
             $table->unsignedBigInteger('client_id');
             $table->date('date');
             $table->unsignedBigInteger('product_id');
             $table->float('price');
             $table->date('Rodered_date');
             $table->timestamp('deleted_at')->nullable();
             $table->timestamps();
             
             $table->foreign('company_id')->references('id')->on('companys')->onDelete('cascade');
             $table->foreign('branch_id')->references('id')->on('branchs')->onDelete('cascade');
             $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
             $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
