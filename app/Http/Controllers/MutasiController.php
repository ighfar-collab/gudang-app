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
    DB::transaction(function () use ($request) {

        // simpan mutasi
        $mutasi = Mutasi::create([
            'barang_id'   => $request->barang_id,
            'dari_gudang' => $request->dari_gudang,
            'ke_gudang'   => $request->ke_gudang,
            'jumlah'      => $request->jumlah,
            'tipe'        => $request->tipe,
            'tanggal'     => now(),
            'keterangan'  => 'Mutasi Gudang'
        ]);

        // ====================================
        // 📥 MASUK
        // ====================================
        if ($request->tipe == 'masuk') {

            $stok = Stok::firstOrCreate([
                'barang_id' => $request->barang_id,
                'gudang_id' => $request->ke_gudang
            ]);

            $stok->increment('jumlah', $request->jumlah);
        }

        // ====================================
        // 📤 KELUAR
        // ====================================
        if ($request->tipe == 'keluar') {

            $stok = Stok::where('barang_id', $request->barang_id)
                ->where('gudang_id', $request->dari_gudang)
                ->first();

            if (!$stok || $stok->jumlah < $request->jumlah) {
                throw new \Exception('Stok tidak cukup');
            }

            $stok->decrement('jumlah', $request->jumlah);
        }

        // ====================================
        // 🔄 MUTASI (TRANSFER)
        // ====================================
        if ($request->tipe == 'transfer') {

            // kurangi gudang asal
            $stokAsal = Stok::where('barang_id', $request->barang_id)
                ->where('gudang_id', $request->dari_gudang)
                ->first();

            if (!$stokAsal || $stokAsal->jumlah < $request->jumlah) {
                throw new \Exception('Stok asal tidak cukup');
            }

            $stokAsal->decrement('jumlah', $request->jumlah);

            // tambah gudang tujuan
            $stokTujuan = Stok::firstOrCreate([
                'barang_id' => $request->barang_id,
                'gudang_id' => $request->ke_gudang
            ]);

            $stokTujuan->increment('jumlah', $request->jumlah);
        }
    });

    return back()->with('success', 'Data berhasil disimpan & stok terupdate');
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
