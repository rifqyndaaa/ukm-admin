<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('assets-admin/css/volt.css') }}">
</head>
<body>
    <div class="container py-5">
        <h2>Dashboard Admin</h2>

        @if(Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <p>Selamat datang di halaman Dashboard! 🎉</p>
    </div>
</body>
</html>
