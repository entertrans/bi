<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataSiswa;
use Yajra\DataTables\Facades\DataTables;

class ApiServerController extends Controller
{
    public function getSiswa(Request $request)
    {
        if ($request->ajax()) {
            $query = DataSiswa::with(['agama', 'kelas', 'satelit1'])
                ->where('soft_deleted', 0);

            // Filter berdasarkan kelas jika ada
            if (!empty($request->kelas_id)) {
                $query->where('siswa_kelas_id', $request->kelas_id);
            }

            return DataTables::of($query)
                ->addColumn('action', function ($row) use ($request) {
                    return view('components.action-buttons', [
                        'row' => $row,
                        'page' => $request->page_type, // Halaman yang sedang diakses
                    ])->render();
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
