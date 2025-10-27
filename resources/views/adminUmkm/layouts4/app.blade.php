<!DOCTYPE html>
<html lang="id">

<head>
    @include('layouts.css')
    <title>@yield('title', 'Data UMKM')</title>
</head>

<body>
    <!-- Header/Navbar -->
    @include('layouts.header')

    <div class="d-flex">
        <!-- Sidebar (opsional) -->
        @include('layouts.sidebar')

        <!-- Konten utama -->
        <main class="flex-fill p-4">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- JS -->
    @include('layouts.js')
</body>

</html>
