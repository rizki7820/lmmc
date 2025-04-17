@extends('_layouts.admin')

@section('content')
    <div class="w-full max-w-2xl mx-auto">
        <div class="relative flex flex-row items-center justify-between
                        bg-[#F3F6F4] shadow-lg
                        rounded-2xl p-6 hover:shadow-2xl transition"
            style="background: #F3F6F4 !important;">

            <div class="flex-1 p-3">
                <div class="flex-1 p-5">
                    <p id="dateTime" class="text-xl font-bold" style="color: #618162;"></p>
                    <h1 class="text-4xl font-bold text-gray-900 uppercase leading-tight">
                        Selamat Datang,<br> {{ $user->name }} !
                    </h1>

                    <p class="text-gray-800 mt-3 text-lg">
                        Kelola data pasien dengan mudah & efisien melalui dashboard ini.
                    </p>
                </div>
            </div>

            <div class="w-1/3 flex justify-center">
                <img src="{{ asset('assets/image/beranda.png') }}" alt="Pendaftaran Pasien" class="w-32 h-32 object-cover">
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        function updateDateTime() {
            const now = new Date();
            const options = {
                weekday: "long",
                year: "numeric",
                month: "long",
                day: "numeric"
            };
            const formattedDate = now.toLocaleDateString("id-ID", options);
            const formattedTime = now.toLocaleTimeString("id-ID");

            document.getElementById("dateTime").textContent = `${formattedDate} | ${formattedTime}`;
        }

        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
@endpush
