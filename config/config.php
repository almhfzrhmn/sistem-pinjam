<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database_name = "sport";
$connection = mysqli_connect($host, $username, $password, $database_name);

// === FUNCTION KHUSUS ADMIN START ===

// MENAMPILKAN DATA KATEGORI ALAT OLAHRAGA
function queryReadData($dataKategori) {
  global $connection;
  $result = mysqli_query($connection, $dataKategori);
  $items = [];
  while($item = mysqli_fetch_assoc($result)) {
    $items[] = $item;
  }     
  return $items;
}

// Menambahkan data alat olahraga 
function tambahAlat($dataAlat) {
  global $connection;

  $gambar =upload();
  $idAlat = htmlspecialchars($dataAlat["id_alat"]);
  $kategoriAlat = $dataAlat["kategori"];
  $namaAlat = htmlspecialchars($dataAlat["nama_alat"]);
  $merekAlat = htmlspecialchars($dataAlat["merek"]); 
  $tahunProduksi = $dataAlat["tahun_produksi"];
  $deskripsiAlat = htmlspecialchars($dataAlat["alat_deskripsi"]);
  
  if(!$gambar) {
    return 0;
  } 

  $queryInsertDataAlat = "INSERT INTO alat_olahraga (gambar, id_alat, kategori, nama_alat, merek, tahun_produksi, alat_deskripsi) 
  VALUES ('$gambar', '$idAlat', '$kategoriAlat', '$namaAlat', '$merekAlat', '$tahunProduksi', '$deskripsiAlat')";

  mysqli_query($connection, $queryInsertDataAlat);
  return mysqli_affected_rows($connection);
}     


// Function upload gambar 
function upload() {
  $namaFile = $_FILES["gambar"]["name"];
  $ukuranFile = $_FILES["gambar"]["size"];
  $error = $_FILES["gambar"]["error"];
  $tmpName = $_FILES["gambar"]["tmp_name"];
  
  // cek apakah ada gambar yg diupload
  if($error === 4) {
    echo "<script>
    alert('Silahkan upload gambar alat terlebih dahulu!')
    </script>";
    return 0;
  }
  
  // cek kesesuaian format gambar
  $jpg = "jpg";
  $jpeg = "jpeg";
  $png = "png";
  $svg = "svg";
  $bmp = "bmp";
  $psd = "psd";
  $tiff = "tiff";
  $formatGambarValid = [$jpg, $jpeg, $png, $svg, $bmp, $psd, $tiff];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  
  if(!in_array($ekstensiGambar, $formatGambarValid)) {
    echo "<script>
    alert('Format file tidak sesuai');
    </script>";
    return 0;
  }
  
  // batas ukuran file
  if($ukuranFile > 2000000) {
    echo "<script>
    alert('Ukuran file terlalu besar!');
    </script>";
    return 0;
  }
  
   //generate nama file baru, agar nama file tdk ada yg sama
  $namaFileBaru = uniqid();
  $namaFileBaru .= ".";
  $namaFileBaru .= $ekstensiGambar;
  
  move_uploaded_file($tmpName, '../../imgDB/' . $namaFileBaru);
  return $namaFileBaru;
} 

// MENAMPILKAN SESUATU SESUAI DENGAN INPUTAN USER PADA * SEARCH ENGINE *
function search($keyword) {
  // search data alat olahraga
  $querySearch = "SELECT * FROM alat_olahraga 
  WHERE
  nama_alat LIKE '%$keyword%' OR
  kategori LIKE '%$keyword%'
  ";
  return queryReadData($querySearch);


// search data pengembalian || member
$dataPengembalian = "SELECT * FROM pengembalian 
WHERE 
id_pengembalian '%$keyword%' OR
id_alat LIKE '%$keyword%' OR
nama_alat LIKE '%$keyword%' OR
kategori LIKE '%$keyword%' OR
nisn LIKE '%$keyword%' OR
nama LIKE '%$keyword%' OR
nama_admin LIKE '%$keyword%' OR
tgl_pengembalian LIKE '%$keyword%' OR
keterlambatan LIKE '%$keyword%' OR
denda LIKE '%$keyword%'";
return queryReadData($dataPengembalian);
}

function searchMember ($keyword) {
   // search member terdaftar || admin
 $searchMember = "SELECT * FROM member WHERE 
 nisn LIKE '%$keyword%' OR 
 kode_member LIKE '%$keyword%' OR
 nama LIKE '%$keyword%' OR 
 jurusan LIKE '%$keyword%'
 ";
 return queryReadData($searchMember);
}

// DELETE DATA Alat
function delete($alatId) {
  global $connection;
  $queryDeleteAlat = "DELETE FROM alat_olahraga WHERE id_alat = '$alatId'";
  mysqli_query($connection, $queryDeleteAlat);
  
  return mysqli_affected_rows($connection);
}

// UPDATE || EDIT DATA ALAT 
function updateAlat($dataAlat) {
  global $connection;

  $gambarLama = htmlspecialchars($dataAlat["gambarLama"]);
  $idAlat = htmlspecialchars($dataAlat["id_alat"]);
  $kategoriAlat = $dataAlat["kategori"];
  $namaAlat = htmlspecialchars($dataAlat["nama_alat"]);
  $merekAlat = htmlspecialchars($dataAlat["merek"]); 
  $tahunProduksi = $dataAlat["tahun_produksi"];
  $deskripsiAlat = htmlspecialchars($dataAlat["alat_deskripsi"]); 

  // pengecekan mengganti gambar || tidak
  if($_FILES["gambar"]["error"] === 4) {
      $gambar = $gambarLama;
  } else {
      $gambar = upload();
  }

  $queryUpdate = "UPDATE alat_olahraga SET 
      gambar = '$gambar',
      id_alat = '$idAlat',
      kategori = '$kategoriAlat',
      nama_alat = '$namaAlat',
      merek = '$merekAlat',
      tahun_produksi = '$tahunProduksi',
      alat_deskripsi = '$deskripsiAlat'
      WHERE id_alat = '$idAlat'
  ";

  mysqli_query($connection, $queryUpdate);
  return mysqli_affected_rows($connection);
}


// Hapus member yang terdaftar
function deleteMember($nisnMember) {
  global $connection;
  
  $deleteMember = "DELETE FROM member WHERE nisn = $nisnMember";
  mysqli_query($connection, $deleteMember);
  return mysqli_affected_rows($connection);
}

// Hapus history pengembalian data ALAT
function deleteDataPengembalian($idPengembalian) {
  global $connection;
  
  $deleteDataPengembalianAlat = "DELETE FROM pengembalian WHERE id_pengembalian = $idPengembalian";
  mysqli_query($connection, $deleteDataPengembalianAlat);
  return mysqli_affected_rows($connection);
}
// === FUNCTION KHUSUS ADMIN END ===


// === FUNCTION KHUSUS MEMBER START ===
// Peminjaman ALAT
function pinjamAlat($dataAlat) {
  global $connection;

  $idAlat = $dataAlat["id_alat"];
  $nisn = $dataAlat["nisn"];
  $idAdmin = $dataAlat["id_admin"];
  $tglPinjam = $dataAlat["tgl_pinjam"]; // Perbaikan disini
  $tglKembali = $dataAlat["tgl_pengembalian"]; // Perbaikan disini

  // Cek apakah user memiliki denda
  $cekDenda = mysqli_query($connection, "SELECT denda FROM pengembalian WHERE nisn = $nisn && denda > 0");
  if (mysqli_num_rows($cekDenda) > 0) {
    $item = mysqli_fetch_assoc($cekDenda);
    $jumlahDenda = $item["denda"];
    if ($jumlahDenda > 0) {
      echo "<script>
       alert('Anda belum melunasi denda, silahkan lakukan pembayaran terlebih dahulu !');
       </script>";
      return 0;
    }
  }
  // Cek batas user meminjam alat berdasarkan nisn
  $nisnResult = mysqli_query($connection, "SELECT nisn FROM peminjaman WHERE nisn = $nisn");
  if (mysqli_fetch_assoc($nisnResult)) {
    echo "<script>
    alert('Anda sudah meminjam alat, Harap kembalikan dahulu alat yg anda pinjam!');
    </script>";
    return 0;
  }

  $queryPinjam = "INSERT INTO peminjaman VALUES(null, '$idAlat', $nisn, $idAdmin, '$tglPinjam', '$tglKembali')";
  mysqli_query($connection, $queryPinjam);
  return mysqli_affected_rows($connection);
}


// Pengembalian ALAT
function pengembalianAlat($dataAlat) {
  global $connection;
  
  // Variabel pengembalian
  $idPeminjaman = $dataAlat["id_peminjaman"];
  $idAlat = $dataAlat["id_alat"];
  $nisn = $dataAlat["nisn"];
  $idAdmin = $dataAlat["id_admin"];
  $tenggatPengembalian = $dataAlat["tgl_pengembalian"];
  $alatKembali = $dataAlat["alat_kembali"];
  $keterlambatan = $dataAlat["keterlambatan"];
  $denda = $dataAlat["denda"];
  
  
  if($alatKembali > $tenggatPengembalian) {
    echo "<script>
    alert('Anda terlambat mengembalikan alat, harap bayar denda sesuai dengan jumlah yang ditentukan!');
    </script>";
  }
  // Menghapus data siswa yang sudah mengembalikan alat
  $hapusDataPeminjam = "DELETE FROM peminjaman WHERE id_peminjaman = $idPeminjaman";

  // Memasukkan data kedalam tabel pengembalian
  $queryPengembalian = "INSERT INTO pengembalian VALUES(null, $idPeminjaman, '$idAlat', $nisn, $idAdmin, '$alatKembali', '$keterlambatan', $denda)";

  
  mysqli_query($connection, $hapusDataPeminjam);
  mysqli_query($connection, $queryPengembalian);
  return mysqli_affected_rows($connection);
}

function bayarDendaAlat($data) {
  global $connection;
  $idPengembalian = $data["id_pengembalian"];
  $jmlDenda = $data["denda"];
  $jmlDibayar = $data["bayarDenda"];
  $calculate = $jmlDenda - $jmlDibayar;
  
  $bayarDenda = "UPDATE pengembalian SET denda = $calculate WHERE id_pengembalian = $idPengembalian";
  mysqli_query($connection, $bayarDenda);
  return mysqli_affected_rows($connection);
}

// === FUNCTION KHUSUS MEMBER END ===
?>