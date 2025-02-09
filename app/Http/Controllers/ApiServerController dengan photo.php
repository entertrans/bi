<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataSiswa;
use Yajra\DataTables\Facades\DataTables;

class ApiServerController extends Controller
{
    // ✅ Function untuk DataTables (Dengan Foto)
    public function getSiswaWithPhoto(Request $request)
    {
        if ($request->ajax()) {
            $data = dataSiswa::select('siswa_nama', 'siswa_nis', 'siswa_email', 'siswa_photo')
                ->where('soft_deleted', 0)
                ->when($request->kelas_id, function ($query) use ($request) {
                    return $query->where('siswa_kelas_id', $request->kelas_id);
                })
                ->get();

            return DataTables::of($data)
                ->addColumn('nama_with_photo', function ($row) {
                    $photo = $row->siswa_photo
                        ? 'https://ui-avatars.com/api/?name=' . urlencode($row->siswa_nama) . '&size=100&background=random'
                        : 'https://ui-avatars.com/api/?name=' . urlencode($row->siswa_nama) . '&size=100&background=random';
                    // $photo = $row->siswa_photo
                    //     ? asset('filesiswa/' . $row->siswa_nis . '/' . $row->siswa_photo)
                    //     : 'https://ui-avatars.com/api/?name=' . urlencode($row->siswa_nama) . '&size=100&background=random';

                    return '<div class="flex items-center">
                                 <img src="' . $photo . '" class="w-10 h-10 rounded-full">
                                 <div class="ps-3">
                                     <div class="text-base font-semibold">' . $row->siswa_nama . '</div>
                                     <div class="font-normal text-gray-500">' . $row->siswa_email . '</div>
                                 </div>
                             </div>';
                })
                ->addColumn('action', function ($row) use ($request) {
                    return view('components.action-buttons', ['row' => $row, 'page' => $request->page_type])->render();
                })
                ->rawColumns(['nama_with_photo', 'action'])
                ->make(true);
        }
    }

    // ✅ Function untuk DataTables (Tanpa Foto)
    public function getSiswaWithoutPhoto(Request $request)
    {
        if ($request->ajax()) {
            $data = dataSiswa::select('siswa_nama', 'siswa_nis', 'siswa_email')
                ->where('soft_deleted', 0)
                ->when($request->kelas_id, function ($query) use ($request) {
                    return $query->where('siswa_kelas_id', $request->kelas_id);
                })
                ->get();

            return DataTables::of($data)
                ->addColumn('action', function ($row) use ($request) {
                    return view('components.action-buttons', ['row' => $row, 'page' => $request->page_type])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
