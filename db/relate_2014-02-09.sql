# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.6.15)
# Database: relate
# Generation Time: 2014-02-09 14:34:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table activities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;

INSERT INTO `activities` (`id`, `name`, `created`, `modified`)
VALUES
	(1,'Play Basketball','2014-02-09 06:13:16','2014-02-09 06:13:16'),
	(2,'Dance','2014-02-09 06:13:23','2014-02-09 06:13:23'),
	(3,'Go running','2014-02-09 06:13:29','2014-02-09 06:13:29'),
	(4,'Read books','2014-02-09 06:13:35','2014-02-09 06:13:35'),
	(5,'Play games','2014-02-09 06:13:40','2014-02-09 06:13:40'),
	(6,'Program','2014-02-09 06:13:45','2014-02-09 06:13:45'),
	(7,'Rob banks','2014-02-09 06:13:51','2014-02-09 06:13:51');

/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table activities_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activities_users`;

CREATE TABLE `activities_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `frequency` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `activities_users` WRITE;
/*!40000 ALTER TABLE `activities_users` DISABLE KEYS */;

INSERT INTO `activities_users` (`id`, `activity_id`, `user_id`, `frequency`)
VALUES
	(9,4,3,1),
	(13,1,3,4),
	(14,2,3,1);

/*!40000 ALTER TABLE `activities_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table choices
# ------------------------------------------------------------

DROP TABLE IF EXISTS `choices`;

CREATE TABLE `choices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `choices` WRITE;
/*!40000 ALTER TABLE `choices` DISABLE KEYS */;

INSERT INTO `choices` (`id`, `value`, `content`, `created`, `modified`, `question_id`)
VALUES
	(1,0,'Yes','2014-02-09 11:15:01','2014-02-09 11:15:01',1),
	(2,0,'No','2014-02-09 11:15:01','2014-02-09 11:15:01',1),
	(3,0,'Yes','2014-02-09 11:15:24','2014-02-09 11:15:24',2),
	(4,0,'No','2014-02-09 11:15:24','2014-02-09 11:15:24',2),
	(5,0,'Help','2014-02-09 11:16:30','2014-02-09 11:16:30',3),
	(6,1,'Prevent','2014-02-09 11:16:30','2014-02-09 11:16:30',3),
	(7,0,'Neither','2014-02-09 11:16:30','2014-02-09 11:16:30',3),
	(8,0,'Good','2014-02-09 11:17:20','2014-02-09 11:17:20',4),
	(9,1,'Bad','2014-02-09 11:17:20','2014-02-09 11:17:20',4);

/*!40000 ALTER TABLE `choices` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table questions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;

INSERT INTO `questions` (`id`, `content`, `type`, `created`, `modified`)
VALUES
	(1,'Have you done this in the past week?','one','2014-02-09 11:15:01','2014-02-09 11:54:03'),
	(2,'Are you okay with that?','two','2014-02-09 11:15:24','2014-02-09 11:15:24'),
	(3,'Did your partner help you or prevent you?','three','2014-02-09 11:16:30','2014-02-09 11:16:30'),
	(4,'How do you feel about that?','four','2014-02-09 11:17:20','2014-02-09 11:17:20');

/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table quizes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quizes`;

CREATE TABLE `quizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table quizzes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `quizzes`;

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `quizzes` WRITE;
/*!40000 ALTER TABLE `quizzes` DISABLE KEYS */;

INSERT INTO `quizzes` (`id`, `score`, `created`, `modified`, `user_id`)
VALUES
	(1,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',NULL),
	(2,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',NULL),
	(3,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',NULL),
	(4,7,'2014-02-09 14:32:55','2014-02-09 14:32:55',NULL);

/*!40000 ALTER TABLE `quizzes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table responses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `responses`;

CREATE TABLE `responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `choice_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `responses` WRITE;
/*!40000 ALTER TABLE `responses` DISABLE KEYS */;

INSERT INTO `responses` (`id`, `value`, `created`, `modified`, `activity_id`, `user_id`, `choice_id`, `question_id`, `quiz_id`)
VALUES
	(1,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',4,3,1,1,NULL),
	(2,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',4,3,4,2,NULL),
	(3,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',4,3,NULL,3,NULL),
	(4,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',4,3,9,4,NULL),
	(5,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',1,3,1,1,NULL),
	(6,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',1,3,4,2,NULL),
	(7,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',1,3,6,3,NULL),
	(8,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',1,3,8,4,NULL),
	(9,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',2,3,2,1,NULL),
	(10,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',2,3,4,2,NULL),
	(11,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',2,3,5,3,NULL),
	(12,NULL,'2014-02-09 14:21:30','2014-02-09 14:21:30',2,3,9,4,NULL),
	(13,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',4,3,1,1,NULL),
	(14,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',4,3,4,2,NULL),
	(15,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',4,3,NULL,3,NULL),
	(16,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',4,3,9,4,NULL),
	(17,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',1,3,1,1,NULL),
	(18,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',1,3,4,2,NULL),
	(19,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',1,3,6,3,NULL),
	(20,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',1,3,8,4,NULL),
	(21,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',2,3,2,1,NULL),
	(22,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',2,3,4,2,NULL),
	(23,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',2,3,5,3,NULL),
	(24,NULL,'2014-02-09 14:30:38','2014-02-09 14:30:38',2,3,9,4,NULL),
	(25,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',4,3,1,1,NULL),
	(26,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',4,3,4,2,NULL),
	(27,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',4,3,NULL,3,NULL),
	(28,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',4,3,9,4,NULL),
	(29,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',1,3,1,1,NULL),
	(30,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',1,3,4,2,NULL),
	(31,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',1,3,6,3,NULL),
	(32,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',1,3,8,4,NULL),
	(33,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',2,3,2,1,NULL),
	(34,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',2,3,4,2,NULL),
	(35,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',2,3,5,3,NULL),
	(36,NULL,'2014-02-09 14:30:50','2014-02-09 14:30:50',2,3,9,4,NULL),
	(37,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',4,3,1,1,1),
	(38,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',4,3,4,2,1),
	(39,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',4,3,NULL,3,1),
	(40,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',4,3,9,4,1),
	(41,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',1,3,1,1,1),
	(42,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',1,3,4,2,1),
	(43,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',1,3,6,3,1),
	(44,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',1,3,8,4,1),
	(45,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',2,3,2,1,1),
	(46,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',2,3,4,2,1),
	(47,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',2,3,5,3,1),
	(48,NULL,'2014-02-09 14:32:00','2014-02-09 14:32:00',2,3,9,4,1),
	(49,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',4,3,1,1,2),
	(50,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',4,3,4,2,2),
	(51,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',4,3,NULL,3,2),
	(52,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',4,3,9,4,2),
	(53,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',1,3,1,1,2),
	(54,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',1,3,4,2,2),
	(55,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',1,3,6,3,2),
	(56,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',1,3,8,4,2),
	(57,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',2,3,2,1,2),
	(58,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',2,3,4,2,2),
	(59,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',2,3,5,3,2),
	(60,NULL,'2014-02-09 14:32:03','2014-02-09 14:32:03',2,3,9,4,2),
	(61,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',4,3,1,1,3),
	(62,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',4,3,4,2,3),
	(63,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',4,3,NULL,3,3),
	(64,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',4,3,9,4,3),
	(65,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',1,3,1,1,3),
	(66,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',1,3,4,2,3),
	(67,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',1,3,6,3,3),
	(68,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',1,3,8,4,3),
	(69,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',2,3,2,1,3),
	(70,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',2,3,4,2,3),
	(71,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',2,3,5,3,3),
	(72,NULL,'2014-02-09 14:32:42','2014-02-09 14:32:42',2,3,9,4,3),
	(73,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',4,3,1,1,4),
	(74,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',4,3,4,2,4),
	(75,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',4,3,NULL,3,4),
	(76,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',4,3,9,4,4),
	(77,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',1,3,1,1,4),
	(78,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',1,3,4,2,4),
	(79,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',1,3,6,3,4),
	(80,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',1,3,8,4,4),
	(81,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',2,3,2,1,4),
	(82,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',2,3,4,2,4),
	(83,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',2,3,5,3,4),
	(84,NULL,'2014-02-09 14:32:55','2014-02-09 14:32:55',2,3,9,4,4);

/*!40000 ALTER TABLE `responses` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `health` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `health`, `email`, `password`, `role`, `created`, `modified`)
VALUES
	(3,NULL,'zahid@zahid.zahid','c8cec88d5f8a723307d08ab410cc9e650ff438fc',NULL,'2014-02-09 00:28:11','2014-02-09 00:28:11');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
