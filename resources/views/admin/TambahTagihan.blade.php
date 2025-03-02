<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <style>
        .nama-siswa {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* Maksimal 3 baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
            /* Supaya bisa word wrap */
            max-width: 200px;
            /* Sesuaikan dengan kebutuhan */
            word-break: break-word;
            /* Memaksa teks turun ke bawah */
        }
    </style>
    {{-- conten --}}
    <div class="rounded bg-gray-50 dark:bg-gray-800 pt-5 pl-4">
        <form action="{{ route('simpan.invoice') }}" method="POST" autocomplete="off">
            @csrf
            <input type="hidden" name="nm_invoice" value="{{ $title }}">
            
            <textarea class="hidden" name="data_siswa">{{ $dataSiswaJson }}</textarea>
            <div class="mx-auto max-w-screen-2xl p-6 rounded bg-gray-50 dark:bg-gray-800 text-white">
                <div class="flex flex-col gap-6 xl:flex-row">
                    <!-- Invoice Sidebar Start -->
                    <div class="rounded-2xl border bg-gray-50 dark:bg-gray-800 p-4">
                        <table id="datatablestest"
                            class="w-500 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Lengkap
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siswa as $dtsiswa)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <img class="w-10 h-10 rounded-full"
                                                src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($dtsiswa['nama']) . '&size=100&background=random' }}"
                                                alt="{{ $dtsiswa['nama'] }}">
                                            <div class="ps-3">
                                                <div class="text-base font-semibold nama-siswa">{{ $dtsiswa['nama'] }}
                                                </div>
                                                <div class="font-normal text-gray-500">{{ $dtsiswa['nis'] }}</div>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- Invoice Sidebar End -->

                    <!-- Invoice Mainbox Start -->

                    <input type="hidden" name="tanggal_invoice" value="{{ $TglInv }}">
                    <input type="hidden" name="tanggal_jatuh_tempo" value="{{ $TglJt }}">
                    {{-- <input name="tanggal_invoice" type="text" value="{{ $TglInv }}"> --}}
                    {{-- <input name="tanggal_jatuh_tempo" type="text" value="{{  }}"> --}}
                    <div
                        class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-800 xl:w-4/5 p-6">
                        <div class="flex justify-between border-b pb-4 mb-4">
                            <h3 class="text-lg font-medium dark:text-white">Invoice</h3>
                        </div>

                        <div class="flex flex-col gap-6 mb-9 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <span class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Tanggal
                                    Tagihan:</span>
                                <span class="block text-sm text-gray-500 dark:text-gray-400" id="tanggal-invoice">
                                    {{ $TglInv }}
                                </span>
                            </div>

                            <div class="h-px w-full bg-gray-200 dark:bg-gray-800 sm:h-[158px] sm:w-px"></div>

                            <div class="sm:text-right">
                                <span class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">Jatuh
                                    Tempo:</span>
                                <span class="block text-sm text-gray-500 dark:text-gray-400" id="tanggal-jatuh-tempo">
                                    {{ $TglJt }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <div class="overflow-hidden rounded border border-gray-200 dark:border-gray-800">
                                <table class="min-w-full border-collapse text-left text-sm">
                                    <thead>
                                        <tr class="border-b bg-gray-100 dark:bg-gray-700">
                                            <th class="p-3">Jenis Tagihan</th>
                                            <th class="p-3">Deskripsi</th>
                                            <th class="p-3 text-center">Tagihan</th>
                                            <th class="p-3 text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-black" id="invoiceTable">
                                        <tr class="border-b">
                                            <td class="p-3 w-[30%]">
                                                <select name="jenis_tagihan[]"
                                                    class="jenis-tagihan bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected disabled>-- Pilih Jenis Tagihan --</option>
                                                    @foreach ($Jenis as $jnsTagihan)
                                                        <option value="{{ $jnsTagihan->id_tagihan }}">
                                                            {{ $jnsTagihan->jns_tagihan }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="p-3 w-[50%]">
                                                <input type="text" name="deskripsi[]"
                                                    class="border rounded p-1 w-full">
                                            </td>
                                            <td class="p-3 w-[20%]">
                                                <input type="number" name="tagihan[]"
                                                    class="border rounded p-1 w-full tagihan-input">
                                            </td>
                                            <td class="p-3 text-center w-16">
                                                <button type="button" class="remove-row text-red-500 font-bold hidden">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                                <button type="button" class="add-row text-blue-500 font-bold ml-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="text-right border-t pt-4 mt-6">
                            <button id="refreshTotal" type="button"
                                class="ml-3 text-gray-800 dark:text-white hover:text-blue-500">
                                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                                </svg>
                            </button>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Sub Total: <span id="subTotal">Rp.
                                    0</span></p>
                            <div class="flex mr-0 justify-between items-center w-full max-w-md mx-auto">
                                <label class="text-sm text-gray-500 dark:text-gray-400 w-[75%]">Potongan:</label>
                                <input type="number" name="potongan" id="potongan"
                                    class="text-black border rounded p-1 w-[20%] potongan-input">
                            </div>
                            <p class="text-lg font-semibold dark:text-white">Total: <span id="total">Rp. 0</span>
                            </p>
                        </div>

                        <div class="mt-6 flex justify-end gap-3">
                            <button type="submit"
                                class="rounded-lg border border-green-300 bg-white px-4 py-2 text-sm font-medium text-green-700 hover:bg-green-100 dark:border-green-700 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-green-700">
                                Proses Invoice
                            </button>
                        </div>
                    </div>
        </form>
    </div>
    <!-- Invoice Mainbox End -->
    </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let hargaTagihan = @json($Jenis);

            // Function untuk memperbarui tombol add/remove
            function updateButtons() {
                let rows = document.querySelectorAll("#invoiceTable tr");
                rows.forEach((row, index) => {
                    let addButton = row.querySelector(".add-row");
                    let removeButton = row.querySelector(".remove-row");

                    if (index === 0) {
                        addButton.classList.remove("hidden"); // Baris pertama tetap ada tombol +
                        removeButton.classList.add("hidden"); // Baris pertama tidak ada tombol -
                    } else {
                        addButton.classList.add("hidden"); // Baris lainnya tidak ada tombol +
                        removeButton.classList.remove("hidden"); // Baris lainnya ada tombol -
                    }
                });
            }

            // Event listener untuk mengubah harga saat dropdown berubah
            document.addEventListener("change", function(event) {
                if (event.target.classList.contains("jenis-tagihan")) {
                    let selectedId = event.target.value;
                    let parentRow = event.target.closest("tr");
                    let inputHarga = parentRow.querySelector(".tagihan-input");

                    let harga = hargaTagihan.find(item => item.id_tagihan == selectedId)?.nom_tagihan || '';
                    inputHarga.value = harga;
                }
            });

            // Event listener untuk menambahkan row baru
            document.addEventListener("click", function(event) {
                if (event.target.closest(".add-row")) {
                    let tableBody = document.getElementById("invoiceTable");
                    let newRow = tableBody.querySelector("tr").cloneNode(true);

                    // Reset nilai input pada row baru
                    newRow.querySelector(".jenis-tagihan").selectedIndex = 0;
                    newRow.querySelector(".tagihan-input").value = "";
                    newRow.querySelector("input[type='text']").value = "";

                    tableBody.appendChild(newRow);
                    updateButtons(); // Perbarui tampilan tombol
                }
            });

            // Event listener untuk menghapus row
            document.addEventListener("click", function(event) {
                if (event.target.closest(".remove-row")) {
                    let row = event.target.closest("tr");
                    if (document.querySelectorAll("#invoiceTable tr").length > 1) {
                        row.remove();
                        updateButtons(); // Perbarui tampilan tombol
                    }
                }
            });

            // Jalankan fungsi untuk set tombol awal
            updateButtons();
        });
    </script>
    <script>
        document.getElementById("refreshTotal").addEventListener("click", function() {
            hitungTotal(); // Panggil ulang fungsi perhitungan total
        });
    </script>
    <script>
        $(document).ready(function() {
            function hitungTotal() {
                let total = 0;

                // Ambil semua input harga dalam tabel
                $(".tagihan-input").each(function() {
                    let harga = parseFloat($(this).val()) || 0;
                    total += harga;
                });

                // Update Sub Total
                $("#subTotal").text(`Rp. ${total.toLocaleString()}`);

                // Ambil nilai potongan
                let potongan = parseFloat($("#potongan").val()) || 0;

                // Hitung Total akhir (tidak boleh negatif)
                let totalAkhir = Math.max(total - potongan, 0);
                $("#total").text(`Rp. ${totalAkhir.toLocaleString()}`);
            }

            // Event listener untuk perubahan input harga atau potongan
            $(document).on("input", ".tagihan-input, #potongan", function() {
                hitungTotal();
            });

            // Hitung ulang jika ada perubahan pada tabel (nambah/hapus baris)
            $(document).on("click", ".add-row, .remove-row", function() {
                setTimeout(hitungTotal, 100); // Delay biar elemen baru terdeteksi
            });

            // Button Refresh Total
            $("#refreshTotal").click(function() {
                hitungTotal();
            });

            // Hitung total saat halaman pertama kali dimuat
            hitungTotal();
        });
    </script>

    <script>
        // Format Tanggal Indonesia
        function formatTanggal(tanggal) {
            const options = {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            };
            return new Date(tanggal).toLocaleDateString('id-ID', options);
        }

        document.getElementById('tanggal-invoice').innerText = formatTanggal(new Date());
        document.getElementById('tanggal-jatuh-tempo').innerText = formatTanggal(new Date(new Date().setDate(new Date()
            .getDate() + 30)));
    </script>
    <script>
        $('#datatablestest').DataTable({
            paging: false, // Matikan pagination
            searching: false, // Hilangkan kolom pencarian
            info: false, // Hilangkan teks "Showing X of Y entries"
            scrollY: "300px", // Aktifkan scroll vertical
            scrollCollapse: true,
        });
    </script>
    </div>
    {{-- conten --}}
</x-layout>
