<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            max-width: 500px;
            margin-top: 50px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: none;
        }
        .card-body {
            padding: 2rem;
        }
        .logo {
            margin-bottom: 1.5rem;
        }
        .btn-success {
            background-color: #198754;
            border-color: #198754;
            padding: 10px;
            font-weight: 500;
        }
        .form-control {
            border-radius: 5px;
            padding: 10px;
        }
        .form-control:focus {
            border-color: #198754;
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
        }
        .alert {
            border-radius: 5px;
        }
        .password-feedback {
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="text-center mb-4">
                    <div class="logo">
                        <img src="{{ asset('assets-admin/img/logo.png') }}" alt="Logo" width="120">
                    </div>
                    <h4 class="mt-3 fw-bold">Form Registrasi</h4>
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
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" maxlength="300" required>{{ old('alamat') }}</textarea>
                        <div class="form-text">Maksimal 300 karakter</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required value="{{ old('tanggal_lahir') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required value="{{ old('username') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        <div class="password-feedback text-muted" id="passwordFeedback">
                            Password harus minimal 8 karakter
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="confirm_password" id="confirmPassword" class="form-control" required>
                        <div class="password-feedback text-muted" id="confirmFeedback">
                            Harus sama dengan password di atas
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100 mt-3">Daftar</button>
                </form>

                <hr class="my-4">
                <div class="text-center">
                    <a href="{{ route('login.page') }}">Sudah punya akun? <strong>Login</strong></a>
                </div>
            </div>
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
