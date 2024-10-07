<?php 
session_start();

if(!isset($_SESSION["signIn"])) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}

require "../../config/config.php"; 

$nisnSiswa = $_SESSION["member"]["nisn"];

$dataDenda = queryReadData("SELECT pengembalian.id_pengembalian, pengembalian.id_peminjaman, pengembalian.id_alat, alat_olahraga.nama_alat, pengembalian.nisn, member.nama, admin.nama_admin, pengembalian.alat_kembali, pengembalian.keterlambatan, pengembalian.denda
FROM pengembalian
INNER JOIN alat_olahraga ON pengembalian.id_alat = alat_olahraga.id_alat
INNER JOIN member ON pengembalian.nisn = member.nisn
INNER JOIN admin ON pengembalian.id_admin = admin.id
WHERE pengembalian.nisn = '$nisnSiswa' AND pengembalian.denda > 0");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
  <title>Transaksi Denda Alat || Member</title>
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
    <div class="mt-5 alert alert-primary" role="alert">Riwayat Transaksi Denda Anda - <span class="fw-bold text-capitalize"><?php echo htmlentities($_SESSION["member"]["nama"]); ?></span></div>

    <div class="table-responsive mt-3">
      <table class="table table-striped table-hover">
        <thead class="text-center">
          <tr>
            <th class="bg-primary text-light">ID Alat</th>
            <th class="bg-primary text-light">Nama Alat</th>
            <th class="bg-primary text-light">NISN</th>
            <th class="bg-primary text-light">Nama Siswa</th>
            <th class="bg-primary text-light">Nama Admin</th>
            <th class="bg-primary text-light">Tanggal Pengembalian</th>
            <th class="bg-primary text-light">Keterlambatan (Hari)</th>
            <th class="bg-primary text-light">Denda (Rp)</th>
            <th class="bg-primary text-light">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dataDenda as $item) : ?>
          <tr>
            <td><?= $item["id_alat"]; ?></td>
            <td><?= $item["nama_alat"]; ?></td>
            <td><?= $item["nisn"]; ?></td>
            <td><?= $item["nama"]; ?></td>
            <td><?= $item["nama_admin"]; ?></td>
            <td><?= $item["alat_kembali"]; ?></td>
            <td><?= $item["keterlambatan"]; ?></td>
            <td><?= $item["denda"]; ?></td>
            <td>
              <a class="btn btn-success" href="formBayarDenda.php?id=<?= $item["id_pengembalian"]; ?>">Bayar</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  
  <footer class="fixed-bottom shadow-lg bg-subtle p-3">
    <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Created by <span class="text-primary">Kelompok 5</span> © 2024</p>
      <p class="mt-2">versi 1.0</p>
    </div>
  </footer>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
