@extends('layout.app')

@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
        <h6 class="fw-bold mb-2">
            <i class="fas fa-exclamation-triangle me-2"></i>Perbaiki Kesalahan Berikut:
        </h6>
        <ul class="mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li class="small">{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card shadow-lg border-0 rounded-4 overflow-hidden mb-5 mt-4">
    <div class="card-header bg-gradient-primary text-white py-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="mb-1"><i class="fas fa-plus-circle me-3"></i>Tambah Data UMKM Baru</h2>
                <p class="mb-0 opacity-75">Formulir pendaftaran usaha mikro, kecil, dan menengah</p>
            </div>
            <div class="badge bg-white text-primary px-3 py-2 rounded-pill fs-6">
                <i class="fas fa-plus me-1"></i> Form Baru
            </div>
        </div>
    </div>

    <div class="card-body p-4">
        <div class="row">
            <!-- Form Section -->
            <div class="col-lg-8">
                <div class="card border-light shadow-sm rounded-4 mb-4">
                    <div class="card-header bg-light py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0 fw-bold text-primary">
                                <i class="fas fa-pencil-alt me-2"></i>Formulir Pendaftaran
                            </h4>
                            <span class="badge bg-primary">Step 1/2</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('Umkm.store') }}" enctype="multipart/form-data" id="umkmForm">
                            @csrf

                            <div class="row g-4">
                                <!-- Nama Usaha -->
                                <div class="col-md-6">
                                    <label for="nama_usaha" class="form-label fw-semibold">
                                        <i class="fas fa-store me-1 text-primary"></i>Nama Usaha
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-building"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-lg rounded-end"
                                               id="nama_usaha" name="nama_usaha"
                                               value="{{ old('nama_usaha') }}"
                                               placeholder="Masukkan nama usaha" required>
                                    </div>
                                    @error('nama_usaha')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- ID Pemilik Warga -->
                                <div class="col-md-6">
                                    <label for="pemilik_warga_id" class="form-label fw-semibold">
                                        <i class="fas fa-id-card me-1 text-primary"></i>ID Pemilik Warga
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="number" class="form-control form-control-lg rounded-end"
                                               id="pemilik_warga_id" name="pemilik_warga_id"
                                               value="{{ old('pemilik_warga_id') }}"
                                               placeholder="ID pemilik" required min="1">
                                    </div>
                                    <small class="text-muted">Masukkan ID warga yang terdaftar</small>
                                    @error('pemilik_warga_id')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Alamat Lengkap -->
                                <div class="col-12">
                                    <label for="alamat" class="form-label fw-semibold">
                                        <i class="fas fa-map-marker-alt me-1 text-primary"></i>Alamat Lengkap
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-home"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-lg rounded-end"
                                               id="alamat" name="alamat"
                                               value="{{ old('alamat') }}"
                                               placeholder="Jl. Contoh No. 123" required>
                                    </div>
                                    @error('alamat')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- RT & RW -->
                                <div class="col-md-3">
                                    <label for="rt" class="form-label fw-semibold">
                                        <i class="fas fa-th-large me-1 text-primary"></i>RT
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">RT</span>
                                        <input type="text" class="form-control form-control-lg rounded-end"
                                               id="rt" name="rt"
                                               value="{{ old('rt') }}"
                                               placeholder="001" required pattern="[0-9]+">
                                    </div>
                                    @error('rt')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="rw" class="form-label fw-semibold">
                                        <i class="fas fa-th-large me-1 text-primary"></i>RW
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">RW</span>
                                        <input type="text" class="form-control form-control-lg rounded-end"
                                               id="rw" name="rw"
                                               value="{{ old('rw') }}"
                                               placeholder="002" required pattern="[0-9]+">
                                    </div>
                                    @error('rw')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kategori -->
                                <div class="col-md-6">
                                    <label for="kategori" class="form-label fw-semibold">
                                        <i class="fas fa-tag me-1 text-primary"></i>Kategori Usaha
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-list"></i>
                                        </span>
                                        <select class="form-select form-select-lg rounded-end"
                                                id="kategori" name="kategori" required>
                                            <option value="">Pilih Kategori</option>
                                            <option value="Makanan & Minuman" {{ old('kategori') == 'Makanan & Minuman' ? 'selected' : '' }}>Makanan & Minuman</option>
                                            <option value="Kerajinan Tangan" {{ old('kategori') == 'Kerajinan Tangan' ? 'selected' : '' }}>Kerajinan Tangan</option>
                                            <option value="Fashion" {{ old('kategori') == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                            <option value="Jasa" {{ old('kategori') == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                                            <option value="Pertanian" {{ old('kategori') == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
                                            <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                    </div>
                                    @error('kategori')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Kontak -->
                                <div class="col-md-6">
                                    <label for="kontak" class="form-label fw-semibold">
                                        <i class="fas fa-phone me-1 text-primary"></i>Kontak
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-mobile-alt"></i>
                                        </span>
                                        <input type="text" class="form-control form-control-lg rounded-end"
                                               id="kontak" name="kontak"
                                               value="{{ old('kontak') }}"
                                               placeholder="08xxxxxxxxxx" required>
                                    </div>
                                    <small class="text-muted">Nomor telepon/WhatsApp</small>
                                    @error('kontak')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="col-12">
                                    <label for="deskripsi" class="form-label fw-semibold">
                                        <i class="fas fa-align-left me-1 text-primary"></i>Deskripsi Usaha
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light align-items-start pt-3">
                                            <i class="fas fa-file-alt"></i>
                                        </span>
                                        <textarea class="form-control form-control-lg rounded-end"
                                                  id="deskripsi" name="deskripsi"
                                                  rows="4" placeholder="Deskripsi detail tentang usaha...">{{ old('deskripsi') }}</textarea>
                                    </div>
                                    <div class="d-flex justify-content-between mt-1">
                                        <small class="text-muted">Jelaskan produk/jasa yang ditawarkan</small>
                                        <small class="text-muted" id="charCount">0/500 karakter</small>
                                    </div>
                                    @error('deskripsi')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Upload Files Section -->
                                <div class="col-12">
                                    <div class="card border-light shadow-sm rounded-4 mt-2">
                                        <div class="card-header bg-light py-3">
                                            <h5 class="mb-0 fw-bold text-primary">
                                                <i class="fas fa-upload me-2"></i>Upload Dokumen
                                                <small class="text-muted fw-normal">(Opsional - Dapat diisi nanti)</small>
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row g-4">
                                                <!-- Foto Usaha -->
                                                <div class="col-md-4">
                                                    <label for="foto_usaha" class="form-label fw-semibold">
                                                        <i class="fas fa-camera me-1 text-primary"></i>Foto Usaha
                                                    </label>
                                                    <div class="file-upload-area border rounded-3 p-4 text-center bg-light hover-lift">
                                                        <i class="fas fa-cloud-upload-alt fa-2x text-muted mb-3"></i>
                                                        <p class="mb-2 small fw-semibold">Upload Foto Usaha</p>
                                                        <input type="file" class="form-control mt-3"
                                                               id="foto_usaha" name="foto_usaha"
                                                               accept="image/*">
                                                        <small class="text-muted d-block mt-2">Format: JPG, PNG, JPEG. Maks: 2MB</small>
                                                    </div>
                                                    @error('foto_usaha')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Dokumen Izin -->
                                                <div class="col-md-4">
                                                    <label for="dokumen_izin" class="form-label fw-semibold">
                                                        <i class="fas fa-file-pdf me-1 text-primary"></i>Dokumen Izin
                                                    </label>
                                                    <div class="file-upload-area border rounded-3 p-4 text-center bg-light hover-lift">
                                                        <i class="fas fa-file-pdf fa-2x text-danger mb-3"></i>
                                                        <p class="mb-2 small fw-semibold">Upload Dokumen Izin</p>
                                                        <input type="file" class="form-control mt-3"
                                                               id="dokumen_izin" name="dokumen_izin"
                                                               accept=".pdf">
                                                        <small class="text-muted d-block mt-2">Format: PDF. Maks: 5MB</small>
                                                    </div>
                                                    @error('dokumen_izin')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <!-- Banner Promosi -->
                                                <div class="col-md-4">
                                                    <label for="banner_promosi" class="form-label fw-semibold">
                                                        <i class="fas fa-images me-1 text-primary"></i>Banner Promosi
                                                    </label>
                                                    <div class="file-upload-area border rounded-3 p-4 text-center bg-light hover-lift">
                                                        <i class="fas fa-image fa-2x text-info mb-3"></i>
                                                        <p class="mb-2 small fw-semibold">Upload Banner</p>
                                                        <input type="file" class="form-control mt-3"
                                                               id="banner_promosi" name="banner_promosi"
                                                               accept="image/*">
                                                        <small class="text-muted d-block mt-2">Format: JPG, PNG. Maks: 3MB</small>
                                                    </div>
                                                    @error('banner_promosi')
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="col-12 mt-4">
                                    <div class="d-flex justify-content-between align-items-center pt-4 border-top">
                                        <a href="{{ route('Umkm.index') }}" class="btn btn-outline-secondary rounded-pill px-4 py-3">
                                            <i class="fas fa-arrow-left me-2"></i>Kembali
                                        </a>
                                        <div class="d-flex gap-3">
                                            <button type="reset" class="btn btn-outline-danger rounded-pill px-4 py-3">
                                                <i class="fas fa-redo me-2"></i>Reset Form
                                            </button>
                                            <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 shadow-sm">
                                                <i class="fas fa-save me-2"></i>Simpan Data UMKM
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Info & Guide Section -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 20px;">
                    <!-- Guide Card -->
                    <div class="card border-light shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-light py-3">
                            <h5 class="mb-0 fw-bold text-primary">
                                <i class="fas fa-info-circle me-2"></i>Panduan Pengisian
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="accordion" id="guideAccordion">
                                <!-- Step 1 -->
                                <div class="accordion-item border-0 mb-2">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-light rounded-3" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#guide1">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            <strong>Data Usaha Lengkap</strong>
                                        </button>
                                    </h2>
                                    <div id="guide1" class="accordion-collapse collapse show" data-bs-parent="#guideAccordion">
                                        <div class="accordion-body">
                                            <small class="text-muted">
                                                Pastikan semua data usaha diisi dengan benar dan lengkap.
                                                Data yang valid memudahkan proses verifikasi.
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 2 -->
                                <div class="accordion-item border-0 mb-2">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-light rounded-3 collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#guide2">
                                            <i class="fas fa-map-marker-alt text-info me-2"></i>
                                            <strong>Alamat Valid</strong>
                                        </button>
                                    </h2>
                                    <div id="guide2" class="accordion-collapse collapse" data-bs-parent="#guideAccordion">
                                        <div class="accordion-body">
                                            <small class="text-muted">
                                                Masukkan alamat sesuai dengan lokasi usaha sebenarnya.
                                                Cantumkan RT/RW untuk memudahkan identifikasi.
                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 3 -->
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-light rounded-3 collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#guide3">
                                            <i class="fas fa-file-upload text-warning me-2"></i>
                                            <strong>Dokumen Pendukung</strong>
                                        </button>
                                    </h2>
                                    <div id="guide3" class="accordion-collapse collapse" data-bs-parent="#guideAccordion">
                                        <div class="accordion-body">
                                            <small class="text-muted">
                                                Upload foto usaha dan dokumen izin (jika ada).
                                                File maksimal 5MB dalam format yang ditentukan.
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Benefits Card -->
                    <div class="card border-light shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-light py-3">
                            <h5 class="mb-0 fw-bold text-primary">
                                <i class="fas fa-gift me-2"></i>Manfaat Pendaftaran
                            </h5>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
                                            <i class="fas fa-chart-line text-success"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold">Promosi Digital</h6>
                                            <small class="text-muted">Usaha Anda akan dipromosikan secara online</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-3">
                                    <div class="d-flex align-items-start">
                                        <div class="bg-info bg-opacity-10 p-2 rounded-circle me-3">
                                            <i class="fas fa-hands-helping text-info"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold">Akses Bantuan</h6>
                                            <small class="text-muted">Mendapatkan informasi program bantuan UMKM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-start">
                                        <div class="bg-warning bg-opacity-10 p-2 rounded-circle me-3">
                                            <i class="fas fa-users text-warning"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold">Jaringan Usaha</h6>
                                            <small class="text-muted">Bergabung dengan komunitas UMKM lainnya</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="card border-light shadow-sm rounded-4">
                        <div class="card-header bg-light py-3">
                            <h5 class="mb-0 fw-bold text-primary">
                                <i class="fas fa-headset me-2"></i>Butuh Bantuan?
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-primary bg-opacity-10 p-2 rounded-circle me-3">
                                            <i class="fas fa-phone text-primary"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Telepon</small>
                                            <p class="mb-0 fw-semibold">+08292424242</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
                                            <i class="fas fa-envelope text-success"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Email</small>
                                            <p class="mb-0 fw-semibold">umkm@desa.id</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning bg-opacity-10 p-2 rounded-circle me-3">
                                            <i class="fas fa-map-marker-alt text-warning"></i>
                                        </div>
                                        <div>
                                            <small class="text-muted">Lokasi Kantor</small>
                                            <p class="mb-0 fw-semibold">Kantor Desa Sukra</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .form-control, .form-select {
        border-radius: 12px;
        border: 1.5px solid #e0e0e0;
        transition: all 0.3s ease;
        font-size: 1rem;
    }

    .form-control:focus, .form-select:focus {
        border-color: #4e54c8;
        box-shadow: 0 0 0 0.25rem rgba(78, 84, 200, 0.25);
        transform: translateY(-1px);
    }

    .form-control-lg {
        padding: 0.75rem 1rem;
    }

    .input-group-text {
        background-color: #f8f9fa;
        border-color: #e0e0e0;
        border-radius: 12px 0 0 12px !important;
    }

    .rounded-end {
        border-radius: 0 12px 12px 0 !important;
    }

    .form-label {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #333;
    }

    .btn-primary {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
        border: none;
        padding: 0.75rem 2rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(78, 84, 200, 0.4);
    }

    .btn-outline-secondary:hover {
        transform: translateY(-2px);
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);
    }

    .sticky-top {
        position: sticky;
        z-index: 100;
    }

    .card {
        border: 1px solid rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-2px);
    }

    textarea {
        resize: vertical;
        min-height: 120px;
    }

    .border-light {
        border-color: #f1f1f1 !important;
    }

    .file-upload-area {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .file-upload-area:hover {
        background-color: #f8f9fa !important;
        border-color: #4e54c8 !important;
        transform: translateY(-2px);
    }

    .hover-lift {
        transition: transform 0.2s ease;
    }

    .hover-lift:hover {
        transform: translateY(-3px);
    }

    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #333;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Character counter for description
        const textarea = document.getElementById('deskripsi');
        const charCount = document.getElementById('charCount');

        if (textarea && charCount) {
            // Initial count
            charCount.textContent = `${textarea.value.length}/500 karakter`;

            // Update on input
            textarea.addEventListener('input', function() {
                charCount.textContent = `${this.value.length}/500 karakter`;
                if (this.value.length > 500) {
                    this.value = this.value.substring(0, 500);
                    charCount.textContent = `500/500 karakter`;
                    charCount.classList.add('text-danger');
                } else {
                    charCount.classList.remove('text-danger');
                }
            });
        }

        // File validation and preview
        const fileInputs = ['foto_usaha', 'dokumen_izin', 'banner_promosi'];

        fileInputs.forEach(inputId => {
            const input = document.getElementById(inputId);
            if (input) {
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const fileName = file.name;
                        const fileSize = (file.size / 1024 / 1024).toFixed(2); // MB

                        // Show alert for large files
                        let maxSize = 2; // default for images
                        if (inputId === 'dokumen_izin') maxSize = 5;
                        if (inputId === 'banner_promosi') maxSize = 3;

                        if (fileSize > maxSize) {
                            alert(`File ${fileName} terlalu besar (${fileSize} MB). Maksimal ${maxSize} MB.`);
                            input.value = '';
                            return;
                        }

                        // Show file info
                        const parentDiv = input.closest('.file-upload-area');
                        if (parentDiv) {
                            parentDiv.innerHTML = `
                                <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                                <p class="mb-1 small fw-semibold">${fileName}</p>
                                <p class="small text-muted">${fileSize} MB</p>
                                <button type="button" class="btn btn-sm btn-outline-danger mt-2" onclick="resetFile('${inputId}')">
                                    <i class="fas fa-times me-1"></i>Hapus
                                </button>
                                <input type="file" class="form-control d-none" id="${inputId}" name="${inputId}" accept="${input.accept}">
                            `;
                        }
                    }
                });
            }
        });

        // Form validation
        const form = document.getElementById('umkmForm');
        if (form) {
            form.addEventListener('submit', function(e) {
                let isValid = true;
                const requiredFields = form.querySelectorAll('[required]');

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('is-invalid');
                        field.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });

                // RT/RW validation
                const rtInput = document.getElementById('rt');
                const rwInput = document.getElementById('rw');

                if (rtInput && !/^\d+$/.test(rtInput.value)) {
                    isValid = false;
                    rtInput.classList.add('is-invalid');
                    rtInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }

                if (rwInput && !/^\d+$/.test(rwInput.value)) {
                    isValid = false;
                    rwInput.classList.add('is-invalid');
                    rwInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }

                if (!isValid) {
                    e.preventDefault();
                    // Show error message
                    const errorAlert = document.createElement('div');
                    errorAlert.className = 'alert alert-danger alert-dismissible fade show position-fixed top-0 start-50 translate-middle-x mt-3 z-3';
                    errorAlert.innerHTML = `
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        Harap periksa kembali form yang belum terisi dengan benar!
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    `;
                    document.body.appendChild(errorAlert);

                    setTimeout(() => {
                        errorAlert.remove();
                    }, 5000);
                }
            });
        }

        // Add pattern validation feedback
        const rtInput = document.getElementById('rt');
        const rwInput = document.getElementById('rw');

        if (rtInput) {
            rtInput.addEventListener('blur', function() {
                if (!/^\d+$/.test(this.value)) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        }

        if (rwInput) {
            rwInput.addEventListener('blur', function() {
                if (!/^\d+$/.test(this.value)) {
                    this.classList.add('is-invalid');
                } else {
                    this.classList.remove('is-invalid');
                }
            });
        }
    });

    // Function to reset file input
    window.resetFile = function(inputId) {
        const input = document.getElementById(inputId);
        if (input) {
            input.value = '';
            const parentDiv = input.closest('.file-upload-area');
            if (parentDiv) {
                let icon = 'fa-cloud-upload-alt';
                let iconClass = 'text-muted';

                if (inputId === 'dokumen_izin') {
                    icon = 'fa-file-pdf';
                    iconClass = 'text-danger';
                } else if (inputId === 'banner_promosi') {
                    icon = 'fa-image';
                    iconClass = 'text-info';
                }

                parentDiv.innerHTML = `
                    <i class="fas ${icon} fa-2x ${iconClass} mb-3"></i>
                    <p class="mb-2 small fw-semibold">Upload ${getFileName(inputId)}</p>
                    <input type="file" class="form-control mt-3"
                           id="${inputId}" name="${inputId}" accept="${input.accept}">
                    <small class="text-muted d-block mt-2">${getFileInfo(inputId)}</small>
                `;

                // Reattach event listener
                const newInput = parentDiv.querySelector('input');
                newInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const fileName = file.name;
                        const fileSize = (file.size / 1024 / 1024).toFixed(2);
                        let maxSize = getMaxSize(inputId);

                        if (fileSize > maxSize) {
                            alert(`File ${fileName} terlalu besar (${fileSize} MB). Maksimal ${maxSize} MB.`);
                            newInput.value = '';
                            return;
                        }

                        parentDiv.innerHTML = `
                            <i class="fas fa-check-circle fa-2x text-success mb-2"></i>
                            <p class="mb-1 small fw-semibold">${fileName}</p>
                            <p class="small text-muted">${fileSize} MB</p>
                            <button type="button" class="btn btn-sm btn-outline-danger mt-2" onclick="resetFile('${inputId}')">
                                <i class="fas fa-times me-1"></i>Hapus
                            </button>
                        `;
                    }
                });
            }
        }
    };

    function getFileName(inputId) {
        switch(inputId) {
            case 'foto_usaha': return 'Foto Usaha';
            case 'dokumen_izin': return 'Dokumen Izin';
            case 'banner_promosi': return 'Banner Promosi';
            default: return 'File';
        }
    }

    function getFileInfo(inputId) {
        switch(inputId) {
            case 'foto_usaha': return 'Format: JPG, PNG, JPEG. Maks: 2MB';
            case 'dokumen_izin': return 'Format: PDF. Maks: 5MB';
            case 'banner_promosi': return 'Format: JPG, PNG. Maks: 3MB';
            default: return '';
        }
    }

    function getMaxSize(inputId) {
        switch(inputId) {
            case 'foto_usaha': return 2;
            case 'dokumen_izin': return 5;
            case 'banner_promosi': return 3;
            default: return 2;
        }
    }
</script>
@endpush

@endsection
