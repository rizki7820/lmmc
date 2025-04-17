
@extends('layouts.admin')

@section('content')

<div class="w-full px-3 p-4 mx-auto">

    <!-- row 1 -->
    <div class="w-full max-w-2xl mx-auto">
          <!-- Bagian Kiri (Teks) -->
          <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-4 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
              <h1 class="text-xl font-bold mb-6 text-center mt-4" style="color: #82534B; font-size: 24px;">DATA DOKTER</h1>
                <div class="overflow-x-auto">
                        <button class="mb-6 w-32 px-8 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105" style="background-color: #52B74A;">
                            Tambah Data
                        </button>

                  <table id="myTable" class="w-full border border-gray-300 rounded-lg">
                    <thead>
                        <tr class="bg-[#E5D9D6] border-b border-gray-400" style="background-color: #E5D9D6;" >

                            <th class="p-3 text-left border-r border-gray-300">No</th>
                            <th class="p-3 text-left border-r border-gray-300">Nama</th>
                            <th class="p-3 text-left border-r border-gray-300">Spesialis</th>
                            <th class="p-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-200">
                            <td class="p-3 border-r border-gray-300">1</td>
                            <td class="p-3 border-r border-gray-300">Dr. Iskandar, SP.A</td>
                            <td class="p-3 border-r border-gray-300">Dokter Anak</td>
                            <td class="p-3 text-center flex justify-center items-center">
                              <!-- Tombol View -->
                              <button class="mx-2">
                                  <img src="assets/icon/Details.svg" class="w-6 h-6" alt="View">
                              </button>
                              <!-- Tombol Konfirmasi -->
                              <button class="mx-2">
                                  <img src="assets/icon/konfir.svg" class="w-6 h-6" alt="Konfirmasi">
                              </button>
                          </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
      </div>
  </div>
  @endsection
