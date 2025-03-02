<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- conten --}}
    <div class="container mx-auto p-5">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Form Input Tagihan -->
            <div class="md:w-1/3 w-full bg-white dark:bg-gray-800 p-5 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-4">Tambah Tagihan</h2>
                <form id="formTagihan">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama
                            Tagihan</label>
                        <input type="text" id="namaTagihan"
                            class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring focus:ring-blue-300"
                            required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nominal</label>
                        <input type="number" id="nominalTagihan"
                            class="w-full p-2 border rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white focus:ring focus:ring-blue-300"
                            required>
                    </div>
                    <button type="button" id="addTagihan"
                        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                        Tambah
                    </button>
                </form>
            </div>

            <!-- Table Daftar Tagihan -->
            <div class="md:w-2/3 w-full rounded-lg bg-gray-50 dark:bg-gray-800 p-5 shadow-md">
                <h2 class="text-lg font-semibold mb-4">Daftar Tagihan</h2>
                <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-800">
                    <table class="min-w-full border-collapse text-left text-sm">
                        <thead>
                            <tr class="border-b bg-gray-100 dark:bg-gray-700">
                                <th class="p-3">Nama Tagihan</th>
                                <th class="p-3 text-center">Nominal</th>
                                <th class="p-3 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody id="Kategori">
                            <tr>
                                <td colspan="3" class="p-3 text-center text-gray-500">Tidak ada data.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- conten --}}

    <script>
        $(document).ready(function() {
            function loadTagihan() {
                $.ajax({
                    url: "{{ route('kategori.getTagihan') }}",
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        let rows = "";
                        if (response.length > 0) {
                            response.forEach(function(item) {
                                rows += `
                                    <tr data-id="${item.id_tagihan}">
                                        <td class="p-3">${item.jns_tagihan}</td>
                                        <td class="p-3 text-center">${parseInt(item.nom_tagihan).toLocaleString()}</td>
                                        <td class="p-3 text-right">
                                            <button class="text-red-600 hover:text-red-800 deleteTagihan">Hapus</button>
                                        </td>
                                    </tr>
                                `;
                            });
                        } else {
                            rows =
                                '<tr><td colspan="3" class="p-3 text-center text-gray-500">Tidak ada data.</td></tr>';
                        }
                        $("#Kategori").html(rows);
                        updateDeleteButtons();
                    }
                });
            }

            loadTagihan();

            function updateDeleteButtons() {
                $(".deleteTagihan").off("click").on("click", function() {
                    let row = $(this).closest("tr");
                    let tagihanId = row.data("id");
                    let btn = $(this); // Simpan tombol agar bisa di-disable

                    Swal.fire({
                        title: "Arsipkan Tagihan?",
                        text: "Tagihan ini tidak akan dihapus, hanya diarsipkan.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, Arsipkan!",
                        cancelButtonText: "Batal",
                        allowOutsideClick: false, // Cegah user menutup dengan klik luar
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Disable tombol sementara
                            btn.prop("disabled", true);
                            // console.log(tagihanId);


                            $.ajax({
                                url: `/kategori/${tagihanId}`,
                                type: "POST",
                                data: {
                                    _method: "PUT", // Gunakan PUT untuk update status
                                    _token: "{{ csrf_token() }}",
                                    status: 0 // Set status menjadi 0 (arsip)
                                },
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire({
                                            title: "Berhasil!",
                                            text: "Tagihan berhasil diarsipkan.",
                                            icon: "success",
                                            toast: true,
                                            position: 'top-end',
                                            timer: 2000, // Tutup otomatis dalam 2 detik
                                            showConfirmButton: false
                                        });

                                        // Refresh data setelah 2 detik
                                        setTimeout(() => {
                                            loadTagihan();
                                        }, 2000);
                                    } else {
                                        Swal.fire("Gagal!", "Terjadi kesalahan.",
                                            "error");
                                    }
                                },
                                error: function() {
                                    Swal.fire("Error!", "Gagal mengupdate data.",
                                        "error");
                                },
                                complete: function() {
                                    // Aktifkan kembali tombol setelah request selesai
                                    btn.prop("disabled", false);
                                }
                            });
                        }
                    });
                });
            }


            // Tambah Tagihan
            $("#addTagihan").on("click", function() {
                let namaTagihan = $("#namaTagihan").val();
                let nominalTagihan = $("#nominalTagihan").val();

                if (namaTagihan === "" || nominalTagihan === "") {
                    Swal.fire("Oops!", "Semua kolom harus diisi!", "warning");
                    return;
                }

                $.ajax({
                    url: "{{ route('kategori.TambahTagihan') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        nama: namaTagihan,
                        nominal: nominalTagihan
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: "Berhasil!",
                                text: "Tagihan berhasil ditambahkan.",
                                icon: "success",
                                toast: true,
                                position: 'top-end',
                                timer: 2000, // Modal otomatis tertutup dalam 2 detik
                                showConfirmButton: false, // Sembunyikan tombol OK
                                allowOutsideClick: false // Cegah user menutup modal dengan klik luar
                            });

                            $("#formTagihan")[0].reset();
                            loadTagihan(); // Refresh tabel
                        } else {
                            Swal.fire({
                                title: "Gagal!",
                                text: "Terjadi kesalahan saat menyimpan.",
                                icon: "error",
                                allowOutsideClick: false
                            });
                        }
                    }

                });
            });
        });
    </script>

</x-layout>
