-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2021 pada 15.12
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipenmako`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `proyek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `role_id`, `proyek`) VALUES
(1, 'Admin', '$2y$10$TbSiDPlcg0LTwJUSt3auvuCOkl2lUP8xQPKwaH/P5/DqZus3PORUO', 1, 'Administrator'),
(2, 'User', '$2y$10$jEeV3cY8bz1v2idSvfj/.eklJNLIrQtOn630Im9eqVdYmGlks6LuK', 2, 'Pembangunan Gedung Belajar VI'),
(3, 'User2', '$2y$10$XtVoJtZPajAw5f.Cwr764OlkwbjdH7bJULrtnuHrNYcOhBf0mGOMu', 2, 'Pembangunan Mini Market UNIB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datum`
--

CREATE TABLE `datum` (
  `id` int(11) NOT NULL,
  `namapemilik` varchar(255) NOT NULL,
  `namaproyek` varchar(255) NOT NULL,
  `lokasiproyek` varchar(255) NOT NULL,
  `ruasjalan` varchar(255) NOT NULL,
  `sumberdana` varchar(255) NOT NULL,
  `nokontrak` varchar(255) NOT NULL,
  `tglmulai` date NOT NULL,
  `tglselesai` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `datum`
--

INSERT INTO `datum` (`id`, `namapemilik`, `namaproyek`, `lokasiproyek`, `ruasjalan`, `sumberdana`, `nokontrak`, `tglmulai`, `tglselesai`, `created_at`, `updated_at`) VALUES
(1, 'Universitas Bengkulu', 'Pembangunan Gedung Belajar VI', 'Universitas Bengkulu', 'Jalan Ir Soekarno', 'Universitas Bengkulu', '112/SFD/2020/PROE-IX', '2020-12-01', '2020-12-30', NULL, '2020-12-06 03:48:33'),
(3, 'Universitas Bengkulu', 'Pembangunan Mini Market UNIB', 'Universitas Bengkulu', 'Jl. Mawar de Jong', 'Universitas Bengkulu', '123/DD/2020/UNIB', '2021-01-31', '2021-04-30', '2021-01-03 11:24:51', '2021-01-03 11:24:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `ktgnoitem` varchar(255) NOT NULL,
  `ktguraian` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `namaproyek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`ktgnoitem`, `ktguraian`, `id`, `namaproyek`) VALUES
('Divisi 01', 'Umum', 1, 'Pembangunan Gedung Belajar VI'),
('Divisi 02', 'Drainase', 2, 'Pembangunan Gedung Belajar VI'),
('Divisi 03', 'Pengecoran Tanah', 3, 'Pembangunan Gedung Belajar VI'),
('Divisi 04', 'Struktur', 4, 'Pembangunan Gedung Belajar VI'),
('Divisi 1.1', 'Umum', 15, 'Pembangunan Mini Market UNIB'),
('Divisi 05', 'Khusus', 17, 'Pembangunan Gedung Belajar VI'),
('Divisi 2.1', 'Struktur', 18, 'Pembangunan Mini Market UNIB');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecelakaankerja`
--

CREATE TABLE `kecelakaankerja` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `insiden` varchar(255) NOT NULL,
  `penyebab` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kronologi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `namaproyek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecelakaankerja`
--

INSERT INTO `kecelakaankerja` (`id`, `tgl`, `insiden`, `penyebab`, `keterangan`, `kronologi`, `foto`, `created_at`, `updated_at`, `namaproyek`) VALUES
(18, '2020-12-04', 'Test', 'Test ', 'Test', 'Test', 'Kebakaran.jpg', '2020-12-04 09:26:45', '2020-12-08 15:42:41', 'Pembangunan Gedung Belajar VI'),
(21, '2020-12-14', 'Test', 'Test', 'Test', 'Test', 'Crewmate_1.jpg', '2020-12-13 13:41:34', '2020-12-13 13:41:34', 'Pembangunan Gedung Belajar VI'),
(22, '2021-01-12', 'Testing Kecelakaan', 'Testing', 'Testing', 'Testing', 'Crewmate_2.jpg', '2021-01-06 12:57:16', '2021-01-06 12:57:16', 'Pembangunan Mini Market UNIB'),
(24, '2021-01-12', 'Testing User', 'Testing Ubah User', ' Testing Kecelakaan User', 'Testing Kecelakaan User', 'Crewmate_3.jpg', '2021-01-09 20:08:55', '2021-01-09 20:09:22', 'Pembangunan Gedung Belajar VI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progres`
--

CREATE TABLE `progres` (
  `id` int(11) NOT NULL,
  `tglmulai` date NOT NULL,
  `noitem` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tglselesai` date NOT NULL,
  `foto` varchar(255) NOT NULL,
  `namaproyek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `progres`
--

INSERT INTO `progres` (`id`, `tglmulai`, `noitem`, `keterangan`, `tglselesai`, `foto`, `namaproyek`) VALUES
(20, '2020-12-01', '1.00', 'Mobilisasi', '2020-12-24', 'photo_1.jpg', 'Pembangunan Gedung Belajar VI'),
(21, '2020-12-08', '1.22', 'Promote', '2020-12-12', 'photo_2.jpg', 'Pembangunan Gedung Belajar VI'),
(22, '2021-01-08', '1.12', 'Testing Divisi 01', '2021-01-12', 'Crewmate.jpg', 'Pembangunan Mini Market UNIB'),
(23, '2021-01-13', '5.15', 'Testing Div 5 User', '2021-01-15', 'Crewmate_4.jpg', 'Pembangunan Gedung Belajar VI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `timeline`
--

CREATE TABLE `timeline` (
  `id` int(11) NOT NULL,
  `ktgnoitem` varchar(255) NOT NULL,
  `noitem` decimal(19,2) NOT NULL,
  `uraian` varchar(255) NOT NULL,
  `harga` decimal(19,2) NOT NULL,
  `kuantitas` decimal(11,2) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `jmlharga` decimal(19,2) NOT NULL,
  `tglmulai` date NOT NULL,
  `tglselesai` date NOT NULL,
  `namaproyek` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `timeline`
--

INSERT INTO `timeline` (`id`, `ktgnoitem`, `noitem`, `uraian`, `harga`, `kuantitas`, `satuan`, `jmlharga`, `tglmulai`, `tglselesai`, `namaproyek`) VALUES
(1, 'Divisi 01', '1.00', 'Mobilisasi', '18000000.00', '1.00', 'ls', '18000000.00', '2020-12-01', '2020-12-31', 'Pembangunan Gedung Belajar VI'),
(3, 'Divisi 02', '2.13', 'Galian untuk drainase selokan dan saluran air', '40000.00', '1200.00', 'ls', '48000000.00', '2020-12-31', '2021-01-09', 'Pembangunan Gedung Belajar VI'),
(7, 'Divisi 03', '3.01', 'Galian Biasa', '12000.00', '100.00', 'Cm2', '1200000.00', '2021-01-09', '2021-01-23', 'Pembangunan Gedung Belajar VI'),
(8, 'Divisi 04', '4.01', 'Pasangan Batu', '14000.00', '400.00', 'Cm3', '5600000.00', '2021-01-23', '2021-02-06', 'Pembangunan Gedung Belajar VI'),
(17, 'Divisi 01', '1.22', 'Promote', '14000.00', '25.00', 'ls', '350000.00', '2020-12-07', '2020-12-14', 'Pembangunan Gedung Belajar VI'),
(18, 'Divisi 02', '2.34', 'Test Divisi 2', '120000.00', '10.00', 'M2', '1200000.00', '2020-12-09', '2020-12-17', 'Pembangunan Gedung Belajar VI'),
(20, 'Divisi 04', '4.34', 'Test Divisi 4', '25000.00', '2500.00', 'bh', '62500000.00', '2021-01-05', '2021-01-19', 'Pembangunan Gedung Belajar VI'),
(21, 'Divisi 01', '1.35', 'Persiapan Proyek', '14000.00', '100.00', 'ls', '1400000.00', '2020-12-03', '2020-12-05', 'Pembangunan Gedung Belajar VI'),
(22, 'Divisi 1.1', '1.12', 'Testing Divisi 01', '120000.00', '25.00', 'ls', '3000000.00', '2021-01-07', '2021-01-16', 'Pembangunan Mini Market UNIB'),
(24, 'Divisi 05', '5.12', 'Testing Div 5', '15000.00', '2500.00', 'bh', '37500000.00', '2021-01-06', '2021-01-09', 'Pembangunan Gedung Belajar VI'),
(25, 'Divisi 05', '5.15', 'Testing Div 5 User', '15000.00', '400.00', 'Cm3', '6000000.00', '2020-12-31', '2021-01-16', 'Pembangunan Gedung Belajar VI'),
(26, 'Divisi 2.1', '2.33', 'Penggalian Tanah', '14000.00', '25.00', 'ls', '350000.00', '2021-01-12', '2021-01-15', 'Pembangunan Mini Market UNIB');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datum`
--
ALTER TABLE `datum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kecelakaankerja`
--
ALTER TABLE `kecelakaankerja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `progres`
--
ALTER TABLE `progres`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ktgnoitem` (`ktgnoitem`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `datum`
--
ALTER TABLE `datum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `kecelakaankerja`
--
ALTER TABLE `kecelakaankerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `progres`
--
ALTER TABLE `progres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
