-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Des 2021 pada 21.31
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int(11) NOT NULL,
  `kode_guru` varchar(10) DEFAULT NULL,
  `nip` varchar(18) DEFAULT NULL,
  `nama_guru` varchar(40) DEFAULT NULL,
  `foto_guru` varchar(255) DEFAULT NULL,
  `password` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `kode_guru`, `nip`, `nama_guru`, `foto_guru`, `password`) VALUES
(1, 'G000001', '111111111', 'Drs. Rahmat Basuki S.Pd ', 'guru 1.png', 1234),
(2, 'G000002', '111111112', 'Yuswa Leksmana S.Pd', 'guru 2.png', 1234);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_jurusan` int(2) DEFAULT NULL,
  `id_ta` int(4) DEFAULT NULL,
  `id_kelas` int(2) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `id_ruangan` int(2) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_jurusan`, `id_ta`, `id_kelas`, `id_mapel`, `id_guru`, `hari`, `waktu`, `id_ruangan`, `quota`) VALUES
(1, 1, 1, 1, 1, 1, 'senin', '08:00-10:00', 3, 32),
(2, 1, 1, 1, 1, 2, 'selasa', '08:00-10:00', 4, 32),
(3, 2, 1, 2, 2, 2, 'selasa', '08:00-10:00', 5, 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ruangan`
--

CREATE TABLE `tbl_ruangan` (
  `id_ruangan` int(2) NOT NULL,
  `id_gedung` int(2) DEFAULT NULL,
  `ruangan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruangan`, `id_gedung`, `ruangan`) VALUES
(3, 1, 'A3'),
(4, 1, 'A4'),
(5, 2, 'A5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `fakultas` varchar(50) DEFAULT NULL,
  `id_jurusan` int(2) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `tahun_angkatan` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `fakultas`, `id_jurusan`, `id_guru`, `tahun_angkatan`) VALUES
(1, 'MTK-A', 1, 1, 2021),
(2, 'MTK-B', 1, 2, 2021);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_gedung`
--

CREATE TABLE `tb_gedung` (
  `id_gedung` int(2) NOT NULL,
  `gedung` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_gedung`
--

INSERT INTO `tb_gedung` (`id_gedung`, `gedung`) VALUES
(1, 'Gedung A'),
(2, 'Gedung B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(2) NOT NULL,
  `id_kelas` int(2) DEFAULT NULL,
  `kode_jurusan` varchar(10) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `ka_jurusan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `id_kelas`, `kode_jurusan`, `jurusan`, `ka_jurusan`) VALUES
(1, 1, 'IPA', 'ilmu pengetahuan alam', 'Yuswa Leksmana S.Pd'),
(2, 2, 'IPS', 'ilmu pengetahua sosial', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(2) NOT NULL,
  `kelas` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'Kelas 12'),
(2, 'Kelas 11'),
(3, 'Kelas 10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(225) DEFAULT NULL,
  `mapel` varchar(10) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `id_jurusan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `kode_mapel`, `mapel`, `kategori`, `semester`, `id_jurusan`) VALUES
(1, '0011', 'IPA', 'wajib', 'Ganjil', 2),
(2, '0033', 'IPS', 'wajib', 'Genap', 1),
(3, '0044', 'FISIKA', 'wajib', 'Ganjil', 2),
(4, '0066', 'KIMIA', 'wajib', 'Genap', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ta`
--

CREATE TABLE `tb_ta` (
  `id_ta` int(4) NOT NULL,
  `ta` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ta`
--

INSERT INTO `tb_ta` (`id_ta`, `ta`, `semester`, `status`) VALUES
(1, '2021/2022', 'Ganjil', 1),
(2, '2022/2023', 'Genap', 0),
(3, '2023/2024', 'Ganjil', 0),
(4, '2024/2025', 'Ganjil', 0),
(6, '2021/2022', 'Genap', 0),
(7, '2022/2023', 'Ganjil', 0),
(8, '2023/2024', 'Genap', 0),
(9, '2024/2025', 'Genap', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `foto`) VALUES
(1, 'Febrero', 'admin', 'admin', 'foto1.png'),
(2, 'Araya', 'guru', 'guru', 'foto2.png'),
(3, 'Kusuma', 'siswa', 'siswa', 'foto3.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indeks untuk tabel `tb_gedung`
--
ALTER TABLE `tb_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indeks untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_ta`
--
ALTER TABLE `tb_ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id_gedung` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_ta`
--
ALTER TABLE `tb_ta`
  MODIFY `id_ta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
