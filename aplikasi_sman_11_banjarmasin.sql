-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
<<<<<<< HEAD
-- Generation Time: Jul 12, 2019 at 06:51 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.7
=======
-- Generation Time: Jul 05, 2019 at 06:26 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.6
>>>>>>> fe40d0f59ea92d046bc6617a9be7aca298860fc9

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
  `kewenangan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_wali` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `kewenangan`, `id_wali`) VALUES
(1, 'admin', '$2y$10$V4wMsjOfzBChjD3koGQNOeFOjMGOAhXPVPUauACoYm03ix/gAeSfy', 'admin', NULL),
(3, 'admin_web', '$2y$10$bJx.ypwn8Djh4K1ZGYaAtuOKnZusHM2FhY66aJ7b.oOw2zcGqjoLK', 'admin_web', NULL),
(4, 'bobo', '$2y$10$SQtDzIfzFRPRagqce3E0zuYLjpgCNDNnZG383myi584ugc9cxBkHa', 'wali', 1);

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
<<<<<<< HEAD
-- Table structure for table `daftar_mhs_kegiatan`
--

CREATE TABLE `daftar_mhs_kegiatan` (
  `id_mhs_kegiatan` int(100) NOT NULL,
  `kode_kegiatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_mhs_kegiatan`
--

INSERT INTO `daftar_mhs_kegiatan` (`id_mhs_kegiatan`, `kode_kegiatan`, `nis`) VALUES
(13, 'KG05', 11111),
(14, 'KG06', 11111);

-- --------------------------------------------------------

--
=======
>>>>>>> fe40d0f59ea92d046bc6617a9be7aca298860fc9
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

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `jk_guru`, `gol`, `bidang_studi`, `status`) VALUES
('193610051985022', 'Hj. Margaritta, S.Pd', 'p', 'IV/a', 'Fisika', '1'),
('195809221982032', 'Dra. Hj. Noor Ainah, M.Pd', 'p', 'IV/b', 'Kepl Sekolah/Guru BP', '1'),
('195907201987031', 'Drs. Abd Kadir', 'l', 'IV/a', 'Guru BK/BP', '1'),
('196006121988031', 'Dra. Zaimini', 'l', 'IV/a', 'Guru Biologi', '1'),
('196205509199512', 'Akhyari, S.Pd', 'l', 'IV/a', 'Guru Bhs. Indonesia', '1'),
('196209051988031', 'Abdul Hadi, S.Pd', 'l', 'IV/a', 'Guru Fisika/Kep. Lab', '1'),
('196304071989032', 'Dra. Hj. Nurjannah', 'p', 'IV/a', 'Guru Biologi', '1'),
('196505032005012', 'Murniati, S.Pd', 'p', 'III/d', 'Guru Sejarah', '1'),
('196612032005011', 'Ahbiansyah, S.P.d', 'l', 'III/d', 'Guru Matematika', '1'),
('196712251993031', 'Dra. Wiji Suparmin', 'l', 'IV/b', 'Guru Matematika', '1'),
('196805252006042', 'Hj. Noor Baytie, SH, M.Pd', 'p', 'IV/a', 'Guru PKN/Waka Kurik', '1'),
('196807051997022', 'Hj. Jumilah, S.Pd', 'p', 'IV/a', 'Guru BP/BK', '1'),
('196807181994122', 'Sri Nur Iriani, S.Pd', 'p', 'IV/a', 'Guru Bhs Inggris', '1'),
('196808291994122', 'Ratni Mustaqimah, M.Pd', 'p', 'IV/b', 'Guru Sejarah', '1'),
('196908112006041', 'H. Muhammad Qurtobi, S.Ag, M.Pd', 'l', 'III/d', 'Guru Bhs Arab', '1'),
('197011271997022', 'Sri Haryati, S.Pd', 'p', 'Pembina Tk.I', 'Biologi', '1'),
('197103141999032', 'Hj. Lilis Kursini, S.Pd', 'p', 'IV/a', 'Guru Bhs Inggris', '1'),
('197106021998021', 'M. Taslim, S.Pd, M.Pd', 'l', 'Pembina Tk.I', 'B. Inggris', '1'),
('197207081998022', 'Yulina Siswati, S.Pd', 'p', 'IV/a', 'Guru Kimia', '1'),
('197207272006042', 'Hj. Siti Astikomah, M.Pd', 'p', 'III/d', 'Guru Bhs Jerman', '1'),
('197303152006042', 'Rahmi, S.Pd', 'p', 'III/d', 'Guru Kimia', '1'),
('197405152006042', 'Noor Asni, S.Sos', 'p', 'III/d', 'Guru Sosiologi', '1'),
('197507062005011', 'I. Putu Suweca', 'l', 'III/d', 'Guru Matematik', '1'),
('197612072006041', 'M. Muzain, S.Pd', 'l', 'III/d', 'Guru Olahrags', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `kd_jadwal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_j` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_j` int(2) NOT NULL,
  `waktu` time NOT NULL,
  `kelas` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matpel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_guru` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kd_jadwal`, `hari_j`, `jam_j`, `waktu`, `kelas`, `matpel`, `nama_guru`) VALUES
('KJ01', 'Selasa', 4, '00:00:00', '10', 'Kimia', 'Ahbiansyah, S.P.d'),
('KJ02', 'Rabu', 4, '00:00:00', '11', 'Bahasa inggris', 'Drs. Zaimini'),
('KJ03', 'Kamis', 2, '00:45:00', 'B', 'TI', 'mahmud');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `kd_kegiatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kegiatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_kegiatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_kegiatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`kd_kegiatan`, `nama_kegiatan`, `hari_kegiatan`, `jam_kegiatan`, `nip`) VALUES
('KG01', 'ICHO', 'rabu', '02:03:00', 193610051985022),
('KG02', 'Mading', 'senin', '16:32:00', 193610051985022),
('KG03', 'Karate', 'selasa', '16:32:00', 196006121988031),
('KG04', 'Olympiade Ekonomi', 'senin', '16:32:00', 197103141999032),
('KG05', 'Basket', 'kamis', '16:32:00', 197106021998021),
('KG06', 'Futsal', 'jumat', '15:30', 197207272006042),
('KG07', 'Tari', 'kamis', '16:32:00', 197507062005011),
('KG08', 'Teater', 'jumat', '15:30', 197303152006042),
('KG09', 'Rebana-Habsyi', 'kamis', '16:32:00', 197507062005011),
('KG10', 'Keagamaan', 'jumat', '16:32:00', 197507062005011),
('KG11', 'IMO', 'selasa', '15:50:00', 195907201987031),
('KG12', 'axasx', 'senin', '16:32:00', 193610051985022),
('KG13', 'IBO', 'senin', '16:32:00', 196006121988031),
('KG14', 'Kebumian', 'senin', '16:00:00', 196205509199512),
('KG15', 'Paskibra', 'senin', '16:32:00', 196712251993031),
('KG16', 'PMR', 'jumat', '14:00', 196612032005011),
('KG17', 'Pramuka', 'sabtu', '15:00', 196209051988031),
('KG18', 'English Club', 'rabu', '15:32', 195907201987031),
('KG19', '4 Pilar Kebanagsaan', 'rabu', '16:45:00', 196209051988031);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kd_matpel` int(50) NOT NULL,
  `nama_matpel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kd_matpel`, `nama_matpel`, `nip`) VALUES
(1001, 'Drs. Zaimin', '198523781001');

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

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `nis_siswa`, `nama_leng`, `matpel`, `semester`, `kelas`, `tugas`, `uts`, `uas`, `rata`, `nilai`) VALUES
<<<<<<< HEAD
(9, 214748364, 'Annisa Yulianti', 1, 2, '10', 80, 80, 80, 0, 0),
=======
(9, 2147483647, 'Annisa Yulianti', 1, 2, '10', 80, 80, 80, 0, 0),
>>>>>>> fe40d0f59ea92d046bc6617a9be7aca298860fc9
(11, 2147483647, 'Adelia Warnada', 3, 1, '10', 80, 70, 70, 0, 73);

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
<<<<<<< HEAD
=======
  `wali` int(50) NOT NULL,
>>>>>>> fe40d0f59ea92d046bc6617a9be7aca298860fc9
  `agama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thn_lulus` int(4) NOT NULL,
  `kd_jadwal` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_Kegiatan` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

<<<<<<< HEAD
INSERT INTO `siswa` (`nis_siswa`, `nama_siswa`, `jk_siswa`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`, `asal_sekolah`, `thn_lulus`, `kd_jadwal`, `kd_Kegiatan`, `status`) VALUES
('0006187133', 'Gisti Reyna Safa Thalita', 'p', 'Kandangan', '2004-01-01', 'Islam', 'Jl. Jahri Saleh, RT.11, No.47', 'SMPN 9 Banjarmasin', 2015, 'KJ01', 'KG06 ', '10'),
('0006456068', 'Anisa Fitriani', 'p', 'Balangan', '2003-11-17', 'Islam', 'Jl. Pangeran, No 34', 'SMPN 2 Banjarmasin', 2015, 'KJ03', 'KG08', '10'),
('0008029823', 'FItria Anggraini', 'p', 'Martapura', '2003-02-10', 'Islam', 'Jl. Alalak Tengah, No.03', 'SMPN 12 Banjarmasin', 2015, 'KJ03', 'KG09', '10'),
('0008923741', 'Ernawati', 'p', 'Kuala Kapuas', '2003-06-18', 'Islam', 'Jl. Sungai Andai, Gg. Al-amin No 32', 'SMPN Muhammadiyah Banjarmasin', 2015, 'KJ01', 'KG01', '10'),
('0009769322', 'Amelia', 'p', 'Anjir km.25', '2002-12-01', 'Islam', 'Jl. Sultan Adam, Komp. Kadar Permai I', 'SMPN 9 Banjarmasin', 2015, 'KJ02', 'KG06', '10'),
('11111', 'syarif', 'l', 'Tanjung', '2019-07-30', 'Islam', 'jln', 'SMK', 2012, 'KJ01', '', '10'),
('16347200108', 'Adelia Wardana', 'p', 'Banjarbaru', '2004-12-01', 'Islam', 'Jl. Teluk Tiram Darat Ampera Raya RT.46 RW.006', 'SMPN 31 Banjarmasin', 2016, 'KJ01', 'KG11', '10'),
('16347300145', 'Annisa Yulianti', 'p', 'Banjarmasin', '2004-02-05', 'Islam', 'Jl. Sultan Adam, Komp Merpati', 'SMPN 6 Banjarmasin', 2016, 'KJ01', 'KG07', '10'),
('16347400136', 'Aprilia Annisa Ilfa Nabila', 'p', 'Gambut', '2004-02-17', 'Islam', 'Jl. Cemara Ujung, Raga Buana RT.44, No.17', 'SMPN 31 Banjarmasin', 2016, 'KJ02', 'KG10', '10'),
('16347500137', 'Ari Sandi', 'l', 'Basirih', '2004-05-21', 'Islam', 'Jl. Sungai Andai RT.39 Banjarmasin', 'SMPN 6 Banjarmasin', 2016, 'KJ01', 'KG05', '10'),
('9991765122', 'Indra Lukmanul Hakim', 'l', 'Banjarmasin Tengah', '2003-09-24', 'Islam', 'Jl. Sungai Andai, RT.37', 'SMPN 9 Banjarmasin', 2015, 'KJ03', 'KG08', '10'),
('9996569070', 'Junaidi', 'l', 'Banjarmasin', '2003-11-15', 'Islam', 'Jl. Sultan Adam, Komp. Pondok Kelapa I', 'SMPN 9 Banjarmasin', 2015, 'KJ03', 'KG04', '10');
=======
INSERT INTO `siswa` (`nis_siswa`, `nama_siswa`, `jk_siswa`, `tempat_lahir`, `tgl_lahir`, `wali`, `agama`, `alamat`, `asal_sekolah`, `thn_lulus`, `kd_jadwal`, `kd_Kegiatan`, `status`) VALUES
('0006187133', 'Gisti Reyna Safa Thalita', 'p', 'Kandangan', '2004-01-01', 0, 'Islam', 'Jl. Jahri Saleh, RT.11, No.47', 'SMPN 9 Banjarmasin', 2015, 'KJ01', 'KG06 ', '10'),
('0006456068', 'Anisa Fitriani', 'p', 'Balangan', '2003-11-17', 0, 'Islam', 'Jl. Pangeran, No 34', 'SMPN 2 Banjarmasin', 2015, 'KJ03', 'KG08', '10'),
('0008029823', 'FItria Anggraini', 'p', 'Martapura', '2003-02-10', 0, 'Islam', 'Jl. Alalak Tengah, No.03', 'SMPN 12 Banjarmasin', 2015, 'KJ03', 'KG09', '10'),
('0008923741', 'Ernawati', 'p', 'Kuala Kapuas', '2003-06-18', 0, 'Islam', 'Jl. Sungai Andai, Gg. Al-amin No 32', 'SMPN Muhammadiyah Banjarmasin', 2015, 'KJ01', 'KG01', '10'),
('0009769322', 'Amelia', 'p', 'Anjir km.25', '2002-12-01', 0, 'Islam', 'Jl. Sultan Adam, Komp. Kadar Permai I', 'SMPN 9 Banjarmasin', 2015, 'KJ02', 'KG06', '10'),
('16347200108', 'Adelia Wardana', 'p', 'Banjarbaru', '2004-12-01', 0, 'Islam', 'Jl. Teluk Tiram Darat Ampera Raya RT.46 RW.006', 'SMPN 31 Banjarmasin', 2016, 'KJ01', 'KG11', '10'),
('16347300145', 'Annisa Yulianti', 'p', 'Banjarmasin', '2004-02-05', 0, 'Islam', 'Jl. Sultan Adam, Komp Merpati', 'SMPN 6 Banjarmasin', 2016, 'KJ01', 'KG07', '10'),
('16347400136', 'Aprilia Annisa Ilfa Nabila', 'p', 'Gambut', '2004-02-17', 0, 'Islam', 'Jl. Cemara Ujung, Raga Buana RT.44, No.17', 'SMPN 31 Banjarmasin', 2016, 'KJ02', 'KG10', '10'),
('16347500137', 'Ari Sandi', 'l', 'Basirih', '2004-05-21', 0, 'Islam', 'Jl. Sungai Andai RT.39 Banjarmasin', 'SMPN 6 Banjarmasin', 2016, 'KJ01', 'KG05', '10'),
('23782482', 'ansjbsja', 'l', 'hudewhbdjk', '2004-12-01', 0, 'islam', 'jdjsb', 'bdsjhfb', 2015, 'KJ01', 'KG03', '10'),
('2767237', 'sjhdjhs', 'l', 'nvbvb', '2005-12-03', 0, 'hghgh', 'n nbnm', 'bjhjn', 2017, 'KJ01', '8', '10'),
('87638', 'Adul Yadi', 'l', 'bjm', '2004-05-02', 0, 'islam', 'hfh', 'fghfh', 2014, 'KJ01', 'KG02', '12'),
('9991765122', 'Indra Lukmanul Hakim', 'l', 'Banjarmasin Tengah', '2003-09-24', 0, 'Islam', 'Jl. Sungai Andai, RT.37', 'SMPN 9 Banjarmasin', 2015, 'KJ03', 'KG08', '10'),
('9996569070', 'Junaidi', 'l', 'Banjarmasin', '2003-11-15', 0, 'Islam', 'Jl. Sultan Adam, Komp. Pondok Kelapa I', 'SMPN 9 Banjarmasin', 2015, 'KJ03', 'KG04', '10');
>>>>>>> fe40d0f59ea92d046bc6617a9be7aca298860fc9

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `id_wali` int(100) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wali`
--

INSERT INTO `wali` (`id_wali`, `nama`, `alamat`, `telp`, `pekerjaan`, `agama`, `status`, `nis`) VALUES
(2, 'bobo', 'jln gambut', '085276348', 'Swasta', 'Islam', 'Sudah Kawin', '2147483647');

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
<<<<<<< HEAD
-- Indexes for table `daftar_mhs_kegiatan`
--
ALTER TABLE `daftar_mhs_kegiatan`
  ADD PRIMARY KEY (`id_mhs_kegiatan`);

--
=======
>>>>>>> fe40d0f59ea92d046bc6617a9be7aca298860fc9
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`kd_jadwal`);

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
<<<<<<< HEAD
  ADD PRIMARY KEY (`kd_nilai`),
  ADD UNIQUE KEY `nis_siswa` (`nis_siswa`);
=======
  ADD PRIMARY KEY (`kd_nilai`);
>>>>>>> fe40d0f59ea92d046bc6617a9be7aca298860fc9

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
  MODIFY `id_admin` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `daftar_mhs_kegiatan`
--
ALTER TABLE `daftar_mhs_kegiatan`
  MODIFY `id_mhs_kegiatan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
=======
>>>>>>> fe40d0f59ea92d046bc6617a9be7aca298860fc9
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wali`
--
ALTER TABLE `wali`
  MODIFY `id_wali` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
