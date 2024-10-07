<?php
require "../../config/config.php";
// Ambil data dari URL
$review = $_GET["idReview"];
$reviewData = queryReadData("SELECT * FROM alat_olahraga WHERE id_alat = '$review'")[0];


// Data kategori alat olahraga
$kategori = queryReadData("SELECT * FROM kategori_alat");

if(isset($_POST["update"])) {
  
  if(updateAlat($_POST) > 0) {
    echo "<script>
    alert('Data Alat Olahraga berhasil diupdate!');
    document.location.href = 'daftarAlat.php';
    </script>";
  }else {
    echo "<script>
    alert('Data Alat Olahraga gagal diupdate!');
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
    <title>Edit data alat olahraga || Admin</title>
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
              <a class="nav-link text-success" href="daftarAlat.php">Browse</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container p-3 mt-5">
      <div class="card p-2 mt-5">
        <h1 class="text-center fw-bold p-3">Form Edit Alat Olahraga</h1>
        <form action="" method="post" enctype="multipart/form-data" class="mt-3 p-2">
          <div class="custom-css-form">

          <div class="custom-css-form">
              <input type="hidden" name="gambarLama" value="<?= $reviewData["gambar"];?>">
              <img src="../../imgDB/<?= $reviewData["gambar"]; ?>" width="80px" height="80px">
              <label for="formFileMultiple" class="form-label">Gambar Alat</label>
              <input class="form-control" type="file" name="gambar" id="formFileMultiple">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Id Alat</label>
              <input type="text" class="form-control" name="id_alat" id="exampleFormControlInput1" placeholder="Contoh: bb001" value="<?= $reviewData["id_alat"]; ?>" >
            </div>
          </div>

          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Kategori</label>
            <select class="form-select" id="inputGroupSelect01" name="kategori">
              <option selected><?= $reviewData["kategori"]; ?></option>
              <?php foreach ($kategori as $item) : ?>
              <option><?= $item["kategori"]; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-book"></i></span>
            <input type="text" class="form-control" name="nama_alat" id="nama_alat" placeholder="Nama Alat" aria-label="Username" aria-describedby="basic-addon1" value="<?= $reviewData["nama_alat"]; ?>">
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Merek</label>
            <input type="text" class="form-control" name="merek" id="exampleFormControlInput1" placeholder="Merek alat"  value="<?= $reviewData["merek"]; ?>">
          </div>
            
          <label for="validationCustom01" class="form-label">Tahun Produksi</label>
          <div class="input-group mt-0">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-calendar-days"></i></span>
            <input type="date" class="form-control" name="tahun_produksi" id="validationCustom01"  value="<?= $reviewData["tahun_produksi"]; ?>">
          </div>

          <div class="form-floating mt-3 mb-3">
            <textarea class="form-control" placeholder="deskripsi tentang alat ini" name="alat_deskripsi" id="floatingTextarea2" style="height: 100px"><?= $reviewData["alat_deskripsi"]; ?></textarea>
            <label for="floatingTextarea2">Deskripsi</label>  
          </div>
          
          <button class="btn btn-success" type="submit" name="update">Edit</button>
          <a class="btn btn-danger" href="daftarAlat.php">Batal</a>
        </form>
      </div>
    </div>
    
    <footer class="mt-5 shadow-lg bg-subtle p-3">
      <div class="container-fluid d-flex justify-content-between">
        <p class="mt-2">Created by <span class="text-primary">Kelompok 5</span> © 2024</p>
        <p class="mt-2">versi 1.0</p>
      </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
