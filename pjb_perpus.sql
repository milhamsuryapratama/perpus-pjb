-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 02:10 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pjb_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `password`) VALUES
('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_alasan`
--

CREATE TABLE `tb_alasan` (
  `id_alasan` int(11) NOT NULL,
  `id_buku` int(10) NOT NULL,
  `user` int(11) NOT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alasan`
--

INSERT INTO `tb_alasan` (`id_alasan`, `id_buku`, `user`, `alasan`) VALUES
(3, 0, 1, 'sudah tidak di gunakan'),
(4, 1, 1, 'sudah tidak di gunakan'),
(5, 4, 11, 'Buku ini tidak digunakan lagi'),
(6, 3, 11, 'Buku ini telah rusak'),
(7, 5, 11, 'Buku ini kadaluarsa'),
(8, 7, 10, 'Buku ini rusak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `id_judulp` int(50) NOT NULL,
  `sub_judul` text NOT NULL,
  `tgl_perolehan` date NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `sinopsis` text NOT NULL,
  `bahasa` varchar(255) NOT NULL,
  `halaman` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `th_terbit` int(11) NOT NULL,
  `file` text NOT NULL,
  `status` enum('Y','N') NOT NULL,
  `tgl_cetakan` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_judulp`, `sub_judul`, `tgl_perolehan`, `penerbit`, `pengarang`, `sinopsis`, `bahasa`, `halaman`, `jumlah`, `th_terbit`, `file`, `status`, `tgl_cetakan`, `id_user`) VALUES
(1, 8, 'CARA CEPAT BELAJAR ANDROID STUDIO', '2019-07-15', 'PT SINAR JAYA', 'Soleh', 'asa', 'Indonesia', 2, 2, 2019, 'second-slide.jpg', 'N', '2019-07-08', 11),
(2, 8, 'CARA CEPAT BELAJAR ANDROID STUDIO', '2019-07-15', 'PT SINAR JAYA', 'Soleh', 'asasasa', 'Indonesia', 22, 1, 2019, 'second-slide.jpg', 'Y', '2019-07-09', 11),
(3, 7, 'Top Energizing ', '2019-07-15', 'Loko Media', 'Adi', 'asa', 'Indonesia', 2, 22, 2019, '767-2673-1-PB.pdf', 'N', '2019-07-15', 11),
(4, 8, 'kj', '2019-07-15', 'kj', 'kj', 'kj', 'Indonesia', 20, 2, 2019, '24-0.jpg', 'N', '2019-07-02', 11),
(5, 8, 'g', '2019-07-24', 'g', 'g', 'g', 'g', 5, 3, 2019, 'ttd.PNG', 'N', '2019-07-24', 11),
(6, 7, 'h', '2019-07-24', 'h', 'h', 'h', 'h', 5, 5, 2019, 'proposal.PNG', 'Y', '2019-07-24', 11),
(7, 8, 'ko', '2019-07-31', 'ko', 'ko', 'ko', 'ko', 99, 9, 2019, 'no surat.png', 'N', '2019-07-31', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_judulparent`
--

CREATE TABLE `tb_judulparent` (
  `id` int(11) NOT NULL,
  `id_judulp` varchar(11) NOT NULL,
  `judulp` varchar(255) NOT NULL,
  `id_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_judulparent`
--

INSERT INTO `tb_judulparent` (`id`, `id_judulp`, `judulp`, `id_kategori`) VALUES
(7, 'E-11', 'Operation', '2'),
(8, 'U01', 'UMUM PEMROGRAMAN', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `key_kategori` varchar(50) NOT NULL,
  `jenis_pustaka` enum('umum','khusus') NOT NULL,
  `nm_kategori` varchar(50) NOT NULL,
  `quantitybox` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `key_kategori`, `jenis_pustaka`, `nm_kategori`, `quantitybox`, `id_rak`) VALUES
(1, '0', 'umum', 'Pemrograman', 0, 2),
(2, '621.4 ST', 'khusus', 'Electric Equipment', 2, 3),
(3, '0', 'umum', 'welek', 1, 3),
(4, '0', 'umum', 'ddfg', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kondisi`
--

CREATE TABLE `tb_kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `kondisi` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kondisi_buku`
--

CREATE TABLE `tb_kondisi_buku` (
  `id_kondisi` int(11) NOT NULL,
  `sampul` enum('Y','N') NOT NULL,
  `coretan` enum('Y','N') NOT NULL,
  `lipatan` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kondisi_buku`
--

INSERT INTO `tb_kondisi_buku` (`id_kondisi`, `sampul`, `coretan`, `lipatan`) VALUES
(1, 'Y', 'N', 'N'),
(2, 'Y', 'Y', 'Y'),
(3, 'N', 'N', 'N'),
(4, 'Y', 'N', 'N'),
(5, 'Y', 'N', 'Y'),
(6, 'Y', 'Y', 'Y'),
(7, 'Y', 'Y', 'Y'),
(8, 'Y', 'N', 'N'),
(9, 'Y', 'Y', 'Y'),
(10, 'Y', 'N', 'N'),
(11, 'Y', 'N', 'Y'),
(12, 'Y', 'Y', 'Y'),
(13, 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_master_kondisi`
--

CREATE TABLE `tb_master_kondisi` (
  `id_master_kondisi` int(11) NOT NULL,
  `kondisi` text NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_master_kondisi`
--

INSERT INTO `tb_master_kondisi` (`id_master_kondisi`, `kondisi`, `point`) VALUES
(2, 'Coretan', 1),
(3, 'Lipatan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'RAK A1'),
(2, 'RAK A2'),
(3, 'RAK A3'),
(4, 'RAK B1'),
(5, 'RAK B2'),
(6, 'RAK B3'),
(7, 'RAK C1'),
(8, 'RAK C2'),
(9, 'RAK C3'),
(10, 'RAK C3'),
(11, 'RAK D1'),
(12, 'RAK D2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reward`
--

CREATE TABLE `tb_reward` (
  `id_reward` int(11) NOT NULL,
  `max_pinjam` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reward`
--

INSERT INTO `tb_reward` (`id_reward`, `max_pinjam`, `point`) VALUES
(1, 14, 5),
(2, 14, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `tgl_pinjam` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_transaksi` enum('dipinjam','dikembalikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_peminjam`, `tgl_pinjam`, `status_transaksi`) VALUES
(1, 11, '2019-08-04 04:23:24', 'dikembalikan'),
(2, 11, '2019-08-06 01:32:26', 'dikembalikan'),
(3, 11, '2019-08-24 06:58:48', 'dipinjam'),
(4, 11, '2019-07-28 07:28:35', 'dikembalikan'),
(5, 11, '2019-07-28 07:41:39', 'dikembalikan'),
(6, 9, '2019-07-28 07:46:39', 'dikembalikan'),
(7, 9, '2019-07-28 08:20:15', 'dikembalikan'),
(8, 9, '2019-07-28 08:29:22', 'dikembalikan'),
(9, 36, '2019-08-04 04:24:58', 'dikembalikan'),
(10, 11, '2019-08-04 08:14:02', 'dipinjam'),
(11, 36, '2019-08-06 01:30:59', 'dipinjam'),
(12, 9, '2019-08-06 01:52:02', 'dipinjam'),
(13, 9, '2019-08-06 01:54:45', 'dipinjam'),
(14, 1, '2019-08-10 05:38:50', 'dipinjam'),
(15, 2, '2019-08-10 05:39:13', 'dipinjam'),
(16, 6, '2019-08-10 05:40:21', 'dipinjam'),
(17, 5, '2019-08-10 05:50:23', 'dipinjam'),
(18, 1, '2019-08-24 05:56:47', 'dipinjam'),
(19, 1, '2019-08-26 12:04:16', 'dipinjam'),
(20, 1, '2019-08-26 12:06:50', 'dipinjam'),
(21, 1, '2019-08-26 12:08:27', 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_detail`
--

CREATE TABLE `tb_transaksi_detail` (
  `id_transaksi_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_detail`
--

INSERT INTO `tb_transaksi_detail` (`id_transaksi_detail`, `id_transaksi`, `id_buku`, `tgl_kembali`) VALUES
(1, 17, 6, 0),
(2, 17, 2, 0),
(3, 3, 1, 12082019),
(4, 18, 2, 0),
(5, 18, 6, 0),
(6, 19, 2, 0),
(7, 20, 2, 0),
(8, 21, 6, 0),
(9, 21, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi_kondisi`
--

CREATE TABLE `tb_transaksi_kondisi` (
  `id_transaksi_kondisi` int(11) NOT NULL,
  `id_transaksi_detail` int(11) NOT NULL,
  `id_master_kondisi` int(11) NOT NULL,
  `ket_kondisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi_kondisi`
--

INSERT INTO `tb_transaksi_kondisi` (`id_transaksi_kondisi`, `id_transaksi_detail`, `id_master_kondisi`, `ket_kondisi`) VALUES
(1, 3, 1, 'kondisi 1'),
(2, 3, 2, 'Coretan Sedikit'),
(3, 3, 3, 'Lipatan Sedikit');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `point` int(11) NOT NULL,
  `foto_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `bidang`, `password`, `role`, `point`, `foto_user`) VALUES
(1, 'soleh', 'CEO', '4fded1464736e77865df232cbcb4cd19', 'user', 109, 'Koala.jpg'),
(9, 'syukron', 'Kebun', '3e6313b974eaac85eff8eabec093db45', 'user', 96, ''),
(10, 'admin', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 99, ''),
(11, 'ilham', 'CTO', 'b63d204bf086017e34d8bd27ab969f28', 'admin', 64, ''),
(36, 'yolo', 'yolo', '4fded1464736e77865df232cbcb4cd19', 'user', 100, 'Desert.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_alasan`
--
ALTER TABLE `tb_alasan`
  ADD PRIMARY KEY (`id_alasan`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_judulparent`
--
ALTER TABLE `tb_judulparent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `tb_kondisi_buku`
--
ALTER TABLE `tb_kondisi_buku`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `tb_master_kondisi`
--
ALTER TABLE `tb_master_kondisi`
  ADD PRIMARY KEY (`id_master_kondisi`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tb_reward`
--
ALTER TABLE `tb_reward`
  ADD PRIMARY KEY (`id_reward`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  ADD PRIMARY KEY (`id_transaksi_detail`);

--
-- Indexes for table `tb_transaksi_kondisi`
--
ALTER TABLE `tb_transaksi_kondisi`
  ADD PRIMARY KEY (`id_transaksi_kondisi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alasan`
--
ALTER TABLE `tb_alasan`
  MODIFY `id_alasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_judulparent`
--
ALTER TABLE `tb_judulparent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kondisi`
--
ALTER TABLE `tb_kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kondisi_buku`
--
ALTER TABLE `tb_kondisi_buku`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_master_kondisi`
--
ALTER TABLE `tb_master_kondisi`
  MODIFY `id_master_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_reward`
--
ALTER TABLE `tb_reward`
  MODIFY `id_reward` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_transaksi_detail`
--
ALTER TABLE `tb_transaksi_detail`
  MODIFY `id_transaksi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_transaksi_kondisi`
--
ALTER TABLE `tb_transaksi_kondisi`
  MODIFY `id_transaksi_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
