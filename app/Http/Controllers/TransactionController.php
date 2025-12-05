<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function checkout($product_id)
    {
        $product = Product::findOrFail($product_id);
        $user = Auth::user();

        $trx = Transaction::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'order_id' => 'ORDER-' . time(),
            'amount' => $product->price,
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $trx->order_id,
                'gross_amount' => $trx->amount,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];
        $snapToken = Snap::getSnapToken($params);

        return view('payment', compact('snapToken', 'trx'));
    }
}
