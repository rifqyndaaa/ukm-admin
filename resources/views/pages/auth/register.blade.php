<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Premium | Luxuria</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #7B4FCF;
            --primary-dark: #5A30A8;
            --accent: #E94B7C;
            --gold: #D4AF37;
            --light: #F8F7FF;
            --dark: #1A1A2E;
            --gray: #6C757D;
            --success: #28A745;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0F0F1B 0%, #1A1A2E 100%);
            color: var(--light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 80%, rgba(123, 79, 207, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(233, 75, 124, 0.08) 0%, transparent 50%);
            z-index: -1;
        }

        .container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            background: rgba(15, 15, 25, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .brand-section {
            flex: 1;
            background: linear-gradient(135deg, rgba(123, 79, 207, 0.2) 0%, rgba(233, 75, 124, 0.2) 100%);
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .brand-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100" height="100" opacity="0.03"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1.5" fill="white"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--gold);
            position: relative;
            z-index: 1;
        }

        .logo-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 35px;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .brand-tagline {
            font-size: 1rem;
            line-height: 1.6;
            max-width: 400px;
            margin-bottom: 35px;
            color: rgba(255, 255, 255, 0.8);
            position: relative;
            z-index: 1;
        }

        .features {
            text-align: left;
            width: 100%;
            max-width: 380px;
            position: relative;
            z-index: 1;
        }

        .feature {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 12px 18px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .feature:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(5px);
        }

        .feature i {
            font-size: 1.2rem;
            margin-right: 15px;
            color: var(--gold);
            width: 25px;
            text-align: center;
        }

        .feature-text {
            font-size: 0.95rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .form-section {
            flex: 1.2;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            margin-bottom: 35px;
            text-align: center;
        }

        .form-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: white;
        }

        .form-subtitle {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
        }

        .input-with-icon {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            background: rgba(255, 255, 255, 0.07);
            border: 1.5px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 2px rgba(123, 79, 207, 0.2);
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .form-input:focus + .input-icon {
            color: var(--primary);
        }

        .password-toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .password-strength {
            margin-top: 10px;
        }

        .strength-bar {
            height: 5px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 6px;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            border-radius: 3px;
            transition: all 0.4s ease;
        }

        .strength-text {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .terms {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .terms-checkbox {
            margin-right: 12px;
            margin-top: 4px;
            accent-color: var(--primary);
            transform: scale(1.1);
        }

        .terms-text {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.5;
        }

        .terms-text a {
            color: var(--gold);
            text-decoration: none;
            transition: color 0.3s ease;
            font-weight: 500;
        }

        .terms-text a:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.5px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(123, 79, 207, 0.3);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
        }

        .divider-text {
            padding: 0 15px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .social-login {
            display: flex;
            gap: 12px;
            margin-bottom: 25px;
        }

        .social-btn {
            flex: 1;
            padding: 14px;
            border: 1.5px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.05);
            color: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .social-btn i {
            margin-right: 8px;
            font-size: 1.1rem;
        }

        .social-btn:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.15);
        }

        .login-link {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
        }

        .login-link a {
            color: var(--gold);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: var(--accent);
            text-decoration: underline;
        }

        @media (max-width: 1000px) {
            .container {
                flex-direction: column;
            }

            .brand-section {
                padding: 35px 25px;
            }

            .form-section {
                padding: 35px 25px;
            }
        }

        .notification {
            position: fixed;
            top: 25px;
            right: 25px;
            padding: 16px 22px;
            background: rgba(15, 15, 25, 0.95);
            border-left: 4px solid var(--success);
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            color: white;
            font-size: 0.95rem;
            transform: translateX(150%);
            transition: transform 0.4s ease;
            z-index: 1000;
            display: flex;
            align-items: center;
            max-width: 350px;
        }

        .notification.show {
            transform: translateX(0);
        }

        .notification-icon {
            margin-right: 12px;
            font-size: 1.2rem;
            color: var(--success);
        }
    </style>
</head>
<body>
    <!-- Notification -->
    <div class="notification" id="notification">
        <i class="fas fa-check-circle notification-icon"></i>
        <div>Registrasi berhasil! Selamat datang di komunitas eksklusif Luxuria.</div>
    </div>

    <div class="container">
        <div class="brand-section">
            <div class="logo">Luxuria</div>
            <div class="logo-subtitle">Pengalaman Premium Tak Tertandingi</div>
            <p class="brand-tagline">Bergabunglah dengan komunitas eksklusif kami dan nikmati akses ke konten, fitur, dan pengalaman premium yang dirancang khusus untuk Anda.</p>

            <div class="features">
                <div class="feature">
                    <i class="fas fa-gem"></i>
                    <div class="feature-text">Akses ke konten dan fitur eksklusif</div>
                </div>
                <div class="feature">
                    <i class="fas fa-rocket"></i>
                    <div class="feature-text">Pengalaman pengguna yang dipersonalisasi</div>
                </div>
                <div class="feature">
                    <i class="fas fa-shield-alt"></i>
                    <div class="feature-text">Keamanan data tingkat enterprise</div>
                </div>
                <div class="feature">
                    <i class="fas fa-headset"></i>
                    <div class="feature-text">Dukungan pelanggan prioritas 24/7</div>
                </div>
                <div class="feature">
                    <i class="fas fa-star"></i>
                    <div class="feature-text">Event dan penawaran khusus member</div>
                </div>
            </div>
        </div>

        <div class="form-section">
            <div class="form-header">
                <h1 class="form-title">Buat Akun Baru</h1>
                <p class="form-subtitle">Mulai perjalanan eksklusif Anda dalam beberapa langkah mudah</p>
            </div>

            <form id="registerForm">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" class="form-input" placeholder="Masukkan nama lengkap Anda" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Alamat Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" class="form-input" placeholder="nama@email.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Kata Sandi</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" class="form-input" id="password" placeholder="Buat kata sandi yang kuat" required>
                        <button type="button" class="password-toggle" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength">
                        <div class="strength-bar">
                            <div class="strength-fill" id="strengthFill"></div>
                        </div>
                        <div class="strength-text" id="strengthText">Kekuatan kata sandi</div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Konfirmasi Kata Sandi</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" class="form-input" placeholder="Konfirmasi kata sandi Anda" required>
                    </div>
                </div>

                <div class="terms">
                    <input type="checkbox" class="terms-checkbox" id="terms" required>
                    <label for="terms" class="terms-text">
                        Saya setuju dengan <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a> Luxuria. Saya memahami bahwa data saya akan diproses sesuai dengan kebijakan privasi.
                    </label>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </button>
            </form>

            <div class="divider">
                <div class="divider-line"></div>
                <div class="divider-text">ATAU</div>
                <div class="divider-line"></div>
            </div>

            <div class="social-login">
                <button class="social-btn">
                    <i class="fab fa-google"></i> Google
                </button>
                <button class="social-btn">
                    <i class="fab fa-apple"></i> Apple
                </button>
                <button class="social-btn">
                    <i class="fab fa-facebook-f"></i> Facebook
                </button>
            </div>

            <div class="login-link">
                Sudah punya akun? <a href="#">Masuk di sini</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePassword = document.getElementById('togglePassword');
            const strengthFill = document.getElementById('strengthFill');
            const strengthText = document.getElementById('strengthText');
            const registerForm = document.getElementById('registerForm');
            const notification = document.getElementById('notification');

            // Toggle password visibility
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });

            // Password strength indicator
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;

                // Check password length
                if (password.length >= 8) strength += 25;
                if (password.length >= 12) strength += 15;

                // Check for character variety
                if (/[A-Z]/.test(password)) strength += 20;
                if (/[0-9]/.test(password)) strength += 20;
                if (/[^A-Za-z0-9]/.test(password)) strength += 20;

                // Update strength bar and text
                strengthFill.style.width = `${strength}%`;

                if (strength < 40) {
                    strengthFill.style.background = '#ef4444';
                    strengthText.textContent = 'Kata sandi lemah';
                } else if (strength < 70) {
                    strengthFill.style.background = '#f59e0b';
                    strengthText.textContent = 'Kata sandi cukup';
                } else {
                    strengthFill.style.background = '#10b981';
                    strengthText.textContent = 'Kata sandi kuat';
                }
            });

            // Form submission
            registerForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Show notification
                notification.classList.add('show');

                // Hide notification after 5 seconds
                setTimeout(() => {
                    notification.classList.remove('show');
                }, 5000);

                // Reset form
                setTimeout(() => {
                    registerForm.reset();
                    strengthFill.style.width = '0%';
                    strengthText.textContent = 'Kekuatan kata sandi';
                }, 1000);
            });
        });
    </script>
</body>
</html>
