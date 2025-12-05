<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Katalog Produk (Sesuai Python API)
        $products = [
            // --- TELKOMSEL (Lengkap) ---
            ['operator' => 'Telkomsel', 'ml_category' => 'Data Booster', 'product_name' => 'Paket Ekstra Kuota Harian', 'price' => 15000, 'is_popular' => 0],
            ['operator' => 'Telkomsel', 'ml_category' => 'General Offer', 'product_name' => 'Combo Sakti Unlimited', 'price' => 75000, 'is_popular' => 1],
            ['operator' => 'Telkomsel', 'ml_category' => 'Device Upgrade Offer', 'product_name' => 'Bundling iPhone 15 Pro (Tsel)', 'price' => 20000000, 'is_popular' => 0],
            ['operator' => 'Telkomsel', 'ml_category' => 'Roaming Pass', 'product_name' => 'Paket Roaming Asia-Australia', 'price' => 150000, 'is_popular' => 0],
            ['operator' => 'Telkomsel', 'ml_category' => 'Streaming Partner Pack', 'product_name' => 'Kuota Nonton MAXstream', 'price' => 25000, 'is_popular' => 0],
            ['operator' => 'Telkomsel', 'ml_category' => 'Retention Offer', 'product_name' => 'Promo Spesial Loyalitas', 'price' => 50000, 'is_popular' => 0],
            ['operator' => 'Telkomsel', 'ml_category' => 'Top-up Promo', 'product_name' => 'Bonus Pulsa Harian', 'price' => 5000, 'is_popular' => 1],
            ['operator' => 'Telkomsel', 'ml_category' => 'Voice Bundle', 'product_name' => 'Paket Nelpon Sepuasnya', 'price' => 40000, 'is_popular' => 0],
            ['operator' => 'Telkomsel', 'ml_category' => 'Family Plan Offer', 'product_name' => 'Paket Halo Keluarga', 'price' => 250000, 'is_popular' => 0],

            // --- INDOSAT (Lengkap) ---
            ['operator' => 'Indosat', 'ml_category' => 'Data Booster', 'product_name' => 'Freedom Apps 5GB', 'price' => 20000, 'is_popular' => 0],
            ['operator' => 'Indosat', 'ml_category' => 'General Offer', 'product_name' => 'Freedom Internet 100GB', 'price' => 120000, 'is_popular' => 1],
            ['operator' => 'Indosat', 'ml_category' => 'Device Upgrade Offer', 'product_name' => 'Bundling Samsung S24 (IM3)', 'price' => 18000000, 'is_popular' => 0],
            ['operator' => 'Indosat', 'ml_category' => 'Roaming Pass', 'product_name' => 'IM3 Travel Pass', 'price' => 100000, 'is_popular' => 0],
            ['operator' => 'Indosat', 'ml_category' => 'Streaming Partner Pack', 'product_name' => 'Freedom U (Youtube/Netflix)', 'price' => 35000, 'is_popular' => 1],
            ['operator' => 'Indosat', 'ml_category' => 'Retention Offer', 'product_name' => 'Diskon Tagihan Pascabayar', 'price' => 0, 'is_popular' => 0],
            ['operator' => 'Indosat', 'ml_category' => 'Top-up Promo', 'product_name' => 'Cashback Isi Ulang', 'price' => 1000, 'is_popular' => 1],
            ['operator' => 'Indosat', 'ml_category' => 'Voice Bundle', 'product_name' => 'Obrolan Sepuasnya ke Sesama', 'price' => 15000, 'is_popular' => 0],
            ['operator' => 'Indosat', 'ml_category' => 'Family Plan Offer', 'product_name' => 'IM3 Prime Family', 'price' => 200000, 'is_popular' => 0],

            // --- XL (Lengkap) ---
            ['operator' => 'XL', 'ml_category' => 'Data Booster', 'product_name' => 'Kuota Ketengan Utama', 'price' => 10000, 'is_popular' => 0],
            ['operator' => 'XL', 'ml_category' => 'General Offer', 'product_name' => 'Xtra Combo Flex', 'price' => 60000, 'is_popular' => 1],
            ['operator' => 'XL', 'ml_category' => 'Device Upgrade Offer', 'product_name' => 'Bundling Smartphone XL', 'price' => 5000000, 'is_popular' => 0],
            ['operator' => 'XL', 'ml_category' => 'Roaming Pass', 'product_name' => 'XL Pass International', 'price' => 85000, 'is_popular' => 0],
            ['operator' => 'XL', 'ml_category' => 'Streaming Partner Pack', 'product_name' => 'Xtra Kuota Youtube', 'price' => 15000, 'is_popular' => 0],
            ['operator' => 'XL', 'ml_category' => 'Retention Offer', 'product_name' => 'Prio Deal Eksklusif', 'price' => 45000, 'is_popular' => 0],
            ['operator' => 'XL', 'ml_category' => 'Top-up Promo', 'product_name' => 'Xtra Bonus Pulsa', 'price' => 2000, 'is_popular' => 1],
            ['operator' => 'XL', 'ml_category' => 'Voice Bundle', 'product_name' => 'Paket Nelpon Semua Operator', 'price' => 30000, 'is_popular' => 0],
            ['operator' => 'XL', 'ml_category' => 'Family Plan Offer', 'product_name' => 'XL Satu (Fiber + Mobile)', 'price' => 350000, 'is_popular' => 0],

            // --- TRI (Lengkap) ---
            ['operator' => 'Tri', 'ml_category' => 'Data Booster', 'product_name' => 'Kuota Happy 5GB', 'price' => 18000, 'is_popular' => 0],
            ['operator' => 'Tri', 'ml_category' => 'General Offer', 'product_name' => 'AlwaysOn Unlimited', 'price' => 55000, 'is_popular' => 1],
            ['operator' => 'Tri', 'ml_category' => 'Device Upgrade Offer', 'product_name' => 'Bundling HP Gaming Tri', 'price' => 8000000, 'is_popular' => 0],
            ['operator' => 'Tri', 'ml_category' => 'Roaming Pass', 'product_name' => 'Tri Ibadah (Umroh/Haji)', 'price' => 250000, 'is_popular' => 0],
            ['operator' => 'Tri', 'ml_category' => 'Streaming Partner Pack', 'product_name' => 'Kuota Nonton (Viu/KlikFilm)', 'price' => 20000, 'is_popular' => 0],
            ['operator' => 'Tri', 'ml_category' => 'Retention Offer', 'product_name' => 'Promo Balik Lagi', 'price' => 10000, 'is_popular' => 0],
            ['operator' => 'Tri', 'ml_category' => 'Top-up Promo', 'product_name' => 'Dobel Pulsa', 'price' => 5000, 'is_popular' => 1],
            ['operator' => 'Tri', 'ml_category' => 'Voice Bundle', 'product_name' => 'Bebas Bicara', 'price' => 10000, 'is_popular' => 0],
            ['operator' => 'Tri', 'ml_category' => 'Family Plan Offer', 'product_name' => 'Keluarga Hemat Tri', 'price' => 100000, 'is_popular' => 0],

            // --- SMARTFREN (Lengkap) ---
            ['operator' => 'Smartfren', 'ml_category' => 'Data Booster', 'product_name' => 'Kuota Nonstop', 'price' => 30000, 'is_popular' => 0],
            ['operator' => 'Smartfren', 'ml_category' => 'General Offer', 'product_name' => 'Smartfren Unlimited Harian', 'price' => 80000, 'is_popular' => 1],
            ['operator' => 'Smartfren', 'ml_category' => 'Device Upgrade Offer', 'product_name' => 'Bundling Modem WiFi', 'price' => 400000, 'is_popular' => 0],
            ['operator' => 'Smartfren', 'ml_category' => 'Roaming Pass', 'product_name' => 'Smartfren Passport', 'price' => 120000, 'is_popular' => 0],
            ['operator' => 'Smartfren', 'ml_category' => 'Streaming Partner Pack', 'product_name' => 'Smartfren Video Data', 'price' => 20000, 'is_popular' => 0],
            ['operator' => 'Smartfren', 'ml_category' => 'Retention Offer', 'product_name' => 'Bonus Kuota Setia', 'price' => 15000, 'is_popular' => 0],
            ['operator' => 'Smartfren', 'ml_category' => 'Top-up Promo', 'product_name' => 'SmartPoin Bonus', 'price' => 0, 'is_popular' => 1],
            ['operator' => 'Smartfren', 'ml_category' => 'Voice Bundle', 'product_name' => 'Nelpon HD Voice', 'price' => 10000, 'is_popular' => 0],
            ['operator' => 'Smartfren', 'ml_category' => 'Family Plan Offer', 'product_name' => 'Connex Family', 'price' => 150000, 'is_popular' => 0],
        ];

        foreach ($products as $p) {
            Product::create($p);
        }
    }
}