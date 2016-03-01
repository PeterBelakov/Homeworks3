-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for homework3
DROP DATABASE IF EXISTS `homework3`;
CREATE DATABASE IF NOT EXISTS `homework3` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `homework3`;


-- Dumping structure for table homework3.msg
DROP TABLE IF EXISTS `msg`;
CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `message` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- Dumping data for table homework3.msg: 2 rows
DELETE FROM `msg`;
/*!40000 ALTER TABLE `msg` DISABLE KEYS */;
INSERT INTO `msg` (`id`, `time`, `user_id`, `title`, `message`) VALUES
	(64, '2016-03-01 15:48:06', '115', 'глобално затопляне', 'България е сред най-засегнатите от глобалното затопляне\r\nЕксперти по климата: Чакат ни повече бури, суши и наводнения\r\n\r\nСредногодишните температури у нас може да се повишат с до 7 градуса.'),
	(63, '2016-03-01 15:43:22', '114', 'глобално затопляне', 'Според духовното изследване, основната причина за глобалното затопляне е цикличен процес, който се случва във Универсума с течение на времето.');
/*!40000 ALTER TABLE `msg` ENABLE KEYS */;


-- Dumping structure for table homework3.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;

-- Dumping data for table homework3.users: 2 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `user_name`, `password`) VALUES
	(115, 'Hristo', 'Stoqnov'),
	(114, 'Peter', 'Belakov');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
