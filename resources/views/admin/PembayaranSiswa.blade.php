<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- conten --}}
    <div class="mx-auto max-w-screen-2xl p-6 rounded bg-gray-50 dark:bg-gray-800 text-black dark:text-white">
        <div class="flex flex-col gap-6 xl:flex-row">
            <!-- Data Siswa Start -->
            <div class="w-1/3 rounded-2xl border bg-gray-50 dark:bg-gray-800 p-4">
                <div class="flex items-center mb-4">
                    <select id="kelas" name="kelas"
                        class="border rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">-- Semua Kelas --</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->kelas_id }}">{{ $k->kelas_nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div
                    class="flex items-center gap-3 rounded-lg bg-gray-100 p-3 hover:bg-gray-200 dark:hover:bg-gray-700 dark:bg-gray-800 ">
                    <x-data-siswa status="aktif" page="invoice" :columns="[
                        ['label' => 'Nama / Nis', 'data' => 'photo_with_nis'],
                        ['label' => 'Aksi', 'data' => 'action'],
                    ]"></x-data-siswa>
                </div>
            </div>
            <!-- Data Siswa End -->

            <!-- List Invoice Start -->
            <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-800 xl:w-4/5 p-6">
                <div class="flex justify-between border-b pb-4">
                    <h3 class="text-lg font-medium dark:text-white">List Invoice</h3>
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-400" id="nis-display">NIS : -</h4>
                </div>

                <div class="mt-6">
                    <div class="flex flex-col gap-6 mb-5 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h5 class="mb-2 text-base font-semibold text-gray-800 dark:text-white/90" id="siswa-nama">
                                Nama Siswa
                            </h5>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400" id="siswa-kelas">
                                Kelas -
                            </p>
                        </div>
                    </div>
                    <!-- Invoice Table -->
                    <div class="overflow-hidden rounded border border-gray-200 dark:border-gray-800">
                        <table class="min-w-full border-collapse text-left text-sm">
                            <thead>
                                <tr class="border-b bg-gray-100 dark:bg-gray-700">
                                    <th class="p-3">Nama Invoice</th>
                                    <th class="p-3">Kode Invoice</th>
                                    <th class="p-3 text-center">Nominal</th>
                                    <th class="p-3 text-center">Sisa Tagihan</th>
                                    <th class="p-3 text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody id="invoice-table-body">
                                <tr>
                                    <td colspan="5" class="p-3 text-center text-gray-500">Tidak ada data.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- List Invoice End -->
        </div>
    </div>
    {{-- conten --}}

    <!-- Modal Pembayaran -->
    <div id="paymentModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-black bg-opacity-50">
        <div class="relative p-4 w-full max-w-md"> <!-- Ubah max-w-2xl jadi max-w-md -->
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Form Pembayaran
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="paymentModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <form id="paymentForm" method="POST" action="{{ route('bayar.invoice') }}">
                        @csrf
                        <input type="hidden" name="idBayar" id="modal_invoice_id">
                        <input class="text-black" type="hidden" name="nisSiswa" id="nis_invoice_id">
                        <div>
                            <label for="payment_date"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal
                                Pembayaran</label>
                            <input name="tglBayar" type="date" id="payment_date"
                                class="mt-1 p-2 w-full border rounded-md dark:bg-gray-800 dark:text-white">
                        </div>
                        <div>
                            <label for="payment_amount"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nominal Pembayaran
                            </label>
                            <input name="jmlBayar" type="number" id="payment_amount" min="1"
                                class="mt-1 p-2 w-full border rounded-md dark:bg-gray-800 dark:text-white"
                                placeholder="0">
                        </div>
                        <div
                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Bayar</button>
                            <button type="button" data-modal-hide="paymentModal"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Event listener tombol "Lihat Invoice"
            $(document).on("click", ".btn-invoice", function() {
                let nis = $(this).data("nis"); // Ambil NIS siswa

                $.ajax({
                    url: "/admin/ListInvoice/" + nis, // Panggil route Laravel
                    type: "GET",
                    dataType: "json",
                    beforeSend: function() {
                        // Efek loading
                        $("#invoice-table-body").html(`
                            <tr>
                                <td colspan="5" class="p-3 text-center text-gray-500">Memuat data...</td>
                            </tr>
                        `);
                    },
                    success: function(response) {
                        // console.log(response);

                        // Set NIS, Nama, dan Kelas
                        $("#nis-display").text("NIS : " + response.siswa.nis);
                        $("#siswa-nama").text(response.siswa.nama);
                        $("#siswa-kelas").text("Kelas: " + response.siswa.kelas);

                        // Cek apakah ada invoice
                        if (response.DataInvoices.length > 0) {
                            let rows = "";

                            $.each(response.DataInvoices, function(index, invoice) {
                                rows += `
                                    <tr class="border-b">
                                        <td class="p-3">${invoice.nm_invoice}</td>
                                        <td class="p-3">${invoice.kd_invoice}</td>
                                        <td class="p-3 text-center">${formatRupiah(invoice.total_bayar)}</td>
                                        <td class="p-3 text-center">${formatRupiah(invoice.sisa_tagihan)}</td>
                                        <td class="p-3 text-right">
                                            <button class="open-payment-modal px-2 mx-2 py-1 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:border-purple-500 border border-purple-700 text-white rounded-md hover:bg-blue-700"
                                                data-id_invoice="${invoice.id_invoice}"data-nis_invoice="${response.siswa.nis}">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </button>
                                         <button class="px-2 py-1 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:border-purple-500 border border-purple-700 text-white rounded-md hover:bg-blue-700"><a href="/Admin/DetailInvoice/${invoice.id_invoice}/${response.siswa.nis}">
                                                <i class="fa-solid fa-circle-info"></i></a>
                                            </button>
                                        </td>
                                    </tr>
                                `;
                            });

                            $("#invoice-table-body").html(rows);
                        } else {
                            $("#invoice-table-body").html(`
                                <tr>
                                    <td colspan="5" class="p-3 text-center text-gray-500">Tidak ada data.</td>
                                </tr>
                            `);
                        }
                    },
                    error: function() {
                        $("#invoice-table-body").html(`
                            <tr>
                                <td colspan="5" class="p-3 text-center text-red-500">
                                    Gagal mengambil data.
                                </td>
                            </tr>
                        `);
                    }
                });
            });

            // Fungsi untuk format angka ke Rupiah
            function formatRupiah(angka) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(angka);
            }
        });
    </script>

    <script>
        $(document).on("click", ".open-payment-modal", function() {
            let invoiceId = $(this).data("id_invoice"); // Ambil kode invoice dari tombol
            let invoiceNis = $(this).data("nis_invoice"); // Ambil kode invoice dari tombol
            $("#modal_invoice_id").val(invoiceId); // Masukkan ke dalam modal
            $("#nis_invoice_id").val(invoiceNis); // Masukkan ke dalam modal
            $("#paymentModal").removeClass("hidden"); // Tampilkan modal
        });

        // Event untuk menutup modal
        $(document).on("click", "#closeModal, [data-modal-hide='paymentModal']", function() {
            $("#paymentModal").addClass("hidden");
        });


        // Handle form submit dengan AJAX
        $("#paymentForm").on("submit", function(e) {
            e.preventDefault();

            let invoiceId = $("#modal_invoice_id").val();
            let invoiceNis = $("#nis_invoice_id").val();
            let paymentDate = $("#payment_date").val();
            let paymentAmount = $("#payment_amount").val();

            if (!paymentDate || !paymentAmount) {
                alert("Harap isi semua data pembayaran.");
                return;
            }

            // Kirim data ke backend
            $.ajax({
                url: $(this).attr("action"),
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);

                    Swal.fire({
                        title: "Berhasil!",
                        text: "Pembayaran berhasil dilakukan.",
                        icon: "success",
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2500
                    });

                    setTimeout(() => {
                        $("#paymentModal").addClass("hidden");
                        location.reload(); // Refresh halaman agar data terbaru muncul
                    }, 2500); // Tunggu sampai toast hilang sebelum refresh
                },
                error: function(xhr) {
                    console.error("Error:", xhr.responseText);
                    alert("Terjadi kesalahan, coba lagi.");
                }
            });
        });
    </script>



</x-layout>
