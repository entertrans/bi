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
                
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                   <th scope="row" class="flex items-center text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" 
                    src="{{ 'https://ui-avatars.com/api/?name=' . urlencode($siswa['siswa_nama']) . '&size=100&background=random' }}" 
                    alt="{{$siswa['siswa_nama']}}">             
                         {{-- <img class="w-10 h-10 rounded-full" src="filesiswa/{{$siswa['siswa_nis']}}/{{$siswa['siswa_photo']}}" alt="Jese image"> --}}
                         <div class="ps-3">
                            <div class="text-base font-semibold">{{$siswa['siswa_nama']}}</div>
                            <div class="font-normal ">{{$siswa['siswa_email']}}</div>
                            <div class="font-normal">{{$siswa['siswa_no_telp']}}</div>
                         </div>  
                   </th>
                   <td >
                      {{$siswa['siswa_nis']}}
                   </td>
                   <td >
                      {{$siswa['kelas']['kelas_nama']}}
                     {{-- {{$siswa['kelas']['kelas_nama']}} --}}
                   </td>
                   <td >
                         <div class="flex items-center">
                            {{-- kondisi tidak aktif bg-red-500 || kondisi aktif bg-green-500 --}}
                            <div class="h-2.5 w-2.5 rounded-full {{ $siswa['soft_deleted'] == 0 ? 'bg-green-500' : 'bg-red-500' }} me-2"></div> {{$siswa['satelit1']['satelit_nama']}}
                         </div>
                   </td>
                   <td >
                      <button type="button" class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"><a href="#">Hapus Siswa</a></button>
                   </td>
                </tr>
                @endforeach
              
             </tbody>
       </table>
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