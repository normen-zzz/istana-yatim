-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 05:10 PM
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
(1, '2021-06-02 15:36:00', 'Bangkitkan Semangat Bersedekah', 'Berkah', '42ca0c028d779b16d511a2d9fe98ee00.jpeg', 'bangkitkan-semangat-bersedekah');

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

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `bank`, `nama_bank`, `norek`) VALUES
(1, 'Bank Syariah Indonesia', 'Yayasan Moslem The Castilla', '7054384909');

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

--
-- Dumping data for table `berkah`
--

INSERT INTO `berkah` (`id_berkah`, `tgl_berkah`, `judul_berkah`, `isi_berkah`, `img_berkah`, `jenis_berkah`, `penulis_berkah`, `lihat_berkah`, `slug_berkah`) VALUES
(1, '2021-04-29 19:38:32', 'IMPLEMENTASI SISTEM MANAJEMEN DONASI PADA ASRAMA ISTANA YATIM YAYASAN KELUARGA MUSLIM THE CASTILLA', '<p>Pengabdian kepada masyarakat ini merupakan salah satu visi dari Tri Dharma perguruan tinggi di Indonesia untuk menngimplementasikan ilmu  para akademisi khususnya dosen kepada masyarakat serta merupakan wujud kepedulian sosial.\r\n\r\nPerkembangan teknologi merupakan sebuah tantangan baik bagi invidu maupun lembaga untuk dapat memanfaatkan perkembangan teknologi. Teknologi dapat dimanfaatkan untuk berbagi hal seperti publikasi kegiatan, publikasi berbagi program yang diselenggarakan oleh panti asuhan, penginformasikan mengenai kondisi panti dan kondisi anak-anak asuh, sebagai media dakwah, serta memfasilitasi jika ada donator yang ingin membantu pembiayaan di panti asuhan. Pemanfaatan teknologi, penyampaian  informasi menjadi lebih mudah dan lebih transparan, juga meminimalisir kesalahan dalam kalkulasi dan pembuatan laporan.\r\n\r\nMetode pelaksanaan pengabdian Masyarakat Program Studi  Sistem Informasi Fakultas Teknologi Informasi Universitas Bina Sarana Informatika ini melalui on line via Zoom Meeting  mengingat kondisi masih dalam situasi pandemi Covid-19 juga offline,  pada tanggal 20-21 Maret 2021 Ketua pelaksaaan  program Pengabdian Masyarakat   Sri Hardani M.Kom melakukan koordinasi dengan mitra pengabdian masyarakat,   anggota Mohammad Noviansyah ST,M.Kom,  Desy Tri Anggarini, SE.MM dan Wasilatun Nikmah, S.Pd, MM,  dibantu oleh mahasiswa Chaerani,  dan Johan Afrian Ramadha.\r\n\r\nPengabdian masyarakat  Program Studi  Sistem Informasi Fakultas Teknologi Informasi Universitas Bina Sarana Informatika ini terdiri dari tahap persiapan dilakukan dengan meminta izin dan memaparkan jenis kegiatan pengabdian masyarakat kepada para pengurus Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla. Tahap selanjutnya adalah pelaksanaan Program Pengabdian Masyarakat ada beberapa kegiatan yang dilaksanakan untuk menjalankan solusi dengan memberikan edukasi dan pengarahan pentingnya pemanfaatan teknologi, mengarahkan pengurus untuk dapat memahami kebutuhan manajemen dalam hal pemanfaatan teknologi, memberikan pemaparan mengenai tahapan pembuatan sebuah sistem informasi.\r\n\r\nKegiatan pengabdian masyarakat ini, diharapkan  pengurus memahami pentingnya pemanfaatan teknologi bagi perkembangan Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla, informasi proses bisnis yang disampaikan pengurus  sesuai dengan kebutuhan manajemen dalam hal pemanfaatan teknologi, dan pengurus mengetahui tahapan pembuatan sebuah sistem informasi.\r\n\r\nSetelah Pengabdian Masyarakat selesai dilaksanakan maka dilakukan review terhadap apa yang telah disampaikan. Hal ini bertujuan untuk memahami pentingnya pemanfaatan teknologi bagi perkembangan Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla juga  melakukan review terhadap materi yang sudah disampaikan, setelah Program Pengabdian Masyarakat ini selesai dilaksanakan, akan dikembangkan sebuah sistem informasi yang sesuai dengan kebutuhan Asrama Istana Yatim Yayasan Keluarga Muslim The Castilla.</p>\r\n', '8c07eee23092e1175236caa9f02d19b8.png', 'Test', 'Test', 9, 'implementasi-sistem-manajemen-donasi-pada-asrama-istana-yatim-yayasan-keluarga-muslim-the-castilla'),
(2, '2021-05-28 17:17:42', 'Lorem Ipsum', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', '85302d6d84d6bde39ab7c5b0b9add966.jpeg', 'lorem', 'Norman', 4, 'lorem-ipsum');

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

--
-- Dumping data for table `ceritasantri`
--

INSERT INTO `ceritasantri` (`id_ceritasantri`, `tgl_ceritasantri`, `judul_ceritasantri`, `isi_ceritasantri`, `img_ceritasantri`, `jenis_ceritasantri`, `penulis_ceritasantri`, `lihat_ceritasantri`, `slug_ceritasantri`) VALUES
(1, '2021-05-28 17:47:35', 'testing', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', '4d71eeb89c83892791335eed313318e3.jpg', 'testing', 'testing', 0, 'testing');

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

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `id_bank`, `tanggal`, `nama`, `nowa`, `jumlah`, `bukti`, `konfirmasi`) VALUES
(1, 1, '2021-08-01 13:35:27', 'Alif', '089656754367', 100000, 'e7d2d08fe76950c70e066608bc5052cb.jpeg', 1),
(2, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(3, 1, '2021-08-01 13:35:27', 'Alif', '089656754367', 100000, 'e7d2d08fe76950c70e066608bc5052cb.jpeg', 1),
(4, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(5, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(6, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(8, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(9, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(10, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(11, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(12, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(13, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(14, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(15, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(16, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(17, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(18, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(19, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(20, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(21, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(22, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(23, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(24, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1),
(25, 1, '2021-06-01 13:44:31', 'Norman', '085697780467', 100000, '07581a72e52117aca57d6b84ffd5d3c2.png', 1);

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
(1, 'www.facebook.com', 'www.twitter.com', 'https://www.instagram.com/ykmtc/?hl=id', 'Copyright@Ubsi2021');

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

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id_form`, `nama_form`, `nomor_form`, `kelamin_form`, `acara_form`) VALUES
(1, 'normen', '085697780467', 'laki', 2),
(2, 'norman', '085697780467', 'laki', 1),
(3, 'assss', '085697780467', 'laki', 1);

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
(1, 'Berkah', 'Bersemangat Sedekah', 'Selengkapnya', 'artikel', '2021-05-15 12:11:41', 'c409d756c49be45968754a89ed8d186f.png'),
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

--
-- Dumping data for table `pengeluaran_donasi`
--

INSERT INTO `pengeluaran_donasi` (`id_pengeluaran`, `tanggal_pengeluaran`, `judul_pengeluaran`, `jumlah_pengeluaran`, `img_pengeluaran`, `ket`) VALUES
(1, '2021-05-30 16:36:49', 'test', 100000, '4abd28b10aff9a5db4118519dd5faf40.jpeg', 'test'),
(2, '2021-06-01 16:34:56', 'test', 60000, '0a1ab4a76698712cb0eef8843aae78d8.jpeg', 'coba');

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

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `nm_pengurus`, `tgllahir_pengurus`, `alamat_pengurus`, `no_telp`, `foto_pengurus`, `email_pengurus`, `password_pengurus`) VALUES
(1, 'admin', '1995-02-17', 'nuuunscjhs', '0987668', 'default.img\r\n', 'admin@gmail.com', '$2y$10$EX0L5MeIQldpkCuTZW.mjujTaj.Yy20IW0GOluecU/c.es.9r6E5.'),
(2, 'Norman Ardian', '2021-05-28', 'jalan lengkong gudang timur 4', '085697780467', '0ea699a24b8a0821d5bb308944df904a.jpg', 'norman@gmail.com', '$2y$10$rIosJbvsab5zgkmzZ.rgZOa97D8xdfY//AKHBYi9GB0gKUtVkP21O');

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
(1, '4c5fbc3b5402aa9ae2d1ec77458813cc.png', '2021-05-28 16:38:04'),
(2, '3658f0a573da4c6470a1fd66308d3118.png', '2021-05-24 14:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `id_tentang` int(11) NOT NULL,
  `text_tentang` text NOT NULL,
  `img_tentang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `text_tentang`, `img_tentang`) VALUES
(1, '<h2>What is Lorem Ipsum</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', 'e6666ff6960cc4602fcacbb3a2e69470.jpeg');

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
-- Dumping data for table `update_donasi`
--

INSERT INTO `update_donasi` (`id_update`, `jumlah_update`, `tanggal_update`) VALUES
(1, 140000, '2021-05-22 11:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `youtube`
--

CREATE TABLE `youtube` (
  `id_youtube` int(11) NOT NULL,
  `link_youtube` varchar(200) NOT NULL,
  `ket_youtube` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `youtube`
--

INSERT INTO `youtube` (`id_youtube`, `link_youtube`, `ket_youtube`) VALUES
(1, 'https://www.youtube.com/embed/CLBi2BImj9M', 'berkah'),
(2, 'https://www.youtube.com/embed/ICp-CzqFF-g\"', 'jumat berkah'),
(3, 'https://www.youtube.com/embed/ISp8YPYBXSI', 'Kegiatan');

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
-- Indexes for table `tentang`
--
ALTER TABLE `tentang`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `update_donasi`
--
ALTER TABLE `update_donasi`
  ADD PRIMARY KEY (`id_update`);

--
-- Indexes for table `youtube`
--
ALTER TABLE `youtube`
  ADD PRIMARY KEY (`id_youtube`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berkah`
--
ALTER TABLE `berkah`
  MODIFY `id_berkah` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ceritasantri`
--
ALTER TABLE `ceritasantri`
  MODIFY `id_ceritasantri` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengeluaran_donasi`
--
ALTER TABLE `pengeluaran_donasi`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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

--
-- AUTO_INCREMENT for table `tentang`
--
ALTER TABLE `tentang`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `youtube`
--
ALTER TABLE `youtube`
  MODIFY `id_youtube` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
