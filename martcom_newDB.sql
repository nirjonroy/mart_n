-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 26, 2021 at 07:58 PM
-- Server version: 10.2.36-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martcom_newDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisments`
--

CREATE TABLE `advertisments` (
  `id` int(10) UNSIGNED NOT NULL,
  `area` tinyint(4) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_id` int(11) NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shippingfee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `district_id`, `area`, `shippingfee`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhanmondi', '60', 1, '2020-08-29 11:33:47', '2020-08-29 11:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posttype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frontpage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brandinserts`
--

CREATE TABLE `brandinserts` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcat_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brandinserts`
--

INSERT INTO `brandinserts` (`id`, `brand_id`, `subcat_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2020-08-29 03:59:43', '2020-08-29 03:59:43'),
(2, '1', '3', '2020-08-29 03:59:43', '2020-08-29 03:59:43'),
(3, '2', '1', '2020-08-29 10:53:17', '2020-08-29 10:53:17'),
(4, '2', '2', '2020-08-29 10:53:17', '2020-08-29 10:53:17'),
(5, '2', '3', '2020-08-29 10:53:17', '2020-08-29 10:53:17'),
(6, '2', '1', '2020-08-29 11:27:04', '2020-08-29 11:27:04'),
(7, '2', '2', '2020-08-29 11:27:04', '2020-08-29 11:27:04'),
(8, '2', '3', '2020-08-29 11:27:04', '2020-08-29 11:27:04'),
(9, '1', '1', '2020-08-29 11:28:37', '2020-08-29 11:28:37'),
(10, '1', '3', '2020-08-29 11:28:37', '2020-08-29 11:28:37'),
(11, '3', '1', '2020-08-29 15:55:25', '2020-08-29 15:55:25'),
(12, '3', '2', '2020-08-29 15:55:26', '2020-08-29 15:55:26'),
(13, '3', '3', '2020-08-29 15:55:26', '2020-08-29 15:55:26'),
(14, '4', '1', '2020-09-14 06:21:47', '2020-09-14 06:21:47'),
(15, '4', '2', '2020-09-14 06:21:47', '2020-09-14 06:21:47'),
(16, '4', '3', '2020-09-14 06:21:47', '2020-09-14 06:21:47'),
(17, '4', '4', '2020-09-14 06:21:47', '2020-09-14 06:21:47'),
(18, '5', '7', '2020-12-26 08:41:09', '2020-12-26 08:41:09'),
(19, '6', '7', '2021-01-23 15:49:39', '2021-01-23 15:49:39'),
(20, '6', '8', '2021-01-23 15:49:39', '2021-01-23 15:49:39'),
(21, '6', '7', '2021-01-23 17:53:54', '2021-01-23 17:53:54'),
(22, '6', '8', '2021-01-23 17:53:54', '2021-01-23 17:53:54'),
(23, '6', '9', '2021-01-23 17:53:54', '2021-01-23 17:53:54'),
(24, '6', '7', '2021-01-23 18:35:46', '2021-01-23 18:35:46'),
(25, '6', '8', '2021-01-23 18:35:46', '2021-01-23 18:35:46'),
(26, '6', '9', '2021-01-23 18:35:46', '2021-01-23 18:35:46'),
(27, '6', '10', '2021-01-23 18:35:46', '2021-01-23 18:35:46'),
(28, '1', '3', '2021-01-25 06:31:51', '2021-01-25 06:31:51'),
(29, '6', '7', '2021-01-29 03:19:00', '2021-01-29 03:19:00'),
(30, '6', '8', '2021-01-29 03:19:00', '2021-01-29 03:19:00'),
(31, '6', '9', '2021-01-29 03:19:00', '2021-01-29 03:19:00'),
(32, '6', '11', '2021-01-29 03:19:00', '2021-01-29 03:19:00'),
(33, '6', '10', '2021-01-29 03:19:00', '2021-01-29 03:19:00'),
(34, '6', '7', '2021-01-29 06:08:54', '2021-01-29 06:08:54'),
(35, '6', '8', '2021-01-29 06:08:54', '2021-01-29 06:08:54'),
(36, '6', '9', '2021-01-29 06:08:54', '2021-01-29 06:08:54'),
(37, '6', '11', '2021-01-29 06:08:54', '2021-01-29 06:08:54'),
(38, '6', '10', '2021-01-29 06:08:54', '2021-01-29 06:08:54'),
(39, '6', '7', '2021-01-29 06:09:08', '2021-01-29 06:09:08'),
(40, '6', '8', '2021-01-29 06:09:08', '2021-01-29 06:09:08'),
(41, '6', '9', '2021-01-29 06:09:08', '2021-01-29 06:09:08'),
(42, '6', '11', '2021-01-29 06:09:08', '2021-01-29 06:09:08'),
(43, '6', '13', '2021-01-29 06:09:08', '2021-01-29 06:09:08'),
(44, '6', '10', '2021-01-29 06:09:08', '2021-01-29 06:09:08'),
(45, '6', '7', '2021-01-31 08:47:53', '2021-01-31 08:47:53'),
(46, '6', '14', '2021-01-31 08:47:53', '2021-01-31 08:47:53'),
(47, '6', '8', '2021-01-31 08:47:53', '2021-01-31 08:47:53'),
(48, '6', '9', '2021-01-31 08:47:53', '2021-01-31 08:47:53'),
(49, '6', '11', '2021-01-31 08:47:53', '2021-01-31 08:47:53'),
(50, '6', '13', '2021-01-31 08:47:53', '2021-01-31 08:47:53'),
(51, '6', '10', '2021-01-31 08:47:53', '2021-01-31 08:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brandName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brandName`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Apple', 'apple', 'public/uploads/brand/1598700517-apple.jpg', 1, '2020-08-29 03:59:43', '2020-08-29 11:28:37'),
(2, 'Samsung', 'samsung', 'public/uploads/brand/1598700423-samsung-brand', 1, '2020-08-29 10:53:17', '2020-08-29 11:27:03'),
(3, 'Hp', 'hp', 'public/uploads/brand/1598716524-hp-brand.jpg', 1, '2020-08-29 15:55:25', '2020-08-29 15:55:25'),
(5, 'Madhurjo', 'madhurjo', 'public/uploads/brand/1608972069-cq5dam.thumbnail.150dpi.jpg', 1, '2020-12-26 08:41:09', '2020-12-26 08:41:09'),
(6, 'Brand9294', 'brand9294', 'public/uploads/brand/1612082873-1608821694-Mart Cover photo00.png', 1, '2021-01-23 15:49:39', '2021-01-31 08:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `bundles`
--

CREATE TABLE `bundles` (
  `id` int(10) UNSIGNED NOT NULL,
  `bundleName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `catname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(10) UNSIGNED NOT NULL,
  `frontPage` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `catname`, `slug`, `image`, `level`, `frontPage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronic Devices', 'electronic-devices', 'public/uploads/category/1611583408-120940576-desk-with-gadgets-or-electronic-equipment-for-daily-use-laptop-computer-cell-phones-and-digital-came.jpg', 1, NULL, 1, '2020-08-27 10:56:53', '2021-01-25 14:03:28'),
(2, 'Electronic Accessories', 'electronic-accessories', 'public/uploads/category/1598525995-eaccessories.png', 2, NULL, 1, '2020-08-27 10:59:55', '2020-08-27 10:59:55'),
(3, 'TV & Home Appliances', 'tv-&-home-appliances', 'public/uploads/category/1598526026-eappliances.png', 3, NULL, 1, '2020-08-27 11:00:26', '2020-08-27 11:00:26'),
(4, 'Health & Beauty', 'health-&-beauty', 'public/uploads/category/1598527450-health.png', 4, NULL, 1, '2020-08-27 11:24:10', '2020-08-27 11:24:10'),
(5, 'Babies & Toys', 'babies-&-toys', 'public/uploads/category/1598528070-baby.png', 5, NULL, 1, '2020-08-27 11:34:30', '2020-08-27 11:34:30'),
(6, 'Groceries & Pets', 'groceries-&-pets', 'public/uploads/category/1598528122-grocery.png', 6, NULL, 1, '2020-08-27 11:35:22', '2020-08-27 11:35:22'),
(7, 'Home & Lifestyle', 'home-&-lifestyle', 'public/uploads/category/1598528158-hfurniture.png', 7, NULL, 1, '2020-08-27 11:35:58', '2020-08-27 11:35:58'),
(8, 'Women\'s Fashion', 'women\'s-fashion', 'public/uploads/category/1598528183-womenfashion.png', 8, NULL, 1, '2020-08-27 11:36:23', '2021-01-29 03:09:48'),
(9, 'Men\'s Fashion', 'men\'s-fashion', 'public/uploads/category/1598528234-menfashion.png', 9, NULL, 1, '2020-08-27 11:37:14', '2020-08-27 11:37:14'),
(10, 'Watches & Accessories', 'watches-&-accessories', 'public/uploads/category/1598528261-watch.png', 10, NULL, 1, '2020-08-27 11:37:41', '2020-08-27 11:37:41'),
(11, 'Sports & Outdoor', 'sports-&-outdoor', 'public/uploads/category/1598528284-sports.png', 11, NULL, 1, '2020-08-27 11:38:04', '2020-08-27 11:38:04'),
(12, 'Vehicles', 'vehicles', 'public/uploads/category/1598528320-1593327637-mercedes-car.png', 12, NULL, 1, '2020-08-27 11:38:40', '2020-08-27 11:38:40'),
(15, 'Agriculture', 'agriculture', 'public/uploads/category/1611426712-images.jpg', 13, 1, 1, '2021-01-23 18:31:52', '2021-01-23 18:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `childcategories`
--

CREATE TABLE `childcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `childcategoryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `childcategories`
--

INSERT INTO `childcategories` (`id`, `childcategoryName`, `slug`, `subcategory_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'realme Phones', 'realme-phones', 1, 1, '2020-09-05 14:36:52', '2020-09-05 14:36:52'),
(2, 'iphone', 'iphone', 1, 1, '2020-09-05 14:37:15', '2020-09-05 14:37:15'),
(3, 'Samsung Phone', 'samsung-phone', 1, 1, '2020-09-05 14:37:36', '2020-09-05 14:37:36'),
(5, 'dresses', 'dresses', 6, 1, '2020-09-15 05:38:34', '2020-09-15 05:38:34'),
(6, 'tees', 'tees', 6, 1, '2020-09-15 05:39:08', '2020-09-15 05:39:08'),
(7, 'blows and shirts', 'blows-and-shirts', 6, 1, '2020-09-15 05:40:05', '2020-09-15 05:40:05'),
(8, 'men s oil', 'men-s-oil', 7, 1, '2020-12-26 08:42:00', '2020-12-26 08:42:00'),
(9, 'women\'s oil', 'womens-oil', 7, 1, '2020-12-26 08:42:32', '2020-12-26 08:42:32'),
(10, 'Falguni', 'falguni', 8, 1, '2021-01-23 15:37:09', '2021-01-23 15:37:09'),
(11, 'Embroidered lawn collections', 'embroidered-lawn-collections', 9, 1, '2021-01-23 17:44:24', '2021-01-23 17:51:34'),
(12, 'Plant Accessories', 'plant-accessories', 10, 1, '2021-01-23 18:34:28', '2021-01-23 18:34:28'),
(13, 'Valentin collection', 'valentin-collection', 8, 1, '2021-01-25 12:36:07', '2021-01-25 12:36:07'),
(14, 'Jewellery set', 'jewellery-set', 11, 1, '2021-01-29 03:10:55', '2021-01-29 03:10:55'),
(15, 'Kabli', 'kabli', 12, 1, '2021-01-29 05:43:40', '2021-01-29 05:43:40'),
(16, 'Katan Sharee', 'katan-sharee', 8, 1, '2021-01-29 05:49:06', '2021-01-29 05:49:06'),
(17, 'Unstreach', 'unstreach', 13, 1, '2021-01-29 06:01:03', '2021-01-29 06:01:03'),
(18, 'Valentine\'s Day', 'valentines-day', 14, 1, '2021-01-31 08:46:36', '2021-01-31 08:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `colorName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `colorName`, `color`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'red', '#FF0000', 'red', '1', '2020-08-29 05:44:00', '2021-01-29 03:29:54'),
(2, 'purpale', '#800080', 'purpale', '1', '2020-09-15 06:02:32', '2020-09-15 06:02:32'),
(3, 'green', '#254117', 'green', '1', '2020-09-15 06:03:37', '2020-09-15 06:03:37'),
(4, 'yelow', '#FFFF00', 'yelow', '1', '2021-01-23 15:47:36', '2021-01-23 15:47:36'),
(5, 'blue', '#0000CD', 'blue', '1', '2021-01-23 17:38:12', '2021-01-23 17:38:12'),
(6, 'white', '#FFFFFF', 'white', '1', '2021-01-23 18:06:07', '2021-01-23 18:06:07'),
(7, 'Black', '#000000', 'black', '1', '2021-01-23 18:06:38', '2021-01-23 18:06:38'),
(8, 'pink', '#FFB6C1', 'pink', '1', '2021-01-23 18:07:15', '2021-01-23 18:07:15'),
(9, 'dark sky  blue', '#ADD8E6', 'dark-sky-blue', '1', '2021-01-23 18:11:06', '2021-01-23 18:11:06'),
(10, 'marun', '#520b13', 'marun', '1', '2021-01-29 03:18:21', '2021-01-29 03:18:21'),
(11, 'lime green', '#32CD32', 'lime-green', '1', '2021-01-29 06:17:32', '2021-01-29 06:17:32'),
(12, 'navy blue', '#000080', 'navy-blue', '1', '2021-01-29 06:21:25', '2021-01-29 06:21:25'),
(13, 'Ash', '#b2beb5', 'ash', '1', '2021-01-29 06:25:22', '2021-01-29 06:25:22'),
(14, 'orange', '#FFA500', 'orange', '1', '2021-01-29 06:30:01', '2021-01-29 06:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `couponcodes`
--

CREATE TABLE `couponcodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `couponcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expairdate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offertype` tinyint(4) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyammount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `couponcodes`
--

INSERT INTO `couponcodes` (`id`, `couponcode`, `expairdate`, `offertype`, `amount`, `buyammount`, `status`, `created_at`, `updated_at`) VALUES
(2, 'shakir ahmed', '2020-10-10', 2, '200', '500', 1, '2020-10-03 07:39:33', '2020-10-03 07:39:33'),
(3, 'test1', '2020-10-05', 2, '500', '2000', 1, '2020-10-04 06:26:55', '2020-10-04 06:26:55'),
(4, 'test 33', '2020-10-08', 2, '500', '2000', 1, '2020-10-04 06:29:15', '2020-10-04 06:29:15'),
(5, 'test 331', '2020-10-08', 1, '100', '5000', 1, '2020-10-04 06:29:57', '2020-10-04 06:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_useds`
--

CREATE TABLE `coupon_useds` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerId` int(11) DEFAULT NULL,
  `couponId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `createpages`
--

CREATE TABLE `createpages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_id` bigint(20) NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passResetToken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verifyToken` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mypoint` int(11) DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public/uploads/avatar/avatar.png',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullName`, `phoneNumber`, `address`, `email`, `password`, `passResetToken`, `verifyToken`, `mypoint`, `image`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Sheikh Maqsud Ahmed', '01313176868', '\"Khondokar Bhaban\"House#44/A, Road#8, Block-KHA, P C Culture Housing Society, Adabor, Dhaka-1207', 'sahmed357@gmail.com', '$2y$10$KuiGAjB2RRqn9rqT5J/ycOUBf5KLlsnDLVF8BQIDSJcFYFzYZkpri', NULL, '1', 0, 'public/uploads/image/1608980282-2072.jpg', 1, '2020-10-18 16:17:36', '2021-01-04 17:41:34'),
(9, 'Hridoy', '01995559462', NULL, 'Hridoyahmedmmm@gmail.com', '$2y$10$57NbMS/rf5zJ/0tiC9x/.eW6XC38SVI9d5T9trneXegPp/5o5BFTi', NULL, '199969', 0, 'public/uploads/avatar/avatar.png', 1, '2020-12-10 05:47:36', '2021-02-20 17:23:32'),
(10, 'Rasel Islam', '01742892726', 'Dhaka', 'zadumia442@gmail.com', '$2y$10$wmh0aQYncieELkU3kFK8TOpwrpsT2PR5JPZfZ69AanWMdURe0GlUS', NULL, '1', 0, 'public/uploads/image/1609231954-p.s.call.gif', 1, '2020-12-23 03:13:11', '2021-01-05 12:46:58'),
(11, 'Sheikh Maqsud Ahmed', '01978046007', NULL, 'mahmed357@yahoo.com', '$2y$10$PipjosATHTFE3KwXsbFkruBhZhpfYIFYHTK1/Fx80sX/Jh2FY3iWi', NULL, '683980', 0, 'public/uploads/avatar/avatar.png', 1, '2020-12-24 18:28:06', '2021-02-19 17:54:39'),
(14, 'Ashraful', '01913377417', NULL, 'Insan', '$2y$10$CAhlf2mJZkHOTntEhwaW8.1Gm5KnsIoETP90lJgqh9j7SiaZX6fWq', NULL, '866049', 0, 'public/uploads/avatar/avatar.png', 1, '2020-12-25 19:32:42', '2021-02-20 17:23:26'),
(15, 'Alamgir Hossain', '01712108420', NULL, 'texcess.intl@gmail.com', '$2y$10$XRkQOAQqD2BXxWe5iUOQ9.AymVBchGGLKAytjlXjdu1UGSuiZXlfi', NULL, '1', 0, 'public/uploads/avatar/avatar.png', 1, '2020-12-26 12:44:13', '2020-12-26 12:45:30'),
(16, 'MD. Moinul Islam', '01685292020', NULL, 'mmoinulislam21@gmail.com', '$2y$10$wQBuYCG0FOYMI0eRKhPM..F9v7Gpyx6N6mfeQQh0b5YWsEEQHAy7e', NULL, '1', 0, 'public/uploads/avatar/avatar.png', 1, '2020-12-26 12:44:39', '2020-12-26 12:45:09'),
(17, 'Momena Naznin', '01768735370', NULL, 'momenanaznin@gmail.com', '$2y$10$05Y6fXCbbvBi8vutJLi.SOL47sArHht8vyWQclp6QahM54ZWKja2m', NULL, '1', 0, 'public/uploads/avatar/avatar.png', 1, '2020-12-26 12:45:45', '2020-12-26 12:50:46'),
(18, 'AK Azad', '01706600116', NULL, 'Oximus2018@gmail.com', '$2y$10$EURZaGADa8o3KTYmIBc.Ces6k.l5KtlGKWyNgHB7ZKiiu8Ewg2zTm', NULL, '1', 0, 'public/uploads/avatar/avatar.png', 1, '2020-12-26 12:46:19', '2020-12-26 12:49:18'),
(19, 'M m r farhad', '01969861790', NULL, 'mrp3.nganjbd@gmail.com', '$2y$10$hgtG0I7O/F7nhQ9ZYTO.luBCCH5MTfMLFOdwU50GmNZkfGPqti7My', NULL, '1', 0, 'public/uploads/avatar/avatar.png', 1, '2020-12-26 12:48:44', '2021-01-28 18:58:31'),
(20, 'Nasrin Lovely', '01750203450', NULL, 'Nasrinlovely801@.gmail.com', '$2y$10$kDIWCME2u8tCNHMfo0W1buXuXCg2NoYYMdVx4ctT10QK2w1UFDLly', NULL, '231449', 0, 'public/uploads/avatar/avatar.png', 1, '2020-12-26 12:49:35', '2020-12-26 12:49:35'),
(21, 'Rumon Chowdhury', '01985522076', NULL, 'rumonzaman61@gmail.com', '$2y$10$uqvkoz0LI.GGuai8Sx/2mOuUXN7Jfmzz1rvzuVYFbosvOfQLGh3Y2', NULL, '1', 0, 'public/uploads/avatar/avatar.png', 1, '2020-12-26 12:56:09', '2020-12-26 13:01:42'),
(22, 'Shahin Sultana Moni', '+8801628139015', NULL, 'Shahinsultanamoni22@gmail.com', '$2y$10$YICYid2FLgRVflFYhhpiAOqmac5d11UszviOv9Vrle/uwiB5MBzTS', NULL, '1', 0, 'public/uploads/avatar/avatar.png', 1, '2020-12-28 07:49:42', '2021-02-20 17:23:15'),
(23, 'Mart9294', '01305224608', NULL, 'mart9294shop@gmail.com', '$2y$10$PmlIBe9BXP7hBuMwyGAkCuwqYOGizDrzTs6mr5j9/b6UbnBMR8P82', NULL, '905966', 0, 'public/uploads/avatar/avatar.png', 1, '2021-01-03 18:14:25', '2021-01-03 18:14:25'),
(25, 'Rasel Islam', '01742892725', 'Dhanmondi,Dhaka', 'zadumia441@gmail.com', '$2y$10$3hOqQmJ2J6cTKcV9tKfhA.MxW18YK21/KQD0bUZ30HBhKbgRZThT.', NULL, '1', 0, 'public/uploads/avatar/avatar.png', 1, '2021-01-05 12:54:25', '2021-02-22 08:26:23'),
(26, 'Madhurjo', '01973046007', NULL, 'madhurjo2020@gmail.com', '$2y$10$742G6gyoL5J6umr3vmCGKezvSebJUmBqtJwUth/FxLGzyaYxvE5yu', NULL, '1', 0, 'public/uploads/avatar/avatar.png', 1, '2021-01-05 17:34:20', '2021-01-05 17:35:20'),
(27, 'Nizam Uddin Ahmed moHan', '01972964959', NULL, 'mohanjharna@gmail.com', '$2y$10$BdswCJ7mITER3GAuz3rp9eQl/7mnxvK9VwxSSJ..Fksc23URn.w3G', NULL, '625099', 0, 'public/uploads/avatar/avatar.png', 1, '2021-01-07 11:04:31', '2021-01-07 11:04:31'),
(28, 'আতিক আকন্দ', '01714462655', NULL, 'atik_lks@yahoocom', '$2y$10$OsrrLI4pWvGJayUHfsLH7ewjMrIMQkIPIMjn5rY7C7QzGEorFqmUK', NULL, '895762', 0, 'public/uploads/avatar/avatar.png', 1, '2021-01-07 19:55:01', '2021-01-07 19:55:01'),
(29, 'Nayem Ahamed', '01775016964', 'rod 10/a house 19 dhanmondi dhaka', 'nayemahamed4500@gmail.com', '$2y$10$ieN/JWqVCp7d1105b9yM4.QtynGCq/MO5tg05uGizsg5A56EDbD5S', NULL, '1', 0, 'public/uploads/image/1610098721-112319.jpg', 1, '2021-01-08 09:32:09', '2021-02-20 17:23:41'),
(30, 'Rezwanur Rab Zia', '01911888888', NULL, 'rezwan@mail.com', '$2y$10$TYoG63e390jFTVyQAMOAvObJKuxn0KU9gTrI364H1fSb7mDLRk.au', NULL, '1', 0, 'public/uploads/avatar/avatar.png', 1, '2021-02-01 14:22:07', '2021-02-02 06:27:44'),
(31, 'Nirjon Roy', '01774865115', NULL, 'roynirjon18@gmail.com', '$2y$10$4afxRww4hZ7f8DEYsO7iR.bi9RBVHOO7ycwEUjUM9.6G2z3dnbYfK', NULL, '239958', 0, 'public/uploads/avatar/avatar.png', 1, '2021-02-18 13:57:07', '2021-02-18 13:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2020-08-29 11:33:24', '2020-08-29 11:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faveicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `logo`, `faveicon`, `status`, `created_at`, `updated_at`) VALUES
(5, 'public/uploads/logo/1608821369-23.12.2020 Mart 9294 Logo Final Cmyk.png', 'public/uploads/faveicon/1608821369-23.12.2020 Mart 9294 Logo Final Cmyk.png', 1, '2020-12-24 14:47:43', '2020-12-24 14:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_05_062607_create_roles_table', 1),
(4, '2018_11_06_103633_create_colors_table', 1),
(5, '2018_11_06_104746_create_sizes_table', 1),
(6, '2018_11_10_073037_create_productsizes_table', 1),
(7, '2018_11_11_062736_create_productcolors_table', 1),
(8, '2018_11_14_122716_create_orders_table', 1),
(9, '2018_11_14_123026_create_orderdetails_table', 1),
(10, '2018_11_26_045231_create_logos_table', 1),
(11, '2019_01_03_075632_create_categories_table', 1),
(12, '2019_01_03_111552_create_sub_categories_table', 1),
(13, '2019_01_05_055510_create_child_categories_table', 1),
(14, '2019_01_05_100733_create_brands_table', 1),
(15, '2019_01_06_084144_create_news_table', 1),
(16, '2019_01_07_054602_create_sliders_table', 1),
(17, '2019_01_08_091955_create_products_table', 1),
(18, '2019_01_08_124649_create_productimages_table', 1),
(19, '2019_01_17_102812_create_customers_table', 1),
(20, '2019_01_22_044004_create_shippings_table', 1),
(21, '2019_01_28_175016_create_social_providers_table', 1),
(22, '2019_05_05_113629_create_advertisments_table', 1),
(23, '2019_05_11_140441_create_reviews_table', 1),
(24, '2019_05_27_111248_create_contacts_table', 1),
(25, '2019_05_30_150731_create_socialmedia_table', 1),
(26, '2019_09_09_161229_create_locations_table', 1),
(27, '2019_10_07_180538_create_pagecategories_table', 1),
(28, '2019_10_07_185331_create_createpages_table', 1),
(29, '2019_10_15_232955_create_shippingfees_table', 1),
(30, '2019_10_26_130818_create_paymentsaves_table', 1),
(32, '2019_12_30_163131_create_districts_table', 1),
(33, '2019_12_30_164743_create_areas_table', 1),
(34, '2020_01_02_154955_create_couponcodes_table', 1),
(35, '2020_01_04_163443_create_ordershippings_table', 1),
(36, '2020_01_21_095104_create_banners_table', 1),
(37, '2020_01_26_111147_create_brandinserts_table', 1),
(38, '2020_02_03_124043_create_tags_table', 1),
(39, '2020_02_03_150023_create_producttags_table', 1),
(40, '2020_02_18_112400_create_offers_table', 1),
(41, '2020_02_25_171242_create_bundles_table', 1),
(42, '2020_03_14_162024_create_coupon_useds_table', 1),
(43, '2019_12_23_100454_create_sellers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` tinyint(4) NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyammount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderDetails` int(10) UNSIGNED NOT NULL,
  `orderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `productName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productSize` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productColor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productPrice` double(10,2) NOT NULL,
  `sellerCommision` int(11) DEFAULT NULL,
  `productQuantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderDetails`, `orderId`, `ProductId`, `sellerid`, `productName`, `productSize`, `productColor`, `productPrice`, `sellerCommision`, `productQuantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'apple iphone 11 pro max smartphone - 6.5\" - 4gb ram - 256gb - 12mp rear - 12mp front camera', '', 'Gold', 154999.00, 0, 1, '2020-08-29 11:34:50', '2020-08-29 11:34:50'),
(2, 2, 1, 1, 'apple iphone 11 pro max smartphone - 6.5\" - 4gb ram - 256gb - 12mp rear - 12mp front camera', '', 'Gold', 154999.00, 0, 1, '2020-08-29 11:35:16', '2020-08-29 11:35:16'),
(3, 3, 13, 1, 'barcode sticker roll (5pcs) (bsr3825)', '', '', 1500.00, 0, 2, '2020-09-12 17:04:29', '2020-09-12 17:04:29'),
(4, 3, 12, 1, 'hp probook 440 g5 - i5 notebook pc, 4gb (1x4gb) 2133 ddr4 upgradeable to 16gb - black and silver', '', '', 51500.00, 0, 3, '2020-09-12 17:04:29', '2020-09-12 17:04:29'),
(5, 4, 11, 1, 'hp 15-da0002tu notebook pc, 4 gb ddr4-2400 sdram (1 x 4 gb) - black', '', '', 39600.00, 0, 1, '2020-09-13 03:18:46', '2020-09-13 03:18:46'),
(6, 4, 8, 1, 'samsung galaxy a2 core smartphone - 5.0\" inch - 1gb ram - 16gb rom - 5mp rear camera - blue', '', '', 7999.00, 0, 1, '2020-09-13 03:18:47', '2020-09-13 03:18:47'),
(7, 5, 14, 1, 'indian printed jeggings 001', '', 'Gold', 1400.00, 0, 1, '2020-09-14 09:42:34', '2020-09-14 09:42:34'),
(8, 6, 14, 1, 'indian printed jeggings 001', '', 'Gold', 1400.00, 0, 1, '2020-09-14 09:44:14', '2020-09-14 09:44:14'),
(9, 7, 17, 2, 'new samsung pro', 'xl', 'Gold', 1000.00, 0, 2, '2020-09-15 06:00:48', '2020-09-15 06:00:48'),
(10, 8, 12, 1, 'hp probook 440 g5 - i5 notebook pc, 4gb (1x4gb) 2133 ddr4 upgradeable to 16gb - black and silver', '', '', 51500.00, 0, 1, '2020-09-26 10:13:20', '2020-09-26 10:13:20'),
(11, 9, 9, 1, 'samsung galaxy note 9 smartphone - 6.4\" inch - 12 mp camera - 6gb ram - 128gb rom - 4000 mah battery', '', '', 18500.00, 0, 2, '2020-10-04 06:17:22', '2020-10-04 06:17:22'),
(12, 9, 8, 1, 'samsung galaxy a2 core smartphone - 5.0\" inch - 1gb ram - 16gb rom - 5mp rear camera - blue', '', '', 7999.00, 0, 1, '2020-10-04 06:17:22', '2020-10-04 06:17:22'),
(13, 10, 11, 1, 'hp 15-da0002tu notebook pc, 4 gb ddr4-2400 sdram (1 x 4 gb) - black', '', '', 39600.00, 0, 2, '2020-10-04 06:31:49', '2020-10-04 06:31:49'),
(14, 11, 1, 1, 'apple iphone 11 pro max smartphone - 6.5\" - 4gb ram - 256gb - 12mp rear - 12mp front camera', '', 'Gold', 154999.00, 0, 1, '2020-10-04 06:42:45', '2020-10-04 06:42:45'),
(15, 12, 20, 11, 'test name', 'mxl', 'Gold', 14000.00, 0, 1, '2020-10-04 06:57:53', '2020-10-04 06:57:53'),
(16, 13, 20, 11, 'test name', 'mxl', 'Gold', 14000.00, 0, 1, '2020-10-04 07:04:03', '2020-10-04 07:04:03'),
(17, 14, 20, 11, 'test name', 'mxl', 'purpale', 14000.00, 0, 1, '2020-10-04 09:39:55', '2020-10-04 09:39:55'),
(18, 15, 8, 1, 'samsung galaxy a2 core smartphone - 5.0\" inch - 1gb ram - 16gb rom - 5mp rear camera - blue', '', '', 7999.00, 0, 1, '2021-01-05 07:55:24', '2021-01-05 07:55:24'),
(19, 16, 22, 12, 'hair oil women', 'xl', 'purpale', 190.00, 0, 1, '2021-01-09 05:52:03', '2021-01-09 05:52:03'),
(20, 17, 10, 1, 'samsung galaxy m21 smartphone - 6.4 inch - 4gb ram - 64gb rom - 48 mp camera - 6000 mah battery', '', '', 18700.00, 0, 1, '2021-01-10 07:34:49', '2021-01-10 07:34:49'),
(21, 18, 45, 23, '**পহেলা ফাল্গুন***', '', '', 1050.00, 0, 1, '2021-01-25 13:29:26', '2021-01-25 13:29:26'),
(22, 20, 44, 23, '**পহেলা ফাল্গুন***', '', '', 1050.00, 0, 1, '2021-01-26 09:55:47', '2021-01-26 09:55:47'),
(23, 21, 106, 23, 'egyptian jewellery long mala set', '', 'purpale', 2899.00, 0, 1, '2021-01-30 06:40:18', '2021-01-30 06:40:18'),
(24, 22, 131, 23, 'valentine day t-shirt', 'xl', '', 375.00, 0, 1, '2021-02-01 14:54:05', '2021-02-01 14:54:05'),
(25, 23, 129, 23, 'valentine day t-shirt', 'L', '', 375.00, 0, 1, '2021-02-04 17:45:06', '2021-02-04 17:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderIdPrimary` int(10) UNSIGNED NOT NULL,
  `customerId` int(11) NOT NULL,
  `ordertrack` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderTotal` int(11) NOT NULL,
  `cshippingfee` int(11) DEFAULT NULL,
  `cdiscount` int(11) DEFAULT NULL,
  `offertype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additionalshipping` int(11) NOT NULL,
  `shippingId` int(11) NOT NULL,
  `orderSubtotal` int(11) NOT NULL,
  `totalproductpoint` int(11) DEFAULT NULL,
  `usemypoint` int(11) DEFAULT NULL,
  `orderStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderIdPrimary`, `customerId`, `ordertrack`, `orderTotal`, `cshippingfee`, `cdiscount`, `offertype`, `additionalshipping`, `shippingId`, `orderSubtotal`, `totalproductpoint`, `usemypoint`, `orderStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 'de60cc7e1f3482c572f6a1135c3a9225', 155059, 60, NULL, NULL, 0, 1, 154999, 0, NULL, '0', '2020-08-29 11:34:50', '2020-08-29 11:34:50'),
(2, 1, 'ef1e96fe417dd86eacd0c87fb87b0f21', 155059, 60, NULL, NULL, 0, 2, 154999, 130, NULL, '1', '2020-08-29 11:35:16', '2020-09-13 04:04:59'),
(3, 1, 'd6af0377a365a6545692dc9d8d4326c8', 157620, 120, NULL, NULL, 0, 3, 157500, 130, NULL, '1', '2020-09-12 17:04:28', '2020-09-13 03:31:26'),
(4, 1, '2089990033bb03d4d78b11b65705cbb7', 47719, 120, NULL, NULL, 0, 4, 47599, 0, 1, '1', '2020-09-13 03:18:46', '2020-09-13 03:50:45'),
(5, 2, '42a101c48ed1e89bd0151d4056ce7d22', 1478, 60, NULL, NULL, 18, 5, 1400, 0, NULL, '0', '2020-09-14 09:42:34', '2020-09-14 09:42:34'),
(6, 2, '96d8c18596d97f71b8338ba97686628b', 1478, 60, NULL, NULL, 18, 6, 1400, 0, NULL, '0', '2020-09-14 09:44:14', '2020-09-14 09:44:14'),
(7, 2, 'd797220772c514487b474a7a06655bc3', 2108, 60, NULL, NULL, 48, 7, 2000, 0, NULL, '0', '2020-09-15 06:00:48', '2020-09-15 06:00:48'),
(8, 4, 'a0eb2aa1b98656f3abd095e8825c2256', 51560, 60, NULL, NULL, 0, 8, 51500, 30, NULL, '2', '2020-09-26 10:13:20', '2020-09-26 10:14:30'),
(9, 6, '5e7796b7ab9e0899fa7f00a27fe71ba5', 45119, 120, NULL, NULL, 0, 9, 44999, 0, NULL, '3', '2020-10-04 06:17:22', '2020-10-04 06:24:45'),
(10, 6, 'b1a822b7442d45f407459e01c5df66ce', 78760, 60, 500, 'test1', 0, 10, 79200, 0, NULL, '1', '2020-10-04 06:31:49', '2020-10-04 06:33:48'),
(11, 6, '567bd7becf317fbda7634fe1a1773240', 154559, 60, 500, 'test1', 0, 11, 154999, 2000, NULL, '2', '2020-10-04 06:42:45', '2020-10-04 06:43:05'),
(12, 7, '2b66ecf513a887e6995bf6f5c9e7e106', 13560, 60, 500, 'test1', 0, 12, 14000, 2000, NULL, '1', '2020-10-04 06:57:53', '2020-10-04 06:59:17'),
(13, 7, '4f1f4feddf18ac89619a5659e615d842', 13560, 60, 500, 'test1', 0, 13, 14000, 2000, NULL, '2', '2020-10-04 07:04:03', '2020-10-11 10:23:33'),
(14, 7, 'df686d241b4658d7127fd436e29ed594', 13560, 60, 500, 'test1', 0, 14, 14000, 2000, NULL, '1', '2020-10-04 09:39:55', '2020-10-04 09:41:34'),
(15, 24, '59537f6c85c574453ae0a13725c9680f', 8059, 60, NULL, NULL, 0, 15, 7999, 0, NULL, '0', '2021-01-05 07:55:24', '2021-01-05 07:55:24'),
(16, 25, 'd8bbd3183f3bc2ac2447c3f72b3c38a3', 251, 60, NULL, NULL, 1, 16, 190, 0, NULL, '2', '2021-01-09 05:52:03', '2021-02-02 10:53:00'),
(17, 29, '3bdcd9ce51845cd267f7d8f85f2440ec', 18760, 60, NULL, NULL, 0, 17, 18700, 0, NULL, '3', '2021-01-10 07:34:49', '2021-02-02 10:53:03'),
(18, 29, '4b0757204c25c8772480593769ff473e', 1110, 60, NULL, NULL, 0, 18, 1050, 0, NULL, '0', '2021-01-25 13:29:26', '2021-01-25 13:29:26'),
(19, 29, '24b6561d8ad91af61fa5b7136fae4611', 0, NULL, NULL, NULL, 0, 19, 0, 0, NULL, '0', '2021-01-25 13:29:56', '2021-01-25 13:29:56'),
(20, 29, 'c78cb30c7c9c6ce8e91a4d2d29594de7', 1110, 60, NULL, NULL, 0, 20, 1050, 0, NULL, '0', '2021-01-26 09:55:47', '2021-01-26 09:55:47'),
(21, 8, 'bb5679f48c8874aed18799442301603e', 2959, 60, NULL, NULL, 0, 21, 2899, 0, NULL, '1', '2021-01-30 06:40:18', '2021-01-30 06:42:36'),
(22, 29, '97294927bce326793ed2ba44d5c594b8', 435, 60, NULL, NULL, 0, 22, 375, 0, NULL, '1', '2021-02-01 14:54:05', '2021-02-01 19:03:22'),
(23, 8, '2ca37d655b4680bef739621d7a295bee', 435, 60, NULL, NULL, 0, 23, 375, 0, NULL, '0', '2021-02-04 17:45:06', '2021-02-04 17:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `ordershippings`
--

CREATE TABLE `ordershippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stateaddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `houseaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fulladdress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordershippings`
--

INSERT INTO `ordershippings` (`id`, `name`, `phone`, `district`, `area`, `stateaddress`, `customerid`, `houseaddress`, `fulladdress`, `zipcode`, `created_at`, `updated_at`) VALUES
(1, 'Md. Zadu Mia', '01742892725', '1', '1', '4/A', '1', '55/A', '55/A', '1209', '2020-08-29 11:34:50', '2020-08-29 11:34:50'),
(2, 'Md. Zadu Mia', '01742892725', '1', '1', '4/A', '1', '55/A', '55/A', '1209', '2020-08-29 11:35:16', '2020-08-29 11:35:16'),
(3, 'Md. Zadu Mia', '01742892725', '1', '1', '4/A', '1', '55/A', '55/A', '1209', '2020-09-12 17:04:28', '2020-09-12 17:04:28'),
(4, 'Md. Zadu Mia', '01742892725', '1', '1', '4/A', '1', '55/A', '55/A', '1209', '2020-09-13 03:18:46', '2020-09-13 03:18:46'),
(5, 'shakir ahmed', '01740125203', '1', '1', 'mirpur 1', '2', '2321', 'mirpur 1', '1216', '2020-09-14 09:42:34', '2020-09-14 09:42:34'),
(6, 'shakir ahmed', '01740125203', '1', '1', 'mirpur 1', '2', '2321', 'mirpur 1', '1216', '2020-09-14 09:44:14', '2020-09-14 09:44:14'),
(7, 'shakir ahmed', '01740125203', '1', '1', 'mirpur 1', '2', '2321', 'mirpur 1', '1216', '2020-09-15 06:00:48', '2020-09-15 06:00:48'),
(8, 'test laravl', '01775016964', '1', '1', '#8 mitali road Dhanmondi dhaka', '4', '2/1dhnmondi', '#8 mitali road Dhanmondi dhaka', '1209', '2020-09-26 10:13:20', '2020-09-26 10:13:20'),
(9, 'Nayem Ahamed Ahamed', '01775016964', '1', '1', '#8 mitali road Dhanmondi dhaka', '6', 'mitali road', '#8 mitali road Dhanmondi dhaka', '1209', '2020-10-04 06:17:22', '2020-10-04 06:17:22'),
(10, 'Nayem Ahamed Ahamed', '01775016964', '1', '1', '#8 mitali road Dhanmondi dhaka', '6', 'mitali road', '#8 mitali road Dhanmondi dhaka', '1209', '2020-10-04 06:31:49', '2020-10-04 06:31:49'),
(11, 'Nayem Ahamed Ahamed', '01775016964', '1', '1', '#8 mitali road Dhanmondi dhaka', '6', 'mitali road', '#8 mitali road Dhanmondi dhaka', '1209', '2020-10-04 06:42:45', '2020-10-04 06:42:45'),
(12, 'Nayem Ahamed Ahamed', '01775016964', '1', '1', '#8 mitali road Dhanmondi dhaka', '7', 'e8', '#8 mitali road Dhanmondi dhaka', '1209', '2020-10-04 06:57:53', '2020-10-04 06:57:53'),
(13, 'Nayem Ahamed Ahamed', '01775016964', '1', '1', '#8 mitali road Dhanmondi dhaka', '7', 'e8', '#8 mitali road Dhanmondi dhaka', '1209', '2020-10-04 07:04:03', '2020-10-04 07:04:03'),
(14, 'Nayem Ahamed Ahamed', '01775016964', '1', '1', '#8 mitali road Dhanmondi dhaka', '7', 'e8', '#8 mitali road Dhanmondi dhaka', '1209', '2020-10-04 09:39:55', '2020-10-04 09:39:55'),
(15, 'Nayem Ahamed', '01775016964', '1', '1', 'rod 11/a house 19 dhanmondi dhaka', '24', 'GTDFGFD 50-  85 85', 'rod 10/a house 19 dhanmondi dhaka', '1209', '2021-01-05 07:55:24', '2021-01-05 07:55:24'),
(16, 'Md. Zadu Mia', '01742892726', '1', '1', NULL, '25', 'Dhanmondi 32', NULL, '1209', '2021-01-09 05:52:03', '2021-01-09 05:52:03'),
(17, 'nayem ahamed', '01775016964', '1', '1', '1', '29', '2', '4', '3', '2021-01-10 07:34:49', '2021-01-10 07:34:49'),
(18, 'nayem ahamed', '01775016964', '1', '1', '1', '29', '2', '4', '3', '2021-01-25 13:29:26', '2021-01-25 13:29:26'),
(19, 'nayem ahamed', '01775016964', '1', '1', '1', '29', '2', '4', '3', '2021-01-25 13:29:56', '2021-01-25 13:29:56'),
(20, 'nayem ahamed', '01775016964', '1', '1', '1', '29', '2', '4', '3', '2021-01-26 09:55:47', '2021-01-26 09:55:47'),
(21, 'Sheikh Maqsud Ahmed', '01313176868', '1', '1', NULL, '8', 'H#44/A R#8 Shekhertak', 'Near Khondkar Medicine House', '1207', '2021-01-30 06:40:18', '2021-01-30 06:40:18'),
(22, 'nayem ahamed', '01775016964', '1', '1', '1', '29', '2', '4', '3', '2021-02-01 14:54:05', '2021-02-01 14:54:05'),
(23, 'Sheikh Maqsud Ahmed', '01313176868', '1', '1', NULL, '8', 'H#44/A R#8 Shekhertak', 'Near Khondkar Medicine House', '1207', '2021-02-04 17:45:06', '2021-02-04 17:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `pagecategories`
--

CREATE TABLE `pagecategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `pagename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` bigint(20) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentsaves`
--

CREATE TABLE `paymentsaves` (
  `paymentIdPrimary` int(10) UNSIGNED NOT NULL,
  `orderId` int(11) NOT NULL,
  `paymentType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cPaynumber` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cPaytrxid` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymentsaves`
--

INSERT INTO `paymentsaves` (`paymentIdPrimary`, `orderId`, `paymentType`, `cPaynumber`, `cPaytrxid`, `paymentStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 'cash', NULL, NULL, 'pending', '2020-08-29 11:34:50', '2020-08-29 11:34:50'),
(2, 2, 'bkash', '01745787878', '5787845', 'pending', '2020-08-29 11:35:16', '2020-08-29 11:35:16'),
(3, 3, 'cash', NULL, NULL, 'pending', '2020-09-12 17:04:29', '2020-09-12 17:04:29'),
(4, 4, 'cash', NULL, NULL, 'pending', '2020-09-13 03:18:46', '2020-09-13 03:18:46'),
(5, 5, 'cash', NULL, NULL, 'pending', '2020-09-14 09:42:34', '2020-09-14 09:42:34'),
(6, 6, 'cash', NULL, NULL, 'pending', '2020-09-14 09:44:14', '2020-09-14 09:44:14'),
(7, 7, 'cash', NULL, NULL, 'pending', '2020-09-15 06:00:48', '2020-09-15 06:00:48'),
(8, 8, 'cash', NULL, NULL, 'pending', '2020-09-26 10:13:20', '2020-09-26 10:13:20'),
(9, 9, 'bkash', '01775016964', '1d285fg54h65n0vbgc', 'pending', '2020-10-04 06:17:22', '2020-10-04 06:17:22'),
(10, 10, 'cash', NULL, NULL, 'pending', '2020-10-04 06:31:49', '2020-10-04 06:31:49'),
(11, 11, 'cash', NULL, NULL, 'pending', '2020-10-04 06:42:45', '2020-10-04 06:42:45'),
(12, 12, 'cash', NULL, NULL, 'pending', '2020-10-04 06:57:53', '2020-10-04 06:57:53'),
(13, 13, 'cash', NULL, NULL, 'pending', '2020-10-04 07:04:03', '2020-10-04 07:04:03'),
(14, 14, 'bkash', '01775016964', '1d285fg54h65n0vb55', 'pending', '2020-10-04 09:39:55', '2020-10-04 09:39:55'),
(15, 15, 'cash', NULL, NULL, 'pending', '2021-01-05 07:55:24', '2021-01-05 07:55:24'),
(16, 16, 'cash', NULL, NULL, 'pending', '2021-01-09 05:52:03', '2021-01-09 05:52:03'),
(17, 17, 'cash', NULL, NULL, 'pending', '2021-01-10 07:34:49', '2021-01-10 07:34:49'),
(18, 18, 'cash', NULL, NULL, 'pending', '2021-01-25 13:29:26', '2021-01-25 13:29:26'),
(19, 19, 'cash', NULL, NULL, 'pending', '2021-01-25 13:29:56', '2021-01-25 13:29:56'),
(20, 20, 'cash', NULL, NULL, 'pending', '2021-01-26 09:55:47', '2021-01-26 09:55:47'),
(21, 21, 'cash', NULL, NULL, 'pending', '2021-01-30 06:40:18', '2021-01-30 06:40:18'),
(22, 22, 'cash', NULL, NULL, 'pending', '2021-02-01 14:54:05', '2021-02-01 14:54:05'),
(23, 23, 'cash', NULL, NULL, 'pending', '2021-02-04 17:45:06', '2021-02-04 17:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `productcolors`
--

CREATE TABLE `productcolors` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productcolors`
--

INSERT INTO `productcolors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-08-29 06:02:44', '2020-08-29 06:02:44'),
(2, 14, 1, '2020-09-14 06:23:46', '2020-09-14 06:23:46'),
(3, 15, 1, '2020-09-14 06:27:18', '2020-09-14 06:27:18'),
(4, 16, 1, '2020-09-14 06:36:50', '2020-09-14 06:36:50'),
(5, 17, 1, '2020-09-14 06:46:54', '2020-09-14 06:46:54'),
(6, 18, 1, '2020-09-15 05:03:34', '2020-09-15 05:03:34'),
(7, 19, 1, '2020-09-26 10:01:30', '2020-09-26 10:01:30'),
(8, 19, 2, '2020-09-26 10:01:30', '2020-09-26 10:01:30'),
(9, 20, 1, '2020-10-04 06:50:06', '2020-10-04 06:50:06'),
(10, 20, 2, '2020-10-04 06:50:06', '2020-10-04 06:50:06'),
(11, 20, 3, '2020-10-04 06:50:06', '2020-10-04 06:50:06'),
(12, 12, 2, '2020-10-04 09:37:33', '2020-10-04 09:37:33'),
(13, 22, 2, '2020-12-26 08:44:22', '2020-12-26 08:44:22'),
(14, 24, 1, '2021-01-05 07:49:32', '2021-01-05 07:49:32'),
(15, 24, 3, '2021-01-05 07:49:32', '2021-01-05 07:49:32'),
(16, 25, 4, '2021-01-23 15:52:04', '2021-01-23 15:52:04'),
(17, 26, 5, '2021-01-23 17:39:36', '2021-01-23 17:39:36'),
(18, 40, 4, '2021-01-23 18:13:10', '2021-01-23 18:13:10'),
(19, 40, 5, '2021-01-23 18:13:10', '2021-01-23 18:13:10'),
(20, 40, 6, '2021-01-23 18:13:10', '2021-01-23 18:13:10'),
(21, 40, 7, '2021-01-23 18:13:10', '2021-01-23 18:13:10'),
(22, 40, 8, '2021-01-23 18:13:10', '2021-01-23 18:13:10'),
(23, 40, 9, '2021-01-23 18:13:21', '2021-01-23 18:13:21'),
(24, 46, 2, '2021-01-23 18:25:04', '2021-01-23 18:25:04'),
(25, 46, 3, '2021-01-23 18:39:19', '2021-01-23 18:39:19'),
(26, 46, 4, '2021-01-23 18:39:19', '2021-01-23 18:39:19'),
(27, 46, 5, '2021-01-23 18:39:19', '2021-01-23 18:39:19'),
(28, 46, 6, '2021-01-23 18:39:19', '2021-01-23 18:39:19'),
(29, 46, 7, '2021-01-23 18:39:19', '2021-01-23 18:39:19'),
(30, 46, 8, '2021-01-23 18:39:19', '2021-01-23 18:39:19'),
(31, 46, 9, '2021-01-23 18:39:19', '2021-01-23 18:39:19'),
(32, 47, 2, '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(33, 47, 3, '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(34, 47, 4, '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(35, 47, 5, '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(36, 47, 6, '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(37, 47, 7, '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(38, 47, 8, '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(39, 47, 9, '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(40, 48, 1, '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(41, 48, 2, '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(42, 48, 3, '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(43, 48, 4, '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(44, 48, 5, '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(45, 48, 6, '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(46, 48, 7, '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(47, 48, 8, '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(48, 48, 9, '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(49, 49, 1, '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(50, 49, 2, '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(51, 49, 3, '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(52, 49, 4, '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(53, 49, 5, '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(54, 49, 6, '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(55, 49, 7, '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(56, 49, 8, '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(57, 49, 9, '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(58, 50, 1, '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(59, 50, 2, '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(60, 50, 3, '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(61, 50, 4, '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(62, 50, 5, '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(63, 50, 6, '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(64, 50, 7, '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(65, 50, 8, '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(66, 50, 9, '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(67, 51, 1, '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(68, 51, 2, '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(69, 51, 3, '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(70, 51, 4, '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(71, 51, 6, '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(72, 51, 7, '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(73, 51, 8, '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(74, 51, 9, '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(75, 52, 1, '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(76, 52, 2, '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(77, 52, 3, '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(78, 52, 4, '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(79, 52, 5, '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(80, 52, 6, '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(81, 52, 7, '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(82, 52, 8, '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(83, 52, 9, '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(84, 53, 1, '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(85, 53, 2, '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(86, 53, 3, '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(87, 53, 4, '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(88, 53, 5, '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(89, 53, 6, '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(90, 53, 7, '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(91, 53, 8, '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(92, 53, 9, '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(93, 54, 1, '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(94, 54, 2, '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(95, 54, 3, '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(96, 54, 4, '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(97, 54, 5, '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(98, 54, 6, '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(99, 54, 7, '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(100, 54, 8, '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(101, 54, 9, '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(102, 63, 4, '2021-01-24 17:49:29', '2021-01-24 17:49:29'),
(103, 63, 5, '2021-01-24 17:49:29', '2021-01-24 17:49:29'),
(104, 73, 2, '2021-01-24 18:00:35', '2021-01-24 18:00:35'),
(105, 73, 3, '2021-01-24 18:00:35', '2021-01-24 18:00:35'),
(106, 73, 4, '2021-01-24 18:00:35', '2021-01-24 18:00:35'),
(107, 73, 5, '2021-01-24 18:00:35', '2021-01-24 18:00:35'),
(108, 73, 6, '2021-01-24 18:00:35', '2021-01-24 18:00:35'),
(109, 73, 7, '2021-01-24 18:00:35', '2021-01-24 18:00:35'),
(110, 73, 8, '2021-01-24 18:00:35', '2021-01-24 18:00:35'),
(111, 73, 9, '2021-01-24 18:00:35', '2021-01-24 18:00:35'),
(112, 98, 1, '2021-01-29 03:23:06', '2021-01-29 03:23:06'),
(113, 98, 3, '2021-01-29 03:23:06', '2021-01-29 03:23:06'),
(114, 98, 4, '2021-01-29 03:23:06', '2021-01-29 03:23:06'),
(115, 98, 6, '2021-01-29 03:23:06', '2021-01-29 03:23:06'),
(116, 98, 10, '2021-01-29 03:23:06', '2021-01-29 03:23:06'),
(117, 99, 1, '2021-01-29 03:30:57', '2021-01-29 03:30:57'),
(118, 99, 3, '2021-01-29 03:30:57', '2021-01-29 03:30:57'),
(119, 99, 4, '2021-01-29 03:30:57', '2021-01-29 03:30:57'),
(121, 99, 10, '2021-01-29 03:31:30', '2021-01-29 03:31:30'),
(122, 106, 2, '2021-01-29 03:47:57', '2021-01-29 03:47:57'),
(123, 106, 3, '2021-01-29 03:47:57', '2021-01-29 03:47:57'),
(124, 106, 5, '2021-01-29 03:47:57', '2021-01-29 03:47:57'),
(125, 106, 6, '2021-01-29 03:47:57', '2021-01-29 03:47:57'),
(126, 106, 8, '2021-01-29 03:47:57', '2021-01-29 03:47:57'),
(127, 106, 9, '2021-01-29 03:47:57', '2021-01-29 03:47:57'),
(128, 107, 2, '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(129, 107, 3, '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(130, 107, 5, '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(131, 107, 6, '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(132, 107, 8, '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(133, 107, 9, '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(134, 116, 5, '2021-01-29 05:46:33', '2021-01-29 05:46:33'),
(135, 116, 7, '2021-01-29 05:46:33', '2021-01-29 05:46:33'),
(136, 117, 1, '2021-01-29 05:53:05', '2021-01-29 05:53:05'),
(137, 117, 4, '2021-01-29 05:53:05', '2021-01-29 05:53:05'),
(138, 117, 8, '2021-01-29 05:53:05', '2021-01-29 05:53:05'),
(139, 117, 9, '2021-01-29 05:53:05', '2021-01-29 05:53:05'),
(140, 118, 3, '2021-01-29 06:24:04', '2021-01-29 06:24:04'),
(141, 118, 5, '2021-01-29 06:24:04', '2021-01-29 06:24:04'),
(142, 118, 7, '2021-01-29 06:24:04', '2021-01-29 06:24:04'),
(143, 118, 11, '2021-01-29 06:24:04', '2021-01-29 06:24:04'),
(144, 118, 12, '2021-01-29 06:24:04', '2021-01-29 06:24:04'),
(145, 118, 13, '2021-01-29 06:25:34', '2021-01-29 06:25:34'),
(146, 119, 1, '2021-01-29 06:31:03', '2021-01-29 06:31:03'),
(147, 119, 6, '2021-01-29 06:31:03', '2021-01-29 06:31:03'),
(148, 119, 7, '2021-01-29 06:31:03', '2021-01-29 06:31:03'),
(149, 119, 9, '2021-01-29 06:31:03', '2021-01-29 06:31:03'),
(150, 119, 13, '2021-01-29 06:31:03', '2021-01-29 06:31:03'),
(151, 119, 14, '2021-01-29 06:31:03', '2021-01-29 06:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `productimages`
--

CREATE TABLE `productimages` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productimages`
--

INSERT INTO `productimages` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/uploads/product/1-1.2.jpg', '2020-08-29 06:11:36', '2020-08-29 06:11:36'),
(2, 1, 'public/uploads/product/1-1.jpg', '2020-08-29 06:11:36', '2020-08-29 06:11:36'),
(3, 1, 'public/uploads/product/1-1.3.jpg', '2020-08-29 06:11:37', '2020-08-29 06:11:37'),
(4, 2, 'public/uploads/product/2-2.1.jpg', '2020-08-29 10:46:26', '2020-08-29 10:46:26'),
(5, 2, 'public/uploads/product/2-2.3.jpg', '2020-08-29 10:46:26', '2020-08-29 10:46:26'),
(6, 2, 'public/uploads/product/2-2.2.jpg', '2020-08-29 10:46:27', '2020-08-29 10:46:27'),
(7, 3, 'public/uploads/product/3-4.1.jpg', '2020-08-29 14:41:49', '2020-08-29 14:41:49'),
(8, 4, 'public/uploads/product/4-500x500.jpg', '2020-08-29 14:44:38', '2020-08-29 14:44:38'),
(9, 4, 'public/uploads/product/4-5.2.jpg', '2020-08-29 14:44:39', '2020-08-29 14:44:39'),
(10, 5, 'public/uploads/product/5-6.1.jpg', '2020-08-29 14:53:17', '2020-08-29 14:53:17'),
(11, 5, 'public/uploads/product/5-6.2.jpg', '2020-08-29 14:53:17', '2020-08-29 14:53:17'),
(12, 6, 'public/uploads/product/6-7.1.jpg', '2020-08-29 15:02:31', '2020-08-29 15:02:31'),
(13, 7, 'public/uploads/product/7-8.1.jpg', '2020-08-29 15:59:29', '2020-08-29 15:59:29'),
(14, 7, 'public/uploads/product/7-8.2.jpg', '2020-08-29 15:59:30', '2020-08-29 15:59:30'),
(15, 7, 'public/uploads/product/7-8.3.jpg', '2020-08-29 15:59:30', '2020-08-29 15:59:30'),
(16, 8, 'public/uploads/product/8-s1.1.png', '2020-08-31 16:39:45', '2020-08-31 16:39:45'),
(17, 8, 'public/uploads/product/8-s1.4.png', '2020-08-31 16:39:46', '2020-08-31 16:39:46'),
(18, 8, 'public/uploads/product/8-s1.3.png', '2020-08-31 16:39:46', '2020-08-31 16:39:46'),
(19, 8, 'public/uploads/product/8-s1.2.png', '2020-08-31 16:39:47', '2020-08-31 16:39:47'),
(20, 9, 'public/uploads/product/9-s2.1.jpg', '2020-08-31 16:52:34', '2020-08-31 16:52:34'),
(21, 9, 'public/uploads/product/9-s2.3.jpg', '2020-08-31 16:52:35', '2020-08-31 16:52:35'),
(22, 9, 'public/uploads/product/9-s2.2.jpg', '2020-08-31 16:52:36', '2020-08-31 16:52:36'),
(23, 10, 'public/uploads/product/10-s3.1.png', '2020-08-31 17:02:03', '2020-08-31 17:02:03'),
(24, 10, 'public/uploads/product/10-s3.2.png', '2020-08-31 17:02:03', '2020-08-31 17:02:03'),
(25, 10, 'public/uploads/product/10-s3.3.png', '2020-08-31 17:02:03', '2020-08-31 17:02:03'),
(26, 10, 'public/uploads/product/10-s3.4.png', '2020-08-31 17:02:04', '2020-08-31 17:02:04'),
(27, 11, 'public/uploads/product/11-h1.1.jpg', '2020-08-31 17:07:43', '2020-08-31 17:07:43'),
(28, 11, 'public/uploads/product/11-h1.2.png', '2020-08-31 17:07:44', '2020-08-31 17:07:44'),
(30, 13, 'public/uploads/product/13-66fee6d4d4a6-003.png', '2020-09-02 10:47:24', '2020-09-02 10:47:24'),
(32, 14, 'public/uploads/product/14-W_Slide_W1980XH950-S03.jpg', '2020-09-14 06:23:46', '2020-09-14 06:23:46'),
(33, 14, 'public/uploads/product/14-W_Slide_W1980XH950-01.jpg', '2020-09-14 06:23:46', '2020-09-14 06:23:46'),
(34, 15, 'public/uploads/product/15-W_Slide_W1980XH950-01.jpg', '2020-09-14 06:27:18', '2020-09-14 06:27:18'),
(35, 15, 'public/uploads/product/15-W_Slide_W1980XH950-S02.jpg', '2020-09-14 06:27:18', '2020-09-14 06:27:18'),
(36, 16, 'public/uploads/product/16-W_Slide_W1980XH950-01.jpg', '2020-09-14 06:36:50', '2020-09-14 06:36:50'),
(37, 17, 'public/uploads/product/17-W_Slide_W1980XH950-01.jpg', '2020-09-14 06:46:53', '2020-09-14 06:46:53'),
(38, 17, 'public/uploads/product/17-W_Slide_W1980XH950-S03.jpg', '2020-09-14 06:46:54', '2020-09-14 06:46:54'),
(39, 18, 'public/uploads/product/18-IMG_4529.jpg', '2020-09-15 05:03:34', '2020-09-15 05:03:34'),
(40, 18, 'public/uploads/product/18-IMG_4528.jpg', '2020-09-15 05:07:48', '2020-09-15 05:07:48'),
(41, 18, 'public/uploads/product/18-IMG_4528.jpg', '2020-09-15 05:07:48', '2020-09-15 05:07:48'),
(42, 19, 'public/uploads/product/19-ads2.jpg', '2020-09-26 10:01:30', '2020-09-26 10:01:30'),
(43, 20, 'public/uploads/product/20-593115cbcbf8225089a87cc83cf70000.jpg', '2020-10-04 06:50:06', '2020-10-04 06:50:06'),
(47, 24, 'public/uploads/product/24-41745306_345617932844800_3033000205290045440_o.jpg', '2021-01-05 07:49:32', '2021-01-05 07:49:32'),
(48, 25, 'public/uploads/product/25-139789186_120693146580179_2359033997793857718_o.jpg', '2021-01-23 15:52:04', '2021-01-23 15:52:04'),
(49, 26, 'public/uploads/product/26-141756915_120693199913507_3673505619502901212_o.jpg', '2021-01-23 17:39:36', '2021-01-23 17:39:36'),
(50, 27, 'public/uploads/product/27-139942234_120693169913510_1383109830287258151_o.jpg', '2021-01-23 17:41:10', '2021-01-23 17:41:10'),
(51, 28, 'public/uploads/product/28-139964336_120693236580170_8272849952435004585_o.jpg', '2021-01-23 17:42:03', '2021-01-23 17:42:03'),
(52, 29, 'public/uploads/product/29-142116329_120693193246841_5670262851015768274_o.jpg', '2021-01-23 17:43:16', '2021-01-23 17:43:16'),
(53, 30, 'public/uploads/product/30-139602545_120211709961656_2435121677434865285_n.jpg', '2021-01-23 17:57:26', '2021-01-23 17:57:26'),
(54, 31, 'public/uploads/product/31-139803137_120211763294984_7681161334329238082_o.jpg', '2021-01-23 17:57:37', '2021-01-23 17:57:37'),
(55, 32, 'public/uploads/product/32-139898424_120211703294990_771268656515337406_n.jpg', '2021-01-23 17:57:42', '2021-01-23 17:57:42'),
(56, 33, 'public/uploads/product/33-140052827_120211643294996_3158784494143006237_n.jpg', '2021-01-23 17:57:46', '2021-01-23 17:57:46'),
(57, 34, 'public/uploads/product/34-141276424_120211766628317_4046161188357323031_n.jpg', '2021-01-23 18:01:49', '2021-01-23 18:01:49'),
(58, 35, 'public/uploads/product/35-140597697_120211613294999_2754662976645771470_n.jpg', '2021-01-23 18:01:50', '2021-01-23 18:01:50'),
(59, 36, 'public/uploads/product/36-140938889_120211649961662_3014985307948051843_n.jpg', '2021-01-23 18:01:52', '2021-01-23 18:01:52'),
(61, 38, 'public/uploads/product/38-140285138_120211583295002_6073769011524307545_n.jpg', '2021-01-23 18:01:55', '2021-01-23 18:01:55'),
(62, 37, 'public/uploads/product/37-141337730_120211689961658_4621866343316927921_n.jpg', '2021-01-23 18:02:24', '2021-01-23 18:02:24'),
(63, 39, 'public/uploads/product/39-141376466_120211566628337_1412498405065036145_n.jpg', '2021-01-23 18:03:28', '2021-01-23 18:03:28'),
(64, 40, 'public/uploads/product/40-139735653_120180006631493_3745528923819347990_o.jpg', '2021-01-23 18:13:10', '2021-01-23 18:13:10'),
(65, 40, 'public/uploads/product/40-141342888_120179993298161_8620971920563838436_o.jpg', '2021-01-23 18:13:10', '2021-01-23 18:13:10'),
(66, 40, 'public/uploads/product/40-141284167_120179976631496_4807120524446895698_o.jpg', '2021-01-23 18:13:10', '2021-01-23 18:13:10'),
(67, 40, 'public/uploads/product/40-141133561_120179999964827_3484654341199181257_o.jpg', '2021-01-23 18:13:10', '2021-01-23 18:13:10'),
(68, 40, 'public/uploads/product/40-140565297_120179956631498_7428039976576718634_o.jpg', '2021-01-23 18:13:10', '2021-01-23 18:13:10'),
(69, 40, 'public/uploads/product/40-139797741_120180013298159_345897253598719470_o.jpg', '2021-01-23 18:13:10', '2021-01-23 18:13:10'),
(70, 41, 'public/uploads/product/41-141725850_120186603297500_1569163718098931017_o.jpg', '2021-01-23 18:19:12', '2021-01-23 18:19:12'),
(71, 42, 'public/uploads/product/42-141188651_120186536630840_5893643342924568427_o.jpg', '2021-01-23 18:19:29', '2021-01-23 18:19:29'),
(72, 43, 'public/uploads/product/43-140635210_120186586630835_3581658731233093555_o.jpg', '2021-01-23 18:19:32', '2021-01-23 18:19:32'),
(73, 44, 'public/uploads/product/44-139864575_120186549964172_6612607792840208867_o.jpg', '2021-01-23 18:19:36', '2021-01-23 18:19:36'),
(74, 45, 'public/uploads/product/45-139499556_120186596630834_8078988691748339751_o.jpg', '2021-01-23 18:19:39', '2021-01-23 18:19:39'),
(75, 46, 'public/uploads/product/46-140655837_119135283402632_6813109960587746642_n.jpg', '2021-01-23 18:25:04', '2021-01-23 18:25:04'),
(76, 46, 'public/uploads/product/46-141473864_119135306735963_8283025982637638621_n.jpg', '2021-01-23 18:25:04', '2021-01-23 18:25:04'),
(77, 46, 'public/uploads/product/46-141369399_119135340069293_7551110722411272226_n.jpg', '2021-01-23 18:25:04', '2021-01-23 18:25:04'),
(78, 46, 'public/uploads/product/46-141091030_119135400069287_9220628271920031754_n.jpg', '2021-01-23 18:25:04', '2021-01-23 18:25:04'),
(79, 46, 'public/uploads/product/46-141034998_119135213402639_7131905189200413057_n.jpg', '2021-01-23 18:25:04', '2021-01-23 18:25:04'),
(80, 46, 'public/uploads/product/46-140814814_119135373402623_1247477409687975008_n.jpg', '2021-01-23 18:25:04', '2021-01-23 18:25:04'),
(81, 46, 'public/uploads/product/46-140751206_119135246735969_8487720116742353134_n.jpg', '2021-01-23 18:25:04', '2021-01-23 18:25:04'),
(82, 46, 'public/uploads/product/46-140699130_119135423402618_7502171936820742229_n.jpg', '2021-01-23 18:25:04', '2021-01-23 18:25:04'),
(83, 47, 'public/uploads/product/47-141473864_119135306735963_8283025982637638621_n.jpg', '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(84, 47, 'public/uploads/product/47-141369399_119135340069293_7551110722411272226_n.jpg', '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(85, 47, 'public/uploads/product/47-141091030_119135400069287_9220628271920031754_n.jpg', '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(86, 47, 'public/uploads/product/47-141034998_119135213402639_7131905189200413057_n.jpg', '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(87, 47, 'public/uploads/product/47-140814814_119135373402623_1247477409687975008_n.jpg', '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(88, 47, 'public/uploads/product/47-140751206_119135246735969_8487720116742353134_n.jpg', '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(89, 47, 'public/uploads/product/47-140699130_119135423402618_7502171936820742229_n.jpg', '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(90, 47, 'public/uploads/product/47-140655837_119135283402632_6813109960587746642_n.jpg', '2021-01-24 17:16:31', '2021-01-24 17:16:31'),
(91, 48, 'public/uploads/product/48-140655837_119135283402632_6813109960587746642_n.jpg', '2021-01-24 17:33:44', '2021-01-24 17:33:44'),
(92, 48, 'public/uploads/product/48-140699130_119135423402618_7502171936820742229_n.jpg', '2021-01-24 17:33:44', '2021-01-24 17:33:44'),
(93, 48, 'public/uploads/product/48-140751206_119135246735969_8487720116742353134_n.jpg', '2021-01-24 17:33:44', '2021-01-24 17:33:44'),
(94, 48, 'public/uploads/product/48-140814814_119135373402623_1247477409687975008_n.jpg', '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(95, 48, 'public/uploads/product/48-141034998_119135213402639_7131905189200413057_n.jpg', '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(96, 48, 'public/uploads/product/48-141091030_119135400069287_9220628271920031754_n.jpg', '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(97, 48, 'public/uploads/product/48-141369399_119135340069293_7551110722411272226_n.jpg', '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(98, 48, 'public/uploads/product/48-141473864_119135306735963_8283025982637638621_n.jpg', '2021-01-24 17:33:45', '2021-01-24 17:33:45'),
(99, 49, 'public/uploads/product/49-141473864_119135306735963_8283025982637638621_n.jpg', '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(100, 49, 'public/uploads/product/49-141369399_119135340069293_7551110722411272226_n.jpg', '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(101, 49, 'public/uploads/product/49-141091030_119135400069287_9220628271920031754_n.jpg', '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(102, 49, 'public/uploads/product/49-141034998_119135213402639_7131905189200413057_n.jpg', '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(103, 49, 'public/uploads/product/49-140814814_119135373402623_1247477409687975008_n.jpg', '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(104, 49, 'public/uploads/product/49-140751206_119135246735969_8487720116742353134_n.jpg', '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(105, 49, 'public/uploads/product/49-140699130_119135423402618_7502171936820742229_n.jpg', '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(106, 49, 'public/uploads/product/49-140655837_119135283402632_6813109960587746642_n.jpg', '2021-01-24 17:33:46', '2021-01-24 17:33:46'),
(107, 50, 'public/uploads/product/50-140655837_119135283402632_6813109960587746642_n.jpg', '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(108, 50, 'public/uploads/product/50-140699130_119135423402618_7502171936820742229_n.jpg', '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(109, 50, 'public/uploads/product/50-140751206_119135246735969_8487720116742353134_n.jpg', '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(110, 50, 'public/uploads/product/50-140814814_119135373402623_1247477409687975008_n.jpg', '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(111, 50, 'public/uploads/product/50-141034998_119135213402639_7131905189200413057_n.jpg', '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(112, 50, 'public/uploads/product/50-141091030_119135400069287_9220628271920031754_n.jpg', '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(113, 50, 'public/uploads/product/50-141369399_119135340069293_7551110722411272226_n.jpg', '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(114, 50, 'public/uploads/product/50-141473864_119135306735963_8283025982637638621_n.jpg', '2021-01-24 17:33:48', '2021-01-24 17:33:48'),
(115, 51, 'public/uploads/product/51-140655837_119135283402632_6813109960587746642_n.jpg', '2021-01-24 17:33:49', '2021-01-24 17:33:49'),
(116, 51, 'public/uploads/product/51-140699130_119135423402618_7502171936820742229_n.jpg', '2021-01-24 17:33:49', '2021-01-24 17:33:49'),
(117, 51, 'public/uploads/product/51-140751206_119135246735969_8487720116742353134_n.jpg', '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(118, 51, 'public/uploads/product/51-140814814_119135373402623_1247477409687975008_n.jpg', '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(119, 51, 'public/uploads/product/51-141034998_119135213402639_7131905189200413057_n.jpg', '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(120, 51, 'public/uploads/product/51-141091030_119135400069287_9220628271920031754_n.jpg', '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(121, 51, 'public/uploads/product/51-141369399_119135340069293_7551110722411272226_n.jpg', '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(122, 51, 'public/uploads/product/51-141473864_119135306735963_8283025982637638621_n.jpg', '2021-01-24 17:33:50', '2021-01-24 17:33:50'),
(123, 52, 'public/uploads/product/52-140655837_119135283402632_6813109960587746642_n.jpg', '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(124, 52, 'public/uploads/product/52-140699130_119135423402618_7502171936820742229_n.jpg', '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(125, 52, 'public/uploads/product/52-140751206_119135246735969_8487720116742353134_n.jpg', '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(126, 52, 'public/uploads/product/52-140814814_119135373402623_1247477409687975008_n.jpg', '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(127, 52, 'public/uploads/product/52-141034998_119135213402639_7131905189200413057_n.jpg', '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(128, 52, 'public/uploads/product/52-141091030_119135400069287_9220628271920031754_n.jpg', '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(129, 52, 'public/uploads/product/52-141369399_119135340069293_7551110722411272226_n.jpg', '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(130, 52, 'public/uploads/product/52-141473864_119135306735963_8283025982637638621_n.jpg', '2021-01-24 17:33:51', '2021-01-24 17:33:51'),
(131, 53, 'public/uploads/product/53-140655837_119135283402632_6813109960587746642_n.jpg', '2021-01-24 17:33:52', '2021-01-24 17:33:52'),
(132, 53, 'public/uploads/product/53-140699130_119135423402618_7502171936820742229_n.jpg', '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(133, 53, 'public/uploads/product/53-140751206_119135246735969_8487720116742353134_n.jpg', '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(134, 53, 'public/uploads/product/53-140814814_119135373402623_1247477409687975008_n.jpg', '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(135, 53, 'public/uploads/product/53-141034998_119135213402639_7131905189200413057_n.jpg', '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(136, 53, 'public/uploads/product/53-141091030_119135400069287_9220628271920031754_n.jpg', '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(137, 53, 'public/uploads/product/53-141369399_119135340069293_7551110722411272226_n.jpg', '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(138, 53, 'public/uploads/product/53-141473864_119135306735963_8283025982637638621_n.jpg', '2021-01-24 17:33:53', '2021-01-24 17:33:53'),
(139, 54, 'public/uploads/product/54-140655837_119135283402632_6813109960587746642_n.jpg', '2021-01-24 17:33:54', '2021-01-24 17:33:54'),
(140, 54, 'public/uploads/product/54-140699130_119135423402618_7502171936820742229_n.jpg', '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(141, 54, 'public/uploads/product/54-140751206_119135246735969_8487720116742353134_n.jpg', '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(142, 54, 'public/uploads/product/54-140814814_119135373402623_1247477409687975008_n.jpg', '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(143, 54, 'public/uploads/product/54-141034998_119135213402639_7131905189200413057_n.jpg', '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(144, 54, 'public/uploads/product/54-141091030_119135400069287_9220628271920031754_n.jpg', '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(145, 54, 'public/uploads/product/54-141369399_119135340069293_7551110722411272226_n.jpg', '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(146, 54, 'public/uploads/product/54-141473864_119135306735963_8283025982637638621_n.jpg', '2021-01-24 17:33:55', '2021-01-24 17:33:55'),
(147, 55, 'public/uploads/product/55-139434155_119117146737779_3051326752310346234_n.jpg', '2021-01-24 17:44:00', '2021-01-24 17:44:00'),
(148, 56, 'public/uploads/product/56-141028438_119117180071109_715380773613064889_n.jpg', '2021-01-24 17:44:05', '2021-01-24 17:44:05'),
(149, 57, 'public/uploads/product/57-140923820_119117113404449_5884295963083410166_n.jpg', '2021-01-24 17:44:12', '2021-01-24 17:44:12'),
(150, 58, 'public/uploads/product/58-140635213_119117053404455_3250383470655847751_n.jpg', '2021-01-24 17:44:16', '2021-01-24 17:44:16'),
(151, 59, 'public/uploads/product/59-140723857_119116943404466_48100105546426661_n.jpg', '2021-01-24 17:44:20', '2021-01-24 17:44:20'),
(152, 60, 'public/uploads/product/60-141106696_119116876737806_3198815306513072817_n.jpg', '2021-01-24 17:44:23', '2021-01-24 17:44:23'),
(153, 61, 'public/uploads/product/61-141205247_119116846737809_3718035032203531756_n.jpg', '2021-01-24 17:44:27', '2021-01-24 17:44:27'),
(154, 62, 'public/uploads/product/62-141177102_119116806737813_5480462029166600221_n.jpg', '2021-01-24 17:44:30', '2021-01-24 17:44:30'),
(155, 63, 'public/uploads/product/63-140632052_119101383406022_5921364474071835553_n.jpg', '2021-01-24 17:49:29', '2021-01-24 17:49:29'),
(156, 64, 'public/uploads/product/64-140953300_119101413406019_3817717486101659397_n (1).jpg', '2021-01-24 17:50:36', '2021-01-24 17:50:36'),
(157, 65, 'public/uploads/product/65-141066732_119101460072681_8172855548663557259_n.jpg', '2021-01-24 17:51:26', '2021-01-24 17:51:26'),
(158, 66, 'public/uploads/product/66-141037440_119101736739320_1630074146992497132_o.jpg', '2021-01-24 17:52:43', '2021-01-24 17:52:43'),
(159, 67, 'public/uploads/product/67-140627087_119101526739341_9056052362034107324_n.jpg', '2021-01-24 17:54:04', '2021-01-24 17:54:04'),
(160, 68, 'public/uploads/product/68-140633374_119101803405980_1176785586424959153_n.jpg', '2021-01-24 17:55:01', '2021-01-24 17:55:01'),
(161, 69, 'public/uploads/product/69-140953300_119101500072677_3157196911722147557_n.jpg', '2021-01-24 17:55:56', '2021-01-24 17:55:56'),
(162, 70, 'public/uploads/product/70-140633374_119101803405980_1176785586424959153_n.jpg', '2021-01-24 17:56:48', '2021-01-24 17:56:48'),
(163, 71, 'public/uploads/product/71-141037437_119101763405984_8327543926618696394_n.jpg', '2021-01-24 17:58:40', '2021-01-24 17:58:40'),
(164, 72, 'public/uploads/product/72-141037437_119101763405984_8327543926618696394_n.jpg', '2021-01-24 17:59:15', '2021-01-24 17:59:15'),
(165, 73, 'public/uploads/product/73-140724023_119101903405970_6437210138626495054_n.jpg', '2021-01-24 18:00:35', '2021-01-24 18:00:35'),
(166, 74, 'public/uploads/product/74-140631977_119081516741342_2196568030122500923_o.jpg', '2021-01-24 18:06:42', '2021-01-24 18:06:42'),
(167, 75, 'public/uploads/product/75-140631977_119081516741342_2196568030122500923_o.jpg', '2021-01-24 18:06:44', '2021-01-24 18:06:44'),
(168, 76, 'public/uploads/product/76-140631977_119081516741342_2196568030122500923_o.jpg', '2021-01-24 18:06:45', '2021-01-24 18:06:45'),
(169, 77, 'public/uploads/product/77-140631977_119081516741342_2196568030122500923_o.jpg', '2021-01-24 18:06:47', '2021-01-24 18:06:47'),
(170, 78, 'public/uploads/product/78-140631977_119081516741342_2196568030122500923_o.jpg', '2021-01-24 18:06:48', '2021-01-24 18:06:48'),
(171, 79, 'public/uploads/product/79-140162299_118530076796486_4453352104226372973_o.jpg', '2021-01-26 17:46:42', '2021-01-26 17:46:42'),
(172, 80, 'public/uploads/product/80-140251709_118530183463142_2034089102901939619_o.jpg', '2021-01-26 17:46:46', '2021-01-26 17:46:46'),
(173, 81, 'public/uploads/product/81-140723867_118530106796483_3740907686224312758_o.jpg', '2021-01-26 17:46:49', '2021-01-26 17:46:49'),
(174, 82, 'public/uploads/product/82-140680239_118530156796478_7122924366667718206_o.jpg', '2021-01-26 17:48:03', '2021-01-26 17:48:03'),
(175, 83, 'public/uploads/product/83-140383153_118528920129935_2016109037633964356_o.jpg', '2021-01-26 17:55:23', '2021-01-26 17:55:23'),
(176, 84, 'public/uploads/product/84-140208200_118528853463275_6946584873501886008_o.jpg', '2021-01-26 17:55:24', '2021-01-26 17:55:24'),
(177, 85, 'public/uploads/product/85-140119223_118528960129931_8204519015702719438_o.jpg', '2021-01-26 17:55:26', '2021-01-26 17:55:26'),
(178, 86, 'public/uploads/product/86-140117739_118528893463271_4413172738670864943_o.jpg', '2021-01-26 17:55:28', '2021-01-26 17:55:28'),
(179, 87, 'public/uploads/product/87-140752318_118523606797133_7553740428889366041_o.jpg', '2021-01-26 18:04:07', '2021-01-26 18:04:07'),
(180, 88, 'public/uploads/product/88-140749564_118523576797136_2226516774909433686_o.jpg', '2021-01-26 18:05:34', '2021-01-26 18:05:34'),
(181, 89, 'public/uploads/product/89-140687258_118523370130490_1292914102941106184_o.jpg', '2021-01-26 18:05:46', '2021-01-26 18:05:46'),
(182, 90, 'public/uploads/product/90-140508569_118523550130472_9171241535195582607_o.jpg', '2021-01-26 18:05:56', '2021-01-26 18:05:56'),
(183, 91, 'public/uploads/product/91-140394555_118523403463820_4991575094955276710_o.jpg', '2021-01-26 18:06:02', '2021-01-26 18:06:02'),
(184, 92, 'public/uploads/product/92-140217029_118523506797143_8565993965351803025_o.jpg', '2021-01-26 18:06:19', '2021-01-26 18:06:19'),
(185, 93, 'public/uploads/product/93-140295125_118523460130481_2213757031781671574_o.jpg', '2021-01-26 18:06:20', '2021-01-26 18:06:20'),
(186, 94, 'public/uploads/product/94-140313175_118523430130484_4630100536420316961_o.jpg', '2021-01-26 18:06:22', '2021-01-26 18:06:22'),
(187, 95, 'public/uploads/product/95-140388270_118522320130595_2226274856716511426_o.jpg', '2021-01-26 18:09:19', '2021-01-26 18:09:19'),
(188, 96, 'public/uploads/product/96-140388270_118522320130595_2226274856716511426_o.jpg', '2021-01-26 18:09:19', '2021-01-26 18:09:19'),
(189, 97, 'public/uploads/product/97-140472217_118522296797264_4241441813791268983_o.jpg', '2021-01-26 18:09:22', '2021-01-26 18:09:22'),
(190, 98, 'public/uploads/product/98-141773587_121896843126476_6201421288114305799_o.jpg', '2021-01-29 03:23:05', '2021-01-29 03:23:05'),
(191, 98, 'public/uploads/product/98-142091683_121896876459806_851857101767650098_o.jpg', '2021-01-29 03:23:05', '2021-01-29 03:23:05'),
(192, 98, 'public/uploads/product/98-142691502_121896923126468_1280904030370596190_o.jpg', '2021-01-29 03:23:05', '2021-01-29 03:23:05'),
(193, 98, 'public/uploads/product/98-140683505_121896939793133_6572286016802868856_o.jpg', '2021-01-29 03:23:06', '2021-01-29 03:23:06'),
(194, 98, 'public/uploads/product/98-141068080_121896886459805_2447824330958775560_o.jpg', '2021-01-29 03:23:06', '2021-01-29 03:23:06'),
(195, 98, 'public/uploads/product/98-141295532_121896899793137_6363398534102928865_o.jpg', '2021-01-29 03:23:06', '2021-01-29 03:23:06'),
(196, 98, 'public/uploads/product/98-142064598_121896906459803_7368641146047968495_o.jpg', '2021-01-29 03:23:06', '2021-01-29 03:23:06'),
(197, 99, 'public/uploads/product/99-141587920_121893979793429_8735622297521035309_o.jpg', '2021-01-29 03:30:57', '2021-01-29 03:30:57'),
(198, 99, 'public/uploads/product/99-141287638_121893943126766_5483870610241334270_o.jpg', '2021-01-29 03:30:57', '2021-01-29 03:30:57'),
(199, 99, 'public/uploads/product/99-141725848_121893999793427_7717567712863022908_o.jpg', '2021-01-29 03:30:57', '2021-01-29 03:30:57'),
(200, 99, 'public/uploads/product/99-141287774_121893919793435_4930593222340272760_o.jpg', '2021-01-29 03:30:57', '2021-01-29 03:30:57'),
(201, 100, 'public/uploads/product/100-142445378_121894073126753_3212441776266178290_o.jpg', '2021-01-29 03:37:05', '2021-01-29 03:37:05'),
(202, 101, 'public/uploads/product/101-141580237_121894056460088_8278777111755818211_o.jpg', '2021-01-29 03:37:06', '2021-01-29 03:37:06'),
(203, 102, 'public/uploads/product/102-141328778_121894063126754_6354459041912869513_o.jpg', '2021-01-29 03:37:08', '2021-01-29 03:37:08'),
(204, 103, 'public/uploads/product/103-141051617_121893993126761_3532619058665805233_o.jpg', '2021-01-29 03:37:10', '2021-01-29 03:37:10'),
(205, 104, 'public/uploads/product/104-140567639_121894043126756_964901104824737606_o.jpg', '2021-01-29 03:38:58', '2021-01-29 03:38:58'),
(206, 105, 'public/uploads/product/105-142446407_121865146462979_5984991184224456356_o.jpg', '2021-01-29 03:47:53', '2021-01-29 03:47:53'),
(207, 106, 'public/uploads/product/106-140477446_121865189796308_5416902378330885065_o.jpg', '2021-01-29 03:47:56', '2021-01-29 03:47:56'),
(208, 106, 'public/uploads/product/106-140613758_121865166462977_3692099186107098458_o.jpg', '2021-01-29 03:47:56', '2021-01-29 03:47:56'),
(209, 106, 'public/uploads/product/106-141419428_121865106462983_1986121909767082940_o.jpg', '2021-01-29 03:47:56', '2021-01-29 03:47:56'),
(210, 106, 'public/uploads/product/106-141450414_121865186462975_1344333881301853752_o.jpg', '2021-01-29 03:47:56', '2021-01-29 03:47:56'),
(211, 106, 'public/uploads/product/106-141733262_121865193129641_6192299915386926296_o.jpg', '2021-01-29 03:47:56', '2021-01-29 03:47:56'),
(212, 106, 'public/uploads/product/106-142586685_121865123129648_7732187513138282064_o.jpg', '2021-01-29 03:47:56', '2021-01-29 03:47:56'),
(213, 106, 'public/uploads/product/106-142802807_121865199796307_3907812069760414395_o.jpg', '2021-01-29 03:47:57', '2021-01-29 03:47:57'),
(214, 107, 'public/uploads/product/107-140477446_121865189796308_5416902378330885065_o.jpg', '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(215, 107, 'public/uploads/product/107-140613758_121865166462977_3692099186107098458_o.jpg', '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(216, 107, 'public/uploads/product/107-141419428_121865106462983_1986121909767082940_o.jpg', '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(217, 107, 'public/uploads/product/107-141450414_121865186462975_1344333881301853752_o.jpg', '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(218, 107, 'public/uploads/product/107-141733262_121865193129641_6192299915386926296_o.jpg', '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(219, 107, 'public/uploads/product/107-142586685_121865123129648_7732187513138282064_o.jpg', '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(220, 107, 'public/uploads/product/107-142802807_121865199796307_3907812069760414395_o.jpg', '2021-01-29 03:47:58', '2021-01-29 03:47:58'),
(221, 108, 'public/uploads/product/108-140716790_121861303130030_5722042547665038983_o.jpg', '2021-01-29 04:29:30', '2021-01-29 04:29:30'),
(222, 109, 'public/uploads/product/109-140720815_121861349796692_3572492436413227420_o.jpg', '2021-01-29 04:29:32', '2021-01-29 04:29:32'),
(223, 110, 'public/uploads/product/110-141150600_121861329796694_7604407640542242531_o.jpg', '2021-01-29 04:29:34', '2021-01-29 04:29:34'),
(224, 111, 'public/uploads/product/111-141284993_121861393130021_5859075076012851563_o.jpg', '2021-01-29 04:29:40', '2021-01-29 04:29:40'),
(225, 112, 'public/uploads/product/112-141289938_121861319796695_2452613041652008025_o.jpg', '2021-01-29 04:29:44', '2021-01-29 04:29:44'),
(226, 113, 'public/uploads/product/113-141717105_121861263130034_2736706185140865829_o.jpg', '2021-01-29 04:29:45', '2021-01-29 04:29:45'),
(227, 114, 'public/uploads/product/114-141927891_121861313130029_7753253992031906547_o.jpg', '2021-01-29 04:29:47', '2021-01-29 04:29:47'),
(228, 115, 'public/uploads/product/115-141150600_121861329796694_7604407640542242531_o.jpg', '2021-01-29 04:29:55', '2021-01-29 04:29:55'),
(229, 116, 'public/uploads/product/116-138292432_117820600200767_7031176759408117454_n.jpg', '2021-01-29 05:46:33', '2021-01-29 05:46:33'),
(230, 116, 'public/uploads/product/116-139960304_117820636867430_386492743264822940_n.jpg', '2021-01-29 05:46:33', '2021-01-29 05:46:33'),
(231, 116, 'public/uploads/product/116-138300268_117820676867426_1878192787955859962_n.jpg', '2021-01-29 05:46:33', '2021-01-29 05:46:33'),
(232, 116, 'public/uploads/product/116-138725400_117820703534090_4974836646107751776_n.jpg', '2021-01-29 05:46:33', '2021-01-29 05:46:33'),
(233, 117, 'public/uploads/product/117-139649842_117443290238498_2337247453234064780_n.jpg', '2021-01-29 05:53:05', '2021-01-29 05:53:05'),
(234, 117, 'public/uploads/product/117-139657816_117443146905179_4272723238727798484_n.jpg', '2021-01-29 05:53:05', '2021-01-29 05:53:05'),
(235, 117, 'public/uploads/product/117-139711867_117443270238500_991583728469411148_n.jpg', '2021-01-29 05:53:05', '2021-01-29 05:53:05'),
(236, 118, 'public/uploads/product/118-139691323_117441653571995_4791689067673089320_n.jpg', '2021-01-29 06:19:07', '2021-01-29 06:19:07'),
(238, 118, 'public/uploads/product/118-140030474_117441633571997_2587018617470089828_n.jpg', '2021-01-29 06:19:07', '2021-01-29 06:19:07'),
(239, 118, 'public/uploads/product/118-140078900_117441873571973_1332367379105102605_n.jpg', '2021-01-29 06:19:07', '2021-01-29 06:19:07'),
(240, 118, 'public/uploads/product/118-139816463_117441573572003_4598017487818356138_o.jpg', '2021-01-29 06:19:07', '2021-01-29 06:19:07'),
(241, 118, 'public/uploads/product/118-139919661_117441853571975_7105469414007915412_n.jpg', '2021-01-29 06:19:07', '2021-01-29 06:19:07'),
(242, 118, 'public/uploads/product/118-139914632_117441733571987_9017368389854511838_n.jpg', '2021-01-29 06:19:07', '2021-01-29 06:19:07'),
(243, 119, 'public/uploads/product/119-139607564_117441600238667_3257225737872683253_n.jpg', '2021-01-29 06:29:23', '2021-01-29 06:29:23'),
(244, 119, 'public/uploads/product/119-139798778_117441900238637_2688957280908627962_n.jpg', '2021-01-29 06:29:23', '2021-01-29 06:29:23'),
(245, 119, 'public/uploads/product/119-140030474_117441616905332_4000177955041169729_n.jpg', '2021-01-29 06:29:23', '2021-01-29 06:29:23'),
(247, 119, 'public/uploads/product/119-139653784_117441670238660_6377761456400633226_n.jpg', '2021-01-29 06:29:23', '2021-01-29 06:29:23'),
(248, 119, 'public/uploads/product/119-139711867_117441760238651_8649446492047125299_n.jpg', '2021-01-29 06:29:23', '2021-01-29 06:29:23'),
(249, 119, 'public/uploads/product/119-139794004_117441823571978_1847212127865325382_n.jpg', '2021-01-29 06:29:23', '2021-01-29 06:29:23'),
(250, 120, 'public/uploads/product/120-142832173_124028349579992_291387186863456920_o.jpg', '2021-01-31 08:58:06', '2021-01-31 08:58:06'),
(251, 121, 'public/uploads/product/121-142471295_124028372913323_446856593083634916_o.jpg', '2021-01-31 08:58:07', '2021-01-31 08:58:07'),
(252, 122, 'public/uploads/product/122-143908586_124028492913311_7232925336236199101_o.jpg', '2021-01-31 08:58:49', '2021-01-31 08:58:49'),
(253, 122, 'public/uploads/product/122-144498562_124028459579981_2874116092456129611_o.jpg', '2021-01-31 08:58:49', '2021-01-31 08:58:49'),
(254, 123, 'public/uploads/product/123-143261883_124028289579998_8572297603116564736_o.jpg', '2021-01-31 08:59:06', '2021-01-31 08:59:06'),
(255, 124, 'public/uploads/product/124-142432030_124028529579974_917627772960840025_o.jpg', '2021-01-31 08:59:27', '2021-01-31 08:59:27'),
(256, 125, 'public/uploads/product/125-142396573_124028176246676_8596445878911181674_o.jpg', '2021-01-31 08:59:48', '2021-01-31 08:59:48'),
(257, 126, 'public/uploads/product/126-142393024_124028239580003_1604736892588764405_o.jpg', '2021-01-31 09:00:05', '2021-01-31 09:00:05'),
(258, 127, 'public/uploads/product/127-142080466_124028432913317_4240236658160898349_o.jpg', '2021-01-31 09:00:20', '2021-01-31 09:00:20'),
(259, 128, 'public/uploads/product/128-142080466_124028432913317_4240236658160898349_o.jpg', '2021-01-31 09:00:35', '2021-01-31 09:00:35'),
(260, 129, 'public/uploads/product/129-141968504_124028199580007_3430851328858769015_o.jpg', '2021-01-31 09:00:46', '2021-01-31 09:00:46'),
(261, 130, 'public/uploads/product/130-141723218_124028319579995_6017502123620500950_o.jpg', '2021-01-31 09:00:58', '2021-01-31 09:00:58'),
(262, 131, 'public/uploads/product/131-141723004_124028402913320_1872397941903709842_o.jpg', '2021-01-31 09:01:12', '2021-01-31 09:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productcat` int(11) NOT NULL,
  `productsubcat` int(11) NOT NULL,
  `productchildcat` int(11) DEFAULT NULL,
  `productbrand` int(11) DEFAULT NULL,
  `productname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `productdiscount` int(11) DEFAULT NULL,
  `productnewprice` int(11) NOT NULL,
  `productoldprice` int(11) DEFAULT NULL,
  `productpoint` int(11) DEFAULT NULL,
  `productcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additionalshipping` int(11) DEFAULT NULL,
  `featureproductdate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productstyle` tinyint(4) DEFAULT NULL,
  `productdetails` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `productdetails2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productquantity` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `request` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productcat`, `productsubcat`, `productchildcat`, `productbrand`, `productname`, `slug`, `productdiscount`, `productnewprice`, `productoldprice`, `productpoint`, `productcode`, `additionalshipping`, `featureproductdate`, `productstyle`, `productdetails`, `productdetails2`, `productquantity`, `sellerid`, `request`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 2, 1, 'apple iphone 7 plus - smartphone - 5.5\'\' - 3gb ram - 128gb - main camera 12 mp - 7 mp selfie camera', 'apple-iphone-7-plus---smartphone---5.5\'\'---3gb-ram---128gb---main-camera-12-mp---7-mp-selfie-camera', 15, 135000, NULL, NULL, '95243868', NULL, NULL, NULL, '<p>Specifications<br>Processor/CPU:<br>A10 Fusion<br>Display Size:<br>5.5 Inch<br>RAM:<br>3GB<br>Rear Camera:<br>12 MP<br>Front Camera:<br>7 MP<br>Storage:<br>128GB<br>Battery:<br>2900mAh<br></p>', '<p>Specifications<br>Processor/CPU:<br>A10 Fusion<br>Display Size:<br>5.5 Inch<br>RAM:<br>3GB<br>Rear Camera:<br>12 MP<br>Front Camera:<br>7 MP<br>Storage:<br>128GB<br>Battery:<br>2900mAh<br></p>', 5, 1, 1, 0, '2020-08-29 10:46:23', '2021-01-26 14:00:11'),
(8, 1, 1, 3, 2, 'samsung galaxy a2 core smartphone - 5.0\" inch - 1gb ram - 16gb rom - 5mp rear camera - blue', 'samsung-galaxy-a2-core-smartphone---5.0\"-inch---1gb-ram---16gb-rom---5mp-rear-camera---blue', NULL, 7999, NULL, NULL, '57652632', NULL, NULL, NULL, '<p>Specifications<br>Display:<br>5.0” QHD TFT<br>Camera Rear:<br>5MP (F2.2)<br>Camera Front:<br>5MP (F1.9)<br>Processor:<br>Octa-core 1.6GHz<br>Ram:<br>1 GB<br>Battery:<br>2600mAh<br>Network:<br>4G, LTE<br>Dimensions:<br>141.5 x 70.9 x 9.1 / 145<br>Weight:<br>142g<br>SIM :<br>Dual SIM<br>Rom:<br>16 GB<br></p>', '<p>Specifications<br>Display:<br>5.0” QHD TFT<br>Camera Rear:<br>5MP (F2.2)<br>Camera Front:<br>5MP (F1.9)<br>Processor:<br>Octa-core 1.6GHz<br>Ram:<br>1 GB<br>Battery:<br>2600mAh<br>Network:<br>4G, LTE<br>Dimensions:<br>141.5 x 70.9 x 9.1 / 145<br>Weight:<br>142g<br>SIM :<br>Dual SIM<br>Rom:<br>16 GB<br></p>', 5, 1, 1, 0, '2020-08-31 16:39:40', '2021-01-26 14:00:11'),
(25, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 8, 1560, 1700, NULL, '11256359', NULL, NULL, 1, '<p>Half Silk &amp; Quoted on photograph<br></p>', '<p>Product Code: MART(SLP)-010<br></p>', 100, 23, 1, 1, '2021-01-23 15:52:03', '2021-01-23 15:52:53'),
(26, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 8, 1560, 1700, NULL, '34872394', NULL, NULL, 1, '<p>Half Silk &amp; Quoted&nbsp;<br></p>', '<p>Product Code: MART(SLP)-010<br></p>', 100, 23, 1, 1, '2021-01-23 17:39:36', '2021-01-24 17:04:01'),
(27, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 8, 1560, 1700, NULL, '81963771', NULL, NULL, 1, 'Half Silk &amp; Quoted&nbsp;', '<p>Product Code: MART(SLP)-010<br></p>', 100, 23, 1, 1, '2021-01-23 17:41:09', '2021-01-24 17:04:01'),
(28, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 8, 1560, 1700, NULL, '52116216', NULL, NULL, 1, '<p>Half Silk &amp; Quoted&nbsp;<br></p>', '<p>Product Code: MART(SLP)-010<br></p>', 100, 23, 1, 1, '2021-01-23 17:42:03', '2021-01-24 17:04:01'),
(29, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 8, 1560, 1700, NULL, '55566904', NULL, NULL, NULL, '<p>Half Silk &amp; Quoted on photograph<br></p>', '<p>Product Code: MART(SLP)-010<br></p>', 100, 23, 1, 1, '2021-01-23 17:43:16', '2021-01-24 17:04:01'),
(30, 8, 9, 11, 6, 'embroidered lawn', 'embroidered-lawn', 7, 1800, 1940, NULL, '16278768', NULL, NULL, NULL, '<p>Embroidered lawn collections with digital print cotton dopatta, cotton trouser&nbsp;&nbsp;<br></p>', '<p>Product Code: MART(SLP)-009<br></p>', 100, 23, 1, 1, '2021-01-23 17:57:26', '2021-01-24 17:04:01'),
(31, 8, 9, 11, 6, 'embroidered lawn', 'embroidered-lawn', 7, 1800, 1940, NULL, '98628720', NULL, NULL, NULL, '<p>Embroidered lawn collections with digital print cotton dopatta, cotton trouser&nbsp;&nbsp;<br></p>', '<p>Product Code: MART(SLP)-009<br></p>', 100, 23, 1, 1, '2021-01-23 17:57:37', '2021-01-24 17:04:01'),
(32, 8, 9, 11, 6, 'embroidered lawn', 'embroidered-lawn', 7, 1800, 1940, NULL, '14765289', NULL, NULL, NULL, '<p>Embroidered lawn collections with digital print cotton dopatta, cotton trouser&nbsp;&nbsp;<br></p>', '<p>Product Code: MART(SLP)-009<br></p>', 100, 23, 1, 1, '2021-01-23 17:57:42', '2021-01-24 17:04:01'),
(33, 8, 8, 0, 6, 'embroidered lawn', 'embroidered-lawn', 7, 1800, 1940, NULL, '88329594', NULL, NULL, NULL, '<p>Embroidered lawn collections with digital print cotton dopatta, cotton trouser&nbsp;&nbsp;<br></p>', '<p>Product Code: MART(SLP)-009<br></p>', 100, 23, 1, 1, '2021-01-23 17:57:46', '2021-01-24 17:04:01'),
(34, 8, 9, 11, 6, 'embroidered lawn', 'embroidered-lawn', 7, 1800, 1940, NULL, '30305998', NULL, NULL, NULL, '<p>Embroidered lawn collections with digital print cotton dopatta, cotton trouser&nbsp;&nbsp;<br></p>', '<p>Product Code: MART(SLP)-009<br></p>', 100, 23, 1, 1, '2021-01-23 18:01:49', '2021-01-24 17:04:01'),
(35, 8, 9, 11, 6, 'embroidered lawn', 'embroidered-lawn', 7, 1800, 1940, NULL, '51809784', NULL, NULL, NULL, '<p>Embroidered lawn collections with digital print cotton dopatta, cotton trouser&nbsp;&nbsp;<br></p>', '<p>Product Code: MART(SLP)-009<br></p>', 100, 23, 1, 1, '2021-01-23 18:01:50', '2021-01-24 17:04:01'),
(36, 8, 9, 11, 6, 'embroidered lawn', 'embroidered-lawn', 7, 1800, 1940, NULL, '99120447', NULL, NULL, NULL, '<p>Embroidered lawn collections with digital print cotton dopatta, cotton trouser&nbsp;&nbsp;<br></p>', '<p>Product Code: MART(SLP)-009<br></p>', 100, 23, 1, 1, '2021-01-23 18:01:52', '2021-01-24 17:04:18'),
(37, 8, 9, 11, 6, 'embroidered lawn', 'embroidered-lawn', 7, 1800, 1940, NULL, NULL, NULL, NULL, NULL, '<p>Embroidered lawn collections with digital print cotton dopatta, cotton trouser  <br></p>', '<p>Product Code: MART(SLP)-009<br></p>', 100, 23, 1, 1, '2021-01-23 18:01:53', '2021-01-24 17:03:35'),
(38, 8, 9, 11, 6, 'embroidered lawn', 'embroidered-lawn', 7, 1800, 1940, NULL, '30638754', NULL, NULL, NULL, '<p>Embroidered lawn collections with digital print cotton dopatta, cotton trouser&nbsp;&nbsp;<br></p>', '<p>Product Code: MART(SLP)-009<br></p>', 100, 23, 1, 1, '2021-01-23 18:01:55', '2021-01-24 17:04:18'),
(39, 8, 9, 11, 6, 'embroidered lawn', 'embroidered-lawn', 7, 1800, 1940, NULL, '51928788', NULL, NULL, NULL, '<p>Embroidered lawn collections with digital print cotton dopatta, cotton trouser&nbsp;&nbsp;<br></p>', '<p>&nbsp;MART(SLP)-009<br></p>', 100, 23, 1, 1, '2021-01-23 18:03:28', '2021-01-24 17:04:18'),
(40, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 6, 2600, 2760, NULL, NULL, NULL, NULL, 1, '<p> Half Silk Par lagano combo Shari for you & your little one (full set)<br></p>', '<p>MART(SLP)-007<br></p>', 300, 23, 1, 1, '2021-01-23 18:13:09', '2021-01-24 17:03:35'),
(41, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 13, 1050, 1210, NULL, '36344088', NULL, NULL, NULL, '<p>Half Silk Shari<br></p>', '<p>Product Code: MART(SLP)-008<br></p>', 100, 23, 1, 1, '2021-01-23 18:19:12', '2021-01-24 17:04:18'),
(42, 8, 8, 10, 0, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 13, 1050, 1210, NULL, '69101961', NULL, NULL, NULL, '<p>Half Silk Shari<br></p>', '<p>Product Code: MART(SLP)-008<br></p>', 100, 23, 1, 1, '2021-01-23 18:19:29', '2021-01-24 17:04:18'),
(43, 8, 8, 10, 0, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 13, 1050, 1210, NULL, '24459855', NULL, NULL, NULL, '<p>Half Silk Shari<br></p>', '<p>Product Code: MART(SLP)-008<br></p>', 100, 23, 1, 1, '2021-01-23 18:19:32', '2021-01-24 17:04:18'),
(44, 8, 8, 10, 0, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 13, 1050, 1210, NULL, '55220574', NULL, NULL, NULL, '<p>Half Silk Shari<br></p>', '<p>Product Code: MART(SLP)-008<br></p>', 100, 23, 1, 1, '2021-01-23 18:19:36', '2021-01-24 17:04:18'),
(45, 8, 8, 10, 0, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 13, 1050, 1210, NULL, '12921763', NULL, NULL, NULL, '<p>Half Silk Shari<br></p>', '<p>Product Code: MART(SLP)-008<br></p>', 100, 23, 1, 1, '2021-01-23 18:19:39', '2021-01-24 17:04:18'),
(46, 15, 10, 12, 6, 'খানদানি স্কয়ার প্ল্যান্টার (৪\" )', 'খানদানি-স্কয়ার-প্ল্যান্টার-(৪\"-)', NULL, 1800, 25, NULL, NULL, NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>MART(MNL)-010<br></p>', 200, 23, 1, 1, '2021-01-23 18:25:04', '2021-01-24 17:03:35'),
(47, 15, 10, 12, 6, 'খানদানি স্কয়ার প্ল্যান্টার (৪.৫\" )', 'খানদানি-স্কয়ার-প্ল্যান্টার-(৪.৫\"-)', 14, 30, 35, NULL, '99079435', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-010<br></p>', 1000, 23, 1, 1, '2021-01-24 17:16:30', '2021-01-26 13:41:06'),
(48, 15, 10, 12, 6, 'খানদানি স্কয়ার প্ল্যান্টার (৫.৫\" )', 'খানদানি-স্কয়ার-প্ল্যান্টার-(৫.৫\"-)', 16, 42, 50, NULL, '45865357', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-010<br></p>', 1000, 23, 1, 1, '2021-01-24 17:33:44', '2021-01-26 13:41:06'),
(49, 15, 10, 12, 6, 'খানদানি স্কয়ার প্ল্যান্টার (৭\" )', 'খানদানি-স্কয়ার-প্ল্যান্টার-(৭\"-)', NULL, 80, NULL, NULL, '55999322', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-010<br></p>', 5000, 23, 1, 1, '2021-01-24 17:33:46', '2021-01-26 13:41:06'),
(50, 15, 10, 12, 6, 'খানদানি স্কয়ার প্ল্যান্টার (৯\" )', 'খানদানি-স্কয়ার-প্ল্যান্টার-(৯\"-)', NULL, 110, NULL, NULL, '32563652', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-010<br></p>', 1000, 23, 1, 1, '2021-01-24 17:33:48', '2021-01-26 13:41:06'),
(51, 15, 10, 12, 0, 'খানদানি স্কয়ার প্ল্যান্টার (১৩\"', 'খানদানি-স্কয়ার-প্ল্যান্টার-(১৩\"', 9, 160, 175, NULL, '21156121', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-010<br></p>', 1000, 23, 1, 1, '2021-01-24 17:33:49', '2021-01-26 13:41:06'),
(52, 15, 10, 12, 6, 'খানদানি স্কয়ার প্ল্যান্টার (১০\" )', 'খানদানি-স্কয়ার-প্ল্যান্টার-(১০\"-)', 12, 110, 125, NULL, '11703221', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-010<br></p>', 1000, 23, 1, 1, '2021-01-24 17:33:51', '2021-01-26 13:41:06'),
(53, 15, 10, 12, 6, 'বিপি স্কয়ার প্ল্যান্টার (১১.৫\" )', 'বিপি-স্কয়ার-প্ল্যান্টার-(১১.৫\"-)', NULL, 320, 200, NULL, '13048800', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-010<br></p>', 1000, 23, 1, 1, '2021-01-24 17:33:52', '2021-01-26 13:41:06'),
(54, 15, 10, 12, 6, 'বিপি স্কয়ার প্ল্যান্টার ( ১৩\")', 'বিপি-স্কয়ার-প্ল্যান্টার-(-১৩\")', 8, 240, 260, NULL, '56896764', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-010<br></p>', 1000, 23, 1, 1, '2021-01-24 17:33:54', '2021-01-26 13:41:06'),
(55, 15, 10, 12, 6, 'ইকো প্ল্যান্টার (১৮\" )', 'ইকো-প্ল্যান্টার-(১৮\"-)', 5, 475, 500, NULL, '57561288', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-009<br></p>', 100, 23, 1, 1, '2021-01-24 17:44:00', '2021-01-26 13:39:46'),
(56, 15, 10, 12, 6, 'ইকো প্ল্যান্টার (১৬\" )  মূল্য', 'ইকো-প্ল্যান্টার-(১৬\"-)-মূল্য', 6, 300, 320, NULL, '42742315', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-009<br></p>', 100, 23, 1, 1, '2021-01-24 17:44:05', '2021-01-26 13:41:06'),
(57, 15, 10, 12, 6, 'ইকো প্ল্যান্টার (১৪\" )', 'ইকো-প্ল্যান্টার-(১৪\"-)', 5, 190, 200, NULL, '47928924', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-009<br></p>', 100, 23, 1, 1, '2021-01-24 17:44:12', '2021-01-26 13:40:49'),
(58, 15, 10, 12, 6, 'ইকো প্ল্যান্টার (১২\" )', 'ইকো-প্ল্যান্টার-(১২\"-)', 9, 155, 170, NULL, '14619781', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-009<br></p>', 100, 23, 1, 1, '2021-01-24 17:44:16', '2021-01-26 13:41:14'),
(59, 15, 10, 12, 6, 'ইকো প্ল্যান্টার (১০\" )', 'ইকো-প্ল্যান্টার-(১০\"-)', 9, 105, 115, NULL, '72906265', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-009<br></p>', 100, 23, 1, 1, '2021-01-24 17:44:20', '2021-01-26 13:41:14'),
(60, 15, 10, 12, 6, 'ইকো প্ল্যান্টার (৮\" )', 'ইকো-প্ল্যান্টার-(৮\"-)', 7, 65, 70, NULL, '41686145', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-009<br></p>', 100, 23, 1, 1, '2021-01-24 17:44:23', '2021-01-26 13:41:14'),
(61, 15, 10, 12, 6, 'ইকো প্ল্যান্টার (৬\" )', 'ইকো-প্ল্যান্টার-(৬\"-)', 8, 46, 50, NULL, '68379622', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-009<br></p>', 100, 23, 1, 1, '2021-01-24 17:44:27', '2021-01-26 13:41:14'),
(62, 15, 10, 12, 6, 'ইকো প্ল্যান্টার (৪\" )', 'ইকো-প্ল্যান্টার-(৪\"-)', 8, 23, 25, NULL, '24973614', NULL, NULL, NULL, '<p>ছাদ বাগান ও পরিবেশ প্রেমীদের জন্য এলো ভিন্ন ভিন্ন সাইজ এবং আকর্ষণীয় সব ডিজাইনের আধুনিক টব।যা দিয়ে আপনার বাড়ির/অফিসের ছাদে, বারান্দায় এবং বসতবাড়ির আশেপাশে ভরে তুলতে পারেন- সবুজের সমারোহে।<br></p>', '<p>Product Code: MART(MNL)-009<br></p>', 100, 23, 1, 1, '2021-01-24 17:44:30', '2021-01-26 13:41:14'),
(63, 15, 10, 12, 6, 'গ্ৰিল প্লান্টার (৪.৫\")', 'গ্ৰিল-প্লান্টার-(৪.৫\")', 10, 36, 40, NULL, '48251557', NULL, NULL, NULL, '<p>আপনি কি পরিবেশপ্রেমী?বারান্দার গ্রিল গুলোকে আকর্ষণীয় করে তুলতে চান? সতেজতার মাঝে বাঁচতে চান? আপনার জন্য‌ই আমাদের এই ছোট্ট প্রয়াস- গ্ৰিল প্লান্টার, সিটি হ্যাঙ্গিং প্লান্টার, ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার, বিপি হ্যাঙ্গিং প্লান্টার এবং নেট হ্যাঙ্গিং প্লান্টার।<br></p>', '<p>Product Code: MART(MNL)-008<br></p>', 100, 23, 1, 1, '2021-01-24 17:49:29', '2021-01-26 13:41:14'),
(64, 15, 10, 12, 6, 'গ্ৰিল প্লান্টার (৬.০\")।', 'গ্ৰিল-প্লান্টার-(৬.০\")।', 8, 55, 60, NULL, '86238577', NULL, NULL, NULL, '<p>আপনি কি পরিবেশপ্রেমী?বারান্দার গ্রিল গুলোকে আকর্ষণীয় করে তুলতে চান? সতেজতার মাঝে বাঁচতে চান? আপনার জন্য‌ই আমাদের এই ছোট্ট প্রয়াস- গ্ৰিল প্লান্টার, সিটি হ্যাঙ্গিং প্লান্টার, ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার, বিপি হ্যাঙ্গিং প্লান্টার এবং নেট হ্যাঙ্গিং প্লান্টার।<br></p>', '<p>Product Code: MART(MNL)-008<br></p>', 100, 23, 1, 1, '2021-01-24 17:50:36', '2021-01-26 13:41:14'),
(65, 15, 10, 12, 6, 'গ্ৰিল প্লান্টার (১১.৬\")', 'গ্ৰিল-প্লান্টার-(১১.৬\")', 6, 150, 160, NULL, '96923342', NULL, NULL, NULL, '<p>আপনি কি পরিবেশপ্রেমী?বারান্দার গ্রিল গুলোকে আকর্ষণীয় করে তুলতে চান? সতেজতার মাঝে বাঁচতে চান? আপনার জন্য‌ই আমাদের এই ছোট্ট প্রয়াস- গ্ৰিল প্লান্টার, সিটি হ্যাঙ্গিং প্লান্টার, ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার, বিপি হ্যাঙ্গিং প্লান্টার এবং নেট হ্যাঙ্গিং প্লান্টার।<br></p>', '<p>Product Code: MART(MNL)-008<br></p>', 100, 23, 1, 1, '2021-01-24 17:51:26', '2021-01-26 13:41:14'),
(66, 15, 10, 12, 6, 'সিটি হ্যাঙ্গিং প্লান্টার (৯\")', 'সিটি-হ্যাঙ্গিং-প্লান্টার-(৯\")', 7, 70, 75, NULL, '56943700', NULL, NULL, NULL, '<p>আপনি কি পরিবেশপ্রেমী?বারান্দার গ্রিল গুলোকে আকর্ষণীয় করে তুলতে চান? সতেজতার মাঝে বাঁচতে চান? আপনার জন্য‌ই আমাদের এই ছোট্ট প্রয়াস- গ্ৰিল প্লান্টার, সিটি হ্যাঙ্গিং প্লান্টার, ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার, বিপি হ্যাঙ্গিং প্লান্টার এবং নেট হ্যাঙ্গিং প্লান্টার।<br></p>', '<p>Product Code: MART(MNL)-008<br></p>', 100, 23, 1, 1, '2021-01-24 17:52:43', '2021-01-26 13:41:14'),
(67, 15, 10, 12, 6, 'সিটি হ্যাঙ্গিং প্লান্টার (১১\")', 'সিটি-হ্যাঙ্গিং-প্লান্টার-(১১\")', 10, 90, 100, NULL, '97365245', NULL, NULL, NULL, '<p>আপনি কি পরিবেশপ্রেমী?বারান্দার গ্রিল গুলোকে আকর্ষণীয় করে তুলতে চান? সতেজতার মাঝে বাঁচতে চান? আপনার জন্য‌ই আমাদের এই ছোট্ট প্রয়াস- গ্ৰিল প্লান্টার, সিটি হ্যাঙ্গিং প্লান্টার, ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার, বিপি হ্যাঙ্গিং প্লান্টার এবং নেট হ্যাঙ্গিং প্লান্টার।<br></p>', '<p>Product Code: MART(MNL)-008<br></p>', 100, 23, 1, 1, '2021-01-24 17:54:04', '2021-01-26 13:41:14'),
(68, 15, 10, 12, 6, 'ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার (৭.৫\")', 'ফ্লাওয়ার-হ্যাঙ্গিং-প্লান্টার-(৭.৫\")', NULL, 90, 75, NULL, '40210439', NULL, NULL, NULL, '<p>আপনি কি পরিবেশপ্রেমী?বারান্দার গ্রিল গুলোকে আকর্ষণীয় করে তুলতে চান? সতেজতার মাঝে বাঁচতে চান? আপনার জন্য‌ই আমাদের এই ছোট্ট প্রয়াস- গ্ৰিল প্লান্টার, সিটি হ্যাঙ্গিং প্লান্টার, ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার, বিপি হ্যাঙ্গিং প্লান্টার এবং নেট হ্যাঙ্গিং প্লান্টার।<br></p>', '<p>Product Code: MART(MNL)-008<br></p>', 100, 23, 1, 1, '2021-01-24 17:55:01', '2021-01-26 13:41:25'),
(69, 15, 10, 12, 6, 'ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার (৯.০\")', 'ফ্লাওয়ার-হ্যাঙ্গিং-প্লান্টার-(৯.০\")', 10, 90, 100, NULL, '47739122', NULL, NULL, NULL, '<p>আপনি কি পরিবেশপ্রেমী?বারান্দার গ্রিল গুলোকে আকর্ষণীয় করে তুলতে চান? সতেজতার মাঝে বাঁচতে চান? আপনার জন্য‌ই আমাদের এই ছোট্ট প্রয়াস- গ্ৰিল প্লান্টার, সিটি হ্যাঙ্গিং প্লান্টার, ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার, বিপি হ্যাঙ্গিং প্লান্টার এবং নেট হ্যাঙ্গিং প্লান্টার।<br></p>', '<p>Product Code: MART(MNL)-008<br></p>', 100, 23, 1, 1, '2021-01-24 17:55:56', '2021-01-26 13:41:25'),
(70, 15, 10, 12, 6, 'বিপি হ্যাঙ্গিং প্লান্টার (৭\")', 'বিপি-হ্যাঙ্গিং-প্লান্টার-(৭\")', 20, 40, 50, NULL, '82079114', NULL, NULL, NULL, '<p>আপনি কি পরিবেশপ্রেমী?বারান্দার গ্রিল গুলোকে আকর্ষণীয় করে তুলতে চান? সতেজতার মাঝে বাঁচতে চান? আপনার জন্য‌ই আমাদের এই ছোট্ট প্রয়াস- গ্ৰিল প্লান্টার, সিটি হ্যাঙ্গিং প্লান্টার, ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার, বিপি হ্যাঙ্গিং প্লান্টার এবং নেট হ্যাঙ্গিং প্লান্টার।<br></p>', '<p>Product Code: MART(MNL)-008<br></p>', 100, 23, 1, 1, '2021-01-24 17:56:48', '2021-01-26 13:41:25'),
(71, 15, 10, 12, 6, 'বিপি হ্যাঙ্গিং প্লান্টার ( ৮\" )', 'বিপি-হ্যাঙ্গিং-প্লান্টার-(-৮\"-)', 14, 60, 70, NULL, '52739161', NULL, NULL, NULL, '<p>আপনি কি পরিবেশপ্রেমী?বারান্দার গ্রিল গুলোকে আকর্ষণীয় করে তুলতে চান? সতেজতার মাঝে বাঁচতে চান? আপনার জন্য‌ই আমাদের এই ছোট্ট প্রয়াস- গ্ৰিল প্লান্টার, সিটি হ্যাঙ্গিং প্লান্টার, ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার, বিপি হ্যাঙ্গিং প্লান্টার এবং নেট হ্যাঙ্গিং প্লান্টার।<br></p>', '<p>Product Code: MART(MNL)-008<br></p>', 200, 23, 1, 1, '2021-01-24 17:58:40', '2021-01-26 13:41:25'),
(72, 15, 10, 12, 6, 'বিপি হ্যাঙ্গিং প্লান্টার ( ৮\" )', 'বিপি-হ্যাঙ্গিং-প্লান্টার-(-৮\"-)', 14, 60, 70, NULL, '16270316', NULL, NULL, NULL, '<p>আপনি কি পরিবেশপ্রেমী?বারান্দার গ্রিল গুলোকে আকর্ষণীয় করে তুলতে চান? সতেজতার মাঝে বাঁচতে চান? আপনার জন্য‌ই আমাদের এই ছোট্ট প্রয়াস- গ্ৰিল প্লান্টার, সিটি হ্যাঙ্গিং প্লান্টার, ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার, বিপি হ্যাঙ্গিং প্লান্টার এবং নেট হ্যাঙ্গিং প্লান্টার।<br></p>', '<p>Product Code: MART(MNL)-008<br></p>', 200, 23, 1, 1, '2021-01-24 17:59:15', '2021-01-26 13:41:25'),
(73, 15, 10, 12, 6, 'নেট হ্যাঙ্গিং প্লান্টার', 'নেট-হ্যাঙ্গিং-প্লান্টার', 14, 60, 70, NULL, '54297538', NULL, NULL, NULL, '<p>আপনি কি পরিবেশপ্রেমী?বারান্দার গ্রিল গুলোকে আকর্ষণীয় করে তুলতে চান? সতেজতার মাঝে বাঁচতে চান? আপনার জন্য‌ই আমাদের এই ছোট্ট প্রয়াস- গ্ৰিল প্লান্টার, সিটি হ্যাঙ্গিং প্লান্টার, ফ্লাওয়ার হ্যাঙ্গিং প্লান্টার, বিপি হ্যাঙ্গিং প্লান্টার এবং নেট হ্যাঙ্গিং প্লান্টার।<br></p>', '<p>Product Code: MART(MNL)-008<br></p>', 500, 23, 1, 1, '2021-01-24 18:00:35', '2021-01-26 13:41:25'),
(74, 15, 10, 12, 6, 'প্লান্টার টব ১৩\" সাইজের', 'প্লান্টার-টব-১৩\"-সাইজের', 10, 126, 140, NULL, '54416304', NULL, NULL, NULL, '<p>পরিবেশপ্রেমী ও শখের বাগানিদের জন্য এলো বিভিন্ন সাইজের আকর্ষণীয় সব প্লান্টার টব ( কালো )।<br></p>', '<p>Product Code: MART(MNL)-007<br></p>', 100, 23, 1, 1, '2021-01-24 18:06:42', '2021-01-26 13:41:25'),
(75, 15, 10, 12, 6, 'প্লান্টার টব ১১\" সাইজের', 'প্লান্টার-টব-১১\"-সাইজের', 10, 72, 80, NULL, '84489009', NULL, NULL, NULL, '<p>পরিবেশপ্রেমী ও শখের বাগানিদের জন্য এলো বিভিন্ন সাইজের আকর্ষণীয় সব প্লান্টার টব ( কালো )।<br></p>', '<p>Product Code: MART(MNL)-007<br></p>', 100, 23, 1, 1, '2021-01-24 18:06:44', '2021-01-26 13:41:25'),
(76, 15, 10, 12, 6, 'প্লান্টার টব  ৯\" সাইজের মুল্য', 'প্লান্টার-টব-৯\"-সাইজের-মুল্য', 17, 50, 60, NULL, '92047136', NULL, NULL, NULL, '<p>পরিবেশপ্রেমী ও শখের বাগানিদের জন্য এলো বিভিন্ন সাইজের আকর্ষণীয় সব প্লান্টার টব ( কালো )।<br></p>', '<p>Product Code: MART(MNL)-007<br></p>', 100, 23, 1, 1, '2021-01-24 18:06:45', '2021-01-26 13:41:25'),
(77, 15, 10, 12, 6, 'প্লান্টার টব  ৭\" সাইজের', 'প্লান্টার-টব-৭\"-সাইজের', 13, 26, 30, NULL, '22299679', NULL, NULL, NULL, '<p>পরিবেশপ্রেমী ও শখের বাগানিদের জন্য এলো বিভিন্ন সাইজের আকর্ষণীয় সব প্লান্টার টব ( কালো )।<br></p>', '<p>Product Code: MART(MNL)-007<br></p>', 100, 23, 1, 1, '2021-01-24 18:06:47', '2021-01-26 13:41:25'),
(78, 15, 10, 12, 6, 'প্লান্টার টব ৫\" সাইজের', 'প্লান্টার-টব-৫\"-সাইজের', 20, 12, 15, NULL, '75967973', NULL, NULL, NULL, '<p>পরিবেশপ্রেমী ও শখের বাগানিদের জন্য এলো বিভিন্ন সাইজের আকর্ষণীয় সব প্লান্টার টব ( কালো )।<br></p>', '<p>Product Code: MART(MNL)-007<br></p>', 100, 23, 1, 1, '2021-01-24 18:06:48', '2021-01-28 16:55:02'),
(79, 8, 8, 13, 6, 'valentine day', 'valentine-day', 13, 2600, 3000, NULL, '65930488', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-006<br></p>', 100, 23, 1, 1, '2021-01-26 17:46:41', '2021-01-28 16:55:02'),
(80, 8, 8, 13, 6, 'valentine day', 'valentine-day', 13, 2600, 3000, NULL, '81830228', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-006<br></p>', 100, 23, 1, 1, '2021-01-26 17:46:46', '2021-01-28 16:55:02'),
(81, 8, 8, 0, 0, 'valentine day', 'valentine-day', 13, 2600, 3000, NULL, '50913989', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-006<br></p>', 100, 23, 1, 1, '2021-01-26 17:46:49', '2021-01-28 16:55:02'),
(82, 8, 8, 13, 6, 'valentine day', 'valentine-day', 13, 2600, 3000, NULL, '73410544', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-006<br></p>', 100, 23, 1, 1, '2021-01-26 17:48:03', '2021-01-28 16:55:02'),
(83, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 11, 2220, 2500, NULL, '49165433', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Check print)<br></p>', '<p>Product Code: MART(SLP)-005<br></p>', 100, 23, 1, 1, '2021-01-26 17:55:23', '2021-01-28 16:55:02'),
(84, 8, 8, 10, 0, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 11, 2220, 2500, NULL, '37814947', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Check print)<br></p>', '<p>Product Code: MART(SLP)-005<br></p>', 100, 23, 1, 1, '2021-01-26 17:55:24', '2021-01-28 16:55:02'),
(85, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 11, 2220, 2500, NULL, '70266313', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Check print)<br></p>', '<p>Product Code: MART(SLP)-005<br></p>', 100, 23, 1, 1, '2021-01-26 17:55:26', '2021-01-28 16:55:02'),
(86, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 11, 2220, 2500, NULL, '59861610', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Check print)<br></p>', '<p>Product Code: MART(SLP)-005<br></p>', 100, 23, 1, 1, '2021-01-26 17:55:28', '2021-01-28 16:55:02'),
(87, 8, 8, 10, 6, '**পহেলা ফাল্গুন***valentine day**', '**পহেলা-ফাল্গুন***valentine-day**', 13, 2600, 3000, NULL, '85165254', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-004<br></p>', 200, 23, 1, 1, '2021-01-26 18:04:07', '2021-01-28 16:55:02'),
(88, 8, 8, 10, 6, '**পহেলা ফাল্গুন***valentine day**', '**পহেলা-ফাল্গুন***valentine-day**', 13, 2600, 3000, NULL, '17590885', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-004<br></p>', 200, 23, 1, 1, '2021-01-26 18:05:34', '2021-01-28 16:55:12'),
(89, 8, 8, 10, 6, '**পহেলা ফাল্গুন***valentine day**', '**পহেলা-ফাল্গুন***valentine-day**', 13, 2600, 3000, NULL, '32908527', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-004<br></p>', 200, 23, 1, 1, '2021-01-26 18:05:46', '2021-01-28 16:55:12'),
(90, 8, 8, 10, 6, '**পহেলা ফাল্গুন***valentine day**', '**পহেলা-ফাল্গুন***valentine-day**', 13, 2600, 3000, NULL, '47434367', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-004<br></p>', 200, 23, 1, 1, '2021-01-26 18:05:56', '2021-01-28 16:55:12'),
(91, 8, 8, 10, 0, '**পহেলা ফাল্গুন***valentine day**', '**পহেলা-ফাল্গুন***valentine-day**', 13, 2600, 3000, NULL, '88142321', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-004<br></p>', 200, 23, 1, 1, '2021-01-26 18:06:02', '2021-01-28 16:55:12'),
(92, 8, 8, 10, 6, '**পহেলা ফাল্গুন***valentine day**', '**পহেলা-ফাল্গুন***valentine-day**', 13, 2600, 3000, NULL, '73577461', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-004<br></p>', 200, 23, 1, 1, '2021-01-26 18:06:19', '2021-01-28 16:55:12'),
(93, 8, 8, 10, 6, '**পহেলা ফাল্গুন***valentine day**', '**পহেলা-ফাল্গুন***valentine-day**', 13, 2600, 3000, NULL, '79073655', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-004<br></p>', 200, 23, 1, 1, '2021-01-26 18:06:20', '2021-01-28 16:55:12'),
(94, 8, 8, 10, 6, '**পহেলা ফাল্গুন***valentine day**half silk couple dress (skin print/block print)', '**পহেলা-ফাল্গুন***valentine-day**half-silk-couple-dress-(skin-print/block-print)', 13, 2600, 3000, NULL, '15913347', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Skin print/Block print)<br></p>', '<p>Product Code: MART(SLP)-004<br></p>', 200, 23, 1, 1, '2021-01-26 18:06:22', '2021-01-28 16:55:12'),
(95, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 8, 2760, 3000, NULL, '35900018', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Hand Print)<br></p>', '<p>Product Code: MART(SLP)-003<br></p>', 500, 23, 1, 1, '2021-01-26 18:09:19', '2021-01-28 16:55:12'),
(96, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 8, 2760, 3000, NULL, '70548696', NULL, NULL, NULL, '<p>Half Silk Couple Dress (Hand Print)<br></p>', '<p>Product Code: MART(SLP)-003<br></p>', 500, 23, 1, 1, '2021-01-26 18:09:19', '2021-01-28 16:55:12'),
(97, 8, 8, 10, 6, '**পহেলা ফাল্গুন***', '**পহেলা-ফাল্গুন***', 8, 2760, 3000, NULL, NULL, NULL, NULL, NULL, '<p>Half Silk Couple Dress (Hand Print)<br></p>', '<p>Product Code: MART(SLP)-003<br></p>', 500, 23, 1, 1, '2021-01-26 18:09:22', '2021-02-01 12:02:59'),
(98, 8, 11, 14, 6, 'pakistani bridal set', 'pakistani-bridal-set', 5, 4999, 5250, NULL, '28374466', NULL, NULL, NULL, 'Pakistani bridal set<br><p>need to Taking pre order </p><p>Estimated time delevery : 10-20 days<br></p>', '<p>Product Code: MART(LVL)-007<br></p>', 100, 23, 1, 1, '2021-01-29 03:23:04', '2021-01-30 05:08:41'),
(99, 8, 11, 14, 6, 'pakistani hyderabadi traditional cutwork or katai jewellery set bridal set', 'pakistani-hyderabadi-traditional-cutwork-or-katai-jewellery-set-bridal-set', 14, 2999, 3500, NULL, NULL, NULL, NULL, NULL, '<p>Pakistani Hyderabadi traditional cutwork or katai jewellery set<br>Bridal set Pearl and beads made jewellery <br></p>Need toTaking pre order ', '<p>Product Code: MART(LVL)-006<br></p>', 100, 23, 1, 1, '2021-01-29 03:30:57', '2021-02-01 12:02:59'),
(100, 8, 11, 14, 6, 'pakistani hyderabadi traditional cutwork or katai jewellery set bridal set', 'pakistani-hyderabadi-traditional-cutwork-or-katai-jewellery-set-bridal-set', 0, 2999, 3000, NULL, '48078651', NULL, NULL, NULL, '<p>Pakistani Hyderabadi traditional cutwork or katai jewellery set<br>Bridal set<br>Pearl and beads made jewellery <br>Need to Taking pre order&nbsp;<br></p>', '<p>Product Code: MART(LVL)-006<br></p>', 100, 23, 1, 1, '2021-01-29 03:37:05', '2021-01-30 05:08:41'),
(101, 8, 11, 14, 6, 'pakistani hyderabadi traditional cutwork or katai jewellery set bridal set', 'pakistani-hyderabadi-traditional-cutwork-or-katai-jewellery-set-bridal-set', 0, 2999, 3000, NULL, '69651406', NULL, NULL, NULL, '<p>Pakistani Hyderabadi traditional cutwork or katai jewellery set<br>Bridal set<br>Pearl and beads made jewellery <br>Need to Taking pre order&nbsp;<br></p>', '<p>Product Code: MART(LVL)-006<br></p>', 100, 23, 1, 1, '2021-01-29 03:37:06', '2021-01-30 05:08:41'),
(102, 8, 11, 14, 6, 'pakistani hyderabadi traditional cutwork or katai jewellery set bridal set', 'pakistani-hyderabadi-traditional-cutwork-or-katai-jewellery-set-bridal-set', 0, 2999, 3000, NULL, '58165435', NULL, NULL, NULL, '<p>Pakistani Hyderabadi traditional cutwork or katai jewellery set<br>Bridal set<br>Pearl and beads made jewellery&nbsp;<br>Need to Taking pre order&nbsp;<br></p>', '<p>Product Code: MART(LVL)-006<br></p>', 100, 23, 1, 1, '2021-01-29 03:37:08', '2021-01-30 05:08:41'),
(103, 8, 11, 14, 6, 'pakistani hyderabadi traditional cutwork or katai jewellery set bridal set', 'pakistani-hyderabadi-traditional-cutwork-or-katai-jewellery-set-bridal-set', 0, 2999, 3000, NULL, '24107523', NULL, NULL, NULL, '<p>Pakistani Hyderabadi traditional cutwork or katai jewellery set<br>Bridal set<br>Pearl and beads made jewellery <br>Need to Taking pre order&nbsp;<br></p>', '<p>Product Code: MART(LVL)-006<br></p>', 100, 23, 1, 1, '2021-01-29 03:37:10', '2021-01-30 05:08:41'),
(104, 8, 11, 14, 6, 'pakistani hyderabadi traditional cutwork or katai jewellery set bridal set', 'pakistani-hyderabadi-traditional-cutwork-or-katai-jewellery-set-bridal-set', 0, 2999, 3000, NULL, '87879204', NULL, NULL, NULL, '<p>akistani Hyderabadi traditional cutwork or katai jewellery set😍<br>Bridal set<br>Pearl and beads made jewellery</p><p>need to&nbsp;Taking pre order </p>', '<p>Product Code: MART(LVL)-006<br></p>', 100, 23, 1, 1, '2021-01-29 03:38:58', '2021-01-30 05:08:41'),
(105, 8, 11, 14, 6, 'egyptian jewellery long mala set', 'egyptian-jewellery-long-mala-set', 3, 2899, 3000, NULL, '17090597', NULL, NULL, NULL, '<p>Egyptian jewellery long mala set<br>Real Stone made<br>Need to Taking pre order<br></p>', '<p>Product Code: MART(LVL)-005<br></p>', 500, 23, 1, 1, '2021-01-29 03:47:52', '2021-01-30 05:08:41'),
(106, 8, 11, 14, 6, 'egyptian jewellery long mala set', 'egyptian-jewellery-long-mala-set', 3, 2899, 3000, NULL, '94559114', NULL, NULL, NULL, '<p>Egyptian jewellery long mala set<br>Real Stone made<br>Need to Taking pre order<br></p>', '<p>Product Code: MART(LVL)-005<br></p>', 3000, 23, 1, 1, '2021-01-29 03:47:56', '2021-01-30 05:08:41'),
(107, 8, 11, 14, 6, 'egyptian jewellery long mala set', 'egyptian-jewellery-long-mala-set', 3, 2899, 3000, NULL, '26510708', NULL, NULL, NULL, '<p>Egyptian jewellery long mala set<br>Real Stone made<br>Need to Taking pre order<br></p>', '<p>Product Code: MART(LVL)-005<br></p>', 3000, 23, 1, 1, '2021-01-29 03:47:58', '2021-01-30 05:08:41'),
(108, 8, 11, 14, 6, 'meenakari and kundan stone pakistani jewellery set', 'meenakari-and-kundan-stone-pakistani-jewellery-set', 8, 2299, 2500, NULL, '38875828', NULL, NULL, NULL, '<p>meenakari and kundan stone Pakistani jewellery set<br>Neckpiece, earrings, tikli and finger ring set <br>Taking pre order <br> estimated delivery time 15-20 days<br></p>', '<p>Product code: MART(LVL)-004<br></p>', 100, 23, 1, 1, '2021-01-29 04:29:29', '2021-01-30 05:08:41'),
(109, 8, 11, 14, 0, 'meenakari and kundan stone pakistani jewellery set', 'meenakari-and-kundan-stone-pakistani-jewellery-set', 8, 2299, 2500, NULL, '20280797', NULL, NULL, NULL, '<p>meenakari and kundan stone Pakistani jewellery set<br>Neckpiece, earrings, tikli and finger ring set <br>Taking pre order <br> estimated delivery time 15-20 days<br></p>', '<p>Product code: MART(LVL)-004<br></p>', 100, 23, 1, 1, '2021-01-29 04:29:32', '2021-01-30 05:08:41'),
(110, 8, 11, 14, 6, 'meenakari and kundan stone pakistani jewellery set', 'meenakari-and-kundan-stone-pakistani-jewellery-set', 8, 2299, 2500, NULL, '39863584', NULL, NULL, NULL, '<p>meenakari and kundan stone Pakistani jewellery set<br>Neckpiece, earrings, tikli and finger ring set <br>Taking pre order <br> estimated delivery time 15-20 days<br></p>', '<p>Product code: MART(LVL)-004<br></p>', 100, 23, 1, 1, '2021-01-29 04:29:34', '2021-01-30 05:08:41'),
(111, 8, 11, 14, 6, 'meenakari and kundan stone pakistani jewellery set', 'meenakari-and-kundan-stone-pakistani-jewellery-set', 8, 2299, 2500, NULL, '87969129', NULL, NULL, NULL, '<p>meenakari and kundan stone Pakistani jewellery set<br>Neckpiece, earrings, tikli and finger ring set <br>Taking pre order <br> estimated delivery time 15-20 days<br></p>', '<p>Product code: MART(LVL)-004<br></p>', 100, 23, 1, 1, '2021-01-29 04:29:40', '2021-01-30 05:08:41'),
(112, 8, 11, 14, 6, 'meenakari and kundan stone pakistani jewellery set', 'meenakari-and-kundan-stone-pakistani-jewellery-set', 8, 2299, 2500, NULL, '17198172', NULL, NULL, NULL, '<p>meenakari and kundan stone Pakistani jewellery set<br>Neckpiece, earrings, tikli and finger ring set <br>Taking pre order <br> estimated delivery time 15-20 days<br></p>', '<p>Product code: MART(LVL)-004<br></p>', 100, 23, 1, 1, '2021-01-29 04:29:43', '2021-01-30 05:08:41'),
(113, 8, 11, 14, 6, 'meenakari and kundan stone pakistani jewellery set', 'meenakari-and-kundan-stone-pakistani-jewellery-set', 8, 2299, 2500, NULL, '84762963', NULL, NULL, NULL, '<p>meenakari and kundan stone Pakistani jewellery set<br>Neckpiece, earrings, tikli and finger ring set <br>Taking pre order <br> estimated delivery time 15-20 days<br></p>', '<p>Product code: MART(LVL)-004<br></p>', 100, 23, 1, 1, '2021-01-29 04:29:45', '2021-01-30 05:08:41'),
(114, 8, 11, 14, 6, 'meenakari and kundan stone pakistani jewellery set', 'meenakari-and-kundan-stone-pakistani-jewellery-set', 8, 2299, 2500, NULL, '47260558', NULL, NULL, NULL, '<p>meenakari and kundan stone Pakistani jewellery set<br>Neckpiece, earrings, tikli and finger ring set&nbsp;<br>Taking pre order&nbsp;<br>&nbsp;estimated delivery time 15-20 days<br></p>', '<p>Product code: MART(LVL)-004<br></p>', 100, 23, 1, 1, '2021-01-29 04:29:47', '2021-01-30 05:08:41'),
(115, 8, 11, 14, 6, 'meenakari and kundan stone pakistani jewellery set', 'meenakari-and-kundan-stone-pakistani-jewellery-set', 8, 2299, 2500, NULL, '20454465', NULL, NULL, NULL, '<p>meenakari and kundan stone Pakistani jewellery set<br>Neckpiece, earrings, tikli and finger ring set <br>Taking pre order <br> estimated delivery time 15-20 days<br></p>', '<p>Product code: MART(LVL)-004<br></p>', 100, 23, 1, 1, '2021-01-29 04:29:55', '2021-01-30 05:08:41'),
(116, 9, 12, 15, NULL, 'men’s kabli dress', 'men’s-kabli-dress', 6, 2350, 2500, NULL, NULL, NULL, NULL, NULL, '<p>Men’s Kabli Dress (2 pcs set)<br>Fabric/Material: Cotton/Tensile (Ultra comfort)<br>Size: 40, 42, 44<br>Colour: Black, Navy<br>Stock: Available<br></p>', '<p>Product Code: MART(AL)-008<br></p>', 2000, 23, 1, 1, '2021-01-29 05:46:32', '2021-02-01 12:02:59'),
(117, 8, 8, 16, 6, 'silk katan sharee', 'silk-katan-sharee', 15, 1700, 2000, NULL, '97475707', NULL, NULL, NULL, '<p>Silk Katan Sharee<br></p>', '<p>Product Code: MART(SLP)-00<br></p>', 2000, 23, 1, 1, '2021-01-29 05:53:05', '2021-01-30 05:08:41'),
(118, 8, 13, 17, 6, 'unstreach three pice', 'unstreach-three-pice', 11, 1600, 1800, NULL, NULL, NULL, NULL, NULL, '<p>Half silk jamdani<br></p>', '<p>Product Code: MART(SLP)-001<br></p>', 2001, 23, 1, 1, '2021-01-29 06:19:07', '2021-02-01 12:02:59'),
(119, 8, 13, 17, 6, 'unstreach three pice', 'unstreach-three-pice', 11, 1600, 1800, NULL, NULL, NULL, NULL, NULL, '<p>Half silk jamdani<br></p>', '<p>Product Code: MART(SLP)-001<br></p>', 992, 23, 1, 1, '2021-01-29 06:29:23', '2021-02-01 12:02:59'),
(120, 7, 14, 18, 6, 'valentine day', 'valentine-day', 12, 700, 800, NULL, NULL, NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)<br></p>', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 08:58:06', '2021-02-01 12:02:59'),
(121, 7, 14, 18, 6, 'valentine day', 'valentine-day', 12, 700, 800, NULL, NULL, NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)<br></p>', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 08:58:07', '2021-02-01 12:02:59'),
(122, 7, 14, 18, 6, 'valentine day t-shirt', 'valentine-day-t-shirt', 6, 375, 400, NULL, NULL, NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)<br></p>', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 08:58:49', '2021-02-01 12:02:59'),
(123, 7, 14, 18, 6, 'valentine day t-shirt', 'valentine-day-t-shirt', 6, 375, 400, NULL, NULL, NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)<br></p>', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 08:59:06', '2021-02-01 12:02:59'),
(124, 7, 14, 18, NULL, 'valentine day t-shirt', 'valentine-day-t-shirt', 6, 375, 400, NULL, NULL, NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br></p>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 08:59:27', '2021-02-01 12:02:59'),
(125, 7, 14, 18, 6, 'valentine day t-shirt', 'valentine-day-t-shirt', 6, 375, 400, NULL, '68602511', NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)<br></p>', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 08:59:48', '2021-02-01 12:01:08'),
(126, 7, 14, 18, 6, 'valentine day t-shirt', 'valentine-day-t-shirt', 6, 375, 400, NULL, NULL, NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)<br></p>', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 09:00:05', '2021-02-01 12:04:58'),
(127, 7, 14, 18, 6, 'valentine day t-shirt', 'valentine-day-t-shirt', 6, 375, 400, NULL, NULL, NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)<br></p>', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 09:00:19', '2021-02-01 12:04:58'),
(128, 7, 14, 18, 6, 'valentine day t-shirt', 'valentine-day-t-shirt', 6, 375, 400, NULL, NULL, NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)<br></p>', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 09:00:34', '2021-02-01 12:04:58'),
(129, 7, 14, 18, 6, 'valentine day t-shirt', 'valentine-day-t-shirt', 6, 375, 400, NULL, NULL, NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)<br></p>', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 09:00:46', '2021-02-01 12:04:58'),
(130, 7, 14, 18, 6, 'valentine day t-shirt', 'valentine-day-t-shirt', 6, 375, 400, NULL, NULL, NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)<br></p>', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 09:00:58', '2021-02-01 12:04:58'),
(131, 7, 14, 18, 6, 'valentine day t-shirt', 'valentine-day-t-shirt', 6, 375, 400, NULL, NULL, NULL, NULL, NULL, '<p>❤️Item: Couple T-Shirt<br>❤️Fabric: 100% cotton<br>❤️Description: Chest printed Crew/Round Neck Tee Shirt.<br>❤️Color : White 🤍 / Black 🖤<br>❤️Size: M,L,XL (Asian measurement)<br></p>', '<p>আসছে ১৪ই ফেব্রুইয়ারি ২০২১।<br>  ❤️❤️\"Valentine\'s Day\"❤️❤️<br>তথা ভালোবাসা দিবস কে স্মরণীয় করে রাখতে ভালোবাসার মানুষদের জন্য আমরা নিয়ে এসেছি আপনার মনের কথা বলার পোশাক।<br></p>', 1000, 23, 1, 1, '2021-01-31 09:01:12', '2021-02-01 12:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `productsizes`
--

CREATE TABLE `productsizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productsizes`
--

INSERT INTO `productsizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 15, 1, '2020-09-14 06:27:18', '2020-09-14 06:27:18'),
(2, 15, 2, '2020-09-14 06:27:18', '2020-09-14 06:27:18'),
(3, 16, 1, '2020-09-14 06:36:50', '2020-09-14 06:36:50'),
(4, 17, 1, '2020-09-14 06:46:54', '2020-09-14 06:46:54'),
(5, 18, 1, '2020-09-15 05:03:34', '2020-09-15 05:03:34'),
(6, 18, 2, '2020-09-15 05:03:34', '2020-09-15 05:03:34'),
(7, 19, 1, '2020-09-26 10:01:30', '2020-09-26 10:01:30'),
(8, 19, 2, '2020-09-26 10:01:30', '2020-09-26 10:01:30'),
(9, 20, 2, '2020-10-04 06:50:06', '2020-10-04 06:50:06'),
(10, 12, 1, '2020-10-04 09:37:33', '2020-10-04 09:37:33'),
(11, 22, 1, '2020-12-26 08:44:22', '2020-12-26 08:44:22'),
(12, 22, 3, '2020-12-26 08:44:22', '2020-12-26 08:44:22'),
(13, 24, 1, '2021-01-05 07:49:32', '2021-01-05 07:49:32'),
(14, 24, 3, '2021-01-05 07:49:32', '2021-01-05 07:49:32'),
(15, 116, 6, '2021-01-29 05:46:55', '2021-01-29 05:46:55'),
(16, 116, 7, '2021-01-29 05:46:55', '2021-01-29 05:46:55'),
(17, 116, 8, '2021-01-29 05:46:55', '2021-01-29 05:46:55'),
(18, 131, 1, '2021-01-31 09:03:03', '2021-01-31 09:03:03'),
(19, 131, 9, '2021-01-31 09:03:03', '2021-01-31 09:03:03'),
(20, 131, 10, '2021-01-31 09:03:03', '2021-01-31 09:03:03'),
(21, 130, 1, '2021-01-31 09:03:17', '2021-01-31 09:03:17'),
(22, 130, 9, '2021-01-31 09:03:17', '2021-01-31 09:03:17'),
(23, 130, 10, '2021-01-31 09:03:17', '2021-01-31 09:03:17'),
(24, 129, 1, '2021-01-31 09:03:31', '2021-01-31 09:03:31'),
(25, 129, 9, '2021-01-31 09:03:31', '2021-01-31 09:03:31'),
(26, 129, 10, '2021-01-31 09:03:31', '2021-01-31 09:03:31'),
(27, 128, 1, '2021-01-31 09:03:45', '2021-01-31 09:03:45'),
(28, 128, 9, '2021-01-31 09:03:45', '2021-01-31 09:03:45'),
(29, 128, 10, '2021-01-31 09:03:45', '2021-01-31 09:03:45'),
(30, 127, 1, '2021-01-31 09:03:58', '2021-01-31 09:03:58'),
(31, 127, 9, '2021-01-31 09:03:58', '2021-01-31 09:03:58'),
(32, 127, 10, '2021-01-31 09:03:58', '2021-01-31 09:03:58'),
(33, 126, 1, '2021-01-31 09:04:13', '2021-01-31 09:04:13'),
(34, 126, 9, '2021-01-31 09:04:13', '2021-01-31 09:04:13'),
(35, 126, 10, '2021-01-31 09:04:13', '2021-01-31 09:04:13'),
(36, 124, 1, '2021-01-31 09:04:37', '2021-01-31 09:04:37'),
(37, 124, 9, '2021-01-31 09:04:37', '2021-01-31 09:04:37'),
(38, 124, 10, '2021-01-31 09:04:37', '2021-01-31 09:04:37'),
(39, 123, 1, '2021-01-31 09:04:50', '2021-01-31 09:04:50'),
(40, 123, 9, '2021-01-31 09:04:50', '2021-01-31 09:04:50'),
(41, 123, 10, '2021-01-31 09:04:50', '2021-01-31 09:04:50'),
(42, 120, 1, '2021-01-31 09:05:06', '2021-01-31 09:05:06'),
(43, 120, 9, '2021-01-31 09:05:06', '2021-01-31 09:05:06'),
(44, 120, 10, '2021-01-31 09:05:06', '2021-01-31 09:05:06'),
(45, 121, 1, '2021-01-31 09:05:19', '2021-01-31 09:05:19'),
(46, 121, 9, '2021-01-31 09:05:19', '2021-01-31 09:05:19'),
(47, 121, 10, '2021-01-31 09:05:19', '2021-01-31 09:05:19'),
(48, 122, 1, '2021-01-31 09:05:32', '2021-01-31 09:05:32'),
(49, 122, 9, '2021-01-31 09:05:32', '2021-01-31 09:05:32'),
(50, 122, 10, '2021-01-31 09:05:32', '2021-01-31 09:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `producttags`
--

CREATE TABLE `producttags` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ratting` tinyint(4) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `user_role`, `created_at`, `updated_at`) VALUES
(1, 'Super admin', NULL, NULL),
(2, 'Admin', NULL, NULL),
(3, 'Editor', NULL, NULL),
(4, 'Author', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(10) UNSIGNED NOT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shoplogo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public/uploads/shoplogo/default.png',
  `shopbanner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public/uploads/shopbanner/default.jpg',
  `sellerphone` int(11) NOT NULL,
  `sellerphone2` int(11) DEFAULT NULL,
  `selleremail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contperson` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sellercash` int(11) DEFAULT NULL,
  `sellerwithdraw` int(11) DEFAULT NULL,
  `selleraddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sellerwebsite` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sellerbankaccount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sellerbankname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sellerbankbranch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sellerroutingno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publishproduct` tinyint(4) DEFAULT NULL,
  `commisiontype` tinyint(4) DEFAULT NULL,
  `commision` int(11) DEFAULT NULL,
  `featurevandor` tinyint(4) DEFAULT NULL,
  `agree` tinyint(4) NOT NULL,
  `verify` int(11) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forgetcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `shopname`, `slug`, `shoplogo`, `shopbanner`, `sellerphone`, `sellerphone2`, `selleremail`, `contperson`, `sellercash`, `sellerwithdraw`, `selleraddress`, `sellerwebsite`, `sellerbankaccount`, `sellerbankname`, `sellerbankbranch`, `sellerroutingno`, `publishproduct`, `commisiontype`, `commision`, `featurevandor`, `agree`, `verify`, `password`, `forgetcode`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Madhurjo', 'madhurjo', 'public/uploads/shoplogo/1607223352-Madhurjo(T).png', 'public/uploads/shopbanner/default.jpg', 1313920510, 1313176868, 'madhurjo2020@gmail.com', 'Razia Sultana', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '$2y$10$p2Hwxngx9XpJ1wXNdAG1luJjV2W33aCV8PDJ.2P9WVjxtMqzz7Tva', '936919', 1, '2020-12-06 02:00:22', '2020-12-29 17:51:54'),
(23, 'mart9294mall', 'mart9294mall', 'public/uploads/shoplogo/1611415947-Sprint-logo-design-Codesign-agency.png', 'public/uploads/shopbanner/1611415947-108470663_185595202916437_3494193791445270395_o.jpg', 1775016964, 1775016964, 'shop@mart9294.com', 'mart 9294', NULL, NULL, NULL, 'N/A', '25012 11045 2012 852', 'dbbl', 'kolabagan', 'Dhanmondi', NULL, NULL, NULL, NULL, 1, 1, '$2y$10$.nTiwppSaa.r3VVS5ZPwUu1ynVfnl6xUxZoVJuol0LhNdmyiNgeti', NULL, 1, '2021-01-23 15:29:18', '2021-02-22 08:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `shippingfees`
--

CREATE TABLE `shippingfees` (
  `id` int(10) UNSIGNED NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stateaddress` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `houseaddress` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fulladdress` varchar(155) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `name`, `phone`, `district`, `area`, `stateaddress`, `customerid`, `houseaddress`, `fulladdress`, `zipcode`, `created_at`, `updated_at`) VALUES
(1, 'Md. Zadu Mia', '01742892725', '1', '1', '4/A', '1', '55/A', '55/A', '1209', '2020-08-29 11:34:19', '2020-08-29 11:34:19'),
(2, 'shakir ahmed', '01740125203', '1', '1', 'mirpur 1', '2', '2321', 'mirpur 1', '1216', '2020-09-14 09:42:12', '2020-09-14 09:42:12'),
(3, 'nayem', '01775016964', '1', '1', 'afsdf afasfasf', '3', 'afsafa sdgd', 'sdfdhs', '1209', '2020-09-15 05:52:11', '2020-09-15 05:52:11'),
(4, 'test laravl', '01775016964', '1', '1', '#8 mitali road Dhanmondi dhaka', '4', '2/1dhnmondi', '#8 mitali road Dhanmondi dhaka', '1209', '2020-09-26 10:12:47', '2020-09-26 10:12:47'),
(5, 'Nayem Ahamed Ahamed', '01775016964', '1', '1', '#8 mitali road Dhanmondi dhaka', '6', 'mitali road', '#8 mitali road Dhanmondi dhaka', '1209', '2020-10-04 06:15:00', '2020-10-04 06:15:00'),
(6, 'Nayem Ahamed Ahamed', '01775016964', '1', '1', '#8 mitali road Dhanmondi dhaka', '7', 'e8', '#8 mitali road Dhanmondi dhaka', '1209', '2020-10-04 06:57:26', '2020-10-04 06:57:26'),
(7, 'Sheikh Maqsud Ahmed', '01313176868', '1', '1', NULL, '8', 'H#44/A R#8 Shekhertak', 'Near Khondkar Medicine House', '1207', '2021-01-04 18:07:18', '2021-01-25 18:32:01'),
(8, 'Nayem Ahamed', '01775016964', '1', '1', 'rod 11/a house 19 dhanmondi dhaka', '24', 'GTDFGFD 50-  85 85', 'rod 10/a house 19 dhanmondi dhaka', '1209', '2021-01-05 07:52:55', '2021-01-05 07:52:55'),
(9, 'nayem ahamed', '01775016964', '1', '1', '1', '29', '2', '4', '3', '2021-01-08 09:39:58', '2021-01-08 09:39:58'),
(10, 'Md. Zadu Mia', '01742892726', '1', '1', NULL, '25', 'Dhanmondi 32', NULL, '1209', '2021-01-09 05:18:47', '2021-01-09 05:51:55'),
(11, 'Nirjon Roy', '01774865115', '1', '1', 'ds', '31', 'sdf', 'sdaf', 'dsfa', '2021-02-18 13:58:14', '2021-02-18 13:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `sizeName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `sizeName`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'xl', 'xl', '1', '2020-09-14 06:25:30', '2020-09-14 06:25:30'),
(2, 'mxl', 'mxl', '1', '2020-09-14 06:25:40', '2020-09-14 06:25:40'),
(3, 'ML', 'ml', '1', '2020-12-25 18:28:55', '2020-12-25 18:28:55'),
(5, 'ml', 'ml', '1', '2021-01-28 19:07:04', '2021-01-28 19:07:04'),
(6, '40', '40', '1', '2021-01-29 05:45:50', '2021-01-29 05:45:50'),
(7, '42', '42', '1', '2021-01-29 05:45:58', '2021-01-29 05:45:58'),
(8, '44', '44', '1', '2021-01-29 05:46:04', '2021-01-29 05:46:04'),
(9, 'L', 'l', '1', '2021-01-31 09:02:31', '2021-01-31 09:02:31'),
(10, 'M', 'm', '1', '2021-01-31 09:02:39', '2021-01-31 09:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(16, 'public/uploads/slider/1612185351-Untitled-1.jpg', 'https://mart9294.com/category/home-&-lifestyle/7', 1, '2021-02-01 12:04:46', '2021-02-24 16:27:21'),
(18, 'public/uploads/slider/1612265788-Untitled-1 gg.jpg', 'https://mart9294.com/subcategory/shari/8', 1, '2021-02-01 14:04:36', '2021-02-02 11:36:28'),
(19, 'public/uploads/slider/1612293891-Mart Cover photo.png', 'https://mart9294.com/', 1, '2021-02-02 16:42:16', '2021-02-02 19:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `socialmedia`
--

CREATE TABLE `socialmedia` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialmedia`
--

INSERT INTO `socialmedia` (`id`, `name`, `icon`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mart9294', 'Facebook', 'https://www.facebook.com/MART9294', 1, '2020-09-15 06:38:33', '2021-02-26 10:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `social_providers`
--

CREATE TABLE `social_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `subcategoryName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcategoryName`, `slug`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Computer', 'computer', 1, '1', '2020-08-29 03:50:54', '2020-08-29 03:50:54'),
(3, 'Laptop', 'laptop', 1, '1', '2020-08-29 03:51:12', '2020-08-29 03:51:12'),
(4, 'Scanner', 'scanner', 2, '1', '2020-09-02 10:40:20', '2020-09-02 10:40:20'),
(5, 'test 2', 'test-2', 13, '1', '2020-09-14 06:19:43', '2020-09-14 06:19:43'),
(7, 'Hair Care', 'hair-care', 4, '1', '2020-12-25 18:23:54', '2020-12-25 18:23:54'),
(8, 'Shari', 'shari', 8, '1', '2021-01-23 15:36:36', '2021-01-23 15:36:36'),
(9, 'Gulljee Collections', 'gulljee-collections', 8, '1', '2021-01-23 17:51:04', '2021-01-23 17:51:04'),
(10, 'plants', 'plants', 15, '1', '2021-01-23 18:32:47', '2021-01-23 18:32:47'),
(11, 'Jewellery', 'jewellery', 8, '1', '2021-01-29 03:09:26', '2021-01-29 03:09:26'),
(12, 'panjabi', 'panjabi', 9, '1', '2021-01-29 05:43:19', '2021-01-29 05:43:19'),
(13, 'Three Pice', 'three-pice', 8, '1', '2021-01-29 05:57:42', '2021-01-29 05:57:42'),
(14, 'T-Shirt', 't-shirt', 7, '1', '2021-01-31 08:44:28', '2021-01-31 08:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'public/uploads/avatar/avatar.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `email`, `phone`, `designation`, `status`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'superadmin', 'User01', 'superadmin@mart9294.com', '017', 'CEO', '1', '$2y$10$oqJfGladxUic3FZlQFdKoeSpe3E8BRb/025gWNJJIuHL7NoiBt6tS', 'public/uploads/avatar/avatar.png', 'mRdiBmqQFVTrbxcZND3pdXbE9ZrVjATPEraC2fCGxE5jGujojzTduDhuQta7', NULL, '2021-02-20 16:46:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisments`
--
ALTER TABLE `advertisments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brandinserts`
--
ALTER TABLE `brandinserts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bundles`
--
ALTER TABLE `bundles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childcategories`
--
ALTER TABLE `childcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `childcategories_subcategory_id_index` (`subcategory_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `couponcodes`
--
ALTER TABLE `couponcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_useds`
--
ALTER TABLE `coupon_useds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `createpages`
--
ALTER TABLE `createpages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_phonenumber_unique` (`phoneNumber`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderDetails`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderIdPrimary`);

--
-- Indexes for table `ordershippings`
--
ALTER TABLE `ordershippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagecategories`
--
ALTER TABLE `pagecategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paymentsaves`
--
ALTER TABLE `paymentsaves`
  ADD PRIMARY KEY (`paymentIdPrimary`);

--
-- Indexes for table `productcolors`
--
ALTER TABLE `productcolors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productimages`
--
ALTER TABLE `productimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productsizes`
--
ALTER TABLE `productsizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producttags`
--
ALTER TABLE `producttags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_sellerphone_unique` (`sellerphone`),
  ADD UNIQUE KEY `sellers_selleremail_unique` (`selleremail`),
  ADD UNIQUE KEY `sellers_sellerphone2_unique` (`sellerphone2`);

--
-- Indexes for table `shippingfees`
--
ALTER TABLE `shippingfees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialmedia`
--
ALTER TABLE `socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_providers`
--
ALTER TABLE `social_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_index` (`category_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisments`
--
ALTER TABLE `advertisments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brandinserts`
--
ALTER TABLE `brandinserts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bundles`
--
ALTER TABLE `bundles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `childcategories`
--
ALTER TABLE `childcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `couponcodes`
--
ALTER TABLE `couponcodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupon_useds`
--
ALTER TABLE `coupon_useds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `createpages`
--
ALTER TABLE `createpages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderDetails` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderIdPrimary` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ordershippings`
--
ALTER TABLE `ordershippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pagecategories`
--
ALTER TABLE `pagecategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentsaves`
--
ALTER TABLE `paymentsaves`
  MODIFY `paymentIdPrimary` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `productcolors`
--
ALTER TABLE `productcolors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `productimages`
--
ALTER TABLE `productimages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `productsizes`
--
ALTER TABLE `productsizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `producttags`
--
ALTER TABLE `producttags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `shippingfees`
--
ALTER TABLE `shippingfees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `socialmedia`
--
ALTER TABLE `socialmedia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_providers`
--
ALTER TABLE `social_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
