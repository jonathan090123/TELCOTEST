@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Detail Produk')

@section('extra-styles')
<style>
    body { background:#f8fafc; }

    .container {
        max-width: 900px;
        margin: 2.5rem auto;
        padding: 0 1rem;
        font-family: Inter, system-ui, sans-serif;
    }

    .detail-card {
        background: #ffffff;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    }

    .card-header {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #fff;
    }

    .card-header h3 { margin: 0; color: #1e293b; font-weight: 700; font-size: 1.25rem; }
    .card-header .id-badge { background: #f1f5f9; color: #64748b; padding: 4px 10px; border-radius: 6px; font-size: 0.85rem; font-family: monospace; }

    .card-body { padding: 2rem; }

    .info-group { margin-bottom: 1.5rem; }
    .info-label { display: block; color: #64748b; font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 0.4rem; }
    .info-value { font-size: 1.1rem; color: #0f172a; font-weight: 500; }

    .badge {
        display: inline-block; padding: 6px 12px; border-radius: 20px;
        font-size: 0.85rem; font-weight: 600;
    }
    .badge-operator { background: #eff6ff; color: #3b82f6; border: 1px solid #dbeafe; }
    .badge-category { background: #fdf4ff; color: #c026d3; border: 1px solid #fae8ff; }
    .badge-popular  { background: #f0fdf4; color: #16a34a; border: 1px solid #dcfce7; }
    .badge-standard { background: #f8fafc; color: #64748b; border: 1px solid #e2e8f0; }

    .product-image {
        width: 100%; max-width: 300px; border-radius: 12px;
        border: 2px dashed #e2e8f0; padding: 5px;
    }

    .action-bar {
        background: #f8fafc; padding: 1.2rem 2rem;
        border-top: 1px solid #e5e7eb;
        display: flex; gap: 1rem; justify-content: flex-end;
    }

    .btn { padding: 0.6rem 1.2rem; border-radius: 8px; font-weight: 600; text-decoration: none; font-size: 0.95rem; transition: all 0.2s; cursor: pointer; border: none; }
    .btn-edit { background: #3b82f6; color: white; }
    .btn-edit:hover { background: #2563eb; }
    
    .btn-back { background: white; color: #475569; border: 1px solid #cbd5e1; }
    .btn-back:hover { background: #f1f5f9; color: #1e293b; }

    .btn-delete { background: #fee2e2; color: #dc2626; }
    .btn-delete:hover { background: #fecaca; }

    .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; }
    @media(max-width: 768px) { .grid-2 { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')
<div class="container">
    <div class="detail-card">
        
        <div class="card-header">
            <h3>Detail Paket Data</h3>
            <span class="id-badge">ID: #{{ $product->id }}</span>
        </div>

        <div class="card-body">
            <div class="grid-2">
                <div>
                    <div class="info-group">
                        <span class="info-label">Nama Produk</span>
                        <div class="info-value" style="font-size: 1.4rem; font-weight: 700;">
                            {{ $product->product_name }}
                        </div>
                    </div>

                    <div class="info-group">
                        <span class="info-label">Harga</span>
                        <div class="info-value text-primary">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="info-group">
                        <span class="info-label">Operator</span>
                        <span class="badge badge-operator">{{ $product->operator }}</span>
                    </div>

                    <div class="info-group">
                        <span class="info-label">Kategori AI (Machine Learning)</span>
                        <span class="badge badge-category">{{ $product->ml_category }}</span>
                        <div style="font-size: 0.8rem; color: #94a3b8; margin-top: 4px;">
                            Produk ini akan direkomendasikan jika AI memprediksi user butuh "{{ $product->ml_category }}".
                        </div>
                    </div>

                    <div class="info-group">
                        <span class="info-label">Status Popularitas</span>
                        @if($product->is_popular)
                            <span class="badge badge-popular">🔥 Produk Populer (User Baru)</span>
                        @else
                            <span class="badge badge-standard">Produk Standar (AI Only)</span>
                        @endif
                    </div>
                </div>

                <div>
                    <div class="info-group">
                        <span class="info-label">Gambar Produk</span>
                        @if($product->image_url)
                            <img src="{{ asset($product->image_url) }}" alt="{{ $product->product_name }}" class="product-image">
                        @else
                            <div style="width: 100%; height: 150px; background: #f1f5f9; border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #94a3b8; border: 2px dashed #cbd5e1;">
                                Tidak ada gambar
                            </div>
                        @endif
                    </div>

                    <div class="info-group">
                        <span class="info-label">Deskripsi</span>
                        <div class="info-value" style="font-size: 0.95rem; color: #475569; line-height: 1.6;">
                            {{ $product->description ?? 'Tidak ada deskripsi.' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="action-bar">
            <a href="{{ route('admin.products.index') }}" class="btn btn-back">Kembali</a>
            
            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-edit">
                ✏️ Edit Paket
            </a>

            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus paket ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete">🗑️ Hapus</button>
            </form>
        </div>

    </div>
</div>
@endsection
=======
@section('content')
<div class="container">
    <h3>Detail Paket</h3>

    <div class="card p-3">
        <h4>{{ $paket->product_name ?? $paket->nama }}</h4>
        @if($paket->image_url)
            <img src="{{ asset($paket->image_url) }}" alt="" style="max-width:200px; display:block; margin-bottom:10px">
        @endif
        <p><strong>Category:</strong> {{ $paket->ml_category }}</p>
        <p><strong>Operator:</strong> {{ $paket->operator }}</p>
        <p><strong>Harga:</strong> {{ $paket->formatted_price ?? $paket->formatted_harga }}</p>
        <p><strong>Deskripsi:</strong><br>{{ $paket->description ?? $paket->deskripsi }}</p>
        <p><strong>Popular:</strong> {{ $paket->is_popular ? 'Yes' : 'No' }}</p>
        <p><strong>Status:</strong> {{ $paket->status }}</p>

        <div class="mt-3">
            <a href="{{ route('admin.paket-data.edit', $paket->id) }}" class="btn btn-info">Edit</a>
            <a href="{{ route('admin.paket-data.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
