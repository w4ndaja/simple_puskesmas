-- -------------------------------------------------------------
-- TablePlus 3.8.0(336)
--
-- https://tableplus.com/
--
-- Database: puskesmas
-- Generation Time: 2020-10-22 16:09:40.4980
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sick` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `checkin_date` date NOT NULL,
  `checkout_date` date NOT NULL,
  `patient_id` bigint unsigned NOT NULL,
  `doctor_id` bigint unsigned NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `doctors` (`id`, `code`, `name`, `specialist`, `address`, `created_at`, `updated_at`) VALUES
('4', 'Quisquam aliquam exp', 'Moana Mclaughlin', 'Velit omnis aut sed', 'Voluptas et quasi mo', '2020-10-16 10:11:43', '2020-10-16 10:11:51'),
('5', 'Unde molestiae cum d', 'Moses Irwin', 'Proident esse velit', 'Autem aperiam volupt', '2020-10-16 10:11:57', '2020-10-16 10:11:57');

INSERT INTO `employees` (`id`, `code`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
('1', 'admin', 'admin', 'admin', '$2y$10$MnuhCc7o7vagenHvwGzf7.m5.M5nWkixMQ6UwiEzTmA08K8xbXFou', '2020-10-16 10:49:34', '2020-10-16 12:10:26'),
('3', 'Repudiandae consequa', 'Nora Dalton', 'hubas', '$2y$10$C0fWQMlwwkSnYnsLgtTDGuj4HuLfDcKI7vc0giP5lSPgQ4ejzqiIC', '2020-10-16 11:49:50', '2020-10-16 11:49:50');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
('1', '2020_10_16_080351_create_patients_table', '1'),
('2', '2020_10_16_080400_create_doctors_table', '1'),
('3', '2020_10_16_080407_create_services_table', '1'),
('4', '2020_10_16_080423_create_employees_table', '1');

INSERT INTO `patients` (`id`, `code`, `name`, `address`, `gender`, `sick`, `created_at`, `updated_at`) VALUES
('7', 'Architecto facilis e', 'Alana Webb', 'Vel sed et aut volup', 'female', 'Commodi ut est conse', '2020-10-16 09:29:04', '2020-10-16 09:29:04'),
('8', 'Natus quas aliquid e', 'Griffith Fisher', 'Quas blanditiis cumq', 'male', 'Commodi est ullam e', '2020-10-16 09:29:08', '2020-10-16 09:29:08'),
('9', 'Voluptatem Sapiente', 'Althea Randolph', 'Excepturi nobis minu', 'male', 'Qui tempore itaque', '2020-10-16 09:29:11', '2020-10-16 09:29:11'),
('10', 'Amet maiores except', 'Sylvester Rodriguez', 'Odio cillum labore i', 'male', 'Nostrud mollitia ius', '2020-10-16 09:31:04', '2020-10-16 09:31:04'),
('11', 'Ratione sapiente exc', 'Louis Reed', 'Perspiciatis conseq', 'male', 'Aut dolor eius modi', '2020-10-16 09:31:07', '2020-10-16 09:31:07'),
('12', 'Odit perspiciatis q', 'Molly Ortiz', 'Culpa occaecat dolor', 'female', 'Qui veritatis dolore', '2020-10-16 12:17:08', '2020-10-16 12:17:08'),
('13', 'Doloribus consequat', 'Quincy Roberson', 'Quis consectetur as', 'female', 'Repellendus Repelle', '2020-10-16 12:17:12', '2020-10-16 12:17:12'),
('14', 'Dolor non esse illum', 'Hyacinth Burt', 'Quos ut corporis eos', 'male', 'Ut quae velit cumque', '2020-10-16 12:17:16', '2020-10-16 12:17:16'),
('15', 'Sint harum ullamco', 'Raja Bryan', 'Pariatur Id maiores', 'male', 'Voluptas lorem cupid', '2020-10-16 12:17:19', '2020-10-16 12:17:19'),
('16', 'Sed sed quo id labor', 'Kellie Hayes', 'Aute itaque et volup', 'male', 'Libero deserunt enim', '2020-10-16 12:17:22', '2020-10-16 12:17:22'),
('17', 'Non cupiditate quod', 'Sopoline Howell', 'Nihil in et magni fu', 'male', 'Veniam ad voluptate', '2020-10-17 07:05:36', '2020-10-17 07:05:36'),
('18', 'cutsalsa0100', 'Salsa Tri Handayani', 'JL jamin ginting, sdkfkshdfkshdf', 'female', 'Sakit hati', '2020-10-22 07:41:37', '2020-10-22 07:41:37'),
('19', 'Illum voluptate duc', 'Lee Mcguire', 'Maxime quidem expedi', 'male', 'Sint error nisi ea q', '2020-10-22 08:05:37', '2020-10-22 08:05:37');

INSERT INTO `services` (`id`, `checkin_date`, `checkout_date`, `patient_id`, `doctor_id`, `price`, `created_at`, `updated_at`) VALUES
('1', '2002-06-22', '2012-11-23', '7', '4', '640000', '2020-10-16 10:32:08', '2020-10-16 10:32:08'),
('2', '2020-10-22', '2020-10-22', '18', '5', '100000', '2020-10-22 07:41:59', '2020-10-22 07:41:59'),
('3', '2008-06-21', '1987-11-23', '13', '5', '791000', '2020-10-22 08:09:31', '2020-10-22 08:09:31');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;