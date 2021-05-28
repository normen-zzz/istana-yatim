-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 04:00 PM
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
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL,
  `tgl_acara` datetime NOT NULL,
  `nama_acara` varchar(30) NOT NULL,
  `tema_acara` varchar(50) NOT NULL,
  `img_acara` varchar(100) NOT NULL,
  `slug_acara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `bank` varchar(150) NOT NULL,
  `nama_bank` varchar(150) NOT NULL,
  `norek` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berkah`
--

CREATE TABLE `berkah` (
  `id_berkah` int(20) NOT NULL,
  `tgl_berkah` datetime NOT NULL,
  `judul_berkah` varchar(123) NOT NULL,
  `isi_berkah` text NOT NULL,
  `img_berkah` varchar(100) NOT NULL,
  `jenis_berkah` varchar(50) NOT NULL,
  `penulis_berkah` varchar(20) NOT NULL,
  `lihat_berkah` int(11) NOT NULL,
  `slug_berkah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ceritasantri`
--

CREATE TABLE `ceritasantri` (
  `id_ceritasantri` int(20) NOT NULL,
  `tgl_ceritasantri` datetime NOT NULL,
  `judul_ceritasantri` varchar(123) CHARACTER SET utf8mb4 NOT NULL,
  `isi_ceritasantri` text CHARACTER SET utf8mb4 NOT NULL,
  `img_ceritasantri` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `jenis_ceritasantri` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `penulis_ceritasantri` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `lihat_ceritasantri` int(11) NOT NULL,
  `slug_ceritasantri` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(20) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nowa` varchar(150) CHARACTER SET latin1 NOT NULL,
  `jumlah` double NOT NULL,
  `bukti` varchar(100) CHARACTER SET latin1 NOT NULL,
  `konfirmasi` int(10) NOT NULL DEFAULT '0'
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

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id_form` int(11) NOT NULL,
  `nama_form` varchar(30) NOT NULL,
  `nomor_form` varchar(30) NOT NULL,
  `kelamin_form` varchar(10) NOT NULL,
  `acara_form` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `judul_menu` varchar(30) NOT NULL,
  `text_menu` varchar(40) NOT NULL,
  `tombol_menu` varchar(30) NOT NULL,
  `link` varchar(30) NOT NULL,
  `tgl_menu` datetime DEFAULT NULL,
  `img_menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `pengeluaran_donasi`
--

CREATE TABLE `pengeluaran_donasi` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal_pengeluaran` datetime NOT NULL,
  `judul_pengeluaran` varchar(60) NOT NULL,
  `jumlah_pengeluaran` double NOT NULL,
  `img_pengeluaran` varchar(60) NOT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(8) NOT NULL,
  `nm_pengurus` varchar(20) NOT NULL,
  `tgllahir_pengurus` date NOT NULL,
  `alamat_pengurus` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `foto_pengurus` text NOT NULL,
  `email_pengurus` text NOT NULL,
  `password_pengurus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `update_donasi`
--

CREATE TABLE `update_donasi` (
  `id_update` int(11) NOT NULL,
  `jumlah_update` double NOT NULL,
  `tanggal_update` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `berkah`
--
ALTER TABLE `berkah`
  ADD PRIMARY KEY (`id_berkah`);

--
-- Indexes for table `ceritasantri`
--
ALTER TABLE `ceritasantri`
  ADD PRIMARY KEY (`id_ceritasantri`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`);

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
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id_form`);

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
-- Indexes for table `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  ADD PRIMARY KEY (`id_pengeluaran`);

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
-- Indexes for table `update_donasi`
--
ALTER TABLE `update_donasi`
  ADD PRIMARY KEY (`id_update`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berkah`
--
ALTER TABLE `berkah`
  MODIFY `id_berkah` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ceritasantri`
--
ALTER TABLE `ceritasantri`
  MODIFY `id_ceritasantri` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id_donatur` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id_footer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slidefoto`
--
ALTER TABLE `slidefoto`
  MODIFY `id_slidefoto` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
