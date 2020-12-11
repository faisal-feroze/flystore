-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 09:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `have_sub_category` tinyint(1) DEFAULT NULL,
  `publication_status` tinyint(1) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `have_sub_category`, `publication_status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Meat', 'All types of Meats. yummy', 0, 1, NULL, '2020-11-21 20:52:07', '2020-11-27 08:02:26'),
(2, 'Gas Cyllinder', 'dsfdasfergsfdgd', NULL, 1, NULL, '2020-11-27 08:06:44', '2020-11-27 08:06:44'),
(3, 'Chips', 'chips', NULL, 1, NULL, '2020-11-27 08:38:57', '2020-11-27 08:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2020_11_14_202502_laratrust_setup_tables', 2),
(11, '2020_11_21_194531_create_products_table', 3),
(12, '2020_11_21_201213_create_categories_table', 3),
(13, '2020_11_21_202249_create_sub_categories_table', 3),
(14, '2020_12_02_175203_add_user_info_to_user_table', 4),
(15, '2020_12_08_084835_create_orders_table', 5),
(16, '2020_12_08_101748_add_order_code_to_orders_table', 6),
(17, '2020_12_08_180730_add_product_name_to_orders_table', 7),
(18, '2020_12_11_075046_create_wishlists_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `delivery_agent_id` int(11) DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txn_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `total_amount`, `delivery_agent_id`, `shipping_address`, `status`, `payment_method`, `payment_detail`, `txn_id`, `payment_status`, `created_at`, `updated_at`, `order_code`, `product_name`) VALUES
(4, 8, 10, 1, 20, NULL, 'mirpur', 'placed', 'bkash', NULL, NULL, 'unpaid', '2020-12-08 12:13:12', '2020-12-08 12:13:12', 'ORDER-1', 'Ring Chips'),
(5, 8, 8, 2, 50, NULL, 'mirpur', 'placed', 'bkash', NULL, NULL, 'unpaid', '2020-12-08 12:13:12', '2020-12-08 12:13:12', 'ORDER-1', 'Mr. Twist'),
(6, 8, 3, 1, 450, NULL, 'mirpur', 'placed', 'bkash', NULL, NULL, 'unpaid', '2020-12-08 12:14:03', '2020-12-08 12:14:03', 'ORDER-6', 'Beef Meat');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2020-11-14 14:28:50', '2020-11-14 14:28:50'),
(2, 'users-read', 'Read Users', 'Read Users', '2020-11-14 14:28:50', '2020-11-14 14:28:50'),
(3, 'users-update', 'Update Users', 'Update Users', '2020-11-14 14:28:50', '2020-11-14 14:28:50'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2020-11-14 14:28:50', '2020-11-14 14:28:50'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2020-11-14 14:28:50', '2020-11-14 14:28:50'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2020-11-14 14:28:50', '2020-11-14 14:28:50'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2020-11-14 14:28:51', '2020-11-14 14:28:51'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2020-11-14 14:28:51', '2020-11-14 14:28:51'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2020-11-14 14:28:51', '2020-11-14 14:28:51'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2020-11-14 14:28:51', '2020-11-14 14:28:51'),
(11, 'module_1_name-create', 'Create Module_1_name', 'Create Module_1_name', '2020-11-14 14:28:51', '2020-11-14 14:28:51'),
(12, 'module_1_name-read', 'Read Module_1_name', 'Read Module_1_name', '2020-11-14 14:28:52', '2020-11-14 14:28:52'),
(13, 'module_1_name-update', 'Update Module_1_name', 'Update Module_1_name', '2020-11-14 14:28:52', '2020-11-14 14:28:52'),
(14, 'module_1_name-delete', 'Delete Module_1_name', 'Delete Module_1_name', '2020-11-14 14:28:52', '2020-11-14 14:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(10, 3),
(11, 4),
(12, 4),
(13, 4),
(14, 4);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regular_price` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `current_stock` int(11) DEFAULT NULL,
  `sold_quantity` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publication_status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `name`, `description`, `unit`, `regular_price`, `discount_price`, `current_stock`, `sold_quantity`, `image`, `image1`, `image2`, `image3`, `image4`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Boiler Chicken', 'Boiler Chicken yummy yummy hmmmmmmmmmm', 'kg', 140, 130, 10, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-21 20:53:25', '2020-11-21 20:53:25'),
(2, 1, 0, 'Desi Murgi', 'Desi Murgi hmmmmmmmmmmmmmm', '500 gm', 300, 290, 6, 0, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-21 20:53:25', '2020-11-21 20:53:25'),
(3, 1, NULL, 'Beef Meat', 'Solid Beef Meat good for healt', '1 kg', 600, 450, 10, NULL, 'ictd_new.png', 'bl_new.png', NULL, NULL, NULL, 1, '2020-11-27 03:56:30', '2020-11-27 05:34:02'),
(4, 1, NULL, 'Lamb Meat', 'ddsafgfassfd', '1 kg', 600, 600, 5, NULL, 'BL-new-Logo_30072020_vertical.png', 's1.png', 's2.png', NULL, NULL, 0, '2020-11-27 03:58:23', '2020-11-27 05:35:02'),
(5, 3, NULL, 'Potato crakers', 'edgfdgafg', 'pc', 15, 15, 12, NULL, 'sl3.jpg', NULL, NULL, NULL, NULL, 1, '2020-11-27 08:40:20', '2020-11-27 08:40:20'),
(6, 2, NULL, 'LPG', 'rdfvnmbncbvvc', 'pc', 3000, 2500, 10, NULL, 'c1.jpg', NULL, NULL, NULL, NULL, 1, '2020-11-27 08:41:50', '2020-11-27 08:41:50'),
(7, 2, NULL, 'LPG 2', 'waerstyjhgdsdfg', 'pc', 2222, 2000, 5, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-27 08:42:40', '2020-11-27 08:42:40'),
(8, 3, NULL, 'Mr. Twist', 'ersthjk.l/jk,hmgndf', 'pc', 25, 25, 22, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-27 08:43:00', '2020-11-27 08:43:00'),
(9, 1, NULL, 'Ship meat', 'asghcvgjklhkgnfcxb fxhfftfxcb gfs dg sfdg d g', '500 gm', 500, 480, 10, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-27 08:43:41', '2020-11-27 08:43:41'),
(10, 3, NULL, 'Ring Chips', 'ertfchvj,vhgfdfsdxfvbnm,', 'pc', 20, 20, 20, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2020-11-27 08:44:01', '2020-11-27 08:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2020-11-14 14:28:50', '2020-11-14 14:28:50'),
(2, 'administrator', 'Administrator', 'Administrator', '2020-11-14 14:28:51', '2020-11-14 14:28:51'),
(3, 'user', 'User', 'User', '2020-11-14 14:28:51', '2020-11-14 14:28:51'),
(4, 'role_name', 'Role Name', 'Role Name', '2020-11-14 14:28:51', '2020-11-14 14:28:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 7, 'App\\User'),
(3, 8, 'App\\User'),
(3, 9, 'App\\User'),
(3, 10, 'App\\User'),
(3, 11, 'App\\User'),
(3, 12, 'App\\User'),
(3, 13, 'App\\User'),
(3, 14, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publication_status` tinyint(1) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `present_address`, `district`, `division`, `post_office`, `is_active`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `shipping_address`, `dob`, `profession`, `gender`) VALUES
(7, 'Faisal Feroze Tipu', 'tipu@gmail.com', '01675187137', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$nRCtIRiJB6Gy5RIJJYBcEeDiX9id2f3dJgBFVTXlX21au5.zKkzq.', NULL, '2020-11-16 07:31:51', '2020-11-16 07:31:51', NULL, NULL, NULL, NULL),
(8, 'raja', 'raja@gmail.com', '01670000000', 'mirpur', NULL, NULL, NULL, 0, NULL, '$2y$10$ZdjXzgKeso19NZlPQi2.iOKqyPc.0RSpO2MUX5qyHrUFtf/BTSiea', NULL, '2020-11-16 08:48:36', '2020-12-02 12:28:00', 'kafrul', '2 aug 2020', 'service holder', 'male'),
(9, 'rajaq', 'rajaq@gmail.com', '01670000001', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$6ns6Rk/zoddwUGmxDHBNNuFVq314GSANPPrZqYchRHG.9IlcAfPGG', NULL, '2020-11-16 08:51:37', '2020-11-16 08:51:37', NULL, NULL, NULL, NULL),
(10, 'rajaqq', 'rajaqq@gmail.com', '01670000002', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$9HYzK9pjdZpm0ChEjM9xz.Z6dK31/S0Ct742rdkLHZUv/yKyUNLhO', NULL, '2020-11-16 08:52:03', '2020-11-16 08:52:03', NULL, NULL, NULL, NULL),
(11, 'rajaqqq', 'raqjaqq@gmail.com', '01670000003', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$YkeqLdAjy1V/zl4g4Lpnb.OK8HJvEdufu/Tj5Wx39QeV5p5BVDtEi', NULL, '2020-11-16 08:53:03', '2020-11-16 08:53:03', NULL, NULL, NULL, NULL),
(12, 'rajaqqq', 'raqqjaqq@gmail.com', '01670000004', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$wc/LOR9.58RU3yPffsNecu2Zfw1amHYXBwykOiE1Io.M/fsNbMfOm', NULL, '2020-11-16 08:54:15', '2020-11-16 08:54:15', NULL, NULL, NULL, NULL),
(13, 'rajaqqqdf', 'raqdqdjaqq@gmail.com', '01670000005', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$jtINye.95gbFU7xuB1LMe.om5/zlzO/mzec3cy4DMzHWXqAvIIR.i', NULL, '2020-11-16 09:01:25', '2020-11-16 09:01:25', NULL, NULL, NULL, NULL),
(14, 'rajaqqqdfg', 'raqdqdjsssaqq@gmail.com', '01670000006', NULL, NULL, NULL, NULL, 0, NULL, '$2y$10$GjbjPBrWSZDynkTZTI7xi.v9.lRnnSdBO.wsOMQ./5qBrgqhyC9Bu', NULL, '2020-11-16 09:04:00', '2020-11-16 09:04:00', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 8, 2, '2020-12-11 02:03:43', '2020-12-11 02:03:43'),
(2, 8, 5, '2020-12-11 02:04:56', '2020-12-11 02:04:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
