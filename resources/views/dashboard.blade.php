
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SalesAnalytic | Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        body {
            background: #f5f7fb;
            font-family: Arial, sans-serif;
            color: #1e293b;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: #111c36;
            position: fixed;
            padding: 25px 18px;
            color: white;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 45px;
        }

        .sidebar a {
            display: block;
            padding: 13px 15px;
            color: #aab6ce;
            text-decoration: none;
            border-radius: 10px;
            margin-bottom: 9px;
        }

        .sidebar a.active,
        .sidebar a:hover {
            background: #2563eb;
            color: white;
        }

        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .stat-card, .content-card {
            background: white;
            border: none;
            border-radius: 16px;
            padding: 23px;
            box-shadow: 0 4px 18px rgba(0,0,0,.04);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 13px;
            background: #eaf1ff;
            color: #2563eb;
            font-size: 23px;
        }

        .stat-number {
            font-size: 25px;
            font-weight: bold;
            margin-top: 15px;
        }

        .table th {
            color: #64748b;
            font-size: 13px;
        }

        .table td {
            padding: 15px 10px;
        }

        @media(max-width: 768px) {
            .sidebar {
                width: 75px;
                padding: 20px 10px;
            }

            .brand {
                font-size: 12px;
            }

            .sidebar a {
                font-size: 0;
                text-align: center;
            }

            .sidebar a i {
                font-size: 20px;
            }

            .main {
                margin-left: 75px;
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">
        <i class="bi bi-graph-up-arrow text-primary"></i>
        SalesAnalytic
    </div>

    <small class="text-secondary">MENU UTAMA</small>

    <a href="{{ route('admin.dashboard') }}" class="active">
        <i class="bi bi-grid me-2"></i> Dashboard
    </a>

    <a href="#statistik">
        <i class="bi bi-bar-chart me-2"></i> Statistik
    </a>

    <a href="#transaksi">
        <i class="bi bi-receipt me-2"></i> Data Penjualan
    </a>

    <hr class="border-secondary">

    <small class="text-secondary">AKUN</small>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-outline-light w-100 mt-3">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
    </form>
</aside>

<main class="main">

    <div class="topbar">
        <div>
            <h3 class="fw-bold mb-1">Dashboard</h3>
            <p class="text-muted mb-0">Selamat datang, {{ auth()->user()->name }}!</p>
        </div>

        <div class="text-end">
            <span class="badge bg-primary-subtle text-primary p-2">
                <i class="bi bi-shield-check"></i> Administrator
            </span>
        </div>
    </div>

    <div class="row g-4 mb-4">

        <div class="col-md-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-currency-dollar"></i>
                </div>
                <p class="text-muted mt-3 mb-1">Total Penjualan</p>
                <div class="stat-number">
                    Rp {{ number_format($totalPenjualan ?? 0, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-receipt"></i>
                </div>
                <p class="text-muted mt-3 mb-1">Jumlah Transaksi</p>
                <div class="stat-number">
                    {{ number_format($jumlahTransaksi ?? 0, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-person-check"></i>
                </div>
                <p class="text-muted mt-3 mb-1">Status Akun</p>
                <div class="stat-number text-success">Aktif</div>
            </div>
        </div>

    </div>

    <div class="content-card mb-4" id="statistik">
        <h5 class="fw-bold mb-4">Grafik Penjualan</h5>

        <div style="height:300px">
            <canvas id="salesChart"></canvas>
        </div>
    </div>

    <div class="content-card" id="transaksi">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Data Penjualan Terbaru</h5>
            <span class="badge bg-primary">Transaksi</span>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Total Penjualan</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($penjualan as $item)
                        <tr>
                            <td>#{{ $item->id }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td class="fw-bold">
                                Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success">
                                    Tercatat
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                Belum ada data penjualan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <p class="text-center text-muted mt-4">
        © {{ date('Y') }} SalesAnalytic. All Rights Reserved.
    </p>

</main>

<script>
    const ctx = document.getElementById('salesChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($grafikLabels ?? []),
            datasets: [{
                label: 'Total Penjualan',
                data: @json($grafikData ?? []),
                backgroundColor: '#3b82f6',
                borderRadius: 7,
                barThickness: 25
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
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

</body>
</html>
