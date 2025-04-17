<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('assets/image/Logo_Medikid.png') }}" />
    <title>Klinik MediKidz Banjarbaru</title>

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- Main Styling -->
    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet" />
</head>
<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50">

    <div style="background-color: #B0CFB4;" class="absolute w-full dark:hidden min-h-75"></div>

    <!-- ASIDE (Sama di Semua Halaman) -->
    @include('partials.sidebar-admin2')


    <!-- CONTENT UTAMA -->
    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <div class="w-full px-6 p-4 mx-auto">
            @yield('content')
        </div>
    </main>

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
    <script src="{{ asset('assets/js/argon-dashboard-tailwind.js') }}" async></script>

</body>
</html>
