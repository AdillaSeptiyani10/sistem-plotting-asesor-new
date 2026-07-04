@extends('layouts.admin')

@section('title', 'Dashboard - Sistem Plotting Asesor')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Dashboard</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item">Dashboard</li>
        </ul>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">

    {{-- Hero Banner Sapaan — warna berubah otomatis sesuai waktu --}}
    <div id="greetingBanner" class="position-relative overflow-hidden mb-4" style="border-radius:16px; padding:32px; min-height:160px; transition: background 0.6s ease;">
        <div class="position-relative" style="z-index:2;">
            <span id="greetingBadge" class="d-inline-block fw-semibold fs-11 px-3 py-1 mb-3" style="border-radius:20px; letter-spacing:0.5px; text-transform:uppercase;">
                Memuat...
            </span>
            <h3 class="mb-2 fw-bolder" id="greetingText" style="color:inherit;">
                Selamat Datang, {{ explode(' ', auth()->user()->name)[0] }} <span id="greetingEmoji"></span>
            </h3>
            <div class="d-flex align-items-center gap-2">
                <span class="fs-13" style="opacity:0.85;">Peran:</span>
                <span class="badge" id="greetingRoleBadge" style="border-radius:20px; padding:6px 14px; font-weight:600;">
                    Admin
                </span>
            </div>
        </div>

        {{-- Dekorasi awan/bintang, posisi absolute --}}
        <div id="greetingDecor" class="position-absolute" style="top:0; right:0; bottom:0; left:0; z-index:1; pointer-events:none;"></div>
    </div>

    <div class="row">
        <!-- Total Asesor -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-text avatar-xl rounded bg-soft-primary text-primary">
                                <i class="feather-user-check"></i>
                            </div>
                            <a href="{{ route('asesor.index') }}" class="fw-bold d-block">
                                <span class="text-truncate-1-line">Total Asesor</span>
                                <span class="fs-24 fw-bolder d-block">{{ $totalAsesor }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Plotting -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-text avatar-xl rounded bg-soft-warning text-warning">
                                <i class="feather-git-merge"></i>
                            </div>
                            <a href="{{ route('plotting.index') }}" class="fw-bold d-block">
                                <span class="text-truncate-1-line">Total Plotting</span>
                                <span class="fs-24 fw-bolder d-block">{{ $totalPlotting }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total TUK -->
        <div class="col-xxl-3 col-md-6">
            <div class="card stretch stretch-full">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div class="avatar-text avatar-xl rounded bg-soft-info text-info">
                                <i class="feather-map-pin"></i>
                            </div>
                            <a href="{{ route('tuk.index') }}" class="fw-bold d-block">
                                <span class="text-truncate-1-line">Total TUK</span>
                                <span class="fs-24 fw-bolder d-block">{{ $totalTuk }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    var hour = new Date().getHours();

    var banner   = document.getElementById('greetingBanner');
    var badge    = document.getElementById('greetingBadge');
    var greeting = document.getElementById('greetingText');
    var emoji    = document.getElementById('greetingEmoji');
    var decor    = document.getElementById('greetingDecor');
    var roleBadge = document.getElementById('greetingRoleBadge');

    var config;

    if (hour >= 4 && hour < 11) {
        // Pagi — biru muda
        config = {
            label: 'Pagi',
            sapaan: 'Selamat Pagi',
            emoji: '🌤️',
            bg: 'linear-gradient(135deg, #AEE2FF 0%, #6FC4F7 60%, #4FA8E8 100%)',
            textColor: '#0b3d5c',
            badgeBg: 'rgba(255,255,255,0.55)',
            roleBg: 'rgba(255,255,255,0.6)',
            decorColor: 'rgba(255,255,255,0.5)'
        };
    } else if (hour >= 11 && hour < 15) {
        // Siang — kuning
        config = {
            label: 'Afternoon',
            sapaan: 'Selamat Siang',
            emoji: '☀️',
            bg: 'linear-gradient(135deg, #FFE9A8 0%, #FFCF6B 55%, #FCB94B 100%)',
            textColor: '#7a4a00',
            badgeBg: 'rgba(255,255,255,0.55)',
            roleBg: 'rgba(255,255,255,0.65)',
            decorColor: 'rgba(255,255,255,0.55)'
        };
    } else if (hour >= 15 && hour < 18) {
        // Sore — senja
        config = {
            label: 'Sore',
            sapaan: 'Selamat Sore',
            emoji: '🌇',
            bg: 'linear-gradient(135deg, #FFB37B 0%, #FF8C6B 50%, #E8636B 100%)',
            textColor: '#5c1a1a',
            badgeBg: 'rgba(255,255,255,0.5)',
            roleBg: 'rgba(255,255,255,0.6)',
            decorColor: 'rgba(255,255,255,0.45)'
        };
    } else {
        // Malam — gelap
        config = {
            label: 'Malam',
            sapaan: 'Selamat Malam',
            emoji: '🌙',
            bg: 'linear-gradient(135deg, #2b2d42 0%, #1a1c2e 55%, #0d0e1a 100%)',
            textColor: '#f1f1f6',
            badgeBg: 'rgba(255,255,255,0.12)',
            roleBg: 'rgba(255,255,255,0.15)',
            decorColor: 'rgba(255,255,255,0.08)'
        };
    }

    banner.style.background = config.bg;
    banner.style.color = config.textColor;

    badge.textContent = config.label;
    badge.style.background = config.badgeBg;
    badge.style.color = config.textColor;

    greeting.innerHTML = config.sapaan + ', {{ explode(" ", auth()->user()->name)[0] }} <span>' + config.emoji + '</span>';

    roleBadge.style.background = config.roleBg;
    roleBadge.style.color = config.textColor;

    // Dekorasi titik-titik bulat transparan, kesan awan/bintang sederhana
    var dots = '';
    for (var i = 0; i < 5; i++) {
        var size = 40 + Math.random() * 60;
        var top = Math.random() * 100;
        var left = 60 + Math.random() * 40;
        dots += '<div style="position:absolute; top:' + top + '%; left:' + left + '%; width:' + size + 'px; height:' + size + 'px; border-radius:50%; background:' + config.decorColor + ';"></div>';
    }
    decor.innerHTML = dots;
})();
</script>
@endsection