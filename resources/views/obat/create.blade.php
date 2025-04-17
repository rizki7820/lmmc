@extends('_layouts.admin')

@section('content')
    <div class="w-full px-3 p-4 mx-auto">
        <div class="w-full max-w-3xl mx-auto">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-4 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                    <h1 class="text-xl font-bold mb-6 text-center mt-4" style="color: #82534B; font-size: 24px;">
                        TAMBAH DATA OBAT
                    </h1>

                    <form action="{{ route('obat.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label class="font-semibold">Nama Obat</label>
                            <input type="text" name="nama" class="w-full p-2 border rounded">
                        </div>

                        <div class="mb-2">
                            <label class="font-semibold">Kategori</label>
                            <input type="text" name="kategori" class="w-full p-2 border rounded">
                        </div>

                        <div class="mb-2">
                            <label class="font-semibold">Stok</label>
                            <input type="number" name="stok" class="w-full p-2 border rounded">
                        </div>

                        <div class="mb-2">
                            <label class="font-semibold">Harga</label>
                            <input type="text" name="harga" class="w-full p-2 border rounded">
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
