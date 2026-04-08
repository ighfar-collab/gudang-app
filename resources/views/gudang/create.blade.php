@extends('layouts.admin.main')


@section('content')

<div class="container-fluid">

    <div class="card col-md-6">
       
        <div class="card-body">

<h4>Tambah Gudang</h4>

<form action="{{ route('gudang.store') }}" method="POST">
@csrf

<div class="mb-3">
    <label>Nama Gudang</label>
    <input type="text" name="nama_gudang" class="form-control" required>
</div>

<div class="mb-3">
    <label>Lokasi</label>
    <input type="text" name="lokasi" class="form-control">
</div>

<button class="btn btn-success">Simpan</button>

</form>
</div>
</div></div>

@endsection