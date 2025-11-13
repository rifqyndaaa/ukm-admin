@extends('layout.app')

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5">
        <h1 class="display-2 text-dark mb-4 animated slideInDown">Contact Us</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl contact py-5">
    <div class="container">
        <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <p class="fs-5 fw-medium fst-italic text-primary">Contact Us</p>
            <h1 class="display-6">If You Have Any Query, Please Contact Us</h1>
        </div>

        <div class="row g-5 mb-5">
            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                <div class="btn-square mx-auto mb-3">
                    <i class="fa fa-envelope fa-2x text-white"></i>
                </div>
                <p class="mb-2">info@example.com</p>
                <p class="mb-0">support@example.com</p>
            </div>
            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                <div class="btn-square mx-auto mb-3">
                    <i class="fa fa-phone fa-2x text-white"></i>
                </div>
                <p class="mb-2">+012 345 67890</p>
                <p class="mb-0">+012 345 67890</p>
            </div>
            <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="btn-square mx-auto mb-3">
                    <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                </div>
                <p class="mb-2">123 Street</p>
                <p class="mb-0">New York, USA</p>
            </div>
        </div>

        <div class="row g-5 justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.2s">
                <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5 bg-light">
                    <h3 class="mb-4 text-center text-primary fw-bold">Formulir Pembaruan Data UMKM</h3>

                    <form method="POST" action="{{ route('Umkm.update', $umkm) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha"
                                        value="{{ $umkm->nama_usaha }}" placeholder="Nama Usaha" required>
                                    <label for="nama_usaha">Nama Usaha</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="pemilik_warga_id" name="pemilik_warga_id"
                                        value="{{ $umkm->pemilik_warga_id }}" placeholder="ID Pemilik Warga" required>
                                    <label for="pemilik_warga_id">ID Pemilik Warga</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        value="{{ $umkm->alamat }}" placeholder="Alamat Lengkap" required>
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="rt" name="rt" value="{{ $umkm->rt }}"
                                        placeholder="RT">
                                    <label for="rt">RT</label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="rw" name="rw" value="{{ $umkm->rw }}"
                                        placeholder="RW">
                                    <label for="rw">RW</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kategori" name="kategori"
                                        value="{{ $umkm->kategori }}" placeholder="Kategori Usaha">
                                    <label for="kategori">Kategori</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="kontak" name="kontak"
                                        value="{{ $umkm->kontak }}" placeholder="Kontak (Telepon / WA)">
                                    <label for="kontak">Kontak</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Deskripsi usaha" id="deskripsi"
                                        name="deskripsi" style="height: 120px">{{ $umkm->deskripsi }}</textarea>
                                    <label for="deskripsi">Deskripsi Usaha</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="foto_usaha" class="form-label">Foto Usaha</label>
                                <input class="form-control" type="file" id="foto_usaha" name="foto_usaha"
                                    accept="image/*">
                            </div>

                            <div class="col-md-4">
                                <label for="dokumen_izin" class="form-label">Dokumen Izin (PDF)</label>
                                <input class="form-control" type="file" id="dokumen_izin" name="dokumen_izin"
                                    accept=".pdf">
                            </div>

                            <div class="col-md-4">
                                <label for="banner_promosi" class="form-label">Banner Promosi</label>
                                <input class="form-control" type="file" id="banner_promosi" name="banner_promosi"
                                    accept="image/*">
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary rounded-pill py-3 px-5 mt-3 shadow-sm" type="submit">
                                    Simpan Data UMKM
                                </button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end card -->
            </div>
        </div>
    </div>
</div>

<!-- Tambahan CSS agar tampilan lebih modern -->
<style>
    .card {
        background: #ffffffc9;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }

    .form-control {
        border-radius: 12px;
        border: 1px solid #ced4da;
        transition: all 0.2s ease-in-out;
    }

    .form-control:focus {
        border-color: #86b817;
        box-shadow: 0 0 0 0.2rem rgba(134, 184, 23, 0.25);
    }

    .btn-primary {
        background-color: #86b817;
        border-color: #86b817;
    }

    .btn-primary:hover {
        background-color: #6fa214;
        border-color: #6fa214;
    }

    label.form-label {
        font-weight: 500;
        color: #333;
    }
</style>

@endsection
