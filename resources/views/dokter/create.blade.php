@extends('layouts.admin2')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Dokter</h1>

    <form action="{{ route('dokter.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label>NIP</label>
            <input type="text" name="nip" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label>Nama Dokter</label>
            <input type="text" name="nama_dokter" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label>Spesialis</label>
            <input type="text" name="poli" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label>Jam Operasional</label>
            <input type="text" name="jam_operasional" class="w-full p-2 border rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
