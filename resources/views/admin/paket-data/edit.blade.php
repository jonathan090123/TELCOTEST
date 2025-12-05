@extends('layouts.app')

<<<<<<< HEAD
@section('title', 'Edit Paket')

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

    /* Form */
    .field { margin-bottom:1rem; }
    .form-label { font-weight:600; margin-bottom:0.35rem; color:#1f2937; display:block; font-size:0.93rem; }
    
    .form-control, .form-select {
        width:100%;
        padding:0.75rem 0.9rem;
        border:1px solid #d1d5db;
        border-radius:12px;
        background:#fff;
        font-size:0.95rem;
    }
    
    .form-control:focus, .form-select:focus {
        outline:none;
        border-color:#4f46e5;
        box-shadow:0 0 0 4px rgba(79,70,229,0.08);
    }

    .row { display:flex; gap:1rem; }
    .col { flex:1; }
    @media(max-width:720px){ .row{ flex-direction:column; } }

    /* Image Upload */
    .upload-box {
        border:2px dashed #cbd5e1;
        border-radius:16px;
        height:190px;
        background:#f9fafb;
        display:flex;
        justify-content:center;
        align-items:center;
        transition:.15s;
    }

    .upload-box img {
        max-height:160px;
        border-radius:10px;
        object-fit:contain;
    }

    .file-row { display:flex; gap:0.7rem; margin-top:0.8rem; align-items:center; }
    .file-btn { background:#4f46e5; color:#fff; font-weight:600; padding:0.55rem 1rem; border:none; cursor:pointer; border-radius:10px; }
    .file-name { text-overflow:ellipsis; white-space:nowrap; overflow:hidden; max-width:180px; font-size:0.9rem; color:#475569; }

    /* Switch */
    .switch-wrapper { display:flex; align-items:center; gap:.5rem; margin-top:.3rem; }
    .switch { width:46px; height:26px; background:#d1d5db; border-radius:999px; position:relative; cursor:pointer; transition:.18s; }
    .switch::after { content:''; width:20px; height:20px; background:white; border-radius:50%; position:absolute; top:3px; left:3px; transition:.18s; box-shadow:0 3px 6px rgba(0,0,0,0.12); }
    .switch.on { background:#4f46e5; }
    .switch.on::after { left:23px; }
    .switch-input { display:none; }

    .form-actions { display:flex; justify-content:flex-end; gap:0.7rem; margin-top:1.2rem; }
    .btn { padding:0.7rem 1.2rem; border-radius:12px; font-weight:700; cursor:pointer; text-decoration:none; display:inline-block; text-align:center;}
    .btn-primary { background:#4f46e5; color:#fff; border:none; }
    .btn-secondary { background:#f1f5f9; border:1px solid #d1d5db; color:#111827; }

    .muted { color:#6b7280; font-size:0.9rem; }
</style>
@endsection

@section('content')
<div class="container">
    <div class="form-card">
        <div class="header-title">
            <div>
                <h3>Edit Paket</h3>
                <div class="muted">Ubah detail paket data agar sesuai dengan penawaran terbaru.</div>
            </div>
            <small>ID: #{{ $product->id }}</small>
        </div>

        @if($errors->any())
            <div class="alert alert-danger" style="padding:1rem; background:#fee2e2; color:#991b1b; border-radius:10px; margin-bottom:1.5rem;">
                <ul style="margin:0; padding-left:1.5rem;">
=======
@section('title', 'Edit Paket Data')

@section('content')
<div class="max-w-4xl mx-auto my-12 px-4">
    <div class="bg-white rounded-2xl border border-gray-200 p-9 shadow-lg hover:shadow-xl transition-shadow">
        
        <div class="flex justify-between items-start mb-6 border-b border-gray-200 pb-4">
            <div>
                <h3 class="text-2xl font-bold text-gray-900">Edit Paket</h3>
                <p class="text-sm text-gray-500">Ubah detail paket data dan unggah gambar (opsional).</p>
            </div>
            <span class="text-sm text-gray-600 bg-slate-100 px-3 py-1 rounded-lg">ID: #{{ $paket->id ?? '—' }}</span>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <ul class="list-disc list-inside text-red-700 text-sm space-y-1">
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

<<<<<<< HEAD
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col">
                    <div class="field">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" name="product_name" value="{{ old('product_name', $product->product_name) }}" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="form-label">Operator</label>
                            <select name="operator" class="form-select" required>
                                @foreach($operators as $op)
                                    <option value="{{ $op }}" {{ old('operator', $product->operator) == $op ? 'selected' : '' }}>
                                        {{ $op }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="form-label" style="color:#4f46e5;">Kategori AI (Machine Learning)</label>
                        <select name="ml_category" class="form-select" required>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('ml_category', $product->ml_category) == $cat ? 'selected' : '' }}>
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                        <div class="muted" style="margin-top:0.3rem; font-size:0.85rem;">Pastikan kategori sesuai agar AI tidak salah rekomendasi.</div>
                    </div>

                    <div class="field">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="field">
                        <div class="switch-wrapper">
                            <div class="muted" style="font-weight:600">Produk Populer (Untuk User Baru)</div>
                            <label class="switch" id="popSwitch">
                                <input type="hidden" name="is_popular" value="0">
                                <input type="checkbox" class="switch-input" name="is_popular" value="1" {{ $product->is_popular ? 'checked' : '' }}>
                            </label>
                        </div>
                    </div>

                </div>

                <div style="width:310px;">
                    <label class="form-label">Gambar Paket</label>
                    <div class="upload-box" id="imageBox">
                        @if($product->image_url)
                            <img src="{{ asset($product->image_url) }}" alt="Preview">
                        @else
                            <span class="muted">Belum ada gambar</span>
                        @endif
                    </div>

                    <div class="file-row">
                        <button type="button" id="fileBtn" class="file-btn">Ganti Gambar</button>
                        <span id="fileName" class="file-name"></span>
                    </div>

                    <input type="file" name="image" id="imageInput" accept="image/*" style="display:none;">
                    <div class="muted" style="margin-top:0.6rem;">Disarankan 800×600 — Maks 2MB.</div>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
=======
        <form action="{{ route('admin.paket-data.update', $paket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Hidden fields to support controller expecting new names --}}
            <input type="hidden" name="product_name" id="product_name_hidden" value="{{ old('product_name', $paket->product_name ?? $paket->nama) }}">
            <input type="hidden" name="price" id="price_hidden" value="{{ old('price', $paket->price ?? $paket->harga) }}">
            <input type="hidden" name="description" id="description_hidden" value="{{ old('description', $paket->description ?? $paket->deskripsi) }}">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-5">
                    
                    <div>
                        <label class="block font-semibold text-gray-800 text-sm mb-2">Nama Paket</label>
                        <input type="text" name="nama" value="{{ old('nama', $paket->nama) }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl bg-white focus:border-indigo-500 focus:ring-3 focus:ring-indigo-100 focus:outline-none transition text-sm" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-semibold text-gray-800 text-sm mb-2">Kuota</label>
                            <input type="text" name="kuota" value="{{ old('kuota', $paket->kuota) }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl bg-white focus:border-indigo-500 focus:ring-3 focus:ring-indigo-100 focus:outline-none transition text-sm" required>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 text-sm mb-2">Masa Aktif (Hari)</label>
                            <input type="number" name="masa_aktif" value="{{ old('masa_aktif', $paket->masa_aktif) }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl bg-white focus:border-indigo-500 focus:ring-3 focus:ring-indigo-100 focus:outline-none transition text-sm" required>
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-800 text-sm mb-2">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ old('harga', $paket->harga) }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl bg-white focus:border-indigo-500 focus:ring-3 focus:ring-indigo-100 focus:outline-none transition text-sm" required>
                        <p class="text-xs text-gray-500 mt-1">Masukkan angka tanpa titik/koma.</p>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-800 text-sm mb-2">Deskripsi</label>
                        <textarea name="deskripsi" class="w-full px-4 py-2 border border-gray-300 rounded-xl bg-white focus:border-indigo-500 focus:ring-3 focus:ring-indigo-100 focus:outline-none transition text-sm" rows="4">{{ old('deskripsi', $paket->deskripsi) }}</textarea>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-800 text-sm mb-2">Status</label>
                        <select name="status" class="w-full px-4 py-2 border border-gray-300 rounded-xl bg-white focus:border-indigo-500 focus:ring-3 focus:ring-indigo-100 focus:outline-none transition text-sm" required>
                            <option value="active" {{ old('status', $paket->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $paket->status) == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <div>
                        <div class="flex items-center gap-3">
                            <span class="font-semibold text-gray-800 text-sm">Populer</span>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" name="is_popular" value="1" {{ $paket->is_popular ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <label class="block font-semibold text-gray-800 text-sm mb-3">Gambar Paket (Opsional)</label>
                    
                    <div class="border-2 border-dashed border-slate-300 rounded-2xl h-48 bg-slate-50 flex justify-center items-center mb-4 hover:border-indigo-400 hover:bg-indigo-50 transition overflow-hidden" id="imageBox">
                        @if(!empty($paket->image_url))
                            <img src="{{ asset($paket->image_url) }}" alt="Gambar Paket" class="max-h-40 max-w-full rounded-lg object-contain">
                        @else
                            <span class="text-xs text-gray-500">Belum ada gambar</span>
                        @endif
                    </div>

                    <div class="flex gap-2 items-center mb-2">
                        <label for="imageInput" id="fileBtn" class="bg-indigo-600 text-white font-semibold px-4 py-2 rounded-xl cursor-pointer hover:bg-indigo-700 transition text-sm">
                            Pilih Gambar
                        </label>
                        <span id="fileName" class="text-xs text-gray-600 truncate max-w-xs"></span>
                    </div>

                    <input type="file" name="image" id="imageInput" accept="image/*" class="hidden">

                    <p class="text-xs text-gray-500 mt-2">Unggah file JPG/PNG. Maks 2MB.</p>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-8">
                <a href="{{ route('admin.paket-data.index') }}" class="px-6 py-2 bg-slate-100 border border-gray-300 text-gray-900 font-semibold rounded-2xl hover:bg-gray-200 transition text-sm">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-2xl hover:bg-indigo-700 transition shadow-lg hover:shadow-xl text-sm">
                    Simpan Perubahan
                </button>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
            </div>
        </form>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){

<<<<<<< HEAD
    // File Upload Logic
    const fileBtn = document.getElementById('fileBtn');
=======
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
    const fileInput = document.getElementById('imageInput');
    const fileName = document.getElementById('fileName');
    const imageBox = document.getElementById('imageBox');

<<<<<<< HEAD
    if(fileBtn && fileInput){
        fileBtn.addEventListener('click', e => { e.preventDefault(); fileInput.click(); });
        
        fileInput.addEventListener('change', function(){
            const file = this.files[0];
            if(!file){ return; }
            fileName.textContent = file.name;
            
            const reader = new FileReader();
            reader.onload = e => imageBox.innerHTML = `<img src="${e.target.result}">`;
=======
    // Handle file input change
    if(fileInput) {
        fileInput.addEventListener('change', function(){
            console.log('Change event: files count =', this.files.length);
            
            if(this.files.length === 0) {
                if(fileName) fileName.textContent = '';
                if(imageBox) imageBox.innerHTML = '<span class="text-xs text-gray-500">Belum ada gambar</span>';
                return;
            }

            const file = this.files[0];
            console.log('File:', file.name, 'Type:', file.type, 'Size:', file.size);
            
            if(fileName) fileName.textContent = file.name;
            
            // Read file and create preview
            const reader = new FileReader();
            
            reader.onload = function(event) {
                const dataUrl = event.target.result;
                if(imageBox) {
                    imageBox.innerHTML = '<img src="' + dataUrl + '" alt="Preview" class="max-h-40 max-w-full rounded-lg object-contain">';
                }
            };
            
            reader.onerror = function(err) {
                console.error('FileReader error:', err);
                if(imageBox) imageBox.innerHTML = '<span class="text-xs text-red-500">Error membaca file</span>';
            };
            
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
            reader.readAsDataURL(file);
        });
    }

<<<<<<< HEAD
    // Switch Logic
    const switchEl = document.getElementById('popSwitch');
    if(switchEl){
        const input = switchEl.querySelector('.switch-input');
        function sync(){ 
            if(input.checked) switchEl.classList.add('on'); 
            else switchEl.classList.remove('on');
        }
        sync();
        switchEl.addEventListener('click', () => { input.checked = !input.checked; sync(); });
    }
});
</script>
@endsection
=======
    // Toggle switch handler (using native checkbox instead)
    const checkbox = document.querySelector('input[name="is_popular"]');
    if(checkbox) {
        // Native checkbox styling via Tailwind already applied
        console.log('Popular checkbox found and ready');
    }
});
</script>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function(){
    const form = document.querySelector('form[action="{{ route('admin.paket-data.update', $paket->id) }}"]');
    if(!form) return;
    form.addEventListener('submit', function(){
        const nama = document.querySelector('input[name="nama"]')?.value || '';
        const harga = document.querySelector('input[name="harga"]')?.value || '';
        const deskripsi = document.querySelector('textarea[name="deskripsi"]')?.value || '';
        const pName = document.getElementById('product_name_hidden');
        const pPrice = document.getElementById('price_hidden');
        const pDesc = document.getElementById('description_hidden');
        if(pName) pName.value = nama;
        if(pPrice) pPrice.value = harga;
        if(pDesc) pDesc.value = deskripsi;
    });
});
</script>
>>>>>>> 0eab01df4ad7438c9172a090608b763634bb7e18
