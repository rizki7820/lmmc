<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="{{ asset('assets/image/Logo_Medikid.png') }}" />
    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet" />
    @stack('css')
</head>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50">
    <div style="background-color: #B0CFB4;" class="absolute w-full dark:hidden min-h-75"></div>
    <aside
        class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
        aria-expanded="false">
        <div class="h-auto p-2 flex justify-center items-center">
            <a class="block px-2 py-2 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700">
                <img src="{{ asset('assets/image/Logo_Medikid.png') }}" style="width: 150px; height: auto;"
                    alt="main_logo" />
            </a>
        </div>

        <hr
            class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

        <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
            <ul class="flex flex-col pl-0 mb-0">
                @if (auth()->user()->type == 'admin')
                    @include('_partials.sidebar-admin')
                    @include('_partials.sidebar-perawat')
                    @include('_partials.sidebar-dokter')
                @elseif (auth()->user()->type == 'perawat')
                    @include('_partials.sidebar-perawat')
                @elseif (auth()->user()->type == 'dokter')
                    @include('_partials.sidebar-dokter')
                @else
                    @include('_partials.sidebar')
                @endif

                <li class="mt-0.5 w-full">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        style="color: #82534B;">

                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <img src="{{ asset('assets/icon/logout.svg') }}" alt="Icon" class="h-6 w-6">
                        </div>

                        <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold"
                            style="color: #82534B;">
                            Keluar
                        </span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </aside>

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <div class="w-full px-6 p-4 mx-auto">
            @yield('content')
        </div>
    </main>

    <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script src="{{ asset('assets/js/argon-dashboard-tailwind.js') }}" async></script>
    @stack('js')
</body>

</html>
