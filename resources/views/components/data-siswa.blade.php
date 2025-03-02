@props(['status' => 'aktif', 'page' => '', 'columns' => []])
<div class="relative shadow-md sm:rounded-lg ">
<div id="siswa-table">
    <table id="datatable-siswa"
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pt-5">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                @foreach ($columns as $column)
                    <th scope="col" class="px-6 py-3">{{ $column['label'] }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            <!-- Data di-load oleh DataTables -->
        </tbody>
    </table>
</div>
</div>
<script>
    $(document).ready(function() {
        var table = $('#datatable-siswa').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('api.get.siswa') }}",
                data: function(d) {
                    d.kelas_id = $('#kelas').val();
                    d.page_type = '{{ $page }}';
                    d.idTa = '{{ $slot }}';
                    d.status = '{{ $status }}'; // Tambahkan status ke request AJAX
                    // console.log("Data yang dikirim:", d); // ✅ Console log data request
                }
            },
            columns: [
                @foreach ($columns as $column)
                    { data: '{{ $column["data"] }}', name: '{{ $column["data"] }}', className: "px-6 py-4 " },
                @endforeach
            ]
        });

        $('#kelas').change(function() {
            table.ajax.reload();
        });
    });
</script>
