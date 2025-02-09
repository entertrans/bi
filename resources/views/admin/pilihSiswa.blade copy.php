<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="rounded bg-gray-50 dark:bg-gray-800 p-5">

        <div class="mb-6">
            <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Kelas</label>
            <select id="kelas" name="kelas"
                class="mb-4 p-2 border rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">-- Semua Kelas --</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->kelas_id }}">{{ $k->kelas_nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="relative shadow-md sm:rounded-lg">
            <div id="siswa-table">
                <table id="datatable-siswa"
                    class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-5">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">NIS</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data di-load oleh DataTables -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <script>
        $(document).ready(function() {
            var table = $('#datatable-siswa').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('api.get.siswa.with.photo') }}", // Ganti jika tanpa foto
                    data: function(d) {
                        d.kelas_id = $('#kelas').val();
                        d.page_type = 'eraport'; // Pastikan sesuai kebutuhan
                    }
                },
                columns: [
                    {
                        data: 'nama_with_photo',
                        name: 'nama_with_photo',
                        orderable: false,
                        searchable: false,
                        className: "px-6 py-4"
                    },
                    {
                        data: 'siswa_nis',
                        name: 'siswa_nis',
                        className: "font-semibold px-6 py-4"
                    },
                    {
                        data: 'siswa_email',
                        name: 'siswa_email',
                        className: "font-semibold px-6 py-4"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        className: "px-6 py-4",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#kelas').change(function() {
                table.ajax.reload();
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            var table = $('#datatable-siswa').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('api.get.siswa.without.photo') }}", // Gunakan API tanpa foto
                    data: function(d) {
                        d.kelas_id = $('#kelas').val();
                        d.page_type = 'invoice'; // Ganti sesuai halaman yang ingin ditampilkan
                    }
                },
                columns: [
                    { data: 'siswa_nama', name: 'siswa_nama', className: "px-6 py-4" },
                    { data: 'siswa_nis', name: 'siswa_nis', className: "font-semibold px-6 py-4" },
                    { data: 'siswa_email', name: 'siswa_email', className: "font-semibold px-6 py-4" },
                    {
                        data: 'action',
                        name: 'action',
                        className: "px-6 py-4",
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#kelas').change(function() {
                table.ajax.reload();
            });
        });
    </script>

</x-layout>
