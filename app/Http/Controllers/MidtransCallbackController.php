<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MidtransCallbackController extends Controller
{
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');

        Log::info('Midtrans callback received', [
            'order_id' => $request->order_id,
            'status_code' => $request->status_code,
            'gross_amount' => $request->gross_amount,
            'signature_key' => $request->signature_key,
            'transaction_status' => $request->transaction_status,
        ]);

        $localSignature = hash('sha512',
            $request->order_id .
            $request->status_code .
            $request->gross_amount .
            $serverKey
        );

        if ($localSignature !== $request->signature_key) {
            Log::warning('Midtrans callback: Invalid signature', [
                'order_id' => $request->order_id,
                'signature_key' => $request->signature_key,
                'localSignature' => $localSignature,
            ]);
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        $trx = Transaction::where('order_id', $request->order_id)->first();

        if (!$trx) {
            Log::warning('Midtrans callback: Order not found', [
                'order_id' => $request->order_id,
            ]);
            return response()->json(['message' => 'Order not found'], 404);
        }

        $status = strtolower($request->transaction_status);
        $mapped = 'pending';

        if (in_array($status, ['settlement', 'capture'])) {
            $mapped = 'success';
        } elseif (in_array($status, ['deny', 'cancel', 'expire'])) {
            $mapped = 'failed';
        } elseif ($status === 'pending') {
            $mapped = 'pending';
        }

        // Pastikan hanya status yang valid yang diupdate
        if (!in_array($mapped, ['pending', 'success', 'failed'])) {
            $mapped = 'pending';
        }

        $trx->update([
            'status'         => $mapped,
            'payment_type'   => $request->payment_type ?? null,
            'transaction_id' => $request->transaction_id ?? null,
        ]);

        Log::info('Midtrans callback: Transaction updated', [
            'order_id' => $request->order_id,
            'new_status' => $mapped,
        ]);

        return response()->json(['message' => 'OK']);
    }
}
