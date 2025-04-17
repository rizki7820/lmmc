<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
        @if ($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="text-center text-2xl font-bold text-green-700">Form Pendaftaran</h2>

        <div class="flex justify-center mt-4 border-b">
            <button id="step1Text" class="px-4 py-2 text-green-700 border-b-2 border-green-700">Step 1</button>
            <button id="step2Text" class="px-4 py-2 text-gray-500 border-b-2 border-transparent">Step 2</button>
        </div>

        <form action="{{ route('pendaftaran.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <!-- Step 1 -->
            <div id="step1" class="mt-4">
                <h3 class="text-lg font-semibold bg-green-700 text-white p-2 rounded">Data Identitas</h3>
                <input type="text" value="{{ $user->name }}" class="w-full border p-2 mt-2 rounded" disabled>
                <select name="jenis_kelamin" id="jenis_kelamin" class="w-full border p-2 mt-2 rounded">
                    <option value="Laki-laki"
                        {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan"
                        {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
                <input type="text" name="nama_orang_tua" placeholder="Nama Orang Tua / Anak (Boleh Di kosongkan)"
                    class="w-full border p-2 mt-2 rounded">
                @error('nama_orang_tua')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
                <input type="text" name="nik_anak" placeholder="NIK Anak" class="w-full border p-2 mt-2 rounded">
                @error('nik_anak')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
                <input type="text" name="nik" value="{{ $user->nik }}" placeholder="NIK"
                    class="w-full border p-2 mt-2 rounded" required>
                @error('nik')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
                <input type="text" name="tempat_lahir" value="{{ $user->tempat_lahir }}" placeholder="Tempat Lahir"
                    class="w-full border p-2 mt-2 rounded" required>
                <input type="date" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}"
                    class="w-full border p-2 mt-2 rounded" required>
                <input type="text" name="alamat" value="{{ $user->alamat }}" placeholder="Alamat"
                    class="w-full border p-2 mt-2 rounded" required>
                <div class="flex gap-2">
                    <input type="email" name="email" value="{{ $user->email }}"placeholder="Email"
                        class="w-full border p-2 mt-2 rounded" required>
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    <input type="text" name="nomor_telepon" value="{{ $user->nomor_telepon }}"
                        placeholder="Nomor Telepon" class="w-full border p-2 mt-2 rounded" required>
                    @error('nomor_telepon')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button id="next" type="button"
                    class="bg-green-600 text-white w-full py-2 mt-4 rounded">Lanjut</button>
            </div>

            <!-- Step 2 -->
            <div id="step2" class="mt-4 hidden">
                <h3 class="text-lg font-semibold bg-green-700 text-white p-2 rounded">Data Administratif</h3>
                <input type="date" name="tanggal_booking" class="w-full border p-2 mt-2 rounded" required>


                <select name="poli_tujuan" id="poli_tujuan" class="w-full border p-2 mt-2 rounded" required>
                    <option value="" disabled selected>Pilih Poli Tujuan</option>
                    <option value="Poli Umum">Poli Umum</option>
                    <option value="Poli Gigi">Poli Gigi</option>
                    <option value="Poli Anak">Poli Anak</option>
                </select>

                <select name="dokter_id" id="dokter" class="w-full border p-2 mt-2 rounded" required>
                    <option value="" disabled selected>Pilih Dokter</option>
                </select>



                <div class="flex justify-between mt-4">
                    <button id="prev" type="button"
                        class="bg-gray-400 text-white px-4 py-2 rounded">Sebelumnya</button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Daftar</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("next").addEventListener("click", function() {
            let inputs = document.querySelectorAll("#step1 input[required]");
            let valid = true;

            inputs.forEach(input => {
                if (!input.value) {
                    valid = false;
                    input.classList.add("border-red-500");
                } else {
                    input.classList.remove("border-red-500");
                }
            });

            if (valid) {
                document.getElementById("step1").classList.add("hidden");
                document.getElementById("step2").classList.remove("hidden");

                document.getElementById("step1Text").classList.replace("text-green-700", "text-gray-500");
                document.getElementById("step2Text").classList.replace("text-gray-500", "text-green-700");

                document.getElementById("step1Text").classList.replace("border-green-700", "border-transparent");
                document.getElementById("step2Text").classList.replace("border-transparent", "border-green-700");
            }
        });

        document.getElementById("prev").addEventListener("click", function() {
            document.getElementById("step2").classList.add("hidden");
            document.getElementById("step1").classList.remove("hidden");

            document.getElementById("step2Text").classList.replace("text-green-700", "text-gray-500");
            document.getElementById("step1Text").classList.replace("text-gray-500", "text-green-700");

            document.getElementById("step2Text").classList.replace("border-green-700", "border-transparent");
            document.getElementById("step1Text").classList.replace("border-transparent", "border-green-700");
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#poli_tujuan').change(function() {
                let poli = $(this).val();
                $('#dokter').html('<option value="" disabled selected>Loading...</option>');

                $.ajax({
                    url: '/get-dokter',
                    type: 'GET',
                    data: {
                        poli: poli
                    },
                    success: function(response) {
                        $('#dokter').html(
                            '<option value="" disabled selected>Pilih Dokter</option>');
                        response.forEach(function(dokter) {
                            $('#dokter').append(
                                `<option value="${dokter.id}">${dokter.nama_dokter} (${dokter.jam_operasional})</option>`
                            );
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>
