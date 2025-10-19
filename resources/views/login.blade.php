<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Marketplace UMKM - Elegan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"> <!-- Font elegan: Inter untuk kesan modern dan clean -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef); /* Gradien netral abu-putih untuk elegan */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }
        /* Efek subtle: Garis halus sebagai aksen */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent 49%, rgba(0, 0, 0, 0.05) 50%, transparent 51%);
            background-size: 20px 20px;
            opacity: 0.3;
        }
        .login-container {
            position: relative;
            z-index: 1;
            width: 400px;
            max-width: 90%;
        }
        .login-box {
            background: rgba(255, 255, 255, 0.95); /* Putih transparan untuk kesan bersih */
            backdrop-filter: blur(10px);
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); /* Shadow halus */
            animation: fadeInUp 1s ease-out; /* Animasi subtle fade-in */
            text-align: center;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-box h2 {
            color: #343a40; /* Abu gelap untuk elegan */
            margin-bottom: 20px;
            font-size: 2rem;
            font-weight: 600;
            letter-spacing: 1px; /* Spacing halus */
        }
        .promo-text {
            color: #6c757d; /* Abu sedang */
            font-size: 14px;
            margin-bottom: 30px;
            font-weight: 400;
            line-height: 1.5;
        }
        .form-group {
            position: relative;
            margin-bottom: 20px;
        }
        .form-control {
            width: 100%;
            padding: 12px 45px 12px 45px;
            border-radius: 10px;
            border: 1px solid #dee2e6;
            background: #ffffff;
            color: #495057;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .form-control::placeholder {
            color: #adb5bd;
        }
        .form-control:focus {
            border-color: #d4af37; /* Aksen emas halus */
            box-shadow: 0 0 8px rgba(212, 175, 55, 0.2);
            outline: none;
        }
        .form-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #adb5bd;
            font-size: 18px;
        }
        .btn {
            background: linear-gradient(135deg, #d4af37, #f4e87c); /* Gradien emas halus */
            color: #343a40;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(212, 175, 55, 0.2);
        }
        .btn:hover {
            transform: translateY(-2px); /* Lift halus */
            box-shadow: 0 6px 15px rgba(212, 175, 55, 0.3);
        }
        .alert {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-weight: 400;
            font-size: 14px;
        }
        .alert-success {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .footer-text {
            margin-top: 20px;
            color: #6c757d;
            font-size: 13px;
            line-height: 1.4;
        }
        .footer-text a {
            color: #d4af37;
            text-decoration: none;
            font-weight: 500;
        }
        .footer-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <h2><i class="fas fa-store"></i> Login Marketplace UMKM</h2>
            <p class="promo-text">Temukan dan jual produk UMKM dengan elegan dan mudah.</p>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-triangle"></i> {{ $errors->first() }}
                </div>
            @endif

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

            <div class="footer-text">
                <p>Belum punya akun? <a href="#">Daftar di sini</a></p>
                <p>&copy; 2023 Marketplace UMKM - Elegan & Berkualitas</p>
            </div>
        </div>
    </div>
</body>
</html>

