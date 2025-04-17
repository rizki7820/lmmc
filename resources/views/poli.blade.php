@extends('_layouts.guest')

@section('content')
    <div class="background-container">
        <div class="text-blue-500 text-center p-12">
            <div
                class="sm:max-w-sm md:max-w-md lg:max-w-xl xl:max-w-3xl mx-auto my-8 p-6 bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                            <h1 class="items-center font-bold mychoco text-3xl pb-8">Daftar Poliklinik</h1>
                            <thead class="bg-[#709972] text-white">
                                <tr>
                                    <th class="py-3 px-2 text-center">No</th>
                                    <th class="py-3 px-6 text-center">Nama Poli</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr class="border-b hover:bg-gray-100 text-black">
                                    <td class="py-3 px-2">1</td>
                                    <td class="py-3 px-6">POLI UMUM</td>
                                </tr>

                                <tr class="border-b hover:bg-gray-100 text-black">
                                    <td class="py-3 px-2">2</td>
                                    <td class="py-3 px-6">POLI GIGI</td>
                                </tr>

                                <tr class="border-b hover:bg-gray-100 text-black">
                                    <td class="py-3 px-2">3</td>
                                    <td class="py-3 px-6">POLI ANAK</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-end mt-6">
                        <button id="backButton"
                            class="bg-[#709972] text-white py-2 px-8 rounded-lg text-sm font-bold shadow-md text-center hover:bg-[#5C825E] transition">
                            Kembali
                        </button>

                        <script>
                            document.getElementById("backButton").addEventListener("click", function() {
                                window.history.back();
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head')
    <style>
        .background-container {
            background-image: url("{{ asset('assets/image/Jam Operasional.svg') }}");
            background-size: cover;
            /* Menutupi seluruh area */
            background-position: center center;
            /* Memusatkan gambar */
            background-repeat: no-repeat;
            /* Gambar tidak akan diulang */
            min-height: 100vh;
            /* Membuat div minimal setinggi layar */
        }

        .mychoco {
            color: #82534B;
        }
    </style>
@endpush
