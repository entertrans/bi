@if ($page == 'eraport')
    <x-button color="blue" type="small" url="{{ url('admin/edit_pd/' . $row->siswa_nis) }}" text="Edit Nilai" />
@elseif ($page == 'invoice')
    <x-button color="green" type="small" url="{{ url('admin/invoice/' . $row->siswa_nis) }}" text="Tambah Tagihan" />
@elseif ($page == 'tugas')
    <x-button color="blue" type="small" url="{{ url('admin/pilihSiswa/'  .$id_ta .'/'.  $row->siswa_nis) }}" text="Submit" />
    <x-button color="green" type="small" url="{{ url('admin/tugas/' . $id_ta .$row->siswa_nis) }}" text="Cetak" />
@else
    <x-button color="gray" type="small" url="{{ url('admin/detail_siswa/' . $row->siswa_nis) }}" text="Detail" />
@endif

{{-- cara pakai 
 <x-button color="green" type="small" url="{{ url('admin/tugas/' . $row->siswa_nis) }}" text="Tugas" />
    <x-button color="red" type="medium" url="{{ url('admin/tugas/' . $row->siswa_nis) }}" text="Tugas1" />
    <x-button color="cyan" type="large" url="{{ url('admin/tugas/' . $row->siswa_nis) }}" text="Tugas1" />
--}}
