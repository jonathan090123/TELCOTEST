<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            
            // Kategori ML (String agar fleksibel)
            $table->string('ml_category'); 
            
            $table->string('operator'); // Telkomsel, Indosat, dll
            $table->decimal('price', 15, 2); // Decimal untuk uang
            $table->text('description')->nullable();
            
            // URL Gambar (Penting untuk upload)
            $table->string('image_url')->nullable(); 
            
            // Status Active/Inactive (Penting untuk katalog)
            $table->enum('status', ['active', 'inactive'])->default('active'); 
            
            // Produk Populer
            $table->boolean('is_popular')->default(false);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};