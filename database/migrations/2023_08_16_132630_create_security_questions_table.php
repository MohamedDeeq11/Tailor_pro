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
        Schema::create('security_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id'); // User ID
            $table->string('question1');
            $table->string('answer1');
            $table->string('question2');
            $table->string('answer2');
            $table->string('question3');
            $table->string('answer3');
            $table->date('date');
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_questions');
    }
};
