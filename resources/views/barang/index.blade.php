@extends('layouts.admin.main')

@section('content')
<div class="section-header">
<div class="container">


    <h3>Data Barang</h3>

    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Stok</th>
            <th>Stok Min</th>
            <th>Aksi</th>
        </tr>

        @foreach($barang as $b)
        <tr>
            <td>{{ $b->kode_barang }}</td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->stok}}</td>
            <td>{{ $b->stok_minimum }}</td>
            <td>
                <a href="{{ route('barang.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('barang.destroy', $b->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>
@endsection

