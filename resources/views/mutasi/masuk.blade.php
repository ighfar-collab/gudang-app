@extends('layouts.admin.main')

@section('content')
<div class="section-header">
<div class="container">

    <h3>Data Mutasi Barang Masuk</h3>

    <a href="{{ route('mutasi.create') }}" class="btn btn-primary mb-3">
        + Tambah Mutasi
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Tanggal</th>
                <th>Barang</th>
                <th>Dari Gudang</th>
                <th>Ke Gudang</th>
                <th>Jumlah</th>
                <th>Tipe</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $m)
            <tr>
                <td>{{ $m->tanggal }}</td>
                <td>{{ $m->barang->nama_barang ?? '-' }}</td>
                <td>{{ $m->gudangAsal->nama_gudang ?? '-' }}</td>
                <td>{{ $m->gudangTujuan->nama_gudang ?? '-' }}</td>
                <td>{{ $m->jumlah }}</td>

                <td>
                    @if($m->tipe == 'masuk')
                        <span class="badge bg-success">Masuk</span>
                    @elseif($m->tipe == 'keluar')
                        <span class="badge bg-danger">Keluar</span>
                    @else
                        <span class="badge bg-warning">Transfer</span>
                    @endif
                </td>

                <td>{{ $m->keterangan ?? '-' }}</td>

                <td>
                    <a href="{{ route('mutasi.edit', $m->id) }}" 
                       class="btn btn-warning btn-sm">
                       Edit
                    </a>

                    <form action="{{ route('mutasi.destroy', $m->id) }}" 
                          method="POST" 
                          style="display:inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>

            @empty
            <tr>
                <td colspan="8" class="text-center">
                    Tidak ada data mutasi
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- PAGINATION --}}
    {{ $data->links() }}

</div>
@endsection