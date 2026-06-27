<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Sistem Plotting Asesor</title>

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

                    {{-- Panel Ilustrasi --}}
                    <div class="col-lg-6 bg-primary order-0">
                        <div class="h-100 d-flex flex-column align-items-center justify-content-center p-5 text-white">
                            <img src="{{ asset('assets/images/mascot-register.png') }}" alt="Maskot Sistem Plotting Asesor" class="img-fluid mb-4" style="max-width:320px;max-height:320px;">
                            <h3 class="fw-bolder fs-18 text-center mb-2">Bergabung Bersama Kami</h3>
                            <p class="fs-13 text-center opacity-75">Daftarkan akun untuk mulai mengelola data plotting asesor.</p>
                        </div>
                    </div>

                    {{-- Form Register --}}
                    <div class="col-lg-6 h-100 my-auto order-1">
                        <div class="wd-50 bg-white p-2 rounded-circle shadow-lg position-absolute translate-middle top-50 start-50 d-none d-lg-block">
                            <img src="{{ asset('assets/images/logo-abbr.png') }}" alt="Logo" class="img-fluid">
                        </div>
                        <div class="creative-card-body card-body p-sm-5">

                            <h2 class="fs-20 fw-bolder mb-1">Daftar Akun</h2>
                            <h4 class="fs-13 fw-bold mb-2">Buat akun baru Anda</h4>
                            <p class="fs-12 fw-medium text-muted mb-4">Isi formulir berikut untuk mendaftar ke <strong>Sistem Plotting Asesor</strong>.</p>

                            @if ($errors->any())
                                <div class="alert alert-danger py-2 fs-12 mb-3">
                                    <ul class="mb-0 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}" class="w-100">
                                @csrf

                                <div class="mb-4">
                                    <label for="name" class="fs-12 fw-semibold text-muted mb-1">Nama Lengkap</label>
                                    <input id="name" type="text" name="name"
                                        value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Masukkan nama lengkap"
                                        required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="fs-12 fw-semibold text-muted mb-1">Email Address</label>
                                    <input id="email" type="email" name="email"
                                        value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Masukkan email Anda"
                                        required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="fs-12 fw-semibold text-muted mb-1">Password</label>
                                    <div class="input-group">
                                        <input id="password" type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Buat password baru"
                                            required autocomplete="new-password">
                                        <div class="input-group-text bg-gray-2 c-pointer" id="togglePassword" style="cursor:pointer;">
                                            <i class="feather-eye" id="eyeIconPass"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex gap-1 mt-2" id="strengthBars" style="display:none!important;">
                                        <div class="flex-fill rounded" style="height:4px;background:#e9ecef;" id="bar1"></div>
                                        <div class="flex-fill rounded" style="height:4px;background:#e9ecef;" id="bar2"></div>
                                        <div class="flex-fill rounded" style="height:4px;background:#e9ecef;" id="bar3"></div>
                                        <div class="flex-fill rounded" style="height:4px;background:#e9ecef;" id="bar4"></div>
                                    </div>
                                    <small class="fs-11" id="strengthLabel"></small>
                                    @error('password')
                                        <span class="text-danger fs-12 mt-1 d-block"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="password-confirm" class="fs-12 fw-semibold text-muted mb-1">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" name="password_confirmation"
                                            class="form-control"
                                            placeholder="Ulangi password"
                                            required autocomplete="new-password">
                                        <div class="input-group-text bg-gray-2 c-pointer" id="toggleConfirm" style="cursor:pointer;">
                                            <i class="feather-eye" id="eyeIconConfirm"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary w-100">
                                        <i class="feather-user-plus me-2"></i> Buat Akun
                                    </button>
                                </div>
                            </form>

                            <div class="mt-4 text-muted text-center fs-12">
                                <span>Sudah punya akun?</span>
                                <a href="{{ route('login') }}" class="fw-bold text-primary">Login di sini</a>
                            </div>

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
    // Toggle password
    document.getElementById('togglePassword').addEventListener('click', function () {
        const input = document.getElementById('password');
        const icon  = document.getElementById('eyeIconPass');
        input.type = input.type === 'password' ? 'text' : 'password';
        icon.classList.toggle('feather-eye');
        icon.classList.toggle('feather-eye-off');
    });

    document.getElementById('toggleConfirm').addEventListener('click', function () {
        const input = document.getElementById('password-confirm');
        const icon  = document.getElementById('eyeIconConfirm');
        input.type = input.type === 'password' ? 'text' : 'password';
        icon.classList.toggle('feather-eye');
        icon.classList.toggle('feather-eye-off');
    });

    // Password strength
    document.getElementById('password').addEventListener('input', function () {
        const val   = this.value;
        const bars  = [document.getElementById('bar1'), document.getElementById('bar2'), document.getElementById('bar3'), document.getElementById('bar4')];
        const label = document.getElementById('strengthLabel');
        const wrap  = document.getElementById('strengthBars');

        if (!val.length) {
            wrap.style.display = 'none';
            label.textContent  = '';
            return;
        }
        wrap.style.display = 'flex';

        let s = 0;
        if (val.length >= 6)  s++;
        if (val.length >= 10) s++;
        if (/[A-Z]/.test(val) && /[0-9]/.test(val)) s++;
        if (/[^A-Za-z0-9]/.test(val)) s++;

        const colors = ['#dc3545','#fd7e14','#ffc107','#28a745'];
        const texts  = ['Sangat Lemah','Lemah','Sedang','Kuat'];

        bars.forEach((b, i) => {
            b.style.background = i < s ? colors[s - 1] : '#e9ecef';
        });
        label.textContent = s ? 'Kekuatan: ' + texts[s - 1] : '';
        label.style.color = s ? colors[s - 1] : '';
    });
</script>
</body>
</html>