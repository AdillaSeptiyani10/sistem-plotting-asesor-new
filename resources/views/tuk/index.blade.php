@extends('layouts.admin')

@section('title', 'Data TUK - Sistem Plotting Asesor')

@push('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/dataTables.bs5.min.css') }}">
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Data TUK</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Data TUK</li>
        </ul>
    </div>
    <div class="page-header-right ms-auto">
        <div class="page-header-right-items">
            <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                <a href="{{ route('tuk.create') }}" class="btn btn-primary">
                    <i class="feather-plus me-2"></i>
                    <span>Tambah TUK</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card stretch stretch-full">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover" id="tukList">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama TUK</th>
                                    <th>Alamat</th>
                                    <th>Penanggung Jawab</th>
                                    <th>No HP</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tuk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="hstack gap-3">
                                            <div class="avatar-text avatar-md bg-soft-info text-info">
                                                <i class="feather-map-pin"></i>
                                            </div>
                                            <div>
                                                <span class="d-block fw-bold">{{ $item->nama_tuk }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <i class="feather-map me-2"></i>{{ $item->alamat }}
                                    </td>
                                    <td>
                                        <span class="badge bg-soft-success text-success">{{ $item->penanggung_jawab }}</span>
                                    </td>
                                    <td>
                                        <i class="feather-phone me-2"></i>{{ $item->no_hp }}
                                    </td>
                                    <td>
                                        <div class="hstack gap-2 justify-content-end">
                                            <a href="{{ route('tuk.edit', $item->id) }}" class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Edit">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="{{ route('tuk.destroy', $item->id) }}" method="POST" style="display:inline;">
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
        $('#tukList').DataTable();
    });
</script>
@endpush