<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Barang;
use App\Models\Gudang;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $stoks = Stok::with(['barang','gudang'])->get();
        return view('stok.index', compact('stoks'));
    }

    public function create()
    {
        $barangs = Barang::all();
        $gudangs = Gudang::all();
        return view('stok.create', compact('barangs','gudangs'));
    }

  public function store(Request $request)
{
    $request->validate([
        'barang_id' => 'required',
        'gudang_id' => 'required',
        'jumlah' => 'required|integer|min:1'
    ]);

    // Cek apakah stok sudah ada
    $stok = Stok::where('barang_id', $request->barang_id)
                ->where('gudang_id', $request->gudang_id)
                ->first();

    if ($stok) {
        // ✅ Tambah stok (tidak overwrite)
        $stok->jumlah += $request->jumlah;
        $stok->save();
    } else {
        // ✅ Buat baru kalau belum ada
        Stok::create([
            'barang_id' => $request->barang_id,
            'gudang_id' => $request->gudang_id,
            'jumlah' => $request->jumlah,
        ]);
    }

    return redirect()->route('stok.index')->with('success','Stok berhasil diupdate');
}

    public function edit(Stok $stok)
    {
        $barangs = Barang::all();
        $gudangs = Gudang::all();
        return view('stok.edit', compact('stok','barangs','gudangs'));
    }

    public function update(Request $request, Stok $stok)
    {
        $request->validate([
            'barang_id' => 'required',
            'gudang_id' => 'required',
            'jumlah' => 'required|integer|min:0'
        ]);

        $stok->update($request->all());

        return redirect()->route('stok.index')->with('success','Stok berhasil diupdate');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();
        return back()->with('success','Stok berhasil dihapus');
    }
}