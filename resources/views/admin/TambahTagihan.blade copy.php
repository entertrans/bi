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
        <div class="mx-auto max-w-screen-2xl p-6 rounded bg-gray-50 dark:bg-gray-800 text-white">
            <div class="flex flex-col gap-6 xl:flex-row">
                <!-- Invoice Sidebar Start -->
                <div class="rounded-2xl border bg-gray-50 dark:bg-gray-800 p-4">
                    <table id="datatablestest"
                        class="w-500 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                            <div class="text-base font-semibold nama-siswa">{{ $dtsiswa['nama'] }}</div>
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
                <div
                    class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-800 xl:w-4/5 p-6">
                    <div class="flex justify-between border-b pb-4 mb-4">
                        <h3 class="text-lg font-medium dark:text-white">Invoice</h3>
                        <h4 class="text-sm font-medium text-gray-700 dark:text-gray-400">UID : #348</h4>
                    </div>
                    <div class="flex flex-col gap-6 mb-9 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <span class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400" >
                                Tanggal Tagihan:
                            </span>

                            <span class="block text-sm text-gray-500 dark:text-gray-400" id="tanggal-invoice">
                                {{ $TglInv }}
                            </span>
                        </div>

                        <div class="h-px w-full bg-gray-200 dark:bg-gray-800 sm:h-[158px] sm:w-px"></div>

                        <div class="sm:text-right">

                            <span class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                                Jatuh Tempo:
                            </span>

                            <span class="block text-sm text-gray-500 dark:text-gray-400" id="tanggal-jatuh-tempo">
                                {{ $TglJt }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-6">
                        <!-- Invoice Table Start -->
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
                                            <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected disabled>-- Pilih Jenis Tagihan --</option>
                                                @foreach ($Jenis as $jnsTagihan)
                                                <option value="{{ $jnsTagihan->id_tagihan }}">{{ $jnsTagihan->jns_tagihan }}</option>
                                                @endforeach
                                              </select>
                                        </td>
                                        <td class="p-3 w-[50%]">
                                            <input type="text" class="border rounded p-1 w-full">
                                        </td>
                                        <td class="p-3 w-[20%] ">
                                            <input type="number" value="" class="border rounded p-1 w-full  tagihan-input">
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
                        <!-- Invoice Table End -->
                    </div>

                    <div class="text-right border-t pt-4 mt-6">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Sub Total: $3,098</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">VAT (10%): $312</p>
                        <p class="text-lg font-semibold dark:text-white">Total: $3,410</p>
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <button
                            class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700">
                            Proceed to Payment
                        </button>
                        <button
                            class="rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
                            Download Invoice
                        </button>
                    </div>
                </div>
                <!-- Invoice Mainbox End -->
            </div>
        </div>
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
            document.addEventListener("click", function(e) {
                if (e.target.closest(".add-row")) {
                    addRow();
                }
                if (e.target.closest(".remove-row")) {
                    removeRow(e.target.closest("tr"));
                }
            });

            function addRow() {
                const table = document.getElementById('invoiceTable');
                const newRow = document.createElement('tr');
                newRow.classList.add("border-b");

                newRow.innerHTML = `
                    <td class="p-3 w-[70%]">
                        <input type="text" class="border rounded p-1 w-full">
                    </td>
                    <td class="p-3 w-[30%]  ">
                        <input type="number" class="border rounded p-1 w-full    tagihan-input" min="0">
                    </td>
                    <td class="p-3 text-center w-16">
                        <button type="button" class="remove-row text-red-500 font-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </td>
                `;

                table.appendChild(newRow);
                updateRemoveButtons();
            }

            function removeRow(row) {
                row.remove();
                updateRemoveButtons();
            }


            updateRemoveButtons();
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
