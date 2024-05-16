-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2022 at 03:53 PM
-- Server version: 10.1.48-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yotrip`
--

-- --------------------------------------------------------

--
-- Table structure for table `la_banners`
--

CREATE TABLE `la_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(11) NOT NULL DEFAULT '1',
  `status` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'off',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_banners`
--

INSERT INTO `la_banners` (`id`, `title`, `description`, `photo`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'https://yotrip.vn/public/backend/uploads/images/banners/5a258b3cb41d7a43230c.jpg', 2, 'on', '2021-09-10 16:44:09', '2022-04-06 16:59:45'),
(3, 'Welcome TDC', '<p>Cao Đẳng C&ocirc;ng Nghệ Thủ Đức</p>', 'https://yotrip.vn/public/backend/uploads/images/banners/car-10.jpg', 1, 'off', '2022-02-28 02:57:12', '2022-03-02 08:19:26'),
(4, 'Welcome App Yotrip', NULL, 'https://yotrip.vn/public/backend/uploads/images/banners/danang.jpg', 1, 'off', '2022-03-14 01:58:12', '2022-03-14 01:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `la_blogs`
--

CREATE TABLE `la_blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `la_bookings`
--

CREATE TABLE `la_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cars_id` bigint(20) UNSIGNED DEFAULT NULL,
  `taxes` int(11) DEFAULT NULL,
  `address_on` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_off` text COLLATE utf8mb4_unicode_ci,
  `total_amount` int(11) DEFAULT NULL,
  `time_start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_end` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('trading','inactive','active') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'trading',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_bookings`
--

INSERT INTO `la_bookings` (`id`, `users_id`, `cars_id`, `taxes`, `address_on`, `address_off`, `total_amount`, `time_start`, `time_end`, `date_start`, `date_end`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 188, NULL, '53 Võ Văn Ngân , Linh Chiểu ,Thủ Đức', '26 Chương Dương', 494590, '12:30', '1:00', '2021-09-13', '2021-09-15', 'active', '2022-03-07 18:40:57', '2022-04-06 14:54:18'),
(3, 4, 22, NULL, 'Linh Đông , Thủ Đức', '68 Võ Văn Ngân , Linh Chiểu , Thủ Đức', 1094590, '2:00', '23:30', '2021-09-13', '2021-10-08', 'active', '2022-03-13 15:26:49', '2021-09-12 15:26:49'),
(4, 2, 33, NULL, 'Ho Chi Minh', 'Ho Chi Minh', 1094590, '12:00', '16:00', '2022-02-16', '2022-02-25', 'active', '2022-03-05 01:50:17', '2022-02-16 01:50:17'),
(5, 5, 122, NULL, '179 Xa Lộ Hà Nội, Masteri an phú, p. thảo điền, quận 2 (thuộc toà nhà của Masteri, ngay phía trên cửa hàng tiện lợi GS25)\r\n', '148/10 Lê Văn Việt Quận 9', 2500000, '7:30', '13:45', '2022-03-16', '2022-03-25', 'active', '2022-03-09 13:21:48', '2022-02-16 13:21:48'),
(6, 2, 113, NULL, 'Quận 4', 'Quận 6', 1600000, '', '', '', '', 'trading', '2022-03-14 15:40:31', '2022-03-14 01:51:40'),
(7, 2, 18, NULL, 'Chợ bến thành, Quận 1, Hồ Chí Minh', 'Masteri An Phú, Quận 2, Hồ Chí Minh', 795590, '12:00', '2:00', '2022-03-15', '2022-03-17', 'trading', '2022-03-14 06:45:37', '2022-04-06 14:54:05'),
(8, 2, 18, NULL, 'Chợ bến thành, Quận 1, Hồ Chí Minh', 'Masteri An Phú, Quận 2, Hồ Chí Minh', 795590, '12:00', '2:00', '2022-03-15', '2022-03-17', 'trading', '2022-03-16 06:47:33', '2022-03-14 06:47:33'),
(16, 2, 21, NULL, 'Bùi Viện Quận 1', 'La Xuân Oai, Lê Văn Việt', 850000, '7:00', '12:00', '2022-04-08', '2022-04-012', 'trading', '2022-04-08 08:31:17', '2022-04-08 08:31:17'),
(26, 3, 122, NULL, 'Bùi Viện Quận 1', 'La Xuân Oai, Lê Văn Việt', 920000, '7:00', '7:00', '2022-04-08', '2022-04-09', 'trading', '2022-04-11 06:00:35', '2022-04-11 06:00:35'),
(27, 3, 238, NULL, 'Bùi Viện Quận 1', 'La Xuân Oai, Lê Văn Việt', 660000, '7:00', '7:00', '2022-04-08', '2022-04-09', 'trading', '2022-04-12 04:28:49', '2022-04-12 04:28:49'),
(28, 3, 228, NULL, 'undefined', 'La Xuân Oai, Lê Văn Việt', 990000, '7:00', '7:00', '2022-04-08', '2022-04-09', 'trading', '2022-04-14 03:02:53', '2022-04-14 03:02:53'),
(29, 3, 228, NULL, 'undefined', 'La Xuân Oai, Lê Văn Việt', 990000, '7:00', '7:00', '2022-04-08', '2022-04-09', 'trading', '2022-04-14 03:03:11', '2022-04-14 03:03:11'),
(30, 3, 228, NULL, 'undefined', 'La Xuân Oai, Lê Văn Việt', 990000, '7:00', '7:00', '2022-04-08', '2022-04-09', 'trading', '2022-04-14 03:03:24', '2022-04-14 03:03:24'),
(31, 3, 238, NULL, 'Hồ chí minh', 'Đà lạt', 660000, '7:00', '7:00', '2022-04-08', '2022-04-09', 'trading', '2022-04-14 03:45:39', '2022-04-14 03:45:39'),
(32, 3, 258, NULL, 'Dfghhvvvv', 'Chhjnv', 765600, '9:40', '11:37', '2022-10-16', '2026-11-24', 'trading', '2022-04-16 02:51:18', '2022-04-16 02:51:18'),
(33, 3, 258, NULL, 'Fghhj', 'Fghhh', 765600, '11:29', '11:29', '2022-4-16', '2022-4-17', 'trading', '2022-04-16 04:29:10', '2022-04-16 04:29:10'),
(34, 3, 258, NULL, 'Fghhj', 'Fghhh', 765600, '11:29', '11:29', '2022-4-16', '2022-4-17', 'trading', '2022-04-16 04:30:36', '2022-04-16 04:30:36'),
(35, 3, 258, NULL, 'Ggj', 'Fggh', 765600, '11:31', '11:31', '2022-4-16', '2022-4-17', 'trading', '2022-04-16 04:31:23', '2022-04-16 04:31:23'),
(36, 3, 258, NULL, 'Ggj', 'Fggh', 765600, '11:31', '11:31', '2022-4-16', '2022-4-17', 'trading', '2022-04-16 04:40:53', '2022-04-16 04:40:53'),
(37, 23, 258, NULL, 'Fgy', 'Fguu', 765600, '14:39', '14:39', '2022-4-19', '2022-4-20', 'trading', '2022-04-19 07:42:04', '2022-04-19 07:42:04'),
(38, 10, 263, NULL, 'a', 'b', 823500, '16:37', '16:37', '2022-4-19', '2022-4-20', 'trading', '2022-04-19 09:39:55', '2022-04-19 09:39:55'),
(39, 10, 263, NULL, 'a', 'b', 823500, '9:5', '9:5', '2022-4-20', '2022-4-23', 'trading', '2022-04-20 02:07:10', '2022-04-20 02:07:10'),
(40, 10, 263, NULL, 'a', 'b', 823500, '9:5', '9:5', '2022-4-20', '2022-4-23', 'trading', '2022-04-20 02:07:41', '2022-04-20 02:07:41'),
(41, 10, 253, NULL, 'F', 'T', 880000, '13:23', '13:23', '2022-4-20', '2022-4-21', 'trading', '2022-04-20 06:23:53', '2022-04-20 06:23:53'),
(42, 10, 260, NULL, 'Adfg', 'Agg', 577000, '9:29', '9:29', '2022-4-21', '2022-4-22', 'trading', '2022-04-21 02:29:23', '2022-04-21 02:29:23'),
(43, 10, 263, NULL, 'F', 'Ffh', 823500, '17:0', '17:0', '2022-4-21', '2022-4-22', 'trading', '2022-04-21 10:00:47', '2022-04-21 10:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `la_cars`
--

CREATE TABLE `la_cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` int(11) NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fuel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `power` int(11) DEFAULT NULL,
  `gearbox` int(11) DEFAULT NULL,
  `luggage` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `service_charge` int(20) NOT NULL,
  `insurance_fees` int(20) NOT NULL,
  `discount` int(11) DEFAULT '0',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` int(11) NOT NULL,
  `longitude` int(11) NOT NULL,
  `terms_of_use` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rules` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `categories_id` bigint(20) UNSIGNED DEFAULT NULL,
  `renders_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `range_of_vehicle` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `deleted_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_cars`
--

INSERT INTO `la_cars` (`id`, `name`, `description`, `photo`, `seat`, `color`, `make`, `fuel`, `power`, `gearbox`, `luggage`, `price`, `service_charge`, `insurance_fees`, `discount`, `address`, `latitude`, `longitude`, `terms_of_use`, `rules`, `start_date`, `end_date`, `start_time`, `end_time`, `users_id`, `categories_id`, `renders_id`, `city_id`, `range_of_vehicle`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(18, 'VINFAST FADIL 2020', '<p>Vinfast Fadil 1.4L, ph&acirc;n kh&uacute;c A. Xe gia đ&igrave;nh &iacute;t đi n&ecirc;n cho thu&ecirc; xe tự l&aacute;i. Sẽ c&oacute; phụ ph&iacute; vệ sinh xe t&ugrave;y theo mức độ dơ khi trả xe. Trang bị hiện c&oacute; tr&ecirc;n xe: Đề nổ từ xa. Thiết bị cảnh b&aacute;o va chạm Mobileye 630. M&agrave;n h&igrave;nh android. Bản đồ Vietmap. Camera h&agrave;nh tr&igrave;nh A18, đọc biển b&aacute;o giao th&ocirc;ng. Độ full option đ&egrave;n biled, Cruise control, Lim, cảm biến &aacute;p suất lốp...</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/eBiu5Lu_060Dw56IsosO0w (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/lQutoZhcY03xAKSVx-avgg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/8aSnFcVVRy-QW8nMWEpZcA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/yF5p809BJ5TIPf0eXUvSaA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/eBiu5Lu_060Dw56IsosO0w.jpg,', 4, 'gray', '200', 'petrol', 250, 1, 1, 600000, 0, 0, 50, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '10:01', '21:01', 3, 1, 7, 187, 1, 'active', NULL, '2022-02-23 02:01:45', '2022-04-11 08:10:47'),
(19, 'TOYOTA FORTUNER 2014', '<pre><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">TOYOTA FORTUNER 2014</span></span></pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/taU5-YCnagow0vP5LpA5OQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vqccJiE0q8H_iXXsm0btEQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/VuTxhCRNvbZ6_Gc_8AJXPA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/yIkufTkZvSsn6VgDSEiTqw.jpg,', 7, 'Black', '200', 'petrol', 350, 1, 1, 1000000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '21:00', '20:00', 6, 1, 2, 8, 1, 'active', NULL, '2022-02-23 02:12:58', '2022-04-11 14:28:43'),
(20, 'MITSUBISHI', '<p><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">MITSUBISHI XPANDER đăng k&yacute; 2021</span></span></p>', 'https://yotrip.vn/public/backend/uploads/images/cars/Oba4ZXZm9qDBcJlPP4A9ww.jpg,https://yotrip.vn/public/backend/uploads/images/cars/RSlhJHHIfGtKfQNAqdBr6w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/UIHSbKIyAPdjc1SM41dQzw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Zfz9-EW9aWCELXFtnda89g.jpg,', 7, 'Red', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-04-14', '2022-04-30', '5:00', '20:00', 3, 1, 12, 1, 1, 'active', NULL, '2022-02-23 02:19:40', '2022-04-11 14:23:29'),
(21, 'Honda Civic 2018', '<p><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Xe Honda Civic số tự động đăng k&yacute; th&aacute;ng 10/2018. Xe gia đ&igrave;nh mới đẹp, nội thất nguy&ecirc;n bản, sạch sẽ, bảo dưỡng thường xuy&ecirc;n, rửa xe miễn ph&iacute; cho kh&aacute;ch. Xe rộng r&atilde;i, an to&agrave;n, tiện nghi, ph&ugrave; hợp gia đ&igrave;nh du lịch, dạo phố.</span></span></p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5ZFIlf_q7WudSNRVAbNHWw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Uk4tGcs0Dgd1V-HsV25nUg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/WqmJmZKthmedUzSWj5E14A.jpg,', 5, 'Blue', '200', 'petrol', 250, 1, 1, 850000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '21:00', '20:23', 6, 1, 3, 16, 1, 'active', NULL, '2022-02-23 02:23:59', '2022-04-10 18:42:37'),
(22, 'MORRIS GARAGES ZS COMFORT 2021', '<pre>1.5L 112HP 150Nm\r\n\r\nHộp số CVT 3 chế độ giả lập 8 cấp\r\n\r\n5* ASEAN NCAP\r\n\r\n6 t&uacute;i kh&iacute;, c&oacute; cảm biến l&ugrave;i\r\n\r\nM&agrave;n h&igrave;nh cảm ứng 10.1&rdquo;\r\n\r\nĐường trường : 6,2L /100km\r\n\r\nNội &ocirc;:8- 12L /100km\r\n\r\nChế độ l&aacute;i : Cruise Control, Phanh tay điện tử, Auto Hold, hỗ trỡ đỗ đ&egrave;o, chống trượt, N&uacute;t điều khiển tr&ecirc;n vo lăng, C&oacute; Apple carplay v&agrave; Adroid Auto,...\r\n\r\n\r\nC&aacute;c chi tiết trong khoang nội thất của NEW MG ZS được thiết kế c&aacute;ch t&acirc;n v&agrave; chế tạo tỉ mỉ với c&aacute;c chi tiết mạ kim loại. Mọi chi tiết tr&ecirc;n xe đều thể hiện t&iacute;nh thể thao sang trọng: từ bảng điều khiển được trang tr&iacute; đặc biệt bằng vật liệu mềm cho đến M&Agrave;N H&Igrave;NH CẢM ỨNG 10.1&rdquo;.,\r\n\r\nĐộng cơ 1,5 l&iacute;t sản sinh 112 m&atilde; lực kết hợp với hộp số CVT giả lập 8 cấp. Tận hưởng sự ổn định tuyệt vời của HỆ THỐNG BẢO VỆ ĐỒNG BỘ c&ugrave;ng hệ thống 6 t&uacute;i kh&iacute; đạt ti&ecirc;u chuẩn an to&agrave;n 5* ASEAN NCAP</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/3u2sd7Lb5eSD4ISpCVWRfg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/d6sEb4nxFV0GIpkyfNm3MQ (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/d6sEb4nxFV0GIpkyfNm3MQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/xNbtJRSVipdCXYFroa_XUA.jpg,', 5, 'Red', '300', 'petrol', 350, 1, 1, 750000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '07:00', '21:00', 3, 1, 13, 2, 1, 'active', NULL, '2022-02-23 02:32:30', '2022-04-11 14:25:45'),
(23, 'SUZUKI CELERIO 2019', '<pre><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Suzuki Celerio đk lần đầu 2019,xe gia đ&igrave;nh đi kĩ sạch sẽ.Vệ sinh thường xuy&ecirc;n</span></span><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">\r\nNội thất ghế da,cammera h&agrave;nh tr&igrave;nh vietmap S1 cảnh b&aacute;o tốc độ,lộ tr&igrave;nh</span></span><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">\r\nCamera l&ugrave;i,2 t&uacute;i kh&iacute; an to&agrave;n,bảo hiểm 2 chiều,bảo hiểm mất cắp.</span></span><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">\r\nkết nối BT của Suzuki giải tr&iacute;,4loa nghe ấm,trầm</span></span><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">\r\nC&oacute; n&uacute;t S hỗ trợ vượt xe chế độ thể thao,L hỗ trợ đổ đ&egrave;o,l&ecirc;n dốc.</span></span><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">\r\nTiết kiệm xăng,hỗ hợp 5.4L full tải,đường trường 4.3L</span></span><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">\r\nĐi cao tốc V&ocirc; lăng đầm,ko rung lắc</span></span></pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/_w7qyjzbXrw_O4I56cmcjA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/2i4QB_K2eIhOX-IVu4vINg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/5a7FxEf9uGegiy0KoTwOUA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/A5eHzGfUBGLtDIR0KQTZzw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/dIz7xCEkhARTLMApQSDnYg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fTJrKFOa-k-P7RZzBKQ_zQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hpMcvsozDvSn4Uul0ZvgHA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/NxV-EyVLg0gfMZh6oxx_WQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/QaLOQvIjYIJ_QGj9GM-0lA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/swOcY4ewduJIiBR_5ZQ7Bw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ysKrWXeW_-PBCvKfawgdxA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ySv9O4ZyTXUTKjfoSeuCfw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/_w7qyjzbXrw_O4I56cmcjA - Copy.jpg,', 6, 'Gray', '300', 'petrol', 350, 1, 1, 600000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '21:00', '11:00', 3, 1, 9, 16, 2, 'active', NULL, '2022-02-23 02:42:04', '2022-04-11 14:27:23'),
(24, 'CHEVROLET TRAILBLAZER 2018', '<p><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Xe số s&agrave;n tiết kiệm nhi&ecirc;n liệu, xe gia đ&igrave;nh n&ecirc;n sạch sẽ, tiện nghi, c&oacute; ghế trẻ em cho gia đ&igrave;nh n&agrave;o c&oacute; con nhỏ. Chủ xe vui vẻ, th&acirc;n thiện!</span></span></p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5hp2AACb3Wc63f7Nl18W0Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/K3qnabfEuVfASSnzXXmMeA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tbNcp3t2gYbqAsjYD76f1g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ysKrWXeW_-PBCvKfawgdxA.jpg,', 7, 'Black', '200', 'petrol', 250, 1, 1, 810000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '11:30', '22:00', 6, 1, 1, 3, 2, 'active', NULL, '2022-02-23 02:46:18', '2022-04-10 18:19:40'),
(25, 'FORD ECOSPORT 2019', '<p>FORD ECOSPORT 2019</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/_tKkyHzr4TENnFzXg8Kkvg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/i505_pL_IcPmgfJrNdKggg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/M-LVR-fnMjrLJ4c68mmsgw.jpg,', 5, 'Blue', '200', 'petrol', 260, 1, 1, 800000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '21:00', '22:00', 3, 1, 8, 4, 2, 'active', NULL, '2022-02-23 02:53:54', '2022-04-10 18:26:09'),
(26, 'SUZUKI CELERIO 2018', '<p>xe Suzuki Celerio sx 2018 hộp số tự động CVT, nội thất sạch đẹp, dọn từ a-z. Đặc biệt cực k&igrave; tiết kiệm xăng (khoảng 4,5lit đường hỗn hợp) m&igrave;nh đ&atilde; test v&agrave;i lần an giang - s&agrave;i g&ograve;n! xe 1.0 nhưng 800kg n&ecirc;n kh&aacute; bốc nha!</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/EHd8No9W0ngqPoMkAuN4QA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fHcAAsARVYK12GMxUZUN1A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/h8oDZ4H54lYhYS_368lcRA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ivti0yBXsLxYxroypwN9gA (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/ivti0yBXsLxYxroypwN9gA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/YriOjMst0U2h0mZ7fHJ8cQ.jpg,', 4, 'red', '350000', 'petrol', 200, 250, 1, 498000, 0, 0, 0, 'TP Hồ Chí Minh', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '09:53', '17:00', 3, 1, 9, 20, 2, 'active', NULL, '2022-02-23 02:54:20', '2022-04-11 14:26:51'),
(27, 'FORD EVEREST 2007', '<div class=\"group\">\r\n<div class=\"ctn-desc-new\">\r\n<pre>FORD EVEREST 2007</pre>\r\n</div>\r\n</div>\r\n<div class=\"group\">&nbsp;</div>', 'https://yotrip.vn/public/backend/uploads/images/cars/GHHrnE5Zs56WQwW9q48Log.jpg,https://yotrip.vn/public/backend/uploads/images/cars/jZvKapcBpBOdOotJofoofg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/YCoV7XkGzHj_7UEGpqBkbg.jpg,', 7, 'Gray', '200', 'petrol', 250, 1, 2, 800000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-04-14', '2022-04-27', '5:00', '20:00', 3, 1, 8, 1, 2, 'active', NULL, '2022-02-23 02:57:56', '2022-04-10 18:26:59'),
(28, 'SUZUKI XL7 2021', '<pre>Suzuki XL7 số tự động đăng k&yacute; th&aacute;ng 1/2022\r\nXe gia đ&igrave;nh sạch đẹp, th&iacute;ch hợp cho gia đ&igrave;nh di du lịch\r\nXe rộng r&atilde;i an to&agrave;n, tiện nghi, được trang bị:\r\n- Camera h&agrave;nh tr&igrave;nh trước sau\r\n- Cảm biến l&ugrave;i\r\n- Tự động lock cửa khi di chuyển, an to&agrave;n cho gia đ&igrave;nh c&oacute; con nhỏ\r\n- Kho&aacute; cửa k&iacute;nh tự l&ecirc;n v&agrave; gặp gương\r\n- M&agrave;n h&igrave;nh giải tr&iacute; ch&iacute;nh 10\"\r\n- Ghế bọc da sang trọng\r\n- Kh&aacute;ng khuẩn nano bạc thường xuy&ecirc;n\r\n- Xe em giao sạch sẽ trong ngo&agrave;i, mong ae giao xe lại em cũng như vậy, nếu ae bận cho e xin ch&uacute;t tiền vệ sinh xe tuỳ theo mức độạ\r\nEm xin cảm ơn</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/1FbY0xhqdCxQfpu0PLd5_Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/u3TgE9yKJBMUEfYrgULXNA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Y6RyQspOu1ghCCrLIEUGkg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/YXYHUIJj5ctcUe32LDuvIw.jpg,', 7, 'Red', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '10:00', '12:00', 3, 1, 9, 18, 2, 'active', NULL, '2022-02-23 03:02:34', '2022-04-11 14:28:08'),
(29, 'KIA MORNING 2016', '<pre>Xe kia moning 2016 sẵn s&agrave;ng phục vụ anh chị em xa gần xe trang bị m&agrave;n h&igrave;nh androi camera de đầy đủ nội thất sạch sẽ</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/AN7Eff3jJIW_amklrqZnbA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/S5UjTVBtxyZYKIAaIRfZmg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/XbwsjumiKCM3F4C5ncKyGg.jpg,', 5, 'Blue', '300', 'petrol', 350, 1, 1, 480000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '21:00', '08:00', 3, 1, 10, 10, 2, 'active', NULL, '2022-02-23 03:07:12', '2022-04-11 14:22:48'),
(30, 'MITSUBISHI XPANDER 2020', '<pre>Mitsubishi Xpander 2020 Full LED Số tự đ&ocirc;̣ng 7 chỗ rộng r&atilde;i.Xe được trang bị nhi&ecirc;̀u t&iacute;nh năng tiện &iacute;ch,Cruise Control v&agrave; camera l&ugrave;i an to&agrave;n.Bảo dưỡng định kỳ tại h&atilde;ng,rất tiết kiệm xăng.Bảo đảm y&ecirc;n t&acirc;m cho những chuyến du lịch xa.Bảo hiểm 2 chiều\r\nThời gian cho thu&ecirc; linh động v&agrave; hỗ trợ giao xe tận t&igrave;nh</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/1shqMU16eWyGM4y8rE2uVA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/I3VGiRV8WwuBpqzw0vk8kw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/jIeiJMzi85ZeLWUSNRF8fw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/kq-FfaVITS9Rr5f-pSikTA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Sa3TAGxF84-z_e-oUZhrMw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/SkzUnlNbMwARlzzHS5z6iA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TSjp24mvJwQQSF20AZu68Q.jpg,', 7, 'Red', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '21:00', '20:00', 3, 1, 12, 15, 2, 'active', NULL, '2022-02-23 03:11:07', '2022-04-11 14:24:08'),
(31, 'ISUZU D-MAX LS PRESTIGE 2020', '<pre>B&aacute;n tải D-max LS Prestige 3.0,2 cầu, Số tự động (C&ocirc;ng suất 177hp) đời 2020\r\n\r\n1. Xe gia đ&igrave;nh mới đẹp.\r\n2. Nội thất nguy&ecirc;n bản, ghế da, sạch sẽ, kh&ocirc;ng bị &aacute;m m&ugrave;i.\r\n3. Trang bị phụ trợ: Camera h&agrave;nh tr&igrave;nh, camera cập lề, Camera l&ugrave;i, cảm biến l&ugrave;i. M&agrave;n h&igrave;nh cảm ứng c&oacute; Apple Carplay.\r\n4. T&iacute;nh năng an to&agrave;n: 6 t&uacute;i kh&iacute;, đầy đủ hệ thống an to&agrave;n như c&acirc;n bằng điện tử, kiểm so&aacute;t lực k&eacute;o, hỗ trợ xuống dốc,&hellip;\r\n5. Quan trọng l&agrave; xe b&aacute;n tải to bự v&agrave; cao, n&ecirc;n chạy sẽ thoải m&aacute;i hơn c&aacute;c xe mini kh&aacute;c\r\n6. Th&ugrave;ng xe kh&ocirc;ng nắp\r\n\r\nMột &iacute;t lưu &yacute; khi thu&ecirc;:\r\n1. Kh&ocirc;ng giao nhận xe tận nơi\r\n2. Qu&yacute; kh&aacute;ch vui l&ograve;ng đừng d&ugrave;ng để chạy offroad, v&agrave; v&agrave;o đường ngập nước nh&eacute;\r\n3. C&ugrave;ng chung &yacute; thức giữ g&igrave;n xe sạch sẽ n&ecirc;n ch&uacute;ng ta vui l&ograve;ng kh&ocirc;ng h&uacute;t thuốc/ăn tr&ecirc;n xe. Vệ sinh trong xe trước khi trả lại nh&eacute;.\r\n\r\nCảm ơn qu&yacute; kh&aacute;ch đ&atilde; đọc th&ocirc;ng tin tr&ecirc;n để tr&aacute;nh c&aacute;c tranh chấp kh&ocirc;ng đ&aacute;ng c&oacute;. Ch&uacute;c qu&yacute; kh&aacute;ch một chuyến đi vui vẻ v&agrave; b&igrave;nh an</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/_XcmJ7WFLeKpzvp0y8u3IA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/_zLmPRjq_9fZAwjggdSN6w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/DETNV1wZcIwRQHxn1S1BZQ (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/DETNV1wZcIwRQHxn1S1BZQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/DjbAYu0c6lAdYDCZGkQPdQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hbgU2-FewhL1kT-nPY_3WA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hyUPmgjFu81Eh5pifv5oEA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/SBc77dCc-yCI2Wp_xTXSOg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZPBk1zhRVxdE3EkiB-qwRw.jpg,', 5, 'Red', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '00:30', '12:30', 3, 1, 14, 9, 2, 'active', NULL, '2022-02-23 03:21:27', '2022-04-18 07:32:17'),
(32, 'NISSAN NAVARA EL 2017', '<p>Xe mới chạy 50 ng&agrave;n km, ổn định, đi xa tốt, th&ugrave;ng cao chở h&agrave;ng tốt.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/6TYzhm7pqfyarZCuOCqc7w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hHB2xI3ZTAqwnZZDWuK-Nw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/oP2fWpFpAc31ADt1X3Gx6Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uBsmmvbqNERYFfDzORvBUw.jpg,', 4, 'Black', '300', 'petrol', 350, 1, 1, 850000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '21:00', '20:00', 3, 1, 15, 15, 1, 'active', NULL, '2022-02-23 03:24:56', '2022-04-18 07:32:33'),
(33, 'HONDA CITY 2019', '<p>Honda city top đời mới 2019.xe gia đ&igrave;nh d&ugrave;ng sạch sẽ. B&atilde;o dưỡng thường xuy&ecirc;n. Th&iacute;ch hợp cho qu&yacute; kh&aacute;ch đi đ&aacute;m tiệc hay c&ocirc;ng việc l&agrave;m ăn hoặc về qu&ecirc; hay du lịch v&agrave;i ng&agrave;y</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/4raaxDVyMw5JAcI5Rbjhsw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7vAWtrO4aJ_1PgBFijqQPA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/81BHYLbDiFhbIZeNgETlKQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BNBNATcCYPuSNmPKXGfSfg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ehOMntf4EvXrbQOK3d7reg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/M7umdrSDnknuPI7n8BF_ig.jpg,https://yotrip.vn/public/backend/uploads/images/cars/wcAIb_mRe-Jxaa1EGG28LQ.jpg,', 4, 'Gray', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '21:30', '20:30', 3, 1, 3, 9, 1, 'active', NULL, '2022-02-23 03:28:15', '2022-04-10 18:46:15'),
(34, 'MITSUBISHI XPANDER 2021', '<p>xe xpande 7 chỗ xe gia đ&igrave;nh</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/bKjFQnnnOp7a5fcCiwJO9g (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/oNIa3vavu2Op4YbYsSZ6Ng (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/UXCf_6EB4u59PilRNiJ1vA (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/v0JdssfgGihH8pDFFshAPQ.jpg,', 7, 'Gray', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'TP.HCM', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-02-23', '2022-02-24', '22:30', '23:30', 3, 1, 12, 13, 2, 'active', NULL, '2022-02-23 03:31:13', '2022-04-11 14:24:42'),
(35, 'KIA RONDO 2018', '<p><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">KIA RONDO 2018</span></span></p>', 'https://yotrip.vn/public/backend/uploads/images/cars/HNl9ABmMlamKiWC3Z7282A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lhSNJqxixWkDn4FVhTv4EQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/sTxDXipRChtlxj6AxGm5Dg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Znq-wPH2Ovf9YlyAQD-9pw.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '20:00', 6, 1, 10, 190, 1, 'active', NULL, '2022-03-02 01:54:57', '2022-04-11 07:47:31'),
(36, 'Mazda 3', '<pre>Mazda 3 đời 2021, xe mới, sạch sẽ. Thường xuy&ecirc;n kiểm tra định k&igrave; v&agrave; bảo dưỡng xe</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/A050DzEPsjHRi_4DmaewZQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ET6lvGLgB557ZEz0qrozgA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hn7jlh3Z4UTVpA7RndaNWw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lGeIO19v5ZOgCB8oMtzWDQ.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 900000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '20:00', 3, 1, 11, 192, 1, 'active', NULL, '2022-03-02 01:58:32', '2022-04-11 07:55:11'),
(37, 'MAZDA 3 2021', '<p>Mazda 3 đăng k&iacute; 2021-2022. Xe mới, sạch sẽ</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/ACgc7X1GkjqZdQZ3in4v8Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/h9VvrDgUNd7u-9RgLMBDtw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Oak3hHtVSvzrZF56R3NN2A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TuS0I4nkGjg7HX82dR0GDw.jpg,', 4, 'Red', '200', 'petrol', 250, 1, 1, 950000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '13:00', '14:00', 3, 1, 11, 192, 1, 'active', NULL, '2022-03-02 02:03:08', '2022-04-11 07:57:22'),
(38, 'KIA RONDO 2019', '<p>KIA RONDO 2020</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/6MLMXwuuwA13OuP-LXabgg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/CVFsjeJEUWq2HF5Q5feYWQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/m1fhD9To7_bIqIaUJKPupQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/mC4rtvuyNrRzjZrMcm19jw.jpg,', 7, 'Gray', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '21:00', 3, 1, 10, 193, 1, 'active', NULL, '2022-03-02 02:06:51', '2022-04-11 07:49:21'),
(39, 'KIA CERATO 2019', '<p>Kia cerato 2019 bản 1.6 AT full option Xe gia đ&igrave;nh, nội thất sang trọng, sạch sẽ Gi&aacute; cả hợp l&yacute; Uy t&iacute;n, chất lượng</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5GQJ3JihhhDFQ8Cig76t_A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7dg5lzhJ2iOldPg33mf4tg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-SagM2iAiVUR_dTIS1aBqg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/srS9_oS5DjTYdusOtUOgow.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TfDuDWMmtEqStEVlQbd5Uw.jpg,', 4, 'Red', '200', 'petrol', 250, 1, 1, 900000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '20:00', 3, 1, 10, 192, 1, 'active', NULL, '2022-03-02 02:14:30', '2022-04-11 07:38:20'),
(40, 'MAZDA 3 2020', '<pre>Mazda 2020 bản full</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/_Ygu6uLlF3qEprOnidX0mA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/cqurqxtprV4XSCq58CpyAg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/EvBcx7m4V-GdvRbw_-geZw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/l_2rizO3HOSsrSkf16xeDA.jpg,', 5, 'Black', '200', 'petrol', 250, 1, 1, 900000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '12:30', '13:30', 3, 1, 11, 190, 1, 'active', NULL, '2022-03-02 02:23:07', '2022-04-11 07:56:03'),
(41, 'TOYOTA VIOS TRD SPORTIVO 2018', '<p>TOYOTA VIOS TRD SPORTIVO 2018</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/kgNMJ-4lwC_jOYx7MNw-qA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/LgJWh5b5Y3h-n2ytGprhKQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/O3fpSPql6TDsl7zYi1L4NA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/zK7FqdNUztmgcPqHDIzwVw.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '12:30', 3, 1, 2, 184, 1, 'active', NULL, '2022-03-02 02:25:47', '2022-04-11 08:10:12'),
(42, 'MORRIS GARAGES ZS COMFORT 2021', '<pre>MG ZS Smart Up 2021 bản Comfort. M&aacute;y 1.5, số tự động. Đăng k&yacute; th&aacute;ng 4/2021. D&aacute;ng SUV 5 chỗ gầm cao rất th&iacute;ch hợp cho chuyến du lịch Đ&agrave; Lạt của bạn. Xe trang bị nhiều tiện nghi an to&agrave;n h&agrave;ng đầu như Phanh Tay Điện Tử, Auto Hold, Cruise Control, &aacute;p suất lốp trực tiếp tr&ecirc;n m&agrave;n h&igrave;nh, Hỗ trợ đỗ đ&egrave;o, Khởi h&agrave;nh ngang dốc, k&iacute;nh, gương chỉnh điện, Cam l&ugrave;i, Cảm biến l&ugrave;i, Đ&egrave;n full Led, Cam h&agrave;nh tr&igrave;nh (c&oacute; cảnh b&aacute;o tốc độ, cam phạt nguội), cốp rộng r&atilde;i, m&agrave;n h&igrave;nh 10 inch kết nối Android Auto hoặc Apple Carplay, v.v...\r\n\r\n Xe gia đ&igrave;nh đi kĩ, vệ sinh sạch sẽ trước khi giao xe, bảo tr&igrave;, bảo dưỡng đầy đủ, xe c&ograve;n rất mới.</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/a-MeXuQA3ISv_IjtJJFlVA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/da3WpqgVDMzK9nY5xYuj6A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/sq4Oi8wcalsMHu1TAwZEiw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Ue0OtRrtHxi5RpB5Fa9AuQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/UfDMtJkrNf5iwrUF481iVQ.jpg,', 5, 'Red', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '09:30', '13:30', 3, 1, 13, 183, 1, 'active', NULL, '2022-03-02 02:28:26', '2022-04-11 08:06:09'),
(43, 'HONDA CIVIC 2009', '<pre>Xe số tự động, xe gia đ&igrave;nh, nội thất đẹp,  nguy&ecirc;n bản, sạch sẽ, bảo dưỡng thường xuy&ecirc;n.\r\nXe rộng r&atilde;i, camera h&agrave;nh tr&igrave;nh, cảm biến l&ugrave;i.</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/9PAzXqPiFhLMKlBAxDg0fQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BhmipcDBgcAowhBSn93a8g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/CHkqUk5CSd2tSNwq0r_qcg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/duV82ZGfx-LixdnIKL3H5A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/oU6V-T5CKQXqpkQ0hCIsgQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/PYwIV3CNyr-m6k8x3e5hCA.jpg,', 4, 'Black', '200', 'petrol', 250, 1, 1, 750000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '13:00', '13:00', 3, 1, 3, 191, 1, 'active', NULL, '2022-03-02 02:31:37', '2022-04-11 07:07:51'),
(44, 'HYUNDAI SANTA FE 2009', '<p>HYUNDAI SANTA FE 2009</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/9KkbdHTMsPfL54Ib2oQfGw (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/9KkbdHTMsPfL54Ib2oQfGw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/la3U0UQfudlxGDEGlJXSxQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uJKo3iMKjDG8H_EBgdOR9w.jpg,', 7, 'Gray', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '20:00', 3, 1, 6, 185, 1, 'active', NULL, '2022-03-02 02:37:15', '2022-04-11 07:25:09'),
(45, 'FORD ECOSPORT 2016', '<pre><span style=\"vertical-align: inherit;\"><span style=\"vertical-align: inherit;\">Xe gia đ&igrave;nh,số tự động,nhiều trang bị hiện đại</span></span></pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/2eyR376trEwNMvVv9ORlHg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/4zC9cpFehN3tWGnyuyuutg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/AdX0kxTUZ7MOxQoHBxoxKw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/c6FGq4c_nicXVY4MfgoFwA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/dbeJvCR0zMu-C-thDWSwMg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ENXZKp9D0Rq-HxbQjqKavw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fGxh0PDC1dGItAxvqYy0Nw.jpg,', 5, 'Red', '200', 'petrol', 250, 1, 1, 740000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-04-16', '2022-04-30', '21:00', '21:00', 2, 1, 8, 188, 2, 'active', NULL, '2022-03-02 02:40:23', '2022-04-13 09:38:44'),
(46, 'FORD RANGER XLT 2014', '<p>Ford ranger số s&agrave;n 2 cầu. Ph&ugrave; hợp thu&ecirc; đi chơi địa h&igrave;nh đ&agrave; lạt.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5tHifKZqYgfnvcoXzBOilA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/8OpPsM0wXjEPpFf65OEbuQ (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/8OpPsM0wXjEPpFf65OEbuQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/f7VaYg_7gaaMuqT5LAxkHg (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/f7VaYg_7gaaMuqT5LAxkHg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/H3QY6KTWudv23pZd2mA9jw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/kQd21K5aEneQKBQ7QBjjcQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/opfDZ8pdu-cADpFajNTNBg (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/opfDZ8pdu-cADpFajNTNBg.jpg,', 5, 'Gray', '200', 'petrol', 300, 1, 1, 750000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '20:00', 3, 1, 8, 185, 2, 'active', NULL, '2022-03-02 02:44:07', '2022-04-10 18:39:48'),
(47, 'TOYOTA AVANZA 2019', '<p>Xe toyota anvaza số s&agrave;n,sạch sẽ,đẹp</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/aCc_9Msp5FwV14mB_m_2Gg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/EhHfRRK_KLwDY9bC9dG56w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Fw96RS52bz1W7KTWm_UfIQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/GK3VObalnoBijWWMIn4D6A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/PKBm0sWyQy06g3PaijqMjA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/rCeYW1ug7Pwxa9-qGEmTkQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/X68QLBszlJToghEW42MHyA.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 25, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '20:00', 3, 1, 2, 185, 2, 'active', NULL, '2022-03-02 02:47:32', '2022-04-11 08:08:05'),
(48, 'FORD FOCUS 2016', '<pre>FORD FOCUS 2016\r\nCửa sổ trần\r\nKho&aacute; cửa trẻ em\r\nGạt mưa tự động\r\n12 Cảm biến quanh xe \r\nPhanh tự động, radar cảnh b&aacute;o va chạm</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/AFWPifsoTw-PRHJ3pa8dNw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/bK-BUf66EhpmpOurLrZ9qg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-CnEmkWkF8b53EsPz11PSA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fhI1A9sqh7gBdT6zsOynag.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ivHOMTSZ3w9Ej1_1RAdohA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/NVnnqrIufeTJSh3FxJH_7Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vi72Y0fcUaOYb97by2hNrQ.jpg,', 5, 'white', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '21:00', 2, 1, 8, 189, 2, 'active', '2022-04-13', '2022-03-02 02:51:35', '2022-04-13 09:36:05'),
(49, 'KIA PICANTO 2013', '<p>Kia Picanto 2013,xe gia đ&igrave;nh,trang bị nhiều tiện &iacute;ch,m&agrave;n DVD android t&iacute;ch hợp 4G giải tr&iacute;,dẫn đường,vietmap bản quyền,camera l&ugrave;i,camera h&agrave;nh tr&igrave;nh,cảm biến &aacute;p xuất lốp,thảm l&oacute;t s&agrave;n 6d,d&agrave;n &acirc;m thanh jbl 8 loa ,loa sub...vv</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/3ZNyHzrgwZ08tTBw4cnt1A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/az3WfqrcV5guy-we-4UwNg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BLbA3vXOzse1siAOkAhriw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/gIrGZc04nfdDQpzul1IUWw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/sbX3h1EYiYvGP_x1-cGDXg.jpg,', 5, 'white', '200', 'petrol', 250, 1, 1, 450000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '20:00', 3, 1, 10, 185, 2, 'active', NULL, '2022-03-02 02:54:39', '2022-04-11 07:46:37'),
(50, 'KIA MORNING SI 2013', '<p>Kia morning số s&agrave;n đăng k&yacute; 2013, xe gia đ&igrave;nh, bảo dưỡng thường xuy&ecirc;n, an to&agrave;n, tiện nghi, c&oacute; trang bị camera l&ugrave;i</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/2MjKZJdc8mUsJj5iGFb7wA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/onpDQ0XHyZpqSCWfbLC7UA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tqmK5MczckwpdFpVY8A40w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tu1mDg0RJSWrgupDhvj5NQ.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 500000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '20:00', 3, 1, 10, 188, 2, 'active', NULL, '2022-03-02 02:57:07', '2022-04-11 07:45:31'),
(51, 'KIA RONDO 2018', '<p>KIA RONDO 2018</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/3CtKmVacOUEGfLq213utIQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/5BOWT3i75iRrfublAvPfwA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/9UaLKUeTbAirDkdkOhC0Bw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/V5gV3UeHxohVYsu3KbistA.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '22:00', '22:00', 3, 1, 10, 187, 2, 'active', NULL, '2022-03-02 02:59:19', '2022-04-11 07:48:29'),
(52, 'MITSUBISHI XPANDER 2021', '<p>Mitsubishi Xpander, xe mới nguy&ecirc;n bản, tiện nghi, sạch sẽ, biển số tam hoa đẹp.(&Yacute; nghĩa l&agrave; thượng lộ b&igrave;nh an, đi v&agrave; về đều gặp nhiều may mắn, thuận lợi). Trang bị đầy đủ m&agrave;n h&igrave;nh giải tr&iacute; đa phương tiện, cảm biến l&ugrave;i, camera l&ugrave;i, camera h&agrave;nh tr&igrave;nh, phim c&aacute;ch nhiệt gi&uacute;p qu&yacute; kh&aacute;ch dễ d&agrave;ng v&agrave; thuận lợi.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/11CTqYlDp36wU4ul323Qog.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ajt920y_Amxqx1S06OexdA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BGzf3NOraKvhiEGBaolFNA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/doClmwaH_ns5nVfSvAPvNg (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/doClmwaH_ns5nVfSvAPvNg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hFF77pEwxT0ovpe7PHRR5g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/i72GARui2J2mFsdaX5Jshw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/IxvFvNNwxcDX-MG4Jg1LMg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/jI12e50AnlkBJiDAU6BAfQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lxDRp-gnMIkoXVRoRVACvA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tqd5DO0WnXZFoWZG4OIzZA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TUsMFLYDnDHI3bCtBVctxw.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '20:00', 3, 1, 12, 195, 2, 'active', NULL, '2022-03-02 03:11:58', '2022-04-11 08:00:55'),
(53, 'MAZDA 3 HATCHBACK 2015', '<p>Xe trang bị th&ecirc;m : Dàn &acirc;m thanh nghe nhạc cực ch&acirc;́t 9 loa, 1 dàn SUB Phủ g&acirc;̀m cách &acirc;m t&ocirc;́t hơn. Camera l&ecirc;̀ ( ti&ecirc;̣n quan sát tránh va chạm b&ecirc;n h&ocirc;ng xe ).</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/_HYNrf4pM9y5yvEDBq71uw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/k1zhDaoHgVftvdcbiY8Pmg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/YKV4EzGkN56TYGdwjHOdVQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/YMfkargLnskokpRou7aYuQ.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 850000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '21:00', 3, 1, 11, 188, 2, 'active', NULL, '2022-03-02 03:14:42', '2022-04-11 07:58:02'),
(54, 'KIA CERATO 2019', '<p>Xe gia đ&igrave;nh</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/1vwSf2AAq4_ol7Mzhezc_w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7LyO2eCm5J9M-BZbeFQQIQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/8WWnnqgfLZGItT1qp6js1w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/mkrsZ2Mi_kDyrq6sxKu1vw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Vae3TMCEudChZqCv54RS-A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/yyrLa0nbGlUQZCBUOxHKJQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZoQxHWmw1h-R6NOH06xvQQ.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 750000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '13:00', '13:00', 3, 1, 10, 185, 2, 'active', NULL, '2022-03-02 03:17:35', '2022-04-11 07:39:01'),
(55, 'MITSUBISHI XPANDER 2021', '<p>Mitsubishi Xpander, xe mới nguy&ecirc;n bản, tiện nghi, sạch sẽ, biển số tam hoa đẹp.(&Yacute; nghĩa l&agrave; thượng lộ b&igrave;nh an, đi v&agrave; về đều gặp nhiều may mắn, thuận lợi). Trang bị đầy đủ m&agrave;n h&igrave;nh giải tr&iacute; đa phương tiện, cảm biến l&ugrave;i, camera l&ugrave;i, camera h&agrave;nh tr&igrave;nh, phim c&aacute;ch nhiệt gi&uacute;p qu&yacute; kh&aacute;ch dễ d&agrave;ng v&agrave; thuận lợi.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/11CTqYlDp36wU4ul323Qog.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ajt920y_Amxqx1S06OexdA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BGzf3NOraKvhiEGBaolFNA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/doClmwaH_ns5nVfSvAPvNg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hFF77pEwxT0ovpe7PHRR5g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/i72GARui2J2mFsdaX5Jshw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/IxvFvNNwxcDX-MG4Jg1LMg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/jI12e50AnlkBJiDAU6BAfQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lxDRp-gnMIkoXVRoRVACvA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tqd5DO0WnXZFoWZG4OIzZA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TUsMFLYDnDHI3bCtBVctxw.jpg,', 7, 'Gray', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '22:00', '22:00', 3, 1, 12, 191, 2, 'active', NULL, '2022-03-02 03:23:17', '2022-04-11 08:01:32'),
(56, 'MITSUBISHI ATTRAGE 2021', '<p>MITSUBISHI ATTRAGE 2021</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/4l_KuEOZaQOJP9qUDkuV-Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/46qK2mg4W6fpuPmBz2OOHg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/m_My8iEcWjLF9yPv67Tyhw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/NuRAwIeLj3VxHTAQRtT5ig.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '20:00', '20:00', 3, 1, 12, 185, 2, 'active', NULL, '2022-03-02 03:26:12', '2022-04-11 08:00:08'),
(57, 'MITSUBISHI XPANDER 2021', '<pre>MITSUBISHI XPANDER 2021... Xe gia đ&igrave;nh, nội thất sạch sẽ, bảo dưỡng đầy đủ, vận h&agrave;nh &ecirc;m &aacute;i, tiết kiệm nhi&ecirc;n liệu. C&oacute; trang bị camera h&agrave;nh tr&igrave;nh. Cam l&ugrave;i, cảm biến .B&aacute;o phạt nguội .</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/316YKfkz1sddJVbVuIIRHQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/N3aJ-FX6aUB_6YWHgBqo1A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/RVn7N4UX-lSfmQ2THdvzQw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/xubV-5JlzxRGxx1afRo98g.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 900000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '13:30', '13:30', 3, 1, 12, 187, 2, 'active', NULL, '2022-03-02 03:29:16', '2022-04-11 08:02:11'),
(58, 'KIA SONET DELUXE 2022', '<p>KIA SONET</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/1JARhbY51ZZHBpXGhQUDOQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/8DhL0Nxqd3kQ5gTUP5eIwA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fr17dyNC3or9kK19BvZYQg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hdMqZremMVrFq7f8aBm-fw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lz-94u2afCz2A4nmZNj_lA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/szNbHMq138ga2BEx4I42eA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tmFf8CK4wCcjnWb0RZTL7Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/V9DHKMtHkYd312Wm1pR1ZQ.jpg,', 5, 'Red', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '22:00', '22:00', 3, 1, 10, 189, 2, 'active', NULL, '2022-03-02 03:32:58', '2022-04-11 07:50:10'),
(59, 'TOYOTA INNOVA G 2011', '<pre>xe inova g 2011 xe mới sạch sẽ. nội thất da thoải m&aacute;i. th&iacute;ch hợp cho gia đ&igrave;nh bạn b&egrave; đi chơi. du lịch. về qu&ecirc;. l&agrave;m xe đưa đ&oacute;n c&ocirc; d&acirc;u. xe mạnh. &ecirc;m &aacute;i. lướt tr&ecirc;n mọi địa h&igrave;nh. \r\nmọi người ai c&oacute; nhu cầu xin li&ecirc;n hệ m&igrave;nh. mr v&acirc;n</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/aL1_HlTgKjDA8yko2sm7bw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/IppOzUXCvYeVYaUYwZHCqw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pzUrtEtw6_yHS5c1PYtB_w.jpg,', 8, 'Gray', '200', 'petrol', 250, 1, 1, 850000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '22:00', '22:00', 3, 1, 2, 191, 2, 'active', NULL, '2022-03-02 03:36:55', '2022-04-11 08:09:33'),
(60, 'HYUNDAI ACCENT 2019', '<p>huydai accent 2019. xe số tự đ&ocirc;ng. xe mới 100%. tiện nghi. thoải m&aacute;i. rất tiết kiệm nhi&ecirc;n liệu. th&iacute;ch hợp cho anh chị em đi gia đ&igrave;nh. tự l&aacute;i. mong mọi người ủng hộ</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/7-Uv8M32MItnngOqnxcHow.jpg,https://yotrip.vn/public/backend/uploads/images/cars/g-NsF3ql6bSd-lauKIRqjA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hiWar8iSEQGGXhsUU3qMXw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/r4gX2BTC0ZrqzcXPSEV3mQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/swCHcOe0sFGfIr_g-OSvbA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/WxidiZuxAwJtjRRApxX5Zg.jpg,', 5, 'white', '200', 'petrol', 250, 1, 1, 900000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '21:00', '20:00', 3, 1, 6, 186, 2, 'active', NULL, '2022-03-02 03:42:15', '2022-04-06 16:32:08'),
(61, 'HYUNDAI ACCENT 2019', '<p>HYUNDAI ACCENT 2019</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/3CusABouQMaGuA5Sex7qiw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/dtE_VRNoi_HawfvU-cgjKw (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/dtE_VRNoi_HawfvU-cgjKw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/iPEI6TI8cLC9oPFZWbv63Q (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/iPEI6TI8cLC9oPFZWbv63Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/kSyp5XQfiV48lXfcX0YY2w.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 900000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '13:00', '13:00', 3, 1, 6, 186, 2, 'active', NULL, '2022-03-02 03:46:05', '2022-04-11 07:14:22'),
(62, 'SUZUKI XL7 2020', '<pre>Xe suzuki xl7 7 chỗ 2020 đời mới tiện nghi. Th&iacute;ch hợp đi du lịch. Gia đ&igrave;nh đi chơi. Đi tiệc</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/bayVT2zAS-k4JtUHkkxiPA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/HcJtQudQkbHam77Io62fnA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/nNqZzPcDfkmAA-_PMXb2Eg.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 970000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '16:00', '16:00', 3, 1, 9, 195, 2, 'active', NULL, '2022-03-02 03:49:08', '2022-04-11 08:07:27'),
(63, 'KIA CERATO 2019', '<pre>xe kia cerato 2019 số tự động. xe mới 100% mới nhận xe trong th&aacute;ng 6 .nội thất cao cấp. sang trọng. th&iacute;ch hợp cho mọi người đi du lịch. tiệc t&ugrave;ng. l&agrave;m xe hoa. cưới hỏi. \r\nmọi người c&oacute; nhu cầu li&ecirc;n hệ m&igrave;nh nha. mr V&acirc;n</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/_2s96dvDgjUkrp8n4FO7lA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/8K9aWEoBtzhww1AwzF_KpQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/46O3Du6znwR4o36qc-I-Sg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/t_NxydPFrkLqFLrff7FW8A.jpg,', 5, 'Gray', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '11:00', '11:00', 2, 1, 10, 191, 2, 'active', '2022-04-13', '2022-03-02 03:53:12', '2022-04-13 09:36:00'),
(64, 'FORD FIESTA 2017', '<pre>FORD FIESTA 2017, số tự động</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/5pEwJMw2fkIxIx0TVfdNDg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/5WWogBujhlLnl57oUsC2mQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/9doZA09htMLU98GMvliZDA.jpg,', 4, 'Gray', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '11:00', '11:00', 3, 1, 8, 185, 2, 'active', NULL, '2022-03-02 03:55:27', '2022-04-10 18:30:14'),
(65, 'KIA SORENTO 2018', '<p>KIA SORENTO 2018 Xe mới xe gia đ&igrave;nh, bảo quản thường xuy&ecirc;n&nbsp;</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0s6F9TPv-zYtLAVjDSoB-A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/drAoKXDH71KwU77i1WKcaQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/gUytIBCC63oPI0yO4pLOXw.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 1100000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '10:00', '10:00', 3, 1, 10, 192, 2, 'active', NULL, '2022-03-02 03:57:44', '2022-04-11 07:51:14');
INSERT INTO `la_cars` (`id`, `name`, `description`, `photo`, `seat`, `color`, `make`, `fuel`, `power`, `gearbox`, `luggage`, `price`, `service_charge`, `insurance_fees`, `discount`, `address`, `latitude`, `longitude`, `terms_of_use`, `rules`, `start_date`, `end_date`, `start_time`, `end_time`, `users_id`, `categories_id`, `renders_id`, `city_id`, `range_of_vehicle`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(66, 'FORD FIESTA 2017', '<p>FORD FIESTA 2017, số tự động</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5pEwJMw2fkIxIx0TVfdNDg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/5WWogBujhlLnl57oUsC2mQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/9doZA09htMLU98GMvliZDA.jpg,', 4, 'Blue', '200', 'petrol', 250, 1, 2, 700000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '13:00', '13:00', 2, 1, 8, 186, 2, 'active', '2022-04-13', '2022-03-02 04:02:15', '2022-04-13 09:36:09'),
(67, 'KIA SORENTO 2018', '<pre>KIA SORENTO 2018\r\nXe mới xe gia đ&igrave;nh, bảo quản thường xuy&ecirc;n </pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/0s6F9TPv-zYtLAVjDSoB-A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/drAoKXDH71KwU77i1WKcaQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/gUytIBCC63oPI0yO4pLOXw.jpg,', 7, 'white', '350', 'petrol', 400, 1, 1, 1100000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '11:00', '11:00', 3, 1, 10, 186, 2, 'active', NULL, '2022-03-02 04:04:40', '2022-04-11 07:52:01'),
(68, 'HYUNDAI GRAND I10 SEDAN 2018', '<pre>huyndai i10 sendan sản xuất 2018 m&agrave;u trắng xe gia đ&igrave;nh ! sạch sẽ !</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/6QXg5D9eb-X3jZmTAQTr3g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7tq3c8at6DxhYegl-wtnjQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Xq2TW1PwZ1-6Jyo5ptFFbA.jpg,', 4, 'white', '450000', '', NULL, NULL, NULL, 550000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '12:00', '12:00', 3, 1, 6, 9, 2, 'active', NULL, '2022-03-02 04:09:12', '2022-03-02 04:09:12'),
(69, 'KIA CERATO 2017', '<p>KIA CERATO 2017</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/8gg61lZay1C6sj1NXLt29Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hn6M-r5ex45bZpqB_KuB-Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Jx-Plzp-627_8CYbUhubNg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/luhYG16hYDDAn4S4KQr-yA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/RTc3FG5kmEBwdNvlRuAnTw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/X_FH7whrbbY2K6TXzdLilw.jpg,', 4, 'Gray', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '12:00', '12:00', 3, 1, 10, 190, 2, 'active', NULL, '2022-03-02 04:12:56', '2022-04-11 07:34:37'),
(70, 'CHEVROLET CRUZE 2013', '<p>Chroverlet cruze 2013 Form đẹp. M&agrave;u v&agrave;ng c&aacute;t. Xe l&ecirc;n nhiều đồ chơi: M&agrave;n android, youtube, 4g, ph&aacute;t wiffi. Loa Sub. Đ&egrave;n bi xenon ban đ&ecirc;m cực s&aacute;ng Xe Mỹ n&ecirc;n đi đường trường bao đằm. 6l/100km</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/CSdK4tXO5ftgXSURaWpoig.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pycIftjtrW3FsHfWJ0ewoA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/R-btWDDXtDYfEJWlfor2MQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/rfbBVnz-1uCJ7g4A8yMjVQ.jpg,', 5, 'Gray', '200', 'petrol', 250, 250, 1, 640000, 0, 0, 0, 'Lâm Đồng', 0, 0, '15 triệu (tiền mặt/chuyển khoản cho chủ xe khi nhận xe)\r\nhoặc Xe máy (kèm cà vẹt gốc) giá trị 15 triệu', '1. Chấp nhận Hộ khẩu Thành phố/KT3 Thành phố/Hộ khẩu tỉnh/Passport (Bản gốc) (Giữ lại khi nhận xe)\r\nCMND và GPLX đối chiếu\r\n2. Tài sản đặt cọc (1 trong 2 hình thức)\r\n- Xe máy (giá trị >15triệu) + Cà vẹt (bản gốc)\r\n- Hoặc cọc tiền mặt 15 triệu.\r\n\r\n* Quý kh', '2022-03-02', '2022-03-03', '12:00', '12:00', 2, 1, 1, 192, 2, 'active', '2022-04-13', '2022-03-02 04:15:28', '2022-04-13 09:35:50'),
(71, 'TOYOTA INNOVA E 2014', '<pre>TOYOTA INNOVA E 2014</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/KN2EOuvxYyIDGRIjehzeZw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pz7tngZ5bkHOQskSd9jXaA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/T7YivUGcsVmOUHaY8PJhrg.jpg,', 8, 'Gray', '200', 'petrol', 250, 1, 1, 900000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '23:00', '13:00', 3, 1, 2, 193, 2, 'active', NULL, '2022-03-02 04:18:51', '2022-04-11 08:08:43'),
(72, 'MORRIS GARAGES HS 1.5T LUX TROPHY 2021', '<p>Xe MG hs với đầy đủ trang bị, phanh tay điện tử, auto hold, cảnh b&aacute;o điểm m&ugrave;. Xe mạnh với 160 m&atilde; lực. Ghế ngồi thể thao rộng r&atilde;i</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/CjD2Y2U9r_OkAd6w6Jzanw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/dd9rQkb-xAJTqlNFC6SiCw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/huG3MWCp21q2ZZgvhX8Gzw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Zln-Wk616pV-J8sxa4Dj0Q.jpg,', 5, 'white', '200', 'petrol', 250, 1, 1, 1170000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '12:00', '12:00', 2, 1, 13, 183, 2, 'active', '2022-04-13', '2022-03-02 04:22:42', '2022-04-13 09:35:43'),
(73, 'MAZDA 3 2020', '<p>Mazda3 all new số tự động đăng k&iacute; th&aacute;ng 12/2020 Xe gia đ&igrave;nh mới đẹp, nội thất nguy&ecirc;n bản sạch sẽ, b&atilde;o dưỡng thường xuy&ecirc;n, rửa xe miễn ph&iacute; cho kh&aacute;ch. Xe rộng r&atilde;i an to&agrave;n, tiện nghi, ph&ugrave; hợp cho gia đ&igrave;nh du lịch. Xe trang bị hệ thống cảm biến l&ugrave;i, gạt mưa tự động, đ&egrave;n pha tự động, hệ thống giải tr&iacute; c&ugrave;ng nhiều tiện nghi kh&aacute;c...</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/BjV7hSAYUVos1wIuxe1SOQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/cT8242IHhprwPqA8MIsp9A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/dis4k5dD-gj0iZIl1xjbYA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/JuwR62JgZAUoVAUyATzR6Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/M6q10SJ1GnmCARKAF40-bQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/n4BVWfFbOm9Deh_UAUU1qg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/OhdIVwavHCBtdpIqqMO6AQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/p7hmJr3AzrsBdSXwA-T1ow.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pnNkWCeGfSSXELOD5NvtEQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uocfj_hJDWjiQaIHSCyzKg.jpg,', 5, 'Gray', '200', 'petrol', 250, 1, 1, 900000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '13:00', '13:00', 2, 1, 11, 186, 2, 'active', '2022-04-13', '2022-03-02 04:26:08', '2022-04-13 09:35:39'),
(74, 'MORRIS GARAGES HS 1.5T LUX TROPHY 2021', '<pre>Xe MG hs với đầy đủ trang bị, phanh tay điện tử, auto hold, cảnh b&aacute;o điểm m&ugrave;. Xe mạnh với 160 m&atilde; lực. Ghế ngồi thể thao rộng r&atilde;i</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/CjD2Y2U9r_OkAd6w6Jzanw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/dd9rQkb-xAJTqlNFC6SiCw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/huG3MWCp21q2ZZgvhX8Gzw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Zln-Wk616pV-J8sxa4Dj0Q.jpg,', 5, 'Gray', '200', 'petrol', 250, 1, 1, 1170000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '13:30', '13:30', 3, 1, 13, 189, 2, 'active', NULL, '2022-03-02 04:29:31', '2022-04-11 08:05:22'),
(75, 'HONDA CITY 2017/10', '<p>HONDA CITY 2017</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/12e4lMJbseYM-ztNm7uzSA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/j7ql5aZTIDu9An3jtJ1lRw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/MvcUIAKnDXFyErjwmRWBkA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/zym_ZKnjD5LuqvHXsnJczQ.jpg,', 4, 'Gray', '200', 'petrol', 260, 1, 1, 700000, 0, 0, 0, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-02', '2022-03-03', '12:00', '12:00', 2, 1, 3, 186, 2, 'active', '2022-04-13', '2022-03-02 04:34:20', '2022-04-13 09:35:12'),
(76, 'HYUNDAI ELANTRA 2018', '<p>HYUNDAI ELANTRA 2018</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/3pA1NOBp2Gq4VI9ZrV2FTw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7GfTM6Jhav62s1lryCiaEw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/51QKgfKs8f6YPeO89OiREw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/LwUjdK_JfMGWkYOCLSSHCQ.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 25, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 6, 38, 1, 'active', NULL, '2022-03-09 02:47:56', '2022-04-11 07:18:40'),
(77, 'KIA CERATO 2020', '<p>Kia Cerato AT 1.6 Luxury đăng k&yacute; 10/2020. Nội thất đầy đủ, rộng r&atilde;i, tho&aacute;ng m&aacute;t, sạch sẽ, c&oacute; cửa sổ trời</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/7YEPif4r2ygGWmPrrssY3w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/9Smn7auA1Jf359ZYYJV33w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fiMaJfvdhjBCP-qFoIC2Pw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/k-Rl74E6ClO_whzc6tWkNQ.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 10, 38, 1, 'active', NULL, '2022-03-09 02:50:29', '2022-04-11 13:57:02'),
(78, 'TOYOTA VIOS G 2018', '<pre>TOYOTA VIOS G 2018</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/1u0PyNCl_EMGUa1GBontPA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Dr5vjU4FOTbwsKqkJXZTMA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fhyEuxDPOkvd8XyUx5uUrg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/GD463ycR4Y9shqJ-QEy54A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/HenWpwaHqtfSCJvUsehZdw.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 2, 45, 1, 'active', NULL, '2022-03-09 02:54:44', '2022-04-11 14:14:46'),
(79, 'HONDA CITY 2017', '<p>HONDA CITY 2020</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/aJ4oOk_WajIKufz6lCPl3g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Ge1zaSvlqLbkmrMJJtk9fA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/H595kZY10eKB80vw_BNB_A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/s5EbME2x2dNt8Nl1uunIwA.jpg,', 4, 'Gray', '300', 'petrol', 350, 1, 1, 850000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 3, 10, 1, 'active', NULL, '2022-03-09 02:57:10', '2022-04-11 14:43:35'),
(80, 'TOYOTA VIOS G 2019', '<p>TOYOTA VIOS G 2019</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/9JBfa_r4LbWcdWaDANrvNg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/CdUGwLRxCTwNC6NL1naoMg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/KzynvVOf7N-0852DlW_2rQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ylTWB45EMtrD888aGjfPnQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/YvED3sxNzx3MOYRVUBdrSQ.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 700000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 2, 29, 1, 'active', NULL, '2022-03-09 02:59:18', '2022-04-11 14:15:22'),
(81, 'VINFAST FADIL 2020', '<p>Vinfast Fadil đăng k&iacute; mới th&aacute;ng 7 năm 2020 Xe gia đ&igrave;nh ,sạch sẽ mới đẹp. Đầy đủ cam l&ugrave;i v&agrave; m&agrave;n androi giải tr&iacute; Giao xe tận nơi</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/7KL__cy_pxfMAnBIb8lkxQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/9D1zcOCZonVhGBGLexJIZQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/EFeaz7T7ZRu6ywEzErM96w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/wd9lc3rg47R-GdzhJpvZ3Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Y3ZV6ONBZy9HWQ380a5jQg.jpg,', 4, 'white', '250', 'petrol', 300, 1, 1, 580000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '22:00', '22:00', 6, 1, 7, 39, 1, 'active', NULL, '2022-03-09 03:01:10', '2022-04-11 14:18:49'),
(82, 'MAZDA 3 2021', '<p>Mazda 3 đời 2021 BrandNew.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/CbUdYZBldufk6qsr-LjGkg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/J8nLT1mdFKpwhIv_enC0eQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Nipt520P8sKSskHk46VDwQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/RdAYee0_PIFOrLXQxOefcw.jpg,', 5, 'Red', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 11, 41, 1, 'active', NULL, '2022-03-09 03:17:29', '2022-04-11 14:04:22'),
(83, 'KIA SORENTO 2020', '<p>KIA SORENTO 2020</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/gy9Qik3plxvfJpRzmQ3_aw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/HBVcYyyxAqS67kAmfkcGGA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/leIq4-zcmDhBXwQUMgrCWw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tUBZB2Pq9T_ZdHiulAbW7g.jpg,', 7, 'Gray', '300', 'petrol', 350, 1, 1, 1250000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 10, 27, 1, 'active', NULL, '2022-03-09 03:19:40', '2022-04-11 14:03:10'),
(84, 'KIA MORNING SI 2015', '<p>Kia Morning số s&agrave;n tiết kiệm xăng, xe nhỏ gọn, ph&ugrave; hợp cho cả c&aacute; nh&acirc;n v&agrave; gia đ&igrave;nh trong mọi lộ tr&igrave;nh. Xe sạch sẽ, đầy đủ tiện nghi.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/h1RPE6YDI92W2ZWQRkhoTQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pj1RkpxOizZ5dIaRQNqNLQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tWfw4InKJoWdjS3oVF6dJw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/z-2Xl7-DDHZNbnYl6f_Rxg.jpg,', 4, 'white', '250', 'petrol', 300, 1, 1, 450000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 10, 43, 1, 'active', NULL, '2022-03-09 03:21:47', '2022-04-11 14:02:29'),
(85, 'VINFAST FADIL 2020', '<pre>Fadil l&agrave; d&ograve;ng xe 4 chỗ. Ph&ugrave; hợp cho gia nhỏ đi chơi, c&ocirc;ng t&aacute;c. Gi&aacute; rất ph&ugrave; hợp, tiết kiệm nhi&ecirc;n liệu....</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/_yMQpEj1letZD6WXoUIRcw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/HdwDUnAVIOvxC2rLeMbQBg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/wkZINRPMwTbIAiEzZ-OFYg.jpg,', 4, 'white', '250', 'petrol', 300, 1, 1, 600000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 7, 28, 1, 'active', NULL, '2022-03-09 03:23:54', '2022-04-11 14:19:21'),
(86, 'VINFAST FADIL 2019', '<p>VINFAST FADIL 2019</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/Cu2XdoPgfoxAWMNUQ9-_Vw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hlN_PfOQ0CJGxspv7H0N6g.jpg,', 4, 'white', '250', 'petrol', 300, 1, 2, 600000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 6, 1, 7, 44, 1, 'active', NULL, '2022-03-09 03:25:58', '2022-04-11 14:16:28'),
(87, 'VINFAST FADIL 2019', '<p>VINFAST FADIL 2019</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0bx4tpHRIf-vl5l3ibkF2g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/jlg99RDKWAzmewD-d8bLZw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZymPxV2WimFzTADhZi_i5Q.jpg,', 4, 'Red', '250', 'petrol', 300, 1, 1, 600000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '22:00', 3, 1, 7, 30, 1, 'active', NULL, '2022-03-09 03:27:57', '2022-04-11 14:17:26'),
(88, 'MITSUBISHI XPANDER 2020', '<p>MITSUBISHI XPANDER 2020</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/6bs5qkM54m6sQn2JCMhGeA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BU46M41wVgWRmPgQ0uFQjg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZAUoEsEj9mYKRWOu0LkqkA.jpg,', 7, 'Gray', '250', 'petrol', 300, 1, 1, 1000000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 6, 1, 12, 53, 1, 'active', NULL, '2022-03-09 03:30:03', '2022-04-11 14:07:40'),
(89, 'TOYOTA INNOVA G 2015', '<pre>innova G số tự động ...thần th&aacute;nh....</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/cNudcrbwOoL5liGNscYUfQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/WnyqlpnYA6FaeeSpEhy0MQ (1).jpg,', 7, 'Gray', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 2, 37, 2, 'active', NULL, '2022-03-09 03:32:31', '2022-04-11 14:13:37'),
(90, 'HONDA CITY 2016', '<pre>xe honda city số tự động xe gia đ&igrave;nh nội thất đẹp xe lu&ocirc;n rửa sạch sẽ  giao xe tại nh&agrave; kh&aacute;ch miễn ph&iacute;</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/996NRKAeH5iJrSZx27q8lg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/aXm_czBhj0Hatj7tGJ69FQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/CdyWq4U059fXfEOR7li6UQ.jpg,', 4, 'Gray', '300', 'petrol', 340, 1, 1, 800000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 2, 1, 3, 37, 2, 'active', '2022-04-13', '2022-03-09 03:34:42', '2022-04-13 09:35:01'),
(91, 'MITSUBISHI XPANDER 2020', '<p>MITSUBISHI XPANDER 2020</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/BZvfFwjYzXexUsrvpd3Zbw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/jbXK6EDAfDoeODooOn7dEA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/O1Vpkb-e772FuFkTMMQZaA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/WNs2OreF1VKkMEGqqc3LFA.jpg,', 7, 'Gray', '250', 'petrol', 300, 1, 1, 1000000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 6, 1, 12, 47, 2, 'active', NULL, '2022-03-09 03:36:46', '2022-04-11 14:08:18'),
(92, 'TOYOTA INNOVA 2016', '<p>TOYOTA INNOVA 2016</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5jb-wC1YKD8zzsJWKhj48Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7ZGL0VgsJp4lT677egGRQg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/jDWVbqSJGJv4AgugB2W8DQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZYmENEVoOwBZLOkAt8xpBA.jpg,', 8, 'Gray', '200', 'petrol', 350, 1, 1, 740000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 2, 39, 2, 'active', NULL, '2022-03-09 03:39:09', '2022-04-11 14:13:02'),
(93, 'VINFAST FADIL 2019', '<p>Vinfast fadill bản Base, đăng k&iacute; 12/2019 Xe gia đ&igrave;nh sạch sẽ, c&oacute; thể giao xe tận nơi cho kh&aacute;ch</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/3Fpa5PMFIeOaCjHYfyK5jA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/e_C1KSUdgsWfd46bV7h8eA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/P1v5wSD-w1SiV6cBT_-4zQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tloEK2ms9_R6YkkoN_kgMQ.jpg,', 5, 'Red', '300', 'petrol', 350, 1, 1, 580000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 7, 42, 2, 'active', NULL, '2022-03-09 03:41:33', '2022-04-11 14:18:15'),
(94, 'TOYOTA VIOS E 2014', '<pre>TOYOTA VIOS 2014 mới v&agrave; đẹp</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/_kc4BqxGRdHDpotL6td0sw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-_M5-pBYa22_7ZPj5cPRuQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/3kz9agKieH7NNZBirMBsJA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/9JBDUSoyKjEbVpWmRS64Dg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/E6ZAHWimcRKdSmAD2hSi5A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/e9GvkyurkBbBSkVw79WK9Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/heiIhATLkzieWUsd5FdJrg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/iTuCjHRSkOU-cE4FW2gSLg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/kmbStQoolXEmirLXRKlSCg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/VCsKDJDeysDrnANx-cy0Lw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Z2XaWa4SP1TqyhplUAdRZQ.jpg,', 4, 'Gray', '250', 'petrol', 300, 1, 1, 850000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 2, 25, 2, 'active', NULL, '2022-03-09 03:44:23', '2022-04-11 14:14:13'),
(96, 'VINFAST FADIL 2022', '<p>xe gia dinh. dep sach sẽ</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/clQ1nbM6z56tFrR1kRmQog.jpg,https://yotrip.vn/public/backend/uploads/images/cars/QGv-e8aNBSWCjVrqb0SY1g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/QKPijUcMYVrEvQ-7x2rXFA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/s3HjsdE_vUqJdCmjgq_gxw.jpg,', 4, 'Red', '300', 'petrol', 350, 1, 1, 440000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 7, 43, 2, 'active', NULL, '2022-03-09 03:49:34', '2022-04-11 14:21:02'),
(97, 'MAZDA 3 2017', '<pre>MAZDA 3 2017 full option</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/f2ijdQ17PjdjEDbPsWCWaA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/JPTTxRhVq6-hzCvDv42ZVw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/KSuE6xfmX-z1rW-mxDpX6g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/mIHc-ggaGylCMGxFlT0D_Q.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 999000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 11, 50, 2, 'active', NULL, '2022-03-09 03:51:55', '2022-04-11 14:03:51'),
(98, 'MITSUBISHI XPANDER 2019', '<pre>Mitsubishi Xpander đời 2019 SỐ S&Agrave;N m&agrave;u trắng\r\nVui l&ograve;ng kh&ocirc;ng h&uacute;t thuốc tr&ecirc;n xe. Phạt 500.000/ lần\r\nKh&aacute;ch đi xe vui l&ograve;ng thanh to&agrave;n 70.000 chi ph&iacute; rửa dọn xe sau chuyến đi</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/6Xh5UQDTpE9TrGe9Mk0RlA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/bp_QIDbYtiXsUsh22AAFJA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/nVyvoBZgkm-0XTNWhVo7wA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Qgn3K7O5CmbeXiyD9jfiEA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/WkFR9v8nbr3wLxkzYMMOvA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZHrB96bi25vU6Px4urPOeg.jpg,', 7, 'white', '300', 'petrol', 350, 1, 1, 899000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '22:00', '22:00', 3, 1, 12, 51, 2, 'active', NULL, '2022-03-09 03:54:03', '2022-04-11 14:07:04'),
(99, 'KIA CERATO 2021', '<p>Kia CERATO 2.0 2021(Premium) l&agrave; phi&ecirc;n bản cao cấp nhất. FULL T&Uacute;I KH&Iacute;, 2 ỐNG XẢ, Đ&Egrave;N LED, M&Aacute;Y 2.0,&hellip; Xe gia đ&igrave;nh sạch sẽ. TOP xe uy t&iacute;n tại H&agrave; Nội. Bản cao cấp nhất , duy nhất tại Mioto.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/JsVwvOv7RYNMDsTugtETfw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/mgJXRgBeQD5ZuwdI2p5T7w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Q4zCj1tRWhKvJeLyB2RiuQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/QJusxNKainvK0qbkLMFUCg.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 885000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '22:00', '22:00', 3, 1, 10, 28, 2, 'active', NULL, '2022-03-09 03:57:09', '2022-04-11 13:58:33'),
(100, 'SUZUKI XL7 2020', '<p>Suzuki XL7 số tự động m&agrave;u trắng đăng k&yacute; th&aacute;ng 12/2020 Xe gia đ&igrave;nh mới đẹp, nội thất nguy&ecirc;n bản, sạch sẽ, bảo dưỡng định kỳ. Xe rộng r&atilde;i, an to&agrave;n, tiện nghi, ph&ugrave; hợp cho gia đ&igrave;nh du lịch. Xe trang bị, camera l&ugrave;i, cảm biến l&ugrave;i, camera h&agrave;nh tr&igrave;nh, đ&egrave;n pha định vị tự động, hệ thống giải tr&iacute; đầy đủ c&ugrave;ng nhiều tiện nghi kh&aacute;c</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0DbsvYNMcSQbfPXnabt3wg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/PFRvISDT0PcbqPDzl4ZpPQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/QnlUSiETrfdLAPJHOEj92Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/SczOYulpaEOP0pJNidrTFA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TbYLXE3cpZFpbvNVtj0VLA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZQ34wXS2_4YShwikk9DBiw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZwFdhvJW71hzqpzJXrdiqg.jpg,', 7, 'white', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '22:00', '22:00', 3, 1, 9, 41, 2, 'active', NULL, '2022-03-09 04:00:06', '2022-04-11 14:12:25'),
(101, 'NISSAN SUNNY 2016', '<p>Nissan Sunny xe số s&agrave;n đăng k&yacute; th&aacute;ng 11/2016, xe gia đ&igrave;nh, xe nguyễn bản, bảo dưỡng thường xuy&ecirc;n.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/D3ZR4o0rBLcMzBJrB2ROHA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lvs-IuxEZrR_hlcvV7CQtA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Q7zMeJZnj_QF3szwcAst5A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/yNFk9fezDaoFdgKzhDCTIA.jpg,', 5, 'Gray', '300', 'electricity', 350, 1, 1, 640000, 0, 0, 25, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 15, 52, 2, 'active', NULL, '2022-03-09 04:02:19', '2022-04-18 07:32:49'),
(102, 'MITSUBISHI XPANDER 2020', '<p>MITSUBISHI XPANDER 2020 C&Oacute; T&Agrave;I: Nhận kh&aacute;ch thu&ecirc; xe c&oacute; t&agrave;i đi trong ng&agrave;y. Cảm ơn!</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/fpMtYWTpkUbKEnw5RMTHCQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/KXW7aPyFchdgcPnlm3tGmQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/SsCGNSnwa_aV7wkVKeLG1Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/woRAz_R3mebs8XsNCHZb8w.jpg,', 7, 'white', '300', 'petrol', 350, 1, 1, 850000, 0, 0, 10, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '20:59', '20:00', 3, 1, 12, 30, 2, 'active', NULL, '2022-03-09 04:04:51', '2022-04-11 14:09:25'),
(103, 'MITSUBISHI ATTRAGE 2021', '<p>MITSUBISHI ATTRAGE 2021</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/2qIZAyPojXs6qmEFpmhDjA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/m0cyc5G1bv0inST6wrPq2g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/N_Xp3a8Xc5MtQ3qULBlbiA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/T1DCpHAeKLLBiUceG7XvIQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uTO7oQyrAEW7KLd0C60VBQ.jpg,', 4, 'white', '200', 'petrol', 300, 1, 1, 700000, 0, 0, 10, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 12, 42, 2, 'active', NULL, '2022-03-09 04:09:59', '2022-04-11 14:05:39'),
(104, 'MITSUBISHI XPANDER 2018', '<p>Mitsubishi XPander 2018 AT Xe chạy rất &ecirc;m , c&aacute;ch &acirc;m tốt , dễ l&aacute;i Thick hợp gia đ&igrave;nh đi chơi đi d&atilde; ngoại hoặc đi c&ocirc;ng t&aacute;c Xe ăn &iacute;t xăng n&ecirc;n rất t&iacute;ch kiệm chi ph&iacute;</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/6c1M4T-LNXbISHOc1AdrZw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/cV5Hvt9Rfu8UGWQs3WsGfw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/H6HMIbpZJfy0HDt0IL763Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/h9xo-p5wmElsmdChpLlmvQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/mpSETPo5Axkh6fQTP6jOjA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/oaQmQIR8Vcfr3cdrKMEkGA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/S6RqaG4OtmlvsqY-m3hE1w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/v1nk3pHU15TI6K2NP29LyQ.jpg,', 7, 'white', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 20, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 6, 1, 12, 40, 2, 'active', NULL, '2022-03-09 04:13:03', '2022-04-11 14:06:20'),
(105, 'VINFAST FADIL 2021', '<p>Vinfast Fadil xe số tự động xe mới chạy từ h&atilde;ng ra, đăng k&yacute; lần đầu 12/2021. Xe gia đ&igrave;nh, nội thất c&ograve;n mới nguy&ecirc;n, sạch sẽ bảo dưỡng thường xuy&ecirc;n. Xe trang bị: + M&agrave;n h&igrave;nh Androi t&iacute;ch hợp cam l&ugrave;i, bluetooth, vietmap, + Cam h&agrave;nh tr&igrave;nh + Cảm biến &aacute;p xuất lốp + Thảm trải s&agrave;n 6D Xe rộng r&atilde;i, tiện nghi, ph&ugrave; hợp cho gia đ&igrave;nh đi du lịch, về qu&ecirc;, d&atilde; ngoại,&hellip;</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/dJhyKtbB2CYCPrwiu-aWjw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-RvbfZ5UATZ30aREz7moeg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ue7QmPO1wGxYBgM40Y7sLQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Xcz0aqJJ_PC3VPQ2-iQfMw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZlK8SiKlYMiw0l-D4kFHZA.jpg,', 4, 'Black', '300', 'petrol', 350, 1, 1, 560000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 7, 35, 2, 'active', NULL, '2022-03-09 04:15:50', '2022-04-11 14:19:51'),
(106, 'SUZUKI ERTIGA 2016', '<p>suzuki ertiga nhap khau .so tu dong . xe gia dinh 7 cho rong r&atilde;i . chay tiet kiem xang</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/AlQZHhxAk2WyfiXDGg2JdQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/HcnLLKCYUxlTOWvrqiMbjA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/JoKcwzi9YuqOkwiskyKsTQ.jpg,', 7, 'Gray', '300', 'petrol', 350, 1, 1, 695000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 9, 46, 2, 'active', NULL, '2022-03-09 04:18:00', '2022-04-11 14:11:03'),
(107, 'SUZUKI VITARA 2014', '<div class=\"group\">\r\n<div class=\"ctn-desc-new\">\r\n<ul class=\"features\">\r\n<li>&nbsp;Nhi&ecirc;n liệu:&nbsp;Xăng</li>\r\n<li>&nbsp;Mức ti&ecirc;u thụ nhi&ecirc;u liệu:&nbsp;9&nbsp;l&iacute;t/100km</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div class=\"group\"><span class=\"lstitle-new\">M&Ocirc; TẢ</span>\r\n<div class=\"ctn-desc-new\">\r\n<pre>=&gt;&gt; Vui l&ograve;ng đọc phần lưu &yacute; cuối của m&ocirc; tả, xin cảm ơn.\r\nGrand Vitara 2014\r\n- Xe h&agrave;ng nhập nguy&ecirc;n chiếc, c&ugrave;ng ph&acirc;n kh&uacute;c với Mazda Cx5 bản full, nhưng chắc xe v&agrave; c&aacute;ch &acirc;m hơn nhiều.\r\n- Số tự động, gầm cao, m&aacute;y khoẻ chạy &ecirc;m.\r\n- Nội thất sạch sẽ.\r\n- Xe gia đ&igrave;nh, bảo dưỡng v&agrave; rửa xe thường xuy&ecirc;n.\r\n- Điều ho&agrave; tự động, 2 d&agrave;n lạnh r&eacute;t run.\r\n- Đầu android ,ph&aacute;t wifi, xem youtube, bản đồ dẫn dường..vv\r\n- Camera h&agrave;nh tr&igrave;nh, camera l&ugrave;i đầy đủ.\r\n- Chống ồn,chống n&oacute;ng cao cấp.\r\n\r\n*Lưu &yacute;:\r\n- Nếu đặt xe v&agrave;o cuối tuần ( T7 hoặc Chủ Nhật ) vui l&ograve;ng đặt tối thiểu 2 ng&agrave;y trở l&ecirc;n.\r\n- Xe c&oacute; dịch vụ giao nhận tại nh&agrave; của qu&yacute; anh/chị v&agrave; ph&iacute; giao nhận l&agrave; 15k/km ( bao gồm cả 2 chiều đi - về). Số km được t&iacute;nh từ địa chỉ: Số 5 phố L&aacute;ng Hạ, phường Th&agrave;nh C&ocirc;ng, quận Ba Đ&igrave;nh, H&agrave; Nội.</pre>\r\n</div>\r\n</div>', 'https://yotrip.vn/public/backend/uploads/images/cars/AMWpWA3D8PWIQIvAI8ysRg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/MBQMTGpl7bPDqfZmM4yyxQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/OCvJDd9DuxsQFh4fXp3v7Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/R1772esTSHz9VfL5XHOrCg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/swZK8Fq5vrP8xeuhYCYEqQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/yYhXFADYc0qaWum7mYIIGQ.jpg,', 6, 'Red', '300', 'petrol', 350, 1, 1, 749000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 9, 40, 2, 'active', NULL, '2022-03-09 04:20:37', '2022-04-11 14:11:46'),
(108, 'MAZDA CX5 2018', '<pre>Mazda cx5 2.5 bản full. Xe giữ g&igrave;n sạch sẽ. Sang - xịn - mịn, th&iacute;ch hợp đi gia đ&igrave;nh hoặc c&ocirc;ng việc xa gần.</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/1VC9M6RmfJR9gTt2A29JoQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/4RN-uDnbBtvZe2dLN4-dag.jpg,https://yotrip.vn/public/backend/uploads/images/cars/4wrDbaewzzvnXf_kxKFn2w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/bw66qsQ1vQI6x6FAngXUEQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/UhUE5D-kNn_iKkJAwhGEbg.jpg,', 6, 'Gray', '300', 'petrol', 350, 1, 1, 1000000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 11, 29, 2, 'active', NULL, '2022-03-09 04:23:15', '2022-04-11 14:04:55'),
(109, 'TOYOTA VIOS G 2019', '<p>Xe Toyota Vios G nội thất nguy&ecirc;n bản sạch sẽ. 5 chỗ ngồi rộng r&atilde;i,c&oacute; trang bị camera l&ugrave;i</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/6pK_J9TTmI-rQa0AwM7kwQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/aT-VNBwn8wHAGsIzUaoCgg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/eWyQ1GnI5lyovZZwwr3-_A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/przII2fmbC3v32gqy07r2A.jpg,', 5, 'Gray', '350', 'petrol', 400, 1, 1, 700000, 0, 0, 0, 'Hà Nội', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:59', '20:00', 3, 1, 2, 27, 2, 'active', NULL, '2022-03-09 04:25:42', '2022-04-11 14:15:53'),
(110, 'MITSUBISHI XPANDER 2019', '<pre>MITSUBISHI XPANDER 2019</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/AhXzq2y7EkZrZXZsKCt_hw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/AmL2neytOxKFkM2NjXezOA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/CoUp8AaAhOvHVB4_yMxcIg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/EerKc6USn5SVuyec9yVlsA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/LWR-m9oQJRAerL19P3Yf8g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-OTAy64wnX2Wspi5bObsfA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-qSbGDEu0Ig9tPVkLQn4IA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/RSsZv9CRyBBQBw-t-afUUA.jpg,', 7, 'Red', '450', 'petrol', 500, 1, 1, 680000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '20:00', '20:00', 3, 1, 12, 60, 1, 'active', NULL, '2022-03-09 04:31:18', '2022-04-11 13:01:57'),
(111, 'CHEVROLET ORLANDO 2018', '<p>chevrolet orlando xe gd n&ecirc;n c&ograve;n rất mới v&agrave; nội thất th&igrave; đẹp,rộng r&atilde;i v&agrave; an toan</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5NMbyzUCrwfLM_SlDmbuxg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/6ap1bc7U6MtniiFV8rMENQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/EL_QCk3H_fduUdUH5hHxaw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/P6WfuC-NkFVKfvZz6XIedQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Ql4QoZrmdH8KcosboaFe-Q.jpg,', 7, 'white', '300', 'petrol', 350, 1, 1, 760000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 2, 1, 1, 55, 1, 'active', '2022-04-13', '2022-03-09 04:36:00', '2022-04-13 09:34:54'),
(112, 'TOYOTA INNOVA E 2014', '<pre>TOYOTA INNOVA E 2014</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/2b9KkLYtAVnhQmiuC0_ALQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/4SIwgCUC8NC4oH05kONBcg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/E8mItrtp-UfcDsDJKAsdlQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Plr9IbYhjjy6NT-ikhPkgQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/q4Gx_M_mII0t2IrNkfXs8Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/QDIlG0NRdWgrERdYrDrr2Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/wlQRFslH-NmWG94GOxuHwQ.jpg,', 7, 'organ', '250', 'petrol', 300, 1, 1, 800000, 0, 0, 10, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:00', '20:00', 3, 1, 2, 55, 1, 'active', NULL, '2022-03-09 04:39:06', '2022-04-11 13:33:59'),
(113, 'MAZDA CX5 2015', '<pre>xe mới,m&aacute;y &ecirc;m nội thất mới,phục vụ chuy&ecirc;n nghiệp.</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/fuuPR-mU84woxUw7hZqPfw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/HjGLjgx7n3A7onzFRfTDsA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/l-zk4RHrx6ueDe6Oh-VU5w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/qtJU2PRsqaqj1CThFYrbnQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/VnXxpJKznKzzlH9gzlSu3A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZIQvA1FEfziQp0nzGJazyA.jpg,', 5, 'Gray', '300', 'petrol', 350, 1, 1, 1000000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-09', '2022-03-10', '21:30', '21:30', 3, 1, 11, 56, 1, 'active', NULL, '2022-03-09 13:25:34', '2022-04-11 09:54:44'),
(114, 'KIA CERATO 2019', '<p>Kia Cerato số tự động 1.6 đăng k&yacute; cuối năm 2019. Xe gia đ&igrave;nh mới đẹp, m&agrave;u trắng, nội thất nguy&ecirc;n bản, sạch sẽ, bảo dưỡng thường xuy&ecirc;n, rửa xe miễn ph&iacute; cho kh&aacute;ch.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0sPgh2YUPfS9Xn7TLcrhgg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BRqzokyG6LqgAVA6JYYO5A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/daI72CWhu7yU_VlgMq-Chg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/goxdu24FQAZCgYZfv_l-Sw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/kQWUVgBoaOvrL8qImv81cQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/M15FK9KE-2L1aPu3aDGaGw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/noDXQ0ZPsoAQ3KyxlMAhOg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/S1mtWl-yhz4vfqSukdnhaA.jpg,', 4, 'white', '350', 'petrol', 400, 1, 1, 850000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 10, 60, 1, 'active', NULL, '2022-03-11 01:25:46', '2022-04-11 07:40:38'),
(115, 'HYUNDAI ELANTRA 2018', '<p>Huyndai elantra 2.0 số tự động xe mua th&aacute;ng 7/2018.xe bảo dưỡng thường xuy&ecirc;n.lu&ocirc;n vệ sinh sạch sẽ.Xe đầy đủ cảm biến trước sau camera de</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5uWaFcgPLsogmKcdB7IQ1A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/d-AYBAz-nd5ul0dVqkY1WA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/HqUS8jo2d1cULIDpV4NrRQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Ke-7eefw4hzSqnmP8dQabg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/oTGGZ5zxXhf1MBpc-18jXA.jpg,', 4, 'white', '250', 'petrol', 300, 1, 1, 800000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '20:00', '20:00', 3, 1, 6, 56, 1, 'active', NULL, '2022-03-11 01:28:34', '2022-04-11 07:19:19'),
(116, 'MITSUBISHI XPANDER 2019', '<p>MITSUBISHI XPANDER 2019, số tự động</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5sp6LXMY8UCvSeP5WVbjhw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/5ytoUsyWcXL1dVPsNt1mIA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/g_pfXLFTwT0oGEHr8e1HCg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/yqkQofqj4vZxFghq8ImnBA.jpg,', 7, 'white', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 12, 55, 1, 'active', NULL, '2022-03-11 01:30:41', '2022-04-11 13:02:49'),
(117, 'MAZDA 3 2017', '<p>Mazda 3 tự động, sản xuất 6.2018 Cruise Control, phanh tay điện tử,... Xe gia đ&igrave;nh kh&ocirc;ng m&ugrave;i Th&ecirc;m xe Ford Everest 2018 titanium 1.2 triệu/ng&agrave;y [sdt]</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0YfwGphw86Ei8lAbbdQSyQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/10XPuc7rdQrFoIyG5i2Q2w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/AI76R3MbdDisPBNzS--arQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/cieH9YBFgbQP7cIsfZ1Izw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/eA4a0uK8RY86B1bFxCSSwQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/El2EPmjo2AF3XfOgNwjHOw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/NQQJ3aXLs7_wE3BjNW3YgA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vrH8n5QHFWNEQGYaCusDnQ.jpg,', 4, 'white', '250', 'petrol', 300, 1, 1, 939000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 11, 55, 1, 'active', NULL, '2022-03-11 01:33:10', '2022-04-11 09:37:24'),
(118, 'KIA MORNING SI 2017', '<p>Xe Kia Morning đăng k&yacute; lần đầu ch&iacute;nh chủ cuối năm 2018, đầu nằm 2018. Xe d&ugrave;ng gia đ&igrave;nh, bảo tr&igrave;, bảo dưỡng định kỳ thường xuy&ecirc;n. Nội thất sạch sẽ, h&igrave;nh thức b&ecirc;n ngo&agrave;i mới. Hỗ trợ rửa xe, vệ sinh nội thất cho kh&aacute;ch. Giao xe tại tận tay kh&aacute;ch trong tầm b&aacute;n k&iacute;nh 5km.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/hKzlYVQIOtnZGXiC_-2mFA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/JMxAMs-xQ2yD6dzaswBPEA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/r0DgR0KksV9G40gDj3uNBQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/UvzPSivCK--L5JiQoaj-MQ.jpg,', 4, 'white', '250', 'petrol', 300, 1, 1, 600000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 10, 56, 1, 'active', NULL, '2022-03-11 01:35:09', '2022-04-11 09:31:04'),
(119, 'CHEVROLET CRUZE 2017', '<p>Xe chevrolet Cruze 2017 LTZ, ph&acirc;n kh&uacute;c xe hạng C - Số tự động v&agrave; số s&agrave;n 6 cấp - Cửa sổ trời - D&ograve;ng xe hạng C với 6 t&uacute;i kh&iacute; v&agrave; c&aacute;c hỗ trợ an to&agrave;n cao - Xe độ kiểu d&aacute;ng thể thao, black edition m&agrave;u đen sang trọng. - Xe &iacute;t chạy, chỉ mới 3 vạn km. - Bảo tr&igrave; bảo dưỡng chăm s&oacute;c xe thường xuy&ecirc;n - Nội thất mới c&ograve;n thơm m&ugrave;i mới - Xe gia đ&igrave;nh giữ kĩ sạch đẹp - C&oacute; trang bị camera h&agrave;nh tr&igrave;nh - C&oacute; trang bị m&aacute;y phun sương tạo ẩm khử m&ugrave;i, tinh dầu thi&ecirc;n nhi&ecirc;n... - C&oacute; phụ kiện tẩu sạc, c&aacute;p sạc, gi&aacute; đỡ điện thoại đầy đủ - Kh&ocirc;ng giới hạn số km. Kh&ocirc;ng thu phụ ph&iacute; qu&aacute; giới hạn km. - Rửa xe sạch đẹp trước khi giao xe. - Thời gian giao nhận xe t&ugrave;y &yacute; thương lượng, kh&ocirc;ng giới hạn r&agrave;ng buộc.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/EidyYuD0qYt2YUqjJbxETA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/is_VtJ3efl2RTIzVFBLNRg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/NqCLCoFalZK36oEy-L6tiw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Va0zze3q6KrkqRwN1LuXCA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/wwd8xDwiAMA6dDeqxiooXQ.jpg,', 5, 'white', '200', 'petrol', 260, 1, 1, 700000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 6, 1, 1, 62, 1, 'active', NULL, '2022-03-11 01:37:23', '2022-04-10 18:06:45'),
(120, 'HYUNDAI ACCENT 2021', '<p>Huyndai accent phi&ecirc;n bản 2021 số tự động bản ti&ecirc;u chuẩn Mua ng&agrave;y 6 th&aacute;ng 1 năm 2021 xe mới chạy được 3000km kh&aacute;ch h&agrave;ng y&ecirc;n t&acirc;m về chất lượng xe v&agrave; kh&ocirc;ng sợ xe hư giữa đường, v&igrave; xe c&ograve;n mới n&ecirc;n kh&aacute;ch cũng ko lo về vấn đề hao xăng hay chết may hoặc hư hỏng khi đang l&aacute;i xe , phục vụ tốt nhất cho kh&aacute;ch để kh&aacute;ch c&oacute; những chuyến đi th&uacute; vị</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/8vYGYhrfGhgZDrvpOVcDMQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/11IHuNKA5EV2G-l-GiTzdw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/bIgqlrQ7sfsa7PQOn9AjRg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BM1DTyFKkIcspm8feo7uvQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/gdNajVxz8wIXTHE7Z0krPA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/rlnTwN4qPtvPL0BfTZX9hA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/RrpiFeBitvhE-h0lAdQuSQ.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 6, 58, 1, 'active', NULL, '2022-03-11 01:40:17', '2022-04-11 07:17:04'),
(121, 'TOYOTA FORTUNER V 2012', '<pre>TOYOTA FORTUNER V 2013</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/8oWlNzYO3D_whg5jYO5vQQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ELcQknqCp8dNehaqv5Y5pQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/F0qDS81zJhZoiOG6Rg0jmA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hhbKsWD88ZhZSV_hXwtXSQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/jFjbP_8eqZ0iPXS3Sk4w4g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/NR3IICvFkS0Ql2PyM55vUQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TcWDjADl8UxoxFuESD0MRg.jpg,', 7, 'Gray', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 2, 60, 1, 'active', NULL, '2022-03-11 01:43:31', '2022-04-11 13:32:43');
INSERT INTO `la_cars` (`id`, `name`, `description`, `photo`, `seat`, `color`, `make`, `fuel`, `power`, `gearbox`, `luggage`, `price`, `service_charge`, `insurance_fees`, `discount`, `address`, `latitude`, `longitude`, `terms_of_use`, `rules`, `start_date`, `end_date`, `start_time`, `end_time`, `users_id`, `categories_id`, `renders_id`, `city_id`, `range_of_vehicle`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(122, 'CHEVROLET CAPTIVA 2007', '<p>CHEVROLET CAPTIVA 2007</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/d24bVbNbi02UwM3tvu36FA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/EWElEFLwJbllgjs4nBLdEg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/h405Nod_c4i3FSlJt3N2hg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/k0yqlkFTS8mqufMcaxdOVg.jpg,', 7, 'white', '200', 'petrol', 260, 1, 1, 700000, 100000, 50000, 0, 'Đà Nẵng', 0, 0, '15 triệu (tiền mặt/chuyển khoản cho chủ xe khi nhận xe)\r\nhoặc Xe máy (kèm cà vẹt gốc) giá trị 15 triệu', '1. Chấp nhận Hộ khẩu Thành phố/KT3 Thành phố/Hộ khẩu tỉnh/Passport (Bản gốc) (Giữ lại khi nhận xe)\r\nCMND và GPLX đối chiếu\r\n2. Tài sản đặt cọc (1 trong 2 hình thức)\r\n- Xe máy (giá trị >15triệu) + Cà vẹt (bản gốc)\r\n- Hoặc cọc tiền mặt 15 triệu.\r\n\r\n* Quý kh', '2022-03-11', '2022-03-12', '21:00', '20:00', 2, 2, 1, 55, 1, 'active', '2022-04-13', '2022-03-11 01:45:48', '2022-04-13 09:34:50'),
(123, 'MITSUBISHI XPANDER 2018', '<p>Xe mới, c&oacute; bản đồ đ&atilde;n dường online ....</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/1FXZ4C4-BDVgJAIL-2iE6g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/6emvJMeHnQnAGdB71ePg3Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/c4l1kS7P5X4A4dkDyKFc8w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/cPZ4O2aqTIApd9tQFu15Iw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/My6VUawAFRhEbM0jgiM69g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ulWdZ0KF-hiQLZuKkeyXbA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ViVtHDIY6rVHiD925NVeoA.jpg,', 7, 'white', '300', 'petrol', 350, 1, 1, 1000000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 12, 61, 1, 'active', NULL, '2022-03-11 01:48:18', '2022-04-11 13:01:04'),
(124, 'HONDA CIVIC 2018', '<p>HONDA CIVIC 2018</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/gtcsRG7o5w0B6xOgDl3XJg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/N95CRR7gbWG0h1zkmR1xeg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/nC3IW4sNHNTrlttdDCGuPw.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 3, 57, 1, 'active', NULL, '2022-03-11 01:50:40', '2022-04-11 07:10:10'),
(125, 'TOYOTA FORTUNER G 2009', '<p>TOYOTA FORTUNER G 2009</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/rJsBVbhEx8pgEEFPD4L56g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/SLEtS9ppaO15HSQBLnT09Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/YmW3U53lPDEKJmFd7hax7Q.jpg,', 7, 'Black', '300', 'petrol', 350, 1, 1, 920000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 2, 55, 1, 'active', NULL, '2022-03-11 01:52:59', '2022-04-11 13:21:00'),
(126, 'HYUNDAI ACCENT 2020', '<p>Accent 2020 đời mới . tiện nghi cho gia đ&igrave;nh . người c&oacute; c&ocirc;ng việc đi xa. thu&ecirc; xong nhớ vệ sinh d&ugrave;m sạch sẽ. hoặc chủ xe sẽ thu ph&iacute; rửa xe</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/8A5xiU63LJTTqBlGgaYMCg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/37caJOcmxpmntG0uAVCNkQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/LVvYgmFHJtdW5IC25CBbDw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uudnWMjI6NbVmN31_yI9Rg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/XsHD1hbp0NBnRW5C0Xa9Pw.jpg,', 4, 'Red', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 6, 62, 1, 'active', NULL, '2022-03-11 01:55:48', '2022-04-11 07:15:09'),
(127, 'MAZDA 3 2019', '<p>Mazda 3 trắng 2019. 1,5L luxury, xe rất lợi xăng.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/8LPezIsMuB4vp9WNnJBXrQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ci5hywa_h8cenOLQUTcdvg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/LvFtjBU31AU9k1JrXtyOdw.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 900000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '20:00', '20:00', 3, 1, 11, 55, 1, 'active', NULL, '2022-03-11 01:57:51', '2022-04-11 09:41:51'),
(128, 'HYUNDAI GRAND I10 SEDAN 2018', '<p>Huyndai i10 sedan đk th&aacute;ng 9/2018 xe sạch sẽ thơm tho,miễn ph&iacute; rửa xe cho kh&aacute;ch,xe được trang bị full option, cảm biến l&ugrave;i,hệ thống giải tr&iacute; DVD xem được youtube khi đang chạy,cam kết xe nhỏ nhưng c&oacute; v&otilde; ????????</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/H-YayuhRviGmC0uazbYWVA (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/H-YayuhRviGmC0uazbYWVA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/owHe45TaPesYEm0zCi0VwQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/W4zhdmWqxjx4W30YzT4WKg.jpg,', 4, 'white', '250', 'petrol', 300, 1, 1, 650000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 6, 55, 2, 'active', NULL, '2022-03-11 01:59:49', '2022-04-11 07:22:37'),
(129, 'SUZUKI XL7 2021', '<pre>Suzuki XL7 đời 2021 chay rất tiết kiệm nhi&ecirc;n liệu.</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/EP6Dzf3sgE1YgSxXBM7a-Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Hcr1NP5_Q8xk9IZrxA3kRA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Oxa7pWIdJ-u6QLvQqmnKig.jpg,https://yotrip.vn/public/backend/uploads/images/cars/wBcEbb2WDF1YPTXA1tYmnw.jpg,', 7, 'Gray', '350', 'petrol', 400, 1, 1, 900000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 9, 59, 2, 'active', NULL, '2022-03-11 02:02:18', '2022-04-11 13:16:56'),
(130, 'HYUNDAI GRAND I10 SEDAN 2017', '<p>HYUNDAI GRAND I10 Sedan 2017</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/a1TY711LTPbCC1e7oPq3Yw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/KNktFSJEYHm_ifm5odq8_A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/rrDjNCWoYCZf2-CnNJw0iw.jpg,', 5, 'white', '350', 'petrol', 400, 1, 1, 600000, 0, 0, 10, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 6, 61, 2, 'active', NULL, '2022-03-11 02:04:46', '2022-04-11 07:21:46'),
(131, 'KIA RONDO 2018', '<p>Xe moi -đep</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/ANQ_4JHv8JdZvJxj-WaOtg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/PC_Q-Bb0ucX4CTS1BZqzCw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/qxx_TH82OUSILEXMnVz46g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-WKglAift5C8pYLTnTpkHg.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 950000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 10, 57, 2, 'active', NULL, '2022-03-11 02:07:52', '2022-04-11 09:32:05'),
(132, 'KIA RONDO 2018', '<p>KIA RONDO 2018</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/_tuLy2074liuojjhireKlA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/EdoW4fMj1lCMoRxOivYcmg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/H_-AyKRk4Z8bKwwhqNKzjg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pUwXWqlAAi8QZ5zT93kSMg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/SP1DOS7b1SJYzFVYnnbATQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ToFaCFLvrv7TmYjD650b9g.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 820000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 10, 58, 2, 'active', NULL, '2022-03-11 02:11:17', '2022-04-11 09:33:29'),
(133, 'TOYOTA INNOVA E 2018', '<p>xe innova đời mới. full nội thất. c&oacute; camera h&agrave;nh tr&igrave;nh. kết nối wifi. nước uống khăn lạnh miễn ph&iacute;.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/eihr9pOdRXf6PBLUzKPrtQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/M56TvWp-YWCPsAXiUgWmug.jpg,https://yotrip.vn/public/backend/uploads/images/cars/sDfDLyne3I68R2-YEGHotQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/WqdB7P7E-k6dhGnVAUz9Ww.jpg,https://yotrip.vn/public/backend/uploads/images/cars/yddFgPX7l6flK_e9di3GXg.jpg,', 8, 'white', '300', 'petrol', 350, 1, 1, 950000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '22:00', 3, 1, 2, 59, 2, 'active', NULL, '2022-03-11 02:14:44', '2022-04-11 13:35:34'),
(134, 'MAZDA 3 2017', '<p>Mazda 3 số tự động đời 2017 Xe dịch vụ mới đẹp , nội thất nguy&ecirc;n bản , sạch sẽ , bảo dưỡng đầy đủ, rửa xe miễn ph&iacute; trước khi giao xe cho kh&aacute;ch . Xe rộng r&atilde;i , an to&agrave;n , tiện nghi , ph&ugrave; hợp cho gia đ&igrave;nh đi lại . Xe trang bị cảm biến l&ugrave;i , đầy nội thất trong xe ,...</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/_m8Hk9sicVLhABUkzW-HfQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-9k7HJeYPBhNTZGbH9wiuQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/EJFlzeTDsUtGF7wz33527A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/PIEPiLnIBBrd08e_3ZBPUQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Ri0wjbesayPj6lqRbNqsBw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Rof-7ONEku5NJnbULUo9OA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/siHOiJMvJBe9bIjMUh8yZg.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 850000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 11, 61, 2, 'active', NULL, '2022-03-11 02:17:30', '2022-04-11 09:40:03'),
(135, 'KIA FORTE 2012', '<p>Xe gia đ&igrave;nh sử dụng kỷ . Sạch sẽ</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/_-lYk0icqQQVVD9FPp53zQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/334SWAGYLbyVTpEm7kZhIg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Y-90Fg9o4bQUkrrjS0f8XA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZYYcXXjw_Fc4wbhs9Pz4Hg.jpg,', 5, 'Gray', '300', 'petrol', 350, 1, 1, 600000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 10, 62, 2, 'active', NULL, '2022-03-11 02:20:08', '2022-04-11 09:28:54'),
(136, 'VINFAST FADIL 2019', '<p>Vinfast Fadil mẫu xe gia đ&igrave;nh nhỏ gọn đi lại trong phố rất tiện v&agrave; thoải m&aacute;i. Chủ xe vui vẻ nhiệt t&igrave;nh hỗ trợ kh&aacute;ch h&agrave;ng tận nơi</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/6qQtc6h5v1liIAHZJFSPzg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7Uso-0aeAmLEwxDHw7o7nA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/FQcIstUfjTbA1Ltd17V2fw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ohf1kSjEOYFxyLhzMdcM3g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/rfC1o0bicMhHDBivL5STmQ.jpg,', 5, 'Red', '350', 'petrol', 400, 1, 1, 620000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '20:00', '21:00', 3, 1, 7, 56, 2, 'active', NULL, '2022-03-11 02:23:07', '2022-04-11 13:48:26'),
(138, 'KIA K3 2015', '<p>Kia K3 số tự động, m&agrave;u trắng, dung t&iacute;ch động cơ 1.6L. Sản xuất năm 2015. Full Option. Xe gia đ&igrave;nh đi sạch sẽ, bảo quản tốt. H&igrave;nh thức b&ecirc;n ngo&agrave;i đẹp</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/3k_3NuKOfv1wh07OECqtqw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/dGjLTG_y_Q-5EjUeSBbxpw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fEizalZmwPfJJrZxBxkEeg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/v3XHT1JGIcm7frJRwfGEAw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/W0KpqSxtctvC5FG6qYAD_w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/w-mkpDIc7XBHyfuIr6PoHg.jpg,', 5, 'white', '250', 'petrol', 300, 1, 1, 900000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '20:30', '21:30', 3, 1, 10, 61, 2, 'active', NULL, '2022-03-11 02:28:21', '2022-04-11 09:30:19'),
(139, 'TOYOTA VIOS E 2015', '<p>Toyota Vios số s&agrave;n,nhi&ecirc;n liệu xăng.xe đẹp trang bị camera l&ugrave;i.loa nghe nhạc cực đỉnh.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/BrXXQxrOzRIfOHSFnUAEhw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/o0Ufw6IjP6xT3NT-Cj5yRg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/raor6tc0j_M0H4tB0wS3dQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Ref1ty4IsMc6uWULEIVskw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/UIXHT3tuV-QWNCVmvoqP5w.jpg,', 4, 'Gray', '300', 'petrol', 350, 1, 1, 650000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 2, 55, 2, 'active', NULL, '2022-03-11 02:31:07', '2022-04-11 13:45:36'),
(140, 'MITSUBISHI ATTRAGE 2020', '<pre>Atrrge mới, xe gia đ&igrave;nh sạch sẽ, bảo tr&igrave; thường xuy&ecirc;n\r\nXe cực tiết kiện nhi&ecirc;n liệu</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/5XIMga5x5VyEPWUZ7g2fzA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/L1G1x6GnVrCo1b75Ky3ifQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/qdeqgm_d7lLatm2Uv_kFSw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/S0RvOPkAvrOH2SjNT4nVfQ.jpg,', 5, 'white', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 12, 55, 2, 'active', NULL, '2022-03-11 02:33:45', '2022-04-11 12:57:02'),
(141, 'MITSUBISHI PAJERO SPORT 2016', '<pre>pajaro sport 7 chỗ số s&agrave;n,m&aacute;y dầu,xe mạnh mẽ đẹp .</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/1th1Bnyu7lZcItg-EKA07Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/I1asmfIS_855wg2qD-nrdA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/RdCg4H2J-ARhEd3XELD5fw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/XMbkaDZsdkZ8J_Vhlsu6mA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/XW1x-UL8qElW1Cwnn4ocWw.jpg,', 7, 'white', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 12, 62, 2, 'active', NULL, '2022-03-11 02:36:35', '2022-04-11 13:00:23'),
(142, 'TOYOTA VIOS G 2016', '<p>Xe Quốc d&acirc;n, Nỗi tiếng về tiết kiệm nhi&ecirc;n liệu, đi đường hỗn hợp hơn 7l&iacute;t/100km, xe c&aacute; nh&acirc;n &iacute;t đi, Lu&ocirc;n sạch sẽ thơm tho ! Tặng bảo hiểm tai nạn con người mệnh gi&aacute; 200 Triệu/ng&agrave;y</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/4KBV-cwasi81-RT4uUd_Jg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-HV4WaMMlIjyFDcdZZVS6g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Uoq3Ezze9zDCb30PwvxvGQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/UOU0ABqZn-KoNIglATj3_w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/zXCf1hp39per8uEOyMFLfA.jpg,', 5, 'Gray', '300', 'petrol', 350, 1, 1, 812000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 2, 62, 2, 'active', NULL, '2022-03-11 02:38:53', '2022-04-11 13:47:14'),
(143, 'FORD RANGER RAPTOR 2019', '<p>B&aacute;n tải Ford Raptor m&aacute;y dầu số tự động . Đăng k&yacute; 1/2019. Xe full option gia đ&igrave;nh sử dụng. Full chức năng hỗ trợ l&aacute;i xe an to&agrave;n. Rửa xe miễn ph&iacute; cho kh&aacute;ch.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/7ILapQjyXXwvjiA9fbF8Ng.jpg,https://yotrip.vn/public/backend/uploads/images/cars/SacpjV2dR9Lc8v9IqyhSCw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/y1dj1FXfukf9FCs3h9SHBg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/YUUfaoK7kUv5InFooHe7yQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/zyHfd4tdOeRrmev9TBOkTQ.jpg,', 4, 'white', '200', 'petrol', 300, 1, 1, 1350000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '20:00', '21:00', 3, 1, 8, 56, 2, 'active', NULL, '2022-03-11 02:41:24', '2022-04-10 18:36:54'),
(144, 'HYUNDAI ACCENT 2020', '<p>Hyundai accent 2019. Xe chạy tiết kiệm xăng</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/AjYECALRQBjNVZ-8snxvmg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/rZfJNTrbdETbd_oOgoQn2A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vPBUioBYiyrGJN-7n_Xydg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/zDpw9HTgMLit3R4qSbqJ2Q.jpg,', 5, 'white', '200', 'petrol', 250, 1, 1, 699000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:30', '21:30', 3, 1, 6, 55, 2, 'active', NULL, '2022-03-11 02:43:22', '2022-04-11 07:15:58'),
(145, 'HYUNDAI GRAND I10 SEDAN 2018', '<p>Xe gia đ&igrave;nh mới mua ,&iacute;t sử dụng , đầy đủ bảo hiểm</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/4Lkj-f1dRDPkKn9fTHwvzQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/GFEoOmxV43YNl_3VZ60Ntw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/NgOyk_RkpvqBS-D8HHq80g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/PI2GlwPfxv2ywd2A66n9RA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/YDFFjU5P3uWrg2xe0k8QBQ.jpg,', 4, 'white', '250', 'petrol', 300, 1, 1, 650000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '20:00', '21:00', 3, 1, 6, 62, 2, 'active', NULL, '2022-03-11 02:45:48', '2022-04-11 07:23:17'),
(146, 'HYUNDAI AVANTE 2012', '<p>Xe đẹp chạy ổn định ghế da sạch đẹp được dọn dẹp thường xuy&ecirc;n cảm biến l&ugrave;i camera l&ugrave;i đầy đủ chất lương &acirc;m thanh hay xe rộng r&atilde;i thoải m&aacute;i cho những chuyến đi</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/3fMFMr10SoNLtHfHyWWhjw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/dMtY7x1F9qBNaJ0GPefTPA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/G71HvkuvT6i7rS92U8872A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/mgQjlG9QFAmaHgPzz-rb9A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/UXorLnxXtx3CpBriXNlyPA.jpg,', 4, 'Gray', '300', 'petrol', 350, 1, 1, 580000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '08:00', 3, 1, 6, 61, 2, 'active', NULL, '2022-03-11 02:49:29', '2022-04-11 07:17:50'),
(147, 'KIA CERATO 2019', '<p>Kia Cerato mới - đẹp - vệ sinh sạch sẽ... ????????</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/_GqaF2PhP5tgIzKH1Wr6Og.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7y8aUs1bjUgjH9qk8133ZA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Bn06EeUeOA0EeC7b247G0w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Mqa07kTYcv8SEEVCEvRHhQ.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 10, 56, 2, 'active', NULL, '2022-03-11 02:52:00', '2022-04-11 07:41:38'),
(148, 'MITSUBISHI ATTRAGE 2019', '<pre>MITSUBISHI ATTRAGE 2019</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/_86DZBIz4RHUH_IuEDBFgQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/4Z7qEdH3oQJttXtExDFO5A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/9rA1NyFoswrmMcxNHSm-3Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Cb6MZ16lGRP9wnQPWzBckw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/centjP52YQYpLI6iv6_H4w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/m_phhXBHTfeJW87ebWQZhQ.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 600000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 12, 62, 2, 'active', NULL, '2022-03-11 02:55:21', '2022-04-11 12:56:05'),
(149, 'MITSUBISHI OUTLANDER 2019', '<p>MITSUBISHI OUTLANDER 2019</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/nojFKRFx90OLM8QG7nHg-g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/onE0jg4wPBBMzvI3Djk8zw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uQ4CIzUqUtgglRMvTDV6jw.jpg,', 7, 'white', '300', 'petrol', 350, 1, 1, 1200000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 12, 62, 2, 'active', NULL, '2022-03-11 02:57:38', '2022-04-11 12:58:40'),
(150, 'HYUNDAI ELANTRA 2018', '<pre>HYUNDAI ELANTRA 2018</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/6WnVef9HDqI1L9_2Ugioug.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7S4mw80F2VACz_a8OuJfbA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/IMTTsL3phVC_33GUHzDQHw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tFWjJ1eb3iHtIihH_19PRg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/X3wg-ZTc8_u03Ou_LNpPxg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/zFKvM9mCdmpqFL0HB4rb3w.jpg,', 4, 'white', '250', 'petrol', 300, 1, 1, 800000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 6, 59, 2, 'active', NULL, '2022-03-11 02:59:45', '2022-04-11 07:20:10'),
(151, 'TOYOTA INNOVA G 2018', '<p>TOYOTA INNOVA MT 2018</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/mQwYRPqZ_1Ipz7Fsnfeesw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/rei637bt0HyWo4Qldh8MrQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/UO-4WCOH5XvY4m52_tR86w.jpg,', 7, 'white', '300', 'petrol', 350, 1, 1, 850000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '22:00', '22:00', 3, 1, 2, 57, 2, 'active', NULL, '2022-03-11 03:02:08', '2022-04-11 13:42:58'),
(152, 'MITSUBISHI XPANDER 2019', '<pre>Xpander xe đời mới dk 3/2019\r\nTh&iacute;ch hợp cho gia đ&igrave;nh đi d&atilde; ngoại hay đi du lịch\r\nGiao xe tận nơi \r\nGi&aacute; cả hợp l&yacute;</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/9jsKvGoPL0WiAnVBL41GTg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/cEnCndGAg5NJkWmxNM4QJw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/m5p5kDR24CKKDZlyiase1g.jpg,', 7, 'white', '250', 'petrol', 300, 1, 1, 850000, 0, 0, 0, 'Đà Nẵng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 12, 59, 2, 'active', NULL, '2022-03-11 03:04:32', '2022-04-11 13:04:21'),
(153, 'HYUNDAI GRAND I10 SEDAN 2019', '<p>???????????? Dịch vụ cho thu&ecirc; xe c&oacute; t&agrave;i v&agrave; tự l&aacute;i , đưa rước s&acirc;n bay về kh&aacute;ch sạn hoặc đi tỉnh . T&agrave;i xế nhiệt t&igrave;nh , th&acirc;n thiện chạy xe an to&agrave;n , đảm bảo qu&yacute; kh&aacute;ch ko say xe ko mắc &oacute;i , chất elượng xe tốt .( Huyndai i10 Sedan phi&ecirc;n bản cao cấp nhất, đ&egrave;n biled s&aacute;ng xuy&ecirc;n m&agrave;n đ&ecirc;m, &acirc;m thanh như s&agrave;n, m&agrave;n android tiện lợi ) ???????????? Kh&aacute;ch vui l&ograve;ng inbox em để nhận dc gi&aacute; ưu đ&atilde;i nhất c&oacute; thể, (xe b&ecirc;n em xe mới n&ecirc;n rất tiết kiệm xăng mọi người c&oacute; thể y&ecirc;n t&acirc;m m&agrave; trải nghiệm ạ) ???????????? Miễn ph&iacute; giao xe tận nh&agrave; trong b&aacute;n k&iacute;nh 5km hoặc mọi người c&oacute; thể li&ecirc;n hệ để tới nhận xe</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/d92kRO80OqZkXQILZHO5aA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lcSu02cuTq0Q-qxSK6ALZQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/oWuVGZhn4GehzWIQxhBDsg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uzzlzy-s1ryp1FM2d6Zi6w.jpg,', 4, 'Pink', '300', 'petrol', 350, 1, 1, 550000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '22:00', '22:00', 3, 1, 6, 258, 1, 'active', NULL, '2022-03-11 03:14:38', '2022-04-11 07:24:17'),
(154, 'CHEVROLET CRUZE 2018', '<pre>CHEVROLET CRUZE 2018 mới v&agrave; đẹp</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/17tE-bG1WmAK38Y1F4Us-w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/mp-4_JHnqQJ_T3VOxTn6Kw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Rduuc6-u1MIVh8IZUXRFBw.jpg,', 4, 'white', '300', 'petrol', 350, 1, 2, 800000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '10:00', '21:00', 6, 1, 1, 259, 1, 'active', NULL, '2022-03-11 03:17:53', '2022-04-10 18:08:30'),
(155, 'TOYOTA INNOVA 2009', '<p>TOYOTA INNOVA 2009</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/4hpS0WR9K3Vwuf-HeKncjg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/gFa2qhCBOOvLvjAa-X-jLw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/R3nmt6T5R8zq-o6v48eMWg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tNlxgEFXQChtQ9i3woI7tw.jpg,', 7, 'Gray', '350', 'petrol', 400, 1, 1, 610000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 2, 266, 1, 'active', NULL, '2022-03-11 03:20:01', '2022-04-11 08:52:53'),
(156, 'TOYOTA INNOVA G 2008', '<p>TOYOTA INNOVA G 2008</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/89XiS-hwIzuWlSvQEZf8og.jpg,https://yotrip.vn/public/backend/uploads/images/cars/AL3C46IoranI0S_mii0Q-A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/HZ0hqv9AeYGqIFm5abTVqw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/q8UsgX3ZQVUp5L9qf1iI6g.jpg,', 7, 'Gray', '200', 'petrol', 300, 1, 1, 670000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '22:00', '22:00', 3, 1, 2, 265, 1, 'active', NULL, '2022-03-11 03:33:17', '2022-04-11 08:55:02'),
(157, 'FORD RANGER XLS 2021', '<pre>FORD RANGER XLS 2022</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/65emkBnn0fUiArhpAui_cw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Q0EsykPsYMxs5RHnIg_A0A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/RbFqpaOWZ01gLQWsBLQkZA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Wb3bKxO1GtDohgvHsacvGg.jpg,', 4, 'Blue', '200', 'petrol', 270, 1, 1, 1050000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '20:00', '20:00', 3, 1, 8, 267, 1, 'active', NULL, '2022-03-11 03:35:41', '2022-04-10 18:38:17'),
(158, 'KIA MORNING SI 2012', '<pre>Xe Kia Morning nhập khẩu số tự động, trang thiết bị tiện nghi, hiện đại, m&aacute;y m&oacute;c khung gầm chắc chắn, an to&agrave;n. Xe gia đ&igrave;nh sạch sẽ y&ecirc;n t&acirc;m</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/92Hx2hpfwAXF3lqfjrVKew.jpg,https://yotrip.vn/public/backend/uploads/images/cars/miek2w8tF7O2ydwptfCsCg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ygZ6vXyEgN9YSnDbaQDynw.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 650000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '20:00', '21:00', 3, 1, 10, 263, 1, 'active', NULL, '2022-03-11 03:38:28', '2022-04-11 08:41:08'),
(159, 'KIA MORNING SI 2018', '<p>Xe Kia Morning số tự động đăng k&yacute; th&aacute;ng 12/2018, trang bị m&agrave;n h&igrave;nh android zetek, cam 360độ, Cruise Control</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/f0L5TCTz2XqLAEPgGdrHYw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/FC9S9q4AsLt_GLrVxyYhBw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pZjRcoxqLZWTMM_mmkW9zQ.jpg,', 4, 'Red', '300', 'petrol', 350, 1, 1, 650000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 10, 267, 1, 'active', NULL, '2022-03-11 03:41:22', '2022-04-11 08:41:50'),
(160, 'TOYOTA VIOS E 2017', '<pre>Toyota Vios số tự động. xe m&agrave;u trắng rất mới. hộp số CVT cực kỳ tiết kiệm nhi&ecirc;n liệu. Điều h&ograve;a m&aacute;t lạnh, trang thiết bị &acirc;m thanh, dvd đầy đủ</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/doPc29_1UM1yGVSHMk77mA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/DXPCPZaF0mBDI2LxBHE3tQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/dYfLz0OQ9BnvgzFMYikRuA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/eX8OBB7z7pwPEa9QFxzgcQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/wtI51vdsC5bjUl4_0Ca0Hw.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 750000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 2, 257, 1, 'active', NULL, '2022-03-11 03:43:49', '2022-04-11 09:00:11'),
(161, 'KIA CERATO 2017', '<p>KIA CERATO 2017</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/IX2SEgMyorXH6OrGas-wdg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Lfv2awgNNi62zicJA9qddg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/MgGNIoICgz0XhJJl3ex9BQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Pe-w8bNo0U0bFct1Wwemow.jpg,https://yotrip.vn/public/backend/uploads/images/cars/QfK1HXStzXXNbxvFjQok9w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uzGISGyNprE9qDxEPqtKZg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/VMGjeIfn2CiN6iCyejwZRQ.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 10, 260, 1, 'active', NULL, '2022-03-11 03:46:42', '2022-04-11 07:35:29'),
(162, 'KIA CARENS 2014', '<p>Xe kia caren sx 2014 xe 7 chỗ xe gia đ&igrave;nh</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0W9nKO-LFnNUKW4-ktg88Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/2HJehApfPppmm2hTGS0YSA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/a8Zapm2ggBhpM4QVCKdXDA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Jh5Hbwmzzn739wQGCM96IQ.jpg,', 7, 'Gray', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 10, 257, 1, 'active', NULL, '2022-03-11 03:49:05', '2022-04-11 07:33:51'),
(163, 'MAZDA 3 2016', '<p>Xe mazda 3 Tự động 2016</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/bny0bW1j3vVLagtEKhj2ow.jpg,https://yotrip.vn/public/backend/uploads/images/cars/GfpolBsBr8DqXJ_sMX7kkA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vnaEmoCFNeLTMFszdbQUbg.jpg,', 4, 'Gray', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '22:00', '22:00', 3, 1, 11, 261, 1, 'active', NULL, '2022-03-11 03:52:47', '2022-04-11 08:46:23'),
(164, 'VINFAST FADIL 2021', '<p>VINFAST FADIL 2021</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/4fHoQKjFLhhoQQtvB2Z5QA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BZmCNNhTc3kjZwUsYtbhxA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/JkNV8Izwrm8SZgSGtEVnLw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/M2DabgvuAbTFmoDg2y9O2g.jpg,', 5, 'Black', '300', 'petrol', 350, 1, 1, 550000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '22:00', 3, 1, 7, 269, 2, 'active', NULL, '2022-03-11 03:57:33', '2022-04-11 09:01:18'),
(165, 'HYUNDAI GRAND I10 2014', '<pre>Xe số s&agrave;n, ngoại thất mới, tiết kiệm nhi&ecirc;n liệu, m&aacute;y khoẻ.</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/_a0bZFYQLEbQYO1QHbKb2g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fIntW19_QKqhIjLWnvtkNw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZyzD1PgGPcTbQwDRBSuOQQ.jpg,', 5, 'Gray', '300', 'petrol', 350, 1, 1, 500000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '22:00', '22:00', 3, 1, 6, 266, 2, 'active', NULL, '2022-03-11 03:59:49', '2022-04-11 07:20:58'),
(166, 'MAZDA CX5 2016', '<p>Xe Mazda CX-5 đời 2016 xe sạch sẽ b&oacute;ng mịn rộng r&atilde;i gia đ&igrave;nh đi du lịch</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/G5vyR1es_UrCnMnBjrLQAg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/gWddLmGKh5Eahh4d3iH82Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pE_EHDrarorIsUhd9XW3lA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/zMx-AQJcHIc0GrI_SA7bpg.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '20:00', '20:00', 3, 1, 11, 12, 2, 'active', NULL, '2022-03-11 04:03:18', '2022-04-11 08:50:15'),
(167, 'HYUNDAI SONATA 2011', '<p>Sonata số tự động , xe gia đ&igrave;nh chạy &ecirc;m đầm , loa sống động Camera l&ugrave;i , cảm biến l&ugrave;i ,</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/3fuQPTmCVflnoOJ1_PanYw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ikVE3ouDQ3iT9UQmRky-Hw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Uhsvh_jIY0jmMg_mofDH-A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZENnwaYIFMD1Wr-JRoz5Tg.jpg,', 5, 'Black', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 10, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '08:00', 3, 1, 6, 258, 2, 'active', NULL, '2022-03-11 04:06:25', '2022-04-11 07:26:08'),
(168, 'HONDA CIVIC 2010', '<pre>Honda civic xe bền đẹp. Chắc chắn đi y&ecirc;n t&acirc;m. Kh&ocirc;ng hỏng vặt. Đầy đủ tiện nghi cho kh&aacute;ch đi đường d&agrave;i</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/b-a6pCSXqgMi_96_DXEDmA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/gxKccCg_JJUx6zFNWdC6MA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/JZvo62CJyQWoT6OR-KUT2Q.jpg,', 5, 'Gray', '350', 'petrol', 400, 1, 1, 650000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 3, 265, 2, 'active', NULL, '2022-03-11 04:09:11', '2022-04-11 07:08:59'),
(169, 'HONDA CITY 2021', '<pre>Honda city số tự đongj đời mới xe sạch sẽ ph&ugrave; hợp cho gia đinh đi du lịch</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/1NyVzQZyJ0ACSn0NdifJ_A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/m9dpeTyQkFwVR7YtTsOllA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/MQs9qSCxp134MdYcteSu3g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/z4aSzOeLF9Dc37GVPu6Qjw.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 700000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 3, 268, 2, 'active', NULL, '2022-03-11 04:11:40', '2022-04-10 18:48:50'),
(170, 'MAZDA 3 2018', '<p>Mazda 3 xe đời 2018 phanh tay số tự động , xe mới v&agrave; sạch sẽ ph&ugrave; hợp cho gia đ&igrave;nh đi du lịch</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/AUcMSa4jTyCXvFhlooMEpA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fioinF-9B_nmAXFvtHGN5g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/moGeliDjGj3DqYirNVsaDg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/RBuh1GeVFxNxClSaCMy1cA.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 750000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '20:00', '21:00', 3, 1, 11, 258, 2, 'active', NULL, '2022-03-11 04:13:55', '2022-04-11 08:48:32'),
(171, 'VINFAST LUX A 2.0 2021', '<p>Lux A2.0 đăng k&iacute; lần đầu 1/4/2021 Xe mới cứng, ph&ugrave; hợp cho cac đối t&aacute;c l&agrave;m ăn, du lịch, d&atilde; ngoại...</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/_qeBznldj6BcOcYDkTwyiQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/IlryMqLsgGxWoxiXgSaSrA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Lz7Tt8CqnvissQUeTNsGpA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vUcHyjZSkYtAIS-kZ1Galg.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 1300000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '20:00', 3, 1, 7, 259, 2, 'active', NULL, '2022-03-11 04:16:09', '2022-04-11 09:02:20'),
(172, 'HONDA CITY 2021', '<p>Honda city số tự đongj đời mới xe sạch sẽ ph&ugrave; hợp cho gia đinh đi du lịch</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/1NyVzQZyJ0ACSn0NdifJ_A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/m9dpeTyQkFwVR7YtTsOllA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/MQs9qSCxp134MdYcteSu3g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/z4aSzOeLF9Dc37GVPu6Qjw.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 700000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '20:00', '21:00', 6, 1, 3, 269, 2, 'active', NULL, '2022-03-11 04:18:52', '2022-04-11 07:05:50'),
(175, 'HONDA CITY 2021', '<pre>Honda city số tự đongj đời mới xe sạch sẽ ph&ugrave; hợp cho gia đinh đi du lịch</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/1NyVzQZyJ0ACSn0NdifJ_A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/m9dpeTyQkFwVR7YtTsOllA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/MQs9qSCxp134MdYcteSu3g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/z4aSzOeLF9Dc37GVPu6Qjw.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 700000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-11', '2022-03-12', '21:00', '21:00', 3, 1, 3, 267, 2, 'active', NULL, '2022-03-11 04:28:00', '2022-04-11 07:06:44'),
(178, 'FORD FOCUS 2009', '<p>Ford Focus, số san tiết kiệm nhi&ecirc;n liệu. khỏe khoắn, xe bảo dưỡng, dọn nội thất thường xuy&ecirc;n, sạch sẽ thơm tho. loa nghe cực chất với n&agrave;n h&igrave;nh android sẵn sim 4G h&ograve;a mạng mọi l&uacute;c mọi nơi camera h&agrave;nh tr&igrave;nh, cam l&ugrave;i r&otilde; n&eacute;t</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/DjtzqGDe5WODdQVdu2yyxQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/i23j-RpuLdrW0yMpfIP7cQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/NNPs39I-xVb8afzn75Z8yg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/XbPLfDM5PyPMEFTrzoU1tw.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 500000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 8, 265, 1, 'active', NULL, '2022-03-12 01:25:15', '2022-04-11 08:45:40'),
(179, 'TOYOTA VIOS E 2007', '<p>TOYOTA VIOS E 2007 gia đ&igrave;nh m&igrave;nh c&oacute; xe vios cần cho thu&ecirc; tự l&aacute;i</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0qkA0pOmVea10sIJzoav0A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fc0lDYTEBWTtUiP8EXklIw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/sJdZAwE7CTQlYcQl3af2nw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/y6E-WPEnvOi_KVA6pboXnA.jpg,', 5, 'Black', '300', 'petrol', 350, 1, 1, 450000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:30', 3, 1, 2, 260, 1, 'active', NULL, '2022-03-12 01:27:22', '2022-04-11 08:56:53'),
(180, 'MAZDA 3 2020', '<pre>MAZDA 32020</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/7RHyyjShH-IHNVf7_aIvCA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/cRkl3-o_XY5MysHkAf-UJg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vZQjf5IVk8w-nRDzjfG2DQ.jpg,', 4, 'Black', '300', 'petrol', 350, 1, 1, 450000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:30', '21:30', 3, 1, 11, 268, 1, 'active', NULL, '2022-03-12 01:29:19', '2022-04-11 08:49:17'),
(181, 'HYUNDAI ACCENT 2018', '<p>xe Huyndai accent 2018 xe đẹp</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/CxzRTASVMW4Y31hgM-tR0A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/MjljlmDN1oI8zENbZ0Gv6g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/qYS0wFqbWmR1T0ezXel3Aw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tfyySAo_4cfscA5nbqDQYA.jpg,', 5, 'Black', '300', 'petrol', 350, 1, 1, 620000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 6, 255, 2, 'active', NULL, '2022-03-12 01:31:22', '2022-04-11 07:12:08'),
(182, 'TOYOTA CAMRY 2010', '<pre>TOYOTA CAMRY 2010</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/bzQtZhmWlauBVbDdtjuZdg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TkZ_wGyulE2Xd2ek3lDNEQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uFVssVOR4IDRFThtgFxEvg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/XuO6tYPwJi6fkJWc4P4R3w.jpg,', 5, 'Black', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 2, 258, 2, 'active', NULL, '2022-03-12 01:33:44', '2022-04-11 08:51:49'),
(183, 'MAZDA 2 2019', '<pre>MAZDA 22019</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/9ty3Yc_AOPNpRkmC5J1TVQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/HnY6EJXGmV6yj8q3LN_20g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/IGVi3GTJxnNvj8MxFf0new.jpg,https://yotrip.vn/public/backend/uploads/images/cars/VbTpFr1JUQScuCSzNgxNBQ.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 11, 259, 2, 'active', NULL, '2022-03-12 01:36:39', '2022-04-11 08:45:12'),
(184, 'KIA CERATO 2019', '<p>Kia cerato 2019 luxury xe gia đ&igrave;nh , số tự động, cửa số trời, bản đồ th&ocirc;ng minh , cảm biến l&ugrave;i</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/2KkOfXoftv152rCLURCKgg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/51lKuLyyw10NgIryR2PuuQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/qAyB-VUBP28HKwgHz39FwQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/QTRfQtidcxSsj7Ovh8iIFQ.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 10, 268, 2, 'active', NULL, '2022-03-12 01:39:10', '2022-04-11 07:42:16'),
(185, 'KIA MORNING 2011', '<pre>KIA MORNING 2011 CỰC ĐẸP\r\nXe nhỏ gọn, đường nhỏ ng&otilde; hẹp đi ok. Xe gia đ&igrave;nh đi rất giữ g&igrave;n, nội ngoại thất sạch sẽ thơm tho, xe kh&ocirc;ng đ&acirc;m đụng ngập nước g&igrave;, bảo dưỡng định k&igrave; đầy đủ. v&ocirc; c&ugrave;ng tiết kiệm nhi&ecirc;n liệu. 5 chỗ rộng r&atilde;i</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/8E1V-e0ZazMQ7czshkDBOg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fDtCr8KWdh2V4VQLJRgfYw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/IbqiD5g_tJFx7BvSEA7KUw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/kWwwq8fMVKrm_V2WKC55Nw.jpg,', 5, 'white', '200', 'petrol', 250, 1, 1, 532000, 0, 0, 0, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 10, 269, 2, 'active', NULL, '2022-03-12 01:41:28', '2022-04-11 08:40:27'),
(186, 'KIA RONDO 2016', '<p>xe kia rondo 7 chỗ số tự động m&aacute;y dầu tiết kiệm nhi&ecirc;u liệu trang bị hiện đaiu</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/BzE_gU-bcKHOUsFFb3UU5A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/F6Q8sc4Izd7ky80hw3XMQA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/LI5_GMm-OeWDMdHw5f2u_Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vAstEVtbTTuyPix_biAx5Q.jpg,', 7, 'white', '200', 'petrol', 350, 1, 1, 770000, 0, 0, 20, 'Hải Phòng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '20:00', 3, 1, 10, 255, 2, 'active', NULL, '2022-03-12 01:43:35', '2022-04-11 08:44:14'),
(187, 'TOYOTA FORTUNER 2017', '<p>TOYOTA FORTUNER 2017</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/b2PYW4A_PcKAMP5sGqXYow.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ddTsSudpyNMWBh_Di3ijRQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/JOTqeyHNqAxIbM3nPqaB5w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lCuybWRMpRlploFlNLBs-w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/otacDLORuLL4B31g9oLQzw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/scyqLPBsOc1UQ8fZ0rheeQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Z0q4DAqCM6IFM6Q0b2JerA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Z-NbKQg1guYwKsItEuRRPQ.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 2, 175, 1, 'active', NULL, '2022-03-12 01:54:05', '2022-04-11 08:24:53');
INSERT INTO `la_cars` (`id`, `name`, `description`, `photo`, `seat`, `color`, `make`, `fuel`, `power`, `gearbox`, `luggage`, `price`, `service_charge`, `insurance_fees`, `discount`, `address`, `latitude`, `longitude`, `terms_of_use`, `rules`, `start_date`, `end_date`, `start_time`, `end_time`, `users_id`, `categories_id`, `renders_id`, `city_id`, `range_of_vehicle`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(188, 'CHEVROLET COLORADO LT 2015', '<pre>CHEVROLET COLORADO LT 2015</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/3UXa9EKHA4Vz3-ZEudl5uQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/IM5OI0fHV3b9qzcd_DsvlQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/M63V-8MyhLhW8CrQr8zG1w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/QQwmXDmveqOpiUutwcxb4w.jpg,', 5, 'Black', '200', 'petrol', 350, 1, 1, 690000, 0, 0, 10, 'Cần Thơ', 0, 0, '15 triệu (tiền mặt/chuyển khoản cho chủ xe khi nhận xe)\r\nhoặc Xe máy (kèm cà vẹt gốc) giá trị 15 triệu', '1. Chấp nhận Hộ khẩu Thành phố/KT3 Thành phố/Hộ khẩu tỉnh/Passport (Bản gốc) (Giữ lại khi nhận xe)\r\nCMND và GPLX đối chiếu\r\n2. Tài sản đặt cọc (1 trong 2 hình thức)\r\n- Xe máy (giá trị >15triệu) + Cà vẹt (bản gốc)\r\n- Hoặc cọc tiền mặt 15 triệu.\r\n\r\n* Quý kh', '2022-03-14', '2022-04-02', '21:00', '21:00', 2, 1, 1, 179, 1, 'active', '2022-04-15', '2022-03-12 01:57:53', '2022-04-15 01:17:13'),
(189, 'TOYOTA FORTUNER 2017', '<p>TOYOTA FORTUNER 2017</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/b2PYW4A_PcKAMP5sGqXYow.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ddTsSudpyNMWBh_Di3ijRQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/JOTqeyHNqAxIbM3nPqaB5w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lCuybWRMpRlploFlNLBs-w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/otacDLORuLL4B31g9oLQzw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/scyqLPBsOc1UQ8fZ0rheeQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Z0q4DAqCM6IFM6Q0b2JerA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Z-NbKQg1guYwKsItEuRRPQ.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '09:00', 3, 1, 2, 179, 1, 'active', NULL, '2022-03-12 02:01:47', '2022-04-11 08:25:45'),
(190, 'TOYOTA VIOS E 2018', '<p>Vios E số tự động 2018 Đầy đủ tiện nghi Camera l&ugrave;i, DVD, ghế da,... Ngo&agrave;i ra em c&ograve;n đầy đủ c&aacute;c d&ograve;ng xe 4-7 chỗ đời mới kh&aacute;c Thủ tục đơn giản, chi ph&iacute; hợp l&yacute;</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/1GBKkfdjqkzW5eOGn1cfBg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/F89olipyv1FnXZibKvQZCw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/y5ua6wnB88pZugl_CLF-fQ.jpg,', 4, 'white', '350', 'petrol', 400, 1, 1, 720000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 2, 178, 1, 'active', NULL, '2022-03-12 02:07:48', '2022-04-11 08:32:49'),
(191, 'MITSUBISHI XPANDER 2019', '<p>Xpander số tự động mầu n&acirc;u, m&aacute;y xăng tiết kiệm nhi&ecirc;n liệu, gi&aacute; rẻ</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0dtM9Ba97ppkw9WD_YOxWg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/i-E1So_zOwFKRZ_xlOINZw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/myARG_eoEQ5UtdQG_X70qw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/u6OFD_LQEoQ8tlQpgLDOmw.jpg,', 7, 'Black', '350', 'petrol', 400, 1, 1, 850000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 12, 179, 1, 'active', NULL, '2022-03-12 02:09:58', '2022-04-11 08:19:53'),
(192, 'KIA CERATO 2019', '<pre>KIA CERATO LUXURY 2019\r\nM&aacute;y xăng std trang bị đầy đủ tiện nghi</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/1cpSszRh0vXUQRjNnSag_A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BKPNxIe6NwCWjKVSjmFCJQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/C-bcQnobELpvSHoul7u_pQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/llxVqSDbfECPrcvQgAcaiA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/nd44PCd3HiQXr53bR9-duA.jpg,', 4, 'white', '350', 'petrol', 400, 1, 1, 850000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 10, 181, 1, 'active', NULL, '2022-03-12 02:12:21', '2022-04-11 07:43:08'),
(193, 'TOYOTA INNOVA E 2019', '<p>Toyota Innova số s&agrave;n c&aacute;c đời 2018,2019,2020. Xe đời mới, bảo dưỡng đầy đủ, &ecirc;m &aacute;i, tiết kiệm nhi&ecirc;n liệu. Đầy đủ c&aacute;c trang thiết bị v&agrave; giải tr&iacute; cần thiết. Camera l&ugrave;i, m&agrave;n h&igrave;nh giải tr&iacute;,... Ngo&agrave;i ra c&ograve;n c&aacute;c d&ograve;ng xe 4c v&agrave; 7c kh&aacute;c đời mới.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/2pSt7xi7MXMWw1RpwJt5eA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/I8vO3WrWu4UHLS0QxlmD9Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/PTl83RGqR9p857nqpW6xTA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/xW53REd-CQZBWL-MPLVd5w.jpg,', 8, 'Gray', '350', 'petrol', 400, 1, 1, 850000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 2, 179, 1, 'active', NULL, '2022-03-12 02:14:22', '2022-04-11 08:32:01'),
(194, 'HONDA CIVIC 2019', '<pre>HONDA CIVIC 2019</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/4QBncfb6xdhRdurmd42yew.jpg,https://yotrip.vn/public/backend/uploads/images/cars/75OAGHyf69XQI-zvA5Da7A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/bvD45pmlNn5q1Wldlq5Ihg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/k9GgWiAr5fTyZgIylcgtIw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/M5GZ-eRSNwnJsyc7gc-PwQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/xywbXrYydOCkJBT12G96YQ.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 1200000, 0, 0, 20, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 3, 175, 1, 'active', NULL, '2022-03-12 02:17:56', '2022-04-11 07:11:07'),
(195, 'TOYOTA VIOS G 2020', '<p>Toyota Vios G 2020 số tự động: trang bị m&agrave;n h&igrave;nh th&ocirc;ng minh androi lớn c&ugrave;ng hệ thống loa tr&ecirc;n xe, cam h&agrave;nh tr&igrave;nh, wifi theo xe... Xe c&oacute; nhiều trang bị an to&agrave;n tr&ecirc;n xe... Xe lu&ocirc;n sạch sẽ, thơm tho, nội thất xe mới cứng...</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/12R9GWgnFX1EXxO9Bk0yjA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/aqFKi8RAy8L3hacZFo4hPw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fZxdztuMJ2GHBe-NKDHGmw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/zB6Dfima-LlE1ktyvrBcCQ.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 2, 180, 1, 'active', NULL, '2022-03-12 02:24:57', '2022-04-11 08:38:28'),
(196, 'MITSUBISHI XPANDER 2020', '<p>Xe Xpander 2020 số tự động bản đầy đủ, mới đăng k&iacute; trong th&aacute;ng. Xe c&ograve;n cực mới. Xe d&ugrave;ng cho gia đ&igrave;nh. Lu&ocirc;n trong t&igrave;nh trạng sạch sẽ, bảo dưỡng thường xuy&ecirc;n, rửa xe cho kh&aacute;ch trước v&agrave; sau khi thu&ecirc;. Xe rộng r&atilde;i, chở đồ rất thoải m&aacute;i. Th&iacute;ch hợp đi cả gia đ&igrave;nh hoặc đi nhiều người. C&oacute; trang bị camera h&agrave;nh tr&igrave;nh, camera l&ugrave;i, hệ thống giải tr&iacute; bluetooth, v&agrave; nhiều t&iacute;nh năng giải tr&iacute; v&agrave; an to&agrave;n kh&aacute;c...</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/K1HxkyRBfBDz4AfO2LvJpg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/r0pGdr25NFzNcjJh1JMNBg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vsblcUQ_10YIctuGqEi0tg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/xgtDp5cYHIZSj6VxP7GYVQ.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 12, 175, 1, 'active', NULL, '2022-03-12 02:28:18', '2022-04-11 08:21:18'),
(197, 'MITSUBISHI XPANDER 2019', '<pre>Xpander 7chỗ đời mới rộng r&atilde;i đầy đủ Camera h&agrave;nh tr&igrave;nh, gps định vị, xe chỉ bảo dưỡng h&atilde;ng, y&ecirc;n t&acirc;m đi đường xa.</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/bDjLOJnroquRbaRYThwSfw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/H-JyrzKfja_ib-la7X0UZw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Km_hpTeiqqLAmf-4sJPgeg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/LBgfAEOkoxD-c_d6o8e1cw.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 850000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 12, 177, 1, 'active', NULL, '2022-03-12 02:39:50', '2022-04-11 08:20:34'),
(198, 'SUZUKI XL7 2021', '<p>XL7 mới 7 chỗ rộng r&atilde;i trang bị đủ Camera h&agrave;nh tr&igrave;nh, GPS, cảm biến &aacute;p suất lốp, bảo dưỡng h&atilde;ng, đi đường xa y&ecirc;n t&acirc;m.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/eVVJIeR89N9P0ekVle84MA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/I1wN71So6CMeunLfgPyG7Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Ij4k25AVO9VXZJ4a0Fi2Hg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/MLKPHNIQFZbWG5eiV2RaGg.jpg,', 7, 'Gray', '200', 'petrol', 250, 1, 1, 850000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 9, 178, 1, 'active', NULL, '2022-03-12 02:43:04', '2022-04-11 08:22:59'),
(199, 'MITSUBISHI TRITON 2020', '<p>Xe số tự động mới bốc biển cuối th&aacute;ng 12/2020. C&oacute; nhiều đồ chơi tiện &iacute;ch cho người d&ugrave;ng, Cam h&agrave;nh tr&igrave;nh, sạc kh&ocirc;ng d&acirc;y, m&agrave;n h&igrave;nh 7inch, cam l&ugrave;i, cảm biến de...... Ghế bọc da, l&oacute;t s&agrave;n, phủ gầm. Xe đi bốc v&agrave; tiết kiệm nhi&ecirc;n liệu.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0KiVTXQb94thvkd7FvKtbg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/08cuf0AenSeFvkqTYgXyyA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/82zOAJAVH9qadywyFEesog.jpg,https://yotrip.vn/public/backend/uploads/images/cars/AuHCNnRMKAcr_RMm1xndQA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/bfu9idxmuGvzwLjYgtjhcA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/mm-xCUaFnI6MKNwnY4jbvg.jpg,', 5, 'organ', '200', 'petrol', 350, 1, 1, 950000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 12, 180, 1, 'active', NULL, '2022-03-12 02:47:20', '2022-04-11 08:18:11'),
(200, 'CHEVROLET CRUZE 2016', '<pre>Chevrolet Cruze mới sạch đẹp ,c&oacute; t&agrave;i x&ecirc; v&agrave; tự l&aacute;i c&oacute; t&agrave;i đi đua li&ecirc;n tỉnh ,nhận đi du lịch đường d&agrave;i v&agrave; đi hợp đồng nhiều ng&agrave;y</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/MIRElmA8g6ZF3q0NWn0iGg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/v77hjBZlqjyQw8rEVN0jdA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vyTuJ1UgvbJ7rhwms0_2Zg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Z4TxoDDZo_deP_137Ojq4g.jpg,', 4, 'white', '200', 'petrol', 270, 1, 1, 700000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 6, 1, 1, 180, 1, 'active', NULL, '2022-03-12 02:49:57', '2022-04-10 18:04:39'),
(201, 'SUZUKI ERTIGA 2021', '<p>Suzuki etiga số tự động dk th&aacute;ng 6/2021 xe dịch vụ mới đẹp nội thất nguy&ecirc;n bản,sach sẽ,bảo dưỡng thường xuy&ecirc;n,rửa xe miễng ph&iacute; cho kh&aacute;ch.xe rộng r&atilde;i tiện nghi ph&ugrave; hộp cho gua đ&igrave;nh,xe trang bị hệ thống cam l&ugrave;i,gạt mưa tự đ&ocirc;ng,cam h&agrave;nh tr&igrave;nh,v&agrave; c&aacute;c tiện nghi kh&aacute;c.vv.....</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/87PlPT5oppG0v_nUQkNBQA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/IjEqiJ91ZW01S2iMQqjiqw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/l7KP_M6fQE6rpVtTE9rfuA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/zN1eYMkOiyaeb1r1tS03PQ.jpg,', 7, 'white', '250', 'petrol', 350, 1, 1, 700000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 3, 1, 9, 178, 1, 'active', NULL, '2022-03-12 02:52:30', '2022-04-11 08:22:16'),
(202, 'HYUNDAI ACCENT 2018', '<p>Hyundai Accent AT Full Option đời 2018. Đầy đủ tiện nghi.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/OH5EdxMyxbfoSK9UP0FteA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/olMZ0ivl9Qtdm1koVrA-yw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/qL8PvoVxwCvdfHqmuWG0lQ.jpg,', 4, 'white', '400', 'petrol', 450, 1, 1, 750000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '22:30', '22:30', 3, 1, 6, 179, 1, 'active', NULL, '2022-03-12 03:19:54', '2022-04-11 07:13:05'),
(203, 'TOYOTA FORTUNER G 2017', '<p>Toyota Fortuner số s&agrave;n, nội thất đẹp v&agrave; trang tr&iacute; nhiều đồ chơi.!! Xe đẹp từng chi tiết</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/7cNQuvbN22NX4ZNCgtpGJA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/8aJFmFBP7aWMF8gPaC0k3w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/YYLT4cxbAtyCW7tKFB-0oA.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 950000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '20:00', '21:00', 3, 1, 2, 176, 1, 'active', NULL, '2022-03-12 03:25:02', '2022-04-11 08:29:11'),
(204, 'TOYOTA INNOVA E 2018', '<p>Xe Toyota Innova 8 chỗ rộng r&atilde;i Xe gia đ&igrave;nh sạch sẽ , mới , chất lượng</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0DqIp0PwY9XquUEPIl1VUw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/F1_Gs9oukU2Dx73ccYKrSQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/r7JzJ2OdDbST2AuD82ukFA.jpg,', 8, 'Gray', '450', 'petrol', 500, 1, 1, 800000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '20:00', 3, 1, 2, 179, 1, 'active', NULL, '2022-03-12 03:31:44', '2022-04-11 14:42:25'),
(205, 'TOYOTA VIOS G 2020', '<p>Vios G 2020 xe số tự động Xe gia đ&igrave;nh n&ecirc;n sạch sẽ, nội thật nguy&ecirc;n bản, bảo dưởng thường xuy&ecirc;n Xe trang bị camera l&ugrave;i, đ&egrave;n pha tự động, hệ thống cảm biến trước v&agrave; sau xe, camera h&agrave;nh tr&igrave;nh, c&ugrave;ng nhiều tiện nghi kh&aacute;c...</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/HmMRXtZmXudxSPTOMSBnFA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hzV1hv6uCXSrwaqtHTwjgw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/KmivcyyOThH4-_rZTf247A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/LM6ydiEr_CM56OSxdqXg6A.jpg,', 5, 'white', '350', 'petrol', 400, 1, 1, 700000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '20:00', '21:00', 3, 1, 2, 179, 2, 'active', NULL, '2022-03-12 03:37:38', '2022-04-11 08:39:31'),
(206, 'MITSUBISHI XPANDER 2018', '<p>MITSUBISHI XPANDER 2018</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/2PfT7m6Ubaqo69GxAP7ERQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/aNILj5RFjafplEWm6vEbbQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fiDw5961Tvn0iuGYyruOgw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lDmdQW8Lvbsh9Yu1bbtmHw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Vvfw8h_odUxrWHnkZar6yg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/XyE5ENG1A1UJ71E0sItuhg.jpg,', 7, 'white', '350', 'petrol', 400, 1, 1, 750000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '21:00', 6, 1, 12, 182, 1, 'active', NULL, '2022-03-12 03:43:55', '2022-04-11 08:18:52'),
(207, 'MITSUBISHI ATTRAGE 2021', '<pre>MITSUBISHI ATTRAGE 2021</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/SalwdZb7XWAZhA0On0qwpw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vZ7Jp0EjHIhTYUTVNqZZAg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/WGTDEq6pMXh5iSNxZI1aRw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/yRwnGmq5nIE7g6NdCapBqA.jpg,', 4, 'Gray', '200', 'petrol', 250, 1, 1, 600000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '20:00', 3, 1, 12, 177, 2, 'active', NULL, '2022-03-12 03:57:49', '2022-04-11 08:17:31'),
(208, 'HONDA CITY 2019', '<p>Toyota vios 2019</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/11H6WkWBrmXCQVNgvz3yvQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/SE-X_HRbfUHiwyujlGIm-w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/V7mBRTT6XVnVCslOxI4fng.jpg,', 5, 'white', '200', 'petrol', 300, 1, 1, 800000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '20:00', 2, 1, 3, 179, 2, 'active', '2022-04-13', '2022-03-12 04:06:32', '2022-04-13 09:34:41'),
(209, 'TOYOTA FORTUNER 2019', '<pre>TOYOTA FORTUNER 2019</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/08WZNOMNr2JL0xukvAv6uQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Vscoq8y-wBYxoiIigJCaGQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/wv_5VqM9Q-8cGUAvxEXLwA.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-12', '2022-03-13', '21:00', '20:00', 3, 1, 2, 174, 1, 'active', NULL, '2022-03-12 04:15:55', '2022-04-11 08:27:21'),
(210, 'TOYOTA VIOS G 2017', '<p>Xe mới-sạch sẽ-thơm-tiết kiệm nhi&ecirc;n liệu-c&oacute; t&agrave;i xế nếu kh&aacute;ch y&ecirc;u cầu c&oacute; nhận chạy tour!</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/AuxislvulP2wU0VnYcZr-w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fLecWdkWhOCkkU_fOwyHeg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/sHVkEZxDRyjoHCUqxh9pSw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/v3p2whrTF3oL6ubrjhZmSA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vl3PWpcfRpplKmyY5I1Zhw.jpg,', 5, 'white', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '20:00', '20:00', 3, 1, 2, 175, 2, 'active', NULL, '2022-03-16 01:19:37', '2022-04-11 08:34:54'),
(211, 'TOYOTA VIOS G 2017', '<p>Xe mới sạch sẽ ! Xe tiết kiệm nhi&ecirc;n liệu! Chăm s&oacute;c kh&aacute;ch h&agrave;ng tốt nhiệt t&igrave;nh chu đ&aacute;o!</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/1MfVpTzfMwWQbsUyC_I_pw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/9D_LNpcbuiBZ8PIZd_qSGg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/AJfWMi-6U8GT4mbEBbwx1A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TtWCME_Q_DbFv5g5hvidQw.jpg,', 5, 'white', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '20:00', '20:00', 3, 1, 2, 174, 2, 'active', NULL, '2022-03-16 01:22:39', '2022-04-11 08:35:33'),
(212, 'MAZDA 6 2019', '<p>MAZDA 6 2019</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/4s-mnPUZqMsEf46P6cMWzg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lkKaTJKatqeb5I3fnEkSDQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/W6zzOk_NPkqUAEkqrzrfZA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/wGLQ8TiXZFQQxIxPf0fBYQ.jpg,', 4, 'white', '200', 'petrol', 350, 1, 1, 1000000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '20:30', '20:30', 3, 1, 11, 174, 2, 'active', NULL, '2022-03-16 01:25:01', '2022-04-11 08:16:42'),
(213, 'KIA MORNING 2017', '<p>Xe mới, Sạch, &Ecirc;m, Tiết Kiệm Xăng</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/4_x99Yk2cLTKDNemGyNzPw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BOkiQ1ruyB4C92-vvmfLVg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/haPHvs3HDaUSdhFmBRDrlg.jpg,', 4, 'white', '250', 'petrol', 350, 1, 1, 500000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '20:30', '20:30', 3, 1, 10, 176, 2, 'active', NULL, '2022-03-16 01:28:38', '2022-04-11 08:14:03'),
(214, 'MAZDA 3 2017', '<p>Mazda3 sạch đẹp v&agrave; thơm Tiết kiệm nhi&ecirc;n liệu Chế độ chăm s&oacute;c kh&aacute;ch h&agrave;ng-hạu m&atilde;i tốt</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/DUakwHxVwIABaMRV8-a4vQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/eiGJCbo2skaFVIGyELjeNg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pd0vo7Ph3ELCCM0ARV10Jw.jpg,', 5, 'white', '200', 'petrol', 350, 1, 1, 890000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '20:00', 2, 1, 11, 178, 2, 'active', '2022-04-13', '2022-03-16 01:30:52', '2022-04-13 09:34:36'),
(215, 'TOYOTA FORTUNER G 2016', '<p>xe toyota fortuner 2016 đến 2019 m&aacute;y dầu số s&agrave;n v&agrave; số tự dộng xe sạch sẽ rộng r&atilde;i giờ giất dễ d&agrave;ng thủ tục nhận xe đơn giản gi&aacute; cả hợp l&iacute; khi trao đổi đặt xe</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/B_6xkykkQ-5VRyjJwbEUuw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/FCjX3QeAjc0DpQtnKexpFA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/NPpofqS5RZWxXXVshGQJ2g.jpg,', 7, 'Gray', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '20:00', '21:00', 3, 1, 2, 175, 2, 'active', NULL, '2022-03-16 01:33:10', '2022-04-11 08:28:34'),
(216, 'KIA MORNING 2015', '<p>Xe Kia Morning Van 2016. Xe số tự động, bản nhập khẩu Limited đầu 2016. Đ&atilde; trang bị M&agrave;n h&igrave;nh DVD, Ghế da 5 chỗ, full nội thất, đẹp long lanh. C&oacute; Wifi Free C&oacute; hỗ trợ t&agrave;i xế nếu kh&aacute;ch h&agrave;ng c&oacute; nhu cầu (T&agrave;i xế: bao ăn ở)</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/bocQGFefilFJK1XV9ZZLfA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/cX1AWgnGuzgUmxGCwYBSqA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Duy4e3WIQzH0ro4MAnurBA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/oi3Nhp7TvRoy7l_4EwqG0g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/oqlmNReMWTXRoVBE73osoQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/rHOnhdBdt2KvSozvEQmaww.jpg,https://yotrip.vn/public/backend/uploads/images/cars/XlrXJvmYWWJ5Hvuu__7RmQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Ytn9FKkv-DNbB7AzP6gR1w.jpg,', 5, 'white', '350', 'petrol', 400, 1, 1, 500000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '20:00', '21:30', 3, 1, 10, 180, 2, 'active', NULL, '2022-03-16 01:36:37', '2022-04-11 08:13:02'),
(217, 'TOYOTA VIOS E 2019', '<p>TOYOTA VIOS 2019 mới v&agrave; đẹp</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/2rl7PcmWuUqCWs-niFmfhQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/eY3xst95I7jvmkOPZMXo_w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/X85L7K-gJL-pphx867NbGA.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 650000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '20:00', '21:00', 3, 1, 2, 176, 2, 'active', NULL, '2022-03-16 01:38:52', '2022-04-11 08:34:08'),
(218, 'TOYOTA VIOS E 2018', '<p>TOYOTA VIOS 2018</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0yHnDeaH6zsJ8Tgn4lkjLQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/a9znZcukkwXasMBqoi8VNw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/PVyQFnPWYGMZ9r1T9ukVwg.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 670000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '20:00', 3, 1, 2, 177, 2, 'active', NULL, '2022-03-16 01:41:12', '2022-04-11 08:33:28'),
(219, 'TOYOTA VIOS G 2019', '<pre>TOYOTA VIOS G 2019</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/36CUce1tX0E2FFprn_8D2w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/O_RZQO8FnqFOT1sRGQW3Aw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/SeiUl7RYajHO9cPG7QmBzg.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '20:00', 3, 1, 2, 181, 2, 'active', NULL, '2022-03-16 01:44:21', '2022-04-11 08:37:00'),
(220, 'MAZDA 3 2018', '<pre>MAZDA 3 2018</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/5zC2SiBVOO0lh0fJw_OnFw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/bNlA9Z-rhc0Pcx9Ja_X8uw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/EfyXCfML0YltF_0JPz8hDw.jpg,', 4, 'white', '200', 'petrol', 300, 1, 1, 750000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '20:00', 3, 1, 11, 181, 2, 'active', NULL, '2022-03-16 01:46:52', '2022-04-11 08:15:48'),
(221, 'TOYOTA INNOVA 2015', '<div class=\"group\">\r\n<div class=\"ctn-desc-new\">\r\n<pre>TOYOTA INNOVA 2015</pre>\r\n</div>\r\n</div>\r\n<div class=\"group\">&nbsp;</div>', 'https://yotrip.vn/public/backend/uploads/images/cars/gzheBSTkDBKGoHIGoBAwCg (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/LD4oAQMrsO2daz3z15oiwA (1).jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 750000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '20:00', '20:00', 3, 1, 2, 177, 2, 'active', NULL, '2022-03-16 01:49:49', '2022-04-11 08:30:29'),
(222, 'TOYOTA VIOS G 2018', '<p>TOYOTA VIOS G 2018</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/7ZMLMs5ApT0L6QtVKnbK2g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ddKU42B1owvOlAbZtWoZMA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-OLuE9rYqu0VFMJbQA61KQ.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 700000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '20:00', '21:00', 3, 1, 2, 175, 2, 'active', NULL, '2022-03-16 01:52:19', '2022-04-11 08:36:12'),
(223, 'TOYOTA COROLLA ALTIS G 2019', '<p>TOYOTA COROLLA ALTIS G 2019</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5eN7gzccTGe-x-44YpcYtg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ADIKzHwHG1i0fhVqvjn6Rg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/P4eCePW0b4reM7Q0iyH_Jg.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '20:00', '20:00', 3, 1, 2, 174, 2, 'active', NULL, '2022-03-16 01:54:43', '2022-04-11 08:23:57'),
(224, 'TOYOTA INNOVA 2015', '<p>&nbsp;TOYOTA INNOVA 2015</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/6nJ2c6du6-GMyaFKEcPsyQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/DOa48v5DuK4s_Ps1LC7fiA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/R7sDdggnTZpwSBnM9tdE9A.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 2, 181, 2, 'active', NULL, '2022-03-16 01:57:23', '2022-04-11 08:31:15'),
(225, 'TOYOTA FORTUNER 2017', '<p>TOYOTA FORTUNER 2017</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/aXNkM7_T37rHxd6LZ0rdfQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/jfbNsZC4gKiyOS3N8WtNzw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/LWhE9B_-b5yy7Mcwz7ndBQ.jpg,', 7, 'white', '200', 'petrol', 250, 1, 1, 950000, 0, 0, 0, 'Cần Thơ', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '20:00', '20:00', 3, 1, 2, 178, 2, 'active', NULL, '2022-03-16 02:00:11', '2022-04-11 08:26:34'),
(226, 'MAZDA 3 2020', '<pre>Mazda 3 đời 2021, xe mới, sạch sẽ. Thường xuy&ecirc;n kiểm tra định k&igrave; v&agrave; bảo dưỡng xeĐa</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/A050DzEPsjHRi_4DmaewZQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ET6lvGLgB557ZEz0qrozgA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hn7jlh3Z4UTVpA7RndaNWw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lGeIO19v5ZOgCB8oMtzWDQ.jpg,', 4, 'white', '350', 'petrol', 400, 1, 1, 900000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 11, 729, 1, 'active', NULL, '2022-03-16 02:06:06', '2022-04-11 09:43:38'),
(227, 'MITSUBISHI XPANDER 2021', '<p>Xpander số tự động đăng k&yacute; th&aacute;ng 7 năm 2021, Xe gia đ&igrave;nh mới đẹp ,nội thất nguy&ecirc;n bản, sạch sẽ bảo dưỡng thường xuy&ecirc;n Xe rộng r&atilde;i,an to&agrave;n tiện nghi gia đ&igrave;nh du lịch Xe trang bị hệ thống l&ugrave;i gạc mưa tự động , đ&egrave;n pha led nguy&ecirc;n bản s&aacute;ng , hệ thống giải tr&iacute; nhiều tiện nghi</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/4YSDSJDFXzSd3e6vu4jzoQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/i9-Ww29Yh17c-XLxkAbp9g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/kj8mh_tLoXQtqorSc-BaWw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/krqZo4bvVrILXc8jggming.jpg,https://yotrip.vn/public/backend/uploads/images/cars/N9wM55Y9FlDiiy81uoS7pw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/nMqf5mYRKVFm5kQAo4uneA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/UA1OP6-p8EWnbo2nzYP0Mw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/w9iKVe0zhrqcyJVTUJXylQ.jpg,', 7, 'white', '350', 'petrol', 400, 1, 1, 950000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:30', '21:00', 3, 1, 12, 721, 1, 'active', NULL, '2022-03-16 02:09:52', '2022-04-11 13:06:28'),
(228, 'KIA CERATO 2019', '<p>Kia cerato 2019 bản 1.6 AT full option Xe gia đ&igrave;nh, nội thất sang trọng, sạch sẽ Gi&aacute; cả hợp l&yacute; Uy t&iacute;n, chất lượng</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5GQJ3JihhhDFQ8Cig76t_A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7dg5lzhJ2iOldPg33mf4tg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-SagM2iAiVUR_dTIS1aBqg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/srS9_oS5DjTYdusOtUOgow.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TfDuDWMmtEqStEVlQbd5Uw.jpg,', 4, 'Red', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 10, 717, 1, 'active', NULL, '2022-03-16 02:15:11', '2022-04-11 07:43:53'),
(229, 'MAZDA 3 2020', '<p>Mazda 2020 bản full</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/_Ygu6uLlF3qEprOnidX0mA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/cqurqxtprV4XSCq58CpyAg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/EvBcx7m4V-GdvRbw_-geZw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/l_2rizO3HOSsrSkf16xeDA.jpg,', 5, 'Black', '250', 'petrol', 300, 1, 1, 900000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 11, 722, 1, 'active', NULL, '2022-03-16 02:18:20', '2022-04-11 09:44:34'),
(230, 'MAZDA 3 2021', '<pre>Mazda 3 đăng k&iacute; 2021-2022. Xe mới, sạch sẽ</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/ACgc7X1GkjqZdQZ3in4v8Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/h9VvrDgUNd7u-9RgLMBDtw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Oak3hHtVSvzrZF56R3NN2A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TuS0I4nkGjg7HX82dR0GDw.jpg,', 4, 'Red', '350', 'petrol', 400, 1, 1, 950000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 11, 721, 1, 'active', NULL, '2022-03-16 02:21:12', '2022-04-11 09:50:28'),
(231, 'TOYOTA INNOVA E 2019', '<p>inova 7c đời mới xe sạch nội thất đầy đủ xe gia đ&igrave;nh</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/N16czSMMRHCEHcVuy-hZUg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/OX8t6UP9wCG9jIuOhFsKBQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/PHs5Sk4K6VC6o2OX5Fvb1g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/qnb9QTVyPvHEbywf2imXJw.jpg,', 7, 'white', '400', 'petrol', 450, 1, 1, 800000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 2, 719, 1, 'active', NULL, '2022-03-16 02:25:33', '2022-04-11 13:38:15'),
(232, 'MORRIS GARAGES ZS COMFORT 2021', '<p>MG ZS Smart Up 2021 bản Comfort. M&aacute;y 1.5, số tự động. Đăng k&yacute; th&aacute;ng 4/2021. D&aacute;ng SUV 5 chỗ gầm cao rất th&iacute;ch hợp cho chuyến du lịch Đ&agrave; Lạt của bạn. Xe trang bị nhiều tiện nghi an to&agrave;n h&agrave;ng đầu như Phanh Tay Điện Tử, Auto Hold, Cruise Control, &aacute;p suất lốp trực tiếp tr&ecirc;n m&agrave;n h&igrave;nh, Hỗ trợ đỗ đ&egrave;o, Khởi h&agrave;nh ngang dốc, k&iacute;nh, gương chỉnh điện, Cam l&ugrave;i, Cảm biến l&ugrave;i, Đ&egrave;n full Led, Cam h&agrave;nh tr&igrave;nh (c&oacute; cảnh b&aacute;o tốc độ, cam phạt nguội), cốp rộng r&atilde;i, m&agrave;n h&igrave;nh 10 inch kết nối Android Auto hoặc Apple Carplay, v.v... Xe gia đ&igrave;nh đi kĩ, vệ sinh sạch sẽ trước khi giao xe, bảo tr&igrave;, bảo dưỡng đầy đủ, xe c&ograve;n rất mới.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/a-MeXuQA3ISv_IjtJJFlVA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/da3WpqgVDMzK9nY5xYuj6A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/sq4Oi8wcalsMHu1TAwZEiw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Ue0OtRrtHxi5RpB5Fa9AuQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/UfDMtJkrNf5iwrUF481iVQ.jpg,', 5, 'Red', '350', 'petrol', 400, 1, 1, 700000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 13, 717, 1, 'active', NULL, '2022-03-16 02:28:42', '2022-04-11 13:12:03'),
(233, 'TOYOTA FORTUNER G 2011', '<p>Xe dep sach se 7 cho ngoi M&aacute;y dầu C&oacute; hỗ trợ t&agrave;i xế</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/faPzVlguRkggT1N37_a43A (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/faPzVlguRkggT1N37_a43A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Ka0AdZsV9k72MYs4M-hs6Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/KSJCKdfUCs_DEq8j45dVrg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/nmyBAfy4NlQUx17wXHQ67Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/nYKitTdjB6XBTKPTOM1kZg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Pe6UY9whRHnDcfKWcyq-Rw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/rGCyDvuYHsdHpZIm1iSpMA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TUp77k-k3cQfgjJs6V_IeA.jpg,', 7, 'Gray', '200', 'petrol', 250, 1, 1, 1100000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 2, 722, 1, 'active', NULL, '2022-03-16 02:32:22', '2022-04-11 13:26:42'),
(234, 'TOYOTA INNOVA E 2018', '<p>Xe sạch sẽ bảo dưỡng đầy đủ. Đầy đủ tiện &iacute;ch DVD androi camera cặp lề camera l&ugrave;i,&hellip;..</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/50n4FFcOxHscaGIuyaxGrw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/kIPdNwXM0sJOmlXsESxAkA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZIBmglwz_X9nQ8UtP5-8yg.jpg,', 8, 'Gray', '300', 'petrol', 350, 1, 1, 1120000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 2, 726, 1, 'active', NULL, '2022-03-16 02:36:01', '2022-04-11 13:36:51'),
(235, 'KIA CERATO 2017', '<p>KIA CERATO 2017</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/HeGEUSfEa4XnSIm0SiNKrA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/kRFlfCEm9Fp4_CTs1IG5gg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/PGkNbAa2ygcCKV3DsKi4vQ.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 10, 729, 1, 'active', NULL, '2022-03-16 02:39:51', '2022-04-11 07:36:16'),
(236, 'CHEVROLET SPARK 2010', '<p>Xe Chevrolet Spark được nhiều người nhận định l&agrave; phương tiện di chuyển phong c&aacute;ch với ưu điểm như: tiết kiệm tối đa nhi&ecirc;n liệu, chi ph&iacute; vận h&agrave;nh v&agrave; bảo dưỡng thấp, tay l&aacute;i mượt m&agrave; dễ di chuyển tr&ecirc;n mọi tuyến đường trong v&agrave; ngo&agrave;i th&agrave;nh phố. Ngoại thất xe nổi bật với thiết kế phong c&aacute;ch thời trang năng động. Hơn nữa xe Chevrolet Spark ph&ugrave; hợp với với chuyến du lịch đi xe nhờ được thiết kế chuy&ecirc;n chở h&agrave;ng h&oacute;a, n&ecirc;n c&oacute; thể chứa nhiều h&agrave;nh l&yacute; trong c&aacute;c chuyến đi xa.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/4Js2PFRHezYeC8DTyvNvyA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/gbfWcYZA1MahS8PKSguXFg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/XLXvqT8n0R-SmO45bTQVsw.jpg,', 4, 'Gray', '300', 'petrol', 350, 1, 1, 450000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 2, 1, 1, 716, 2, 'active', '2022-04-13', '2022-03-16 02:44:34', '2022-04-13 09:34:32'),
(237, 'TOYOTA INNOVA 2014', '<pre>Xe innova đời cao.Bảo dưỡng định k&igrave;.An to&agrave;n bảo đảm cho kh&aacute;ch h&agrave;ng. </pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/7297 (2).jpg,https://yotrip.vn/public/backend/uploads/images/cars/7301 (1).jpg,', 8, 'Gray', '250', 'petrol', 300, 1, 1, 800000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 2, 720, 2, 'active', NULL, '2022-03-16 02:48:01', '2022-04-11 13:33:20'),
(238, 'CHEVROLET AVEO 2018', '<p>chevrolet aveo 2018.. xe gia đ&igrave;nh sạch sẽ ... trang bị nội thất đầy đủ... dvd .. cảm biến l&ugrave;i... camera h&agrave;nh tr&igrave;nh</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/JF1Drbutr8wALQ9kZd-LeA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Nr7vz4E7cj5VuZxS6STgPA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/R9ATFjyTODHiM5J70LVItw.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 600000, 0, 0, 20, 'Lâm Đồng', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-04-16', '2022-04-30', '10:00', '22:00', 2, 1, 1, 187, 1, 'active', NULL, '2022-03-16 02:51:41', '2022-04-13 04:33:03'),
(239, 'TOYOTA FORTUNER G 2011', '<pre>Xe gia đ&igrave;nh mới, đẹp.</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/0hqV4bSP6t1h0qjuigBXRA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/H8ndXjQaR03X6QMT45ar9w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/iwW9uuS6MSYbG1yO6Po6vw.jpg,', 7, 'Gray', '300', 'petrol', 350, 1, 1, 1000000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 2, 721, 2, 'active', NULL, '2022-03-16 02:55:05', '2022-04-11 13:28:42'),
(240, 'FORD RANGER XLT 2014', '<p>Ford ranger số s&agrave;n 2 cầu. Ph&ugrave; hợp thu&ecirc; đi chơi địa h&igrave;nh đ&agrave; lạt.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/5tHifKZqYgfnvcoXzBOilA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/8OpPsM0wXjEPpFf65OEbuQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/f7VaYg_7gaaMuqT5LAxkHg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/H3QY6KTWudv23pZd2mA9jw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/kQd21K5aEneQKBQ7QBjjcQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/opfDZ8pdu-cADpFajNTNBg.jpg,', 5, 'Black', '350', 'petrol', 390, 1, 1, 790000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '22:30', '22:30', 3, 1, 8, 726, 2, 'active', NULL, '2022-03-16 03:23:05', '2022-04-10 18:40:49'),
(241, 'FORD FOCUS 2016', '<p>FORD FOCUS 2016 Cửa sổ trần Kho&aacute; cửa trẻ em Gạt mưa tự động 12 Cảm biến quanh xe Phanh tự động, radar cảnh b&aacute;o va chạm</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/AFWPifsoTw-PRHJ3pa8dNw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/bK-BUf66EhpmpOurLrZ9qg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/-CnEmkWkF8b53EsPz11PSA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ivHOMTSZ3w9Ej1_1RAdohA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vi72Y0fcUaOYb97by2hNrQ.jpg,', 5, 'white', '350', 'petrol', 370, 1, 1, 700000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '22:00', '22:00', 2, 1, 8, 727, 2, 'active', '2022-04-22', '2022-03-16 03:29:16', '2022-04-22 14:24:38'),
(242, 'KIA RONDO 2018', '<p>KIA RONDO 2018</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/3CtKmVacOUEGfLq213utIQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/5BOWT3i75iRrfublAvPfwA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/9UaLKUeTbAirDkdkOhC0Bw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/V5gV3UeHxohVYsu3KbistA.jpg,', 7, 'white', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '22:00', '22:00', 3, 1, 10, 726, 2, 'active', NULL, '2022-03-16 03:33:25', '2022-04-11 09:35:33'),
(243, 'MITSUBISHI ATTRAGE 2021', '<p>MITSUBISHI ATTRAGE 2021</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/4l_KuEOZaQOJP9qUDkuV-Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/46qK2mg4W6fpuPmBz2OOHg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/m_My8iEcWjLF9yPv67Tyhw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/NuRAwIeLj3VxHTAQRtT5ig.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 700000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 12, 728, 2, 'active', NULL, '2022-03-16 03:36:56', '2022-04-11 12:57:45'),
(244, 'MITSUBISHI XPANDER 2021', '<p>Mitsubishi Xpander, xe mới nguy&ecirc;n bản, tiện nghi, sạch sẽ, biển số tam hoa đẹp.(&Yacute; nghĩa l&agrave; thượng lộ b&igrave;nh an, đi v&agrave; về đều gặp nhiều may mắn, thuận lợi). Trang bị đầy đủ m&agrave;n h&igrave;nh giải tr&iacute; đa phương tiện, cảm biến l&ugrave;i, camera l&ugrave;i, camera h&agrave;nh tr&igrave;nh, phim c&aacute;ch nhiệt gi&uacute;p qu&yacute; kh&aacute;ch dễ d&agrave;ng v&agrave; thuận lợi.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/11CTqYlDp36wU4ul323Qog.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ajt920y_Amxqx1S06OexdA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/BGzf3NOraKvhiEGBaolFNA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/doClmwaH_ns5nVfSvAPvNg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hFF77pEwxT0ovpe7PHRR5g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/i72GARui2J2mFsdaX5Jshw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/IxvFvNNwxcDX-MG4Jg1LMg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/jI12e50AnlkBJiDAU6BAfQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/lxDRp-gnMIkoXVRoRVACvA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tqd5DO0WnXZFoWZG4OIzZA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TUsMFLYDnDHI3bCtBVctxw.jpg,', 7, 'Gray', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '22:00', '21:00', 3, 1, 12, 720, 2, 'active', NULL, '2022-03-16 03:40:56', '2022-04-11 13:07:09'),
(245, 'KIA CERATO 2019', '<p>Xe gia đ&igrave;nh</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/1vwSf2AAq4_ol7Mzhezc_w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7LyO2eCm5J9M-BZbeFQQIQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/8WWnnqgfLZGItT1qp6js1w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/mkrsZ2Mi_kDyrq6sxKu1vw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Vae3TMCEudChZqCv54RS-A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/yyrLa0nbGlUQZCBUOxHKJQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZoQxHWmw1h-R6NOH06xvQQ.jpg,', 4, 'Black', '300', 'petrol', 350, 1, 1, 750000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '22:00', '22:00', 3, 1, 10, 730, 2, 'active', NULL, '2022-03-16 03:44:50', '2022-04-11 14:40:26'),
(246, 'KIA CERATO 2017', '<p>KIA CERATO 2017</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/8gg61lZay1C6sj1NXLt29Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/hn6M-r5ex45bZpqB_KuB-Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Jx-Plzp-627_8CYbUhubNg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/luhYG16hYDDAn4S4KQr-yA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/RTc3FG5kmEBwdNvlRuAnTw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/X_FH7whrbbY2K6TXzdLilw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/xXuI7IrkWCLDoljbwHU6DA.jpg,', 4, 'white', '200', 'petrol', 250, 1, 1, 1000000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '22:00', '22:00', 3, 1, 10, 719, 2, 'active', NULL, '2022-03-16 03:48:49', '2022-04-11 07:36:54');
INSERT INTO `la_cars` (`id`, `name`, `description`, `photo`, `seat`, `color`, `make`, `fuel`, `power`, `gearbox`, `luggage`, `price`, `service_charge`, `insurance_fees`, `discount`, `address`, `latitude`, `longitude`, `terms_of_use`, `rules`, `start_date`, `end_date`, `start_time`, `end_time`, `users_id`, `categories_id`, `renders_id`, `city_id`, `range_of_vehicle`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(247, 'KIA CERATO 2018', '<p>7l&iacute;t/100 km&nbsp;</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/7431.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7434.jpg,https://yotrip.vn/public/backend/uploads/images/cars/7450.jpg,', 4, 'Red', '250', 'petrol', 300, 1, 1, 900000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 10, 721, 2, 'active', NULL, '2022-03-16 03:52:01', '2022-04-11 07:37:35'),
(248, 'KIA CERATO 2020', '<p>Cerato số s&agrave;n đăng ký 2/2020</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/6QLsV4Th8jGd_JR2SSqlwA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/9e8MSiInkrwZLEvCvxorCw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/REaHE6dFlRzZw0ZUfKHIXA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tXaVAXoFqjoMKDTWZGgAZw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZADT39X93eWIZJsce0XqBg.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 720000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '20:00', 3, 1, 10, 722, 2, 'active', NULL, '2022-03-16 03:55:27', '2022-04-11 09:27:43'),
(249, 'CHEVROLET CRUZE 2013', '<pre>Chroverlet cruze 2013\r\nForm đẹp. \r\nM&agrave;u v&agrave;ng c&aacute;t.\r\nXe l&ecirc;n nhiều đồ chơi: M&agrave;n android, youtube, 4g, ph&aacute;t wiffi. Loa Sub. Đ&egrave;n bi xenon ban đ&ecirc;m cực s&aacute;ng\r\nXe Mỹ n&ecirc;n đi đường trường bao đằm. 6l/100km</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/CSdK4tXO5ftgXSURaWpoig.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pycIftjtrW3FsHfWJ0ewoA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/R-btWDDXtDYfEJWlfor2MQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/rfbBVnz-1uCJ7g4A8yMjVQ.jpg,', 5, 'Gray', '350', 'petrol', 400, 1, 1, 610000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-04-13', '2022-04-19', '22:00', '21:00', 2, 1, 1, 720, 2, 'active', '2022-04-22', '2022-03-16 03:59:16', '2022-04-22 14:24:32'),
(250, 'TOYOTA INNOVA E 2014', '<pre>TOYOTA INNOVA E 2014</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/KN2EOuvxYyIDGRIjehzeZw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pz7tngZ5bkHOQskSd9jXaA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/T7YivUGcsVmOUHaY8PJhrg.jpg,', 8, 'Gray', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 2, 718, 2, 'active', NULL, '2022-03-16 04:02:14', '2022-04-11 13:34:39'),
(251, 'TOYOTA FORTUNER 2012', '<pre>TOYOTA FORTUNER 2.5L 2012</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/GhMYZmgkGeNW8ZeziklEGw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Vh_mMlNwxC-QJOAT13g2DQ.jpg,', 7, 'Gray', '400', 'petrol', 450, 1, 2, 1200000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '23:00', '23:00', 3, 1, 2, 724, 2, 'active', NULL, '2022-03-16 04:06:44', '2022-04-11 13:19:55'),
(252, 'MORRIS GARAGES HS 1.5T LUX TROPHY 2021', '<pre>Xe MG hs với đầy đủ trang bị, phanh tay điện tử, auto hold, cảnh b&aacute;o điểm m&ugrave;. Xe mạnh với 160 m&atilde; lực. Ghế ngồi thể thao rộng r&atilde;i</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/CjD2Y2U9r_OkAd6w6Jzanw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/dd9rQkb-xAJTqlNFC6SiCw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/huG3MWCp21q2ZZgvhX8Gzw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Zln-Wk616pV-J8sxa4Dj0Q.jpg,', 5, 'white', '200', 'petrol', 250, 1, 1, 1300000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 13, 721, 2, 'active', NULL, '2022-03-16 04:11:13', '2022-04-11 13:10:29'),
(253, 'TOYOTA INNOVA G 2010', '<p>innova 2010 .xe gia đ&igrave;nh . sạch sẽ . rộng r&atilde;i . qu&yacute; khach cần th&igrave; li&ecirc;n hệ</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/Hkoi88DgBJqeOSuaTKrZOw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/sLpUOW_cWW5nLkvaatcK0A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/to7IseLb89SLCI8gFsYxpA.jpg,', 8, 'white', '200', 'petrol', 250, 1, 1, 800000, 0, 0, 10, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '20:00', 3, 1, 2, 729, 2, 'active', NULL, '2022-03-16 04:14:59', '2022-04-11 13:40:51'),
(254, 'MAZDA 3 2020', '<pre>Mazda3 all new số tự động đăng k&iacute; th&aacute;ng 12/2020\r\nXe gia đ&igrave;nh mới đẹp, nội thất nguy&ecirc;n bản sạch sẽ, b&atilde;o dưỡng thường xuy&ecirc;n, rửa xe miễn ph&iacute; cho kh&aacute;ch.\r\nXe rộng r&atilde;i an to&agrave;n, tiện nghi, ph&ugrave; hợp cho gia đ&igrave;nh du lịch.\r\nXe trang bị hệ thống cảm biến l&ugrave;i, gạt mưa tự động, đ&egrave;n pha tự động, hệ thống giải tr&iacute; c&ugrave;ng nhiều tiện nghi kh&aacute;c...</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/BjV7hSAYUVos1wIuxe1SOQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/cT8242IHhprwPqA8MIsp9A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/dis4k5dD-gj0iZIl1xjbYA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/JuwR62JgZAUoVAUyATzR6Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/M6q10SJ1GnmCARKAF40-bQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/n4BVWfFbOm9Deh_UAUU1qg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/OhdIVwavHCBtdpIqqMO6AQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/p7hmJr3AzrsBdSXwA-T1ow.jpg,https://yotrip.vn/public/backend/uploads/images/cars/pnNkWCeGfSSXELOD5NvtEQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uocfj_hJDWjiQaIHSCyzKg.jpg,', 5, 'white', '300', 'petrol', 350, 1, 1, 900000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 11, 727, 2, 'active', NULL, '2022-03-16 04:18:40', '2022-04-11 09:47:30'),
(255, 'HONDA CITY 2017', '<pre>HONDA CITY 2017</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/12e4lMJbseYM-ztNm7uzSA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/j7ql5aZTIDu9An3jtJ1lRw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/MvcUIAKnDXFyErjwmRWBkA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/zym_ZKnjD5LuqvHXsnJczQ.jpg,', 4, 'white', '300', 'petrol', 350, 1, 1, 800000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 3, 727, 2, 'active', NULL, '2022-03-16 04:21:40', '2022-04-11 13:05:06'),
(256, 'SUZUKI XL7 2021', '<p>SUZUKI XL7 2021</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/k12kjenTCjrcNx4-i0_fBw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/oLUCblt_Pv0p9Z_2pTVEcg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/tBVKjc3b1WuDjP_hIZf2_A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TfGunY0I-oVfdQKevjWqKg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uyaiQOnytRvLisXXIxIl-A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vzxalmDl7EeH4WkH37n-TQ.jpg,', 7, 'organ', '400', 'petrol', 450, 1, 1, 900000, 0, 0, 0, 'Đà Lạt', 0, 0, '1', 'VUI LÒNG GỌI HOẠC lLIÊN HỆ ZALO ĐỂ LẠI SỐ ĐIỆN THOẠI PHẦN TIN NHẮN ĐỂ BIẾT THÊM THÔNG TIN CHI TIẾT.', '2022-03-16', '2022-03-17', '21:00', '21:00', 3, 1, 9, 716, 2, 'active', NULL, '2022-03-16 04:24:33', '2022-04-11 13:17:31'),
(258, 'SUZUKI ERTIGA 2019', '<p>etiga 2019 đăng k&yacute; th&aacute;ng 10. xe số s&agrave;n</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/Dc5aSz-0E3dRltZQhqTxww.jpg,https://yotrip.vn/public/backend/uploads/images/cars/fhJF9GiG1jdH4tGMDzpN1Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/mCh_ihclbTpDS65-y4JDuQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/olT6mJyfs610xkhJ2CGTww.jpg,https://yotrip.vn/public/backend/uploads/images/cars/w-T699fJAfN5K6-_9KF73Q.jpg,https://yotrip.vn/public/backend/uploads/images/cars/xgl_LcnmDYoo7qqarziImw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZFqzQzXtOIPMB4Vha7L0cg.jpg,', 7, 'gray', '200', 'petrol', 250, 1, 2, 696000, 0, 0, 10, 'Quận Bình Tân, Hồ Chí Minh', 0, 0, 'Hỗ trợ đưa đón trong vòng 10 km\r\n\r\nPhí đưa đón 10K /km\r\n\r\nMiễn phí đưa đón trong vòng 5 km', '\"1. Qúy khách vui lòng không hút thuốc trên xe hoặc mang các thực phẩm có mùi\r\n2. Để đảm bảo thời gian đón khách đúng giờ & tránh tắc đường, tài xế chỉ đón khách tại điểm đã đặt xe hoặc điểm thay thế (Vui lòng báo trước cho tài xế trong trường hợp có thay', '2022-04-18', '2022-04-30', '17:00', '23:45', 2, 1, 9, 17, 2, 'active', NULL, '2022-04-13 08:42:13', '2022-04-18 01:33:22'),
(259, 'BMW 320i 2016', '<p>BMW 320i 2016</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/SjxNv9aZrs0gaN1BGXcTbw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/uj4zd9b_3c7zrUaG9QaWDw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/vtHaL0bLPUjaAiCs9eWFPg (1).jpg,https://yotrip.vn/public/backend/uploads/images/cars/yUP4jIJ840vxzFrRkDh6IQ.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ZFqzQzXtOIPMB4Vha7L0cg.jpg,', 4, 'black', '200', 'petrol', 250, 1, 1, 1800000, 108000, 108000, 0, 'Quận Bình Thạnh, Hồ Chí Minh', 0, 0, '30 triệu (tiền mặt/chuyển khoản cho chủ xe khi nhận xe)\r\nhoặc Xe máy (kèm cà vẹt gốc) giá trị 30 triệu', '1. Chấp nhận Hộ khẩu Thành phố/KT3 Thành phố/Hộ khẩu tỉnh/Passport (Bản gốc) (Giữ lại khi nhận xe)\r\nCMND và GPLX đối chiếu\r\n2. Tài sản đặt cọc (1 trong 2 hình thức)\r\n- Xe máy (giá trị >30triệu) + Cà vẹt (bản gốc)\r\n- Hoặc cọc tiền mặt 30 triệu.\r\n\r\n* Quý kh', '2022-04-19', '2022-04-26', '03:54', '16:54', 2, 1, 16, 14, 1, 'active', NULL, '2022-04-18 07:53:06', '2022-04-18 07:53:06'),
(260, 'DAEWOO LACETTI 2010', '<p>Xe Laceti 2010 c&ograve;n mới, xe nh&agrave; đi &iacute;t, nội thất sạch sẽ, m&aacute;y chạy &ecirc;m, tiết kiệm nhi&ecirc;n liệu. Khoang xe rộng r&atilde;i cho 5 người, cốp xe rộng 500 lit.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/0UDhlAJph_HmTKpQYXBM6g.jpg,https://yotrip.vn/public/backend/uploads/images/cars/1CfPx56q1OMZXTVdlVMhRw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Blxl0_cRAoo-48y5SPYRvg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/CMk3kNtjEWctNrr5N6PrLg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Dc5aSz-0E3dRltZQhqTxww.jpg,', 5, 'gray', '200', 'petrol', 250, 1, 1, 500000, 27000, 0, 10, 'Thủ Dầu Một, Bình Dương', 0, 0, '15 triệu (tiền mặt/chuyển khoản cho chủ xe khi nhận xe)\r\nhoặc Xe máy (kèm cà vẹt gốc) giá trị 15 triệu', '1. Chấp nhận Hộ khẩu Thành phố/KT3 Thành phố/Hộ khẩu tỉnh/Passport (Bản gốc) (Giữ lại khi nhận xe)\r\nCMND và GPLX đối chiếu\r\n2. Tài sản đặt cọc (1 trong 2 hình thức)\r\n- Xe máy (giá trị >15triệu) + Cà vẹt (bản gốc)\r\n- Hoặc cọc tiền mặt 15 triệu.\r\n\r\n* Quý kh', '2022-04-20', '2022-04-30', '02:00', '15:00', 2, 1, 17, 131, 2, 'active', NULL, '2022-04-18 07:58:21', '2022-04-18 07:58:21'),
(261, 'MERCEDES C300 AMG 2020', '<p>Mercedes C300 AMG 2020 m&agrave;u đỏ mới, xe sạch sẽ, nội ngoại thất sang trọng, thể thao, tiết kiệm xăng, xe đi &ecirc;m chống sock cực tốt. Full option Ph&ugrave; hợp cho c&aacute;c anh chị đi sự kiện, tiệc v&agrave; tr&atilde;i nghiệm.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/jB-QCTlVEXGMHwpeCNe2dA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/LphDVyvhCfGJErj5AoSTkw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/LsDd1xpFVqSGc3_D5FEQ_A.jpg,https://yotrip.vn/public/backend/uploads/images/cars/ujgxdLgClYBaQxoZnZAyGA.jpg,', 4, 'white', '200', 'petrol', 300, 1, 2, 2599000, 155940, 155940, 0, 'Quận 10, Hồ Chí Minh', 0, 0, '30 triệu (tiền mặt/chuyển khoản cho chủ xe khi nhận xe)\r\nhoặc Xe máy (kèm cà vẹt gốc) giá trị 30 triệu', '\"1. Chấp nhận Hộ khẩu Thành phố/KT3 Thành phố/Hộ khẩu tỉnh/Passport (Bản gốc) (Giữ lại khi nhận xe)\r\nCMND và GPLX đối chiếu\r\n2. Tài sản đặt cọc (1 trong 2 hình thức)\r\n- Xe máy (giá trị >30triệu) + Cà vẹt (bản gốc)\r\n- Hoặc cọc tiền mặt 30 triệu.\r\n\r\n* Quý k', '2022-04-21', '2022-04-30', '17:02', '17:05', 2, 1, 18, 10, 1, 'active', NULL, '2022-04-18 08:02:29', '2022-04-18 08:24:36'),
(262, 'PEUGEOT 2008 2021', '<pre>Xe nh&agrave; sạch sẽ v&agrave; lu&ocirc;n mới\r\nrất mong phục vụ anh em gần xa</pre>', 'https://yotrip.vn/public/backend/uploads/images/cars/24mBphSghocKnlZvQZYUZg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/aBOWliCgS9557OWmYxD9vA.jpg,https://yotrip.vn/public/backend/uploads/images/cars/qHTQEJ4mrWLpdB-wmVWr8w.jpg,https://yotrip.vn/public/backend/uploads/images/cars/TrJlTtjDfH6_W9NpccTKww.jpg,', 5, 'white', '200', 'petrol', 300, 1, 2, 1200000, 72000, 72000, 0, 'Huyện Hóc Môn, Hồ Chí Minh', 0, 0, '15 triệu (tiền mặt/chuyển khoản cho chủ xe khi nhận xe)\r\nhoặc Xe máy (kèm cà vẹt gốc) giá trị 15 triệu', '1. Chấp nhận Hộ khẩu Thành phố/Hộ khẩu tỉnh/Passport (Bản gốc) (Giữ lại khi nhận xe)\r\nCMND và GPLX đối chiếu\r\n2. Tài sản đặt cọc (1 trong 2 hình thức)\r\n- Xe máy (giá trị >15triệu) + Cà vẹt (bản gốc)\r\n- Hoặc cọc tiền mặt 15 triệu.\r\n\r\n* Quý khách lưu ý một ', '2022-04-20', '2022-04-30', '05:05', '16:05', 2, 1, 19, 23, 2, 'active', NULL, '2022-04-18 08:06:12', '2022-04-18 08:06:12'),
(263, 'VOLKSWAGEN POLO 2016', '<p>Volkswagen Polo đăng k&iacute; th&aacute;ng 05/2018 - Xe gia đ&igrave;nh sử dụng. - Xe kh&ocirc;ng c&oacute; m&ugrave;i h&ocirc;i, sạch sẽ, nội thất nguy&ecirc;n bản. - Cam h&agrave;nh tr&igrave;nh với cảnh b&aacute;o va chạm, cảnh b&aacute;o di chuyển, cảnh b&aacute;o lệch l&agrave;n đường. - Xe Đức nhập khẩu. V&ocirc; lăng trợ lực điện cảm biến theo tốc độ.</p>', 'https://yotrip.vn/public/backend/uploads/images/cars/6JeAnOCr0umrtG2Z8sDAwg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/EWtIokP0QbDsMEVIZVa7aw.jpg,https://yotrip.vn/public/backend/uploads/images/cars/mk3IUFOtGi8UfnlaFqnbGg.jpg,https://yotrip.vn/public/backend/uploads/images/cars/Y5adLjFJYaWzlnHPoBvtbA.jpg,', 5, 'white', '200', 'petrol', 300, 1, 1, 675000, 40500, 40500, 0, 'Quận Phú Nhuận, Hồ Chí Minh', 0, 0, '15 triệu (tiền mặt/chuyển khoản cho chủ xe khi nhận xe)\r\nhoặc Xe máy (kèm cà vẹt gốc) giá trị 15 triệu', '1. Chấp nhận Hộ khẩu Thành phố/KT3 Thành phố/Hộ khẩu tỉnh/Passport (Bản gốc) (Giữ lại khi nhận xe)\r\nCMND và GPLX đối chiếu\r\n2. Tài sản đặt cọc (1 trong 2 hình thức)\r\n- Xe máy (giá trị >15triệu) + Cà vẹt (bản gốc)\r\n- Hoặc cọc tiền mặt 15 triệu.\r\n\r\n* Quý kh', '2022-04-19', '2022-04-29', '17:10', '16:10', 2, 1, 20, 16, 2, 'active', NULL, '2022-04-18 08:10:35', '2022-04-18 08:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `la_categories`
--

CREATE TABLE `la_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categories_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_categories`
--

INSERT INTO `la_categories` (`id`, `categories_name`, `created_at`, `updated_at`) VALUES
(1, 'Oto', '2021-09-10 17:37:25', '2022-04-06 14:44:52'),
(2, 'motorbike', '2021-09-10 17:37:31', '2021-09-19 15:58:56'),
(3, 'Xe đạp', '2021-09-19 15:59:05', '2021-09-19 15:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `la_city`
--

CREATE TABLE `la_city` (
  `id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Thành phố/quận/huyện' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `la_city`
--

INSERT INTO `la_city` (`id`, `region_id`, `title`, `updated_at`, `created_at`) VALUES
(1, 1, 'Quận 1', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(2, 1, '\r\nQuận 2', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(3, 1, '\r\nQuận 3', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(4, 1, '\r\nQuận 4', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(5, 1, '\r\nQuận 5', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(6, 1, '\r\nQuận 6', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(7, 1, '\r\nQuận 7', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(8, 1, '\r\nQuận 8', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(9, 1, '\r\nQuận 9', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(10, 1, '\r\nQuận 10', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(11, 1, '\r\nQuận 11', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(12, 1, '\r\nQuận 12', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(13, 1, '\r\nQuận Bình Tân', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(14, 1, '\r\nQuận Bình Thạnh', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(15, 1, '\r\nQuận Gò Vấp', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(16, 1, '\r\nQuận Phú Nhuận', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(17, 1, '\r\nQuận Tân Bình', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(18, 1, '\r\nQuận Tân Phú', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(19, 1, '\r\nQuận Thủ Đức', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(20, 1, '\r\nHuyện Bình Chánh', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(21, 1, '\r\nHuyện Cần Giờ', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(22, 1, '\r\nHuyện Củ Chi', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(23, 1, '\r\nHuyện Hóc Môn', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(24, 1, '\r\nHuyện Nhà Bè', '2019-12-20 10:13:58', '2019-12-20 10:13:58'),
(25, 2, 'Quận Ba Đình', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(26, 2, '\r\nQuận Hoàn Kiếm', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(27, 2, '\r\nQuận Hai Bà Trưng', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(28, 2, '\r\nQuận Đống Đa', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(29, 2, '\r\nQuận Cầu Giấy', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(30, 2, '\r\nQuận Long Biên', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(31, 2, '\r\nQuận Hoàng Mai', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(32, 2, '\r\nHuyện Sóc Sơn', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(33, 2, '\r\nQuận Bắc Từ Liêm', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(34, 2, '\r\nHuyện Thanh Trì', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(35, 2, '\r\nHuyện Gia Lâm', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(36, 2, '\r\nHuyện Ba Vì', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(37, 2, '\r\nHuyện Chương Mỹ', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(38, 2, '\r\nHuyện Đan Phượng', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(39, 2, '\r\nHuyện Hoài Đức', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(40, 2, '\r\nHuyện Mỹ Đức', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(41, 2, '\r\nHuyện Phú Xuyên', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(42, 2, '\r\nHuyện Phúc Thọ', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(43, 2, '\r\nHuyện Quốc Oai', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(44, 2, '\r\nHuyện Thạch Thất', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(45, 2, '\r\nHuyện Thanh Oai', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(46, 2, '\r\nHuyện Thường Tín', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(47, 2, '\r\nHuyện Ứng Hòa', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(48, 2, '\r\nHuyện Mê Linh', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(49, 2, '\r\nQuận Hà Đông', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(50, 2, '\r\nThị xã Sơn Tây', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(51, 2, '\r\nHuyện Đông Anh', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(52, 2, '\r\nQuận Nam Từ Liêm', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(53, 2, '\r\nQuận Thanh Xuân', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(54, 2, '\r\nQuận Tây Hồ', '2019-12-20 10:19:10', '2019-12-20 10:19:10'),
(55, 3, 'Huyện Hoàng Sa', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(56, 3, '\r\nQuận Thanh Khê', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(57, 3, '\r\nHuyện Hòa Vang', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(58, 3, '\r\nQuận Sơn Trà', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(59, 3, '\r\nQuận Liên Chiểu', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(60, 3, '\r\nQuận Hải Châu', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(61, 3, '\r\nQuận Cẩm Lệ', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(62, 3, '\r\nQuận Ngũ Hành Sơn', '2019-12-20 10:21:05', '2019-12-20 10:21:05'),
(63, 4, 'Huyện An Phú', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(64, 4, '\r\nHuyện Tịnh Biên', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(65, 4, '\r\nHuyện Châu Phú', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(66, 4, '\r\nHuyện Phú Tân', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(67, 4, '\r\nThành phố Châu Đốc', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(68, 4, '\r\nThành phố Long Xuyên', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(69, 4, '\r\nHuyện Chợ Mới', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(70, 4, '\r\nHuyện Châu Thành', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(71, 4, '\r\nHuyện Tri Tôn', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(72, 4, '\r\nThị xã Tân Châu', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(73, 4, '\r\nHuyện Thoại Sơn', '2019-12-20 10:23:03', '2019-12-20 10:23:03'),
(74, 5, 'Huyện Xuyên Mộc', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(75, 5, '\r\nHuyện Côn Đảo', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(76, 5, '\r\nHuyện Long Điền', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(77, 5, '\r\nHuyện Châu Đức', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(78, 5, '\r\nThành phố Vũng Tàu', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(79, 5, '\r\nHuyện Tân Thành', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(80, 5, '\r\nThành phố Bà Rịa', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(81, 5, '\r\nHuyện Đất Đỏ', '2019-12-20 10:25:14', '2019-12-20 10:25:14'),
(82, 6, 'Huyện Lục Ngạn', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(83, 6, '\r\nHuyện Sơn Động', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(84, 6, '\r\nHuyện Hiệp Hòa', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(85, 6, '\r\nThành phố Bắc Giang', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(86, 6, '\r\nHuyện Tân Yên', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(87, 6, '\r\nHuyện Việt Yên', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(88, 6, '\r\nHuyện Yên Dũng', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(89, 6, '\r\nHuyện Lạng Giang', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(90, 6, '\r\nHuyện Yên Thế', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(91, 6, '\r\nHuyện Lục Nam', '2019-12-20 10:26:52', '2019-12-20 10:26:52'),
(92, 7, 'Huyện Ngân Sơn', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(93, 7, '\r\nHuyện Chợ Đồn', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(94, 7, '\r\nHuyện Ba Bể', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(95, 7, '\r\nHuyện Chợ Mới', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(96, 7, '\r\nHuyện Bạch Thông', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(97, 7, '\r\nThành Phố Bắc Kạn', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(98, 7, '\r\nHuyện Na Rì', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(99, 7, '\r\nHuyện Pác Nặm', '2019-12-20 10:30:49', '2019-12-20 10:30:49'),
(100, 8, 'Thành phố Bạc Liêu', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(101, 8, '\r\nHuyện Vĩnh Lợi', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(102, 8, '\r\nThị xã Giá Rai', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(103, 8, '\r\nHuyện Hồng Dân', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(104, 8, '\r\nHuyện Phước Long', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(105, 8, '\r\nHuyện Đông Hải', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(106, 8, '\r\nHuyện Hoà Bình', '2019-12-20 10:32:11', '2019-12-20 10:32:11'),
(107, 9, 'Huyện Gia Bình', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(108, 9, '\r\nHuyện Quế Võ', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(109, 9, '\r\nHuyện Tiên Du', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(110, 9, '\r\nThị xã Từ Sơn', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(111, 9, '\r\nHuyện Lương Tài', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(112, 9, '\r\nHuyện Yên Phong', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(113, 9, '\r\nHuyện Thuận Thành', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(114, 9, '\r\nThành phố Bắc Ninh', '2019-12-20 10:34:34', '2019-12-20 10:34:34'),
(115, 10, 'Huyện Bình Đại', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(116, 10, '\r\nHuyện Châu Thành', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(117, 10, '\r\nHuyện Ba Tri', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(118, 10, '\r\nHuyện Thạnh Phú', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(119, 10, '\r\nHuyện Chợ Lách', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(120, 10, '\r\nHuyện Mỏ Cày Nam', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(121, 10, '\r\nHuyện Giồng Trôm', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(122, 10, '\r\nThành phố Bến Tre', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(123, 10, '\r\nHuyện Mỏ Cày Bắc', '2019-12-20 10:36:37', '2019-12-20 10:36:37'),
(124, 11, 'Huyện Bắc Tân Uyên', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(125, 11, '\r\nThị xã Thuận An', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(126, 11, '\r\nThị xã Tân Uyên', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(127, 11, '\r\nThị xã Dĩ An', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(128, 11, '\r\nThị xã Bến Cát', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(129, 11, '\r\nHuyện Dầu Tiếng', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(130, 11, '\r\nHuyện Phú Giáo', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(131, 11, '\r\nThành phố Thủ Dầu Một', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(132, 11, '\r\nHuyện Bàu Bàng', '2019-12-20 10:38:23', '2019-12-20 10:38:23'),
(133, 12, 'Huyện Phú Riềng', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(134, 12, '\r\nHuyện Bù Đăng', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(135, 12, '\r\nThị xã Đồng Xoài', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(136, 12, '\r\nHuyện Đồng Phú', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(137, 12, '\r\nThị xã Bình Long', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(138, 12, '\r\nHuyện Lộc Ninh', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(139, 12, '\r\nThị xã Phước Long', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(140, 12, '\r\nHuyện Chơn Thành', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(141, 12, '\r\nHuyện Bù Đốp', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(142, 12, '\r\nHuyện Bù Gia Mập', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(143, 12, '\r\nHuyện Hớn Quản', '2019-12-20 10:39:22', '2019-12-20 10:39:22'),
(144, 13, 'Huyện Bắc Bình', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(145, 13, '\r\nThị xã La Gi', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(146, 13, '\r\nHuyện Hàm Thuận Nam', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(147, 13, '\r\nHuyện Hàm Tân', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(148, 13, '\r\nHuyện Phú Quí', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(149, 13, '\r\nHuyện Tuy Phong', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(150, 13, '\r\nHuyện Đức Linh', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(151, 13, '\r\nHuyện Tánh Linh', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(152, 13, '\r\nHuyện Hàm Thuận Bắc', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(153, 13, '\r\nThành phố Phan Thiết', '2019-12-20 10:41:06', '2019-12-20 10:41:06'),
(154, 14, 'Huyện Tây Sơn', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(155, 14, '\r\nHuyện Hoài Ân', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(156, 14, '\r\nHuyện Vân Canh', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(157, 14, '\r\nHuyện Hoài Nhơn', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(158, 14, '\r\nHuyện Tuy Phước', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(159, 14, '\r\nThị xã An Nhơn', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(160, 14, '\r\nHuyện Phù Mỹ', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(161, 14, '\r\nThành phố Qui Nhơn', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(162, 14, '\r\nHuyện Phù Cát', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(163, 14, '\r\nHuyện An Lão', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(164, 14, '\r\nHuyện Vĩnh Thạnh', '2019-12-20 10:42:20', '2019-12-20 10:42:20'),
(165, 15, 'Huyện Đầm Dơi', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(166, 15, '\r\nHuyện Cái Nước', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(167, 15, '\r\nHuyện U Minh', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(168, 15, '\r\nHuyện Thới Bình', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(169, 15, '\r\nHuyện Ngọc Hiển', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(170, 15, '\r\nThành phố Cà Mau', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(171, 15, '\r\nHuyện Trần Văn Thời', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(172, 15, '\r\nHuyện Năm Căn', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(173, 15, '\r\nHuyện Phú Tân', '2019-12-20 10:43:42', '2019-12-20 10:43:42'),
(174, 16, 'Huyện Cờ Đỏ', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(175, 16, '\r\nHuyện Phong Điền', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(176, 16, '\r\nQuận Ô Môn', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(177, 16, '\r\nQuận Cái Răng', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(178, 16, '\r\nQuận Bình Thuỷ', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(179, 16, '\r\nQuận Ninh Kiều', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(180, 16, '\r\nQuận Thốt Nốt', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(181, 16, '\r\nHuyện Vĩnh Thạnh', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(182, 16, '\r\nHuyện Thới Lai', '2019-12-20 10:45:19', '2019-12-20 10:45:19'),
(183, 17, 'Huyện Hạ Lang', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(184, 17, '\r\nHuyện Phục Hoà', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(185, 17, '\r\nHuyện Trùng Khánh', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(186, 17, '\r\nHuyện Trà Lĩnh', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(187, 17, '\r\nHuyện Bảo Lâm', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(188, 17, '\r\nHuyện Bảo Lạc', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(189, 17, '\r\nHuyện Hà Quảng', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(190, 17, '\r\nHuyện Quảng Uyên', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(191, 17, '\r\nHuyện Thông Nông', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(192, 17, '\r\nHuyện Thạch An', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(193, 17, '\r\nHuyện Nguyên Bình', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(194, 17, '\r\nHuyện Hoà An', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(195, 17, '\r\nThành phố Cao Bằng', '2019-12-20 10:46:54', '2019-12-20 10:46:54'),
(196, 18, 'Thị xã Ayun Pa', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(197, 18, '\r\nThị xã An Khê', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(198, 18, '\r\nHuyện Phú Thiện', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(199, 18, '\r\nHuyện Đăk Pơ', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(200, 18, '\r\nHuyện Ia Pa', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(201, 18, '\r\nHuyện Mang Yang', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(202, 18, '\r\nHuyện Kông Chro', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(203, 18, '\r\nHuyện Krông Pa', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(204, 18, '\r\nHuyện KBang', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(205, 18, '\r\nHuyện Chư Prông', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(206, 18, '\r\nHuyện Đức Cơ', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(207, 18, '\r\nHuyện Chư Sê', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(208, 18, '\r\nHuyện Đăk Đoa', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(209, 18, '\r\nHuyện Ia Grai', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(210, 18, '\r\nHuyện Chư Păh', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(211, 18, '\r\nThành phố Pleiku', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(212, 18, '\r\nHuyện Chư Pưh', '2019-12-20 10:48:42', '2019-12-20 10:48:42'),
(213, 19, 'Huyện Quang Bình', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(214, 19, '\r\nHuyện Vị Xuyên', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(215, 19, '\r\nHuyện Xín Mần', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(216, 19, '\r\nHuyện Yên Minh', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(217, 19, '\r\nHuyện Quản Bạ', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(218, 19, '\r\nHuyện Bắc Mê', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(219, 19, '\r\nHuyện Đồng Văn', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(220, 19, '\r\nHuyện Hoàng Su Phì', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(221, 19, '\r\nHuyện Bắc Quang', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(222, 19, '\r\nHuyện Mèo Vạc', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(223, 19, '\r\nThành phố Hà Giang', '2019-12-20 10:51:36', '2019-12-20 10:51:36'),
(224, 20, 'Thành phố Phủ Lý', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(225, 20, '\r\nHuyện Bình Lục', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(226, 20, '\r\nHuyện Duy Tiên', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(227, 20, '\r\nHuyện Kim Bảng', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(228, 20, '\r\nHuyện Lý Nhân', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(229, 20, '\r\nHuyện Thanh Liêm', '2019-12-20 10:55:33', '2019-12-20 10:55:33'),
(230, 21, 'Thị xã Kỳ Anh', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(231, 21, '\r\nHuyện Cẩm Xuyên', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(232, 21, '\r\nHuyện Vũ Quang', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(233, 21, '\r\nThành phố Hà Tĩnh', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(234, 21, '\r\nThị xã Hồng Lĩnh', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(235, 21, '\r\nHuyện Kỳ Anh', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(236, 21, '\r\nHuyện Can Lộc', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(237, 21, '\r\nHuyện Hương Sơn', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(238, 21, '\r\nHuyện Nghi Xuân', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(239, 21, '\r\nHuyện Hương Khê', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(240, 21, '\r\nHuyện Đức Thọ', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(241, 21, '\r\nHuyện Thạch Hà', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(242, 21, '\r\nHuyện Lộc Hà', '2019-12-20 10:57:57', '2019-12-20 10:57:57'),
(243, 22, 'Huyện Nam Sách', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(244, 22, '\r\nThành phố Hải Dương', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(245, 22, '\r\nHuyện Ninh Giang', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(246, 22, '\r\nHuyện Bình Giang', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(247, 22, '\r\nHuyện Tứ Kỳ', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(248, 22, '\r\nHuyện Kim Thành', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(249, 22, '\r\nThị xã Chí Linh', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(250, 22, '\r\nHuyện Thanh Miện', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(251, 22, '\r\nHuyện Cẩm Giàng', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(252, 22, '\r\nHuyện Gia Lộc', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(253, 22, '\r\nHuyện Kinh Môn', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(254, 22, '\r\nHuyện Thanh Hà', '2019-12-20 11:01:45', '2019-12-20 11:01:45'),
(255, 23, 'Quận Hồng Bàng', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(256, 23, '\r\nQuận Dương Kinh', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(257, 23, '\r\nQuận Đồ Sơn', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(258, 23, '\r\nHuyện Bạch Long Vĩ', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(259, 23, '\r\nHuyện Cát Hải', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(260, 23, '\r\nHuyện Vĩnh Bảo', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(261, 23, '\r\nHuyện Tiên Lãng', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(262, 23, '\r\nHuyện Kiến Thuỵ', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(263, 23, '\r\nHuyện An Lão', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(264, 23, '\r\nQuận Hải An', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(265, 23, '\r\nHuyện Thuỷ Nguyên', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(266, 23, '\r\nQuận Kiến An', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(267, 23, '\r\nQuận Lê Chân', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(268, 23, '\r\nQuận Ngô Quyền', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(269, 23, '\r\nHuyện An Dương', '2019-12-20 11:17:58', '2019-12-20 11:17:58'),
(270, 24, 'Thị xã Long Mỹ', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(271, 24, '\r\nHuyện Châu Thành A', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(272, 24, '\r\nHuyện Phụng Hiệp', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(273, 24, '\r\nHuyện Vị Thuỷ', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(274, 24, '\r\nHuyện Châu Thành', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(275, 24, '\r\nHuyện Long Mỹ', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(276, 24, '\r\nThị xã Ngã Bảy', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(277, 24, '\r\nThành phố Vị Thanh', '2019-12-20 11:19:20', '2019-12-20 11:19:20'),
(278, 25, 'Huyện Tân Lạc', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(279, 25, '\r\nHuyện Mai Châu', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(280, 25, '\r\nHuyện Kim Bôi', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(281, 25, '\r\nHuyện Lương Sơn', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(282, 25, '\r\nHuyện Đà Bắc', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(283, 25, '\r\nHuyện Lạc Sơn', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(284, 25, '\r\nHuyện Kỳ Sơn', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(285, 25, '\r\nHuyện Yên Thủy', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(286, 25, '\r\nHuyện Lạc Thủy', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(287, 25, '\r\nThành phố Hòa Bình', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(288, 25, '\r\nHuyện Cao Phong', '2019-12-20 11:20:29', '2019-12-20 11:20:29'),
(289, 26, 'Huyện Khoái Châu', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(290, 26, '\r\nHuyện Văn Giang', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(291, 26, '\r\nHuyện Văn Lâm', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(292, 26, '\r\nHuyện Phù Cừ', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(293, 26, '\r\nHuyện Ân Thi', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(294, 26, '\r\nHuyện Mỹ Hào', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(295, 26, '\r\nHuyện Yên Mỹ', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(296, 26, '\r\nHuyện Tiên Lữ', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(297, 26, '\r\nHuyện Kim Động', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(298, 26, '\r\nThành phố Hưng Yên', '2019-12-20 11:21:41', '2019-12-20 11:21:41'),
(299, 27, 'Thành phố Cam Ranh', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(300, 27, '\r\nHuyện Trường Sa', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(301, 27, '\r\nThị xã Ninh Hòa', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(302, 27, '\r\nHuyện Khánh Sơn', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(303, 27, '\r\nHuyện Khánh Vĩnh', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(304, 27, '\r\nHuyện Diên Khánh', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(305, 27, '\r\nHuyện Vạn Ninh', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(306, 27, '\r\nHuyện Cam Lâm', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(307, 27, '\r\nThành phố Nha Trang', '2019-12-20 11:22:51', '2019-12-20 11:22:51'),
(308, 28, 'Huyện Vĩnh Thuận', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(309, 28, '\r\nHuyện Kiên Lương', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(310, 28, '\r\nThành phố Rạch Giá', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(311, 28, '\r\nHuyện Hòn Đất', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(312, 28, '\r\nHuyện Châu Thành', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(313, 28, '\r\nHuyện Gò Quao', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(314, 28, '\r\nThị xã Hà Tiên', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(315, 28, '\r\nHuyện Tân Hiệp', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(316, 28, '\r\nHuyện An Minh', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(317, 28, '\r\nHuyện Kiên Hải', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(318, 28, '\r\nHuyện Giồng Riềng', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(319, 28, '\r\nHuyện Phú Quốc', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(320, 28, '\r\nHuyện An Biên', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(321, 28, '\r\nHuyện U Minh Thượng', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(322, 28, '\r\nHuyện Giang Thành', '2019-12-20 11:24:15', '2019-12-20 11:24:15'),
(323, 29, 'Huyện Ia H\' Drai', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(324, 29, '\r\nHuyện Đắk Glei', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(325, 29, '\r\nHuyện Ngọc Hồi', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(326, 29, '\r\nHuyện Đắk Tô', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(327, 29, '\r\nHuyện Kon Rẫy', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(328, 29, '\r\nHuyện Kon Plông', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(329, 29, '\r\nHuyện Đắk Hà', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(330, 29, '\r\nHuyện Tu Mơ Rông', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(331, 29, '\r\nHuyện Sa Thầy', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(332, 29, '\r\nThành phố Kon Tum', '2019-12-20 11:25:19', '2019-12-20 11:25:19'),
(333, 30, 'Huyện Tân Uyên', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(334, 30, '\r\nHuyện Nậm Nhùn', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(335, 30, '\r\nHuyện Sìn Hồ', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(336, 30, '\r\nHuyện Mường Tè', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(337, 30, '\r\nHuyện Tam Đường', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(338, 30, '\r\nThành phố Lai Châu', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(339, 30, '\r\nHuyện Phong Thổ', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(340, 30, '\r\nHuyện Than Uyên', '2019-12-20 11:47:33', '2019-12-20 11:47:33'),
(341, 31, 'Huyện Đức Trọng', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(342, 31, '\r\nHuyện Đơn Dương', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(343, 31, '\r\nThành phố Bảo Lộc', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(344, 31, '\r\nHuyện Đạ Tẻh', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(345, 31, '\r\nHuyện Bảo Lâm', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(346, 31, '\r\nHuyện Đạ Huoai', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(347, 31, '\r\nHuyện Lạc Dương', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(348, 31, '\r\nHuyện Cát Tiên', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(349, 31, '\r\nHuyện Lâm Hà', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(350, 31, '\r\nHuyện Di Linh', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(351, 31, '\r\nThành phố Đà Lạt', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(352, 31, '\r\nHuyện Đam Rông', '2019-12-20 11:48:53', '2019-12-20 11:48:53'),
(353, 32, 'Huyện Bình Gia', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(354, 32, '\r\nThành phố Lạng Sơn', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(355, 32, '\r\nHuyện Văn Lãng', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(356, 32, '\r\nHuyện Văn Quan', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(357, 32, '\r\nHuyện Lộc Bình', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(358, 32, '\r\nHuyện Cao Lộc', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(359, 32, '\r\nHuyện Chi Lăng', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(360, 32, '\r\nHuyện Đình Lập', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(361, 32, '\r\nHuyện Bắc Sơn', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(362, 32, '\r\nHuyện Tràng Định', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(363, 32, '\r\nHuyện Hữu Lũng', '2019-12-20 11:49:55', '2019-12-20 11:49:55'),
(364, 33, 'Thành phố Lào Cai', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(365, 33, '\r\nHuyện Bát Xát', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(366, 33, '\r\nHuyện Văn Bàn', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(367, 33, '\r\nHuyện Bảo Thắng', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(368, 33, '\r\nHuyện Si Ma Cai', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(369, 33, '\r\nHuyện Mường Khương', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(370, 33, '\r\nHuyện Sa Pa', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(371, 33, '\r\nHuyện Bảo Yên', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(372, 33, '\r\nHuyện Bắc Hà', '2019-12-20 11:51:09', '2019-12-20 11:51:09'),
(373, 34, 'Huyện Tân Thạnh', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(374, 34, '\r\nHuyện Tân Trụ', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(375, 34, '\r\nHuyện Mộc Hóa', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(376, 34, '\r\nHuyện Đức Hòa', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(377, 34, '\r\nHuyện Vĩnh Hưng', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(378, 34, '\r\nHuyện Cần Đước', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(379, 34, '\r\nHuyện Đức Huệ', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(380, 34, '\r\nHuyện Bến Lức', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(381, 34, '\r\nHuyện Thạnh Hóa', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(382, 34, '\r\nHuyện Cần Giuộc', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(383, 34, '\r\nHuyện Thủ Thừa', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(384, 34, '\r\nHuyện Châu Thành', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(385, 34, '\r\nHuyện Tân Hưng', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(386, 34, '\r\nThành phố Tân An', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(387, 34, '\r\nThị xã Kiến Tường', '2019-12-20 11:54:15', '2019-12-20 11:54:15'),
(388, 35, 'Thành phố Nam Định', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(389, 35, '\r\nHuyện Nghĩa Hưng', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(390, 35, '\r\nHuyện Trực Ninh', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(391, 35, '\r\nHuyện Ý Yên', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(392, 35, '\r\nHuyện Vụ Bản', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(393, 35, '\r\nHuyện Giao Thủy', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(394, 35, '\r\nHuyện Xuân Trường', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(395, 35, '\r\nHuyện Nam Trực', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(396, 35, '\r\nHuyện Mỹ Lộc', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(397, 35, '\r\nHuyện Hải Hậu', '2019-12-20 11:56:35', '2019-12-20 11:56:35'),
(398, 36, 'Thị xã Hoàng Mai', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(399, 36, '\r\nHuyện Quỳ Châu', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(400, 36, '\r\nHuyện Diễn Châu', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(401, 36, '\r\nHuyện Anh Sơn', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(402, 36, '\r\nHuyện Hưng Nguyên', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(403, 36, '\r\nHuyện Quế Phong', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(404, 36, '\r\nHuyện Tương Dương', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(405, 36, '\r\nHuyện Kỳ Sơn', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(406, 36, '\r\nThị xã Cửa Lò', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(407, 36, '\r\nThị xã Thái Hoà', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(408, 36, '\r\nHuyện Nam Đàn', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(409, 36, '\r\nHuyện Quỳnh Lưu', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(410, 36, '\r\nHuyện Quỳ Hợp', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(411, 36, '\r\nHuyện Yên Thành', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(412, 36, '\r\nHuyện Đô Lương', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(413, 36, '\r\nHuyện Nghĩa Đàn', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(414, 36, '\r\nHuyện Con Cuông', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(415, 36, '\r\nHuyện Tân Kỳ', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(416, 36, '\r\nHuyện Nghi Lộc', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(417, 36, '\r\nHuyện Thanh Chương', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(418, 36, '\r\nThành phố Vinh', '2019-12-20 11:58:06', '2019-12-20 11:58:06'),
(419, 37, 'Huyện Nho Quan', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(420, 37, '\r\nHuyện Hoa Lư', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(421, 37, '\r\nHuyện Gia Viễn', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(422, 37, '\r\nHuyện Kim Sơn', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(423, 37, '\r\nHuyện Yên Khánh', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(424, 37, '\r\nThành phố Tam Điệp', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(425, 37, '\r\nThành phố Ninh Bình', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(426, 37, '\r\nHuyện Yên Mô', '2019-12-20 11:59:11', '2019-12-20 11:59:11'),
(427, 38, 'Huyện Bác Ái', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(428, 38, '\r\nHuyện Ninh Hải', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(429, 38, '\r\nHuyện Ninh Phước', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(430, 38, '\r\nHuyện Ninh Sơn', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(431, 38, '\r\nHuyện Thuận Bắc', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(432, 38, '\r\nHuyện Thuận Nam', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(433, 38, '\r\nThành phố Phan Rang-Tháp Chàm', '2019-12-20 12:00:15', '2019-12-20 12:00:15'),
(434, 39, 'Huyện Lâm Thao', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(435, 39, '\r\nThị xã Phú Thọ', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(436, 39, '\r\nThành phố Việt Trì', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(437, 39, '\r\nHuyện Thanh Thuỷ', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(438, 39, '\r\nHuyện Đoan Hùng', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(439, 39, '\r\nHuyện Cẩm Khê', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(440, 39, '\r\nHuyện Phù Ninh', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(441, 39, '\r\nHuyện Tam Nông', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(442, 39, '\r\nHuyện Thanh Ba', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(443, 39, '\r\nHuyện Yên Lập', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(444, 39, '\r\nHuyện Thanh Sơn', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(445, 39, '\r\nHuyện Hạ Hoà', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(446, 39, '\r\nHuyện Tân Sơn', '2019-12-20 12:01:28', '2019-12-20 12:01:28'),
(447, 40, 'Huyện Sông Hinh', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(448, 40, '\r\nHuyện Tây Hoà', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(449, 40, '\r\nHuyện Tuy An', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(450, 40, '\r\nThị xã Sông Cầu', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(451, 40, '\r\nHuyện Đồng Xuân', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(452, 40, '\r\nHuyện Sơn Hòa', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(453, 40, '\r\nThành phố Tuy Hoà', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(454, 40, '\r\nHuyện Phú Hoà', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(455, 40, '\r\nHuyện Đông Hòa', '2019-12-20 12:02:29', '2019-12-20 12:02:29'),
(456, 41, 'Huyện Bố Trạch', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(457, 41, '\r\nHuyện Tuyên Hóa', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(458, 41, '\r\nHuyện Lệ Thủy', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(459, 41, '\r\nHuyện Quảng Ninh', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(460, 41, '\r\nHuyện Quảng Trạch', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(461, 41, '\r\nThành Phố Đồng Hới', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(462, 41, '\r\nHuyện Minh Hóa', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(463, 41, '\r\nThị xã Ba Đồn', '2019-12-20 12:03:16', '2019-12-20 12:03:16'),
(464, 42, 'Huyện Hiệp Đức', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(465, 42, '\r\nHuyện Đông Giang', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(466, 42, '\r\nHuyện Tây Giang', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(467, 42, '\r\nHuyện Bắc Trà My', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(468, 42, '\r\nThành phố Hội An', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(469, 42, '\r\nThành phố Tam Kỳ', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(470, 42, '\r\nHuyện Đại Lộc', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(471, 42, '\r\nThị xã Điện Bàn', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(472, 42, '\r\nHuyện Tiên Phước', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(473, 42, '\r\nHuyện Nam Trà My', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(474, 42, '\r\nHuyện Quế Sơn', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(475, 42, '\r\nHuyện Núi Thành', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(476, 42, '\r\nHuyện Thăng Bình', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(477, 42, '\r\nHuyện Phước Sơn', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(478, 42, '\r\nHuyện Duy Xuyên', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(479, 42, '\r\nHuyện Nam Giang', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(480, 42, '\r\nHuyện Phú Ninh', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(481, 42, '\r\nHuyện Nông Sơn', '2019-12-20 12:04:42', '2019-12-20 12:04:42'),
(482, 43, 'Huyện Minh Long', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(483, 43, '\r\nHuyện Tây Trà', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(484, 43, '\r\nHuyện Trà Bồng', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(485, 43, '\r\nHuyện Bình Sơn', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(486, 43, '\r\nHuyện Đức Phổ', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(487, 43, '\r\nHuyện Lý Sơn', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(488, 43, '\r\nHuyện Ba Tơ', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(489, 43, '\r\nHuyện Mộ Đức', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(490, 43, '\r\nHuyện Nghĩa Hành', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(491, 43, '\r\nHuyện Tư Nghĩa', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(492, 43, '\r\nHuyện Sơn Tịnh', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(493, 43, '\r\nHuyện Sơn Tây', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(494, 43, '\r\nThành phố Quảng Ngãi', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(495, 43, '\r\nHuyện Sơn Hà', '2019-12-20 12:05:48', '2019-12-20 12:05:48'),
(496, 44, 'Thị xã Đông Triều', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(497, 44, '\r\nHuyện Hải Hà', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(498, 44, '\r\nThành phố Hạ Long', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(499, 44, '\r\nThành phố Cẩm Phả', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(500, 44, '\r\nThành phố Móng Cái', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(501, 44, '\r\nThành phố Uông Bí', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(502, 44, '\r\nHuyện Vân Đồn', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(503, 44, '\r\nHuyện Tiên Yên', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(504, 44, '\r\nHuyện Ba Chẽ', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(505, 44, '\r\nHuyện Hoành Bồ', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(506, 44, '\r\nHuyện Bình Liêu', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(507, 44, '\r\nHuyện Cô Tô', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(508, 44, '\r\nHuyện Đầm Hà', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(509, 44, '\r\nThị xã Quảng Yên', '2019-12-20 12:06:54', '2019-12-20 12:06:54'),
(510, 45, 'Huyện Cồn Cỏ', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(511, 45, '\r\nThị xã Quảng Trị', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(512, 45, '\r\nHuyện Đa Krông', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(513, 45, '\r\nHuyện Vĩnh Linh', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(514, 45, '\r\nHuyện Triệu Phong', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(515, 45, '\r\nHuyện Gio Linh', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(516, 45, '\r\nHuyện Cam Lộ', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(517, 45, '\r\nHuyện Hải Lăng', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(518, 45, '\r\nHuyện Hướng Hóa', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(519, 45, '\r\nThành phố Đông Hà', '2019-12-20 12:07:46', '2019-12-20 12:07:46'),
(520, 46, 'Huyện Thạnh Trị', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(521, 46, '\r\nHuyện Mỹ Xuyên', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(522, 46, '\r\nHuyện Long Phú', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(523, 46, '\r\nThị xã Vĩnh Châu', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(524, 46, '\r\nHuyện Mỹ Tú', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(525, 46, '\r\nHuyện Kế Sách', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(526, 46, '\r\nHuyện Cù Lao Dung', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(527, 46, '\r\nThị xã Ngã Năm', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(528, 46, '\r\nThành phố Sóc Trăng', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(529, 46, '\r\nHuyện Châu Thành', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(530, 46, '\r\nHuyện Trần Đề', '2019-12-20 12:08:32', '2019-12-20 12:08:32'),
(531, 47, 'Huyện Sốp Cộp', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(532, 47, '\r\nHuyện Mai Sơn', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(533, 47, '\r\nHuyện Mường La', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(534, 47, '\r\nHuyện Sông Mã', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(535, 47, '\r\nHuyện Mộc Châu', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(536, 47, '\r\nHuyện Vân Hồ', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(537, 47, '\r\nHuyện Quỳnh Nhai', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(538, 47, '\r\nHuyện Phù Yên', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(539, 47, '\r\nHuyện Thuận Châu', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(540, 47, '\r\nHuyện Yên Châu', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(541, 47, '\r\nHuyện Bắc Yên', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(542, 47, '\r\nThành phố Sơn La', '2019-12-20 12:09:29', '2019-12-20 12:09:29'),
(543, 48, 'Huyện Dương Minh Châu', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(544, 48, '\r\nHuyện Bến Cầu', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(545, 48, '\r\nHuyện Châu Thành', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(546, 48, '\r\nHuyện Gò Dầu', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(547, 48, '\r\nHuyện Hòa Thành', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(548, 48, '\r\nHuyện Tân Châu', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(549, 48, '\r\nHuyện Trảng Bàng', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(550, 48, '\r\nHuyện Tân Biên', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(551, 48, '\r\nThành phố Tây Ninh', '2019-12-20 12:10:35', '2019-12-20 12:10:35'),
(552, 49, 'Huyện Quỳnh Phụ', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(553, 49, '\r\nHuyện Vũ Thư', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(554, 49, '\r\nHuyện Hưng Hà', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(555, 49, '\r\nHuyện Kiến Xương', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(556, 49, '\r\nHuyện Tiền Hải', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(557, 49, '\r\nHuyện Thái Thụy', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(558, 49, '\r\nHuyện Đông Hưng', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(559, 49, '\r\nThành phố Thái Bình', '2019-12-20 12:19:34', '2019-12-20 12:19:34'),
(560, 50, 'Thành phố Sông Công', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(561, 50, '\r\nHuyện Phú Lương', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(562, 50, '\r\nHuyện Định Hóa', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(563, 50, '\r\nHuyện Phú Bình', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(564, 50, '\r\nHuyện Võ Nhai', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(565, 50, '\r\nThị xã Phổ Yên', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(566, 50, '\r\nHuyện Đồng Hỷ', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(567, 50, '\r\nHuyện Đại Từ', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(568, 50, '\r\nThành phố Thái Nguyên', '2019-12-20 12:20:38', '2019-12-20 12:20:38'),
(569, 51, 'Huyện Đông Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(570, 51, '\r\nHuyện Thường Xuân', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(571, 51, '\r\nHuyện Nông Cống', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(572, 51, '\r\nHuyện Hà Trung', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(573, 51, '\r\nHuyện Bá Thước', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(574, 51, '\r\nHuyện Hoằng Hóa', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(575, 51, '\r\nHuyện Quảng Xương', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(576, 51, '\r\nHuyện Thiệu Hóa', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(577, 51, '\r\nHuyện Như Thanh', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(578, 51, '\r\nThành phố Thanh Hóa', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(579, 51, '\r\nThị xã Sầm Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(580, 51, '\r\nThị xã Bỉm Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(581, 51, '\r\nHuyện Nga Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(582, 51, '\r\nHuyện Mường Lát', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(583, 51, '\r\nHuyện Tĩnh Gia', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(584, 51, '\r\nHuyện Thạch Thành', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(585, 51, '\r\nHuyện Thọ Xuân', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(586, 51, '\r\nHuyện Hậu Lộc', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(587, 51, '\r\nHuyện Cẩm Thủy', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(588, 51, '\r\nHuyện Vĩnh Lộc', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(589, 51, '\r\nHuyện Quan Hóa', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(590, 51, '\r\nHuyện Triệu Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(591, 51, '\r\nHuyện Ngọc Lặc', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(592, 51, '\r\nHuyện Như Xuân', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(593, 51, '\r\nHuyện Quan Sơn', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(594, 51, '\r\nHuyện Yên Định', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(595, 51, '\r\nHuyện Lang Chánh', '2019-12-20 12:22:35', '2019-12-20 12:22:35'),
(596, 52, 'Huyện Phú Vang', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(597, 52, '\r\nHuyện A Lưới', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(598, 52, '\r\nHuyện Nam Đông', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(599, 52, '\r\nThị xã Hương Trà', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(600, 52, '\r\nHuyện Phong Điền', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(601, 52, '\r\nThị xã Hương Thủy', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(602, 52, '\r\nHuyện Quảng Điền', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(603, 52, '\r\nHuyện Phú Lộc', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(604, 52, '\r\nThành phố Huế', '2019-12-20 12:23:37', '2019-12-20 12:23:37'),
(605, 53, 'Thị xã Cai Lậy', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(606, 53, '\r\nHuyện Châu Thành', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(607, 53, '\r\nHuyện Tân Phú Đông', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(608, 53, '\r\nThị xã Gò Công', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(609, 53, '\r\nHuyện Tân Phước', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(610, 53, '\r\nHuyện Gò Công Tây', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(611, 53, '\r\nHuyện Cai Lậy', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(612, 53, '\r\nHuyện Gò Công Đông', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(613, 53, '\r\nHuyện Chợ Gạo', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(614, 53, '\r\nHuyện Cái Bè', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(615, 53, '\r\nThành phố Mỹ Tho', '2019-12-20 12:25:13', '2019-12-20 12:25:13'),
(616, 54, 'Thị xã Duyên Hải', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(617, 54, '\r\nHuyện Châu Thành', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(618, 54, '\r\nHuyện Cầu Kè', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(619, 54, '\r\nHuyện Càng Long', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(620, 54, '\r\nHuyện Cầu Ngang', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(621, 54, '\r\nHuyện Duyên Hải', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(622, 54, '\r\nHuyện Tiểu Cần', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(623, 54, '\r\nHuyện Trà Cú', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(624, 54, '\r\nThành phố Trà Vinh', '2019-12-20 12:27:16', '2019-12-20 12:27:16'),
(625, 55, 'Huyện Chiêm Hóa', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(626, 55, '\r\nHuyện Sơn Dương', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(627, 55, '\r\nHuyện Yên Sơn', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(628, 55, '\r\nHuyện Hàm Yên', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(629, 55, '\r\nHuyện Nà Hang', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(630, 55, '\r\nThành phố Tuyên Quang', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(631, 55, '\r\nHuyện Lâm Bình', '2019-12-20 12:30:21', '2019-12-20 12:30:21'),
(632, 56, 'Huyện Mang Thít', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(633, 56, '\r\nHuyện Vũng Liêm', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(634, 56, '\r\nThị xã Bình Minh', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(635, 56, '\r\nHuyện Tam Bình', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(636, 56, '\r\nHuyện Long Hồ', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(637, 56, '\r\nThành phố Vĩnh Long', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(638, 56, '\r\nHuyện Bình Tân', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(639, 56, '\r\nHuyện Trà Ôn', '2019-12-20 12:31:24', '2019-12-20 12:31:24'),
(640, 57, 'Huyện Bình Xuyên', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(641, 57, '\r\nHuyện Vĩnh Tường', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(642, 57, '\r\nHuyện Lập Thạch', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(643, 57, '\r\nHuyện Yên Lạc', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(644, 57, '\r\nThành phố Vĩnh Yên', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(645, 57, '\r\nHuyện Tam Đảo', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(646, 57, '\r\nHuyện Tam Dương', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(647, 57, '\r\nThị xã Phúc Yên', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(648, 57, '\r\nHuyện Sông Lô', '2019-12-20 12:32:31', '2019-12-20 12:32:31'),
(649, 58, 'Huyện Trấn Yên', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(650, 58, '\r\nHuyện Văn Chấn', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(651, 58, '\r\nHuyện Lục Yên', '2019-12-20 12:33:36', '2019-12-20 12:33:36');
INSERT INTO `la_city` (`id`, `region_id`, `title`, `updated_at`, `created_at`) VALUES
(652, 58, '\r\nHuyện Văn Yên', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(653, 58, '\r\nHuyện Mù Căng Chải', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(654, 58, '\r\nHuyện Trạm Tấu', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(655, 58, '\r\nHuyện Yên Bình', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(656, 58, '\r\nThành phố Yên Bái', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(657, 58, '\r\nThị xã Nghĩa Lộ', '2019-12-20 12:33:36', '2019-12-20 12:33:36'),
(658, 59, 'Huyện Krông A Na', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(659, 59, '\r\nThành phố Buôn Ma Thuột', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(660, 59, '\r\nHuyện Cư Kuin', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(661, 59, '\r\nHuyện Cư M\'gar', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(662, 59, '\r\nHuyện Ea Súp', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(663, 59, '\r\nHuyện Krông Năng', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(664, 59, '\r\nHuyện Ea H\'leo', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(665, 59, '\r\nHuyện Krông Búk', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(666, 59, '\r\nHuyện Buôn Đôn', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(667, 59, '\r\nHuyện Lắk', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(668, 59, '\r\nHuyện Krông Pắc', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(669, 59, '\r\nHuyện Krông Bông', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(670, 59, '\r\nHuyện Ea Kar', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(671, 59, '\r\nHuyện M\'Đrắk', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(672, 59, '\r\nThị Xã Buôn Hồ', '2019-12-20 13:35:58', '2019-12-20 13:35:58'),
(673, 60, 'Huyện Đắk Mil', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(674, 60, '\r\nHuyện Cư Jút', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(675, 60, '\r\nHuyện Đăk Glong', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(676, 60, '\r\nHuyện Đắk R\'Lấp', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(677, 60, '\r\nHuyện Krông Nô', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(678, 60, '\r\nHuyện Đắk Song', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(679, 60, '\r\nHuyện Tuy Đức', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(680, 60, '\r\nThị xã Gia Nghĩa', '2019-12-20 13:37:02', '2019-12-20 13:37:02'),
(681, 61, 'Huyện Nậm Pồ', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(682, 61, '\r\nThành phố Điện Biên Phủ', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(683, 61, '\r\nThị Xã Mường Lay', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(684, 61, '\r\nHuyện Tủa Chùa', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(685, 61, '\r\nHuyện Tuần Giáo', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(686, 61, '\r\nHuyện Điện Biên Đông', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(687, 61, '\r\nHuyện Mường Nhé', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(688, 61, '\r\nHuyện Điện Biên', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(689, 61, '\r\nHuyện Mường Ảng', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(690, 61, '\r\nHuyện Mường Chà', '2019-12-20 13:37:56', '2019-12-20 13:37:56'),
(691, 62, 'Huyện Định Quán', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(692, 62, '\r\nHuyện Long Thành', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(693, 62, '\r\nHuyện Cẩm Mỹ', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(694, 62, '\r\nThành phố Biên Hòa', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(695, 62, '\r\nHuyện Thống Nhất', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(696, 62, '\r\nHuyện Nhơn Trạch', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(697, 62, '\r\nHuyện Vĩnh Cửu', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(698, 62, '\r\nHuyện Xuân Lộc', '2019-12-20 13:41:44', '2019-12-20 13:41:44'),
(699, 62, '\r\nHuyện Trảng Bom', '2019-12-20 13:41:45', '2019-12-20 13:41:45'),
(700, 62, '\r\nHuyện Tân Phú', '2019-12-20 13:41:45', '2019-12-20 13:41:45'),
(701, 62, '\r\nThị xã Long Khánh', '2019-12-20 13:41:45', '2019-12-20 13:41:45'),
(702, 63, 'Huyện Tân Hồng', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(703, 63, '\r\nThành phố Sa Đéc', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(704, 63, '\r\nHuyện Lai Vung', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(705, 63, '\r\nHuyện Châu Thành', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(706, 63, '\r\nHuyện Lấp Vò', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(707, 63, '\r\nHuyện Cao Lãnh', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(708, 63, '\r\nHuyện Tháp Mười', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(709, 63, '\r\nHuyện Thanh Bình', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(710, 63, '\r\nHuyện Tam Nông', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(711, 63, '\r\nThị xã Hồng Ngự', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(712, 63, '\r\nThành phố Cao Lãnh', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(713, 63, '\r\nHuyện Hồng Ngự', '2019-12-20 13:42:43', '2019-12-20 13:42:43'),
(715, 64, 'Phường 1', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(716, 64, 'Phường 2', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(717, 64, 'Phường 3', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(718, 64, 'Phường 4', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(719, 64, 'Phường 5', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(720, 64, 'Phường 6', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(721, 64, 'Phường 7', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(722, 64, 'Phường 8', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(723, 64, 'Phường 9', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(724, 64, 'Phường 10', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(725, 64, 'Phường 11', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(726, 64, 'Phường 12', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(727, 64, 'Xã Tà Nung', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(728, 64, 'Xã Trạm Hành', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(729, 64, 'Xã Xuân Thọ', '2022-04-10 18:14:14', '2022-04-10 18:14:14'),
(730, 64, 'Xã Xuân Trường', '2022-04-10 18:14:14', '2022-04-10 18:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `la_comments`
--

CREATE TABLE `la_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cars_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `replied_comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `la_config`
--

CREATE TABLE `la_config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_config`
--

INSERT INTO `la_config` (`id`, `name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(2, 'SHOW_LOGO', 'Logo-yotrip-02.svg', '0', '2022-03-02 10:28:28', '2022-03-02 10:28:28'),
(7, 'ABOUT_US_CONTENT', 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.\n\nOn her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word \"and\" and the Little Blind Text should turn around and return to its own, safe country. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', '0', '2022-03-02 10:53:16', '2022-03-02 10:53:16'),
(17, 'FAVICON_ICON', 'https://yotrip.vn/public/ui/images/Facvion-icon-02.svg', '0', '2022-03-14 04:29:19', '2022-03-14 04:29:19'),
(19, 'TITLE_WELCOME', '<p>Welcome</p>', '0', '2022-03-16 03:24:12', '2022-03-16 03:24:12'),
(21, 'TITLE_COLUM_1', 'THE RESPONSIBILITY OF THE CAR OWNER', '0', '2022-04-08 04:36:11', '2022-04-08 04:36:11'),
(22, 'TITLE_COLUM_2', 'CAR HIRE RESPONSIBILITIES', '0', '2022-04-08 04:36:24', '2022-04-08 04:36:24'),
(23, 'TITLE_COLUM_3', 'YOTRIP\'S RESPONSIBILITIES AND RECOMMENDATIONS', '0', '2022-04-08 04:36:24', '2022-04-08 04:36:24'),
(24, 'CONTENT_ROW_1', 'Deliver the car and all documents related to the vehicle on time and in a safe and clean state to ensure the quality of service.', '0', '2022-04-08 04:36:43', '2022-04-08 04:36:43'),
(25, 'CONTENT_ROW_2', 'The relevant vehicle documents include: vehicle registration paper (notarized photocopy), inspection paper, vehicle insurance paper (notarized or original photocopy).', '0', '2022-04-08 04:36:55', '2022-04-08 04:36:55'),
(26, 'CONTENT_ROW_3', 'Legal responsibility for the origin and ownership of the vehicle.', '0', '2022-04-08 04:36:55', '2022-04-08 04:36:55'),
(27, 'CONTENT_ROW_2.1', 'Check the car thoroughly before receiving and before returning the car. Sign a written record of handover of the vehicle status upon receipt and when returning.', '0', '2022-04-08 04:37:10', '2022-04-08 04:37:10'),
(28, 'CONTENT_ROW_2.2', 'Pay the car rental in full to the car owner when receiving the car.#Present all relevant documents to the vehicle owner: ID card, GPLX, Household Registration or KT3. Household registration/KT3 deposit, cash (VND 15 million or depending on the agreement with the vehicle owner) or equivalent assets (motorcycles and car parrots) before receiving the car.', '0', '2022-04-08 04:37:47', '2022-04-08 04:37:47'),
(29, 'CONTENT_ROW_2.3', 'Present all relevant documents to the vehicle owner: ID card, GPLX, Household Registration or KT3. Household registration/KT3 deposit, cash (VND 15 million or depending on the agreement with the vehicle owner) or equivalent assets (motorcycles and car parrots) before receiving the car.', '0', '2022-04-08 04:37:47', '2022-04-08 04:37:47'),
(30, 'CONTENT_ROW_2.4', 'Comply with the regulations and the time of return as agreed upon by the two parties.', '0', '2022-04-08 04:37:47', '2022-04-08 04:37:47'),
(31, 'CONTENT_ROW_2.5', 'Responsible for compensating for any losses in parts and accessories of the car, 100% compensation according to the genuine parts price if the part is found to be swapped, 100% of the cost of repairing the car if there is a damage depending on the extent of damage of the car, the cost of the car holidays cannot run due to the fault of the car tenant (the price is calculated by the rent in the car. contract) and vehicle cleaning charges if any.', '0', '2022-04-08 04:37:47', '2022-04-08 04:37:47'),
(32, 'CONTENT_ROW_3.1', 'Yotrip recommends that car owners and car tenants should make written conclusions \"Self-driving car rental contracts\" as well as sign \"Vehicle handover minutes\" to ensure the rights of both parties in case of disputes.', '0', '2022-04-08 04:38:08', '2022-04-08 04:38:08'),
(33, 'CONTENT_ROW_3.2', 'Car owners can refer to yotrip\'s \"Self-driving car lease contract\" and \"Car Handover Record\" (please provide an email to Yotrip\'s customer service department to receive information).', '0', '2022-04-08 04:38:17', '2022-04-08 04:38:17'),
(34, 'CONTENT_ROW_3.3', 'Car owners and car tenants shall assume all civil and criminal liability if there is a dispute between the two parties if any. Yotrip only serves as a support to the two parties to settle matters in the best possible way, in accordance with the terms, policies and operating regulations both parties have committed to Yotrip.', '0', '2022-04-08 04:38:17', '2022-04-08 04:38:17'),
(35, 'BANNER_BOTTOM', '', '0', '2022-04-08 06:12:35', '2022-04-08 06:12:35'),
(36, 'BANNER_TOP', '', '0', '2022-04-08 06:12:47', '2022-04-08 06:12:47'),
(37, 'PHOTO_LOGO', 'https://yotrip.vn/public/ui/images/Logo-yotrip-02.svg', '0', '2022-04-08 06:13:22', '2022-04-08 06:13:22'),
(39, 'PHOTO_WELCOME', 'https://yotrip.vn/public/backend/uploads/images/welcome.jpg', '0', '2022-04-08 06:28:46', '2022-04-08 06:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `la_contacts`
--

CREATE TABLE `la_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_contacts`
--

INSERT INTO `la_contacts` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Tam Tran', 'ngoctam2303001@gmail.com', 'admin ơi', '2021-09-09 20:44:23', '2021-09-09 20:44:23'),
(2, 'Tam Tran', 'ngoctam2303001@gmail.com', 'Sao thế này', '2022-03-09 04:38:38', '2022-03-09 04:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `la_failed_jobs`
--

CREATE TABLE `la_failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `la_features`
--

CREATE TABLE `la_features` (
  `id` int(11) NOT NULL,
  `cars_id` int(11) UNSIGNED NOT NULL,
  `sensors` varchar(255) DEFAULT NULL,
  `control_parking` varchar(255) DEFAULT NULL,
  `auto_temp` varchar(255) DEFAULT NULL,
  `wireless_co` varchar(255) DEFAULT NULL,
  `conditioner` varchar(255) DEFAULT NULL,
  `navigator` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `camera` varchar(255) DEFAULT NULL,
  `kids_chair` varchar(255) DEFAULT NULL,
  `spare_tire` varchar(255) DEFAULT NULL,
  `bluetooth` varchar(255) DEFAULT NULL,
  `rear_camera` varchar(255) DEFAULT NULL,
  `usb` varchar(255) DEFAULT NULL,
  `safety_aribag` varchar(255) DEFAULT NULL,
  `gps` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `la_features`
--

INSERT INTO `la_features` (`id`, `cars_id`, `sensors`, `control_parking`, `auto_temp`, `wireless_co`, `conditioner`, `navigator`, `map`, `camera`, `kids_chair`, `spare_tire`, `bluetooth`, `rear_camera`, `usb`, `safety_aribag`, `gps`, `status`, `created_at`, `updated_at`) VALUES
(1, 18, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-06 14:30:04', '2022-04-06 14:30:04'),
(2, 238, 'sensors', 'control_parking', NULL, 'wireless_co', 'conditioner', NULL, 'map', 'camera', NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-06 14:30:27', '2022-04-08 03:59:30'),
(3, 122, NULL, NULL, 'auto_temp', NULL, NULL, NULL, NULL, 'camera', NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-06 14:31:46', '2022-04-06 14:31:46'),
(4, 188, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-06 14:32:33', '2022-04-06 14:32:33'),
(5, 70, NULL, 'control_parking', NULL, 'wireless_co', 'conditioner', NULL, NULL, NULL, 'kids_chair', NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-06 16:16:09', '2022-04-06 16:16:09'),
(6, 26, NULL, 'control_parking', NULL, 'wireless_co', NULL, NULL, 'map', 'camera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-06 16:30:16', '2022-04-06 16:30:16'),
(7, 60, NULL, 'control_parking', NULL, 'wireless_co', 'conditioner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-06 16:32:08', '2022-04-06 16:32:08'),
(8, 249, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-10 18:03:35', '2022-04-10 18:03:35'),
(9, 200, 'sensors', NULL, NULL, 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-10 18:04:39', '2022-04-10 18:04:39'),
(10, 119, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:06:45', '2022-04-10 18:06:45'),
(11, 154, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:08:30', '2022-04-10 18:08:30'),
(12, 111, NULL, 'control_parking', 'auto_temp', NULL, NULL, NULL, 'map', NULL, NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-10 18:09:23', '2022-04-10 18:09:23'),
(13, 236, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-10 18:18:39', '2022-04-10 18:18:39'),
(14, 24, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:19:40', '2022-04-10 18:19:40'),
(15, 45, NULL, 'control_parking', 'auto_temp', NULL, 'conditioner', 'navigator', NULL, NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-10 18:23:16', '2022-04-13 09:38:44'),
(16, 25, NULL, 'control_parking', 'auto_temp', NULL, 'conditioner', NULL, 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-10 18:25:44', '2022-04-10 18:25:44'),
(17, 27, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:26:59', '2022-04-10 18:26:59'),
(18, 64, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:28:07', '2022-04-10 18:28:07'),
(19, 66, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:31:10', '2022-04-10 18:31:10'),
(20, 178, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:32:46', '2022-04-10 18:32:46'),
(21, 48, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:34:16', '2022-04-10 18:34:16'),
(22, 241, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:35:09', '2022-04-10 18:35:09'),
(23, 143, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:36:39', '2022-04-10 18:36:39'),
(24, 157, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:38:17', '2022-04-10 18:38:17'),
(25, 46, NULL, NULL, NULL, NULL, 'conditioner', 'navigator', 'map', 'camera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-10 18:39:48', '2022-04-10 18:39:48'),
(26, 240, NULL, 'control_parking', NULL, 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', NULL, NULL, NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-10 18:40:32', '2022-04-10 18:40:32'),
(27, 21, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:42:37', '2022-04-10 18:42:37'),
(28, 90, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-10 18:44:15', '2022-04-10 18:44:15'),
(29, 75, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:45:27', '2022-04-10 18:45:27'),
(30, 33, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-10 18:46:15', '2022-04-10 18:46:15'),
(31, 208, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-10 18:47:31', '2022-04-10 18:47:31'),
(32, 169, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-10 18:48:50', '2022-04-10 18:48:50'),
(33, 172, 'sensors', NULL, NULL, 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', NULL, NULL, NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-11 07:05:50', '2022-04-11 07:05:50'),
(34, 175, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:06:44', '2022-04-11 07:06:44'),
(35, 43, 'sensors', NULL, NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 07:07:51', '2022-04-11 07:07:51'),
(36, 168, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:08:59', '2022-04-11 07:08:59'),
(37, 124, NULL, 'control_parking', 'auto_temp', NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:10:10', '2022-04-11 07:10:10'),
(38, 194, 'sensors', 'control_parking', 'auto_temp', NULL, 'conditioner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 07:11:07', '2022-04-11 07:11:07'),
(39, 181, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 07:12:08', '2022-04-11 07:12:08'),
(40, 202, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 07:13:05', '2022-04-11 07:13:05'),
(41, 61, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:14:22', '2022-04-11 07:14:22'),
(42, 126, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:15:09', '2022-04-11 07:15:09'),
(43, 144, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:15:58', '2022-04-11 07:15:58'),
(44, 120, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:17:04', '2022-04-11 07:17:04'),
(45, 146, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:17:50', '2022-04-11 07:17:50'),
(46, 76, NULL, 'control_parking', 'auto_temp', NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:18:40', '2022-04-11 07:18:40'),
(47, 115, NULL, 'control_parking', NULL, 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', 'spare_tire', NULL, NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-11 07:19:19', '2022-04-11 07:19:19'),
(48, 150, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:20:10', '2022-04-11 07:20:10'),
(49, 165, 'sensors', NULL, NULL, 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', 'spare_tire', NULL, NULL, NULL, 'safety_aribag', 'gps', 'active', '2022-04-11 07:20:58', '2022-04-11 07:20:58'),
(50, 130, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:21:46', '2022-04-11 07:21:46'),
(51, 128, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:22:37', '2022-04-11 07:22:37'),
(52, 145, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:23:17', '2022-04-11 07:23:17'),
(53, 153, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 07:24:17', '2022-04-11 07:24:17'),
(54, 44, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:25:09', '2022-04-11 07:25:09'),
(55, 167, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:26:08', '2022-04-11 07:26:08'),
(56, 31, NULL, 'control_parking', 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 07:33:07', '2022-04-11 07:33:07'),
(57, 162, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:33:51', '2022-04-11 07:33:51'),
(58, 69, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:34:37', '2022-04-11 07:34:37'),
(59, 161, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:35:29', '2022-04-11 07:35:29'),
(60, 235, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:36:16', '2022-04-11 07:36:16'),
(61, 246, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:36:54', '2022-04-11 07:36:54'),
(62, 247, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:37:35', '2022-04-11 07:37:35'),
(63, 39, 'sensors', NULL, NULL, 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', NULL, NULL, NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-11 07:38:20', '2022-04-11 07:38:20'),
(64, 54, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:39:01', '2022-04-11 07:39:01'),
(65, 63, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:39:58', '2022-04-11 07:39:58'),
(66, 114, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 07:40:38', '2022-04-11 07:40:38'),
(67, 147, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:41:38', '2022-04-11 07:41:38'),
(68, 184, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:42:16', '2022-04-11 07:42:16'),
(69, 192, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:43:08', '2022-04-11 07:43:08'),
(70, 228, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:43:53', '2022-04-11 07:43:53'),
(71, 50, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:45:31', '2022-04-11 07:45:31'),
(72, 49, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:46:37', '2022-04-11 07:46:37'),
(73, 35, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 07:47:31', '2022-04-11 07:47:31'),
(74, 51, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 07:48:29', '2022-04-11 07:48:29'),
(75, 38, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:49:21', '2022-04-11 07:49:21'),
(76, 58, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:50:10', '2022-04-11 07:50:10'),
(77, 65, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:51:14', '2022-04-11 07:51:14'),
(78, 67, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:52:01', '2022-04-11 07:52:01'),
(79, 36, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:55:11', '2022-04-11 07:55:11'),
(80, 40, 'sensors', NULL, NULL, 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', NULL, NULL, NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-11 07:56:03', '2022-04-11 07:56:03'),
(81, 73, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:56:44', '2022-04-11 07:56:44'),
(82, 37, 'sensors', NULL, NULL, 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', NULL, NULL, NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-11 07:57:22', '2022-04-11 07:57:22'),
(83, 53, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 07:58:02', '2022-04-11 07:58:02'),
(84, 56, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:00:08', '2022-04-11 08:00:08'),
(85, 52, 'sensors', 'control_parking', NULL, 'wireless_co', 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:00:55', '2022-04-11 08:00:55'),
(86, 55, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:01:32', '2022-04-11 08:01:32'),
(87, 57, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, 'bluetooth', 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 08:02:11', '2022-04-11 08:02:11'),
(88, 72, 'sensors', 'control_parking', NULL, 'wireless_co', 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:04:44', '2022-04-11 08:04:44'),
(89, 74, 'sensors', 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:05:22', '2022-04-11 08:05:22'),
(90, 42, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 08:06:09', '2022-04-11 08:06:09'),
(91, 62, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 08:07:27', '2022-04-11 08:07:27'),
(92, 47, NULL, NULL, 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:08:05', '2022-04-11 08:08:05'),
(93, 71, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:08:43', '2022-04-11 08:08:43'),
(94, 59, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:09:33', '2022-04-11 08:09:33'),
(95, 41, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:10:12', '2022-04-11 08:10:12'),
(96, 216, NULL, NULL, 'auto_temp', NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:13:02', '2022-04-11 08:13:02'),
(97, 213, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:14:03', '2022-04-11 08:14:03'),
(98, 214, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:14:54', '2022-04-11 08:14:54'),
(99, 220, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:15:48', '2022-04-11 08:15:48'),
(100, 212, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:16:42', '2022-04-11 08:16:42'),
(101, 207, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', NULL, NULL, NULL, 'bluetooth', 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 08:17:31', '2022-04-11 08:17:31'),
(102, 199, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 08:18:11', '2022-04-11 08:18:11'),
(103, 206, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:18:52', '2022-04-11 08:18:52'),
(104, 191, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:19:53', '2022-04-11 08:19:53'),
(105, 197, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:20:34', '2022-04-11 08:20:34'),
(106, 196, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:21:18', '2022-04-11 08:21:18'),
(107, 201, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:22:16', '2022-04-11 08:22:16'),
(108, 198, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 08:22:59', '2022-04-11 08:22:59'),
(109, 223, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:23:57', '2022-04-11 08:23:57'),
(110, 187, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:24:53', '2022-04-11 08:24:53'),
(111, 189, NULL, NULL, 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:25:46', '2022-04-11 08:25:46'),
(112, 225, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:26:34', '2022-04-11 08:26:34'),
(113, 209, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:27:21', '2022-04-11 08:27:21'),
(114, 215, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:28:34', '2022-04-11 08:28:34'),
(115, 203, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:29:11', '2022-04-11 08:29:11'),
(116, 221, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:30:29', '2022-04-11 08:30:29'),
(117, 224, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:31:15', '2022-04-11 08:31:15'),
(118, 193, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:32:01', '2022-04-11 08:32:01'),
(119, 190, NULL, 'control_parking', 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:32:49', '2022-04-11 08:32:49'),
(120, 218, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 08:33:28', '2022-04-11 08:33:28'),
(121, 217, NULL, 'control_parking', 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:34:08', '2022-04-11 08:34:08'),
(122, 210, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 08:34:54', '2022-04-11 08:34:54'),
(123, 211, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 08:35:33', '2022-04-11 08:35:33'),
(124, 222, NULL, NULL, 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:36:12', '2022-04-11 08:36:12'),
(125, 219, NULL, 'control_parking', 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:37:00', '2022-04-11 08:37:00'),
(126, 195, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:38:28', '2022-04-11 08:38:28'),
(127, 205, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 08:39:31', '2022-04-11 08:39:31'),
(128, 185, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 08:40:27', '2022-04-11 08:40:27'),
(129, 158, NULL, NULL, 'auto_temp', NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:41:08', '2022-04-11 08:41:08'),
(130, 159, NULL, NULL, 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:41:50', '2022-04-11 08:41:50'),
(131, 186, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:44:14', '2022-04-11 08:44:14'),
(132, 183, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:45:12', '2022-04-11 08:45:12'),
(133, 163, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', 'map', NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:46:23', '2022-04-11 08:46:23'),
(134, 170, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:48:32', '2022-04-11 08:48:32'),
(135, 180, NULL, NULL, 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:49:17', '2022-04-11 08:49:17'),
(136, 166, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:50:15', '2022-04-11 08:50:15'),
(137, 182, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:51:49', '2022-04-11 08:51:49'),
(138, 155, NULL, NULL, 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:52:53', '2022-04-11 08:52:53'),
(139, 156, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 08:55:02', '2022-04-11 08:55:02'),
(140, 179, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 08:56:53', '2022-04-11 08:56:53'),
(141, 160, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 09:00:11', '2022-04-11 09:00:11'),
(142, 164, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 09:01:18', '2022-04-11 09:01:18'),
(143, 171, NULL, 'control_parking', 'auto_temp', NULL, 'conditioner', 'navigator', NULL, NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 09:02:20', '2022-04-11 09:02:20'),
(144, 248, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 09:27:43', '2022-04-11 09:27:43'),
(145, 135, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 09:28:54', '2022-04-11 09:28:54'),
(146, 138, NULL, NULL, 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 09:30:19', '2022-04-11 09:30:19'),
(147, 118, 'sensors', NULL, NULL, 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', NULL, NULL, NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-11 09:31:04', '2022-04-11 09:31:04'),
(148, 131, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 09:32:05', '2022-04-11 09:32:05'),
(149, 132, NULL, NULL, 'auto_temp', NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 09:33:29', '2022-04-11 09:33:29'),
(150, 242, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 09:35:33', '2022-04-11 09:35:33'),
(151, 117, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 09:37:24', '2022-04-11 09:37:24'),
(152, 134, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 09:40:04', '2022-04-11 09:40:04'),
(153, 127, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 09:41:51', '2022-04-11 09:41:51'),
(154, 226, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 09:43:38', '2022-04-11 09:43:38'),
(155, 229, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 09:44:34', '2022-04-11 09:44:34'),
(156, 254, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', NULL, 'camera', NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 09:47:30', '2022-04-11 09:47:30'),
(157, 230, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 09:50:28', '2022-04-11 09:50:28'),
(158, 113, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 09:54:44', '2022-04-11 09:54:44'),
(159, 148, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 12:56:05', '2022-04-11 12:56:05'),
(160, 140, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 12:57:02', '2022-04-11 12:57:02'),
(161, 243, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', 'map', NULL, NULL, NULL, 'bluetooth', NULL, NULL, NULL, NULL, 'active', '2022-04-11 12:57:45', '2022-04-11 12:57:45'),
(162, 149, NULL, 'control_parking', NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 12:58:40', '2022-04-11 12:58:40'),
(163, 141, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 13:00:23', '2022-04-11 13:00:23'),
(164, 123, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 13:01:04', '2022-04-11 13:01:04'),
(165, 110, NULL, 'control_parking', NULL, NULL, 'conditioner', NULL, NULL, NULL, NULL, 'spare_tire', 'bluetooth', NULL, NULL, NULL, 'gps', 'active', '2022-04-11 13:01:57', '2022-04-11 13:01:57'),
(166, 116, 'sensors', NULL, NULL, 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', NULL, NULL, NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-11 13:02:49', '2022-04-11 13:02:49'),
(167, 152, NULL, 'control_parking', 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-11 13:04:21', '2022-04-11 13:04:21'),
(168, 255, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 13:05:06', '2022-04-11 13:05:06'),
(169, 227, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 13:06:28', '2022-04-11 13:06:28'),
(170, 244, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 13:07:09', '2022-04-11 13:07:09'),
(171, 252, NULL, NULL, 'auto_temp', NULL, NULL, NULL, NULL, 'camera', 'kids_chair', NULL, NULL, NULL, NULL, 'safety_aribag', 'gps', 'active', '2022-04-11 13:10:29', '2022-04-11 13:10:29'),
(172, 232, 'sensors', NULL, NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 13:12:03', '2022-04-11 13:12:03'),
(173, 129, NULL, NULL, 'auto_temp', 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 13:16:56', '2022-04-11 13:16:56'),
(174, 256, NULL, NULL, NULL, 'wireless_co', NULL, 'navigator', NULL, NULL, 'kids_chair', 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 13:17:31', '2022-04-11 13:17:31'),
(175, 251, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-11 13:19:55', '2022-04-11 13:19:55'),
(176, 125, NULL, NULL, 'auto_temp', NULL, NULL, NULL, NULL, 'camera', 'kids_chair', NULL, NULL, NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-11 13:21:00', '2022-04-11 13:21:00'),
(177, 233, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 13:26:42', '2022-04-11 13:26:42'),
(178, 239, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-11 13:28:42', '2022-04-11 13:28:42'),
(179, 121, NULL, NULL, 'auto_temp', 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 13:32:43', '2022-04-11 13:32:43'),
(180, 237, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 13:33:20', '2022-04-11 13:33:20'),
(181, 112, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 13:33:59', '2022-04-11 13:33:59'),
(182, 250, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', NULL, 'camera', 'kids_chair', NULL, NULL, NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-11 13:34:39', '2022-04-11 13:34:39'),
(183, 133, 'sensors', NULL, NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 13:35:34', '2022-04-11 13:35:34'),
(184, 234, NULL, NULL, 'auto_temp', 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 13:36:51', '2022-04-11 13:36:51'),
(185, 231, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-11 13:38:15', '2022-04-11 13:38:15'),
(186, 253, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 13:40:51', '2022-04-11 13:40:51'),
(187, 151, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', NULL, 'camera', 'kids_chair', NULL, NULL, NULL, 'usb', 'safety_aribag', NULL, 'active', '2022-04-11 13:42:58', '2022-04-11 13:42:58'),
(188, 139, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 13:45:36', '2022-04-11 13:45:36'),
(189, 142, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 13:47:14', '2022-04-11 13:47:14'),
(190, 136, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 13:48:26', '2022-04-11 13:48:26'),
(191, 77, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 13:57:02', '2022-04-11 13:57:02'),
(192, 99, NULL, NULL, 'auto_temp', NULL, NULL, NULL, NULL, 'camera', 'kids_chair', NULL, NULL, NULL, 'usb', 'safety_aribag', NULL, 'active', '2022-04-11 13:58:33', '2022-04-11 13:58:33'),
(193, 84, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:02:29', '2022-04-11 14:02:29'),
(194, 83, NULL, 'control_parking', NULL, NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:03:10', '2022-04-11 14:03:10'),
(195, 97, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 14:03:51', '2022-04-11 14:03:51'),
(196, 82, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 14:04:22', '2022-04-11 14:04:22'),
(197, 108, NULL, 'control_parking', 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:04:55', '2022-04-11 14:04:55'),
(198, 103, NULL, 'control_parking', NULL, NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:05:39', '2022-04-11 14:05:39'),
(199, 104, NULL, NULL, 'auto_temp', 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 14:06:20', '2022-04-11 14:06:20'),
(200, 98, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:07:04', '2022-04-11 14:07:04'),
(201, 88, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', NULL, 'camera', NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 14:07:40', '2022-04-11 14:07:40'),
(202, 91, NULL, NULL, 'auto_temp', NULL, NULL, NULL, NULL, 'camera', 'kids_chair', 'spare_tire', NULL, NULL, 'usb', NULL, 'gps', 'active', '2022-04-11 14:08:18', '2022-04-11 14:08:18'),
(203, 102, NULL, 'control_parking', 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-11 14:09:25', '2022-04-11 14:09:25'),
(204, 101, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:10:21', '2022-04-11 14:10:21'),
(205, 106, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:11:03', '2022-04-11 14:11:03'),
(206, 107, NULL, NULL, 'auto_temp', 'wireless_co', NULL, NULL, NULL, NULL, 'kids_chair', 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 14:11:46', '2022-04-11 14:11:46'),
(207, 100, 'sensors', 'control_parking', 'auto_temp', NULL, 'conditioner', 'navigator', 'map', 'camera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 14:12:25', '2022-04-11 14:12:25'),
(208, 92, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 14:13:02', '2022-04-11 14:13:02'),
(209, 89, NULL, 'control_parking', 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-11 14:13:37', '2022-04-11 14:13:37'),
(210, 94, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:14:13', '2022-04-11 14:14:13'),
(211, 78, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-11 14:14:46', '2022-04-11 14:14:46'),
(212, 80, NULL, 'control_parking', NULL, NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:15:22', '2022-04-11 14:15:22'),
(213, 109, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:15:53', '2022-04-11 14:15:53'),
(214, 86, 'sensors', NULL, NULL, NULL, 'conditioner', 'navigator', NULL, NULL, NULL, NULL, 'bluetooth', 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 14:16:28', '2022-04-11 14:16:28'),
(215, 87, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:17:26', '2022-04-11 14:17:26'),
(216, 93, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 14:18:15', '2022-04-11 14:18:15'),
(217, 81, NULL, 'control_parking', NULL, NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:18:49', '2022-04-11 14:18:49'),
(218, 85, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', NULL, 'camera', NULL, NULL, NULL, NULL, 'usb', 'safety_aribag', NULL, 'active', '2022-04-11 14:19:21', '2022-04-11 14:19:21'),
(219, 105, NULL, NULL, 'auto_temp', NULL, NULL, NULL, NULL, 'camera', 'kids_chair', NULL, NULL, NULL, 'usb', 'safety_aribag', NULL, 'active', '2022-04-11 14:19:51', '2022-04-11 14:19:51'),
(220, 96, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', NULL, NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-11 14:21:02', '2022-04-11 14:21:02'),
(221, 29, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-11 14:22:48', '2022-04-11 14:22:48'),
(222, 20, NULL, NULL, 'auto_temp', NULL, NULL, NULL, 'map', 'camera', 'kids_chair', NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-11 14:23:29', '2022-04-11 14:23:29'),
(223, 30, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:24:08', '2022-04-11 14:24:08'),
(224, 34, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 14:24:42', '2022-04-11 14:24:42'),
(225, 22, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 14:25:45', '2022-04-11 14:25:45'),
(226, 32, NULL, NULL, 'auto_temp', 'wireless_co', NULL, 'navigator', NULL, 'camera', NULL, 'spare_tire', NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 14:26:23', '2022-04-11 14:26:23'),
(227, 23, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', NULL, 'camera', NULL, NULL, NULL, 'rear_camera', 'usb', NULL, NULL, 'active', '2022-04-11 14:27:23', '2022-04-11 14:27:23'),
(228, 28, NULL, NULL, 'auto_temp', 'wireless_co', NULL, 'navigator', NULL, 'camera', 'kids_chair', 'spare_tire', NULL, NULL, NULL, NULL, 'gps', 'active', '2022-04-11 14:28:08', '2022-04-11 14:28:08'),
(229, 19, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, NULL, 'usb', NULL, NULL, 'active', '2022-04-11 14:28:43', '2022-04-11 14:28:43'),
(230, 245, 'sensors', 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-11 14:40:26', '2022-04-11 14:40:26'),
(231, 204, NULL, 'control_parking', 'auto_temp', NULL, NULL, 'navigator', 'map', NULL, NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 14:42:25', '2022-04-11 14:42:25'),
(232, 79, NULL, NULL, 'auto_temp', NULL, NULL, 'navigator', 'map', 'camera', NULL, NULL, NULL, 'rear_camera', NULL, NULL, NULL, 'active', '2022-04-11 14:43:35', '2022-04-11 14:43:35'),
(233, 257, NULL, 'control_parking', NULL, 'wireless_co', 'conditioner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-13 07:55:14', '2022-04-13 07:55:14'),
(234, 258, NULL, NULL, NULL, NULL, 'conditioner', 'navigator', 'map', 'camera', NULL, NULL, NULL, NULL, NULL, 'safety_aribag', 'gps', 'active', '2022-04-13 08:42:13', '2022-04-13 08:42:13'),
(235, 259, NULL, 'control_parking', NULL, 'wireless_co', NULL, NULL, NULL, NULL, NULL, NULL, 'bluetooth', NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-18 07:53:06', '2022-04-18 07:53:06'),
(236, 260, NULL, NULL, NULL, NULL, 'conditioner', NULL, NULL, 'camera', NULL, 'spare_tire', 'bluetooth', NULL, 'usb', NULL, NULL, 'active', '2022-04-18 07:58:21', '2022-04-18 07:58:21'),
(237, 261, 'sensors', NULL, NULL, 'wireless_co', NULL, 'navigator', NULL, 'camera', NULL, 'spare_tire', 'bluetooth', NULL, 'usb', 'safety_aribag', NULL, 'active', '2022-04-18 08:02:29', '2022-04-18 08:02:29'),
(238, 262, NULL, NULL, NULL, 'wireless_co', NULL, NULL, 'map', 'camera', NULL, 'spare_tire', NULL, NULL, NULL, 'safety_aribag', NULL, 'active', '2022-04-18 08:06:12', '2022-04-18 08:06:12'),
(239, 263, NULL, 'control_parking', NULL, 'wireless_co', NULL, NULL, 'map', 'camera', NULL, 'spare_tire', NULL, NULL, NULL, NULL, NULL, 'active', '2022-04-18 08:10:35', '2022-04-18 08:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `la_historys`
--

CREATE TABLE `la_historys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bookings_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_historys`
--

INSERT INTO `la_historys` (`id`, `users_id`, `bookings_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'active', '2021-09-11 18:40:57', '2021-09-11 18:40:57'),
(3, 4, 3, 'active', '2021-09-12 15:26:49', '2021-09-12 15:26:49'),
(5, 76, 7, 'active', '2022-03-14 06:45:37', '2022-03-14 06:45:37'),
(6, 76, 8, 'active', '2022-03-14 06:47:33', '2022-03-14 06:47:33'),
(11, 2, 16, 'inactive', '2022-04-08 08:31:17', '2022-04-08 08:31:17'),
(12, 3, 17, 'inactive', '2022-04-08 08:59:33', '2022-04-08 08:59:33'),
(13, 3, 18, 'inactive', '2022-04-08 08:59:37', '2022-04-08 08:59:37'),
(14, 3, 19, 'inactive', '2022-04-08 09:35:33', '2022-04-08 09:35:33'),
(15, 1, 20, 'inactive', '2022-04-08 10:16:12', '2022-04-08 10:16:12'),
(16, 1, 21, 'inactive', '2022-04-08 11:29:46', '2022-04-08 11:29:46'),
(17, 8, 22, 'inactive', '2022-04-09 01:59:06', '2022-04-09 01:59:06'),
(18, 1, 25, 'active', '2022-04-09 08:33:52', '2022-04-09 08:33:52'),
(19, 3, 26, 'inactive', '2022-04-11 06:00:35', '2022-04-11 06:00:35'),
(20, 3, 27, 'inactive', '2022-04-12 04:28:49', '2022-04-12 04:28:49'),
(21, 3, 28, 'inactive', '2022-04-14 03:02:53', '2022-04-14 03:02:53'),
(22, 3, 29, 'inactive', '2022-04-14 03:03:11', '2022-04-14 03:03:11'),
(23, 3, 30, 'inactive', '2022-04-14 03:03:24', '2022-04-14 03:03:24'),
(24, 3, 31, 'inactive', '2022-04-14 03:45:39', '2022-04-14 03:45:39'),
(25, 3, 32, 'inactive', '2022-04-16 02:51:18', '2022-04-16 02:51:18'),
(26, 3, 33, 'inactive', '2022-04-16 04:29:10', '2022-04-16 04:29:10'),
(27, 3, 34, 'inactive', '2022-04-16 04:30:36', '2022-04-16 04:30:36'),
(28, 3, 35, 'inactive', '2022-04-16 04:31:23', '2022-04-16 04:31:23'),
(29, 3, 36, 'inactive', '2022-04-16 04:40:53', '2022-04-16 04:40:53'),
(30, 23, 37, 'inactive', '2022-04-19 07:42:04', '2022-04-19 07:42:04'),
(31, 10, 38, 'inactive', '2022-04-19 09:39:55', '2022-04-19 09:39:55'),
(32, 10, 39, 'inactive', '2022-04-20 02:07:10', '2022-04-20 02:07:10'),
(33, 10, 40, 'inactive', '2022-04-20 02:07:41', '2022-04-20 02:07:41'),
(34, 10, 41, 'inactive', '2022-04-20 06:23:53', '2022-04-20 06:23:53'),
(35, 10, 42, 'inactive', '2022-04-21 02:29:23', '2022-04-21 02:29:23'),
(36, 10, 43, 'inactive', '2022-04-21 10:00:47', '2022-04-21 10:00:47');

-- --------------------------------------------------------

--
-- Table structure for table `la_history_places`
--

CREATE TABLE `la_history_places` (
  `id` int(11) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `full_address` varchar(255) DEFAULT NULL,
  `location_lat` varchar(255) NOT NULL,
  `location_lng` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `la_history_places`
--

INSERT INTO `la_history_places` (`id`, `users_id`, `city_id`, `region_id`, `address`, `full_address`, `location_lat`, `location_lng`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 19, 1, '54 Đường Võ Văn Ngân, Linh Chiểu', '53 Đường Võ Văn Ngân, Linh Chiểu, Thủ Đức, Thành phố Hồ Chí Minh', '10.8511627', '106.7557547', 'active', '2022-04-21 09:19:32', '2022-04-21 09:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `la_otp_email`
--

CREATE TABLE `la_otp_email` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `otp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `la_otp_email`
--

INSERT INTO `la_otp_email` (`id`, `email`, `otp`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'tagago4238@nuesond.com', '1331', '2022-04-07 11:53:00', '2022-04-07 11:58:00', '2022-04-07 11:53:43', '2022-04-07 11:53:43'),
(2, 'nguyendienlam351@gmail.com', '3575', '2022-04-08 08:24:00', '2022-04-08 08:29:00', '2022-04-08 08:24:17', '2022-04-08 08:24:17'),
(3, 'thanhthanglhu@gmail.com', '7540', '2022-04-09 08:20:00', '2022-04-09 08:25:00', '2022-04-09 08:20:17', '2022-04-09 08:20:17'),
(4, '19211tt1573@mail.tdc.edu.vn', '6231', '2022-04-11 12:53:00', '2022-04-11 12:58:00', '2022-04-11 12:53:49', '2022-04-11 12:53:49'),
(5, '123@gmail.com', '9129', '2022-04-12 11:16:00', '2022-04-12 11:21:00', '2022-04-12 11:16:02', '2022-04-12 11:16:02'),
(6, 'Tsydydyf@gamil.ghh', '9274', '2022-04-16 08:24:00', '2022-04-16 08:29:00', '2022-04-16 08:24:57', '2022-04-16 08:24:57'),
(7, 'Vỉig90030@hhmel.com', '9806', '2022-04-16 08:27:00', '2022-04-16 08:32:00', '2022-04-16 08:27:08', '2022-04-16 08:27:08'),
(8, 'Virig90030@hhmel.com', '5224', '2022-04-16 08:28:00', '2022-04-16 08:33:00', '2022-04-16 08:28:54', '2022-04-16 08:28:54'),
(9, 'virig90030@hhmel.com', '3469', '2022-04-16 08:35:00', '2022-04-16 08:40:00', '2022-04-16 08:35:43', '2022-04-16 08:35:43'),
(10, 'virig90030@hhmel.com', '5615', '2022-04-16 08:36:00', '2022-04-16 08:41:00', '2022-04-16 08:36:17', '2022-04-16 08:36:17'),
(11, 'abc@gmail.com', '5707', '2022-04-16 13:01:00', '2022-04-16 13:06:00', '2022-04-16 13:01:58', '2022-04-16 13:01:58'),
(12, 'abc@gmail.com', '3720', '2022-04-16 13:02:00', '2022-04-16 13:07:00', '2022-04-16 13:02:09', '2022-04-16 13:02:09'),
(13, 'ngodinhluan1@gmail.com', '5087', '2022-04-16 13:03:00', '2022-04-16 13:08:00', '2022-04-16 13:03:16', '2022-04-16 13:03:16'),
(14, 'hoangquanglhu@gmail.com', '1956', '2022-04-19 10:25:00', '2022-04-19 10:30:00', '2022-04-19 10:25:35', '2022-04-19 10:25:35'),
(15, 'Vinh.huathanh@gmail.com', '4731', '2022-04-19 14:22:00', '2022-04-19 14:27:00', '2022-04-19 14:22:23', '2022-04-19 14:22:23'),
(16, 'Vinh.huathanh01@gmail.com', '7009', '2022-04-19 14:23:00', '2022-04-19 14:28:00', '2022-04-19 14:23:18', '2022-04-19 14:23:18'),
(17, 'nguyendienlam.tdc2019@gmail.com', '8225', '2022-04-21 08:29:00', '2022-04-21 08:34:00', '2022-04-21 08:29:31', '2022-04-21 08:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `la_password_resets`
--

CREATE TABLE `la_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_password_resets`
--

INSERT INTO `la_password_resets` (`email`, `token`, `created_at`) VALUES
('tagago4238@nuesond.com', '$2y$10$u/7n9G7L7O07G4GX259KJeBnB4SkvZdojj7zearL8h4H5GD0u9dKC', '2022-04-07 07:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `la_payments`
--

CREATE TABLE `la_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_transaction_id` int(11) DEFAULT NULL,
  `p_user_id` int(11) DEFAULT NULL,
  `p_money` double DEFAULT NULL,
  `p_transaction_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_vnp_response_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_code_vnpay` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_code_bank` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_payments`
--

INSERT INTO `la_payments` (`id`, `p_transaction_id`, `p_user_id`, `p_money`, `p_transaction_code`, `p_note`, `p_vnp_response_code`, `p_code_vnpay`, `p_code_bank`, `p_time`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 59459000, '20210911183748', 'Noi dung thanh toan', '00', '13582533', 'NCB', '2021-09-12 01:40:00', '2021-09-11 18:40:57', '2021-09-11 18:40:57'),
(3, 3, 4, 119459000, '20210912152558', 'Thanh toán hóa đơn thuê xe', '00', '13582700', 'NCB', '2021-09-12 22:26:00', '2021-09-12 15:26:49', '2021-09-12 15:26:49'),
(4, 4, 48, 119459000, '20220216014758', 'Noi dung thanh toan', '00', '13687812', 'NCB', '2022-02-16 08:50:00', '2022-02-16 01:50:17', '2022-02-16 01:50:17'),
(5, 7, 76, 89559000, '20220314064408', 'Noi dung thanh toan', '00', '13705078', 'NCB', '2022-03-14 13:45:00', '2022-03-14 06:45:37', '2022-03-14 06:45:37'),
(6, 8, 76, 89559000, '20220314064408', 'Noi dung thanh toan', '00', '13705078', 'NCB', '2022-03-14 13:45:00', '2022-03-14 06:47:33', '2022-03-14 06:47:33'),
(9, 23, 1, 29679000, '20220409083156', 'Noi dung thanh toan', '00', '13722172', 'NCB', '2022-04-09 15:32:00', '2022-04-09 08:32:55', '2022-04-09 08:32:55'),
(10, 24, 1, 29679000, '20220409083156', 'Noi dung thanh toan', '00', '13722172', 'NCB', '2022-04-09 15:32:00', '2022-04-09 08:33:46', '2022-04-09 08:33:46'),
(11, 25, 1, 29679000, '20220409083156', 'Noi dung thanh toan', '00', '13722172', 'NCB', '2022-04-09 15:32:00', '2022-04-09 08:33:52', '2022-04-09 08:33:52');

-- --------------------------------------------------------

--
-- Table structure for table `la_personal_access_tokens`
--

CREATE TABLE `la_personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `la_personal_access_tokens`
--

INSERT INTO `la_personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\User', 2, 'vivo', 'da007f3227c24e3b203151f9fd51a746e11ccef9186caa807a73d043a3caf485', '[\"*\"]', '2022-04-07 07:41:40', '2022-04-07 04:54:19', '2022-04-07 07:41:40'),
(3, 'App\\User', 3, 'authToken', 'ba762b94b591cf3c24634f0134005be4b3ca9dc18479e1b5fe6217771be340ae', '[\"*\"]', NULL, '2022-04-07 08:56:09', '2022-04-07 08:56:09'),
(7, 'App\\User', 8, 'android', '03f0b38dd0ad22a41f1bc49f4592e842a31d8fe99251f77bf3f35c3a9c604926', '[\"*\"]', '2022-04-08 01:35:44', '2022-04-08 01:32:47', '2022-04-08 01:35:44'),
(8, 'App\\User', 8, 'android', 'b23003012da05e1f759035a977fd224a7792ae659a20ccd9efc920956746d430', '[\"*\"]', NULL, '2022-04-08 03:00:20', '2022-04-08 03:00:20'),
(11, 'App\\User', 10, 'android', '6eb6e2fe1672f3ed75df40045790dcccb84f0df7b75d8278c96ca249141aa9e5', '[\"*\"]', NULL, '2022-04-08 06:20:21', '2022-04-08 06:20:21'),
(13, 'App\\User', 3, 'authToken', 'b3477f3c2c7105b6bc2e731e59c09f3abb0d8c960d817f29940ce8b017ba1db9', '[\"*\"]', '2022-04-08 09:35:33', '2022-04-08 06:30:44', '2022-04-08 09:35:33'),
(14, 'App\\User', 10, 'android', 'acb7b00d3a689a935d2678a6a74d192d7370568e4efc835172764105ef3b89b6', '[\"*\"]', NULL, '2022-04-08 07:03:46', '2022-04-08 07:03:46'),
(15, 'App\\User', 2, 'vivo', '08e4dc49620b6aa758424b44b3b6c3915b7eafe513eb04896b6ea1004296df1f', '[\"*\"]', '2022-04-08 09:34:22', '2022-04-08 07:31:53', '2022-04-08 09:34:22'),
(16, 'App\\User', 10, 'android', 'bceef26da9007194be02c68715aa7012079b41e4b5f0cf41f5186606814722ff', '[\"*\"]', NULL, '2022-04-08 07:44:35', '2022-04-08 07:44:35'),
(22, 'App\\User', 8, 'authToken', '8a8d220b030e92da58812659c556b557a76988e9892a868078ccbfbd234b7292', '[\"*\"]', '2022-04-08 10:10:00', '2022-04-08 10:09:52', '2022-04-08 10:10:00'),
(24, 'App\\User', 11, 'authToken', '0d221f669838639390806474eb8c68fee335b457c8465785292b42a39212c0b7', '[\"*\"]', NULL, '2022-04-08 10:16:29', '2022-04-08 10:16:29'),
(25, 'App\\User', 1, 'authToken', '6af6c1f1148d7cb371f031bee3a601fd353115f638ca028ef0b294b0a75f7e67', '[\"*\"]', '2022-04-08 11:29:46', '2022-04-08 10:27:13', '2022-04-08 11:29:46'),
(27, 'App\\User', 12, 'android', 'c0102a4aaa0d9ae3b93858998be423b2612fee677d1106d172f6d579d4283328', '[\"*\"]', '2022-04-09 01:24:15', '2022-04-09 01:22:31', '2022-04-09 01:24:15'),
(28, 'App\\User', 10, 'android', '25e57cc251039f931f742cdf3e768877a293bbbf0bc20ad303bebf740da4f245', '[\"*\"]', NULL, '2022-04-09 03:08:45', '2022-04-09 03:08:45'),
(29, 'App\\User', 10, 'android', 'becb5343ff2e0910e33dc80ad9f3e29e4e91c9424c42e99f2608d7d8792d73dc', '[\"*\"]', NULL, '2022-04-09 16:01:13', '2022-04-09 16:01:13'),
(33, 'App\\User', 3, 'authToken', '0620e34b50402f9b0b8c3cd64854c12354ab14adfcaf2ec3940a8d800ee9c8c5', '[\"*\"]', '2022-04-12 06:49:14', '2022-04-12 06:49:08', '2022-04-12 06:49:14'),
(36, 'App\\User', 3, 'authToken', '36cc07c70fbea6ecb51f057bba31a9f2eb08074a47217cb443be4f8e8d455969', '[\"*\"]', '2022-04-16 04:40:53', '2022-04-16 04:28:56', '2022-04-16 04:40:53'),
(37, 'App\\User', 3, 'authToken', '71119323155a63352f4e1ac990a569bf17f256d8c9e30ce0e0d3ef63aa527496', '[\"*\"]', NULL, '2022-04-16 05:19:20', '2022-04-16 05:19:20'),
(39, 'App\\User', 20, 'android', 'e0c5a167980bdb7eb05f3ac3680ceca5c68928334c2aff94ca5dbd4e6812dc42', '[\"*\"]', '2022-04-18 01:33:55', '2022-04-16 06:12:15', '2022-04-18 01:33:55'),
(40, 'App\\User', 3, 'authToken', 'b6fa9aaef30e6aa028569bafe78aa48cb1ff63e26366d83baf917364b62c565f', '[\"*\"]', NULL, '2022-04-18 01:48:38', '2022-04-18 01:48:38'),
(43, 'App\\User', 2, 'vivo', '368c581892149d6bd08d7842efbb839320b1ea0961af904b7bcc2b14f26292e6', '[\"*\"]', '2022-04-18 04:36:11', '2022-04-18 04:35:55', '2022-04-18 04:36:11'),
(45, 'App\\User', 2, 'vivo', 'e86124deaa5a2910c44d335a5fb7d71e45505dbf8a473b1b08859d8f8ac498e6', '[\"*\"]', '2022-04-21 05:50:26', '2022-04-18 09:27:19', '2022-04-21 05:50:26'),
(46, 'App\\User', 2, 'vivo', 'fca5bdf6352a29d3b4e395829fff27eee766bd4bcca696209ef8085583ab149a', '[\"*\"]', NULL, '2022-04-18 09:27:32', '2022-04-18 09:27:32'),
(47, 'App\\User', 10, 'android', 'fee5c48876c773d56e216617d184fc5db2f567a7dcf12af2a9e7f50058ebc764', '[\"*\"]', NULL, '2022-04-18 13:06:33', '2022-04-18 13:06:33'),
(48, 'App\\User', 10, 'android', '43e0699912efdbd4a2dc1f63a59ee91b1c3aa8117217a9bb71dfced8d20dfe87', '[\"*\"]', NULL, '2022-04-18 13:13:49', '2022-04-18 13:13:49'),
(49, 'App\\User', 10, 'android', '2cc720a1ba0a0c2a8f79f3831cb2c796def711dab271505980a126b64674bf85', '[\"*\"]', NULL, '2022-04-18 13:17:14', '2022-04-18 13:17:14'),
(50, 'App\\User', 10, 'android', '22cf53385bb4073f55efee1bf1f5f4ca65fcac8b93deb918d42ff1c463c508cb', '[\"*\"]', NULL, '2022-04-18 15:10:49', '2022-04-18 15:10:49'),
(51, 'App\\User', 10, 'android', '7956f138df600c66d422ee0d5b520186f5ed627b0d71247e7efc3e0f7c87a069', '[\"*\"]', NULL, '2022-04-19 01:28:45', '2022-04-19 01:28:45'),
(52, 'App\\User', 10, 'android', 'b6fec3b19312ba607f56d54b750e22b5aeb37f8754d4416e28d23bdac356623c', '[\"*\"]', '2022-04-19 02:14:38', '2022-04-19 01:50:06', '2022-04-19 02:14:38'),
(53, 'App\\User', 10, 'android', '034fb027533fe5afddda8379394301077222498a664b4031841f22088746ead5', '[\"*\"]', NULL, '2022-04-19 01:50:45', '2022-04-19 01:50:45'),
(54, 'App\\User', 10, 'android', '279e9eff555756644c996908110dc6b6a2252c6dc78fccea4450f9bcb40e6753', '[\"*\"]', NULL, '2022-04-19 03:09:12', '2022-04-19 03:09:12'),
(55, 'App\\User', 22, 'android', '5c0c84c1c7811311afd625052a73c4a4aaa846d2d70ac654f04eb50a0d5f70e3', '[\"*\"]', NULL, '2022-04-19 03:26:40', '2022-04-19 03:26:40'),
(57, 'App\\User', 10, 'android', '34226928dc7a9ab23c1f63cb95001278ed16b184c7d78d58791d42ef51cba0b4', '[\"*\"]', NULL, '2022-04-19 03:48:31', '2022-04-19 03:48:31'),
(58, 'App\\User', 10, 'android', '42a88962bafafc51d09cdca621c8a69f6d3c1fc14dcad82b0f1a01f323ee8acb', '[\"*\"]', NULL, '2022-04-19 03:51:00', '2022-04-19 03:51:00'),
(62, 'App\\User', 10, 'ios', '50f909a96f6b6e50ac63980fae74615a015739eba245ad429983999424af2eea', '[\"*\"]', NULL, '2022-04-19 04:22:31', '2022-04-19 04:22:31'),
(63, 'App\\User', 10, 'android', '0c5396c7a104fcb9ff654ac7060a198160c8215ae5c05cea1a6986ef4e61376a', '[\"*\"]', NULL, '2022-04-19 05:57:48', '2022-04-19 05:57:48'),
(68, 'App\\User', 10, 'android', '4b47db3d8a4fb9aa9d09acb4dbec9b4fce8093111b7f49f7d8a46505de51152a', '[\"*\"]', NULL, '2022-04-19 06:20:58', '2022-04-19 06:20:58'),
(76, 'App\\User', 10, 'android', '29461e448440a37176949a0cf13af5677d655ee836668d2727084c8776b9a65c', '[\"*\"]', '2022-04-20 01:56:40', '2022-04-19 07:25:51', '2022-04-20 01:56:40'),
(78, 'App\\User', 10, 'ios', '1a92cdcd409abd694b38ffabd91afdebd891a33b3a45b688861997fd8c4637dc', '[\"*\"]', '2022-04-19 08:00:59', '2022-04-19 07:49:31', '2022-04-19 08:00:59'),
(79, 'App\\User', 10, 'android', '1e08405445f4afd4529d40a4743ca8d2205639a19755a05cc1b975c7944d4d8e', '[\"*\"]', '2022-04-19 07:52:52', '2022-04-19 07:52:44', '2022-04-19 07:52:52'),
(81, 'App\\User', 10, 'ios', 'a5acc37f8b602784be3df38563ef7f91024b8909977e366b902bb922ccc251fe', '[\"*\"]', '2022-04-19 09:28:17', '2022-04-19 09:27:55', '2022-04-19 09:28:17'),
(83, 'App\\User', 10, 'ios', '87174dcbcd48dd1780aac93f57b888ab0cf9a0d4aeae2e53a5fb752d6f9b5b8f', '[\"*\"]', '2022-04-19 09:41:22', '2022-04-19 09:37:18', '2022-04-19 09:41:22'),
(87, 'App\\User', 10, 'android', 'eebaf58fb58af7bba3ca4c33a3e70c8630fadb0859663352e7352a5549e4b5ec', '[\"*\"]', NULL, '2022-04-19 13:59:16', '2022-04-19 13:59:16'),
(88, 'App\\User', 10, 'android', '97d93f78585c1b6918065bf2d3cb69fcca896dd579f3f2cc41c20217cc85bd8d', '[\"*\"]', '2022-04-19 14:56:20', '2022-04-19 14:10:00', '2022-04-19 14:56:20'),
(89, 'App\\User', 10, 'android', 'cd62e54ffa621bf363053f642c522bca71c7d985f5fcf58f6d6168a9f28e5fc6', '[\"*\"]', NULL, '2022-04-19 15:21:17', '2022-04-19 15:21:17'),
(90, 'App\\User', 10, 'android', '7db04af2d3f1288edc1011ff2122b6b72adf80c09ca86fc4214f705177321cae', '[\"*\"]', NULL, '2022-04-20 01:22:56', '2022-04-20 01:22:56'),
(91, 'App\\User', 26, 'authToken', 'a77e07a5b703627d33d1628b2e0b3aa25f8cfd2b73ec90958b745d748472a687', '[\"*\"]', '2022-04-20 01:26:14', '2022-04-20 01:25:52', '2022-04-20 01:26:14'),
(92, 'App\\User', 2, 'vivo', 'efbcce6a16f1fe34e254dd2d784272475034a47d54935c0b945a0e32275e3f33', '[\"*\"]', '2022-04-20 01:42:43', '2022-04-20 01:26:40', '2022-04-20 01:42:43'),
(93, 'App\\User', 10, 'android', '576880998cf2597a9cfaf271f44a0f67e115322a91f36c603d2aa7e364d78f3c', '[\"*\"]', '2022-04-20 02:07:41', '2022-04-20 01:26:44', '2022-04-20 02:07:41'),
(94, 'App\\User', 10, 'ios', 'f537cb750db517debbb61015b8ff556badf417995b45e3217917324f9cbe295a', '[\"*\"]', '2022-04-20 02:18:23', '2022-04-20 01:34:19', '2022-04-20 02:18:23'),
(95, 'App\\User', 2, 'vivo', '430e2102a01cfcb30ac4c1db9f52ebffdbcd670db6473ef66ee52f4657761cd8', '[\"*\"]', NULL, '2022-04-20 01:42:56', '2022-04-20 01:42:56'),
(96, 'App\\User', 2, 'vivo', 'e17ccdf9c8e883b47abac8c93abc53457f844716812617e5c44c5dc699ff78bb', '[\"*\"]', NULL, '2022-04-20 01:42:57', '2022-04-20 01:42:57'),
(97, 'App\\User', 2, 'vivo', '556ec4eb570f71288d8e4b03dc1450457e264f65c9247aa8e077a1db30c9f962', '[\"*\"]', '2022-04-21 05:50:19', '2022-04-20 01:42:57', '2022-04-21 05:50:19'),
(98, 'App\\User', 10, 'android', 'e6eaf5b9084bfaee36d7108015405becccd3a862a27f498a00e98b5b97e54bd8', '[\"*\"]', NULL, '2022-04-20 01:45:43', '2022-04-20 01:45:43'),
(99, 'App\\User', 10, 'android', 'fb8c42cd8fda49968d21eaa664a57480ee624085176a7b1894b407c61a256695', '[\"*\"]', NULL, '2022-04-20 02:05:21', '2022-04-20 02:05:21'),
(100, 'App\\User', 10, 'android', '79038ec2295ac8561bde79afbe46ddb534f2915009eb3167890e275a8ae01ab1', '[\"*\"]', NULL, '2022-04-20 02:22:02', '2022-04-20 02:22:02'),
(101, 'App\\User', 10, 'android', '349ce78916b40b3c3c1c682543fc29815e47c2396d588a5423c7d8a424ad6d27', '[\"*\"]', NULL, '2022-04-20 02:29:03', '2022-04-20 02:29:03'),
(102, 'App\\User', 10, 'android', '58e489d92983af3d6a1ec76fd3163af6cfe9dc0cfc96939f88a4cd3f629964a4', '[\"*\"]', NULL, '2022-04-20 02:37:48', '2022-04-20 02:37:48'),
(103, 'App\\User', 10, 'android', '2a27afa5f753a4feb929481383ea9eca656e735f15f33dd3168167f5cdd036ad', '[\"*\"]', NULL, '2022-04-20 02:41:14', '2022-04-20 02:41:14'),
(104, 'App\\User', 10, 'android', '2a94e705595ece4dfcf03c38ff5646d298a8bc7bc6082e775c439c068076ddf4', '[\"*\"]', NULL, '2022-04-20 02:44:45', '2022-04-20 02:44:45'),
(105, 'App\\User', 10, 'android', 'f34c2a1ae6bd0d09035f94e02ddfb33aa763ed69d9e9815dfc32cf31c1eb5e93', '[\"*\"]', NULL, '2022-04-20 02:48:50', '2022-04-20 02:48:50'),
(106, 'App\\User', 10, 'android', '1a16e9f4fce18eac222f3fd888fc14e5389a79d1ef73464a5ec3b5a35e64e5c2', '[\"*\"]', NULL, '2022-04-20 03:08:42', '2022-04-20 03:08:42'),
(107, 'App\\User', 10, 'android', 'edde86a5645fe097bef05dc00d7464aad33c4fb82530f8a760c7b7e160910c40', '[\"*\"]', NULL, '2022-04-20 03:17:03', '2022-04-20 03:17:03'),
(108, 'App\\User', 10, 'android', 'c869fe2d40bea5697514ef3a995d31b2a7741b9673f55389905ab7c30ca5e17d', '[\"*\"]', NULL, '2022-04-20 03:24:59', '2022-04-20 03:24:59'),
(109, 'App\\User', 10, 'android', '4212b8cf258286458731443b1920194430b79566cfe3e7ad8721572eccccca83', '[\"*\"]', NULL, '2022-04-20 03:38:02', '2022-04-20 03:38:02'),
(110, 'App\\User', 10, 'android', 'accad79c3be5af2f11b390d7fd937b631cdd46f74e92389ba6de3b3ec140872a', '[\"*\"]', NULL, '2022-04-20 05:43:52', '2022-04-20 05:43:52'),
(111, 'App\\User', 10, 'android', '84b33ba2fd929b2897ad2bd50511ec445deda9c80ff58605984a88c7cb03c5ef', '[\"*\"]', NULL, '2022-04-20 05:51:22', '2022-04-20 05:51:22'),
(113, 'App\\User', 10, 'android', 'a30feedbbbc671af75c04c542c376dd223b37abe502c3311a402d3886b20aa0d', '[\"*\"]', NULL, '2022-04-20 06:17:03', '2022-04-20 06:17:03'),
(114, 'App\\User', 10, 'android', 'fcf8cc6f61de0f89902f867795a18565915c2dc3c795a83b62bdfe7c19f31266', '[\"*\"]', '2022-04-20 06:47:39', '2022-04-20 06:22:32', '2022-04-20 06:47:39'),
(115, 'App\\User', 10, 'ios', 'c8d8b1c9ddbe795dec361b3c8a96246b468585d5a2626a64aab23388c03b4640', '[\"*\"]', '2022-04-21 14:39:41', '2022-04-20 06:46:46', '2022-04-21 14:39:41'),
(117, 'App\\User', 10, 'android', '31d8803696dcefea64155d5e40ec1c80234a8192133ece7f81556b84c4b0abaa', '[\"*\"]', NULL, '2022-04-20 07:54:59', '2022-04-20 07:54:59'),
(118, 'App\\User', 10, 'android', 'fa228b5ad6f57b0f52381b7c188dffdce993e882291f37d60159586bebd0dbde', '[\"*\"]', NULL, '2022-04-20 10:14:06', '2022-04-20 10:14:06'),
(119, 'App\\User', 10, 'android', '5baa501b8394577fb865386364e1d3d5a2eadc46366373e099a72f5dd0bb0a9b', '[\"*\"]', NULL, '2022-04-20 12:55:37', '2022-04-20 12:55:37'),
(120, 'App\\User', 10, 'android', '4a0814b7e1fedf4c75a4638201becfebde2bc03d1839f4eb450c067d8c8dd64a', '[\"*\"]', '2022-04-21 18:00:05', '2022-04-20 15:32:40', '2022-04-21 18:00:05'),
(122, 'App\\User', 10, 'android', '940d1598dff0d67d22e1577dd278b5730279c83cdb31de427d4582ca691942a9', '[\"*\"]', '2022-04-22 15:12:29', '2022-04-21 01:39:49', '2022-04-22 15:12:29'),
(123, 'App\\User', 10, 'android', '787ec3bb5c4f36fab5f38c62bb25d363c85c4dd11d3c02ad3dec945c55bc5f90', '[\"*\"]', NULL, '2022-04-21 03:22:10', '2022-04-21 03:22:10'),
(125, 'App\\User', 10, 'android', 'f65514c8e8fe00c0ab849956df2d4a20632399a9c46850ad5fcc89e198ee4fab', '[\"*\"]', NULL, '2022-04-21 03:57:19', '2022-04-21 03:57:19'),
(127, 'App\\User', 10, 'android', '6acadee27600a3a621fed432dfa6f5277ace70d30efc3d44c9cc59467569367f', '[\"*\"]', NULL, '2022-04-21 05:30:27', '2022-04-21 05:30:27'),
(129, 'App\\User', 2, 'vivo', '3038c1c637464ad9e7456212d1637a6df243b42ab202e9a0b9fab909118e8e9c', '[\"*\"]', '2022-04-21 05:51:36', '2022-04-21 05:50:50', '2022-04-21 05:51:36'),
(130, 'App\\User', 2, 'vivo', '2032b5ea542f916a62bf622d2d8818fb9cfc907a4c3143f5f1b531dde54d3435', '[\"*\"]', '2022-04-22 01:12:40', '2022-04-21 08:57:02', '2022-04-22 01:12:40'),
(132, 'App\\User', 28, 'android', '7ae5eb3b2f62846048765fd7097298b9efe93f2cdb28a90fded8b2bd05dd9362', '[\"*\"]', '2022-04-22 07:56:55', '2022-04-21 09:09:13', '2022-04-22 07:56:55'),
(134, 'App\\User', 10, 'android', '0b2c065949d5289b16045c071ebbd83838032c9023dd9e94ccb8431490b0c81a', '[\"*\"]', '2022-04-22 01:40:08', '2022-04-22 01:40:08', '2022-04-22 01:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `la_receipts`
--

CREATE TABLE `la_receipts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bookings_id` bigint(20) UNSIGNED DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cars_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rendes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `la_region`
--

CREATE TABLE `la_region` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tỉnh/Thành phố' ROW_FORMAT=COMPACT;

--
-- Dumping data for table `la_region`
--

INSERT INTO `la_region` (`id`, `title`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hồ Chí Minh', 'https://yotrip.vn/public/backend/uploads/images/DSC08484e_compressed-1024x629.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(2, 'Hà Nội', 'https://yotrip.vn/public/backend/uploads/images/vov03drid-115021101_900x0.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(3, 'Đà Nẵng', 'https://yotrip.vn/public/backend/uploads/images/danang.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(4, 'An Giang', 'https://yotrip.vn/public/backend/uploads/images/l1-1.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(5, 'Bà Rịa - Vũng Tàu', 'https://yotrip.vn/public/backend/uploads/images/z2781481815673bcaa949d3dc23aa2ccc49e55980e4e93-1632229779349784256288-1024x576.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(6, 'Bắc Giang', 'https://yotrip.vn/public/backend/uploads/images/baobacgiang-vaithieu.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(7, 'Bắc Kạn', 'https://yotrip.vn/public/backend/uploads/images/BK.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(8, 'Bạc Liêu', 'https://yotrip.vn/public/backend/uploads/images/foody-mobile-t1-jpg-855-636044613494622295.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(9, 'Bắc Ninh', 'https://yotrip.vn/public/backend/uploads/images/hanhchinh.jpeg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(10, 'Bến Tre', 'https://yotrip.vn/public/backend/uploads/images/ben-tre-xua-nay.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(11, 'Bình Dương', 'https://yotrip.vn/public/backend/uploads/images/afef531c9d8e6fd0369f-1619151928-1432.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(12, 'Bình Phước', 'https://yotrip.vn/public/backend/uploads/images/22_9_3.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(13, 'Bình Thuận', 'https://yotrip.vn/public/backend/uploads/images/khach-san-tai-phan-thiet.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(14, 'Bình Định', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(15, 'Cà Mau', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(16, 'Cần Thơ', 'https://yotrip.vn/public/backend/uploads/images/anh-thanh-pho-2-16355899477761013957557.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(17, 'Lâm Đồng', 'https://yotrip.vn/public/backend/uploads/images/download.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(18, 'Gia Lai', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(19, 'Hà Giang', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(20, 'Hà Nam', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(21, 'Hà Tĩnh', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(22, 'Hải Dương', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(23, 'Hải Phòng', 'https://yotrip.vn/public/backend/uploads/images/thanh-pho-hai-phong-thuoc-tinh-nao.jpg', 'active', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(24, 'Hậu Giang', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(25, 'Hoà Bình', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(26, 'Hưng Yên', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(27, 'Khánh Hòa', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(28, 'Kiên Giang', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(29, 'Kon Tum', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(30, 'Lai Châu', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(31, 'Lâm Đồng', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(32, 'Lạng Sơn', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(33, 'Lào Cai', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(34, 'Long An', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(35, 'Nam Định', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(36, 'Nghệ An', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(37, 'Ninh Bình', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(38, 'Ninh Thuận', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(39, 'Phú Thọ', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(40, 'Phú Yên', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(41, 'Quảng Bình', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(42, 'Quảng Nam', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(43, 'Quảng Ngãi', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(44, 'Quảng Ninh', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(45, 'Quảng Trị', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(46, 'Sóc Trăng', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(47, 'Sơn La', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(48, 'Tây Ninh', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(49, 'Thái Bình', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(50, 'Thái Nguyên', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(51, 'Thanh Hóa', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(52, 'Thừa Thiên Huế', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(53, 'Tiền Giang', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(54, 'Trà Vinh', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(55, 'Tuyên Quang', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(56, 'Vĩnh Long', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(57, 'Vĩnh Phúc', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(58, 'Yên Bái', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(59, 'Đắk Lắk', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(60, 'Đắk Nông', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(61, 'Điện Biên', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(62, 'Đồng Nai', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(63, 'Đồng Tháp', NULL, 'inactive', '2022-04-06 15:07:33', '2022-04-06 15:07:33'),
(64, 'Đà Lạt', 'https://yotrip.vn/public/backend/uploads/images/2-4.jpg', 'active', '2022-04-06 16:52:12', '2022-04-06 16:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `la_renders`
--

CREATE TABLE `la_renders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `manu_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_renders`
--

INSERT INTO `la_renders` (`id`, `manu_name`, `description`, `photo`, `feature`, `created_at`, `updated_at`) VALUES
(1, 'Cheverolet', '<p>Chevrolet l&agrave; thương hiệu &ocirc; t&ocirc; nổi tiếng bậc nhất của Mỹ thuộc tập đo&agrave;n General Motor. Ra đời v&agrave;o năm 1911, Chevrolet l&agrave; h&atilde;ng xe l&acirc;u đời nhất tr&ecirc;n thế giới v&agrave; nhanh ch&oacute;ng chiếm lĩnh thị trường, ngay cả thị trường kh&oacute; t&iacute;nh như ch&acirc;u &Acirc;u.</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/Cheverolet.jpg', 1, '2021-09-10 17:31:28', '2022-02-28 06:36:37'),
(2, 'Toyota', '<p><strong>Logo Toyota</strong>&nbsp;sử dụng biểu tượng c&aacute;c h&igrave;nh bầu dục chồng ch&eacute;o l&ecirc;n nhau, nh&igrave;n c&oacute; vẻ đơn giản nhưng mang những &yacute; nghĩa s&acirc;u sắc. Ba h&igrave;nh elip trong&nbsp;<strong>logo h&atilde;ng xe Toyota</strong>&nbsp;đại diện cho sự quan t&acirc;m đối với kh&aacute;ch h&agrave;ng; chất lượng sản phẩm v&agrave; những nỗ lực ph&aacute;t triển kh&ocirc;ng ngừng trong kỹ thuật. Ba h&igrave;nh elip kết hợp với nhau như một cam kết của thương hiệu về chất lượng sản phẩm, độ tin cậy v&agrave; sự h&agrave;i l&ograve;ng.</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/toyota-logo.jpg', 1, '2021-09-10 17:36:27', '2022-04-18 07:24:57'),
(3, 'HonDa', '<p>Cho đến khi người s&aacute;ng lập h&atilde;ng Honda - &Ocirc;ng Soichiro Honda qua đời th&igrave; &yacute; nghĩa của thiết kế logo Honda vẫn chưa được l&agrave;m r&otilde;. Thiết kế logo Honda gồm c&oacute; chữ c&aacute;i H v&agrave; một c&aacute;nh chim nhưng c&aacute;nh của loại chim g&igrave; v&agrave; c&oacute; phải chữ H đ&oacute; l&agrave; chữ c&aacute;i đầu ti&ecirc;n của t&ecirc;n Honda? Điều n&agrave;y chưa thấy c&ocirc;ng bố tr&ecirc;n th&ocirc;ng tin đại ch&uacute;ng n&ecirc;n n&oacute; vẫn l&agrave; một ẩn số.</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/logo-honda.jpeg', 1, '2021-09-10 17:36:46', '2022-02-28 06:35:55'),
(4, 'Subaru', '<p>Subaru l&agrave; h&atilde;ng xe hơi đến từ Nhật Bản, thuộc Tập đo&agrave;n c&ocirc;ng nghiệp nặng Fuji (FHI) - 1 trong 20 tập đo&agrave;n sản xuất c&ocirc;ng nghiệp nặng lớn nhất thế giới. Hiện trụ sở ch&iacute;nh của Subaru được đặt tại&nbsp;Ebisu, Tokyo, Nhật Bản.</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/Subaru.png', 1, '2021-09-10 17:37:13', '2022-02-28 06:35:10'),
(6, 'Hyundai', '<p>Đến từ H&agrave;n Quốc, h&atilde;ng xe Hyundai thuộc tập đo&agrave;n Hyundai đ&atilde; chiếm được thị phần lớn trong thị trường &ocirc; t&ocirc; Việt. Với gi&aacute; cả phải chăng, chất lượng đảm bảo, rất nhiều người d&ugrave;ng đ&atilde; chọn Hyundai l&agrave; nơi để gửi gắm niềm tin.</p>\r\n<p>H&atilde;ng xe n&agrave;y được th&agrave;nh lập ch&iacute;nh thức tại Việt Nam th&aacute;ng 6/2019. Một trong những nh&agrave; m&aacute;y sản xuất &ocirc; t&ocirc; lớn nhất Đ&ocirc;ng Nam &Aacute; l&agrave; cơ sở Hyundai tại Ninh B&igrave;nh nước ta. C&aacute;c d&ograve;ng xe nổi bật phải kể đến của Hyundai hiện nay l&agrave;: Tucson, Santa Fe, County, i10, Elantra, Kona, Accent, Solati, Universe.</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/Hyundai.jpg', 1, '2021-09-12 13:45:03', '2022-02-28 06:32:46'),
(7, 'Vinfast', '<p><strong>Vinfast</strong>&nbsp;đại diện duy nhất cho thương hiệu xe hơi Việt Nam, sở hữu xe&nbsp;<strong>Vinfast</strong>&nbsp;c&ograve;n l&agrave; đại diện cho tự h&agrave;o thương hiệu Việt. Thời điểm đầu ra mắt,&nbsp;<strong>Vinfast</strong>&nbsp;giới thiệu tới người ti&ecirc;u d&ugrave;ng Việt 3 mẫu xe&nbsp;<strong>Fadil</strong>&nbsp;cỡ nhỏ,&nbsp;<strong>Lux A2.0</strong>&nbsp;d&ograve;ng sedan D &amp;&nbsp;<strong>Lux SA2.0</strong>&nbsp;d&ograve;ng SUV cao cấp đều được sử dụng tr&ecirc;n c&aacute;c nền tảng khung gầm c&aacute;c mẫu xe nổi tiếng của BMV &amp; Chevrolet.</p>\r\n<p>Việc&nbsp;<strong>mua xe Vinfast</strong>&nbsp;cũng trở n&ecirc;n dễ d&agrave;ng hơn khi người mua c&oacute; rất nhiều lựa chọn ưu đ&atilde;i với c&aacute;c phương &aacute;n về t&agrave;i ch&iacute;nh của Vin, c&aacute;c ng&acirc;n h&agrave;ng li&ecirc;n kết tr&ecirc;n khắp cả nước với l&atilde;i suất vay ưu đ&atilde;i c&ugrave;ng c&aacute;c thủ tục&nbsp;<strong>mua xe Vinfast trả g&oacute;p</strong>&nbsp;nhanh gọn.</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/logo-vinfast.jpg', 1, '2021-09-12 15:59:10', '2022-04-18 07:25:15'),
(8, 'Ford', '<p>Ford</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/download (1).png', 1, '2022-04-10 18:20:50', '2022-04-18 07:25:36'),
(9, 'Suzuki', '<div class=\"pdt-app-info pdt-app-hide\">Xe Tải Điện Ltd. Biểu Tượng H&igrave;nh Ảnh Thương Hiệu - is about Văn Bản, Logo, D&ograve;ng, Thương Hiệu, Khu Vực, Xe Tải điện Ltd, Isuzu, Ng&agrave;nh C&ocirc;ng Nghiệp &ocirc; T&ocirc;, SƠ định Dạng Tập Tin, Biểu Tượng Ban, Nền M&aacute;y T&iacute;nh, động Cơ Logo, động Cơ, Eps. Xe Tải Điện Ltd. Biểu Tượng H&igrave;nh Ảnh Thương Hiệu - supports png. Bạn c&oacute; thể tải xuống 800*800 Xe Tải Điện Ltd. Biểu Tượng H&igrave;nh Ảnh Thương Hiệu - PNG, Giới thiệu .</div>', 'https://yotrip.vn/public/backend/uploads/images/renders/images (1).png', 1, '2022-04-11 07:27:48', '2022-04-18 07:22:23'),
(10, 'Kia', '<p>Kia</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/logo-kia.jpg', 1, '2022-04-11 07:31:39', '2022-04-18 07:25:56'),
(11, 'Mazda', '<p>D</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/Mazda_logo.png', 1, '2022-04-11 07:53:23', '2022-04-11 14:33:02'),
(12, 'Mitsubishi', '<p>Mitsubishi</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/mitsubishi-logo-3B3AC3E701-seeklogo.com.png', 1, '2022-04-11 07:59:07', '2022-04-18 07:24:37'),
(13, 'Morris Garages', '<p>d</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/imgbin-car-morris-minor-morris-motors-logo-car-6AyVfdn5YMUk7rZif5t5s2C1u.jpg', 1, '2022-04-11 08:03:22', '2022-04-18 07:20:54'),
(14, 'Isuzu', '<p>Isuzu</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/images.png', 1, '2022-04-18 07:22:58', '2022-04-18 07:22:58'),
(15, 'Nissan', '<p>Nissan</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/mitsubishi-logo-png-nissan-vector-logo-nissan-logo-1156320924075o7qnrznh.png', 1, '2022-04-18 07:24:12', '2022-04-18 07:24:12'),
(16, 'BMW', '<p>BMW</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/download.png', 1, '2022-04-18 07:27:03', '2022-04-18 07:27:03'),
(17, 'Daewoo', '<p>Daewoo</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/385-3853692_daewoo-daewoo-logo-png-transparent-png.png', 1, '2022-04-18 07:27:54', '2022-04-18 07:27:54'),
(18, 'Mercedes', '<p>Mercedes</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/mercedes-benz-logo-png-mercedes-star-logo-11563004766hvi710nvdt.png', 1, '2022-04-18 07:28:38', '2022-04-18 07:28:38'),
(19, 'Peugeot', '<p>Peugeot</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/download.jpg', 1, '2022-04-18 07:29:20', '2022-04-18 07:29:20'),
(20, 'Volkswagen', '<p>Volkswagen</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/144-1448747_volkswagen-scandal-png-logo-volkswagen-logo-upside-down.png', 1, '2022-04-18 07:30:20', '2022-04-18 07:30:42'),
(21, 'Zotye', '<p>Zotye</p>', 'https://yotrip.vn/public/backend/uploads/images/renders/zotye.png', 1, '2022-04-18 07:31:38', '2022-04-18 07:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `la_reviews`
--

CREATE TABLE `la_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `cars_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT '0',
  `review` text COLLATE utf8mb4_unicode_ci,
  `reply` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_reviews`
--

INSERT INTO `la_reviews` (`id`, `users_id`, `cars_id`, `rate`, `review`, `reply`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 188, 5, 'Xe tốt sẽ ủng hộ nhiều', 'Cảm ơn bạn , đã ủng hộ chúng tôis', 'active', '2021-09-11 18:44:10', '2022-04-06 14:51:43'),
(2, 4, 22, 4, 'Cũng ok', 'Cảm ơn bạn', 'active', '2021-09-12 15:28:03', '2021-09-19 16:17:54'),
(3, 5, 122, 5, 'Tốt', 'Xin chân thành cảm ơn!', 'active', '2021-09-12 15:28:17', '2022-01-06 13:19:41'),
(5, 7, 188, 3, NULL, NULL, 'active', '2022-03-10 08:35:44', '2022-03-10 08:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `la_tariffs`
--

CREATE TABLE `la_tariffs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `one_to_three` int(11) NOT NULL,
  `five_online` int(11) NOT NULL,
  `ten_to_fourteen` int(11) NOT NULL,
  `more_fifteen` int(11) NOT NULL,
  `price_month` int(11) NOT NULL,
  `cars_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_tariffs`
--

INSERT INTO `la_tariffs` (`id`, `one_to_three`, `five_online`, `ten_to_fourteen`, `more_fifteen`, `price_month`, `cars_id`, `created_at`, `updated_at`) VALUES
(17, 100000, 300000, 600000, 900000, 1000000, 18, '2022-02-23 02:01:45', '2022-04-11 08:10:47'),
(18, 300000, 450000, 650000, 850000, 900, 19, '2022-02-23 02:12:58', '2022-03-02 08:05:08'),
(19, 200000, 400000, 600000, 800000, 850000, 20, '2022-02-23 02:19:40', '2022-04-11 14:23:29'),
(20, 250000, 400000, 600000, 850000, 900000, 21, '2022-02-23 02:23:59', '2022-03-02 08:05:36'),
(21, 250000, 400000, 600000, 700000, 800000, 22, '2022-02-23 02:32:30', '2022-03-02 08:05:51'),
(22, 100000, 250000, 300000, 500000, 600000, 23, '2022-02-23 02:42:04', '2022-03-02 08:06:03'),
(23, 300000, 400000, 600000, 700000, 800000, 24, '2022-02-23 02:46:18', '2022-03-02 08:06:18'),
(24, 200000, 350000, 500000, 700000, 750000, 25, '2022-02-23 02:53:54', '2022-03-02 08:06:32'),
(25, 200000, 400000, 500000, 700000, 2000000, 26, '2022-02-23 02:54:20', '2022-03-02 08:06:46'),
(26, 250000, 300000, 450000, 600000, 800000, 27, '2022-02-23 02:57:56', '2022-03-02 08:07:01'),
(27, 200000, 360000, 500000, 700000, 1000000, 28, '2022-02-23 03:02:34', '2022-04-11 14:28:08'),
(28, 100000, 200000, 300000, 400000, 600000, 29, '2022-02-23 03:07:12', '2022-04-11 14:22:48'),
(29, 300000, 500000, 700000, 800000, 999000, 30, '2022-02-23 03:11:07', '2022-04-11 14:24:08'),
(30, 250000, 350000, 500000, 700000, 2000000, 31, '2022-02-23 03:21:27', '2022-04-11 07:33:07'),
(31, 200000, 350000, 500000, 850000, 1000000, 32, '2022-02-23 03:24:56', '2022-04-11 14:26:23'),
(32, 250000, 350000, 500000, 700000, 800000, 33, '2022-02-23 03:28:15', '2022-04-10 18:46:15'),
(33, 150000, 300000, 500000, 680000, 1000000, 34, '2022-02-23 03:31:13', '2022-04-11 14:24:42'),
(34, 200000, 400000, 600000, 900000, 1200000, 35, '2022-03-02 01:54:57', '2022-04-11 07:47:31'),
(35, 300000, 500000, 450000, 700000, 800000, 36, '2022-03-02 01:58:32', '2022-03-02 08:07:29'),
(36, 160000, 500000, 300000, 850000, 900000, 37, '2022-03-02 02:03:08', '2022-03-02 08:07:14'),
(37, 200000, 500000, 700000, 1100000, 1300000, 38, '2022-03-02 02:06:51', '2022-04-11 07:49:21'),
(38, 250000, 450000, 650000, 800000, 1000000, 39, '2022-03-02 02:14:30', '2022-04-11 07:38:20'),
(39, 300000, 500000, 700000, 900000, 1000000, 40, '2022-03-02 02:23:07', '2022-04-11 07:56:03'),
(40, 150000, 300000, 500000, 800000, 1200000, 41, '2022-03-02 02:25:47', '2022-04-11 08:10:12'),
(41, 200000, 500000, 700000, 900000, 1000000, 42, '2022-03-02 02:28:26', '2022-04-11 08:06:09'),
(42, 250000, 450000, 650000, 860000, 1000000, 43, '2022-03-02 02:31:37', '2022-04-11 07:07:51'),
(43, 300000, 600000, 800000, 1000000, 1100000, 44, '2022-03-02 02:37:15', '2022-04-11 07:25:09'),
(44, 200000, 400000, 650000, 800000, 950000, 45, '2022-03-02 02:40:23', '2022-04-10 18:23:16'),
(45, 150000, 350000, 550000, 650000, 800000, 46, '2022-03-02 02:44:07', '2022-04-10 18:39:48'),
(46, 200000, 350000, 500000, 700000, 900000, 47, '2022-03-02 02:47:32', '2022-04-11 08:08:05'),
(47, 200000, 400000, 700000, 900000, 1000000, 48, '2022-03-02 02:51:35', '2022-04-10 18:34:16'),
(48, 300000, 500000, 700000, 900000, 1100000, 49, '2022-03-02 02:54:39', '2022-04-11 07:46:37'),
(49, 150000, 550000, 300000, 850000, 1000000, 50, '2022-03-02 02:57:07', '2022-04-11 07:45:31'),
(50, 200000, 400000, 700000, 900000, 1000000, 51, '2022-03-02 02:59:19', '2022-04-11 07:48:29'),
(51, 200000, 400000, 600000, 800000, 1100000, 52, '2022-03-02 03:11:58', '2022-04-11 08:00:55'),
(52, 200000, 400000, 700000, 900000, 1200000, 53, '2022-03-02 03:14:42', '2022-04-11 07:58:02'),
(53, 150000, 400000, 550000, 750000, 900000, 54, '2022-03-02 03:17:35', '2022-04-11 07:39:01'),
(54, 200000, 400000, 600000, 800000, 1000000, 55, '2022-03-02 03:23:17', '2022-04-11 08:01:32'),
(55, 250000, 450000, 750000, 900000, 1100000, 56, '2022-03-02 03:26:12', '2022-04-11 08:00:08'),
(56, 200000, 400000, 600000, 900000, 1200000, 57, '2022-03-02 03:29:16', '2022-04-11 08:02:11'),
(57, 150000, 300000, 500000, 700000, 900000, 58, '2022-03-02 03:32:58', '2022-04-11 07:50:10'),
(58, 150000, 450000, 650000, 800000, 950000, 59, '2022-03-02 03:36:55', '2022-04-11 08:09:33'),
(59, 300000, 600000, 800000, 900000, 1000000, 60, '2022-03-02 03:42:15', '2022-04-11 07:13:38'),
(60, 200000, 450000, 600000, 800000, 1000000, 61, '2022-03-02 03:46:05', '2022-04-11 07:14:22'),
(61, 250000, 450000, 600000, 800000, 1000000, 62, '2022-03-02 03:49:08', '2022-04-11 08:07:27'),
(62, 200000, 350000, 550000, 750000, 900000, 63, '2022-03-02 03:53:12', '2022-04-11 07:39:58'),
(63, 150000, 300000, 650000, 850000, 1000000, 64, '2022-03-02 03:55:27', '2022-04-10 18:28:07'),
(64, 100000, 300000, 600000, 800000, 1000000, 65, '2022-03-02 03:57:44', '2022-04-11 07:51:14'),
(65, 150000, 250000, 550000, 850000, 950000, 66, '2022-03-02 04:02:15', '2022-04-10 18:31:10'),
(66, 220000, 345000, 560000, 780000, 980000, 67, '2022-03-02 04:04:40', '2022-04-11 07:52:01'),
(67, 200, 400, 600, 800, 1100, 68, '2022-03-02 04:09:12', '2022-03-02 04:09:12'),
(68, 200000, 400000, 700000, 900000, 1000000, 69, '2022-03-02 04:12:56', '2022-04-11 07:34:37'),
(69, 250000, 500000, 650000, 800000, 950000, 70, '2022-03-02 04:15:28', '2022-04-10 15:42:48'),
(70, 150000, 300000, 550000, 700000, 900000, 71, '2022-03-02 04:18:51', '2022-04-11 08:08:43'),
(71, 200000, 400000, 600000, 900000, 1000000, 72, '2022-03-02 04:22:42', '2022-04-11 08:04:44'),
(72, 200000, 450000, 650000, 800000, 1150000, 73, '2022-03-02 04:26:08', '2022-04-11 07:56:44'),
(73, 150000, 350000, 450000, 750000, 900000, 74, '2022-03-02 04:29:31', '2022-04-11 08:05:22'),
(74, 150000, 359000, 500000, 700000, 900000, 75, '2022-03-02 04:34:20', '2022-04-10 18:45:27'),
(75, 200000, 400000, 600000, 800000, 1000000, 76, '2022-03-09 02:47:56', '2022-04-11 07:18:40'),
(76, 100000, 300000, 500000, 790000, 1000000, 77, '2022-03-09 02:50:29', '2022-04-11 13:57:02'),
(77, 200000, 400000, 600000, 800000, 1000000, 78, '2022-03-09 02:54:44', '2022-04-11 14:14:46'),
(78, 200000, 450000, 550000, 750000, 900000, 79, '2022-03-09 02:57:10', '2022-04-11 14:43:35'),
(79, 150000, 300000, 550000, 700000, 900000, 80, '2022-03-09 02:59:18', '2022-04-11 14:15:22'),
(80, 150000, 300000, 550000, 700000, 900000, 81, '2022-03-09 03:01:10', '2022-04-11 14:18:49'),
(81, 200000, 400000, 600000, 800000, 1000000, 82, '2022-03-09 03:17:29', '2022-04-11 14:04:22'),
(82, 150000, 300000, 550000, 750000, 900000, 83, '2022-03-09 03:19:40', '2022-04-11 14:03:10'),
(83, 200000, 400000, 600000, 800000, 1000000, 84, '2022-03-09 03:21:47', '2022-04-11 14:02:29'),
(84, 200000, 400000, 600000, 800000, 1100000, 85, '2022-03-09 03:23:54', '2022-04-11 14:19:21'),
(85, 150000, 300000, 450000, 650000, 950000, 86, '2022-03-09 03:25:58', '2022-04-11 14:16:28'),
(86, 250000, 400000, 550000, 750000, 950000, 87, '2022-03-09 03:27:57', '2022-04-11 14:17:26'),
(87, 150000, 350000, 550000, 750000, 1000000, 88, '2022-03-09 03:30:03', '2022-04-11 14:07:40'),
(88, 200000, 400000, 600000, 800000, 1000000, 89, '2022-03-09 03:32:31', '2022-04-11 14:13:37'),
(89, 200000, 450000, 650000, 800000, 1100000, 90, '2022-03-09 03:34:42', '2022-04-10 18:44:15'),
(90, 150000, 350000, 550000, 750000, 900000, 91, '2022-03-09 03:36:47', '2022-04-11 14:08:18'),
(91, 200000, 400000, 700000, 900000, 1150000, 92, '2022-03-09 03:39:09', '2022-04-11 14:13:02'),
(92, 200000, 450000, 650000, 850000, 1200000, 93, '2022-03-09 03:41:33', '2022-04-11 14:18:15'),
(93, 150000, 300000, 600000, 900000, 1100000, 94, '2022-03-09 03:44:23', '2022-04-11 14:14:13'),
(95, 200000, 400000, 600000, 800000, 1000000, 96, '2022-03-09 03:49:34', '2022-04-11 14:21:02'),
(96, 200000, 350000, 550000, 700000, 900000, 97, '2022-03-09 03:51:55', '2022-04-11 14:03:51'),
(97, 200000, 400000, 600000, 800000, 1000000, 98, '2022-03-09 03:54:03', '2022-04-11 14:07:04'),
(98, 200000, 400000, 700000, 900000, 1000000, 99, '2022-03-09 03:57:10', '2022-04-11 13:58:33'),
(99, 300000, 300000, 500000, 750000, 900000, 100, '2022-03-09 04:00:06', '2022-04-11 14:12:25'),
(100, 200000, 400000, 600000, 800000, 1000000, 101, '2022-03-09 04:02:19', '2022-04-11 14:10:21'),
(101, 200000, 400000, 600000, 800000, 1000000, 102, '2022-03-09 04:04:51', '2022-04-11 14:09:25'),
(102, 200000, 400000, 600000, 800000, 1000000, 103, '2022-03-09 04:09:59', '2022-04-11 14:05:39'),
(103, 200000, 400000, 600000, 800000, 1000000, 104, '2022-03-09 04:13:03', '2022-04-11 14:06:20'),
(104, 200000, 400000, 600000, 800000, 1000000, 105, '2022-03-09 04:15:50', '2022-04-11 14:19:51'),
(105, 200000, 400000, 600000, 800000, 1000000, 106, '2022-03-09 04:18:00', '2022-04-11 14:11:03'),
(106, 200000, 400000, 600000, 800000, 1000000, 107, '2022-03-09 04:20:37', '2022-04-11 14:11:46'),
(107, 200000, 400000, 600000, 800000, 1000000, 108, '2022-03-09 04:23:15', '2022-04-11 14:04:55'),
(108, 200000, 400000, 600000, 800000, 1000000, 109, '2022-03-09 04:25:42', '2022-04-11 14:15:53'),
(109, 150000, 300000, 450000, 650000, 850000, 110, '2022-03-09 04:31:18', '2022-04-11 13:01:57'),
(110, 200000, 450000, 600000, 850000, 1000000, 111, '2022-03-09 04:36:00', '2022-04-10 18:09:23'),
(111, 200000, 400000, 600000, 800000, 1000000, 112, '2022-03-09 04:39:06', '2022-04-11 13:33:59'),
(112, 150000, 300000, 600000, 900000, 1000000, 113, '2022-03-09 13:25:34', '2022-04-11 09:54:44'),
(113, 200000, 400000, 600000, 800000, 1000000, 114, '2022-03-11 01:25:46', '2022-04-11 07:40:38'),
(114, 150000, 300000, 550000, 750000, 1000000, 115, '2022-03-11 01:28:34', '2022-04-11 07:19:19'),
(115, 200000, 400000, 600000, 800000, 1000000, 116, '2022-03-11 01:30:41', '2022-04-11 13:02:49'),
(116, 250000, 500000, 750000, 900000, 1200000, 117, '2022-03-11 01:33:10', '2022-04-11 09:37:24'),
(117, 150000, 350000, 650000, 850000, 1200000, 118, '2022-03-11 01:35:09', '2022-04-11 09:31:04'),
(118, 100000, 300000, 600000, 800000, 1000000, 119, '2022-03-11 01:37:23', '2022-04-10 18:06:45'),
(119, 200000, 400000, 600000, 800000, 1000000, 120, '2022-03-11 01:40:17', '2022-04-11 07:17:04'),
(120, 150000, 300000, 500000, 700000, 900000, 121, '2022-03-11 01:43:31', '2022-04-11 13:32:43'),
(121, 200000, 400000, 600000, 800000, 1000000, 122, '2022-03-11 01:45:48', '2022-04-10 15:41:51'),
(122, 200000, 400000, 600000, 800000, 1000000, 123, '2022-03-11 01:48:18', '2022-04-11 13:01:04'),
(123, 200000, 450000, 650000, 850000, 1050000, 124, '2022-03-11 01:50:40', '2022-04-11 07:10:10'),
(124, 150000, 300000, 550000, 650000, 900000, 125, '2022-03-11 01:52:59', '2022-04-11 13:21:00'),
(125, 200000, 400000, 600000, 800000, 1000000, 126, '2022-03-11 01:55:48', '2022-04-11 07:15:09'),
(126, 150000, 300000, 600000, 900000, 1100000, 127, '2022-03-11 01:57:51', '2022-04-11 09:41:51'),
(127, 200000, 400000, 600000, 800000, 1000000, 128, '2022-03-11 01:59:49', '2022-04-11 07:22:37'),
(128, 200000, 450000, 650000, 850000, 1000000, 129, '2022-03-11 02:02:18', '2022-04-11 13:16:56'),
(129, 150000, 300000, 550000, 750000, 950000, 130, '2022-03-11 02:04:46', '2022-04-11 07:21:46'),
(130, 200000, 400000, 600000, 800000, 1000000, 131, '2022-03-11 02:07:52', '2022-04-11 09:32:05'),
(131, 250000, 400000, 600000, 800000, 1000000, 132, '2022-03-11 02:11:17', '2022-04-11 09:33:29'),
(132, 200000, 400000, 600000, 800000, 1000000, 133, '2022-03-11 02:14:44', '2022-04-11 13:35:34'),
(133, 200000, 400000, 600000, 800000, 1000000, 134, '2022-03-11 02:17:30', '2022-04-11 09:40:04'),
(134, 200000, 350000, 550000, 800000, 1000000, 135, '2022-03-11 02:20:08', '2022-04-11 09:28:54'),
(135, 200000, 400000, 600000, 800000, 1000000, 136, '2022-03-11 02:23:07', '2022-04-11 13:48:26'),
(137, 200000, 400000, 600000, 800000, 1000000, 138, '2022-03-11 02:28:21', '2022-04-11 09:30:19'),
(138, 200000, 400000, 600000, 800000, 1000000, 139, '2022-03-11 02:31:07', '2022-04-11 13:45:36'),
(139, 200000, 400000, 600000, 800000, 1000000, 140, '2022-03-11 02:33:45', '2022-04-11 12:57:02'),
(140, 350000, 600000, 800000, 1000000, 1200000, 141, '2022-03-11 02:36:35', '2022-04-11 13:00:23'),
(141, 150000, 300000, 500000, 700000, 1000000, 142, '2022-03-11 02:38:53', '2022-04-11 13:47:14'),
(142, 200000, 400000, 600000, 800000, 1000000, 143, '2022-03-11 02:41:24', '2022-04-10 18:36:39'),
(143, 250000, 450000, 650000, 950000, 1200000, 144, '2022-03-11 02:43:22', '2022-04-11 07:15:58'),
(144, 200000, 400000, 600000, 800000, 1000000, 145, '2022-03-11 02:45:48', '2022-04-11 07:23:17'),
(145, 200000, 400000, 600000, 800000, 100000, 146, '2022-03-11 02:49:29', '2022-04-11 07:17:50'),
(146, 200000, 400000, 600000, 800000, 1000000, 147, '2022-03-11 02:52:00', '2022-04-11 07:41:38'),
(147, 200000, 400000, 600000, 800000, 1000000, 148, '2022-03-11 02:55:21', '2022-04-11 12:56:05'),
(148, 200000, 400000, 600000, 800000, 1000000, 149, '2022-03-11 02:57:38', '2022-04-11 12:58:40'),
(149, 200000, 400000, 600000, 800000, 1000000, 150, '2022-03-11 02:59:45', '2022-04-11 07:20:10'),
(150, 200000, 400000, 600000, 800000, 1000000, 151, '2022-03-11 03:02:08', '2022-04-11 13:42:58'),
(151, 150000, 300, 550000, 750000, 950000, 152, '2022-03-11 03:04:32', '2022-04-11 13:04:21'),
(152, 200000, 400000, 600000, 800000, 1000000, 153, '2022-03-11 03:14:38', '2022-04-11 07:24:17'),
(153, 150000, 300000, 550000, 750000, 1000, 154, '2022-03-11 03:17:53', '2022-04-10 18:08:30'),
(154, 200000, 400000, 600000, 800000, 1000000, 155, '2022-03-11 03:20:01', '2022-04-11 08:52:53'),
(155, 150000, 300000, 550000, 700000, 900000, 156, '2022-03-11 03:33:17', '2022-04-11 08:55:02'),
(156, 200000, 400000, 600000, 800000, 1000000, 157, '2022-03-11 03:35:41', '2022-04-10 18:38:17'),
(157, 150000, 350000, 650000, 850000, 1150000, 158, '2022-03-11 03:38:28', '2022-04-11 08:41:08'),
(158, 250000, 400000, 650000, 850000, 1100000, 159, '2022-03-11 03:41:22', '2022-04-11 08:41:50'),
(159, 200000, 400000, 600000, 900000, 1100000, 160, '2022-03-11 03:43:49', '2022-04-11 09:00:11'),
(160, 200000, 400000, 600000, 800000, 1100000, 161, '2022-03-11 03:46:42', '2022-04-11 07:35:29'),
(161, 200000, 350000, 650000, 850000, 1100000, 162, '2022-03-11 03:49:05', '2022-04-11 07:33:51'),
(162, 200000, 350000, 600000, 800000, 1000000, 163, '2022-03-11 03:52:47', '2022-04-11 08:46:23'),
(163, 150000, 350000, 550000, 750000, 950000, 164, '2022-03-11 03:57:33', '2022-04-11 09:01:18'),
(164, 200000, 400000, 600000, 800000, 1000000, 165, '2022-03-11 03:59:49', '2022-04-11 07:20:58'),
(165, 200000, 400000, 600000, 800000, 1000000, 166, '2022-03-11 04:03:18', '2022-04-11 08:50:15'),
(166, 250000, 350000, 450000, 700000, 900000, 167, '2022-03-11 04:06:25', '2022-04-11 07:26:08'),
(167, 200000, 450000, 650000, 850000, 1100000, 168, '2022-03-11 04:09:11', '2022-04-11 07:08:59'),
(168, 200000, 400000, 600000, 800000, 1000000, 169, '2022-03-11 04:11:40', '2022-04-10 18:48:50'),
(169, 200000, 400000, 600000, 800000, 1000000, 170, '2022-03-11 04:13:55', '2022-04-11 08:48:32'),
(170, 150000, 350000, 600000, 800000, 1000000, 171, '2022-03-11 04:16:09', '2022-04-11 09:02:20'),
(171, 200000, 400000, 600000, 800000, 1000000, 172, '2022-03-11 04:18:52', '2022-04-11 07:05:50'),
(174, 200000, 400000, 600000, 800000, 1000000, 175, '2022-03-11 04:28:00', '2022-04-11 07:06:44'),
(177, 150000, 300000, 550000, 750000, 900000, 178, '2022-03-12 01:25:15', '2022-04-10 18:32:46'),
(178, 250000, 450000, 750000, 900000, 1100000, 179, '2022-03-12 01:27:22', '2022-04-11 08:56:53'),
(179, 200000, 450000, 650000, 800000, 1000000, 180, '2022-03-12 01:29:19', '2022-04-11 08:49:17'),
(180, 200000, 400000, 600000, 800000, 1000000, 181, '2022-03-12 01:31:22', '2022-04-11 07:12:08'),
(181, 200000, 450000, 650000, 800000, 1100000, 182, '2022-03-12 01:33:44', '2022-04-11 08:51:49'),
(182, 200000, 400000, 600000, 800000, 1000000, 183, '2022-03-12 01:36:39', '2022-04-11 08:45:12'),
(183, 200000, 400000, 650000, 950000, 1200000, 184, '2022-03-12 01:39:10', '2022-04-11 07:42:16'),
(184, 250000, 450000, 650000, 850000, 1100000, 185, '2022-03-12 01:41:28', '2022-04-11 08:40:27'),
(185, 200000, 400000, 600000, 800000, 1000000, 186, '2022-03-12 01:43:35', '2022-04-11 08:44:14'),
(186, 200000, 400000, 600000, 800000, 1000000, 187, '2022-03-12 01:54:05', '2022-04-11 08:24:53'),
(187, 200000, 400000, 600000, 800000, 1000000, 188, '2022-03-12 01:57:53', '2022-04-10 15:39:14'),
(188, 150000, 300000, 550000, 750000, 900000, 189, '2022-03-12 02:01:47', '2022-04-11 08:25:46'),
(189, 200000, 400000, 600000, 800000, 1000000, 190, '2022-03-12 02:07:48', '2022-04-11 08:32:49'),
(190, 200000, 400000, 600000, 800000, 1000000, 191, '2022-03-12 02:09:58', '2022-04-11 08:19:53'),
(191, 250000, 450000, 650000, 850000, 1000000, 192, '2022-03-12 02:12:21', '2022-04-11 07:43:08'),
(192, 250000, 450000, 750000, 900000, 1100000, 193, '2022-03-12 02:14:22', '2022-04-11 08:32:01'),
(193, 200000, 450000, 700000, 900000, 1200000, 194, '2022-03-12 02:17:56', '2022-04-11 07:11:07'),
(194, 200000, 400000, 600000, 800000, 1000000, 195, '2022-03-12 02:24:57', '2022-04-11 08:38:28'),
(195, 250000, 450000, 650000, 850000, 1000000, 196, '2022-03-12 02:28:18', '2022-04-11 08:21:18'),
(196, 200000, 400000, 600000, 800000, 1000000, 197, '2022-03-12 02:39:50', '2022-04-11 08:20:34'),
(197, 200000, 450000, 650000, 850000, 1000000, 198, '2022-03-12 02:43:04', '2022-04-11 08:22:59'),
(198, 250000, 500000, 700000, 900000, 1100000, 199, '2022-03-12 02:47:20', '2022-04-11 08:18:11'),
(199, 200000, 400000, 600000, 800000, 1000000, 200, '2022-03-12 02:49:57', '2022-04-10 18:04:39'),
(200, 250000, 450000, 650000, 800000, 950000, 201, '2022-03-12 02:52:30', '2022-04-11 08:22:16'),
(201, 200000, 400000, 600000, 800000, 1000000, 202, '2022-03-12 03:19:54', '2022-04-11 07:13:05'),
(202, 200000, 400000, 600000, 800000, 1000000, 203, '2022-03-12 03:25:02', '2022-04-11 08:29:11'),
(203, 200000, 400000, 600000, 800000, 1000000, 204, '2022-03-12 03:31:44', '2022-04-11 14:42:25'),
(204, 200000, 400000, 600000, 800000, 1000000, 205, '2022-03-12 03:37:38', '2022-04-11 08:39:31'),
(205, 200000, 400000, 600000, 800000, 1000000, 206, '2022-03-12 03:43:55', '2022-04-11 08:18:52'),
(206, 200000, 400000, 600000, 800000, 1000000, 207, '2022-03-12 03:57:49', '2022-04-11 08:17:31'),
(207, 200000, 400000, 600000, 800000, 1000, 208, '2022-03-12 04:06:32', '2022-04-10 18:47:31'),
(208, 200000, 400000, 600000, 800000, 1000000, 209, '2022-03-12 04:15:55', '2022-04-11 08:27:21'),
(209, 100000, 300000, 600000, 800000, 1000000, 210, '2022-03-16 01:19:37', '2022-04-11 08:34:54'),
(210, 150000, 300000, 650000, 900000, 1100000, 211, '2022-03-16 01:22:39', '2022-04-11 08:35:33'),
(211, 200000, 400000, 600000, 800000, 1000000, 212, '2022-03-16 01:25:01', '2022-04-11 08:16:42'),
(212, 200000, 400000, 600000, 800000, 1000000, 213, '2022-03-16 01:28:38', '2022-04-11 08:14:03'),
(213, 150000, 350000, 550000, 850, 1100000, 214, '2022-03-16 01:30:52', '2022-04-11 08:14:54'),
(214, 150000, 300000, 600000, 800000, 1100000, 215, '2022-03-16 01:33:10', '2022-04-11 08:28:34'),
(215, 200000, 400000, 600000, 800000, 1000000, 216, '2022-03-16 01:36:37', '2022-04-11 08:13:02'),
(216, 200000, 400000, 600000, 800000, 1000000, 217, '2022-03-16 01:38:52', '2022-04-11 08:34:08'),
(217, 250000, 500000, 750000, 1000000, 1250000, 218, '2022-03-16 01:41:12', '2022-04-11 08:33:28'),
(218, 200000, 400000, 600000, 800000, 1000000, 219, '2022-03-16 01:44:21', '2022-04-11 08:37:00'),
(219, 200000, 450000, 700000, 900000, 1200000, 220, '2022-03-16 01:46:52', '2022-04-11 08:15:48'),
(220, 200000, 400000, 600000, 800000, 1000000, 221, '2022-03-16 01:49:49', '2022-04-11 08:30:29'),
(221, 200000, 400000, 600000, 800000, 1000000, 222, '2022-03-16 01:52:19', '2022-04-11 08:36:12'),
(222, 200000, 400000, 600000, 800000, 1000000, 223, '2022-03-16 01:54:43', '2022-04-11 08:23:57'),
(223, 200000, 400000, 600000, 800000, 1000000, 224, '2022-03-16 01:57:23', '2022-04-11 08:31:15'),
(224, 200000, 400000, 600000, 800000, 1000000, 225, '2022-03-16 02:00:11', '2022-04-11 08:26:34'),
(225, 200000, 400000, 600000, 800000, 1000000, 226, '2022-03-16 02:06:06', '2022-04-11 09:43:38'),
(226, 150000, 300000, 600000, 800000, 1000000, 227, '2022-03-16 02:09:52', '2022-04-11 13:06:28'),
(227, 200000, 400000, 600000, 800000, 1000000, 228, '2022-03-16 02:15:11', '2022-04-11 07:43:53'),
(228, 200000, 400000, 600000, 800000, 1000000, 229, '2022-03-16 02:18:20', '2022-04-11 09:44:34'),
(229, 200000, 400000, 600000, 800000, 1000000, 230, '2022-03-16 02:21:12', '2022-04-11 09:50:28'),
(230, 200000, 400000, 600000, 800000, 1000000, 231, '2022-03-16 02:25:33', '2022-04-11 13:38:15'),
(231, 150000, 450000, 750000, 900000, 1300000, 232, '2022-03-16 02:28:42', '2022-04-11 13:12:03'),
(232, 200000, 400000, 600000, 800000, 1000000, 233, '2022-03-16 02:32:22', '2022-04-11 13:26:42'),
(233, 200000, 400000, 600000, 800000, 1100000, 234, '2022-03-16 02:36:01', '2022-04-11 13:36:51'),
(234, 150000, 400000, 650000, 850000, 1000000, 235, '2022-03-16 02:39:51', '2022-04-11 07:36:16'),
(235, 200000, 400000, 600000, 800000, 1000000, 236, '2022-03-16 02:44:34', '2022-04-10 18:18:39'),
(236, 200000, 400000, 600000, 800000, 1000000, 237, '2022-03-16 02:48:01', '2022-04-11 13:33:20'),
(237, 200000, 400000, 600000, 850000, 1000000, 238, '2022-03-16 02:51:41', '2022-04-10 15:06:37'),
(238, 150000, 350000, 650000, 950000, 1200000, 239, '2022-03-16 02:55:05', '2022-04-11 13:28:42'),
(239, 200000, 500000, 800000, 1000000, 1200000, 240, '2022-03-16 03:23:05', '2022-04-10 18:40:32'),
(240, 200, 400000, 600000, 800000, 1000000, 241, '2022-03-16 03:29:16', '2022-04-10 18:35:09'),
(241, 200000, 400000, 600000, 800000, 1000000, 242, '2022-03-16 03:33:26', '2022-04-11 09:35:33'),
(242, 250000, 500000, 800000, 1000000, 1200000, 243, '2022-03-16 03:36:56', '2022-04-11 12:57:45'),
(243, 150000, 400000, 600000, 850000, 1100000, 244, '2022-03-16 03:40:56', '2022-04-11 13:07:09'),
(244, 200000, 400000, 600000, 800000, 1000000, 245, '2022-03-16 03:44:50', '2022-04-11 14:40:26'),
(245, 200000, 450000, 650000, 800000, 1100000, 246, '2022-03-16 03:48:49', '2022-04-11 07:36:54'),
(246, 200000, 400000, 600000, 800000, 1000000, 247, '2022-03-16 03:52:01', '2022-04-11 07:37:35'),
(247, 200000, 450000, 650000, 850000, 1150000, 248, '2022-03-16 03:55:27', '2022-04-11 09:27:43'),
(248, 200000, 400000, 600000, 800000, 1000000, 249, '2022-03-16 03:59:16', '2022-04-10 18:17:42'),
(249, 200000, 400000, 600000, 800000, 1000000, 250, '2022-03-16 04:02:14', '2022-04-11 13:34:39'),
(250, 100000, 300000, 600000, 800000, 1000000, 251, '2022-03-16 04:06:44', '2022-04-11 13:19:55'),
(251, 200000, 400000, 600000, 800000, 1000000, 252, '2022-03-16 04:11:13', '2022-04-11 13:10:29'),
(252, 200000, 400000, 600000, 800000, 1000000, 253, '2022-03-16 04:14:59', '2022-04-11 13:40:51'),
(253, 200000, 400000, 650000, 850000, 1000000, 254, '2022-03-16 04:18:40', '2022-04-11 09:47:30'),
(254, 200000, 400000, 600000, 800000, 1000000, 255, '2022-03-16 04:21:40', '2022-04-11 13:05:06'),
(255, 200000, 400000, 600000, 800000, 1000000, 256, '2022-03-16 04:24:33', '2022-04-11 13:17:31'),
(256, 1, 1, 1, 1, 1, 257, '2022-04-13 07:55:14', '2022-04-13 07:55:14'),
(257, 800000, 2000000, 1400000, 2800000, 3700000, 258, '2022-04-13 08:42:13', '2022-04-13 08:42:13'),
(258, 1, 1, 1, 1, 1, 259, '2022-04-18 07:53:06', '2022-04-18 07:53:06'),
(259, 1, 1, 1, 1, 1, 260, '2022-04-18 07:58:21', '2022-04-18 07:58:21'),
(260, 1, 1, 1, 1, 1, 261, '2022-04-18 08:02:29', '2022-04-18 08:02:29'),
(261, 1, 1, 1, 1, 1, 262, '2022-04-18 08:06:12', '2022-04-18 08:06:12'),
(262, 1, 1, 1, 1, 1, 263, '2022-04-18 08:10:35', '2022-04-18 08:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `la_users`
--

CREATE TABLE `la_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `otp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user','mod') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` timestamp NULL DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_users` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` enum('default','google','facebook','apple') COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `received_code` text COLLATE utf8mb4_unicode_ci,
  `referral_code` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `devices` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `firebase_data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_users`
--

INSERT INTO `la_users` (`id`, `otp`, `role`, `name`, `email`, `phone`, `gender`, `birthday`, `photo`, `address`, `country_users`, `social_id`, `social_type`, `received_code`, `referral_code`, `password`, `devices`, `active`, `email_verified_at`, `firebase_data`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'Trần Ngọc Tâm', 'ngoctam2303001@gmail.com', '0939461842', 'Other', '2022-04-08 00:00:00', 'https://yotrip.vn/public/backend/uploads/images/users/rn_image_picker_lib_temp_2458d8d0-5e10-4cd0-b55b-ad58f60646ed.jpg', 'Ryyt', NULL, '103348568961719684362', 'google', 'E6F0B4', NULL, '$2y$10$eIPpivvidsaKtNV1U80tpOZIAoQBNRSR9/rEqf9NPXOfONEDvtRk6', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-07 04:50:18', '2022-04-08 10:29:21'),
(2, '1331', 'mod', 'TestApi', 'tagago4238@nuesond.com', '0939461842', '1', NULL, 'https://yotrip.vn/public/backend/uploads/images/users/logo-vinfast.jpg', 'Tan Diem', NULL, NULL, 'default', 'BE1E0C', NULL, '$2y$10$gEIEFS3FOzfPfGgp6nxk3O/Yo44xKVgtftEI.rHQOexmdymXFY3wK', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-07 11:54:13', '2022-04-08 10:31:26'),
(3, NULL, 'mod', 'NDL-3512', 'nlam03052001@gmail.com', '0344812120', 'Other', '2022-04-16 00:00:00', 'https://yotrip.vn/public/backend/uploads/images/users/rn_image_picker_lib_temp_11b29f0a-0797-4a4a-aee4-d67fafee4c6d.jpg', 'Ffg', NULL, '110915933790415911349', 'google', 'BC25N8', NULL, '$2y$10$vMZI1OVj4QnpMKE0oUJk0emucEZM6LTAuE3lfZZaX5ny7rb8dsdgG', NULL, 0, NULL, NULL, 'E58kllg4pdKpFE4OzAyANLHzqRJuRyvDVp4G7fXRf5vEB0ZdA69t7KtsOGK3', 'active', '2022-04-07 07:43:15', '2022-04-18 09:10:32'),
(4, NULL, 'user', 'Lê Văn Lâm', 'levanlam3447@gmail.com', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GgGr0oRDcKCIr8LwDYziO1HAd6nAK7UUP5kI5c1=s96-c', NULL, NULL, '116320842339135989425', 'google', '8F0EEF', 'BE1E0C', '$2y$10$L13FxN3LfocFGk7RXNqdF.bPLZOXE.Ja9lCPm8wlrx0TElPu9KOiG', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-07 08:14:52', '2022-04-07 08:14:52'),
(5, NULL, 'user', 'Huy Quang', 'hi@quanghuy.info', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GgFRHOz5HwjTEoZFnLXXVdLDLIpBjP5v7fad9aDCnRhGg2elnEu064v5iBs_esh05BRUSCwRU22pzxfqevbYj4Xu_dyTkqp-4_dMRuAc_lWmlBy2Tly6mW8U4DdrIPSdIeaSsaYxDBSebbw5xb3zOYWk6r06rAydUeV9m0BH1LYryM7FOJrSb-F4g4tLFGz9kYXWMd1yAPKvZ0PpE4STak6feut6mCMmJ3y-zM0qcHtvO48mSrFbXZemUSPIs3LPk3v7wCwXFbZhhzpVamfla4WQDt59jOEXiPmwDySqyf7x9HBvYIZ9lCKNtWb1CmKew76kVI447oJLvlArN3V-vf0fyyk1eux5ROHDi5hy495qSHEo2FGI06t5QEAocEM75rw0xLAMSZjlMIZRxPkW7OJqZnLSQCAdBrfY3c2ODTx5ypH9eYHQjYT_x0zt05BufJf1fxFulzSICzKSOtQiOYrz1v2mpnF_RpKnl59lLE08cCwM0VlTnv35aKAL455ImWU6Cx0bisa8w7v-e_uLIZ7oKfzbR7T5FN7AZny0G3D30pZ38hSJyYV_TMvmqkDt4E7IKls6M9t4sBlF_cB_Pi298RzI4loTrhwD-_T1aUOQOvf3o0PfKYFHQkChD9bswMciirje3IGnhJiHrWu0ML5la6fBvu-JZFSbFjM-PsafV_TvxU3_B758lQNu324y3oeB_E4qobLDuXwscBldhE5p1PMVwWF4DXY4pBgxRx3_xZKyHRu0usSZu9wJdo6yH3ZjA=s96-c', NULL, NULL, '107787877728284858194', 'google', '84D7D9', NULL, '$2y$10$mKJ2BzhAAs4UnR54F5g4puGgqcTiC7jMsIPCIEtf4qQWgP1yl40DO', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-07 11:53:08', '2022-04-07 11:53:08'),
(6, NULL, 'mod', 'Quang Huy', 'quanghuy9955@gmail.com', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GjpjycimaIL26bZ6dKV0il9rkte5Kda8ktdh_GHVc0=s96-c', NULL, NULL, '112994219470938890279', 'google', '5A1D23', NULL, '$2y$10$DpZrnpG7x1lTBWzvEujU2ethKzXffNP6n1.oxPwExf/rm2vBbrkDG', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-07 11:54:09', '2022-04-07 11:54:09'),
(7, NULL, 'user', 'trongdu tran', 'trongduytuong@gmail.com', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AATXAJzYuJN1GG6LW6ATnXAIcx4HKKFlemjB0ZG1tFQC=s96-c', NULL, NULL, '112154843139406344549', 'google', '2FBE6F', NULL, '$2y$10$Y1.tPtLPCSn1Rmhir6jJWOXMhMGh1zZ2TPgizux0KOeYIpT2PLmuy', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-07 12:12:28', '2022-04-07 12:12:28'),
(8, '3575', 'user', 'nguyendienlam351', 'nguyendienlam351@gmail.com', '0996578455', 'Other', '2022-04-08 00:00:00', 'https://yotrip.vn/public/backend/uploads/images/users/rn_image_picker_lib_temp_36915664-573f-4b14-a758-4b0a55777f5b.jpg', 'Ggh', NULL, NULL, 'default', '103FEA', NULL, '$2y$10$3FOBH9WF9m0kDTa0TIXGSufn/nEBcpRGMLYG3j7z4p5ewTT7tNZlO', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-08 08:25:06', '2022-04-08 10:29:49'),
(9, NULL, 'admin', 'Lê Mỷ Trinh', '19211tt3854@mail.tdc.edu.vn', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14Gg-i1QTBCSVAc83E2ZIuO4uAK6B2D7huQZg1plG=s96-c', NULL, NULL, '113400331223370384657', 'google', 'FE0EA8', NULL, '$2y$10$sUZfjri52htqxbQV8gTLmuD8EawQUxSMZnzfpQplkT9JuYTt5cSeq', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-08 01:35:02', '2022-04-08 01:35:02'),
(10, NULL, 'user', 'Phi Du Nguyễn', '18211tt3659@mail.tdc.edu.vn', NULL, 'Other', '2022-04-19 00:00:00', 'https://lh3.googleusercontent.com/a-/AOh14GjOc7R4ZqpbArzWgWt16mkBCSY1hL98dVQM1oRL=s96-c', 'Sadwd', NULL, '110959341034586888488', 'google', '452684', NULL, '$2y$10$jWb3A4KQelAGHU7kYO/oluIOoAFeWGbuGMSfwueTPmMZhX/hxe5li', NULL, 0, NULL, NULL, 'ndV9wFTXu4QB2u5Z5sYoXCAw8VNEXrcvoIOyUnhj9yy0U2N43726ywLoFFQr', 'active', '2022-04-08 06:17:23', '2022-04-19 06:21:45'),
(11, NULL, 'user', 'Lynda Hart', 'lyndahart.01615@gmail.com', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AATXAJzHTGN5zvpY3GM1DfuwF_i8t4v4neRQp8nBb1ep=s96-c', NULL, NULL, '109709133881832078880', 'google', 'B0D6EE', NULL, '$2y$10$ZQdtOrLAKWb/xxkk7muoteYry5Bc50IWujAcO3IGWiaSLdioAnxM6', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-08 10:16:29', '2022-04-08 10:16:29'),
(12, '7540', 'user', 'thanhthanglhu', 'thanhthanglhu@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default', 'D5559E', NULL, '$2y$10$ALn/I.GFllN25gfG8GJ32eTmse4LgCS5EjWjgUUHu08AhQs8YelQi', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-09 08:22:26', '2022-04-09 08:22:26'),
(13, NULL, 'user', 'Raymond Lam', 'raymond.lv84@gmail.com', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GjAC2cdSsUn2lbCHP51nIOCnLXHpqiwBuOtusE7bg=s96-c', NULL, NULL, '115800152630047519512', 'google', '0A9667', NULL, '$2y$10$ZZxkaZeYmJCoJLjpdb.nwuU6OXHJhNW3Q/0SwTa4ZFC7fRwaxvEtu', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-13 15:48:16', '2022-04-13 15:48:16'),
(14, '6744', 'user', 'anh', 'anhbilak@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default', NULL, NULL, '$2y$10$aJb/rtXyfsWc8uARStzDKuZ7s4dY4YshCF.JU9N/9Ka48onsS2.6G', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-15 02:00:35', '2022-04-15 02:00:35'),
(19, '5615', 'user', 'virig90030', 'virig90030@hhmel.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default', '0B71DC', NULL, '$2y$10$eWx7BkcOlIJmCRzV7w/9MuiWn1FZImSV/M8LtZO3pMYaI70sz0d0m', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-16 08:36:51', '2022-04-16 08:36:51'),
(20, '5087', 'user', 'ngodinhluan1', 'ngodinhluan1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default', '93665D', NULL, '$2y$10$PFEnVOgBthOGYZv7CQrazerDEBhaNidXqvmIZZwNgTFfUcMgRGTI6', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-16 13:04:17', '2022-04-16 13:04:17'),
(21, NULL, 'user', 'doan tri', 'doanminhtri30ladep@gmail.com', NULL, NULL, NULL, 'https://lh3.googleusercontent.com/a/AATXAJy8gAbNtqcrDAL_iwM2jWv4vYuQgFLsMbVZX3ZS=s96-c', NULL, NULL, '104784154044735602408', 'google', '5AA667', NULL, '$2y$10$OCLfYPL2UnENCCW9ElWQzeTVuuIaZutSB/ohH1INzseUz6L.nO9Qy', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-18 01:22:06', '2022-04-18 01:22:06'),
(22, '1956', 'user', 'hoangquanglhu', 'hoangquanglhu@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default', 'C663A1', NULL, '$2y$10$MfLSGvKSu038/oDfL17DMuuYRixvGHHtnmDu4viiVjMBX68SpxHce', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-19 10:26:12', '2022-04-19 10:26:12'),
(23, NULL, 'user', 'Orange Siro', 'mrsiroa4@gmail.com', NULL, NULL, NULL, 'https://yotrip.vn/public/backend/uploads/images/users/rn_image_picker_lib_temp_2ad74909-44cd-4288-8341-4b3c7d615b02.jpg', NULL, NULL, '104101559989491197454', 'google', '9023BA', NULL, '$2y$10$bSdxp79alrStcdoSNennNu1NK1DnB0pEXfCxtOnp00VCGiqEun7..', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-19 06:16:56', '2022-04-19 06:43:46'),
(24, NULL, 'user', 'NGUYỄN CHÍ TRUNG', 'siroxminka@gmail.com', NULL, NULL, NULL, 'https://graph.facebook.com/1357339681427434/picture', NULL, NULL, '1357339681427434', 'facebook', '430CF0', NULL, '$2y$10$WfjuL07i0eFM492Sw37PC.dBED9ySh4fqsSDWS6VZqzklKhxJssbi', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-19 06:17:37', '2022-04-19 06:17:37'),
(25, '7009', 'user', 'vinh.huathanh01', 'vinh.huathanh01@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default', 'D6AA13', 'TAM02B', '$2y$10$RXJ0d4qGGiseCUHtBGhbu.4vAoCZIk9BMFWd7yeN40iEMFvRz8hf.', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-19 14:23:35', '2022-04-19 14:23:35'),
(26, NULL, 'user', 'Chí Trung Nguyễn', 'chitrungtdck18@gmail.com', NULL, NULL, NULL, 'https://yotrip.vn/public/backend/uploads/images/users/rn_image_picker_lib_temp_79472e63-fbc4-4ee1-b85d-aa5659b8b073.jpg', NULL, NULL, '104625306521399500485', 'google', '301D2C', NULL, '$2y$10$j2oAx/f0xiVXmaOE9hYw8OKyBWo6ILOQkpoE1cgjB18ffbtHjP7HW', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-20 01:25:52', '2022-04-20 01:26:14'),
(27, '9391', 'user', 'TestWeb', 'bedahi9426@bamibi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default', 'TAM02B', NULL, '$2y$10$EXadPx/EDuFDygwd2dSqy.EOG2QtMQrl6dYHUBVl6QAoZYZDO.63K', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-20 03:17:23', '2022-04-20 03:17:23'),
(28, '8225', 'user', 'nguyendienlam.tdc2019', 'nguyendienlam.tdc2019@gmail.com', NULL, 'Other', '2022-04-21 00:00:00', NULL, '23423', NULL, NULL, 'default', '1FC5BD', NULL, '$2y$10$4HW.jNEdrj.249/sDs/CmuMqUgEY7K.9BN0sno8Z45pE.i3goQ1I.', NULL, 0, NULL, NULL, NULL, 'active', '2022-04-21 08:29:55', '2022-04-21 09:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `la_vistors`
--

CREATE TABLE `la_vistors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `date_vistors` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `la_vistors`
--

INSERT INTO `la_vistors` (`id`, `ip_address`, `date_vistors`, `created_at`, `updated_at`) VALUES
(1, '1.52.165.68', '2022-04-10', '2022-04-10 14:24:32', '2022-04-10 14:24:32'),
(2, '40.77.167.34', '2022-04-11', '2022-04-10 23:43:17', '2022-04-10 23:43:17'),
(3, '3.239.206.54', '2022-04-12', '2022-04-12 01:58:05', '2022-04-12 01:58:05'),
(4, '222.253.52.77', '2022-04-12', '2022-04-12 03:14:19', '2022-04-12 03:14:19'),
(5, '27.78.78.105', '2022-04-12', '2022-04-12 04:21:06', '2022-04-12 04:21:06'),
(6, '125.235.233.165', '2022-04-12', '2022-04-12 12:35:48', '2022-04-12 12:35:48'),
(7, '173.252.111.116', '2022-04-13', '2022-04-13 09:51:26', '2022-04-13 09:51:26'),
(8, '42.114.57.153', '2022-04-13', '2022-04-13 09:59:59', '2022-04-13 09:59:59'),
(9, '1.52.168.20', '2022-04-13', '2022-04-13 14:47:02', '2022-04-13 14:47:02'),
(10, '103.199.32.82', '2022-04-13', '2022-04-13 15:47:39', '2022-04-13 15:47:39'),
(11, '42.116.112.165', '2022-04-14', '2022-04-13 17:14:45', '2022-04-13 17:14:45'),
(12, '185.59.221.226', '2022-04-14', '2022-04-14 02:00:47', '2022-04-14 02:00:47'),
(13, '51.81.167.146', '2022-04-14', '2022-04-14 02:01:36', '2022-04-14 02:01:36'),
(14, '133.242.140.127', '2022-04-14', '2022-04-14 03:59:49', '2022-04-14 03:59:49'),
(15, '133.242.174.119', '2022-04-14', '2022-04-14 03:59:51', '2022-04-14 03:59:51'),
(16, '89.208.29.241', '2022-04-14', '2022-04-14 07:06:53', '2022-04-14 07:06:53'),
(17, '205.169.39.19', '2022-04-14', '2022-04-14 10:01:07', '2022-04-14 10:01:07'),
(18, '1.52.165.225', '2022-04-14', '2022-04-14 14:39:39', '2022-04-14 14:39:39'),
(19, '176.53.221.191', '2022-04-15', '2022-04-14 20:58:21', '2022-04-14 20:58:21'),
(20, '42.116.68.225', '2022-04-15', '2022-04-14 22:10:17', '2022-04-14 22:10:17'),
(21, '176.74.192.85', '2022-04-15', '2022-04-15 06:16:27', '2022-04-15 06:16:27'),
(22, '42.116.181.100', '2022-04-15', '2022-04-15 11:44:33', '2022-04-15 11:44:33'),
(23, '113.185.72.19', '2022-04-15', '2022-04-15 12:05:55', '2022-04-15 12:05:55'),
(24, '212.115.42.249', '2022-04-15', '2022-04-15 16:46:34', '2022-04-15 16:46:34'),
(25, '212.115.42.247', '2022-04-15', '2022-04-15 16:46:37', '2022-04-15 16:46:37'),
(26, '51.255.62.5', '2022-04-16', '2022-04-16 00:31:22', '2022-04-16 00:31:22'),
(27, '188.165.87.100', '2022-04-16', '2022-04-16 01:35:08', '2022-04-16 01:35:08'),
(28, '51.254.49.106', '2022-04-16', '2022-04-16 01:57:06', '2022-04-16 01:57:06'),
(29, '14.187.111.38', '2022-04-16', '2022-04-16 01:57:36', '2022-04-16 01:57:36'),
(30, '1.52.165.199', '2022-04-16', '2022-04-16 06:11:17', '2022-04-16 06:11:17'),
(31, '45.129.18.251', '2022-04-16', '2022-04-16 07:54:04', '2022-04-16 07:54:04'),
(32, '77.88.9.139', '2022-04-16', '2022-04-16 09:43:36', '2022-04-16 09:43:36'),
(33, '89.104.101.21', '2022-04-16', '2022-04-16 09:54:39', '2022-04-16 09:54:39'),
(34, '207.46.13.128', '2022-04-16', '2022-04-16 10:57:05', '2022-04-16 10:57:05'),
(35, '123.21.201.210', '2022-04-16', '2022-04-16 12:32:54', '2022-04-16 12:32:54'),
(36, '173.252.111.22', '2022-04-16', '2022-04-16 16:29:31', '2022-04-16 16:29:31'),
(37, '173.252.111.8', '2022-04-16', '2022-04-16 16:29:32', '2022-04-16 16:29:32'),
(38, '77.88.9.140', '2022-04-17', '2022-04-16 22:49:21', '2022-04-16 22:49:21'),
(39, '77.88.9.133', '2022-04-17', '2022-04-16 22:51:22', '2022-04-16 22:51:22'),
(40, '54.147.108.125', '2022-04-17', '2022-04-17 08:43:39', '2022-04-17 08:43:39'),
(41, '1.52.131.207', '2022-04-17', '2022-04-17 13:16:30', '2022-04-17 13:16:30'),
(42, '51.255.62.1', '2022-04-18', '2022-04-17 19:03:15', '2022-04-17 19:03:15'),
(43, '51.254.49.100', '2022-04-18', '2022-04-17 21:29:24', '2022-04-17 21:29:24'),
(44, '3.237.253.114', '2022-04-18', '2022-04-18 11:29:21', '2022-04-18 11:29:21'),
(45, '1.55.192.132', '2022-04-18', '2022-04-18 11:35:58', '2022-04-18 11:35:58'),
(46, '118.68.106.171', '2022-04-18', '2022-04-18 14:09:15', '2022-04-18 14:09:15'),
(47, '1.53.144.85', '2022-04-19', '2022-04-19 03:43:54', '2022-04-19 03:43:54'),
(48, '123.20.134.248', '2022-04-19', '2022-04-19 09:02:48', '2022-04-19 09:02:48'),
(49, '205.210.31.6', '2022-04-20', '2022-04-19 18:47:55', '2022-04-19 18:47:55'),
(50, '87.250.224.164', '2022-04-20', '2022-04-20 01:25:04', '2022-04-20 01:25:04'),
(51, '157.55.39.65', '2022-04-20', '2022-04-20 03:36:11', '2022-04-20 03:36:11'),
(52, '1.55.198.231', '2022-04-22', '2022-04-22 14:23:57', '2022-04-22 14:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `la_vouchers`
--

CREATE TABLE `la_vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `zipcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_sale` int(11) DEFAULT '0',
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `la_wishlists`
--

CREATE TABLE `la_wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cars_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `la_wishlists`
--

INSERT INTO `la_wishlists` (`id`, `cars_id`, `users_id`, `created_at`, `updated_at`) VALUES
(24, 263, 3, '2022-04-21 03:58:33', '2022-04-21 03:58:33'),
(25, 262, 3, '2022-04-21 03:58:39', '2022-04-21 03:58:39'),
(26, 243, 28, '2022-04-21 05:11:01', '2022-04-21 05:11:01'),
(27, 53, 2, '2022-04-21 05:51:17', '2022-04-21 05:51:17'),
(29, 54, 2, '2022-04-21 05:51:25', '2022-04-21 05:51:25'),
(30, 55, 2, '2022-04-21 05:51:28', '2022-04-21 05:51:28'),
(31, 56, 2, '2022-04-21 05:51:31', '2022-04-21 05:51:31'),
(32, 260, 3, '2022-04-21 06:33:46', '2022-04-21 06:33:46'),
(33, 263, 10, '2022-04-21 09:44:14', '2022-04-21 09:44:14'),
(34, 260, 10, '2022-04-21 09:44:22', '2022-04-21 09:44:22'),
(35, 263, 28, '2022-04-22 01:29:46', '2022-04-22 01:29:46'),
(36, 262, 28, '2022-04-22 01:29:54', '2022-04-22 01:29:54'),
(37, 261, 28, '2022-04-22 01:30:00', '2022-04-22 01:30:00'),
(38, 260, 28, '2022-04-22 01:33:40', '2022-04-22 01:33:40');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_18_153618_create_banners_table', 1),
(5, '2021_08_18_153833_create_contacts_table', 1),
(6, '2021_08_18_153952_create_blogs_table', 1),
(7, '2021_08_18_154127_create_categories_table', 1),
(8, '2021_08_18_154216_create_reders_table', 1),
(9, '2021_08_18_154559_create_locations_table', 1),
(10, '2021_08_18_154722_create_cars_table', 1),
(11, '2021_08_18_160146_create_wishlists_table', 1),
(12, '2021_08_18_160317_create_comments_table', 1),
(13, '2021_08_18_160427_create_reviews_table', 1),
(14, '2021_08_18_160452_create_bookings_table', 1),
(15, '2021_08_18_161014_create_car_sales_table', 1),
(16, '2021_08_18_161623_create_historys_table', 1),
(17, '2021_08_18_161742_create_receipts_table', 1),
(18, '2021_08_23_163759_create_user_activations_table', 1),
(19, '2021_08_23_163912_alter_users_table', 1),
(20, '2021_08_29_130340_create_districts_table', 1),
(21, '2021_09_04_021033_create_referral_programs_table', 1),
(22, '2021_09_04_021113_create_referral_links_table', 1),
(23, '2021_09_04_021133_create_referral_relationships_table', 1),
(24, '2021_09_05_062740_create_costdates_table', 1),
(25, '2021_09_05_071550_create_payments_table', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `la_banners`
--
ALTER TABLE `la_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_blogs`
--
ALTER TABLE `la_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_bookings`
--
ALTER TABLE `la_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`users_id`),
  ADD KEY `bookings_car_id_foreign` (`cars_id`);

--
-- Indexes for table `la_cars`
--
ALTER TABLE `la_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_user_id_foreign` (`users_id`),
  ADD KEY `cars_cat_id_foreign` (`categories_id`),
  ADD KEY `cars_red_id_foreign` (`renders_id`),
  ADD KEY `cars_locat_id_foreign` (`city_id`);

--
-- Indexes for table `la_categories`
--
ALTER TABLE `la_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_city`
--
ALTER TABLE `la_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_comments`
--
ALTER TABLE `la_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`users_id`),
  ADD KEY `comments_car_id_foreign` (`cars_id`);

--
-- Indexes for table `la_config`
--
ALTER TABLE `la_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_contacts`
--
ALTER TABLE `la_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_failed_jobs`
--
ALTER TABLE `la_failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_features`
--
ALTER TABLE `la_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_historys`
--
ALTER TABLE `la_historys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historys_user_id_foreign` (`users_id`),
  ADD KEY `historys_book_id_foreign` (`bookings_id`);

--
-- Indexes for table `la_history_places`
--
ALTER TABLE `la_history_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_otp_email`
--
ALTER TABLE `la_otp_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_password_resets`
--
ALTER TABLE `la_password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `la_payments`
--
ALTER TABLE `la_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_personal_access_tokens`
--
ALTER TABLE `la_personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `la_receipts`
--
ALTER TABLE `la_receipts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipts_book_id_foreign` (`bookings_id`),
  ADD KEY `receipts_user_id_foreign` (`users_id`),
  ADD KEY `receipts_car_id_foreign` (`cars_id`),
  ADD KEY `receipts_red_id_foreign` (`rendes_id`);

--
-- Indexes for table `la_region`
--
ALTER TABLE `la_region`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_renders`
--
ALTER TABLE `la_renders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_reviews`
--
ALTER TABLE `la_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`users_id`),
  ADD KEY `reviews_car_id_foreign` (`cars_id`);

--
-- Indexes for table `la_tariffs`
--
ALTER TABLE `la_tariffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `costdates_car_id_foreign` (`cars_id`);

--
-- Indexes for table `la_users`
--
ALTER TABLE `la_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `la_vistors`
--
ALTER TABLE `la_vistors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_vouchers`
--
ALTER TABLE `la_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_sales_user_id_foreign` (`users_id`);

--
-- Indexes for table `la_wishlists`
--
ALTER TABLE `la_wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_car_id_foreign` (`cars_id`),
  ADD KEY `wishlists_user_id_foreign` (`users_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `la_banners`
--
ALTER TABLE `la_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `la_blogs`
--
ALTER TABLE `la_blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `la_bookings`
--
ALTER TABLE `la_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `la_cars`
--
ALTER TABLE `la_cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `la_categories`
--
ALTER TABLE `la_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `la_city`
--
ALTER TABLE `la_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=731;

--
-- AUTO_INCREMENT for table `la_comments`
--
ALTER TABLE `la_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `la_config`
--
ALTER TABLE `la_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `la_contacts`
--
ALTER TABLE `la_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `la_failed_jobs`
--
ALTER TABLE `la_failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `la_features`
--
ALTER TABLE `la_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `la_historys`
--
ALTER TABLE `la_historys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `la_history_places`
--
ALTER TABLE `la_history_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `la_otp_email`
--
ALTER TABLE `la_otp_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `la_payments`
--
ALTER TABLE `la_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `la_personal_access_tokens`
--
ALTER TABLE `la_personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `la_receipts`
--
ALTER TABLE `la_receipts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `la_region`
--
ALTER TABLE `la_region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `la_renders`
--
ALTER TABLE `la_renders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `la_reviews`
--
ALTER TABLE `la_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `la_tariffs`
--
ALTER TABLE `la_tariffs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `la_users`
--
ALTER TABLE `la_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `la_vistors`
--
ALTER TABLE `la_vistors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `la_vouchers`
--
ALTER TABLE `la_vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `la_wishlists`
--
ALTER TABLE `la_wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `la_receipts`
--
ALTER TABLE `la_receipts`
  ADD CONSTRAINT `receipts_book_id_foreign` FOREIGN KEY (`bookings_id`) REFERENCES `bookings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `receipts_car_id_foreign` FOREIGN KEY (`cars_id`) REFERENCES `cars_coupon` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `receipts_red_id_foreign` FOREIGN KEY (`rendes_id`) REFERENCES `reders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `receipts_user_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
