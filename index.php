<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>SportBorrowing.com</title>
    <link rel="icon" href="assets/logoUrl.png" type="image/png">
    <style>
      #homeSection {
        background-image: url('https://static.vecteezy.com/system/resources/previews/026/858/512/non_2x/of-a-colorful-assortment-of-sports-balls-on-a-white-background-with-copy-space-free-photo.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        height: 100vh; /* Menentukan tinggi sesuai dengan tinggi layar */
        color: black; /* Jika perlu untuk menyesuaikan warna teks agar terlihat jelas */
      }
    </style>
  </head>
  <body>
    <!--Navbar-->
   <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary shadow-sm justify-space-between">
  <div class="container-fluid">
    <img src="assets/logoNav.png" alt="logo" width="120px">
    <a href="sign/link_login.html" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#homeSection">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#aboutSection">About</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <section id="homeSection" class="p-5">
      <div class="d-flex flex-wrap justify-content-center align-items-center h-100">
        <div class="col text-center">
         <h2 class="fw-bold text-success"><span class="text-primary">Sport</span>Borrowing</h2>
          <p class="mb-4">"Jelajahi Ragam Olahraga di Ujung Jari Anda: <br> Sistem Peminjaman alat Olahraga <span class="fw-bold">SportBorrowing</span> Menghubungkan Anda dengan Dunia Aktivitas Fisik yang luar biasa."</p>
          <a class="btn btn-primary" href="sign/link_login.html">Get started</a>
        </div>
      </div>
    </section>
    
    <section class="bg-body-secondary p-5" id="aboutSection">
      <div class="row">
          <div class="d-flex">
            <h2 class="text-primary">About</h2>
          </div>
          <p>Kami percaya bahwa akses mudah ke peralatan olahraga adalah kunci untuk gaya hidup sehat dan aktif. Inilah sebabnya 
            kami menciptakan aplikasi sistem peminjaman alat olahraga berbasis digital kami, yang dirancang untuk menjadi pintu gerbang 
            ke berbagai alat olahraga, seperti peminjaman berbagai alat olahraga yang tersedia, semuanya hanya dalam genggaman Anda. Kami 
            berkomitmen untuk mendukung kesehatan dan kebugaran seumur hidup, dan kami ingin menjadi mitra Anda dalam perjalanan kebugaran 
            Anda. Aplikasi kami telah dirancang dengan antarmuka yang ramah pengguna, fitur pencarian yang canggih, dan koleksi alat olahraga 
            yang terus berkembang untuk menginspirasi dan memotivasi semua anggota komunitas kami</p>
      </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>