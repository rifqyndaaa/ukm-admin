<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House - Data Warga</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('asset/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('asset/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">

    <style>
        :root {
            --primary-color: #11bd28;
            --primary-dark: #224abe;
            --secondary-color: #001cee;
            --success-color: #1cc88a;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
            --light-bg: #f8f9fc;
        }

        .form-container {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fc 100%);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .form-header:after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border-radius: 2px;
        }

        .form-title {
            color: #2e3a59;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: var(--secondary-color);
            font-size: 1.1rem;
        }

        .form-card {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e3e6f0;
            margin-bottom: 2rem;
        }

        .form-section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #e3e6f0;
            display: flex;
            align-items: center;
        }

        .form-section-title i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .form-label {
            font-weight: 600;
            color: #5a5c69;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
        }

        .form-label i {
            margin-right: 8px;
            color: var(--primary-color);
            width: 20px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #e3e6f0;
            transition: all 0.3s;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.3rem rgba(78, 115, 223, 0.15);
        }

        .input-group-text {
            background-color: var(--light-bg);
            border: 2px solid #e3e6f0;
            border-right: none;
            border-radius: 10px 0 0 10px;
        }

        .form-control.with-icon {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            border: none;
            padding: 14px 35px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(78, 115, 223, 0.3);
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(78, 115, 223, 0.4);
        }

        .btn-back {
            background-color: white;
            border: 2px solid #e3e6f0;
            color: #5a5c69;
            padding: 14px 35px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .btn-back:hover {
            background-color: #f8f9fc;
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .alert-custom {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 1.25rem 1.5rem;
        }

        .alert-success {
            background: linear-gradient(135deg, #1cc88a, #17a673);
            color: white;
        }

        .alert-danger {
            background: linear-gradient(135deg, #e74a3b, #be2617);
            color: white;
        }

        .error-message {
            font-size: 0.875rem;
            margin-top: 8px;
            display: flex;
            align-items: center;
        }

        .error-message i {
            margin-right: 5px;
        }

        .progress-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 3rem;
            position: relative;
        }

        .progress-indicator:before {
            content: '';
            position: absolute;
            top: 15px;
            left: 0;
            right: 0;
            height: 3px;
            background: #e3e6f0;
            z-index: 1;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .step-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: white;
            border: 3px solid #e3e6f0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 8px;
            font-weight: bold;
            color: var(--secondary-color);
            transition: all 0.3s;
        }

        .progress-step.active .step-icon {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .step-label {
            font-size: 0.85rem;
            color: var(--secondary-color);
            font-weight: 600;
        }

        .progress-step.active .step-label {
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 2rem 1.5rem;
            }

            .form-card {
                padding: 1.5rem;
            }

            .btn-submit, .btn-back {
                width: 100%;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="index.html" class="navbar-brand">
                    <!-- Logo here -->
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('umkm.index') }}" class="nav-item nav-link">Data UMKM</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('product') }}" class="nav-item nav-link">Products</a>
                        <a href="{{ route('store') }}" class="nav-item nav-link">Store</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                                <a href="datamasyarakat" class="dropdown-item">Data Masyarakat</a>
                                <a href="b" class="dropdown-item">Data User</a>
                            </div>
                        </div>
                        <a href="{{ route('create') }}" class="nav-item nav-link active">Create</a>
                    </div>
                    <div class="border-start ps-4 d-none d-lg-block">
                        <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Form Section Start -->
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-container">
                    <!-- Progress Indicator -->
                    <div class="progress-indicator">
                        <div class="progress-step active">
                            <div class="step-icon">1</div>
                            <span class="step-label">Data Pribadi</span>
                        </div>
                        <div class="progress-step">
                            <div class="step-icon">2</div>
                            <span class="step-label">Data Kontak</span>
                        </div>
                        <div class="progress-step">
                            <div class="step-icon">3</div>
                            <span class="step-label">Konfirmasi</span>
                        </div>
                    </div>

                    <!-- Form Header -->
                    <div class="form-header">
                        <h1 class="form-title">Tambah Data Warga</h1>
                        <p class="form-subtitle">Lengkapi formulir di bawah untuk menambahkan data warga baru</p>
                    </div>

                    <!-- Alert Messages -->
                    @if (session('success'))
                        <div class="alert alert-success alert-custom mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle fa-2x me-3"></i>
                                <div>
                                    <h5 class="mb-1">Berhasil!</h5>
                                    <p class="mb-0">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-custom mb-4">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-triangle fa-2x me-3"></i>
                                <div>
                                    <h5 class="mb-1">Terjadi Kesalahan!</h5>
                                    <ul class="mb-0 ps-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('datamasyarakat.store') }}" method="POST">
                        @csrf

                        <!-- Data Pribadi Card -->
                        <div class="form-card">
                            <h4 class="form-section-title">
                                <i class="fas fa-user-circle"></i>Data Pribadi
                            </h4>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="no_ktp" class="form-label">
                                        <i class="fas fa-id-card"></i>No KTP
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-id-card text-muted"></i></span>
                                        <input type="text" name="no_ktp" id="no_ktp" class="form-control with-icon"
                                               value="{{ old('no_ktp') }}" required maxlength="20" placeholder="Masukkan nomor KTP">
                                    </div>
                                    @error('no_ktp')
                                        <small class="text-danger error-message">
                                            <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="nama" class="form-label">
                                        <i class="fas fa-user"></i>Nama Lengkap
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user text-muted"></i></span>
                                        <input type="text" name="nama" id="nama" class="form-control with-icon"
                                               value="{{ old('nama') }}" required maxlength="100" placeholder="Masukkan nama lengkap">
                                    </div>
                                    @error('nama')
                                        <small class="text-danger error-message">
                                            <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="jenis_kelamin" class="form-label">
                                        <i class="fas fa-venus-mars"></i>Jenis Kelamin
                                    </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <small class="text-danger error-message">
                                            <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="agama" class="form-label">
                                        <i class="fas fa-pray"></i>Agama
                                    </label>
                                    <input type="text" name="agama" id="agama" class="form-control"
                                           value="{{ old('agama') }}" required maxlength="50" placeholder="Masukkan agama">
                                    @error('agama')
                                        <small class="text-danger error-message">
                                            <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="pekerjaan" class="form-label">
                                        <i class="fas fa-briefcase"></i>Pekerjaan
                                    </label>
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                                           value="{{ old('pekerjaan') }}" maxlength="100" placeholder="Masukkan pekerjaan">
                                    @error('pekerjaan')
                                        <small class="text-danger error-message">
                                            <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Kontak Card -->
                        <div class="form-card">
                            <h4 class="form-section-title">
                                <i class="fas fa-address-book"></i>Data Kontak
                            </h4>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="telp" class="form-label">
                                        <i class="fas fa-phone"></i>No Telepon
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-phone text-muted"></i></span>
                                        <input type="text" name="telp" id="telp" class="form-control with-icon"
                                               value="{{ old('telp') }}" maxlength="20" placeholder="Masukkan nomor telepon">
                                    </div>
                                    @error('telp')
                                        <small class="text-danger error-message">
                                            <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="email" class="form-label">
                                        <i class="fas fa-envelope"></i>Alamat Email
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope text-muted"></i></span>
                                        <input type="email" name="email" id="email" class="form-control with-icon"
                                               value="{{ old('email') }}" maxlength="100" placeholder="Masukkan alamat email">
                                    </div>
                                    @error('email')
                                        <small class="text-danger error-message">
                                            <i class="fas fa-exclamation-circle"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('datamasyarakat.index') }}" class="btn btn-back">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                            </a>
                            <button type="submit" class="btn btn-submit text-white">
                                <i class="fas fa-save me-2"></i>Simpan Data Warga
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form Section End -->

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('asset/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('asset/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('asset/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('asset/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('asset/js/main.js')}}"></script>

    <!-- Custom Script for Form Enhancement -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Format KTP input
            const ktpInput = document.getElementById('no_ktp');
            if (ktpInput) {
                ktpInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    e.target.value = value;
                });
            }

            // Format phone input
            const telpInput = document.getElementById('telp');
            if (telpInput) {
                telpInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    e.target.value = value;
                });
            }

            // Auto capitalize for name
            const nameInput = document.getElementById('nama');
            if (nameInput) {
                nameInput.addEventListener('input', function(e) {
                    e.target.value = e.target.value.replace(/\b\w/g, l => l.toUpperCase());
                });
            }
        });
    </script>
</body>

</html>
