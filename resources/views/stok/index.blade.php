@extends('layouts.admin.main')
@section('content')
<div class="container-fluid">

    <div class="card col-md-12">
       
        <div class="card-body">

    <a href="{{ route('stok.create') }}" class="btn btn-primary mb-3">
        + Tambah Stok
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Barang</th>
            <th>Gudang</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>

        @foreach($stoks as $no => $s)
        <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $s->barang->nama_barang }}</td>
            <td>{{ $s->gudang->nama_gudang }}</td>
            <td>{{ $s->jumlah }}</td>
            <td>
                <a href="{{ route('stok.edit',$s->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('stok.destroy',$s->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection