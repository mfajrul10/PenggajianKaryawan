-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 01:13 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absenkaryawan`
--

CREATE TABLE `tb_absenkaryawan` (
  `id_absensikaryawan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_absensi` date NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status_absensi` varchar(50) NOT NULL,
  `valid_absensi` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_absenkaryawan`
--

INSERT INTO `tb_absenkaryawan` (`id_absensikaryawan`, `id_karyawan`, `tgl_absensi`, `jam_masuk`, `jam_keluar`, `keterangan`, `status_absensi`, `valid_absensi`, `foto`) VALUES
(4, 74, '2021-03-06', '07:47:14', '08:32:33', '', 'hadir', 'Y', ''),
(5, 74, '2021-03-07', '05:45:13', '05:50:50', '', 'hadir', 'Y', ''),
(6, 74, '2021-03-10', '09:24:43', '09:24:43', '          mohon izin pak, sedang sakit            ', 'sakit', 'Y', '6366418_preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', 'Logo-UPN-Universitas-Negeri-Padang-PNG.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aplikasi`
--

CREATE TABLE `tb_aplikasi` (
  `id_aplikasi` int(11) NOT NULL,
  `nama_instansi` varchar(50) NOT NULL,
  `nama_aplikasi` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_aplikasi`
--

INSERT INTO `tb_aplikasi` (`id_aplikasi`, `nama_instansi`, `nama_aplikasi`, `foto`) VALUES
(2, 'CV.Flexco Ltd', 'Sistem Informasi Penggajian dan Perekrutan Karyawan', 'IMG-20210304-WA0005.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE `tb_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(30) NOT NULL,
  `gapok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nama_bagian`, `gapok`) VALUES
(2, 'Desain', 1000000),
(3, 'Cetak', 1000000),
(5, 'Finishing', 1000000),
(6, 'Keuangan dan Administrasi', 500000),
(7, 'Pemasaran', 500000),
(9, 'Produksi', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `gapok` int(11) NOT NULL,
  `tunjangan` int(11) NOT NULL,
  `bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `tgl_gaji`, `id_karyawan`, `potongan`, `gapok`, `tunjangan`, `bonus`) VALUES
(133, '2021-02-02', 74, 1000000, 1000000, 25000, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `kode_karyawan` varchar(11) NOT NULL,
  `nama_karyawan` varchar(25) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status_karyawan` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `kode_karyawan`, `nama_karyawan`, `id_bagian`, `username`, `password`, `status_karyawan`, `foto`) VALUES
(74, 'FLC001', 'Budi Saputra', 2, 'FLC001', 'FLC001', 'tetap', 'admin.jpg'),
(75, 'FLC002', 'ujang jangkrik', 5, 'FLC002', 'FLC002', 'tetap', '6366418_preview.png'),
(76, 'FLC003', 'wewew', 5, 'FLC003', 'FLC003', 'tetap', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelamar`
--

CREATE TABLE `tb_pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `id_rekrutmen` int(11) NOT NULL,
  `kode_pelamar` varchar(11) NOT NULL,
  `nama_pelamar` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelamar`
--

INSERT INTO `tb_pelamar` (`id_pelamar`, `id_rekrutmen`, `kode_pelamar`, `nama_pelamar`, `tgl_lahir`, `tempat_lahir`, `alamat`, `foto`) VALUES
(17, 14, 'FCI006', 'Wahyu Riswan', '1997-02-28', 'Dharmasraya', 'Komplek perumahan kompi siteba', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekrutmen`
--

CREATE TABLE `tb_rekrutmen` (
  `id_rekrutmen` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `syarat` varchar(100) NOT NULL,
  `waktu` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekrutmen`
--

INSERT INTO `tb_rekrutmen` (`id_rekrutmen`, `id_bagian`, `tanggal`, `syarat`, `waktu`, `aktif`) VALUES
(14, 2, '2021-03-09', 'S1', 3, 'N'),
(15, 7, '2021-03-11', 'asasasasa', 2, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tunjangan`
--

CREATE TABLE `tb_tunjangan` (
  `id_tunjangan` int(11) NOT NULL,
  `nama_tunjangan` varchar(50) NOT NULL,
  `jumlah_tunjangan` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tunjangan`
--

INSERT INTO `tb_tunjangan` (`id_tunjangan`, `nama_tunjangan`, `jumlah_tunjangan`) VALUES
(1, 'Uang Makan', 25000),
(2, 'Kesehatan', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tunjangankaryawan`
--

CREATE TABLE `tb_tunjangankaryawan` (
  `id_tunjangankaryawan` int(11) NOT NULL,
  `id_tunjangan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tunjangankaryawan`
--

INSERT INTO `tb_tunjangankaryawan` (`id_tunjangankaryawan`, `id_tunjangan`, `id_karyawan`) VALUES
(1, 2, 74);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absenkaryawan`
--
ALTER TABLE `tb_absenkaryawan`
  ADD PRIMARY KEY (`id_absensikaryawan`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_aplikasi`
--
ALTER TABLE `tb_aplikasi`
  ADD PRIMARY KEY (`id_aplikasi`);

--
-- Indexes for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_pelamar`
--
ALTER TABLE `tb_pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indexes for table `tb_rekrutmen`
--
ALTER TABLE `tb_rekrutmen`
  ADD PRIMARY KEY (`id_rekrutmen`);

--
-- Indexes for table `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indexes for table `tb_tunjangankaryawan`
--
ALTER TABLE `tb_tunjangankaryawan`
  ADD PRIMARY KEY (`id_tunjangankaryawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_absenkaryawan`
--
ALTER TABLE `tb_absenkaryawan`
  MODIFY `id_absensikaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_aplikasi`
--
ALTER TABLE `tb_aplikasi`
  MODIFY `id_aplikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_bagian`
--
ALTER TABLE `tb_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tb_pelamar`
--
ALTER TABLE `tb_pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_rekrutmen`
--
ALTER TABLE `tb_rekrutmen`
  MODIFY `id_rekrutmen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_tunjangan`
--
ALTER TABLE `tb_tunjangan`
  MODIFY `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tunjangankaryawan`
--
ALTER TABLE `tb_tunjangankaryawan`
  MODIFY `id_tunjangankaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
