-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 09:43 AM
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
(35, 'Hukum Ekonomi Syariah'),
(49, 'zxcqwe'),
(50, 'zxcqwe'),
(51, 'xc'),
(52, 'xxxx'),
(53, 'zxc'),
(54, 'asdzxc'),
(55, 'ad'),
(56, 'ad'),
(57, 'a123'),
(58, 'zxc21'),
(59, 'zxc21'),
(60, 'amzxlckqio');

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
  `Minat_Bakat` enum('Pemikiran Kritis dan Penelitian','Bahasa','Hukum','Agama','Pendidikan','Sains','Teknologi','Ilmu Sosial','Ekonomi','Bisnis dan Menajemen','Matematika') NOT NULL,
  `Prestasi_Akademik` enum('Juara Tingkat Nasional >3','Juara Tingkat Nasional 1 – 3','Juara Tingkat Kabupaten/Kota >3','Juara Tingkat Kabupaten/Kota 1 – 3','Juara Tingkat Sekolah >3','Juara Tingkat Sekolah 1 – 3','Tidak Ada -','Juara Tingkat Provinsi >3','Juara Tingkat Provinsi 1 – 3') NOT NULL,
  `Penghasilan_Ortu` enum('500.000 s/d 1.400.000','1.500.000 s/d 2.400.000','2.500.000 s/d 3.400.000','3.500.000 s/d 5.000.000','5.100.000 s/d 10.000.000') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id_data_user`, `Id_User`, `NilaiX_SmtI`, `NilaiX_SmtII`, `NilaiXI_SmtI`, `NilaiXI_SmtII`, `NilaiXII_SmtI`, `NilaiXII_SmtII`, `Nilai_Rapor`, `Minat_Bakat`, `Prestasi_Akademik`, `Penghasilan_Ortu`) VALUES
(4, 26, 80, 89, 90, 89, 100, 101, 91.5, 'Agama', 'Juara Tingkat Provinsi >3', '1.500.000 s/d 2.400.000'),
(5, 27, 100, 100, 100, 100, 90, 100, 98.3333, 'Ilmu Sosial', 'Juara Tingkat Nasional >3', '3.500.000 s/d 5.000.000'),
(6, 28, 100, 100, 90, 100, 100, 100, 98.33, 'Ilmu Sosial', 'Juara Tingkat Provinsi 1 – 3', '5.100.000 s/d 10.000.000');

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
(6, 2, 100),
(7, 3, 88.75),
(8, 4, 87.75);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_minat_bakat`
--

CREATE TABLE `klasifikasi_minat_bakat` (
  `Id_Klasifikasi_Minat_Bakat` int(11) NOT NULL,
  `Id_Alternatif` int(11) NOT NULL,
  `Id_Sub_Kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klasifikasi_minat_bakat`
--

INSERT INTO `klasifikasi_minat_bakat` (`Id_Klasifikasi_Minat_Bakat`, `Id_Alternatif`, `Id_Sub_Kriteria`) VALUES
(13, 2, 16);

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
(28, 'C2', 'Minat dan Bakat', 30, 'Benefit'),
(29, 'C3', 'Prestasi Akademik', 20, 'Benefit'),
(31, 'C4', 'Penghasilan Orang Tua', 15, 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `Id_Penilaian` int(3) NOT NULL,
  `Id_Sub_Kriteria` int(3) NOT NULL,
  `Id_Alternatif` int(3) NOT NULL,
  `Nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`Id_Penilaian`, `Id_Sub_Kriteria`, `Id_Alternatif`, `Nilai`) VALUES
(48, 14, 3, 5),
(49, 16, 3, 3),
(50, 10, 3, 9),
(51, 34, 3, 4),
(52, 14, 2, 5),
(53, 15, 2, 3),
(54, 10, 2, 9),
(55, 37, 2, 1),
(56, 14, 4, 5),
(57, 15, 4, 3),
(58, 26, 4, 8),
(59, 35, 4, 3);

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
(2, 27, '0-39', 'Sangat Rendah', 1),
(4, 27, '40-54', 'Rendah', 2),
(5, 27, '55-69', 'Cukup', 3),
(10, 29, 'Juara Tingkat Nasional', '>3', 9),
(12, 31, '500.000 s/d 1.400.000', 'Sangat Rendah', 5),
(13, 27, '70-84', 'Tinggi', 4),
(14, 27, '85-100', 'Sangat Tinggi', 5),
(15, 28, 'Pemikiran Kritis dan Penelitian', 'Cukup', 3),
(16, 28, 'Bahasa', 'Cukup', 3),
(17, 28, 'Hukum', 'Cukup', 3),
(18, 28, 'Agama', 'Cukup', 3),
(19, 28, 'Pendidikan', 'Cukup', 3),
(20, 28, 'Sains', 'Cukup', 3),
(21, 28, 'Teknologi', 'Cukup', 3),
(22, 28, 'Ilmu Sosial', 'Cukup', 3),
(23, 28, 'Ekonomi', 'Cukup', 3),
(24, 28, 'Bisnis dan Menajemen', 'Cukup', 3),
(25, 28, 'Matematika', 'Cukup', 3),
(26, 29, 'Juara Tingkat Nasional', '1 – 3', 8),
(27, 29, 'Juara Tingkat Provinsi', '>3', 7),
(28, 29, 'Juara Tingkat Provinsi', '1 – 3', 6),
(29, 29, 'Juara Tingkat Kabupaten/Kota', '>3', 5),
(30, 29, 'Juara Tingkat Kabupaten/Kota', '1 – 3', 4),
(31, 29, 'Juara Tingkat Sekolah', '>3', 3),
(32, 29, 'Juara Tingkat Sekolah', '1 – 3', 2),
(33, 29, 'Tidak Ada', '-', 1),
(34, 31, '1.500.000 s/d 2.400.000', 'Rendah', 4),
(35, 31, '2.500.000 s/d 3.400.000', 'Cukup', 3),
(36, 31, '3.500.000 s/d 5.000.000', 'Tinggi', 2),
(37, 31, '5.100.000 s/d 10.000.000', 'Sangat Tinggi', 1);

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
(28, NULL, 1231231312, 'asep', 'ui', 'asep', 'd1565ebd8247bbb01472f80e24ad29b6', 'siswa'),
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
-- Indexes for table `klasifikasi_minat_bakat`
--
ALTER TABLE `klasifikasi_minat_bakat`
  ADD PRIMARY KEY (`Id_Klasifikasi_Minat_Bakat`),
  ADD KEY `Id_Alternatif` (`Id_Alternatif`),
  ADD KEY `klasifikasi_minat_bakat_ibfk_2` (`Id_Sub_Kriteria`);

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
  ADD KEY `penilaian_ibfk_2` (`Id_Sub_Kriteria`),
  ADD KEY `penilaian_ibfk_3` (`Id_Alternatif`);

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
  MODIFY `id_data_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hasil_perhitungan_saw`
--
ALTER TABLE `hasil_perhitungan_saw`
  MODIFY `Id_Hasil_SAW` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `klasifikasi_minat_bakat`
--
ALTER TABLE `klasifikasi_minat_bakat`
  MODIFY `Id_Klasifikasi_Minat_Bakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `Id_Kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `Id_Penilaian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `Id_Sub_Kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  ADD CONSTRAINT `data_user_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`);

--
-- Constraints for table `hasil_perhitungan_saw`
--
ALTER TABLE `hasil_perhitungan_saw`
  ADD CONSTRAINT `hasil_perhitungan_saw_ibfk_1` FOREIGN KEY (`Id_Alternatif`) REFERENCES `alternatif` (`Id_Alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `klasifikasi_minat_bakat`
--
ALTER TABLE `klasifikasi_minat_bakat`
  ADD CONSTRAINT `klasifikasi_minat_bakat_ibfk_1` FOREIGN KEY (`Id_Alternatif`) REFERENCES `alternatif` (`Id_Alternatif`) ON DELETE CASCADE,
  ADD CONSTRAINT `klasifikasi_minat_bakat_ibfk_2` FOREIGN KEY (`Id_Sub_Kriteria`) REFERENCES `sub_kriteria` (`Id_Sub_Kriteria`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`Id_Sub_Kriteria`) REFERENCES `sub_kriteria` (`Id_Sub_Kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`Id_Alternatif`) REFERENCES `alternatif` (`Id_Alternatif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_ibfk_1` FOREIGN KEY (`Id_Kriteria`) REFERENCES `kriteria` (`Id_Kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
