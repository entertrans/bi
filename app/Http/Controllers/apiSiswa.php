<?php

namespace App\Http\Controllers;

use App\Models\dataSiswa;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class apiSiswa extends Controller
{
    public function getSiswa(Request $request)
    {
        if ($request->ajax()) {
            $query = dataSiswa::with(['agama', 'kelas', 'satelit1'])
                ->where('soft_deleted', 0);

            // Filter berdasarkan kelas
            if (!empty($request->kelas_id)) {
                $query->where('siswa_kelas_id', $request->kelas_id);
            }

            return DataTables::of($query)
                ->addColumn('action', function ($row) use ($request) {
                    return view('components.action-buttons', [
                        'row' => $row,
                        'page' => $request->page_type, // Tentukan halaman untuk action button
                    ])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
