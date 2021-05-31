-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2017 at 04:40 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrgram`
--

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `id` int(11) NOT NULL,
  `layanan` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `min` int(100) NOT NULL,
  `maks` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id`, `layanan`, `harga`, `min`, `maks`) VALUES
(1, 'Instagram Followers Server 2', 9000, 200, 3000),
(2, 'Instagram Views Server 1', 5500, 100, 2000),
(3, 'Instagram Likes Server 1', 3500, 100, 4000),
(4, 'Followers Aktif Indo ( Bonus Pasif )', 56500, 100, 7000),
(5, 'Instagram Live Views Like [ USERNAME ]', 11500, 100, 7000),
(6, 'FB Likes On Post/Photo', 11500, 100, 10000),
(8, 'Twitter Followers Server 1', 11500, 100, 1500),
(9, 'Instagram Followers Server 7 LOW', 11500, 100, 4000),
(10, 'Instagram Likes Server 2', 5500, 100, 6000),
(11, 'Instagram Like Aktif Indo [ MANUAL ]', 8500, 100, 3000),
(12, 'Instagram Followers Server 4', 17500, 200, 3000),
(13, 'Youtube Views Server 1', 11500, 1000, 100000),
(14, 'Instagram Followers Server 6', 17500, 100, 3000),
(15, 'Twitter Retweets Server 1', 10500, 100, 7000),
(16, 'Instagram Followers Server 1 Instant', 13500, 200, 4000),
(17, 'Instagram Story Views', 11500, 100, 8000),
(18, 'Twitter Favorites HQ', 9500, 100, 8000),
(19, 'Instagram Followers Server 3 Instant', 10500, 200, 3000),
(20, 'Instagram Followers Server 5', 14500, 100, 7000),
(21, 'Instagram Followers Server 8 HQ REAL', 11500, 100, 5000),
(22, 'Instagram Followers Server 9 HQ', 13500, 200, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_order`
--

CREATE TABLE `riwayat_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `layanan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `created` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_order`
--

INSERT INTO `riwayat_order` (`id`, `order_id`, `layanan`, `username`, `created`, `link`, `jumlah`, `harga`, `status`) VALUES
(3, '116977', 'Instagram Likes Server 1', 'hafizh', '20-08-2017 03:17:41', 'https://www.instagram.com/p/BVsCsO6BlMA/', '100', '350', 'Completed'),
(4, '116987', 'Instagram Likes Server 1', 'hafizh', '20-08-2017 03:59:38', 'https://www.instagram.com/p/BUeIkW2BJ5z/', '100', '350', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `saldo` varchar(100) NOT NULL,
  `level` enum('Admin','Member') NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `saldo`, `level`, `join_date`) VALUES
(1, 'hafizh', 'hafizh99', 'hafizhrahman12@gmail.com', '8999650', 'Admin', '2017-08-12'),
(3, 'admin', 'hafizh99', 'hafizhrahman12@gmail.com', '0', 'Admin', '2017-08-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_order`
--
ALTER TABLE `riwayat_order`
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
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `riwayat_order`
--
ALTER TABLE `riwayat_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
