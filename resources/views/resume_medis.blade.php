<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="icon" type="image/png" href="{{ asset('assets/image/logo.png') }}" />
    <title>{{ config('app.name') }}</title>
</head>
<style>
    @media print {
        body * {
            visibility: hidden;
        }

        #resume,
        #resume * {
            visibility: visible;
        }

        #resume {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            max-width: 80mm;
            /* Sesuaikan dengan ukuran struk */
        }

        button {
            display: none;
        }
    }
</style>

<body>
    <div id="resume" class="max-w-4xl mx-auto bg-white p-10 shadow-lg border rounded-lg relative">
        <!-- Bagian Atas -->
        <div
            class="flex flex-col md:flex-row items-start justify-between mb-3 space-y-4 md:space-y-0 pb-4 border-b-2 border-gray-600">
            <div class="md:w-1/5 self-start">
                <img src="{{ asset('assets/image/Logo_Medikid.png') }}" alt="logo" class="w-24 h-auto">
            </div>

            <!-- Bagian Tengah: Informasi Klinik -->
            <div class="md:w-1/3 text-center self-start">
                <h1 class="text-2xl font-bold">Klinik Medikidz</h1>
                <p>Jl. Karang Anyar 2, Banjarbaru, Kalimantan Selatan</p>
            </div>

            <!-- Bagian Kanan: Nomor Rekam Medis -->
            <div class="md:w-1/4 text-left self-start">
                <p class="text-sm md:text-base">Nomor Rekam Medis</p>
                <p class="text-lg font-bold text-gray-800">{{ $pendaftaran->rekam_medis }}</p>
            </div>
        </div>

        <div class="font-bold text-center text-2xl mb-6">
            <p>RESUME MEDIS</p>
        </div>


        <p class="font-bold pb-4">Identitas Pasien</p>
        <div
            class="flex flex-col md:flex-row items-start justify-between mb-3 space-y-4 md:space-y-0 pb-4 border-b-2 border-gray-600">
            <!-- Bagian Kiri: Logo Klinik -->
            <div class="md:w-1/2 self-start font-bold space-y-2">
                <p>Nama Pasien </p>
                <p>Nama Orang Tua</p>
                <p>Jenis Kelamin</p>
                <p>Alamat</p>
            </div>
            <div class="mr-2 font-bold space-y-2">
                <p>:</p>
                <p>:</p>
                <p>:</p>
                <p>:</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-2">
                <p>{{ $pendaftaran->user->name }}</p>
                <p>{{ $pendaftaran->nama_orang_tua }}</p>
                <p>{{ $pendaftaran->user->jenis_kelamin }}</p>
                <p>
                    {{ $pendaftaran->user->alamat }}
                <p>
            </div>

            <div class="md:w-1/2 self-start font-bold space-y-2">
                <p>Tempat, Tanggal Lahir </p>
                <p>NIK</p>
            </div>

            <div class="mr-2 font-bold">
                <p>:</p>
                <p>:</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-2">
                <p>{{ $pendaftaran->user->tempat_lahir . ', ' . $pendaftaran->user->tanggal_lahir }}</p>
                <p>{{ $pendaftaran->nik_anak }}</p>
            </div>
        </div>

        <p class="font-bold pb-4">Datang Ke Klinik</p>
        <div
            class="flex flex-col md:flex-row items-start justify-between mb-3 space-y-4 md:space-y-0 pb-4 border-b-2 border-gray-600">
            <div class="md:w-1/2 self-start font-bold space-y-2">
                <p>Tanggal</p>
                <p>Jam</p>
            </div>
            <div class="mr-2 font-bold space-y-2">
                <p>:</p>
                <p>:</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-2">
                <p>..............</p>
                <p>..............</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-2">
                <p>Poli</p>
                <p>Dokter Penanggung Jawab</p>
            </div>
            <div class="mr-2 font-bold space-y-2">
                <p>:</p>
                <p>:</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-2">
                <p>{{ $pendaftaran->poli_tujuan }}</p>
                <p>..............</p>
            </div>
        </div>


        <p class="font-bold pb-4">Tanda Vital</p>
        <div
            class="flex flex-col md:flex-row items-start justify-between mb-3 space-y-4 md:space-y-0 pb-4 border-b-2 border-gray-600">
            <div class="md:w-1/2 self-start font-bold space-y-3">
                <p>TD</p>
                <p>BB</p>
            </div>
            <div class="mr-2 font-bold space-y-3">
                <p>:</p>
                <p>:</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-3">
                <p>..............</p>
                <p>..............</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-3">
                <p>N</p>
                <p>TB</p>
            </div>
            <div class="mr-2 font-bold space-y-3">
                <p>:</p>
                <p>:</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-3">
                <p>..............</p>
                <p>..............</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-3">
                <p>FN</p>
                <p>LK</p>
            </div>
            <div class="mr-2 font-bold space-y-3">
                <p>:</p>
                <p>:</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-3">
                <p>..............</p>
                <p>..............</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-3">
                <p>T</p>
                <p>LiLa</p>
            </div>
            <div class="mr-2 font-bold space-y-3">
                <p>:</p>
                <p>:</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-3">
                <p>..............</p>
                <p>..............</p>
            </div>
        </div>
        <p class="font-bold pb-4">Riwayat Penyakit</p>
        <div
            class="flex flex-col md:flex-row items-start justify-between mb-3 space-y-4 md:space-y-0 pb-4 border-b-2 border-gray-600">

            <div class="self-start font-bold space-y-3">
                ISI RIWAYAT PENYAKIT DISINI
            </div>

        </div>
        <div
            class="flex flex-col md:flex-row items-start justify-between mb-3 space-y-4 md:space-y-0 pb-4 border-b-2 border-gray-600">
            <div class="md:w-1/2 self-start font-bold space-y-20">
                <p>Pemeriksaan Fisik</p>
                <p>Terapi yang diberikan</p>
            </div>
            <div class="mr-2 font-bold space-y-20">
                <p>:</p>
                <p>:</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-20">
                <p>..............</p>
                <p>..............</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-20">
                <p>Pemeriksaan Penunjang</p>
                <p>Diagnosa</p>
            </div>
            <div class="mr-2 font-bold space-y-20">
                <p>:</p>
                <p>:</p>
            </div>
            <div class="md:w-1/2 self-start font-bold space-y-20">
                <p>..............</p>
                <p>..............</p>
            </div>
        </div>
        <p class="font-bold text-right pb-5">{{ $pendaftaran->dokter->nama_dokter }}</p>

        <div class="flex justify-center">
            <button onclick="printResume()" class="mt-6 px-4 py-2 bg-blue-500 text-white rounded shadow">
                Cetak Resume Medis
            </button>
        </div>

        <script>
            function printResume() {
                let resume = document.getElementById('resume').innerHTML;
                let original = document.body.innerHTML;

                document.body.innerHTML = resume;
                window.print();
                document.body.innerHTML = original;
            }
        </script>

</body>

</html>
