@extends('layouts.admin')

@section('content')

<div class="w-full px-3 p-4 mx-auto">

    <!-- row 1 -->
    <div class="w-full max-w-2xl mx-auto">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-4 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                <h1 class="text-xl font-bold mb-6 text-center mt-4" style="color: #82534B; font-size: 24px;">
                    DATA PASIEN DOKTER ISKANDAR
                </h1>
                <div class="overflow-x-auto">
                    <table id="myTable" class="w-full border border-gray-300 rounded-lg">
                        <thead>
                            <tr class="bg-[#E5D9D6] border-b border-gray-400" style="background-color: #E5D9D6;" >
                                <th class="p-3 text-left border-r border-gray-300">No</th>
                                <th class="p-3 text-left border-r border-gray-300">Nama</th>
                                <th class="p-3 text-left border-r border-gray-300">Rekam Medis</th>
                                <th class="p-3 text-left">NIK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftaran as $index => $data)
                            <tr class="border-b border-gray-200">
                                <td class="p-3 border-r border-gray-300">{{ $index + 1 }}</td>
                                <td class="p-3 border-r border-gray-300">{{ $data->user->name }}</td>
                                <td class="p-3 border-r border-gray-300">{{ $data->rekam_medis }}</td>
                                <td class="p-3">{{ $data->nik }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($pendaftaran->isEmpty())
                        <p class="text-center text-gray-500 mt-4">Tidak ada data pasien untuk dokter ini.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
