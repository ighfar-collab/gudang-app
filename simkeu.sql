-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2026 at 11:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simkeu`
--

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('hutang','piutang') NOT NULL,
  `relasi_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `sumber_dana_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `kategori_id`, `barcode`, `nama`, `harga_beli`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(0, '89', 1, 'mmmnnnnnnnnnnnkkkkkkkkk', 'kripik', 7000, 8000, 7630, '2026-03-10 10:35:18', '2026-03-10 03:35:18'),
(0, '000000000', 1, '00000000000000', 'kue', 500, 600, 7630, '2026-03-10 10:35:18', '2026-03-10 03:35:18'),
(1, '999', 1, '99999999', 'kripik', 500, 600, 59, '2026-03-10 10:39:19', '2026-03-10 03:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitra_id` bigint(20) UNSIGNED NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `driver_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `jenis_pengiriman` varchar(255) NOT NULL,
  `tarif_per_kg` int(11) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `berat` int(5) NOT NULL,
  `status` enum('pending','proses','transit','sampai','diterima') NOT NULL DEFAULT 'pending',
  `total` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_flows`
--

CREATE TABLE `cash_flows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` enum('masuk','keluar') NOT NULL,
  `nominal` decimal(12,2) NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `ref_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cash_flows`
--

INSERT INTO `cash_flows` (`id`, `tanggal`, `jenis`, `nominal`, `sumber`, `ref_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, '2026-03-06', 'masuk', 600.00, 'penjualan', 15, 'INV-20260306-Xfoqg', '2026-03-06 03:30:18', '2026-03-06 03:30:18'),
(2, '2026-03-06', 'masuk', 600.00, 'penjualan', 16, 'INV-20260306-dt5c2', '2026-03-06 06:52:16', '2026-03-06 06:52:16'),
(3, '2026-03-06', 'masuk', 8000.00, 'penjualan', 17, 'INV-20260306-GnhYJ', '2026-03-06 06:55:35', '2026-03-06 06:55:35'),
(4, '2026-03-06', 'masuk', 600.00, 'penjualan', 18, 'INV-20260306-dnqU1', '2026-03-06 06:56:56', '2026-03-06 06:56:56'),
(7, '2026-03-07', 'masuk', 800.00, 'dp kredit', 21, 'INV-20260307-s2PmH', '2026-03-06 21:28:32', '2026-03-06 21:28:32'),
(8, '2026-03-07', 'masuk', 800.00, 'dp kredit', 22, 'INV-20260307-0oStm', '2026-03-06 21:29:54', '2026-03-06 21:29:54'),
(9, '2026-03-07', 'masuk', 800.00, 'dp kredit', 23, 'INV-20260307-G6Uh1', '2026-03-06 21:31:50', '2026-03-06 21:31:50'),
(10, '2026-03-07', 'masuk', 400.00, 'dp kredit', 24, 'INV-20260307-uufsE', '2026-03-06 21:40:27', '2026-03-06 21:40:27'),
(11, '2026-03-07', 'masuk', 600.00, 'penjualan tunai', 25, 'INV-20260307-bW4Y2', '2026-03-06 21:48:52', '2026-03-06 21:48:52'),
(12, '2026-03-07', 'masuk', 300.00, 'dp kredit', 26, 'INV-20260307-DR142', '2026-03-06 23:07:42', '2026-03-06 23:07:42'),
(13, '2026-03-07', 'masuk', 300.00, 'dp kredit', 27, 'INV-20260307-xKcPO', '2026-03-06 23:08:48', '2026-03-06 23:08:48'),
(14, '2026-03-07', 'masuk', 100.00, 'angsuran', 4, 'Bayar angsuran ', '2026-03-06 23:34:20', '2026-03-06 23:34:20'),
(15, '2026-03-08', 'keluar', 30000.00, '-', NULL, 'DP Pembelian PB1772974755', '2026-03-08 05:59:15', '2026-03-08 05:59:15'),
(16, '2026-03-08', 'keluar', 600.00, '-', NULL, 'DP Pembelian PB1772974900', '2026-03-08 06:01:40', '2026-03-08 06:01:40'),
(17, '2026-03-08', 'keluar', 1000.00, '-', NULL, 'DP Pembelian PB1772975351', '2026-03-08 06:09:11', '2026-03-08 06:09:11'),
(18, '2026-03-08', 'masuk', 100.00, 'angsuran', 9, 'Bayar angsuran ', '2026-03-08 06:12:13', '2026-03-08 06:12:13'),
(23, '2026-03-09', 'masuk', 200.00, 'angsuran', 14, 'Bayar angsuran ', '2026-03-09 03:05:31', '2026-03-09 03:05:31'),
(24, '2026-03-09', 'masuk', 300.00, 'angsuran', 14, 'Bayar angsuran ', '2026-03-09 03:07:29', '2026-03-09 03:07:29'),
(25, '2026-03-09', 'masuk', 200.00, 'angsuran', 13, 'Bayar angsuran ', '2026-03-09 03:13:56', '2026-03-09 03:13:56'),
(29, '2026-03-10', 'masuk', 1600000.00, 'penjualan tunai', 31, 'INV-20260310-Aba9R', '2026-03-10 03:49:20', '2026-03-10 03:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nama`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'ighfar', '082193845310', 'aceh', '2026-02-23 22:09:20', '2026-02-23 22:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `installments`
--

CREATE TABLE `installments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loan_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installments`
--

INSERT INTO `installments` (`id`, `loan_id`, `tanggal`, `bayar`, `created_at`, `updated_at`) VALUES
(1, 1, '2026-02-26', 200000, '2026-02-25 22:25:03', '2026-02-25 22:25:03'),
(2, 1, '2026-02-26', 200000, '2026-02-25 22:27:24', '2026-02-25 22:27:24'),
(3, 1, '2026-02-26', 300000, '2026-02-25 22:34:32', '2026-02-25 22:34:32'),
(4, 2, '2026-03-07', 200, '2026-03-06 21:50:20', '2026-03-06 21:50:20'),
(5, 4, '2026-03-07', 100, '2026-03-06 23:25:12', '2026-03-06 23:25:12'),
(6, 4, '2026-03-07', 100, '2026-03-06 23:28:27', '2026-03-06 23:28:27'),
(7, 4, '2026-03-07', 100, '2026-03-06 23:31:17', '2026-03-06 23:31:17'),
(8, 4, '2026-03-07', 100, '2026-03-06 23:33:36', '2026-03-06 23:33:36'),
(9, 4, '2026-03-07', 100, '2026-03-06 23:34:20', '2026-03-06 23:34:20'),
(12, 7, '2026-03-08', 30000, '2026-03-08 05:59:15', '2026-03-08 05:59:15'),
(13, 8, '2026-03-08', 600, '2026-03-08 06:01:40', '2026-03-08 06:01:40'),
(14, 9, '2026-03-08', 500, '2026-03-08 06:09:11', '2026-03-08 06:09:11'),
(15, 9, '2026-03-08', 100, '2026-03-08 06:12:13', '2026-03-08 06:12:13'),
(16, 11, '2026-03-08', 1100, '2026-03-08 07:13:13', '2026-03-08 07:13:13'),
(17, 12, '2026-03-08', 1300, '2026-03-08 07:17:54', '2026-03-08 07:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tipe` enum('masuk','keluar') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'kripik', 'masuk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis` enum('utang','piutang') NOT NULL,
  `nominal` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `status` enum('lunas','belum') NOT NULL DEFAULT 'belum',
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembelian_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `customer_id`, `transaction_id`, `jenis`, `nominal`, `sisa`, `status`, `keterangan`, `created_at`, `updated_at`, `supplier_id`, `pembelian_id`) VALUES
(1, 1, NULL, 'utang', 2000000, 1300000, 'belum', 'mmmm', '2026-02-23 22:55:57', '2026-02-25 22:34:32', NULL, NULL),
(2, NULL, 24, 'utang', 400, 0, 'lunas', 'DP / Bayar awal', '2026-03-06 21:40:27', '2026-03-06 21:50:20', NULL, NULL),
(4, NULL, NULL, 'utang', 300, 100, 'belum', 'DP / Bayar awal', '2026-03-06 23:08:48', '2026-03-06 23:34:20', NULL, NULL),
(7, NULL, NULL, 'utang', 35000, 5000, 'belum', NULL, '2026-03-08 05:59:15', '2026-03-08 05:59:15', NULL, NULL),
(8, NULL, NULL, 'utang', 1000, 400, 'belum', NULL, '2026-03-08 06:01:40', '2026-03-08 06:01:40', NULL, NULL),
(9, NULL, NULL, 'utang', 1500, 400, 'belum', NULL, '2026-03-08 06:09:11', '2026-03-08 06:12:13', NULL, NULL),
(11, NULL, NULL, 'utang', 2000, 1100, 'belum', NULL, '2026-03-08 07:13:13', '2026-03-08 07:13:13', NULL, NULL),
(12, NULL, NULL, 'utang', 1600, 1300, 'belum', NULL, '2026-03-08 07:17:54', '2026-03-08 07:17:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_10_29_035426_create_permission_tables', 1),
(6, '2025_11_01_032715_create_bidang_kesehatan_masyarakats_table', 1),
(7, '2025_11_05_034737_create_bidang_pelayanan_kesehatan_masyarakats_table', 1),
(8, '2025_11_06_045641_create_bidang_pencegahan_penyakit_menulars_table', 1),
(9, '2025_11_08_045845_create_bidang_sumber_daya_kesehatan_masyarakats_table', 1),
(10, '2025_11_09_014751_create_sekretariats_table', 1),
(14, '2026_01_05_032327_create_drivers_table', 2),
(15, '2026_01_05_032449_create_vehicles_table', 2),
(16, '2026_01_05_042333_create_cargo_trackings_table', 2),
(17, '2026_02_15_100151_create_angsuran_table', 3),
(18, '2026_02_15_111004_create_pinjaman_table', 3),
(19, '2026_02_15_134029_create_sumber_table', 4),
(20, '2026_02_15_134955_create_barang_table', 5),
(21, '2026_02_15_142323_create_kategori_table', 6),
(22, '2026_02_16_034111_create_pembelian_table', 7),
(23, '2026_02_19_052931_create_transactions_table', 8),
(24, '2026_02_22_051711_create_customers_table', 9),
(25, '2026_02_22_052518_create_loans_table', 10),
(26, '2026_02_22_052725_create_installments_table', 11),
(27, '2026_02_26_083048_add_transaction_id_to_loans_table', 12),
(28, '2026_03_03_052745_create_cash_flows_table', 13),
(29, '2026_03_03_053439_create_suppliers_table', 14),
(30, '2026_03_08_040705_create_pembelians_table', 15),
(31, '2026_03_08_094323_add_supplier_and_pembelian_to_loans_table', 16),
(32, '2026_03_08_100802_add_pembayaran_fields_to_pembelians_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 7),
(5, 'App\\Models\\User', 3),
(5, 'App\\Models\\User', 8),
(5, 'App\\Models\\User', 11),
(6, 'App\\Models\\User', 5),
(7, 'App\\Models\\User', 9),
(7, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_saldo`
--

CREATE TABLE `mutasi_saldo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sumber_dana_id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('masuk','keluar') NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `referensi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `sumber_dana_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelians`
--

CREATE TABLE `pembelians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL,
  `metode_bayar` enum('cash','kredit') NOT NULL DEFAULT 'cash',
  `dibayar` int(11) NOT NULL DEFAULT 0,
  `sisa` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelians`
--

INSERT INTO `pembelians` (`id`, `kode`, `supplier_id`, `tanggal`, `total`, `metode_bayar`, `dibayar`, `sisa`, `created_at`, `updated_at`) VALUES
(1, 'PB1772952247', 1, '2026-03-08', 15000, 'cash', 0, 0, '2026-03-07 23:44:07', '2026-03-07 23:44:07'),
(2, 'PB1772952346', 1, '2026-03-08', 3600, 'cash', 0, 0, '2026-03-07 23:45:46', '2026-03-07 23:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_details`
--

CREATE TABLE `pembelian_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pembelian_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian_details`
--

INSERT INTO `pembelian_details` (`id`, `pembelian_id`, `barang_id`, `qty`, `harga`, `subtotal`) VALUES
(1, 1, 0, 30, 500, 15000),
(2, 2, 0, 4, 900, 3600);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `sumber_dana_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `nominal` bigint(20) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `mitra_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis` enum('tunai','kredit') NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penjualan_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `mitra_id` bigint(20) UNSIGNED NOT NULL,
  `total` bigint(20) NOT NULL,
  `sisa` bigint(20) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` enum('belum','lunas') NOT NULL DEFAULT 'belum',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'web', '2026-01-18 20:56:05', '2026-01-18 20:56:05'),
(5, 'driver', 'web', '2026-01-18 20:56:05', '2026-01-18 20:56:05'),
(6, 'super-admin', 'web', '2026-01-26 03:38:36', '2026-01-26 03:38:36'),
(7, 'mitra', 'web', '2026-02-03 20:26:29', '2026-02-03 20:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sekretariats`
--

CREATE TABLE `sekretariats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` year(4) DEFAULT NULL,
  `month` varchar(255) DEFAULT NULL,
  `nilai_sakip` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setoran`
--

CREATE TABLE `setoran` (
  `id_setoran` varchar(10) NOT NULL,
  `id_hutang` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `setor` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_transactions`
--

CREATE TABLE `stock_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `jenis` enum('masuk','keluar','penjualan','retur') NOT NULL,
  `qty` int(11) NOT NULL,
  `ref_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stok_logs`
--

CREATE TABLE `stok_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('masuk','keluar') NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok_logs`
--

INSERT INTO `stok_logs` (`id`, `barang_id`, `tipe`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 0, 'masuk', 5, NULL, '2026-02-18 08:02:21', '2026-02-18 08:02:21'),
(2, 0, 'masuk', 5, NULL, '2026-02-18 08:02:37', '2026-02-18 08:02:37'),
(3, 0, 'keluar', 7, NULL, '2026-02-18 08:03:23', '2026-02-18 08:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama`, `kontak`, `created_at`, `updated_at`) VALUES
(1, 'ighfar', '000000009999', NULL, '2026-03-09 06:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembali` int(11) DEFAULT NULL,
  `metode` enum('tunai','kredit') NOT NULL DEFAULT 'tunai',
  `sisa` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `invoice`, `customer_id`, `total`, `bayar`, `kembali`, `metode`, `sisa`, `created_at`, `updated_at`) VALUES
(15, 'INV-20260306-Xfoqg', NULL, 600, 700, 100, 'tunai', 0, '2026-03-06 03:30:18', '2026-03-06 03:30:18'),
(16, 'INV-20260306-dt5c2', NULL, 600, 1000, 400, 'tunai', 0, '2026-03-06 06:52:16', '2026-03-06 06:52:16'),
(17, 'INV-20260306-GnhYJ', NULL, 8000, 9000, 1000, 'tunai', 0, '2026-03-06 06:55:35', '2026-03-06 06:55:35'),
(18, 'INV-20260306-dnqU1', NULL, 600, 800, 200, 'tunai', 0, '2026-03-06 06:56:56', '2026-03-06 06:56:56'),
(21, 'INV-20260307-s2PmH', NULL, 600, 800, 200, 'tunai', NULL, '2026-03-06 21:28:32', '2026-03-06 21:28:32'),
(22, 'INV-20260307-0oStm', NULL, 600, 800, 200, 'tunai', NULL, '2026-03-06 21:29:54', '2026-03-06 21:29:54'),
(23, 'INV-20260307-G6Uh1', NULL, 600, 800, 200, 'tunai', NULL, '2026-03-06 21:31:50', '2026-03-06 21:31:50'),
(24, 'INV-20260307-uufsE', NULL, 600, 400, 0, 'tunai', NULL, '2026-03-06 21:40:27', '2026-03-06 21:40:27'),
(31, 'INV-20260310-Aba9R', NULL, 1584000, 1600000, 16000, 'tunai', NULL, '2026-03-10 03:49:20', '2026-03-10 03:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `barang_id`, `qty`, `price`, `subtotal`, `created_at`, `updated_at`) VALUES
(2, 15, 1, 1, 600, 600, '2026-03-06 03:30:18', '2026-03-06 03:30:18'),
(3, 18, 1, 1, 600, 600, '2026-03-06 06:56:56', '2026-03-06 06:56:56'),
(6, 21, 1, 1, 600, 600, '2026-03-06 21:28:32', '2026-03-06 21:28:32'),
(7, 22, 1, 1, 600, 600, '2026-03-06 21:29:54', '2026-03-06 21:29:54'),
(8, 23, 1, 1, 600, 600, '2026-03-06 21:31:50', '2026-03-06 21:31:50'),
(9, 24, 1, 1, 600, 600, '2026-03-06 21:40:27', '2026-03-06 21:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('super-admin','admin','mitra','driver','') NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Super Admin', 'superadmin@mail.com', 'super-admin', NULL, '$2y$12$EFLz7W8FGGSz4yCdUr2vnejqoNfUddUabPk4zQuStAfY8EulRcmo2', NULL, '2026-01-26 03:38:37', '2026-01-26 03:38:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cargos_driver_id_foreign` (`driver_id`),
  ADD KEY `mitra_id` (`mitra_id`);

--
-- Indexes for table `cash_flows`
--
ALTER TABLE `cash_flows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `installments`
--
ALTER TABLE `installments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `installments_loan_id_foreign` (`loan_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loans_customer_id_foreign` (`customer_id`),
  ADD KEY `loans_transaction_id_foreign` (`transaction_id`),
  ADD KEY `loans_supplier_id_foreign` (`supplier_id`),
  ADD KEY `loans_pembelian_id_foreign` (`pembelian_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `mutasi_saldo`
--
ALTER TABLE `mutasi_saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembelians_kode_unique` (`kode`),
  ADD KEY `pembelians_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `pembelian_details`
--
ALTER TABLE `pembelian_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_details_pembelian_id_foreign` (`pembelian_id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_detail_penjualan_id_foreign` (`penjualan_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `pinjaman_user_id_foreign` (`user_id`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sekretariats`
--
ALTER TABLE `sekretariats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setoran`
--
ALTER TABLE `setoran`
  ADD PRIMARY KEY (`id_setoran`);

--
-- Indexes for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_logs`
--
ALTER TABLE `stok_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_invoice_unique` (`invoice`),
  ADD KEY `transactions_user_id_foreign` (`customer_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cash_flows`
--
ALTER TABLE `cash_flows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installments`
--
ALTER TABLE `installments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `mutasi_saldo`
--
ALTER TABLE `mutasi_saldo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelians`
--
ALTER TABLE `pembelians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembelian_details`
--
ALTER TABLE `pembelian_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sekretariats`
--
ALTER TABLE `sekretariats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_transactions`
--
ALTER TABLE `stock_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok_logs`
--
ALTER TABLE `stok_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `cargos_driver_id_foreign` FOREIGN KEY (`driver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `installments`
--
ALTER TABLE `installments`
  ADD CONSTRAINT `installments_loan_id_foreign` FOREIGN KEY (`loan_id`) REFERENCES `loans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `loans`
--
ALTER TABLE `loans`
  ADD CONSTRAINT `loans_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loans_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelians` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loans_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `loans_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembelians`
--
ALTER TABLE `pembelians`
  ADD CONSTRAINT `pembelians_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pembelian_details`
--
ALTER TABLE `pembelian_details`
  ADD CONSTRAINT `pembelian_details_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelians` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD CONSTRAINT `penjualan_detail_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
