@props(['type' => 'withoutPhoto', 'page' => 'invoice'])

<script>
    $(document).ready(function() {
        var table = $('#datatable-siswa').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ $type === 'withPhoto' ? route('api.get.siswa.with.photo') : route('api.get.siswa.without.photo') }}",
                data: function(d) {
                    d.kelas_id = $('#kelas').val();
                    d.page_type = "{{ $page }}"; // Sesuaikan dengan halaman
                }
            },
            columns: [
                @if($type === 'withPhoto')
                {
                    data: 'nama_with_photo',
                    name: 'nama_with_photo',
                    orderable: false,
                    searchable: false,
                    className: "px-6 py-4"
                },
                @else
                {
                    data: 'siswa_nama',
                    name: 'siswa_nama',
                    className: "px-6 py-4"
                },
                @endif
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
</script>
