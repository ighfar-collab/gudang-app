@extends('layouts.admin.main')
@section('title', 'Dashboard')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard Monitoring Cargo Super Admin</h1>
  </div>

  {{-- SUMMARY CARD --}}
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary"><i class="fas fa-box"></i></div>
        <div class="card-wrap">
          <div class="card-header"><h4>Total Cargo</h4></div>
          <div class="card-body">{{ $total }}</div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning"><i class="fas fa-clock"></i></div>
        <div class="card-wrap">
          <div class="card-header"><h4>Pending</h4></div>
          <div class="card-body">{{ $pending }}</div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-info"><i class="fas fa-truck"></i></div>
        <div class="card-wrap">
          <div class="card-header"><h4>Proses</h4></div>
          <div class="card-body">{{ $proses }}</div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success"><i class="fas fa-check"></i></div>
        <div class="card-wrap">
          <div class="card-header"><h4>Transit</h4></div>
          <div class="card-body">{{ $transit }}</div>
        </div>
      </div>
    </div>
  </div>

   <div class="row">
    <div class="col-lg-3 col-md-5 col-sm-5 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success"><i class="fas fa-check-circle"></i></div>
        <div class="card-wrap">
          <div class="card-header"><h4>Sampai</h4></div>
          <div class="card-body">{{ $sampai }}</div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-7 col-sm-7 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger"><i class="fas fa-dollar"></i></div>
        <div class="card-wrap">
          <div class="card-header"><h4>Total Pendapatan</h4></div>
          <div class="card-body" style="font-size: 16px;">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
        </div>
      </div>
    </div>


  </div>

  {{-- GRAFIK --}}
  <div class="row">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-header"><h4>Status Cargo</h4></div>
        <div class="card-body">
          <canvas id="statusChart"></canvas>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card">
        <div class="card-header"><h4>Cargo per Bulan ({{ date('Y') }})</h4></div>
        <div class="card-body">
          <canvas id="monthlyChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  {{-- TABEL MONITORING --}}
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>Monitoring Cargo Terbaru</h4>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Resi</th>
                <th>Penerima</th>
                <th>Status</th>
                <th>Lokasi Terakhir</th>
                <th>Update</th>
              </tr>
            </thead> <tbody>
            @forelse($cargostotal as $it)
            <tr>
  <td>{{ $it->id }}</td>
                <td>{{ $it->no_resi }}</td>
              
                <td>{{ $it->penerima }}</td>
     
                <td>{{ $it->lastTracking->status ?? '-' }}</td>
                 <td>{{ $it->lastTracking->lokasi ?? '-' }}</td>
                               <td>{{ $it->lastTracking->updated_at ?? '-' }}</td>
                
</tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Tidak ada data cargo.</td>
            </tr>
            @endforelse
          </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const statusCtx = document.getElementById('statusChart');
new Chart(statusCtx, {
  type: 'bar',
  data: {
    labels: ['Pending','Proses','Transit','Sampai'],
    datasets: [{
      data: [{{ $pending }}, {{ $proses }}, {{ $transit }}, {{ $sampai }}]
    }]
  }
});
const monthlyCtx = document.getElementById('monthlyChart');
new Chart(monthlyCtx, {
type: 'line',
data: {
labels: @json($bulanLabels),
datasets: [{
label: 'Cargo',
data: @json($bulanData),
tension: 0.4
}]
}
});
</script>

</script>
@endpush