<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function index()
    {
        $gudangs = Gudang::latest()->paginate(10);
        return view('gudang.index', compact('gudangs'));
    }

    public function create()
    {
        return view('gudang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_gudang' => 'required',
            'lokasi' => 'nullable'
        ]);

        Gudang::create($request->all());

        return redirect()->route('gudang.index')
            ->with('success','Gudang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $gudang = Gudang::findOrFail($id);
        return view('gudang.edit', compact('gudang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_gudang' => 'required',
            'lokasi' => 'nullable'
        ]);

        $gudang = Gudang::findOrFail($id);
        $gudang->update($request->all());

        return redirect()->route('gudang.index')
            ->with('success','Gudang berhasil diupdate');
    }

    public function destroy($id)
    {
        $gudang = Gudang::findOrFail($id);
        $gudang->delete();

        return back()->with('success','Gudang berhasil dihapus');
    }
}