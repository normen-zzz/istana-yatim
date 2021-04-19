-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 08:04 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipena`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(20) NOT NULL,
  `tgl_artikel` datetime NOT NULL,
  `judul_artikel` varchar(123) NOT NULL,
  `isi_artikel` text NOT NULL,
  `img_artikel` varchar(100) NOT NULL,
  `jenis_artikel` varchar(50) NOT NULL,
  `penulis_artikel` varchar(20) NOT NULL,
  `slug_artikel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `tgl_artikel`, `judul_artikel`, `isi_artikel`, `img_artikel`, `jenis_artikel`, `penulis_artikel`, `slug_artikel`) VALUES
(1, '2021-04-17 14:59:49', 'Coba Artikel Gan', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '106eaf0e0f3acdccaab335d4d4813c9c.jpg', 'Coba', 'Normen', 'coba-artikel-gan'),
(2, '0000-00-00 00:00:00', 'cobaan lagi', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', '017000a4d1a7937412870734f4ba7e6f.PNG', 'Percobaan', 'Normenardian', 'cobaan-lagi');

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `no.invoice` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(13) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `id_donatur` int(8) NOT NULL,
  `nama_donatur` varchar(20) NOT NULL,
  `email_donatur` text NOT NULL,
  `password_donatur` text NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id_footer` int(11) NOT NULL,
  `link_facebook` varchar(50) NOT NULL,
  `link_twitter` varchar(50) NOT NULL,
  `link_instagram` varchar(50) NOT NULL,
  `text_copyright` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id_footer`, `link_facebook`, `link_twitter`, `link_instagram`, `text_copyright`) VALUES
(1, 'www.facebook.com', 'www.twitter.com', 'www.instagram.com', 'copyright@anu2021');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `judul_menu` varchar(30) NOT NULL,
  `text_menu` varchar(40) NOT NULL,
  `tombol_menu` varchar(30) NOT NULL,
  `tgl_menu` datetime DEFAULT NULL,
  `img_menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `judul_menu`, `text_menu`, `tombol_menu`, `tgl_menu`, `img_menu`) VALUES
(1, 'Artikel', 'isinya artikel', 'Selengkapnya', '2021-04-16 13:26:26', '7ced1543ad423eacb5c9b3058998a668.png'),
(2, 'Cerita Santri', 'Berisi Tentang Cerita Para Santri', 'Selengkapnya', '2021-04-16 13:44:47', 'b6ee660667088e598eb706d87e45b704.png');

-- --------------------------------------------------------

--
-- Table structure for table `metode`
--

CREATE TABLE `metode` (
  `id_metode` int(11) NOT NULL,
  `bri` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(8) NOT NULL,
  `nm_pengurus` varchar(20) NOT NULL,
  `umur_pengurus` varchar(3) NOT NULL,
  `alamat_pengurus` text NOT NULL,
  `no.telp` varchar(13) NOT NULL,
  `foto_pengurus` text NOT NULL,
  `email_pengurus` text NOT NULL,
  `password_pengurus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nm_pengurus`, `umur_pengurus`, `alamat_pengurus`, `no.telp`, `foto_pengurus`, `email_pengurus`, `password_pengurus`) VALUES
(1, 'admin', '20', 'nuuunscjhs', '0987668', 'default.img\r\n', 'admin@gmail.com', '$2y$10$EX0L5MeIQldpkCuTZW.mjujTaj.Yy20IW0GOluecU/c.es.9r6E5.');

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(8) NOT NULL,
  `nama_santri` varchar(20) NOT NULL,
  `umur_santri` varchar(3) NOT NULL,
  `no.telp` varchar(13) NOT NULL,
  `ttl_santri` date NOT NULL,
  `foto_santri` text NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email_santri` text NOT NULL,
  `password_santri` text NOT NULL,
  `role` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slidefoto`
--

CREATE TABLE `slidefoto` (
  `id_slidefoto` int(11) NOT NULL,
  `img_slidefoto` varchar(100) NOT NULL,
  `tgl_slidefoto` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slidefoto`
--

INSERT INTO `slidefoto` (`id_slidefoto`, `img_slidefoto`, `tgl_slidefoto`) VALUES
(1, '9dc20e81829e8836c6ac197dfb434f3d.jpg', '2021-04-16 11:44:34'),
(2, '00a032d35a2d392fdcf1d0a11b5bbc83.PNG', '2021-04-16 11:47:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`no.invoice`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id_footer`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `slidefoto`
--
ALTER TABLE `slidefoto`
  ADD PRIMARY KEY (`id_slidefoto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id_donatur` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id_footer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slidefoto`
--
ALTER TABLE `slidefoto`
  MODIFY `id_slidefoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
