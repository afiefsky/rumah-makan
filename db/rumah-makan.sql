-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2017 at 11:50 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah-makan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `sub_kategori_id` int(11) DEFAULT NULL,
  `jenis` enum('Makanan','Minuman') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `kategori_id`, `sub_kategori_id`, `jenis`, `created_at`, `updated_at`) VALUES
(28, 'Jus Jeruk', 2, 5, 'Minuman', '2017-08-15 16:21:10', '2017-08-15 16:21:10'),
(31, 'Ikan Pedas', NULL, NULL, 'Makanan', '2017-08-16 19:20:25', '2017-08-16 19:20:25'),
(32, 'Ikan Pedas', NULL, NULL, 'Makanan', '2017-08-16 19:20:41', '2017-08-16 19:20:41'),
(33, 'Ikan Pedas', NULL, NULL, 'Makanan', '2017-08-16 19:20:47', '2017-08-16 19:20:47'),
(34, 'Ikan Pedas', NULL, NULL, 'Makanan', '2017-08-16 19:20:50', '2017-08-16 19:20:50'),
(35, 'Ikan Pedas', NULL, NULL, 'Makanan', '2017-08-16 19:20:51', '2017-08-16 19:20:51'),
(36, 'Ikan Pedas', NULL, NULL, 'Makanan', '2017-08-16 19:23:26', '2017-08-16 19:23:26'),
(37, 'Ikan Pedas', NULL, NULL, 'Makanan', '2017-08-16 19:23:55', '2017-08-16 19:23:55'),
(38, 'Ikan Pedas', NULL, NULL, 'Makanan', '2017-08-16 19:24:14', '2017-08-16 19:24:14'),
(39, 'Extra Joss Susu', NULL, NULL, 'Minuman', '2017-08-16 19:26:02', '2017-08-16 19:26:02'),
(40, 'ayam balado', NULL, NULL, 'Makanan', '2017-08-16 19:44:34', '2017-08-16 19:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `barang_kategori`
--

CREATE TABLE `barang_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pengukuran_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_kategori`
--

INSERT INTO `barang_kategori` (`id`, `nama`, `pengukuran_id`, `created_at`, `updated_at`) VALUES
(2, 'Daging', 0, '2017-08-08 00:46:00', '2017-08-08 00:46:00'),
(4, 'Bumbu', 0, '2017-08-08 00:46:51', '2017-08-08 00:46:51'),
(5, 'Minyak', 0, '2017-08-08 00:47:07', '2017-08-08 00:47:07'),
(6, 'Telor', 0, '2017-08-08 00:50:06', '2017-08-08 00:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `barang_per_price`
--

CREATE TABLE `barang_per_price` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `per_price` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_per_price`
--

INSERT INTO `barang_per_price` (`id`, `barang_id`, `per_price`, `created_at`, `updated_at`) VALUES
(23, 23, 10000, '2017-08-08 00:49:12', '2017-08-08 00:49:12'),
(24, 24, 5000, '2017-08-08 00:50:51', '2017-08-08 00:50:51'),
(25, 25, 13000, '2017-08-08 00:52:14', '2017-08-08 00:52:14'),
(26, 26, 1000, '2017-08-15 08:18:57', '2017-08-15 08:18:57'),
(27, 27, 1000, '2017-08-15 16:14:16', '2017-08-15 16:14:16'),
(28, 28, 10000, '2017-08-15 16:21:10', '2017-08-15 16:21:10'),
(29, 29, 90000, '2017-08-16 19:23:26', '2017-08-16 19:23:26'),
(30, 29, 90000, '2017-08-16 19:23:55', '2017-08-16 19:23:55'),
(31, 30, 8000, '2017-08-16 19:24:14', '2017-08-16 19:24:14'),
(32, 39, 7000, '2017-08-16 19:26:02', '2017-08-16 19:26:02'),
(33, 40, 90000, '2017-08-16 19:44:34', '2017-08-16 19:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `barang_price`
--

CREATE TABLE `barang_price` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `price` bigint(20) NOT NULL COMMENT 'harga per pengukuran',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_price`
--

INSERT INTO `barang_price` (`id`, `barang_id`, `price`, `created_at`, `updated_at`) VALUES
(23, 23, 36000, '2017-08-08 00:49:12', '2017-08-08 00:49:12'),
(24, 24, 21000, '2017-08-08 00:50:51', '2017-08-08 00:50:51'),
(25, 25, 56000, '2017-08-08 00:52:14', '2017-08-08 00:52:14'),
(26, 26, 1000, '2017-08-15 08:18:57', '2017-08-15 08:18:57'),
(27, 27, 10000, '2017-08-15 16:14:16', '2017-08-15 16:14:16'),
(28, 28, 10000, '2017-08-15 16:21:10', '2017-08-15 16:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `barang_quantity`
--

CREATE TABLE `barang_quantity` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_quantity`
--

INSERT INTO `barang_quantity` (`id`, `barang_id`, `qty`, `created_at`, `updated_at`) VALUES
(23, 23, 9, '2017-08-08 00:49:12', '2017-08-08 00:49:12'),
(24, 24, 12, '2017-08-08 00:50:51', '2017-08-08 00:50:51'),
(25, 25, 8, '2017-08-08 00:52:14', '2017-08-08 00:52:14'),
(26, 26, 10, '2017-08-15 08:18:57', '2017-08-15 08:18:57'),
(27, 27, 100, '2017-08-15 16:14:16', '2017-08-15 16:14:16'),
(28, 28, 1000, '2017-08-15 16:21:11', '2017-08-15 16:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `barang_stock`
--

CREATE TABLE `barang_stock` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_stock`
--

INSERT INTO `barang_stock` (`id`, `barang_id`, `stock`, `created_at`) VALUES
(1, 23, 90, '2017-08-14 15:43:33'),
(2, 24, 90, '2017-08-14 15:43:33'),
(3, 25, 82, '2017-08-14 15:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `barang_sub_kategori`
--

CREATE TABLE `barang_sub_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_sub_kategori`
--

INSERT INTO `barang_sub_kategori` (`id`, `nama`, `kategori_id`, `created_at`, `updated_at`) VALUES
(5, 'Makanan', 1, '2017-08-08 00:48:25', '2017-08-08 00:48:25'),
(6, 'Minuman', 1, '2017-08-08 00:48:33', '2017-08-08 00:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `laba`
--

CREATE TABLE `laba` (
  `id` int(11) NOT NULL,
  `pembelian` bigint(20) NOT NULL,
  `penjualan` bigint(20) NOT NULL,
  `hasil` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laba`
--

INSERT INTO `laba` (`id`, `pembelian`, `penjualan`, `hasil`, `created_at`) VALUES
(1, 40000, 30000, -10000, '2017-08-15 17:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id`, `name`, `status`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 0),
(5, 5, 0),
(6, 6, 0),
(7, 7, 0),
(8, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gaji` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_depan`, `nama_belakang`, `no_hp`, `posisi`, `tanggal_masuk`, `gaji`, `total`, `created_at`, `updated_at`) VALUES
(1, 'misran', 'Lailatul', '0876661823', '', '2017-08-13 17:00:00', 50000, 0, '2017-08-06 18:36:00', '2017-08-06 18:36:00'),
(2, 'Muhammad Afief', 'Farista', '089666848126', '', '2017-08-12 17:00:00', 50000, 0, '2017-08-06 19:50:46', '2017-08-06 19:50:46'),
(3, 'misran', 'misran', '081322730777', 'Pegawai Kasir', '2017-08-11 17:00:00', 1829000, 0, '2017-08-06 19:53:07', '2017-08-06 19:53:07'),
(4, 'Misran', 'Talago', '08677123871', 'Manajer Super', '2017-08-15 14:01:51', 9000000, 0, '2017-08-15 14:01:51', '2017-08-15 14:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'submitted_by',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 2, '2017-08-14 15:55:14', '2017-08-14 15:55:14'),
(4, 1, '2017-08-15 07:43:30', '2017-08-15 07:43:30'),
(5, 1, '2017-08-15 15:05:08', '2017-08-15 15:05:08'),
(6, 1, '2017-08-15 16:20:11', '2017-08-15 16:20:11'),
(7, 1, '2017-08-15 16:21:26', '2017-08-15 16:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id` int(11) NOT NULL,
  `pembelian_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` bigint(20) NOT NULL COMMENT 'berapa kilo / bungkus ?',
  `is_done` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = false; 1 = true',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id`, `pembelian_id`, `barang_id`, `qty`, `is_done`, `created_at`, `updated_at`, `deleted_at`) VALUES
(36, 1, 23, 1, '1', '2017-08-08 01:10:53', '2017-08-08 01:10:53', NULL),
(37, 1, 24, 2, '1', '2017-08-08 01:11:13', '2017-08-08 01:11:13', NULL),
(38, 2, 23, 2, '1', '2017-08-14 15:30:30', '2017-08-14 15:30:30', NULL),
(39, 3, 25, 2, '1', '2017-08-14 15:54:06', '2017-08-14 15:54:06', NULL),
(40, 3, 24, 1, '1', '2017-08-14 15:55:00', '2017-08-14 15:55:00', NULL),
(41, 3, 23, 1, '1', '2017-08-14 15:55:08', '2017-08-14 15:55:08', NULL),
(42, 4, 25, 1, '1', '2017-08-15 07:43:24', '2017-08-15 07:43:24', NULL),
(43, 5, 25, 1, '1', '2017-08-15 15:05:05', '2017-08-15 15:05:05', NULL),
(44, 6, 27, 1, '1', '2017-08-15 16:20:09', '2017-08-15 16:20:09', NULL),
(45, 7, 28, 1, '1', '2017-08-15 16:21:24', '2017-08-15 16:21:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL COMMENT '1=admin; 2=kasir',
  `nama_depan` text NOT NULL,
  `nama_belakang` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `last_login_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `kategori_id`, `nama_depan`, `nama_belakang`, `username`, `email`, `password`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Misran', 'Talago', 'misran', 'misrantalago@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2017-08-02 10:27:10', '2017-08-02 10:27:10', '2017-08-02 10:22:47'),
(2, 2, 'Jendra', 'Volta', 'jendra', 'jendravolta@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2017-08-02 10:27:18', '2017-08-02 10:27:18', '2017-08-02 10:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_kategori`
--

CREATE TABLE `pengguna_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna_kategori`
--

INSERT INTO `pengguna_kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2017-08-02 10:09:11', '2017-08-02 10:09:11'),
(2, 'kasir', '2017-08-02 10:09:11', '2017-08-02 10:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `pengukuran`
--

CREATE TABLE `pengukuran` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL COMMENT 'KG',
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengukuran`
--

INSERT INTO `pengukuran` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'KG (Daging)', 'Kilogram untuk satuan daging', '2017-08-04 14:37:59', '2017-08-04 14:37:59'),
(2, 'Liter', 'Pengukuran untuk minyak', '2017-08-04 14:56:42', '2017-08-04 14:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `pengukuran_sub`
--

CREATE TABLE `pengukuran_sub` (
  `id` int(11) NOT NULL,
  `pengukuran_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengukuran_sub`
--

INSERT INTO `pengukuran_sub` (`id`, `pengukuran_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Potong', '2017-08-04 14:40:05', '2017-08-04 14:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(29, 1, '2017-08-11 02:40:37', '2017-08-11 02:40:37'),
(30, 2, '2017-08-14 02:44:12', '2017-08-14 02:44:12'),
(31, 2, '2017-08-14 14:45:09', '2017-08-14 14:45:09'),
(32, 2, '2017-08-14 15:00:50', '2017-08-14 15:00:50'),
(33, 2, '2017-08-14 15:21:37', '2017-08-14 15:21:37'),
(34, 2, '2017-08-14 15:22:40', '2017-08-14 15:22:40'),
(35, 2, '2017-08-14 15:23:23', '2017-08-14 15:23:23'),
(36, 2, '2017-08-14 15:24:53', '2017-08-14 15:24:53'),
(37, 2, '2017-08-14 15:52:40', '2017-08-14 15:52:40'),
(38, 2, '2017-08-14 16:15:34', '2017-08-14 16:15:34'),
(39, 2, '2017-08-15 07:39:36', '2017-08-15 07:39:36'),
(40, 2, '2017-08-15 07:41:08', '2017-08-15 07:41:08'),
(41, 1, '2017-08-15 16:31:44', '2017-08-15 16:31:44'),
(42, 1, '2017-08-16 19:45:47', '2017-08-16 19:45:47');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `is_done` enum('0','1') NOT NULL COMMENT '0=false; 1=true',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `penjualan_id`, `barang_id`, `qty`, `is_done`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 29, 24, 6, '1', '2017-08-11 03:57:35', '2017-08-11 03:57:35', NULL),
(2, 29, 25, 5, '1', '2017-08-11 04:32:58', '2017-08-11 04:32:58', NULL),
(3, 30, 25, 2, '1', '2017-08-11 04:33:04', '2017-08-11 04:33:04', NULL),
(4, 30, 23, 4, '1', '2017-08-11 04:33:17', '2017-08-11 04:33:17', NULL),
(5, 30, 24, 2, '1', '2017-08-13 18:39:17', '2017-08-13 18:39:17', NULL),
(6, 30, 25, 0, '1', '2017-08-13 18:44:47', '2017-08-13 18:44:47', NULL),
(7, 31, 25, 2, '1', '2017-08-14 14:44:56', '2017-08-14 14:44:56', NULL),
(8, 32, 25, 2, '1', '2017-08-14 15:00:11', '2017-08-14 15:00:11', NULL),
(9, 32, 24, 1, '1', '2017-08-14 15:00:28', '2017-08-14 15:00:28', NULL),
(10, 33, 25, 2, '1', '2017-08-14 15:20:02', '2017-08-14 15:20:02', NULL),
(11, 33, 23, 3, '1', '2017-08-14 15:20:43', '2017-08-14 15:20:43', NULL),
(12, 33, 25, 1, '1', '2017-08-14 15:21:34', '2017-08-14 15:21:34', NULL),
(13, 34, 23, 3, '1', '2017-08-14 15:22:37', '2017-08-14 15:22:37', NULL),
(14, 35, 24, 3, '1', '2017-08-14 15:23:16', '2017-08-14 15:23:16', NULL),
(15, 36, 23, 1, '1', '2017-08-14 15:24:51', '2017-08-14 15:24:51', NULL),
(16, 37, 25, 2, '1', '2017-08-14 15:52:21', '2017-08-14 15:52:21', NULL),
(17, 38, 25, 2, '1', '2017-08-14 16:15:32', '2017-08-14 16:15:32', NULL),
(18, 39, 25, 2, '1', '2017-08-15 07:39:24', '2017-08-15 07:39:24', NULL),
(19, 40, 25, 2, '1', '2017-08-15 07:40:55', '2017-08-15 07:40:55', NULL),
(20, 41, 28, 1, '1', '2017-08-15 16:31:32', '2017-08-15 16:31:32', NULL),
(21, 42, 28, 2, '1', '2017-08-16 19:45:34', '2017-08-16 19:45:34', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_kategori`
--
ALTER TABLE `barang_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_per_price`
--
ALTER TABLE `barang_per_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_price`
--
ALTER TABLE `barang_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_quantity`
--
ALTER TABLE `barang_quantity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_stock`
--
ALTER TABLE `barang_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_sub_kategori`
--
ALTER TABLE `barang_sub_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laba`
--
ALTER TABLE `laba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pengguna_kategori`
--
ALTER TABLE `pengguna_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengukuran`
--
ALTER TABLE `pengukuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengukuran_sub`
--
ALTER TABLE `pengukuran_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `barang_kategori`
--
ALTER TABLE `barang_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `barang_per_price`
--
ALTER TABLE `barang_per_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `barang_price`
--
ALTER TABLE `barang_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `barang_quantity`
--
ALTER TABLE `barang_quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `barang_stock`
--
ALTER TABLE `barang_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `barang_sub_kategori`
--
ALTER TABLE `barang_sub_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `laba`
--
ALTER TABLE `laba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengguna_kategori`
--
ALTER TABLE `pengguna_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengukuran`
--
ALTER TABLE `pengukuran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengukuran_sub`
--
ALTER TABLE `pengukuran_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
