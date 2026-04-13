<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Models\Barang;
use App\Models\Gudang;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class LaporanController extends Controller
{


public function barangMasuk(Request $request)
{
       $data = Mutasi::with(['barang','gudangAsal','gudangTujuan'])->where('tipe', 'masuk')
       ->orderBy('mutasis.tanggal', 'desc')
            ->latest()
            ->paginate(10);



    // 🔍 FILTER TANGGAL
    if ($request->tanggal_awal && $request->tanggal_akhir) {
        $query->whereBetween('mutasis.tanggal', [
            $request->tanggal_awal,
            $request->tanggal_akhir
        ]);
    }



    return view('laporan.barang_masuk', compact('data'));
}
public function barangKeluar(Request $request)
{
       $data = Mutasi::with(['barang','gudangAsal','gudangTujuan'])->where('tipe', 'keluar')
       ->orderBy('mutasis.tanggal', 'desc')
            ->latest()
            ->paginate(10);



    // 🔍 FILTER TANGGAL
    if ($request->tanggal_awal && $request->tanggal_akhir) {
        $query->whereBetween('mutasis.tanggal', [
            $request->tanggal_awal,
            $request->tanggal_akhir
        ]);
    }



    return view('laporan.barang_keluar', compact('data'));
}
}
