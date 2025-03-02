<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- conten --}}
    <div class="rounded bg-gray-50 dark:bg-gray-800 p-5">
        {{-- <form action="post" class="max-w-md mx-auto"> --}}
        <form class="max-w-md mx-auto" action="{{ route('tambah.invoice') }}" method="POST" autocomplete="off">
            @csrf

            <div class="mb-5">
                <label for="JtInvoice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Nama Invoice
                </label>
                <input name="NmInvoice" type="text" id="JtInvoice"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ps-3 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buat Nama Invoice" required />
            </div>

            <!-- Flexbox untuk Tanggal -->
            <div class="flex gap-4">
                <div class="w-1/2">
                    <label for="tglInvoice"
                        class="flex items-center gap-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                        Tanggal Invoice
                    </label>
                    <input name="TglInv" id="tglInvoice" type="text" datepicker datepicker-autohide
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Pilih Tanggal">
                </div>

                <div class="w-1/2">
                    <label for="tglJatuhTempo"
                        class="flex items-center gap-2 mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                        Tanggal Jatuh Tempo
                    </label>
                    <input name="TglTempo" id="tglJatuhTempo" type="text" datepicker datepicker-autohide
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Pilih Tanggal">
                </div>
            </div>

            <!-- Pilih Siswa -->
            <div class="mt-5">
                <label for="siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Pilih Siswa
                </label>
                <select id="siswa" multiple name="siswa[]"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @forelse ($siswa as $kelasNama => $siswaList)
                        <optgroup label="{{ $kelasNama }}">
                            @foreach ($siswaList as $siswaItem)
                                <option value="{{ $siswaItem['siswa_nis'] }}|{{ $siswaItem['siswa_nama'] }}">
                                    {{ $siswaItem['siswa_nama'] }}
                                </option>
                            @endforeach
                        </optgroup>
                    @empty
                        <option disabled>Data siswa tidak tersedia</option>
                    @endforelse
                </select>
            </div>

            <!-- Tombol Submit -->
            <div class="mt-5">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </div>
        </form>
    </div>


    {{-- conten --}}
    <x-scriptsAdd useScript="invoice"/>
</x-layout>
