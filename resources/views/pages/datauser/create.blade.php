@extends('layout.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <!-- Header Section -->
            <div class="text-center mb-5">
                <h1 class="fw-bold text-dark mb-3">
                    <span class="position-relative">
                        Tambah User Baru
                        <span class="position-absolute bottom-0 start-50 translate-middle-x bg-primary"
                              style="width: 80px; height: 3px;"></span>
                    </span>
                </h1>
                <p class="text-muted fs-5">Lengkapi form berikut untuk menambahkan user baru ke sistem</p>
            </div>

            <!-- Form Card -->
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <!-- Form Header -->
                <div class="card-header bg-white border-0 py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="icon-wrapper bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                            <i class="fas fa-user-plus fa-2x text-primary"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-1">Form Pendaftaran User</h3>
                            <p class="text-muted mb-0">Semua field bertanda * wajib diisi</p>
                        </div>
                    </div>
                </div>

                <!-- Form Body -->
                <div class="card-body p-5">
                    @if ($errors->any())
                    <div class="alert alert-light alert-dismissible fade show border-start border-4 border-danger shadow-sm mb-5" role="alert">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-danger fa-lg mt-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="alert-heading fw-bold text-dark mb-2">Terjadi kesalahan!</h6>
                                <div class="row">
                                    @foreach ($errors->all() as $err)
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-start mb-2">
                                            <i class="fas fa-circle text-danger fa-xs mt-1 me-2"></i>
                                            <span class="text-dark">{{ $err }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('User.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf

                        <!-- Personal Information Section -->
                        <div class="section-title mb-4">
                            <h5 class="fw-bold text-dark d-flex align-items-center">
                                <span class="bg-primary bg-opacity-10 p-2 rounded-2 me-3">
                                    <i class="fas fa-user-circle text-primary"></i>
                                </span>
                                Informasi Personal
                            </h5>
                        </div>

                        <div class="row g-4 mb-5">
                            <!-- Nama Lengkap -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="namaInput" class="form-label fw-semibold text-dark mb-2">
                                        Nama Lengkap <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-user text-primary"></i>
                                        </span>
                                        <input type="text" name="name" id="namaInput"
                                               class="form-control border-start-0 ps-3 @error('name') is-invalid @enderror"
                                               value="{{ old('name') }}"
                                               placeholder="Masukkan nama lengkap"
                                               required>
                                        @error('name')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="emailInput" class="form-label fw-semibold text-dark mb-2">
                                        Email <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-envelope text-primary"></i>
                                        </span>
                                        <input type="email" name="email" id="emailInput"
                                               class="form-control border-start-0 ps-3 @error('email') is-invalid @enderror"
                                               value="{{ old('email') }}"
                                               placeholder="contoh@email.com"
                                               required>
                                        @error('email')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Account Information Section -->
                        <div class="section-title mb-4">
                            <h5 class="fw-bold text-dark d-flex align-items-center">
                                <span class="bg-primary bg-opacity-10 p-2 rounded-2 me-3">
                                    <i class="fas fa-key text-primary"></i>
                                </span>
                                Informasi Akun
                            </h5>
                        </div>

                        <div class="row g-4 mb-5">
                            <!-- Password -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="passwordInput" class="form-label fw-semibold text-dark mb-2">
                                        Password <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-primary"></i>
                                        </span>
                                        <input type="password" name="password" id="passwordInput"
                                               class="form-control border-start-0 ps-3 @error('password') is-invalid @enderror"
                                               placeholder="Minimal 8 karakter"
                                               required>
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        @error('password')
                                        <div class="invalid-feedback">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Konfirmasi Password -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="passwordConfirmInput" class="form-label fw-semibold text-dark mb-2">
                                        Konfirmasi Password <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">
                                            <i class="fas fa-lock text-primary"></i>
                                        </span>
                                        <input type="password" name="password_confirmation" id="passwordConfirmInput"
                                               class="form-control border-start-0 ps-3"
                                               placeholder="Ulangi password"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <!-- Role -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label fw-semibold text-dark mb-2">
                                        Role Pengguna <span class="text-danger">*</span>
                                    </label>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <input type="radio" class="btn-check" name="role"
                                                   id="roleAdmin" value="admin"
                                                   {{ old('role') == 'admin' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-primary w-100 h-100 py-3" for="roleAdmin">
                                                <i class="fas fa-crown fa-2x mb-2"></i>
                                                <h6 class="fw-bold mb-1">Admin</h6>
                                                <p class="small text-muted mb-0">Akses penuh sistem</p>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" class="btn-check" name="role"
                                                   id="roleUser" value="user"
                                                   {{ old('role') == 'user' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-success w-100 h-100 py-3" for="roleUser">
                                                <i class="fas fa-user fa-2x mb-2"></i>
                                                <h6 class="fw-bold mb-1">User</h6>
                                                <p class="small text-muted mb-0">Akses terbatas</p>
                                            </label>
                                        </div>
                                    </div>
                                    @error('role')
                                    <div class="text-danger small mt-2">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Photo Section -->
                        <div class="section-title mb-4">
                            <h5 class="fw-bold text-dark d-flex align-items-center">
                                <span class="bg-primary bg-opacity-10 p-2 rounded-2 me-3">
                                    <i class="fas fa-camera text-primary"></i>
                                </span>
                                Foto Profil
                            </h5>
                            <p class="text-muted small mb-0">Opsional - Unggah foto profil untuk user</p>
                        </div>

                        <div class="mb-5">
                            <div class="file-upload-wrapper">
                                <input type="file" name="foto" id="fotoInput"
                                       class="form-control d-none" accept="image/*">
                                <label for="fotoInput" class="upload-area text-center p-5 rounded-3 border-2 border-dashed cursor-pointer d-block">
                                    <div class="upload-icon mb-3">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-muted"></i>
                                    </div>
                                    <h6 class="fw-semibold text-dark mb-2">Klik untuk mengunggah foto</h6>
                                    <p class="text-muted small mb-0">Format: JPG, PNG, GIF (Maks. 2MB)</p>
                                </label>

                                <!-- Preview Image -->
                                <div class="preview-area mt-3 text-center d-none" id="previewArea">
                                    <div class="d-inline-block position-relative">
                                        <img id="imagePreview" class="rounded-3 shadow-sm"
                                             width="150" height="150"
                                             style="object-fit: cover;">
                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-2"
                                                onclick="removeImage()">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="border-top pt-5 mt-4">
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('User.index') }}"
                                   class="btn btn-outline-secondary px-4 py-2 d-flex align-items-center">
                                    <i class="fas fa-arrow-left me-2"></i>
                                    Kembali ke Daftar
                                </a>
                                <div class="d-flex gap-3">
                                    <button type="reset"
                                            class="btn btn-outline-dark px-4 py-2 d-flex align-items-center">
                                        <i class="fas fa-redo me-2"></i>
                                        Reset Form
                                    </button>
                                    <button type="submit"
                                            class="btn btn-primary px-5 py-2 d-flex align-items-center shadow-sm">
                                        <i class="fas fa-save me-2"></i>
                                        Simpan User
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <!-- Help Card -->
            <div class="card border-0 shadow-sm mt-4">
                <div class="card-body p-4">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <div class="bg-warning bg-opacity-10 p-3 rounded-3">
                                <i class="fas fa-lightbulb text-warning fa-lg"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="fw-bold text-dark mb-3">Tips Penting</h6>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span class="small">Gunakan email aktif</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span class="small">Password yang kuat</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-success me-2"></i>
                                        <span class="small">Pilih role dengan tepat</span>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    .section-title {
        position: relative;
        padding-left: 1rem;
    }
    .section-title::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 4px;
        height: 24px;
        background: linear-gradient(to bottom, var(--bs-primary), var(--bs-info));
        border-radius: 2px;
    }
    .btn-check:checked + .btn {
        border-color: var(--bs-primary);
        background-color: rgba(var(--bs-primary-rgb), 0.1);
        color: var(--bs-primary);
    }
    .btn-check:checked + .btn-outline-success {
        border-color: var(--bs-success);
        background-color: rgba(var(--bs-success-rgb), 0.1);
        color: var(--bs-success);
    }
    .upload-area {
        transition: all 0.3s ease;
        background-color: #f8f9fa;
    }
    .upload-area:hover {
        background-color: #e9ecef;
        border-color: var(--bs-primary) !important;
    }
    .cursor-pointer {
        cursor: pointer;
    }
    .border-dashed {
        border-style: dashed !important;
        border-width: 2px !important;
    }
    .input-group-text {
        transition: all 0.3s ease;
    }
    .form-control:focus + .input-group-text {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    .preview-area img {
        transition: transform 0.3s ease;
    }
    .preview-area img:hover {
        transform: scale(1.05);
    }
</style>
@endpush

@push('scripts')
<script>
    // Toggle Password Visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('passwordInput');
        const icon = this.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    });

    // Image Preview
    document.getElementById('fotoInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran file maksimal 2MB');
                this.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').src = e.target.result;
                document.getElementById('previewArea').classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        }
    });

    function removeImage() {
        document.getElementById('fotoInput').value = '';
        document.getElementById('previewArea').classList.add('d-none');
    }

    // Form Validation
    (function () {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
@endpush
@endsection
