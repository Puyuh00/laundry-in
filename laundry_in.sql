-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 03:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_in`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(255) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat`, `no_telepon`) VALUES
('1', 'Zulia Amalia', 'Jalan Bakung     ', '087734117898'),
('2', 'Setyawan Djorghi', 'Jalan Merantik ', '087819340109');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(255) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `no_telepon`) VALUES
(1, 'Alberto Gustian N', 'Jalan Andong', '083107849264'),
(2, 'Yuswo Saroso', 'Jalan Anyelir', '081256149121'),
(3, 'Musyaffa N Fauzi', 'Jalan Sukun ', '081255794373');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id_layanan` int(255) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `nama_layanan`, `biaya`, `deskripsi`) VALUES
(1, 'Cuci Reguler', '5.000     ', 'Cuci biasa (2 hari)'),
(2, 'Cuci Kilat', '6.500', 'Cuci cepat (1 hari)'),
(3, 'Cuci Setrika', '7.000', 'Cuci + setrika (2 hari)'),
(4, 'Cuci Kering', '7.500', 'Cuci khusus (2 hari)'),
(5, 'Cuci Selimut', '8.000', 'Cuci selimut (2 hari)'),
(6, 'Cuci Sprei', '8.000', 'Cuci sprei (2 hari)'),
(7, 'Cuci Komplit', '10.000', 'Cuci cepat + setrika + kering (1 hari)');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `no_telepon`) VALUES
(' C001', 'Andi', 'Jalan tambakboyo ', '087848360932'),
(' C002', 'Gilang', 'Jalan Merapi', '083167873441'),
(' C003', 'Junior', 'Jalan Lely', '081290756349'),
(' C004', 'Akhdan', 'Jalan Merbabu', '085689780924'),
(' C005', 'Panji', 'Jalan Kamboja', '081287169939'),
(' C006', 'Rajendra ', 'Jalan Pelita', '087756731290'),
(' C007', 'Rochmat ', 'Jalan Kaliurang', '083136791251'),
(' C008', 'Juan ', 'Jalan Alkid', '087834991225');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(255) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `total_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `metode_pembayaran`, `tanggal_pembayaran`, `total_pembayaran`) VALUES
(' B001', 'DANA', '2023-07-08', ' 14.000'),
(' B002', 'OVO', '2023-07-08', ' 15.000'),
(' B003', 'Cash', '2023-07-08', ' 8.000'),
(' B004', 'QRIS', '2023-07-09', ' 20.000'),
(' B005', 'VA BNI', '2023-07-09', ' 13.000'),
(' B006', 'GoPay', '2023-07-09', ' 16.000'),
(' B007', 'VA Mandiri', '2023-07-09', ' 20.000'),
(' B008', 'GoPay', '2023-07-09', ' 26.000');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Zulia Amalia', 'zulia', '4200', 'Admin'),
(2, 'Alberto Gustian N', 'albert', '4229', 'Karyawan'),
(3, 'Setyawan Djorghi', 'djorghi', '4239', 'Admin'),
(4, 'Yuswo Saroso', 'yuswo', '4214', 'Karyawan'),
(6, 'Musyaffa N Fauzi', 'musyaffa', '4256', 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(255) NOT NULL,
  `layanan` varchar(100) NOT NULL,
  `biaya_layanan` varchar(255) NOT NULL,
  `berat` varchar(255) NOT NULL,
  `total_biaya` varchar(255) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `layanan`, `biaya_layanan`, `berat`, `total_biaya`, `tanggal_masuk`, `tanggal_keluar`, `status`) VALUES
('P001', 'Cuci Setrika', '7.000', '2', '14.000', '2023-07-08', '2023-07-10', 'Diambil'),
('P002', 'Cuci Kering', '7.500', '2', '15.000', '2023-07-08', '2023-07-10', 'Diambil'),
('P003', 'Cuci Selimut', '8.000', '1', '8.000', '2023-07-08', '2023-07-10', 'Selesai'),
('P004', 'Cuci Reguler', '5.000', '4', '20.000', '2023-07-09', '2023-07-11', 'Selesai'),
('P005', 'Cuci Kilat', '6.500', '2', '13.000', '2023-07-09', '2023-07-10', 'Selesai'),
('P006', 'Cuci Sprei', '8.000', '2', '16.000', '2023-07-09', '2023-07-11', 'Proses'),
('P007', 'Cuci Komplit', '10.000', '2', '20.000', '2023-07-09', '2023-07-10', 'Proses'),
('P008', 'Cuci Kilat', '6.500', '4', '26.000', '2023-07-09', '2023-07-10', 'Proses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
