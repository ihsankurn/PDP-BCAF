-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jan 2025 pada 09.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kredit_motor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `dealer` varchar(100) DEFAULT NULL,
  `merk_kendaraan` varchar(100) DEFAULT NULL,
  `model_kendaraan` varchar(100) DEFAULT NULL,
  `tipe_kendaraan` varchar(100) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `harga` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `dealer`, `merk_kendaraan`, `model_kendaraan`, `tipe_kendaraan`, `warna`, `harga`) VALUES
(1, 'Sukmajaya', 'Honda', 'HRV', 'SUV', 'Hitam', 250000000.00),
(2, 'Sukmajaya', 'Honda', 'HRV', 'SUV', 'Hitam', 9999999999999.99);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `id_konsumen` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `status_perkawinan` varchar(20) DEFAULT NULL,
  `data_pasangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`id_konsumen`, `nama`, `nik`, `tanggal_lahir`, `status_perkawinan`, `data_pasangan`) VALUES
(1, 'Ihsan Kurniawan', '12344566788', '2000-12-31', 'Belum Menikah', '-'),
(2, 'saddsad', '124141211', '2222-12-12', 'Belum Menikah', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_konsumen` int(11) DEFAULT NULL,
  `id_kendaraan` int(11) DEFAULT NULL,
  `down_payment` decimal(15,2) DEFAULT NULL,
  `lama_kredit` int(11) DEFAULT NULL,
  `angsuran` decimal(15,2) DEFAULT NULL,
  `status_pengajuan` enum('Pending','Approved','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_konsumen`, `id_kendaraan`, `down_payment`, `lama_kredit`, `angsuran`, `status_pengajuan`) VALUES
(1, 1, 1, 25000000.00, 12, 3000000.00, 'Approved'),
(2, 2, 2, 9999999999999.99, 12, 11111111.00, 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_konsumen`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_konsumen` (`id_konsumen`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `id_konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`id_konsumen`) REFERENCES `konsumen` (`id_konsumen`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
