-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Mei 2025 pada 18.11
-- Versi Server: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pbb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftarpengajuan`
--

CREATE TABLE `daftarpengajuan` (
  `id` int(11) NOT NULL,
  `ktp_user` varchar(50) DEFAULT NULL,
  `status_kepemilikan` varchar(100) DEFAULT NULL,
  `alamat_jalan_objek` varchar(255) DEFAULT NULL,
  `alamat_nomor_objek` varchar(50) DEFAULT NULL,
  `kelurahan_objek` varchar(100) DEFAULT NULL,
  `rw_objek` varchar(10) DEFAULT NULL,
  `rt_objek` varchar(10) DEFAULT NULL,
  `luas_tanah` int(11) DEFAULT NULL,
  `jenis_tanah` varchar(100) DEFAULT NULL,
  `guna_bangunan` varchar(100) DEFAULT NULL,
  `luas_bangunan` int(11) DEFAULT NULL,
  `jumlah_tingkat` int(11) DEFAULT NULL,
  `tahun_dibangun` int(11) DEFAULT NULL,
  `tahun_direnovasi` int(11) DEFAULT NULL,
  `daya_listrik` int(11) DEFAULT NULL,
  `kondisi` varchar(100) DEFAULT NULL,
  `konstruksi` varchar(100) DEFAULT NULL,
  `atap` varchar(100) DEFAULT NULL,
  `dinding` varchar(100) DEFAULT NULL,
  `lantai` varchar(100) DEFAULT NULL,
  `langitlangit` varchar(100) DEFAULT NULL,
  `ktp_subjek` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `nama_subjek` varchar(100) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `alamat_jalan_subjek` varchar(255) DEFAULT NULL,
  `alamat_nomor_subjek` varchar(50) DEFAULT NULL,
  `kelurahan_subjek` varchar(100) DEFAULT NULL,
  `rw_subjek` varchar(10) DEFAULT NULL,
  `rt_subjek` varchar(10) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftarpengajuan`
--

INSERT INTO `daftarpengajuan` (`id`, `ktp_user`, `status_kepemilikan`, `alamat_jalan_objek`, `alamat_nomor_objek`, `kelurahan_objek`, `rw_objek`, `rt_objek`, `luas_tanah`, `jenis_tanah`, `guna_bangunan`, `luas_bangunan`, `jumlah_tingkat`, `tahun_dibangun`, `tahun_direnovasi`, `daya_listrik`, `kondisi`, `konstruksi`, `atap`, `dinding`, `lantai`, `langitlangit`, `ktp_subjek`, `pekerjaan`, `nama_subjek`, `npwp`, `alamat_jalan_subjek`, `alamat_nomor_subjek`, `kelurahan_subjek`, `rw_subjek`, `rt_subjek`, `kota`, `kode_pos`, `status`) VALUES
(328, '1234', 'Pemilik', 'Jaya indah lrg rukun 1', 'Jaya indah lrg rukun 1', 'kelurahan_objek', '3', '3', 32423, 'Tanah + Bangunan', 'Hotel / Wisma', 2342342, 2, 2010, 2018, 2000, 'Sangat Baik', 'Baja Decarbon', 'Beton / Genteng Glazur', 'Kaca / Alumunium', 'Marmer', 'Akustik / Jati', '3673763', 'PNS', 'Danis Diantra', '32283', 'Jaya indah lrg rukun 1', 'Jaya indah lrg rukun 1', 'plaju', '3', '3', 'Palembang', '31113', 'Disetujui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataadmin`
--

CREATE TABLE `dataadmin` (
  `nip` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dataadmin`
--

INSERT INTO `dataadmin` (`nip`, `password`, `nama_admin`, `email`) VALUES
('22333', 'QrUgcNdRjaE74hfEIeThKa/RaqA9N/KpBI+X7VeiyfE=', 'danis', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataobjek`
--

CREATE TABLE `dataobjek` (
  `nop` varchar(50) NOT NULL,
  `ktp_subjek` varchar(50) DEFAULT NULL,
  `ktp_user` varchar(50) DEFAULT NULL,
  `status_kepemilikan` varchar(100) DEFAULT NULL,
  `alamat_jalan_objek` varchar(255) DEFAULT NULL,
  `alamat_nomor_objek` varchar(50) DEFAULT NULL,
  `kelurahan_objek` varchar(100) DEFAULT NULL,
  `rw_objek` varchar(10) DEFAULT NULL,
  `rt_objek` varchar(10) DEFAULT NULL,
  `luas_tanah` int(11) DEFAULT NULL,
  `jenis_tanah` varchar(100) DEFAULT NULL,
  `njop_bumi` decimal(15,2) DEFAULT NULL,
  `guna_bangunan` varchar(100) DEFAULT NULL,
  `luas_bangunan` int(11) DEFAULT NULL,
  `jumlah_tingkat` int(11) DEFAULT NULL,
  `tahun_dibangun` int(11) DEFAULT NULL,
  `tahun_direnovasi` int(11) DEFAULT NULL,
  `daya_listrik` int(11) DEFAULT NULL,
  `kondisi` varchar(100) DEFAULT NULL,
  `konstruksi` varchar(100) DEFAULT NULL,
  `atap` varchar(100) DEFAULT NULL,
  `dinding` varchar(100) DEFAULT NULL,
  `lantai` varchar(100) DEFAULT NULL,
  `langitlangit` varchar(100) DEFAULT NULL,
  `njop_bangunan` decimal(15,2) DEFAULT NULL,
  `njop_dasar` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dataobjek`
--

INSERT INTO `dataobjek` (`nop`, `ktp_subjek`, `ktp_user`, `status_kepemilikan`, `alamat_jalan_objek`, `alamat_nomor_objek`, `kelurahan_objek`, `rw_objek`, `rt_objek`, `luas_tanah`, `jenis_tanah`, `njop_bumi`, `guna_bangunan`, `luas_bangunan`, `jumlah_tingkat`, `tahun_dibangun`, `tahun_direnovasi`, `daya_listrik`, `kondisi`, `konstruksi`, `atap`, `dinding`, `lantai`, `langitlangit`, `njop_bangunan`, `njop_dasar`) VALUES
('1122', '238947234', '1234', 'Pemilik', 'Jaya indah lrg rukun 1', 'Jaya indah lrg rukun 1', 'kelurahan_objek', '01', '01', 1, 'Tanah + Bangunan', '1122.00', 'Hotel / Wisma', 2342342, 2, 2010, 2018, 2000, 'Sangat Baik', 'Baja Decarbon', 'Beton / Genteng Glazur', 'Kaca / Alumunium', 'Marmer', 'Akustik / Jati', '1122.00', '2628108846.00'),
('1223', '3673763', '1234', 'Pemilik', 'Jaya indah lrg rukun 1', 'Jaya indah lrg rukun 1', 'kelurahan_objek', '3', '3', 32423, 'Tanah + Bangunan', '1223.00', 'Hotel / Wisma', 2342342, 2, 2010, 2018, 2000, 'Sangat Baik', 'Baja Decarbon', 'Beton / Genteng Glazur', 'Kaca / Alumunium', 'Marmer', 'Akustik / Jati', '1223.00', '2904337595.00'),
('13344', '45345353', '23932', 'Pemilik', 'Jaya indah lrg rukun 1', 'Jaya indah lrg rukun 1', 'kelurahan_objek', '3', '3', 32423, 'Tanah + Bangunan', '1555.00', 'Hotel / Wisma', 2342342, 2, 2010, 2018, 2000, 'Sangat Baik', 'Baja Decarbon', 'Genteng Biasa / Sirap', 'Batu Bata / Conblok', 'Keramik', 'Triplek / Asbes Bambu', '1888.00', '4472759461.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datasubjek`
--

CREATE TABLE `datasubjek` (
  `ktp_subjek` varchar(50) NOT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `nama_subjek` varchar(100) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `alamat_jalan_subjek` varchar(255) DEFAULT NULL,
  `alamat_nomor_subjek` varchar(50) DEFAULT NULL,
  `kelurahan_subjek` varchar(100) DEFAULT NULL,
  `rw_subjek` varchar(10) DEFAULT NULL,
  `rt_subjek` varchar(10) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datasubjek`
--

INSERT INTO `datasubjek` (`ktp_subjek`, `pekerjaan`, `nama_subjek`, `npwp`, `alamat_jalan_subjek`, `alamat_nomor_subjek`, `kelurahan_subjek`, `rw_subjek`, `rt_subjek`, `kota`, `kode_pos`) VALUES
('238947234', 'PNS', 'Danis Diantra', '32283', 'Jaya indah lrg rukun 1', 'Jaya indah lrg rukun 1', 'plaju', '01', '01', 'Palembang', '31113'),
('3673763', 'PNS', 'Danis Diantra', '32283', 'Jaya indah lrg rukun 1', 'Jaya indah lrg rukun 1', 'plaju', '3', '3', 'Palembang', '31113'),
('45345353', 'PNS', 'Danis Diantra', '32283', 'Jaya indah lrg rukun 1', 'Jaya indah lrg rukun 1', 'plaju', '3', '3', 'Palembang', '31113');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datauser`
--

CREATE TABLE `datauser` (
  `ktp_user` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL COMMENT 'L = Laki-laki, P = Perempuan',
  `alamat` text NOT NULL,
  `rt_user` varchar(3) NOT NULL,
  `rw_user` varchar(3) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datauser`
--

INSERT INTO `datauser` (`ktp_user`, `password`, `nama_user`, `tempat_lahir`, `tanggal_lahir`, `jk`, `alamat`, `rt_user`, `rw_user`, `email`) VALUES
('1234', 'VaxcQq0mz8oiyEpeUMnC8M0Sr49AHRybBpgfqM0Zy5c=', 'danis', 'prabum', '2001-02-03', 'L', 'prabum', '01', '01', 'danis@gmail.com'),
('1234567890123456', 'admin', 'Ahmad Setiawan', 'Bandung', '1990-05-15', 'L', 'Jl. Merdeka No. 12', '001', '002', 'ahmad@gmail.com'),
('2393', 'ZtjPDHROurITTFXS0ty8WNy0DHDUFdauMLPtrCt1IhA=', 'jaka', 'palembang', '1999-02-17', '', 'pbm', '03', '01', 'test@gmail.com'),
('9876543210987654', 'hashed_password2', 'Siti Aisyah', 'Jakarta', '1995-09-21', 'P', 'Jl. Sudirman No. 45', '003', '004', 'siti@yahoo.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `nop` varchar(20) NOT NULL,
  `tahun_pajak` varchar(4) NOT NULL,
  `id_pembayaran` int(11) DEFAULT NULL,
  `nama_subjek` varchar(100) NOT NULL,
  `pokok` double NOT NULL,
  `denda` double NOT NULL,
  `jumlah_tagihan` double NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `jumlah_bulan` int(11) NOT NULL,
  `status_kelunasan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `nop`, `tahun_pajak`, `id_pembayaran`, `nama_subjek`, `pokok`, `denda`, `jumlah_tagihan`, `tgl_jatuh_tempo`, `jumlah_bulan`, `status_kelunasan`) VALUES
(19, '13344', '2025', 877227, 'Danis Diantra', 4472759.461, 0, 4472759.461, '2025-05-13', 0, 'Lunas'),
(21, '13344', '2025', 715481, 'Danis Diantra', 4472759.461, 0, 4472759.461, '2025-05-22', 0, 'Lunas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftarpengajuan`
--
ALTER TABLE `daftarpengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataadmin`
--
ALTER TABLE `dataadmin`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `dataobjek`
--
ALTER TABLE `dataobjek`
  ADD PRIMARY KEY (`nop`);

--
-- Indexes for table `datasubjek`
--
ALTER TABLE `datasubjek`
  ADD PRIMARY KEY (`ktp_subjek`);

--
-- Indexes for table `datauser`
--
ALTER TABLE `datauser`
  ADD PRIMARY KEY (`ktp_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftarpengajuan`
--
ALTER TABLE `daftarpengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;
--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
