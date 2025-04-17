
<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-auto p-2 flex justify-center items-center">
        <a class="block px-2 py-2 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700">
            <img src="{{ asset('assets/image/Logo_Medikid.png') }}"
            style="width: 150px; height: auto;" alt="main_logo" />
        </a>
    </div>

  <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

  <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
    <ul class="flex flex-col pl-0 mb-0">
      <li class="mt-0.5 w-full">
        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('perawat.home')}}" style="color: #82534B;">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <img src="{{ asset('assets/icon/home.svg') }}" alt="Icon" class="h-6 w-6">
            </div>
          <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Dashboard</span>
        </a>
      </li>

      {{-- <li class="mt-0.5 w-full">
        <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
            href="{{route('obat.index')}}" style="color: #82534B;">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <img src="{{asset('assets/icon/verifikasi.svg')}}" alt="Icon" class="h-6 w-6">
            </div>
            <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Data Obat</span>
        </a>
    </li> --}}
    {{-- <li class="mt-0.5 w-full">
        <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
            href="{{route('admin.antrian')}}" style="color: #82534B;">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <img src="{{asset('assets/icon/verifikasi.svg')}}" alt="Icon" class="h-6 w-6">
            </div>
            <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Data Antrian</span>
        </a>
    </li> --}}

    <li class="mt-0.5 w-full">
        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('perawat.antrian')}}" style="color: #82534B;">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <img src="{{asset('assets/icon/user.svg')}}" alt="Icon" class="h-6 w-6">
            </div>
          <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Data Pasien</span>
        </a>
      </li>
      {{-- <li class="mt-0.5 w-full">
        <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="" style="color: #82534B;">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <img src="{{asset('assets/icon/dokter.svg')}}" alt="Icon" class="h-6 w-6">
            </div>
          <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Data Dokter</span>
        </a>
      </li> --}}


      <li class="mt-0.5 w-full">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
           style="color: #82534B;">

            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <img src="{{ asset('assets/icon/logout.svg') }}" alt="Icon" class="h-6 w-6">
            </div>

            <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">
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
