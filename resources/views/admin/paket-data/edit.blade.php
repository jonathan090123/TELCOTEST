@extends('layouts.app')

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
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
            </div>
        </form>
    </div>
</div>
@endsection

@section('extra-scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){

    const fileInput = document.getElementById('imageInput');
    const fileName = document.getElementById('fileName');
    const imageBox = document.getElementById('imageBox');

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
            
            reader.readAsDataURL(file);
        });
    }

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
