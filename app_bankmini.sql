-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 04:34 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_bankmini`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` char(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `nama`, `alamat`) VALUES
('1552453831', 'Rafli', 'Puri'),
('160323987', 'Sujudi', 'Bumi Anggrek'),
('5128148686', 'Rendy', 'Alamanda'),
('7436863800', 'Naufal', 'karang satria'),
('9786121347', 'Fujimaru', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `history`
-- (See below for the actual view)
--
CREATE TABLE `history` (
`id_transaksi` int(11)
,`id_akun` char(10)
,`nama` varchar(20)
,`transaksi` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan`
-- (See below for the actual view)
--
CREATE TABLE `laporan` (
`id_akun` char(10)
,`nama` varchar(20)
,`saldo` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_akun` char(10) NOT NULL,
  `transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_akun`, `transaksi`) VALUES
(160, '7436863800', 10000),
(161, '5128148686', 90000),
(162, '5128148686', -10000),
(163, '7436863800', 50000),
(164, '5128148686', 10000),
(165, '7436863800', 40000),
(166, '7436863800', -60000),
(167, '5128148686', 60000),
(168, '5128148686', 15000),
(169, '7436863800', 90000),
(170, '5128148686', 0),
(171, '5128148686', -155000),
(172, '5128148686', 2147483647),
(173, '1552453831', 0),
(174, '1552453831', 10000),
(175, '1552453831', -10000),
(176, '1552453831', 50000),
(177, '1552453831', -10000),
(178, '1552453831', -100000),
(180, '1552453831', 600000),
(181, '9786121347', 60000000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'rafli', 'rafli', 1),
(2, 'admin', 'admin', 1),
(3, 'mantap', 'mantap', 1);

-- --------------------------------------------------------

--
-- Structure for view `history`
--
DROP TABLE IF EXISTS `history`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `history`  AS  select `transaksi`.`id_transaksi` AS `id_transaksi`,`transaksi`.`id_akun` AS `id_akun`,`akun`.`nama` AS `nama`,`transaksi`.`transaksi` AS `transaksi` from (`transaksi` join `akun` on((`akun`.`id_akun` = `transaksi`.`id_akun`))) order by `transaksi`.`id_transaksi` desc limit 10 ;

-- --------------------------------------------------------

--
-- Structure for view `laporan`
--
DROP TABLE IF EXISTS `laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan`  AS  select `akun`.`id_akun` AS `id_akun`,`akun`.`nama` AS `nama`,sum(`transaksi`.`transaksi`) AS `saldo` from (`akun` join `transaksi`) where (`akun`.`id_akun` = `transaksi`.`id_akun`) group by `akun`.`id_akun` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
