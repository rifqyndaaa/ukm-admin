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
         position: fixed;
         /* Membuat tombol melayang */
         bottom: 20px;
         /* Jarak dari bawah layar */
         right: 20px;
         /* Jarak dari kanan layar */
         width: 60px;
         height: 60px;
         background-color: #25d366;
         /* Warna hijau WhatsApp */
         border-radius: 50%;
         /* Membuat bulat */
         display: flex;
         align-items: center;
         justify-content: center;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
         /* Bayangan untuk efek melayang */
         transition: transform 0.3s ease;
         /* Animasi hover */
         z-index: 1000;
         /* Pastikan di atas elemen lain */
         text-decoration: none;
         /* Hapus garis bawah link */
     }

     #whatsapp-float:hover {
         transform: scale(1.1);
         /* Membesar saat hover */
     }

     #whatsapp-float i {
         color: white;
         /* Warna ikon putih */
         font-size: 24px;
         /* Ukuran ikon */
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

     < !-- Custom CSS for additional styling -->.bg-gradient-primary {
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

   <!-- Floating WhatsApp CSS -->
    <style>
        #whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #25d366;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.3);
            transition: transform 0.3s ease;
            z-index: 1000;
            text-decoration: none;
        }
        #whatsapp-float:hover { transform: scale(1.1); }
        #whatsapp-float i { color: white; font-size: 24px; }
        @media (max-width:768px) {
            #whatsapp-float { bottom:15px; right:15px; width:50px; height:50px; }
            #whatsapp-float i { font-size:20px; }
        }
    </style>
