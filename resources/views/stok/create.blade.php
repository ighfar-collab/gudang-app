@extends('layouts.admin.main')

@section('content')

<div class="container-fluid">

    <div class="card col-md-6">
       
        <div class="card-body">

            <h4>Tambah Stok</h4>

            <form action="{{ route('stok.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Barang</label>
                <select name="barang_id" class="form-control" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barangs as $b)
                        <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Gudang</label>
                <select name="gudang_id" class="form-control" required>
                    <option value="">-- Pilih Gudang --</option>
                    @foreach($gudangs as $g)
                        <option value="{{ $g->id }}">{{ $g->nama_gudang }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Jumlah Stok</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>

            <button class="btn btn-success">Simpan</button>

            </form>

        </div>
    </div>

</div>

@endsection