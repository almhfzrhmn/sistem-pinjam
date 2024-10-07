<?php
session_start();

if(!isset($_SESSION["signIn"])) {
  header("Location: ../sign/member/sign_in.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
  <title>Member Dashboard</title>
  <style>
    @media screen and(max-width: 600px) {
      .d-flex flex-wrap gap-2 cardImg a img {
        width: 200px;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
    <div class="container-fluid p-3">
      <a class="navbar-brand" href="#">
        <img src="../assets/logoNav.png" alt="logo" width="120px">
      </a>
      <div class="dropdown">
        <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../assets/memberLogo.png" alt="memberLogo" width="40px">
        </button>
        <ul style="margin-left: -7rem;" class="dropdown-menu position-absolute mt-2 p-2">
          <li>
            <a class="dropdown-item text-center" href="#">
              <img src="../assets/memberLogo.png" alt="adminLogo" width="30px">
            </a>
          </li>
          <li>
            <a class="dropdown-item text-center text-secondary" href="#">
              <span class="text-capitalize">
                <?php 
                  if(isset($_SESSION['member']) && isset($_SESSION['member']['nama'])) {
                    echo $_SESSION['member']['nama'];
                  } else {
                    echo "Nama Member Tidak Tersedia";
                  }
                ?>
              </span>
            </a>
            <a class="dropdown-item text-center mb-2" href="#">Siswa</a>
          </li>
          <li>
            <a class="dropdown-item text-center p-2 bg-danger text-light rounded" href="signOut.php">Sign Out <i class="fa-solid fa-right-to-bracket"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="mt-5 p-4">
    <?php
      $date = date('Y-m-d H:i:s');
      $day = date('l');
      $dayOfMonth = date('d');
      $month = date('F');
      $year = date('Y');
    ?>
    
    <h1 class="mt-5 fw-bold">Dashboard - <span class="fs-4 text-secondary"> <?php echo $day. " ". $dayOfMonth." ". " ". $month. " ". $year; ?> </span></h1>
    <div class="alert alert-success" role="alert">
      Selamat datang member - 
      <?php 
        if(isset($_SESSION['member']) && isset($_SESSION['member']['nama'])) {
          echo "<span class='text-capitalize fw-bold'>" . $_SESSION['member']['nama'] . "</span>";
        } else {
          echo "Nama Member Tidak Tersedia";
        }
      ?> 
      di Dashboard SportBorrowing
    </div>
    
    <div class="mt-3 p-3">
      <div class="mt-2 mb-4">
        <h3 class="mb-3">Layanan Alat Olahraga yang tersedia</h3>
      </div>
      <div class="d-flex flex-wrap justify-content-center gap-2">
        <div class="cardImg">
          <a href="alat_olahraga/daftarAlat.php">
            <img src="../assets/dashBoardCardMember/ALAT OLAHRAGA.png" alt="daftar alat" style="max-width: 100%;" width="600px">
          </a>
        </div>
        <div class="cardImg">
          <a href="formPeminjaman/TransaksiPeminjaman.php">
            <img src="../assets/dashboardCardMember/PEMINJAMAN.png" alt="daftar alat" style="max-width: 100%;" width="600px">
          </a>
        </div>

        <div class="cardImg">
          <a href="formPeminjaman/TransaksiPengembalian.php">
            <img src="../assets/dashboardCardMember/PENGEMBALIAN.png" alt="daftar alat" style="max-width: 100%;" width="600px">
          </a>
        </div>
        <div class="cardImg">
          <a href="formPeminjaman/TransaksiDenda.php">
            <img src="../assets/dashboardCardMember/DENDA.png" alt="daftar alat" style="max-width: 100%;" width="600px">
          </a>
        </div>
      </div>
    </div>
  </div> 

  <footer class="shadow-lg bg-subtle p-3">
    <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Created by <span class="text-primary"> Kelompok 5</span> © 2024</p>
      <p class="mt-2">versi 1.0</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
