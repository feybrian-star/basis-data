
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Kopi Analytics</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
          rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            background: #151815;
            color: #f5f1e8;
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 18px;
        }

        .login-card {
            width: 100%;
            max-width: 950px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #20241f;
            border: 1px solid #393d34;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 25px 70px #0005;
        }

        .login-visual {
            position: relative;
            min-height: 570px;
            background:
                linear-gradient(180deg, #15181520, #151815ee),
                url('https://images.unsplash.com/photo-1442512595331-e89e73853f31?auto=format&fit=crop&w=1000&q=85')
                center/cover;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 38px;
        }

        .brand {
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 13px;
            color: #e7c58c;
        }

        .visual-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 42px;
            line-height: 1.2;
            margin-bottom: 16px;
        }

        .visual-text p {
            color: #d1d1c7;
            line-height: 1.7;
            font-size: 14px;
        }

        .login-form {
            padding: 55px 42px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-label {
            font-size: 13px;
            color: #d8d8ce;
            margin-bottom: 8px;
        }

        .form-control {
            background: #171a17;
            border: 1px solid #41453c;
            border-radius: 9px;
            padding: 13px 15px;
            color: #f5f1e8;
            font-size: 14px;
        }

        .form-control:focus {
            background: #171a17;
            border-color: #c49a5a;
            color: #fff;
            box-shadow: 0 0 0 3px #c49a5a20;
        }

        .form-control::placeholder {
            color: #777c72;
        }

        .login-btn {
            width: 100%;
            background: #c49a5a;
            color: #171a17;
            border: none;
            border-radius: 9px;
            padding: 14px;
            font-weight: 700;
            transition: .2s;
        }

        .login-btn:hover {
            background: #dfb979;
            transform: translateY(-1px);
        }

        .error-text {
            color: #ff9b9b;
            font-size: 12px;
        }

        @media (max-width: 700px) {
            .login-card {
                grid-template-columns: 1fr;
                max-width: 440px;
            }

            .login-visual {
                min-height: 220px;
                padding: 25px;
            }

            .visual-text h1 {
                font-size: 29px;
            }

            .login-form {
                padding: 35px 25px;
            }
        }
    </style>
</head>

<body>

<div class="login-page">
    <div class="login-card">

        <div class="login-visual">
            <div class="brand">KOPI ANALYTICS</div>

            <div class="visual-text">
                <h1>Turn data into better decisions.</h1>

                <p>
                    Kelola penjualan, pahami tren bisnis,
                    dan temukan peluang dari setiap transaksi.
                </p>
            </div>

            <small style="color:#bcbcb0">
                Sales Analytics System
            </small>
        </div>

        <div class="login-form">

            <div class="mb-4">
                <div class="brand mb-3">WELCOME BACK</div>

                <h2 style="font-family:'Playfair Display',serif">
                    Masuk ke akun
                </h2>

                <p style="color:#a5a99e;font-size:14px">
                    Silakan login untuk mengakses dashboard.
                </p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger py-2">
                    <small>{{ $errors->first() }}</small>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="nama@email.com"
                           value="{{ old('email') }}"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Masukkan password"
                           required>
                </div>

                <button type="submit" class="login-btn">
                    Masuk ke Dashboard →
                </button>
            </form>

            <p class="text-center mt-4"
               style="color:#777c72;font-size:12px">
                Sistem Analisis Penjualan © {{ date('Y') }}
            </p>

        </div>
    </div>
</div>

</body>
</html>
