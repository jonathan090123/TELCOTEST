@extends('layouts.app')

@section('title', 'Detail Transaksi ' . $transaksi->order_id)

@section('extra-styles')
    <style>
        /* Keep global layout background and navbar from layouts.app; only small reset to avoid heavy old styles */
        body { background: inherit; }
        .status-badge { display:inline-block; padding:4px 12px; border-radius:999px; background: rgba(255,255,255,0.15); }
    </style>
@endsection

@section('content')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10">

        <div class="bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-md sm:shadow-md mb-6 flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4">
            <div class="flex-grow">
                <h1 class="text-2xl sm:text-3xl font-bold">Detail Transaksi</h1>
                <div class="mt-1 text-xs sm:text-sm text-white/90">Kode: <strong>{{ $transaksi->order_id }}</strong></div>
                <div class="mt-2"><span class="status-badge">{{ strtoupper($transaksi->status) }}</span></div>
            </div>

            <div class="text-right">
                <div class="text-xs sm:text-sm">Tanggal</div>
                <div class="text-base sm:text-lg font-semibold mt-1">{{ $transaksi->created_at->format('d M Y, H:i') }}</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">
            <div class="lg:col-span-2 bg-white rounded-lg sm:rounded-xl p-4 sm:p-6 shadow-sm border border-gray-100">
                <h2 class="text-base sm:text-lg font-semibold text-indigo-600">{{ $transaksi->product->product_name ?? 'Produk tidak tersedia' }}</h2>

                <div class="mt-4 grid grid-cols-2 gap-3 sm:gap-4 text-xs sm:text-sm text-gray-600">
                    <div>
                        <div class="text-xs text-gray-400">Metode</div>
                        <div class="font-medium">{{ ucfirst($transaksi->payment_type ?? 'midtrans') }}</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400">Jumlah</div>
                        <div class="font-medium">Rp {{ number_format($transaksi->amount, 0, ',', '.') }}</div>
                    </div>
                </div>

                <div class="mt-6 text-xs sm:text-sm text-gray-500">
                    <ul class="list-disc pl-5 space-y-1">
                        <li>Aktivasi otomatis setelah pembayaran dikonfirmasi.</li>
                        <li>Jika ada masalah, hubungi support.</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white rounded-lg sm:rounded-xl p-4 sm:p-6 shadow-sm border border-gray-100">
                <div class="text-xs sm:text-sm text-gray-600">Ringkasan</div>
                <div class="mt-3 flex items-center justify-between">
                    <div class="text-xs sm:text-sm text-gray-500">Total Bayar</div>
                    <div class="text-lg sm:text-xl font-bold">Rp {{ number_format($transaksi->amount, 0, ',', '.') }}</div>
                </div>

                @if ($transaksi->status == 'pending')
                    <button id="pay-button" class="mt-6 w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-2 sm:py-2.5 rounded-lg font-semibold text-sm sm:text-base">Selesaikan Pembayaran</button>
                @else
                    <div class="mt-6 w-full bg-green-100 text-green-800 py-2 sm:py-2.5 rounded-lg text-center font-semibold text-sm sm:text-base">✅ Pembayaran Berhasil</div>
                @endif

                <a href="{{ route('customer.transaksi.riwayat') }}" class="mt-4 block text-center text-xs sm:text-sm text-gray-600 hover:underline">Kembali ke Riwayat</a>
            </div>
        </div>
    </div>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
    </script>

    <script>
        document.getElementById('pay-button')?.addEventListener('click', function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    console.log('Payment success:', result);
                    // Cek status ke Midtrans API
                    checkPaymentStatus();
                },
                onPending: function(result) {
                    console.log('Waiting for payment:', result);
                },
                onError: function(result) {
                    console.log('Payment failed:', result);
                },
                onClose: function() {
                    alert('Kamu menutup pembayaran sebelum selesai.');
                }
            });
        });

        function checkPaymentStatus() {
            const transactionId = {{ $transaksi->id }};
            const url = `/transaksi/${transactionId}/check-payment-status`;

            console.log('Checking payment status for transaction ID:', transactionId);
            console.log('URL:', url);

            // Tunggu 2 detik sebelum cek (biar Midtrans selesai proses)
            setTimeout(() => {
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    }
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    return response.json();
                })
                .then(data => {
                    console.log('Payment status check result:', data);
                    if (data.success) {
                        // Redirect ke riwayat transaksi
                        window.location.href = "{{ route('customer.transaksi.riwayat') }}";
                    } else {
                        alert('Status: ' + data.message);
                        window.location.href = "{{ route('customer.transaksi.riwayat') }}";
                    }
                })
                .catch(error => {
                    console.error('Error checking payment status:', error);
                    window.location.href = "{{ route('customer.transaksi.riwayat') }}";
                });
            }, 2000);
        }
    </script>

@endsection
