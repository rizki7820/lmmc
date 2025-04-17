@extends('_layouts.auth')

@section('page', 'Login')
@section('content')
    <div class="bg-white rounded-2xl shadow-lg flex flex-col md:flex-row w-full max-w-4xl min-h-[500px]">
        <div class="md:w-1/2 flex items-center justify-center bg-[#C0D2C2] rounded-l-2xl p-6">
            <img src="{{ asset('assets/image/Logo_Medikid.png') }}" alt="Logo" class="w-72">
        </div>

        <div class="w-full max-w-md bg-white rounded-lg p-8 flex flex-col justify-center h-[500px] mx-auto">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-[#709972] mb-12">LOGIN</h2>

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded-lg mb-4">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

            <form action="{{ route('login') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <p class="text-sm">Silahkan masukan email dan password untuk login</p>

                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center bg-gray-300 px-3 rounded-l-lg">
                            <img src="{{ asset('assets/image/user.svg') }}" alt="Username Icon" class="w-5 h-5">
                        </span>

                        <input type="text" id="username" name="email"
                            class="w-full pl-12 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#709972]"
                            placeholder="Masukkan email">
                    </div>

                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center bg-gray-300 px-3 rounded-l-lg">
                            <img src="{{ asset('assets/image/password.svg') }}" alt="Password Icon" class="w-5 h-5">
                        </span>

                        <input type="password" id="password" name="password"
                            class="w-full pl-12 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#709972]"
                            placeholder="Masukkan password">
                    </div>

                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-[#709972] text-white py-2 rounded-lg hover:bg-[#5C825E] transition duration-300 font-bold mt-5">
                    LOGIN
                </button>
            </form>

            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-[#709972] font-bold hover:underline">
                        Daftar
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
