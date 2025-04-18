<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use Yajra\DataTables\Facades\DataTables;

class ApiServerController extends Controller
{
    public function getSiswaData(Request $request)
    {
        if ($request->ajax()) {
            // Ambil status dari request
            $status = $request->status;

            // Query dasar dengan eager loading
            $data = DataSiswa::with(['satelit1', 'kelas','agama']);

            // Terapkan kondisi berdasarkan status yang dipilih
            if ($status === 'aktif') {
                $data->where('siswa_kelas_id', '<', 16)->where('soft_deleted', 0);
            } elseif ($status === 'tidak_aktif') {
                $data->where('siswa_kelas_id', '<', 16)->where('soft_deleted', 1);
            } elseif ($status === 'alumni') {
                $data->where('siswa_kelas_id', '>', 15);
            }

            // Filter berdasarkan kelas jika ada
            if ($request->kelas_id) {
                $data->where('siswa_kelas_id', $request->kelas_id);
            }

            // Eksekusi query
            $data = $data->get();

            return DataTables::of($data)
            //nama email dengan photo
                ->addColumn('nama_with_photo', function ($row) {
                    $photo = $row->siswa_photo
                        ? 'https://ui-avatars.com/api/?name=' . urlencode($row->siswa_nama) . '&size=100&background=random'
                        : 'https://ui-avatars.com/api/?name=' . urlencode($row->siswa_nama) . '&size=100&background=random';

                    return '<div class="flex items-center">
                                <img src="' . $photo . '" class="w-10 h-10 rounded-full">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">' . $row->siswa_nama . '</div>
                                    <div class="font-normal text-gray-500">' . $row->siswa_email . '</div>
                                </div>
                            </div>';
                })
                // nama photo dan nis
                ->addColumn('photo_with_nis', function ($row) {
                    $photo = $row->siswa_photo
                        ? 'https://ui-avatars.com/api/?name=' . urlencode($row->siswa_nama) . '&size=100&background=random'
                        : 'https://ui-avatars.com/api/?name=' . urlencode($row->siswa_nama) . '&size=100&background=random';

                    return '<div class="flex items-center">
                                <img src="' . $photo . '" class="w-8 h-8 rounded-full">
                                <div class="ps-3">
                                    <div class="text-small font-semibold">' . $row->siswa_nama . '</div>
                                    <div class="font-normal text-gray-500">' . $row->siswa_nis . '</div>
                                </div>
                            </div>';
                })
                //status dengan satelit
                ->addColumn('status_with_satelit', function ($row) {
                    $statusColor = $row->soft_deleted == 0 ? 'bg-green-500' : 'bg-red-500';
                    $satelitNama = $row->satelit1 ? $row->satelit1->satelit_nama : '-';

                    return '<div class="flex items-center">
                                <div class="h-2.5 w-2.5 rounded-full ' . $statusColor . ' me-2"></div> 
                                ' . $satelitNama . '
                            </div>';
                })
                //tambah inisialisasi kelas
                ->addColumn('kelasNama', function ($row) {
                    return $row->kelas ? preg_replace('/^Kelas\s*/', '', $row->kelas->kelas_nama) : '-';
                })
                
                ->addColumn('action', function ($row) use ($request) {
                    return view('components.action-buttons', ['row' => $row, 'page' => $request->page_type, 'id_ta' => $request->idTa])->render();
                })
                ->rawColumns(['nama_with_photo', 'status_with_satelit', 'photo_with_nis','action'])
                ->make(true);
        }
    }
}
