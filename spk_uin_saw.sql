-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 01:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_uin_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `Id_Alternatif` int(3) NOT NULL,
  `Nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`Id_Alternatif`, `Nama`) VALUES
(2, 'Bahasa dan Sastra Arab'),
(3, 'Sejarah Peradaban Islam'),
(4, 'Ilmu Perpustakaan dan Informasi Islam'),
(5, 'Ilmu Perpustakaan'),
(6, 'Komunikasi dan Penyiaran Islam'),
(7, 'Bimbingan dan Konseling Islam'),
(8, 'Menajemen Dakwah'),
(9, 'Pengembangan Masyarakat Islam'),
(10, 'Hukum Keluarga'),
(11, 'Hukum Tatanegara Islam'),
(12, 'Perbandingan Mahzab'),
(13, 'Pendidikan Agama Islam'),
(14, 'Pendidikan Bahasa Arab'),
(15, 'Menajemen Pendidikan Islam'),
(16, 'Pendidikan Guru Madrasah Ibtidaiyah'),
(17, 'Tadris Bahasa Inggris'),
(18, 'Tadris Ilmu Pengetahuan Alam (IPA)'),
(19, 'Tadris Ilmu Pengetahuan Sosial (IPS)'),
(20, 'Tadris Matematika'),
(21, 'Bimbingan dan Konseling Pendidikan Islam'),
(22, 'Aqidah dan Filsafat Islam'),
(23, 'Studi Agama-agama'),
(24, 'Ilmu Alquran dan Tafsir'),
(25, 'Psikologi islam'),
(26, 'Ilmu Hadist'),
(27, 'Tasawuf dan Psikoterapi'),
(28, 'Ekonomi Syariah'),
(29, 'Menajemen Perbankan Syariah'),
(30, 'Akutansi Syariah'),
(31, 'Perbankan Syariah'),
(32, 'Menajemen Bisnis Islam'),
(33, 'Sistem Informasi'),
(34, 'Matematika'),
(35, 'Hukum Ekonomi Syariah');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id_data_user` int(3) NOT NULL,
  `Id_User` int(3) NOT NULL,
  `NilaiX_SmtI` float NOT NULL,
  `NilaiX_SmtII` float NOT NULL,
  `NilaiXI_SmtI` float NOT NULL,
  `NilaiXI_SmtII` float NOT NULL,
  `NilaiXII_SmtI` float NOT NULL,
  `NilaiXII_SmtII` float NOT NULL,
  `Nilai_Rapor` float NOT NULL,
  `Minat_Bakat` varchar(250) NOT NULL,
  `Prestasi_Akademik` varchar(250) NOT NULL,
  `Penghasilan_Ortu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_data_user`, `Id_User`, `NilaiX_SmtI`, `NilaiX_SmtII`, `NilaiXI_SmtI`, `NilaiXI_SmtII`, `NilaiXII_SmtI`, `NilaiXII_SmtII`, `Nilai_Rapor`, `Minat_Bakat`, `Prestasi_Akademik`, `Penghasilan_Ortu`) VALUES
(4, 26, 80, 89, 90, 89, 100, 101, 91.5, 'Agama', 'Juara Tingkat Provinsi >3', '1.500.000 s/d 2.400.000'),
(5, 27, 86, 86, 86, 86, 86, 89, 86.5, 'Sains', 'Juara Tingkat Kabupaten/Kota >3', '2.000.000 s/d 2.400.000'),
(7, 29, 80, 80, 80, 80, 80, 80, 80, 'Bahasa', 'Juara Tingkat Nasional 1 - 3', '1.500.000 s/d 1.900.000');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_perhitungan_saw`
--

CREATE TABLE `hasil_perhitungan_saw` (
  `Id_Hasil_SAW` int(3) NOT NULL,
  `Id_Alternatif` int(3) NOT NULL,
  `Nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_perhitungan_saw`
--

INSERT INTO `hasil_perhitungan_saw` (`Id_Hasil_SAW`, `Id_Alternatif`, `Nilai`) VALUES
(6, 2, 77.75),
(7, 3, 70.75),
(8, 4, 60.75),
(9, 5, 63.75),
(10, 6, 70.75),
(11, 7, 60.25),
(12, 8, 60.25),
(13, 9, 81.5),
(14, 10, 71),
(15, 11, 60.25),
(16, 35, 70.75),
(17, 12, 71),
(18, 13, 74.5),
(19, 14, 71),
(20, 15, 81.5),
(21, 16, 81.5),
(22, 17, 60.25),
(23, 18, 70.75),
(24, 19, 63.75),
(25, 20, 67.5),
(26, 21, 56.75),
(27, 22, 78),
(28, 23, 85),
(29, 24, 64),
(30, 25, 70.75),
(31, 26, 46.25),
(32, 27, 46.25),
(33, 28, 63.75),
(34, 29, 70.75),
(35, 30, 74.25),
(36, 31, 74.5),
(37, 32, 67.5),
(38, 33, 70.75),
(39, 34, 74.25);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `Id_Kriteria` int(3) NOT NULL,
  `Kode_Kriteria` varchar(10) NOT NULL,
  `Nama_Kriteria` varchar(50) NOT NULL,
  `Bobot_Kriteria` float NOT NULL,
  `Jenis_Kriteria` enum('Benefit','Cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`Id_Kriteria`, `Kode_Kriteria`, `Nama_Kriteria`, `Bobot_Kriteria`, `Jenis_Kriteria`) VALUES
(27, 'C1', 'Nilai Rapor', 35, 'Benefit'),
(28, 'C2', 'Minat dan Bakat', 25, 'Benefit'),
(29, 'C3', 'Prestasi Akademik', 25, 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `Id_Penilaian` int(3) NOT NULL,
  `Id_Alternatif` int(3) NOT NULL,
  `Id_Kriteria` int(3) NOT NULL,
  `Id_Sub_Alternatif` int(3) NOT NULL,
  `Nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`Id_Penilaian`, `Id_Alternatif`, `Id_Kriteria`, `Id_Sub_Alternatif`, `Nilai`) VALUES
(68, 2, 27, 19, 5),
(69, 2, 28, 7, 5),
(70, 2, 29, 43, 5),
(72, 3, 27, 50, 4),
(73, 3, 28, 59, 5),
(74, 3, 29, 67, 5),
(76, 4, 27, 133, 4),
(77, 4, 28, 135, 3),
(78, 4, 29, 150, 5),
(80, 5, 27, 1070, 4),
(81, 5, 28, 1080, 5),
(82, 5, 29, 1088, 3),
(84, 6, 27, 164, 4),
(85, 6, 28, 175, 5),
(86, 6, 29, 181, 5),
(88, 7, 27, 195, 3),
(89, 7, 28, 205, 5),
(90, 7, 29, 212, 4),
(92, 8, 27, 226, 3),
(93, 8, 28, 230, 5),
(94, 8, 29, 243, 4),
(96, 9, 27, 257, 5),
(97, 9, 28, 268, 5),
(98, 9, 29, 275, 6),
(100, 10, 27, 289, 3),
(101, 10, 28, 292, 5),
(102, 10, 29, 304, 7),
(104, 11, 27, 351, 3),
(105, 11, 28, 354, 5),
(106, 11, 29, 368, 4),
(108, 35, 27, 320, 4),
(109, 35, 28, 323, 5),
(110, 35, 29, 337, 5),
(112, 12, 27, 381, 3),
(113, 12, 28, 386, 5),
(114, 12, 29, 397, 7),
(116, 13, 27, 413, 4),
(117, 13, 28, 417, 5),
(118, 13, 29, 428, 6),
(120, 14, 27, 443, 3),
(121, 14, 28, 449, 5),
(122, 14, 29, 459, 7),
(124, 15, 27, 475, 5),
(125, 15, 28, 481, 5),
(126, 15, 29, 492, 6),
(128, 16, 27, 507, 5),
(129, 16, 28, 512, 5),
(130, 16, 29, 524, 6),
(132, 17, 27, 537, 3),
(133, 17, 28, 539, 5),
(134, 17, 29, 554, 4),
(136, 18, 27, 569, 4),
(137, 18, 28, 581, 5),
(138, 18, 29, 586, 5),
(140, 19, 27, 600, 3),
(141, 19, 28, 611, 5),
(142, 19, 29, 616, 5),
(144, 20, 27, 630, 3),
(145, 20, 28, 639, 5),
(146, 20, 29, 648, 6),
(148, 21, 27, 662, 2),
(149, 21, 28, 671, 5),
(150, 21, 29, 680, 5),
(152, 22, 27, 691, 4),
(153, 22, 28, 696, 5),
(154, 22, 29, 709, 7),
(156, 23, 27, 80, 5),
(157, 23, 28, 85, 5),
(158, 23, 29, 98, 7),
(160, 24, 27, 727, 2),
(161, 24, 28, 732, 5),
(162, 24, 29, 745, 7),
(164, 25, 27, 759, 4),
(165, 25, 28, 769, 5),
(166, 25, 29, 776, 5),
(168, 26, 27, 789, 2),
(169, 26, 28, 794, 5),
(170, 26, 29, 810, 2),
(172, 27, 27, 820, 2),
(173, 27, 28, 831, 5),
(174, 27, 29, 841, 2),
(176, 28, 27, 852, 3),
(177, 28, 28, 859, 5),
(178, 28, 29, 869, 5),
(180, 29, 27, 883, 4),
(181, 29, 28, 889, 5),
(182, 29, 29, 900, 5),
(184, 30, 27, 914, 5),
(185, 30, 28, 921, 5),
(186, 30, 29, 932, 4),
(188, 31, 27, 945, 4),
(189, 31, 28, 953, 5),
(190, 31, 29, 964, 6),
(192, 32, 27, 977, 3),
(193, 32, 28, 983, 5),
(194, 32, 29, 995, 6),
(196, 33, 27, 1008, 4),
(197, 33, 28, 1010, 5),
(198, 33, 29, 1026, 5),
(200, 34, 27, 1038, 5),
(201, 34, 28, 1047, 5),
(202, 34, 29, 1057, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sub_alternatif`
--

CREATE TABLE `sub_alternatif` (
  `Id_Sub_Alternatif` int(3) NOT NULL,
  `Id_Alternatif` int(3) NOT NULL,
  `Id_Kriteria` int(3) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Bobot` varchar(20) NOT NULL,
  `Nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_alternatif`
--

INSERT INTO `sub_alternatif` (`Id_Sub_Alternatif`, `Id_Alternatif`, `Id_Kriteria`, `Nama`, `Bobot`, `Nilai`) VALUES
(4, 2, 27, '0 - 50', 'Sangat Rendah', 1),
(7, 2, 28, 'Bahasa', 'Cukup', 5),
(8, 2, 29, 'Juara Tingkat Nasional', '>3', 9),
(16, 2, 27, '51- 65', 'Cukup', 2),
(17, 2, 27, '66 - 75', 'Cukup', 3),
(18, 2, 27, '76 - 85', 'Tinggi', 4),
(19, 2, 27, '86 - 100', 'Sangat Tinggi', 5),
(20, 2, 28, 'Teknologi', 'Cukup', 4),
(21, 2, 28, 'Hukum', 'Cukup', 4),
(22, 2, 28, 'Agama', 'Cukup', 3),
(23, 2, 28, 'Pendidikan', 'Cukup', 3),
(24, 2, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(25, 2, 28, 'Ekonomi', 'Cukup', 3),
(27, 2, 28, 'Matematika', 'Cukup', 2),
(28, 2, 28, 'Sejarah', 'Cukup', 3),
(29, 2, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 3),
(30, 2, 28, 'Ilmu Sosial', 'Cukup', 2),
(31, 2, 28, 'Sains', 'Cukup', 3),
(32, 2, 29, 'Juara Tingkat Nasional', '1 - 3', 8),
(41, 2, 29, 'Juara Tingkat Provinsi', '>3', 7),
(42, 2, 29, 'Juara Tingkat Provinsi', '1 - 3', 6),
(43, 2, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(44, 2, 29, 'Juara Tingkat Kabupaten/Kota', '1 - 3', 4),
(46, 3, 27, '0 - 50', 'Cukup', 2),
(47, 3, 27, '51- 65', 'Cukup', 3),
(48, 3, 27, '66 - 75', 'Cukup', 4),
(49, 3, 27, '76 - 85', 'Cukup', 5),
(50, 3, 27, '86 - 100', 'Cukup', 4),
(51, 3, 28, 'Bahasa', 'Cukup', 4),
(52, 3, 28, 'Teknologi', 'Cukup', 4),
(53, 3, 28, 'Hukum', 'Cukup', 3),
(54, 3, 28, 'Agama', 'Cukup', 5),
(55, 3, 28, 'Pendidikan', 'Cukup', 2),
(56, 3, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(57, 3, 28, 'Ekonomi', 'Cukup', 4),
(58, 3, 28, 'Matematika', 'Cukup', 4),
(59, 3, 28, 'Sejarah', 'Cukup', 5),
(60, 3, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(61, 3, 28, 'Ilmu Sosial', 'Cukup', 2),
(62, 3, 28, 'Sains', 'Cukup', 4),
(63, 3, 29, 'Juara Tingkat Nasional', '>3', 8),
(64, 3, 29, 'Juara Tingkat Nasional', '1 - 3', 8),
(65, 3, 29, 'Juara Tingkat Provinsi', '>3', 7),
(66, 3, 29, 'Juara Tingkat Provinsi', '1 - 3', 6),
(67, 3, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(68, 3, 29, 'Juara Tingkat Kabupaten/Kota', '1 - 3', 4),
(69, 3, 29, 'Juara Tingkat Sekolah', '>3', 3),
(70, 3, 29, 'Juara Tingkat Sekolah', '1 - 3', 2),
(71, 3, 29, 'Tidak Ada', '-', 2),
(77, 23, 27, '0 - 50', 'Rendah', 2),
(78, 23, 27, '51- 65', 'Rendah', 1),
(79, 23, 27, '66 - 75', 'Cukup', 3),
(80, 23, 27, '76 - 85', 'Tinggi', 5),
(81, 23, 27, '86 - 100', 'Tinggi', 5),
(82, 23, 28, 'Bahasa', 'Cukup', 2),
(83, 23, 28, 'Teknologi', 'Cukup', 4),
(84, 23, 28, 'Hukum', 'Cukup', 3),
(85, 23, 28, 'Agama', 'Cukup', 5),
(86, 23, 28, 'Pendidikan', 'Cukup', 2),
(87, 23, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(88, 23, 28, 'Ekonomi', 'Cukup', 3),
(89, 23, 28, 'Matematika', 'Cukup', 2),
(90, 23, 28, 'Sejarah', 'Cukup', 2),
(91, 23, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(92, 23, 28, 'Ilmu Sosial', 'Cukup', 3),
(93, 23, 28, 'Sains', 'Cukup', 4),
(94, 23, 29, 'Juara Tingkat Nasional', '>3', 9),
(95, 23, 29, 'Juara Tingkat Nasional', '-', 9),
(96, 23, 29, 'Juara Tingkat Provinsi', '>3', 8),
(97, 23, 29, 'Juara Tingkat Provinsi', '-', 7),
(98, 23, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 7),
(99, 23, 29, 'Juara Tingkat Kabupaten/Kota', '-', 5),
(100, 23, 29, 'Juara Tingkat Sekolah', '>3', 4),
(101, 23, 29, 'Juara Tingkat Sekolah', '1 - 3', 3),
(102, 23, 29, 'Tidak Ada', '-', 3),
(116, 2, 29, 'Juara Tingkat Sekolah', '>3', 3),
(117, 2, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(118, 2, 29, 'Tidak Ada', '-', 1),
(129, 4, 27, '0 - 50', 'Cukup', 3),
(130, 4, 27, '51- 65', 'Cukup', 3),
(131, 4, 27, '66 - 75', 'Cukup', 3),
(132, 4, 27, '76 - 85', 'Tinggi', 3),
(133, 4, 27, '86 - 100', 'Tinggi', 4),
(134, 4, 28, 'Bahasa', 'Cukup', 2),
(135, 4, 28, 'Teknologi', 'Cukup', 5),
(136, 4, 28, 'Hukum', 'Cukup', 2),
(137, 4, 28, 'Agama', 'Cukup', 3),
(138, 4, 28, 'Pendidikan', 'Cukup', 4),
(139, 4, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(140, 4, 28, 'Ekonomi', 'Cukup', 2),
(141, 4, 28, 'Matematika', 'Cukup', 3),
(142, 4, 28, 'Sejarah', 'Cukup', 2),
(143, 4, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Tinggi', 5),
(144, 4, 28, 'Ilmu Sosial', 'Tinggi', 5),
(145, 4, 28, 'Sains', 'Cukup', 3),
(146, 4, 29, 'Juara Tingkat Nasional', '>3', 8),
(147, 4, 29, 'Juara Tingkat Nasional', '1-3', 8),
(148, 4, 29, 'Juara Tingkat Provinsi', '>3', 6),
(149, 4, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(150, 4, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(151, 4, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 3),
(152, 4, 29, 'Juara Tingkat Sekolah', '>3', 3),
(153, 4, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(154, 4, 29, 'Tidak Ada', '-', 3),
(160, 6, 27, '0 - 50', 'Rendah', 1),
(161, 6, 27, '51- 65', 'Rendah', 1),
(162, 6, 27, '66 - 75', 'Cukup', 3),
(163, 6, 27, '76 - 85', 'Tinggi', 5),
(164, 6, 27, '86 - 100', 'Tinggi', 4),
(165, 6, 28, 'Bahasa', 'Cukup', 3),
(166, 6, 28, 'Teknologi', 'Tinggi', 5),
(167, 6, 28, 'Hukum', 'Cukup', 2),
(168, 6, 28, 'Agama', 'Tinggi', 5),
(169, 6, 28, 'Pendidikan', 'Cukup', 3),
(170, 6, 28, 'Menajemen dan bisnis', 'Cukup', 4),
(171, 6, 28, 'Ekonomi', 'Cukup', 2),
(172, 6, 28, 'Matematika', 'Cukup', 4),
(173, 6, 28, 'Sejarah', 'Cukup', 3),
(174, 6, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 4),
(175, 6, 28, 'Ilmu Sosial', 'Tinggi', 5),
(176, 6, 28, 'Sains', 'Cukup', 2),
(177, 6, 29, 'Juara Tingkat Nasional', '>3', 9),
(178, 6, 29, 'Juara Tingkat Nasional', '1-3', 8),
(179, 6, 29, 'Juara Tingkat Provinsi', '>3', 7),
(180, 6, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(181, 6, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(182, 6, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(183, 6, 29, 'Juara Tingkat Sekolah', '>3', 3),
(184, 6, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(185, 6, 29, 'Tidak Ada', '-', 1),
(191, 7, 27, '0 - 50', 'Rendah', 1),
(192, 7, 27, '51- 65', 'Rendah', 1),
(193, 7, 27, '66 - 75', 'Cukup', 1),
(194, 7, 27, '76 - 85', 'Cukup', 1),
(195, 7, 27, '86 - 100', 'Cukup', 3),
(196, 7, 28, 'Bahasa', 'Cukup', 2),
(197, 7, 28, 'Teknologi', 'Cukup', 3),
(198, 7, 28, 'Hukum', 'Cukup', 4),
(199, 7, 28, 'Agama', 'Cukup', 3),
(200, 7, 28, 'Pendidikan', 'Cukup', 3),
(201, 7, 28, 'Menajemen dan bisnis', 'Cukup', 2),
(202, 7, 28, 'Ekonomi', 'Cukup', 2),
(203, 7, 28, 'Matematika', 'Cukup', 3),
(204, 7, 28, 'Sejarah', 'Cukup', 4),
(205, 7, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Tinggi', 5),
(206, 7, 28, 'Ilmu Sosial', 'Tinggi', 5),
(207, 7, 28, 'Sains', 'Cukup', 4),
(208, 7, 29, 'Juara Tingkat Nasional', '>3', 7),
(209, 7, 29, 'Juara Tingkat Nasional', '1-3', 7),
(210, 7, 29, 'Juara Tingkat Provinsi', '>3', 7),
(211, 7, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(212, 7, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 4),
(213, 7, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 2),
(214, 7, 29, 'Juara Tingkat Sekolah', '>3', 3),
(215, 7, 29, 'Juara Tingkat Sekolah', '1-3', 3),
(216, 7, 29, 'Tidak Ada', '-', 1),
(222, 8, 27, '0 - 50', 'Cukup', 3),
(223, 8, 27, '51- 65', 'Cukup', 5),
(224, 8, 27, '66 - 75', 'Cukup', 2),
(225, 8, 27, '76 - 85', 'Tinggi', 4),
(226, 8, 27, '86 - 100', 'Tinggi', 3),
(227, 8, 28, 'Bahasa', 'Cukup', 2),
(228, 8, 28, 'Teknologi', 'Cukup', 2),
(229, 8, 28, 'Hukum', 'Cukup', 3),
(230, 8, 28, 'Agama', 'Tinggi', 5),
(231, 8, 28, 'Pendidikan', 'Cukup', 2),
(232, 8, 28, 'Menajemen dan bisnis', 'Tinggi', 5),
(233, 8, 28, 'Ekonomi', 'Cukup', 3),
(234, 8, 28, 'Matematika', 'Cukup', 2),
(235, 8, 28, 'Sejarah', 'Cukup', 4),
(236, 8, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 4),
(237, 8, 28, 'Ilmu Sosial', 'Cukup', 3),
(238, 8, 28, 'Sains', 'Cukup', 2),
(239, 8, 29, 'Juara Tingkat Nasional', '>3', 7),
(240, 8, 29, 'Juara Tingkat Nasional', '1-3', 6),
(241, 8, 29, 'Juara Tingkat Provinsi', '>3', 5),
(242, 8, 29, 'Juara Tingkat Provinsi', '1-3', 4),
(243, 8, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 4),
(244, 8, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 3),
(245, 8, 29, 'Juara Tingkat Sekolah', '>3', 2),
(246, 8, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(247, 8, 29, 'Tidak Ada', '-', 2),
(253, 9, 27, '0 - 50', 'Rendah', 1),
(254, 9, 27, '51- 65', 'Cukup', 3),
(255, 9, 27, '66 - 75', 'Cukup', 3),
(256, 9, 27, '76 - 85', 'Cukup', 3),
(257, 9, 27, '86 - 100', 'Tinggi', 5),
(258, 9, 28, 'Bahasa', 'Cukup', 4),
(259, 9, 28, 'Teknologi', 'Cukup', 2),
(260, 9, 28, 'Hukum', 'Cukup', 2),
(261, 9, 28, 'Agama', 'Cukup', 4),
(262, 9, 28, 'Pendidikan', 'Cukup', 4),
(263, 9, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(264, 9, 28, 'Ekonomi', 'Cukup', 2),
(265, 9, 28, 'Matematika', 'Cukup', 4),
(266, 9, 28, 'Matematika', 'Cukup', 4),
(267, 9, 28, 'Sejarah', 'Cukup', 3),
(268, 9, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Tinggi', 5),
(269, 9, 28, 'Ilmu Sosial', 'Tinggi', 5),
(270, 9, 28, 'Sains', 'Cukup', 3),
(271, 9, 29, 'Juara Tingkat Nasional', '>3', 6),
(272, 9, 29, 'Juara Tingkat Nasional', '1-3', 6),
(273, 9, 29, 'Juara Tingkat Provinsi', '>3', 6),
(274, 9, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(275, 9, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 6),
(276, 9, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(277, 9, 29, 'Juara Tingkat Sekolah', '>3', 4),
(278, 9, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(279, 9, 29, 'Tidak Ada', '-', 2),
(285, 10, 27, '0 - 50', 'Rendah', 2),
(286, 10, 27, '51- 65', 'Cukup', 3),
(287, 10, 27, '66 - 75', 'Cukup', 4),
(288, 10, 27, '76 - 85', 'Cukup', 3),
(289, 10, 27, '86 - 100', 'Cukup', 3),
(290, 10, 28, 'Bahasa', 'Cukup', 2),
(291, 10, 28, 'Teknologi', 'Cukup', 2),
(292, 10, 28, 'Hukum', 'Tinggi', 5),
(293, 10, 28, 'Agama', 'Cukup', 2),
(294, 10, 28, 'Pendidikan', 'Cukup', 4),
(295, 10, 28, 'Menajemen dan bisnis', 'Cukup', 4),
(296, 10, 28, 'Ekonomi', 'Cukup', 2),
(297, 10, 28, 'Matematika', 'Cukup', 3),
(298, 10, 28, 'Sejarah', 'Cukup', 4),
(299, 10, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 3),
(300, 10, 28, 'Ilmu Sosial', 'Cukup', 3),
(301, 10, 28, 'Sains', 'Cukup', 4),
(302, 10, 29, 'Juara Tingkat Nasional', '>3', 8),
(303, 10, 29, 'Juara Tingkat Nasional', '1-3', 8),
(304, 10, 29, 'Juara Tingkat Provinsi', '>3', 7),
(305, 10, 29, 'Juara Tingkat Provinsi', '1-3', 5),
(306, 10, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(307, 10, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(308, 10, 29, 'Juara Tingkat Sekolah', '>3', 4),
(309, 10, 29, 'Juara Tingkat Sekolah', '1-3', 5),
(310, 10, 29, 'Tidak Ada', '-', 4),
(316, 35, 27, '0 - 50', 'Rendah', 2),
(317, 35, 27, '51- 65', 'Cukup', 3),
(318, 35, 27, '66 - 75', 'Cukup', 2),
(319, 35, 27, '76 - 85', 'Tinggi', 4),
(320, 35, 27, '86 - 100', 'Tinggi', 4),
(321, 35, 28, 'Bahasa', 'Cukup', 3),
(322, 35, 28, 'Teknologi', 'Cukup', 4),
(323, 35, 28, 'Hukum', 'Tinggi', 5),
(324, 35, 28, 'Agama', 'Cukup', 3),
(325, 35, 28, 'Pendidikan', 'Cukup', 3),
(326, 35, 28, 'Menajemen dan bisnis', 'Cukup', 2),
(327, 35, 28, 'Ekonomi', 'Cukup', 4),
(328, 35, 28, 'Matematika', 'Cukup', 2),
(329, 35, 28, 'Sejarah', 'Cukup', 3),
(330, 35, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 3),
(331, 35, 28, 'Ilmu Sosial', 'Cukup', 3),
(332, 35, 28, 'Sains', 'Cukup', 2),
(333, 35, 29, 'Juara Tingkat Nasional', '>3', 7),
(334, 35, 29, 'Juara Tingkat Nasional', '1-3', 6),
(335, 35, 29, 'Juara Tingkat Provinsi', '>3', 6),
(336, 35, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(337, 35, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(338, 35, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 3),
(339, 35, 29, 'Juara Tingkat Sekolah', '>3', 3),
(340, 35, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(341, 35, 29, 'Tidak Ada', '-', 1),
(347, 11, 27, '0 - 50', 'Rendah', 2),
(348, 11, 27, '51- 65', 'Rendah', 2),
(349, 11, 27, '66 - 75', 'Cukup', 2),
(350, 11, 27, '76 - 85', 'Tinggi', 4),
(351, 11, 27, '86 - 100', 'Tinggi', 3),
(352, 11, 28, 'Bahasa', 'Cukup', 2),
(353, 11, 28, 'Teknologi', 'Cukup', 3),
(354, 11, 28, 'Hukum', 'Tinggi', 5),
(355, 11, 28, 'Agama', 'Cukup', 3),
(356, 11, 28, 'Pendidikan', 'Cukup', 4),
(357, 11, 28, 'Menajemen dan bisnis', 'Cukup', 2),
(358, 11, 28, 'Ekonomi', 'Cukup', 2),
(359, 11, 28, 'Matematika', 'Cukup', 2),
(360, 11, 28, 'Sejarah', 'Cukup', 3),
(361, 11, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(362, 11, 28, 'Ilmu Sosial', 'Cukup', 3),
(363, 11, 28, 'Sains', 'Cukup', 4),
(364, 11, 29, 'Juara Tingkat Nasional', '>3', 6),
(365, 11, 29, 'Juara Tingkat Nasional', '1-3', 5),
(366, 11, 29, 'Juara Tingkat Provinsi', '>3', 4),
(367, 11, 29, 'Juara Tingkat Provinsi', '1-3', 4),
(368, 11, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 4),
(369, 11, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 3),
(370, 11, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 3),
(371, 11, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(372, 11, 29, 'Tidak Ada', '-', 2),
(378, 12, 27, '0 - 50', 'Rendah', 3),
(379, 12, 27, '51- 65', 'Rendah', 2),
(380, 12, 27, '66 - 75', 'Rendah', 1),
(381, 12, 27, '76 - 85', 'Cukup', 3),
(382, 12, 27, '86 - 100', 'Cukup', 3),
(383, 12, 28, 'Bahasa', 'Cukup', 3),
(384, 12, 28, 'Teknologi', 'Cukup', 4),
(385, 12, 28, 'Hukum', 'Cukup', 3),
(386, 12, 28, 'Agama', 'Tinggi', 5),
(387, 12, 28, 'Pendidikan', 'Cukup', 2),
(388, 12, 28, 'Menajemen dan bisnis', 'Cukup', 4),
(389, 12, 28, 'Ekonomi', 'Cukup', 3),
(390, 12, 28, 'Matematika', 'Cukup', 2),
(391, 12, 28, 'Sejarah', 'Cukup', 2),
(392, 12, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(393, 12, 28, 'Ilmu Sosial', 'Cukup', 3),
(394, 12, 28, 'Sains', 'Cukup', 3),
(395, 12, 29, 'Juara Tingkat Nasional', '>3', 9),
(396, 12, 29, 'Juara Tingkat Nasional', '1-3', 8),
(397, 12, 29, 'Juara Tingkat Provinsi', '>3', 7),
(398, 12, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(399, 12, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(400, 12, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(401, 12, 29, 'Juara Tingkat Sekolah', '>3', 3),
(402, 12, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(403, 12, 29, 'Tidak Ada', '-', 1),
(409, 13, 27, '0 - 50', 'Rendah', 2),
(410, 13, 27, '51- 65', 'Cukup', 3),
(411, 13, 27, '66 - 75', 'Cukup', 3),
(412, 13, 27, '76 - 85', 'Tinggi', 2),
(413, 13, 27, '86 - 100', 'Tinggi', 4),
(414, 13, 28, 'Bahasa', 'Cukup', 3),
(415, 13, 28, 'Teknologi', 'Cukup', 2),
(416, 13, 28, 'Hukum', 'Cukup', 3),
(417, 13, 28, 'Agama', 'Tinggi', 5),
(418, 13, 28, 'Pendidikan', 'Tinggi', 5),
(419, 13, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(420, 13, 28, 'Ekonomi', 'Cukup', 3),
(421, 13, 28, 'Matematika', 'Cukup', 2),
(422, 13, 28, 'Sejarah', 'Cukup', 2),
(423, 13, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(424, 13, 28, 'Ilmu Sosial', 'Cukup', 3),
(425, 13, 28, 'Sains', 'Cukup', 4),
(426, 13, 29, 'Juara Tingkat Nasional', '>3', 8),
(427, 13, 29, 'Juara Tingkat Nasional', '1-3', 7),
(428, 13, 29, 'Juara Tingkat Provinsi', '>3', 6),
(429, 13, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(430, 13, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 6),
(431, 13, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 3),
(432, 13, 29, 'Juara Tingkat Sekolah', '>3', 3),
(433, 13, 29, 'Juara Tingkat Sekolah', '1-3', 3),
(434, 13, 29, 'Tidak Ada', '-', 3),
(440, 14, 27, '0 - 50', 'Rendah', 2),
(441, 14, 27, '51- 65', 'Rendah', 2),
(442, 14, 27, '66 - 75', 'Cukup', 3),
(443, 14, 27, '76 - 85', 'Cukup', 3),
(444, 14, 27, '86 - 100', 'Tinggi', 4),
(445, 14, 28, 'Bahasa', 'Tinggi', 5),
(446, 14, 28, 'Teknologi', 'Cukup', 3),
(447, 14, 28, 'Hukum', 'Cukup', 2),
(448, 14, 28, 'Agama', 'Cukup', 4),
(449, 14, 28, 'Pendidikan', 'Tinggi', 5),
(450, 14, 28, 'Menajemen dan bisnis', 'Cukup', 2),
(451, 14, 28, 'Ekonomi', 'Cukup', 3),
(452, 14, 28, 'Matematika', 'Cukup', 2),
(453, 14, 28, 'Sejarah', 'Cukup', 2),
(454, 14, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 3),
(455, 14, 28, 'Ilmu Sosial', 'Cukup', 3),
(456, 14, 28, 'Sains', 'Cukup', 2),
(457, 14, 29, 'Juara Tingkat Nasional', '>3', 8),
(458, 14, 29, 'Juara Tingkat Nasional', '1-3', 7),
(459, 14, 29, 'Juara Tingkat Provinsi', '>3', 7),
(460, 14, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(461, 14, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 6),
(462, 14, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 5),
(463, 14, 29, 'Juara Tingkat Sekolah', '>3', 5),
(464, 14, 29, 'Juara Tingkat Sekolah', '1-3', 4),
(465, 14, 29, 'Tidak Ada', '-', 4),
(471, 15, 27, '0 - 50', 'Rendah', 4),
(472, 15, 27, '51- 65', 'Rendah', 2),
(473, 15, 27, '66 - 75', 'Tinggi', 5),
(474, 15, 27, '76 - 85', 'Tinggi', 5),
(475, 15, 27, '86 - 100', 'Tinggi', 5),
(476, 15, 28, 'Bahasa', 'Cukup', 3),
(477, 15, 28, 'Teknologi', 'Cukup', 4),
(478, 15, 28, 'Hukum', 'Cukup', 2),
(479, 15, 28, 'Agama', 'Cukup', 2),
(480, 15, 28, 'Pendidikan', 'Tinggi', 5),
(481, 15, 28, 'Menajemen dan bisnis', 'Tinggi', 5),
(482, 15, 28, 'Ekonomi', 'Cukup', 2),
(483, 15, 28, 'Matematika', 'Cukup', 3),
(484, 15, 28, 'Sejarah', 'Cukup', 4),
(485, 15, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 4),
(486, 15, 28, 'Ilmu Sosial', 'Cukup', 3),
(487, 15, 28, 'Sains', 'Cukup', 4),
(488, 15, 29, 'Juara Tingkat Nasional', '>3', 8),
(489, 15, 29, 'Juara Tingkat Nasional', '1-3', 9),
(490, 15, 29, 'Juara Tingkat Provinsi', '>3', 7),
(491, 15, 29, 'Juara Tingkat Provinsi', '1-3', 7),
(492, 15, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 6),
(493, 15, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 5),
(494, 15, 29, 'Juara Tingkat Sekolah', '>3', 4),
(495, 15, 29, 'Juara Tingkat Sekolah', '1-3', 5),
(496, 15, 29, 'Tidak Ada', '-', 4),
(503, 16, 27, '0 - 50', 'Rendah', 3),
(504, 16, 27, '51- 65', 'Cukup', 4),
(505, 16, 27, '66 - 75', 'Cukup', 2),
(506, 16, 27, '76 - 85', 'Tinggi', 3),
(507, 16, 27, '86 - 100', 'Tinggi', 5),
(508, 16, 28, 'Bahasa', 'Cukup', 3),
(509, 16, 28, 'Teknologi', 'Cukup', 3),
(510, 16, 28, 'Hukum', 'Cukup', 4),
(511, 16, 28, 'Agama', 'Cukup', 2),
(512, 16, 28, 'Pendidikan', 'Tinggi', 5),
(513, 16, 28, 'Menajemen dan bisnis', 'Cukup', 2),
(514, 16, 28, 'Ekonomi', 'Cukup', 4),
(515, 16, 28, 'Matematika', 'Cukup', 2),
(516, 16, 28, 'Sejarah', 'Cukup', 3),
(517, 16, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(518, 16, 28, 'Ilmu Sosial', 'Cukup', 3),
(519, 16, 28, 'Sains', 'Cukup', 3),
(520, 16, 29, 'Juara Tingkat Nasional', '>3', 9),
(521, 16, 29, 'Juara Tingkat Nasional', '1-3', 7),
(522, 16, 29, 'Juara Tingkat Provinsi', '>3', 6),
(523, 16, 29, 'Juara Tingkat Provinsi', '-', 6),
(524, 16, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 6),
(525, 16, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(526, 16, 29, 'Juara Tingkat Sekolah', '>3', 3),
(527, 16, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(528, 16, 29, 'Tidak Ada', '-', 5),
(534, 17, 27, '0 - 50', 'Cukup', 4),
(535, 17, 27, '51- 65', 'Cukup', 4),
(536, 17, 27, '66 - 75', 'Cukup', 3),
(537, 17, 27, '76 - 85', 'Cukup', 3),
(538, 17, 27, '86 - 100', 'Cukup', 3),
(539, 17, 28, 'Bahasa', 'Tinggi', 5),
(540, 17, 28, 'Teknologi', 'Cukup', 3),
(541, 17, 28, 'Hukum', 'Cukup', 4),
(542, 17, 28, 'Agama', 'Cukup', 2),
(543, 17, 28, 'Pendidikan', 'Cukup', 3),
(544, 17, 28, 'Menajemen dan bisnis', 'Cukup', 4),
(545, 17, 28, 'Ekonomi', 'Cukup', 2),
(546, 17, 28, 'Matematika', 'Cukup', 2),
(547, 17, 28, 'Sejarah', 'Cukup', 2),
(548, 17, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 4),
(549, 17, 28, 'Ilmu Sosial', 'Cukup', 3),
(550, 17, 28, 'Sains', 'Cukup', 3),
(551, 17, 29, 'Juara Tingkat Nasional', '>3', 6),
(552, 17, 29, 'Juara Tingkat Nasional', '1-3', 5),
(553, 17, 29, 'Juara Tingkat Provinsi', '>3', 6),
(554, 17, 29, 'Juara Tingkat Provinsi', '1-3', 4),
(555, 17, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 4),
(556, 17, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 5),
(557, 17, 29, 'Juara Tingkat Sekolah', '>3', 5),
(558, 17, 29, 'Juara Tingkat Sekolah', '1-3', 4),
(559, 17, 29, 'Tidak Ada', '-', 4),
(565, 18, 27, '0 - 50', 'Rendah', 3),
(566, 18, 27, '51- 65', 'Cukup', 4),
(567, 18, 27, '66 - 75', 'Cukup', 3),
(568, 18, 27, '76 - 85', 'Cukup', 3),
(569, 18, 27, '86 - 100', 'Tinggi', 4),
(570, 18, 28, 'Bahasa', 'Cukup', 3),
(571, 18, 28, 'Teknologi', 'Cukup', 2),
(572, 18, 28, 'Hukum', 'Cukup', 4),
(573, 18, 28, 'Agama', 'Cukup', 4),
(574, 18, 28, 'Pendidikan', 'Cukup', 3),
(575, 18, 28, 'Menajemen dan bisnis', 'Cukup', 2),
(576, 18, 28, 'Ekonomi', 'Cukup', 2),
(577, 18, 28, 'Matematika', 'Cukup', 4),
(578, 18, 28, 'Sejarah', 'Cukup', 4),
(579, 18, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(580, 18, 28, 'Ilmu Sosial', 'Cukup', 3),
(581, 18, 28, 'Sains', 'Tinggi', 5),
(582, 18, 29, 'Juara Tingkat Nasional', '>3', 8),
(583, 18, 29, 'Juara Tingkat Nasional', '1-3', 6),
(584, 18, 29, 'Juara Tingkat Provinsi', '>3', 4),
(585, 18, 29, 'Juara Tingkat Provinsi', '1-3', 3),
(586, 18, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(587, 18, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 5),
(588, 18, 29, 'Juara Tingkat Sekolah', '>3', 4),
(589, 18, 29, 'Juara Tingkat Sekolah', '1-3', 4),
(590, 18, 29, 'Tidak Ada', '-', 3),
(596, 19, 27, '0 - 50', 'Rendah', 1),
(597, 19, 27, '51- 65', 'Rendah', 1),
(598, 19, 27, '66 - 75', 'Cukup', 3),
(599, 19, 27, '76 - 85', 'Cukup', 3),
(600, 19, 27, '86 - 100', 'Cukup', 3),
(601, 19, 28, 'Bahasa', 'Cukup', 3),
(602, 19, 28, 'Teknologi', 'Cukup', 2),
(603, 19, 28, 'Hukum', 'Cukup', 4),
(604, 19, 28, 'Agama', 'Cukup', 4),
(605, 19, 28, 'Pendidikan', 'Cukup', 2),
(606, 19, 28, 'Menajemen dan bisnis', 'Cukup', 2),
(607, 19, 28, 'Ekonomi', 'Cukup', 3),
(608, 19, 28, 'Matematika', 'Cukup', 3),
(609, 19, 28, 'Sejarah', 'Cukup', 2),
(610, 19, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Tinggi', 5),
(611, 19, 28, 'Ilmu Sosial', 'Tinggi', 5),
(612, 19, 28, 'Sains', 'Cukup', 3),
(613, 19, 29, 'Juara Tingkat Nasional', '>3', 8),
(614, 19, 29, 'Juara Tingkat Nasional', '1-3', 8),
(615, 19, 29, 'Juara Tingkat Provinsi', '>3', 6),
(616, 19, 29, 'Juara Tingkat Provinsi', '1-3', 5),
(617, 19, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 6),
(618, 19, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 6),
(619, 19, 29, 'Juara Tingkat Sekolah', '>3', 4),
(620, 19, 29, 'Juara Tingkat Sekolah', '1-3', 5),
(621, 19, 29, 'Tidak Ada', '-', 2),
(627, 20, 27, '0 - 50', 'Rendah', 4),
(628, 20, 27, '51- 65', 'Cukup', 3),
(629, 20, 27, '66 - 75', 'Cukup', 1),
(630, 20, 27, '76 - 85', 'Cukup', 3),
(631, 20, 27, '86 - 100', 'Tinggi', 4),
(632, 20, 28, 'Bahasa', 'Cukup', 4),
(633, 20, 28, 'Teknologi', 'Cukup', 3),
(634, 20, 28, 'Hukum', 'Cukup', 2),
(635, 20, 28, 'Agama', 'Cukup', 2),
(636, 20, 28, 'Pendidikan', 'Cukup', 4),
(637, 20, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(638, 20, 28, 'Ekonomi', 'Cukup', 3),
(639, 20, 28, 'Matematika', 'Tinggi', 5),
(640, 20, 28, 'Sejarah', 'Cukup', 2),
(641, 20, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(642, 20, 28, 'Ilmu Sosial', 'Cukup', 4),
(643, 20, 28, 'Sains', 'Cukup', 2),
(644, 20, 29, 'Juara Tingkat Nasional', '>3', 9),
(645, 20, 29, 'Juara Tingkat Nasional', '1-3', 8),
(646, 20, 29, 'Juara Tingkat Provinsi', '>3', 7),
(647, 20, 29, 'Juara Tingkat Provinsi', '1-3', 7),
(648, 20, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 6),
(649, 20, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 6),
(650, 20, 29, 'Juara Tingkat Sekolah', '>3', 4),
(651, 20, 29, 'Juara Tingkat Sekolah', '-', 3),
(652, 20, 29, 'Tidak Ada', '-', 2),
(658, 21, 27, '0 - 50', 'Rendah', 3),
(659, 21, 27, '51- 65', 'Rendah', 3),
(660, 21, 27, '66 - 75', 'Cukup', 3),
(661, 21, 27, '76 - 85', 'Tinggi', 2),
(662, 21, 27, '86 - 100', 'Tinggi', 2),
(663, 21, 28, 'Bahasa', 'Cukup', 2),
(664, 21, 28, 'Teknologi', 'Cukup', 2),
(665, 21, 28, 'Hukum', 'Cukup', 3),
(666, 21, 28, 'Agama', 'Cukup', 2),
(667, 21, 28, 'Menajemen dan bisnis', 'Tinggi', 5),
(668, 21, 28, 'Ekonomi', 'Cukup', 2),
(669, 21, 28, 'Matematika', 'Cukup', 3),
(670, 21, 28, 'Sejarah', 'Cukup', 2),
(671, 21, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Tinggi', 5),
(672, 21, 28, 'Ilmu Sosial', 'Cukup', 3),
(673, 21, 28, 'Sains', 'Cukup', 4),
(674, 21, 29, 'Juara Tingkat Nasional', '>3', 9),
(675, 21, 29, 'Juara Tingkat Nasional', '1-3', 7),
(676, 21, 29, 'Juara Tingkat Provinsi', '>3', 8),
(677, 21, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(678, 21, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 4),
(679, 21, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 3),
(680, 21, 29, 'Juara Tingkat Sekolah', '>3', 5),
(681, 21, 29, 'Juara Tingkat Sekolah', '1-3', 5),
(682, 21, 29, 'Tidak Ada', '-', 4),
(688, 22, 27, '0 - 50', 'Cukup', 3),
(689, 22, 27, '51- 65', 'Tinggi', 4),
(690, 22, 27, '66 - 75', 'Tinggi', 4),
(691, 22, 27, '76 - 85', 'Tinggi', 4),
(692, 22, 27, '86 - 100', 'Tinggi', 4),
(693, 22, 28, 'Bahasa', 'Cukup', 4),
(694, 22, 28, 'Teknologi', 'Cukup', 2),
(695, 22, 28, 'Hukum', 'Cukup', 2),
(696, 22, 28, 'Agama', 'Tinggi', 5),
(697, 22, 28, 'Pendidikan', 'Cukup', 3),
(698, 22, 28, 'Menajemen dan bisnis', 'Cukup', 2),
(699, 22, 28, 'Ekonomi', 'Cukup', 3),
(700, 22, 28, 'Matematika', 'Cukup', 3),
(701, 22, 28, 'Sejarah', 'Cukup', 2),
(702, 22, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(703, 22, 28, 'Ilmu Sosial', 'Cukup', 3),
(704, 22, 28, 'Sains', 'Cukup', 2),
(705, 22, 29, 'Juara Tingkat Nasional', '>3', 7),
(706, 22, 29, 'Juara Tingkat Nasional', '1-3', 8),
(707, 22, 29, 'Juara Tingkat Provinsi', '>3', 5),
(708, 22, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(709, 22, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 7),
(710, 22, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(711, 22, 29, 'Juara Tingkat Sekolah', '>3', 3),
(712, 22, 29, 'Juara Tingkat Sekolah', '1-3', 3),
(713, 22, 29, 'Tidak Ada', '-', 2),
(724, 24, 27, '0 - 50', 'Rendah', 2),
(725, 24, 27, '51- 65', 'Cukup', 4),
(726, 24, 27, '66 - 75', 'Cukup', 3),
(727, 24, 27, '76 - 85', 'Cukup', 2),
(728, 24, 27, '86 - 100', 'Cukup', 3),
(729, 24, 28, 'Bahasa', 'Cukup', 3),
(730, 24, 28, 'Teknologi', 'Cukup', 4),
(731, 24, 28, 'Hukum', 'Cukup', 2),
(732, 24, 28, 'Agama', 'Tinggi', 5),
(733, 24, 28, 'Pendidikan', 'Cukup', 2),
(734, 24, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(735, 24, 28, 'Ekonomi', 'Cukup', 3),
(736, 24, 28, 'Matematika', 'Cukup', 4),
(737, 24, 28, 'Sejarah', 'Cukup', 2),
(738, 24, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(739, 24, 28, 'Ilmu Sosial', 'Cukup', 3),
(740, 24, 28, 'Sains', 'Cukup', 4),
(741, 24, 29, 'Juara Tingkat Nasional', '>3', 6),
(742, 24, 29, 'Juara Tingkat Nasional', '1-3', 7),
(743, 24, 29, 'Juara Tingkat Provinsi', '>3', 7),
(744, 24, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(745, 24, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 7),
(746, 24, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 7),
(747, 24, 29, 'Juara Tingkat Sekolah', '>3', 5),
(748, 24, 29, 'Juara Tingkat Sekolah', '1-3', 3),
(749, 24, 29, 'Tidak Ada', '-', 2),
(755, 25, 27, '0 - 50', 'Rendah', 2),
(756, 25, 27, '51- 65', 'Cukup', 3),
(757, 25, 27, '66 - 75', 'Cukup', 2),
(758, 25, 27, '76 - 85', 'Cukup', 3),
(759, 25, 27, '86 - 100', 'Tinggi', 4),
(760, 25, 28, 'Bahasa', 'Cukup', 2),
(761, 25, 28, 'Teknologi', 'Cukup', 3),
(762, 25, 28, 'Hukum', 'Cukup', 2),
(763, 25, 28, 'Agama', 'Cukup', 2),
(764, 25, 28, 'Pendidikan', 'Cukup', 2),
(765, 25, 28, 'Menajemen dan bisnis', 'Cukup', 4),
(766, 25, 28, 'Ekonomi', 'Cukup', 4),
(767, 25, 28, 'Matematika', 'Cukup', 2),
(768, 25, 28, 'Sejarah', 'Cukup', 4),
(769, 25, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Tinggi', 5),
(770, 25, 28, 'Ilmu Sosial', 'Cukup', 3),
(771, 25, 28, 'Sains', 'Cukup', 2),
(772, 25, 29, 'Juara Tingkat Nasional', '>3', 9),
(773, 25, 29, 'Juara Tingkat Nasional', '1-3', 9),
(774, 25, 29, 'Juara Tingkat Provinsi', '>3', 7),
(775, 25, 29, 'Juara Tingkat Provinsi', '1-3', 7),
(776, 25, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(777, 25, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(778, 25, 29, 'Juara Tingkat Sekolah', '>3', 3),
(779, 25, 29, 'Juara Tingkat Sekolah', '1-3', 3),
(780, 25, 29, 'Tidak Ada', '>3', 1),
(786, 26, 27, '0 - 50', 'Cukup', 3),
(787, 26, 27, '51- 65', 'Cukup', 3),
(788, 26, 27, '66 - 75', 'Cukup', 3),
(789, 26, 27, '76 - 85', 'Cukup', 2),
(790, 26, 27, '86 - 100', 'Cukup', 2),
(791, 26, 28, 'Bahasa', 'Cukup', 2),
(792, 26, 28, 'Teknologi', 'Cukup', 3),
(793, 26, 28, 'Hukum', 'Cukup', 4),
(794, 26, 28, 'Agama', 'Tinggi', 5),
(795, 26, 28, 'Pendidikan', 'Cukup', 2),
(796, 26, 28, 'Menajemen dan bisnis', 'Cukup', 4),
(797, 26, 28, 'Ekonomi', 'Cukup', 3),
(798, 26, 28, 'Matematika', 'Cukup', 2),
(799, 26, 28, 'Sejarah', 'Cukup', 3),
(800, 26, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 4),
(801, 26, 28, 'Ilmu Sosial', 'Cukup', 4),
(802, 26, 28, 'Sains', 'Cukup', 4),
(803, 26, 29, 'Juara Tingkat Nasional', '>3', 8),
(804, 26, 29, 'Juara Tingkat Nasional', '1-3', 8),
(805, 26, 29, 'Juara Tingkat Provinsi', '>3', 7),
(806, 26, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(807, 26, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(808, 26, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 5),
(809, 26, 29, 'Juara Tingkat Sekolah', '>3', 3),
(810, 26, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(811, 26, 29, 'Tidak Ada', '-', 1),
(817, 27, 27, '0 - 50', 'Rendah', 3),
(818, 27, 27, '51- 65', 'Rendah', 1),
(819, 27, 27, '66 - 75', 'Cukup', 2),
(820, 27, 27, '76 - 85', 'Cukup', 2),
(821, 27, 27, '86 - 100', 'Cukup', 3),
(822, 27, 28, 'Bahasa', 'Cukup', 3),
(823, 27, 28, 'Teknologi', 'Cukup', 2),
(824, 27, 28, 'Hukum', 'Cukup', 4),
(825, 27, 28, 'Agama', 'Cukup', 2),
(826, 27, 28, 'Pendidikan', 'Cukup', 4),
(827, 27, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(828, 27, 28, 'Ekonomi', 'Cukup', 2),
(829, 27, 28, 'Matematika', 'Cukup', 4),
(830, 27, 28, 'Sejarah', 'Cukup', 3),
(831, 27, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Tinggi', 5),
(832, 27, 28, 'Ilmu Sosial', 'Cukup', 3),
(833, 27, 28, 'Sains', 'Cukup', 2),
(834, 27, 29, 'Juara Tingkat Nasional', '>3', 9),
(835, 27, 29, 'Juara Tingkat Nasional', '1-3', 8),
(836, 27, 29, 'Juara Tingkat Provinsi', '>3', 7),
(837, 27, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(838, 27, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(839, 27, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(840, 27, 29, 'Juara Tingkat Sekolah', '>3', 3),
(841, 27, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(842, 27, 29, 'Tidak Ada', '-', 1),
(848, 28, 27, '0 - 50', 'Cukup', 4),
(849, 28, 27, '51- 65', 'Cukup', 3),
(850, 28, 27, '66 - 75', 'Tinggi', 5),
(851, 28, 27, '76 - 85', 'Tinggi', 4),
(852, 28, 27, '86 - 100', 'Tinggi', 3),
(853, 28, 28, 'Bahasa', 'Cukup', 2),
(854, 28, 28, 'Teknologi', 'Cukup', 3),
(855, 28, 28, 'Hukum', 'Cukup', 2),
(856, 28, 28, 'Agama', 'Cukup', 4),
(857, 28, 28, 'Pendidikan', 'Cukup', 4),
(858, 28, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(859, 28, 28, 'Ekonomi', 'Tinggi', 5),
(860, 28, 28, 'Matematika', 'Cukup', 4),
(861, 28, 28, 'Sejarah', 'Cukup', 3),
(862, 28, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(863, 28, 28, 'Ilmu Sosial', 'Cukup', 3),
(864, 28, 28, 'Sains', 'Cukup', 4),
(865, 28, 29, 'Juara Tingkat Nasional', '>3', 8),
(866, 28, 29, 'Juara Tingkat Nasional', '1-3', 8),
(867, 28, 29, 'Juara Tingkat Provinsi', '>3', 7),
(868, 28, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(869, 28, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(870, 28, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(871, 28, 29, 'Juara Tingkat Sekolah', '>3', 3),
(872, 28, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(873, 28, 29, 'Tidak Ada', '-', 2),
(879, 29, 27, '0 - 50', 'Rendah', 2),
(880, 29, 27, '51- 65', 'Rendah', 4),
(881, 29, 27, '66 - 75', 'Cukup', 3),
(882, 29, 27, '76 - 85', 'Cukup', 2),
(883, 29, 27, '86 - 100', 'Tinggi', 4),
(884, 29, 28, 'Bahasa', 'Cukup', 3),
(885, 29, 28, 'Teknologi', 'Cukup', 3),
(886, 29, 28, 'Hukum', 'Cukup', 3),
(887, 29, 28, 'Agama', 'Cukup', 3),
(888, 29, 28, 'Pendidikan', 'Cukup', 4),
(889, 29, 28, 'Menajemen dan bisnis', 'Tinggi', 5),
(890, 29, 28, 'Ekonomi', 'Cukup', 4),
(891, 29, 28, 'Matematika', 'Cukup', 3),
(892, 29, 28, 'Sejarah', 'Cukup', 4),
(893, 29, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 2),
(894, 29, 28, 'Ilmu Sosial', 'Cukup', 3),
(895, 29, 28, 'Sains', 'Cukup', 4),
(896, 29, 29, 'Juara Tingkat Nasional', '>3', 9),
(897, 29, 29, 'Juara Tingkat Nasional', '1-3', 8),
(898, 29, 29, 'Juara Tingkat Provinsi', '>3', 7),
(899, 29, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(900, 29, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(901, 29, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(902, 29, 29, 'Juara Tingkat Sekolah', '>3', 4),
(903, 29, 29, 'Juara Tingkat Sekolah', '1-3', 4),
(904, 29, 29, 'Tidak Ada', '-', 1),
(910, 30, 27, '0 - 50', 'Cukup', 4),
(911, 30, 27, '51- 65', 'Rendah', 2),
(912, 30, 27, '66 - 75', 'Tinggi', 4),
(913, 30, 27, '76 - 85', 'Tinggi', 5),
(914, 30, 27, '86 - 100', 'Tinggi', 5),
(915, 30, 28, 'Bahasa', 'Cukup', 2),
(916, 30, 28, 'Teknologi', 'Cukup', 3),
(917, 30, 28, 'Hukum', 'Cukup', 4),
(918, 30, 28, 'Agama', 'Cukup', 3),
(919, 30, 28, 'Pendidikan', 'Cukup', 4),
(920, 30, 28, 'Menajemen dan bisnis', 'Cukup', 4),
(921, 30, 28, 'Ekonomi', 'Tinggi', 5),
(922, 30, 28, 'Matematika', 'Cukup', 2),
(923, 30, 28, 'Sejarah', 'Cukup', 2),
(924, 30, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 4),
(925, 30, 28, 'Ilmu Sosial', 'Cukup', 3),
(926, 30, 28, 'Sains', 'Cukup', 3),
(927, 30, 29, 'Juara Tingkat Nasional', '>3', 9),
(928, 30, 29, 'Juara Tingkat Nasional', '1-3', 8),
(929, 30, 29, 'Juara Tingkat Provinsi', '>3', 7),
(930, 30, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(931, 30, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(932, 30, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(933, 30, 29, 'Juara Tingkat Sekolah', '>3', 3),
(934, 30, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(935, 30, 29, 'Tidak Ada', '-', 2),
(941, 31, 27, '0 - 50', 'Rendah', 2),
(942, 31, 27, '51- 65', 'Rendah', 2),
(943, 31, 27, '66 - 75', 'Tinggi', 4),
(944, 31, 27, '76 - 85', 'Tinggi', 5),
(945, 31, 27, '86 - 100', 'Tinggi', 4),
(946, 31, 28, 'Bahasa', 'Cukup', 3),
(947, 31, 28, 'Teknologi', 'Cukup', 4),
(948, 31, 28, 'Hukum', 'Cukup', 2),
(949, 31, 28, 'Agama', 'Cukup', 4),
(950, 31, 28, 'Pendidikan', 'Cukup', 4),
(952, 31, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(953, 31, 28, 'Ekonomi', 'Tinggi', 5),
(954, 31, 28, 'Matematika', 'Cukup', 3),
(955, 31, 28, 'Sejarah', 'Cukup', 4),
(956, 31, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 4),
(957, 31, 28, 'Ilmu Sosial', 'Cukup', 3),
(958, 31, 28, 'Sains', 'Cukup', 2),
(959, 31, 29, 'Juara Tingkat Nasional', '>3', 8),
(960, 31, 29, 'Juara Tingkat Nasional', '1-3', 7),
(961, 31, 29, 'Juara Tingkat Provinsi', '>3', 3),
(962, 31, 29, 'Juara Tingkat Provinsi', '1-3', 4),
(963, 31, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(964, 31, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 6),
(965, 31, 29, 'Juara Tingkat Sekolah', '>3', 4),
(966, 31, 29, 'Juara Tingkat Sekolah', '1-3', 3),
(967, 31, 29, 'Tidak Ada', '-', 3),
(973, 32, 27, '0 - 50', 'Rendah', 2),
(974, 32, 27, '51- 65', 'Rendah', 2),
(975, 32, 27, '66 - 75', 'Cukup', 3),
(976, 32, 27, '76 - 85', 'Tinggi', 5),
(977, 32, 27, '86 - 100', 'Cukup', 3),
(978, 32, 28, 'Bahasa', 'Cukup', 3),
(979, 32, 28, 'Teknologi', 'Cukup', 4),
(980, 32, 28, 'Hukum', 'Cukup', 2),
(981, 32, 28, 'Agama', 'Cukup', 3),
(982, 32, 28, 'Pendidikan', 'Cukup', 4),
(983, 32, 28, 'Menajemen dan bisnis', 'Cukup', 5),
(984, 32, 28, 'Ekonomi', 'Cukup', 3),
(985, 32, 28, 'Matematika', 'Cukup', 3),
(986, 32, 28, 'Sejarah', 'Cukup', 4),
(987, 32, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 4),
(988, 32, 28, 'Ilmu Sosial', 'Cukup', 3),
(989, 32, 28, 'Sains', 'Cukup', 2),
(990, 32, 29, 'Juara Tingkat Nasional', '>3', 9),
(991, 32, 29, 'Juara Tingkat Nasional', '1-3', 7),
(992, 32, 29, 'Juara Tingkat Provinsi', '>3', 8),
(993, 32, 29, 'Juara Tingkat Provinsi', '1-3', 7),
(994, 32, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(995, 32, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 6),
(996, 32, 29, 'Juara Tingkat Sekolah', '>3', 4),
(997, 32, 29, 'Juara Tingkat Sekolah', '1-3', 3),
(998, 32, 29, 'Tidak Ada', '-', 3),
(1004, 33, 27, '0 - 50', 'Rendah', 2),
(1005, 33, 27, '51- 65', 'Rendah', 2),
(1006, 33, 27, '66 - 75', 'Cukup', 3),
(1007, 33, 27, '76 - 85', 'Tinggi', 4),
(1008, 33, 27, '86 - 100', 'Tinggi', 4),
(1009, 33, 28, 'Bahasa', 'Cukup', 4),
(1010, 33, 28, 'Teknologi', 'Tinggi', 5),
(1011, 33, 28, 'Hukum', 'Cukup', 2),
(1012, 33, 28, 'Agama', 'Cukup', 3),
(1013, 33, 28, 'Pendidikan', 'Cukup', 4),
(1014, 33, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(1015, 33, 28, 'Ekonomi', 'Cukup', 2),
(1016, 33, 28, 'Matematika', 'Cukup', 4),
(1017, 33, 28, 'Sejarah', 'Cukup', 4),
(1018, 33, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 3),
(1019, 33, 28, 'Ilmu Sosial', 'Cukup', 2),
(1020, 33, 28, 'Sains', 'Tinggi', 5),
(1021, 33, 29, 'Juara Tingkat Nasional', '>3', 6),
(1022, 33, 29, 'Juara Tingkat Nasional', '1-3', 6),
(1023, 33, 29, 'Juara Tingkat Provinsi', '>3', 5),
(1024, 33, 29, 'Juara Tingkat Provinsi', '1-3', 4),
(1025, 33, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(1026, 33, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 5),
(1027, 33, 29, 'Juara Tingkat Sekolah', '>3', 4),
(1028, 33, 29, 'Juara Tingkat Sekolah', '1-3', 5),
(1029, 33, 29, 'Tidak Ada', '-', 3),
(1035, 34, 27, '0 - 50', 'Cukup', 4),
(1036, 34, 27, '51- 65', 'Cukup', 4),
(1037, 34, 27, '66 - 75', 'Cukup', 4),
(1038, 34, 27, '76 - 85', 'Tinggi', 5),
(1039, 34, 27, '86 - 100', 'Tinggi', 5),
(1040, 34, 28, 'Bahasa', 'Cukup', 3),
(1041, 34, 28, 'Teknologi', 'Cukup', 4),
(1042, 34, 28, 'Hukum', 'Cukup', 4),
(1043, 34, 28, 'Agama', 'Cukup', 3),
(1044, 34, 28, 'Pendidikan', 'Cukup', 2),
(1045, 34, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(1046, 34, 28, 'Ekonomi', 'Cukup', 4),
(1047, 34, 28, 'Matematika', 'Tinggi', 5),
(1048, 34, 28, 'Sejarah', 'Cukup', 3),
(1049, 34, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 3),
(1050, 34, 28, 'Ilmu Sosial', 'Cukup', 3),
(1051, 34, 28, 'Sains', 'Tinggi', 5),
(1052, 34, 29, 'Juara Tingkat Nasional', '>3', 9),
(1053, 34, 29, 'Juara Tingkat Nasional', '1-3', 8),
(1054, 34, 29, 'Juara Tingkat Provinsi', '>3', 7),
(1055, 34, 29, 'Juara Tingkat Provinsi', '1-3', 5),
(1056, 34, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(1057, 34, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 4),
(1058, 34, 29, 'Juara Tingkat Sekolah', '>3', 3),
(1059, 34, 29, 'Juara Tingkat Sekolah', '1-3', 4),
(1060, 34, 29, 'Tidak Ada', '-', 2),
(1066, 5, 27, '0 - 50', 'Cukup', 3),
(1067, 5, 27, '51- 65', 'Cukup', 3),
(1068, 5, 27, '66 - 75', 'Cukup', 3),
(1069, 5, 27, '76 - 85', 'Cukup', 3),
(1070, 5, 27, '86 - 100', 'Tinggi', 4),
(1071, 5, 28, 'Bahasa', 'Cukup', 2),
(1072, 5, 28, 'Teknologi', 'Cukup', 3),
(1073, 5, 28, 'Hukum', 'Cukup', 2),
(1074, 5, 28, 'Agama', 'Cukup', 3),
(1075, 5, 28, 'Pendidikan', 'Cukup', 4),
(1076, 5, 28, 'Menajemen dan bisnis', 'Cukup', 3),
(1077, 5, 28, 'Ekonomi', 'Cukup', 2),
(1078, 5, 28, 'Matematika', 'Cukup', 3),
(1079, 5, 28, 'Sejarah', 'Cukup', 2),
(1080, 5, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Tinggi', 5),
(1081, 5, 28, 'Ilmu Sosial', 'Tinggi', 5),
(1082, 5, 28, 'Sains', 'Cukup', 3),
(1083, 5, 29, 'Juara Tingkat Nasional', '>3', 8),
(1084, 5, 29, 'Juara Tingkat Nasional', '1-3', 8),
(1085, 5, 29, 'Juara Tingkat Provinsi', '>3', 6),
(1086, 5, 29, 'Juara Tingkat Provinsi', '1-3', 6),
(1087, 5, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(1088, 5, 29, 'Juara Tingkat Kabupaten/Kota', '1-3', 3),
(1089, 5, 29, 'Juara Tingkat Sekolah', '>3', 2),
(1090, 5, 29, 'Juara Tingkat Sekolah', '1-3', 2),
(1091, 5, 29, 'Tidak Ada', '-', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `Id_Sub_Kriteria` int(3) NOT NULL,
  `Id_Kriteria` int(3) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Bobot` varchar(20) NOT NULL,
  `Nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`Id_Sub_Kriteria`, `Id_Kriteria`, `Nama`, `Bobot`, `Nilai`) VALUES
(2, 27, '0 - 50', 'Sangat Rendah', 1),
(4, 27, '51 - 65', 'Rendah', 2),
(5, 27, '66 - 75', 'Cukup', 3),
(10, 29, 'Juara Tingkat Nasional', '>3', 9),
(13, 27, '76 - 85', 'Tinggi', 4),
(14, 27, '86 - 100', 'Sangat Tinggi', 5),
(16, 28, 'Bahasa', 'Cukup', 3),
(21, 28, 'Teknologi', 'Cukup', 3),
(26, 29, 'Juara Tingkat Nasional', '1 - 3', 8),
(27, 29, 'Juara Tingkat Provinsi', '>3', 7),
(28, 29, 'Juara Tingkat Provinsi', '1 - 3', 6),
(29, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(30, 29, 'Juara Tingkat Kabupaten/Kota', '1 - 3', 4),
(31, 29, 'Juara Tingkat Sekolah', '>3', 3),
(32, 29, 'Juara Tingkat Sekolah', '1 - 3', 2),
(33, 29, 'Tidak Ada', '-', 1),
(38, 28, 'Hukum', 'Cukup', 3),
(39, 28, 'Agama', 'Cukup', 3),
(40, 28, 'Pendidikan', 'Cukup', 3),
(41, 28, 'Menajemen dan Bisnis', 'Cukup', 3),
(42, 28, 'Ekonomi', 'Cukup', 3),
(43, 28, 'Matematika', 'Cukup', 3),
(44, 28, 'Sejarah', 'Cukup', 3),
(45, 28, 'Ilmu Kesejahteraan dan Pelayanan Sosial', 'Cukup', 3),
(46, 28, 'Ilmu Sosial', 'Cukup', 3),
(47, 28, 'Sains', 'Cukup', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_User` int(3) NOT NULL,
  `Foto` varchar(20) DEFAULT NULL,
  `NISN` int(10) NOT NULL,
  `Nama_Lengkap` varchar(50) NOT NULL,
  `Asal_Sekolah` varchar(50) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Level` enum('admin','siswa','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Foto`, `NISN`, `Nama_Lengkap`, `Asal_Sekolah`, `Username`, `Password`, `Level`) VALUES
(26, NULL, 1111, 'admin', 'asd', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(27, 'user-728875.png', 987654321, 'Sri Mulliyanti', 'Padang', 'sri', 'd1565ebd8247bbb01472f80e24ad29b6', 'siswa'),
(29, NULL, 1212, 'sadA', 'dsf', 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`Id_Alternatif`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id_data_user`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indexes for table `hasil_perhitungan_saw`
--
ALTER TABLE `hasil_perhitungan_saw`
  ADD PRIMARY KEY (`Id_Hasil_SAW`),
  ADD KEY `hasil_perhitungan_saw_ibfk_1` (`Id_Alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`Id_Kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`Id_Penilaian`),
  ADD KEY `penilaian_ibfk_2` (`Id_Sub_Alternatif`),
  ADD KEY `penilaian_ibfk_3` (`Id_Alternatif`),
  ADD KEY `penilaian_ibfk_4` (`Id_Kriteria`);

--
-- Indexes for table `sub_alternatif`
--
ALTER TABLE `sub_alternatif`
  ADD PRIMARY KEY (`Id_Sub_Alternatif`),
  ADD KEY `Id_Alternatif` (`Id_Alternatif`),
  ADD KEY `Id_Kriteria` (`Id_Kriteria`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`Id_Sub_Kriteria`),
  ADD KEY `sub_kriteria_ibfk_1` (`Id_Kriteria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`),
  ADD UNIQUE KEY `NISN` (`NISN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `Id_Alternatif` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id_data_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hasil_perhitungan_saw`
--
ALTER TABLE `hasil_perhitungan_saw`
  MODIFY `Id_Hasil_SAW` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `Id_Kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `Id_Penilaian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `sub_alternatif`
--
ALTER TABLE `sub_alternatif`
  MODIFY `Id_Sub_Alternatif` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1097;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `Id_Sub_Kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_user`
--
ALTER TABLE `data_user`
  ADD CONSTRAINT `data_user_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_perhitungan_saw`
--
ALTER TABLE `hasil_perhitungan_saw`
  ADD CONSTRAINT `hasil_perhitungan_saw_ibfk_1` FOREIGN KEY (`Id_Alternatif`) REFERENCES `alternatif` (`Id_Alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`Id_Sub_Alternatif`) REFERENCES `sub_alternatif` (`Id_Sub_Alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`Id_Alternatif`) REFERENCES `alternatif` (`Id_Alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_4` FOREIGN KEY (`Id_Kriteria`) REFERENCES `kriteria` (`Id_Kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_alternatif`
--
ALTER TABLE `sub_alternatif`
  ADD CONSTRAINT `sub_alternatif_ibfk_1` FOREIGN KEY (`Id_Alternatif`) REFERENCES `alternatif` (`Id_Alternatif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_alternatif_ibfk_2` FOREIGN KEY (`Id_Kriteria`) REFERENCES `kriteria` (`Id_Kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`Id_Kriteria`) REFERENCES `kriteria` (`Id_Kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
