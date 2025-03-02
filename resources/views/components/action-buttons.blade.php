@if ($page == 'eraport')
    <x-button color="blue" type="small" url="{{ url('admin/edit_pd/' . $row->siswa_nis) }}" text="Edit Nilai" />
@elseif ($page == 'invoice')
    <button type="button"
        class="btn-invoice text-green-700 border border-green-700 hover:bg-green-800 hover:text-white 
focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-2 py-1"
        data-nis="{{ $row->siswa_nis }}">
        Lihat Invoice
    </button>
@elseif ($page == 'tugas')
    <x-button color="blue" type="small" url="{{ url('admin/pilihSiswa/' . $id_ta . '/' . $row->siswa_nis) }}"
        text="Submit" />
    <x-button color="green" type="small" url="{{ url('admin/tugas/' . $id_ta . $row->siswa_nis) }}" text="Cetak" />
@else
    <x-button color="gray" type="small" url="{{ url('admin/detail_siswa/' . $row->siswa_nis) }}" text="Detail" />
@endif

{{-- cara pakai 
 <x-button color="green" type="small" url="{{ url('admin/tugas/' . $row->siswa_nis) }}" text="Tugas" />
    <x-button color="red" type="medium" url="{{ url('admin/tugas/' . $row->siswa_nis) }}" text="Tugas1" />
    <x-button color="cyan" type="large" url="{{ url('admin/tugas/' . $row->siswa_nis) }}" text="Tugas1" />
--}}
