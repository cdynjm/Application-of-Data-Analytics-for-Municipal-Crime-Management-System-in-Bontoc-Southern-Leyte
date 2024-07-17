/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `barangay` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brgy` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitude` decimal(11,4) DEFAULT NULL,
  `longitude` decimal(11,4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `reports` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` int NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `subtype` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `location` int NOT NULL,
  `zone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `viewBarangay` int DEFAULT NULL,
  `viewPolice` int DEFAULT NULL,
  `police_read` int DEFAULT NULL,
  `barangay_read` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `sms_token_identity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile_identity` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL,
  `subtype` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ZIP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_id_unique` (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_remember_token_unique` (`remember_token`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `barangay` (`id`, `brgy`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Talisay', '124.9658', '10.3636', '2023-07-30 06:04:31', NULL);
INSERT INTO `barangay` (`id`, `brgy`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(2, 'Anahao', '124.9190', '10.3002', '2023-07-30 06:04:55', NULL);
INSERT INTO `barangay` (`id`, `brgy`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(3, 'Banahao', '124.9010', '10.4207', '2023-07-30 06:06:20', NULL);
INSERT INTO `barangay` (`id`, `brgy`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(4, 'Baugo', '124.9203', '10.3824', '2023-07-30 06:06:20', NULL),
(5, 'Beniton', '124.9190', '10.3670', '2023-07-30 06:06:20', NULL),
(6, 'Buenavista', '124.9259', '10.3339', '2023-07-30 06:11:44', NULL),
(7, 'Bunga', '124.9314', '10.3094', '2023-07-30 06:11:45', NULL),
(8, 'Casao', '124.9631', '10.3688', '2023-07-30 06:11:45', NULL),
(9, 'Catmon', '124.9148', '10.3449', '2023-07-30 06:11:45', NULL),
(10, 'Catoogan', '124.8983', '10.3708', '2023-07-30 06:11:45', NULL),
(11, 'Cawayanan', '124.9443', '10.3439', '2023-07-30 06:11:45', NULL),
(12, 'Dao', '124.9438', '10.3258', '2023-07-30 06:11:45', NULL),
(13, 'Divisoria', '124.9638', '10.3426', '2023-07-30 06:11:45', NULL),
(14, 'Esperanza', '124.9306', '10.3592', '2023-07-30 06:11:45', NULL),
(15, 'Guinsangaan', '124.9548', '10.3554', '2023-07-30 06:11:45', NULL),
(16, 'Hibagwan', '124.9093', '10.3551', '2023-07-30 06:14:51', NULL),
(17, 'Hilaan', '124.8985', '10.4055', '2023-07-30 06:14:51', NULL),
(18, 'Himakilo', '124.9404', '10.3647', '2023-07-30 06:14:51', NULL),
(19, 'Hitawos', '124.8987', '10.4401', '2023-07-30 06:14:51', NULL),
(20, 'Lanao', '124.8928', '10.3906', '2023-07-30 06:14:51', NULL),
(21, 'Lawgawan', '124.9211', '10.4212', '2023-07-30 06:14:51', NULL),
(22, 'Mahayahay', '124.9124', '10.3091', '2023-07-30 06:14:51', NULL),
(23, 'Malbago', '124.9206', '10.3819', '2023-07-30 06:15:09', NULL),
(24, 'Mauylab', '124.9524', '10.3315', '2023-07-30 06:16:13', NULL),
(25, 'Olisihan', '124.9143', '10.4759', '2023-07-30 06:16:13', NULL),
(26, 'Paku', '124.9259', '10.3196', '2023-07-30 06:16:13', NULL),
(27, 'Pamahawan', '124.9093', '10.3216', '2023-07-30 06:18:19', NULL),
(28, 'Pamigsian', '124.9259', '10.4248', '2023-07-30 06:18:19', NULL),
(29, 'Pangi', '124.9556', '10.3806', '2023-07-30 06:18:19', NULL),
(30, 'Poblacion', '124.9706', '10.3541', '2023-07-30 06:18:19', NULL),
(31, 'Pong-on', '124.9093', '10.3933', '2023-07-30 06:18:19', NULL),
(32, 'Sampongon', '124.9369', '10.3326', '2023-07-30 06:18:19', NULL),
(33, 'San Ramon', '124.9631', '10.3568', '2023-07-30 06:18:19', NULL),
(34, 'San Vicente', '124.9482', '10.3339', '2023-07-30 06:20:35', NULL),
(35, 'Santa Cruz', '124.9658', '10.3756', '2023-07-30 06:20:35', NULL),
(36, 'Santo Nino', '124.9644', '10.3483', '2023-07-30 06:20:35', NULL),
(37, 'Taa', '124.9369', '10.3851', '2023-07-30 06:20:35', NULL),
(38, 'Taytagan', '124.9465', '10.3589', '2023-07-30 06:20:35', NULL),
(39, 'Tuburan', '124.9369', '10.3708', '2023-07-30 06:20:35', NULL),
(40, 'Union', '124.9700', '10.3330', '2023-07-30 06:20:35', NULL);



INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2019_08_19_000000_create_failed_jobs_table', 1);



INSERT INTO `reports` (`id`, `name`, `contact_number`, `description`, `type`, `subtype`, `location`, `zone`, `status`, `photo`, `viewBarangay`, `viewPolice`, `police_read`, `barangay_read`, `created_at`, `updated_at`) VALUES
(126, 36, '09192843885', 'Okay', 'Accident', '2', 13, 'Purok 1', 0, 'isaga-20231115-072848.jpg', 0, 0, 0, 0, '2023-11-15 07:28:50', '2024-01-08 18:32:12');
INSERT INTO `reports` (`id`, `name`, `contact_number`, `description`, `type`, `subtype`, `location`, `zone`, `status`, `photo`, `viewBarangay`, `viewPolice`, `police_read`, `barangay_read`, `created_at`, `updated_at`) VALUES
(128, 32, '09342423494', 'xxx', 'Accident', '2', 34, 'Purok 4', 0, 'maputi-20231115-073541.jpg', 0, 0, 0, 1, '2023-11-15 07:35:43', '2023-12-31 09:09:03');
INSERT INTO `reports` (`id`, `name`, `contact_number`, `description`, `type`, `subtype`, `location`, `zone`, `status`, `photo`, `viewBarangay`, `viewPolice`, `police_read`, `barangay_read`, `created_at`, `updated_at`) VALUES
(162, 36, '09192843885', 'Accident', 'Accident', '2', 13, 'Purok 1', 0, 'isaga-20231120-083932.jpg', 0, 0, 0, 0, '2023-11-20 08:39:33', '2024-01-08 18:32:12');
INSERT INTO `reports` (`id`, `name`, `contact_number`, `description`, `type`, `subtype`, `location`, `zone`, `status`, `photo`, `viewBarangay`, `viewPolice`, `police_read`, `barangay_read`, `created_at`, `updated_at`) VALUES
(163, 43, '09126344445', 'dasmag', 'Accident', '2', 10, 'pughjgdc', 0, 'lap-20231130-165122.avif', 1, 0, 0, 1, '2023-11-30 16:51:22', '2023-11-30 16:51:22'),
(164, 43, '09126344445', 'ghj', 'Accident', '2', 19, 'dffx\\', 0, 'lap-20231130-165426.avif', 0, 0, 1, 1, '2023-11-30 16:54:26', '2023-12-20 10:30:21'),
(165, 36, '09192843885', 'linog', 'Accident', '10', 13, 'Purok 1r', 0, 'isaga-20231130-172953.avif', 0, 0, 0, 1, '2023-11-30 17:29:53', '2024-01-08 18:32:12'),
(166, 36, '09192843885', 'Gilugos ko', 'Crime/Scandal', '14', 10, 'purok 1', 0, 'isaga-20231217-151704.jpg', 1, 0, 0, 1, '2023-12-17 15:17:05', '2023-12-17 15:17:05'),
(167, 54, '09234453548', 'Vehicular accident', 'Accident', '2', 13, 'Purok 1', 0, 'james-20231217-182830.jpg', 0, 0, 0, 1, '2023-12-17 18:28:30', '2024-01-08 18:32:12'),
(168, 54, '09234453548', 'Cyber Bullying', 'Crime/Scandal', '8', 13, '1', 0, 'james-20231220-001155.png', 0, 0, 1, 1, '2023-12-20 00:11:55', '2024-01-08 18:32:12'),
(169, 36, '09192843885', 'Naay nadasmagan ug 10 wheelers', 'Accident', '2', 13, 'Purok 1', 0, 'isaga-20231220-173036.jpg', 0, 0, 0, 0, '2023-12-20 17:30:37', '2024-01-08 18:32:12'),
(170, 36, '09192843885', 'Naay na crash', 'Accident', '2', 13, 'Purok 1', 0, 'isaga-20231220-173340.jpg', 0, 0, 0, 1, '2023-12-20 17:33:41', '2024-01-08 18:32:12'),
(172, 62, '09234823432', 'Naay nag away nag gawas ug kutsilyo', 'Crime/Scandal', '7', 13, 'Purok 3', 0, 'chua-20231220-231314.png', 0, 0, 0, 1, '2023-12-20 23:13:15', '2024-01-08 18:32:12'),
(173, 62, '09234823432', 'Nay sunok', 'Accident', '12', 13, 'Purok 1', 0, 'chua-20231220-235129.png', 0, 0, 0, 1, '2023-12-20 23:51:31', '2024-01-08 18:32:12'),
(174, 62, '09234823432', 'Mga hubog nag away and nag videoke alas 10 na sa gabie', 'Crime/Scandal', '7', 13, '1', 0, 'chua-20231220-235630.png', 0, 0, 0, 1, '2023-12-20 23:56:31', '2024-01-08 18:32:12'),
(175, 62, '09234823432', 'naay na trap mga bata sa building', 'Accident', '18', 13, '1', 0, 'chua-20231221-000836.png', 0, 0, 0, 1, '2023-12-21 00:08:38', '2024-01-08 18:32:12'),
(176, 54, '09234453548', 'Akyat bahay nangawat ug gamit', 'Crime/Scandal', '13', 13, '1', 0, 'james-20231221-021738.png', 0, 0, 0, 1, '2023-12-21 02:17:38', '2024-01-08 18:32:12'),
(177, 54, '09234453548', 'Nanglugos', 'Crime/Scandal', '6', 13, '1', 0, 'james-20231221-021920.png', 0, 0, 0, 0, '2023-12-21 02:19:20', '2024-01-08 18:32:12'),
(179, 53, '09692343235', 'Tabang gwapoha naho', 'Crime/Scandal', '7', 13, '1', 0, 'ronaldo-20231221-113148.jpg', 0, 0, 0, 1, '2023-12-21 11:31:49', '2024-01-08 18:32:12'),
(180, 53, '09692343235', 'naay naligsan', 'Accident', '2', 13, 'Purok 1', 0, 'ronaldo-20231221-122245.jpg', 0, 0, 1, 1, '2023-12-21 12:22:47', '2024-01-08 18:32:12'),
(181, 53, '09692343235', 'Nadasmagan', 'Accident', '2', 13, '1', 0, 'ronaldo-20231221-125038.jpg', 0, 0, 0, 1, '2023-12-21 12:50:41', '2024-01-08 18:32:12'),
(184, 48, '09126344445', 'XCaGSH', 'Accident', '2', 12, 'ASDF', 0, 'bol-20240103-180326.PNG', 0, 0, 0, 1, '2024-01-03 18:03:26', '2024-01-03 18:08:15'),
(185, 48, '09126344445', 'pagdali mooo naay sunog', 'Accident', '12', 12, 'rHGDH', 0, 'bol-20240103-180504.PNG', 0, 0, 1, 1, '2024-01-03 18:05:05', '2024-01-03 18:19:55'),
(186, 46, '09126344445', 'gvsuygvs', 'Crime/Scandal', '3', 3, 'sdvcdsfvdsfvdv', 0, 'mori-20240103-181343.jpg', 0, 0, 0, 1, '2024-01-03 18:13:43', '2024-01-03 18:18:43'),
(187, 46, '09126344445', 'gfdgfrbfdbvfdv', 'Accident', '12', 3, 'fdgdgd', 0, 'mori-20240103-181825.png', 0, 0, 1, 1, '2024-01-03 18:18:26', '2024-01-03 18:19:47'),
(188, 54, '09234453548', 'Tabang gwapoha naho', 'Crime/Scandal', '7', 6, '1', 1, 'lebron-20240103-182522.jpg', 1, 0, 0, 1, '2024-01-03 18:25:23', '2024-01-03 18:25:23'),
(189, 54, '09234453548', 'Gi murder akong buhok sa manupihay', 'Crime/Scandal', '15', 2, '1', 1, 'lebron-20240103-182708.jpg', 1, 0, 0, 1, '2024-01-03 18:27:09', '2024-01-03 18:27:09'),
(190, 54, '09234453548', 'Ambot basta report ni', 'Accident', '10', 8, '69', 1, 'lebron-20240103-183021.jpg', 1, 0, 0, 1, '2024-01-03 18:30:22', '2024-01-03 18:30:22'),
(191, 53, '09692343235', 'Accident', 'Accident', '4', 13, 'Purok 1', 0, 'ronaldo-20240105-102443.JPG', 0, 0, 1, 1, '2024-01-05 10:24:46', '2024-01-08 18:32:12'),
(192, 53, '09692343235', 'Accident', 'Accident', '2', 13, '1', 0, 'ronaldo-20240108-163917.jpg', 0, 0, 1, 1, '2024-01-08 16:39:20', '2024-01-08 18:32:12'),
(193, 54, '09234453548', 'Tabang', 'Accident', '10', 13, 'Purok 69 position', 0, 'lebron-20240108-171311.jpg', 0, 0, 0, 1, '2024-01-08 17:13:12', '2024-01-08 18:34:55'),
(194, 54, '09234453548', 'Vahaha', 'Accident', '2', 13, '1', 0, 'lebron-20240108-183145.jpg', 0, 0, 1, 1, '2024-01-08 18:31:45', '2024-01-08 18:34:26');

INSERT INTO `sms_token_identity` (`id`, `url`, `access_token`, `mobile_identity`, `created_at`, `updated_at`) VALUES
(1, 'https://api.pushbullet.com/v2/texts', 'o.hYwyBgrPVP333VQV5oQ0BlEjHknjydbl', 'ujEPwbbP7wysjwPlndma4a', '2023-08-21 06:56:10', NULL);


INSERT INTO `type` (`id`, `type`, `subtype`, `created_at`, `updated_at`) VALUES
(2, 1, 'Vehicular Accident', '2023-09-26 02:43:14', NULL);
INSERT INTO `type` (`id`, `type`, `subtype`, `created_at`, `updated_at`) VALUES
(3, 2, 'Murder', '2023-09-26 02:50:48', NULL);
INSERT INTO `type` (`id`, `type`, `subtype`, `created_at`, `updated_at`) VALUES
(4, 1, 'Work Accident', '2023-09-26 02:52:02', NULL);
INSERT INTO `type` (`id`, `type`, `subtype`, `created_at`, `updated_at`) VALUES
(5, 1, 'Falling Accident', '2023-09-26 02:52:21', NULL),
(6, 2, 'Rape', '2023-09-26 02:52:33', NULL),
(7, 2, 'Violence', '2023-09-26 02:53:23', NULL),
(8, 2, 'Others', '2023-09-26 03:07:19', NULL),
(10, 1, 'Others', '2023-09-26 03:38:28', NULL),
(12, 1, 'Fire Accident', '2023-09-27 04:39:10', NULL),
(13, 2, 'Robbery', '2023-09-27 04:39:45', NULL),
(14, 2, 'Sexual Assault', '2023-09-27 04:40:12', NULL),
(15, 2, 'Human Trafficking', '2023-09-27 04:40:31', NULL),
(16, 2, 'Stealing', '2023-11-30 08:40:55', NULL),
(18, 1, 'Earthquake', '2023-11-30 09:28:04', NULL),
(20, 1, 'Suicide', '2023-12-11 11:00:20', NULL),
(24, 2, 'Cyber Bullying', '2023-12-21 04:10:40', NULL);

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `address`, `number`, `city`, `ZIP`, `email_verified_at`, `remember_token`, `type`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bontoc', 'Admin', NULL, 'bontoc@admin.com', '$2y$10$yPHo1klGN0fKgDiWtV.Gv.GlxzpOLqE56Oy8PicxupqvU5BMB8Hoa', NULL, '09192843885', NULL, NULL, NULL, '9zInzW9hb91PfAJov2htbpPGIEzjuYExga5hpmgIMnDAN77pyHN6ABtfJb31', 1, 'admin-20231115-093956.jpg', 0, NULL, '2024-01-05 11:42:51');
INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `address`, `number`, `city`, `ZIP`, `email_verified_at`, `remember_token`, `type`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(29, 'Joylin', 'Baledo', NULL, 'baledojoylin@gmail.com', '$2y$10$R5fSneea2h29ywkoReB2teZu5B/PTXf4qL0wbGQiU75b99JfxmaKa', '14', '+639469531959', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-11-12 19:42:14', '2023-11-12 19:46:41');
INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `address`, `number`, `city`, `ZIP`, `email_verified_at`, `remember_token`, `type`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(30, 'Bernadette', 'Isaga', NULL, 'isagabernadette9@gmail.com', '$2y$10$C8QxgkeQCc7r1PGcGCKMGOZFfb1BeOuo2rhgkSfwhK4n3ZroysdCy', '35', '09297748622', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-11-12 22:10:06', '2023-11-20 11:08:35');
INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `address`, `number`, `city`, `ZIP`, `email_verified_at`, `remember_token`, `type`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(31, 'Francis', 'Isaga', NULL, 'divisoria@gmail.com', '$2y$10$9Yt/Uhmome2qBNZniFgoe.oTPC.gpSAqTJDUZRyXhH97e.9y30Bee', '13', '09192843885', NULL, NULL, NULL, 'GX59AjCeOt4Fgfc7yw4FLFdbCZWCyHGzeNoPFWALMN8Ahq1fCkqvQTUEDFdB', 2, NULL, 0, '2023-11-14 21:06:06', '2024-01-05 11:44:38'),
(32, 'Fritz', 'Maputi', NULL, 'fritzkennymaputi@gmail.com', '$2y$10$gzGI1Z/jsGKJRzoOeq2s.uctyBUnFBSxwvqiQMSVgD8f1aHz0ofqO', '34', '09342423494', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-11-14 21:34:36', '2023-11-14 21:35:30'),
(35, 'Francis', 'Abonantes', NULL, 'isagabonantes@gmail.com', '$2y$10$ofYtTiZit9PoBNlBiI6z.u9F7Llbr9aohB6Pr4liFnErTKlJHcPvu', '34', '09192843885', NULL, NULL, NULL, NULL, 2, NULL, 0, '2023-11-15 02:30:53', '2023-11-15 02:30:53'),
(36, 'Frances', 'Isaga', NULL, 'dostrina2@gmail.com', '$2y$10$KEKeFUJGVi1FHZhudOZ1kOg1Y0SXBN5EeVOj4GneZgkQcwGlCCB8q', '13', '09192843885', NULL, NULL, NULL, '5KrEQofOqeO83Y3Hzr9tCBDiGPnGfmK8nBHz060H1Ei9zhrmbejuH2LdEWSh', 3, NULL, 0, '2023-11-15 02:36:23', '2023-11-20 09:04:34'),
(38, 'Michaela', 'Tarazona', NULL, 'manager@gmail.com', '$2y$10$L507I12brxanKPJPwD1kEOEPEVQ/7jwz1ZvOHo9VgX3mHDiX1W1OW', '38', '09207244373', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-11-15 07:44:51', '2023-11-15 07:46:28'),
(40, 'Sample', 'Person', NULL, 'taytagan@gmail.com', '$2y$10$otCWIyB2e43oRTobWrDOs.OsCN3b7o0OZNE3dyy/q7CQLJ1CjbuLK', '38', '09061958437', NULL, NULL, NULL, NULL, 2, NULL, 0, '2023-11-17 18:24:37', '2023-11-17 18:24:37'),
(42, 'fel', 'sal', NULL, 'fel@gmail.com', '$2y$10$eINobGQDtD7jUl8q43gWYeG9amq06wbocC.LnjHkk3b/sjCgYXKn6', '19', '09126344445', NULL, NULL, NULL, 'R2WMhyP5vTMLi91vkoLSmMMf5NBLMtt6DeNzzMnArD33MK3w1T0ryh2HgDaR', 2, NULL, 0, '2023-11-30 16:37:30', '2023-11-30 16:37:30'),
(43, 'kar', 'lap', NULL, 'kar@gmail.com', '$2y$10$h5tSZ.uLAQ68F1Ka/A1yw.1GMPqEzRnLL2OnAjVVBHmHGvNwb.10e', '10', '09126344445', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-11-30 16:46:17', '2023-11-30 16:47:17'),
(44, 'Fely', 'Salfamones', NULL, 'felmarie@gmail.com', '$2y$10$eSqlsJoQVQHHjSL/wY2T2.edyS1ilgKeJqAz1vcCGDmUr0RwWKFpa', '2', '09675747644', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-12-05 21:32:30', '2023-12-05 21:35:40'),
(45, 'minda', 'losi', NULL, 'minda@gmail.co', '$2y$10$OgZjRPZjC1DU38VeZd7Q/OLNRm5MwYT1yymaprrgHVzTBF/gXbO3.', '19', '09126344445', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-12-05 21:43:16', '2023-12-05 22:14:03'),
(46, ' jake', 'mori', NULL, 'jake@gmail.com', '$2y$10$tgejHrutCCqeGwyfgMgzs.CT3cZItVEyT7u0ipxWljoWDHyUjqDBO', '3', '09126344445', NULL, NULL, NULL, 'r66XWLZBLdtCfUKqkIbX7QviTRW2DXmFTBKzKJKJ5fBZKTyV854oW0tYc5N6', 3, NULL, 0, '2023-12-06 18:20:20', '2023-12-06 18:26:45'),
(47, 'gelo', 'mm', NULL, 'gelo@gmail.co', '$2y$10$WYqlhFjbpVBT9AI51BaU4ubfAIgLGWWoxRASwHVyX29abGaBSzFby', '6', '09126344445', NULL, NULL, NULL, NULL, 3, NULL, 1, '2023-12-06 18:30:20', '2023-12-06 18:30:20'),
(48, 'bela', 'bol', NULL, 'bel@gmail.com', '$2y$10$ibWfdzIAFzx8tRinGGUZ8uMjMvFDO9s6Q5.PUZwSMvw3axcloUfiW', '12', '09126344445', NULL, NULL, NULL, 'v5AqUQ8FnaJkWiz2dulORWKZkeMy7BtJ2EJ0jw5qjzTAUE87obqPGh4DCi5y', 3, NULL, 0, '2023-12-06 18:32:31', '2023-12-21 06:34:42'),
(49, 'Cawayan', 'cawayan', NULL, 'cawayan@gmail.com', '$2y$10$DPwkZz7kF5OJ9PNkHNEoDOtLsJ/8qIv.w/f2Hb9tHirP87attpdoG', '11', '09126344445', NULL, NULL, NULL, 'v1vsMffIIiQnbC6WLhPwN2CT3bsZV1dpXyrf4QIhXAeg0oV2UeiYRePY5SIR', 2, NULL, 0, '2023-12-06 19:30:52', '2023-12-06 19:30:52'),
(50, 'ge', 'lo', NULL, 'dao@gmail.com', '$2y$10$1B9blyhLSEg.Q6HmaeHdl.OrVdzyZZ1VLEXK7tCH.xtaCH0RIALku', '12', '09126344445', NULL, NULL, NULL, NULL, 2, NULL, 0, '2023-12-06 22:11:03', '2023-12-06 22:11:03'),
(51, 'mik', 'tazar', NULL, 'mik@gmail.com', '$2y$10$yqWVtpc1Hn1dSQHf3IKn5uL/Fc8GzyOaSE5xLixRo4.sJXujzz9We', '2', '09126344445', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-12-16 21:21:12', '2023-12-17 00:05:33'),
(52, 'Hanz Christian ', 'Mata', NULL, 'hanzephyrd7@gmail.co', '$2y$10$mWpk0LdkM4wvzebYYQTkLeIZQ22mxn86U6VvmSp6rcauGIbaWvAEK', '16', '09166226457', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-12-17 00:13:55', '2023-12-21 06:13:27'),
(53, 'Cristiano', 'Ronaldo', NULL, 'leonardo@gmail.com', '$2y$10$bNVuHN01Jk24.Bh34qLSiOz2rTwYGXqHYqUdHz5mtdn0zq2RiTSDa', '13', '09692343235', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-12-17 17:14:36', '2023-12-21 11:30:27'),
(54, 'James', 'Lebron', NULL, 'lbj6@gmail.com', '$2y$10$ISbJuySZxDojCweb0vJGSOQf6tC7.4We0zTyhvVbVi8IyKYJEDpsi', '6', '09234453548', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-12-17 17:28:09', '2023-12-21 11:05:21'),
(56, 'mich', 'tarazona', NULL, 'tarazonamich@gmail.com', '$2y$10$AxHILDxlZfYHl3VrjrQMhuF47i/7RirlDrn4c3uHwfdnBiLkzLVum', '8', '09207244373', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-12-20 10:33:14', '2023-12-20 10:36:05'),
(60, 'michaela', 'jacobe', NULL, 'michaela@gmail.com', '$2y$10$5T5bGu9UWeOuw5qpeJIOtu8SkjzTkqhyv7l5HsOijZUnjVApCtQ/e', '8', '09207244373', NULL, NULL, NULL, NULL, 2, NULL, 0, '2023-12-20 10:41:15', '2023-12-20 10:41:15'),
(61, 'grace', 'jacobe', NULL, 'grace@gma', '$2y$10$jhR.LlKufHdW8mEqDNer/usC1jcrs/jjdA48bZqDy0Ck4cH0wJLxe', '8', '09207244373', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-12-20 10:43:58', '2023-12-20 10:45:02'),
(62, 'Mary', 'Chua', NULL, 'mary@gmail.com', '$2y$10$5gLN8O2qA9IpdaY1BAN0MOe6TLA9xPjRnvpV9.6Ez3OSFjSEGZLLS', '13', '09234823432', NULL, NULL, NULL, NULL, 3, NULL, 0, '2023-12-20 22:54:53', '2023-12-20 23:04:48'),
(63, 'jev', 'jay', NULL, 'jev@gmail.com', '$2y$10$0XHXnIF7Ha02vkVhIqoMIuMLAgVGI6hPE93P0fhpPj836VfJcVyaG', '39', '09126344445', NULL, NULL, NULL, NULL, 3, NULL, 1, '2023-12-21 06:20:57', '2023-12-21 06:20:57'),
(64, 'glenn', 'jay', NULL, 'glenn@gmail.com', '$2y$10$1b3.dVhp/us6PBAtCHn8Qefa61.CXpbb8y.zyr27soJjMUgvO1MBe', '31', '09126344445', NULL, NULL, NULL, NULL, 3, NULL, 1, '2023-12-21 06:22:29', '2023-12-21 06:22:29'),
(65, 'van', 'nesa', NULL, 'van@gmail.com', '$2y$10$p3t27.32J02JwwkXUY4II.M.O5vqbiQW.mWCLsZwc4J1j260xHfXO', '36', '09126344445', NULL, NULL, NULL, NULL, 3, NULL, 1, '2023-12-21 06:25:06', '2023-12-21 06:25:06'),
(66, 'jane', 'p', NULL, 'buenavista@gmail.com', '$2y$10$gGYxI01YJRJXbWLN8QbAjuoPy9yhTRVtFtsnWx6x.Oyyaj6Ymarje', '6', '09126344445', NULL, NULL, NULL, NULL, 2, NULL, 0, '2023-12-21 06:29:09', '2023-12-21 06:38:22'),
(67, 'nina', 'ko', NULL, 'tuburan@gmail.com', '$2y$10$x7wicCgYcNG0YCuVv6PZdeIInMP5/kGDVRDUg.a5o2TKgXMEz0/HK', '39', '09675747644', NULL, NULL, NULL, NULL, 2, NULL, 0, '2023-12-21 06:31:10', '2023-12-21 06:39:32'),
(68, 'joy', 'me', NULL, 'pong-on@gmail.com', '$2y$10$4kcWQavhME/.teto1/Qfx.uTHMNVlNF1ZxzwltyarIUV5JLt/RB/C', '31', '09126344445', NULL, NULL, NULL, NULL, 2, NULL, 0, '2023-12-21 06:32:10', '2023-12-21 06:39:06'),
(69, 'charie', 'ka', NULL, 'santonino@gmail.com', '$2y$10$vVi9zIsNUE2H5JnYtCw6HuU3FaCkqi/umbAB7n/UmpW1WNfAlThMO', '36', '09126344445', NULL, NULL, NULL, NULL, 2, NULL, 0, '2023-12-21 06:33:00', '2023-12-21 06:39:59'),
(70, 'Hanz Christian', 'Mata', NULL, 'hanzephyrd7@gmail.com', '$2y$10$VUzNZtgyO.vJ1qSPRu.swuM.XLR6hglmMtZY5R8yv73KSzCUug92i', '13', '0912344254', NULL, NULL, NULL, NULL, 2, NULL, 0, '2023-12-21 09:24:55', '2023-12-21 09:24:55'),
(71, 'jan', 'francis', NULL, 'janfrancis@gmail.com', '$2y$10$TsRZYegDV3KK33vjCmUiDOJ26/AOOEOM9entYexb1ETP7BEfZNJkO', '13', '0912345669', NULL, NULL, NULL, NULL, 2, NULL, 0, '2023-12-21 12:45:21', '2023-12-21 12:45:21'),
(72, 'jan', 'francis', NULL, 'divisoria1@gmail.com', '$2y$10$pVEnOoqkCJoEEeuKJ7fna.QuUNX50CMQKbzfNZ60SwjoUKj2w1a.a', '13', '09123412341', NULL, NULL, NULL, NULL, 2, NULL, 0, '2023-12-21 12:49:09', '2023-12-21 12:49:09'),
(74, 'miko', 'balgo', NULL, 'banahao@gmail.com', '$2y$10$giHjGcPS.Zyom8/3XaPxMe9PhLnnBupTthlRZGYdS1UKX9X6cvX/y', '3', '09126344445', NULL, NULL, NULL, NULL, 2, NULL, 0, '2024-01-03 18:15:13', '2024-01-03 18:16:50'),
(75, 'de', 'da', NULL, 'da@gmail.com', '$2y$10$9330dacHpZknrFTs5FpyvuBmkyQK1tg05D63ZbFH21eQYVTZQxd7q', '12', '4656', NULL, NULL, NULL, NULL, 3, NULL, 1, '2024-01-08 22:10:16', '2024-01-08 22:10:16');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;