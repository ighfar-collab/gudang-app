@extends('layouts.admin.main')
@section('title', 'Dashboard')
@section('content')
<div class="container">

    <h3 class="mb-4">Dashboard Gudang</h3>

    <div class="row">

        <!-- Total Barang -->
        <div class="col-md-3">
            <div class="card bg-primary text-white p-3">
                <h5>Total Barang</h5>
                <h3>{{ $totalBarang }}</h3>
            </div>
        </div>

        <!-- Stok Masuk -->
        <div class="col-md-3">
            <div class="card bg-success text-white p-3">
                <h5>Masuk Hari Ini</h5>
                <h3>{{ $stokMasukHariIni }}</h3>
            </div>
        </div>

        <!-- Stok Keluar -->
        <div class="col-md-3">
            <div class="card bg-danger text-white p-3">
                <h5>Keluar Hari Ini</h5>
                <h3>{{ $stokKeluarHariIni }}</h3>
            </div>
        </div>

        <!-- Stok Menipis -->
        <div class="col-md-3">
            <div class="card bg-warning text-dark p-3">
                <h5>Stok Menipis</h5>
                <h3>{{ $stokMenipis }}</h3>
            </div>
        </div>

    </div>

    <!-- Tabel -->
    <div class="row mt-4">

        <!-- Barang Terbaru -->
        <div class="col-md-6">
            <div class="card p-3">
                <h5>Barang Terbaru</h5>
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <th>Stok</th>
                    </tr>
                    @foreach($barangTerbaru as $item)
                    <tr>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->stok }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <!-- Barang Hampir Habis -->
        <div class="col-md-6">
            <div class="card p-3">
                <h5>Stok Hampir Habis</h5>
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <th>Stok</th>
                    </tr>
                    @foreach($barangHampirHabis as $item)
                    <tr>
                        <td>{{ $item->nama_barang }}</td>
                        <td class="text-danger">{{ $item->stok }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>

</div>
@endsection