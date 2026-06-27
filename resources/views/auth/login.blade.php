<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Sistem Plotting Asesor</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css') }}">
</head>

<body>
<main class="auth-creative-wrapper">
    <div class="auth-creative-inner">
        <div class="creative-card-wrapper">
            <div class="card my-4 overflow-hidden" style="z-index: 1">
                <div class="row flex-1 g-0">

                    {{-- Form Login --}}
                    <div class="col-lg-6 h-100 my-auto order-1 order-lg-0">
                        <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-50 start-50 d-none d-lg-block">
                            <img src="{{ asset('assets/images/logo-abbr.png') }}" alt="Logo" class="img-fluid">
                        </div>
                        <div class="creative-card-body card-body p-sm-5">

                            <h2 class="fs-20 fw-bolder mb-1">Login</h2>
                            <h4 class="fs-13 fw-bold mb-2">Masuk ke akun Anda</h4>
                            <p class="fs-12 fw-medium text-muted mb-4">Selamat datang kembali di <strong>Sistem Plotting Asesor</strong>.</p>

                            @if ($errors->any())
                                <div class="alert alert-danger py-2 fs-12 mb-3">
                                    <ul class="mb-0 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}" class="w-100">
                                @csrf

                                <div class="mb-4">
                                    <label for="email" class="fs-12 fw-semibold text-muted mb-1">Email Address</label>
                                    <input id="email" type="email" name="email"
                                        value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Masukkan email Anda"
                                        required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="fs-12 fw-semibold text-muted mb-1">Password</label>
                                    <div class="input-group">
                                        <input id="password" type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Masukkan password"
                                            required autocomplete="current-password">
                                        <div class="input-group-text bg-gray-2 c-pointer" id="togglePassword" style="cursor:pointer;">
                                            <i class="feather-eye" id="eyeIcon"></i>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="text-danger fs-12 mt-1 d-block"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label c-pointer" for="rememberMe">Ingat Saya</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="fs-11 text-primary">Lupa password?</a>
                                    @endif
                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary w-100">
                                        <i class="feather-log-in me-2"></i> Login
                                    </button>
                                </div>
                            </form>

                            @if (Route::has('register'))
                                <div class="mt-4 text-muted text-center fs-12">
                                    <span>Belum punya akun?</span>
                                    <a href="{{ route('register') }}" class="fw-bold text-primary">Daftar Sekarang</a>
                                </div>
                            @endif

                        </div>
                    </div>

                    {{-- Panel Ilustrasi --}}
                    <div class="col-lg-6 bg-primary order-0 order-lg-1">
                        <div class="h-100 d-flex flex-column align-items-center justify-content-center p-5 text-white">
                            <img src="{{ asset('assets/images/mascot-register.png') }}" alt="Maskot Sistem Plotting Asesor" class="img-fluid mb-4" style="max-width:320px;max-height:320px;">
                            <h3 class="fw-bolder fs-18 text-center mb-2">Sistem Plotting Asesor</h3>
                            <p class="fs-13 text-center opacity-75">Platform pengelolaan plotting dan penjadwalan asesor secara efisien.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script src="{{ asset('assets/vendors/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/js/theme.min.js') }}"></script>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const input = document.getElementById('password');
        const icon  = document.getElementById('eyeIcon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('feather-eye', 'feather-eye-off');
        } else {
            input.type = 'password';
            icon.classList.replace('feather-eye-off', 'feather-eye');
        }
    });
</script>
</body>
</html>
