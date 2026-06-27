<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistem Plotting Asesor">
    <meta name="author" content="">
    
    <title>@yield('title', 'Sistem Plotting Asesor')</title>
    
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/favicon.png') }}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/css/vendors.min.css') }}">
    @stack('vendor-styles')
    
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/theme.min.css') }}">
    
    @stack('styles')
</head>

<body>
    <!-- Navigation -->
    @include('layouts.partials.sidebar')
    
    <!-- Header -->
    @include('layouts.partials.header')
    
    <!-- Main Content -->
    <main class="nxl-container">
        <div class="nxl-content">
            @yield('content')
        </div>
        
        <!-- Footer -->
        @include('layouts.partials.footer')
    </main>
    
    <!-- jQuery -->
    <script src="{{ asset('assets/vendors/js/jquery.min.js') }}"></script>
    
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/vendors/js/bootstrap.min.js') }}"></script>
    
    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendors/js/vendors.min.js') }}"></script>
    @stack('vendor-scripts')
    
    <!-- Theme JS -->
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
    
    @stack('scripts')
</body>
</html>
