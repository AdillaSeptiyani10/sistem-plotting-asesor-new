@extends('layouts.admin')

@section('title', 'Tambah Plotting - Sistem Plotting Asesor')

@push('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/select2-theme.min.css') }}">
@endpush

@section('content')
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Tambah Plotting</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plotting.index') }}">Data Plotting</a></li>
            <li class="breadcrumb-item">Tambah</li>
        </ul>
    </div>
</div>

<div class="main-content">
    <div class="row">
        <div class="col-lg-10">
            <div class="card stretch stretch-full">
                <div class="card-header">
                    <h5 class="card-title">Form Tambah Plotting</h5>
                </div>
                <div class="card-body">

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-start gap-3 mb-4" role="alert">
                        <div class="avatar-text avatar-md bg-danger text-white flex-shrink-0">
                            <i class="feather-alert-triangle"></i>
                        </div>
                        <div><h6 class="mb-1 fw-bold text-danger">Jadwal Bentrok!</h6>
                        <p class="mb-0">{!! session('error') !!}</p></div>
                        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form action="{{ route('plotting.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h6 class="fw-bold text-muted mb-3 mt-2">— Informasi Dasar</h6>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Asesor <span class="text-danger">*</span></label>
                                <select name="asesor_id" class="form-control select2 @error('asesor_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Asesor --</option>
                                    @foreach($asesor as $item)
                                        <option value="{{ $item->id }}" {{ old('asesor_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('asesor_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">TUK (Tempat Uji Kompetensi) <span class="text-danger">*</span></label>
                                <select name="tuk_id" class="form-control select2 @error('tuk_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih TUK --</option>
                                    @foreach($tuk as $item)
                                        <option value="{{ $item->id }}" {{ old('tuk_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_tuk }} - {{ $item->alamat }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tuk_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Tanggal Ujikom <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" required>
                                @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Waktu Asesmen</label>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <label class="form-label small text-muted mb-1">Mulai</label>
                                        <input type="time" name="waktu_asesmen" class="form-control" value="{{ old('waktu_asesmen') }}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label small text-muted mb-1">Selesai</label>
                                        <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Skema Sertifikasi <span class="text-danger">*</span></label>
                                <input type="text" name="skema_sertifikasi" class="form-control @error('skema_sertifikasi') is-invalid @enderror"
                                    value="{{ old('skema_sertifikasi') }}" placeholder="Contoh: Skema Junior Web Developer" required>
                                @error('skema_sertifikasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Metode Kegiatan <span class="text-danger">*</span></label>
                                <select name="metode_kegiatan" class="form-control select2 @error('metode_kegiatan') is-invalid @enderror" required>
                                    <option value="">-- Pilih Metode --</option>
                                    <option value="Luring" {{ old('metode_kegiatan') == 'Luring' ? 'selected' : '' }}>Luring</option>
                                    <option value="Daring" {{ old('metode_kegiatan') == 'Daring' ? 'selected' : '' }}>Daring</option>
                                    <option value="Hybrid" {{ old('metode_kegiatan') == 'Hybrid' ? 'selected' : '' }}>Hybrid</option>
                                </select>
                                @error('metode_kegiatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Holding / Nama LSP <span class="text-danger">*</span></label>
                                <input type="text" name="holding" class="form-control @error('holding') is-invalid @enderror"
                                    value="{{ old('holding') }}" placeholder="Nama LSP / Perusahaan" required>
                                @error('holding')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Jumlah Asesi <span class="text-danger">*</span></label>
                                <input type="number" name="jumlah_peserta" class="form-control @error('jumlah_peserta') is-invalid @enderror"
                                    value="{{ old('jumlah_peserta') }}" placeholder="Jumlah peserta" min="1" required>
                                @error('jumlah_peserta')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <h6 class="fw-bold text-muted mb-3 mt-2">— Proses & Status</h6>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Approver H-4 (Email Direktur)</label>
                                <input type="email" name="approver_h4" class="form-control @error('approver_h4') is-invalid @enderror"
                                    value="{{ old('approver_h4') }}" placeholder="email@perusahaan.com">
                                @error('approver_h4')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">SPT H-2 (Upload Dokumen)</label>
                                <input type="file" name="spt_h2" class="form-control @error('spt_h2') is-invalid @enderror" accept=".pdf,.doc,.docx">
                                <small class="text-muted">Format: PDF, DOC, DOCX. Maks 5MB</small>
                                @error('spt_h2')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control select2">
                                    <option value="Pending" {{ old('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Disetujui" {{ old('status') == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                    <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Tgl Diajukan</label>
                                <input type="date" name="tgl_diajukan" class="form-control" value="{{ old('tgl_diajukan') }}">
                            </div>
                            <div class="col-md-4 mb-4">
                                <label class="form-label">Tgl Direspon</label>
                                <input type="date" name="tgl_direspon" class="form-control" value="{{ old('tgl_direspon') }}">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Asesor Pengganti</label>
                                <input type="text" name="asesor_pengganti" class="form-control" value="{{ old('asesor_pengganti') }}" placeholder="Nama asesor pengganti (jika ada)">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Progres</label>
                                <select name="progres" class="form-control select2">
                                    <option value="Belum" {{ old('progres') == 'Belum' ? 'selected' : '' }}>Belum</option>
                                    <option value="Proses" {{ old('progres') == 'Proses' ? 'selected' : '' }}>Proses</option>
                                    <option value="Selesai" {{ old('progres') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Kinerja Asesor</label>
                                <input type="text" name="kinerja_asesor" class="form-control" value="{{ old('kinerja_asesor') }}" placeholder="Penilaian kinerja asesor">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Tgl Pleno</label>
                                <input type="date" name="tgl_pleno" class="form-control" value="{{ old('tgl_pleno') }}">
                            </div>
                            <div class="col-md-12 mb-4">
                                <label class="form-label">Catatan Asesmen</label>
                                <textarea name="catatan_asesmen" class="form-control" rows="3" placeholder="Catatan tambahan...">{{ old('catatan_asesmen') }}</textarea>
                            </div>
                            <div class="col-md-12 mb-4">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="terbit_sertifikat" id="terbit_sertifikat" value="1" {{ old('terbit_sertifikat') ? 'checked' : '' }}>
                                    <label class="form-check-label fw-bold" for="terbit_sertifikat">Terbit Sertifikat</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="{{ route('plotting.index') }}" class="btn btn-light">
                                <i class="feather-x me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-save me-2"></i>Simpan
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
        $('.select2').select2({ theme: 'bootstrap-5', placeholder: 'Pilih...' });
    });
</script>
@endpush
