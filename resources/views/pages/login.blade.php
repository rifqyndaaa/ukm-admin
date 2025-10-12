<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - UMKM Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* 🌾 ======== THEME UMKM REGISTER PAGE ======== 🌾 */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffffff, #ffffff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* ======== WRAPPER ======== */
        .register-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
            max-width: 1100px;
            width: 100%;
        }

        /* ======== CARD REGISTER ======== */
        .auth-container {
            background-color: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 480px;
            transition: 0.3s ease;
            text-align: center;
        }

        .auth-container:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .text-center img {
            border-radius: 50%;
            background: #fff3e0;
            padding: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        h4 {
            color: #2e7d32;
            font-weight: 600;
            margin-top: 15px;
        }

        p {
            color: #555;
            font-size: 14px;
            margin-bottom: 25px;
        }

        /* ======== INPUT ======== */
        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            padding: 12px;
            font-size: 15px;
            transition: 0.2s ease;
        }

        .form-control:focus {
            border-color: #43a047;
            box-shadow: 0 0 5px rgba(67, 160, 71, 0.4);
            outline: none;
        }

        /* ======== BUTTON ======== */
        .btn-success {
            background-color: #43a047;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: 0.2s ease;
            width: 100%;
        }

        .btn-success:hover {
            background-color: #2e7d32;
        }

        /* ======== HR DAN LINK ======== */
        hr {
            margin: 20px 0;
            border: 0;
            border-top: 2px dashed #eee;
        }

        a {
            text-decoration: none;
            color: #00f535;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        a:hover {
            color: #00ef48;
        }

        /* ======== ALERT ======== */
        .alert-success {
            background-color: #c8e6c9;
            color: #256029;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .alert-danger {
            background-color: #ffcdd2;
            color: #b71c1c;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .alert-danger ul {
            margin-bottom: 0;
            padding-left: 20px;
        }

        /* ======== ILUSTRASI ======== */
        .illustration {
            flex: 1;
            min-width: 300px;
            max-width: 500px;
            text-align: center;
        }

        .illustration img {
            width: 100%;
            max-width: 380px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        /* ======== FORM STYLING ======== */
        .form-label {
            font-weight: 500;
            color: #444;
            margin-bottom: 8px;
            display: block;
        }

        .form-text {
            font-size: 12px;
            color: #777;
            margin-top: 5px;
        }

        .password-feedback {
            font-size: 12px;
            margin-top: 5px;
        }

        /* ======== RESPONSIVE ======== */
        @media (max-width: 768px) {
            .register-wrapper {
                flex-direction: column-reverse;
            }
            .illustration img {
                max-width: 300px;
            }
            .auth-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="register-wrapper">
        <!-- 🧾 FORM REGISTER -->
        <div class="auth-container">
            <div class="text-center mb-4">
                <img src="{{ asset('assets-admin/img/logo.png') }}" alt="Logo" width="90">
                <h4 class="mt-3 fw-bold">Registrasi UMKM</h4>
                <p>Bergabunglah dengan komunitas UMKM kami! 🛍️</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('auth.register') }}" method="POST" id="registrationForm">
                @csrf
                <div class="mb-3 text-start">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" maxlength="300" required>{{ old('alamat') }}</textarea>
                    <div class="form-text">Maksimal 300 karakter</div>
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required value="{{ old('tanggal_lahir') }}">
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <div class="password-feedback text-muted" id="passwordFeedback">
                        Password harus minimal 8 karakter
                    </div>
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="confirm_password" id="confirmPassword" class="form-control" required>
                    <div class="password-feedback text-muted" id="confirmFeedback">
                        Harus sama dengan password di atas
                    </div>
                </div>

                <button type="submit" class="btn btn-success mt-3">Daftar</button>
            </form>

            <hr>

            <div class="text-center">
                <a href="{{ route('login.page') }}">
                    Sudah punya akun? <strong>Login</strong>
                </a>
            </div>
        </div>

        <!-- 🎨 ILUSTRASI UMKM -->
        <div class="illustration">
            <img src="{{ asset('assets-admin/img/umkm-register.png') }}" alt="Ilustrasi Registrasi UMKM">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirmPassword');
            const passwordFeedback = document.getElementById('passwordFeedback');
            const confirmFeedback = document.getElementById('confirmFeedback');
            const form = document.getElementById('registrationForm');

            // Validasi panjang password
            password.addEventListener('input', function() {
                if (password.value.length < 8) {
                    passwordFeedback.textContent = 'Password harus minimal 8 karakter';
                    passwordFeedback.className = 'password-feedback text-danger';
                } else {
                    passwordFeedback.textContent = 'Password memenuhi syarat';
                    passwordFeedback.className = 'password-feedback text-success';
                }
                validatePasswordMatch();
            });

            // Validasi konfirmasi password
            confirmPassword.addEventListener('input', validatePasswordMatch);

            function validatePasswordMatch() {
                if (confirmPassword.value !== '') {
                    if (password.value !== confirmPassword.value) {
                        confirmFeedback.textContent = 'Password tidak cocok';
                        confirmFeedback.className = 'password-feedback text-danger';
                        confirmPassword.setCustomValidity('Password tidak cocok');
                    } else {
                        confirmFeedback.textContent = 'Password cocok';
                        confirmFeedback.className = 'password-feedback text-success';
                        confirmPassword.setCustomValidity('');
                    }
                }
            }

            // Validasi sebelum submit
            form.addEventListener('submit', function(e) {
                if (password.value !== confirmPassword.value) {
                    e.preventDefault();
                    alert('Password dan Konfirmasi Password tidak cocok!');
                    confirmPassword.focus();
                }
            });
        });
    </script>
</body>
</html>
