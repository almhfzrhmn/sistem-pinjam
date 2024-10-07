<?php 
session_start();

if(!isset($_SESSION["signIn"])) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}

require "../../config/config.php";

$idPeminjaman = $_GET["id"];
$query = queryReadData("SELECT peminjaman.id_peminjaman, peminjaman.id_alat, alat_olahraga.nama_alat, peminjaman.nisn, member.nama, peminjaman.id_admin, peminjaman.tgl_peminjaman, peminjaman.tgl_pengembalian
FROM peminjaman
INNER JOIN alat_olahraga ON peminjaman.id_alat = alat_olahraga.id_alat
INNER JOIN member ON peminjaman.nisn = member.nisn
WHERE peminjaman.id_peminjaman = $idPeminjaman");

// Jika tombol submit kembalikan diklik
if(isset($_POST["kembalikan"]) ) {
  
  if(pengembalianAlat($_POST) > 0) {
    echo "<script>
    alert('Terimakasih telah mengembalikan alat!');
    </script>";
  } else {
    echo "<script>
    alert('Alat gagal dikembalikan');
    </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
  <title>Form Pengembalian Alat || Member</title>
</head>
<body>
  <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
    <div class="container-fluid p-3">
      <a class="navbar-brand" href="#">
        <img src="../../assets/logoNav.png" alt="logo" width="80px">
      </a>
      <a class="btn btn-tertiary" href="../dashboardMember.php">Dashboard</a>
    </div>
  </nav>
  
  <div class="p-4 mt-5">
    <div class="card p-3 mt-5">
      <form action="" method="post">
        <h3>Form Pengembalian alat</h3>
        <?php foreach ($query as $item) : ?>
        <div class="mt-3 d-flex flex-wrap gap-3">
          <div class="mb-3">
            <label for="id_peminjaman" class="form-label">Id Peminjaman</label>
            <input type="number" class="form-control" name="id_peminjaman" id="id_peminjaman" value="<?= $item["id_peminjaman"]; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="id_alat" class="form-label">Id Alat</label>
            <input type="text" class="form-control" name="id_alat" id="id_alat" value="<?= $item["id_alat"]; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="nama_alat" class="form-label">Nama Alat</label>
            <input type="text" class="form-control" name="nama_alat" id="nama_alat" value="<?= $item["nama_alat"]; ?>" readonly>
          </div>
        </div>
        <div class="d-flex flex-wrap gap-3">
          <div class="mb-3">
            <label for="nisn" class="form-label">NISN Siswa</label>
            <input type="number" class="form-control" name="nisn" id="nisn" value="<?= $item["nisn"]; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Siswa</label>
            <input type="text" class="form-control" name="nama" id="nama" value="<?= $item["nama"]; ?>" readonly>
          </div>
          <div class="mb-3">
            <label for="id_admin" class="form-label">Id Admin Perpustakaan</label>
            <input type="number" class="form-control" name="id_admin" id="id_admin" value="<?= $item["id_admin"]; ?>" readonly>
          </div>
        </div>
        <div class="d-flex flex-wrap gap-4">
    <div class="mb-3">
        <label for="tgl_peminjaman" class="form-label">Tanggal Alat Dipinjam</label>
        <input type="datetime-local" class="form-control" name="tgl_peminjaman" id="tgl_peminjaman" value="<?= date('Y-m-d H:i:s', strtotime($item["tgl_peminjaman"])); ?>"  readonly>
    </div>
    <div class="mb-3">
        <label for="tgl_pengembalian" class="form-label">Tenggat Pengembalian Alat</label> <br>
        <span><?= date('Y-m-d H:i:s', strtotime($item["tgl_pengembalian"])); ?></span>
        <input type="datetime" class="form-control" name="tgl_pengembalian" id="tgl_pengembalian" value="<?= date('Y-m-d H:i:s', strtotime($item["tgl_pengembalian"])); ?>" readonly style="color: white;">
    </div>
          
    <div class="mb-3">
        <label for="alat_kembali" class="form-label">Tanggal Pengembalian Alat</label>
        <input type="timestamp" class="form-control" name="alat_kembali" id="alat_kembali" value="<?= date('Y-m-d H:i:s'); ?>" oninput="hitungDenda()">
    </div>
    </div>
        </div>
        <?php endforeach; ?> 
        <div class="d-flex flex-wrap gap-4">
          <div class="mb-3">
            <label for="keterlambatan" class="form-label">Keterlambatan</label>
            <input type="text" class="form-control" name="keterlambatan" id="keterlambatan" oninput="hitungDenda()" readonly>
          </div>
          <div class="mb-3">
            <label for="denda" class="form-label">Denda</label>
            <input type="number" class="form-control" name="denda" id="denda" readonly>
          </div>
        </div>
        <a class="btn btn-danger" href="TransaksiPeminjaman.php"> Batal</a>
        <button type="submit" class="btn btn-success" name="kembalikan">Kembalikan</button>
      </form>
    </div>
  </div>
    
  <!--JAVASCRIPT -->
  <script src="../../style/js/script.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
