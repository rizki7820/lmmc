<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Klinik MediKidz Banjarbaru</title>
        <link rel="stylesheet" href="assets/css/tailwind.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <style>
         .mychoco {
            color: #82534B;
            }

    </style>
    <body class="bg-white">

        <!-- home section -->
        <section >

            <div class="container max-w-screen-2xl mx-auto">

                <nav class="flex-wrap lg:flex items-center justify-between mb-16 lg:mb-20 sticky top-0 bg-white shadow-md z-50" x-data="{navbarOpen:false}">
                    <div class="flex items-center justify-between mb-10 lg:mb-0 p-5">
                        <img src="assets/image/Logo Medikid landscape.png" alt="Logo" class="w-36 sm:w-44 md:w-56 lg:w-52 xl:w-56 h-auto">

                        <button class="flex items-center justify-center border border-yellow-900 w-10 h-10 mychoco rounded-md outline-none lg:hidden ml-auto" @click="navbarOpen = !navbarOpen">
                            <i data-feather="menu"></i>
                        </button>
                    </div>

                    <ul class="hidden lg:flex flex-col lg:flex-row lg:items-center lg:space-x-20 mr-12" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
                        <li class="font-medium mychoco text-xl hover:text-yellow-700 transition ease-in-out duration-300 mb-5 lg:mb-0">
                            <a href="{{ route('jam_operasional') }}">Jam Operasional</a>
                        </li>

                        <li class="font-medium mychoco text-xl hover:text-yellow-700 transition ease-in-out duration-300 mb-5 lg:mb-0">
                            <a href="{{ route('jadwal_dokter') }}">Jadwal Dokter</a>
                        </li>

                        <li class="font-medium mychoco text-xl hover:text-yellow-700 transition ease-in-out duration-300 mb-5 lg:mb-0">
                            <a href="{{ route('poli') }}">Daftar Poliklinik</a>
                        </li>


                    </ul>
                </nav>

                <header class="flex-col xl:flex-row flex justify-between p-5">

                    <div class="mx-auto text-center xl:text-left xl:mx-0 mb-20 xl:mb-0 pl-3">
                        <h1 class="font-bold mychoco text-3xl md:text-5xl leading-tight mb-4 mt-16" style="font-family: 'Montserrat', sans-serif;">SELAMAT DATANG<br> DI WEBSITE KLINIK MEDIKIDZ</h1>

                        <p class="font-normal mychoco text-sm md:text-xl mb-16">Mari Periksa Kesehatanmu di Klinik MediKidz </p>

                        <div class="flex items-center justify-center lg:justify-start mb-6">
                            {{-- @if (Auth::check())
                            <a href="{{ route('home') }}" class=" text-center w-64 px-8 py-3 font-medium text-white text-md md:text-lg rounded-md hover:bg-[#709972] transition ease-in-out duration-300" style="background-color: #709972;">HOME</a>
                            @else --}}
                            <a href="{{ route('login') }}" class=" text-center w-64 px-8 py-3 font-medium text-white text-md md:text-lg rounded-md hover:bg-[#709972] transition ease-in-out duration-300" style="background-color: #709972;">LOGIN</a>
                            {{-- @endif --}}
                        </div>
                        <div class="flex justify-center lg:justify-start">
                            <a href="{{ route('antrian') }}" class="w-64 px-8 py-3 font-medium text-white text-md md:text-lg rounded-md hover:bg-[#709972] transition ease-in-out duration-300 flex items-center justify-center" style="background-color: #709972;">
                                ANTRIAN LIVE
                            </a>

                        </div>
                    </div>

                    <div class="mx-auto xl:mx-0 max-w-3xl w-full h-auto">
                        <img src="assets/image/Landingpage.svg" alt="Image">
                    </div>

                </header>

            </div> <!-- container.// -->

        </section>
        <!-- home section //end -->


        <script>
            feather.replace()
        </script>

    </body>
</html>
