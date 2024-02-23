-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2022 pada 20.52
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_bus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_bus`
--

CREATE TABLE `kelas_bus` (
  `id_bus` int(11) NOT NULL,
  `nama_kelas` enum('Ekonomi','Bisnis','Eksekutif') DEFAULT NULL,
  `gambar_bus` text DEFAULT NULL,
  `gambar_kabin` text DEFAULT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas_bus`
--

INSERT INTO `kelas_bus` (`id_bus`, `nama_kelas`, `gambar_bus`, `gambar_kabin`, `harga`) VALUES
(1, 'Ekonomi', 'bus_ekonomi.jpg', 'kabin_ekonomi.jpg', 20000),
(2, 'Bisnis', 'bus_bisnis.jpg', 'kabin_bisnis.jpg', 50000),
(3, 'Eksekutif', 'bus_executive.jpg', 'kabin_executive.jpg', 100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan_tiket`
--

CREATE TABLE `pesan_tiket` (
  `id_tiket` int(11) NOT NULL,
  `nama` varchar(70) DEFAULT NULL,
  `ktp` char(25) DEFAULT NULL,
  `telp` char(14) DEFAULT NULL,
  `jadwal_berangkat` date DEFAULT NULL,
  `jumlah_penumpang` int(3) DEFAULT NULL,
  `jumlah_lansia` int(3) DEFAULT NULL,
  `harga_tiket` varchar(50) NOT NULL,
  `total_bayar` varchar(50) NOT NULL,
  `id_bus` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan_tiket`
--

INSERT INTO `pesan_tiket` (`id_tiket`, `nama`, `ktp`, `telp`, `jadwal_berangkat`, `jumlah_penumpang`, `jumlah_lansia`, `harga_tiket`, `total_bayar`, `id_bus`) VALUES
(4, 'kuciing', '321312312312', '123123123', '2022-08-07', 2, 1, 'Rp 100.000', 'Rp. 290.000', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kelas_bus`
--
ALTER TABLE `kelas_bus`
  ADD PRIMARY KEY (`id_bus`);

--
-- Indeks untuk tabel `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_bus` (`id_bus`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kelas_bus`
--
ALTER TABLE `kelas_bus`
  MODIFY `id_bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesan_tiket`
--
ALTER TABLE `pesan_tiket`
  ADD CONSTRAINT `pesan_tiket_ibfk_1` FOREIGN KEY (`id_bus`) REFERENCES `kelas_bus` (`id_bus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
