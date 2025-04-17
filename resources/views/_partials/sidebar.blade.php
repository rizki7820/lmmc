@if (auth()->user()->type == 'user')
    <li class="mt-0.5 w-full">
        <a class="py-2.7 text-sm my-0 mx-2 flex items-center px-4 transition-colors" href="{{ route('home') }}"
            style="color: #82534B;">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg">
                <img src="{{ asset('assets/icon/home.svg') }}" alt="Icon" class="h-6 w-6">
            </div>
            <span class="ml-1 text-base font-semibold">Dashboard</span>
        </a>
    </li>
@endif

<li class="mt-0.5 w-full">
    <a class="py-2.7 text-sm my-0 mx-2 flex items-center px-4 transition-colors" href="{{ route('profil') }}"
        style="color: #82534B;">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg">
            <img src="{{ asset('assets/icon/user.svg') }}" alt="Icon" class="h-6 w-6">
        </div>
        <span class="ml-1 text-base font-semibold">Profil</span>
    </a>
</li>

<li class="mt-0.5 w-full">
    <a class="py-2.7 text-sm my-0 mx-2 flex items-center px-4 transition-colors" href="{{ route('riwayat') }}"
        style="color: #82534B;">
        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg">
            <img src="{{ asset('assets/icon/file.svg') }}" alt="Icon" class="h-6 w-6">
        </div>
        <span class="ml-1 text-base font-semibold">Riwayat Pemeriksaan</span>
    </a>
</li>
