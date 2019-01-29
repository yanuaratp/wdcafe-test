-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Jan 2019 pada 12.38
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdcafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(3) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `privileges` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `nama`, `privileges`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Yanuar ATP', 'admin', '12552989_1146467125365842_7873430264945172882_n.jpg'),
(2, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Akbar', 'kasir', 'default.jpg'),
(3, 'pelayan', '511cc40443f2a1ab03ab373b77d28091', 'Putranto', 'pelayan', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(10) NOT NULL,
  `id_pesan` varchar(20) NOT NULL,
  `id_menu` int(5) NOT NULL,
  `jumlah_pesan` int(3) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesan`, `id_menu`, `jumlah_pesan`, `keterangan`) VALUES
(18, 'ERP29012019-1', 1, 2, 'Tidak Pedas'),
(19, 'ERP29012019-1', 3, 2, ''),
(20, 'ERP29012019-1', 5, 2, ''),
(21, 'ERP29012019-1', 8, 2, ''),
(22, 'ERP29012019-1', 9, 2, 'Es'),
(33, 'ERP29012019-2', 1, 1, ''),
(34, 'ERP29012019-2', 3, 2, 'Level 5'),
(35, 'ERP29012019-2', 5, 3, ''),
(36, 'ERP29012019-2', 8, 4, ''),
(37, 'ERP29012019-2', 9, 5, ''),
(38, 'ERP29012019-3', 1, 0, ''),
(39, 'ERP29012019-3', 3, 0, ''),
(40, 'ERP29012019-3', 5, 0, ''),
(41, 'ERP29012019-3', 8, 0, ''),
(42, 'ERP29012019-3', 9, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `harga` int(6) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `jenis`, `harga`, `status`) VALUES
(1, 'Nasi Goreng Jawa', 'Makanan', 12500, 'Ready'),
(2, 'Nasi Goreng Padang', 'Makanan', 15000, 'Kosong'),
(3, 'Ayam Geprek', 'Makanan', 10000, 'Ready'),
(5, 'Teh Manis Dingin', 'Minuman', 2500, 'Ready'),
(6, 'Jeruk Nipis', 'Minuman', 5000, 'Kosong'),
(8, 'Soda Gembira', 'Minuman', 8000, 'Ready'),
(9, 'Susu Coklat', 'Minuman', 5000, 'Ready');

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_view`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `order_view` (
`id_pesan` varchar(20)
,`nomer_meja` int(3)
,`id_pegawai` int(3)
,`nama` varchar(30)
,`status` varchar(12)
,`id_detail` int(10)
,`id_menu` int(5)
,`nama_menu` varchar(30)
,`harga` int(6)
,`jumlah_pesan` int(3)
,`keterangan` varchar(150)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesan` varchar(20) NOT NULL,
  `nomer_meja` int(3) NOT NULL,
  `status` varchar(12) NOT NULL,
  `tanggal_pesan` varchar(30) NOT NULL,
  `id_pegawai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesan`, `nomer_meja`, `status`, `tanggal_pesan`, `id_pegawai`) VALUES
('ERP29012019-1', 3, 'Bayar', '29-01-2019', 1),
('ERP29012019-2', 4, 'Aktif', '29-01-2019', 1),
('ERP29012019-3', 2, 'Aktif', '29-01-2019', 3);

-- --------------------------------------------------------

--
-- Struktur untuk view `order_view`
--
DROP TABLE IF EXISTS `order_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order_view`  AS  select `p`.`id_pesan` AS `id_pesan`,`p`.`nomer_meja` AS `nomer_meja`,`p`.`id_pegawai` AS `id_pegawai`,`a`.`nama` AS `nama`,`p`.`status` AS `status`,`d`.`id_detail` AS `id_detail`,`d`.`id_menu` AS `id_menu`,`m`.`nama_menu` AS `nama_menu`,`m`.`harga` AS `harga`,`d`.`jumlah_pesan` AS `jumlah_pesan`,`d`.`keterangan` AS `keterangan` from (((`pesanan` `p` left join `admin` `a` on((`a`.`idadmin` = `p`.`id_pegawai`))) join `detail_pesanan` `d` on((`p`.`id_pesan` = `d`.`id_pesan`))) join `menu` `m` on((`d`.`id_menu` = `m`.`id_menu`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
