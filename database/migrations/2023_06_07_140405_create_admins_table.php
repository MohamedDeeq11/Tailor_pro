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
        Schema::create('admins', function (Blueprint $table) {
            $table->id('userid');
            $table->string('userpic')->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('tittle')->nullable();
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status')->default('unverified');
            $table->string('session-status')->nullable();
            $table->date('registrated date')->nullable();
            $table->string('lastTime-logged-In')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
