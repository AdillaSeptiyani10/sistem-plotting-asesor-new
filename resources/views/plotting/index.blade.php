@extends('layouts.admin')

@section('title', 'Data Plotting - Sistem Plotting Asesor')

@push('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/dataTables.bs5.min.css') }}">
@endpush

@section('content')
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Data Plotting</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Data Plotting</li>
        </ul>
    </div>
    <div class="page-header-right ms-auto">
        <a href="{{ route('plotting.create') }}" class="btn btn-primary">
            <i class="feather-plus me-2"></i>Tambah Plotting
        </a>
    </div>
</div>

<div class="main-content">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-3 mb-4" role="alert">
        <div class="avatar-text avatar-md bg-success text-white flex-shrink-0"><i class="feather-check-circle"></i></div>
        <div><h6 class="mb-0 fw-bold">{{ session('success') }}</h6></div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show d-flex align-items-start gap-3 mb-4" role="alert">
        <div class="avatar-text avatar-md bg-danger text-white flex-shrink-0"><i class="feather-alert-triangle"></i></div>
        <div><h6 class="mb-1 fw-bold text-danger">Jadwal Bentrok!</h6><p class="mb-0">{!! session('error') !!}</p></div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card stretch stretch-full">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm" id="plottingList" style="font-size:13px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tgl Ujikom</th>
                                    <th>Bulan-Tahun</th>
                                    <th>TUK</th>
                                    <th>Holding</th>
                                    <th>Skema Sertifikasi</th>
                                    <th>Metode</th>
                                    <th>Nama Asesor</th>
                                    <th>Email Asesor</th>
                                    <th>Jml Asesi</th>
                                    <th>Waktu Asesmen</th>
                                    <th>Approver (H-4)</th>
                                    <th>Status</th>
                                    <th>Tgl Diajukan</th>
                                    <th>Tgl Direspon</th>
                                    <th>Asesor Pengganti</th>
                                    <th>SPT (H-2)</th>
                                    <th>Progres</th>
                                    <th>Kinerja Asesor</th>
                                    <th>Tgl Pleno</th>
                                    <th>Terbit Sertifikat</th>
                                    <th>Catatan Asesmen</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($plotting as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('F Y') }}</td>
                                    <td>
                                        <span class="fw-bold">{{ $item->tuk ? $item->tuk->nama_tuk : '-' }}</span>
                                    </td>
                                    <td>{{ $item->holding }}</td>
                                    <td>{{ $item->skema_sertifikasi }}</td>
                                    <td>
                                        @php
                                            $badge = match($item->metode_kegiatan) {
                                                'Luring' => 'bg-soft-primary text-primary',
                                                'Daring' => 'bg-soft-success text-success',
                                                'Hybrid' => 'bg-soft-warning text-warning',
                                                default  => 'bg-soft-secondary text-secondary',
                                            };
                                        @endphp
                                        <span class="badge {{ $badge }}">{{ $item->metode_kegiatan }}</span>
                                    </td>
                                    <td>{{ $item->asesor->nama }}</td>
                                    <td>{{ $item->asesor->email ?? '-' }}</td>
                                    <td class="text-center">{{ $item->jumlah_peserta }}</td>
                                    <td>{{ $item->waktu_asesmen ? $item->waktu_asesmen . ' - ' . ($item->waktu_selesai ?? '...') : '-' }}</td>
                                    <td>{{ $item->approver_h4 ?? '-' }}</td>
                                    <td>
                                        @php
                                            $statusBadge = match($item->status) {
                                                'Disetujui' => 'bg-soft-success text-success',
                                                'Ditolak'   => 'bg-soft-danger text-danger',
                                                default     => 'bg-soft-warning text-warning',
                                            };
                                        @endphp
                                        <span class="badge {{ $statusBadge }}">{{ $item->status }}</span>
                                    </td>
                                    <td>{{ $item->tgl_diajukan ? $item->tgl_diajukan->format('d/m/Y') : '-' }}</td>
                                    <td>{{ $item->tgl_direspon ? $item->tgl_direspon->format('d/m/Y') : '-' }}</td>
                                    <td>{{ $item->asesor_pengganti ?? '-' }}</td>
                                    <td class="text-center">
                                        @if($item->spt_h2)
                                            <a href="{{ Storage::url($item->spt_h2) }}" target="_blank" class="btn btn-sm btn-outline-primary py-0 px-2">
                                                <i class="feather-file"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $progresBadge = match($item->progres) {
                                                'Selesai' => 'bg-soft-success text-success',
                                                'Proses'  => 'bg-soft-info text-info',
                                                default   => 'bg-soft-secondary text-secondary',
                                            };
                                        @endphp
                                        <span class="badge {{ $progresBadge }}">{{ $item->progres }}</span>
                                    </td>
                                    <td>{{ $item->kinerja_asesor ?? '-' }}</td>
                                    <td>{{ $item->tgl_pleno ? $item->tgl_pleno->format('d/m/Y') : '-' }}</td>
                                    <td class="text-center">
                                        @if($item->terbit_sertifikat)
                                            <i class="feather-check-square text-success fs-18"></i>
                                        @else
                                            <i class="feather-square text-muted fs-18"></i>
                                        @endif
                                    </td>
                                    <td>{{ $item->catatan_asesmen ?? '-' }}</td>
                                    <td>
                                        <div class="hstack gap-2 justify-content-end">
                                            <a href="{{ route('plotting.edit', $item->id) }}" class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Edit">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="{{ route('plotting.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="avatar-text avatar-md" onclick="return confirm('Yakin ingin menghapus?')" data-bs-toggle="tooltip" title="Hapus">
                                                    <i class="feather-trash-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('vendor-scripts')
<script src="{{ asset('assets/vendors/js/dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/dataTables.bs5.min.js') }}"></script>
@endpush
@push('scripts')
<script>
    $(document).ready(function() {
        $('#plottingList').DataTable({ scrollX: true });
    });
</script>
@endpush
