<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMlProductMappingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ml_product_mappings', function (Blueprint $table) {
            $table->id();
            $table->string('operator')->nullable();
            $table->string('ml_kategori')->nullable();
            $table->string('ml_produk')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->timestamps();

            // Not forcing foreign key to avoid migration issues in some environments
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ml_product_mappings');
    }
}
