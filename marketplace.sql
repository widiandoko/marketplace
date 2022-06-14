-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 05:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `no_order` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `no_order`, `id_produk`, `qty`) VALUES
(8, '20220603SVL1UDIE', 4, 1),
(9, '20220603SVL1UDIE', 5, 2),
(10, '202206038BVRACMR', 4, 1),
(11, '202206038BVRACMR', 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Herbs Product'),
(2, 'Health Food and Beverages'),
(3, 'Cosmetics and Home Care');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(3) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(3) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`nik`, `nama`, `jk`, `tanggal_lahir`, `usia`, `alamat`, `telp`) VALUES
('1234567', '', 'L', '2022-05-17', 0, 'semarang', '123');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `nik` varchar(16) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `nama_toko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`nik`, `jk`, `tanggal_lahir`, `alamat`, `telp`, `nama_toko`) VALUES
('123456', 'L', '2022-05-31', 'semarang', '123456', 'toko'),
('33344', 'L', '2022-04-20', 'semarang', '123456789', 'Halalmart muntal');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi_produk` mediumtext NOT NULL,
  `harga_produk` varchar(255) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `berat` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `harga_produk`, `gambar_produk`, `berat`, `id_kategori`, `username`) VALUES
(4, 'magafit', 'magafit', '90000', 'MAGAFIT-3_04-01-19_.png', 500, 1, 'andi'),
(5, 'MHS', 'minyak herba sinergi', '45000', 'mhs2021_05-05-21_.png', 100, 1, 'andi'),
(6, 'deepsqua', 'deepsqua', '460000', 'DEEPSQUA-2021_18-04-22_.png', 100, 1, 'andi'),
(7, 'redangin', 'redangin', '43000', 'redangin2021_18-04-22_.png', 0, 1, 'andi'),
(8, 'minyak kayu putih', 'minyak kayu putih', '43000', 'MINYAK_KAYU_PUTIH_18-04-22_1.png', 0, 2, 'andi'),
(9, 'madu pahit', 'Madu Pahit memiliki rasa yang khas karena diproduksi oleh lebah jenis Apis dorsata yang mengonsumsi nektar dari kuncup pohon yang pahit seperti tanaman kirinyuh, pohon jati, pohon mahoni, tanaman benalu dan tanaman Clidemia hirta atau tanaman keduduk bulu', '120000', 'MADU_PAHIT-1_04-01-19_.png', 0, 2, 'andi'),
(10, 'CENTELLA TEH SINERGI', 'CENTELLA TEH SINERGI', '70000', 'CENTELLA-1_04-01-19_.png', 0, 2, 'andi'),
(11, 'ETTA GOAT MILK (EGM)', 'ETTA GOAT MILK (EGM)', '75000', 'egm_2019_27-10-20_.png', 0, 2, 'andi'),
(12, 'HNI COFFEE (HC)', 'HNI COFFEE (HC)', '125000', 'hcmockup2021_27-12-21_.png', 0, 2, 'andi'),
(13, 'sabun propolis', 'sabun propolis', '20000', 'SABUN_PROPOLIS-2_07-01-19_.png', 0, 3, 'andi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_order` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `no_penerima` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `username_pembeli` varchar(255) NOT NULL,
  `username_penjual` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_order`, `total_harga`, `nama_penerima`, `no_penerima`, `alamat`, `status`, `username_pembeli`, `username_penjual`) VALUES
(3, '20220603SVL1UDIE', '208000', 'budi', '087830183813', 'semarang', 1, 'budi', 'andi'),
(4, '202206038BVRACMR', '257000', 'budi', '0881232', 'semarang', 1, 'budi', 'andi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role_id`, `nik`) VALUES
('andi', '$2y$10$qtAonE/qDEaHPTKO/4sCT.P./dEfph0pfQNnu0KKJfR/8A/EINqUa', 2, '33344'),
('budi', '$2y$10$zjFvWJaGfH2BsKuPEc06UeibuWcELm40GXIm/bqb8PQIxLZQhrpv.', 3, '1234567'),
('operator', '123', 1, '12345'),
('operator1', '$2y$10$GlvRwSRNwS38mVOGHl62Q.jBVXJ.IdIGl3FPGFkcll.oAPYihjrxu', 1, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`,`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
