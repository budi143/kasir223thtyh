<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk &middot; Toko Anda</title>

    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendor/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/admin/dist/css/adminlte.min.css">
    <!-- Modern theme (override) -->
    <link rel="stylesheet" href="/vendor/admin/dist/css/modern-theme.css?v=2">
</head>

<body class="login-page">
    <main class="auth-wrap">
        <div class="auth-card">
            <div class="auth-brand">
                <span class="brand-mark"><i class="fas fa-cash-register"></i></span>
                <span class="brand-text">Toko Anda<small>Point of Sale</small></span>
            </div>

            <h1>Selamat datang kembali</h1>
            <p class="auth-sub">Masuk untuk mengelola penjualan dan stok toko Anda.</p>

            @if (session()->has('loginError'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    {{ session('loginError') }}
                </div>
            @endif

            <form action="/login" method="post">
                @csrf

                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <input type="email"
                               id="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="nama@email.com"
                               value="{{ old('email') }}"
                               autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Masukkan password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block btn-lg">
                    <i class="fas fa-sign-in-alt mr-1"></i> Masuk
                </button>
            </form>

            <p class="auth-foot">&copy; {{ date('Y') }} Toko Anda &middot; Sistem Kasir</p>
        </div>
    </main>

    <!-- jQuery -->
    <script src="/vendor/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/vendor/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/vendor/admin/dist/js/adminlte.min.js"></script>
</body>

</html>