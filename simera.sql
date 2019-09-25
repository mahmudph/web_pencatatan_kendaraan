-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2019 at 03:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simera`
--

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id_gender` int(1) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id_gender`, `gender`) VALUES
(1, 'pria'),
(2, 'wanita');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(6) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'pegewai kendaraan'),
(2, 'teknikal');

-- --------------------------------------------------------

--
-- Table structure for table `kebersihan_kendaraan`
--

CREATE TABLE `kebersihan_kendaraan` (
  `id` int(11) NOT NULL,
  `cuci_luar` int(1) NOT NULL DEFAULT '0',
  `cuci_dalam` int(1) NOT NULL DEFAULT '0',
  `cuci_bawah` int(1) NOT NULL DEFAULT '0',
  `cuci_keseluruhan` int(1) NOT NULL DEFAULT '0',
  `pemadam_api` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kebersihan_kendaraan`
--

INSERT INTO `kebersihan_kendaraan` (`id`, `cuci_luar`, `cuci_dalam`, `cuci_bawah`, `cuci_keseluruhan`, `pemadam_api`) VALUES
(1, 0, 0, 0, 0, 0),
(2, 1, 1, 1, 0, 1),
(3, 0, 0, 0, 0, 0),
(4, 1, 0, 1, 1, 0),
(5, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keliling_bawah_kendaraan`
--

CREATE TABLE `keliling_bawah_kendaraan` (
  `id` int(11) NOT NULL,
  `kaca_depan` int(1) NOT NULL DEFAULT '0',
  `kaca_spion` int(1) NOT NULL DEFAULT '0',
  `kipas_kaca` int(1) DEFAULT '0',
  `lampu_besar_dim` int(1) NOT NULL DEFAULT '0',
  `lampu_kecil_sen_mobil` int(1) DEFAULT '0',
  `baut_mur_roda` int(1) NOT NULL DEFAULT '0',
  `ban_kodisi_tekanan` int(1) NOT NULL DEFAULT '0',
  `per_baut_u_mur` int(1) NOT NULL DEFAULT '0',
  `tali_kipas` int(1) NOT NULL DEFAULT '0',
  `tanki_solar` int(1) NOT NULL DEFAULT '0',
  `kabel` int(1) NOT NULL DEFAULT '0',
  `permukaan_oli_mesin` int(1) NOT NULL DEFAULT '0',
  `permukaan_air_radiator` int(1) NOT NULL DEFAULT '0',
  `permukaan_oli_stir` int(1) NOT NULL DEFAULT '0',
  `permukaan_oli_transmisi` int(1) NOT NULL DEFAULT '0',
  `accu_air_kabel` int(1) NOT NULL DEFAULT '0',
  `pembersi_saringan` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keliling_bawah_kendaraan`
--

INSERT INTO `keliling_bawah_kendaraan` (`id`, `kaca_depan`, `kaca_spion`, `kipas_kaca`, `lampu_besar_dim`, `lampu_kecil_sen_mobil`, `baut_mur_roda`, `ban_kodisi_tekanan`, `per_baut_u_mur`, `tali_kipas`, `tanki_solar`, `kabel`, `permukaan_oli_mesin`, `permukaan_air_radiator`, `permukaan_oli_stir`, `permukaan_oli_transmisi`, `accu_air_kabel`, `pembersi_saringan`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 0, 1, 0, 1, 1),
(5, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 1, 1, 1, 1, 0, 1, 1),
(7, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 1, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nama_kendaraan` varchar(25) NOT NULL,
  `id_type_kendaraan` int(2) NOT NULL,
  `no_polisi` varchar(11) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `merek` varchar(20) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tahun_keluaran` date NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nama_kendaraan`, `id_type_kendaraan`, `no_polisi`, `id_kondisi`, `merek`, `spesifikasi`, `description`, `foto`, `tahun_keluaran`, `status`) VALUES
(7, 'mobilio', 3, 'BG-2783', 1, 'honda', 'mannual transpor', 'mobil baru di servis', 'images.jpg', '2019-07-24', 1),
(8, 'avanza', 3, '98CD14DR', 1, 'honda', '1500 cc', 'mobil avanza  ', 'honda-brio-front-angle-low-view-753743.jpg', '2019-07-20', 1),
(9, 'Brio', 3, 'BG12412', 1, 'honda', 'automatic ', 'mobil ringan dengan type yang elegan', 'images1.jpg', '2019-07-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_kendaraan`
--

CREATE TABLE `kondisi_kendaraan` (
  `id_kondisi` int(6) NOT NULL,
  `kondisi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi_kendaraan`
--

INSERT INTO `kondisi_kendaraan` (`id_kondisi`, `kondisi`) VALUES
(1, 'baik'),
(2, 'kurang baik');

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `id_pemeliharaan` int(6) NOT NULL,
  `id_kendaraan` int(6) NOT NULL,
  `id_users_public` int(11) NOT NULL,
  `tanggal_perbaikan` date NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `harga_pemeliharaan` int(11) NOT NULL,
  `id_kebersihan_ken` int(11) NOT NULL,
  `id_keliling_bawah` int(11) NOT NULL,
  `id_peralana_tools` int(11) NOT NULL,
  `id_dalam_kabin` int(11) NOT NULL,
  `id_kend_jalan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`id_pemeliharaan`, `id_kendaraan`, `id_users_public`, `tanggal_perbaikan`, `keterangan`, `harga_pemeliharaan`, `id_kebersihan_ken`, `id_keliling_bawah`, `id_peralana_tools`, `id_dalam_kabin`, `id_kend_jalan`) VALUES
(2, 8, 1, '2019-07-10', 'perbaikan rutin tiap bulan', 4000000, 4, 6, 4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(6) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `id_users_public` int(11) NOT NULL,
  `tgl_pemakaian` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keterangan` text NOT NULL,
  `status_kembali` int(11) NOT NULL COMMENT '1 = sudah dikembalikan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_kendaraan`, `id_users_public`, `tgl_pemakaian`, `tanggal_kembali`, `keterangan`, `status_kembali`) VALUES
(5, 7, 1, '2019-09-26', '2019-09-30', 'pergi kekoata', 1),
(6, 7, 3, '2019-09-04', '2019-09-28', 'affadasd', 1),
(7, 9, 2, '2019-09-19', '2019-09-28', 'kkkkkkk', 0),
(8, 7, 2, '2019-09-27', '2019-09-28', 'andikaaa', 1),
(9, 8, 2, '2019-09-01', '2019-09-12', 'dinas menemui pak lurah', 0),
(10, 7, 2, '2019-09-20', '2019-09-21', 'membeli sperepat mobil ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `publick_users`
--

CREATE TABLE `publick_users` (
  `id_users_public` int(11) NOT NULL,
  `nip` int(13) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `id_gender` int(1) NOT NULL,
  `umur` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publick_users`
--

INSERT INTO `publick_users` (`id_users_public`, `nip`, `nama_user`, `id_gender`, `umur`, `alamat`, `foto`) VALUES
(1, 2147483647, 'ferizal', 2, 21, 'palembang', 'Screenshot_from_2019-07-02_08-54-02.png'),
(2, 2147483647, 'ferizalsyah', 1, 21, 'palembang plaju', 'Screenshot_from_2019-06-29_04-05-57.png'),
(3, 0, 'mahmud', 1, 21, 'pandowo harjo', 'Screenshot_from_2019-06-28_21-11-18.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dalam_kabin`
--

CREATE TABLE `tbl_dalam_kabin` (
  `id` int(11) NOT NULL,
  `lampu_control_oli_mesin` int(1) NOT NULL DEFAULT '0',
  `control_lampu_besar` int(1) NOT NULL DEFAULT '0',
  `control_lampu_seri` int(1) NOT NULL DEFAULT '0',
  `solar_volume_tanki` int(1) NOT NULL DEFAULT '0',
  `hight_low_switch` int(1) NOT NULL DEFAULT '0',
  `pedal_gas` int(1) DEFAULT '0',
  `pedal_persneling` int(1) NOT NULL DEFAULT '0',
  `handle_persneling` int(1) NOT NULL DEFAULT '0',
  `seat_belt` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dalam_kabin`
--

INSERT INTO `tbl_dalam_kabin` (`id`, `lampu_control_oli_mesin`, `control_lampu_besar`, `control_lampu_seri`, `solar_volume_tanki`, `hight_low_switch`, `pedal_gas`, `pedal_persneling`, `handle_persneling`, `seat_belt`) VALUES
(1, 0, 0, 0, 0, 0, 1, 1, 1, 0),
(2, 0, 1, 1, 1, 1, 1, 0, 1, 1),
(3, 0, 0, 1, 1, 1, 0, 1, 0, 0),
(4, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(5, 1, 1, 1, 1, 1, 0, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kend_jalan`
--

CREATE TABLE `tbl_kend_jalan` (
  `id` int(11) NOT NULL,
  `stir` int(11) NOT NULL DEFAULT '0',
  `rem_kaki` int(1) NOT NULL DEFAULT '0',
  `rem_emergency` int(1) NOT NULL DEFAULT '0',
  `spedometer` int(1) NOT NULL DEFAULT '0',
  `gigi_perseneling` int(1) NOT NULL DEFAULT '0',
  `r_p_m` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kend_jalan`
--

INSERT INTO `tbl_kend_jalan` (`id`, `stir`, `rem_kaki`, `rem_emergency`, `spedometer`, `gigi_perseneling`, `r_p_m`) VALUES
(1, 0, 0, 0, 0, 0, 0),
(2, 0, 1, 1, 1, 0, 1),
(3, 0, 0, 0, 0, 0, 0),
(4, 0, 1, 1, 1, 1, 1),
(5, 0, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peralatan_tools`
--

CREATE TABLE `tbl_peralatan_tools` (
  `id` int(11) NOT NULL,
  `dongkrak_kursi_roda` int(1) NOT NULL DEFAULT '0',
  `tringjar` int(1) NOT NULL DEFAULT '0',
  `chein` int(1) NOT NULL DEFAULT '0',
  `chain_bandle` int(1) NOT NULL DEFAULT '0',
  `pemadam_api` int(1) NOT NULL DEFAULT '0',
  `ban_sarep` int(1) NOT NULL DEFAULT '0',
  `p3k` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_peralatan_tools`
--

INSERT INTO `tbl_peralatan_tools` (`id`, `dongkrak_kursi_roda`, `tringjar`, `chein`, `chain_bandle`, `pemadam_api`, `ban_sarep`, `p3k`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 1, 0, 1, 0, 0, 1),
(3, 0, 0, 0, 0, 0, 1, 1),
(4, 1, 1, 1, 1, 1, 1, 1),
(5, 0, 1, 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `type_kendaraan`
--

CREATE TABLE `type_kendaraan` (
  `id_type` int(11) NOT NULL,
  `type_kendaraan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_kendaraan`
--

INSERT INTO `type_kendaraan` (`id_type`, `type_kendaraan`) VALUES
(3, 'mobil'),
(4, 'motor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_jabatan` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'avatar.png',
  `type_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_jabatan`, `username`, `password`, `email`, `foto`, `type_user`) VALUES
(2, 2, 'mahmud', 'e1aa6aa12922a1275c9c8f8e54bac8d6', 'mahmud12031998@gmail.com', 'avatar.png', 1),
(6, 2, 'kacang ', '67f1b7d102b27c1a0e2cbf96e934dc6d', 'kacangtanah@gmail.com', 'avatar.png', 2),
(7, 2, 'andika', '7e51eea5fa101ed4dade9ad3a7a072bb', 'andika@gmail.com', 'avatar.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id_gender`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kebersihan_kendaraan`
--
ALTER TABLE `kebersihan_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keliling_bawah_kendaraan`
--
ALTER TABLE `keliling_bawah_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `id_kondisi` (`id_kondisi`),
  ADD KEY `id_type_kendaraan` (`id_type_kendaraan`);

--
-- Indexes for table `kondisi_kendaraan`
--
ALTER TABLE `kondisi_kendaraan`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`id_pemeliharaan`),
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `id_users_public` (`id_users_public`),
  ADD KEY `id_kebersihan_ken` (`id_kebersihan_ken`),
  ADD KEY `id_keliling_bawah` (`id_keliling_bawah`),
  ADD KEY `id_peralana_tools` (`id_peralana_tools`),
  ADD KEY `id_dalam_kabin` (`id_dalam_kabin`),
  ADD KEY `id_kend_jalan` (`id_kend_jalan`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `id_users_public` (`id_users_public`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `publick_users`
--
ALTER TABLE `publick_users`
  ADD PRIMARY KEY (`id_users_public`),
  ADD KEY `gender` (`id_gender`);

--
-- Indexes for table `tbl_dalam_kabin`
--
ALTER TABLE `tbl_dalam_kabin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kend_jalan`
--
ALTER TABLE `tbl_kend_jalan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_peralatan_tools`
--
ALTER TABLE `tbl_peralatan_tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_kendaraan`
--
ALTER TABLE `type_kendaraan`
  ADD PRIMARY KEY (`id_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kebersihan_kendaraan`
--
ALTER TABLE `kebersihan_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keliling_bawah_kendaraan`
--
ALTER TABLE `keliling_bawah_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kondisi_kendaraan`
--
ALTER TABLE `kondisi_kendaraan`
  MODIFY `id_kondisi` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  MODIFY `id_pemeliharaan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publick_users`
--
ALTER TABLE `publick_users`
  MODIFY `id_users_public` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_dalam_kabin`
--
ALTER TABLE `tbl_dalam_kabin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kend_jalan`
--
ALTER TABLE `tbl_kend_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_peralatan_tools`
--
ALTER TABLE `tbl_peralatan_tools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_kendaraan`
--
ALTER TABLE `type_kendaraan`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`id_type_kendaraan`) REFERENCES `type_kendaraan` (`id_type`),
  ADD CONSTRAINT `kendaraan_ibfk_2` FOREIGN KEY (`id_kondisi`) REFERENCES `kondisi_kendaraan` (`id_kondisi`);

--
-- Constraints for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD CONSTRAINT `pemeliharaan_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `pemeliharaan_ibfk_2` FOREIGN KEY (`id_users_public`) REFERENCES `publick_users` (`id_users_public`),
  ADD CONSTRAINT `pemeliharaan_ibfk_3` FOREIGN KEY (`id_dalam_kabin`) REFERENCES `tbl_dalam_kabin` (`id`),
  ADD CONSTRAINT `pemeliharaan_ibfk_4` FOREIGN KEY (`id_keliling_bawah`) REFERENCES `keliling_bawah_kendaraan` (`id`),
  ADD CONSTRAINT `pemeliharaan_ibfk_5` FOREIGN KEY (`id_kend_jalan`) REFERENCES `tbl_kend_jalan` (`id`),
  ADD CONSTRAINT `pemeliharaan_ibfk_6` FOREIGN KEY (`id_kebersihan_ken`) REFERENCES `kebersihan_kendaraan` (`id`),
  ADD CONSTRAINT `pemeliharaan_ibfk_7` FOREIGN KEY (`id_peralana_tools`) REFERENCES `tbl_peralatan_tools` (`id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_users_public`) REFERENCES `publick_users` (`id_users_public`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_pengembalian`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Constraints for table `publick_users`
--
ALTER TABLE `publick_users`
  ADD CONSTRAINT `publick_users_ibfk_1` FOREIGN KEY (`id_gender`) REFERENCES `gender` (`id_gender`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
