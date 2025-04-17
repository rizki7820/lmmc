<li class="mt-0.5 w-full">
    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
        href="{{ route('admin.home') }}" style="color: #82534B;">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <img src="{{ asset('assets/icon/home.svg') }}" alt="Icon" class="h-6 w-6">
        </div>

        <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold"
            style="color: #82534B;">
            Dashboard Admin
        </span>
    </a>
</li>

<li class="mt-0.5 w-full">
    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
        href="{{ route('perawat.antrian') }}" style="color: #82534B;">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <img src="{{ asset('assets/icon/user.svg') }}" alt="Icon" class="h-6 w-6">
        </div>

        <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold"
            style="color: #82534B;">
            Data Pendaftaran
        </span>
    </a>
</li>

<li class="mt-0.5 w-full">
    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
        href="{{ route('obat.index') }}" style="color: #82534B;">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <img src="{{ asset('assets/icon/file.svg') }}" alt="Icon" class="h-6 w-6">
        </div>

        <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold"
            style="color: #82534B;">
            Data Obat
        </span>
    </a>
</li>

<li class="mt-0.5 w-full">
    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
        href="{{ route('dokter.index') }}" style="color: #82534B;">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <img src="{{ asset('assets/icon/dokter.svg') }}" alt="Icon" class="h-6 w-6">
        </div>

        <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold"
            style="color: #82534B;">
            Data Dokter
        </span>
    </a>
</li>
