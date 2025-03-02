<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- conten --}}
    <div class="rounded bg-gray-50 dark:bg-gray-800 pt-5 pl-4">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-800 p-6">
            <div class="flex justify-between border-b pb-4">
                <h3 class="text-lg font-medium dark:text-white">{{ $dataInvoice->invoice->nm_invoice }}</h3>
                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-400">{{ $dataInvoice->invoice->kd_invoice }}
                </h4>
            </div>
            <div class="mt-6">
                <div class="mb-5 rounded-lg border p-4 dark:border-gray-700">
                    <h5 class="mb-2 text-base font-semibold text-gray-800 dark:text-white/90" id="siswa-nama">
                        {{ $siswa->siswa_nama }}
                    </h5>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400" id="nis-display">
                        {{ $siswa->siswa_nis }}
                    </p>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400" id="siswa-kelas">
                        {{ $siswa->kelas->kelas_nama }}
                    </p>

                    <!-- Divider -->
                    <hr class="my-3 border-gray-300 dark:border-gray-700">

                    <!-- Info Invoice -->
                    <p class="text-sm text-gray-500 dark:text-gray-400"><strong>Tanggal Invoice:</strong>
                        <span id="format-tanggal-hari" data-tanggal="{{ $dataInvoice->invoice->tgl_invoice }}"></span>
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-400"><strong>Jatuh Tempo:</strong>
                        <span id="format-tanggal-hari" data-tanggal="{{ $dataInvoice->invoice->jt_invoice }}"></span>
                    </p>
                </div>

                <!-- Invoice Table -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Tabel Detail Invoice -->
                    <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-800 shadow-md">
                        <div class="text-center bg-gray-100 dark:bg-gray-700 px-4 py-2 font-semibold">Detail Invoice
                        </div>
                        <table class="min-w-full border-collapse text-left text-sm">
                            <thead>
                                <tr class="border-b bg-gray-50 dark:bg-gray-700">
                                    <th class="p-3">Jenis Tagihan</th>
                                    <th class="p-3">Deskripsi</th>
                                    <th class="p-3 text-center">Nominal</th>
                                </tr>
                            </thead>
                            <tbody id="invoice-table-body">
                                @foreach ($dataTagihan as $item)
                                    <tr>
                                        <td class="p-3">{{ $item['jns_tagihan'] }}</td>
                                        <td class="p-3">{{ $item['deskripsi'] }}</td>
                                        <td id="format-nominal" class="p-3 text-center"
                                            data-nominal="{{ $item['jumlah'] }}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pb-6 my-6 text-right border-b border-gray-100 dark:border-gray-800">
                            <p class="mb-3 text-sm text-gray-500 dark:text-gray-400">
                                Potongan: <span id="format-nominal"
                                    data-nominal="{{ $dataInvoice->invoice->potongan }}"></span>
                            </p>

                            <p class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                Total Invoice : <span id="format-nominal"
                                    data-nominal="{{ $dataInvoice->invoice->total_bayar }}"></span>
                            </p>
                        </div>
                    </div>

                    <!-- Tabel Rincian Pembayaran -->
                    <div class="overflow-hidden rounded-lg border border-gray-200 dark:border-gray-800 shadow-md">
                        <div class="text-center bg-gray-100 dark:bg-gray-700 px-4 py-2 font-semibold">Rincian Pembayaran
                        </div>
                        <table class="min-w-full border-collapse text-left text-sm">
                            <thead>
                                <tr class="border-b bg-gray-50 dark:bg-gray-700">
                                    <th class="p-3">Tanggal Pembayaran</th>
                                    <th class="p-3">Total Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody id="payment-table-body">
                                @foreach ($dataPembayaran as $datpem)
                                    <tr>
                                        <td id="format-tanggal-hari" class="p-3"
                                            data-tanggal="{{ $datpem->tgl_pembayaran }}"></td>
                                        <td id="format-nominal" class="p-3"
                                            data-nominal="{{ $datpem->nom_pembayaran }}"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
                                <tr class="border-t font-semibold bg-gray-100 dark:bg-gray-800">
                                    <td class="p-3">Total Bayar</td>
                                    <td id="format-nominal" class="p-3" data-nominal="{{ $totalPembayaran }}"></td>
                                </tr>
                                <tr class="border-t font-semibold bg-gray-100 dark:bg-gray-800">
                                    <td class="p-3">Sisa Tagihan</td>
                                    <td class="p-3" id="sisa-tagihan">Rp0</td>
                                </tr>
                            </tfoot> --}}
                        </table>
                        <div class="pb-6 my-6 text-right border-b border-gray-100 dark:border-gray-800">
                            <p class="mb-3 text-sm text-gray-500 dark:text-gray-400">
                                Total Dibayar: <span id="format-nominal" data-nominal="{{ $totalPembayaran }}"></span>
                            </p>

                            <p class="text-lg font-semibold text-gray-800 dark:text-white/90">
                                Sisa Bayar : <span id="format-nominal"
                                    data-nominal="{{ $dataInvoice->invoice->total_bayar - $totalPembayaran }}"></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- conten --}}
    <x-scriptsAdd useScript="detailInvoice"/>
    {{-- <script>
        $(document).ready(function() {
            // Format tanggal dengan hari
            $("[id='format-tanggal-hari']").each(function() {
                let tanggalRaw = $(this).data("tanggal");
                if (tanggalRaw) {
                    let tanggal = new Date(tanggalRaw);
                    let formatTanggal = tanggal.toLocaleDateString("id-ID", {
                        weekday: "long",
                        day: "2-digit",
                        month: "long",
                        year: "numeric"
                    });
                    $(this).text(formatTanggal);
                }
            });

            // Format tanggal tanpa hari
            $("[id='format-tanggal']").each(function() {
                let tanggalRaw = $(this).data("tanggal");
                if (tanggalRaw) {
                    let tanggal = new Date(tanggalRaw);
                    let formatTanggal = tanggal.toLocaleDateString("id-ID", {
                        day: "2-digit",
                        month: "long",
                        year: "numeric"
                    });
                    $(this).text(formatTanggal);
                }
            });

            // <td id="format-nominal" class="p-3" data-nominal="{{ $datpem->nom_pembayaran }}"></td>
            // Format nominal rupiah
            $("[id='format-nominal']").each(function() {
                let nominalRaw = parseFloat($(this).data("nominal")) || 0; // Pastikan tetap angka
                let formatNominal = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR"
                }).format(nominalRaw);

                // Jika nominal 0, tetap tampilkan "Rp. 0"
                $(this).text(formatNominal);
            });
        });
    </script> --}}
</x-layout>
