-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 09:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `kode_admin` varchar(12) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `password`, `kode_admin`, `no_tlp`) VALUES
(1, 'bambang subroto', '1234', 'admin1', '085749051409'),
(2, 'esti sitanggang', '4321', 'admin2', '085870283409'),
(3, 'Riska Haqika', 'oke123', 'admin3', '09876543');

-- --------------------------------------------------------

--
-- Table structure for table `alat_olahraga`
--

CREATE TABLE `alat_olahraga` (
  `gambar` varchar(255) NOT NULL,
  `id_alat` varchar(20) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_alat` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `tahun_produksi` date NOT NULL,
  `alat_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alat_olahraga`
--

INSERT INTO `alat_olahraga` (`gambar`, `id_alat`, `kategori`, `nama_alat`, `merek`, `tahun_produksi`, `alat_deskripsi`) VALUES
('bola basket.jpg', 'bb01', 'bola_besar', 'Bola Basket', '', '2023-06-06', 'Berat: Sekitar 22 ons.\r\nDiameter: Sekitar 29,5 inci untuk bola pria.\r\nTekanan Udara: Biasanya berkisar antara 7,5 hingga 8,5 psi.\r\nMaterial: Terbuat dari karet atau bahan sintetis yang tahan lama.'),
('663f98b61c6f7.jpg', 'bb02', 'bola_besar', 'Bola Kaki', '', '2022-10-11', 'Berat: Sekitar 14-16 ons.\r\nDiameter: Sekitar 27-28 inci.\r\nTekanan Udara: Biasanya berkisar antara 8,5 hingga 15,6 psi.\r\nMaterial: Terbuat dari kulit sintetis atau kulit asli yang tahan lama.'),
('663f98f3510b5.jpg', 'bb03', 'bola_besar', 'Bola Futsal', '', '2023-06-11', 'Berat: Sekitar 14-16 ons.\r\nDiameter: Sekitar 24-25 inci.\r\nTekanan Udara: Biasanya berkisar antara 8,5 hingga 10,2 psi.\r\nMaterial: Terbuat dari kulit sintetis atau bahan yang tahan lama dan dapat digunakan di permukaan dalam ruangan.'),
('663fb9961a1d7.jpg', 'bb04', 'bola_besar', 'Bola Baseball', '', '2022-06-12', 'Berat: Sekitar 5-5,25 ons.\r\nDiameter: Sekitar 9 inchi.\r\nMaterial: Terbuat dari gabungan benang wol dan kapas yang dilapisi kulit alami atau sintetis.'),
('663f9997abe58.jpg', 'bk02', 'bola_kecil', 'Bola Takraw', '', '2022-06-11', 'Berat: Sekitar 5-6 ons.\r\nDiameter: Sekitar 5-6 inci.\r\nTekanan Udara: Biasanya tidak diberikan secara khusus.\r\nMaterial: Terbuat dari rotan atau bahan sintetis yang tahan lama dan elastis.'),
('663f984324b31.jpg', 'bk03', 'bola_kecil', 'Bola Rugby', '', '2023-04-19', 'Berat : 410-460 gram (14-16 ons) \r\nUkuran: Panjang sekitar 280-300 mm (11-12 inchi)\r\nUkuran: Panjang sekitar 280-300 mm (11-12 incihi)\r\nMaterial: Terbuat dari kulit asli atau sintetis yang tahan lama dan tahan terhadap benturan.'),
('663fba4ce1dbf.jpg', 'bk04', 'bola_kecil', 'Bola Tenis', '', '2023-07-10', 'Berat: Sekitar 2-2,1 ons.\r\nDiameter: Sekitar 2,5 inci.\r\nMaterial: Terbuat dari bahan karet yang tahan lama dan elastis.'),
('663fbaa6bc057.jpg', 'bk05', 'bola_kecil', 'Bola Golf', '', '2022-05-12', 'Berat: Sekitar 1,62 ons.\r\nDiameter: Sekitar 1,68 inci.\r\nMaterial: Terbuat dari bahan polimer yang tahan lama dan memberikan respons yang baik saat dipukul.'),
('663fb94911912.jpg', 'bt01', 'bat', 'Bat Baseball', '', '2021-06-12', 'Bentuk: Tongkat dengan ujung yang lebih besar yang melebar untuk memukul bola.\r\nUkuran: Panjangnya sekitar 30-34 inci.\r\nMaterial: Terbuat dari kayu (seperti maple atau ash) atau logam (baja atau aluminium).'),
('663fb9e882afb.jpg', 'bt02', 'bat', 'Putter', '', '2020-02-12', 'Ukuran: Panjangnya sekitar 32-36 inci.\r\nMaterial: Terbuat dari bahan yang berat seperti baja atau baja karbon untuk stabilitas dan kontrol yang baik.'),
('663f9ae20c752.jpg', 'prt01', 'perintilan', 'Sport Cone', '', '2023-02-11', 'Bentuk: Konus yang terbuat dari bahan yang ringan dan tahan lama seperti plastik atau karet.\r\nUkuran: Tingginya bervariasi dari beberapa inci hingga sekitar satu kaki.'),
('663fb855f3827.jpg', 'prt02', 'perintilan', 'Hulahop', '', '2023-01-11', 'ukuran diameter : 40 cm\r\nMaterial: Terbuat dari bahan plastik yang kuat dan fleksibel, s'),
('663fb8ce9b1fd.jpg', 'prt03', 'perintilan', 'Skipping Rope', '', '2022-07-12', 'Ukuran panjang : 50 cm\r\nBentuk: Tali panjang yang biasanya terbuat dari kawat baja, nilon, atau bahan karet.\r\nMaterial: Terbuat dari bahan yang kuat dan fleksibel untuk menahan tekanan dan gesekan selama penggunaan.');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_alat`
--

CREATE TABLE `kategori_alat` (
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori_alat`
--

INSERT INTO `kategori_alat` (`kategori`) VALUES
('bat'),
('bola_besar'),
('bola_kecil'),
('perintilan'),
('raket');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `nisn` int(11) NOT NULL,
  `kode_member` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `tgl_pendaftaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`nisn`, `kode_member`, `nama`, `password`, `jenis_kelamin`, `kelas`, `jurusan`, `no_tlp`, `tgl_pendaftaran`) VALUES
(202301, 'mem01', 'mangandaralam sakti ', '$2y$10$U53PbfrWXwvMiZ42WzdyfuRLyNKAAxecgPC7ZC..4pxGA8NtlrqBS', 'Laki laki', 'XI', 'Rekayasa Perangkat Lunak', '081383877025', '2023-10-22'),
(1111111, '7878686786', 'sayonara', '$2y$10$RaaGgIXaN7R.WmAURrasqO5jRIMDv6Y49iIE39.7rTsakn97lQq9C', 'Laki laki', 'X', 'Teknik Instalasi Tenaga Listrik', '098776543', '2024-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_alat` varchar(20) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_alat` varchar(20) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `alat_kembali` date NOT NULL,
  `keterlambatan` enum('YA','TIDAK') NOT NULL,
  `denda` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alat_olahraga`
--
ALTER TABLE `alat_olahraga`
  ADD PRIMARY KEY (`id_alat`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `kategori_alat`
--
ALTER TABLE `kategori_alat`
  ADD PRIMARY KEY (`kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `kode_member` (`kode_member`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_alat` (`id_alat`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_alat` (`id_alat`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alat_olahraga`
--
ALTER TABLE `alat_olahraga`
  ADD CONSTRAINT `alat_olahraga_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori_alat` (`kategori`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_alat`) REFERENCES `alat_olahraga` (`id_alat`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `member` (`nisn`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_alat`) REFERENCES `alat_olahraga` (`id_alat`),
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `member` (`nisn`),
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
