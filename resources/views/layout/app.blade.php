<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House - Tea Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    @include('layout.css')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    @include('layout.navbar')

    @yield('content')

    @include('layout.footer')





    </tbody>
    </table>
    </div>






    <!-- Products Start -->
    <div class="container-fluid product py-5 my-5">
        <div class="container py-5">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
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
    <a href="https://wa.me/08978350675?text=Halo%20saya%20ingin%20bertanya%20tentang%20UMKM" id="whatsapp-float"
        target="_blank" aria-label="Hubungi via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    @include('layout.js')
</body>

</html>
