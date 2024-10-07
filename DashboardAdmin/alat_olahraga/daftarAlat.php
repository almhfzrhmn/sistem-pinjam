<?php
require "../../config/config.php";
$alat_olahraga = queryReadData("SELECT * FROM alat_olahraga");

// Mengaktifkan tombol pencarian
if(isset($_POST["search"])) {
  // Buat variabel dan ambil apa saja yang diketikkan pengguna di dalam input dan kirimkan ke fungsi search.
  $alat_olahraga = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
  <title>Kelola alat olahraga || Admin</title>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../../assets/logoNav.png" alt="logo" width="120px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../dashboardAdmin.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="tambahAlat.php">Tambah Alat</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
<div class="p-4 mt-4">
  <!-- Form pencarian -->
  <form action="" method="post" class="mt-5">
    <div class="input-group d-flex justify-content-end mb-3">
      <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword" placeholder="Cari data alat...">
      <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
  </form>
       
  <!-- Card alat olahraga -->
  <div class="layout-card-custom d-flex flex-wrap" style="margin: 1rem; margin-bottom: 2rem; justify-content: space-between;">
    <?php foreach ($alat_olahraga as $item) : ?>
      <div class="card" style="width: 15rem;">
        <img src="../../imgDB/<?= $item["gambar"]; ?>" class="card-img-top" alt="GambarAlat" height="250px">
        <div class="card-body">
          <h5 class="card-title"><?= $item["nama_alat"]; ?></h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Kategori: <?= $item["kategori"]; ?></li>
          <li class="list-group-item">Id Alat: <?= $item["id_alat"]; ?></li>
        </ul>
        <div class="card-body">
        <a class="btn btn-success" href="updateAlat.php?idReview=<?= $item["id_alat"]; ?>" id="review">Edit</a>
          <a class="btn btn-danger" href="deleteAlat.php?id=<?= $item["id_alat"]; ?>" onclick="return confirm('Yakin ingin menghapus data alat?');">Delete</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
      
<footer class="shadow-lg bg-subtle p-3">
  <div class="container-fluid d-flex justify-content-between">
    <p class="mt-2">Created by <span class="text-primary">Kelompok 5</span> © 2024</p>
    <p class="mt-2">Versi 1.0</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
