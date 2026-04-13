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
                        <td>{{ $item->jumlah }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <!-- Barang Hampir Habis -->
        <div class="col-md-6">
            <div class="card p-3">
                <h5>Barang Hampir Habis</h5>
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <th>Stok</th>
                    </tr>
                    @foreach($barangHampirHabis as $item)
                    <tr>
                        {{-- 🔥 PERBAIKAN: karena pakai JOIN --}}
                        <td>{{ $item->nama_barang }}</td>
                        <td class="text-danger">{{ $item->jumlah }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>

    <!-- 📊 GRAFIK AKTIVITAS -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card p-3">
                <h5>Grafik Aktivitas Gudang ({{ $tahun }})</h5>
                <canvas id="chartAktivitasGudang"></canvas>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
var ctx = document.getElementById('chartAktivitasGudang').getContext('2d');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: @json($label),
        datasets: [
            {
                label: 'Masuk',
                data: @json($dataMasuk),
                borderWidth: 2,
                tension: 0.4
            },
            {
                label: 'Keluar',
                data: @json($dataKeluar),
                borderWidth: 2,
                tension: 0.4
            },
            {
                label: 'Mutasi',
                data: @json($dataMutasi),
                borderWidth: 2,
                tension: 0.4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Aktivitas Gudang'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

@endpush