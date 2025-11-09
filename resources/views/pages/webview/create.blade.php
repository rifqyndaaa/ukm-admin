<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House - Tambah UMKM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

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
            --success-color: #1cc88a;
            --warning-color: #f6c23e;
            --light-bg: #f8f9fc;
        }

        .form-container {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fc 100%);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            margin: 2rem auto;
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
            color: #6c757d;
            font-size: 1.1rem;
        }

        .form-section {
            background: white;
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e3e6f0;
            margin-bottom: 2rem;
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #e3e6f0;
            display: flex;
            align-items: center;
        }

        .section-title i {
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

        .form-control, .form-select {
            border-radius: 10px;
            padding: 12px 15px;
            border: 2px solid #e3e6f0;
            transition: all 0.3s;
            font-size: 0.95rem;
        }

        .form-control:focus, .form-select:focus {
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

        .file-upload-container {
            position: relative;
            margin-bottom: 1rem;
        }

        .file-upload-label {
            display: block;
            padding: 20px;
            border: 2px dashed #e3e6f0;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            background: var(--light-bg);
        }

        .file-upload-label:hover {
            border-color: var(--primary-color);
            background: rgba(78, 115, 223, 0.05);
        }

        .file-upload-label i {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .file-upload-text {
            font-weight: 600;
            color: #5a5c69;
            margin-bottom: 5px;
        }

        .file-upload-hint {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .file-preview {
            margin-top: 10px;
            text-align: center;
        }

        .file-preview img {
            max-width: 100%;
            max-height: 150px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
            color: #6c757d;
            transition: all 0.3s;
        }

        .progress-step.active .step-icon {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .step-label {
            font-size: 0.85rem;
            color: #6c757d;
            font-weight: 600;
        }

        .progress-step.active .step-label {
            color: var(--primary-color);
        }

        .contact-info-card {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .contact-info-card h4 {
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .contact-info-card p {
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 2rem 1.5rem;
            }

            .form-section {
                padding: 1.5rem;
            }

            .btn-submit {
                width: 100%;
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
                    <!-- link foto-->
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('umkm.index')}}" class="nav-item nav-link">Data UMKM</a>
                        <a href="{{ route('about')}}" class="nav-item nav-link">About</a>
                        <a href="{{ route('product')}}" class="nav-item nav-link">Products</a>
                        <a href="{{ route('store')}}" class="nav-item nav-link">Store</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Menu</a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                                <a href="datamasyarakat" class="dropdown-item">Data Masyarakat</a>
                                <a href="datauser" class="dropdown-item">Data Users</a>
                            </div>
                        </div>
                        <a href="{{ route('create')}}" class="nav-item nav-link active">Tambah UMKM</a>
                    </div>
                    <div class="border-start ps-4 d-none d-lg-block">
                        <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Daftarkan UMKM</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">UMKM</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Tambah UMKM</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <!-- Contact Info Card -->
                    <div class="contact-info-card">
                        <h4><i class="fas fa-info-circle me-2"></i>Informasi Pendaftaran</h4>
                        <p>Formulir ini dirancang agar mudah digunakan oleh masyarakat sehingga proses pendataan menjadi lebih cepat dan efisien. Data yang terkumpul dapat dimanfaatkan untuk pembinaan, promosi digital, serta program bantuan bagi pelaku UMKM.</p>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle me-2"></i>
                            <span>Proses pendataan yang cepat</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle me-2"></i>
                            <span>Promosi digital untuk usaha Anda</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle me-2"></i>
                            <span>Akses ke program bantuan UMKM</span>
                        </div>
                    </div>

                    <!-- Contact Details -->
                    <div class="row g-3 mb-5">
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="btn-square mx-auto mb-3" style="background: var(--primary-color);">
                                <i class="fa fa-envelope fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">rifqiyanda@gmail.com</p>
                            <p class="mb-0">sukra@gmail.com</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-square mx-auto mb-3" style="background: var(--primary-color);">
                                <i class="fa fa-phone fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">+08292424242</p>
                            <p class="mb-0">+084367890</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3" style="background: var(--primary-color);">
                                <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">123 Jalan</p>
                            <p class="mb-0">Umban Sari Atas</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="form-container">
                        <!-- Progress Indicator -->
                        <div class="progress-indicator">
                            <div class="progress-step active">
                                <div class="step-icon">1</div>
                                <span class="step-label">Data Usaha</span>
                            </div>
                            <div class="progress-step">
                                <div class="step-icon">2</div>
                                <span class="step-label">Lokasi</span>
                            </div>
                            <div class="progress-step">
                                <div class="step-icon">3</div>
                                <span class="step-label">Dokumen</span>
                            </div>
                        </div>

                        <!-- Form Header -->
                        <div class="form-header">
                            <h1 class="form-title">Formulir Pendaftaran UMKM</h1>
                            <p class="form-subtitle">Lengkapi data usaha Anda dengan benar</p>
                        </div>

                        <form method="POST" action="{{ route('umkm.store') }}" enctype="multipart/form-data" id="umkmForm">
                            @csrf

                            <!-- Data Usaha Section -->
                            <div class="form-section">
                                <h4 class="section-title">
                                    <i class="fas fa-store"></i>Data Usaha
                                </h4>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="nama_usaha" class="form-label">
                                            <i class="fas fa-signature"></i>Nama Usaha
                                        </label>
                                        <input type="text" class="form-control" id="nama_usaha" name="nama_usaha"
                                               placeholder="Masukkan nama usaha" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="pemilik_warga_id" class="form-label">
                                            <i class="fas fa-id-card"></i>ID Pemilik
                                        </label>
                                        <input type="number" class="form-control" id="pemilik_warga_id" name="pemilik_warga_id"
                                               placeholder="Masukkan ID pemilik" required>
                                    </div>

                                    <div class="col-12">
                                        <label for="alamat" class="form-label">
                                            <i class="fas fa-map-marker-alt"></i>Alamat Lengkap
                                        </label>
                                        <input type="text" class="form-control" id="alamat" name="alamat"
                                               placeholder="Masukkan alamat lengkap usaha" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="rt" class="form-label">
                                            <i class="fas fa-home"></i>RT
                                        </label>
                                        <input type="text" class="form-control" id="rt" name="rt"
                                               placeholder="RT">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="rw" class="form-label">
                                            <i class="fas fa-home"></i>RW
                                        </label>
                                        <input type="text" class="form-control" id="rw" name="rw"
                                               placeholder="RW">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="kategori" class="form-label">
                                            <i class="fas fa-tags"></i>Kategori Usaha
                                        </label>
                                        <select class="form-select" id="kategori" name="kategori">
                                            <option value="">Pilih Kategori</option>
                                            <option value="Makanan & Minuman">Makanan & Minuman</option>
                                            <option value="Fashion">Fashion</option>
                                            <option value="Kerajinan">Kerajinan</option>
                                            <option value="Jasa">Jasa</option>
                                            <option value="Pertanian">Pertanian</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="kontak" class="form-label">
                                            <i class="fas fa-phone"></i>Kontak
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fas fa-phone text-muted"></i></span>
                                            <input type="text" class="form-control with-icon" id="kontak" name="kontak"
                                                   placeholder="Telepon / WhatsApp">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="deskripsi" class="form-label">
                                            <i class="fas fa-file-alt"></i>Deskripsi Usaha
                                        </label>
                                        <textarea class="form-control" placeholder="Jelaskan tentang usaha Anda"
                                                  id="deskripsi" name="deskripsi" style="height: 120px"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Dokumen Section -->
                            <div class="form-section">
                                <h4 class="section-title">
                                    <i class="fas fa-file-upload"></i>Dokumen & Media
                                </h4>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label">
                                            <i class="fas fa-camera"></i>Foto Usaha
                                        </label>
                                        <div class="file-upload-container">
                                            <label for="foto_usaha" class="file-upload-label">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <div class="file-upload-text">Upload Foto Usaha</div>
                                                <div class="file-upload-hint">PNG, JPG (Max 2MB)</div>
                                            </label>
                                            <input class="form-control d-none" type="file" id="foto_usaha" name="foto_usaha" accept="image/*">
                                            <div class="file-preview" id="fotoPreview"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">
                                            <i class="fas fa-file-pdf"></i>Dokumen Izin
                                        </label>
                                        <div class="file-upload-container">
                                            <label for="dokumen_izin" class="file-upload-label">
                                                <i class="fas fa-file-pdf"></i>
                                                <div class="file-upload-text">Upload Dokumen</div>
                                                <div class="file-upload-hint">PDF (Max 5MB)</div>
                                            </label>
                                            <input class="form-control d-none" type="file" id="dokumen_izin" name="dokumen_izin" accept=".pdf">
                                            <div class="file-preview" id="dokumenPreview"></div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label">
                                            <i class="fas fa-image"></i>Banner Promosi
                                        </label>
                                        <div class="file-upload-container">
                                            <label for="banner_promosi" class="file-upload-label">
                                                <i class="fas fa-images"></i>
                                                <div class="file-upload-text">Upload Banner</div>
                                                <div class="file-upload-hint">PNG, JPG (Max 3MB)</div>
                                            </label>
                                            <input class="form-control d-none" type="file" id="banner_promosi" name="banner_promosi" accept="image/*">
                                            <div class="file-preview" id="bannerPreview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">
                                <button class="btn btn-submit text-white" type="submit">
                                    <i class="fas fa-save me-2"></i>Simpan Data UMKM
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
<a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20produk%20Anda." class="whatsapp-float" target="_blank">
  <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" width="50" height="50">
</a>

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
            // File upload preview functionality
            const fileInputs = {
                'foto_usaha': 'fotoPreview',
                'dokumen_izin': 'dokumenPreview',
                'banner_promosi': 'bannerPreview'
            };

            Object.keys(fileInputs).forEach(inputId => {
                const input = document.getElementById(inputId);
                const preview = document.getElementById(fileInputs[inputId]);

                if (input) {
                    input.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        if (file) {
                            if (inputId === 'dokumen_izin') {
                                // For PDF files
                                preview.innerHTML = `
                                    <div class="alert alert-info p-2">
                                        <i class="fas fa-file-pdf me-2"></i>
                                        ${file.name}
                                    </div>
                                `;
                            } else {
                                // For image files
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    preview.innerHTML = `<img src="${e.target.result}" alt="Preview" class="img-fluid">`;
                                };
                                reader.readAsDataURL(file);
                            }
                        }
                    });

                    // Click event for file upload labels
                    const label = input.previousElementSibling;
                    if (label) {
                        label.addEventListener('click', function() {
                            input.click();
                        });
                    }
                }
            });

            // Form validation
            const form = document.getElementById('umkmForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const requiredFields = form.querySelectorAll('[required]');
                    let valid = true;

                    requiredFields.forEach(field => {
                        if (!field.value.trim()) {
                            valid = false;
                            field.classList.add('is-invalid');
                        } else {
                            field.classList.remove('is-invalid');
                        }
                    });

                    if (!valid) {
                        e.preventDefault();
                        alert('Harap lengkapi semua field yang wajib diisi!');
                    }
                });
            }

            // Auto-format phone number
            const phoneInput = document.getElementById('kontak');
            if (phoneInput) {
                phoneInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    e.target.value = value;
                });
            }
        });
    </script>
</body>
</html>
