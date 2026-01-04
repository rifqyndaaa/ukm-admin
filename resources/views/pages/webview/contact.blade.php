@extends('layout.app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header-developer py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{ asset('asset/img/bg-developer.jpg') }}') center/cover no-repeat;">
    <div class="container text-center py-5">
        <h1 class="display-2 text-white mb-4 animated slideInDown">Tim Pengembang</h1>
        <p class="fs-5 text-white mb-4 animated slideInDown">Bertemu dengan kreator di balik aplikasi ini</p>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-white">Tentang</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Pengembang</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Developer Profile Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 700px;">
            <p class="fs-5 fw-medium fst-italic text-primary">Tentang Saya</p>
            <h1 class="display-6 mb-4">Bertemu dengan Pengembang</h1>
            <p class="mb-0">Saya adalah seorang pengembang perangkat lunak dengan fokus pada pengembangan web dan aplikasi berbasis sistem informasi.</p>
        </div>

        <div class="row justify-content-center g-5 mt-4">
            <div class="col-lg-8 col-md-10 wow fadeInUp" data-wow-delay="0.3s">
                <div class="developer-card card border-0 shadow-lg overflow-hidden">
                    <div class="row g-0">
                        <!-- Foto Profil -->
                        <div class="col-md-4 bg-light d-flex align-items-center justify-content-center p-4">
                            <div class="position-relative">
                                <img src="{{ asset('asset/img/testimonial-2.jpg') }}" class="img-fluid rounded-circle developer-img shadow" alt="Foto Pengembang" style="width: 250px; height: 250px; object-fit: cover;">
                                <div class="status-indicator bg-success"></div>
                            </div>
                        </div>

                        <!-- Informasi Profil -->
                        <div class="col-md-8">
                            <div class="card-body p-5">
                                <h3 class="card-title fw-bold mb-2">Rifqi Yanda</h3>
                                <p class="text-primary mb-3">Full Stack Developer</p>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-box bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <i class="fas fa-id-card text-white"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0 text-muted">NIM</p>
                                                <p class="mb-0 fw-semibold">2457301124</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-box bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <i class="fas fa-graduation-cap text-white"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0 text-muted">Program Studi</p>
                                                <p class="mb-0 fw-semibold">Sistem Informasi</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-box bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <i class="fas fa-university text-white"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0 text-muted">politeknik</p>
                                                <p class="mb-0 fw-semibold">caltex riau</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-box bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                                <i class="fas fa-map-marker-alt text-white"></i>
                                            </div>
                                            <div>
                                                <p class="mb-0 text-muted">Lokasi</p>
                                                <p class="mb-0 fw-semibold">pekanbaru, Indonesia</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Skills -->
                                <h5 class="mb-3">Keahlian Teknis</h5>
                                <div class="mb-4">
                                    <div class="d-flex flex-wrap gap-2">
                                        <span class="badge bg-primary-subtle text-primary p-2">PHP & Laravel</span>
                                        <span class="badge bg-primary-subtle text-primary p-2">JavaScript</span>
                                        <span class="badge bg-primary-subtle text-primary p-2">HTML/CSS</span>
                                        <span class="badge bg-primary-subtle text-primary p-2">Bootstrap</span>
                                        <span class="badge bg-primary-subtle text-primary p-2">MySQL</span>
                                        <span class="badge bg-primary-subtle text-primary p-2">Git & GitHub</span>
                                    </div>
                                </div>

                                <!-- Media Sosial -->
                                <h5 class="mb-3">Hubungi Saya</h5>
                                <div class="d-flex gap-3">
                                    <a href="https://linkedin.com/in/rifqiyanda" target="_blank" class="social-btn linkedin">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                    <a href="https://github.com/rifqiyanda" target="_blank" class="social-btn github">
                                        <i class="fab fa-github"></i>
                                    </a>
                                    <a href="https://instagram.com/rifqiyanda" target="_blank" class="social-btn instagram">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                    <a href="https://twitter.com/rifqiyanda" target="_blank" class="social-btn twitter">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="mailto:rifqi@example.com" class="social-btn email">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tentang Saya Section -->
        <div class="row justify-content-center mt-5 wow fadeInUp" data-wow-delay="0.5s">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <h4 class="card-title mb-4">Tentang Saya</h4>
                        <p>Saya adalah mahasiswa Sistem Informasi dengan minat yang kuat dalam pengembangan web dan teknologi informasi. Saya memiliki pengalaman dalam mengembangkan aplikasi berbasis web menggunakan framework Laravel dan teknologi terkini.</p>
                        <p>Saya percaya bahwa teknologi dapat menjadi solusi untuk berbagai permasalahan dalam kehidupan sehari-hari, dan saya berkomitmen untuk terus belajar dan mengembangkan kemampuan saya dalam bidang pengembangan perangkat lunak.</p>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h5 class="mb-3">Proyek yang Pernah Dikerjakan</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 ps-0">
                                        Sistem Manajemen Inventaris
                                        <span class="badge bg-primary rounded-pill">Laravel</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 ps-0">
                                        Aplikasi E-Commerce
                                        <span class="badge bg-primary rounded-pill">PHP</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 ps-0">
                                        Sistem Informasi Akademik
                                        <span class="badge bg-primary rounded-pill">Bootstrap</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-3">Pencapaian</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item border-0 ps-0">
                                        <i class="fas fa-award text-primary me-2"></i>
                                        Juara 1 Lomba Web Development
                                    </li>
                                    <li class="list-group-item border-0 ps-0">
                                        <i class="fas fa-certificate text-primary me-2"></i>
                                        Sertifikasi Laravel Developer
                                    </li>
                                    <li class="list-group-item border-0 ps-0">
                                        <i class="fas fa-star text-primary me-2"></i>
                                        Kontributor Open Source
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Developer Profile End -->

<!-- CSS Tambahan -->
<style>
    .page-header-developer {
        min-height: 400px;
        display: flex;
        align-items: center;
    }

    .developer-card {
        border-radius: 20px;
        transition: transform 0.3s ease;
    }

    .developer-card:hover {
        transform: translateY(-10px);
    }

    .developer-img {
        border: 5px solid white;
        transition: transform 0.3s ease;
    }

    .developer-img:hover {
        transform: scale(1.05);
    }

    .status-indicator {
        position: absolute;
        bottom: 20px;
        right: 20px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        border: 3px solid white;
    }

    .social-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-btn:hover {
        transform: translateY(-5px);
        color: white;
    }

    .linkedin {
        background-color: #0077b5;
    }

    .github {
        background-color: #333;
    }

    .instagram {
        background: linear-gradient(45deg, #405de6, #5851db, #833ab4, #c13584, #e1306c, #fd1d1d);
    }

    .twitter {
        background-color: #1da1f2;
    }

    .email {
        background-color: #ea4335;
    }

    .icon-box {
        width: 40px;
        height: 40px;
    }

    .badge.bg-primary-subtle {
        background-color: rgba(13, 110, 253, 0.1) !important;
    }

    @media (max-width: 768px) {
        .developer-card .row {
            flex-direction: column;
        }

        .developer-img {
            width: 200px !important;
            height: 200px !important;
        }
    }
</style>

@endsection
