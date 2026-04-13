@extends('layouts.admin.main')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">📥 Laporan Barang Keluar</h3>

    {{-- 🔍 FILTER --}}
    <form method="GET" class="row mb-3">
        <div class="col-md-3">
            <input type="date" name="tanggal_awal" class="form-control">
        </div>
        <div class="col-md-3">
            <input type="date" name="tanggal_akhir" class="form-control">
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    {{-- 📊 TABEL --}}
    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Barang</th>
                        <th>Gudang</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr>
                        <td>{{ $item->barang->kode_barang }}</td>
                        <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                <td>{{ $item->gudangAsal->nama_gudang ?? '-' }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection