<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lapak & UMKM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- CSS -->
    @include('layout.css')

    <style>
        /* Floating WhatsApp Button */
        .floating-btn {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: linear-gradient(135deg, #25d366, #1ebe5d);
            color: #fff;
            width: 68px;
            height: 68px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            cursor: pointer;
            z-index: 99999;
            box-shadow: 0 8px 20px rgba(37, 211, 102, 0.45);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: pulse 2s infinite;
        }

        .floating-btn:hover {
            transform: scale(1.15);
            box-shadow: 0 12px 28px rgba(37, 211, 102, 0.6);
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.6);
            }
            70% {
                box-shadow: 0 0 0 18px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }
    </style>
</head>

<body>
    <!-- Spinner -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>

    <!-- Navbar -->
    @include('layout.navbar')

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @include('layout.footer')

    <!-- Copyright -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    &copy; Lapak & UMKM
                </div>
                <div class="col-md-6 text-center text-md-end">
                    Designed by HTML Codex
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>

    <!-- FLOATING WHATSAPP -->
    <div class="floating-btn" onclick="openWhatsApp()">
        <i class="fab fa-whatsapp"></i>
    </div>

    <!-- JS -->
    @include('layout.js')

    <script>
        function openWhatsApp() {
            const phoneNumber = '6281234567890'; // GANTI NOMOR WA
            const message = 'Halo, saya tertarik dengan produk UMKM Anda';
            const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
            window.open(url, '_blank');
        }
    </script>

</body>
</html>
