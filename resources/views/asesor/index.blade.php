@extends('layouts.admin')

@section('title', 'Data Asesor - Sistem Plotting Asesor')

@push('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/dataTables.bs5.min.css') }}">
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Data Asesor</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Data Asesor</li>
        </ul>
    </div>
    <div class="page-header-right ms-auto">
        <div class="page-header-right-items">
            <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                <a href="{{ route('asesor.create') }}" class="btn btn-primary">
                    <i class="feather-plus me-2"></i>
                    <span>Tambah Asesor</span>
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
                        <table class="table table-hover" id="asesorList">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($asesor as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="hstack gap-3">
                                            <div class="avatar-text avatar-md bg-soft-primary text-primary">
                                                <i class="feather-user-check"></i>
                                            </div>
                                            <div>
                                                <span class="d-block fw-bold">{{ $item->nama }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <i class="feather-mail me-2"></i>{{ $item->email ?? '-' }}
                                    </td>
                                    <td>
                                        <i class="feather-phone me-2"></i>{{ $item->no_hp }}
                                    </td>
                                    <td>
                                        <div class="hstack gap-2 justify-content-end">
                                            <a href="{{ route('asesor.edit', $item->id) }}" class="avatar-text avatar-md" data-bs-toggle="tooltip" title="Edit">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="{{ route('asesor.destroy', $item->id) }}" method="POST" style="display:inline;">
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
        $('#asesorList').DataTable();
    });
</script>
@endpush