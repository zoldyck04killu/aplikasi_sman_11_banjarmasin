-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2019 at 07:33 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_sman_11_banjarmasin`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `kd_absen` int(50) NOT NULL,
  `nis_siswa` int(15) NOT NULL,
  `nama_leng` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `ket` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(50) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewenangan` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `no_art` int(4) NOT NULL,
  `perihal` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl` date NOT NULL,
  `jam_art` time NOT NULL,
  `judul` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_guru` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_guru` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gol` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang_studi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kd_jadwal` int(2) NOT NULL,
  `hari_j` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_j` int(2) NOT NULL,
  `waktu` time NOT NULL,
  `kelas` int(2) NOT NULL,
  `matpel` int(20) NOT NULL,
  `nama_guru` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kd_kegiatan` int(50) NOT NULL,
  `nama_kegiatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_kegiatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_kegiatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`kd_kegiatan`, `nama_kegiatan`, `hari_kegiatan`, `jam_kegiatan`, `nip`) VALUES
(1, 'Menyapu', 'Selasa', '00:12', 1111);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kd_matpel` int(50) NOT NULL,
  `nama_matpel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(50) NOT NULL,
  `nis_siswa` int(50) NOT NULL,
  `nama_leng` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matpel` int(20) NOT NULL,
  `semester` int(5) NOT NULL,
  `kelas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tugas` int(5) NOT NULL,
  `uts` int(5) NOT NULL,
  `uas` int(5) NOT NULL,
  `rata` int(5) NOT NULL,
  `nilai` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis_siswa` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_siswa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk_siswa` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp_rmh` int(12) NOT NULL,
  `asal_sekolah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thn_lulus` int(4) NOT NULL,
  `nama_bpk` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerja_bpk` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kerja_ibu` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis_siswa`, `nama_siswa`, `jk_siswa`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`, `telp_rmh`, `asal_sekolah`, `thn_lulus`, `nama_bpk`, `kerja_bpk`, `nama_ibu`, `kerja_ibu`) VALUES
('123', 'tes', 'p', 'asd', '2019-06-07', '', '', 0, '', 0, '', '', '', ''),
('123456', 'aaa', 'l', 'barabai', '2019-05-15', 'Islam', 'jl mahligai', 9786745, 'sssss', 2012, 'asas', 'asas', 'asas', 'asasas'),
('7777', 'Muhammad Aldi ', 'l', 'Banjarmasin', '2019-05-10', '', '', 0, '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `id_wali` int(100) NOT NULL,
  `wali_siswa` int(50) NOT NULL,
  `no_induk` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`kd_absen`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`kd_kegiatan`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kd_matpel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis_siswa`);

--
-- Indexes for table `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id_wali`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `kd_kegiatan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12313;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wali`
--
ALTER TABLE `wali`
  MODIFY `id_wali` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
