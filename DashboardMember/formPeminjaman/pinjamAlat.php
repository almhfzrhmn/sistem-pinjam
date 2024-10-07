<?php 
session_start();

if(!isset($_SESSION["signIn"])) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}

require "../../config/config.php";

// Tangkap id alat dari URL (GET)
$idAlat = $_GET["id"];
$query = queryReadData("SELECT * FROM alat_olahraga WHERE id_alat = '$idAlat'");

// Menampilkan data siswa yang sedang login
$nisnSiswa = $_SESSION["member"]["nisn"];
$dataSiswa = queryReadData("SELECT * FROM member WHERE nisn = $nisnSiswa");

// Mendapatkan daftar admin
$admin = queryReadData("SELECT * FROM admin");

// Peminjaman alat
if(isset($_POST["pinjam"])) {
  // Mengonversi tanggal peminjaman dan pengembalian ke format timestamp
  $tgl_pinjam = strtotime($_POST["tgl_pinjam"]);
  $tgl_pengembalian = strtotime($_POST["tgl_pengembalian"]);

  // Validasi tanggal pengembalian harus lebih besar dari tanggal peminjaman
  if($tgl_pengembalian <= $tgl_pinjam) {
      echo "<script>
          alert('Tanggal pengembalian harus lebih besar dari tanggal peminjaman!');
      </script>";
  } else {
      // Format tanggal ke dalam format yang sesuai dengan yang diharapkan oleh database
      $tgl_pinjam_formatted = date("Y-m-d H:i:s", $tgl_pinjam);
      $tgl_pengembalian_formatted = date("Y-m-d H:i:s", $tgl_pengembalian);

      // Menambahkan tanggal yang sudah diformat ke dalam $_POST sebelum memanggil fungsi pinjamAlat()
      $_POST["tgl_pinjam"] = $tgl_pinjam_formatted;
      $_POST["tgl_pengembalian"] = $tgl_pengembalian_formatted;

      // Melakukan peminjaman alat
      $result = pinjamAlat($_POST);
      
      // Menampilkan pesan berdasarkan hasil peminjaman
      if($result > 0) {
          echo "<script>
              alert('Alat berhasil dipinjam');
          </script>";
      } else {
          echo "<script>
              alert('Alat gagal dipinjam!');
          </script>";
      }
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
  <title>Form Peminjaman Alat || Member</title>
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
    <h2 class="mt-5">Form Peminjaman Alat</h2>
    <div class="card">
      <h5 class="card-header">Data Lengkap Alat</h5>
      <div class="card-body d-flex flex-wrap gap-5 justify-content-center">
        <?php foreach ($query as $item) : ?>
          <img src="../../imgDB/<?= $item["gambar"]; ?>" width="180px" height="185px" style="border-radius: 5px;">

        <form action="" method="post">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Id Alat</span>
            <input type="text" class="form-control" placeholder="id alat" aria-label="Username" aria-describedby="basic-addon1" value="<?= $item["id_alat"]; ?>" readonly>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nama Alat</span>
            <input type="text" class="form-control" placeholder="nama alat" aria-label="nama alat" aria-describedby="basic-addon1" value="<?= $item["nama_alat"]; ?>" readonly>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Kategori</span>
            <input type="text" class="form-control" placeholder="kategori" aria-label="kategori" aria-describedby="basic-addon1" value="<?= $item["kategori"]; ?>" readonly>
            </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Tahun Produksi</span>
            <input type="date" class="form-control" placeholder="tahun_produksi" aria-label="tahun_produksi" aria-describedby="basic-addon1" value="<?= $item["tahun_produksi"]; ?>" readonly>
            </div>
        <?php endforeach; ?>
        </form>
      </div>
    </div>
    
    <div class="card mt-4">
      <h5 class="card-header">Data Lengkap Siswa</h5>
      <div class="card-body d-flex flex-wrap gap-4 justify-content-center">
        <p><img src="../../assets/memberLogo.png" width="150px"></p>
        <form action="" method="post">
          <?php foreach ($dataSiswa as $item) : ?>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">NISN</span>
            <input type="number" class="form-control" placeholder="nisn" aria-label="nisn" aria-describedby="basic-addon1" value="<?= $item["nisn"]; ?>" readonly>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Kode Member</span>
            <input type="text" class="form-control" placeholder="kode member" aria-label="kode member" aria-describedby="basic-addon1" value="<?= $item["kode_member"]; ?>" readonly>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nama</span>
            <input type="text" class="form-control" placeholder="nama" aria-label="nama" aria-describedby="basic-addon1" value="<?= $item["nama"]; ?>" readonly>
            </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Jenis Kelamin</span>
            <input type="text" class="form-control" placeholder="jenis kelamin" aria-label="jenis kelamin" aria-describedby="basic-addon1" value="<?= $item["jenis_kelamin"]; ?>" readonly>
            </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Kelas</span>
            <input type="text" class="form-control" placeholder="kelas" aria-label="kelas" aria-describedby="basic-addon1" value="<?= $item["kelas"]; ?>" readonly>
            </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Jurusan</span>
            <input type="text" class="form-control" placeholder="jurusan" aria-label="jurusan" aria-describedby="basic-addon1" value="<?= $item["jurusan"]; ?>" readonly>
            </div>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">No Tlp</span>
            <input type="no_tlp" class="form-control" placeholder="no tlp" aria-label="no tlp" aria-describedby="basic-addon1" value="<?= $item["no_tlp"]; ?>" readonly>
            </div>
        <?php endforeach; ?>
        </form>
      </div>
    </div>
    
    <div class="alert alert-danger mt-4" role="alert">Silahkan periksa kembali data diatas, pastikan sudah benar sebelum meminjam alat!. jika ada kesalahan data harap hubungi admin</div>
    
    <div class="card mt-4">
      <h5 class="card-header">Form Peminjaman Alat</h5>
      <div class="card-body">
        <form action="" method="post">
          <!-- Ambil data id alat -->
          <?php foreach ($query as $item) : ?>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Id Alat</span>
            <input type="text" name="id_alat" class="form-control" placeholder="id alat" aria-label="id_alat" aria-describedby="basic-addon1" value="<?= $item["id_alat"]; ?>" readonly>
          </div>

          <?php endforeach; ?>
          <!-- Ambil data NISN user yang login -->
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">NISN</span>
            <input type="number" name="nisn" class="form-control" placeholder="nisn" aria-label="nisn" aria-describedby="basic-addon1" value="<?php echo htmlentities($_SESSION["member"]["nisn"]); ?>" readonly>
          </div>

          <!-- Pilih id admin -->
          <select name="id_admin" class="form-select mb-3" aria-label="Default select example">
            <option selected>Pilih id admin</option>
            <?php foreach ($admin as $item) : ?>
            <option><?= $item["id"]; ?></option>
            <?php endforeach; ?>
          </select>

        <!-- Tanggal pinjam -->
      <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">Tanggal Pinjam</span>
       <input type="datetime-local" name="tgl_pinjam" id="tgl_pinjam" class="form-control" aria-label="tanggal pinjam" aria-describedby="basic-addon1" required>
      </div>

        <!-- Tanggal kembali -->
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Tenggat Pengembalian</span>
       <input type="datetime-local" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control" aria-label="tenggat pengembalian" aria-describedby="basic-addon1" required>
      </div>

          <a class="btn btn-danger" href="../alat/daftarAlat.php"> Batal</a>
          <button type="submit" class="btn btn-success" name="pinjam">Pinjam</button>
        </form>
      </div>
    </div>
  
    <div class="alert alert-danger mt-4" role="alert"><span class="fw-bold">Catatan :</span> Setiap keterlambatan pada pengembalian alat akan dikenakan sanksi berupa denda.</div>
    
  </div>
  
  <footer class="shadow-lg bg-subtle p-3">
    <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Created by <span class="text-primary"> Kelompok 5</span> © 2024</p>
      <p class="mt-2">versi 1.0</p>
    </div>
  </footer>
  
  <!--JAVASCRIPT -->
  <script src="../../style/js/script.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
