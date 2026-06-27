@extends('layouts.admin')

@section('title', 'Profile - Sistem Plotting Asesor')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Profile Saya</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Profile</li>
        </ul>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">

        {{-- Kartu Foto Profil --}}
        <div class="col-lg-4">
            <div class="card stretch stretch-full">
                <div class="card-body text-center">
                    <img src="{{ $user->photo_url }}" alt="Foto Profil" class="rounded-circle mb-3" style="width:140px;height:140px;object-fit:cover;">
                    <h5 class="mb-1">{{ $user->name }}</h5>
                    <p class="fs-12 text-muted mb-4">{{ $user->email }}</p>

                    <form action="{{ route('profile.photo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 text-start">
                            <label class="form-label">Ganti Foto Profil</label>
                            <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror" accept="image/png, image/jpeg, image/jpg">
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted fs-11">Format JPG/PNG, maksimal 2MB.</small>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="feather-upload me-2"></i> Upload Foto
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">

            {{-- Form Informasi Akun --}}
            <div class="card stretch stretch-full mb-4">
                <div class="card-header">
                    <h5 class="card-title">Informasi Akun</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" placeholder="Masukkan nama lengkap" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" placeholder="Masukkan email" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-save me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Form Ganti Password --}}
            <div class="card stretch stretch-full">
                <div class="card-header">
                    <h5 class="card-title">Ganti Password</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label">Password Saat Ini <span class="text-danger">*</span></label>
                            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Masukkan password saat ini" required>
                            @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Password Baru <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan password baru" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Konfirmasi Password Baru <span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-lock me-2"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
