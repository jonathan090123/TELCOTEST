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

    .form-control {
        width:100%;
        padding:0.8rem 1rem;
        border:1px solid #d1d5db;
        border-radius:12px;
        background:white;
        transition: .2s;
        font-size:0.95rem;
    }

    .form-control:focus {
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
                <small>Tambah paket ke katalog secara lengkap dan rapi</small>
            </div>
            <small>Admin</small>
        </div>

        @if($errors->any())
            <div class="alert alert-danger" style="border-radius:10px;">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.paket-data.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Hidden fields to support controller expecting new names --}}
            <input type="hidden" name="product_name" id="product_name_hidden" value="{{ old('product_name') }}">
            <input type="hidden" name="price" id="price_hidden" value="{{ old('price') }}">
            <input type="hidden" name="description" id="description_hidden" value="{{ old('description') }}">

            <div class="row">
                <div class="col">

                    <div class="field">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Contoh: Paket Internet 3GB" required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="form-label">Kuota</label>
                            <input type="text" name="kuota" value="{{ old('kuota') }}" class="form-control" placeholder="Contoh: 3GB" required>
                        </div>
                        <div style="width:180px">
                            <label class="form-label">Masa Aktif (Hari)</label>
                            <input type="number" name="masa_aktif" value="{{ old('masa_aktif') }}" class="form-control" placeholder="30" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ old('harga') }}" class="form-control" placeholder="100000" required>
                        <div class="muted">Masukkan angka tanpa titik/koma.</div>
                    </div>

                    <div class="field">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" placeholder="Opsional, isi deskripsi paket">{{ old('deskripsi') }}</textarea>
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
                <a href="{{ route('admin.paket-data.index') }}" class="btn btn-secondary">Batal</a>
                <button class="btn btn-primary">Simpan Paket</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){

    const fileBtn = document.getElementById('fileBtn');
    const fileInput = document.getElementById('imageInput');
    const fileName = document.getElementById('fileName');
    const imageBox = document.getElementById('imageBox');

    console.log('DOM loaded - Elements:', {
        fileBtn: !!fileBtn,
        fileInput: !!fileInput,
        fileName: !!fileName,
        imageBox: !!imageBox
    });

    // Ensure file input exists and add change listener
    if(fileInput) {
        fileInput.addEventListener('change', function(){
            console.log('Change event: files count =', this.files.length);
            
            if(this.files.length === 0) {
                console.log('No file selected');
                if(fileName) fileName.textContent = '';
                if(imageBox) imageBox.innerHTML = '<span class="muted">Belum ada gambar</span>';
                return;
            }

            const file = this.files[0];
            console.log('File:', file.name, 'Type:', file.type, 'Size:', file.size);
            
            if(fileName) fileName.textContent = file.name;
            
            // Read file and create preview
            const reader = new FileReader();
            
            reader.onload = function(event) {
                console.log('FileReader loaded, inserting image');
                const dataUrl = event.target.result;
                if(imageBox) {
                    imageBox.innerHTML = '<img src="' + dataUrl + '" alt="Preview" style="max-height:150px; max-width:100%; border-radius:10px; object-fit:contain;">';
                    console.log('Image inserted to imageBox');
                }
            };
            
            reader.onerror = function(err) {
                console.error('FileReader error:', err);
                if(imageBox) imageBox.innerHTML = '<span class="muted">Error membaca file</span>';
            };
            
            console.log('Starting readAsDataURL...');
            reader.readAsDataURL(file);
        });
    } else {
        console.error('imageInput element not found!');
    }

    // Toggle switch handler
    const switchEl = document.getElementById('popSwitch');
    if(switchEl){
        const input = switchEl.querySelector('.switch-input');
        function sync(){ switchEl.classList.toggle('on', input.checked); }
        sync();
        switchEl.addEventListener('click', () => { input.checked = !input.checked; sync(); });
    }
});
</script>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function(){
    const form = document.querySelector('form[action="{{ route('admin.paket-data.store') }}"]');
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
