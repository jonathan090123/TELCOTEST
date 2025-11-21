@extends('layouts.app')

@section('title', 'Edit Paket Data')

{{-- admin navbar removed to use shared component resources/views/components/admin-navbar.blade.php --}}

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

    .form-card h3 { margin:0; font-weight:700; color:#0f172a; font-size:1.125rem; }
    .form-sub { color:#6b7280; font-size:0.9rem; }

    .field { margin-bottom:1rem; }
    .form-label { font-weight:600; margin-bottom:0.35rem; color:#1f2937; display:block; }
    .form-control { width:100%; padding:0.75rem 0.9rem; border:1px solid #d1d5db; border-radius:12px; background:#fff; }
    .form-control:focus { outline:none; border-color:#4f46e5; box-shadow:0 0 0 4px rgba(79,70,229,0.08); }

    .row { display:flex; gap:1rem; }
    .col { flex:1; }
    @media(max-width:720px){ .row{ flex-direction:column; } }

    .upload-box { border:2px dashed #cbd5e1; border-radius:16px; height:190px; background:#f9fafb; display:flex; justify-content:center; align-items:center; transition:.15s; }
    .upload-box:hover { border-color:#6366f1; background:#eef2ff; }
    .upload-box img { max-height:160px; border-radius:10px; object-fit:contain; }

    .file-row { display:flex; gap:0.7rem; margin-top:0.8rem; align-items:center; }
    .file-btn { background:#4f46e5; color:#fff; font-weight:600; padding:0.55rem 1rem; border:none; cursor:pointer; border-radius:10px; }
    .file-btn:hover { background:#4338ca; }
    .file-name { text-overflow:ellipsis; white-space:nowrap; overflow:hidden; max-width:180px; font-size:0.9rem; color:#475569; }

    .switch-wrapper { display:flex; align-items:center; gap:.5rem; margin-top:.3rem; }
    .switch { width:46px; height:26px; background:#d1d5db; border-radius:999px; position:relative; cursor:pointer; transition:.18s; }
    .switch::after { content:''; width:20px; height:20px; background:white; border-radius:50%; position:absolute; top:3px; left:3px; transition:.18s; box-shadow:0 3px 6px rgba(0,0,0,0.12); }
    .switch.on { background:#4f46e5; }
    .switch.on::after { left:23px; }
    .switch-input { display:none; }

    .form-actions { display:flex; justify-content:flex-end; gap:0.7rem; margin-top:1.2rem; }
    .btn { padding:0.7rem 1.2rem; border-radius:12px; font-weight:700; cursor:pointer; }
    .btn-primary { background:#4f46e5; color:#fff; box-shadow:0 10px 30px rgba(79,70,229,0.18); }
    .btn-primary:hover { background:#4338ca; }
    .btn-secondary { background:#f1f5f9; border:1px solid #d1d5db; color:#111827; }

    .muted { color:#6b7280; font-size:0.9rem; }
</style>
@endsection

@section('content')
<div class="container">
    <div class="form-card">
        <div class="card-header">
            <div>
                <h3>Edit Paket</h3>
                <div class="form-sub">Ubah detail paket data dan unggah gambar (opsional).</div>
            </div>
            <div class="muted">ID: #{{ $paket->id ?? '—' }}</div>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.paket-data.update', $paket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col">
                    <div class="field">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" name="nama" value="{{ old('nama', $paket->nama) }}" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label class="form-label">Kuota</label>
                            <input type="text" name="kuota" value="{{ old('kuota', $paket->kuota) }}" class="form-control" required>
                        </div>
                        <div style="width:180px">
                            <label class="form-label">Masa Aktif (Hari)</label>
                            <input type="number" name="masa_aktif" value="{{ old('masa_aktif', $paket->masa_aktif) }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ old('harga', $paket->harga) }}" class="form-control" required>
                        <div class="muted">Masukkan angka tanpa titik/koma.</div>
                    </div>

                    <div class="field">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $paket->deskripsi) }}</textarea>
                    </div>

                    <div class="field">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="active" {{ old('status', $paket->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                            <option value="inactive" {{ old('status', $paket->status) == 'inactive' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                    </div>

                    <div class="field">
                        <div class="switch-wrapper">
                            <div class="muted" style="font-weight:600">Populer</div>
                            <label class="switch" id="popSwitch">
                                <input type="checkbox" class="switch-input" name="is_popular" value="1" {{ $paket->is_popular ? 'checked' : '' }}>
                            </label>
                        </div>
                    </div>
                </div>

                <div style="width:310px;">
                    <label class="form-label">Gambar Paket (opsional)</label>
                    <div class="upload-box" id="imageBox">
                        @if(!empty($paket->image_url))
                            <img src="{{ asset($paket->image_url) }}" alt="Gambar Paket">
                        @else
                            <span class="muted">Belum ada gambar</span>
                        @endif
                    </div>

                    <div class="file-row">
                        <button id="fileBtn" type="button" class="file-btn">Pilih Gambar</button>
                        <span id="fileName" class="file-name"></span>
                    </div>

                    <input type="file" name="image" id="imageInput" accept="image/*" style="display:none;">

                    <div class="muted" style="margin-top:0.6rem;">Unggah file JPG/PNG. Maks 2MB.</div>
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.paket-data.index') }}" class="btn btn-secondary">Batal</a>
                <button class="btn btn-primary">Simpan Perubahan</button>
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

        if(fileBtn){ fileBtn.addEventListener('click', e => { e.preventDefault(); fileInput.click(); }); }

        if(fileInput){
            fileInput.addEventListener('change', function(){
                const file = this.files[0];
                if(!file){ fileName.textContent = ''; imageBox.innerHTML = '<span class="muted">Belum ada gambar</span>'; return; }
                fileName.textContent = file.name;
                const reader = new FileReader();
                reader.onload = e => imageBox.innerHTML = `<img src="${e.target.result}">`;
                reader.readAsDataURL(file);
            });
        }

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
