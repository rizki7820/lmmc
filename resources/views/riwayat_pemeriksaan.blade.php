@extends('_layouts.admin')

@section('content')
    <div class="w-full px-6 p-4 mx-auto">
        <div class="w-full max-w-2xl mx-auto">
            <div class="relative flex flex-col bg-white shadow-lg rounded-2xl p-6 hover:shadow-2xl transition">
                <h1 class="text-xl font-bold mb-8 text-center" style="color: #82534B; font-size: 24px;">
                    DATA PEMERIKSAAN AWAL
                </h1>

                <h1 class="text-xl font-bold mb-4 text-center" style="color: #82534B; font-size: 16px;">
                    Terakhir pemeriksaan :
                </h1>

                <div class="w-full space-y-2">
                    <div class="flex justify-between w-full">
                        <p class="text-gray-600 font-semibold w-1/4">Tekanan Darah (TD)</p>
                        <p class="text-black font-bold w-1/4">: {{ $user->tekanan_darah ?? '-' }}</p>
                        <p class="text-gray-600 font-semibold w-1/4">Frekuensi Nadi (HR)</p>
                        <p class="text-black font-bold w-1/4">: {{ $user->frekuensi_nadi ?? '-' }}</p>
                    </div>

                    <div class="flex justify-between w-full">
                        <p class="text-gray-600 font-semibold w-1/4">Frekuensi Napas (RR)</p>
                        <p class="text-black font-bold w-1/4">: {{ $user->frekuensi_napas ?? '-' }}</p>
                        <p class="text-gray-600 font-semibold w-1/4">Suhu Tubuh</p>
                        <p class="text-black font-bold w-1/4">: {{ $user->suhu_tubuh ?? '-' }}</p>
                    </div>

                    <div class="flex justify-between w-full">
                        <p class="text-gray-600 font-semibold w-1/4">Berat Badan (BB)</p>
                        <p class="text-black font-bold w-1/4">: {{ $user->berat_badan ?? '-' }}</p>
                        <p class="text-gray-600 font-semibold w-1/4">Tinggi Badan (TB)</p>
                        <p class="text-black font-bold w-1/4">: {{ $user->tinggi_badan ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full px-3 p-1 mx-auto">
        <div class="w-full max-w-2xl mx-auto">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-4 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                    <h1 class="text-xl font-bold mb-6 text-center mt-4" style="color: #82534B; font-size: 24px;">
                        DATA PENDAFTARAN
                    </h1>

                    <div class="flex justify-center">
                        <div class="overflow-x-auto">
                            <table id="myTable" class="min-w-full border border-gray-300 rounded-lg">
                                <thead>
                                    <tr class="bg-[#E5D9D6] border-b border-gray-400" style="background-color: #E5D9D6;">
                                        <th class="p-3 text-left border-r border-gray-300">No</th>
                                        <th class="p-3 text-left border-r border-gray-300">Tanggal</th>
                                        <th class="p-3 text-left border-r border-gray-300">Nama</th>
                                        <th class="p-3 text-left border-r border-gray-300">Usia</th>
                                        <th class="p-3 text-left border-r border-gray-300">Dokter yang dituju</th>
                                        <th class="p-3 text-left border-r border-gray-300">Status</th>
                                        <th class="p-3 text-left border-r border-gray-300">Hasil Lab</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pendaftarans as $index => $pendaftaran)
                                        <tr class="border-b border-gray-200">
                                            <td class="p-3 border-r border-gray-300">{{ $index + 1 }}</td>
                                            <td class="p-3 border-r border-gray-300" id="tanggalBooking"
                                                data-tanggal="{{ $pendaftaran->tanggal_booking }}"></td>
                                            <td class="p-3 border-r border-gray-300">{{ $user->name }}</td>
                                            <td class="p-3 border-r border-gray-300">
                                                {{ \Carbon\Carbon::parse($user->tanggal_lahir)->age }} Tahun
                                            </td>
                                            <td class="p-3 border-r border-gray-300">
                                                {{ $pendaftaran->dokter->nama_dokter }}</td>
                                            <td class="p-3 text-green-500 border-r border-gray-300">
                                                {{ $pendaftaran->status ?? 'Menunggu' }}
                                            </td>
                                            <td class="p-3 text-green-500 border-r border-gray-300">
                                                <center>
                                                    <a href=""><img src="{{ asset('assets/icon/file.svg') }}"
                                                            alt="Icon" class="h-6 w-6">

                                                    </a>
                                                </center>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function formatTanggalBooking() {
            const tanggalElement = document.getElementById("tanggalBooking");
            const tanggalRaw = tanggalElement.getAttribute("data-tanggal");

            if (tanggalRaw) {
                const tanggal = new Date(tanggalRaw);
                const options = {
                    day: "numeric",
                    month: "long",
                    year: "numeric"
                };

                const formattedTanggal = tanggal.toLocaleDateString("id-ID", options);
                tanggalElement.textContent = formattedTanggal;
            }
        }

        formatTanggalBooking();
    </script>
@endsection
