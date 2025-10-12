<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Auth Page' }}</title>

    {{-- CSS Volt --}}
    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">

    {{-- Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .auth-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <main class="d-flex align-items-center justify-content-center vh-100">
        <div class="auth-card w-100" style="max-width: 420px;">
            @yield('content')
        </div>
    </main>

    {{-- JS Volt --}}
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>
</html>
