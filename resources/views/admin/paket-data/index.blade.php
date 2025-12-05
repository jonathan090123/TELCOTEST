@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Edit Paket Data')

{{-- CSS dari Frontend Baru --}}
@section('extra-styles')
<style>
    body { background:#f8fafc; }

    .container {
        max-width: 1050px;
        margin: 2.2rem auto;
        padding: 0 1rem;
        font-family: Inter, system-ui, sans-serif;
    }

    .form-card {
        background: #ffffff;
        border-radius: 14px;
        border:1px solid #e5e7eb;
        padding: 1.8rem;
        box-shadow: 0 10px 28px rgba(0,0,0,0.05);
        transition: .18s;
    }

    .header-title {
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:1.4rem;
        border-bottom:1px solid #e5e7eb;
        padding-bottom:1rem;
    }

    .header-title h3 {
        font-size: 1.35rem;
        margin:0;
        font-weight:700;
        color:#111827;
    }

    .header-title small {
        color:#6b7280;
        font-size:0.88rem;
        background:#f1f5f9;
        padding:4px 10px;
        border-radius:6px;
    }

    /* Form Styling */
    .field { margin-bottom:1rem; }
    .form-label { font-weight:600; margin-bottom:0.35rem; color:#1f2937; display:block; font-size:0.93rem; }
    
    .form-control, .form-select {
        width:100%;
        padding:0.75rem 0.9rem;
        border:1px solid #d1d5db;
        border-radius:12px;
        background:#fff;
        font-size:0.95rem;
        transition: border-color 0.2s;
    }
    
    .form-control:focus, .form-select:focus {
        outline:none;
        border-color:#4f46e5;
        box-shadow:0 0 0 4px rgba(79,70,229,0.08);
    }

    .row { display:flex; gap:1rem; }
    .col { flex:1; }
    @media(max-width:720px){ .row{ flex-direction:column; } }

    /* Image Upload Style */
    .upload-box {
        border:2px dashed #cbd5e1;
        border-radius:16px;
        height:190px;
        background:#f9fafb;
        display:flex;
        justify-content:center;
        align-items:center;
        transition:.15s;
        overflow: hidden;
    }

    .upload-box img {
        max-height:100%;
        max-width: 100%;
        object-fit:contain;
    }

    .file-row { display:flex; gap:0.7rem; margin-top:0.8rem; align-items:center; }
    .file-btn { 
        background:#4f46e5; color:#fff; font-weight:600; padding:0.55rem 1rem; 
        border:none; cursor:pointer; border-radius:10px; font-size: 0.9rem;
        text-align: center; display: inline-block;
    }
    .file-btn:hover { background:#4338ca; }
    .file-name { text-overflow:ellipsis; white-space:nowrap; overflow:hidden; max-width:180px; font-size:0.9rem; color:#475569; }

    /* Switch Style */
    .switch-wrapper { display:flex; align-items:center; gap:.5rem; margin-top:.3rem; }
    .switch { width:46px; height:26px; background:#d1d5db; border-radius:999px; position:relative; cursor:pointer; transition:.18s; }
    .switch::after { content:''; width:20px; height:20px; background:white; border-radius:50%; position:absolute; top:3px; left:3px; transition:.18s; box-shadow:0 3px 6px rgba(0,0,0,0.12); }
    .switch.on { background:#4f46e5; }
    .switch.on::after { left:23px; }
    .switch-input { display:none; }

    /* Buttons */
    .form-actions { display:flex; justify-content:flex-end; gap:0.7rem; margin-top:1.2rem; }
    .btn { padding:0.7rem 1.2rem; border-radius:12px; font-weight:700; cursor:pointer; text-decoration:none; display:inline-block; text-align:center;}
    .btn-primary { background:#4f46e5; color:#fff; border:none; }
    .btn-primary:hover { background:#4338ca; }
    .btn-secondary { background:#f1f5f9; border:1px solid #d1d5db; color:#111827; }
    .btn-secondary:hover { background:#e2e8f0; }

    .muted { color:#6b7280; font-size:0.9rem; }
    
    /* Alert Error */
    .alert-danger {
        padding: 1rem; background: #fee2e2; color: #991b1b; 
        border-radius: 10px; margin-bottom: 1.5rem; list-style-position: inside;
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="form-card">
        
        <!-- Header -->
        <div class="header-title">
            <div>
                <h3>Edit Paket Data</h3>
                <div class="muted">Perbarui informasi paket agar sesuai dengan penawaran terbaru.</div>
            </div>
            <small>ID: #{{ $product->id }}</small>
        </div>

        <!-- Error Display -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul style="margin:0;">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Update (Route ke Resource Controller) -->
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- KOLOM KIRI: Input Data -->
                <div class="col">
                    
                    <!-- Nama Produk -->
                    <div class="field">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}" class="form-control" required>
                    </div>

                    <div class="row">
                        <!-- Operator (Dropdown) -->
                        <div class="col">
                            <label class="form-label">Operator</label>
                            <select name="operator" class="form-select" required>
                                <option value="" disabled>Pilih Operator</option>
                                @foreach($operators as $op)
                                    <option value="{{ $op }}" {{ old('operator', $product->operator) == $op ? 'selected' : '' }}>
                                        {{ $op }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Harga -->
                        <div class="col">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
                        </div>
                    </div>

                    <!-- Kategori ML (Dropdown Penting) -->
                    <div class="field">
                        <label class="form-label" style="color:#4f46e5;">Kategori AI (Machine Learning)</label>
                        <select name="ml_category" class="form-select" required>
                            <option value="" disabled>Pilih Kategori Kebutuhan</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('ml_category', $product->ml_category) == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                        <div class="muted" style="margin-top:0.3rem; font-size:0.85rem;">
                            Pilih kategori yang tepat agar AI tidak salah merekomendasikan.
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div class="field">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <!-- Switch Populer -->
                    <div class="field">
                        <div class="switch-wrapper">
                            <label class="switch" id="popSwitch">
                                <input type="hidden" name="is_popular" value="0">
                                <input type="checkbox" class="switch-input" name="is_popular" value="1" {{ $product->is_popular ? 'checked' : '' }}>
                            </label>
                            <div class="muted" style="font-weight:600; margin-left: 5px;">
                                Jadikan Produk Populer (Untuk User Baru)
                            </div>
                        </div>
                    </div>

                </div>

                <!-- KOLOM KANAN: Upload Gambar -->
                <div style="width:310px;">
                    <label class="form-label">Gambar Paket</label>
                    
                    <!-- Preview Area -->
                    <div class="upload-box" id="imageBox">
                        @if($product->image_url)
                            <!-- Jika sudah ada gambar, tampilkan (gunakan asset helper) -->
                            <img src="{{ asset($product->image_url) }}" alt="Preview">
                        @else
                            <span class="muted">Belum ada gambar</span>
                        @endif
                    </div>

                    <div class="file-row">
                        <button type="button" id="fileBtn" class="file-btn">Ganti Gambar</button>
                        <span id="fileName" class="file-name"></span>
                    </div>

                    <!-- Input File (Hidden) -->
                    <input type="file" name="image" id="imageInput" accept="image/*" style="display:none;">
                    
                    <div class="muted" style="margin-top:0.6rem;">
                        Format: JPG, PNG. Maks 2MB.
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="form-actions">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){

    // 1. File Upload Logic (Preview Gambar)
    const fileBtn = document.getElementById('fileBtn');
    const fileInput = document.getElementById('imageInput');
    const fileName = document.getElementById('fileName');
    const imageBox = document.getElementById('imageBox');

    if(fileBtn && fileInput){
        // Klik tombol trigger input file
        fileBtn.addEventListener('click', e => { e.preventDefault(); fileInput.click(); });
        
        // Saat file dipilih
        fileInput.addEventListener('change', function(){
            const file = this.files[0];
            if(!file){ return; }
            
            // Tampilkan nama file
            fileName.textContent = file.name;
            
            // Tampilkan preview gambar
            const reader = new FileReader();
            reader.onload = e => imageBox.innerHTML = `<img src="${e.target.result}">`;
            reader.readAsDataURL(file);
        });
    }

    // 2. Switch Logic (Efek Visual Toggle)
    const switchEl = document.getElementById('popSwitch');
    if(switchEl){
        const input = switchEl.querySelector('.switch-input');
        
        function sync(){ 
            if(input.checked) switchEl.classList.add('on'); 
            else switchEl.classList.remove('on');
        }
        
        // Sync saat load (agar toggle nyala jika is_popular = 1)
        sync();
        
        // Click event
        switchEl.addEventListener('click', () => { 
            input.checked = !input.checked; 
            sync(); 
        });
    }
});
</script>
@endsection
=======
@section('title', 'Kelola Paket Data')

@section('extra-styles')
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #667eea;
            padding-bottom: 1rem;
        }

        .page-header h1 {
            color: #333;
            font-size: 2rem;
        }

        .btn-create {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.18s, box-shadow 0.18s;
            font-size: 0.95rem;
            margin-left: 0 !important;
            margin-right: 1rem !important;
            transform: translateX(-8px);
        }

        .page-header .btn-create { margin-left: auto; align-self: center; }

        .btn-create:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.28);
        }

        .filter-section {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .filter-group {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .paket-table {
            width: 100%;
            border-collapse: collapse;
        }

        .paket-table thead {
            background: #667eea;
            color: white;
        }

        .paket-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .paket-table td {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        .paket-table tbody tr:hover {
            background: #f8f9fa;
        }

        .status-badge {
            display: inline-block;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .status-active {
            background: #d4edda;
            color: #155724;
        }

        .status-inactive {
            background: #f8d7da;
            color: #721c24;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.3s;
            font-size: 0.9rem;
        }

        .btn-edit {
            background: #667eea;
            color: white;
        }

        .btn-delete {
            background: #e74c3c;
            color: white;
        }

        .btn-action:hover {
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #999;
        }

        .empty-state-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .btn-back {
            background: #f0f0f0;
            color: #333;
        }

        .btn-back:hover {
            background: #e0e0e0;
        }

        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .paket-table {
                font-size: 0.9rem;
            }

            .paket-table th,
            .paket-table td {
                padding: 0.7rem;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
@endsection

@section('content')
<div class="admin-container">
    <div class="page-header">
        <h1>📦 Kelola Paket Data</h1>
        <a href="{{ route('admin.paket-data.create') }}" class="btn-create">+ Tambah Paket</a>
    </div>

    <div class="filter-section">
        <div class="filter-group">
            <a href="{{ route('admin.dashboard') }}" class="btn-action btn-back">← Kembali ke Dashboard</a>
        </div>
    </div>

    @if(isset($pakets) && $pakets->count() > 0)
        <div class="table-container">
            <table class="paket-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Kuota / Category</th>
                        <th>Masa Aktif</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pakets as $paket)
                        <tr>
                            <td>{{ $paket->product_name ?? $paket->nama }}</td>
                            <td>{{ $paket->ml_category ?? $paket->kuota }}</td>
                            <td>{{ $paket->masa_aktif ?? '-' }} hari</td>
                            <td>{{ $paket->formatted_price ?? $paket->formatted_harga ?? 'Rp ' . number_format($paket->price ?? $paket->harga ?? 0,0,',','.') }}</td>
                            <td>
                                <span class="status-badge status-{{ $paket->status }}">
                                    {{ ucfirst($paket->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.paket-data.edit', $paket->id) }}" class="btn-action btn-edit">Edit</a>
                                    <form action="{{ route('admin.paket-data.destroy', $paket->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus paket ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center;">Tidak ada data paket</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $pakets->links() }}
        </div>
    @else
        <div class="table-container">
            <div class="empty-state">
                <div class="empty-state-icon">📦</div>
                <h3>Belum ada paket data</h3>
                <p>Belum ada paket data yang terdaftar</p>
                <div style="margin-top: 1.5rem;">
                    <a href="{{ route('admin.paket-data.create') }}" class="btn-create">Tambah Paket Pertama</a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
