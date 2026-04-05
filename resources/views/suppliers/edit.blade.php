@extends('layouts.admin.main')

@section('title','Edit Customer')

@section('content')
<div class="container-fluid">

    <div class="card col-md-6">
       
        <div class="card-body">

<h4>Edit Supplier</h4>

<form action="{{ route('suppliers.update',$supplier->id) }}" method="POST">
@csrf
@method('PUT')

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" value="{{ $supplier->nama }}" class="form-control">
</div>

<div class="mb-3">
<label>Kontak</label>
<input type="text" name="kontak" value="{{ $supplier->kontak }}" class="form-control">
</div>

<button class="btn btn-success">Update</button>

</form>

</div>

@endsection