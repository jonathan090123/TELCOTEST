@extends('layouts.app')

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
