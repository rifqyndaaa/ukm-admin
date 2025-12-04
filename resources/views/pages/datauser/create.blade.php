@extends('layout.app')

@section('content')
<div class="container mt-5 mb-5 teahouse-style">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden animate__animated animate__fadeIn">
                <div class="card-header card-header-custom text-white text-center py-4 bg-gradient-primary">
                    <h2 class="mb-0"><i class="fas fa-user-plus me-2"></i>Tambah User UMKM</h2>
                </div>
                <div class="card-body p-4 bg-light">
                    <div class="form-section">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('User.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            {{-- Nama --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control"
                                       value="{{ old('name') }}" placeholder="Masukkan nama lengkap">
                            </div>

                            {{-- Email --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" name="email" class="form-control"
                                       value="{{ old('email') }}" placeholder="Masukkan email">
                            </div>

                            {{-- Password --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukkan password">
                            </div>

                            {{-- ROLE (BARU DITAMBAHKAN) --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Role</label>
                                <select name="role" class="form-control">
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>

                            {{-- Foto --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Foto Profil (opsional)</label>
                                <input type="file" name="foto" class="form-control">
                            </div>

                            <div class="d-flex justify-content-between mt-5">
                                <a href="{{ route('User.index') }}" class="btn btn-outline-secondary px-4">Kembali</a>
                                <button type="submit" class="btn btn-primary px-4">Simpan User</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
