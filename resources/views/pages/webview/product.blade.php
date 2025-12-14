@extends('layout.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Products</h1>
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
                <h1 class="display-6">some of our featured products</h1>
            </div>

            <div class="owl-carousel product-carousel wow fadeInUp" data-wow-delay="0.5s">

                <a href="" class="d-block product-item rounded">
                    <img src="asset/img/product-1.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Bakso Mercon Pedas</h4>
                        <span class="text-body">Bakso pedas dengan sambal melimpah, rasa kuat dan cocok untuk pecinta makanan pedas.</span>
                    </div>
                </a>

                <a href="" class="d-block product-item rounded">
                    <img src="asset/img/product-2.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Layanan Barbershop</h4>
                        <span class="text-body">Jasa cukur dan perawatan rambut profesional dengan suasana interior yang elegan dan nyaman.</span>
                    </div>
                </a>

                <a href="" class="d-block product-item rounded">
                    <img src="asset/img/product-3.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Sate Ayam Nusantara</h4>
                        <span class="text-body">Sate ayam dengan bumbu kacang kaya rempah, disajikan bersama ketupat dan acar segar.</span>
                    </div>
                </a>

                <a href="" class="d-block product-item rounded">
                    <img src="asset/img/product-4.jpg" alt="">
                    <div class="bg-white shadow-sm text-center p-4 position-relative mt-n5 mx-4">
                        <h4 class="text-primary">Kerajinan</h4>
                        <span class="text-body">Produk kerajinan tangan berkualitas, dibuat dengan detail dan kreativitas tinggi.</span>
                    </div>
                </a>

            </div>
        </div>
    </div>
    <!-- Products End -->
@endsection
