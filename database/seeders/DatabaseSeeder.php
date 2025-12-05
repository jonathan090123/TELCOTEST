<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil Seeder Khusus yang sudah kita buat
        $this->call([
            // 1. Isi Katalog Produk (Sesuai API Python)
            ProductSeeder::class,

            // 2. Import User & Data Perilaku dari CSV
            CsvImportSeeder::class,
        ]);

        $this->call(TransactionSeeder::class);
    }

}
