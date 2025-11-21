<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('paket_data', function (Blueprint $table) {
            // new columns for the extended schema
            if (!Schema::hasColumn('paket_data', 'product_name')) {
                $table->string('product_name')->nullable()->after('id');
            }
            if (!Schema::hasColumn('paket_data', 'ml_category')) {
                $table->string('ml_category')->nullable()->after('product_name');
            }
            if (!Schema::hasColumn('paket_data', 'operator')) {
                $table->string('operator')->nullable()->after('ml_category');
            }
            if (!Schema::hasColumn('paket_data', 'price')) {
                $table->decimal('price', 15, 2)->nullable()->after('operator');
            }
            if (!Schema::hasColumn('paket_data', 'description')) {
                $table->text('description')->nullable()->after('price');
            }
            if (!Schema::hasColumn('paket_data', 'image_url')) {
                $table->string('image_url')->nullable()->after('description');
            }
            if (!Schema::hasColumn('paket_data', 'is_popular')) {
                $table->boolean('is_popular')->default(false)->after('image_url');
            }
        });

        // Try to migrate existing data where possible
        try {
            DB::table('paket_data')->whereNotNull('nama')->whereNull('product_name')->update([
                'product_name' => DB::raw('nama')
            ]);
        } catch (\Throwable $e) {
            // ignore if raw update fails on some DB drivers
        }

        try {
            DB::table('paket_data')->whereNotNull('harga')->whereNull('price')->update([
                'price' => DB::raw('harga')
            ]);
        } catch (\Throwable $e) {
        }

        try {
            DB::table('paket_data')->whereNotNull('deskripsi')->whereNull('description')->update([
                'description' => DB::raw('deskripsi')
            ]);
        } catch (\Throwable $e) {
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paket_data', function (Blueprint $table) {
            if (Schema::hasColumn('paket_data', 'is_popular')) {
                $table->dropColumn('is_popular');
            }
            if (Schema::hasColumn('paket_data', 'image_url')) {
                $table->dropColumn('image_url');
            }
            if (Schema::hasColumn('paket_data', 'description')) {
                $table->dropColumn('description');
            }
            if (Schema::hasColumn('paket_data', 'price')) {
                $table->dropColumn('price');
            }
            if (Schema::hasColumn('paket_data', 'operator')) {
                $table->dropColumn('operator');
            }
            if (Schema::hasColumn('paket_data', 'ml_category')) {
                $table->dropColumn('ml_category');
            }
            if (Schema::hasColumn('paket_data', 'product_name')) {
                $table->dropColumn('product_name');
            }
        });
    }
};
