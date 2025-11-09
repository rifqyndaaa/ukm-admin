<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House - Tea Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="asset/lib/animate/animate.min.css" rel="stylesheet">
    <link href="asset/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="asset/css/style.css" rel="stylesheet">

    <style>
        .whatsapp-btn {
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
            width: 100%;
            justify-content: center;
            margin-top: 10px;
        }

        .whatsapp-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
            color: white;
            background: linear-gradient(135deg, #128C7E, #25D366);
        }

        .product-item {
            transition: all 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
            text-decoration: none;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .product-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .product-item img {
            transition: transform 0.3s ease;
            height: 250px;
            object-fit: cover;
            width: 100%;
        }

        .product-item:hover img {
            transform: scale(1.05);
        }

        .product-content {
            padding: 1.5rem;
            text-align: center;
        }

        .price-tag {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2e3a59;
            margin: 10px 0;
        }

        .product-features {
            list-style: none;
            padding: 0;
            margin: 15px 0;
            text-align: left;
        }

        .product-features li {
            padding: 5px 0;
            color: #6c757d;
            display: flex;
            align-items: center;
        }

        .product-features li i {
            color: #25D366;
            margin-right: 8px;
            font-size: 0.9rem;
        }

        .rating {
            color: #ffc107;
            margin: 10px 0;
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
    </style>
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
                 <!-- foto Start -->
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('umkm.index')}}" class="nav-item nav-link">Data UMKM</a>
                        <a href="{{ route('about')}}" class="nav-item nav-link">About</a>
                        <a href="{{ route('product')}}" class="nav-item nav-link active">Products</a>
                        <a href="{{ route('store')}}" class="nav-item nav-link">Store</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Menu Lainnya</a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                               <a href="datamasyarakat" class="dropdown-item">Data Masyarakat</a>
                                <a href="datauser" class="dropdown-item">Data Users</a>
                            </div>
                        </div>
                        <a href="{{ route('create')}}" class="nav-item nav-link">Tambah UMKM</a>
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
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Our Products</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Products Start -->
    <div class="container-fluid product py-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Our Products</p>
                <h1 class="display-6">Tea has a complex positive effect on the body</h1>
            </div>

            <!-- Products Grid -->
            <div class="row g-4 mt-5">
                <!-- Green Tea -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item rounded position-relative">
                        <span class="product-badge">BEST SELLER</span>
                        <img src="asset/img/product-1.jpg" alt="Green Tea">
                        <div class="product-content">
                            <h4 class="text-primary mb-2">Green Tea</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="text-muted ms-2">(4.5)</span>
                            </div>
                            <div class="price-tag">Rp 45.000</div>
                            <p class="text-body mb-3">Fresh and healthy green tea with antioxidant properties.</p>

                            <ul class="product-features">
                                <li><i class="fas fa-check"></i> 100% Organic</li>
                                <li><i class="fas fa-check"></i> Rich in Antioxidants</li>
                                <li><i class="fas fa-check"></i> Energy Boosting</li>
                                <li><i class="fas fa-check"></i> Fresh Aroma</li>
                            </ul>

                            <a href="https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20Green%20Tea%20Anda.%20Bisa%20info%20lebih%20lanjut?"
                               class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i> Order via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Black Tea -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="product-item rounded position-relative">
                        <span class="product-badge">POPULAR</span>
                        <img src="asset/img/product-2.jpg" alt="Black Tea">
                        <div class="product-content">
                            <h4 class="text-primary mb-2">Black Tea</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="text-muted ms-2">(4.0)</span>
                            </div>
                            <div class="price-tag">Rp 38.000</div>
                            <p class="text-body mb-3">Strong and flavorful black tea for your daily energy.</p>

                            <ul class="product-features">
                                <li><i class="fas fa-check"></i> Rich Flavor</li>
                                <li><i class="fas fa-check"></i> Caffeine Boost</li>
                                <li><i class="fas fa-check"></i> Heart Healthy</li>
                                <li><i class="fas fa-check"></i> Long Lasting</li>
                            </ul>

                            <a href="https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20Black%20Tea%20Anda.%20Bisa%20info%20lebih%20lanjut?"
                               class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i> Order via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Spiced Tea -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="product-item rounded position-relative">
                        <img src="asset/img/product-3.jpg" alt="Spiced Tea">
                        <div class="product-content">
                            <h4 class="text-primary mb-2">Spiced Tea</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="text-muted ms-2">(5.0)</span>
                            </div>
                            <div class="price-tag">Rp 52.000</div>
                            <p class="text-body mb-3">Aromatic spiced tea with unique blend of herbs.</p>

                            <ul class="product-features">
                                <li><i class="fas fa-check"></i> Natural Spices</li>
                                <li><i class="fas fa-check"></i> Warming Effect</li>
                                <li><i class="fas fa-check"></i> Immune Support</li>
                                <li><i class="fas fa-check"></i> Unique Aroma</li>
                            </ul>

                            <a href="https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20Spiced%20Tea%20Anda.%20Bisa%20info%20lebih%20lanjut?"
                               class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i> Order via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Organic Tea -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="product-item rounded position-relative">
                        <span class="product-badge">NEW</span>
                        <img src="asset/img/product-4.jpg" alt="Organic Tea">
                        <div class="product-content">
                            <h4 class="text-primary mb-2">Organic Tea</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="text-muted ms-2">(4.5)</span>
                            </div>
                            <div class="price-tag">Rp 65.000</div>
                            <p class="text-body mb-3">Certified organic tea for pure and natural experience.</p>

                            <ul class="product-features">
                                <li><i class="fas fa-check"></i> Certified Organic</li>
                                <li><i class="fas fa-check"></i> No Chemicals</li>
                                <li><i class="fas fa-check"></i> Sustainable</li>
                                <li><i class="fas fa-check"></i> Pure Taste</li>
                            </ul>

                            <a href="https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20Organic%20Tea%20Anda.%20Bisa%20info%20lebih%20lanjut?"
                               class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i> Order via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Products Row -->
            <div class="row g-4 mt-2">
                <!-- Herbal Tea -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="product-item rounded">
                        <img src="asset/img/product-1.jpg" alt="Herbal Tea">
                        <div class="product-content">
                            <h4 class="text-primary mb-2">Herbal Tea</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="text-muted ms-2">(4.0)</span>
                            </div>
                            <div class="price-tag">Rp 48.000</div>
                            <p class="text-body mb-3">Soothing herbal blend for relaxation and wellness.</p>

                            <a href="https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20Herbal%20Tea%20Anda.%20Bisa%20info%20lebih%20lanjut?"
                               class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i> Order via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Matcha Tea -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="product-item rounded">
                        <img src="asset/img/product-2.jpg" alt="Matcha Tea">
                        <div class="product-content">
                            <h4 class="text-primary mb-2">Matcha Tea</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="text-muted ms-2">(5.0)</span>
                            </div>
                            <div class="price-tag">Rp 75.000</div>
                            <p class="text-body mb-3">Premium Japanese matcha for ultimate tea experience.</p>

                            <a href="https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20Matcha%20Tea%20Anda.%20Bisa%20info%20lebih%20lanjut?"
                               class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i> Order via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Chai Tea -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="product-item rounded">
                        <img src="asset/img/product-3.jpg" alt="Chai Tea">
                        <div class="product-content">
                            <h4 class="text-primary mb-2">Chai Tea</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="text-muted ms-2">(4.5)</span>
                            </div>
                            <div class="price-tag">Rp 42.000</div>
                            <p class="text-body mb-3">Traditional Indian chai with rich spices and milk.</p>

                            <a href="https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20Chai%20Tea%20Anda.%20Bisa%20info%20lebih%20lanjut?"
                               class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i> Order via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>

                <!-- White Tea -->
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="product-item rounded">
                        <img src="asset/img/product-4.jpg" alt="White Tea">
                        <div class="product-content">
                            <h4 class="text-primary mb-2">White Tea</h4>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span class="text-muted ms-2">(4.0)</span>
                            </div>
                            <div class="price-tag">Rp 58.000</div>
                            <p class="text-body mb-3">Delicate white tea with subtle flavors and aroma.</p>

                            <a href="https://wa.me/628123456789?text=Halo,%20saya%20tertarik%20dengan%20White%20Tea%20Anda.%20Bisa%20info%20lebih%20lanjut?"
                               class="whatsapp-btn" target="_blank">
                                <i class="fab fa-whatsapp"></i> Order via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt text-primary me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt text-primary me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope text-primary me-3"></i>info@example.com</p>
                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Support</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Business Hours</h4>
                    <p class="mb-1">Monday - Friday</p>
                    <h6 class="text-light">09:00 am - 07:00 pm</h6>
                    <p class="mb-1">Saturday</p>
                    <h6 class="text-light">09:00 am - 12:00 pm</h6>
                    <p class="mb-1">Sunday</p>
                    <h6 class="text-light">Closed</h6>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-primary mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium" href="#">Your Site Name</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author's credit link/attribution link/backlink. If you'd like to use the template without the footer author's credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="fw-medium" href="https://htmlcodex.com">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="asset/lib/wow/wow.min.js"></script>
    <script src="asset/lib/easing/easing.min.js"></script>
    <script src="asset/lib/waypoints/waypoints.min.js"></script>
    <script src="asset/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="asset/js/main.js"></script>
</body>
</html>
