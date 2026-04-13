@extends('layouts.admin.main')


@section('content')

<div class="container-fluid">

    <div class="card col-md-12">
       
        <div class="card-body">

<h4>Tambah Supplier</h4>

<form action="{{ route('supplier.store') }}" method="POST">
@csrf

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" class="form-control">
</div>

<div class="mb-3">
<label>Kontak</label>
<input type="text" name="kontak" class="form-control">
</div>

<button class="btn btn-success">Simpan</button>

</form>

</div>

@endsection