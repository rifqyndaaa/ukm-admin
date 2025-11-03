<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House - Tea Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('asset/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href= "{{asset('asset/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('asset/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('asset/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="index.html" class="navbar-brand">
             <!-- link foto-->
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                          <a href="{{ route('umkm.index')}}" class="nav-item nav-link">data umkm</a>
                         <a href="{{ route('about')}}" class="nav-item nav-link">About</a>
                          <a href="{{ route('product')}}" class="nav-item nav-link">Products</a>
                         <a href="{{ route('store')}}" class="nav-item nav-link">Store</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">menu</a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                              <a href="datamasyarakat" class="dropdown-item">Data Masyarakat</a>
                                <a href="datauser" class="dropdown-item">Data Users</a>
                            </div>
                        </div>
                         <a href="{{ route('create')}}" class="nav-item nav-link active">tambah umkm  </a>
                    </div>
                    <div class="border-start ps-4 d-none d-lg-block">
                        <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


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
                    <p class="mb-2">rifqiyanda@gmail.com</p>
                    <p class="mb-0">sukra@gmail.com</p>
                </div>
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="btn-square mx-auto mb-3">
                        <i class="fa fa-phone fa-2x text-white"></i>
                    </div>
                    <p class="mb-2">+08292424242</p>
                    <p class="mb-0">+084367890</p>
                </div>
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                    <div class="btn-square mx-auto mb-3">
                        <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                    </div>
                    <p class="mb-2">123 jalaan</p>
                    <p class="mb-0">umban sari atas,USA</p>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h3 class="mb-4">Deskripsi</h3>
                    <p class="mb-4">Formulir ini dirancang agar mudah digunakan oleh masyarakat sehingga proses pendataan menjadi lebih cepat dan efisien. Data yang terkumpul dapat dimanfaatkan untuk pembinaan, promosi digital, serta program bantuan bagi pelaku UMKM. Selain itu, sistem ini juga mendukung digitalisasi pendataan usaha dan membantu pemerintah dalam memetakan serta mengembangkan potensi ekonomi masyarakat secara lebih terarah.
                   <form method="POST" action="{{ route('umkm.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">

        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama Usaha" required>
                <label for="nama_usaha">Nama Usaha</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="number" class="form-control" id="pemilik_warga_id" name="pemilik_warga_id" placeholder="ID Pemilik Warga" required>
                <label for="pemilik_warga_id">ID Pemilik Warga</label>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-floating">
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Lengkap" required>
                <label for="alamat">Alamat</label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" class="form-control" id="rt" name="rt" placeholder="RT">
                <label for="rt">RT</label>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-floating">
                <input type="text" class="form-control" id="rw" name="rw" placeholder="RW">
                <label for="rw">RW</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori Usaha">
                <label for="kategori">Kategori</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Kontak (Telepon / WA)">
                <label for="kontak">Kontak</label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Deskripsi usaha" id="deskripsi" name="deskripsi" style="height: 120px"></textarea>
                <label for="deskripsi">Deskripsi Usaha</label>
            </div>
        </div>

        <div class="col-md-4">
            <label for="foto_usaha" class="form-label">Foto Usaha</label>
            <input class="form-control" type="file" id="foto_usaha" name="foto_usaha" accept="image/*">
        </div>

        <div class="col-md-4">
            <label for="dokumen_izin" class="form-label">Dokumen Izin (PDF)</label>
            <input class="form-control" type="file" id="dokumen_izin" name="dokumen_izin" accept=".pdf">
        </div>

        <div class="col-md-4">
            <label for="banner_promosi" class="form-label">Banner Promosi</label>
            <input class="form-control" type="file" id="banner_promosi" name="banner_promosi" accept="image/*">
        </div>

        <div class="col-12">
            <button class="btn btn-primary rounded-pill py-3 px-5 mt-3" type="submit">
                Simpan Data UMKM
            </button>
        </div>
    </div>
</form>











    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('asset/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('asset/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('asset/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('asset/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('asset/js/main.js')}}"></script>
</body>


</html>

