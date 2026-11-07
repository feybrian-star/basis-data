
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>User Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6fb;
        }

        .navbar {
            background: #172554;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,.05);
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark px-4 py-3">
    <span class="navbar-brand fw-bold">
        SalesAnalytic
    </span>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-outline-light btn-sm">
            Logout
        </button>
    </form>
</nav>

<div class="container py-5">

    <h2 class="fw-bold">
        Dashboard User
    </h2>

    <p class="text-muted">
        Selamat datang, {{ auth()->user()->name }}!
    </p>

    <div class="row g-4 mt-2">

        <div class="col-md-6">
            <div class="card p-4">
                <h5>Informasi Sistem</h5>
                <p class="text-muted mb-0">
                    Sistem ini digunakan untuk melihat
                    informasi dan perkembangan penjualan.
                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-4">
                <h5>Hak Akses</h5>
                <p class="text-muted mb-0">
                    Kamu login sebagai User dan dapat
                    melihat informasi yang disediakan.
                </p>
            </div>
        </div>

    </div>

</div>

</body>
</html>
