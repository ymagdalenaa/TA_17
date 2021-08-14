-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Apr 2021 pada 07.30
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_ktp_scanner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE `image` (
  `no` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ktp`
--

CREATE TABLE `ktp` (
  `num` int(10) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `ttl` varchar(25) DEFAULT NULL,
  `jkl` varchar(25) DEFAULT NULL,
  `alamat` varchar(25) DEFAULT NULL,
  `rt` varchar(25) DEFAULT NULL,
  `kel` varchar(25) DEFAULT NULL,
  `kec` varchar(25) DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `status_user` varchar(25) DEFAULT NULL,
  `pekerjaan` varchar(25) DEFAULT NULL,
  `kewarganegaraan` varchar(25) DEFAULT NULL,
  `masa` varchar(25) DEFAULT NULL,
  `gambar` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ktp`
--

INSERT INTO `ktp` (`num`, `nik`, `nama`, `ttl`, `jkl`, `alamat`, `rt`, `kel`, `kec`, `agama`, `status_user`, `pekerjaan`, `kewarganegaraan`, `masa`, `gambar`) VALUES
(1, '162000123', 'oke', 'okawdsad', 'adSF', 'ds,afnladsfn', 'saffa', 'ADFDf', 'SAFASDF', 'adslfjsaldgj', 'lasfgnlsd', 'lkdasf', 'dlaskF', 'LDKMFLDSF', '891028.jpg'),
(2, '1620000111', 'Joseph Simatupunk', 'Jonggol/16-02-1995', 'Laki-laki', 'Jl. Baru ngga lama', '005', '008', 'Bojong Gede', 'Krislam', 'Janda', 'Kuli', 'Americano', 'Selamanya', 'Konsumsi EPIPHANIA 2019.p'),
(3, '162000f0111', 'Jfoseph Simatupunk', 'Jfonggol/16-02-1995', 'Lfaki-laki', 'Jl. Bafru ngga lama', '0f05', '00f8', 'Bojofng Gede', 'fKrislam', 'Janfda', 'Kufli', 'Amfericano', 'Sfelamanya', '1001945.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `ktp`
--
ALTER TABLE `ktp`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ktp`
--
ALTER TABLE `ktp`
  MODIFY `num` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
