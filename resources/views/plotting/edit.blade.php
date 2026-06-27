@extends('layouts.admin')

@section('title', 'Edit Plotting - Sistem Plotting Asesor')

@push('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2-theme.min.css') }}">
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Edit Plotting</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plotting.index') }}">Data Plotting</a></li>
            <li class="breadcrumb-item">Edit</li>
        </ul>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="row">
        <div class="col-lg-8">
            <div class="card stretch stretch-full">
                <div class="card-header">
                    <h5 class="card-title">Form Edit Plotting</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('plotting.update', $plotting->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="form-label">Asesor <span class="text-danger">*</span></label>
                            <select name="asesor_id" class="form-control select2 @error('asesor_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Asesor --</option>
                                @foreach($asesor as $item)
                                    <option value="{{ $item->id }}" {{ old('asesor_id', $plotting->asesor_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }} - {{ $item->bidang }}
                                    </option>
                                @endforeach
                            </select>
                            @error('asesor_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Peserta <span class="text-danger">*</span></label>
                            <select name="peserta_id" class="form-control select2 @error('peserta_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Peserta --</option>
                                @foreach($peserta as $item)
                                    <option value="{{ $item->id }}" {{ old('peserta_id', $plotting->peserta_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }} - {{ $item->jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('peserta_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $plotting->tanggal) }}" required>
                            @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                            <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" value="{{ old('lokasi', $plotting->lokasi) }}" placeholder="Masukkan lokasi plotting" required>
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('plotting.index') }}" class="btn btn-light">
                                <i class="feather-x me-2"></i>
                                Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-save me-2"></i>
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('vendor-scripts')
<script src="{{ asset('assets/vendors/js/select2.min.js') }}"></script>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap-5',
            placeholder: 'Pilih...'
        });
    });
</script>
@endpush
