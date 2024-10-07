<?php
session_start();

if (!isset($_SESSION["signIn"])) {
    header("Location: ../../sign/member/sign_in.php");
    exit;
}

require "../../config/config.php";

// Query untuk mendapatkan semua buku
$buku = queryReadData("SELECT * FROM alat_olahraga");

// Pencarian buku
if (isset($_POST["search"])) {
    $buku = search($_POST["keyword"]);
}

// Read buku dengan kategori "Bola Besar"
if (isset($_POST["bola_besar"])) {
    $buku = queryReadData("SELECT * FROM alat_olahraga WHERE kategori = 'Bola Besar'");
}

// Read buku dengan kategori "Bola Kecil"
if (isset($_POST["bola_kecil"])) {
    $buku = queryReadData("SELECT * FROM alat_olahraga WHERE kategori = 'Bola Kecil'");
}

// Read buku dengan kategori "Raket"
if (isset($_POST["raket"])) {
    $buku = queryReadData("SELECT * FROM alat_olahraga WHERE kategori = 'Raket'");
}

// Read buku dengan kategori "Perintilan"
if (isset($_POST["perintilan"])) {
    $buku = queryReadData("SELECT * FROM alat_olahraga WHERE kategori = 'Perintilan'");
}

// Read buku dengan kategori "Bat"
if (isset($_POST["bat"])) {
    $buku = queryReadData("SELECT * FROM alat_olahraga WHERE kategori = 'Bat'");
}
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
    <title>Daftar Alat Olahraga || Member</title>
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
    <!-- Btn filter data kategori buku -->
    <div class="d-flex gap-2 mt-5 justify-content-center">
        <form action="" method="post">
            <div class="layout-card-custom">
                <button class="btn btn-primary" type="submit">Semua</button>
                <button type="submit" name="bola_besar" class="btn btn-outline-primary">Bola Besar</button>
                <button type="submit" name="bola_kecil" class="btn btn-outline-primary">Bola Kecil</button>
                <button type="submit" name="raket" class="btn btn-outline-primary">Raket</button>
                <button type="submit" name="perintilan" class="btn btn-outline-primary">Perintilan</button>
                <button type="submit" name="bat" class="btn btn-outline-primary">Bat</button>
            </div>
        </form>
    </div>

    <form action="" method="post" class="mt-5">
        <div class="input-group d-flex justify-content-end mb-3">
            <input class="border p-2 rounded rounded-end-0 bg-tertiary" type="text" name="keyword" id="keyword"
                   placeholder="Cari judul atau kategori buku...">
            <button class="border border-start-0 bg-light rounded rounded-start-0" type="submit" name="search"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </form>

    <!-- Card buku -->
    <div class="layout-card-custom d-flex flex-wrap" style="margin: 1rem; justify-content: space-between;">
        <?php foreach ($buku as $item) : ?>
            <div class="card" style="width: 15rem;">
                <img src="../../imgDB/<?= $item["gambar"]; ?>" class="card-img-top" alt="gambarAlat"
                     height="250px">
                <div class="card-body">
                    <h5 class="card-title"><?= $item["nama_alat"]; ?></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Kategori : <?= $item["kategori"]; ?></li>
                </ul>
                <div class="card-body">
                    <a class="btn btn-success" href="detailAlat.php?id=<?= $item["id_alat"]; ?>">Detail</a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>
</html>
