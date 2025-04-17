@extends('_layouts.admin')

@section('content')
    @if (session('success'))
        <script>
            alert("{{ session('success') }}")
        </script>
    @elseif (session('error'))
        <script>
            alert("{{ session('error') }}")
        </script>
    @endif

    <div class=" p-4 text-right">
        <p id="dateTime" class="text-xl font-bold mt-2" style="color: #618162;"></p>
    </div>

    <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap mt-6 -mx-3">
            <div class="flex-none w-full max-w-full px-3">
                <div
                    class="relative flex flex-col min-w-0 mb-4 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                    <h1 class="text-xl font-bold mb-6 text-center mt-4" style="color: #82534B; font-size: 24px;">
                        DATA PASIEN
                    </h1>

                    <div class="overflow-x-auto">
                        <table id="myTable" class="w-full table-auto border border-gray-300 rounded-lg">
                            <thead>
                                <tr class="bg-[#E5D9D6] border-b border-gray-400" style="background-color: #E5D9D6;">
                                    <th class="p-3 text-left border-r border-gray-300">No</th>
                                    <th class="p-3 text-left border-r border-gray-300">Rekam Medis</th>
                                    <th class="p-3 text-left border-r border-gray-300">Nama</th>
                                    <th class="p-3 text-left border-r border-gray-300">Usia</th>
                                    <th class="p-3 text-left">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($pendaftaran as $loopIndex => $data)
                                    <tr class="border-b border-gray-200">
                                        <td class="p-3 border-r border-gray-300">{{ $loop->iteration }}</td>
                                        <td class="p-3 border-r border-gray-300">{{ $data->rekam_medis }}</td>
                                        <td class="p-3 border-r border-gray-300">{{ $data->user->name }}</td>
                                        <td class="p-3 border-r border-gray-300">
                                            {{ \Carbon\Carbon::parse($data->user->tanggal_lahir)->age }} Tahun</td>

                                        <td class="p-3 text-center flex justify-center items-center">
                                            <!-- Tombol View -->
                                            <button
                                                class=" mx-2 px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                                                style="background-color: #38a373;"
                                                onclick="openModalSoap('{{ $data->id }}', '{{ $data->user->tekanan_darah }}', '{{ $data->user->frekuensi_nadi }}', '{{ $data->user->frekuensi_napas }}', '{{ $data->user->suhu_tubuh }}', '{{ $data->user->berat_badan }}', '{{ $data->user->tinggi_badan }}', '{{ $data->soap->objektif_perawat ?? '' }}')">
                                                SOAP
                                            </button>

                                        <a href = "{{ route('resep') }}" target="_blank"
                                                class="mx-2 px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                                                style="background-color: #7e533c;"
                                               >Resep</a>
                <!--
                                            <button
                                                class="mx-2 px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                                                style="background-color: #7e533c;"
                                                onclick="openModalObat('{{ $data->id }}')">
                                                Resep
                                            </button>
                                            -->

                                            <button
                                                class="mx-2 px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                                                style="background-color: #26828c;"
                                                onclick="openModalLab('{{ $data->id }}')">
                                                Lab
                                            </button>

                                            <a href="{{ route('dokter.set_selesai', ['pendaftaran' => $data->id]) }}"
                                                class="mx-2">
                                                <button
                                                    class="px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                                                    style="background-color: #6bad48;">
                                                    Kirim Data
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div id="labModal" class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-2/5 max-w-lg relative">
                <form method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="obat_pasien_id" id="lab_pasien_id">

                    <h2 class="text-2xl font-semibold mb-4 flex justify-center items-center">Komponen Pemeriksaan</h2>
                    <div class="flex justify-content-center align-items-center" style="grid-gap: .8rem">
                        <div class="w-1/2">
                            <div class="mb-3">
                                <label for="dlo" class="block text-base mb-2 mt-6 font-medium">Darah Lengkap Otomatis (DLO)</label>
                                <div class="w-full" style="max-height: 100px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
                                    <label for="hemoglobin"><input type="checkbox" name="dlo[]" id="hemoglobin" value="Hemoglobin" class="mr-2">Hemoglobin</label><br>
                                    <label for="hematokrit"><input type="checkbox" name="dlo[]" id="hematokrit" value="Hematokrit" class="mr-2">Hematokrit</label><br>
                                    <label for="eritrosit"><input type="checkbox" name="dlo[]" id="eritrosit" value="Eritrosit" class="mr-2">Eritrosit</label><br>
                                    <label for="leukosit"><input type="checkbox" name="dlo[]" id="leukosit" value="Leukosit" class="mr-2">Leukosit</label><br>
                                    <label for="trombosit"><input type="checkbox" name="dlo[]" id="trombosit" value="Trombosit" class="mr-2">Trombosit</label><br>
                                    <label for="rdw_cv"><input type="checkbox" name="dlo[]" id="rdw_cv" value="RDW-CV" class="mr-2">RDW-CV</label><br>
                                    <label for="mcv"><input type="checkbox" name="dlo[]" id="mcv" value="MCV" class="mr-2">MCV</label><br>
                                    <label for="mch"><input type="checkbox" name="dlo[]" id="mch" value="MCH" class="mr-2">MCH</label><br>
                                    <label for="mchc"><input type="checkbox" name="dlo[]" id="mchc" value="MCHC" class="mr-2">MCHC</label><br>
                                    <label for="basofil"><input type="checkbox" name="dlo[]" id="basofil" value="Basofil" class="mr-2">Basofil</label><br>
                                    <label for="eosinofil"><input type="checkbox" name="dlo[]" id="eosinofil" value="Eosinofil" class="mr-2">Eosinofil</label><br>
                                    <label for="stab_batang"><input type="checkbox" name="dlo[]" id="stab_batang" value="Stab/Batang" class="mr-2">Stab/Batang</label><br>
                                    <label for="segmen"><input type="checkbox" name="dlo[]" id="segmen" value="Segmen" class="mr-2">Segmen</label><br>
                                    <label for="limfosit"><input type="checkbox" name="dlo[]" id="limfosit" value="Limfosit" class="mr-2">Limfosit</label><br>
                                    <label for="monosit"><input type="checkbox" name="dlo[]" id="monosit" value="Monosit" class="mr-2">Monosit</label><br>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="kimia_darah" class="block text-base mb-2 mt-6 font-medium">Kimia Darah</label>
                                <div class="w-full" style="max-height: 100px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
                                    <label for="sgot"><input type="checkbox" name="kimia_darah[]" id="sgot" value="SGOT" class="mr-2">SGOT</label><br>
                                    <label for="sgpt"><input type="checkbox" name="kimia_darah[]" id="sgpt" value="SGPT" class="mr-2">SGPT</label><br>
                                    <label for="gula_darah"><input type="checkbox" name="kimia_darah[]" id="gula_darah" value="Gula Darah" class="mr-2">Gula Darah</label><br>
                                    <label for="kolesterol_total"><input type="checkbox" name="kimia_darah[]" id="kolesterol_total" value="Kolesterol Total" class="mr-2">Kolesterol Total</label><br>
                                    <label for="asam_urat"><input type="checkbox" name="kimia_darah[]" id="asam_urat" value="Asam Urat" class="mr-2">Asam Urat</label><br>
                                    <label for="ureum"><input type="checkbox" name="kimia_darah[]" id="ureum" value="Ureum" class="mr-2">Ureum</label><br>
                                    <label for="kreatinin"><input type="checkbox" name="kimia_darah[]" id="kreatinin" value="Kreatinin" class="mr-2">Kreatinin</label><br>
                                    <label for="bilirubin_total"><input type="checkbox" name="kimia_darah[]" id="bilirubin_total" value="Bilirubin Total" class="mr-2">Bilirubin Total</label><br>
                                    <label for="bilirubin_direk"><input type="checkbox" name="kimia_darah[]" id="bilirubin_direk" value="Bilirubin Direk" class="mr-2">Bilirubin Direk</label><br>
                                    <label for="bilirubin_indirek"><input type="checkbox" name="kimia_darah[]" id="bilirubin_indirek" value="Bilirubin Indirek" class="mr-2">Bilirubin Indirek</label><br>
                                </div>
                            </div>



                            <div class="mb-3">
                                <label for="urinalisis" class="block text-base mb-2 mt-6 font-medium">Urinalisis</label>
                                <select name="urinalisis[]" id="urinalisis" class="w-full block p-2 border rounded"
                                    multiple>
                                    <option value="pH">pH</option>
                                    <option value="Berat Jenis">Berat Jenis</option>
                                    <option value="Eritrosit">Eritrosit</option>
                                    <option value="Leukosit">Leukosit</option>
                                    <option value="Keton">Keton</option>
                                    <option value="Nitrit">Nitrit</option>
                                    <option value="Urobilinogen">Urobilinogen</option>
                                    <option value="Bilirubin">Bilirubin</option>
                                    <option value="Protein">Protein</option>
                                    <option value="Glukosa">Glukosa</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="narkoba" class="block text-base mb-2 mt-6 font-medium">Narkoba</label>
                                <select name="narkoba[]" id="narkoba" class="w-full block p-2 border rounded" multiple>
                                    <option value="Amfetamin">Amfetamin</option>
                                    <option value="Metamfetamin">Metamfetamin</option>
                                    <option value="Benzodiazepin">Benzodiazepin</option>
                                    <option value="Kokain">Kokain</option>
                                    <option value="Morfin">Morfin</option>
                                    <option value="THC">THC</option>
                                </select>
                            </div>
                        </div>

                        <div class="w-1/2">
                            <div class="mb-3">
                                <label for="serologi_dengue" class="block text-base mb-2 mt-6 font-medium">Serologi Dengue</label>
                                <select name="serologi_dengue[]" id="serologi_dengue"
                                    class="w-full block p-2 border rounded" multiple>
                                    <option value="NS1">NS1</option>
                                    <option value="IgM Anti-Dengue">IgM Anti-Dengue</option>
                                    <option value="IgG Anti-Dengue">IgG Anti-Dengue</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="widal" class="block text-base mb-2 mt-6 font-medium">Widal</label>
                                <select name="widal[]" id="widal" class="w-full block p-2 border rounded" multiple>
                                    <option value="Titer O">Titer O</option>
                                    <option value="Titer H">Titer H</option>
                                    <option value="Titer AO">Titer AO</option>
                                    <option value="Titer BO">Titer BO</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="golongan_darah" class="block text-base mb-2 mt-6 font-medium">Golongan Darah</label>
                                <select name="golongan_darah[]" id="golongan_darah"
                                    class="w-full block p-2 border rounded" multiple>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="anti_d_rhesus" class="block text-base mb-2 mt-6 font-medium">Anti D Rhesus</label>
                                <select name="anti_d_rhesus[]" id="anti_d_rhesus" class="w-full block p-2 border rounded"
                                    multiple>
                                    <option value="Rhesus +">Rhesus +</option>
                                    <option value="Rhesus -">Rhesus -</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="button" onclick="closeModal('labModal')"
                            class="px-4 py-2 bg-gray-500 text-white rounded mr-2" style="background-color: #ea3370;">
                            Batal
                        </button>

                        <button type="button" onclick="updateDataLab(document.getElementById('lab_pasien_id').value)"
                            class="px-4 py-2 bg-blue-600 text-white rounded" style="background-color: #709972;">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="editPendaftarModal"
            class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-4xl relative">
                <form id="editPendaftarForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="soap_pasien_id">
                    <h2 class="text-2xl font-bold mb-2">Data Identitas</h2>

                    <p class="text-sm font-semibold">Nama: <span class="font-normal">Luna</span></p>
                    <p class="text-sm font-semibold mb-4">
                        Nomor Rekam Medis: <span class="font-normal">RM-150325-0002</span>
                    </p>

                    <div class="flex" style="grid-gap: .8rem">
                        <div class="w-1/2">
                            <h2 class="text-xl font-semibold mb-2">Subjektif - Perawat</h2>
                            <div class="mb-4">
                                <input type="text" id="subjektif_dokter" name="subjektif_dokter"
                                    class="w-full p-2 border rounded" placeholder="" disabled>
                            </div>

                            <h2 class="text-xl font-semibold mb-4">Objektif - Perawat</h2>
                            <div class="flex w-full" style="grid-gap: .8rem">
                                <div class="w-1/3">
                                    <div class="mb-3">
                                        <label for="tekanan_darah" class="block text-sm font-medium">Tekanan Darah
                                            (TD)</label>
                                        <input type="text" id="tekanan_darah" name="tekanan_darah"
                                            class="w-40 p-2 border rounded" placeholder="120/80 mmHg" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="frekuensi_nadi" class="block text-sm font-medium">Frekuensi Nadi
                                            (HR)</label>
                                        <input type="text" id="frekuensi_nadi" name="frekuensi_nadi"
                                            class="w-40 p-2 border rounded" placeholder="75 bpm" readonly>
                                    </div>
                                </div>

                                <div class="w-1/3">
                                    <div class="mb-3">
                                        <label for="berat_badan" class="block text-sm font-medium">Berat Badan
                                            (BB)</label>
                                        <input type="text" id="berat_badan" name="berat_badan"
                                            class="w-40 p-2 border rounded" placeholder="65 Kg" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="frekuensi_napas" class="block text-sm font-medium">Frekuensi Napas
                                            (RR)</label>
                                        <input type="text" id="frekuensi_napas" name="frekuensi_napas"
                                            class="w-40 p-2 border rounded" placeholder="18 rpm" readonly>
                                    </div>
                                </div>

                                <div class="w-1/3">
                                    <div class="mb-3">
                                        <label for="suhu_tubuh" class="block text-sm font-medium">Suhu Tubuh</label>
                                        <input type="text" id="suhu_tubuh" name="suhu_tubuh"
                                            class="w-40 p-2 border rounded" placeholder="36.5¡ÆC" readonly>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tinggi_badan" class="block text-sm font-medium">Tinggi Badan
                                            (TB)</label>
                                        <input type="text" id="tinggi_badan" name="tinggi_badan"
                                            class="w-40 p-2 border rounded" placeholder="170 cm" readonly>
                                    </div>
                                </div>
                            </div>

                            <h2 class="text-xl font-semibold mb-2">Objektif - Dokter</h2>
                            <div class="mb-4">
                                <textarea id="objektif_dokter" name="objektif_dokter" class="w-full p-2 border rounded" rows="3"
                                    placeholder=""></textarea>
                            </div>
                        </div>

                        <div class='w-1/2'>


                            <h2 class="text-xl font-semibold mb-2">Subjektif - Dokter</h2>
                            <div class="mb-4">
                                <textarea id="objektif_perawat" name="objektif_perawat" class="w-full p-2 border rounded" placeholder=""
                                    rows="3"></textarea>
                            </div>

                            <h2 class="text-xl font-semibold mb-2">Assesment - Dokter</h2>
                            <div class="mb-4">
                                <textarea id="assesment_dokter" name="assesment_dokter" class="w-full p-2 border rounded" placeholder=""
                                    rows="3"></textarea>
                            </div>

                            <h2 class="text-xl font-semibold mb-2">Planning - Dokter</h2>
                            <div class="mb-4">
                                <textarea id="planning_dokter" name="planning_dokter" class="w-full p-2 border rounded" placeholder=""
                                    rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="button" onclick="closeModal()"
                            class="px-4 py-2 bg-gray-500 text-white rounded mr-2" style="background-color: #ea3370;">
                            Batal
                        </button>

                        <button type="button" onclick="updateDataSoap(document.getElementById('soap_pasien_id').value)"
                            class="px-4 py-2 bg-blue-600 text-white rounded" style="background-color: #709972;">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div id="editPendaftarModal2"
            class="fixed inset-0 items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">

            <div class="bg-white p-6 rounded-lg shadow-lg w-1/3 max-w-lg relative">
                <form id="editPendaftarForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="obat_pasien_id" id="obat_pasien_id">

                    <div class="grid grid-cols-2 gap-4">
                        <h2 class="text-xl font-semibold mb-4">Obat</h2>
                        <div class="mb-3" id="field-obat">
                            @php
                                $obats = App\Models\Obat::select(['id', 'nama'])->get();
                            @endphp

                            <select name="obat[0]" id="" class="w-full block p-2 border rounded">
                                <option value="">Pilih</option>

                                @foreach ($obats as $key => $obat)
                                    <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="button" onclick="addNewField()"
                            class="px-4 py-2 mt-4 bg-blue-600 text-white rounded" style="background-color: #709972;">
                            Tambah Field
                        </button>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="button" onclick="closeModal('editPendaftarModal2')"
                            class="px-4 py-2 bg-gray-500 text-white rounded mr-2" style="background-color: #ea3370;">
                            Batal
                        </button>

                        <button type="button" onclick="updateDataObat(document.getElementById('obat_pasien_id').value)"
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
        #editPendaftarModal2,
        #labModal {
            display: none;
            /* Awalnya tersembunyi */
            position: fixed;
            inset: 0;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
        }
    </style>
@endpush

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function openModalObat(id) {
            // Anda dapat menambahkan data yang ingin diisi ke dalam modal2 jika perlu
            let modal3 = document.getElementById("editPendaftarModal2");
            modal3.style.display = "flex"; // Mengubah display modal2 menjadi flex agar tampil
            document.getElementById('obat_pasien_id').value = id
        }

        function updateDataObat(id) {
            console.log("Memanggil updateDataObat() untuk ID:", id); // Debugging
            $.ajax({
                url: `{{ route('dokter.save_obat') }}`,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: "PUT",
                    obat_pasien_id: id,
                    id_obat: $('select[name="obat[]"]').map(function() {
                        return $(this).val();
                    }).get()
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

        function openModalLab(id) {
            // Anda dapat menambahkan data yang ingin diisi ke dalam modal2 jika perlu
            let modal4 = document.getElementById("labModal");
            modal4.style.display = "flex"; // Mengubah display modal2 menjadi flex agar tampil
            document.getElementById('lab_pasien_id').value = id
        }

        function updateDataLab(id) {
            console.log("Memanggil updateDataLab() untuk ID:", id); // Debugging
            $.ajax({
                url: `{{ route('dokter.save_lab') }}`,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: "PUT",
                    lab_pasien_id: id,
                    dlo: $('select[name="dlo[]"]').map(function() {
                        return $(this).val();
                    }).get(),
                    kimia_darah: $('select[name="kimia_darah[]"]').map(function() {
                        return $(this).val();
                    }).get(),
                    urinalisis: $('select[name="urinalisis[]"]').map(function() {
                        return $(this).val();
                    }).get(),
                    narkoba: $('select[name="narkoba[]"]').map(function() {
                        return $(this).val();
                    }).get(),
                    serologi_dengue: $('select[name="serologi_dengue[]"]').map(function() {
                        return $(this).val();
                    }).get(),
                    widal: $('select[name="widal[]"]').map(function() {
                        return $(this).val();
                    }).get(),
                    golongan_darah: $('select[name="golongan_darah[]"]').map(function() {
                        return $(this).val();
                    }).get(),
                    anti_d_rhesus: $('select[name="anti_d_rhesus[]"]').map(function() {
                        return $(this).val();
                    }).get()
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

        function openModalSoap(id, tekanan_darah, frekuensi_nadi, frekuensi_napas, suhu_tubuh, berat_badan, tinggi_badan,
            objektif_perawat) {
            document.getElementById("soap_pasien_id").value = id;
            document.getElementById("tekanan_darah").value = tekanan_darah;
            document.getElementById("frekuensi_nadi").value = frekuensi_nadi; // Tambahkan ini
            document.getElementById("frekuensi_napas").value = frekuensi_napas;
            document.getElementById("suhu_tubuh").value = suhu_tubuh;
            document.getElementById("berat_badan").value = berat_badan;
            document.getElementById("tinggi_badan").value = tinggi_badan;
            document.getElementById("objektif_perawat").value = objektif_perawat;

            let modal = document.getElementById("editPendaftarModal");
            modal.style.display = "flex";


        }

        function updateDataSoap(id) {
            console.log("Memanggil updateDataSoap() untuk ID:", id); // Debugging
            $.ajax({
                url: `{{ route('dokter.save_soap') }}`,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    _method: "PUT",
                    soap_pasien_id: id,
                    subjektif_dokter: $('[name="subjektif_dokter"]').val(),
                    objektif_dokter: $('[name="objektif_dokter"]').val(),
                    assesment_dokter: $('[name="assesment_dokter"]').val(),
                    planning_dokter: $('[name="planning_dokter"]').val(),
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

        function closeModal(id = '') {
            let modal = document.getElementById(id != '' ? id : "editPendaftarModal");
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            let modal = document.getElementById("editPendaftarModal");
            if (event.target === modal) {
                closeModal();
            }
        }

        let obats = {!! json_encode($obats) !!};

        function addNewField() {
            let fieldContainer = document.getElementById("field-obat");

            let wrapper = document.createElement("div");
            wrapper.className = "flex items-center gap-2 mt-2";

            let newSelect = document.createElement("select");
            newSelect.name = "obat[]";
            newSelect.className = "w-full p-2 border rounded";

            let defaultOption = document.createElement("option");
            defaultOption.value = "";
            defaultOption.textContent = "Pilih";
            newSelect.appendChild(defaultOption);

            obats.forEach(obat => {
                let option = document.createElement("option");
                option.value = obat.id;
                option.textContent = obat.nama;
                newSelect.appendChild(option);
            });

            let removeButton = document.createElement("button");
            removeButton.type = "button";
            removeButton.className = "px-3 py-2 bg-red-600 text-black rounded";
            removeButton.textContent = "Hapus";
            removeButton.onclick = function() {
                this.parentElement.remove();
            };

            wrapper.appendChild(newSelect);
            wrapper.appendChild(removeButton);
            fieldContainer.appendChild(wrapper);
        }

        $('select option').on('mousedown', function(e) {
            this.selected = !this.selected;
            e.preventDefault();
        });
    </script>
@endpush
