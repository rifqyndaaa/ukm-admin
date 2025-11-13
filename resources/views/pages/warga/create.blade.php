@extends('layout.app')
@section('content')

<!-- Form Section Start -->
<div class="container mt-5 mb-5 teahouse-style">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-container shadow-lg rounded-4 overflow-hidden animate__animated animate__fadeIn">

                <!-- Progress Indicator -->
                <div class="progress-indicator mb-4">
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
                <div class="form-header text-center mb-4 p-3 bg-gradient-success text-white rounded-top">
                    <h1 class="form-title mb-1 fw-bold"><i class="fas fa-user-edit me-2"></i>Tambah Data Warga</h1>
                    <p class="form-subtitle mb-0 small text-light">Lengkapi formulir di bawah untuk menambahkan data warga baru</p>
                </div>

                <div class="form-body bg-light p-4">
                    <!-- Alert Messages -->
                    @if (session('success'))
                        <div class="alert alert-success alert-custom mb-4 shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle fa-2x me-3 text-success"></i>
                                <div>
                                    <h5 class="mb-1 fw-bold">Berhasil!</h5>
                                    <p class="mb-0">{{ session('success') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-custom mb-4 shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-triangle fa-2x me-3 text-danger"></i>
                                <div>
                                    <h5 class="mb-1 fw-bold">Terjadi Kesalahan!</h5>
                                    <ul class="mb-0 ps-3 small">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('Warga.store') }}" method="POST">
                        @csrf

                        <!-- Data Pribadi Card -->
                        <div class="form-card mb-5 p-4 bg-white rounded-4 shadow-sm">
                            <h4 class="form-section-title mb-4 text-success">
                                <i class="fas fa-user-circle me-2"></i>Data Pribadi
                            </h4>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="no_ktp" class="form-label fw-semibold">
                                        <i class="fas fa-id-card me-1 text-success"></i>No KTP
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="fas fa-id-card text-muted"></i></span>
                                        <input type="text" name="no_ktp" id="no_ktp" class="form-control" value="{{ old('no_ktp') }}" required maxlength="20" placeholder="Masukkan nomor KTP">
                                    </div>
                                    @error('no_ktp')
                                        <small class="text-danger error-message mt-1 d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="nama" class="form-label fw-semibold">
                                        <i class="fas fa-user me-1 text-success"></i>Nama Lengkap
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="fas fa-user text-muted"></i></span>
                                        <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required maxlength="100" placeholder="Masukkan nama lengkap">
                                    </div>
                                    @error('nama')
                                        <small class="text-danger error-message mt-1 d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="jenis_kelamin" class="form-label fw-semibold">
                                        <i class="fas fa-venus-mars me-1 text-success"></i>Jenis Kelamin
                                    </label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <small class="text-danger error-message mt-1 d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="agama" class="form-label fw-semibold">
                                        <i class="fas fa-pray me-1 text-success"></i>Agama
                                    </label>
                                    <input type="text" name="agama" id="agama" class="form-control" value="{{ old('agama') }}" required maxlength="50" placeholder="Masukkan agama">
                                    @error('agama')
                                        <small class="text-danger error-message mt-1 d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="pekerjaan" class="form-label fw-semibold">
                                        <i class="fas fa-briefcase me-1 text-success"></i>Pekerjaan
                                    </label>
                                    <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ old('pekerjaan') }}" maxlength="100" placeholder="Masukkan pekerjaan">
                                    @error('pekerjaan')
                                        <small class="text-danger error-message mt-1 d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Data Kontak Card -->
                        <div class="form-card p-4 bg-white rounded-4 shadow-sm">
                            <h4 class="form-section-title mb-4 text-success">
                                <i class="fas fa-address-book me-2"></i>Data Kontak
                            </h4>

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="telp" class="form-label fw-semibold">
                                        <i class="fas fa-phone me-1 text-success"></i>No Telepon
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="fas fa-phone text-muted"></i></span>
                                        <input type="text" name="telp" id="telp" class="form-control" value="{{ old('telp') }}" maxlength="20" placeholder="Masukkan nomor telepon">
                                    </div>
                                    @error('telp')
                                        <small class="text-danger error-message mt-1 d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="email" class="form-label fw-semibold">
                                        <i class="fas fa-envelope me-1 text-success"></i>Alamat Email
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white"><i class="fas fa-envelope text-muted"></i></span>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" maxlength="100" placeholder="Masukkan alamat email">
                                    </div>
                                    @error('email')
                                        <small class="text-danger error-message mt-1 d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between mt-5">
                            <a href="{{ route('Warga.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill shadow-sm">
                                <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar
                            </a>
                            <button type="submit" class="btn btn-success text-white px-4 py-2 rounded-pill shadow-sm">
                                <i class="fas fa-save me-2"></i>Simpan Data Warga
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Form Section End -->

<!-- Custom Style -->
<style>
.teahouse-style {
    font-family: 'Poppins', sans-serif;
}

.bg-gradient-success {
    background: linear-gradient(90deg, #7dba28, #4caf50);
}

.form-container {
    background: #fdfdfd;
    border: 1px solid #e5e5e5;
}

.progress-indicator {
    display: flex;
    justify-content: center;
    gap: 2rem;
    padding-top: 1.5rem;
}
.progress-step {
    text-align: center;
    position: relative;
}
.progress-step .step-icon {
    width: 45px;
    height: 45px;
    background: #e0e0e0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #555;
    font-weight: bold;
    transition: all 0.3s ease;
}
.progress-step.active .step-icon {
    background: #7dba28;
    color: white;
    box-shadow: 0 4px 10px rgba(125, 186, 40, 0.3);
}
.progress-step .step-label {
    font-size: 0.9rem;
    margin-top: 0.5rem;
    color: #444;
}

.form-section-title {
    border-left: 5px solid #7dba28;
    padding-left: 10px;
    font-weight: 600;
}

.form-control:focus, .form-select:focus {
    border-color: #7dba28;
    box-shadow: 0 0 6px rgba(125, 186, 40, 0.3);
}

.btn-success {
    background: linear-gradient(90deg, #7dba28, #4caf50);
    border: none;
}
.btn-success:hover {
    background: linear-gradient(90deg, #4caf50, #388e3c);
}

.animate__animated {
    animation-duration: 0.8s;
    animation-fill-mode: both;
}
.animate__fadeIn {
    animation-name: fadeIn;
}
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(15px);}
    to {opacity: 1; transform: translateY(0);}
}
</style>

@endsection
