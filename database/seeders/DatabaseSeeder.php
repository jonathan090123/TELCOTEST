<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
=======
use App\Models\User;
use App\Models\PaketData;
use Illuminate\Support\Facades\Hash;
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // Panggil Seeder Khusus yang sudah kita buat
        $this->call([
            // 1. Isi Katalog Produk (Sesuai API Python)
            ProductSeeder::class,

            // 2. Import User & Data Perilaku dari CSV
            CsvImportSeeder::class,
        ]);

        $this->call(TransactionSeeder::class);
    }

=======
        // Buat Admin Dummy
        User::create([
            'name' => 'Admin TelcoApp',
            'email' => 'admin@telcoapp.com',
            'phone' => '08123456789',
            'password' => Hash::make('password123'), // Password: password123
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Buat Customer Dummy
        User::create([
            'name' => 'John Doe',
            'email' => 'user@telcoapp.com',
            'phone' => '08987654321',
            'password' => Hash::make('password123'), // Password: password123
            'role' => 'customer',
            'email_verified_at' => now(),
        ]);

        // Buat beberapa paket data dummy
        PaketData::create([
            'nama' => 'Paket Freedom 3GB',
            'kuota' => '3GB',
            'masa_aktif' => 30,
            'harga' => 99000,
            'deskripsi' => 'Paket data 3GB dengan masa aktif 30 hari. Cocok untuk penggunaan sehari-hari.',
            'status' => 'active',
        ]);

        PaketData::create([
            'nama' => 'Paket Unlimited 5GB',
            'kuota' => '5GB',
            'masa_aktif' => 30,
            'harga' => 149000,
            'deskripsi' => 'Paket data 5GB dengan masa aktif 30 hari. Ideal untuk streaming dan browsing.',
            'status' => 'active',
        ]);

        PaketData::create([
            'nama' => 'Paket Premium 10GB',
            'kuota' => '10GB',
            'masa_aktif' => 30,
            'harga' => 199000,
            'deskripsi' => 'Paket data 10GB dengan masa aktif 30 hari. Terbaik untuk heavy users.',
            'status' => 'active',
        ]);

        PaketData::create([
            'nama' => 'Paket Hemat 1GB',
            'kuota' => '1GB',
            'masa_aktif' => 7,
            'harga' => 29000,
            'deskripsi' => 'Paket data 1GB dengan masa aktif 7 hari. Ekonomis untuk penggunaan ringan.',
            'status' => 'active',
        ]);

        PaketData::create([
            'nama' => 'Paket Booster 15GB',
            'kuota' => '15GB',
            'masa_aktif' => 60,
            'harga' => 299000,
            'deskripsi' => 'Paket data 15GB dengan masa aktif 60 hari. Nilai terbaik untuk pengguna berat.',
            'status' => 'active',
        ]);
    }
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
}
