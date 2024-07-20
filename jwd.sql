-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 21 Jul 2023 pada 16.47
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jwd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesantiket`
--

CREATE TABLE `pesantiket` (
  `id` int(11) NOT NULL,
  `nama` varchar(400) NOT NULL,
  `nomoridentitas` int(11) NOT NULL,
  `nohp` int(11) NOT NULL,
  `tempatwisata` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL,
  `dewasa` int(11) NOT NULL,
  `anakanak` int(11) NOT NULL,
  `hargatiket` varchar(1000) NOT NULL,
  `total` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesantiket`
--

INSERT INTO `pesantiket` (`id`, `nama`, `nomoridentitas`, `nohp`, `tempatwisata`, `tanggal`, `dewasa`, `anakanak`, `hargatiket`, `total`) VALUES
(12, 'Mariposa', 321, 2147483647, 'Pantai Parangtritis', '2023-07-20', 1, 1, 'Rp 50,000', 'Rp 75,000'),
(13, 'Muhammad Anshori A', 2147483647, 2147483647, 'Pantai Parangtritis', '2023-07-26', 2, 1, 'Rp 50,000', 'Rp 125,000'),
(14, 'Fakhri Tyasmara', 2147483647, 2147483647, 'Bungker Kaliadem', '2023-07-22', 3, 2, 'Rp 100,000', 'Rp 400,000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesantiket`
--
ALTER TABLE `pesantiket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesantiket`
--
ALTER TABLE `pesantiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
