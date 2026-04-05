@extends('layouts.admin.main')
@section('title','Detail Customer')

@section('content')
<div class="container-fluid">

{{-- INFO CUSTOMER --}}
<div class="card mb-3">
    <div class="card-body">
        <h5>{{ $loan->nama }}</h5>
    <div>Total: Rp {{ number_format($loan->nominal) }}</div>
    <div>Sisa: Rp {{ number_format($loan->sisa) }}</div>
    </div>
</div>

{{-- RIWAYAT TRANSAKSI --}}
<div class="card mb-3">
    <div class="card-header">
        <strong>Riwayat Transaksi</strong>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Invoice</th>
                    <th>Total</th>
                    <th>Bayar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @forelse($loan->transactions as $t)
                <tr>
                    <td>{{ $t->tanggal }}</td>
                    <td>{{ $t->invoice }}</td>
                    <td>Rp {{ number_format($t->total) }}</td>
                    <td>Rp {{ number_format($t->bayar) }}</td>
                    <td>
                        @if($t->status=='lunas')
                            <span class="badge bg-success">Lunas</span>
                        @else
                            <span class="badge bg-warning">Piutang</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">Belum ada transaksi</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- PIUTANG & ANGSURAN --}}
<div class="card">
    <div class="card-header">
        <strong>Piutang Customer</strong>
    </div>
    <div class="card-body">
        @forelse($loan->loans as $loan)
            <div class="border rounded p-3 mb-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>Invoice:</strong> {{ $loan->transactions->invoice }}
                        <br>
                        <strong>Total:</strong> Rp {{ number_format($loan->nominal) }}
                        <br>
                        <strong>Sisa:</strong> Rp {{ number_format($loan->sisa) }}
                    </div>
                    <div>
                        @if($loan->status=='lunas')
                            <span class="badge bg-success">Lunas</span>
                        @else
                            <span class="badge bg-danger">Belum Lunas</span>
                        @endif
                    </div>
                </div>

                {{-- ANGSURAN --}}
                @if($loan->installments->count())
                <table class="table table-sm mt-3">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($loan->installments as $i)
                        <tr>
                            <td>{{ $i->tanggal }}</td>
                            <td>Rp {{ number_format($i->bayar) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        @empty
            <div class="text-muted">Tidak ada piutang</div>
        @endforelse
    </div>
</div>

<a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">
    Kembali
</a>

</div>
@endsection