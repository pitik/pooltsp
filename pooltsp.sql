-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2015 pada 22.27
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `pooltsp`
--
CREATE DATABASE IF NOT EXISTS `pooltsp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pooltsp`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE IF NOT EXISTS `absen` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `idsupir` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `wkt_datang` time NOT NULL,
  `wkt_pulang` time NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `iddivisi` varchar(3) NOT NULL,
  `namadiv` varchar(30) NOT NULL,
  PRIMARY KEY (`iddivisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`iddivisi`, `namadiv`) VALUES
('1', 'ANG & AKUNTANSI'),
('10', 'T. INFORMASI'),
('11', 'PKBL'),
('12', 'KOPERASI'),
('13', 'BAPINROH'),
('14', 'BAPOR'),
('15', 'RENBANG'),
('16', 'PERPENTAS'),
('2', 'PERBANDAHARAAN'),
('3', 'INVESTASI'),
('4', 'UMUM'),
('5', 'S.D.M.'),
('6', 'PELAYANAN'),
('7', 'AKTUARIA & PEMASARAN'),
('8', 'S.P.I.'),
('9', 'SEK PER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_bbm`
--

CREATE TABLE IF NOT EXISTS `harga_bbm` (
  `idharga` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`idharga`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `harga_bbm`
--

INSERT INTO `harga_bbm` (`idharga`, `tanggal`, `harga`) VALUES
(2, '2015-02-07', 6500),
(3, '2015-02-07', 6500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
  `idmobil` int(11) NOT NULL AUTO_INCREMENT,
  `no_kendaraan` varchar(9) NOT NULL,
  `transmisi` enum('Manual','Automatic') NOT NULL,
  `merk` varchar(20) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status` enum('Ready','Not Ready') NOT NULL,
  PRIMARY KEY (`idmobil`),
  UNIQUE KEY `no_kendaraan` (`no_kendaraan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`idmobil`, `no_kendaraan`, `transmisi`, `merk`, `tahun`, `status`) VALUES
(1, 'B 201 TSP', 'Manual', 'Avanza', 2008, 'Ready'),
(2, 'B 202 TSP', 'Automatic', 'Innova FI', 2011, 'Ready'),
(3, 'B 111 TSP', 'Manual', 'kijang', 1999, 'Ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pool`
--

CREATE TABLE IF NOT EXISTS `pool` (
  `idpool` int(11) NOT NULL AUTO_INCREMENT,
  `no_spt` varchar(30) NOT NULL,
  `iddiv` varchar(3) NOT NULL,
  `pengemudi` varchar(30) NOT NULL,
  `idmobil` int(11) NOT NULL,
  `jns_tujuan` enum('Dalam Kota','Luar Kota') NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `wkt_pinjam` time NOT NULL,
  `wkt_kembali` time NOT NULL,
  `kartu_bbm` enum('Ya','Tidak') NOT NULL,
  `bbm_pakai` int(10) NOT NULL,
  `total_biaya` int(100) NOT NULL,
  PRIMARY KEY (`idpool`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `supir`
--

CREATE TABLE IF NOT EXISTS `supir` (
  `idsupir` int(3) NOT NULL AUTO_INCREMENT,
  `namasupir` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `status` enum('Ready','On Duty','Not Ready') NOT NULL,
  PRIMARY KEY (`idsupir`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `supir`
--

INSERT INTO `supir` (`idsupir`, `namasupir`, `alamat`, `nohp`, `status`) VALUES
(1, 'Suratman', 'jl akasia 67', '09876665', 'Not Ready'),
(2, 'Anton', 'alamat palsu', '0987867655', 'Not Ready');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
