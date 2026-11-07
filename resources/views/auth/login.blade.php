
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | SalesAnalytic</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a, #1e3a8a, #2563eb);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .login-card {
            background: white;
            width: 100%;
            max-width: 420px;
            padding: 38px;
            border-radius: 22px;
            box-shadow: 0 20px 50px rgba(0,0,0,.2);
        }

        .logo {
            width: 58px;
            height: 58px;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            font-size: 27px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-control {
            padding: 13px;
            border-radius: 10px;
        }

        .btn-login {
            background: #2563eb;
            color: white;
            padding: 13px;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn-login:hover {
            background: #1d4ed8;
            color: white;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo">S</div>

    <h3 class="fw-bold">Selamat Datang!</h3>

    <p class="text-muted mb-4">
        Login ke Sistem Analisis Penjualan
    </p>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Masukkan email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                required
            >
        </div>

        <button type="submit" class="btn btn-login w-100">
            Login Sekarang
        </button>
    </form>

    <p class="text-center text-muted mt-4 mb-0">
        SalesAnalytic © {{ date('Y') }}
    </p>

</div>

</body>
</html>
