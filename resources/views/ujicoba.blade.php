<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BUKU INDUK</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- Font Awesome 6 CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="col-span-6">
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-4 text-xl font-semibold dark:text-white">Orang Tua & Wali</h3>
            {{-- data nama --}}
            <div class="flex block mb-4 col-span-6 gap-4 sm:col-span-full">
                <div class="col-span-6 w-full">
                    <label for="namaAyah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Ayah</label>
                    <input type="number" name="namaAyah" id="namaAyah"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>

                </div>
                <div class="col-span-6 w-full">
                    <label for="namaIbu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Ibu</label>
                    <input type="number" name="namaIbu" id="namaIbu"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
                <div class="col-span-6 w-full">
                    <label for="namaWali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Wali</label>
                    <input type="number" name="namaWali" id="namaWali"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
            </div>

            {{-- data nik --}}
            <div class="flex block mb-4 col-span-6 gap-4 sm:col-span-full">
                <div class="col-span-6 w-full">
                    <label for="namaAyah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nik Ayah</label>
                    <input type="number" name="namaAyah" id="namaAyah"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>

                </div>
                <div class="col-span-6 w-full">
                    <label for="namaIbu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nik Ibu</label>
                    <input type="number" name="namaIbu" id="namaIbu"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
                <div class="col-span-6 w-full">
                    <label for="namaWali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nik Wali</label>
                    <input type="number" name="namaWali" id="namaWali"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
            </div>

            {{-- data tempat Lahir --}}
            <div class="flex block mb-4 col-span-6 gap-4 sm:col-span-full">
                <div class="col-span-6 w-full">
                    <label for="namaAyah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir Ayah</label>
                    <input type="number" name="namaAyah" id="namaAyah"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>

                </div>
                <div class="col-span-6 w-full">
                    <label for="namaIbu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir Ibu</label>
                    <input type="number" name="namaIbu" id="namaIbu"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
                <div class="col-span-6 w-full">
                    <label for="namaWali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir Wali</label>
                    <input type="number" name="namaWali" id="namaWali"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
            </div>


            {{-- data tempat Lahir --}}
            <div class="flex block mb-4 col-span-6 gap-4 sm:col-span-full">
                <div class="col-span-6 w-full">
                    <label for="namaAyah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir Ayah</label>
                    <input type="number" name="namaAyah" id="namaAyah"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>

                </div>
                <div class="col-span-6 w-full">
                    <label for="namaIbu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir Ibu</label>
                    <input type="number" name="namaIbu" id="namaIbu"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
                <div class="col-span-6 w-full">
                    <label for="namaWali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir Wali</label>
                    <input type="number" name="namaWali" id="namaWali"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
            </div>

            {{-- data pendidikan --}}
            <div class="flex block mb-4 col-span-6 gap-4 sm:col-span-full">
                <div class="col-span-6 w-full">
                    <label for="namaAyah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan Ayah</label>
                    <input type="number" name="namaAyah" id="namaAyah"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>

                </div>
                <div class="col-span-6 w-full">
                    <label for="namaIbu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan Ibu</label>
                    <input type="number" name="namaIbu" id="namaIbu"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
                <div class="col-span-6 w-full">
                    <label for="namaWali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan Wali</label>
                    <input type="number" name="namaWali" id="namaWali"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
            </div>

            {{-- data pekerjaan --}}
            <div class="flex block mb-4 col-span-6 gap-4 sm:col-span-full">
                <div class="col-span-6 w-full">
                    <label for="namaAyah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan Ayah</label>
                    <input type="number" name="namaAyah" id="namaAyah"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>

                </div>
                <div class="col-span-6 w-full">
                    <label for="namaIbu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan Ibu</label>
                    <input type="number" name="namaIbu" id="namaIbu"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
                <div class="col-span-6 w-full">
                    <label for="namaWali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan Wali</label>
                    <input type="number" name="namaWali" id="namaWali"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
            </div>

            {{-- data pekerjaan --}}
            <div class="flex block mb-4 col-span-6 gap-4 sm:col-span-full">
                <div class="col-span-6 w-full">
                    <label for="namaAyah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penghasilan Ayah</label>
                    <input type="number" name="namaAyah" id="namaAyah"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>

                </div>
                <div class="col-span-6 w-full">
                    <label for="namaIbu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penghasilan Ibu</label>
                    <input type="number" name="namaIbu" id="namaIbu"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
                <div class="col-span-6 w-full">
                    <label for="namaWali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penghasilan Wali</label>
                    <input type="number" name="namaWali" id="namaWali"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
            </div>

            {{-- data pekerjaan --}}
            <div class="flex block mb-4 col-span-6 gap-4 sm:col-span-full">
                <div class="col-span-6 w-full">
                    <label for="namaAyah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telp Ayah</label>
                    <input type="number" name="namaAyah" id="namaAyah"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>

                </div>
                <div class="col-span-6 w-full">
                    <label for="namaIbu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telp Ibu</label>
                    <input type="number" name="namaIbu" id="namaIbu"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
                <div class="col-span-6 w-full">
                    <label for="namaWali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telp Wali</label>
                    <input type="number" name="namaWali" id="namaWali"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
            </div>

            {{-- data pekerjaan --}}
            <div class="flex block mb-4 col-span-6 gap-4 sm:col-span-full">
                <div class="col-span-6 w-full">
                    <label for="namaAyah"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Ayah</label>
                    <input type="number" name="namaAyah" id="namaAyah"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>

                </div>
                <div class="col-span-6 w-full">
                    <label for="namaIbu"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Ibu</label>
                    <input type="number" name="namaIbu" id="namaIbu"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
                <div class="col-span-6 w-full">
                    <label for="namaWali"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Wali</label>
                    <input type="number" name="namaWali" id="namaWali"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="" required>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
