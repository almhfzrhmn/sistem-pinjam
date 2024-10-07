<?php 
require "../../config/config.php";

$idAlat = $_GET["id"];
$query = queryReadData("SELECT * FROM alat_olahraga WHERE id_alat = '$idAlat'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Detail Alat Olahraga || Member</title>
</head>
<body>
<nav class="navbar fixed-top bg-body-tertiary shadow-sm">
    <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">
            <img src="../../assets/logoNav.png" alt="logo" width="100px">
        </a>

        <a class="btn btn-tertiary" href="../dashboardMember.php">Dashboard</a>
    </div>
</nav>

<div class="p-4 mt-5">
    <h2 class="mt-5">Detail Alat Olahraga</h2>
    <div class="d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <?php foreach ($query as $item) : ?>
                <img src="../../imgDB/<?= $item["gambar"]; ?>" class="card-img-top" alt="gambarAlat" height="250px">
                <div class="card-body">
                    <h5 class="card-title"><?= isset($item["nama_alat"]) ? $item["nama_alat"] : "Nama tidak tersedia"; ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Kategori : <?= isset($item["kategori"]) ? $item["kategori"] : "Kategori tidak tersedia"; ?></li>
                    <li class="list-group-item">Tahun Produksi : <?= isset($item["tahun_produksi"]) ? $item["tahun_produksi"] : "Tahun Produksi tidak tersedia"; ?></li>
                    <li class="list-group-item">Deskripsi Alat : <?= isset($item["alat_deskripsi"]) ? $item["alat_deskripsi"] : "Deskripsi tidak tersedia"; ?></li>
                </ul>
            <?php endforeach; ?>
            <div class="card-body">
                <a href="daftarAlat.php" class="btn btn-danger">Batal</a>
                <a href="../formPeminjaman/pinjamAlat.php?id=<?= isset($item["id_alat"]) ? $item["id_alat"] : ""; ?>" class="btn btn-success">Pinjam</a>
            </div>
        </div>
    </div>
</div>

<footer class="shadow-lg bg-subtle p-3">
    <div class="container-fluid d-flex justify-content-between">
        <p class="mt-2">Created by <span class="text-primary">Kelompok 5</span> © 2024</p>
        <p class="mt-2">Versi 1.0</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
