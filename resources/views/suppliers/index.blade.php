@extends('layouts.admin.main')

@section('content')
<div class="container-fluid">

    <div class="card col-md-6">
       
        <div class="card-body">
    <h4>Data Supplier</h4>

    <a href="{{ route('supplier.create') }}" class="btn btn-primary mb-3">Tambah Supplier</a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kontak</th>
            <th>Aksi</th>
        </tr>

        @foreach($suppliers as $s)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $s->nama }}</td>
            <td>{{ $s->kontak }}</td>
            <td>
                <a href="{{ route('supplier.edit',$s->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('supplier.destroy',$s->id) }}" method="POST" style="display:inline">
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