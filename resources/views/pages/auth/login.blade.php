<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .split-layout {
            min-height: 100vh;
        }
        .logo-side {
            position: relative;
            overflow: hidden;
            padding: 0;
        }
        .background-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: absolute;
            top: 0;
            left: 0;
        }
        .logo-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2;
        }
        .logo-container {
            text-align: center;
            padding: 20px;
            z-index: 3;
        }
        @media (max-width: 992px) {
            .split-layout {
                flex-direction: column;
            }
            .logo-side {
                height: 300px;
                min-height: 300px;
            }
            .form-side {
                border-left: none;
                border-top: 1px solid #dee2e6;
            }
        }
        @media (min-width: 992px) {
            .logo-side {
                height: auto;
            }
        }
    </style>
</head>
<body class="bg-light">

<div class="container-fluid p-0">
    <div class="row g-0 split-layout">

        <!-- Bagian Samping dengan Background dan Logo -->
        <div class="col-lg-6 logo-side">
            <!-- Background Image -->
            <img class="background-image"
                 src="asset/img/about-5.JPEG"
                 alt="Hidangan Tradisional">

            <!-- Overlay untuk Logo -->
            <div class="logo-overlay">
                <div class="logo-container">
                    <!-- Logo yang sudah diupload -->
                    <div class="mb-4">
                        <img class="img-fluid" src="{{ asset('asset/img/logo.jpg') }}" alt="Logo" style="height: 90px; width: auto; background: white; padding: 15px; border-radius: 10px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);">
                    </div>

                    <!-- Judul di Samping Logo -->
                    <div class="text-white">
                        <h2 class="h3 fw-bold mb-2">Selamat Datang</h2>
                        <p class="mb-0">Website Lapak dan Umkm</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bagian Form Login -->
        <div class="col-lg-6 form-side d-flex align-items-center justify-content-center p-4 p-lg-5">
            <div class="w-100" style="max-width: 450px;">
                <!-- Header -->
                <div class="text-center mb-4">
                    <h1 class="h3 mb-2 fw-bold">Masuk ke Akun</h1>
                    <p class="text-muted">Silakan masuk dengan kredensial Anda</p>
                </div>

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login.process') }}" method="POST" class="mt-4">
                    @csrf

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label fw-medium">Alamat Email</label>
                        <input type="email"
                               id="email"
                               name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="nama@perusahaan.com"
                               value="{{ old('email') }}"
                               required
                               autofocus>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label fw-medium">Kata Sandi</label>
                        <input type="password"
                               id="password"
                               name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Masukkan kata sandi"
                               required>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Ingat saya
                            </label>
                        </div>
                        <a href="#" class="text-decoration-none text-dark">Lupa kata sandi?</a>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-dark btn-lg py-3 fw-medium">Masuk</button>
                    </div>
                </form>

                <!-- Register Link -->
                <div class="text-center">
                    <span class="fw-normal">
                        Belum punya akun?
                        <a href="{{ route('register.form') }}" class="fw-bold text-decoration-none">Daftar di sini</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
