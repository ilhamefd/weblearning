-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Apr 2018 pada 04.54
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wlearn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambilmk`
--

CREATE TABLE IF NOT EXISTS `ambilmk` (
  `abl_id` int(11) NOT NULL,
  `kd_mk` varchar(15) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `kd_dosen` varchar(15) NOT NULL,
  `kd_prodi` varchar(40) NOT NULL,
  `offering` varchar(40) NOT NULL,
  `konfirmasi` enum('yes','no') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ambilmk`
--

INSERT INTO `ambilmk` (`abl_id`, `kd_mk`, `nim`, `kd_dosen`, `kd_prodi`, `offering`, `konfirmasi`) VALUES
(13, 'MK001', '140533600749', 'DS001', 'PTIN', 'A', 'yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `dsn_id` int(11) NOT NULL,
  `kd_dosen` varchar(10) NOT NULL,
  `nm_dosen` varchar(50) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `hp` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`dsn_id`, `kd_dosen`, `nm_dosen`, `jk`, `tgl_lahir`, `alamat`, `hp`, `email`, `foto`) VALUES
(1, 'DS001', 'Dr. Muladi, S.T., M.T.', 'L', '1968-06-04', 'Malang', '085549502444', 'muladi@um.ac.id', 'file_1524364073.png'),
(14, 'admin', 'Admin Utama', 'L', '1980-05-22', 'Malang', '085345456321', 'adminutama@gmail.com', 'file_1524363096.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi`
--

CREATE TABLE IF NOT EXISTS `evaluasi` (
  `eva_id` int(11) NOT NULL,
  `kd_mk` varchar(8) NOT NULL,
  `kd_dosen` varchar(10) NOT NULL,
  `kd_prodi` varchar(30) NOT NULL,
  `offering` varchar(30) NOT NULL,
  `pertemuan` varchar(3) NOT NULL,
  `jenis` text NOT NULL,
  `soal` varchar(2000) NOT NULL,
  `a` varchar(1000) NOT NULL,
  `b` varchar(1000) NOT NULL,
  `c` varchar(1000) NOT NULL,
  `d` varchar(1000) NOT NULL,
  `e` varchar(1000) NOT NULL,
  `kunci` varchar(1000) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `evaluasi`
--

INSERT INTO `evaluasi` (`eva_id`, `kd_mk`, `kd_dosen`, `kd_prodi`, `offering`, `pertemuan`, `jenis`, `soal`, `a`, `b`, `c`, `d`, `e`, `kunci`) VALUES
(1, 'MK001', 'DS001', 'PTIN', 'A', '2', 'pre', 'Apakah kepanjangan dari PC?', 'Personal Computer', 'Personal Card', 'Personal Camp', 'Personal CC', 'Personal CD', 'a'),
(2, 'MK001', 'DS001', 'PTIN', 'A', '2', 'pre', 'Handphone adalah.... ', 'HG', 'HP', 'HC', 'HD', 'HE', 'b'),
(3, 'MK001', 'DS001', 'PTIN', 'A', '2', 'pre', 'Wifi adalah', 'uyqtue', 'wteiuqt', 'Wireless Fidelity', 'uiqweyqi', 'wqeiq', 'c'),
(4, 'MK001', 'DS001', 'PTIN', 'B', '2', 'pos', 'GUI adalah...', 'Graphic User Interface', 'G User Interface', 'User Interface', 'Interface User', 'Interface User Graphic', 'a'),
(5, 'MK001', 'DS001', 'PTIN', 'A', '2', 'pos', 'Yang termasuk peralatan input adalah.....', 'Monitor', 'Keyboard', 'Printer', 'Speaker', 'LCD', 'b'),
(6, 'MK001', 'DS001', 'PTIN', 'A', '2', 'pos', 'Yang termasuk peralatan output adalah....', 'Joy Stick', 'Keyboard', 'Speaker', 'Barcode', 'mouse', 'c'),
(7, 'MK001', 'DS001', 'PTIN', 'A', '8', 'pos', 'GUI adalah…..', 'Graphic User Interface', 'G User Interface', 'User Interface', 'Interface User', 'Interface User Graphic', 'a'),
(8, 'MK001', 'DS001', 'PTIN', 'A', '8', 'pre', 'Yang termasuk peralatan input adalah….', 'Monitor', 'Keyboard', 'Printer', 'Speaker', 'LCD', 'b'),
(9, 'MK001', 'DS001', 'PTIN', 'A', '8', 'pos', 'Yang termasuk peralatan output adalah….', 'Joy Stick', 'Keyboard', 'Speaker', 'Barcode', 'mouse', 'c'),
(27, 'MK001', 'DS001', 'PTIN', 'A', '1', 'pre', 'Test Soal', 'a1', 'b1', 'c1', 'd1', 'e1', 'a'),
(22, 'MK002', 'DS002', 'PTIN', 'A', '2', 'pre', 'Soal baru 2', 'a2', 'b2', 'c2', 'd2', 'e2', 'b'),
(23, 'MK003', 'DS003', 'PTIN', 'A', '2', 'pre', 'Soal baru 3', 'a3', 'b3', 'c3', 'd3', 'e3', 'c'),
(25, 'MK002', 'DS002', 'PTIN', 'A', '2', 'pre', 'Soal baru 2', 'a2', 'b2', 'c2', 'd2', 'e2', 'b'),
(26, 'MK003', 'DS003', 'PTIN', 'A', '2', 'pre', 'Soal baru 3', 'a3', 'b3', 'c3', 'd3', 'e3', 'c'),
(38, 'MK001', 'DS001', 'PTIN', 'A', '2', 'quiz1', 'ini soal quiz', 'a1', 'b1', 'c1', 'd1', 'e1', 'a'),
(39, 'MK001', 'DS001', 'PTIN', 'A', '2', 'quiz1', 'SOAL QUIS NO2', 'A', 'B', 'C', 'D', 'E', 'a'),
(36, 'MK001', 'DS001', 'PTIN', 'B', '2', 'pre', 'ini soal', 'a1', 'b1', 'c1', 'd1', 'e1', 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `fil_id` int(11) NOT NULL,
  `kd_mk` varchar(8) NOT NULL,
  `nm_file` varchar(50) NOT NULL,
  `location` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `id_komen` int(11) NOT NULL,
  `id_balasan` varchar(255) NOT NULL,
  `mtr_id` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `jam` time NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komen`, `id_balasan`, `mtr_id`, `nim`, `komentar`, `jam`) VALUES
(85, '0', '176', '140533600749', '<p>Komentar 1</p>', '00:00:00'),
(86, '85', '176', '140533600749', '<p>balasan 1.1</p>', '00:00:00'),
(87, '85', '176', '140533600749', '<p>Balasan 1.2</p>', '00:00:00'),
(88, '0', '176', '140533600749', '<p>Komentar 2</p>', '00:00:00'),
(89, '0', '176', '140533600749', '<p>Komentar 3</p>', '00:00:00'),
(90, '0', '176', '140533600749', '<p>Komentar 4</p>', '00:00:00'),
(91, '90', '176', '140533600749', '<p>Balasan 4.1</p>', '00:00:00'),
(94, '0', '171', '140533600749', '<p>Komentar Pertemuan 2</p>', '00:00:00'),
(95, '94', '171', '140533600749', '<p>Balasan</p>', '00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_kuis`
--

CREATE TABLE IF NOT EXISTS `log_kuis` (
  `logkuis_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `kd_mk` varchar(100) NOT NULL,
  `kd_dosen` varchar(100) NOT NULL,
  `kd_prodi` varchar(100) NOT NULL,
  `offering` varchar(100) NOT NULL,
  `pertemuan` varchar(100) NOT NULL,
  `kuis` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `log_kuis`
--

INSERT INTO `log_kuis` (`logkuis_id`, `username`, `kd_mk`, `kd_dosen`, `kd_prodi`, `offering`, `pertemuan`, `kuis`, `time`, `keterangan`) VALUES
(6, '140533600749', 'MK001', 'DS001', 'PTIN', 'A', '2', 'quiz1', 'Minggu, 22 April 2018, 21:15', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_materi`
--

CREATE TABLE IF NOT EXISTS `log_materi` (
  `logmtr_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mtr_id` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=410 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `log_materi`
--

INSERT INTO `log_materi` (`logmtr_id`, `username`, `mtr_id`, `time`, `keterangan`) VALUES
(390, '140533600749', '176', 'Kamis, 19 April 2018, 17:31', 'dibaca'),
(395, '140533600749', '176', 'Kamis, 19 April 2018, 17:32', 'dibaca'),
(400, '140533600749', '171', 'Kamis, 19 April 2018, 21:42', 'dibaca'),
(403, '140533600749', '175', 'Kamis, 19 April 2018, 21:44', 'dibaca'),
(402, '140533600749', '177', 'Kamis, 19 April 2018, 21:43', 'dibaca'),
(404, '140533600749', '172', 'Jumat, 20 April 2018, 09:56', 'dibaca'),
(405, '140533600749', '172', 'Jumat, 20 April 2018, 10:00', 'dibaca'),
(406, '140533600749', '188', 'Minggu, 22 April 2018, 10:06', 'dibaca'),
(407, '140533600749', '170', 'Minggu, 22 April 2018, 13:41', 'dibaca'),
(408, '140533600749', '171', 'Minggu, 22 April 2018, 13:41', 'dibaca'),
(409, '140533600749', 'css', 'Minggu, 22 April 2018, 13:41', 'dibaca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_pos`
--

CREATE TABLE IF NOT EXISTS `log_pos` (
  `logpos_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `kd_mk` varchar(255) NOT NULL,
  `kd_dosen` varchar(255) NOT NULL,
  `kd_prodi` varchar(30) NOT NULL,
  `offering` varchar(30) NOT NULL,
  `pertemuan` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `log_pos`
--

INSERT INTO `log_pos` (`logpos_id`, `username`, `kd_mk`, `kd_dosen`, `kd_prodi`, `offering`, `pertemuan`, `time`, `keterangan`) VALUES
(7, '140533600749', 'MK001', 'DS001', 'PTIN', 'A', '2', 'Minggu, 22 April 2018, 21:07', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_pre`
--

CREATE TABLE IF NOT EXISTS `log_pre` (
  `logpre_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `kd_mk` varchar(255) NOT NULL,
  `kd_dosen` varchar(255) NOT NULL,
  `kd_prodi` varchar(30) NOT NULL,
  `offering` varchar(30) NOT NULL,
  `pertemuan` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `log_pre`
--

INSERT INTO `log_pre` (`logpre_id`, `username`, `kd_mk`, `kd_dosen`, `kd_prodi`, `offering`, `pertemuan`, `time`, `keterangan`) VALUES
(13, '140533600749', 'MK001', 'DS001', 'PTIN', 'A', '2', 'Minggu, 22 April 2018, 21:04', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_umum`
--

CREATE TABLE IF NOT EXISTS `log_umum` (
  `logu_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `log_umum`
--

INSERT INTO `log_umum` (`logu_id`, `username`, `time`, `keterangan`) VALUES
(146, '140533600749', 'Kamis, 19 April 2018, 19:55', 'logout'),
(147, '140533600749', 'Kamis, 19 April 2018, 19:55', 'login'),
(148, '140533600749', 'Kamis, 19 April 2018, 20:04', 'logout'),
(149, '140533600749', 'Kamis, 19 April 2018, 20:05', 'login'),
(150, '140533600749', 'Kamis, 19 April 2018, 20:12', 'logout'),
(151, 'DS001', 'Kamis, 19 April 2018, 20:12', 'login'),
(152, 'DS001', 'Kamis, 19 April 2018, 20:36', 'login'),
(153, 'DS001', 'Kamis, 19 April 2018, 20:52', 'logout'),
(154, 'DS001', 'Kamis, 19 April 2018, 20:53', 'login'),
(155, 'DS001', 'Kamis, 19 April 2018, 20:53', 'logout'),
(156, '140533600749', 'Kamis, 19 April 2018, 20:54', 'login'),
(157, 'siswa', 'Kamis, 19 April 2018, 20:57', 'logout'),
(158, '140533600749', 'Kamis, 19 April 2018, 21:09', 'login'),
(159, '140533600749', 'Kamis, 19 April 2018, 21:48', 'logout'),
(160, 'admin', 'Kamis, 19 April 2018, 21:48', 'login'),
(161, 'admin', 'Kamis, 19 April 2018, 21:56', 'logout'),
(162, '140533600750', 'Kamis, 19 April 2018, 21:56', 'login'),
(163, '140533600750', 'Kamis, 19 April 2018, 21:57', 'logout'),
(164, 'admin', 'Kamis, 19 April 2018, 21:58', 'login'),
(165, 'admin', 'Kamis, 19 April 2018, 22:05', 'logout'),
(166, 'admin', 'Jumat, 20 April 2018, 09:40', 'login'),
(167, 'admin', 'Jumat, 20 April 2018, 09:42', 'logout'),
(168, 'DS001', 'Jumat, 20 April 2018, 09:42', 'login'),
(169, 'DS001', 'Jumat, 20 April 2018, 09:48', 'logout'),
(170, '140533600749', 'Jumat, 20 April 2018, 09:48', 'login'),
(171, '140533600749', 'Jumat, 20 April 2018, 10:00', 'logout'),
(172, 'DS001', 'Jumat, 20 April 2018, 10:01', 'login'),
(173, 'DS001', 'Jumat, 20 April 2018, 10:01', 'logout'),
(174, 'admin', 'Jumat, 20 April 2018, 13:42', 'login'),
(175, 'admin', 'Jumat, 20 April 2018, 13:43', 'logout'),
(176, 'DS001', 'Jumat, 20 April 2018, 13:43', 'login'),
(177, 'DS001', 'Jumat, 20 April 2018, 13:50', 'logout'),
(178, '140533600749', 'Jumat, 20 April 2018, 13:50', 'login'),
(179, '140533600749', 'Jumat, 20 April 2018, 13:55', 'logout'),
(180, '140533600749', 'Jumat, 20 April 2018, 20:15', 'login'),
(181, '140533600749', 'Jumat, 20 April 2018, 20:27', 'logout'),
(182, 'DS001', 'Jumat, 20 April 2018, 20:27', 'login'),
(183, 'DS001', 'Jumat, 20 April 2018, 20:51', 'logout'),
(184, '140533600749', 'Jumat, 20 April 2018, 20:51', 'login'),
(185, '140533600749', 'Jumat, 20 April 2018, 21:07', 'logout'),
(186, 'DS001', 'Jumat, 20 April 2018, 21:07', 'login'),
(187, 'DS001', 'Jumat, 20 April 2018, 22:01', 'logout'),
(188, 'admin', 'Jumat, 20 April 2018, 22:01', 'login'),
(189, 'admin', 'Jumat, 20 April 2018, 22:01', 'logout'),
(190, 'DS001', 'Jumat, 20 April 2018, 22:02', 'login'),
(191, 'DS001', 'Jumat, 20 April 2018, 22:08', 'logout'),
(192, 'admin', 'Jumat, 20 April 2018, 22:08', 'login'),
(193, 'admin', 'Jumat, 20 April 2018, 22:10', 'logout'),
(194, 'DS001', 'Sabtu, 21 April 2018, 14:37', 'login'),
(195, 'DS001', 'Sabtu, 21 April 2018, 14:47', 'login'),
(196, 'DS001', 'Sabtu, 21 April 2018, 14:48', 'logout'),
(197, 'DS001', 'Sabtu, 21 April 2018, 14:48', 'login'),
(198, 'DS001', 'Sabtu, 21 April 2018, 14:50', 'logout'),
(199, 'admin', 'Sabtu, 21 April 2018, 14:50', 'login'),
(200, 'admin', 'Sabtu, 21 April 2018, 15:20', 'logout'),
(201, 'DS001', 'Sabtu, 21 April 2018, 15:20', 'login'),
(202, 'DS001', 'Sabtu, 21 April 2018, 15:25', 'logout'),
(203, 'admin', 'Minggu, 22 April 2018, 09:05', 'login'),
(204, 'admin', 'Minggu, 22 April 2018, 09:05', 'login'),
(205, 'admin', 'Minggu, 22 April 2018, 09:26', 'logout'),
(206, 'DS001', 'Minggu, 22 April 2018, 09:27', 'login'),
(207, 'DS001', 'Minggu, 22 April 2018, 09:49', 'logout'),
(208, '140533600749', 'Minggu, 22 April 2018, 09:49', 'login'),
(209, '140533600749', 'Minggu, 22 April 2018, 09:49', 'login'),
(210, 'admin', 'Minggu, 22 April 2018, 10:47', 'login'),
(211, 'admin', 'Minggu, 22 April 2018, 10:48', 'logout'),
(212, 'DS001', 'Minggu, 22 April 2018, 10:48', 'login'),
(213, 'DS001', 'Minggu, 22 April 2018, 11:34', 'logout'),
(214, 'DS001', 'Minggu, 22 April 2018, 11:34', 'login'),
(215, 'DS001', 'Minggu, 22 April 2018, 11:43', 'logout'),
(216, 'DS001', 'Minggu, 22 April 2018, 11:44', 'login'),
(217, 'DS001', 'Minggu, 22 April 2018, 11:46', 'logout'),
(218, 'admin', 'Minggu, 22 April 2018, 11:47', 'login'),
(219, 'admin', 'Minggu, 22 April 2018, 11:47', 'logout'),
(220, 'DS001', 'Minggu, 22 April 2018, 11:47', 'login'),
(221, 'DS001', 'Minggu, 22 April 2018, 12:00', 'logout'),
(222, 'DS001', 'Minggu, 22 April 2018, 12:00', 'login'),
(223, 'DS001', 'Minggu, 22 April 2018, 12:02', 'logout'),
(224, 'admin', 'Minggu, 22 April 2018, 12:02', 'login'),
(225, 'admin', 'Minggu, 22 April 2018, 12:03', 'logout'),
(226, 'DS001', 'Minggu, 22 April 2018, 12:03', 'login'),
(227, 'DS001', 'Minggu, 22 April 2018, 12:38', 'logout'),
(228, 'DS001', 'Minggu, 22 April 2018, 12:39', 'login'),
(229, 'DS001', 'Minggu, 22 April 2018, 12:55', 'logout'),
(230, 'admin', 'Minggu, 22 April 2018, 12:55', 'login'),
(231, 'admin', 'Minggu, 22 April 2018, 13:25', 'logout'),
(232, 'DS001', 'Minggu, 22 April 2018, 13:27', 'login'),
(233, 'DS001', 'Minggu, 22 April 2018, 13:29', 'logout'),
(234, '140533600749', 'Minggu, 22 April 2018, 13:29', 'login'),
(235, '140533600749', 'Minggu, 22 April 2018, 13:30', 'login'),
(236, '140533600749', 'Minggu, 22 April 2018, 13:31', 'login'),
(237, '140533600749', 'Minggu, 22 April 2018, 14:24', 'logout'),
(238, '140533600749', 'Minggu, 22 April 2018, 18:03', 'login'),
(239, '140533600749', 'Minggu, 22 April 2018, 19:48', 'logout'),
(240, '140533600749', 'Minggu, 22 April 2018, 19:50', 'login'),
(241, '140533600749', 'Minggu, 22 April 2018, 22:33', 'logout'),
(242, '140533600749', 'Senin, 23 April 2018, 08:32', 'login'),
(243, '140533600749', 'Senin, 23 April 2018, 08:44', 'logout'),
(244, 'DS001', 'Senin, 23 April 2018, 08:44', 'login'),
(245, 'DS001', 'Senin, 23 April 2018, 09:30', 'logout'),
(246, 'DS001', 'Senin, 23 April 2018, 09:34', 'login'),
(247, 'DS001', 'Senin, 23 April 2018, 09:40', 'logout'),
(248, 'admin', 'Senin, 23 April 2018, 09:40', 'login'),
(249, 'admin', 'Senin, 23 April 2018, 09:42', 'logout');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `mhs_id` int(11) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(14) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`mhs_id`, `nim`, `nama`, `jk`, `tgl_lahir`, `alamat`, `email`, `hp`, `foto`) VALUES
(1, '140533600749', 'M ilham Effendi', 'L', '1995-09-05', 'Trenggalek', 'ilhamefd95@gmail.com', '085259257095', 'file_1524403168.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `mtr_id` int(11) NOT NULL,
  `kd_mk` varchar(8) NOT NULL,
  `pertemuan` int(16) NOT NULL,
  `kd_dosen` varchar(8) NOT NULL,
  `kd_prodi` varchar(40) NOT NULL,
  `offering` varchar(40) NOT NULL,
  `judul` varchar(40) NOT NULL,
  `kuis` varchar(255) NOT NULL,
  `materi` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=192 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`mtr_id`, `kd_mk`, `pertemuan`, `kd_dosen`, `kd_prodi`, `offering`, `judul`, `kuis`, `materi`) VALUES
(171, 'MK001', 2, 'DS001', 'PTIN', 'A', 'Transmisi Data', 'quiz1', '<p style="text-align: center;"><strong>Transmisi Data</strong></p>\r\n<p style="text-align: center;">&nbsp;</p>\r\n<p style="text-align: center;">Ini Adalah Konten Transmisi Data</p>'),
(172, 'MK001', 3, 'DS001', 'PTIN', 'A', 'Media Transmisi', '', '<h2 style="text-align: left;"><strong>Konten Media Transmisi</strong></h2>'),
(173, 'MK001', 6, 'DS001', 'PTIN', 'A', 'Circuit Switching dan Packet Switching', '', '<h2><strong>Circuit Switching dan Packet Switching</strong></h2>'),
(174, 'MK001', 7, 'DS001', 'PTIN', 'A', 'Congestion Control', '', '<h2 style="text-align: left;">Konten Congestion Control</h2>'),
(175, 'MK001', 8, 'DS001', 'PTIN', 'A', 'Local Area Network (LAN)', '', '<h2 style="text-align: left;">Konten&nbsp;Local Area Network (LAN)</h2>'),
(176, 'MK001', 9, 'DS001', 'PTIN', 'A', 'Wireless Local Area Network (WLAN)', 'quiz2', '<h3><strong>Tujuan</strong></h3>\r\n<p>Setelah mempelajari materi ini mahasiswa dapat:</p>\r\n<ol style="list-style-type: upper-alpha;">\r\n<li>Memahami jaringan <em>wireless</em>.</li>\r\n<li>Melakukan konfigurasi <em>acces point</em> pada <em>local area network</em>.</li>\r\n<li>Melakukan konfigurasi keamanan pada <em>acces point</em></li>\r\n</ol>\r\n<h2 style="text-align: center;">&nbsp;</h2>\r\n<h3 style="text-align: center;"><strong>Materi</strong></h3>\r\n<p><strong>Wireless Local Area Network(WLAN)</strong></p>\r\n<p style="text-align: justify;">Wireless LAN merupakan sebuah sistem komunikasi data yang fleksibel yang dapat diaplikasikan sebagai alternatif pengganti untuk jaringan LAN atau jaringan yang menggunakan kabel. Wireless LAN menggunakan teknologi frekuensi radio yang berguna untuk mengirim dan menerima data melalui media gelombang elektromagnetik baik frekuensi radio (RF) atau frekuensi inframerah (IR).</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Arsitektur dan Service IEEE 802.11</strong></p>\r\n<p style="text-align: justify;">Arsitektur logis 802.11 mengandung beberapa komponen utama yaitu station (STA), wireless access point (AP), independent basic service set (IBSS), basic service set (BSS), distribution system (DS), dan extended service set (ESS).</p>\r\n<table style="width: 100%; border-collapse: collapse;" border="0">\r\n<tbody>\r\n<tr>\r\n<td style="width: 966px;">\r\n<ul style="list-style-type: disc;">\r\n<li style="text-align: justify;">STA nirkabel berisi kartu adaptor, PC card, atau perangkat tertanam untuk menyediakan konektivitas nirkabel. Fungsi wireless AP sebagai jembatan antara STA nirkabel dan jaringan backbone yang ada untuk akses jaringan.</li>\r\n<li style="text-align: justify;">BSS adalah jaringan nirkabel yang terdiri dari AP nirkabel tunggal yang mendukung satu atau beberapa client nirkabel. Sebuah BSS kadang-kadang juga disebut dengan jaringan nirkabel infrastruktur.</li>\r\n<li style="text-align: justify;">ESS adalah satu set dari dua atau lebih AP nirkabel yang terhubung ke jaringan kabel yang sama yang mendefinisikan segmen jaringan logis tunggal dibatasi oleh router.</li>\r\n<li style="text-align: justify;">DS adalah komponen logis yang digunakan untuk menghubungkan beberapa BSS. DS menyediakan layanan distribusi untuk memungkinkan roaming antar STA pada BSS.</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style="text-align: justify;">Beberapa AP pada BSS saling berhubungan dengan DS. Hal ini memungkinkan untuk mobilitas, karena STA dapat berpindah dari satu BSS ke BSS yang lain. AP dapat saling berhubungan dengan atau tanpa kabel, namun sebagian besar berhubungan dengan kabel.</p>\r\n<p><strong>Operasi Mode</strong></p>\r\n<p style="text-align: justify;">Pada IEEE 802.11 ini didefinisikan dengan operasi mode yang digunakan, antara lain :</p>\r\n<p style="text-align: justify;">1.Mode Infrastruktur</p>\r\n<p style="text-align: justify;">Pada mode infrastruktur, setidaknya ada satu AP nirkabel dan sebuah client nirkabel (laptop). Client nirkabel menggunakan AP nirkabel untuk mengakses sumber daya jaringan kabel. Jaringan kabel dapat menggunakan intranet ataupu internet, tergantung pada penempatan AP nirkabel. ESS dapat digambarkan sebagai berikut.</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../assets/kcfinder/upload/image/g1.png" alt="" width="448" height="268" /></p>\r\n<p style="text-align: justify;">2.Mode Ad-hoc</p>\r\n<p style="text-align: justify;">Mode ad-hoc disebut juga mode peer to peer. Client nirkabel dalam mode ad-hoc merupakan IBSS. Salah satu client nirkabel, client wireless dalam IBSS mengambil alih beberapa tanggung jawab AP nirkabel. Tanggung jawab ini meliputi proses otentikasi anggota baru. Mode ad-hoc digunakan untuk menghubungkan client nirkabel bersama-sama ketika tidak ada AP nirkabel yang ada. Client nirkabel harus dikonfigurasi secara explisit untuk menggunakan modus ad-hoc. Pada mode ad-hoc, client nirkabel berkomunikasi langsung dengan client lain tanpa menggunakan AP nirkabel, seperti pada gambar berikut.</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../assets/kcfinder/upload/image/g2.png" alt="" width="170" height="87" /></p>\r\n<p><strong>Medium Access Control IEEE 802.11</strong></p>\r\n<p style="text-align: justify;"><em>Medium Access Control</em>&nbsp;adalah sebuah metode untuk mentransmisikan sinyal yang dimiliki oleh&nbsp;<em>node-node</em>&nbsp;yang terhubung ke&nbsp;jaringan tanpa terjadi konflik. Algoritma MAC untuk 802.11 yang disebut DFWMAC yang menyediakan mekanisme kontrol akses terdistribusi dengan kontrol terpusat opsional yang dibangun di atas itu. Lapisan bawah yang lebih rendah dari lapisan MAC adalah koordinasi terdistribusi fungsi (DCF). DCF menggunakan algoritme pertentangan untuk menyediakan akses ke semua lalu lintas.Lalu lintas asynchronous biasa langsung menggunakan DCF. Fungsi koordinasi titik (PCF) adalah algoritma MAC terpusat yang digunakan untuk menyediakan layanan bebas contention. PCF dibangun di atas DCF dan memanfaatkan fitur-fitur DCF untuk menjamin akses bagi para penggunanya.</p>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../assets/kcfinder/upload/image/g3.png" alt="" width="468" height="361" /></p>\r\n<p><strong>Physical Layer IEEE 802.11</strong></p>\r\n<p>Lapisan Physical didefinisikan dalam standar 802.11 yang asli:</p>\r\n<table style="height: 18px; width: 100%; border-collapse: collapse;" border="0">\r\n<tbody>\r\n<tr style="height: 18px;">\r\n<td style="width: 100%; height: 18px;">\r\n<ul>\r\n<li style="text-align: justify;">Spektrum penyebaran urutan langsung (DSSS) yang beroperasi di pita ISM 2,4 GHz, pada kecepatan data 1 Mbps dan 2 Mbps. Di Amerika Serikat, FCC (Federal Komisi Komunikasi) tidak memerlukan lisensi untuk penggunaan pita ini. Jumlah saluran yang tersedia tergantung pada bandwidth yang dialokasikan oleh berbagai badan pengatur nasional. Ini berkisar dari 13 di sebagian besar Eropa negara ke hanya satu saluran yang tersedia di Jepang.</li>\r\n<li style="text-align: justify;">Frequency-hopping spread spectrum (FHSS) yang beroperasi di ISM 2,4 GHz band, pada kecepatan data 1 Mbps dan 2 Mbps. Jumlah saluran yang tersedia berkisar dari 23 di Jepang hingga 70 di Amerika Serikat.</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><img style="display: block; margin-left: auto; margin-right: auto;" src="../../assets/kcfinder/upload/image/g4.png" alt="" width="459" height="216" /></p>\r\n<p><strong>Security Consideration IEEE 802.11</strong></p>\r\n<p>IEEE 802.11 mendefinisikan tiga layanan yang menyediakan LAN nirkabel dengan dua fitur ini:</p>\r\n<table style="width: 100%; border-collapse: collapse;" border="0">\r\n<tbody>\r\n<tr>\r\n<td style="width: 100%;">\r\n<ul>\r\n<li style="text-align: justify;">Otentikasi: Digunakan untuk menetapkan identitas stasiun satu sama lain. Layanan otentikasi digunakan oleh stasiun untuk membangun identitas mereka dengan stasiun yang ingin mereka komunikasikan. IEEE 802.11 membutuhkan otentikasi sukses yang dapat diterima bersama sebelum sebuah stasiun dapat terbentuk sebuah asosiasi dengan AP.</li>\r\n<li style="text-align: justify;">Deauthentication: Layanan ini dipanggil setiap kali otentikasi yang ada harus diakhiri.</li>\r\n<li style="text-align: justify;">Privasi: Digunakan untuk mencegah isi pesan dibaca oleh orang lain dari penerima yang dituju. Standar menyediakan untuk penggunaan opsional enkripsi untuk menjamin privasi.</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p><strong>Standar Keamanan LAN Nirkabel</strong></p>\r\n<p style="text-align: justify;">Privasi 802.11 memiliki fitur keamanan Wired Equivalent Privacy (WEP) algorithm, namun mengandung kelemahan utama lambatnya proses enkripsi. Untuk mempercepat pengenalan keamanan pada WLAN, Wi-Fi Alliance mengumumkan Wi-Fi Protected Access (WPA) sebagai standar Wi-Fi. WPA adalah seperangkat mekanisme keamanan yang menghilangkan sebagian besar masalah keamanan 802.11 dan didasarkan pada keadaan standar 802.11i saat ini.</p>\r\n<p>&nbsp;</p>\r\n<p style="text-align: center;"><strong>Konfigurasi Acces Point Berbasis Mode Infrastruktur</strong></p>\r\n<center><iframe src="//www.youtube.com/embed/JIBvZD3Lzzs" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></center><center></center><center></center><center></center><center></center><center><strong>TP-Link WR841ND Simulator</strong></center><center></center><center></center><center><strong><iframe src="https://www.tp-link.com/resources/simulator/TL-WR841ND_V8/Index.htm" name="frame1" width="900px" height="400px" align="center" sandbox="allow-forms allow-scripts allow-same-origin allow-pointer-lock"></iframe></strong></center><center></center><center></center><center></center><center></center>'),
(177, 'MK001', 10, 'DS001', 'PTIN', 'A', 'Internet Protocol', '', '<h2>Konten&nbsp;Internet Protocol</h2>'),
(178, 'MK001', 11, 'DS001', 'PTIN', 'A', 'Transport Protocol', 'quiz3', '<h2>Konten Transport Protocol</h2>'),
(179, 'MK001', 12, 'DS001', 'PTIN', 'A', 'Internet Application 1', '', '<h2>Konten Internet Application 1</h2>'),
(180, 'MK001', 13, 'DS001', 'PTIN', 'A', 'Internet Application 2', '', '<p>Konten Internet Application 2</p>'),
(154, 'MK001', 4, 'DS001', 'PTIN', 'A', 'Komunikasi Data Digital', '', '<h2 style="text-align: left;"><strong>Konten Komunikasi Data Digital</strong></h2>\r\n<p style="text-align: center;"><strong><img style="height: 300px; width: 450px;" src="../../../ckeditor/kcfinder/upload/images/fbi-virus.jpg" alt="" /></strong></p>'),
(170, 'MK001', 1, 'DS001', 'PTIN', 'A', 'SAP Perkuliahan', '', '<h2 style="text-align: left;"><strong>Konten SAP Perkuliahan</strong></h2>'),
(181, 'MK001', 14, 'DS001', 'PTIN', 'A', 'Internet Application 3', '', '<h2><strong>Konten&nbsp;Internet Application 3</strong></h2>'),
(152, 'MK001', 5, 'DS001', 'PTIN', 'A', 'Data Link Control', '', '<h2><strong>Konten Data Link Control</strong></h2>'),
(183, 'MK001', 15, 'DS001', 'PTIN', 'A', 'Tugas Besar', '', '<h2><strong>Konten Tugas Besar</strong></h2>'),
(185, 'MK001', 16, 'DS001', 'PTIN', 'A', 'UAS', '', '<h2><strong>UAS</strong></h2>'),
(188, 'MK001', 1, 'DS001', 'PTIN', 'B', 'SAP Perkuliahan', '', '<p>SAP Perkuliahan</p>'),
(189, 'MK001', 2, 'DS001', 'PTIN', 'B', 'Pertemuan 2', '', '<p>Materi ke 2</p>'),
(190, 'MK001', 3, 'DS001', 'PTIN', 'B', 'Pertemuan 3', '', '<p>Pertemuan 3 ok</p>'),
(191, 'MK001', 4, 'DS001', 'PTIN', 'B', 'Pertemuan 4', '', '<p>Pertemuan 4</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE IF NOT EXISTS `matkul` (
  `mku_id` int(11) NOT NULL,
  `kd_mk` varchar(8) NOT NULL,
  `nm_mk` varchar(60) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`mku_id`, `kd_mk`, `nm_mk`) VALUES
(1, 'MK001', 'Komunikasi Data dan Jaringan Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar`
--

CREATE TABLE IF NOT EXISTS `mengajar` (
  `mgj_id` int(11) NOT NULL,
  `kd_dosen` varchar(15) NOT NULL,
  `kd_mk` varchar(15) NOT NULL,
  `kd_prodi` varchar(50) NOT NULL,
  `offering` varchar(10) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mengajar`
--

INSERT INTO `mengajar` (`mgj_id`, `kd_dosen`, `kd_mk`, `kd_prodi`, `offering`) VALUES
(1, 'DS001', 'MK001', 'PTIN', 'A'),
(8, 'DS001', 'MK001', 'PTIN', 'B'),
(9, 'DS001', 'MK001', 'PTEK', 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `nli_id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kd_mk` varchar(20) NOT NULL,
  `kd_dosen` varchar(20) NOT NULL,
  `kd_prodi` varchar(40) NOT NULL,
  `offering` varchar(40) NOT NULL,
  `pertemuan` varchar(20) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` varchar(20) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`nli_id`, `nim`, `kd_mk`, `kd_dosen`, `kd_prodi`, `offering`, `pertemuan`, `jenis`, `nilai`) VALUES
(42, '140533600749', 'MK001', 'DS001', 'PTIN', 'A', '2', 'pre', '100'),
(43, '140533600749', 'MK001', 'DS001', 'PTIN', 'A', '2', 'pos', '100'),
(46, '140533600749', 'MK001', 'DS001', 'PTIN', 'A', '2', 'quiz1', '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petunjuk`
--

CREATE TABLE IF NOT EXISTS `petunjuk` (
  `petunjuk_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `isi` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `petunjuk`
--

INSERT INTO `petunjuk` (`petunjuk_id`, `user`, `isi`) VALUES
(1, 'admin', '<p>isi admin</p>'),
(2, 'dosen', '<p>isi dosen</p>'),
(3, 'mahasiswa', '<p>isi mahasiswa</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `prd_id` int(11) NOT NULL,
  `kd_prodi` varchar(8) NOT NULL,
  `nm_prodi` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE IF NOT EXISTS `tugas` (
  `tgs_id` int(11) NOT NULL,
  `kd_mk` varchar(8) NOT NULL,
  `nim` varchar(14) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `tugas` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `usr_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `level` enum('mhs','dosen','admin') NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`usr_id`, `username`, `password`, `level`) VALUES
(1, '140533600749', '0357a7592c4734a8b1e12bc48e29e9e9', 'mhs'),
(4, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(6, 'DS001', 'ce28eed1511f631af6b2a7bb0a85d636', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambilmk`
--
ALTER TABLE `ambilmk`
  ADD PRIMARY KEY (`abl_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`dsn_id`);

--
-- Indexes for table `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`eva_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`fil_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indexes for table `log_kuis`
--
ALTER TABLE `log_kuis`
  ADD PRIMARY KEY (`logkuis_id`);

--
-- Indexes for table `log_materi`
--
ALTER TABLE `log_materi`
  ADD PRIMARY KEY (`logmtr_id`);

--
-- Indexes for table `log_pos`
--
ALTER TABLE `log_pos`
  ADD PRIMARY KEY (`logpos_id`);

--
-- Indexes for table `log_pre`
--
ALTER TABLE `log_pre`
  ADD PRIMARY KEY (`logpre_id`);

--
-- Indexes for table `log_umum`
--
ALTER TABLE `log_umum`
  ADD PRIMARY KEY (`logu_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mhs_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`mtr_id`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`mku_id`);

--
-- Indexes for table `mengajar`
--
ALTER TABLE `mengajar`
  ADD PRIMARY KEY (`mgj_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nli_id`);

--
-- Indexes for table `petunjuk`
--
ALTER TABLE `petunjuk`
  ADD PRIMARY KEY (`petunjuk_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`prd_id`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`tgs_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambilmk`
--
ALTER TABLE `ambilmk`
  MODIFY `abl_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `dsn_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `eva_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `fil_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `log_kuis`
--
ALTER TABLE `log_kuis`
  MODIFY `logkuis_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `log_materi`
--
ALTER TABLE `log_materi`
  MODIFY `logmtr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=410;
--
-- AUTO_INCREMENT for table `log_pos`
--
ALTER TABLE `log_pos`
  MODIFY `logpos_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `log_pre`
--
ALTER TABLE `log_pre`
  MODIFY `logpre_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `log_umum`
--
ALTER TABLE `log_umum`
  MODIFY `logu_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `mhs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `mtr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=192;
--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `mku_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `mengajar`
--
ALTER TABLE `mengajar`
  MODIFY `mgj_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nli_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `petunjuk`
--
ALTER TABLE `petunjuk`
  MODIFY `petunjuk_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `tgs_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
