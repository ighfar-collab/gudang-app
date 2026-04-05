@extends('layouts.admin.main')
@section('title', 'Dashboard')
@section('content')
<section class="section">
  <div class="section-header">
    <h1>Dashboard Monitoring Mitra</h1>
  </div>

  {{-- SUMMARY CARD --}}

  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary"><i class="fas fa-box"></i></div>
        <div class="card-wrap">
          <div class="card-header"><h4>Total Cargo</h4></div>
          <div class="card-body">{{ $mitratotal }}</div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning"><i class="fas fa-clock"></i></div>
        <div class="card-wrap">
          <div class="card-header"><h4>Pending</h4></div>
          <div class="card-body">{{ $mitrapending }}</div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-info"><i class="fas fa-truck"></i></div>
        <div class="card-wrap">
          <div class="card-header"><h4>Proses</h4></div>
          <div class="card-body">{{ $mitraproses }}</div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success"><i class="fas fa-check"></i></div>
        <div class="card-wrap">
          <div class="card-header"><h4>Transit</h4></div>
          <div class="card-body">{{ $mitratransit }}</div>
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
          <div class="card-body">{{ $mitrasampai }}</div>
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-md-7 col-sm-7 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger"><i class="fas fa-dollar"></i></div>
        <div class="card-wrap">
          <div class="card-header"><h4>Total Pendapatan</h4></div>
          <div class="card-body" style="font-size: 16px;">Rp {{ number_format($totalPendapatanMitra, 0, ',', '.') }}</div>
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
            </thead>
                  <tbody>
            @forelse($cargos as $it)
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
