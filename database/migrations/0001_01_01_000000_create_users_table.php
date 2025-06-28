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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID primary key, auto-increment
            $table->string('nama_lengkap'); // Kolom baru untuk nama lengkap
            $table->string('email')->unique(); // Kolom email, harus unik
            $table->timestamp('email_verified_at')->nullable(); // Untuk fitur verifikasi email
            $table->string('password'); // Kolom password (akan menyimpan hash)
            $table->rememberToken()->nullable(); // Untuk fitur "Remember Me"
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};