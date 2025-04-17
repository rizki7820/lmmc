@extends('layouts.admin2')

@section('content')

<div class="w-full px-3 p-4 mx-auto">

    <!-- Container -->
    <div class="w-full max-w-3xl mx-auto">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-4 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">

                <h1 class="text-xl font-bold mb-6 text-center mt-4" style="color: #82534B; font-size: 24px;">
                    DATA DOKTER
                </h1>

                <!-- Tombol Tambah Data -->
                <div class="mb-4 flex justify-center">
                    <a href="{{ route('dokter.create') }}" class="mb-6 w-32 px-8 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105" style="background-color: #52B74A;">
                        Tambah Dokter
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table id="myTable" class="w-full border border-gray-300 rounded-lg">
                        <thead>
                            <tr class="bg-[#E5D9D6] border-b border-gray-400" style="background-color: #E5D9D6;">
                                <th class="p-3 text-left border-r border-gray-300">No</th>
                                <th class="p-3 text-left border-r border-gray-300">NIP</th>
                                <th class="p-3 text-left border-r border-gray-300">Nama</th>
                                <th class="p-3 text-left border-r border-gray-300">Spesialis</th>
                                <th class="p-3 text-left border-r border-gray-300">Jam Operasional</th>
                                <th class="p-3 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokters as $index => $dokter)
                            <tr class="border-b border-gray-200">
                                <td class="p-3 border-r border-gray-300">{{ $index + 1 }}</td>
                                <td class="p-3 border-r border-gray-300">{{ $dokter->nip }}</td>
                                <td class="p-3 border-r border-gray-300">{{ $dokter->nama_dokter }}</td>
                                <td class="p-3 border-r border-gray-300">{{ $dokter->poli }}</td>
                                <td class="p-3 border-r border-gray-300">{{ $dokter->jam_operasional }}</td>
                                <td class="p-3 flex justify-center items-center space-x-2">
                                    <a href="{{ route('dokter.edit', $dokter) }}" >
                                        <img src="{{ asset('assets/icon/Details.svg') }}" class="w-6 h-6" alt="View">
                                    </a>
                                    <form action="{{ route('dokter.destroy', $dokter) }}" method="POST" onsubmit="return confirm('Hapus dokter ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-500 text-black rounded-lg text-sm">
                                            <img src="{{ asset('assets/icon/konfir.svg')}}" class="w-6 h-6" alt="Konfirmasi">
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($dokters->isEmpty())
                        <p class="text-center text-gray-500 mt-4">Tidak ada data dokter.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
