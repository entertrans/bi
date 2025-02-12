<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="block p-6 mb-5 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

        <div class="flex items-center mb-4">
            <label for="kelas" class="block mr-3 text-sm font-medium text-gray-900 dark:text-white">Pilih Kelas</label>
            <select id="kelas" name="kelas"
                class="border rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">-- Semua Kelas --</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->kelas_id }}">{{ $k->kelas_nama }}</option>
                @endforeach
            </select>
        </div>
        {{-- <p>test {{ $id_ta }}</p> --}}
        
        {{-- jika menggunakan  withoutPhoto datanya siswa_nama , jika dengan foto withPhoto datanya nama_with_photo --}}

        <x-data-siswa status="aktif" page="tugas" :columns="[
            ['label' => 'Nama dengan Foto', 'data' => 'nama_with_photo'],
            ['label' => 'NIS', 'data' => 'siswa_nis'],
            ['label' => 'Kelas', 'data' => 'kelasNama'],
            ['label' => 'Status & Satelit', 'data' => 'status_with_satelit'],
            ['label' => 'Aksi', 'data' => 'action'],
        ]">{{ $id_ta }}</x-data-siswa>

    </div>

</x-layout>
