-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 10:13 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinwash`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_kastamer`
--

CREATE TABLE `db_kastamer` (
  `no` int(11) NOT NULL,
  `tanggal_dibuat` varchar(60) NOT NULL,
  `no_kartu` varchar(10) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `no_hp` varchar(60) NOT NULL,
  `tanggal_cap` text NOT NULL,
  `hitung_cap` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_kastamer`
--

INSERT INTO `db_kastamer` (`no`, `tanggal_dibuat`, `no_kartu`, `nama`, `no_hp`, `tanggal_cap`, `hitung_cap`) VALUES
(1, '11/01/2021', '001', 'zaki', '085780652005', '11/01/2021', 6),
(2, '11/02/2021', '002', 'Faras', '081281881072', '11/02/2021', 1),
(3, '11/03/2021', '003', 'ibu ani blok H', '', '11/03/2021', 7),
(12, '11/05/2021', '004', 'Ruko Sebelah Iksan', '', '11/05/2021', 4),
(13, '11/05/2021', '005', 'Tian', '', '11/05/2021', 3),
(14, '11/05/2021', '006', 'Iyas', '', '11/05/2021', 1),
(15, '11/06/2021', '007', 'Ida', '', '11/06/2021', 4),
(16, '11/07/2021', '008', 'Niko', '', '11/07/2021', 1),
(17, '11/07/2021', '009', 'Retno', '', '11/07/2021', 1),
(18, '11/09/2021', '0010', 'Aini', '', '11/09/2021', 1),
(19, '11/10/2021', '0011', 'Rangga', '', '11/10/2021', 1),
(20, '11/11/2021', '0012', 'Bunga', '', '11/11/2021', 4),
(21, '11/12/2021', '0013', 'Ibu Aisyah', '', '11/12/2021', 1),
(22, '11/15/2021', '0014', 'Andy', '', '11/15/2021', 1),
(23, '11/19/2021', '0015', 'Yusi', '', '11/19/2021', 1),
(24, '11/20/2021', '0016', 'Kristin', '', '11/20/2021', 2),
(25, '11/26/2021', '0017', 'Pia', '', '11/26/2021', 1),
(26, '12/03/2021', '0018', 'alex', '084556161', '12/03/2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_list_harga`
--

CREATE TABLE `db_list_harga` (
  `id` int(11) NOT NULL,
  `paket` varchar(100) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `dibuat` datetime NOT NULL,
  `terakhir_diedit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_list_harga`
--

INSERT INTO `db_list_harga` (`id`, `paket`, `harga`, `dibuat`, `terakhir_diedit`) VALUES
(1, 'Cuci - Kering - Lipat /3kg', 15000, '2021-10-26 10:59:52', '2021-10-26 10:59:52'),
(2, 'Cuci - Kering - Lipat /6kg', 20000, '2021-10-26 10:59:52', '2021-10-26 10:59:52'),
(3, 'Cuci - Kering - Strika /3kg', 20000, '2021-10-26 11:01:59', '2021-10-26 11:01:59'),
(4, 'Cuci - Kering - Strika /6kg', 35000, '2021-10-26 11:01:59', '2021-10-26 11:01:59'),
(5, 'Selimut', 20000, '2021-10-26 11:01:59', '2021-10-26 11:01:59'),
(6, 'Bed Cover Single 90cm - 120 cm', 20000, '2021-10-26 11:03:42', '2021-10-26 11:03:42'),
(7, 'Bed Cover Queen - 120cm - 160 cm', 25000, '2021-10-26 11:04:32', '2021-10-26 11:04:32'),
(8, 'Bed Cover KING - 160cm - 200 cm MAX', 30000, '2021-10-26 11:04:32', '2021-10-26 11:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `db_login`
--

CREATE TABLE `db_login` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `Akses` enum('admin','karyawan') NOT NULL,
  `di_buat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `db_penjualan`
--

CREATE TABLE `db_penjualan` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `paket` varchar(350) NOT NULL,
  `qty` varchar(60) NOT NULL,
  `no_kartu` smallint(6) NOT NULL,
  `no_bon` varchar(9) NOT NULL,
  `list_harga` varchar(300) NOT NULL,
  `total_harga` mediumint(9) NOT NULL,
  `nominal_penjualan` mediumint(9) NOT NULL,
  `kembalian` mediumint(9) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `wash` varchar(100) NOT NULL,
  `dry` varchar(100) NOT NULL,
  `koin_terpakai` smallint(6) NOT NULL,
  `catatan` varchar(300) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `tanggal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_penjualan`
--

INSERT INTO `db_penjualan` (`id`, `nama`, `paket`, `qty`, `no_kartu`, `no_bon`, `list_harga`, `total_harga`, `nominal_penjualan`, `kembalian`, `no_hp`, `wash`, `dry`, `koin_terpakai`, `catatan`, `Status`, `tanggal`) VALUES
(1, 'zaki', 'Cuci - Kering - Strika /3kg,Cuci - Kering - Strika /6kg,', '1,1', 1, '1999', '', 55000, 55000, 0, '085780652005', 'Mesin 1Mesin 3', 'Mesin 1Mesin 3', 4, 'transfer', 'Lunas', '11/01/2021'),
(2, 'Faras', 'Cuci - Kering - Lipat /6kg,', '1', 2, '2000', '20000', 20000, 20000, 0, '081281881072', 'Mesin 3', 'Mesin 3', 2, '', 'Lunas', '11/02/2021'),
(3, 'ibu ani blok H', 'Cuci - Kering - Lipat /6kg,', '1', 3, '601', '20000', 20000, 50000, 30000, '', 'Mesin 1', 'Mesin 1', 2, '', 'Lunas', '11/03/2021'),
(4, 'Ida', 'Cuci - Kering - Lipat /6kg,', '1', 5, '602', '20000', 20000, 50000, 30000, '', 'Mesin 3', 'Mesin 3', 2, '', 'Lunas', '11/04/2021'),
(5, 'Faras', 'Cuci - Kering - Lipat /6kg,', '1', 2, '603', '20000', 20000, 20000, 0, '081281881072', 'Mesin 1', 'Mesin 1', 2, 'tidak ada', 'Lunas', '11/04/2021'),
(19, 'Ruko Sebelah Iksan', 'Cuci - Kering - Lipat /6kg,', '2', 4, '605', '20000', 40000, 40000, 0, '', 'Mesin 2Mesin 3', 'Mesin 2Mesin 3', 4, 'tidak ada', 'Lunas', '11/05/2021'),
(30, 'zaki ', 'Cuci - Kering - Strika /3kg,Cuci - Kering - Strika /6kg,', '1,2', 1, '0604', '20000,35000', 90000, 90000, 0, '', 'Mesin 1Mesin 2Mesin 3', 'Mesin 1Mesin 2Mesin 3', 6, 'pembayaran transfer', 'Lunas', '11/04/2021'),
(31, 'Ruko Sebelah Iksan', 'Cuci - Kering - Lipat /6kg,', '2', 4, '0605', '20000', 40000, 50000, 10000, '', 'Mesin 2Mesin 3', 'Mesin 2Mesin 3', 4, 'tidak ada', 'Lunas', '11/05/2021'),
(32, 'Tian', 'Cuci - Kering - Strika /6kg,', '1', 5, '0604', '35000', 35000, 50000, 15000, '', 'Mesin 3', 'Mesin 3', 2, 'tidak ada', 'Lunas', '11/05/2021'),
(33, 'Iyas', 'Cuci - Kering - Strika /3kg,Cuci - Kering - Strika /6kg,', '1,2', 6, '0607', '20000,35000', 90000, 100000, 10000, '', 'Mesin 1Mesin 2Mesin 3', 'Mesin 1Mesin 2Mesin 3', 6, 'tidak ada', 'Lunas', '11/05/2021'),
(34, 'Ida', 'Cuci - Kering - Lipat /6kg,', '1', 7, '0608', '20000', 20000, 20000, 0, '', 'Mesin 3', 'Mesin 3', 2, '', 'Lunas', '11/06/2021'),
(35, 'Niko', 'Cuci - Kering - Lipat /3kg,', '3', 8, '0609', '15000', 45000, 50000, 5000, '', 'Mesin 1Mesin 2Mesin 3', 'Mesin 1Mesin 2Mesin 3', 6, '', 'Lunas', '11/07/2021'),
(42, 'ibu ani blok H ', 'Cuci - Kering - Lipat /3kg,Cuci - Kering - Lipat /6kg,', '1,1', 3, '0610', '15000,20000', 35000, 50000, 15000, '', 'Mesin 1Mesin 2', 'Mesin 1Mesin 2', 4, '', 'Lunas', '11/07/2021'),
(43, 'Retno', 'Cuci - Kering - Lipat /6kg,', '1', 9, '0611', '20000', 20000, 20000, 0, '', 'Mesin 3', 'Mesin 3', 2, '', 'Lunas', '11/07/2021'),
(44, 'Ida ', 'Cuci - Kering - Lipat /6kg,', '1', 7, '0612', '20000', 20000, 20000, 0, '', 'Mesin 3', 'Mesin 3', 2, '', 'Lunas', '11/08/2021'),
(45, 'Aini', 'Cuci - Kering - Lipat /3kg,Bed Cover Single 90cm - 120 cm ,', '1,1', 10, '0613', '15000,20000', 35000, 50000, 15000, '', 'Mesin 1Mesin 2', 'Mesin 1Mesin 2', 4, '', 'Lunas', '11/09/2021'),
(46, 'zaki ', 'Cuci - Kering - Strika /6kg,', '1', 1, '0614', '35000', 35000, 35000, 0, '', 'Mesin 2Mesin 3', 'Mesin 2Mesin 3', 4, 'potong voucher free cuci 6kg', 'Lunas', '11/09/2021'),
(47, 'Ida ', 'Cuci - Kering - Lipat /6kg,', '1', 7, '0615', '20000', 20000, 20000, 0, '', 'Mesin 3', 'Mesin 3', 2, '', 'Lunas', '11/09/2021'),
(48, 'Rangga', 'Cuci - Kering - Lipat /3kg,', '1', 11, '0616', '15000', 15000, 15000, 0, '', 'Mesin 2', 'Mesin 2', 2, '', 'Lunas', '11/10/2021'),
(49, 'Bunga', 'Cuci - Kering - Lipat /3kg,Cuci - Kering - Lipat /6kg,', '1,2', 12, '0615', '15000,20000', 55000, 55000, 0, '', 'Mesin 1Mesin 2Mesin 3', 'Mesin 1Mesin 2Mesin 3', 6, '', 'Lunas', '11/11/2021'),
(50, 'ibu ani blok H ', 'Cuci - Kering - Lipat /3kg,Cuci - Kering - Lipat /6kg,', '1,1', 3, '0617', '15000,20000', 35000, 50000, 15000, '', 'Mesin 1Mesin 2', 'Mesin 1Mesin 2', 4, '', 'Lunas', '11/11/2021'),
(51, 'Ibu Aisyah', 'Cuci - Kering - Lipat /3kg,Cuci - Kering - Lipat /6kg,', '1,1', 13, '0618', '15000,20000', 35000, 50000, 15000, '', 'Mesin 1Mesin 2', 'Mesin 1Mesin 2', 0, '', 'Lunas', '11/12/2021'),
(52, 'Ruko Sebelah Iksan ', 'Cuci - Kering - Lipat /6kg,', '2', 4, '0619', '20000', 40000, 40000, 0, '', 'Mesin 1Mesin 2', 'Mesin 1Mesin 2', 4, '', 'Lunas', '11/13/2021'),
(53, 'Tian ', 'Cuci - Kering - Strika /6kg,', '1', 5, '0620', '35000', 35000, 50000, 15000, '', 'Mesin 2Mesin 3', 'Mesin 2Mesin 3', 4, '', 'Lunas', '11/13/2021'),
(54, 'Andy', 'Cuci - Kering - Lipat /6kg,', '1', 14, '0621', '20000', 20000, 20000, 0, '', 'Mesin 3', 'Mesin 3', 2, '', 'Lunas', '11/15/2021'),
(55, 'ibu ani blok H ', 'Cuci - Kering - Lipat /6kg,', '1', 3, '0622', '20000', 20000, 20000, 0, '', 'Mesin 3', 'Mesin 3', 2, '', 'Lunas', '11/16/2021'),
(56, 'zaki ', 'Cuci - Kering - Strika /6kg,', '3', 1, '0623', '35000', 105000, 105000, 0, '', 'Mesin 1Mesin 2Mesin 3', 'Mesin 1Mesin 2Mesin 3', 6, '', 'Lunas', '11/16/2021'),
(57, 'Bunga ', 'Cuci - Kering - Lipat /6kg,', '1', 12, '0624', '20000', 20000, 20000, 0, '', 'Mesin 1', 'Mesin 1', 2, '', 'Lunas', '11/18/2021'),
(58, 'Yusi', 'Cuci - Kering - Lipat /6kg,', '1', 15, '0625', '20000', 20000, 20000, 0, '', 'Mesin 3', 'Mesin 3', 2, '', 'Lunas', '11/19/2021'),
(59, 'Ruko Sebelah Iksan ', 'Cuci - Kering - Lipat /3kg,Cuci - Kering - Lipat /6kg,', '1,1', 4, '0626', '15000,20000', 35000, 35000, 0, '', 'Mesin 1Mesin 2', 'Mesin 1Mesin 2', 4, '', 'Lunas', '11/19/2021'),
(60, 'Kristin', 'Cuci - Kering - Lipat /3kg,', '1', 16, '0627', '15000', 15000, 15000, 0, '', 'Mesin 2', 'Mesin 2', 2, '', 'Lunas', '11/20/2021'),
(61, 'ibu ani blok H ', 'Cuci - Kering - Lipat /6kg,', '1', 3, '0628', '20000', 20000, 50000, 30000, '', 'Mesin 1', 'Mesin 1', 2, '', 'Lunas', '11/20/2021'),
(62, 'zaki ', 'Cuci - Kering - Strika /6kg,', '2', 1, '1630', '35000', 70000, 70000, 0, '', 'Mesin 2Mesin 3', 'Mesin 2Mesin 3', 4, 'tf', 'Lunas', '11/22/2021'),
(63, 'Kristin ', 'Cuci - Kering - Lipat /3kg,', '1', 16, '0631', '15000', 15000, 15000, 0, '', 'Mesin 2', 'Mesin 2', 2, '', 'Lunas', '11/23/2021'),
(64, 'ibu ani blok H ', 'Cuci - Kering - Lipat /6kg,', '1', 3, '0632', '20000', 20000, 20000, 0, '', 'Mesin 1', 'Mesin 1', 2, '', 'Lunas', '11/24/2021'),
(65, 'Bunga ', 'Cuci - Kering - Lipat /6kg,', '2', 12, '0633', '20000', 40000, 40000, 0, '', 'Mesin 1Mesin 2', 'Mesin 1Mesin 2', 4, '', 'Lunas', '11/25/2021'),
(66, 'Ida ', 'Cuci - Kering - Lipat /6kg,', '1', 7, '0634', '20000', 20000, 20000, 0, '', 'Mesin 1', 'Mesin 1', 2, '', 'Lunas', '11/25/2021'),
(67, 'Ruko Sebelah Iksan ', 'Cuci - Kering - Lipat /6kg,', '2', 4, '0635', '20000', 40000, 40000, 0, '', 'Mesin 1Mesin 2', 'Mesin 1Mesin 2', 4, '', 'Lunas', '11/26/2021'),
(68, 'Pia', 'Cuci - Kering - Lipat /6kg,', '1', 17, '0636', '20000', 20000, 50000, 30000, '', 'Mesin 3', 'Mesin 3', 2, '', 'Lunas', '11/26/2021'),
(69, 'Bunga ', 'Cuci - Kering - Lipat /6kg,', '2', 12, '0637', '20000', 40000, 40000, 0, '', 'Mesin 2Mesin 3', 'Mesin 2Mesin 3', 4, '', 'Lunas', '11/27/2021'),
(70, 'Tian ', 'Cuci - Kering - Strika /6kg,', '1', 5, '0638', '35000', 35000, 35000, 0, '', 'Mesin 1', 'Mesin 1', 2, '', 'Belum Lunas', '11/27/2021'),
(71, 'zaki ', 'Cuci - Kering - Strika /3kg,Cuci - Kering - Strika /6kg,', '1,2', 1, '0639', '20000,35000', 90000, 90000, 0, '', 'Mesin 1Mesin 2Mesin 3', 'Mesin 1Mesin 2Mesin 3', 6, '', 'Belum Lunas', '11/27/2021'),
(72, 'ibu ani blok H ', 'Cuci - Kering - Lipat /6kg,', '1', 3, '0640', '20000', 20000, 100000, 80000, '', 'Mesin 1', 'Mesin 1', 2, '', 'Lunas', '11/29/2021'),
(73, 'alex', 'Selimut,', '2', 18, '1919', '20000', 40000, 50000, 10000, '084556161', 'Mesin 2', 'Mesin 2', 2, 'tidak ada', 'Lunas', '12/03/2021');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('admin','karyawan') NOT NULL,
  `tanggal_dibuat` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `tanggal_dibuat`) VALUES
(1, 'admin', 'admin', 'admin', '06/12/2021'),
(2, 'karyawan', 'karyawan', 'karyawan', '06/12/2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_kastamer`
--
ALTER TABLE `db_kastamer`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `db_list_harga`
--
ALTER TABLE `db_list_harga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_login`
--
ALTER TABLE `db_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_penjualan`
--
ALTER TABLE `db_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_kastamer`
--
ALTER TABLE `db_kastamer`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `db_list_harga`
--
ALTER TABLE `db_list_harga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_login`
--
ALTER TABLE `db_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `db_penjualan`
--
ALTER TABLE `db_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
