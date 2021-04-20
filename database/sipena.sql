-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Apr 2021 pada 07.51
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
(1, '2021-04-17 14:59:49', 'Coba Artikel Gan', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '106eaf0e0f3acdccaab335d4d4813c9c.jpg', 'Coba', 'Normen', 'coba-artikel-gan'),
(2, '0000-00-00 00:00:00', 'cobaan lagi', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', '017000a4d1a7937412870734f4ba7e6f.PNG', 'Percobaan', 'Normenardian', 'cobaan-lagi'),
(3, '2021-04-19 21:51:32', 'Keutamaan Membunuh Cicak', '<p>CIcak adalah hewan yang harus dibunuh</p>\r\n', '1a3ae5e2ae477bf03b1a6c7b665c9853.png', 'Khazanah Islam', 'Asep', 'keutamaan-membunuh-cicak');

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
(1, '2021-04-19 22:50:05', 'Kisah Abu Nawas', '<p>Abu NAwas</p>\r\n', 'b99b30cf7a65f9abe3a7f8e2e7f9673a.png', 'Cerita Tokoh', 'Asep', 'kisah-abu-nawas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `no.invoice` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(13) NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Struktur dari tabel `menu`
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
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `judul_menu`, `text_menu`, `tombol_menu`, `tgl_menu`, `img_menu`) VALUES
(1, 'Artikel', 'isinya artikel', 'Selengkapnya', '2021-04-16 13:26:26', '7ced1543ad423eacb5c9b3058998a668.png'),
(2, 'Cerita Santri', 'Berisi Tentang Cerita Para Santri', 'Selengkapnya', '2021-04-16 13:44:47', 'b6ee660667088e598eb706d87e45b704.png');

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
(1, '9dc20e81829e8836c6ac197dfb434f3d.jpg', '2021-04-16 11:44:34'),
(2, '00a032d35a2d392fdcf1d0a11b5bbc83.PNG', '2021-04-16 11:47:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `ceritasantri`
--
ALTER TABLE `ceritasantri`
  ADD PRIMARY KEY (`id_ceritasantri`);

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`no.invoice`);

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
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ceritasantri`
--
ALTER TABLE `ceritasantri`
  MODIFY `id_ceritasantri` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
