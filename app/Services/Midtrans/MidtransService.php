<?php

namespace App\Services\Midtrans;

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Transaction;
use Illuminate\Support\Facades\Log;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = false; 
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createTransaction($params)
    {
        return Snap::getSnapToken($params);
    }

    /**
     * Cek status transaksi ke Midtrans API
     * @param string $orderId
     * @return array|null
     */
    public function getTransactionStatus($orderId)
    {
        try {
            $response = Transaction::status($orderId);
            return $response;
        } catch (\Exception $e) {
            Log::error('Midtrans get status error', [
                'order_id' => $orderId,
                'error' => $e->getMessage(),
            ]);
            return null;
        }
    }
}
