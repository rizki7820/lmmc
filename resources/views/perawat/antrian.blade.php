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
                        <h1 class="text-4xl font-bold text-gray-800 dark:text-white">{{ $jumlahPendaftar }}</h1>

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
                            <h1 class="text-4xl font-bold text-gray-800 dark:text-white">{{ $jumlahMenunggu }}</h1>

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
                            <p class="text-4xl font-bold text-gray-800 dark:text-white uppercase">Proses Pemeriksaan</p>
                            <h1 class="text-4xl font-bold text-gray-800 dark:text-white">{{ $jumlahProses }}</h1>
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
                            <p class="text-4xl font-bold text-gray-800 dark:text-white uppercase">Pemeriksaan Selesai</p>
                            <h1 class="text-4xl font-bold text-gray-800 dark:text-white">0</h1>

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
                        <table id="myTable" class="w-full table-auto border border-gray-300 rounded-lg">
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
                                @foreach ($pendaftaran as $loopIndex => $data)
                                    <tr class="border-b border-gray-200">
                                        <td class="p-3 border-r border-gray-300">{{ $loop->iteration }}</td>
                                        <td class="p-3 border-r border-gray-300">{{ $data->user->name }}</td>
                                        <td class="p-3 border-r border-gray-300">
                                            {{ \Carbon\Carbon::parse($data->user->tanggal_lahir)->age }} Tahun</td>
                                        <td class="p-3 border-r border-gray-300">{{ $data->status }}</td>
                                        <td class="p-3 text-center flex justify-center items-center">
                                            <button onclick="openModalKategori('{{ $data->id }}')"
                                                style="margin-right: .8rem;">
                                                Kategori
                                            </button>

                                            <!-- Tombol Pemeriksaan -->
                                            <button
                                                onclick="openModal('{{ $data->id }}', '{{ $data->user->tekanan_darah }}', '{{ $data->user->frekuensi_nadi }}', '{{ $data->user->frekuensi_napas }}', '{{ $data->user->suhu_tubuh }}', '{{ $data->user->berat_badan }}', '{{ $data->user->tinggi_badan }}')">
                                                <img src="{{ asset('assets/icon/konfir.svg') }}" class="w-6 h-6"
                                                    alt="Pemeriksaan">
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Pendaftar -->
        <div id="editPendaftarModal"
            class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 max-w-lg relative">
                <h2 class="text-xl font-semibold mb-4">Edit Data Pendaftar</h2>
                <form id="editPendaftarForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="pendaftar_id">

                    <div class="mb-3">
                        <label for="tekanan_darah" class="block text-sm font-medium">Tekanan Darah (TD)</label>
                        <input type="text" id="tekanan_darah" name="tekanan_darah" class="w-full p-2 border rounded"
                            placeholder="Contoh: 120/80 mmHg">
                    </div>

                    <div class="mb-3">
                        <label for="frekuensi_nadi" class="block text-sm font-medium">Frekuensi Nadi (HR)</label>
                        <input type="text" id="frekuensi_nadi" name="frekuensi_nadi" class="w-full p-2 border rounded"
                            placeholder="Contoh: 75 bpm">
                    </div>

                    <div class="mb-3">
                        <label for="frekuensi_napas" class="block text-sm font-medium">Frekuensi Napas (RR)</label>
                        <input type="text" id="frekuensi_napas" name="frekuensi_napas" class="w-full p-2 border rounded"
                            placeholder="Contoh: 18 rpm">
                    </div>

                    <div class="mb-3">
                        <label for="suhu_tubuh" class="block text-sm font-medium">Suhu Tubuh</label>
                        <input type="text" id="suhu_tubuh" name="suhu_tubuh" class="w-full p-2 border rounded"
                            placeholder="Contoh: 36.5°C">
                    </div>

                    <div class="mb-3">
                        <label for="berat_badan" class="block text-sm font-medium">Berat Badan (BB)</label>
                        <input type="text" id="berat_badan" name="berat_badan" class="w-full p-2 border rounded"
                            placeholder="Contoh: 65 Kg">
                    </div>

                    <div class="mb-3">
                        <label for="tinggi_badan" class="block text-sm font-medium">Tinggi Badan (TB)</label>
                        <input type="text" id="tinggi_badan" name="tinggi_badan" class="w-full p-2 border rounded"
                            placeholder="Contoh: 170 cm">
                    </div>

                    {{-- <div class="mb-3">
                <label for="status" class="block text-sm font-medium">Status</label>
                <select id="status" name="status" class="w-full p-2 border rounded">
                    <option value="Menunggu">Menunggu</option>
                    <option value="Diperiksa">Diperiksa</option>
                    <option value="Selesai">Selesai</option>
                </select>
            </div> --}}

                    <div class="flex justify-end mt-4">
                        <button type="button" onclick="closeModal()"
                            class="px-4 py-2 bg-gray-500 text-white rounded mr-2"
                            style="background-color: #ea3370;">Batal</button>

                        <button type="button" onclick="updateData(document.getElementById('pendaftar_id').value)"
                            class="px-4 py-2 bg-blue-600 text-white rounded" style="background-color: #709972;">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="editKategoriModal"
            class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 max-w-lg relative">
                <h2 class="text-xl font-semibold mb-4">Edit Kategori</h2>
                <form id="editPendaftarForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="kategori_pendaftar_id" id="kategori_pendaftar_id">

                    <div class="mb-3">
                        <label for="tekanan_darah" class="block text-sm font-medium">
                            Kategori
                        </label>

                        <select name="kategori" id="kategori" class="w-full p-2 border rounded">
                            <option value="A1">A1</option>
                            <option value="A2">A2</option>
                        </select>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="button" onclick="closeModal()"
                            class="px-4 py-2 bg-gray-500 text-white rounded mr-2" style="background-color: #ea3370;">
                            Batal
                        </button>

                        <button type="button"
                            onclick="updateDataKategori(document.getElementById('kategori_pendaftar_id').value)"
                            class="px-4 py-2 bg-blue-600 text-white rounded" style="background-color: #709972;">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        #editPendaftarModal,
        #editKategoriModal {
            display: none;
            /* Awalnya tersembunyi */
            position: fixed;
            inset: 0;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.5);
            z-index: 50;
        }
    </style>
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function openModal(id, tekanan_darah, frekuensi_nadi, frekuensi_napas, suhu_tubuh, berat_badan, tinggi_badan) {
            document.getElementById("pendaftar_id").value = id;
            document.getElementById("tekanan_darah").value = tekanan_darah;
            document.getElementById("frekuensi_nadi").value = frekuensi_nadi; // Tambahkan ini
            document.getElementById("frekuensi_napas").value = frekuensi_napas;
            document.getElementById("suhu_tubuh").value = suhu_tubuh;
            document.getElementById("berat_badan").value = berat_badan;
            document.getElementById("tinggi_badan").value = tinggi_badan;

            let modal = document.getElementById("editPendaftarModal");
            modal.style.display = "flex";
        }

        function updateData(id) {
            console.log("Memanggil updateData() untuk ID:", id); // Debugging
            $.ajax({
                url: `/perawat/pemeriksaan/${id}`, // Endpoint API
                type: "POST", // Laravel menerima PUT via _method=PUT
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token Laravel
                    _method: "PUT", // Override metode ke PUT
                    tekanan_darah: $("#tekanan_darah").val(),
                    frekuensi_nadi: $("#frekuensi_nadi").val(),
                    frekuensi_napas: $("#frekuensi_napas").val(),
                    suhu_tubuh: $("#suhu_tubuh").val(),
                    berat_badan: $("#berat_badan").val(),
                    tinggi_badan: $("#tinggi_badan").val()
                },
                success: function(response) {
                    alert("Data berhasil diperbarui!");
                    closeModal();
                    location.reload();
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseText);
                }
            });
        }

        function openModalKategori(id) {
            let modal = document.getElementById("editKategoriModal");
            modal.style.display = "flex";
            document.getElementById('kategori_pendaftar_id').value = id
        }

        function updateDataKategori(id) {
            console.log("Memanggil updateDataKategori() untuk ID:", id); // Debugging
            $.ajax({
                url: `{{ route('perawat.setKategori') }}`, // Endpoint API
                type: "POST", // Laravel menerima PUT via _method=PUT
                data: {
                    _token: "{{ csrf_token() }}", // CSRF token Laravel
                    _method: "PUT", // Override metode ke PUT
                    pendaftaran_id: id,
                    kategori: $("#kategori").val()
                },
                success: function(response) {
                    alert("Data berhasil diperbarui!");
                    closeModal();
                    location.reload();
                },
                error: function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseText);
                }
            });
        }

        function closeModal() {
            let modal = document.getElementById("editPendaftarModal");
            modal.style.display = "none"; // Sembunyikan modal
        }

        window.onclick = function(event) {
            let modal = document.getElementById("editPendaftarModal");
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
@endpush
