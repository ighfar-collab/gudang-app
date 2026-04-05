<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>APLIKASI KPI - DINKES PROVINSI MALUKU</title>
  <style>
    :root{
      --bg:#0f1724; /* deep navy */
      --card:#0b1220;
      --accent:#0ea5a4; /* teal */
      --accent-2:#60a5fa; /* blue */
      --muted:#9aa7b2;
      --glass: rgba(255,255,255,0.04);
      --radius:14px;
      --shadow: 0 6px 20px rgba(2,6,23,0.6);
      font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    *{box-sizing:border-box}
    body{
      margin:0;
      background: linear-gradient(180deg,#071021 0%, #071827 60%);
      color:#e6eef6;
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      min-height:100vh;
      padding:28px;
    }

    .app{
      max-width:1200px;
      margin:0 auto;
    }

    header.app-header{
      display:flex;
      align-items:center;
      gap:18px;
      margin-bottom:22px;
    }
    .brand{
      display:flex;
      align-items:center;
      gap:14px;
    }
    .logo{
      width:64px;height:64px;border-radius:12px;
      background:linear-gradient(135deg,var(--accent),var(--accent-2));
      display:flex;align-items:center;justify-content:center;font-weight:700;color:#04202a;font-size:18px;box-shadow:var(--shadow);
    }
    h1{font-size:20px;margin:0}
    p.lead{margin:0;color:var(--muted);font-size:13px}

    .top-right{
      margin-left:auto;display:flex;gap:12px;align-items:center
    }
    .search{
      background:var(--glass);padding:10px 12px;border-radius:12px;display:flex;gap:8px;align-items:center;width:280px
    }
    .search input{background:transparent;border:0;color:inherit;outline:none;width:100%}
    .btn{
      background:linear-gradient(90deg,var(--accent),var(--accent-2));padding:8px 12px;border-radius:12px;font-weight:600;border:0;color:#02121a;cursor:pointer;box-shadow:0 8px 30px rgba(14,165,164,0.12)
    }

    .main-grid{
      display:grid;grid-template-columns:280px 1fr;gap:20px
    }

    /* sidebar */
    aside.sidebar{
      background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));
      padding:16px;border-radius:var(--radius);min-height:520px;box-shadow:var(--shadow)
    }
    .profile{display:flex;gap:12px;align-items:center;margin-bottom:18px}
    .avatar{width:56px;height:56px;border-radius:10px;background:#06202a;display:flex;align-items:center;justify-content:center;font-weight:700}
    .nav{display:flex;flex-direction:column;gap:8px;margin-top:12px}
    .nav a{display:flex;gap:10px;align-items:center;padding:10px;border-radius:10px;color:var(--muted);text-decoration:none}
    .nav a.active{background:linear-gradient(90deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));color:var(--accent);font-weight:600}

    /* content */
    section.content{min-height:520px}
    .cards{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:18px}
    .card{
      background:var(--card);padding:14px;border-radius:12px;box-shadow:0 6px 18px rgba(2,6,23,0.45);border:1px solid rgba(255,255,255,0.02)
    }
    .kpi-value{font-size:20px;font-weight:700}
    .kpi-label{font-size:12px;color:var(--muted)}
    .kpi-delta{font-size:12px;color:var(--accent);font-weight:700}

    .charts{display:grid;grid-template-columns:2fr 1fr;gap:14px;margin-bottom:18px}
    .chart-card{background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));padding:14px;border-radius:12px}
    .table-card{background:var(--card);padding:14px;border-radius:12px}

    table{width:100%;border-collapse:collapse}
    th,td{padding:10px;text-align:left;border-bottom:1px dashed rgba(255,255,255,0.03);font-size:13px}
    th{color:var(--muted);font-size:12px}

    .footer{margin-top:18px;padding:14px;border-radius:12px;background:transparent;color:var(--muted);font-size:13px;text-align:center}

    /* responsive */
    @media (max-width:980px){
      .main-grid{grid-template-columns:1fr}
      .cards{grid-template-columns:repeat(2,1fr)}
      .charts{grid-template-columns:1fr}
      .search{display:none}
    }
    @media (max-width:520px){
      .cards{grid-template-columns:1fr}
      header.app-header{flex-direction:column;align-items:flex-start;gap:10px}
      .top-right{width:100%;justify-content:space-between}
    }

    /* small decorative */
    .badge{background:rgba(255,255,255,0.03);padding:6px 8px;border-radius:999px;font-size:12px;color:var(--muted)}

  </style>
</head>
<body>
  <div class="app">
    <header class="app-header">
      <div class="brand">
        <div class="logo">KPI</div>
        <div>
          <h1>APLIKASI KPI — DINKES PROVINSI MALUKU</h1>
          <p class="lead">Dashboard pemantauan indikator kinerja utama kesehatan provinsi Maluku</p>
        </div>
      </div>

      <div class="top-right">
        <div class="search">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
          <input placeholder="Cari indikator, unit, atau bulan..." />
        </div>
    <a href="{{ route('login') }}" class="btn btn-primary mb-3">LOGIN</a>
      </div>
    </header>
<br>
<br>
<br>
<br>
<br>
<br>

 
 

        <div class="footer"><H1> Dinas Kesehatan Provinsi Maluku — Aplikasi KPI • Dibuat untuk pemantauan kinerja layanan kesehatan</h1><P> <h2>Selamat Datang .......</div>
      </section>
    </div>
  </div>
</body>
</html>
