@extends('layout.app')
@section('content')
    <!-- About Start -->
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
                                     src="asset/img/about-4.JPEG"
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
                                 src="asset/img/about-5.jpg"
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
@endsection
