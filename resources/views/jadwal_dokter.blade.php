<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- <script src="https://unpkg.com/@tailwindcss/browser@4"></script> -->
    <title>Klinik MediKidz Banjarbaru</title>
</head>
<style>
    .background-container {
    background-image: url('assets/image/Jam Operasional.svg');
    background-size: cover;  /* Menutupi seluruh area */
    background-position: center center;  /* Memusatkan gambar */
    background-repeat: no-repeat;  /* Gambar tidak akan diulang */
    min-height: 100vh;  /* Membuat div minimal setinggi layar */
}

    .mychoco {
    color: #82534B;
    }


</style>
<body>
    <div class="background-container">
        <div class="text-blue-500 text-center p-10">
            <div class="sm:max-w-sm md:max-w-md lg:max-w-xl xl:max-w-3xl mx-auto my-5 p-6 bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                          <h1 class="items-center font-bold mychoco text-3xl pb-8">Daftar Dokter</h1>
                            <thead class="bg-[#709972] text-white">
                                <tr>
                                    <th class="py-3 px-2 text-center">No</th>
                                    <th class="py-3 px-6 text-center">Nama</th>
                                    <th class="py-3 px-6 text-center">Spesialis</th>
                                    <th class="py-3 px-6 text-center">Jam Operasional</th>
                                </tr>
                            </thead>
                            <tbody class="text-black">
                                @foreach ($dokter as $d)
                                <tr>
                                    <td class="py-3 px-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-2">{{ $d->nama_dokter }}</td>
                                    <td class="py-3 px-2">{{ $d->poli }}</td>
                                    <td class="py-3 px-2">{{ $d->jam_operasional }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button id="backButton" class="bg-[#709972] text-white py-2 px-8 rounded-lg text-sm font-bold shadow-md text-center hover:bg-[#5C825E] transition">
                            Kembali
                        </button>
                        <script>
                            document.getElementById("backButton").addEventListener("click", function () {
                                window.history.back();
                            });
                        </script>
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>



</html>
