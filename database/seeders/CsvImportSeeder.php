<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CustomerBehavior;
use Illuminate\Support\Facades\Hash;

class CsvImportSeeder extends Seeder
{
    public function run()
    {
        // 1. Buka File CSV dari folder public
        $filename = public_path('ac-01_telco.csv');

        if (!file_exists($filename)) {
            $this->command->error("File CSV tidak ditemukan di public/ac-01_telco.csv");
            return;
        }

        $file = fopen($filename, "r");
        $header = fgetcsv($file); // Lewati baris judul (header)

        // Batasi import (misal 50 user saja biar cepat)
        $limit = 50; 
        $count = 0;

        while (($row = fgetcsv($file)) !== FALSE && $count < $limit) {
            // Struktur CSV: 
            // 0:cust_id, 1:plan, 2:device, 3:avg_data, 4:pct_video, 5:call, 
            // 6:sms, 7:spend, 8:topup, 9:travel, 10:complaint
            
            // 2. Buat Nomor HP Dummy (Urut: 081200000000, 081200000001...)
            $phoneNumber = '08120000' . str_pad($count, 4, '0', STR_PAD_LEFT);
            
            // 3. Buat User
            $user = User::create([
                'name' => 'User Test ' . $count,
                
                // PERBAIKAN DISINI: Gunakan 'nomor_hp' sesuai migration baru
                'nomor_hp' => $phoneNumber, 
                
                'password' => Hash::make('password123'), // Password default
                'role' => 'customer', // Tambahkan role agar jelas
            ]);

            // 4. Simpan Data Perilaku (Pastikan Model CustomerBehavior sudah ada)
            CustomerBehavior::create([
                'user_id' => $user->id,
                'plan_type' => $row[1],
                'device_brand' => $row[2],
                'avg_data_usage_gb' => $row[3],
                'pct_video_usage' => (float)$row[4] * 100, // Konversi 0.8 -> 80
                'avg_call_duration' => $row[5],
                'sms_freq' => $row[6],
                'monthly_spend' => $row[7],
                'topup_freq' => $row[8],
                'travel_score' => $row[9],
                'complaint_count' => $row[10],
            ]);

            $count++;
        }

        fclose($file);
        $this->command->info("Sukses import $count user & data perilaku!");
    }
}