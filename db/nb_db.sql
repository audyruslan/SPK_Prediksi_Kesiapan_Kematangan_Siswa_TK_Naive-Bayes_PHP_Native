-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2022 pada 13.00
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nb_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `img_dir` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `img_dir`) VALUES
('audyruslan', '$2y$10$YJMlsasuDDlkgqAUS/.XdOeu/6/gPq1Z9dr1xAe.j40T8TtjfnD5S', 'Audy Ruslan', 'image/1638426625.png'),
('ulul', '$2y$10$yx.NciroE7CKrA0znb.rEOC/Yg69igsNZcPZTVcbpxFMfaxvLtgAm', 'Ulul Asmi', 'image/1668827500.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(256) NOT NULL,
  `usia` int(11) NOT NULL,
  `kemampuan_membaca` varchar(256) NOT NULL,
  `kemampuan_menulis` varchar(255) NOT NULL,
  `kemampuan_menghitung` varchar(255) NOT NULL,
  `kemandirian` varchar(255) NOT NULL,
  `kesiapan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_data`
--

INSERT INTO `tb_data` (`id`, `nama_lengkap`, `jenis_kelamin`, `usia`, `kemampuan_membaca`, `kemampuan_menulis`, `kemampuan_menghitung`, `kemandirian`, `kesiapan`) VALUES
(26, 'Kamila Syifa Azzahra', 'Perempuan', 5, 'Ya', 'Ya', 'Ya', 'Berkembang Sangat Baik (BSB)', 'Siap'),
(27, 'Raisa Arzafira ', 'Perempuan', 6, 'Ya', 'Ya', 'Ya', 'Berkembang Sangat Baik (BSB)', 'Siap'),
(28, 'Suci Ramadan', 'Perempuan', 6, 'Ya', 'Tidak', 'Tidak', 'Mulai Berkembang (MB)', 'Belum Siap'),
(29, 'Raisa', 'Perempuan', 6, 'Ya', 'Ya', 'Tidak', 'Berkembang Sangat Baik (BSB)', 'Siap'),
(30, 'Rania Putri ', 'Perempuan', 7, 'Tidak', 'Ya', 'Tidak', 'Mulai Berkembang (MB)', 'Belum Siap'),
(31, 'Putri Salsabila R Taher', 'Perempuan', 6, 'Ya', 'Ya', 'Ya', 'Berkembang Sangat Baik (BSB)', 'Siap'),
(32, 'Kirana Djatung', 'Perempuan', 6, 'Ya', 'Ya', 'Tidak', 'Berkembang Sangat Baik (BSB)', 'Siap'),
(33, 'Fauzia A Mangose', 'Perempuan', 6, 'Ya', 'Tidak', 'Tidak', 'Mulai Berkembang (MB)', 'Belum Siap'),
(34, 'Alvian Suwandi', 'Laki-laki', 7, 'Ya', 'Ya', 'Ya', 'Berkembang Sangat Baik (BSB)', 'Siap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kondisi`
--

CREATE TABLE `tb_kondisi` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kondisi`
--

INSERT INTO `tb_kondisi` (`id`, `nama_kriteria`, `kondisi`) VALUES
(27, 'Usia', '4'),
(28, 'Usia', '5'),
(29, 'Usia', '6'),
(30, 'Usia', '7'),
(31, 'Kemampuan Membaca', 'Ya'),
(32, 'Kemampuan Membaca', 'Tidak'),
(33, 'Kemampuan Menulis', 'Ya'),
(34, 'Kemampuan Menulis', 'Tidak'),
(35, 'Kemampuan Menghitung', 'Ya'),
(36, 'Kemampuan Menghitung', 'Tidak'),
(37, 'Kemandirian', 'Mulai Berkembang (MB)'),
(38, 'Kesiapan', 'Siap'),
(39, 'Kesiapan', 'Belum Siap'),
(40, 'Kemandirian', 'Berkembang Sesuai Harapan (BSH)'),
(41, 'Kemandirian', 'Berkembang Sangat Baik (BSB)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id`, `nama_kriteria`) VALUES
(13, 'Usia'),
(14, 'Kemampuan Membaca'),
(15, 'Kemampuan Menulis'),
(16, 'Kemampuan Menghitung'),
(17, 'Kemandirian'),
(18, 'Kesiapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `usia` int(11) NOT NULL,
  `tmp_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama_ayah` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `agama` varchar(256) NOT NULL,
  `pekerjaan_ayah` varchar(256) NOT NULL,
  `pekerjaan_ibu` varchar(256) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nama_lengkap`, `jenis_kelamin`, `usia`, `tmp_lahir`, `tgl_lahir`, `nama_ayah`, `nama_ibu`, `agama`, `pekerjaan_ayah`, `pekerjaan_ibu`, `status`) VALUES
(34, 'Kamila Syifa Azzahra', 'Perempuan', 5, 'Ampana', '2017-10-08', 'Roni Lamahuseng', 'Tiwi putri', 'Islam', 'Nelayan', 'IRT', 1),
(35, 'Raisa Arzafira ', 'Perempuan', 6, 'Ampana', '2016-01-25', 'Marlin dg Mappa', 'Siti Maryam', 'Islam', 'Nelayan', 'IRT', 1),
(36, 'Suci Ramadan', 'Perempuan', 6, 'Labuan', '2016-06-08', 'Junaedi Iskandar', 'Rinawati', 'Islam', 'Nelayan', 'IRT', 1),
(37, 'Raisa', 'Perempuan', 6, 'Labuan', '2016-03-21', 'Gazali', 'Yulia Tagiling', 'Islam', 'Nelayan', 'IRT', 1),
(38, 'Rania Putri ', 'Perempuan', 7, 'Tambu', '2015-04-28', 'Kahar M Ali', 'Riani ', 'Islam', 'Nelayan', 'IRT', 1),
(39, 'Putri Salsabila R Taher', 'Perempuan', 6, 'Dondo', '2016-07-13', 'Gusman Salim', 'Maswa dg Matajjeng', 'Islam', 'Nelayan', 'IRT', 1),
(40, 'Kirana Djatung', 'Perempuan', 6, 'Labuan', '2016-06-07', 'Hamka', 'Marni', 'Islam', 'Nelayan', 'IRT', 1),
(41, 'Fauzia A Mangose', 'Perempuan', 6, 'Labuan', '2016-06-08', 'Kevin ', 'Irma Wati', 'Islam', 'Nelayan', 'IRT', 1),
(42, 'Alvian Suwandi', 'Laki-laki', 7, 'Ampana', '2017-02-19', 'Erwin', 'Lilis Nur wati', 'Islam', 'Wiraswasta', 'IRT', 1),
(43, 'Farid', 'Laki-laki', 7, 'Labuan', '2017-03-26', 'Herman', 'Nur Intan', 'Islam', 'Nelayan', 'IRT', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_kriteria` (`nama_kriteria`);

--
-- Indeks untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
