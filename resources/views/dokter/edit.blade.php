@extends('layouts.admin2')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Obat</h1>

    <form action="{{ route('obat.update', $obat) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nama" value="{{ $obat->nama }}" class="w-full p-2 border rounded">
        <input type="text" name="kategori" value="{{ $obat->kategori }}" class="w-full p-2 border rounded">
        <input type="number" name="stok" value="{{ $obat->stok }}" class="w-full p-2 border rounded">
        <input type="text" name="harga" value="{{ $obat->harga }}" class="w-full p-2 border rounded">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
