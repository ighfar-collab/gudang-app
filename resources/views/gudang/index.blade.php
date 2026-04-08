@extends('layouts.admin.main')
@section('content')
<div class="container-fluid">

    <div class="card col-md-12">
       
        <div class="card-body">
<h3>Data Gudang</h3>

<a href="{{ route('gudang.create') }}" class="btn btn-primary mb-3">+ Tambah Gudang</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Nama Gudang</th>
        <th>Lokasi</th>
        <th>Aksi</th>
    </tr>

    @foreach($gudangs as $g)
    <tr>
        <td>{{ $g->nama_gudang }}</td>
        <td>{{ $g->lokasi ?? '-' }}</td>
        <td>
            <a href="{{ route('gudang.edit',$g->id) }}" class="btn btn-warning btn-sm">Edit</a>

            <form action="{{ route('gudang.destroy',$g->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $gudangs->links() }}

@endsection