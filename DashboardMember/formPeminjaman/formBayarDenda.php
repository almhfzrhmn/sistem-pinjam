<?php 
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}
require "../../config/config.php";

if(isset($_POST["bayar"]) ) {
  
  if(bayarDendaAlat($_POST) > 0) {
    echo "<script>
    alert('Denda berhasil dibayar');
    document.location.href = 'TransaksiDenda.php';
    </script>";
  }else {
    echo "<script>
    alert('Denda gagal dibayar');
    </script>";
  }
  
}


$dendaSiswa = $_GET["id"];
$query = queryReadData("SELECT pengembalian.id_pengembalian, alat_olahraga.nama_alat, member.nama, pengembalian.alat_kembali, pengembalian.keterlambatan, pengembalian.denda
FROM pengembalian
INNER JOIN alat_olahraga ON pengembalian.id_alat = alat_olahraga.id_alat
INNER JOIN member ON pengembalian.nisn = member.nisn
WHERE pengembalian.id_pengembalian = $dendaSiswa");
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
    <title>Form Bayar Denda || Member</title>
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
    <div class="mt-5 card p-3 mb-5">
        <form action="" method="post">
            <h3>Form bayar denda</h3>
            <?php foreach ($query as $item) : ?>
            <input type="hidden" name="id_pengembalian" id="id_pengembalian" value="<?= $item["id_pengembalian"]; ?>">
            
            <div class="mt-4 mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control" placeholder="Nama siswa" name="nama" id="nama" value="<?= $item["nama"]; ?>" readonly>
            </div>
            
            <div class="d-flex flex-wrap gap-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alat yang dipinjam</label>
                    <input type="text" class="form-control" placeholder="Nama alat" name="judul" id="nama_alat" value="<?= $item["nama_alat"]; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal dikembalikan</label>
                    <input type="datetime-local" class="form-control" name="alat_kembali" id="alat_kembali" value="<?= $item["alat_kembali"]; ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Besar Denda</label>
                    <input type="number" class="form-control" name="denda" id="denda" value="<?= $item["denda"]; ?>" readonly>
                </div>
            </div>
            
            <div class="mb-3 mt-3">
                <label for="exampleFormControlInput1" class="form-label">Jumlah Denda yang dibayar</label>
                <input type="number" class="form-control" name="bayarDenda" id="bayarDenda" required>
            </div>
                  
            <button type="reset" class="btn btn-warning text-light">Reset</button>
            <button type="submit" class="btn btn-success" name="bayar">Bayar</button>
        </form>
        <?php endforeach; ?>
    </div>
</div>

<footer class="fixed-bottom mt-5 shadow-lg bg-subtle p-3">
    <div class="container-fluid d-flex justify-content-between">
        <p class="mt-2">Created by <span class="text-primary">Kelompok 5</span> © 2024</p>
        <p class="mt-2">versi 1.0</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>
</html>
