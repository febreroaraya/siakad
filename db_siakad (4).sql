-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 01 Jan 2022 pada 19.39
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
  `id_kelas` int(2) DEFAULT NULL,
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

INSERT INTO `tbl_jadwal` (`id_jadwal`, `id_jurusan`, `id_ta`, `id_kelas`, `id_mapel`, `id_guru`, `id_ruangan`, `hari`, `waktu`, `quota`) VALUES
(1, 1, 1, 1, 1, 1, 3, 'senin', '08:00-10:00', 32),
(2, 1, 1, 1, 1, 2, 4, 'senin', '10:00-12:00', 32),
(3, 1, 1, 1, 1, 1, 4, 'senin', '10:00-12:00', 32),
(4, 1, 1, 1, 1, 2, 3, 'senin', '08:00-10:00', 32);

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
(1, 1, 'A1'),
(2, 1, 'A2'),
(3, 1, 'A3'),
(4, 2, 'B1'),
(5, 2, 'B2'),
(6, 2, 'B3'),
(7, 3, 'C1'),
(8, 3, 'C2'),
(9, 3, 'C3');

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
(1, 1, 1, 'E41171991', 'Febrero Araya K', '1234', '1641021481_7595b2a782597ab2498c.png'),
(5, 1, 1, 'E41172071', 'Anisa Nur Isfani', '1234', '1641035686_86c202b6129f82afa243.png'),
(6, 1, 1, 'E41180087', 'Ahmad Dandi Irawan', '1234', '1641035722_3e10f1330bb6696a90ef.png'),
(7, 1, 1, 'E41180577', 'Irfan Giovani', '1234', '1641035762_a91b54fec2ded4e01f86.png'),
(8, 1, 1, 'E41180650', 'Ilham Robby Sanjaya', '1234', '1641035798_0e84c984ad6b783df245.png'),
(9, 2, 2, 'E41171992', 'Yudi Iriyanto', '1234', '1641035881_34dc68de3c6f86cae322.png'),
(10, 2, 2, 'E41180651', 'Yudistiono', '1234', '1641035919_1df7e0b95c67029831b7.png'),
(11, 2, 2, 'E41172072', 'Fabryzal Adam Pramudya', '1234', '1641035949_23594e5a229dbb9be37d.png'),
(12, 2, 2, 'E41180088', 'Bagus Duwi Prasetiyo', '1234', '1641035980_bc5986bc1f27728f87ae.png'),
(13, 2, 2, 'E41180578', 'Rizki Widya Pratama', '1234', '1641036009_cf9e093fedb7c935938d.png'),
(14, 3, 3, 'E41180652', 'Febiola Putri Yunita', '1234', '1641036038_d9537482c424e8a739cf.png'),
(15, 3, 3, 'E41180653', 'Fauziyatur Rohmah', '1234', '1641036067_e45cb4b8e855a0b7fa89.png'),
(16, 3, 3, 'E41180654', 'Muhammad Farhan Nur Pratama', '1234', '1641036101_f5cc437852eb2cee5d07.png'),
(17, 3, 3, 'E41180655', 'Lambang Arinanda Hadi', '1234', '1641036127_1607f3a884f69014e993.png'),
(18, 3, 3, 'E41180656', 'Ryan Chandra Budipratama', '1234', '1641036172_5342208503d760b3ad19.png'),
(19, 7, 2, 'E41180127', 'Muhammad Fistan Salsa Bila', '1234', '1641046509_2d63fd4e2c036192f2f1.png'),
(20, 7, 2, 'E41180137', 'Vidian Taurus Sandi', '1234', '1641046538_0e2f70dfd467c805344a.png'),
(21, 7, 2, 'E41180163', 'Nafis Hibatullah Lestamanta', '1234', '1641046583_22438916323f76375afd.png'),
(22, 7, 2, 'E41180167', 'Muhammad Nizarudin', '1234', '1641046617_6fdaa8ea3036856570bc.png'),
(23, 7, 2, 'E41180169', 'Mochamad Nurullah', '1234', '1641046651_28a219ef92426a3bcbcd.png');

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
(1, 1, 1, 'A', 2020),
(2, 1, 2, 'B', 2020),
(3, 1, 3, 'C', 2020),
(7, 2, 16, 'A', 2020);

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
(2, 'Gedung B'),
(3, 'Gedung C');

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
(10, 1, 'Imam Budi, S.Pd', 'IPA-10', 'Ilmu Pengetahuan Alam'),
(12, 1, 'Tanto, S.Pd', 'IPS-10', 'Ilmu Pengetahuan Sosial'),
(13, 1, 'Agus Ahmad, S.Pd', 'BHS-10', 'Bahasa'),
(14, 2, 'Rohim, S.Pd', 'IPA-11', 'Ilmu Pengetahuan Alam'),
(15, 2, 'Octavian Yudha Mahendra, S.Pd', 'IPS-11', 'Ilmu Pengetahuan Sosial'),
(16, 2, 'Achmad Syadidul Fahim, S.Pd', 'BHS-11', 'Bahasa'),
(17, 3, 'Dimas Wahyu Pratama, S.Pd', 'IPA-12', 'Ilmu Pengetahuan Alam'),
(18, 3, 'Ryan Hartadi, S.Pd', 'IPS-12', 'Ilmu Pengetahuan Sosial'),
(19, 3, 'Ady Nugraha Putra Ramadhan, S.Pd', 'BHS-12', 'Bahasa');

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
(1, 'Kelas 10'),
(2, 'Kelas 11'),
(3, 'Kelas 12');

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
(11, 10, 'IPA10-01', 'MATEMATIKA', 'Wajib', 'Ganjil'),
(12, 10, 'IPA10-02', 'KIMIA', 'Wajib', 'Ganjil'),
(13, 10, 'IPA10-03', 'FISIKA', 'Wajib', 'Ganjil'),
(14, 10, 'IPA10-04', 'Bahasa Indonesia', 'Wajib', 'Ganjil'),
(15, 10, 'IPA10-05', 'Bahasa Inggris', 'Wajib', 'Ganjil'),
(16, 10, 'IPA10-06', 'Pendidikan Kewarganegaraan', 'Wajib', 'Ganjil'),
(17, 10, 'IPA10-07', 'BIOLOGI', 'Wajib', 'Ganjil'),
(18, 10, 'IPA10-08', 'AGAMA', 'Wajib', 'Ganjil'),
(19, 10, 'IPA10-09', 'OLAHRAGA', 'Wajib', 'Ganjil'),
(20, 10, 'IPA10-10', 'Sejarah Indonesia', 'Wajib', 'Ganjil'),
(21, 10, 'IPA10-11', 'Seni Musik & Rupa', 'Wajib', 'Ganjil'),
(22, 12, 'IPS10-01', 'AGAMA', 'Wajib', 'Ganjil'),
(23, 12, 'IPS10-02', 'Pendidikan Kewarganegaraan', 'Wajib', 'Ganjil'),
(24, 12, 'IPS10-03', 'Bahasa Indonesia', 'Wajib', 'Ganjil'),
(25, 12, 'IPS10-04', 'Bahasa Inggris', 'Wajib', 'Ganjil'),
(26, 12, 'IPS10-05', 'MATEMATIKA', 'Wajib', 'Ganjil'),
(27, 12, 'IPS10-06', 'Sejarah Indonesia', 'Wajib', 'Ganjil'),
(28, 12, 'IPS10-07', 'Seni Musik & Rupa', 'Wajib', 'Ganjil'),
(29, 12, 'IPS10-08', 'OLAHRAGA', 'Wajib', 'Ganjil'),
(30, 12, 'IPS10-09', 'Sejarah', 'Wajib', 'Ganjil'),
(31, 12, 'IPS10-10', 'GEOGRAFI', 'Wajib', 'Ganjil'),
(32, 12, 'IPS10-11', 'SOSIOLOGI', 'Wajib', 'Ganjil'),
(33, 12, 'IPS10-12', 'EKONOMI', 'Wajib', 'Ganjil'),
(34, 14, 'IPA11-01', 'MATEMATIKA', 'Wajib', 'Ganjil'),
(35, 14, 'IPA11-02', 'KIMIA', 'Wajib', 'Ganjil'),
(36, 14, 'IPA11-03', 'AGAMA', 'Wajib', 'Ganjil'),
(37, 14, 'IPA11-04', 'FISIKA', 'Wajib', 'Ganjil'),
(38, 14, 'IPA11-05', 'BIOLOGI', 'Wajib', 'Ganjil'),
(39, 14, 'IPA11-06', 'Bahasa Indonesia', 'Wajib', 'Ganjil'),
(40, 14, 'IPA11-07', 'Bahasa Inggris', 'Wajib', 'Ganjil'),
(41, 14, 'IPA11-08', 'Pendidikan Kewarganegaraan', 'Wajib', 'Ganjil'),
(42, 14, 'IPA11-09', 'Sejarah Indonesia', 'Wajib', 'Ganjil'),
(43, 14, 'IPA11-10', 'OLAHRAGA', 'Wajib', 'Ganjil'),
(44, 14, 'IPA11-11', 'Seni Musik & Rupa', 'Wajib', 'Ganjil');

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
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_gedung`
--
ALTER TABLE `tb_gedung`
  MODIFY `id_gedung` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
