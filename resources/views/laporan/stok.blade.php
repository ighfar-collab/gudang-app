@extends('layouts.admin.main')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">📥 Laporan Stok</h3>

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
               <th>No</th>
            <th>Barang</th>
            <th>Gudang</th>
            <th>Jumlah</th>
                 <th>Tanggal</th>
                       
                    </tr>
                </thead>
                <tbody>
                   
        @foreach($stoks as $no => $s)
        <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $s->barang->nama_barang }}</td>
            <td>{{ $s->gudang->nama_gudang }}</td>
            <td>{{ $s->jumlah }}</td>
                        <td>{{ \Carbon\Carbon::parse($s->created_at)->format('d-m-Y') }}</td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection