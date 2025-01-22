<x-layout>
   <style>
      input[data-columns="[4]"] {
        display: none;
      }
      /* input[data-columns="[1]"] {
        width: 80%;
      }
      input[data-columns="[2]"] {
        width: 80%;
      } */
      
    </style>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- conten --}}
    <div class="rounded bg-gray-50 dark:bg-gray-800 pt-5 pl-4">
      <div class="flex items-center mb-4">
         <div class="flex items-center me-4">
            <input id="active" type="radio" value="active" name="status-radio" class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 dark:focus:ring-green-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="active" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Siswa Aktif</label>
         </div>
         <div class="flex items-center me-4">
            <input id="inactive" type="radio" value="inactive" name="status-radio" class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="inactive" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Siswa Keluar</label>
         </div>
       </div>
      <table id="filter-table">
            <thead>
               <tr >
                  <th>
                     <span class="flex items-center">
                        Data Lengkap
                        <x-icon name="table"></x-icon>
                        <span>
                  </th>
                  <th >
                     <span class="flex items-center">
                        NIS
                        <x-icon name="table"></x-icon>
                        <span>
                  </th>
                  <th>
                     <span class="flex items-center">
                        Kelas
                        <x-icon name="table"></x-icon>
                        <span>
                  </th>
                  <th>
                     <span class="flex items-center">
                        Status / Satelit
                        <x-icon name="table"></x-icon>
                        <span>
                  </th>
                  <th>
                     <span class="flex items-center">
                        Action
                        <x-icon name="table"></x-icon>
                        <span>
                  </th>
               </tr>
            </thead>
            <tbody>

               @foreach ( $dt_siswa as $siswa)
               
               <tr data-status="{{ $siswa['soft_deleted'] == 1 ? 'Active' : 'Inactive' }}" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                  <th scope="row" class="flex items-center text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="filesiswa/{{$siswa['siswa_nis']}}/{{$siswa['siswa_photo']}}" alt="Jese image">
                        <div class="ps-3">
                           <div class="text-base font-semibold">{{$siswa['siswa_nama']}}</div>
                           <div class="font-normal text-gray-500">{{$siswa['email']}}</div>
                           <div class="font-normal text-gray-500">{{$siswa['nohp']}}</div>
                        </div>  
                  </th>
                  <td >
                     {{$siswa['siswa_nis']}}
                  </td>
                  <td >
                     {{Str::substr($siswa['kelas']['kelas_nama'], 6)}}
                    {{-- {{$siswa['kelas']['kelas_nama']}} --}}
                  </td>
                  <td >
                        <div class="flex items-center">
                           {{-- kondisi tidak aktif bg-red-500 || kondisi aktif bg-green-500 --}}
                           <div class="h-2.5 w-2.5 rounded-full {{ $siswa['soft_deleted'] == 0 ? 'bg-green-500' : 'bg-red-500' }} me-2"></div> Bogor
                        </div>
                  </td>
                  <td >
                     <button type="button" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-2 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"><a href="admin/edit_pd/{{$siswa['siswa_nis']}}">Edit</a></button>
                     
                     <button type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"><a href="#">Keluarkan</a></button>
                  </td>
               </tr>
               @endforeach
               
            </tbody>
      </table>
      <<script>
         $(document).ready(function() {
           // Fungsi untuk menampilkan semua baris
           function showAllRows() {
             $('#filter-table tbody tr').show();
           }
       
           // Fungsi untuk menyaring berdasarkan status
           function filterTable() {
             const selectedStatus = $('input[name="status-radio"]:checked').val();
       
             // Tampilkan semua baris jika tidak ada radio yang dipilih
             if (!selectedStatus) {
               showAllRows();
               return;
             }
       
             // Menyembunyikan baris yang tidak sesuai dengan status yang dipilih
             $('#filter-table tbody tr').each(function() {
               const status = $(this).data('status'); // Ambil data-status dari baris
               
               if (status === selectedStatus) {
                 $(this).show(); // Tampilkan baris sesuai dengan status
               } else {
                 $(this).hide(); // Sembunyikan baris yang tidak sesuai
               }
             });
           }
       
           // Event listener untuk perubahan radio button
           $('input[name="status-radio"]').on('change', filterTable);
       
           // Tampilkan semua baris ketika pertama kali dimuat
           showAllRows();
         });
       </script>
    </div>
    {{-- conten --}}
    <script>
      if (document.getElementById("filter-table") && typeof simpleDatatables.DataTable !== 'undefined') {
         const dataTable = new simpleDatatables.DataTable("#filter-table", {
            tableRender: (_data, table, type) => {
                  if (type === "print") {
                     return table
                  }
                  const tHead = table.childNodes[0]
                  const filterHeaders = {
                     nodeName: "TR",
                     attributes: {
                        class: "search-filtering-row"
                     },
                     childNodes: tHead.childNodes[0].childNodes.map(
                        (_th, index) => ({nodeName: "TH",
                              childNodes: [
                                 {
                                    nodeName: "INPUT",
                                    attributes: {
                                          class: "datatable-input",
                                          type: "search",
                                          "data-columns": "[" + index + "]"
                                    }
                                 }
                              ]})
                     )
                  }
                  tHead.childNodes.push(filterHeaders)
                  return table
            }
         });
      }
    </script>
    
</x-layout>