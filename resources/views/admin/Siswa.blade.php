<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- conten --}}
    <div class="flex rounded bg-gray-50 dark:bg-gray-800 pt-5 pl-4">
      <table id="filter-table">
            <thead>
               <tr>
                  <th>
                     <span class="flex items-center">
                        Data Lengkap
                        <x-icon name="table"></x-icon>
                        <span>
                  </th>
                  <th>
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
               <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                  <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="people/profile-picture-1.jpg" alt="Jese image">
                        <div class="ps-3">
                           <div class="text-base font-semibold">Albertus Ryan Bruinekool Jr</div>
                           <div class="font-normal text-gray-500">neil.sims@flowbite.com</div>
                           <div class="font-normal text-gray-500">08567100</div>
                        </div>  
                  </th>
                  <td class="px-6 py-4">
                        1
                  </td>
                  <td class="px-6 py-4">
                        1
                  </td>
                  <td class="px-6 py-4">
                        <div class="flex items-center">
                           <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Bogor
                        </div>
                  </td>
                  <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                  </td>
               </tr>
               <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                  
                  <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="people/profile-picture-3.jpg" alt="Jese image">
                        <div class="ps-3">
                           <div class="text-base font-semibold">Bonnie Green</div>
                           <div class="font-normal text-gray-500">bonnie@flowbite.com</div>
                        </div>
                  </th>
                  <td class="px-6 py-4">
                        1
                  </td>
                  <td class="px-6 py-4">
                        1
                  </td>
                  <td class="px-6 py-4">
                        <div class="flex items-center">
                           <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktif
                        </div>
                  </td>
                  <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                  </td>
               </tr>
               <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                  
                  <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="people/profile-picture-2.jpg" alt="Jese image">
                        <div class="ps-3">
                           <div class="text-base font-semibold">Jese Leos</div>
                           <div class="font-normal text-gray-500">jese@flowbite.com</div>
                        </div>
                  </th>
                  <td class="px-6 py-4">
                     2
                  </td>
                  <td class="px-6 py-4">
                     2
                  </td>
                  <td class="px-6 py-4">
                        <div class="flex items-center">
                           <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Bogor
                        </div>
                  </td>
                  <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                  </td>
               </tr>
               <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">  
                  <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="people/profile-picture-5.jpg" alt="Jese image">
                        <div class="ps-3">
                           <div class="text-base font-semibold">Thomas Lean</div>
                           <div class="font-normal text-gray-500">thomes@flowbite.com</div>
                        </div>
                  </th>
                  <td class="px-6 py-4">
                        10111
                  </td>
                  <td class="px-6 py-4">
                        10 IPS
                  </td>
                  <td class="px-6 py-4">
                        <div class="flex items-center">
                           <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Serpong
                        </div>
                  </td>
                  <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                  </td>
               </tr>
               <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                  
                  <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full" src="people/profile-picture-4.jpg" alt="Jese image">
                        <div class="ps-3">
                           <div class="text-base font-semibold">Leslie Livingston</div>
                           <div class="font-normal text-gray-500">leslie@flowbite.com</div>
                        </div>
                  </th>
                  <td class="px-6 py-4">
                     101212
                  </td>
                  <td class="px-6 py-4">
                     10 IPA
                  </td>
                  <td class="px-6 py-4">
                        <div class="flex items-center">
                           <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Serpong
                        </div>
                  </td>
                  <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit user</a>
                  </td>
               </tr>
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