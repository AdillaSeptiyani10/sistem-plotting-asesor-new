@extends('layouts.admin')

@section('title', 'Tambah Asesor - Sistem Plotting Asesor')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Tambah Asesor</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('asesor.index') }}">Data Asesor</a></li>
            <li class="breadcrumb-item">Tambah</li>
        </ul>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card stretch stretch-full">
                <div class="card-header">
                    <h5 class="card-title">Form Tambah Asesor</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('asesor.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">Nama Asesor <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan nama asesor" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Bidang Keahlian <span class="text-danger">*</span></label>
                            <input type="text" name="bidang" class="form-control @error('bidang') is-invalid @enderror" value="{{ old('bidang') }}" placeholder="Contoh: Teknik Informatika" required>
                            @error('bidang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">No HP <span class="text-danger">*</span></label>
                            <input type="text" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') }}" placeholder="Contoh: 08123456789" required>
                            @error('no_hp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('asesor.index') }}" class="btn btn-light">
                                <i class="feather-x me-2"></i>
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-save me-2"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection