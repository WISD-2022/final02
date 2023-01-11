-- Adminer 4.8.1 MySQL 5.7.11 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `images_room_id_foreign` (`room_id`),
  CONSTRAINT `images_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `images` (`id`, `image`, `room_id`, `created_at`, `updated_at`) VALUES
(11,	'201_1672487591.jpg',	201,	'2022-12-31 11:53:11',	'2022-12-31 11:53:11'),
(12,	'202_1672487699.jpg',	202,	'2022-12-31 11:55:00',	'2022-12-31 11:55:00'),
(13,	'204_1673454343.jpg',	204,	'2022-12-31 15:56:46',	'2023-01-11 16:25:43'),
(14,	'203_1673454550.jpg',	203,	'2023-01-11 16:28:39',	'2023-01-11 16:29:10');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2014_10_12_200000_add_two_factor_columns_to_users_table',	1),
(4,	'2019_08_19_000000_create_failed_jobs_table',	1),
(5,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(6,	'2022_12_13_100957_create_sessions_table',	1),
(7,	'2022_12_14_015747_create_orders_table',	1),
(8,	'2022_12_14_015807_create_rooms_table',	1),
(9,	'2022_12_16_023904_create_images_table',	1),
(10,	'2022_12_16_024948_create_order_details_table',	1),
(11,	'2022_12_29_125438_add_ismember_column_to_users_table',	2);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` bigint(20) unsigned DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `amount` int(11) unsigned DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE SET NULL,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `room_id`, `start_date`, `end_date`, `user_id`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(20,	101,	'2023-01-14',	'2023-01-16',	1,	5000,	'已付款',	'2023-01-01 18:25:59',	'2023-01-11 16:09:58'),
(21,	102,	'2023-01-02',	'2023-01-02',	1,	5000,	'未處理',	'2023-01-01 19:43:40',	'2023-01-11 15:22:46'),
(22,	101,	'2023-01-31',	'2023-02-02',	3,	5000,	'未處理',	'2023-01-04 01:47:01',	'2023-01-04 01:47:01'),
(23,	101,	'2023-02-02',	'2023-01-19',	3,	5000,	'未處理',	'2023-01-04 02:29:30',	'2023-01-04 02:29:30'),
(24,	101,	'2022-10-10',	'2022-10-20',	3,	5000,	'未處理',	'2023-01-04 02:31:53',	'2023-01-04 02:31:53'),
(29,	202,	'2023-01-25',	'2023-01-26',	25,	4000,	'已結束',	'2023-01-11 14:20:25',	'2023-01-11 15:57:00'),
(30,	201,	'2023-02-02',	'2023-02-03',	25,	4000,	'未處理',	'2023-01-11 15:19:41',	'2023-01-11 15:19:41');

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `room_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_room_id_foreign` (`room_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_details_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `shelf_status` int(11) NOT NULL,
  `introduce` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `people` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rooms_order_id_foreign` (`order_id`),
  CONSTRAINT `rooms_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `rooms` (`id`, `shelf_status`, `introduce`, `people`, `amount`, `order_id`, `created_at`, `updated_at`) VALUES
(101,	1,	'房內設施：藝術家精選書籍 / 無線網路 / 冷暖氣 / 獨立淋浴衛浴 / 沐浴用品 / 毛巾 / 吹風機 住宿均含：北投特色早點 / 台灣在地點心 / 精選茶包 / 台灣茶體驗 為響應環保，房內沒有提供牙刷及牙膏，請您記得要自備唷！',	4,	5000,	NULL,	'2022-12-30 15:23:59',	'2022-12-30 15:23:59'),
(102,	0,	'房內設施：藝術家精選書籍 / 無線網路 / 冷暖氣 / 獨立淋浴衛浴 / 沐浴用品 / 毛巾 / 吹風機\r\n住宿均含：北投特色早點 / 台灣在地點心 / 精選茶包 / 台灣茶體驗\r\n為響應環保，房內沒有提供牙刷及牙膏，請您記得要自備唷！',	2,	5000,	NULL,	'2022-12-31 10:11:13',	'2022-12-31 10:11:13'),
(103,	0,	'房內設施：藝術家精選書籍 / 無線網路 / 冷暖氣 / 獨立淋浴衛浴 / 沐浴用品 / 毛巾 / 吹風機\r\n住宿均含：北投特色早點 / 台灣在地點心 / 精選茶包 / 台灣茶體驗\r\n為響應環保，房內沒有提供牙刷及牙膏，請您記得要自備唷！',	3,	4000,	NULL,	'2022-12-31 10:46:15',	'2022-12-31 10:46:15'),
(104,	0,	'房內設施：藝術家精選書籍 / 無線網路 / 冷暖氣 / 獨立淋浴衛浴 / 沐浴用品 / 毛巾 / 吹風機\r\n住宿均含：北投特色早點 / 台灣在地點心 / 精選茶包 / 台灣茶體驗\r\n為響應環保，房內沒有提供牙刷及牙膏，請您記得要自備唷！',	2,	5000,	NULL,	'2022-12-31 10:45:41',	'2022-12-31 10:45:41'),
(201,	1,	'房內設施：藝術家精選書籍 / 無線網路 / 冷暖氣 / 獨立淋浴衛浴 / 沐浴用品 / 毛巾 / 吹風機\r\n住宿均含：北投特色早點 / 台灣在地點心 / 精選茶包 / 台灣茶體驗\r\n為響應環保，房內沒有提供牙刷及牙膏，請您記得要自備唷！',	4,	4000,	NULL,	'2022-12-31 11:53:11',	'2022-12-31 11:53:11'),
(202,	1,	'房內設施：藝術家精選書籍 / 無線網路 / 冷暖氣 / 獨立淋浴衛浴 / 沐浴用品 / 毛巾 / 吹風機\r\n住宿均含：北投特色早點 / 台灣在地點心 / 精選茶包 / 台灣茶體驗\r\n為響應環保，房內沒有提供牙刷及牙膏，請您記得要自備唷！',	4,	4000,	NULL,	'2022-12-31 11:54:59',	'2022-12-31 11:54:59'),
(203,	1,	'房內設施：藝術家精選書籍 / 無線網路 / 冷暖氣 / 獨立淋浴衛浴 / 沐浴用品 / 毛巾 / 吹風機\r\n住宿均含：北投特色早點 / 台灣在地點心 / 精選茶包 / 台灣茶體驗\r\n為響應環保，房內沒有提供牙刷及牙膏，請您記得要自備唷！',	4,	5000,	NULL,	'2022-12-31 12:04:05',	'2023-01-01 19:55:10'),
(204,	0,	'test 204',	4,	4000,	NULL,	'2022-12-31 15:56:46',	'2023-01-02 05:51:26');

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1ww3utCBAUy6ltfYyg3xTlmR1n3YiDHppLypwuLV',	NULL,	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',	'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2tOTnB2bUE4SU16blA5ZUFhQUpKNWsxdWVvVFRWTUdJU2VRdHYzNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dvdXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',	1673448803),
('eKYBd2bYrxa9WCCxvcW9ZvHbGW5HxJEv9Dxa9DP5',	NULL,	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZnRUQndnTm5zUENOVmJ6S2FqVVZ5N2hBN0l5TFNTd1ZQNWQ0VGVqMiI7czo1OiJhbGVydCI7czoxMDoi6KuL55m75YWlISI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjE6e2k6MDtzOjU6ImFsZXJ0Ijt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvb3JkZXJzIjt9fQ==',	1673448802),
('V4Z161RWwTXuwsdv7RiGNzbtKgsy5WxP4RoNDtS4',	NULL,	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV1dVQ1E3eG9SMGVwQm1SU2g4RkpmaExJdVRWdjVGZGU3Rmd0R0E5QiI7czo1OiJhbGVydCI7czoxMDoi6KuL55m75YWlISI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjE6e2k6MDtzOjU6ImFsZXJ0Ijt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvb3JkZXJzIjt9fQ==',	1673450408),
('winOdDqbWmEZWG1anINuBv5itrh9DU5ADCsyM8SG',	22,	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTHV5SXJFQ2tLNGZJU1B0OXZEQm1RWEtXSTNGaGtDaU1VU0k0aTJmdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yb29tcy8yMDMvZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjIyO30=',	1673455410),
('WKJtrqNV0NIBhPTsh0zCHM2tKwd4SLv7ETuNJ5AY',	1,	'::1',	'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36',	'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTG5sMlBieVViN3V4clVHMXF1YVkyVHZBdUhiVmdyZkc3eHk4NHRQNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9vcmRlcnMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',	1673453058);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity` int(11) NOT NULL DEFAULT '1',
  `account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ismember` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `phone`, `identity`, `account`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `ismember`) VALUES
(1,	'3A932004',	'play465430525@gmail.com',	NULL,	'$2y$10$I4SNLN83Mubk4784yl290e/zWRHXYnudqztWa09NVq.qOQ.ZS9TMW',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	'2022-12-27 18:51:16',	'2022-12-27 18:51:16',	1),
(2,	'45',	'3a932004@ncut.edu.tw',	NULL,	'$2y$10$7aSqOKDajTjXLvJ0vtKx8.smbFDwId1.2ssnmmV1xFhPSu2Sy28yK',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	'2022-12-27 22:15:41',	'2022-12-27 22:15:41',	1),
(3,	'123456',	'123456@gmail.com',	NULL,	'$2y$10$ghwRj7vsAbYDcLc2X2gFfOTtj3n/x02x58q9sE/rAnyBSbnK5vTla',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	'2022-12-28 17:29:02',	'2022-12-28 17:29:02',	1),
(4,	'fqwfqw',	'450@gmail.com',	NULL,	'$2y$10$IYJJWBS/AnsIBsw/9bkRteuA4LfRlcef6gZxX1CKRGlj8uQcW..fG',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	'2022-12-29 13:24:30',	'2022-12-29 13:24:30',	1),
(5,	'wqtqw',	'460@gmail.com',	NULL,	'$2y$10$aGHLJVzc.5OEToH3A9huLOiLiPzBZyzPX.cFYQyvudZQ7oc4v2hfm',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	'2022-12-29 13:41:25',	'2022-12-29 13:41:25',	0),
(6,	'grewhw',	'470@gmail.com',	NULL,	'$2y$10$I6umXJjHhv3/qc2exIzZE.0JcDgYdWWeNpvi6hWL/zh/o0I50JVhW',	NULL,	NULL,	NULL,	NULL,	1,	NULL,	NULL,	NULL,	NULL,	'2022-12-29 14:01:45',	'2022-12-29 14:01:45',	1),
(7,	'gwgew',	'490@gmail.com',	NULL,	'$2y$10$YVBM6PYh8buB01GB13glVOUqC0AobdO9QPSmyQwaB.AymasxIq9oa',	NULL,	NULL,	NULL,	'091235821',	1,	'ewrhg',	NULL,	NULL,	NULL,	'2022-12-29 15:08:40',	'2022-12-29 15:08:40',	1),
(8,	'efw',	'465@gmail.com',	NULL,	'$2y$10$Oot25ESTz1/rk3j1mFx6puB.5K3YE2x57l6bKOPAf4lKd3U6ecGRm',	NULL,	NULL,	NULL,	'0916616651',	1,	'51we',	NULL,	NULL,	NULL,	'2022-12-29 15:11:46',	'2022-12-29 15:11:46',	1),
(9,	'few',	'472@gmail.com',	NULL,	'$2y$10$9ZAfQasH9VOIk2UpK0BgeupNQ9iFXOYiIsqwSxqf8Mg4vgTy2K5Um',	NULL,	NULL,	NULL,	'0912161',	1,	'fw65qf',	NULL,	NULL,	NULL,	'2022-12-29 15:18:24',	'2022-12-29 15:18:24',	1),
(10,	'54646',	'474@gmail.com',	NULL,	'$2y$10$32EE4Mjf5jue6YCccg74F.Mwxlhxm9aNMHUjjNmsh5hiaOFcMOj6.',	NULL,	NULL,	NULL,	'0911616',	1,	'4wf65',	NULL,	NULL,	NULL,	'2022-12-29 15:22:21',	'2022-12-29 15:22:21',	1),
(11,	'weg',	'370@gmail.com',	NULL,	'$2y$10$LguGqNbqhgQPJeXSL9nD/eagTIS4.fgz.GSz/xCFvO7dINAjZS4JS',	NULL,	NULL,	NULL,	'09156165',	1,	'65w',	NULL,	NULL,	NULL,	'2022-12-29 15:31:02',	'2022-12-29 15:31:02',	1),
(22,	'test1',	'100@gmail.com',	NULL,	'$2y$10$8o33Y7apj3dmWMX1cFULi.GHpBeQZWNP4LihmjawE2BycEqWPu9.C',	NULL,	NULL,	NULL,	'123',	1,	'23',	NULL,	NULL,	NULL,	'2022-12-29 16:04:34',	'2022-12-29 16:04:34',	0),
(23,	'4141',	'1234567@gmail.com',	NULL,	'$2y$10$gN.RyjgfF2KlPd.1eu3NSOYwmysH3Aq7pB40syP37zdTXZh4tUax6',	NULL,	NULL,	NULL,	'858',	1,	'58585',	NULL,	NULL,	NULL,	'2023-01-04 02:30:17',	'2023-01-04 02:30:17',	1),
(24,	'4141',	'12345678@gmail.com',	NULL,	'$2y$10$b8bACCX7.qPD8pxwUb9gBul6lhfjdd.A2N5b5rS0j/bVuVZTqhKJW',	NULL,	NULL,	NULL,	'858',	1,	'58585',	NULL,	NULL,	NULL,	'2023-01-04 02:30:57',	'2023-01-04 02:30:57',	0),
(25,	'101',	'101@gmail.com',	NULL,	'$2y$10$O/muJJiUNV2Vr1m0poB0EOxfxkrskLGT9i5KPj2Y6EybQcqY7WoS2',	NULL,	NULL,	NULL,	'0911111111',	1,	'101',	NULL,	NULL,	NULL,	'2023-01-11 11:55:50',	'2023-01-11 11:55:50',	1);

-- 2023-01-11 16:50:02
