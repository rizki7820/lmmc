@extends('_layouts.admin')

@section('content')
    <div class=" p-4 text-right">
        <p id="dateTime" class="text-xl font-bold mt-2" style="color: #618162;"></p>
    </div>

    <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 mb-2 sm:w-1/2 xl:w-1/4">
                <div class="w-full max-w-xs mx-auto">
                    <div
                        class="relative flex flex-col items-center justify-center min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6 text-center hover:shadow-2xl transition">
                        <p class="text-4xl font-bold text-gray-800 dark:text-white uppercase">Pendaftaran Pasien</p>
                        <h1 class="text-4xl font-bold text-gray-800 dark:text-white">15</h1>
                        <button
                            class="px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                            style="background-color: #709972;">
                            Lihat Detail
                        </button>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full px-3 mb-2 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="w-full max-w-xs mx-auto">
                        <div
                            class="relative flex flex-col items-center justify-center min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6 text-center hover:shadow-2xl transition">
                            <p class="text-4xl font-bold text-gray-800 dark:text-white uppercase">Daftar Tunggu</p>
                            <h1 class="text-4xl font-bold text-gray-800 dark:text-white">10</h1>
                            <button
                                class="px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                                style="background-color: #709972;">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full px-3 mb-2 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="w-full max-w-xs mx-auto">
                        <div
                            class="relative flex flex-col items-center justify-center min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6 text-center hover:shadow-2xl transition">
                            <p class="text-4xl font-bold text-gray-800 dark:text-white uppercase">
                                Proses Pemeriksaan
                            </p>

                            <h1 class="text-4xl font-bold text-gray-800 dark:text-white">3</h1>
                            <button
                                class="px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                                style="background-color: #709972;">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-full mb-2 px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="w-full max-w-xs mx-auto">
                        <div
                            class="relative flex flex-col items-center justify-center min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6 text-center hover:shadow-2xl transition">
                            <p class="text-4xl font-bold text-gray-800 dark:text-white uppercase">
                                Pemeriksaan Selesai
                            </p>

                            <h1 class="text-4xl font-bold text-gray-800 dark:text-white">3</h1>

                            <button
                                class="px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                                style="background-color: #709972;">
                                Lihat Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-4 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                    <h1 class="text-xl font-bold mb-6 text-center mt-4" style="color: #82534B; font-size: 24px;">
                        DATA PENDAFTARAN
                    </h1>

                    <div class="overflow-x-auto">
                        <table id="myTable" class="min-w-full w-full border border-gray-300 rounded-lg">
                            <thead>
                                <tr class="bg-[#E5D9D6] border-b border-gray-400" style="background-color: #E5D9D6;">
                                    <th class="p-3 text-left border-r border-gray-300">No</th>
                                    <th class="p-3 text-left border-r border-gray-300">Nama</th>
                                    <th class="p-3 text-left border-r border-gray-300">Usia</th>
                                    <th class="p-3 text-left border-r border-gray-300">Status</th>
                                    <th class="p-3 text-left">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="border-b border-gray-200">
                                    <td class="p-3 border-r border-gray-300">1</td>
                                    <td class="p-3 border-r border-gray-300">Ahmad</td>
                                    <td class="p-3 border-r border-gray-300">25</td>
                                    <td class="p-3 text-green-500 border-r border-gray-300">Selesai</td>
                                    <td class="p-3 text-center flex justify-center items-center">
                                        <!-- Tombol View -->
                                        <button class="mx-2">
                                            <img src="{{ asset('assets/icon/Details.svg') }}" class="w-6 h-6"
                                                alt="View">
                                        </button>

                                        <!-- Tombol Konfirmasi -->
                                        <button onclick="showConfirmation('John Doe')" class="mx-2">
                                            <img src="{{ asset('assets/icon/konfir.svg') }}" class="w-6 h-6"
                                                alt="Konfirmasi">
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        function updateDateTime() {
            const now = new Date();
            const options = {
                weekday: "long",
                year: "numeric",
                month: "long",
                day: "numeric"
            };
            const formattedDate = now.toLocaleDateString("id-ID", options);
            const formattedTime = now.toLocaleTimeString("id-ID");

            document.getElementById("dateTime").textContent = `${formattedDate} | ${formattedTime}`;
        }

        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>

    <script>
        function showConfirmation(namaPasien) {
            Swal.fire({
                title: 'Konfirmasi Pasien',
                text: `Apakah Anda yakin ingin mengkonfirmasi pasien ${namaPasien}?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Konfirmasi!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Terkonfirmasi!',
                        text: `Pasien ${namaPasien} telah dikonfirmasi.`,
                        icon: 'success',
                        confirmButtonColor: '#3085d6' // Tombol "OK" menjadi biru
                    });
                }
            });
        }
    </script>
@endpush
