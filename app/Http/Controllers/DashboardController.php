<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Mutasi;
use App\Models\Stok;
   use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DashboardController extends Controller
{

public function index()
{
    $totalBarang = Barang::count();

    $stokMasukHariIni = Mutasi::where('tipe', 'masuk')
        ->whereDate('tanggal', Carbon::today())
        ->sum('jumlah');

    $stokKeluarHariIni = Mutasi::where('tipe', 'keluar')
        ->whereDate('tanggal', Carbon::today())
        ->sum('jumlah');

    // 🔴 STOK MENIPIS
    $stokMenipis = Stok::join('barangs', 'stoks.barang_id', '=', 'barangs.id')
        ->whereColumn('stoks.jumlah', '<=', 'barangs.stok_minimum')
        ->count();

    // 🆕 BARANG TERBARU
    $barangTerbaru = Barang::join('stoks', 'barangs.id', '=', 'stoks.barang_id')
        ->join('gudangs', 'stoks.gudang_id', '=', 'gudangs.id')
        ->select(
            'barangs.id',
            'barangs.nama_barang',
            'stoks.jumlah',
            'gudangs.nama_gudang'
        )
        ->orderBy('barangs.created_at', 'desc')
        ->limit(5)
        ->get();

    // ⚠️ BARANG HAMPIR HABIS
    $barangHampirHabis = Stok::join('barangs', 'stoks.barang_id', '=', 'barangs.id')
        ->join('gudangs', 'stoks.gudang_id', '=', 'gudangs.id')
        ->whereColumn('stoks.jumlah', '<=', 'barangs.stok_minimum')
        ->select(
            'barangs.nama_barang',
            'gudangs.nama_gudang',
            'stoks.jumlah',
            'barangs.stok_minimum'
        )
        ->get();

    // =====================================================
    // 📊 GRAFIK AKTIVITAS GUDANG
    // =====================================================

    $tahun = date('Y');

    // 📥 MASUK
    $masuk = DB::table('mutasis')
        ->select(DB::raw('MONTH(tanggal) as bulan'), DB::raw('SUM(jumlah) as total'))
        ->where('tipe', 'masuk')
        ->whereYear('tanggal', $tahun)
        ->groupBy('bulan')
        ->pluck('total','bulan');

    // 📤 KELUAR
    $keluar = DB::table('mutasis')
        ->select(DB::raw('MONTH(tanggal) as bulan'), DB::raw('SUM(jumlah) as total'))
        ->where('tipe', 'keluar')
        ->whereYear('tanggal', $tahun)
        ->groupBy('bulan')
        ->pluck('total','bulan');

    // 🔄 MUTASI (jika ada tipe khusus selain masuk/keluar, sesuaikan)
    $mutasi = DB::table('mutasis')
        ->select(DB::raw('MONTH(tanggal) as bulan'), DB::raw('SUM(jumlah) as total'))
        ->where('tipe', 'mutasi')
        ->whereYear('tanggal', $tahun)
        ->groupBy('bulan')
        ->pluck('total','bulan');

    // 🔄 NORMALISASI 12 BULAN
    $label = [];
    $dataMasuk = [];
    $dataKeluar = [];
    $dataMutasi = [];

    for ($i = 1; $i <= 12; $i++) {
        $label[] = date('M', mktime(0,0,0,$i,1));

        $dataMasuk[]  = $masuk[$i] ?? 0;
        $dataKeluar[] = $keluar[$i] ?? 0;
        $dataMutasi[] = $mutasi[$i] ?? 0;
    }

    return view('dashboard', compact(
        'totalBarang',
        'stokMasukHariIni',
        'stokKeluarHariIni',
        'stokMenipis',
        'barangTerbaru',
        'barangHampirHabis',
        'label',
        'dataMasuk',
        'dataKeluar',
        'dataMutasi',
        'tahun'
    ));
}
}