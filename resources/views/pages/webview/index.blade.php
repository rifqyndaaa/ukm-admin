@extends('layout.app')

@section('content')

    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('asset/img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">Welcome to <strong class="text-dark"> Umkm produks </strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Organic & Quality Production</h1>
                                    <a href="" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('asset/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <p class="fs-4 text-white animated zoomIn">Welcome to <strong class="text-dark">TEA House</strong></p>
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Organic & Quality Tea Production</h1>
                                    <a href="" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


     <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Gallery Section -->
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <div class="position-relative overflow-hidden rounded-4 mb-3 wow fadeIn" data-wow-delay="0.1s">
                                <img class="img-fluid w-100 object-fit-cover bg-white shadow-sm"
                                     src="asset/img/about-1.jpg"
                                     alt="Produk UMKM 1"
                                     style="height: 280px;">
                            </div>
                            <div class="position-relative overflow-hidden rounded-4 wow fadeIn" data-wow-delay="0.2s">
                                <img class="img-fluid w-50 object-fit-cover bg-white shadow-sm"
                                     src="asset/img/about-3.jpg"
                                     alt="Produk UMKM 3"
                                     style="height: 200px;">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="position-relative overflow-hidden rounded-4 mb-3 wow fadeIn" data-wow-delay="0.3s">
                                <img class="img-fluid w-50 object-fit-cover bg-white shadow-sm"
                                     src="asset/img/about-4.jpeg"
                                     alt="Produk UMKM 4"
                                     style="height: 200px;">
                            </div>
                            <div class="position-relative overflow-hidden rounded-4 wow fadeIn" data-wow-delay="0.4s">
                                <img class="img-fluid w-100 object-fit-cover bg-white shadow-sm"
                                     src="asset/img/about-2.jpg"
                                     alt="Produk UMKM 2"
                                     style="height: 280px;">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title mb-5">
                        <p class="fs-5 fw-medium fst-italic text-primary">Tentang Usaha</p>
                        <h1 class="display-6 mb-4">
                            Lapak UMKM: Lebih Dari Sekadar Tempat Berbelanja
                        </h1>
                        <p class="lead lh-base text-muted mb-0">
                            Kami adalah ruang bagi kreativitas dan keahlian pengrajin lokal. Setiap produk dipilih
                            dengan teliti, tidak hanya untuk menampilkan kualitas tinggi dan keindahan, tetapi juga
                            untuk menceritakan dedikasi dan inovasi di baliknya. Dari desain hingga detail terakhir,
                            setiap item menghadirkan keseimbangan antara estetika, fungsi, dan identitas budaya.
                        </p>
                    </div>

                    <!-- First Feature -->
                    <div class="row g-4 mb-5">
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100 rounded-3 shadow"
                                 src="asset/img/about-5.jpeg"
                                 alt="Hidangan Tradisional">
                        </div>
                        <div class="col-sm-8">
                            <h5 class="fw-bold">Hidangan Tradisional dengan Sentuhan Berkelas</h5>
                            <p class="mb-0 text-muted lh-base">
                                Setiap hidangan kami adalah warisan rasa yang terjaga: dibuat dari bahan terbaik,
                                diracik dengan kehangatan rumah, dan disajikan dengan nuansa elegan yang memanjakan hati.
                            </p>
                        </div>
                    </div>

                    <!-- Second Feature -->
                    <div class="row g-4">
                        <div class="col-sm-8">
                            <h5 class="fw-bold">Batik: Puisi yang Ditulis di Atas Kain</h5>
                            <p class="mb-0 text-muted lh-base">
                                Batik bagi kami bukan sekadar busana—ia adalah cerita yang ditorehkan dengan hening,
                                dirajut oleh tangan-tangan yang sabar, dan diwariskan melalui motif penuh makna.
                                Setiap helai kainnya memancarkan keanggunan yang megah dalam filosofi yang tersimpan di dalamnya.
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100 rounded-3 shadow"
                                 src="{{ asset('asset/img/about-6.jpg') }}"
                                 alt="Batik Premium">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Products Start -->
    <div class="container-fluid product py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Our Products</p>
                <h1 class="display-6">Tea has a complex positive effect on the body</h1>
            </div>
            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">
                <a href="" class="d-block product-item rounded">
                    <img src="{{ asset('asset/img/product-1.jpg') }}" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Bakso Mercon Pedas</h4>
                        <span class="text-body">Bakso pedas dengan sambal melimpah, rasa kuat dan cocok untuk pecinta makanan pedas.</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="{{ asset('asset/img/product-2.jpg') }}" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Layanan Barbershop</h4>
                        <span class="text-body">Jasa cukur dan perawatan rambut profesional dengan suasana interior yang elegan dan nyaman</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="{{ asset('asset/img/product-3.jpg') }}" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Sate Ayam Nusantara</h4>
                        <span class="text-body">Sate ayam dengan bumbu kacang kaya rempah, disajikan bersama ketupat dan acar segar</span>
                    </div>
                </a>
                <a href="" class="d-block product-item rounded">
                    <img src="{{ asset('asset/img/product-4.jpg') }}" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Kerajinan</h4>
                        <span class="text-body">Produk kerajinan tangan berkualitas, dibuat dengan detail dan kreativitas tinggi</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Products End -->


    <!-- Article Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid" src="{{ asset('asset/img/article.jpeg') }}" alt="">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Featured Acticle</p>
                        <h1 class="display-6">The history of tea leaf in the world</h1>
                    </div>
                    <p class="mb-4">Peran UMKM dalam Mendorong Perekonomian Lokal
UMKM memiliki peran penting dalam meningkatkan kesejahteraan masyarakat dan membuka lapangan kerja. Melalui kreativitas dan inovasi, UMKM mampu menghadirkan produk berkualitas yang bernilai lokal dan berdaya saing.</p>
                    <p class="mb-4">Dengan dukungan teknologi dan pemasaran digital, UMKM kini dapat menjangkau pasar yang lebih luas. Website menjadi salah satu sarana efektif untuk memperkenalkan produk, membangun kepercayaan pelanggan, dan mengembangkan usaha secara berkelanjutan.</p>
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Article End -->

    <!-- Video Modal Start -->
    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Youtube Video</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->
    <!-- Store Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Online Store</p>
                <h1 class="display-6">bebapa toko online yang tersedia</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="asset/img/store-product-1.jpeg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">toko obatan</h4>
                            <p>Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="asset/img/store-product-2.jpeg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">toko buah</h4>
                            <p>Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="store-item position-relative text-center">
                        <img class="img-fluid" src="asset/img/store-product-3.jpeg" alt="">
                        <div class="p-4">
                            <div class="text-center mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h4 class="mb-3">Gerai majalah</h4>
                            <p>Aliqu diam amet diam et eos. Clita erat ipsum lorem erat ipsum lorem sit sed</p>
                            <h4 class="text-primary">$19.00</h4>
                        </div>
                        <div class="store-overlay">
                            <a href="" class="btn btn-primary rounded-pill py-2 px-4 m-2">More Detail <i class="fa fa-arrow-right ms-2"></i></a>
                            <a href="" class="btn btn-dark rounded-pill py-2 px-4 m-2">Add to Cart <i class="fa fa-cart-plus ms-2"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a href="" class="btn btn-primary rounded-pill py-3 px-5">View More Products</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Store End -->


    <!-- Testimonial Start -->
    <div class="container-fluid testimonial py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-white">Testimonial</p>
                <h1 class="display-6">apa saja pendapat anda menegnai website kami</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.5s">
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">Website membantu UMKM terlihat lebih profesional
Dengan website, UMKM tampak lebih terpercaya dan serius di mata pelanggan dibandingkan hanya mengandalkan media sosial.</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="{{ asset('asset/img/testimonial-1.jpg') }}" alt="">
                        <div class="text-start ms-3">
                            <h5>abinay</h5>
                            <span class="text-primary">Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">Website memudahkan promosi dan penjualan
Produk, harga, dan informasi usaha bisa diakses kapan saja sehingga pelanggan lebih mudah menemukan dan membeli produk UMKM.</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="{{ asset('asset/img/testimonial-2.jpg') }}" alt="">
                        <div class="text-start ms-3">
                            <h5>sukra alhamda</h5>
                            <span class="text-primary">Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item p-4 p-lg-5">
                    <p class="mb-4">Website memperluas jangkauan pasar
UMKM tidak hanya dikenal di lingkungan sekitar, tetapi juga bisa menjangkau pelanggan dari daerah lain bahkan nasional.</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="img-fluid flex-shrink-0" src="{{ asset('asset/img/testimonial-3.jpg') }}" alt="">
                        <div class="text-start ms-3">
                            <h5>arya ibrahim </h5>
                            <span class="text-primary">Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Contact Start -->
    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Contact Us</p>
                <h1 class="display-6">Contact us right now</h1>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8">
                    <p class="text-center mb-5">Untuk informasi produk, pemesanan, dan kerja sama, silakan hubungi kami melalui kontak yang tersedia. Kami siap melayani Anda dengan cepat dan profesional.</p>
                    <div class="row g-5">
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-envelope fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">rifqi@gmail.com</p>
                            <p class="mb-0">yanda@gmail.com</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-phone fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">+081378271981</p>
                            <p class="mb-0">087136373822</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">12 Umban Sari atas,</p>
                            <p class="mb-0"> Pekanbaru, indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Start -->

@endsection
