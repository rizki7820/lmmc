@extends('_layouts.admin')

@section('content')
    <div class="w-full max-w-2xl mx-auto">
        <div class="relative flex flex-row items-center justify-between bg-[#F3F6F4] shadow-lg rounded-2xl p-6 hover:shadow-2xl transition"
            style="background: #F3F6F4 !important;">
            <div class="flex-1 p-3">
                <div class="flex-1 p-5">
                    <p id="dateTime" class="text-xl font-bold" style="color: #618162;"></p>
                    <h1 class="text-4xl font-bold text-gray-900 uppercase leading-tight">
                         Selamat Datang<br> {{ $user->name }} !
                    </h1>

                    <p class="text-gray-800 mt-3 text-lg">
                        Kelola data pasien dengan mudah & efisien melalui dashboard ini.
                    </p>

                    <a href="{{ route('perawat.antrian') }}">
                        <button
                            class="mb-2 w-32 px-4 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                            style="background-color: #709972;">
                            Data Pendaftar Hari ini
                        </button>
                    </a>
                </div>
            </div>

            <div class="w-1/3 flex justify-center">
                <img src="{{ asset('assets/image/beranda.png') }}" alt="Pendaftaran Pasien" class="w-32 h-32 object-cover">
            </div>
        </div>
    </div>

    <div class="w-full px-6 p-1 mx-auto">
        <div class="w-full max-w-2xl mx-auto">
            <div class="relative flex flex-row items-center justify-between
              bg-[#F3F6F4] shadow-sm rounded-2xl p-4 hover:shadow-2xl transition"
                style="background: #F3F6F4 !important;">
                <div class="w-1/2 flex flex-col items-center justify-center shadow-sm p-6 rounded-lg bg-white text-black">
                    <p class="text-lg font-bold">Nomor Antrian</p>
                    <h1 id="nomor-antrian" class="font-bold text-2xl">{{ $antrian->nomor ?? 0 }}</h1>

                </div>

                <div class="w-2/3 flex flex-col p-4 space-y-4 items-center">
                    <h2 class="text-gray-800 text-2xl font-semibold mb-2">Dr. Iskandar, SP.A</h2>
                    <p class="text-gray-600 mb-1">Poli Anak</p>

                    <div class="flex flex-col gap-2">
                        <button id="btn-next"
                            class="mb-2 w-32 px-4 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                            style="background-color: #709972;">
                            Urutan Selanjutnya
                        </button>

                        <button id="btn-reset"
                            class="w-32 px-4 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                            style="background-color: #e53956;">
                            Reset Antrian
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <audio id="audio-player"></audio>
@endsection

@push('js')
    <script>
        document.getElementById('btn-next').addEventListener('click', function() {
            fetch(`{{ route('perawat.antrian.next') }}`, {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('nomor-antrian').textContent = data.nomor;

                    // Membuat teks pengumuman
                    let text = `Antrian nomor ${data.nomor}, Ke ruang 102, Poli Anak.`;

                    // Konversi teks ke suara dalam bahasa Indonesia
                    let speech = new SpeechSynthesisUtterance(text);
                    speech.lang = "id-ID"; // Bahasa Indonesia
                    speech.rate = 0.8; // Kecepatan normal (1.0)
                    speech.pitch = 1; // Pitch suara normal
                    speech.volume = 1; // Volume maksimal

                    speechSynthesis.speak(speech);
                });
        });


        document.getElementById('btn-reset').addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin mereset antrian?')) {
                fetch("{{ route('perawat.antrian.reset') }}", {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(() => location.reload());
            }
        });

        $(document).ready(function() {
            $('#myTable').DataTable();
        });

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
