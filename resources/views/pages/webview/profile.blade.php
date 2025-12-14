@extends('layout.app')

@section('content')

    <!-- Hero Carousel -->
    <div class="container-fluid px-0 position-relative overflow-hidden">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="position-relative" style="height: 90vh; min-height: 600px;">
                        <img class="w-100 h-100" src="{{ asset('asset/img/carousel-1.jpg') }}" alt="Image" style="object-fit: cover; object-position: center;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(to right, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);"></div>
                    </div>
                    <div class="carousel-caption d-flex flex-column justify-content-center h-100" style="top: 0;">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8 col-md-10 text-start">
                                    <p class="fs-5 text-warning fw-medium mb-3 animated fadeInUp">Welcome to <span class="text-white">UMKM Produks</span></p>
                                    <h1 class="display-2 fw-bold text-white mb-4 animated fadeInUp" style="line-height: 1.2;">
                                        Crafting <span class="text-warning">Premium</span> Organic Tea Experiences
                                    </h1>
                                    <p class="fs-5 text-light mb-5 animated fadeInUp" style="max-width: 600px;">
                                        Discover handpicked tea leaves from sustainable farms, curated for health enthusiasts and connoisseurs.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3 animated fadeInUp">
                                        <a href="#products" class="btn btn-warning btn-lg rounded-pill px-5 py-3 fw-semibold">
                                            Shop Collection <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                        <a href="#about" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3">
                                            Our Story <i class="fas fa-history ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="position-relative" style="height: 90vh; min-height: 600px;">
                        <img class="w-100 h-100" src="{{ asset('asset/img/carousel-2.jpg') }}" alt="Image" style="object-fit: cover; object-position: center;">
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(135deg, rgba(44,62,80,0.8) 0%, rgba(52,73,94,0.6) 100%);"></div>
                    </div>
                    <div class="carousel-caption d-flex flex-column justify-content-center h-100" style="top: 0;">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-lg-8 col-md-10 text-end">
                                    <p class="fs-5 text-light fst-italic mb-3 animated fadeInUp">Since 1999</p>
                                    <h1 class="display-2 fw-bold text-white mb-4 animated fadeInUp">
                                        Heritage Meets <span class="text-warning">Innovation</span>
                                    </h1>
                                    <p class="fs-5 text-light mb-5 animated fadeInUp" style="max-width: 600px; margin-left: auto;">
                                        25 years of perfecting the art of tea blending with modern wellness science.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3 justify-content-end animated fadeInUp">
                                        <a href="#video" class="btn btn-light btn-lg rounded-pill px-5 py-3 fw-semibold text-dark">
                                            <i class="fas fa-play me-2"></i> Watch Story
                                        </a>
                                        <a href="#store" class="btn btn-outline-warning btn-lg rounded-pill px-5 py-3">
                                            Shop Now <i class="fas fa-shopping-bag ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Floating Stats -->
        <div class="container position-absolute bottom-0 start-50 translate-middle-x" style="z-index: 10;">
            <div class="row justify-content-center">
                <div class="col-11 col-lg-10">
                    <div class="bg-white rounded-4 shadow-lg p-4 p-lg-5" style="transform: translateY(50%);">
                        <div class="row g-4 text-center">
                            <div class="col-md-3 col-6">
                                <div class="p-3">
                                    <div class="fs-1 fw-bold text-warning mb-2">25+</div>
                                    <div class="text-uppercase text-dark fw-medium fs-6 mb-1">Years Excellence</div>
                                    <div class="small text-muted">Since 1999</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="p-3">
                                    <div class="fs-1 fw-bold text-warning mb-2">500+</div>
                                    <div class="text-uppercase text-dark fw-medium fs-6 mb-1">Happy Clients</div>
                                    <div class="small text-muted">Global Reach</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="p-3">
                                    <div class="fs-1 fw-bold text-warning mb-2">50+</div>
                                    <div class="text-uppercase text-dark fw-medium fs-6 mb-1">Tea Varieties</div>
                                    <div class="small text-muted">Premium Selection</div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="p-3">
                                    <div class="fs-1 fw-bold text-warning mb-2">100%</div>
                                    <div class="text-uppercase text-dark fw-medium fs-6 mb-1">Organic Certified</div>
                                    <div class="small text-muted">Sustainable Farming</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- About Section -->
    <section id="about" class="py-5 my-5" style="padding-top: 8rem !important;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="position-relative">
                        <div class="row g-3">
                            <div class="col-7">
                                <img class="img-fluid rounded-3 shadow-lg mb-3" src="{{ asset('asset/img/about-1.jpg') }}" alt="" style="height: 350px; object-fit: cover; width: 100%;">
                            </div>
                            <div class="col-5">
                                <img class="img-fluid rounded-3 shadow-lg mb-3" src="{{ asset('asset/img/about-3.jpg') }}" alt="" style="height: 200px; object-fit: cover; width: 100%;">
                                <img class="img-fluid rounded-3 shadow-lg" src="{{ asset('asset/img/about-4.jpg') }}" alt="" style="height: 200px; object-fit: cover; width: 100%;">
                            </div>
                        </div>
                        <div class="position-absolute bottom-0 end-0 bg-warning text-white px-4 py-2 rounded-start shadow-lg" style="transform: translateY(50%);">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-award fa-2x me-3"></i>
                                <div>
                                    <div class="fw-bold">Certified Organic</div>
                                    <small>Since 2005</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ps-lg-5">
                        <span class="badge bg-warning text-dark rounded-pill px-4 py-2 mb-3">Our Heritage</span>
                        <h2 class="display-5 fw-bold mb-4">Crafting Excellence in Every <span class="text-warning">Tea Leaf</span></h2>
                        <p class="lead text-muted mb-5">
                            For over two decades, we've dedicated ourselves to sourcing the finest organic tea leaves from sustainable farms across Asia, creating blends that delight both palate and well-being.
                        </p>

                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-3">
                                            <i class="fas fa-leaf fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="ms-4">
                                        <h5 class="fw-bold mb-2">Sustainable Sourcing</h5>
                                        <p class="text-muted mb-0">Direct partnerships with organic farms ensuring fair trade and quality.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="bg-warning bg-opacity-10 text-warning rounded-circle p-3">
                                            <i class="fas fa-heart fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="ms-4">
                                        <h5 class="fw-bold mb-2">Wellness Focused</h5>
                                        <p class="text-muted mb-0">Each blend crafted with health benefits and flavor harmony in mind.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="btn btn-warning btn-lg rounded-pill px-5 py-3">
                            Discover Our Story <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-5 my-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-warning text-dark rounded-pill px-4 py-2 mb-3">Premium Collection</span>
                <h2 class="display-4 fw-bold mb-3">Curated Tea <span class="text-warning">Experiences</span></h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Explore our signature blends, each crafted to deliver unique flavors and wellness benefits.
                </p>
            </div>

            <div class="row g-4">
                @foreach([
                    ['img' => 'product-1.jpg', 'title' => 'Zen Green Tea', 'desc' => 'Antioxidant-rich with calming notes', 'price' => '$24.99', 'badge' => 'Bestseller', 'tags' => ['Organic', 'Calming']],
                    ['img' => 'product-2.jpg', 'title' => 'Golden Black Tea', 'desc' => 'Rich, full-bodied morning blend', 'price' => '$26.99', 'badge' => 'Premium', 'tags' => ['Strong', 'Energy']],
                    ['img' => 'product-3.jpg', 'title' => 'Spiced Chai Blend', 'desc' => 'Warming spices for cozy moments', 'price' => '$28.99', 'badge' => 'Limited', 'tags' => ['Spicy', 'Comfort']],
                    ['img' => 'product-4.jpg', 'title' => 'Pure White Tea', 'desc' => 'Delicate flavor, maximum benefits', 'price' => '$32.99', 'badge' => 'Rare', 'tags' => ['Antioxidant', 'Pure']]
                ] as $product)
                <div class="col-lg-3 col-md-6">
                    <div class="card product-card border-0 shadow-lg h-100 overflow-hidden">
                        <div class="position-relative overflow-hidden">
                            <img src="{{ asset('asset/img/' . $product['img']) }}" class="card-img-top" alt="{{ $product['title'] }}" style="height: 250px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-{{ $product['badge'] == 'Bestseller' ? 'warning' : ($product['badge'] == 'Premium' ? 'dark' : 'danger') }} text-{{ $product['badge'] == 'Bestseller' ? 'dark' : 'white' }} rounded-pill px-3 py-2">
                                    {{ $product['badge'] }}
                                </span>
                            </div>
                            <div class="position-absolute top-0 end-0 m-3">
                                <button class="btn btn-light btn-sm rounded-circle shadow" data-bs-toggle="tooltip" title="Add to Wishlist">
                                    <i class="far fa-heart"></i>
                                </button>
                            </div>
                            <div class="card-img-overlay d-flex align-items-end">
                                <div class="w-100">
                                    <div class="d-flex justify-content-center">
                                        @foreach($product['tags'] as $tag)
                                        <span class="badge bg-light text-dark rounded-pill mx-1 px-3">{{ $tag }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <h5 class="card-title fw-bold mb-2">{{ $product['title'] }}</h5>
                            <p class="card-text text-muted mb-3">{{ $product['desc'] }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h4 fw-bold text-warning mb-0">{{ $product['price'] }}</span>
                                <div class="rating text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 p-4 pt-0">
                            <div class="d-grid gap-2">
                                <button class="btn btn-outline-warning btn-lg rounded-pill py-3">
                                    <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-light btn-lg rounded-pill px-5 py-3 border-2">
                    View All Products <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section id="video" class="py-5 my-5 position-relative" style="background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);">
        <div class="container position-relative z-index-2">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="pe-lg-5">
                        <span class="badge bg-warning text-dark rounded-pill px-4 py-2 mb-3">Our Process</span>
                        <h2 class="display-4 fw-bold text-white mb-4">From <span class="text-warning">Farm</span> to <span class="text-warning">Cup</span></h2>
                        <p class="lead text-light mb-5">
                            Witness the meticulous journey of our tea leaves, from sustainable farms to your teacup, ensuring purity and excellence at every step.
                        </p>

                        <div class="row g-4 mb-5">
                            @foreach([
                                ['icon' => 'seedling', 'title' => 'Organic Farming', 'desc' => 'Chemical-free cultivation'],
                                ['icon' => 'hand-holding-heart', 'title' => 'Hand Picked', 'desc' => 'Selective harvesting'],
                                ['icon' => 'wind', 'title' => 'Natural Drying', 'desc' => 'Traditional techniques'],
                                ['icon' => 'box', 'title' => 'Eco Packaging', 'desc' => 'Sustainable materials']
                            ] as $process)
                            <div class="col-md-6">
                                <div class="d-flex align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="bg-warning text-dark rounded-circle p-3">
                                            <i class="fas fa-{{ $process['icon'] }} fa-lg"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <h5 class="text-white fw-bold mb-1">{{ $process['title'] }}</h5>
                                        <p class="text-light mb-0 small">{{ $process['desc'] }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="d-flex flex-wrap gap-3">
                            <button class="btn btn-warning btn-lg rounded-pill px-5 py-3" data-bs-toggle="modal" data-bs-target="#videoModal">
                                <i class="fas fa-play me-2"></i> Watch Our Story
                            </button>
                            <a href="#" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3">
                                Visit Farm <i class="fas fa-external-link-alt ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="position-relative">
                        <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-lg">
                            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark d-flex align-items-center justify-content-center">
                                <button class="btn btn-warning btn-play-lg rounded-circle" data-bs-toggle="modal" data-bs-target="#videoModal">
                                    <i class="fas fa-play fa-2x"></i>
                                </button>
                            </div>
                        </div>
                        <div class="position-absolute bottom-0 start-0 w-100 p-4">
                            <div class="bg-white rounded-3 p-3 shadow">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="fw-bold mb-0">Documentary Series</h6>
                                        <small class="text-muted">Season 1: The Art of Tea</small>
                                    </div>
                                    <span class="badge bg-warning text-dark">45 min</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="position-absolute top-0 end-0" style="width: 300px; height: 300px;">
            <div class="position-absolute" style="width: 200px; height: 200px; background: rgba(255, 193, 7, 0.1); border-radius: 50%; top: -50px; right: -50px;"></div>
        </div>
        <div class="position-absolute bottom-0 start-0" style="width: 200px; height: 200px;">
            <div class="position-absolute" style="width: 150px; height: 150px; background: rgba(255, 193, 7, 0.1); border-radius: 50%; bottom: -50px; left: -50px;"></div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-5 my-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-warning text-dark rounded-pill px-4 py-2 mb-3">Testimonials</span>
                <h2 class="display-4 fw-bold mb-3">Loved by <span class="text-warning">Tea Lovers</span></h2>
                <p class="lead text-muted mx-auto" style="max-width: 700px;">
                    Discover what our community says about their tea journey with us.
                </p>
            </div>

            <div class="row g-4">
                @foreach([
                    ['name' => 'Sarah Chen', 'role' => 'Tea Blogger', 'img' => 'testimonial-1.jpg', 'content' => 'The depth of flavor in their Golden Black Tea is unmatched. It has become my morning ritual that I genuinely look forward to every day.'],
                    ['name' => 'Michael Rodriguez', 'role' => 'Wellness Coach', 'img' => 'testimonial-2.jpg', 'content' => 'As a wellness professional, I recommend their Zen Green Tea to all my clients. The purity and health benefits are exceptional.'],
                    ['name' => 'Emma Wilson', 'role' => 'Food Critic', 'img' => 'testimonial-3.jpg', 'content' => 'The attention to detail in sourcing and blending is evident in every cup. A true connoisseur experience.']
                ] as $testimonial)
                <div class="col-lg-4">
                    <div class="card border-0 shadow-lg h-100">
                        <div class="card-body p-4">
                            <div class="rating text-warning mb-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="card-text text-muted mb-4">"{{ $testimonial['content'] }}"</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0 p-4">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('asset/img/' . $testimonial['img']) }}" class="rounded-circle me-3" alt="{{ $testimonial['name'] }}" style="width: 60px; height: 60px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-1">{{ $testimonial['name'] }}</h6>
                                    <small class="text-muted">{{ $testimonial['role'] }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-warning rounded-4 p-5 shadow-lg">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h3 class="text-dark fw-bold mb-3">Join Our Tea Community</h3>
                                <p class="text-dark mb-4">
                                    Subscribe to receive exclusive offers, brewing tips, and stories from our tea farms.
                                </p>
                                <form class="row g-3">
                                    <div class="col-md-8">
                                        <div class="input-group input-group-lg">
                                            <input type="email" class="form-control rounded-pill border-0 px-4" placeholder="Your email address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-dark btn-lg rounded-pill w-100">
                                            Subscribe
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 text-center">
                                <div class="mt-4 mt-lg-0">
                                    <i class="fas fa-paper-plane fa-4x text-dark opacity-25"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9">
                        <iframe id="videoFrame" class="rounded-3" allowfullscreen></iframe>
                    </div>
                </div>
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3 bg-white rounded-circle p-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>

@endsection

@push('styles')
<style>
    /* Custom Animations */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.8; }
    }

    /* Enhanced Styles */
    .carousel-caption {
        text-shadow: 0 2px 10px rgba(0,0,0,0.5);
    }

    .product-card {
        transition: all 0.3s ease;
        border-radius: 1rem;
        overflow: hidden;
    }

    .product-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
    }

    .product-card .card-img-top {
        transition: transform 0.5s ease;
    }

    .product-card:hover .card-img-top {
        transform: scale(1.05);
    }

    .btn-play-lg {
        width: 100px;
        height: 100px;
        background: rgba(255, 193, 7, 0.95);
        border: 4px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        animation: float 3s ease-in-out infinite;
    }

    .btn-play-lg:hover {
        background: #ffc107;
        transform: scale(1.1);
        animation: none;
    }

    .btn-play-lg i {
        margin-left: 5px;
    }

    .rating {
        font-size: 0.9rem;
    }

    /* Floating Stats Enhancement */
    .floating-stats {
        animation: pulse 2s ease-in-out infinite;
    }

    /* Section Dividers */
    section {
        position: relative;
    }

    /* Gradient Text */
    .gradient-text {
        background: linear-gradient(45deg, #ffc107, #ff9800);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Custom Scroll Behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Tooltip Customization */
    .tooltip-inner {
        background-color: #ffc107;
        color: #212529;
        font-weight: 500;
    }

    .tooltip.bs-tooltip-top .tooltip-arrow::before {
        border-top-color: #ffc107;
    }

    /* Form Control Focus */
    .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 0 0.25rem rgba(255, 193, 7, 0.25);
    }

    /* Badge Animation */
    .badge {
        transition: all 0.3s ease;
    }

    .badge:hover {
        transform: scale(1.05);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .display-2 {
            font-size: 2.5rem;
        }

        .display-4 {
            font-size: 2rem;
        }

        .btn-lg {
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }

        .carousel-caption {
            padding-bottom: 3rem;
        }
    }

    /* Smooth Loading */
    .fade-in {
        animation: fadeIn 0.8s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Video Modal
        var videoModal = document.getElementById('videoModal');
        if (videoModal) {
            videoModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var videoFrame = document.getElementById('videoFrame');
                var videoSrc = 'https://www.youtube.com/embed/DWRcNpR6Kdc?autoplay=1&rel=0&modestbranding=1&showinfo=0';
                videoFrame.src = videoSrc;
            });

            videoModal.addEventListener('hide.bs.modal', function () {
                var videoFrame = document.getElementById('videoFrame');
                videoFrame.src = '';
            });
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        // Observe sections for animation
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });

        // Product card hover effects
        document.querySelectorAll('.product-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.zIndex = '10';
            });

            card.addEventListener('mouseleave', function() {
                this.style.zIndex = '1';
            });
        });

        // Add to cart functionality
        document.querySelectorAll('.btn-outline-warning').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const productName = this.closest('.product-card').querySelector('.card-title').textContent;

                // Create notification
                const notification = document.createElement('div');
                notification.className = 'alert alert-warning alert-dismissible fade show position-fixed top-0 end-0 m-3';
                notification.style.zIndex = '9999';
                notification.innerHTML = `
                    <i class="fas fa-check-circle me-2"></i>
                    <strong>${productName}</strong> added to cart!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                `;
                document.body.appendChild(notification);

                // Auto remove notification
                setTimeout(() => {
                    notification.remove();
                }, 3000);
            });
        });
    });
</script>
@endpush
