@extends('layout.app')

@section('content')

<div class="container mt-4">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            Terdapat kesalahan dalam pengisian form. Silakan periksa kembali.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-lg border-0 rounded-4 overflow-hidden mb-5">
        <div class="card-header bg-gradient-primary text-white py-4">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="mb-1"><i class="fas fa-edit me-3"></i>Edit Data UMKM</h2>
                    <p class="mb-0 opacity-75">Perbarui informasi usaha mikro, kecil, dan menengah</p>
                </div>
                <div class="badge bg-white text-primary px-3 py-2 rounded-pill fs-6">
                    <i class="fas fa-hashtag me-1"></i> ID: {{ $umkm->umkm_id }}
                </div>
            </div>
        </div>

        <div class="card-body p-4">
            <div class="row">
                <!-- Form Section -->
                <div class="col-lg-8">
                    <div class="card border-light shadow-sm rounded-4 mb-4">
                        <div class="card-header bg-light py-3">
                            <h4 class="mb-0 fw-bold text-primary">
                                <i class="fas fa-pencil-alt me-2"></i>Formulir Pembaruan Data
                            </h4>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('Umkm.update', $umkm->umkm_id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

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
                                                   value="{{ old('nama_usaha', $umkm->nama_usaha) }}"
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
                                                   value="{{ old('pemilik_warga_id', $umkm->pemilik_warga_id) }}"
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
                                                   value="{{ old('alamat', $umkm->alamat) }}"
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
                                                   value="{{ old('rt', $umkm->rt) }}"
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
                                                   value="{{ old('rw', $umkm->rw) }}"
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
                                        </label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-light">
                                                <i class="fas fa-list"></i>
                                            </span>
                                            <select class="form-select form-select-lg rounded-end"
                                                    id="kategori" name="kategori">
                                                <option value="">Pilih Kategori</option>
                                                <option value="Makanan & Minuman" {{ old('kategori', $umkm->kategori) == 'Makanan & Minuman' ? 'selected' : '' }}>Makanan & Minuman</option>
                                                <option value="Kerajinan Tangan" {{ old('kategori', $umkm->kategori) == 'Kerajinan Tangan' ? 'selected' : '' }}>Kerajinan Tangan</option>
                                                <option value="Fashion" {{ old('kategori', $umkm->kategori) == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                                <option value="Jasa" {{ old('kategori', $umkm->kategori) == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                                                <option value="Pertanian" {{ old('kategori', $umkm->kategori) == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
                                                <option value="Lainnya" {{ old('kategori', $umkm->kategori) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
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
                                                   value="{{ old('kontak', $umkm->kontak) }}"
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
                                                      rows="4" placeholder="Deskripsi detail tentang usaha...">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
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
                                                    <small class="text-muted fw-normal">(Opsional - Kosongkan jika tidak ingin mengubah)</small>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="row g-4">
                                                    <!-- Foto Usaha -->
                                                    <div class="col-md-4">
                                                        <label for="foto_usaha" class="form-label fw-semibold">
                                                            <i class="fas fa-camera me-1 text-primary"></i>Foto Usaha
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control"
                                                                   id="foto_usaha" name="foto_usaha"
                                                                   accept="image/*">
                                                        </div>
                                                        <small class="text-muted">Format: JPG, PNG, JPEG. Maks: 2MB</small>
                                                        @error('foto_usaha')
                                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Dokumen Izin -->
                                                    <div class="col-md-4">
                                                        <label for="dokumen_izin" class="form-label fw-semibold">
                                                            <i class="fas fa-file-pdf me-1 text-primary"></i>Dokumen Izin
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control"
                                                                   id="dokumen_izin" name="dokumen_izin"
                                                                   accept=".pdf">
                                                        </div>
                                                        <small class="text-muted">Format: PDF. Maks: 5MB</small>
                                                        @error('dokumen_izin')
                                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <!-- Banner Promosi -->
                                                    <div class="col-md-4">
                                                        <label for="banner_promosi" class="form-label fw-semibold">
                                                            <i class="fas fa-images me-1 text-primary"></i>Banner Promosi
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="file" class="form-control"
                                                                   id="banner_promosi" name="banner_promosi"
                                                                   accept="image/*">
                                                        </div>
                                                        <small class="text-muted">Format: JPG, PNG. Maks: 3MB</small>
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
                                                    <i class="fas fa-redo me-2"></i>Reset
                                                </button>
                                                <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 shadow-sm">
                                                    <i class="fas fa-save me-2"></i>Simpan Perubahan
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Preview Section -->
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 20px;">
                        <!-- Current Files Preview -->
                        <div class="card border-light shadow-sm rounded-4 mb-4">
                            <div class="card-header bg-light py-3">
                                <h5 class="mb-0 fw-bold text-primary">
                                    <i class="fas fa-eye me-2"></i>File Saat Ini
                                </h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $currentFoto = \App\Models\Media::where('ref_table', 'umkm')
                                        ->where('ref_id', $umkm->umkm_id)
                                        ->where('caption', 'foto_usaha')
                                        ->first();
                                    $currentDokumen = \App\Models\Media::where('ref_table', 'umkm')
                                        ->where('ref_id', $umkm->umkm_id)
                                        ->where('caption', 'dokumen_izin')
                                        ->first();
                                    $currentBanner = \App\Models\Media::where('ref_table', 'umkm')
                                        ->where('ref_id', $umkm->umkm_id)
                                        ->where('caption', 'banner_promosi')
                                        ->first();
                                @endphp

                                <!-- Foto Usaha Preview -->
                                <div class="mb-4">
                                    <h6 class="fw-semibold mb-2">
                                        <i class="fas fa-camera me-1"></i>Foto Usaha
                                    </h6>
                                    @if($currentFoto)
                                        <div class="border rounded-3 p-3 bg-light text-center">
                                            <img src="{{ asset('storage/' . $currentFoto->file_url) }}"
                                                 class="img-fluid rounded-2 mb-2"
                                                 style="max-height: 150px; object-fit: cover;">
                                            <p class="small text-muted mb-1">File: {{ basename($currentFoto->file_url) }}</p>
                                            <a href="{{ asset('storage/' . $currentFoto->file_url) }}"
                                               target="_blank"
                                               class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-download me-1"></i>Lihat
                                            </a>
                                        </div>
                                    @else
                                        <div class="border rounded-3 p-4 bg-light text-center">
                                            <i class="fas fa-image fa-2x text-muted mb-3"></i>
                                            <p class="text-muted mb-0 small">Belum ada foto usaha</p>
                                        </div>
                                    @endif
                                </div>

                                <!-- Dokumen Izin Preview -->
                                <div class="mb-4">
                                    <h6 class="fw-semibold mb-2">
                                        <i class="fas fa-file-pdf me-1"></i>Dokumen Izin
                                    </h6>
                                    @if($currentDokumen)
                                        <div class="border rounded-3 p-3 bg-light text-center">
                                            <i class="fas fa-file-pdf fa-3x text-danger mb-2"></i>
                                            <p class="small text-muted mb-1">File: {{ basename($currentDokumen->file_url) }}</p>
                                            <a href="{{ asset('storage/' . $currentDokumen->file_url) }}"
                                               target="_blank"
                                               class="btn btn-sm btn-outline-danger">
                                                <i class="fas fa-download me-1"></i>Download
                                            </a>
                                        </div>
                                    @else
                                        <div class="border rounded-3 p-4 bg-light text-center">
                                            <i class="fas fa-file-pdf fa-2x text-muted mb-3"></i>
                                            <p class="text-muted mb-0 small">Belum ada dokumen izin</p>
                                        </div>
                                    @endif
                                </div>

                                <!-- Banner Promosi Preview -->
                                <div>
                                    <h6 class="fw-semibold mb-2">
                                        <i class="fas fa-images me-1"></i>Banner Promosi
                                    </h6>
                                    @if($currentBanner)
                                        <div class="border rounded-3 p-3 bg-light text-center">
                                            <img src="{{ asset('storage/' . $currentBanner->file_url) }}"
                                                 class="img-fluid rounded-2 mb-2"
                                                 style="max-height: 150px; object-fit: cover;">
                                            <p class="small text-muted mb-1">File: {{ basename($currentBanner->file_url) }}</p>
                                            <a href="{{ asset('storage/' . $currentBanner->file_url) }}"
                                               target="_blank"
                                               class="btn btn-sm btn-outline-info">
                                                <i class="fas fa-download me-1"></i>Lihat
                                            </a>
                                        </div>
                                    @else
                                        <div class="border rounded-3 p-4 bg-light text-center">
                                            <i class="fas fa-image fa-2x text-muted mb-3"></i>
                                            <p class="text-muted mb-0 small">Belum ada banner promosi</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Info Card -->
                        <div class="card border-light shadow-sm rounded-4">
                            <div class="card-header bg-light py-3">
                                <h5 class="mb-0 fw-bold text-primary">
                                    <i class="fas fa-info-circle me-2"></i>Informasi
                                </h5>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <i class="fas fa-calendar text-primary me-2"></i>
                                        <small class="text-muted">Dibuat:</small>
                                        <div class="fw-semibold">{{ $umkm->created_at->translatedFormat('d F Y') }}</div>
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-history text-primary me-2"></i>
                                        <small class="text-muted">Terakhir diubah:</small>
                                        <div class="fw-semibold">{{ $umkm->updated_at->translatedFormat('d F Y H:i') }}</div>
                                    </li>
                                    <li>
                                        <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                                        <small class="text-muted">Catatan: File yang diupload akan mengganti file lama</small>
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
            });
        }

        // File preview for new uploads
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
                        }
                    }
                });
            }
        });

        // Form validation
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                let isValid = true;
                const requiredFields = form.querySelectorAll('[required]');

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('is-invalid');
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('Harap isi semua field yang wajib diisi!');
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
</script>
@endpush

@endsection
