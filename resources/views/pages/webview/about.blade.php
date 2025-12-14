@extends('layout.app')
@section('content')
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s"
                                src="asset/img/about-1.jpg" alt="">
                            <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s"
                                src="asset/img/about-3.jpg" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s"
                                src="asset/img/about-4.jpg" alt="">
                            <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s"
                                src="asset/img/about-2.jpg" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">Tentang Usaha</p>
                        <h1 class="display-6">
                            Menghadirkan perpaduan rasa tradisi dan keindahan seni, usaha ini tumbuh sebagai ruang
                            di mana kuliner dan batik berpadu dalam harmoni budaya yang tak lekang oleh waktu.
                        </h1>
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="asset/img/about-5.jpg" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h5>Hidangan Tradisional dengan Sentuhan Berkelas</h5>
                            <p class="mb-0">
                                Setiap hidangan kami adalah warisan rasa yang terjaga: dibuat dari bahan terbaik,
                                diracik dengan kehangatan rumah, dan disajikan dengan nuansa elegan yang memanjakan hati.
                            </p>
                        </div>
                    </div>

                    <div class="border-top mb-4"></div>

                    <div class="row g-3">
                        <div class="col-sm-8">
                            <h5>Batik: Puisi yang Ditulis di Atas Kain</h5>
                            <p class="mb-0">
                                Batik bagi kami bukan sekadar busana—ia adalah cerita yang ditorehkan dengan hening,
                                dirajut oleh tangan-tangan yang sabar, dan diwariskan melalui motif penuh makna.
                                Setiap helai kainnya memancarkan keanggunan: mewah dalam kesederhanaannya,
                                megah dalam filosofi yang tersimpan di dalamnya.
                                Memakai batik adalah merayakan identitas, membawa budaya, dan tampil dengan keanggunan premium.
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="{{ asset('asset/img/about-6.jpg') }}" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
