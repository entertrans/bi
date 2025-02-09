<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- conten --}}
    <div class="rounded bg-gray-50 dark:bg-gray-800">
        <table id="default-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th>
                        <span class="flex items-center">
                            Tahun Ajaran
                            <x-icon name="table"></x-icon>
                        </span>
                    </th>
                    <th data-type="date">
                        <span class="flex items-center">
                            Semester
                            <x-icon name="table"></x-icon>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Walikelas
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Status
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Aksi
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dt_ta as $ta)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $ta['thn_ajaran'] }}
                        </td>
                        <td>{{ $ta['semester'] == 1 ? '1 (satu)' : '2 (dua)' }}</td>
                        <td>x</td>
                        <td>
                            <div
                                class="h-2.5 w-2.5 rounded-full {{ $ta['aktifkan'] == 1 ? 'bg-green-500' : 'bg-red-500' }} me-2">
                            </div>
                        </td>
                        <td>
                            <x-button color="blue" url="admin/pilihSiswa/{{ $ta['id_ta'] }}" text="Submit" />
                            <x-button color="yellow" url="admin/edit_pd/#" text="Status" />
                            <x-button color="red" url="#" text="Pengecualian" />
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    {{-- conten --}}

    <script>
        if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table", {
                searchable: false,
                perPageSelect: false
            });

            // Tambahkan styling langsung ke thead setelah DataTable di-load
            document.querySelector("#default-table thead").style.backgroundColor = "#374151";
        }
    </script>

</x-layout>
