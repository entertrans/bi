<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- conten --}}


    <div
        class="block p-6 mb-5 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 
            dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="grid grid-cols-2 gap-6">
            {{-- Data sebelah kiri --}}
            <div>
                <div class="flex items-center mb-2">
                    <div class="w-40 font-semibold">Nama Sekolah</div>
                    <div class="flex-1">PKBM Anak Panah</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-40 font-semibold">Alamat</div>
                    <div class="flex-1">{{ $siswa->siswa_alamat }}</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-40 font-semibold">Nama Peserta Didik</div>
                    <div class="flex-1">{{ $siswa->siswa_nama }}</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-40 font-semibold">Nis / Nisn</div>
                    <div class="flex-1">{{ $siswa->siswa_nisn }}</div>
                </div>
            </div>

            {{-- Data sebelah kanan --}}
            <div>
                <div class="flex items-center mb-2">
                    <div class="w-40 font-semibold">Kelas</div>
                    <div class="flex-1">{{ str_replace('Kelas ', '', $siswa->kelas->kelas_nama) }}</div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-40 font-semibold">Semester</div>
                    <div class="flex-1">
                        {{ $dataTa->semester == 1 ? $dataTa->semester . ' (Satu)' : $dataTa->semester . ' (Dua)' }}
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="w-40 font-semibold">Tahun Ajaran</div>
                    <div class="flex-1">{{ $dataTa->thn_ajaran }}</div>
                </div>
            </div>
        </div>
    </div>



    {{-- <div
        class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"> --}}
        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kolom Mata Pelajaran -->
            <div class="bg-green-500 p-4 rounded-lg">
                <h2 class="text-lg font-semibold mb-3 text-white">Mata Pelajaran</h2>
                <form id="formRaport" class="space-y-3">
                    @foreach ($mapel as $mpl)      
                    <div class="flex justify-between items-center">
                        <label for="nilai_{{ $mpl['mapel']['nm_mapel'] }}" class="w-60 text-sm font-medium text-white">
                            {{ $mpl['mapel']['nm_mapel'] }}
                        </label>
                        <input type="number" id="nilai_{{ $mpl['mapel']['nm_mapel'] }}"
                            class="w-24 px-2 py-1 border border-gray-300 rounded-md text-gray-900 focus:ring-blue-500 focus:border-blue-500 text-center"
                            min="0" max="100" step="1" required />
                    </div>
                    @endforeach
                </form>
            </div>
        
            <!-- Kolom Catatan & Pengembangan Diri -->
            <div class="grid sm:grid-cols-1 md:grid-cols-1 gap-4">
                <!-- Catatan Penting Penilaian -->
                <div class="bg-green-500 p-4 rounded-lg">
                    <h2 class="text-lg font-semibold mb-2 text-white">Catatan Penting Penilaian</h2>
                    <textarea class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                        rows="3" placeholder="Tambahkan catatan..."></textarea>
                </div>
        
                <!-- Kegiatan Pengembangan Diri -->
                <div class="bg-green-500 p-4 rounded-lg">
                    <h2 class="text-lg font-semibold mb-2 text-white">Kegiatan Pengembangan Diri</h2>
                    <textarea class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                        rows="3" placeholder="Tambahkan kegiatan..."></textarea>
                </div>
            </div>
        </div>
        
        
    {{-- </div> --}}

    {{-- conten --}}
</x-layout>
