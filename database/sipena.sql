-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2021 pada 16.19
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

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
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL,
  `tgl_acara` datetime NOT NULL,
  `nama_acara` varchar(30) NOT NULL,
  `tema_acara` varchar(50) NOT NULL,
  `img_acara` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`id_acara`, `tgl_acara`, `nama_acara`, `tema_acara`, `img_acara`) VALUES
(1, '2021-04-26 11:50:10', 'acara', 'yateam yaqueen', '313ab974a0081cc560eb95635ae2b3d5.png'),
(2, '2021-04-27 11:57:40', 'Pesantren Kilat', 'Menjadi Pesantren yang kilat', '8745dea8abf79cbc7d2862c85fcc5e68.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
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
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `tgl_artikel`, `judul_artikel`, `isi_artikel`, `img_artikel`, `jenis_artikel`, `penulis_artikel`, `slug_artikel`) VALUES
(1, '2021-04-28 14:43:15', 'cobaa', '<p>cobaanini</p>\r\n', '36759fda5f1245f502840f733bf749df.png', 'dcoba', 'cobaan', 'cobaa'),
(2, '2021-04-24 03:31:09', 'test', '<p>test</p>\r\n', 'b6d90a6529e9ef7c4aac643722bcc202.png', 'coba', 'coba', 'test'),
(3, '2021-04-24 03:34:10', 'lagi', '<p>lagi</p>\r\n', '1a634bb8c9dd212816891332f54e3e2c.png', 'lagi', 'danlagi', 'lagi'),
(4, '2021-04-24 17:54:39', 'sdisjdi', '<p>snkdsnkdkn</p>\r\n', 'ba7826f98864150f1de8dc5aa4bb837f.png', 'sjdsjn', 'djsndskn', 'sdisjdi'),
(5, '2021-04-24 18:15:49', 'nsdsknsn', '<p>sncjsnsjn</p>\r\n', 'b3047c24fd1c29b7525edfa57dadabfa.png', 's cs csm ', 'snkcnscns', 'nsdsknsn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `bank` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `norek` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `bank`, `nama`, `norek`) VALUES
(1, 'Mandiri', 'Asep', '007001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ceritasantri`
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
-- Dumping data untuk tabel `ceritasantri`
--

INSERT INTO `ceritasantri` (`id_ceritasantri`, `tgl_ceritasantri`, `judul_ceritasantri`, `isi_ceritasantri`, `img_ceritasantri`, `jenis_ceritasantri`, `penulis_ceritasantri`, `slug_ceritasantri`) VALUES
(1, '2021-04-25 16:30:55', 'xkncknsck', '<p>ncdcndk</p>\r\n', '8987699e10f714f599a0626bb501e0f3.png', 'd ckdnckn', 'dnckdnckd', 'xkncknsck');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
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
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_bank`, `tanggal`, `nama`, `nowa`, `jumlah`, `bukti`) VALUES
(3, 0, '2021-04-28 19:06:14', 'yuuji', '0888888888', 1000000, 'a2ab909789bffe397276df833740ee22.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donatur`
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
-- Struktur dari tabel `footer`
--

CREATE TABLE `footer` (
  `id_footer` int(11) NOT NULL,
  `link_facebook` varchar(50) NOT NULL,
  `link_twitter` varchar(50) NOT NULL,
  `link_instagram` varchar(50) NOT NULL,
  `text_copyright` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `footer`
--

INSERT INTO `footer` (`id_footer`, `link_facebook`, `link_twitter`, `link_instagram`, `text_copyright`) VALUES
(1, 'www.facebook.com', 'www.twitter.com', 'www.instagram.com', 'copyright@anu2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `id_form` int(11) NOT NULL,
  `nama_form` varchar(30) NOT NULL,
  `nomor_form` varchar(30) NOT NULL,
  `kelamin_form` varchar(10) NOT NULL,
  `acara_form` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form`
--

INSERT INTO `form` (`id_form`, `nama_form`, `nomor_form`, `kelamin_form`, `acara_form`) VALUES
(5, 'normen', '085697780467', 'laki', 2),
(6, 'asep', '6289630961982', 'laki', 2),
(7, 'Alif', '6287771711480', 'laki', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
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
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `judul_menu`, `text_menu`, `tombol_menu`, `link`, `tgl_menu`, `img_menu`) VALUES
(1, 'Artikel', 'isinya artikel', 'Selengkapnya', 'artikel', '2021-04-16 13:26:26', '7ced1543ad423eacb5c9b3058998a668.png'),
(2, 'Cerita Santri', 'Berisi Tentang Cerita Para Santri', 'Selengkapnya', '', '2021-04-16 13:44:47', 'b6ee660667088e598eb706d87e45b704.png'),
(3, 'Acara', 'Isinya Acara', 'Selengkapnya', 'acara', '2021-04-27 19:48:54', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metode`
--

CREATE TABLE `metode` (
  `id_metode` int(11) NOT NULL,
  `bri` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
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
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nm_pengurus`, `umur_pengurus`, `alamat_pengurus`, `no.telp`, `foto_pengurus`, `email_pengurus`, `password_pengurus`) VALUES
(1, 'admin', '20', 'nuuunscjhs', '0987668', 'default.img\r\n', 'admin@gmail.com', '$2y$10$EX0L5MeIQldpkCuTZW.mjujTaj.Yy20IW0GOluecU/c.es.9r6E5.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
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
-- Struktur dari tabel `slidefoto`
--

CREATE TABLE `slidefoto` (
  `id_slidefoto` int(11) NOT NULL,
  `img_slidefoto` varchar(100) NOT NULL,
  `tgl_slidefoto` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `slidefoto`
--

INSERT INTO `slidefoto` (`id_slidefoto`, `img_slidefoto`, `tgl_slidefoto`) VALUES
(1, 'e3d8e4dc34425938700c46baf413f7c6.jpeg', '2021-04-22 18:32:13'),
(2, '2e1a45d1ac4e65014c6793a3becc3a66.png', '2021-04-25 15:48:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `ceritasantri`
--
ALTER TABLE `ceritasantri`
  ADD PRIMARY KEY (`id_ceritasantri`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indeks untuk tabel `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indeks untuk tabel `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id_footer`);

--
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id_form`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indeks untuk tabel `slidefoto`
--
ALTER TABLE `slidefoto`
  ADD PRIMARY KEY (`id_slidefoto`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ceritasantri`
--
ALTER TABLE `ceritasantri`
  MODIFY `id_ceritasantri` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id_donatur` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `footer`
--
ALTER TABLE `footer`
  MODIFY `id_footer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `slidefoto`
--
ALTER TABLE `slidefoto`
  MODIFY `id_slidefoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
