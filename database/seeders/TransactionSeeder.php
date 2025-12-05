<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\User;

class TransactionSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();

        if ($users->count() == 0 || $products->count() == 0) {
            dd("Seeder gagal: butuh minimal 1 user & 1 product");
        }
        
        for ($i = 0; $i < 50; $i++) {

            $product = $products->random();
            $user = $users->random();

            Transaction::create([
                'user_id'        => $user->id,
                'product_id'     => $product->id,
                'order_id'       => 'ORDER-' . uniqid(),
                'amount'         => $product->price ?? 10000,
                'status'         => 'success',
                'payment_type'   => 'midtrans',
                'transaction_id' => 'TRX-' . uniqid(),
            ]);
        }
    }
}

