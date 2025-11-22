@extends('layouts.app')

@section('title', 'Buat Paket Baru')

@section('content')
<div class="max-w-4xl mx-auto my-12 px-4">
    <div class="bg-white rounded-2xl border border-gray-200 p-9 shadow-lg hover:shadow-xl transition-shadow">

        <div class="flex justify-between items-center mb-6 border-b border-gray-200 pb-4">
            <div>
                <h3 class="text-2xl font-bold text-gray-900">Buat Paket Baru</h3>
                <p class="text-sm text-gray-500">Tambah paket ke katalog secara lengkap dan rapi</p>
            </div>
            <span class="text-xs font-semibold bg-slate-100 text-gray-800 px-3 py-1 rounded-lg">Admin</span>
        </div>

        @if($errors->any())
            <div class="alert alert-danger bg-red-50 border border-red-200 rounded-lg p-4 mb-6">
                <ul class="list-disc list-inside text-red-700 text-sm">
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

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-5">

                    <div>
                        <label class="block font-semibold text-gray-800 text-sm mb-2">Nama Paket</label>
                        <input type="text" name="nama" class="w-full px-4 py-2 border border-gray-300 rounded-xl bg-white focus:border-indigo-500 focus:ring-3 focus:ring-indigo-100 focus:outline-none transition text-sm" value="{{ old('nama') }}" placeholder="Contoh: Paket Internet 3GB" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block font-semibold text-gray-800 text-sm mb-2">Kuota</label>
                            <input type="text" name="kuota" value="{{ old('kuota') }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl bg-white focus:border-indigo-500 focus:ring-3 focus:ring-indigo-100 focus:outline-none transition text-sm" placeholder="Contoh: 3GB" required>
                        </div>
                        <div>
                            <label class="block font-semibold text-gray-800 text-sm mb-2">Masa Aktif (Hari)</label>
                            <input type="number" name="masa_aktif" value="{{ old('masa_aktif') }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl bg-white focus:border-indigo-500 focus:ring-3 focus:ring-indigo-100 focus:outline-none transition text-sm" placeholder="30" required>
                        </div>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-800 text-sm mb-2">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ old('harga') }}" class="w-full px-4 py-2 border border-gray-300 rounded-xl bg-white focus:border-indigo-500 focus:ring-3 focus:ring-indigo-100 focus:outline-none transition text-sm" placeholder="100000" required>
                        <p class="text-xs text-gray-500 mt-1">Masukkan angka tanpa titik/koma.</p>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-800 text-sm mb-2">Deskripsi</label>
                        <textarea name="deskripsi" class="w-full px-4 py-2 border border-gray-300 rounded-xl bg-white focus:border-indigo-500 focus:ring-3 focus:ring-indigo-100 focus:outline-none transition text-sm" placeholder="Opsional, isi deskripsi paket" rows="4">{{ old('deskripsi') }}</textarea>
                    </div>

                </div>

                <div class="lg:col-span-1">
                    <label class="block font-semibold text-gray-800 text-sm mb-3">Gambar Paket (Opsional)</label>
                    
                    <div class="border-2 border-dashed border-slate-300 rounded-2xl h-48 bg-slate-50 flex justify-center items-center mb-4 hover:border-indigo-400 hover:bg-indigo-50 transition" id="imageBox">
                        <span class="text-xs text-gray-500">Belum ada gambar</span>
                    </div>

                    <div class="flex gap-2 items-center mb-2">
                        <label for="imageInput" id="fileBtn" class="bg-indigo-600 text-white font-semibold px-4 py-2 rounded-xl cursor-pointer hover:bg-indigo-700 transition text-sm">
                            Pilih Gambar
                        </label>
                        <span id="fileName" class="text-xs text-gray-600 truncate max-w-xs"></span>
                    </div>

                    <input type="file" name="image" id="imageInput" accept="image/*" class="hidden">

                    <p class="text-xs text-gray-500 mt-2">Disarankan 800×600 — Maks 2MB.</p>
                </div>
            </div>

            <div class="flex justify-end gap-3 mt-8">
                <a href="{{ route('admin.paket-data.index') }}" class="px-6 py-2 bg-slate-100 border border-gray-300 text-gray-900 font-semibold rounded-2xl hover:bg-gray-200 transition text-sm">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white font-semibold rounded-2xl hover:bg-indigo-700 transition shadow-lg hover:shadow-xl text-sm">
                    Simpan Paket
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

    console.log('DOM loaded - Elements:', {
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
                if(imageBox) imageBox.innerHTML = '<span class="text-xs text-gray-500">Belum ada gambar</span>';
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
                    imageBox.innerHTML = '<img src="' + dataUrl + '" alt="Preview" class="max-h-40 max-w-full rounded-lg object-contain">';
                    console.log('Image inserted to imageBox');
                }
            };
            
            reader.onerror = function(err) {
                console.error('FileReader error:', err);
                if(imageBox) imageBox.innerHTML = '<span class="text-xs text-red-500">Error membaca file</span>';
            };
            
            console.log('Starting readAsDataURL...');
            reader.readAsDataURL(file);
        });
    } else {
        console.error('imageInput element not found!');
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
