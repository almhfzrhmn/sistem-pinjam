<?php 
require "../../config/config.php";
$alatId = $_GET["id"];
//var_dump($alatId); die;

if(delete($alatId) > 0) {
  echo "
  <script>
  alert('Data Alat Olahraga berhasil dihapus');
  document.location.href = 'daftarAlat.php';
  </script>";
}else {
  echo "
  <script>
  alert('Data Alat Olahraga gagal dihapus');
  document.location.href = 'daftarAlat.php';
  </script>";
}
?>