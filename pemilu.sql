-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2020 pada 14.31
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemilu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_admin`
--

CREATE TABLE `db_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_admin`
--

INSERT INTO `db_admin` (`id`, `nama`, `username`, `password`, `img`) VALUES
(1, 'didik setiawan', 'admin', '$2y$10$.X3UuBbEPnaWM97dRaJpPeYf/tlzfGIPNRCvVR.mt6H6K9gCk.3Ji', 'wp.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_calon`
--

CREATE TABLE `tbl_calon` (
  `no_urut` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `jml_suara` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_calon`
--

INSERT INTO `tbl_calon` (`no_urut`, `nama`, `img`, `jml_suara`) VALUES
(1, 'minato namikaze', '63c626d973f83cca57ec2fc2129cdc6d.jpg', '0'),
(2, 'uciha itachi', 'RZvzzdtAcPFYndfHS4DV.jpg', '0'),
(3, 'uzumaki naruto', '114443.jpg', '1'),
(4, 'hatake kakasi', '518295.jpg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `walikelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id`, `kelas`, `walikelas`) VALUES
(1, '10 TKR 1', 'AHMAD'),
(3, '11 RPL 1', 'YUNI WINARSIH'),
(5, '12 APH 1', 'SIGIT WAHYUDI'),
(9, '11 PPT 3', 'TRI WAHYUNI'),
(10, '10 MULTIMEDIA 1', 'AGUS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `memilih` varchar(10) NOT NULL,
  `dipilih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nama`, `id_kelas`, `memilih`, `dipilih`) VALUES
('0878', 'didik', 9, 'tidak', 0),
('0945', 'bagong', 5, 'tidak', 0),
('09469', 'didik setiawan nn', 3, 'tidak', 0),
('0976', 'anies', 1, 'tidak', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_admin`
--
ALTER TABLE `db_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_calon`
--
ALTER TABLE `tbl_calon`
  ADD PRIMARY KEY (`no_urut`);

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `db_admin`
--
ALTER TABLE `db_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
