-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2017 at 06:06 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `darji_samaj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id_car_model` int(10) UNSIGNED NOT NULL,
  `fk_id_manufacturer` int(11) NOT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id_car_model`, `fk_id_manufacturer`, `model_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 5, 'i-10', 'i-10', 'ACTIVE', '2017-09-22 02:16:05', '2017-09-22 02:16:05'),
(4, 5, 'Honda City', 'Honda-City', 'ACTIVE', '2017-09-22 02:16:14', '2017-09-22 02:16:14'),
(5, 3, 'i-20', 'i-20', 'ACTIVE', '2017-09-22 02:16:27', '2017-09-22 02:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_code` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `customer_name`, `customer_email`, `phone_no`, `mobile_no`, `city`, `area`, `p_code`, `created_at`, `updated_at`) VALUES
(2, 'Nirav Darji a', 'nirav.2d@gmail.com', '1231231233', '9966332255', 'Vadodara', 'Tarsali', 390009, '2017-09-28 01:18:08', '2017-09-28 01:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `job_cards`
--

CREATE TABLE `job_cards` (
  `id_job_card` int(10) UNSIGNED NOT NULL,
  `fk_id_customer` int(11) NOT NULL,
  `fk_id_car` int(11) NOT NULL,
  `total_services_price` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_cards`
--

INSERT INTO `job_cards` (`id_job_card`, `fk_id_customer`, `fk_id_car`, `total_services_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 0, 'New', '2017-09-28 00:15:07', '2017-09-28 00:15:07'),
(2, 2, 5, 0, 'New', '2017-09-28 00:17:48', '2017-09-28 00:19:04'),
(3, 1, 3, 150, 'New', '2017-09-28 03:06:02', '2017-09-28 03:06:02'),
(4, 2, 5, 150, 'New', '2017-09-28 10:23:52', '2017-09-28 10:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` enum('admin','team_member') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Sales India', 'admin@smart_wall.com', 'admin', 'admin'),
(3, 'BlueStar', 'darji@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id_manufacturer` int(10) UNSIGNED NOT NULL,
  `manufacturer_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id_manufacturer`, `manufacturer_by`, `img`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'OD', 'yBleOslX_1506002865.jpg', 'OD', 'ACTIVE', '2017-09-21 08:37:21', '2017-09-21 08:42:21'),
(4, 'BMW', 'KldWdube_1506006413.jpg', 'BMW', 'ACTIVE', '2017-09-21 09:36:53', '2017-09-21 09:37:12'),
(5, 'Honda', 'DyAcN8oY_1506066338.JPG', 'Honda', 'ACTIVE', '2017-09-22 02:15:38', '2017-09-22 02:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `master_cities`
--

CREATE TABLE `master_cities` (
  `id_master_city` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_cities`
--

INSERT INTO `master_cities` (`id_master_city`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Rajpipla', 'Rajpipla', 'INACTIVE', '2017-03-22 21:43:39', '2017-09-19 11:19:25'),
(4, 'Bharuch', 'Bharuch', 'ACTIVE', '2017-03-22 21:43:54', '2017-03-22 21:43:54'),
(5, 'aa', 'aa', 'ACTIVE', '2017-09-19 20:49:46', '2017-09-19 20:49:46');

-- --------------------------------------------------------

--
-- Table structure for table `member_roles`
--

CREATE TABLE `member_roles` (
  `id_member_roles` int(10) UNSIGNED NOT NULL,
  `member_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_roles`
--

INSERT INTO `member_roles` (`id_member_roles`, `member_role`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aa qqa aa', 'aa-qqa-aa', 'ACTIVE', '2017-03-22 12:04:07', '2017-03-22 21:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2017_03_21_151114_create_master_cities_table', 2),
(4, '2017_03_22_032054_create_member_roles_table', 2),
(5, '2017_09_20_014804_create_product_categories_table', 2),
(6, '2017_09_20_073301_create_products_table', 3),
(7, '2017_09_20_180104_create_services_categories_table', 4),
(8, '2017_09_20_184557_create_services_table', 5),
(9, '2017_09_21_110734_create_manufacturers_table', 6),
(10, '2017_09_21_151610_create_car_models_table', 7),
(11, '2017_09_23_064217_create_job_cards_table', 8),
(12, '2017_09_24_130710_create_admins_table', 9),
(13, '2017_09_26_041954_create_selected_job_card_services_lists_table', 10),
(14, '2017_09_28_063120_create_customers_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(10) UNSIGNED NOT NULL,
  `fk_id_product_category` int(11) NOT NULL,
  `pro_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_cat_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_price` int(11) DEFAULT NULL,
  `pro_qty` int(11) DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `fk_id_product_category`, `pro_title`, `pro_cat_desc`, `pro_price`, `pro_qty`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'New Product Update', 'Desciption About Update', 20, 10, 'New-Product-Update', 'ACTIVE', '2017-09-20 02:13:10', '2017-09-28 02:05:07'),
(2, 3, 'Product', 'Description about Cate', 20, 50, 'Product', 'ACTIVE', '2017-09-20 09:45:35', '2017-09-20 09:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id_product_category` int(10) UNSIGNED NOT NULL,
  `pro_cat_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_cat_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id_product_category`, `pro_cat_title`, `pro_cat_desc`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'ProNew Cate', 'DescPro Desc', 'ProNew-Cate', 'ACTIVE', '2017-09-19 20:58:50', '2017-09-24 09:26:51'),
(3, 'Car i20', 'This car is var nice', 'Car-i20', 'ACTIVE', '2017-09-19 21:33:04', '2017-09-19 21:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `selected_job_card_services_lists`
--

CREATE TABLE `selected_job_card_services_lists` (
  `id_selected_job_card` int(10) UNSIGNED NOT NULL,
  `fk_id_job_card` int(11) NOT NULL,
  `fk_id_job_card_services` int(11) NOT NULL,
  `services_price` int(11) DEFAULT NULL,
  `services_name` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selected_job_card_services_lists`
--

INSERT INTO `selected_job_card_services_lists` (`id_selected_job_card`, `fk_id_job_card`, `fk_id_job_card_services`, `services_price`, `services_name`, `created_at`, `updated_at`) VALUES
(9, 1, 6, NULL, NULL, '2017-09-28 00:15:46', '2017-09-28 00:15:46'),
(10, 1, 7, NULL, NULL, '2017-09-28 00:15:46', '2017-09-28 00:15:46'),
(15, 2, 6, NULL, NULL, '2017-09-28 00:19:04', '2017-09-28 00:19:04'),
(16, 2, 7, NULL, NULL, '2017-09-28 00:19:04', '2017-09-28 00:19:04'),
(17, 2, 8, NULL, NULL, '2017-09-28 00:19:04', '2017-09-28 00:19:04'),
(18, 2, 9, NULL, NULL, '2017-09-28 00:19:04', '2017-09-28 00:19:04'),
(19, 3, 1, NULL, NULL, '2017-09-28 03:06:02', '2017-09-28 03:06:02'),
(20, 3, 4, NULL, NULL, '2017-09-28 03:06:02', '2017-09-28 03:06:02'),
(21, 4, 1, NULL, NULL, '2017-09-28 10:23:52', '2017-09-28 10:23:52'),
(22, 4, 4, NULL, NULL, '2017-09-28 10:23:52', '2017-09-28 10:23:52');

-- --------------------------------------------------------

--
-- Table structure for table `seo_admin_login`
--

CREATE TABLE `seo_admin_login` (
  `id` int(11) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seo_admin_login`
--

INSERT INTO `seo_admin_login` (`id`, `u_name`, `pass`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `seo_table`
--

CREATE TABLE `seo_table` (
  `id` int(10) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `seo_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id_services` int(10) UNSIGNED NOT NULL,
  `fk_id_services_category` int(11) NOT NULL,
  `ser_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ser_cat_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ser_price` int(11) DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_services`, `fk_id_services_category`, `ser_title`, `ser_cat_desc`, `ser_price`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'FUEL CAPS', 'Description', 100, 'FUEL-CAPS', 'ACTIVE', '2017-09-27 13:47:29', '2017-09-27 13:47:59'),
(2, 1, 'CHECK CRACK LIGHTS', 'Description', 100, 'CHECK-CRACK-LIGHTS', 'ACTIVE', '2017-09-27 13:49:08', '2017-09-27 13:49:08'),
(3, 1, 'SPARE WHEELS', 'Decription', 120, 'SPARE-WHEELS', 'ACTIVE', '2017-09-27 13:49:46', '2017-09-27 13:49:46'),
(4, 1, 'WHEELS NUTS', 'Description', 50, 'WHEELS-NUTS', 'ACTIVE', '2017-09-27 13:50:27', '2017-09-27 13:50:27'),
(5, 1, 'TYRE CONDITION', 'Decrip', 50, 'TYRE-CONDITION', 'ACTIVE', '2017-09-27 13:51:07', '2017-09-27 13:51:07'),
(6, 2, 'SEAT BELTS', 'Desciption', 100, 'SEAT-BELTS', 'ACTIVE', '2017-09-27 13:51:44', '2017-09-27 13:51:44'),
(7, 2, 'BUCKLES', 'Description', 80, 'BUCKLES', 'ACTIVE', '2017-09-27 13:52:31', '2017-09-27 13:52:31'),
(8, 2, 'ENGINE MOUNTS', 'Description', 150, 'ENGINE-MOUNTS', 'ACTIVE', '2017-09-27 13:53:04', '2017-09-27 13:53:04'),
(9, 2, 'HORN', 'Description', 50, 'HORN', 'ACTIVE', '2017-09-27 13:53:42', '2017-09-27 13:53:42'),
(10, 3, 'BREAK FUEL', NULL, 450, 'BREAK-FUEL', 'ACTIVE', '2017-09-27 14:09:28', '2017-09-27 14:09:28'),
(11, 3, 'DRIVE BELTS', NULL, 150, 'DRIVE-BELTS', 'ACTIVE', '2017-09-27 14:09:54', '2017-09-27 14:09:54'),
(12, 1, 'ENGINE FLUID', NULL, 250, 'ENGINE-FLUID', 'ACTIVE', '2017-09-27 14:10:31', '2017-09-28 02:07:44');

-- --------------------------------------------------------

--
-- Table structure for table `services_categories`
--

CREATE TABLE `services_categories` (
  `id_services_category` int(10) UNSIGNED NOT NULL,
  `ser_cat_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ser_cat_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_categories`
--

INSERT INTO `services_categories` (`id_services_category`, `ser_cat_title`, `ser_cat_desc`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'OUTSIDE CHECK', 'Any Desc', 'OUTSIDE-CHECK', 'ACTIVE', '2017-09-27 13:43:13', '2017-09-27 13:43:13'),
(2, 'FROM INSIDE CHECK', 'Description', 'FROM-INSIDE-CHECK', 'ACTIVE', '2017-09-27 13:43:52', '2017-09-27 13:43:52'),
(3, 'UNDER BONNET CHECK', 'description', 'UNDER-BONNET-CHECK', 'ACTIVE', '2017-09-27 13:44:23', '2017-09-27 13:44:23'),
(4, 'UNDER BODY CHECK', 'description', 'UNDER-BODY-CHECK', 'ACTIVE', '2017-09-27 13:44:52', '2017-09-27 13:44:52'),
(5, 'ROAD TEST', 'Description', 'ROAD-TEST', 'ACTIVE', '2017-09-27 13:45:24', '2017-09-27 13:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` int(11) DEFAULT NULL,
  `user_type` enum('ADMIN','INPECTER') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `mobile_no`, `user_type`, `created_at`, `updated_at`) VALUES
(3, 'Nirav', 'nirav.2d@gmail.com', '$2y$10$irK4dgncuiJceGOkwyVQae3S5kQiKYMum3/XodsCuzCP0Xb.Gq2t6', NULL, 1234567891, 'ADMIN', '2017-09-28 01:49:58', '2017-09-28 01:52:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id_car_model`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `job_cards`
--
ALTER TABLE `job_cards`
  ADD PRIMARY KEY (`id_job_card`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id_manufacturer`);

--
-- Indexes for table `master_cities`
--
ALTER TABLE `master_cities`
  ADD PRIMARY KEY (`id_master_city`);

--
-- Indexes for table `member_roles`
--
ALTER TABLE `member_roles`
  ADD PRIMARY KEY (`id_member_roles`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id_product_category`);

--
-- Indexes for table `selected_job_card_services_lists`
--
ALTER TABLE `selected_job_card_services_lists`
  ADD PRIMARY KEY (`id_selected_job_card`);

--
-- Indexes for table `seo_admin_login`
--
ALTER TABLE `seo_admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_table`
--
ALTER TABLE `seo_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`);

--
-- Indexes for table `services_categories`
--
ALTER TABLE `services_categories`
  ADD PRIMARY KEY (`id_services_category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id_car_model` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `job_cards`
--
ALTER TABLE `job_cards`
  MODIFY `id_job_card` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id_manufacturer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master_cities`
--
ALTER TABLE `master_cities`
  MODIFY `id_master_city` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `member_roles`
--
ALTER TABLE `member_roles`
  MODIFY `id_member_roles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id_product_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `selected_job_card_services_lists`
--
ALTER TABLE `selected_job_card_services_lists`
  MODIFY `id_selected_job_card` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `seo_admin_login`
--
ALTER TABLE `seo_admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seo_table`
--
ALTER TABLE `seo_table`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id_services` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `services_categories`
--
ALTER TABLE `services_categories`
  MODIFY `id_services_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
