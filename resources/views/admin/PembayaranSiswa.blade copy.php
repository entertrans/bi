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
                    <h4 class="text-sm font-medium text-gray-700 dark:text-gray-400">NIS : 2019558</h4>
                </div>

                <div class="mt-6">
                    <div class="flex flex-col gap-6 mb-5 sm:flex-row sm:items-center sm:justify-between">
                        <div>    
                            <h5 class="mb-2 text-base font-semibold text-gray-800 dark:text-white/90">
                                Adeline Callista Maurren
                            </h5>
    
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                Kelas XII IPS
                            </p>
                        </div>

                    </div>
                    <!-- Invoice Table Start -->
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
                            <tbody>
                                <tr class="border-b">
                                    <td class="p-3">buat invoice pertama</td>
                                    <td class="p-3">INV-202502-001</td>
                                    <td class="p-3 text-center">275000</td>
                                    <td class="p-3 text-center">275000</td>
                                    <td class="py-3 text-right">
                                        <button type="button" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">
                                            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                                      </svg>
                                      </button>
                                        <button type="button" class="text-purple-700 hover:text-white border border-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-purple-400 dark:text-purple-400 dark:hover:text-white dark:hover:bg-purple-500 dark:focus:ring-purple-900">
                                            {{-- <x-icon name="detail"></x-icon> --}}
                                            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                              </svg>
                                              
                                      </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--Invoice Table End -->
                </div>

            </div>
            <!-- List Invoice End -->
        </div>
    </div>
    {{-- conten --}}
</x-layout>
