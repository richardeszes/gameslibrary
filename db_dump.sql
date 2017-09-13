-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.2.7-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Verzió:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for tábla gamesforbusiness.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gamesforbusiness.categories: ~5 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
REPLACE INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'FPS', '2017-08-26 20:34:20', NULL),
	(2, 'TPS', '2017-08-26 20:34:21', NULL),
	(3, 'Strategy', '2017-08-26 20:34:21', NULL),
	(4, 'MMORPG', '2017-08-26 20:34:21', NULL),
	(5, 'RPG', '2017-08-26 20:34:21', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for tábla gamesforbusiness.consoles
DROP TABLE IF EXISTS `consoles`;
CREATE TABLE IF NOT EXISTS `consoles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gamesforbusiness.consoles: ~3 rows (approximately)
/*!40000 ALTER TABLE `consoles` DISABLE KEYS */;
REPLACE INTO `consoles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Sony PlayStation 3', '2017-08-26 20:34:21', NULL),
	(2, 'Xbox 360', '2017-08-26 20:34:21', NULL),
	(3, 'PC', '2017-08-26 20:34:21', NULL);
/*!40000 ALTER TABLE `consoles` ENABLE KEYS */;

-- Dumping structure for tábla gamesforbusiness.games
DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `console_id` int(10) unsigned NOT NULL,
  `published` date DEFAULT NULL,
  `publisher_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coverimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metagamescore` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `games_console_id_index` (`console_id`),
  KEY `games_publisher_id_index` (`publisher_id`),
  KEY `games_category_id_index` (`category_id`),
  CONSTRAINT `games_console_id_foreign` FOREIGN KEY (`console_id`) REFERENCES `consoles` (`id`),
  CONSTRAINT `games_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gamesforbusiness.games: ~3 rows (approximately)
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
REPLACE INTO `games` (`id`, `title`, `console_id`, `published`, `publisher_id`, `category_id`, `url`, `coverimage`, `metagamescore`, `created_at`, `updated_at`) VALUES
	(1, 'World of Warcraft', 3, '2000-01-01', 1, 4, 'http://battle.net/', NULL, '86', '2017-08-26 20:34:21', NULL),
	(2, 'Assassin\'s Creed: Origins', 1, '2006-01-01', 2, 1, 'http://ubisoft.com/', NULL, '79', '2017-08-26 20:34:21', NULL),
	(3, 'SWTOR', 3, '2004-08-21', 3, 1, 'http://swtor.com/', NULL, '79', '2017-08-26 20:34:21', NULL),
	(4, 'Sims 4', 3, '2012-09-01', 3, 3, '', NULL, '79', '2017-08-26 20:34:21', NULL);
/*!40000 ALTER TABLE `games` ENABLE KEYS */;

-- Dumping structure for tábla gamesforbusiness.games_tags
DROP TABLE IF EXISTS `games_tags`;
CREATE TABLE IF NOT EXISTS `games_tags` (
  `game_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`game_id`,`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gamesforbusiness.games_tags: ~3 rows (approximately)
/*!40000 ALTER TABLE `games_tags` DISABLE KEYS */;
REPLACE INTO `games_tags` (`game_id`, `tag_id`) VALUES
	(1, 1),
	(1, 2),
	(2, 2),
	(3, 3),
	(4, 4);
/*!40000 ALTER TABLE `games_tags` ENABLE KEYS */;

-- Dumping structure for tábla gamesforbusiness.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gamesforbusiness.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(17, '2014_10_12_000000_create_users_table', 1),
	(18, '2014_10_12_100000_create_password_resets_table', 1),
	(19, '2017_08_20_123332_create_consoles_table', 1),
	(20, '2017_08_20_123403_create_publisher_table', 1),
	(21, '2017_08_20_123437_create_categories_table', 1),
	(22, '2017_08_20_123446_create_tags_table', 1),
	(23, '2017_08_20_123656_create_games_tags_table', 1),
	(24, '2017_08_20_143322_create_games_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for tábla gamesforbusiness.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gamesforbusiness.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for tábla gamesforbusiness.publishers
DROP TABLE IF EXISTS `publishers`;
CREATE TABLE IF NOT EXISTS `publishers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gamesforbusiness.publishers: ~2 rows (approximately)
/*!40000 ALTER TABLE `publishers` DISABLE KEYS */;
REPLACE INTO `publishers` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Blizzard', '2017-08-26 20:34:21', NULL),
	(2, 'Ubisoft', '2017-08-26 20:34:21', NULL),
	(3, 'Electronic Arts', '2017-08-26 20:34:21', NULL);
/*!40000 ALTER TABLE `publishers` ENABLE KEYS */;

-- Dumping structure for tábla gamesforbusiness.tags
DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gamesforbusiness.tags: ~2 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
REPLACE INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Orc', '2017-08-26 20:34:21', NULL),
	(2, 'Warrior', '2017-08-26 20:34:21', NULL),
	(3, 'Jedi', '2017-08-26 20:34:21', NULL),
	(4, 'Simulation', '2017-08-26 20:34:21', NULL);
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Dumping structure for tábla gamesforbusiness.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table gamesforbusiness.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@localhost.dev', '$2y$10$Ho/8c88Ez6XqmJB84nLe1.T67NMMyx0noGd8/uzzNzgA9CxwVB9Qu', 'CxELnT31k73GNtbsTz83l9eCXudMRerGVhDn0GVTvREMvk6LmjLWFN0Qxqp3', NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
