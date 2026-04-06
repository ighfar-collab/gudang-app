<?php

namespace App\Http\Controllers;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::latest()->get();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs',
            'nama_barang' => 'required',
            'satuan' => 'required',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang,' . $id,
            'nama_barang' => 'required',
            'satuan' => 'required',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Barang::findOrFail($id)->delete();

        return redirect()->route('barang.index')->with('success', 'Data berhasil dihapus');
    }
}