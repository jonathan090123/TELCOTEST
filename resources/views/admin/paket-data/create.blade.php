@extends('layouts.app')

@section('title', 'Buat Paket Baru')

@section('extra-styles')
<style>
    body { background:#f8fafc; }

    .container {
        max-width: 1050px;
        margin: 2.8rem auto;
        padding: 0 1rem;
        font-family: Inter, system-ui, sans-serif;
    }

    .form-card {
        background: #ffffff;
        border-radius: 18px;
        border:1px solid #e5e7eb;
        padding: 2.2rem;
        box-shadow: 0 12px 28px rgba(0,0,0,0.05);
        transition: .25s;
    }

    .form-card:hover {
        box-shadow: 0 18px 40px rgba(0,0,0,0.09);
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
    .field { margin-bottom:1.2rem; }

    .form-label {
        font-weight:600;
        margin-bottom:0.35rem;
        color:#1f2937;
        font-size:0.93rem;
        display:block;
    }

    .form-control, .form-select {
        width:100%;
        padding:0.8rem 1rem;
        border:1px solid #d1d5db;
        border-radius:12px;
        background:white;
        transition: .2s;
        font-size:0.95rem;
    }

    .form-control:focus, .form-select:focus {
        border-color:#4f46e5;
        box-shadow:0 0 0 3px rgba(79,70,229,0.15);
        outline:none;
    }

    .muted { font-size:0.88rem; color:#6b7280; }

    /* Row */
    .row { display:flex; gap:1.2rem; }
    .col { flex:1; }
    @media(max-width:720px) { .row { flex-direction: column; } }

    /* Image Upload */
    .upload-box {
        border:2px dashed #cbd5e1;
        border-radius:16px;
        height:190px;
        background:#f9fafb;
        display:flex;
        justify-content:center;
        align-items:center;
        transition:.2s;
    }

    .upload-box:hover {
        border-color:#6366f1;
        background:#eef2ff;
    }

    .upload-box img {
        max-height:150px;
        border-radius:10px;
        object-fit:contain;
    }

    .file-row {
        display:flex;
        gap:0.7rem;
        margin-top:0.8rem;
        align-items:center;
    }

    .file-btn {
        background:#4f46e5;
        color:#fff;
        font-weight:600;
        padding:0.55rem 1rem;
        border:none;
        cursor:pointer;
        border-radius:10px;
        transition:.2s;
        display: inline-block;
        text-align: center;
    }

    .file-btn:hover { background:#4338ca; }

    .file-name {
        text-overflow:ellipsis;
        white-space:nowrap;
        overflow:hidden;
        max-width:180px;
        font-size:0.9rem;
        color:#475569;
    }

    /* Toggle Switch */
    .switch-wrapper { display:flex; align-items:center; gap:.5rem; margin-top:.5rem; }
    .toggle-text { font-weight:600; font-size:.95rem; color:#1f2937; }
    
    .switch {
        width:46px; height:26px;
        background:#d1d5db;
        border-radius:999px;
        position:relative;
        cursor:pointer;
        transition:.2s;
    }
    .switch::after {
        content:''; width:20px; height:20px;
        background:white; border-radius:50%;
        position:absolute; top:3px; left:3px;
        transition:.2s;
        box-shadow:0 3px 6px rgba(0,0,0,0.15);
    }
    .switch.on { background:#4f46e5; }
    .switch.on::after { left:23px; }
    .switch-input { display:none; }

    /* Buttons */
    .form-actions {
        display:flex;
        justify-content:flex-end;
        gap:0.7rem;
        margin-top:2rem;
    }

    .btn {
        padding:0.75rem 1.4rem;
        border-radius:14px;
        font-weight:700;
        cursor:pointer;
        transition:.2s;
        font-size:.95rem;
        border:none;
        text-decoration: none;
    }

    .btn-primary {
        background:#4f46e5;
        color:#fff;
        box-shadow:0 10px 25px rgba(79,70,229,0.25);
    }

    .btn-primary:hover { background:#4338ca; }

    .btn-secondary {
        background:#f1f5f9;
        border:1px solid #d1d5db;
        color:#111;
    }

    .btn-secondary:hover {
        background:#e2e8f0;
    }
</style>
@endsection


@section('content')
<div class="container">
    <div class="form-card">

        <div class="header-title">
            <div>
                <h3>Buat Paket Baru</h3>
                <small>Tambah paket ke katalog agar bisa direkomendasikan AI</small>
            </div>
            <small>Admin Panel</small>
        </div>

        @if($errors->any())
            <div class="alert alert-danger" style="border-radius:10px; padding:1rem; background:#fee2e2; border:1px solid #fecaca; color:#991b1b; margin-bottom:1.5rem;">
                <ul style="margin:0; padding-left:1.5rem;">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col">

                    <div class="field">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}" placeholder="Contoh: Paket Sultan 100GB" required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="form-label">Operator</label>
                            <select name="operator" class="form-select" required>
                                <option value="" disabled selected>-- Pilih Operator --</option>
                                @foreach($operators as $op)
                                    <option value="{{ $op }}" {{ old('operator') == $op ? 'selected' : '' }}>{{ $op }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col">
                            <label class="form-label">Harga (Rp)</label>
                            <input type="number" name="price" value="{{ old('price') }}" class="form-control" placeholder="100000" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="form-label" style="color:#4f46e5;">Kategori AI (Machine Learning)</label>
                        <select name="ml_category" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Kategori Kebutuhan --</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('ml_category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                        <div class="muted" style="margin-top:0.3rem;">Pilih kategori yang tepat agar AI bisa merekomendasikannya ke user yang sesuai.</div>
                    </div>

                    <div class="field">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Jelaskan detail paket...">{{ old('description') }}</textarea>
                    </div>
                    
                    <div class="switch-wrapper">
                        <div class="switch" id="popSwitch">
                            <input type="checkbox" name="is_popular" value="1" class="switch-input" {{ old('is_popular') ? 'checked' : '' }}>
                        </div>
                        <span class="toggle-text">Jadikan Produk Populer (Untuk User Baru)</span>
                    </div>

                </div>

                <div style="width:310px;">
                    <label class="form-label">Gambar Paket (Opsional)</label>
                    <div class="upload-box" id="imageBox"><span class="muted">Belum ada gambar</span></div>

                    <div class="file-row">
                        <label for="imageInput" id="fileBtn" class="file-btn">Pilih Gambar</label>
                        <span id="fileName" class="file-name"></span>
                    </div>

                    <input type="file" name="image" id="imageInput" accept="image/*" style="display:none;">

                    <div class="muted" style="margin-top:0.5rem;">Disarankan 800×600 — Maks 2MB.</div>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan Paket</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){

    // File Upload Logic (Sama seperti kode frontend)
    const fileInput = document.getElementById('imageInput');
    const fileName = document.getElementById('fileName');
    const imageBox = document.getElementById('imageBox');

    if(fileInput) {
        fileInput.addEventListener('change', function(){
            if(this.files.length === 0) {
                if(fileName) fileName.textContent = '';
                if(imageBox) imageBox.innerHTML = '<span class="muted">Belum ada gambar</span>';
                return;
            }

            const file = this.files[0];
            if(fileName) fileName.textContent = file.name;
            
            const reader = new FileReader();
            reader.onload = function(event) {
                const dataUrl = event.target.result;
                if(imageBox) {
                    imageBox.innerHTML = '<img src="' + dataUrl + '" alt="Preview" style="max-height:150px; max-width:100%; border-radius:10px; object-fit:contain;">';
                }
            };
            reader.readAsDataURL(file);
        });
    }

    // Toggle Switch Logic
    const switchEl = document.getElementById('popSwitch');
    if(switchEl){
        const input = switchEl.querySelector('.switch-input');
        function sync(){ 
            if(input.checked) switchEl.classList.add('on'); 
            else switchEl.classList.remove('on');
        }
        sync();
        switchEl.addEventListener('click', () => { 
            input.checked = !input.checked; 
            sync(); 
        });
    }
});
</script>
@endsection