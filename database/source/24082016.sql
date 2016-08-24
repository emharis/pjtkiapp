-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.24 - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for pjtki_db
DROP DATABASE IF EXISTS `pjtki_db`;
CREATE DATABASE IF NOT EXISTS `pjtki_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `pjtki_db`;


-- Dumping structure for table pjtki_db.agency
DROP TABLE IF EXISTS `agency`;
CREATE TABLE IF NOT EXISTS `agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kontak` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pjtki_db.agency: ~4 rows (approximately)
DELETE FROM `agency`;
/*!40000 ALTER TABLE `agency` DISABLE KEYS */;
INSERT INTO `agency` (`id`, `created_at`, `user_id`, `nama`, `kontak`, `alamat`, `telp`) VALUES
	(1, '2016-08-22 16:26:08', 5, 'PT Amil Fajar Intl', 'Bu Emilia', 'Jl. Bekasi Timur 9 No. 3 A Jatinegara', '021-87788156'),
	(2, '2016-08-22 16:28:08', 6, 'PT Bahana Timur Megah', 'Ari Gunawan', 'JL. Arrohmah No.18 Petamburan, Jakarta Pusat', ' (021) 548 2744'),
	(3, '2016-08-22 16:28:42', 7, 'PT. Binawan Inti Utama', 'Budi Sudarsono', ' Jl. Raya Kalibata No. 25, Jakarta 13630, Indonesia', '(+62 21) 80885348-9'),
	(6, '2016-08-22 16:46:54', 4, 'PT Wira Wiri', 'Budi Sutejo', 'Surabaya', '0898734985734'),
	(7, '2016-08-24 10:32:00', 20, 'PT Wahana Kerja', 'Herman', NULL, NULL);
/*!40000 ALTER TABLE `agency` ENABLE KEYS */;


-- Dumping structure for table pjtki_db.appsetting
DROP TABLE IF EXISTS `appsetting`;
CREATE TABLE IF NOT EXISTS `appsetting` (
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pjtki_db.appsetting: ~3 rows (approximately)
DELETE FROM `appsetting`;
/*!40000 ALTER TABLE `appsetting` DISABLE KEYS */;
INSERT INTO `appsetting` (`name`, `value`) VALUES
	('customer_jatuh_tempo', '4'),
	('penjualan_counter', '15'),
	('sidebar_collapse', '0');
/*!40000 ALTER TABLE `appsetting` ENABLE KEYS */;


-- Dumping structure for table pjtki_db.ctki
DROP TABLE IF EXISTS `ctki`;
CREATE TABLE IF NOT EXISTS `ctki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `nik` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jns_kelamin` enum('P','W') COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alamat` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kota` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provinsi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pendidikan_terakhir` enum('1','2','3') COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_menikah` enum('1','2','3') COLLATE utf8_unicode_ci DEFAULT NULL,
  `agama` enum('1','2','3','4','5','6') COLLATE utf8_unicode_ci DEFAULT NULL,
  `telp` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ayah` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ibu` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `visa` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paspor` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_rekrut` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N',
  `agency_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pjtki_db.ctki: ~2 rows (approximately)
DELETE FROM `ctki`;
/*!40000 ALTER TABLE `ctki` DISABLE KEYS */;
INSERT INTO `ctki` (`id`, `created_at`, `user_id`, `nik`, `nama`, `jns_kelamin`, `tgl_lahir`, `tempat_lahir`, `alamat`, `kota`, `provinsi`, `pendidikan_terakhir`, `status_menikah`, `agama`, `telp`, `email`, `ayah`, `ibu`, `foto`, `visa`, `paspor`, `status_rekrut`, `agency_id`) VALUES
	(1, '2016-08-22 23:14:01', 9, '8934587675878', 'erina', 'W', '1986-01-01', 'surabaya', 'Jemursari Wetan BB 10 , Surabaya', 'Surabaya', 'Jawa Timur', '1', '1', '1', '089989787676', 'erina@gmail.com', 'Sutris', 'Sumiati', 'foto_erina.jpg', NULL, NULL, 'N', 0),
	(5, '2016-08-23 07:00:58', 13, '324764333254345', 'Rukya', 'W', '1988-10-10', 'Sidoarjo', 'Ngaban RT 5 RW 2 No. 15 Tanggulangin', 'Sidoarjo', 'Jawa Timur', '1', '1', '1', '089787654543', 'rukya@gmail.com', 'sukiman', 'ratemi', 'foto_rukya.jpg', NULL, NULL, 'N', NULL),
	(6, '2016-08-23 16:59:14', 14, '23462784628686', 'ASISEH BT WEDUD SUKARMAN', 'P', '1980-10-10', 'Sampang', 'JL. Ikan Tongkol 15 Sampang', 'Sampang', 'Jawa Timur', '2', '1', '1', '087676454323', 'aseah@gmail.com', 'sarkam', 'maimun', 'foto_asiseh.jpg', NULL, NULL, 'N', NULL),
	(7, '2016-08-23 17:08:11', 15, '32487983759988798', 'BINTI MUKAROMAH', 'W', '1975-01-01', 'TULUNGAGUNG', 'Jl. Grobokan Jawa, B-10, Tulung Mentung', 'Tulungagung', 'Jawa Timur', '1', '1', '1', '089909898767', 'mukraomah@gmail.com', 'Romlah', 'Marina', 'foto_mukaromah.jpg', NULL, NULL, 'N', 0),
	(11, '2016-08-24 10:17:11', 19, '23423534543', 'Eries Herman', 'P', NULL, 'Sidoarjo', 'Tanggulangin', 'Sidoarjo', 'Jawa Timur', '1', '1', '1', '081357359019', 'butirpadi@gmail.com', NULL, NULL, 'foto_eries.jpg', 'visa_eries.jpg', 'paspor_eries.jpg', 'N', NULL);
/*!40000 ALTER TABLE `ctki` ENABLE KEYS */;


-- Dumping structure for table pjtki_db.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pjtki_db.permissions: ~0 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;


-- Dumping structure for table pjtki_db.promote_ctki
DROP TABLE IF EXISTS `promote_ctki`;
CREATE TABLE IF NOT EXISTS `promote_ctki` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `agency_id` int(11) DEFAULT NULL,
  `ctki_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pjtki_db.promote_ctki: ~6 rows (approximately)
DELETE FROM `promote_ctki`;
/*!40000 ALTER TABLE `promote_ctki` DISABLE KEYS */;
INSERT INTO `promote_ctki` (`id`, `created_at`, `agency_id`, `ctki_id`) VALUES
	(27, '2016-08-23 17:09:11', 2, 5),
	(28, '2016-08-23 17:09:26', 6, 7),
	(29, '2016-08-24 04:59:03', 1, 1),
	(30, '2016-08-24 04:59:03', 2, 1),
	(31, '2016-08-24 04:59:03', 3, 1),
	(32, '2016-08-24 04:59:03', 6, 1);
/*!40000 ALTER TABLE `promote_ctki` ENABLE KEYS */;


-- Dumping structure for table pjtki_db.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pjtki_db.roles: ~2 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `nama`, `description`) VALUES
	(1, '2016-08-12 04:19:19', '2016-08-12 04:19:20', 'ADM', 'ADMINISTRATOR'),
	(2, '2016-08-12 04:19:39', '2016-08-12 04:19:40', 'AGN', 'AGENCY'),
	(3, '2016-08-21 18:31:00', '2016-08-21 18:31:01', 'CTK', 'CTKI');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table pjtki_db.role_permission
DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE IF NOT EXISTS `role_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__roles` (`role_id`),
  KEY `FK__permissions` (`permission_id`),
  CONSTRAINT `FK__permissions` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `FK__roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pjtki_db.role_permission: ~0 rows (approximately)
DELETE FROM `role_permission`;
/*!40000 ALTER TABLE `role_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_permission` ENABLE KEYS */;


-- Dumping structure for table pjtki_db.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` date NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verified` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pjtki_db.users: ~7 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `created_at`, `updated_at`, `name`, `username`, `email`, `password`, `remember_token`, `verified`) VALUES
	(1, '2016-08-11 17:19:31', '2016-08-24', '', 'admin', 'admin@localhost.com', '$2y$10$IfJZtmvoB3HFgyv3PEdIVe7IZCOrATXv/P1yw3JC7Yrio/8uYzuHC', 'esSPCSvx2rqFmd0cq9Fxm7MF02eHgpS4sommSwO4WypQHYVHkf0HCPfG2o2p', 1),
	(4, '2016-08-22 16:46:54', '2016-08-23', '', 'ptwirawiri', '@localhost.com', '$2y$10$nVmmY7gvjkSklGVNoVLWBezc2udPuqD5SnDtvS41HdDjyjjagGtCq', 'bxYsKKwd4nZbyjGhKBqlmgdJNUrMYOMQSHyONnR1llxXQ6sefCIUPhNCPaF6', 1),
	(5, '2016-08-22 16:52:42', '0000-00-00', '', 'ptamilfajar', '@localhost.com', '$2y$10$PvfCP4/.B.3YOEL.eq.5cuoXrJhMvWhLioRpAFe9p4PhfLNZNewIK', NULL, 1),
	(6, '2016-08-22 16:53:22', '2016-08-23', '', 'ptbahanatimur', '@localhost.com', '$2y$10$ip9HvXM.Y75Ow3wgEXosOOYsZc7t.7U/xA.5hvcAluiDz2DOw7YiK', 'ys5YQjw4y9TeBpWc0BEwvvAodb2spTGnnT83AWHsq3FWSRYVBJqW6sg2mtva', 1),
	(7, '2016-08-22 16:53:45', '0000-00-00', '', 'ptbinawan', '@localhost.com', '$2y$10$cdkUayHS8ejSbAV98CsWOugvSoA0U./5/AOchmImsvMRfWaFtFwey', NULL, 1),
	(9, '2016-08-22 23:14:01', '0000-00-00', '', 'erina', 'erina@localhost.com', '$2y$10$k90hcLRfWNRosMd0XxvqYOjLugLIK0y6g.6nYcgC2Rhjk4akWXDv2', NULL, 1),
	(13, '2016-08-23 07:00:58', '0000-00-00', '', 'rukya', 'rukya@localhost.com', '$2y$10$axuoNaZr8fSgQXQ7dL2XjOwYffS.RQ2UkEIXKRG1zQUgZVvs0d1cW', NULL, 1),
	(14, '2016-08-23 16:59:14', '0000-00-00', '', 'asiseh', 'asiseh@localhost.com', '$2y$10$5FyJBM6aiA4XfFgtGGTls.cxhTI40RFvQ6snblbWHS1w2JYKEvQma', NULL, 1),
	(15, '2016-08-23 17:08:11', '0000-00-00', '', 'mukaromah', 'mukaromah@localhost.com', '$2y$10$Nhl38BiNJlvq5a46u2mZLOOP0gl3BCcIwnuwztvqW7JUbhEyhXOoG', NULL, 1),
	(19, '2016-08-24 10:17:11', '2016-08-24', '', 'eries', 'butirpadi@gmail.com', '$2y$10$ioBw9lopgJl9MXcD1u7GN.6N4lkv4SrjDNog/YZy4TxBvg7dAqJv6', 'kF045y0O6vngT9SvLJylqUzDobHCwc1K71oahY2au1pnadQSyrF24Pccd27u', 1),
	(20, '2016-08-24 10:32:00', '2016-08-24', '', 'wahanakerja', 'herman@gmail.com', '$2y$10$R9SSHbdvWz4m.o5OBXsvkeDEFt5RBeNfJNn/G/7NSy52nCKQ4l6m2', 'N8srLHgJ620EyuSuH058GrdjI53VHdimQekhG9w5k1WOQQwquUE7gJEWQGii', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table pjtki_db.user_role
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_role_users` (`user_id`),
  KEY `FK_user_role_roles` (`role_id`),
  CONSTRAINT `FK_user_role_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_user_role_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table pjtki_db.user_role: ~7 rows (approximately)
DELETE FROM `user_role`;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `created_at`, `updated_at`, `user_id`, `role_id`) VALUES
	(1, '2016-08-12 04:20:00', '2016-08-12 04:20:01', 1, 1),
	(3, '2016-08-22 16:46:54', NULL, 4, 2),
	(4, '2016-08-22 16:52:42', NULL, 5, 2),
	(5, '2016-08-22 16:53:22', NULL, 6, 2),
	(6, '2016-08-22 16:53:46', NULL, 7, 2),
	(8, '2016-08-22 23:14:01', NULL, 9, 3),
	(12, '2016-08-23 07:00:58', NULL, 13, 3),
	(13, '2016-08-23 16:59:14', NULL, 14, 3),
	(14, '2016-08-23 17:08:11', NULL, 15, 3),
	(18, '2016-08-24 10:17:11', NULL, 19, 3),
	(19, '2016-08-24 10:32:00', NULL, 20, 2);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
