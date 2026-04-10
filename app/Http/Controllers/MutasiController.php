<?php

namespace App\Http\Controllers;



use App\Models\Mutasi;
use App\Models\Barang;
use App\Models\Gudang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MutasiController extends Controller
{
    /**
     * LIST DATA
     */
    public function index()
    {
        $mutasis = Mutasi::with(['barang','gudangAsal','gudangTujuan'])
            ->latest()
            ->paginate(10);

        return view('mutasi.index', compact('mutasis'));
    }
    public function keluar()
    {
      $data = Mutasi::where('tipe', 'keluar')
            ->latest()
            ->paginate(10);

        return view('mutasi.keluar', compact('data'));
    }
    public function masuk()
    {
      $data = Mutasi::where('tipe', 'masuk')
            ->latest()
            ->paginate(10);

        return view('mutasi.masuk', compact('data'));
    }
    /**
     * FORM TAMBAH
     */
    public function create()
    {
        $barangs = Barang::all();
        $gudangs = Gudang::all();

        return view('mutasi.create', compact('barangs','gudangs'));
    }

    /**
     * SIMPAN DATA
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|numeric|min:1',
            'tipe' => 'required|in:masuk,keluar,transfer',
            'tanggal' => 'required|date'
        ]);

        DB::beginTransaction();

        try {
            $barang = Barang::findOrFail($request->barang_id);

            // =========================
            // LOGIC STOK
            // =========================
            if ($request->tipe == 'masuk') {

                $barang->stok += $request->jumlah;

            } elseif ($request->tipe == 'keluar') {

                if ($barang->stok < $request->jumlah) {
                    return back()->with('error','Stok tidak cukup!');
                }

                $barang->stok -= $request->jumlah;

            } elseif ($request->tipe == 'transfer') {

                if ($barang->stok < $request->jumlah) {
                    return back()->with('error','Stok tidak cukup untuk transfer!');
                }

                // global stok tetap, tapi bisa dikembangkan stok per gudang
            }

            $barang->save();

            // =========================
            // SIMPAN MUTASI
            // =========================
            Mutasi::create([
                'barang_id' => $request->barang_id,
                'dari_gudang' => $request->dari_gudang,
                'ke_gudang' => $request->ke_gudang,
                'jumlah' => $request->jumlah,
                'tipe' => $request->tipe,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan
            ]);

            DB::commit();

            return redirect()->route('mutasi.index')
                ->with('success','Mutasi berhasil disimpan');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error','Terjadi kesalahan: '.$e->getMessage());
        }
    }

    /**
     * FORM EDIT
     */
    public function edit($id)
    {
        $mutasi = Mutasi::findOrFail($id);
        $barangs = Barang::all();
        $gudangs = Gudang::all();

        return view('mutasi.edit', compact('mutasi','barangs','gudangs'));
    }

    /**
     * UPDATE DATA
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|numeric|min:1',
            'tipe' => 'required|in:masuk,keluar,transfer',
            'tanggal' => 'required|date'
        ]);

        DB::beginTransaction();

        try {
            $mutasi = Mutasi::findOrFail($id);
            $barang = Barang::findOrFail($request->barang_id);

            // =========================
            // BALIKKAN STOK LAMA
            // =========================
            if ($mutasi->tipe == 'masuk') {
                $barang->stok -= $mutasi->jumlah;
            } elseif ($mutasi->tipe == 'keluar') {
                $barang->stok += $mutasi->jumlah;
            }

            // =========================
            // APPLY STOK BARU
            // =========================
            if ($request->tipe == 'masuk') {

                $barang->stok += $request->jumlah;

            } elseif ($request->tipe == 'keluar') {

                if ($barang->stok < $request->jumlah) {
                    return back()->with('error','Stok tidak cukup!');
                }

                $barang->stok -= $request->jumlah;
            }

            $barang->save();

            // =========================
            // UPDATE DATA
            // =========================
            $mutasi->update([
                'barang_id' => $request->barang_id,
                'dari_gudang' => $request->dari_gudang,
                'ke_gudang' => $request->ke_gudang,
                'jumlah' => $request->jumlah,
                'tipe' => $request->tipe,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan
            ]);

            DB::commit();

            return redirect()->route('mutasi.index')
                ->with('success','Data berhasil diupdate');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error','Error: '.$e->getMessage());
        }
    }

    /**
     * HAPUS DATA
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $mutasi = Mutasi::findOrFail($id);
            $barang = Barang::findOrFail($mutasi->barang_id);

            // =========================
            // BALIKKAN STOK
            // =========================
            if ($mutasi->tipe == 'masuk') {
                $barang->stok -= $mutasi->jumlah;
            } elseif ($mutasi->tipe == 'keluar') {
                $barang->stok += $mutasi->jumlah;
            }

            $barang->save();
            $mutasi->delete();

            DB::commit();

            return back()->with('success','Data berhasil dihapus');

        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error','Error: '.$e->getMessage());
        }
    }
}
