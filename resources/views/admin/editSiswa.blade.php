<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- conten --}}
    <div class="grid grid-cols-6 gap-4">
        <!-- Kolom Kiri (Lebih Kecil) -->
        <div class="col-span-2">
            <div
                class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <h3 class="text-xl font-semibold dark:text-white">Profile Picture</h3>
                <div class="border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <!-- Container with flexbox to center the image -->
                    <div class="flex items-center justify-center">
                        <img class="rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0" 
                        src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($edit_pd['siswa_nama']) . '&size=100&background=random' }}" 
                        alt="{{$edit_pd['siswa_nama']}}">   
                        {{-- <img class="rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0" src="/images/users/bonnie-green-2x.png"
                            alt="Jese picture"> --}}
                    </div>
                    <div>
                        <div class="text-center my-4 text-sm text-gray-500 dark:text-gray-400">
                            JPG, GIF or PNG. Max size of 800K
                        </div>
                        <div class="items-center">
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-50 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                            (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-semibold dark:text-white">File Siswa</h3>
                <div class="mb-4">
                    <label for="settings-language"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select language</label>
                    <select id="settings-language" name="countries"
                        class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option>English (US)</option>
                        <option>Italiano</option>
                        <option>Français (France)</option>
                        <option>正體字</option>
                        <option>Español (España)</option>
                        <option>Deutsch</option>
                        <option>Português (Brasil)</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="settings-timezone"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time Zone</label>
                    <select id="settings-timezone" name="countries"
                        class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option>GMT+0 Greenwich Mean Time (GMT)</option>
                        <option>GMT+1 Central European Time (CET)</option>
                        <option>GMT+2 Eastern European Time (EET)</option>
                        <option>GMT+3 Moscow Time (MSK)</option>
                        <option>GMT+5 Pakistan Standard Time (PKT)</option>
                        <option>GMT+8 China Standard Time (CST)</option>
                        <option>GMT+10 Eastern Australia Standard Time (AEST)</option>
                    </select>
                </div>
                <div>
                    <button
                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save
                        all</button>
                </div>
            </div>
        </div>
        <!-- Kolom Kanan (Lebih Besar) -->
        <div class="col-span-4">
            <div class="col-span-2">
                {{-- DATA SISWA --}}
                <div
                    class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <h3 class="mb-4 text-xl font-semibold dark:text-white">Siswa</h3>
                    <form action="#">
                        <div class="grid grid-cols-6 gap-6">
                            <!-- nama lengkap -->
                            <div class="col-span-6 sm:col-span-full">
                                <label for="namaLengkap"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Lengkap</label>
                                <input type="text" name="namaLengkap" id="namaLengkap"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Bonnie" value="{{ $edit_pd['siswa_nama'] }}" required>
                            </div>

                            <!-- NIS dan NISN -->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nis"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                                <input type="number" name="nis" id="nis"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $edit_pd['nis'] }}" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nisn"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
                                <input type="number" name="nisn" id="nisn"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $edit_pd['nisn'] }}" required>
                            </div>

                            <!-- Email & Phone Number -->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" id="email"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $edit_pd['email'] }}" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nohp"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Hp</label>
                                <input type="number" name="nohp" id="nohp"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ $edit_pd['nohp'] }}" required>
                            </div>

                            <!-- Satelite & Kelas -->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="satelite"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Satelit</label>
                                <select id="satelite" name="countries"
                                    class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option>English (US)</option>
                                    <option>Italiano</option>
                                    <option>Français (France)</option>
                                    <option>正體字</option>
                                    <option>Español (España)</option>
                                    <option>Deutsch</option>
                                    <option>Português (Brasil)</option>
                                </select>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="kelas"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                    Kelas</label>
                                <select id="kelas" name="countries"
                                    class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option>English (US)</option>
                                    <option>Italiano</option>
                                    <option>Français (France)</option>
                                    <option>正體字</option>
                                    <option>Español (España)</option>
                                    <option>Deutsch</option>
                                    <option>Português (Brasil)</option>
                                </select>
                            </div>

                            <!-- Tempat dan Tanggal Lahir -->
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tempat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat</label>
                                <input type="text" name="tempat" id="tempat"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nisn"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Lahir</label>
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input id="datepicker-autohide" datepicker datepicker-autohide type="text"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Select date">
                                </div>
                            </div>

                            <!-- gender , kewargenegaraan, agama -->
                            <div class="flex block col-span-6 gap-4">
                                <div class="col-span-6 w-full">
                                    <label for="jenisKelamin"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                        Kelamin</label>

                                    <div
                                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="lakiLaki" type="radio" value="L" name="jenisKelamin"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="lakiLaki"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laki
                                            Laki</label>
                                    </div>
                                    <div
                                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="perempuan" type="radio" value="P" name="jenisKelamin"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="perempuan"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
                                    </div>

                                </div>
                                <div class="col-span-6 w-full">
                                    <label for="agama"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                    <select id="satelite" name="countries"
                                        class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option>English (US)</option>
                                        <option>Italiano</option>
                                        <option>Français (France)</option>
                                        <option>正體字</option>
                                    </select>
                                </div>
                                <div class="col-span-6 w-full">
                                    <label for="negara"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Negara</label>
                                    <div
                                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="lakiLaki" type="radio" value="wni" name="jenisKelamin"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="lakiLaki"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">WNI</label>
                                    </div>
                                    <div
                                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input id="perempuan" type="radio" value="wna" name="jenisKelamin"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="perempuan"
                                            class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">WNA</label>
                                    </div>
                                </div>
                            </div>

                            <!-- alamat -->
                            <div class="col-span-6 sm:col-span-full">
                                <label for="alamat"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea id="alamat" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write your thoughts here..."></textarea>

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        {{-- test --}}
        <div class="col-span-6">
            <div class="flex block col-span-6 gap-4">

                {{-- Ayah --}}
                <div
                    class="w-full p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <h3 class="mb-4 text-xl font-semibold dark:text-white">Data Ayah</h3>
                    {{-- data nama --}}
                    <div class="block mb-4 col-span-6 gap-4 sm:col-span-full">
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaAyah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Ayah</label>
                            <input type="text" name="namaAyah" id="namaAyah"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                        {{-- data nik --}}
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaAyah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nik
                                Ayah</label>
                            <input type="number" name="namaAyah" id="namaAyah"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                        {{-- data tempat lahir --}}
                        <div class="col-span-6 w-full mb-4">
                            <label for="namaAyah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir
                                Ayah</label>
                            <input type="text" name="namaAyah" id="namaAyah"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                        {{-- data tanggal lahir --}}
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaAyah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir
                                Ayah</label>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="tglAyah" datepicker datepicker-autohide type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                        </div>
                        {{-- data pendidikan terakhir --}}
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaAyah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan
                                Ayah</label>
                            <select id="settings-language" name="countries"
                                class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option>English (US)</option>
                                <option>Italiano</option>
                                <option>Français (France)</option>
                                <option>正體字</option>
                                <option>Español (España)</option>
                                <option>Deutsch</option>
                                <option>Português (Brasil)</option>
                            </select>
                        </div>
                        {{-- data pekerjaan --}}
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaAyah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan
                                Ayah</label>
                            <input type="text" name="namaAyah" id="namaAyah"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                        {{-- data penghasilan --}}
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaAyah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penghasilan
                                Ayah</label>
                            <input type="number" name="namaAyah" id="namaAyah"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                        {{-- data telp --}}
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaAyah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telp Ayah</label>
                            <input type="text" name="namaAyah" id="namaAyah"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                        {{-- data email --}}
                        <div class="col-span-6 w-full">
                            <label for="namaAyah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Ayah</label>
                            <input type="email" name="namaAyah" id="namaAyah"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                    </div>
                </div>
                {{-- ibu --}}
                <div
                    class="w-full p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <h3 class="mb-4 text-xl font-semibold dark:text-white">Data Ibu</h3>
                    {{-- nama ibu --}}
                    <div class="col-span-6 mb-4 w-full">
                        <label for="namaIbu"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Ibu</label>
                        <input type="number" name="namaIbu" id="namaIbu"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $edit_pd['nis'] }}" required>
                    </div>
                    {{-- data nik --}}
                    <div class="col-span-6 mb-4 w-full">
                        <label for="namaAyah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nik
                            Ibu</label>
                        <input type="number" name="namaIbu" id="namaIbu"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $edit_pd['nis'] }}" required>
                    </div>
                    {{-- data tempat lahir --}}
                    <div class="col-span-6 w-full mb-4">
                        <label for="namaIbu"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir
                            Ibu</label>
                        <input type="text" name="namaIbu" id="namaIbu"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $edit_pd['nis'] }}" required>
                    </div>
                    {{-- data tanggal lahir --}}
                    <div class="col-span-6 mb-4 w-full">
                        <label for="namaIbu"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir
                            Ibu</label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input id="tglIbu" datepicker datepicker-autohide type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Select date">
                        </div>
                    </div>
                    {{-- data pendidikan terakhir --}}
                    <div class="col-span-6 mb-4 w-full">
                        <label for="namaIbu"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan
                            Ibu</label>
                        <select id="settings-language" name="countries"
                            class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>English (US)</option>
                            <option>Italiano</option>
                            <option>Français (France)</option>
                            <option>正體字</option>
                            <option>Español (España)</option>
                            <option>Deutsch</option>
                            <option>Português (Brasil)</option>
                        </select>
                    </div>
                    {{-- data pekerjaan --}}
                    <div class="col-span-6 mb-4 w-full">
                        <label for="namaIbu"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan
                            Ibu</label>
                        <input type="text" name="namaIbu" id="namaIbu"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $edit_pd['nis'] }}" required>
                    </div>
                    {{-- data penghasilan --}}
                    <div class="col-span-6 mb-4 w-full">
                        <label for="namaIbu"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penghasilan
                            Ibu</label>
                        <input type="number" name="namaIbu" id="namaIbu"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $edit_pd['nis'] }}" required>
                    </div>
                    {{-- data telp --}}
                    <div class="col-span-6 mb-4 w-full">
                        <label for="namaIbu"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telp Ibu</label>
                        <input type="text" name="namaIbu" id="namaIbu"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $edit_pd['nis'] }}" required>
                    </div>
                    {{-- data email --}}
                    <div class="col-span-6 w-full">
                        <label for="namaIbu"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Ibu</label>
                        <input type="email" name="namaIbu" id="namaIbu"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $edit_pd['nis'] }}" required>
                    </div>
                </div>
                {{-- wali --}}
                <div
                    class="w-full p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <h3 class="mb-4 text-xl font-semibold dark:text-white">Data Wali</h3>
                    <div class="col-span-6 mb-4 w-full">
                        <div class="col-span-6 w-full mb-4">
                        <label for="namaWali"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Wali</label>
                        <input type="number" name="namaWali" id="namaWali"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            value="{{ $edit_pd['nis'] }}" required>
                        </div>
                            {{-- data nik --}}
                        <div class="col-span-6 w-full mb-4">
                            <label for="namaAyah"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nik
                                Wali</label>
                            <input type="number" name="namaWali" id="namaWali"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                        {{-- data tempat lahir --}}
                        <div class="col-span-6 w-full mb-4">
                            <label for="namaWali"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir
                                Wali</label>
                            <input type="text" name="namaWali" id="namaWali"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                        {{-- data tanggal lahir --}}
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaWali"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir
                                Wali</label>
                            <div class="relative max-w-sm">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input id="tglWali" datepicker datepicker-autohide type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Select date">
                            </div>
                        </div>
                        {{-- data pendidikan terakhir --}}
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaWali"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan
                                Wali</label>
                            <select id="settings-language" name="countries"
                                class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option>English (US)</option>
                                <option>Italiano</option>
                                <option>Français (France)</option>
                                <option>正體字</option>
                                <option>Español (España)</option>
                                <option>Deutsch</option>
                                <option>Português (Brasil)</option>
                            </select>
                        </div>
                        {{-- data pekerjaan --}}
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaWali"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan
                                Wali</label>
                            <input type="text" name="namaWali" id="namaWali"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                        {{-- data penghasilan --}}
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaWali"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penghasilan
                                Wali</label>
                            <input type="number" name="namaWali" id="namaWali"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                        {{-- data telp --}}
                        <div class="col-span-6 mb-4 w-full">
                            <label for="namaWali"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telp Wali</label>
                            <input type="text" name="namaWali" id="namaWali"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                        {{-- data email --}}
                        <div class="col-span-6 w-full">
                            <label for="namaWali"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Wali</label>
                            <input type="email" name="namaWali" id="namaWali"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ $edit_pd['nis'] }}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of test --}}
    </div>
    {{-- conten --}}

</x-layout>
