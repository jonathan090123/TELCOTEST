@extends('layouts.app')

@section('title', 'Paket Data')

@section('extra-styles')
    <style>
        .container {
            @include('customer.paket-data.index')
        <div class="back-link">
            <a href="{{ route('home') }}">← Kembali ke Beranda</a>
        </div>
    </div>
@endsection

