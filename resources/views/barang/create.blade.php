@extends('layouts.admin.main')


@section('content')

<div class="container-fluid">

    <div class="card col-md-6">
       
        <div class="card-body">

<h4>Tambah Barang</h4>

<form action="{{ route('barang.store') }}" method="POST">
@csrf

<div class="mb-3">
<label>Kode Barang</label>
<input type="text" name="kode_barang" class="form-control">
</div>

<div class="mb-3">
<label>Nama Barang</label>
<input type="text" name="nama_barang" class="form-control">
</div>

<div class="mb-3">
<label>Satuan</label>
<input type="text" name="satuan" class="form-control">
</div>
<div class="mb-3">
<label>Stok Minimum</label>
<input type="text" name="stok_minimum" class="form-control">
</div>

<button class="btn btn-success">Simpan</button>

</form>

</div>

@endsection