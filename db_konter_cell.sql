-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2022 pada 09.24
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_konter_cell`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_web`
--

CREATE TABLE `admin_web` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tanggal_dibuat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin_web`
--

INSERT INTO `admin_web` (`id_admin`, `nama`, `email`, `username`, `password`, `tanggal_dibuat`) VALUES
(1, 'asd', 'ads@gmail.com', 'asd', '$2y$10$u6B8fCgBkH3.kcVK5roWPeCso8YUR2Fhd19501G1opGhIzCZdFLGO', '2022-08-03 18:39:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aksesoris`
--

CREATE TABLE `tb_aksesoris` (
  `id_aksesoris` int(10) NOT NULL,
  `nama_aksesoris` varchar(50) DEFAULT NULL,
  `jenis_aksesoris` varchar(50) DEFAULT NULL,
  `stok` int(4) DEFAULT NULL,
  `harga_asli` int(5) DEFAULT NULL,
  `harga_jual` int(5) DEFAULT NULL,
  `tanggal_perbarui` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_axis`
--

CREATE TABLE `tb_axis` (
  `id_axis` int(10) NOT NULL,
  `nama_paket` varchar(50) DEFAULT NULL,
  `jenis_paket` varchar(10) DEFAULT NULL,
  `masa_aktif` varchar(10) DEFAULT NULL,
  `harga_asli` int(6) DEFAULT NULL,
  `harga_jual` int(6) DEFAULT NULL,
  `tanggal_perbarui` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_indosat`
--

CREATE TABLE `tb_indosat` (
  `id_indosat` int(10) NOT NULL,
  `nama_paket` varchar(50) DEFAULT NULL,
  `jenis_paket` varchar(10) DEFAULT NULL,
  `masa_aktif` varchar(10) DEFAULT NULL,
  `harga_asli` int(6) DEFAULT NULL,
  `harga_jual` int(6) DEFAULT NULL,
  `tanggal_perbarui` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keuangan`
--

CREATE TABLE `tb_keuangan` (
  `id_keuangan` int(10) NOT NULL,
  `tanggal_keuangan` date NOT NULL DEFAULT current_timestamp(),
  `nama_pengisi` varchar(50) DEFAULT NULL,
  `pemasukan` int(10) DEFAULT NULL,
  `pengeluaran` int(10) DEFAULT NULL,
  `keuntungan` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id_pembelian` int(10) NOT NULL,
  `nama_pembelian` varchar(50) DEFAULT NULL,
  `total_pembelian` int(6) DEFAULT NULL,
  `diskon` int(6) DEFAULT NULL,
  `uang_bayar` int(6) DEFAULT NULL,
  `uang_kembalian` int(6) DEFAULT NULL,
  `tanggal_pembelian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_smartfren`
--

CREATE TABLE `tb_smartfren` (
  `id_smartfren` int(10) NOT NULL,
  `nama_paket` varchar(50) DEFAULT NULL,
  `jenis_paket` varchar(10) DEFAULT NULL,
  `masa_aktif` varchar(10) DEFAULT NULL,
  `harga_asli` int(6) DEFAULT NULL,
  `harga_jual` int(6) DEFAULT NULL,
  `tanggal_perbarui` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_telkomsel`
--

CREATE TABLE `tb_telkomsel` (
  `id_telkomsel` int(10) NOT NULL,
  `nama_paket` varchar(50) DEFAULT NULL,
  `jenis_paket` varchar(10) DEFAULT NULL,
  `masa_aktif` varchar(16) DEFAULT NULL,
  `harga_asli` int(6) DEFAULT NULL,
  `harga_jual` int(6) DEFAULT NULL,
  `tanggal_perbarui` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tri`
--

CREATE TABLE `tb_tri` (
  `id_tri` int(10) NOT NULL,
  `nama_paket` varchar(50) DEFAULT NULL,
  `jenis_paket` varchar(10) DEFAULT NULL,
  `masa_aktif` varchar(50) DEFAULT NULL,
  `harga_asli` int(6) DEFAULT NULL,
  `harga_jual` int(6) DEFAULT NULL,
  `tanggal_perbarui` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_xl`
--

CREATE TABLE `tb_xl` (
  `id_xl` int(10) NOT NULL,
  `nama_paket` varchar(50) DEFAULT NULL,
  `jenis_paket` varchar(10) DEFAULT NULL,
  `masa_aktif` varchar(10) DEFAULT NULL,
  `harga_asli` int(6) DEFAULT NULL,
  `harga_jual` int(6) DEFAULT NULL,
  `tanggal_perbarui` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_web`
--
ALTER TABLE `admin_web`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_aksesoris`
--
ALTER TABLE `tb_aksesoris`
  ADD PRIMARY KEY (`id_aksesoris`);

--
-- Indeks untuk tabel `tb_axis`
--
ALTER TABLE `tb_axis`
  ADD PRIMARY KEY (`id_axis`);

--
-- Indeks untuk tabel `tb_indosat`
--
ALTER TABLE `tb_indosat`
  ADD PRIMARY KEY (`id_indosat`);

--
-- Indeks untuk tabel `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `tb_smartfren`
--
ALTER TABLE `tb_smartfren`
  ADD PRIMARY KEY (`id_smartfren`);

--
-- Indeks untuk tabel `tb_telkomsel`
--
ALTER TABLE `tb_telkomsel`
  ADD PRIMARY KEY (`id_telkomsel`);

--
-- Indeks untuk tabel `tb_tri`
--
ALTER TABLE `tb_tri`
  ADD PRIMARY KEY (`id_tri`);

--
-- Indeks untuk tabel `tb_xl`
--
ALTER TABLE `tb_xl`
  ADD PRIMARY KEY (`id_xl`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_web`
--
ALTER TABLE `admin_web`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_aksesoris`
--
ALTER TABLE `tb_aksesoris`
  MODIFY `id_aksesoris` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_axis`
--
ALTER TABLE `tb_axis`
  MODIFY `id_axis` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_indosat`
--
ALTER TABLE `tb_indosat`
  MODIFY `id_indosat` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_keuangan`
--
ALTER TABLE `tb_keuangan`
  MODIFY `id_keuangan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id_pembelian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_smartfren`
--
ALTER TABLE `tb_smartfren`
  MODIFY `id_smartfren` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_telkomsel`
--
ALTER TABLE `tb_telkomsel`
  MODIFY `id_telkomsel` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_tri`
--
ALTER TABLE `tb_tri`
  MODIFY `id_tri` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_xl`
--
ALTER TABLE `tb_xl`
  MODIFY `id_xl` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
