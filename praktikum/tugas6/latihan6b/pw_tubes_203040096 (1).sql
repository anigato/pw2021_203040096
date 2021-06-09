-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 04:24 PM
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
-- Database: `pw_tubes_203040096`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `stok` int(3) NOT NULL,
  `capacity` int(4) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `category`, `brand`, `stok`, `capacity`, `price`, `weight`, `img`, `description`) VALUES
(1, '43ate5rg', 'Sandisk 120GB SATA3', 'SSD', 'SANDISK', 76, 120, 400000, 123, 'sandisk1.png', 'SSd sandisk 120gb sata3, dengan kecepatan baca upto 500MB/s dan kecepatan tulis upto 400MB/s'),
(2, '4y5w', 'adata 120GB SATA3', 'SSD', 'ADATA', 15, 120, 300000, 345, 'ssd-adata.png', 'SSd adata 120gb sata3'),
(3, '54y5rft', 'adata xpg 512gb', 'SSD NVME', 'ADATA', 98, 512, 1500000, 400, 'ssd-adata-xpg.png', '<div>SSD Adata XPG SX8200 PRO 1TB M.2 NVME PCIE<br><br>Solid State Disk atau yang lazim kita kenal dengan SSD saat ini begitu popular di kalangan pengguna Laptop dan PC. Hal itu dikarenakan SSD memiliki banyak Kelebihan jika dibandingkan dengan Hardisk atau HDD.<br><br>SX8200 M.2 2280 merupakan tipe SSD internal dari ADATA yang menggunakan interface PCIe Gen3x4 yang sangat cepat, dan memiliki kecepatan Read / Write yang sangat tinggi hingga 3500 / 3000 MB per detik. Serta dengan teknologi 3D NAND Flash yang memberikan kinerja lebih tinggi, ketahanan dan efisiensi daya yang tinggi.<br><br>SSD Pci express ini sangat cocok buat Gamers, PC overclok, atau membuat Video dan kebutuhan aplikasi tinggi.<br><br>SX8200 Pro memenuhi persyaratan NVMe 1.2 dan NVMe 1.3 Support dan menghadirkan kemampuan baca / tulis superior random dan kemampuan multi-tasking. Sangat rekomendasi buat Intel dan AMD yang terbaru.<br><br>Spesifikasi SSD Adata XPG SX8200 PRO 1TB M.2 NVME PCIE :<br>- Tipe : SX8200 SSD M.2 Pcie Gen3x4 - Kapasitas : 1TB<br>- Form Factor : M.2 2280<br>- NAND Flash : 3D TLC<br>- Controller : SMI<br>- Interface : PCIe Gen3x4<br>- Performace : Baca 3500MB/s ; Tulis 3000MB/s<br>- MTBF : 2.000.000 Jam<br><br>Garansi Resmi 5 Tahun<br><br>Perhatian!!<br>- Semua Tempat Penyimpanan data hanya memiliki Kapasitas Real 90% - 93% dari Kapasitas yang tertera.<br>- Sebelum melakukan pemesanan harap menyakan ketersediaan stok terlebih dahulu.<br>- Selamat Berbelanja dan Terimakasih..&nbsp;<br><br></div><div><br><br></div>'),
(4, 'r5tyhbdf', 'apacer 240gb SATA3', 'SSD', 'APACER', 68, 240, 600000, 600, 'ssd-apacer.png', 'SSd apacer 240gb sata3'),
(5, 'wesf43a', 'kingmax 256gb SATA3', 'SSD', 'KINGMAX', 45, 256, 650000, 340, 'ssd-kingmax.png', 'SSd kingmax 256gb sata3'),
(6, '45yrd3', 'pioneer 120GB SATA3', 'SSD', 'PIONEER', 23, 120, 400000, 560, 'ssd-pioneer.png', 'SSd pioneer 120gb sata3'),
(7, '54erdg43e', 'samsung 1tb SATA3', 'SSD', 'SAMSUNG', 45, 1, 2300000, 900, 'ssd-samsung.png', 'SSd samsung 1tb sata3'),
(8, 'thdr56hffs', 'vgen 240gb SATA3', 'SSD', 'V-GEN', 69, 240, 600000, 340, 'ssd-vgen.png', 'SSd vgen 240gb sata3'),
(9, 'hdtrd45e', 'vgen nvme 256gb SATA3', 'SSD NVME', 'V-GEN', 89, 256, 870000, 550, 'ssd-vgen-nvme.png', 'SSd vgen nvme 256gb sata3'),
(10, 'thdr5gnf', 'wd green 120GB SATA3', 'SSD', 'WD', 99, 120, 350000, 698, 'ssd-wd-green.png', '&lt;div&gt;SSD wd green 120GB SATA3&lt;/div&gt;'),
(20, 'ewsqew', 'Khoerul Anam', 'SSD NVME', 'e2eqe2', 21, 512, 100000, 2141, 'ssd-samsung.png', '&lt;div&gt;deskripsi yang ahrusnuya panjang malah jadi pendek&lt;/div&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `username`, `password`) VALUES
(1, 'admin123', 'admin123'),
(8, 'anigato', '$2y$10$6Eabe3k3FiU8m3XpbAOgOOWRfCLKxByuIzhDShcVfQIPL/KdfUxOy'),
(9, 'admin', '$2y$10$elx62vK4FzWNzVHw4vYxFudQAYAGn9pF9tm6nAN0aa7pNL3k4tAda'),
(10, 'ai', '$2y$10$BwGAkBYZg9DtoeAd0IpVJ.OSAg2Ui72gFzHzJE45lYt.xblkx/MB.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
