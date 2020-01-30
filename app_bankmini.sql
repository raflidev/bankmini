-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 03:11 AM
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
('1320729922', 'Rendy', 'Taman Alamanda Blok J'),
('4354597272', 'Sujudi', 'Bumi Anggrek'),
('4494490838', 'Fujimaru', 'Singularity 8'),
('5696613512', 'Mash', 'Singularity 7'),
('5918518971', 'Rafli', 'Puri Cendana'),
('5988200557', 'Naufal', 'Jl Merak'),
('6971372658', 'Rifqi', 'Kelapa gading'),
('8755372067', 'Aldi', 'Perum 3');

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
(1, '1320729922', 100000),
(4, '1320729922', -50000),
(5, '1320729922', 60000),
(6, '5918518971', 100000),
(7, '5918518971', 100000),
(8, '1320729922', 1000000),
(9, '5918518971', 1000000),
(10, '5918518971', 10000),
(11, '5988200557', 100000),
(12, '4354597272', 100000),
(13, '8755372067', 69),
(14, '8755372067', 1),
(15, '8755372067', 100),
(16, '8755372067', 200),
(17, '8755372067', 100),
(18, '8755372067', 100),
(19, '8755372067', 100),
(20, '8755372067', -500),
(21, '8755372067', 500),
(22, '8755372067', 500),
(23, '8755372067', 500),
(24, '8755372067', 500),
(25, '8755372067', -500),
(26, '8755372067', -500),
(27, '8755372067', -500),
(28, '8755372067', -500),
(29, '8755372067', 500),
(30, '8755372067', 500),
(31, '8755372067', 500),
(32, '8755372067', 500),
(33, '8755372067', 500),
(34, '8755372067', 500),
(35, '8755372067', 500),
(36, '8755372067', -500),
(37, '8755372067', -500),
(38, '8755372067', -500),
(39, '8755372067', -500),
(40, '8755372067', -500),
(41, '8755372067', -500),
(42, '8755372067', -500),
(43, '8755372067', 230),
(44, '8755372067', 230),
(45, '8755372067', 230),
(46, '8755372067', -200),
(47, '8755372067', 200),
(48, '8755372067', -200),
(49, '8755372067', 200),
(50, '8755372067', 1000),
(51, '8755372067', 1000),
(52, '4354597272', 10000000),
(53, '6971372658', 6000),
(54, '5988200557', 100),
(55, '8755372067', 9),
(56, '4354597272', -100000),
(57, '1320729922', 100),
(58, '5918518971', 1),
(59, '1320729922', 1),
(60, '1320729922', 1),
(61, '1320729922', -1),
(62, '1320729922', -1),
(63, '1320729922', 1),
(64, '1320729922', -1),
(65, '1320729922', 1),
(66, '1320729922', 2),
(67, '1320729922', 2),
(68, '1320729922', 2),
(69, '1320729922', 2),
(70, '1320729922', 2),
(71, '1320729922', 2),
(72, '1320729922', 2),
(73, '1320729922', 2),
(74, '1320729922', 1),
(75, '1320729922', 1),
(76, '1320729922', -1000),
(77, '1320729922', -19),
(78, '1320729922', 1),
(79, '1320729922', 1),
(80, '4354597272', 1),
(81, '1320729922', 1),
(82, '1320729922', 1),
(83, '1320729922', 1),
(84, '1320729922', 1),
(85, '1320729922', 1),
(86, '1320729922', 1),
(87, '1320729922', 1),
(88, '1320729922', 1),
(89, '1320729922', 1),
(90, '1320729922', 1),
(91, '1320729922', 1),
(92, '1320729922', 1),
(93, '1320729922', 1),
(94, '1320729922', 1),
(95, '1320729922', 1),
(96, '1320729922', 1),
(97, '1320729922', 1),
(98, '1320729922', 1),
(99, '1320729922', 1),
(100, '1320729922', 1),
(101, '1320729922', 1),
(102, '1320729922', 1),
(103, '1320729922', 1),
(104, '1320729922', 1),
(105, '1320729922', 1),
(106, '1320729922', 1),
(107, '1320729922', 1),
(108, '1320729922', 1),
(109, '1320729922', 1),
(110, '1320729922', 20),
(111, '1320729922', 20),
(112, '1320729922', 1),
(113, '1320729922', 1),
(114, '1320729922', 1),
(115, '1320729922', 1),
(116, '1320729922', 1),
(117, '1320729922', 1),
(118, '1320729922', 1),
(119, '1320729922', 1),
(120, '1320729922', 1),
(121, '1320729922', 1),
(122, '1320729922', 1),
(123, '1320729922', -81),
(124, '1320729922', -81),
(125, '1320729922', -1),
(126, '1320729922', -1),
(127, '1320729922', 1),
(128, '1320729922', 1),
(129, '1320729922', 1),
(130, '1320729922', 1),
(131, '1320729922', 1),
(132, '1320729922', 1),
(133, '1320729922', 1),
(134, '1320729922', 1),
(135, '1320729922', 5),
(136, '1320729922', 5),
(137, '1320729922', 1),
(138, '1320729922', 1),
(139, '1320729922', 1),
(140, '1320729922', 1),
(141, '1320729922', 1),
(142, '1320729922', 1),
(143, '1320729922', 1),
(144, '1320729922', 1),
(145, '1320729922', 1),
(146, '1320729922', 1),
(147, '4354597272', 1),
(148, '4354597272', 1),
(149, '1320729922', 1),
(150, '1320729922', 1),
(151, '1320729922', 1),
(152, '1320729922', 1),
(153, '1320729922', 1),
(154, '1320729922', 1),
(155, '1320729922', 20),
(156, '1320729922', 20),
(157, '1320729922', 10),
(158, '5696613512', 10),
(159, '4494490838', 60);

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
(1, 'rafli', 'rafli', 1);

-- --------------------------------------------------------

--
-- Structure for view `history`
--
DROP TABLE IF EXISTS `history`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `history`  AS  select `transaksi`.`id_transaksi` AS `id_transaksi`,`transaksi`.`id_akun` AS `id_akun`,`akun`.`nama` AS `nama`,`transaksi`.`transaksi` AS `transaksi` from (`transaksi` join `akun` on((`akun`.`id_akun` = `transaksi`.`id_akun`))) order by `transaksi`.`id_transaksi` desc limit 10 ;

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
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
