-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 03 Jan 2022 pada 19.07
-- Versi server: 5.7.34
-- Versi PHP: 7.4.21

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
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `kode_guru`, `nip`, `nama_guru`, `foto_guru`, `password`) VALUES
(1, 'G000001', '20210001', 'Imam Budi, S.Pd', '1641022107_87fa93639ce97307b8f8.png', '1234'),
(2, 'G000002', '20210002', 'Tanto, S.Pd', '1641023074_d8f4b6c0f2fca0a47491.png', '1234'),
(3, 'G000003', '20210003', 'Agus Ahmad, S.Pd', '1641023111_167ae222f2a9b55dd50c.png', '1234'),
(16, 'G000004', '20210004', 'Rohim, S.Pd', '1641027080_602c016695b7e97d24c5.png', '1234'),
(17, 'G000005', '20210005', 'Octavian Yudha Mahendra, S.Pd', '1641036245_91d240697a7c1cd20046.png', '1234'),
(18, 'G000006', '20210006', 'Achmad Syadidul Fahim, S.Pd', '1641036293_276f1280a1ab678a5445.png', '1234'),
(19, 'G000007', '20210007', 'Dimas Wahyu Pratama, S.Pd', '1641036326_0e5f22f70338f9b63cd4.png', '1234'),
(20, 'G000008', '20210008', 'Ryan Hartadi, S.Pd', '1641036377_2615215e0f43d09c6f43.png', '1234'),
(21, 'G000009', '20210009', 'Ady Nugraha Putra Ramadhan, S.Pd', '1641036411_2bb1e73e2da84900aea7.png', '1234'),
(22, 'G000010', '20210010', 'Titik Rosanti, S.Pd', '1641064639_5016a6e94df43e2bbf69.png', '1234'),
(33, 'G000011', '20210011', 'Cicilia Shelin Novitasari, S.Pd', '1641064708_8b2ab588e49a5b0eff40.png', '1234'),
(34, 'G000012', '20210012', 'Maulidya Priswanti, S.Pd', '1641064777_71150e49b176799fadd5.png', '1234'),
(35, 'G000013', '20210013', 'Dicky Irqi Zulkarnaen, S.Pd', '1641064828_ab5fec3963cce4811e06.png', '1234'),
(36, 'G000014', '20210014', 'Meilinnia Fortuna Astri, S.Pd	', '1641064877_8f3a09a67d93a130bf7b.png', '1234'),
(37, 'G000015', '20210015', 'Hendry Dwi Nurmansyah Idris, S.Pd', '1641064934_c26cf92b4bf70840fd11.png', '1234'),
(38, 'G000016', '20210016', 'Syifa\'Urrosydah At-Thohiroh, S.Pd	', '1641064980_8612f3b78caff267425f.png', '1234'),
(39, 'G000017', '20210017', 'Karina Oktaviani Agustin, S.Pd	', '1641065058_2b1ea140dd348a3dc10a.png', '1234'),
(40, 'G000018', '20210018', 'Denny Eko Satrijo, S.Pd	', '1641065099_e0e41448e83c19238bc4.png', '1234'),
(41, 'G000019', '20210019', 'Rudi Ibrahimi, S.Pd', '1641065141_4fa50526c037bf782fc7.png', '1234'),
(42, 'G000020', '20210020', 'Gulam Mubarik Ahmad, S.Pd	', '1641065187_5a8d073e07a5c8364b6a.png', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_jurusan` int(2) DEFAULT NULL,
  `id_ta` int(4) DEFAULT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  `id_mapel` int(11) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `id_ruangan` int(2) DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_jurusan`, `id_ta`, `id_fakultas`, `id_mapel`, `id_guru`, `id_ruangan`, `hari`, `waktu`, `quota`) VALUES
(11, 20, 1, 8, 45, 1, 11, 'Senin', '07:00-09:00', 30),
(12, 20, 1, 8, 53, 2, 11, 'Senin', '09:30-11:00', 30),
(13, 20, 1, 8, 54, 3, 11, 'Senin', '13:00-14:00', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_krs`
--

CREATE TABLE `tbl_krs` (
  `id_krs` int(11) NOT NULL,
  `id_siswa` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_ta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_krs`
--

INSERT INTO `tbl_krs` (`id_krs`, `id_siswa`, `id_jadwal`, `id_ta`) VALUES
(1, 25, 11, 1),
(2, 25, 12, 1),
(3, 25, 13, 1);

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
(11, 4, 'A1'),
(12, 4, 'A2'),
(13, 4, 'A3'),
(14, 5, 'B1'),
(15, 5, 'B2'),
(16, 5, 'B3'),
(17, 6, 'C1'),
(18, 6, 'C2'),
(19, 6, 'C3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_fakultas` int(11) DEFAULT NULL,
  `id_jurusan` int(2) DEFAULT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto_siswa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `id_fakultas`, `id_jurusan`, `nis`, `nama_siswa`, `password`, `foto_siswa`) VALUES
(25, 8, 20, 'E41171991', 'Febrero Araya K', '1234', '1641113070_a3eebcc95f7e15caa789.png'),
(26, 8, 20, 'E41171992', 'Anisa Nur Isfani', '1234', '1641113101_097ff38e2e02fdea9ce2.png'),
(27, 9, 20, 'E41171993', 'Ahmad Dandi Irawan', '1234', '1641113123_64cb36823fc87634dbb0.png'),
(28, 9, 20, 'E41171994', 'Irfan Giovani', '1234', '1641113154_0a788d2ed629612b59fe.png'),
(29, 10, 20, 'E41171995', 'Ilham Robby Sanjaya', '1234', '1641113196_1f6560be26d095e9e97b.png'),
(30, 11, 21, 'E41171996', 'Yudi Iriyanto', '1234', '1641113236_440111bb47fa1af022b8.png'),
(31, 11, 21, 'E41171997', 'Yudistiono', '1234', '1641113258_4351bae861b79d27b4cb.png'),
(32, 12, 21, 'E41171998', 'Fabryzal Adam Pramudya', '1234', '1641113291_478580ff569024ed0a5e.png'),
(33, 12, 21, 'E41171999', 'Bagus Duwi Prasetiyo', '1234', '1641113329_d40ae612407578a9bf05.png'),
(34, 13, 21, 'E41172000', 'Rizki Widya Pratama', '1234', '1641113385_ec28a0f5095ba3451f94.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `id_jurusan` int(2) DEFAULT NULL,
  `id_guru` int(11) DEFAULT NULL,
  `fakultas` varchar(50) DEFAULT NULL,
  `tahun_angkatan` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `id_jurusan`, `id_guru`, `fakultas`, `tahun_angkatan`) VALUES
(8, 20, 1, 'A', 2021),
(9, 20, 2, 'B', 2021),
(10, 20, 22, 'C', 2021),
(11, 21, 33, 'A', 2021),
(12, 21, 34, 'B', 2021),
(13, 21, 35, 'C', 2021);

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
(4, 'Gedung A'),
(5, 'Gedung B'),
(6, 'Gedung C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(2) NOT NULL,
  `id_kelas` int(2) DEFAULT NULL,
  `ka_jurusan` varchar(255) DEFAULT NULL,
  `kode_jurusan` varchar(10) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `id_kelas`, `ka_jurusan`, `kode_jurusan`, `jurusan`) VALUES
(20, 4, 'Imam Budi, S.Pd', 'IPA-10', 'Ilmu Pengetahuan Alam'),
(21, 4, 'Tanto, S.Pd', 'IPS-10', 'Ilmu Pengetahuan Sosial'),
(22, 4, 'Agus Ahmad, S.Pd', 'BHS-10', 'Bahasa'),
(23, 5, 'Rohim, S.Pd', 'IPA-11', 'Ilmu Pengetahuan Alam'),
(24, 5, 'Octavian Yudha Mahendra, S.Pd', 'IPS-11', 'Ilmu Pengetahuan Sosial'),
(25, 5, 'Achmad Syadidul Fahim, S.Pd', 'BHS-11', 'Bahasa'),
(26, 6, 'Dimas Wahyu Pratama, S.Pd', 'IPA-12', 'Ilmu Pengetahuan Alam'),
(27, 6, 'Ryan Hartadi, S.Pd', 'IPS-12', 'Ilmu Pengetahuan Sosial'),
(28, 6, 'Ady Nugraha Putra Ramadhan, S.Pd', 'BHS-12', 'Bahasa');

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
(4, 'Kelas 10'),
(5, 'Kelas 11'),
(6, 'Kelas 12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `kode_mapel` varchar(10) DEFAULT NULL,
  `mapel` varchar(255) DEFAULT NULL,
  `kategori` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `id_jurusan`, `kode_mapel`, `mapel`, `kategori`, `semester`) VALUES
(45, 20, 'IPA10-01', 'MATEMATIKA', 'Wajib', 'Ganjil'),
(46, 20, 'IPA10-02', 'KIMIA', 'Wajib', 'Ganjil'),
(47, 20, 'IPA10-03', 'BIOLOGI', 'Wajib', 'Ganjil'),
(48, 20, 'IPA10-04', 'FISIKA', 'Wajib', 'Ganjil'),
(49, 21, 'IPS10-01', 'SOSIOLOGI', 'Wajib', 'Ganjil'),
(50, 21, 'IPS10-02', 'GEOGRAFI', 'Wajib', 'Ganjil'),
(51, 21, 'IPS10-03', 'EKONOMI', 'Wajib', 'Ganjil'),
(52, 21, 'IPS10-04', 'Sejarah', 'Wajib', 'Ganjil'),
(53, 20, 'IPA10-05', 'AGAMA', 'Wajib', 'Ganjil'),
(54, 20, 'IPA10-06', 'Sejarah Indonesia', 'Wajib', 'Ganjil'),
(55, 20, 'IPA10-07', 'Olahraga', 'Wajib', 'Ganjil'),
(56, 20, 'IPA10-08', 'Seni Musik & Rupa', 'Wajib', 'Ganjil'),
(57, 20, 'IPA10-09', 'Kewirausahaan (KWU)', 'Wajib', 'Ganjil'),
(58, 20, 'IPA10-10', 'MATEMATIKA', 'Wajib', 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ta`
--

CREATE TABLE `tb_ta` (
  `id_ta` int(4) NOT NULL,
  `ta` varchar(10) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_ta`
--

INSERT INTO `tb_ta` (`id_ta`, `ta`, `semester`, `status`) VALUES
(1, '2021/2022', 'Ganjil', 1),
(2, '2021/2022', 'Genap', 0),
(3, '2022/2023', 'Ganjil', 0),
(4, '2022/2023', 'Genap', 0),
(5, '2023/2024', 'Ganjil', 0),
(6, '2023/2024', 'Genap', 0);

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
(1, 'Febrero', 'febrero', 'febrero', '1640592511_41cd1a65f2ead410cf18.png'),
(2, 'Fadhiel', 'fadhiel', 'fadhiel', '1640764935_62f1103c161f87e0d866.png'),
(3, 'Irfan', 'irfan', 'irfan', '1640765159_15e60186e2f547d334c0.png'),
(4, 'Ryan', 'ryan', 'ryan', '1640765181_6c0c2806b9be8166b1ca.png'),
(5, 'Zalfa', 'zalfa', 'zalfa', '1640765204_26728752ce73b5d0b28b.png'),
(6, 'Fitri', 'fitri', 'fitri', '1640765244_f349899da5a3282bf80f.png'),
(7, 'Tyas', 'tyas', 'tyas', '1640765278_108dae9caba9c459b0c9.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indeks untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

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
-- AUTO_INCREMENT untuk tabel `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_krs`
--
ALTER TABLE `tbl_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id_gedung` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `tb_ta`
--
ALTER TABLE `tb_ta`
  MODIFY `id_ta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
