@extends('layouts.admin.main')
@section('title', 'Dashboard')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard SIMKEU</h1>
  </div>
<div class="container-fluid">

    <div class="card col-md-12">
       
        <div class="card-body"><div class="row">

<div class="col-md-4">
<div class="card bg-success text-white">
<div class="card-body">
<h5>Cash In</h5>
<h3>Rp {{ number_format($cashIn) }}</h3>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card bg-danger text-white">
<div class="card-body">
<h5>Cash Out</h5>
<h3>Rp {{ number_format($cashOut) }}</h3>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card bg-primary text-white">
<div class="card-body">
<h5>Cash Flow</h5>
<h3>Rp {{ number_format($cashFlow) }}</h3>
</div>
</div>
</div>

</div>
<div class="row">

<div class="col-md-4">
<div class="card bg-info text-white">
<div class="card-body">
<h5>Total Transaksi</h5>
<h3>{{ $totalTransaksi }}</h3>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card bg-warning text-white">
<div class="card-body">
<h5>Total Pembelian</h5>
<h3>{{ $totalPembelian }}</h3>
</div>
</div>
</div>

</div>

<canvas id="cashflowChart"></canvas>
</div>
</section>
@endsection

@push('scripts')<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

var ctx = document.getElementById('cashflowChart');

new Chart(ctx,{
type:'bar',
data:{
labels:['Cash In','Cash Out'],
datasets:[{
label:'Cash Flow',
data:[
{{ $cashIn }},
{{ $cashOut }}
]
}]
}
});

</script>

</script>
@endpush