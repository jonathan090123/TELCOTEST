@extends('layouts.app')

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
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
            </div>
        </form>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){

    // File Upload Logic
    const fileBtn = document.getElementById('fileBtn');
    const fileInput = document.getElementById('imageInput');
    const fileName = document.getElementById('fileName');
    const imageBox = document.getElementById('imageBox');

    if(fileBtn && fileInput){
        fileBtn.addEventListener('click', e => { e.preventDefault(); fileInput.click(); });
        
        fileInput.addEventListener('change', function(){
            const file = this.files[0];
            if(!file){ return; }
            fileName.textContent = file.name;
            
            const reader = new FileReader();
            reader.onload = e => imageBox.innerHTML = `<img src="${e.target.result}">`;
            reader.readAsDataURL(file);
        });
    }

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