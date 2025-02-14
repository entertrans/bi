<?php

namespace App\Http\Controllers;

use App\Models\DataTagihan;
use App\Models\NamaKelas;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    //

    public function pilihSiswa()
    {
        $dataKelas = NamaKelas::where('kelas_id', '<', 16)->get();
        // dd($dataKelas);
        return view('admin/test', [
            'title' => 'Data Siswa',
            'kelas' => $dataKelas
        ]);
    }
    public function JenisTagihan()
    {
        $DataTagihan = DataTagihan::orderBy('id_tagihan', 'desc')->get();
        // dd($DataTagihan);
        return view('admin/JenisTagihan', [
            'title' => 'Daftar Tagihan',
            'tagihan' => $DataTagihan
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_tagihan' => 'required|numeric',
            'sts_tagihan' => 'required|in:0,1'
        ]);

        $tagihan = DataTagihan::findOrFail($id);
        // dd($tagihan);
        $tagihan->update([
            'nom_tagihan' => $request->nom_tagihan,
            'sts_tagihan' => $request->sts_tagihan
        ]);

        return response()->json(['message' => 'Tagihan berhasil diperbarui!']);
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'jenis_tagihan' => 'required|string|max:255',
            'nominal_tagihan' => 'required|numeric|min:1'
        ]);

        DataTagihan::create([
            'jns_tagihan' => $request->jenis_tagihan,
            'nom_tagihan' => $request->nominal_tagihan,
            'sts_tagihan' => '1'
        ]);

        return response()->json([
            'message' => 'Tagihan berhasil ditambahkan!'
        ]);
    }
}
