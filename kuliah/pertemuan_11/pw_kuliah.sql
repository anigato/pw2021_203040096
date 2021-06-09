-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 02:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_kuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `capacity` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `capacity`, `description`, `price`, `img`) VALUES
(1, 'ADATA SSD XPG SX8200 PRO M.2 PCIE GEN3 NVME 1TB', 'SSD NVMEdawdawd', '512GBdwada', 'SX8200 M.2 2280 merupakan tipe SSD internal dari ADATA yang menggunakan interface PCIe Gen3x4 yang sangat cepat, dan memiliki kecepatan Read / Write yang sangat tinggi hingga 3500 / 3000 MB per detik. Serta dengan teknologi 3D NAND Flash yang memberikan kinerja lebih tinggi, ketahanan dan efisiensi daya yang tinggi.\r\ndadadawdadad', 2100000, '60ac667e74c46.png'),
(2, 'SANDISK SSD PLUS 240GB SATA 3 - SANDISK SSD 120 GB', 'SSD', '120GB', 'drive yang lebih efisien (jadi baterai laptop Anda bisa bertahan lama hanya dengan sekali pengisian.)', 350000, '60ac52ecca21b.png'),
(8, 'aaaaa', 'aaaaaaa', 'aaaaa', 'aaaaaaaa', 11423131, '60ac50af0e978.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'anam', '$2y$10$67Mkwp50EB5qSdOkOS9oduGMcVJNPKMzmkqdjbPzKlrtVVOWrvhPy', 'anam@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
