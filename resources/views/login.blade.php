<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login UMKM</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffb347, #ffcc33);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            width: 350px;
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        .btn {
            background: #ffb347;
            color: white;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn:hover {
            background: #ffaa00;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>

        @if(session('success'))
            <p style="color:green;">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <p style="color:red;">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="{{ route('login.post')}}">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
        </form>

