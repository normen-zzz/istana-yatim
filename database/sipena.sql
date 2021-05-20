-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2021 pada 17.55
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
  `img_acara` varchar(100) NOT NULL,
  `slug_acara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `acara`
--

INSERT INTO `acara` (`id_acara`, `tgl_acara`, `nama_acara`, `tema_acara`, `img_acara`, `slug_acara`) VALUES
(1, '2021-05-14 04:56:27', 'Berkah dalam berzakat', 'meningkatkan iman dan taqwa', 'f14eeffe0952eec2e8680d2ca13dd121.jpeg', 'berkah-dalam-berzakat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `bank` varchar(150) NOT NULL,
  `nama_bank` varchar(150) NOT NULL,
  `norek` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id_bank`, `bank`, `nama_bank`, `norek`) VALUES
(1, 'Bank Syariah Indonesia', 'Yayasan Moslem The Castilla', '7054384909');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkah`
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

--
-- Dumping data untuk tabel `berkah`
--

INSERT INTO `berkah` (`id_berkah`, `tgl_berkah`, `judul_berkah`, `isi_berkah`, `img_berkah`, `jenis_berkah`, `penulis_berkah`, `lihat_berkah`, `slug_berkah`) VALUES
(1, '2021-04-29 19:38:32', 'IMPLEMENTASI SISTEM MANAJEMEN DONASI PADA ASRAMA ISTANA YATIM YAYASAN KELUARGA MUSLIM THE CASTILLA', '<p>Pengabdian kepada masyarakat ini merupakan salah satu visi dari Tri Dharma perguruan tinggi di Indonesia untuk menngimplementasikan ilmu  para akademisi khususnya dosen kepada masyarakat serta merupakan wujud kepedulian sosial.\r\n\r\nPerkembangan teknologi merupakan sebuah tantangan baik bagi invidu maupun lembaga untuk dapat memanfaatkan perkembangan teknologi. Teknologi dapat dimanfaatkan untuk berbagi hal seperti publikasi kegiatan, publikasi berbagi program yang diselenggarakan oleh panti asuhan, penginformasikan mengenai kondisi panti dan kondisi anak-anak asuh, sebagai media dakwah, serta memfasilitasi jika ada donator yang ingin membantu pembiayaan di panti asuhan. Pemanfaatan teknologi, penyampaian  informasi menjadi lebih mudah dan lebih transparan, juga meminimalisir kesalahan dalam kalkulasi dan pembuatan laporan.\r\n\r\nMetode pelaksanaan pengabdian Masyarakat Program Studi  Sistem Informasi Fakultas Teknologi Informasi Universitas Bina Sarana Informatika ini melalui on line via Zoom Meeting  mengingat kondisi masih dalam situasi pandemi Covid-19 juga offline,  pada tanggal 20-21 Maret 2021 Ketua pelaksaaan  program Pengabdian Masyarakat   Sri Hardani M.Kom melakukan koordinasi dengan mitra pengabdian masyarakat,   anggota Mohammad Noviansyah ST,M.Kom,  Desy Tri Anggarini, SE.MM dan Wasilatun Nikmah, S.Pd, MM,  dibantu oleh mahasiswa Chaerani,  dan Johan Afrian Ramadha.\r\n\r\nPengabdian masyarakat  Program Studi  Sistem Informasi Fakultas Teknologi Informasi Universitas Bina Sarana Informatika ini terdiri dari tahap persiapan dilakukan dengan meminta izin dan memaparkan jenis kegiatan pengabdian masyarakat kepada para pengurus Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla. Tahap selanjutnya adalah pelaksanaan Program Pengabdian Masyarakat ada beberapa kegiatan yang dilaksanakan untuk menjalankan solusi dengan memberikan edukasi dan pengarahan pentingnya pemanfaatan teknologi, mengarahkan pengurus untuk dapat memahami kebutuhan manajemen dalam hal pemanfaatan teknologi, memberikan pemaparan mengenai tahapan pembuatan sebuah sistem informasi.\r\n\r\nKegiatan pengabdian masyarakat ini, diharapkan  pengurus memahami pentingnya pemanfaatan teknologi bagi perkembangan Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla, informasi proses bisnis yang disampaikan pengurus  sesuai dengan kebutuhan manajemen dalam hal pemanfaatan teknologi, dan pengurus mengetahui tahapan pembuatan sebuah sistem informasi.\r\n\r\nSetelah Pengabdian Masyarakat selesai dilaksanakan maka dilakukan review terhadap apa yang telah disampaikan. Hal ini bertujuan untuk memahami pentingnya pemanfaatan teknologi bagi perkembangan Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla juga  melakukan review terhadap materi yang sudah disampaikan, setelah Program Pengabdian Masyarakat ini selesai dilaksanakan, akan dikembangkan sebuah sistem informasi yang sesuai dengan kebutuhan Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla.</p>\r\n', '8c07eee23092e1175236caa9f02d19b8.png', 'Test', 'Test', 8, 'implementasi-sistem-manajemen-donasi-pada-asrama-istana-yatim-yayasan-keluarga-muslim-the-castilla'),
(2, '2021-05-11 04:16:33', 'Lorem Ipsum', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', '85302d6d84d6bde39ab7c5b0b9add966.jpeg', 'lorem', 'Norman', 4, 'lorem-ipsum');

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
  `lihat_ceritasantri` int(11) NOT NULL,
  `slug_ceritasantri` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ceritasantri`
--

INSERT INTO `ceritasantri` (`id_ceritasantri`, `tgl_ceritasantri`, `judul_ceritasantri`, `isi_ceritasantri`, `img_ceritasantri`, `jenis_ceritasantri`, `penulis_ceritasantri`, `lihat_ceritasantri`, `slug_ceritasantri`) VALUES
(1, '2021-04-25 16:30:55', 'xkncknsck', '<p>ncdcndk</p>\r\n', '8987699e10f714f599a0626bb501e0f3.png', 'd ckdnckn', 'dnckdnckd', 1, 'xkncknsck'),
(2, '2021-05-14 21:11:39', 'Hari-hari  pertama  hidup  di pesantren', '<p><p>Aku masih ingat ketika aku pertama kali datang ke pesantren, saat itu aku baru saja lulus sekolah dasar<p></p>\r\n', '07844f91fab7add57e2ccfc9b705e231.jpeg', 'Kisah Pribadi', 'Asep Fikri', 1, 'hari-hari--pertama--hidup--di-pesantren');

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
  `bukti` varchar(100) CHARACTER SET latin1 NOT NULL,
  `konfirmasi` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_bank`, `tanggal`, `nama`, `nowa`, `jumlah`, `bukti`, `konfirmasi`) VALUES
(1, 1, '2021-05-17 04:55:02', 'Norman', '085697780467', 200000, 'faad8d6762802eeb02cc5224d885398d.png', 1),
(2, 1, '2021-05-17 04:55:49', 'Alif', '087771711480', 150000, '7fc5191f38ea080cada35200cfb7bdd6.jpg', 1),
(3, 1, '2021-05-17 14:06:27', 'G', '083896888768', 500, '9f7e171269a8ffa77bd59d23b4c2b7fe.png', 1),
(4, 1, '2021-05-19 15:11:47', 'kusdinar', '089630961982', 1000000, '7ee1b76ad68ff45192cdf67e84b14cb0.png', 1);

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
(1, 'normen', '085697780467', 'laki', 2),
(2, 'norman', '085697780467', 'laki', 1),
(3, 'assss', '085697780467', 'laki', 1),
(4, 'Asep Fikri', '089630961982', 'Laki-laki', 1);

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
(1, 'Berkah', 'Bersemangat Sedekah', 'Selengkapnya', 'artikel', '2021-05-15 12:11:41', 'c409d756c49be45968754a89ed8d186f.png'),
(2, 'Cerita Santri', 'Berisi Tentang Cerita Para Santri', 'Selengkapnya', '', '2021-04-16 13:44:47', '9d8f4fcb06e48abebe45cb60b0200205.png'),
(3, 'Acara', 'Isinya Acara', 'Selengkapnya', 'acara', '2021-04-27 19:48:54', '9d8f4fcb06e48abebe45cb60b0200205.png');

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
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul_pengeluaran` varchar(255) NOT NULL,
  `jumlah_pengeluaran` double NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tanggal`, `judul_pengeluaran`, `jumlah_pengeluaran`, `ket`) VALUES
(1, '2021-05-20', 'apayaaa', 100000, 'didonasikan');

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
(1, '2150ad74ede6287ab5f2e62377ad9317.jpg', '2021-04-29 19:03:36'),
(2, 'ce0d1fe645efa3ac2d84bc1bbf1e312c.png', '2021-05-13 10:25:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indeks untuk tabel `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indeks untuk tabel `berkah`
--
ALTER TABLE `berkah`
  ADD PRIMARY KEY (`id_berkah`);

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
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

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
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `berkah`
--
ALTER TABLE `berkah`
  MODIFY `id_berkah` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ceritasantri`
--
ALTER TABLE `ceritasantri`
  MODIFY `id_ceritasantri` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
