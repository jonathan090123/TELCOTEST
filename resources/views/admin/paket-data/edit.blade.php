@extends('layouts.app')

@section('title', 'Edit Paket Data')

{{-- admin navbar removed to use shared component resources/views/components/admin-navbar.blade.php --}}

@section('extra-styles')
    <style>
        /* Page container */
        .container { max-width: 1000px; margin: 2.5rem auto; padding: 0 1rem; }

        /* Card */
        .form-card { background: #fff; border-radius: 12px; box-shadow: 0 6px 24px rgba(15,23,42,0.08); padding: 1.25rem; overflow: hidden; }
        .form-card .card-header { display:flex; align-items:center; justify-content:space-between; gap:1rem; margin-bottom:1rem; }
        .form-card h3 { margin:0; font-size:1.125rem; color:#111827; }
        .form-sub { color:#6b7280; font-size:0.9rem; }

        /* Grid layout for inputs */
        .form-grid { display:grid; grid-template-columns: 1fr; gap:1rem; }
        @media(min-width:768px){ .form-grid { grid-template-columns: 1fr 320px; align-items:start; } }

        .left-col { display:block; }
        .right-col { min-width:0; }

        .field { margin-bottom:0.9rem; }
        .form-label { display:block; font-weight:700; margin-bottom:0.35rem; color:#374151; font-size:0.95rem; }
        .form-control { width:100%; padding:0.65rem 0.85rem; border:1px solid #e6eef6; border-radius:10px; background:#fbfdff; color:#0f172a; }
        .form-control:focus { outline:none; border-color:#6366f1; box-shadow: 0 6px 18px rgba(99,102,241,0.08); }
        textarea.form-control { min-height:120px; resize:vertical; }

        /* Image preview box */
        .image-box { border:1px dashed #e6eef6; border-radius:10px; padding:0.6rem; display:flex; align-items:center; justify-content:center; height:160px; background:#fbfdff; }
        .image-box img { max-height:140px; object-fit:contain; }
        .file-input { display:block; margin-top:0.6rem; }

        /* Actions */
        .form-actions { display:flex; justify-content:flex-end; gap:0.6rem; margin-top:1rem; }
        .btn { padding:0.6rem 1rem; border-radius:10px; font-weight:700; border:0; cursor:pointer; }
        .btn-primary { background:linear-gradient(135deg,#4f46e5 0%,#7c3aed 100%); color:#fff; box-shadow:0 6px 20px rgba(79,70,229,0.12); }
        .btn-secondary { background:#f3f4f6; color:#111827; border:1px solid #e5e7eb; }

        /* Small helpers */
        .muted { color:#6b7280; font-size:0.9rem; }
        .mb-3 { margin-bottom:1rem; }
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

            <div class="form-grid">
                <div class="left-col">
                    <div class="field">
                        <label class="form-label">Nama Paket</label>
                        <input type="text" name="nama" value="{{ old('nama', $paket->nama) }}" class="form-control" required>
                    </div>

                    <div class="field" style="display:flex; gap:0.75rem;">
                        <div style="flex:1">
                            <label class="form-label">Kuota</label>
                            <input type="text" name="kuota" value="{{ old('kuota', $paket->kuota) }}" class="form-control" required>
                        </div>
                        <div style="width:160px">
                            <label class="form-label">Masa Aktif (Hari)</label>
                            <input type="number" name="masa_aktif" value="{{ old('masa_aktif', $paket->masa_aktif) }}" class="form-control" required>
                        </div>
                    </div>

                    <div class="field">
                        <label class="form-label">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ old('harga', $paket->harga) }}" class="form-control" required>
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
                </div>

                <div class="right-col">
                    <label class="form-label">Gambar Paket (opsional)</label>
                    <div class="image-box">
                        @if(!empty($paket->image_url))
                            <img src="{{ asset($paket->image_url) }}" alt="Gambar Paket">
                        @else
                            <div class="muted">Belum ada gambar</div>
                        @endif
                    </div>

                    <div class="file-input">
                        <input type="file" name="image" class="form-control">
                        <div class="muted">Unggah file JPG/PNG. Maks 2MB.</div>
                    </div>
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
