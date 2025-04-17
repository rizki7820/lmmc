@extends('_layouts.admin')

@section('content')
    <div class="w-full max-w-2xl mx-auto">
        <div class="relative flex flex-wrap items-center bg-white shadow-lg rounded-2xl p-6">
            <div class="ml-4">
                <h1 class="text-2xl font-bold">DATA PROFIL</h1>
                <h1 class="text-xl font-bold ">{{ $user->name }}</h1>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-2xl p-6 mt-6">

            @if (session('success'))
                <p class="text-slate-700 font-bold">{{ session('success') }}</p>
            @endif

            <form action="{{ route('profil.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label class="block mb-2 text-md font-bold">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full p-2 border rounded">

                <label class="block mt-4 text-md font-bold">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $user->nik) }}" class="w-full p-2 border rounded">

                <label class="block mt-4 text-md font-bold">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="w-full p-2 border rounded">
                    <option value="Laki-laki"
                        {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan"
                        {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>

                <label class="block mt-4 text-md font-bold">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}"
                    class="w-full p-2 border rounded">

                <label class="block mt-4 text-md font-bold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}"
                    class="w-full p-2 border rounded">

                <label class="block mt-4 text-md font-bold">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $user->nomor_telepon) }}"
                    class="w-full p-2 border rounded">

                <label class="block mt-4 text-md font-bold">Alamat</label>
                <input type="text" name="alamat" value="{{ old('alamat', $user->alamat) }}"
                    class="w-full p-2 border rounded">


                <label class="block mt-4 text-md font-bold">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full p-2 border rounded">

                <button type="submit" class="mt-4 px-4 py-2 text-white rounded-lg "
                    style="background-color: #709972;">Update Profil</button>
            </form>
        </div>
    </div>
@endsection
