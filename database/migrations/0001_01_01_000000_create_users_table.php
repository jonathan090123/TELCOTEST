<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            
            // Login utama menggunakan Nomor HP (Unique)
            $table->string('nomor_hp')->unique(); 
            
            // Email opsional (nullable) karena login pakai HP
            $table->string('email')->nullable(); 
            
            $table->string('password');
            
            // Role: 'admin' atau 'customer'. Default customer.
            $table->enum('role', ['admin', 'customer'])->default('customer');
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};