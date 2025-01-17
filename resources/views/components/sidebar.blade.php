{{-- sidebar --}}
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
       <ul class="space-y-2 font-medium">
           {{-- active use class "bg-gray-100 rounded-lg" --}}
          <li class="{{ request()->is('/') ? 'bg-gray-100 rounded-lg dark:bg-gray-700' : '' }}}">
             <a href="/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <x-icon name="dashboard"></x-icon>              
                <span class="ms-3">Dashboard</span>
             </a>
          </li>
          <li>
               <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="kesiswaan-dropdown" data-collapse-toggle="kesiswaan-dropdown" >
                <x-icon name="kesiswaan"></x-icon>
                   <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Kesiswaan</span>
                   <x-icon name="dropdown"></x-icon>
               </button>
               {{-- kondisi awal hidden class "hidden" --}}
               <ul id="kesiswaan-dropdown" class="{{ request()->is('siswa') ? '' : 'hidden' }} py-2 space-y-2">
                   <li class="{{ request()->is('siswa') ? 'bg-gray-100 rounded-lg dark:bg-gray-700' : '' }}">
                       <a href="/siswa" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Siswa</a>
                   </li>
                   <li>
                       <a href="/siswaKeluar" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Siswa Keluar</a>
                   </li>
               </ul>
           </li>
           <li>
            <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="raport-dropdown" data-collapse-toggle="raport-dropdown" >
                <x-icon name="raport"></x-icon>
                <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">E-Raport</span>
                <x-icon name="dropdown"></x-icon>
            </button>
            {{-- kondisi awal hidden class "hidden" --}}
            <ul id="raport-dropdown" class="{{ request()->is('mapel') ? '' : 'hidden' }} py-2 space-y-2">
                <li class="{{ request()->is('mapel') ? 'bg-gray-100 rounded-lg  dark:bg-gray-700' : '' }}">
                    <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Mapel</a>
                </li>
                <li class="{{ request()->is('nilai') ? 'bg-gray-100 rounded-lg  dark:bg-gray-700' : '' }}">
                    <a href="#" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Nilai Rapot</a>
                </li>
            </ul>
        </li>
          <li>
             <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <x-icon name="keuangan"></x-icon>
                  
                <span class="flex-1 ms-3 whitespace-nowrap">Keuangan</span>
             </a>
          </li>
       </ul>
    </div>
 </aside>
 {{-- end sidebar --}}