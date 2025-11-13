@extends('layout.app')

@section('content')
<!-- Form Section Start -->
<div class="container mt-5 mb-5 teahouse-style">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden animate__animated animate__fadeIn">
                <div class="card-header card-header-custom text-white text-center py-4 bg-gradient-primary">
                    <h2 class="mb-0"><i class="fas fa-user-plus me-2"></i>Tambah User UMKM</h2>
                </div>
                <div class="card-body p-4 bg-light">
                    <div class="form-section">
                        <div class="form-header text-center mb-4">
                            <h4 class="text-dark mb-1 fw-bold">Form Pendaftaran User Baru</h4>
                            <p class="text-muted small">Isi data dengan lengkap dan benar</p>
                            <hr class="mx-auto" style="width: 60px; height: 3px; background: #7dba28; border: none;">
                        </div>

                        <form action="{{ route('User.store') }}" method="POST">
                            @csrf

                            <!-- Nama Field -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold"><i class="fas fa-user form-icon me-2 text-success"></i>Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-user text-muted"></i></span>
                                    <input type="text" name="name" class="form-control border-start-0 rounded-end" value="{{ old('name') }}" placeholder="Masukkan nama lengkap">
                                </div>
                                @error('name')
                                    <small class="text-danger error-message d-block mt-2">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold"><i class="fas fa-envelope me-2 text-success"></i>Alamat Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                    <input type="email" name="email" class="form-control border-start-0 rounded-end" value="{{ old('email') }}" placeholder="contoh: info@smail.com">
                                </div>
                                @error('email')
                                    <small class="text-danger error-message d-block mt-2">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold"><i class="fas fa-lock me-2 text-success"></i>Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0"><i class="fas fa-key text-muted"></i></span>
                                    <input type="password" name="password" class="form-control border-start-0 rounded-end" id="password" placeholder="Masukkan password">
                                    <span class="input-group-text password-toggle bg-white" id="togglePassword" style="cursor: pointer;">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <small class="text-danger error-message d-block mt-2">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-between mt-5">
                                <a href="{{ route('User.index') }}" class="btn btn-back btn-outline-secondary px-4 py-2 rounded-pill shadow-sm">
                                    <i class="fas fa-arrow-left me-2"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-submit text-white px-4 py-2 rounded-pill shadow-sm">
                                    <i class="fas fa-save me-2"></i>Simpan User
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahan Style -->
<style>
.teahouse-style {
    font-family: "Poppins", sans-serif;
}

.bg-gradient-primary {
    background: linear-gradient(90deg, #81c784, #4caf50);
}

.card {
    transition: all 0.3s ease;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.1);
}

.form-control:focus {
    border-color: #7dba28;
    box-shadow: 0 0 5px rgba(125, 186, 40, 0.3);
}

.btn-submit {
    background: linear-gradient(90deg, #7dba28, #4caf50);
    border: none;
}
.btn-submit:hover {
    background: linear-gradient(90deg, #4caf50, #388e3c);
}

.password-toggle:hover {
    color: #4caf50;
}

.animate__animated {
    animation-duration: 0.8s;
    animation-fill-mode: both;
}
.animate__fadeIn {
    animation-name: fadeIn;
}
@keyframes fadeIn {
    from {opacity: 0; transform: translateY(10px);}
    to {opacity: 1; transform: translateY(0);}
}
</style>

<!-- Script Show/Hide Password -->
<script>
document.getElementById("togglePassword").addEventListener("click", function() {
    const passwordInput = document.getElementById("password");
    const icon = document.getElementById("toggleIcon");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
    } else {
        passwordInput.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
    }
});
</script>
@endsection
