@extends('_layouts.admin')

@section('content')
    <div class="w-full px-3 p-4 mx-auto">
        <div class="w-full max-w-3xl mx-auto">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-4 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                    <h1 class="text-xl font-bold mb-6 text-center mt-4" style="color: #82534B; font-size: 24px;">
                        PERBARUI DATA OBAT
                    </h1>

                    <form action="{{ route('obat.update', $obat) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="font-semibold">NAMA OBAT</label>
                            <input type="text" name="nama" value="{{ $obat->nama }}"
                                class="w-full p-2 border rounded mb-2">
                                test
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold">KATEGORI OBAT</label>
                            <input type="text" name="kategori" value="{{ $obat->kategori }}"
                                class="w-full p-2 border rounded mb-2">
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold">STOK OBAT</label>
                            <input type="number" name="stok" value="{{ $obat->stok }}"
                                class="w-full p-2 border rounded mb-2">
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold">HARGA OBAT</label>
                            <input type="text" name="harga" value="{{ $obat->harga }}"
                                class="w-full p-2 border rounded mb-2">
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
