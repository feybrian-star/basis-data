
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Sales Analytics</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #edf2f8;
            color: #172d4d;
        }

        header {
            background: #102c54;
            color: white;
            padding: 22px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        main {
            padding: 45px;
        }

        .welcome {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px #0000000a;
        }

        .welcome h1 {
            margin-top: 0;
        }

        button {
            background: #1765a5;
            color: white;
            border: none;
            padding: 11px 20px;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #267bc1;
        }
    </style>
</head>

<body>

<header>
    <h2>SALES ANALYTICS</h2>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</header>

<main>
    <div class="welcome">
        <h1>Selamat Datang di Dashboard!</h1>

        <p>
            Halo, {{ Auth::user()->name }}.
        </p>

        <p>
            Kamu berhasil login ke Sistem Analisis Penjualan.
        </p>

        <p>
            Di sini kamu dapat mengelola data penjualan,
            melihat laporan transaksi, dan menganalisis
            perkembangan bisnis.
        </p>
    </div>
</main>

</body>
</html>
