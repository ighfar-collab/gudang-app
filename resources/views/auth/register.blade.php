<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Register - Aplikasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); }
    .card { border-radius: 12px; }
    .role-badge { font-size: .85rem; padding: .25rem .5rem; border-radius: 6px; }
  </style>
</head>
<body>
<div class="container d-flex align-items-center justify-content-center" style="min-height:100vh">
  <div class="col-md-6 col-lg-5">
    <div class="card shadow-sm">
      <div class="card-body p-4">
        <h4 class="mb-3">REGISTER</h4>

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
          @csrf

          <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
          </div>

          <div class="row gx-2">
            <div class="mb-3 col-md-6">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3 col-md-6">
              <label class="form-label">Konfirmasi Password</label>
              <input type="password" name="password_confirmation" class="form-control" required>
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Daftar Sebagai</label>
            <select name="role" class="form-select" required>
              <option value="">-- Pilih Role --</option>
              <option value="user" {{ old('role')=='user' ? 'selected' : '' }}>User</option>
              <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Admin</option>
            </select>
         
          </div>

          <div class="d-grid gap-2">
            <button class="btn btn-primary">Daftar Sekarang</button>
            <a href="{{ route('login') }}" class="btn btn-outline-secondary">Batal</a>
          </div>
        </form>
      </div>

      <div class="card-footer text-center small text-muted">
        Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
      </div>
    </div>
    <p class="text-center mt-3 small text-muted">© {{ date('Y') }} Instansi Anda</p>
  </div>
</div>
</body>
</html>
