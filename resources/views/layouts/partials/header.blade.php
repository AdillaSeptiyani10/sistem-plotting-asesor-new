<header class="nxl-header">
    <div class="header-wrapper">
        <!-- Header Left -->
        <div class="header-left d-flex align-items-center gap-4">
            <!-- Mobile Toggler -->
            <a href="javascript:void(0);" class="nxl-head-mobile-toggler" id="mobile-collapse">
                <div class="hamburger hamburger--arrowturn">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </a>

            <!-- Navigation Toggle -->
            <div class="nxl-navigation-toggle">
                <a href="javascript:void(0);" id="menu-mini-button">
                    <i class="feather-align-left"></i>
                </a>
                <a href="javascript:void(0);" id="menu-expend-button" style="display: none">
                    <i class="feather-arrow-right"></i>
                </a>
            </div>
        </div>

        <!-- Header Right -->
        <div class="header-right ms-auto">
            <div class="d-flex align-items-center">
                <div class="dropdown nxl-h-item">
                    <a class="nxl-head-link me-3" data-bs-toggle="dropdown" href="#" role="button" data-bs-auto-close="outside">
                        <i class="feather-bell"></i>
                        <span class="badge bg-danger nxl-h-badge">3</span>
                    </a>
                </div>

                {{-- User Dropdown — JS murni, tidak bergantung Bootstrap --}}
                <div class="nxl-h-item" style="position:relative;">
                    <a href="javascript:void(0);"
                       id="userDropdownToggle"
                       style="display:inline-flex; align-items:center; justify-content:center; width:40px; height:40px; border-radius:50%; overflow:hidden; background:#e9ecef; cursor:pointer;">
                        <img src="{{ auth()->user()->photo_url }}" alt="user-image" style="width:100%; height:100%; object-fit:cover;">
                    </a>

                    <div id="userDropdownMenu"
                         style="display:none; position:absolute; right:0; top:48px; min-width:240px; background:#fff; border:1px solid rgba(0,0,0,0.08); border-radius:8px; box-shadow:0 8px 24px rgba(0,0,0,0.12); z-index:1050; overflow:hidden;">

                        <div style="padding:16px;">
                            <div class="d-flex align-items-center">
                                <img src="{{ auth()->user()->photo_url }}" alt="user-image" style="width:42px; height:42px; border-radius:50%; object-fit:cover; margin-right:10px;">
                                <div>
                                    <h6 class="text-dark mb-0">{{ auth()->user()->name }}</h6>
                                    <span class="fs-12 fw-medium text-muted">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div style="border-top:1px solid rgba(0,0,0,0.08);"></div>

                        <a href="{{ route('profile.index') }}" style="display:flex; align-items:center; gap:10px; padding:10px 16px; color:#1a1a2e; text-decoration:none; font-size:14px;" onmouseover="this.style.background='#f5f5f7'" onmouseout="this.style.background='transparent'">
                            <i class="feather-user"></i>
                            <span>Profile</span>
                        </a>

                        <div style="border-top:1px solid rgba(0,0,0,0.08);"></div>

                        <a href="javascript:void(0);" style="display:flex; align-items:center; gap:10px; padding:10px 16px; color:#1a1a2e; text-decoration:none; font-size:14px;" onmouseover="this.style.background='#f5f5f7'" onmouseout="this.style.background='transparent'" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="feather-log-out"></i>
                            <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    (function () {
        var toggle = document.getElementById('userDropdownToggle');
        var menu   = document.getElementById('userDropdownMenu');

        if (toggle && menu) {
            toggle.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
            });

            document.addEventListener('click', function (e) {
                if (!toggle.contains(e.target) && !menu.contains(e.target)) {
                    menu.style.display = 'none';
                }
            });
        }
    })();
</script>
