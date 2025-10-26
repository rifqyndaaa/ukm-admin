<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Umkm - Login & Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {margin: 0; padding: 0; box-sizing: border-box;}
        body {
            font-family: 'Inter', sans-serif;
            background: url('https://images.unsplash.com/photo-1615485737504-9851b168f5da?auto=format&fit=crop&w=1600&q=80') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 60, 0, 0.4);
            backdrop-filter: blur(3px);
        }

        /* Container utama */
        .container {
            position: relative;
            z-index: 2;
            width: 400px;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            padding: 2rem 2.5rem;
            overflow: hidden;
            text-align: center;
            transition: all 0.6s ease;
            animation: fadeIn 1s ease-out;
        }

        @keyframes fadeIn {
            from {opacity: 0; transform: translateY(20px);}
            to {opacity: 1; transform: translateY(0);}
        }

        h2 {
            font-family: 'Playfair Display', serif;
            color: #2f5d3e;
            font-size: 2rem;
            margin-bottom: 10px;
        }
        p.subtitle {
            color: #4e7c5e;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #8ba989;
        }
        .form-control {
            width: 100%;
            padding: 12px 45px;
            border-radius: 10px;
            border: 1px solid #b8d0b6;
            background: #f9fff8;
            color: #2f5d3e;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #4e7c5e;
            box-shadow: 0 0 8px rgba(78,124,94,0.3);
            outline: none;
        }

        .btn {
            background: linear-gradient(135deg, #5fa85b, #7bc97b);
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .btn:hover {
            background: linear-gradient(135deg, #4b9150, #6fb86f);
            transform: translateY(-2px);
        }

        .toggle-text {
            margin-top: 20px;
            font-size: 13px;
            color: #4e7c5e;
        }
        .toggle-text a {
            color: #2f5d3e;
            text-decoration: none;
            font-weight: 600;
        }
        .toggle-text a:hover { text-decoration: underline; }

        .alert {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 8px;
            font-size: 14px;
        }
        .alert-success {background: #d4edda; color: #155724;}
        .alert-error {background: #f8d7da; color: #721c24;}

        /* Transisi antar form */
        .form-box {
            display: none;
        }
        .form-box.active {
            display: block;
            animation: slideIn 0.6s ease;
        }
        @keyframes slideIn {
            from {opacity: 0; transform: translateY(15px);}
            to {opacity: 1; transform: translateY(0);}
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-leaf"></i> UMKM</h2>
        <p class="subtitle">Organic & Quality  </p>

        {{-- Pesan sukses / error --}}
        @if(session('success'))
            <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-error"><i class="fas fa-exclamation-triangle"></i> {{ session('error') }}</div>
        @endif

        {{-- 🔹 Form Login --}}
        <div id="loginForm" class="form-box active">
            <form method="POST" action="{{ route('login.post') }}">
                @csrf
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" class="form-control" placeholder="Email Anda" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password Anda" required>
                </div>
                <button type="submit" class="btn"><i class="fas fa-sign-in-alt"></i> Masuk</button>
            </form>
            <p class="toggle-text">Belum punya akun? <a href="#" onclick="toggleForm()">Daftar Sekarang</a></p>
        </div>

        {{-- 🔹 Form Sign Up --}}
        <div id="registerForm" class="form-box">
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" class="form-control" placeholder="Email Anda" required>
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" class="form-control" placeholder="Password (min. 3 huruf kapital)" required>
                </div>
                <button type="submit" class="btn"><i class="fas fa-user-plus"></i> Daftar</button>
            </form>
            <p class="toggle-text">Sudah punya akun? <a href="#" onclick="toggleForm()">Masuk Sekarang</a></p>
        </div>
    </div>

    <script>
        function toggleForm() {
            const login = document.getElementById('loginForm');
            const register = document.getElementById('registerForm');
            login.classList.toggle('active');
            register.classList.toggle('active');
        }
    </script>
</body>
</html>
