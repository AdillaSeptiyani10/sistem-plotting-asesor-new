@extends('layouts.admin')

@section('title', 'Data Peserta - Sistem Plotting Asesor')

@push('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/dataTables.bs5.min.css') }}">
@endpush

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Data Peserta</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Data Peserta</li>
        </ul>
    </div>
    <div class="page-header-right ms-auto">
        <div class="page-header-right-items">
            <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                <a href="{{ route('peserta.create') }}" class="btn btn-primary">
                    <i class="feather-plus me-2"></i>
                    <span>Tambah Peserta</span>
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
                        <table class="table table-hover" id="pesertaList">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peserta as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="hstack gap-3">
                                            <div class="avatar-text avatar-md">
                                                <i class="feather-user"></i>
                                            </div>
                                            <div>
                                                <span class="d-block">{{ $item->nama }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $item->jurusan }}</td>
                                    <td>
                                        <div class="hstack gap-2 justify-content-end">
                                            <a href="{{ route('peserta.edit', $item->id) }}" class="avatar-text avatar-md">
                                                <i class="feather-edit"></i>
                                            </a>
                                            <form action="{{ route('peserta.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="avatar-text avatar-md" onclick="return confirm('Yakin ingin menghapus?')">
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
        $('#pesertaList').DataTable();
    });
</script>
@endpush