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

    <form id="formRaport" method="POST" action="{{ route('simpan.raport') }}" class="grid md:grid-cols-2 gap-6">
        @csrf
        <input name="siswa-nis" type="hidden" class="text-black" value="{{ $siswa->siswa_nis }}">
        <input name="idTa" type="hidden" class="text-black" value="{{ $id_ta }}">

        <!-- Bagian Kiri -->
        <div class="space-y-6">
            <!-- Mata Pelajaran -->
            <div
                class="block p-6 mb-5 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 
            dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h2 class="text-lg font-semibold mb-3 text-white">Mata Pelajaran</h2>
                @foreach ($mapel as $mpl)
                    @php
                        $mapelNama = $mpl['mapel']['nm_mapel'];
                        $nilai = $data_nilai['nilai'][$mapelNama] ?? ''; // Ambil nilai jika ada
                    @endphp
                    <div class="flex justify-between items-center mb-3">
                        <label for="nilai_{{ $mapelNama }}" class="w-2/3 text-sm font-medium text-white">
                            {{ $mapelNama }}
                        </label>
                        <input type="number" name="nilai[{{ $mapelNama }}]"
                            class="w-1/3 px-2 py-1 border border-gray-300 rounded-md text-gray-900 focus:ring-blue-500 focus:border-blue-500 text-center"
                            min="0" max="100" step="1" value="{{ $nilai }}" required />
                    </div>
                @endforeach

            </div>

            <!-- Catatan Siswa -->
            <div
                class="block p-6 mb-5 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 
            dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h2 class="text-lg font-semibold mb-2 text-white">Catatan Siswa</h2>
                <textarea name="catatan_siswa"
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 text-gray-900"
                    rows="3" placeholder="Tambahkan catatan...">{{ $data_nilai['catatan_siswa'] ?? '' }}</textarea>

            </div>
        </div>

        <!-- Bagian Kanan -->
        <div class="space-y-6">
            <!-- Catatan Penting Penilaian -->
            <div
                class="block p-6 mb-5 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 
            dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h2 class="text-lg font-semibold mb-2 text-white">Catatan Penting Penilaian</h2>
                @foreach (['Budi Pekerti / Sikap', 'Partisipasi Kelas / Kegiatan', 'Penyelesaian Tugas'] as $field)
                    <div class="flex justify-between items-center mb-3">
                        <label class="w-2/3 text-sm font-medium text-white">{{ $field }}</label>
                        <input type="text" name="catatan[{{ Str::slug($field) }}]"
                            class="w-1/3 px-2 py-1 border border-gray-300 rounded-md text-gray-900 focus:ring-blue-500 focus:border-blue-500 text-center"
                            value="{{ $data_nilai['catatan'][Str::slug($field)] ?? '' }}" />
                    </div>
                @endforeach
            </div>

            <!-- Pengembangan Diri -->
            <div
                class="block p-6 mb-5 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 
            dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h2 class="text-lg font-semibold mb-2 text-white">Kegiatan Pengembangan Diri</h2>
                @for ($i = 1; $i <= 3; $i++)
                    <div class="flex justify-between items-center mb-3">
                        <input type="text" name="pengembangan[{{ $i }}][kegiatan]"
                            placeholder="Ekstrakurikuler {{ $i }}"
                            class="w-1/2 px-2 py-1 border border-gray-300 rounded-md text-gray-900 focus:ring-blue-500 focus:border-blue-500 text-center"
                            value="{{ $data_nilai['pengembangan'][$i]['kegiatan'] ?? '' }}" />

                        <input type="text" name="pengembangan[{{ $i }}][nilai]" placeholder="Nilai"
                            class="w-1/3 px-2 py-1 border border-gray-300 rounded-md text-gray-900 focus:ring-blue-500 focus:border-blue-500 text-center"
                            value="{{ $data_nilai['pengembangan'][$i]['nilai'] ?? '' }}" />
                    </div>
                @endfor

            </div>

            <!-- Absensi -->
            <div
                class="block p-6 mb-5 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 
            dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h2 class="text-lg font-semibold mb-2 text-white">Absensi</h2>
                @foreach (['sakit', 'izin', 'tanpa-keterangan'] as $absen)
                    @php
                        $absenValue = $data_nilai['absensi'][$absen] ?? '';
                    @endphp
                    <div class="flex justify-between items-center mb-3">
                        <label
                            class="w-2/3 text-sm font-medium text-white">{{ ucfirst(str_replace('-', ' ', $absen)) }}</label>
                        <input type="number" name="absensi[{{ $absen }}]"
                            class="w-1/3 px-2 py-1 border border-gray-300 rounded-md text-gray-900 focus:ring-blue-500 focus:border-blue-500 text-center"
                            value="{{ $absenValue }}" required />
                    </div>
                @endforeach

            </div>
            <!-- Tombol Submit -->
            <div class="col-span-2 flex justify-end mt-6">
                <div class="col-span-2 flex justify-end mt-6">
                    <a href="{{ route('pilih.siswa', ['id' => $id_ta]) }}"
                        class="bg-green-500 text-white text-base mr-5 px-5 py-3 rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-300">
                        &lt; Kembali
                    </a>                    
                    <button type="submit"
                        class="bg-blue-500 text-white text-base px-5 py-3 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-300">
                        Simpan Raport
                    </button>
                </div>

            </div>
        </div>
    </form>


    {{-- </div> --}}

    {{-- conten --}}
</x-layout>
