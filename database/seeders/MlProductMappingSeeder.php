<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MlProductMapping;
use App\Models\Product;

class MlProductMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh kategori yang sering dipakai oleh model Python
        $commonCategories = [
            'Data Booster',
            'General Offer',
            'Device Upgrade Offer',
            'Roaming Pass',
            'Streaming Partner Pack',
            'Retention Offer',
            'Top-up Promo',
            'Voice Bundle',
            'Family Plan Offer'
        ];

        $operators = ['Telkomsel','Indosat','XL','Tri','Smartfren'];

        foreach ($operators as $op) {
            foreach ($commonCategories as $cat) {
                // Coba temukan produk DB yang cocok berdasarkan ml_category atau product_name
                $product = Product::where('operator', $op)
                    ->where(function($q) use ($cat) {
                        $q->where('ml_category', $cat)
                          ->orWhereRaw('LOWER(product_name) LIKE ?', ['%'.strtolower($cat).'%']);
                    })
                    ->first();

                MlProductMapping::create([
                    'operator' => $op,
                    'ml_kategori' => $cat,
                    'ml_produk' => $cat, // default same as kategori; can be edited later
                    'product_id' => $product ? $product->id : null,
                ]);
            }
        }
    }
}
