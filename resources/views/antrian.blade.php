<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="./assets/image/Logo_Medikid.png" />
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="max-w-3xl mx-auto bg-green-100/50 p-6">

    <div class="flex flex-col items-center">
        <img src="{{ asset('assets/image/Logo Medikid landscape.png') }}" alt="logo"
            class="w-36 sm:w-56 md:w-60 lg:w-64 xl:w-80 max-w-full h-auto mb-2 mt-2">

        <h1 class="mt-4 text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl font-semibold text-center text-gray-800">
            ANTRIAN KLINIK
        </h1>

        <h1 class="text-lg sm:text-xl md:text-2xl lg:text-3xl xl:text-4xl font-semibold text-center text-gray-800 mb-6">
            MEDIKIDZ
        </h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <!-- Dokter 1 -->
        <div class="bg-green-500 text-white p-8 rounded-lg text-center shadow-lg">
            <h2 class="text-xl font-semibold">Dr. Iskandar, SP.A</h2>
            <p class="text-4xl font-bold" id="antrian1">10</p>
        </div>

        <!-- Dokter 2 -->
        <div class="bg-green-500 text-white p-8 rounded-lg text-center shadow-lg">
            <h2 class="text-xl font-semibold">Dr. Iskandar, SP.A</h2>
            <p class="text-4xl font-bold" id="antrian2">8</p>
        </div>

        <!-- Dokter 3 -->
        <div class="bg-green-500 text-white p-8 rounded-lg text-center shadow-lg">
            <h2 class="text-xl font-semibold">Dr. Iskandar, SP.A</h2>
            <p class="text-4xl font-bold" id="antrian3">5</p>
        </div>

        <!-- Dokter 4 -->
        <div class="bg-green-500 text-white p-8 rounded-lg text-center shadow-lg">
            <h2 class="text-xl font-semibold">Dr. Iskandar, SP.A </h2>
            <p class="text-4xl font-bold" id="antrian4">TUTUP</p>
        </div>
        <div class="bg-green-500 text-white p-8 rounded-lg text-center shadow-lg">
            <h2 class="text-xl font-semibold">Dr. Iskandar, SP.A</h2>
            <p class="text-4xl font-bold" id="antrian1">10</p>
        </div>

        <!-- Dokter 2 -->
        <div class="bg-green-500 text-white p-8 rounded-lg text-center shadow-lg">
            <h2 class="text-xl font-semibold">Dr. Iskandar, SP.A</h2>
            <p class="text-4xl font-bold" id="antrian2">8</p>
        </div>

        <!-- Dokter 3 -->
        <div class="bg-green-500 text-white p-8 rounded-lg text-center shadow-lg">
            <h2 class="text-xl font-semibold">Dr. Iskandar, SP.A</h2>
            <p class="text-4xl font-bold" id="antrian3">5</p>
        </div>

        <!-- Dokter 4 -->
        <div class="bg-green-500 text-white p-8 rounded-lg text-center shadow-lg">
            <h2 class="text-xl font-semibold">Dr. Iskandar, SP.A </h2>
            <p class="text-4xl font-bold" id="antrian4">TUTUP</p>
        </div>
    </div>
</body>

</html>
