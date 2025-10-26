<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - UMKM')</title>

    <!-- CSS -->
    @include('layouts.admin.css')

    <!-- Custom CSS untuk halaman tertentu -->
    @stack('styles')
</head>
<body>
    <!-- Header / Navbar -->
    @include('layouts.admin.header')

    <div class="d-flex">
        <!-- Sidebar (jika ada) -->
        @include('layouts.admin.sidebar')

        <!-- Konten Utama -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    @include('layouts.admin.footer')

    <!-- JavaScript -->
    @include('layouts.admin.js')

    <!-- Custom JS untuk halaman tertentu -->
    @stack('scripts')
</body>
</html>
