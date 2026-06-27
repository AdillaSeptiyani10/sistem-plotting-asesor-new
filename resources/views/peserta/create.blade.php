@extends('layouts.admin')

@section('title', 'Tambah Peserta - Sistem Plotting Asesor')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Tambah Peserta</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('peserta.index') }}">Data Peserta</a></li>
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
                    <h5 class="card-title">Form Tambah Peserta</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('peserta.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">Nama Peserta <span class="text-danger">*</span></label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Masukkan nama peserta" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Jurusan <span class="text-danger">*</span></label>
                            <input type="text" name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan') }}" placeholder="Contoh: Teknik Komputer dan Jaringan" required>
                            @error('jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('peserta.index') }}" class="btn btn-light">
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