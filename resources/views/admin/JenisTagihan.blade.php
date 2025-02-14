<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- conten --}}
    <div class="rounded bg-gray-50 dark:bg-gray-800 pt-5 pl-4">


        <!-- Modal toggle -->
        <div class="flex justify-end mr-5 mb-3">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambah Tagihan
            </button>
        </div>

        <!-- Main modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Tambah Tagihan Siswa
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="crud-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form id="SimpanForm" class="p-4 md:p-5">
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="jenis_tagihan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                    Tagihan</label>
                                <input type="text" name="jenis_tagihan" id="jenis_tagihan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Contoh: SPP Bulan Januari" required>
                            </div>
                            <div class="col-span-2">
                                <label for="nominal_tagihan"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nominal
                                    Tagihan</label>
                                <input type="number" name="nominal_tagihan" id="nominal_tagihan"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Contoh: 500000" required>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Tambah
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <table id="search-table">
            <thead>
                <tr>
                    <th><span class="flex items-center">Nama Tagihan</span></th>
                    <th><span class="flex items-center">Nominal</span></th>
                    <th><span class="flex items-center">Status</span></th>
                    <th><span class="flex items-center">Action</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tagihan as $item)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item['jns_tagihan'] }}
                        </td>
                        <td class="nominal-tagihan">{{ $item['nom_tagihan'] }}</td>
                        <td>
                            <div class="flex items-center">
                                <span
                                    class=" {{ $item['sts_tagihan'] == 1 ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300' }} text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm ">{{ $item['sts_tagihan'] == 1 ? 'Active' : 'Inactive' }}</span>
                            </div>
                        </td>

                        <td>
                            <button class="edit-btn px-3 py-1 bg-blue-500 text-white rounded-md hover:bg-blue-600"
                                data-id="{{ $item['id_tagihan'] }}" data-nominal="{{ $item['nom_tagihan'] }}"
                                data-status="{{ $item['sts_tagihan'] }}" data-jns="{{ $item['jns_tagihan'] }}">
                                Edit
                            </button>
                        </td>



                    </tr>
                @endforeach
            </tbody>
        </table>


        <!-- Modal Edit -->
        <div id="editModal"
            class="fixed inset-0 hidden text-black bg-gray-900 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg w-96">
                <h2 id="modalTitle" class="text-lg font-semibold"></h2> <!-- Judul berubah sesuai tagihan -->
                <form id="editForm">
                    <input type="hidden" id="editId">
                    <div class="mt-4">
                        <label>Nominal</label>
                        <input type="text" id="editNominal" class="w-full p-2 border rounded">
                    </div>
                    <div class="mt-4">
                        <label>Status</label>
                        <select id="editStatus" class="w-full p-2 border rounded">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="button" id="closeModal" class="px-4 py-2 bg-gray-200 rounded">Cancel</button>
                        <button type="submit" class="ml-2 px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                    </div>
                </form>
            </div>
        </div>



    </div>
    {{-- ajax create --}}
    <script>
        $(document).ready(function() {
            $("SimpanForm").submit(function(e) {
                e.preventDefault(); // Mencegah reload halaman

                $.ajax({
                    url: "{{ route('tagihan.simpan') }}", // Pastikan sesuai dengan route di Laravel
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        jenis_tagihan: $("#jenis_tagihan").val(),
                        nominal_tagihan: $("#nominal_tagihan").val()
                    },
                    success: function(response) {
                        Swal.fire({
                        title: 'Berhasil!',
                        text: response.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000,
                        toast: true,
                        position: 'top-end'
                    }).then((result) => {
                        location.reload();
                    });
                    },
                    error: function(xhr) {
                        alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
    {{-- ajax edit --}}
    <script>
        $(document).ready(function() {
            $(".edit-btn").click(function() {
                let id = $(this).data("id");
                let nominal = $(this).data("nominal");
                let status = $(this).data("status");
                let jnsTagihan = $(this).data("jns");

                $("#modalTitle").text("Edit Tagihan: " + jnsTagihan);
                $("#editId").val(id);
                $("#editNominal").val(nominal);
                $("#editStatus").val(status);
                $("#editModal").removeClass("hidden");
            });

            $("#closeModal").click(function() {
                $("#editModal").addClass("hidden");
            });

            $("#editForm").submit(function(e) {
                e.preventDefault();
                $.post("/update-tagihan/" + $("#editId").val(), {
                    _token: "{{ csrf_token() }}",
                    nom_tagihan: $("#editNominal").val(),
                    sts_tagihan: $("#editStatus").val()
                }, function(res) {
                    // $("#editModal").addClass("hidden");
                    Swal.fire({
                        title: 'Berhasil!',
                        text: res.message,
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000,
                        toast: true,
                        position: 'top-end'
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        location.reload();
                    });
                }).fail(function(xhr) {
                    alert("Terjadi kesalahan: " + xhr.responseJSON.message);
                });
            });
        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Format Nominal Tagihan ke Rupiah
            document.querySelectorAll(".nominal-tagihan").forEach(function(el) {
                let nominal = parseFloat(el.textContent);
                el.textContent = new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    minimumFractionDigits: 0
                }).format(nominal);
            });

            // Initialize DataTable jika tersedia
            if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
                new simpleDatatables.DataTable("#search-table", {
                    searchable: true,
                    sortable: false
                });
            }
        });
    </script>
    {{-- conten --}}
</x-layout>
