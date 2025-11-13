@extends('layout.app')

@section('content')
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
    <div class="container-xxl py-5 teahouse-style">
        <div class="container">
            <div class="row g-5">
                <!-- Informasi Pendaftaran -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="contact-info-card p-4 shadow rounded bg-white border-start border-4 border-success">
                        <h4 class="mb-3 text-success"><i class="fas fa-info-circle me-2"></i>Informasi Pendaftaran</h4>
                        <p class="text-muted">Formulir ini dirancang agar mudah digunakan oleh masyarakat sehingga proses pendataan menjadi
                            lebih cepat dan efisien. Data yang terkumpul dapat dimanfaatkan untuk pembinaan, promosi
                            digital, serta program bantuan bagi pelaku UMKM.</p>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            <span>Proses pendataan yang cepat</span>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            <span>Promosi digital untuk usaha Anda</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-success me-2"></i>
                            <span>Akses ke program bantuan UMKM</span>
                        </div>
                    </div>

                    <!-- Contact Details -->
                    <div class="row g-3 mt-4">
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="btn-square mx-auto mb-3 bg-success">
                                <i class="fa fa-envelope fa-2x text-white"></i>
                            </div>
                            <p class="mb-1 fw-semibold">rifqiyanda@gmail.com</p>
                            <p class="text-muted small">sukra@gmail.com</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-square mx-auto mb-3 bg-success">
                                <i class="fa fa-phone fa-2x text-white"></i>
                            </div>
                            <p class="mb-1 fw-semibold">+08292424242</p>
                            <p class="text-muted small">+084367890</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3 bg-success">
                                <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-1 fw-semibold">123 Jalan</p>
                            <p class="text-muted small">Umban Sari Atas</p>
                        </div>
                    </div>
                </div>

                <!-- Form Pendaftaran -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="form-container p-4 rounded shadow bg-white border-top border-4 border-success">

                        <!-- Progress Indicator -->
                        <div class="progress-indicator d-flex justify-content-between mb-4">
                            <div class="progress-step active text-center">
                                <div class="step-icon bg-success text-white">1</div>
                                <span class="step-label">Data Usaha</span>
                            </div>
                            <div class="progress-step text-center">
                                <div class="step-icon bg-light text-dark">2</div>
                                <span class="step-label">Lokasi</span>
                            </div>
                            <div class="progress-step text-center">
                                <div class="step-icon bg-light text-dark">3</div>
                                <span class="step-label">Dokumen</span>
                            </div>
                        </div>

                        <!-- Form Header -->
                        <div class="form-header text-center mb-4">
                            <h1 class="form-title h4 text-success mb-2">Formulir Pendaftaran UMKM</h1>
                            <p class="form-subtitle text-muted">Lengkapi data usaha Anda dengan benar</p>
                        </div>

                        <!-- FORM -->
                        <form method="POST" action="{{ route('Umkm.store') }}" enctype="multipart/form-data" id="umkmForm">
                            @csrf

                            <!-- Data Usaha Section -->
                            <div class="form-section mb-4">
                                <h4 class="section-title mb-3 text-success">
                                    <i class="fas fa-store me-2"></i>Data Usaha
                                </h4>

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="nama_usaha" class="form-label text-dark">
                                            <i class="fas fa-signature me-1 text-success"></i>Nama Usaha
                                        </label>
                                        <input type="text" class="form-control border-success-subtle" id="nama_usaha"
                                            name="nama_usaha" placeholder="Masukkan nama usaha" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="pemilik_warga_id" class="form-label text-dark">
                                            <i class="fas fa-id-card me-1 text-success"></i>ID Pemilik
                                        </label>
                                        <input type="number" class="form-control border-success-subtle" id="pemilik_warga_id"
                                            name="pemilik_warga_id" placeholder="Masukkan ID pemilik" required>
                                    </div>

                                    <div class="col-12">
                                        <label for="alamat" class="form-label text-dark">
                                            <i class="fas fa-map-marker-alt me-1 text-success"></i>Alamat Lengkap
                                        </label>
                                        <input type="text" class="form-control border-success-subtle" id="alamat" name="alamat"
                                            placeholder="Masukkan alamat lengkap usaha" required>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="rt" class="form-label text-dark">
                                            <i class="fas fa-home me-1 text-success"></i>RT
                                        </label>
                                        <input type="text" class="form-control border-success-subtle" id="rt" name="rt"
                                            placeholder="RT">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="rw" class="form-label text-dark">
                                            <i class="fas fa-home me-1 text-success"></i>RW
                                        </label>
                                        <input type="text" class="form-control border-success-subtle" id="rw" name="rw"
                                            placeholder="RW">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="kategori" class="form-label text-dark">
                                            <i class="fas fa-tags me-1 text-success"></i>Kategori Usaha
                                        </label>
                                        <select class="form-select border-success-subtle" id="kategori" name="kategori">
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
                                        <label for="kontak" class="form-label text-dark">
                                            <i class="fas fa-phone me-1 text-success"></i>Kontak
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-success text-white"><i class="fas fa-phone"></i></span>
                                            <input type="text" class="form-control border-success-subtle" id="kontak"
                                                name="kontak" placeholder="Telepon / WhatsApp">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="deskripsi" class="form-label text-dark">
                                            <i class="fas fa-file-alt me-1 text-success"></i>Deskripsi Usaha
                                        </label>
                                        <textarea class="form-control border-success-subtle" placeholder="Jelaskan tentang usaha Anda" id="deskripsi"
                                            name="deskripsi" style="height: 120px"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Dokumen Section -->
                            <div class="form-section">
                                <h4 class="section-title mb-3 text-success">
                                    <i class="fas fa-file-upload me-2"></i>Dokumen & Media
                                </h4>

                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label text-dark">
                                            <i class="fas fa-camera me-1 text-success"></i>Foto Usaha
                                        </label>
                                        <div class="file-upload-container border-success-subtle text-center p-3 rounded border-dashed">
                                            <label for="foto_usaha" class="file-upload-label text-success fw-semibold">
                                                <i class="fas fa-cloud-upload-alt fa-2x mb-2"></i><br>
                                                Upload Foto Usaha
                                            </label>
                                            <input class="form-control d-none" type="file" id="foto_usaha"
                                                name="foto_usaha" accept="image/*">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-dark">
                                            <i class="fas fa-file-pdf me-1 text-success"></i>Dokumen Izin
                                        </label>
                                        <div class="file-upload-container border-success-subtle text-center p-3 rounded border-dashed">
                                            <label for="dokumen_izin" class="file-upload-label text-success fw-semibold">
                                                <i class="fas fa-file-pdf fa-2x mb-2"></i><br>
                                                Upload Dokumen
                                            </label>
                                            <input class="form-control d-none" type="file" id="dokumen_izin"
                                                name="dokumen_izin" accept=".pdf">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="form-label text-dark">
                                            <i class="fas fa-image me-1 text-success"></i>Banner Promosi
                                        </label>
                                        <div class="file-upload-container border-success-subtle text-center p-3 rounded border-dashed">
                                            <label for="banner_promosi" class="file-upload-label text-success fw-semibold">
                                                <i class="fas fa-images fa-2x mb-2"></i><br>
                                                Upload Banner
                                            </label>
                                            <input class="form-control d-none" type="file" id="banner_promosi"
                                                name="banner_promosi" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('Umkm.index') }}" class="btn btn-outline-success px-4 py-2 rounded-pill">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-success px-4 py-2 rounded-pill">
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

    <!-- Custom Style -->
    <style>
        .teahouse-style .border-success-subtle {
            border: 1px solid #bde3c3 !important;
        }
        .teahouse-style .border-dashed {
            border: 2px dashed #a2d5ab;
            transition: all 0.3s ease;
        }
        .teahouse-style .border-dashed:hover {
            background-color: #f6fff7;
            border-color: #70c57c;
        }
        .teahouse-style .progress-step .step-icon {
            width: 40px;
            height: 40px;
            line-height: 38px;
            border-radius: 50%;
            font-weight: 600;
            margin-bottom: 6px;
        }
        .teahouse-style .progress-step.active .step-icon {
            background: #198754 !important;
            color: white !important;
        }
        .teahouse-style input:focus,
        .teahouse-style select:focus,
        .teahouse-style textarea:focus {
            box-shadow: 0 0 0 0.2rem rgba(25, 135, 84, 0.25);
            border-color: #198754 !important;
        }
        .teahouse-style .btn-square {
            width: 70px;
            height: 70px;
            border-radius: 10px;
        }
    </style>
@endsection
