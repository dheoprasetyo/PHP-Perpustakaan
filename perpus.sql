-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 06:52 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `npm` varchar(9) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelamin` enum('L','P') NOT NULL,
  `jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`npm`, `nama`, `kelas`, `tgl_lahir`, `kelamin`, `jurusan`) VALUES
('51416933', 'Dheo Prasetyo', '2IA01', '1998-12-20', 'L', 'Informatika'),
('66666666', 'tytyh', '3ia01', '2018-08-01', 'L', 'informatika');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(3) NOT NULL,
  `lokasi` enum('rak1','rak2','rak3') NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`, `lokasi`, `tgl_input`) VALUES
(1, 'Php ', 'Dheo', 'Dheo', '1993', '1344444', 10, 'rak1', '2018-08-01'),
(2, 'Belajar Laravel', 'Budi Raharjo', 'Informatika', '2016', '5555555555555', 4, 'rak3', '2018-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `npm` varchar(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_pinjam` varchar(30) NOT NULL,
  `tgl_kembali` varchar(30) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `judul`, `npm`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(2, 'Php ', '51416933', 'Dheo Prasetyo', '16-08-2018', '23-08-2018', 'Kembali'),
(3, 'Php ', '51416933', 'Dheo Prasetyo', '17-08-2018', '31-08-2018', 'Kembali'),
(4, 'Php ', '55', '4w', '17-08-2018', '24-08-2018', 'Pinjam'),
(5, 'Php ', '51416933', 'Dheo Prasetyo', '22-08-2018', '12-09-2018', 'Pinjam'),
(6, 'Belajar Laravel', '66666666', 'tytyh', '08-09-2018', '15-09-2018', 'Kembali'),
(7, 'Belajar Laravel', '66666666', 'tytyh', '08-09-2018', '15-09-2018', 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `level` varchar(20) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `level`, `foto`) VALUES
(1, 'admin', 'admin', 'Dheo PN', 'admin', 'u.jpg'),
(28, 'user', '$2y$10$9HwMKHapxYCILj6WIDqnHuE11wj/4ggS6RRFzvNYzdd1jp1VKx49W', 'Dheo', 'pegawai', 'dheo.jpg'),
(29, 'Dheo', '$2y$10$8lhj6kLyUMlVNmUrM9BOj.UUQD.SIwPJwbSBCDxMrmpmrNlfTg4BG', 'Dheo Prasetyo', 'admin', 'dheo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
