
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/image/Logo_Medikid.png" />
    <title>Klinik MediKidz Banjarbaru</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css')}}" rel="stylesheet" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- jQuery & DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
      body1 {
          font-family: Arial, sans-serif;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
          background-color: #f4f4f4;
      }
      button1 {
          padding: 10px 20px;
          font-size: 16px;
          border: none;
          background-color: #007bff;
          color: white;
          border-radius: 5px;
          cursor: pointer;
      }
  </style>
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 ">
    <div style="background-color: #B0CFB4;" class="absolute w-full dark:hidden min-h-75"></div>
    <!-- sidenav  -->
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
        <div class="h-auto p-2 flex justify-center items-center">
            <a class="block px-2 py-2 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700">
                <img src="{{asset('assets/image/Logo_Medikid.png') }}"
                style="width: 150px; height: auto;" alt="main_logo" />
            </a>
        </div>

      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

      <div class="items-center block w-auto max-h-screen overflow-auto">
        <ul class="flex flex-col pl-0 mb-0">
          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="dashboard.html" style="color: #82534B;">
                    <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <img src="{{ asset('assets/icon/home.svg') }}" alt="Icon" class="h-6 w-6">
                </div>
              <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Dashboard</span>
            </a>
          </li>
          <li class="mt-0.5 w-full">
            <a class="dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                href="pages/tables.html" style="color: #82534B;">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <img src="{{ asset('assets/icon/verifikasi.svg') }}" alt="Icon" class="h-6 w-6">
                </div>
                <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Data Antrian</span>
            </a>
        </li>


          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="dokter.html" style="color: #82534B;">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <img src="{{ asset('assets/icon/dokter.svg')}}" alt="Icon" class="h-6 w-6">
                </div>
              <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Data Dokter</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/virtual-reality.html" style="color: #82534B;">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <img src="{{ asset('assets/icon/user.svg')}}" alt="Icon" class="h-6 w-6">
                </div>
              <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Data Pasien</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/rtl.html" style="color: #82534B;">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <img src="{{ asset('assets/icon/file.svg')}}" alt="Icon" class="h-6 w-6">
                </div>
              <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Data Lainnya</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="./pages/profile.html" style="color: #82534B;">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <img src="{{ asset('assets/icon/logout.svg') }}" alt="Icon" class="h-6 w-6">
            </div>
              <span class="ml-1 text-base duration-300 opacity-100 pointer-events-none ease font-semibold" style="color: #82534B;">Keluar</span>
            </a>
          </li>
        </ul>
      </div>
    </aside>

    <!-- end sidenav -->



    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <!-- Navbar -->

      <!-- end Navbar -->
      <div class=" p-4 text-right">
        <p id="dateTime" class="text-xl font-bold mt-2" style="color: #618162;"></p>

      </div>
      <!-- cards -->
      <div class="w-full px-6 mx-auto">
        <!-- row 1 -->
        <div class="flex flex-wrap -mx-3">
          <!-- card1 -->
          <div class="w-full max-w-full px-3 mb-2 sm:w-1/2 xl:w-1/4">
            <div class="w-full max-w-xs mx-auto">
                <div class="relative flex flex-col items-center justify-center min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6 text-center hover:shadow-2xl transition">
                    <!-- Nominal -->
                    <p class="text-4xl font-bold text-gray-800 dark:text-white uppercase">Pendaftaran Pasien</p>
                    <h1 class="text-4xl font-bold text-gray-800 dark:text-white">15</h1>
                    <!-- Tombol -->
                    <button class="px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                        style="background-color: #709972;">
                        Lihat Detail
                    </button>
                </div>
            </div>
        </div>


          <!-- card2 -->
          <div class="w-full max-w-full px-3 mb-2 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
              <div class="w-full max-w-xs mx-auto">
                    <div class="relative flex flex-col items-center justify-center min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6 text-center hover:shadow-2xl transition">
                      <!-- Nominal -->
                      <p class="text-4xl font-bold text-gray-800 dark:text-white uppercase">Daftar Tunggu</p>
                      <h1 class="text-4xl font-bold text-gray-800 dark:text-white">10</h1>
                      <!-- Tombol -->
                      <button class="px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                          style="background-color: #709972;">
                          Lihat Detail
                      </button>
                  </div>
              </div>
            </div>
          </div>

          <!-- card3 -->
          <div class="w-full max-w-full px-3 mb-2 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
               <div class="w-full max-w-xs mx-auto">
                    <div class="relative flex flex-col items-center justify-center min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6 text-center hover:shadow-2xl transition">
                      <!-- Nominal -->
                      <p class="text-4xl font-bold text-gray-800 dark:text-white uppercase">Proses Pemeriksaan</p>
                      <h1 class="text-4xl font-bold text-gray-800 dark:text-white">3</h1>
                      <!-- Tombol -->
                      <button class="px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                          style="background-color: #709972;">
                          Lihat Detail
                      </button>
                  </div>
              </div>
            </div>
          </div>

          <!-- card4 -->
          <div class="w-full max-w-full mb-2 px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
              <div class="w-full max-w-xs mx-auto">
                    <div class="relative flex flex-col items-center justify-center min-w-0 break-words bg-white shadow-lg dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6 text-center hover:shadow-2xl transition">
                      <!-- Nominal -->
                      <p class="text-4xl font-bold text-gray-800 dark:text-white uppercase">Pemeriksaan Selesai</p>
                      <h1 class="text-4xl font-bold text-gray-800 dark:text-white">3</h1>
                      <!-- Tombol -->
                      <button class="px-6 py-2 text-white text-sm font-semibold rounded-lg shadow-md transition transform hover:scale-105"
                          style="background-color: #709972;">
                          Lihat Detail
                      </button>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div class="flex flex-wrap mt-6 -mx-3">
          <!-- Card Tabel -->
          <div class="flex-none w-full max-w-full px-3">
              <div class="relative flex flex-col min-w-0 mb-4 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-4">
                <h1 class="text-xl font-bold mb-6 text-center mt-4" style="color: #82534B; font-size: 24px;">DATA PENDAFTARAN</h1>
                  <div class="overflow-x-auto">
                    <table id="myTable" class="min-w-full border border-gray-300 rounded-lg">
                      <thead>
                          <tr class="bg-[#E5D9D6] border-b border-gray-400" style="background-color: #E5D9D6;" >
                              <th class="p-3 text-left border-r border-gray-300">No</th>
                              <th class="p-3 text-left border-r border-gray-300">Nama</th>
                              <th class="p-3 text-left border-r border-gray-300">Usia</th>
                              <th class="p-3 text-left border-r border-gray-300">Status</th>
                              <th class="p-3 text-left">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr class="border-b border-gray-200">
                              <td class="p-3 border-r border-gray-300">1</td>
                              <td class="p-3 border-r border-gray-300">Ahmad</td>
                              <td class="p-3 border-r border-gray-300">25</td>
                              <td class="p-3 text-green-500 border-r border-gray-300">Selesai</td>
                              <td class="p-3 text-center flex justify-center items-center">
                                <!-- Tombol View -->
                                <button class="mx-2">
                                    <img src="{{ asset('assets/icon/Details.svg') }}" class="w-6 h-6" alt="View">
                                </button>
                                <!-- Tombol Konfirmasi -->
                                <button onclick="showConfirmation('John Doe')" class="mx-2">
                                    <img src="{{ asset('assets/icon/konfir.svg')}}" class="w-6 h-6" alt="Konfirmasi">
                                </button>
                            </td>

                          </tr>

                      </tbody>
                  </table>

                  </div>
              </div>
          </div>
        </div>


      <!-- end cards -->
    </main>
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

  <script>
    function showConfirmation(namaPasien) {
        Swal.fire({
            title: 'Konfirmasi Pasien',
            text: `Apakah Anda yakin ingin mengkonfirmasi pasien ${namaPasien}?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Konfirmasi!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Terkonfirmasi!',
                    text: `Pasien ${namaPasien} telah dikonfirmasi.`,
                    icon: 'success',
                    confirmButtonColor: '#3085d6' // Tombol "OK" menjadi biru
                });
            }
        });
    }
</script>

  </body>
  <!-- plugin for charts  -->
  <script src="assets/js/plugins/chartjs.min.js" async></script>
  <!-- plugin for scrollbar  -->
  <script src="assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- main script file  -->
  <script src="assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>
</html>
