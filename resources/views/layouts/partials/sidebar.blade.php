<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('home') }}" class="b-brand">
                <img src="{{ asset('assets/logo.webp') }}" alt="Logo" class="logo logo-lg" style="max-height: 50px;">
                <img src="{{ asset('assets/favicon.png') }}" alt="Logo" class="logo logo-sm" style="max-height: 40px;">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>

                <!-- Dashboard -->
                <li class="nxl-item">
                    <a href="{{ route('home') }}" class="nxl-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <span class="nxl-micon"><i class="feather-home"></i></span>
                        <span class="nxl-mtext">Dashboard</span>
                    </a>
                </li>

                <!-- Data Asesor -->
                <li class="nxl-item">
                    <a href="{{ route('asesor.index') }}" class="nxl-link {{ request()->routeIs('asesor.*') ? 'active' : '' }}">
                        <span class="nxl-micon"><i class="feather-user-check"></i></span>
                        <span class="nxl-mtext">Data Asesor</span>
                    </a>
                </li>

                <!-- Data TUK -->
                <li class="nxl-item">
                    <a href="{{ route('tuk.index') }}" class="nxl-link {{ request()->routeIs('tuk.*') ? 'active' : '' }}">
                        <span class="nxl-micon"><i class="feather-map-pin"></i></span>
                        <span class="nxl-mtext">Data TUK</span>
                    </a>
                </li>

                <!-- Plotting -->
                <li class="nxl-item">
                    <a href="{{ route('plotting.index') }}" class="nxl-link {{ request()->routeIs('plotting.*') ? 'active' : '' }}">
                        <span class="nxl-micon"><i class="feather-git-merge"></i></span>
                        <span class="nxl-mtext">Plotting</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
