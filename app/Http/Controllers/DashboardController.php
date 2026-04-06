<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Mutasi;
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

        $stokMenipis = Barang::where('stok_minimum', '<', 10)->count();

        $barangTerbaru = Barang::latest()->take(5)->get();

        $barangHampirHabis = Barang::where('stok_minimum', '<', 10)->get();

        return view('dashboard', compact(
            'totalBarang',
            'stokMasukHariIni',
            'stokKeluarHariIni',
            'stokMenipis',
            'barangTerbaru',
            'barangHampirHabis'
        ));
    }
}