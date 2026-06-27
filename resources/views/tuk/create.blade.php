@extends('layouts.admin')

@section('title', 'Tambah TUK - Sistem Plotting Asesor')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Tambah TUK</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('tuk.index') }}">Data TUK</a></li>
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
                    <h5 class="card-title">Form Tambah TUK</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('tuk.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="form-label">Nama TUK <span class="text-danger">*</span></label>
                            <input type="text" name="nama_tuk" class="form-control @error('nama_tuk') is-invalid @enderror" value="{{ old('nama_tuk') }}" placeholder="Masukkan nama TUK" required>
                            @error('nama_tuk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Alamat <span class="text-danger">*</span></label>
                            <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" placeholder="Masukkan alamat lengkap TUK" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Penanggung Jawab <span class="text-danger">*</span></label>
                            <input type="text" name="penanggung_jawab" class="form-control @error('penanggung_jawab') is-invalid @enderror" value="{{ old('penanggung_jawab') }}" placeholder="Masukkan nama penanggung jawab" required>
                            @error('penanggung_jawab')
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
                            <a href="{{ route('tuk.index') }}" class="btn btn-light">
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