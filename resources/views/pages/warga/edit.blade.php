@extends('layout.app')
@section('content')

<!-- Enhanced UMKM Data Section -->
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-success bg-gradient text-white text-center py-3">
            <h2 class="mb-0"><i class="fas fa-users me-2"></i>Data Warga</h2>
        </div>

        <div class="card-body p-4 p-md-5">

            <h3 class="mb-4 text-center text-success fw-bold">
                <i class="fas fa-user-plus me-2"></i>Tambah Data Warga
            </h3>

            {{-- Tampilkan pesan sukses/error --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-exclamation-triangle me-2"></i>Terjadi kesalahan!</strong>
                    <ul class="mb-0 mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Form tambah data --}}
            <form action="{{ route('Warga.store') }}" method="POST" class="wow fadeInUp" data-wow-delay="0.2s">
                @csrf

                <div class="row g-3">

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="no_ktp" id="no_ktp" class="form-control"
                                value="{{ old('no_ktp') }}" required maxlength="20" placeholder="No KTP">
                            <label for="no_ktp">No KTP</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="nama" id="nama" class="form-control"
                                value="{{ old('nama') }}" required maxlength="100" placeholder="Nama Lengkap">
                            <label for="nama">Nama Lengkap</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-select" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="agama" id="agama" class="form-control"
                                value="{{ old('agama') }}" required maxlength="50" placeholder="Agama">
                            <label for="agama">Agama</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                                value="{{ old('pekerjaan') }}" maxlength="100" placeholder="Pekerjaan">
                            <label for="pekerjaan">Pekerjaan</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" name="telp" id="telp" class="form-control"
                                value="{{ old('telp') }}" maxlength="20" placeholder="No Telepon">
                            <label for="telp">No Telepon</label>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="email" name="email" id="email" class="form-control"
                                value="{{ old('email') }}" maxlength="100" placeholder="Alamat Email">
                            <label for="email">Alamat Email</label>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-4">
                        <button type="submit" class="btn btn-success px-5 py-2 rounded-pill shadow-sm me-2">
                            <i class="fas fa-save me-2"></i>Simpan
                        </button>
                        <a href="{{ route('Warga.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal for Image Preview -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="imageModalLabel"><i class="fas fa-image me-2"></i>Preview Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalImage" src="" alt="Preview" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

<!-- ===== Tambahan CSS agar tampil lebih modern ===== -->
<style>
    .card {
        background: #ffffffc9;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 25px rgba(0, 0, 0, 0.12);
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        border: 1px solid #ced4da;
        transition: 0.2s all ease-in-out;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #198754;
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
    }

    .btn-success {
        background-color: #198754;
        border-color: #198754;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background-color: #157347;
        border-color: #146c43;
        transform: scale(1.03);
    }

    .btn-outline-secondary:hover {
        background-color: #f8f9fa;
        transform: scale(1.03);
    }

    label {
        color: #444;
    }

    h2, h3 {
        letter-spacing: 0.5px;
    }
</style>

@endsection
