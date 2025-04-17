
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('assets/image/Logo_Medikid.png') }}" />
    <title>Klinik MediKidz Banjarbaru</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 ">
    <div style="background-color: #B0CFB4;" class="absolute w-full dark:hidden min-h-75"></div>
    <!-- sidenav  -->
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
        <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('perawat.antrian')}}" style="color: #82534B;">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <img src="{{asset('assets/icon/user.svg')}}" alt="Icon" class="h-6 w-6">
                </div>
              <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Data Pasien</span>
            </a>
          </li>
          {{-- <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{ route('dokter.index') }}" style="color: #82534B;">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <img src="{{asset('assets/icon/dokter.svg')}}" alt="Icon" class="h-6 w-6">
                </div>
              <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Data Dokter</span>
            </a>
          </li> --}}

          {{-- <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="{{route('perawat.rekam-medis')}}" style="color: #82534B;">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <img src="{{asset('assets/icon/user.svg')}}" alt="Icon" class="h-6 w-6">
                </div>
              <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Data Pasien</span>
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

    <!-- end sidenav -->



    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->

        <!-- end Navbar -->

        <!-- cards -->
        <div class="w-full px-6 p-4 mx-auto">
          <!-- row 1 -->
          <div class="w-full max-w-2xl mx-auto">
            <div class="relative flex flex-row items-center justify-between
                        bg-[#F3F6F4] shadow-lg
                        rounded-2xl p-6 hover:shadow-2xl transition"
                 style="background: #F3F6F4 !important;">

                <!-- Bagian Kiri (Teks) -->
                <div class="flex-1 p-3">
                  <div class="flex-1 p-5">
                    <!-- Tanggal Realtime -->
                    <p id="dateTime" class="text-xl font-bold" style="color: #618162;"></p>

                    <!-- Salam Selamat Datang -->
                    <h1 class="text-4xl font-bold text-gray-900 uppercase leading-tight">
                        Selamat Datang,<br> {{ $user->name }} !
                    </h1>

                    <!-- Deskripsi -->
                    <p class="text-gray-800 mt-3 text-lg">
                        Kelola data pasien dengan mudah & efisien melalui dashboard ini.
                    </p>
                    <a href="{{route('perawat.antrian')}}">
                    <button class="mb-2 w-32 px-4 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105" style="background-color: #709972;">
                        Data Pendaftar Hari ini
                    </button>
                    </a>
                </div>
               </div>

                <!-- Bagian Kanan (Gambar) -->
                <div class="w-1/3 flex justify-center">
                    <img src="{{asset('assets/image/beranda.png')}}" alt="Pendaftaran Pasien" class="w-32 h-32 object-cover">
                </div>
            </div>
        </div>

          </div>
          <div class="w-full px-6 p-1 mx-auto">
            <!-- Card Utama -->
            <div class="w-full max-w-2xl mx-auto">
              <div class="relative flex flex-row items-center justify-between
              bg-[#F3F6F4] shadow-sm rounded-2xl p-4 hover:shadow-2xl transition" style="background: #F3F6F4 !important;">
                    <!-- Bagian Kiri (Nomor Antrian) -->
                    <div class="w-1/2 flex flex-col items-center justify-center shadow-sm p-6 rounded-lg bg-white text-black">
                        <p class="text-lg font-bold">Nomor Antrian</p>
                        <h1 id="nomor-antrian" class="font-bold text-2xl">{{ $antrian->nomor ?? 0 }}</h1>

                    </div>

                    <!-- Bagian Kanan (Keterangan Dokter + Tombol) -->
                    <div class="w-2/3 flex flex-col p-4 space-y-4 items-center">
                        <!-- Keterangan Dokter -->
                        <h2 class="text-gray-800 text-2xl font-semibold mb-2">Dr. Iskandar, SP.A</h2>
                        <p class="text-gray-600 mb-1">Poli Anak</p>
                        {{-- <p class="text-gray-600">Dr. Iskandar, SP.A</p> --}}


                        <!-- Tombol -->
                        <div class="flex flex-col gap-2">
                          <button id="btn-next" class="mb-2 w-32 px-4 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105" style="background-color: #709972;">
                              Urutan Selanjutnya
                          </button>

                          <button id="btn-reset" class="w-32 px-4 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105" style="background-color: #e53956;">
                            Reset Antrian
                        </button>
                      </div>



                    </div>
                </div>
            </div>
        </div>

        </div>


        <!-- end cards -->
      </main>

      <audio id="audio-player"></audio>

<script>
document.getElementById('btn-next').addEventListener('click', function () {
    fetch("{{ route('perawat.antrian.next') }}", {
        method: "POST",
        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('nomor-antrian').textContent = data.nomor;

        // Membuat teks pengumuman
        let text = `Antrian nomor ${data.nomor}, Ke ruang 102, Poli Anak.`;

        // Konversi teks ke suara dalam bahasa Indonesia
        let speech = new SpeechSynthesisUtterance(text);
        speech.lang = "id-ID";  // Bahasa Indonesia
        speech.rate = 0.8;        // Kecepatan normal (1.0)
        speech.pitch = 1;       // Pitch suara normal
        speech.volume = 1;      // Volume maksimal

        speechSynthesis.speak(speech);
    });
});


document.getElementById('btn-reset').addEventListener('click', function () {
    if (confirm('Apakah Anda yakin ingin mereset antrian?')) {
        fetch("{{ route('perawat.antrian.reset') }}", { method: "POST", headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } })
        .then(() => location.reload());
    }
});
</script>
    <script>
      $(document).ready(function() {
          $('#myTable').DataTable();
      });
  </script>

  <script>
    function updateDateTime() {
      const now = new Date();
      const options = { weekday: "long", year: "numeric", month: "long", day: "numeric" };
      const formattedDate = now.toLocaleDateString("id-ID", options);
      const formattedTime = now.toLocaleTimeString("id-ID");

      document.getElementById("dateTime").textContent = `${formattedDate} | ${formattedTime}`;
    }

    setInterval(updateDateTime, 1000);
    updateDateTime();
  </script>

  </body>
  <!-- plugin for charts  -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}" async></script>
  <!-- plugin for scrollbar  -->
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js')}}" async></script>
  <!-- main script file  -->
  <script src="{{ asset('assets/js/argon-dashboard-tailwind.js') }}" async></script>
</html>
