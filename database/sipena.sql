-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2021 at 07:31 AM
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

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id_acara`, `tgl_acara`, `nama_acara`, `tema_acara`, `img_acara`, `slug_acara`) VALUES
(1, '2021-05-14 04:56:27', 'Berkah dalam berzakat', 'meningkatkan iman dan taqwa', 'f14eeffe0952eec2e8680d2ca13dd121.jpeg', 'berkah-dalam-berzakat');

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
  `lihat_artikel` int(11) NOT NULL,
  `slug_artikel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `tgl_artikel`, `judul_artikel`, `isi_artikel`, `img_artikel`, `jenis_artikel`, `penulis_artikel`, `lihat_artikel`, `slug_artikel`) VALUES
(1, '2021-04-29 19:38:32', 'IMPLEMENTASI SISTEM MANAJEMEN DONASI PADA ASRAMA ISTANA YATIM YAYASAN KELUARGA MUSLIM THE CASTILLA', '<p>Pengabdian kepada masyarakat ini merupakan salah satu visi dari Tri Dharma perguruan tinggi di Indonesia untuk menngimplementasikan ilmu  para akademisi khususnya dosen kepada masyarakat serta merupakan wujud kepedulian sosial.\r\n\r\nPerkembangan teknologi merupakan sebuah tantangan baik bagi invidu maupun lembaga untuk dapat memanfaatkan perkembangan teknologi. Teknologi dapat dimanfaatkan untuk berbagi hal seperti publikasi kegiatan, publikasi berbagi program yang diselenggarakan oleh panti asuhan, penginformasikan mengenai kondisi panti dan kondisi anak-anak asuh, sebagai media dakwah, serta memfasilitasi jika ada donator yang ingin membantu pembiayaan di panti asuhan. Pemanfaatan teknologi, penyampaian  informasi menjadi lebih mudah dan lebih transparan, juga meminimalisir kesalahan dalam kalkulasi dan pembuatan laporan.\r\n\r\nMetode pelaksanaan pengabdian Masyarakat Program Studi  Sistem Informasi Fakultas Teknologi Informasi Universitas Bina Sarana Informatika ini melalui on line via Zoom Meeting  mengingat kondisi masih dalam situasi pandemi Covid-19 juga offline,  pada tanggal 20-21 Maret 2021 Ketua pelaksaaan  program Pengabdian Masyarakat   Sri Hardani M.Kom melakukan koordinasi dengan mitra pengabdian masyarakat,   anggota Mohammad Noviansyah ST,M.Kom,  Desy Tri Anggarini, SE.MM dan Wasilatun Nikmah, S.Pd, MM,  dibantu oleh mahasiswa Chaerani,  dan Johan Afrian Ramadha.\r\n\r\nPengabdian masyarakat  Program Studi  Sistem Informasi Fakultas Teknologi Informasi Universitas Bina Sarana Informatika ini terdiri dari tahap persiapan dilakukan dengan meminta izin dan memaparkan jenis kegiatan pengabdian masyarakat kepada para pengurus Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla. Tahap selanjutnya adalah pelaksanaan Program Pengabdian Masyarakat ada beberapa kegiatan yang dilaksanakan untuk menjalankan solusi dengan memberikan edukasi dan pengarahan pentingnya pemanfaatan teknologi, mengarahkan pengurus untuk dapat memahami kebutuhan manajemen dalam hal pemanfaatan teknologi, memberikan pemaparan mengenai tahapan pembuatan sebuah sistem informasi.\r\n\r\nKegiatan pengabdian masyarakat ini, diharapkan  pengurus memahami pentingnya pemanfaatan teknologi bagi perkembangan Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla, informasi proses bisnis yang disampaikan pengurus  sesuai dengan kebutuhan manajemen dalam hal pemanfaatan teknologi, dan pengurus mengetahui tahapan pembuatan sebuah sistem informasi.\r\n\r\nSetelah Pengabdian Masyarakat selesai dilaksanakan maka dilakukan review terhadap apa yang telah disampaikan. Hal ini bertujuan untuk memahami pentingnya pemanfaatan teknologi bagi perkembangan Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla juga  melakukan review terhadap materi yang sudah disampaikan, setelah Program Pengabdian Masyarakat ini selesai dilaksanakan, akan dikembangkan sebuah sistem informasi yang sesuai dengan kebutuhan Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla.</p>\r\n', '8c07eee23092e1175236caa9f02d19b8.png', 'Test', 'Test', 6, 'implementasi-sistem-manajemen-donasi-pada-asrama-istana-yatim-yayasan-keluarga-muslim-the-castilla'),
(2, '2021-05-11 04:16:33', 'Lorem Ipsum', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', '85302d6d84d6bde39ab7c5b0b9add966.jpeg', 'lorem', 'Norman', 2, 'lorem-ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `bank` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `norek` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `bank`, `nama`, `norek`) VALUES
(1, 'Mandiri', 'Asep', '007001'),
(2, 'Bca', 'Norman', '123456789'),
(3, 'Bri', 'Alif', '987654321');

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
  `slug_ceritasantri` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ceritasantri`
--

INSERT INTO `ceritasantri` (`id_ceritasantri`, `tgl_ceritasantri`, `judul_ceritasantri`, `isi_ceritasantri`, `img_ceritasantri`, `jenis_ceritasantri`, `penulis_ceritasantri`, `slug_ceritasantri`) VALUES
(1, '2021-04-25 16:30:55', 'xkncknsck', '<p>ncdcndk</p>\r\n', '8987699e10f714f599a0626bb501e0f3.png', 'd ckdnckn', 'dnckdnckd', 'xkncknsck');

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
  `bukti` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_bank`, `tanggal`, `nama`, `nowa`, `jumlah`, `bukti`) VALUES
(3, 0, '2021-04-28 19:06:14', 'yuuji', '0888888888', 1000000, 'a2ab909789bffe397276df833740ee22.PNG'),
(4, 1, '2021-04-28 17:05:04', 'normen', '6285697780467', 100000, 'aaf1dc0945dcae2f3fe29f1adba928cb.jpeg'),
(5, 1, '2021-04-28 17:06:34', 'aseo', '627976789', 100000, '728ea037b3e6847085308967f5f22d1f.PNG'),
(6, 1, '2021-04-28 17:53:08', 'Norman Ardian', '6285697780467', 100000, 'c44e694588471639645d9ba8e566fcc9.PNG'),
(7, 1, '2021-04-28 18:06:46', 'Aseo', '6289630961982', 1000000, '89475a2860f86824e4bd64e3b6d5c127.png'),
(8, 1, '2021-04-28 18:08:06', 'Aseo', '6289630961982', 99999999, '49ab9b4ff37def600d13f7ade793b451.PNG'),
(9, 3, '2021-04-29 11:59:36', 'ASEP ', '089630961982', 500000, 'edd1a53ea09b8328537656b3c70db1dc.png'),
(10, 2, '2021-04-29 13:17:04', 'Test', '085348019735', 1000, '0ca127040bd57177d72ed1081cb0691a.jpg'),
(11, 1, '2021-04-29 15:29:48', 'Sriyadi', '08111028851', 500000, 'f99e76ca4bc8abc6dc6ade9c8deea424.gif'),
(12, 2, '2021-05-10 17:25:07', 'normen', '085697780467', 200000, '27ce53a4f771a4c37d5869401d860502.jpg'),
(13, 2, '2021-05-12 07:27:04', 'Alif ', '087771711480', 540000, 'aea96e3a78ec54ea430daec4f78c9573.jpg'),
(14, 2, '2021-05-12 07:27:27', 'Alif ', '087771711480', 540000, '0ef3a138dd55a725a50a8e338353ae68.jpg'),
(15, 2, '2021-05-12 07:27:52', 'Alif ', '087771711480', 540000, '9fd7bc19979a783c07fed80b02fbd350.jpg'),
(16, 3, '2021-05-12 07:58:20', 'normen', '085697780467', 23000, '7b0f329f0d852495522c0b7dec5f9292.jpg'),
(17, 2, '2021-05-12 10:02:44', 'kateman', '085697780467', 298000, '5b797b703e76c8f9ff5a190682deda18.jpg'),
(18, 2, '2021-05-12 10:03:58', 'kateman', '085697780467', 298000, '10e8e6ebe184a1776fcee2f5253d8fc9.jpg'),
(19, 2, '2021-05-12 13:21:59', 'normen', '085697780467', 100000, 'cce40cfe3ab532d14ee2f0faa7c9eae5.jpg'),
(20, 1, '2021-05-12 14:09:26', 'test', '085697780467', 123456, '9b2a6333659eca4a686cc141644abd0b.jpg'),
(21, 1, '2021-05-12 17:33:55', 'test', '085697780467', 123456, 'f00d1f328fb03ce402550c73861d174a.jpg'),
(22, 1, '2021-05-12 17:35:29', 'test', '085697780467', 123456, 'bbf1bf21c7ca13e5d2c8f62fa1b7afc8.jpg'),
(23, 2, '2021-05-12 17:56:28', 'normen', '085697780467', 123456, '69383facb34bc4cee57ac0b72233bfb8.jpg'),
(24, 1, '2021-05-12 18:41:14', 'test', '085697780467', 234567, '4444a487d3d878b9fd562e07c5afac40.jpg'),
(25, 1, '2021-05-13 03:56:49', 'nnn', '085697780467', 54321, 'b2c51b063999154ef1a837b70541231f.jpg'),
(26, 1, '2021-05-13 08:13:33', 'normen', '085697780467', 234567, '84400eb771af85c39a910bbf1747bce2.png'),
(27, 1, '2021-05-13 08:14:04', 'normen', '085697780467', 234567, '6ae0c2b62838da93ccf8b39b5594b787.jpeg'),
(28, 1, '2021-05-13 08:14:47', 'normen', '085697780467', 234567, 'b69b44a8f8adcd76662181eb1f0ee344.jpeg'),
(29, 1, '2021-05-13 08:24:41', 'normen', '085697780467', 234567, 'a0c42e3c73a5aa305af1d8dfd8fafec7.jpeg'),
(30, 1, '2021-05-13 08:26:33', 'normen', '085697780467', 234, '48ca21b37835a04afe7cbd86a43cf7c9.jpeg'),
(31, 3, '2021-05-13 10:00:48', 'normen', '085697780467', 234567, '2572e871953be939c28903eeb1e0cfdf.jpeg'),
(32, 3, '2021-05-13 10:02:16', 'normen', '085697780467', 234567, '762833bfcff518db0d6a6010d5683f6b.jpeg'),
(33, 3, '2021-05-13 10:05:13', 'normen', '085697780467', 234567, '6d2318d4c6f5f4b66fef7649ba64f085.jpeg'),
(34, 2, '2021-05-13 11:07:43', 'normen', '085697780467', 234321, '67aa0a024c46fa06ff3f4d9303bc2f68.jpeg'),
(35, 3, '2021-05-13 13:43:05', 'normen', '085697780467', 1250000, '2fa5c1c5349f8c94be65b2c847bac1b5.jpeg'),
(36, 2, '2021-05-14 04:32:55', 'normen', '085697780467', 876543, '34942af0ea7cf4db249aee1288e89723.jpeg'),
(37, 1, '2021-05-14 04:33:43', 'bhjhbjhb', '085348019735', 123, 'dfa56f8304d05c056626a25aa71acdea.jpeg'),
(38, 2, '2021-05-14 06:07:09', 'test', '085348019735', 100000, '580b85ec2901c67ce0587b7244d19231.jpeg');

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
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id_form` int(11) NOT NULL,
  `nama_form` varchar(30) NOT NULL,
  `nomor_form` varchar(30) NOT NULL,
  `kelamin_form` varchar(10) NOT NULL,
  `acara_form` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id_form`, `nama_form`, `nomor_form`, `kelamin_form`, `acara_form`) VALUES
(5, 'normen', '085697780467', 'laki', 2),
(6, 'asep', '6289630961982', 'laki', 2),
(7, 'Alif', '6287771711480', 'laki', 2),
(8, 'norman', '085697780467', 'laki', 1),
(9, 'alif', '087771711480', 'laki', 1),
(10, 'asep', '089630961982', 'laki', 1);

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

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `judul_menu`, `text_menu`, `tombol_menu`, `link`, `tgl_menu`, `img_menu`) VALUES
(1, 'Artikel', 'isinya artikel', 'Selengkapnya', 'artikel', '2021-04-16 13:26:26', '9d8f4fcb06e48abebe45cb60b0200205.png'),
(2, 'Cerita Santri', 'Berisi Tentang Cerita Para Santri', 'Selengkapnya', '', '2021-04-16 13:44:47', '9d8f4fcb06e48abebe45cb60b0200205.png'),
(3, 'Acara', 'Isinya Acara', 'Selengkapnya', 'acara', '2021-04-27 19:48:54', '9d8f4fcb06e48abebe45cb60b0200205.png');

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
(1, '2150ad74ede6287ab5f2e62377ad9317.jpg', '2021-04-29 19:03:36'),
(2, 'ce0d1fe645efa3ac2d84bc1bbf1e312c.png', '2021-05-13 10:25:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

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
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ceritasantri`
--
ALTER TABLE `ceritasantri`
  MODIFY `id_ceritasantri` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
