<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- conten --}}
    <div class="mx-auto max-w-screen-2xl p-6 rounded bg-gray-50 dark:bg-gray-800 text-black dark:text-white">
      <div class="flex flex-col gap-6 xl:flex-row">
          <!-- Invoice Sidebar Start -->
          <div class="rounded-2xl border bg-gray-50 dark:bg-gray-800 p-4">
            <div class="flex items-center mb-4">
               <select id="kelas" name="kelas"
                   class="border rounded bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                   <option value="">-- Semua Kelas --</option>
                   @foreach ($kelas as $k)
                       <option value="{{ $k->kelas_id }}">{{ $k->kelas_nama }}</option>
                   @endforeach
               </select>
           </div>
              <div class="flex items-center gap-3 rounded-lg bg-gray-100 p-3 hover:bg-gray-200 dark:hover:bg-gray-700 dark:bg-gray-800 ">
               <x-data-siswa status="aktif" page="invoice" :columns="[
                  ['label' => 'Nama dengan Foto', 'data' => 'photo_with_nis'],
                  ['label' => 'Aksi', 'data' => 'action'],
              ]"></x-data-siswa>
              </div>

          </div>
          <!-- Invoice Sidebar End -->
  
          <!-- Invoice Mainbox Start -->
          <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-800 xl:w-4/5 p-6">
              <div class="flex justify-between border-b pb-4">
                  <h3 class="text-lg font-medium dark:text-white">Invoice</h3>
                  <h4 class="text-sm font-medium text-gray-700 dark:text-gray-400">ID : #348</h4>
              </div>
  
              <div class="mt-6">
                  <!-- Invoice Table Start -->
                  <div class="overflow-hidden rounded border border-gray-200 dark:border-gray-800">
                      <table class="min-w-full border-collapse text-left text-sm">
                          <thead>
                              <tr class="border-b bg-gray-100 dark:bg-gray-700">
                                  <th class="p-3">#</th>
                                  <th class="p-3">Product</th>
                                  <th class="p-3 text-center">Quantity</th>
                                  <th class="p-3 text-center">Unit Cost</th>
                                  <th class="p-3 text-right">Total</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="border-b">
                                  <td class="p-3">1</td>
                                  <td class="p-3">TailGrids</td>
                                  <td class="p-3 text-center">1</td>
                                  <td class="p-3 text-center">$48</td>
                                  <td class="p-3 text-right">$48</td>
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
                  <x-button color="gray" type="large" url="#" text="Proceed to Payment" /> 
                  <x-button color="green" type="large" url="#" text="Download Invoice" /> 
              </div>
          </div>
          <!-- Invoice Mainbox End -->
      </div>
  </div>
  
    {{-- conten --}}
</x-layout>
