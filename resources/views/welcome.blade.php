<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Monitoring Cargo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f4f6f9;
            color: #333;
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: #2d7df6;
            color: white;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            font-size: 20px;
        }

        .navbar a {
            text-decoration: none;
            color: white;
            background: rgba(255,255,255,0.2);
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
        }

        .navbar a:hover {
            background: rgba(255,255,255,0.35);
        }

        /* ===== STATS ===== */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .card h3 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .pending { color: #f39c12; }
        .proses  { color: #3498db; }
        .transit { color: #9b59b6; }
        .sampai  { color: #2ecc71; }

        /* ===== TABLE ===== */
        .table-container {
            background: white;
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
            white-space: nowrap;
        }

        table th {
            background: #f0f2f5;
        }

        .badge {
            padding: 6px 14px;
            border-radius: 20px;
            color: white;
            font-size: 13px;
            display: inline-block;
        }

        .badge.pending { background: #f39c12; }
        .badge.proses  { background: #3498db; }
        .badge.transit { background: #9b59b6; }
        .badge.sampai  { background: #2ecc71; }

        footer {
            text-align: center;
            padding: 15px;
            color: #777;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            .navbar h2 {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<div class="navbar">
    <h2>🚚 Cargo Monitoring System</h2>
 
    <a href="{{ route('login') }}">Login</a>
    
</div>

<!-- ===== SUMMARY ===== -->
<section class="stats">
    <div class="card pending">
        <h3>12</h3>
        <p>Pending</p>
    </div>
    <div class="card proses">
        <h3>8</h3>
        <p>Proses</p>
    </div>
    <div class="card transit">
        <h3>5</h3>
        <p>Transit</p>
    </div>
    <div class="card sampai">
        <h3>20</h3>
        <p>Sampai</p>
    </div>
</section>

<!-- ===== TABLE ===== -->
<section class="table-container">
    <h3>📦 Data Cargo</h3>

    <table>
        <thead>
            <tr>
                <th>No Resi</th>
                <th>Pengirim</th>
                <th>Tujuan</th>
                <th>Berat (Kg)</th>
                <th>Vehicle</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>CRG-001</td>
                <td>PT Maju Jaya</td>
                <td>Banda Aceh</td>
                <td>120</td>
                <td>Truck Fuso</td>
                <td><span class="badge pending">Pending</span></td>
            </tr>
            <tr>
                <td>CRG-002</td>
                <td>Andi</td>
                <td>Medan</td>
                <td>80</td>
                <td>Pickup</td>
                <td><span class="badge proses">Proses</span></td>
            </tr>
            <tr>
                <td>CRG-003</td>
                <td>Siti</td>
                <td>Lhokseumawe</td>
                <td>200</td>
                <td>Truck Box</td>
                <td><span class="badge transit">Transit</span></td>
            </tr>
            <tr>
                <td>CRG-004</td>
                <td>CV Amanah</td>
                <td>Bireuen</td>
                <td>60</td>
                <td>Pickup</td>
                <td><span class="badge sampai">Sampai</span></td>
            </tr>
        </tbody>
    </table>
</section>

<footer>
    © 2026 Cargo Monitoring System
</footer>

</body>
</html>
