<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House - Tea Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="asset/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="asset/lib/animateanimate.min.css" rel="stylesheet">
    <link href="asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet">

    <!-- TAMBAHAN: CSS untuk Floating WhatsApp Button -->
    <style>
        /* Styling Floating WhatsApp Button */
        #whatsapp-float {
            position: fixed; /* Membuat tombol melayang */
            bottom: 20px; /* Jarak dari bawah layar */
            right: 20px; /* Jarak dari kanan layar */
            width: 60px;
            height: 60px;
            background-color: #25d366; /* Warna hijau WhatsApp */
            border-radius: 50%; /* Membuat bulat */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Bayangan untuk efek melayang */
            transition: transform 0.3s ease; /* Animasi hover */
            z-index: 1000; /* Pastikan di atas elemen lain */
            text-decoration: none; /* Hapus garis bawah link */
        }

        #whatsapp-float:hover {
            transform: scale(1.1); /* Membesar saat hover */
        }

        #whatsapp-float i {
            color: white; /* Warna ikon putih */
            font-size: 24px; /* Ukuran ikon */
        }

        /* Responsivitas untuk mobile */
        @media (max-width: 768px) {
            #whatsapp-float {
                bottom: 15px;
                right: 15px;
                width: 50px;
                height: 50px;
            }
            #whatsapp-float i {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="index.html" class="navbar-brand">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('umkm.index') }}" class="nav-item nav-link active">data umkm</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('product') }}"class="nav-item nav-link">Products</a>
                        <a href="{{ route('store') }}"class="nav-item nav-link">Store</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">menu lainya</a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                                <a href="datamasyarakat" class="dropdown-item">Data Masyarakat</a>
                                <a href="datauser" class="dropdown-item">Data Users</a>
                            </div>
                        </div>
                        <a href="{{ route('create') }}" class="nav-item nav-link">tambah umkm</a>
                    </div>
                    <div class="border-start ps-4 d-none d-lg-block">
                        <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <div class="container mt-4">
        <h2>Data UMKM</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

    <!-- Enhanced UMKM Data Section -->
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-gradient-primary text-white text-center py-3">
            <h2 class="mb-0"><i class="fas fa-store me-2"></i>Data UMKM</h2>
        </div>
        <div class="card-body">



            <a href="{{ route('create') }}" class="btn btn-primary mb-4 rounded-pill px-4 py-2 shadow-sm">
                <i class="fas fa-plus-circle me-2"></i>Tambah UMKM
            </a>

            <div class="table-responsive">
                <table id="umkmTable" class="table table-hover table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>NO</th>
                            <th>Nama Usaha</th>
                            <th>Pemilik</th>
                            <th>Alamat</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Kategori</th>
                            <th>Kontak</th>
                            <th>Deskripsi</th>
                            <th>Foto Usaha</th>
                            <th>Dokumen Izin</th>
                            <th>Banner Promosi</th>
                            <th>Tanggal Terbuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataUmkm as $item)
                            <tr>
                                <td>{{ $item->umkm_id }}</td>
                                <td><strong class="text-primary">{{ $item->nama_usaha }}</strong></td>
                                <td>{{ $item->pemilik_warga_id }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->rt }}</td>
                                <td>{{ $item->rw }}</td>
                                <td><span class="badge bg-info">{{ $item->kategori }}</span></td>
                                <td>{{ $item->kontak }}</td>
                                <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                                <td>
                                    @if ($item->foto_usaha)
                                        <img src="{{ asset('storage/' . $item->foto_usaha) }}" alt="Foto Usaha" width="80" class="img-thumbnail rounded shadow-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="{{ asset('storage/' . $item->foto_usaha) }}" style="cursor: pointer;">
                                    @else
                                        <span class="text-muted"><i class="fas fa-image"></i> Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->dokumen_izin)
                                        <a href="{{ asset('storage/' . $item->dokumen_izin) }}" target="_blank" class="btn btn-sm btn-outline-info rounded-pill">
                                            <i class="fas fa-file-alt me-1"></i>Lihat
                                        </a>
                                    @else
                                        <span class="text-muted"><i class="fas fa-file"></i> Tidak ada</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->banner_promosi)
                                        <img src="{{ asset('storage/' . $item->banner_promosi) }}" alt="Banner" width="80" class="img-thumbnail rounded shadow-sm" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="{{ asset('storage/' . $item->banner_promosi) }}" style="cursor: pointer;">
                                    @else
                                        <span class="text-muted"><i class="fas fa-image"></i> Tidak ada</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('umkm.edit', $item) }}" class="btn btn-sm btn-warning rounded-pill me-1" data-bs-toggle="tooltip" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('umkm.destroy', $item) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger rounded-pill" data-bs-toggle="tooltip" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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

<!-- Add this to the head section of your HTML -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<!-- Add this script at the end of your body -->
<script>
    $(document).ready(function() {
        $('#umkmTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json"
            },
            "pageLength": 10,
            "ordering": true,
            "searching": true,
            "paging": true,
            "responsive": true
        });

        // Initialize tooltips
        $('[data-bs-toggle="tooltip"]').tooltip();

        // Modal image preview
        $('#imageModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var src = button.data('src');
            var modal = $(this);
            modal.find('#modalImage').attr('src', src);
        });
    });
</script>

<!-- Custom CSS for additional styling -->
<style>
    .bg-gradient-primary {
        background: linear-gradient(45deg, #61ff76, #25fd98);
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1);
        transform: scale(1.01);
        transition: all 0.3s ease;
    }
    .img-thumbnail:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }
    .btn-group .btn {
        margin-right: 2px;
    }
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    .card-header {
        border-bottom: none;
    }
</style>

            </tbody>
        </table>
    </div>5






    <!-- Products Start -->
    <div class="container-fluid product py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Umkm Products</p>
                <h1 class="display-6">products good branding on the body</h1>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                <a href="" class="d-block product-item rounded">
                    <img src="asset/img/product-1.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Green Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat
                            ipsum</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="asset/img/product-2.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Black Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat
                            ipsum</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="asset/img/product-3.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Spiced Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat
                            ipsum</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="asset/img/product-4.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Organic Tea</h4>
                        <span class="text-body">Diam dolor diam ipsum sit diam amet diam et eos. Clita erat
                            ipsum</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- TAMBAHAN: Floating WhatsApp Button -->
    <a href="https://wa.me/08978350675?text=Halo%20saya%20ingin%20bertanya%20tentang%20UMKM" id="whatsapp-float" target="_blank" aria-label="Hubungi via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="asset/lib/easing/easing.min.js"></script>
    <script src="asset/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/ib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="asset/js/main.js"></script>
</body>

</html>
