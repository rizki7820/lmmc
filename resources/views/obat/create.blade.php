@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Obat</h1>

    <form action="{{ route('obat.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label>Nama Obat</label>
            <input type="text" name="nama" class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label>Kategori</label>
            <input type="text" name="kategori" class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label>Stok</label>
            <input type="number" name="stok" class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label>Harga</label>
            <input type="text" name="harga" class="w-full p-2 border rounded">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
