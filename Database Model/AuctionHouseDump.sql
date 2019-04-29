CREATE DATABASE  IF NOT EXISTS `auction_house_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `auction_house_db`;
-- MySQL dump 10.13  Distrib 5.7.24, for Win64 (x86_64)
--
-- Host: localhost    Database: auction_house_db
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auction_categories`
--

DROP TABLE IF EXISTS `auction_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auction_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_id_UNIQUE` (`category_id`),
  UNIQUE KEY `category_name_UNIQUE` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auction_categories`
--

LOCK TABLES `auction_categories` WRITE;
/*!40000 ALTER TABLE `auction_categories` DISABLE KEYS */;
INSERT INTO `auction_categories` VALUES (1,'Cars'),(2,'Computers'),(3,'Sports');
/*!40000 ALTER TABLE `auction_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auctions`
--

DROP TABLE IF EXISTS `auctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auctions` (
  `auction_id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_name` varchar(45) NOT NULL,
  `auction_description` varchar(1000) NOT NULL DEFAULT '',
  `auction_owner` varchar(45) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `starting_price` int(11) NOT NULL,
  `item_condition` varchar(45) NOT NULL,
  `auction_pictures` varchar(1000) DEFAULT NULL,
  `create_time` datetime NOT NULL,
  `auction_state` varchar(45) NOT NULL DEFAULT 'Pending confirmation',
  PRIMARY KEY (`auction_id`),
  UNIQUE KEY `auction_id_UNIQUE` (`auction_id`),
  KEY `auction_owner_idx` (`auction_owner`),
  KEY `FK_category_idx` (`category`),
  CONSTRAINT `FK_auction_owner` FOREIGN KEY (`auction_owner`) REFERENCES `users` (`username`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_category` FOREIGN KEY (`category`) REFERENCES `auction_categories` (`category_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auctions`
--

LOCK TABLES `auctions` WRITE;
/*!40000 ALTER TABLE `auctions` DISABLE KEYS */;
INSERT INTO `auctions` VALUES (6,'Aukcija #1','ASDADSADADAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA','admin',1,'2019-04-18 18:57:01','2019-04-18 18:57:08',7,1000,'New',NULL,'2019-04-18 18:57:01','Pending confirmation'),(7,'Aukcija #2','ASDADSADADAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA','admin',2,'2019-04-18 18:57:08','2019-04-18 18:57:15',7,1000,'New',NULL,'2019-04-18 18:57:08','Pending confirmation'),(9,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:44','2019-04-25 23:44:44',7,10,'100',NULL,'2019-04-25 23:44:44','Pending confirmation'),(10,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:48','2019-04-25 23:44:48',7,10,'100',NULL,'2019-04-25 23:44:48','Pending confirmation'),(11,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:48','2019-04-25 23:44:48',7,10,'100',NULL,'2019-04-25 23:44:48','Pending confirmation'),(12,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:49','2019-04-25 23:44:49',7,10,'100',NULL,'2019-04-25 23:44:49','Pending confirmation'),(13,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:49','2019-04-25 23:44:49',7,10,'100',NULL,'2019-04-25 23:44:49','Pending confirmation'),(14,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:49','2019-04-25 23:44:49',7,10,'100',NULL,'2019-04-25 23:44:49','Pending confirmation'),(15,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:50','2019-04-25 23:44:50',7,10,'100',NULL,'2019-04-25 23:44:50','Pending confirmation'),(16,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:50','2019-04-25 23:44:50',7,10,'100',NULL,'2019-04-25 23:44:50','Pending confirmation'),(17,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:50','2019-04-25 23:44:50',7,10,'100',NULL,'2019-04-25 23:44:50','Pending confirmation'),(18,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:51','2019-04-25 23:44:51',7,10,'100',NULL,'2019-04-25 23:44:51','Pending confirmation'),(19,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:51','2019-04-25 23:44:51',7,10,'100',NULL,'2019-04-25 23:44:51','Pending confirmation'),(20,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:51','2019-04-25 23:44:51',7,10,'100',NULL,'2019-04-25 23:44:51','Pending confirmation'),(21,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:51','2019-04-25 23:44:51',7,10,'100',NULL,'2019-04-25 23:44:51','Pending confirmation'),(22,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:52','2019-04-25 23:44:52',7,10,'100',NULL,'2019-04-25 23:44:52','Pending confirmation'),(23,'Aukcija','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-25 23:44:52','2019-04-25 23:44:52',7,10,'100',NULL,'2019-04-25 23:44:52','Pending confirmation'),(24,'Proba','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-26 01:47:36','2019-04-26 01:47:36',7,10,'100',NULL,'2019-04-26 01:47:36','Denied'),(25,'Proba','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-26 01:47:36','2019-04-26 01:47:36',7,10,'100',NULL,'2019-04-26 01:47:36','Active'),(26,'Proba','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-26 01:47:37','2019-04-26 01:47:37',7,10,'100',NULL,'2019-04-26 01:47:37','Active'),(27,'Proba','ASdadsadadadadasdsadasdsadadadsad','admin',1,'2019-04-26 01:47:37','2019-04-26 01:47:37',7,10,'100',NULL,'2019-04-26 01:47:37','Pending confirmation');
/*!40000 ALTER TABLE `auctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `auctions_info_view`
--

DROP TABLE IF EXISTS `auctions_info_view`;
/*!50001 DROP VIEW IF EXISTS `auctions_info_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `auctions_info_view` AS SELECT 
 1 AS `auction_id`,
 1 AS `auction_name`,
 1 AS `auction_description`,
 1 AS `auction_owner`,
 1 AS `category`,
 1 AS `start_time`,
 1 AS `end_time`,
 1 AS `duration`,
 1 AS `starting_price`,
 1 AS `item_condition`,
 1 AS `auction_pictures`,
 1 AS `create_time`,
 1 AS `auction_state`,
 1 AS `bids_count`,
 1 AS `max_bid`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bids` (
  `bid_id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `bid_time` datetime NOT NULL,
  `bid_value` int(11) NOT NULL,
  PRIMARY KEY (`bid_id`),
  UNIQUE KEY `bid_id_UNIQUE` (`bid_id`),
  KEY `auction_id_idx` (`auction_id`),
  KEY `username_idx` (`username`),
  CONSTRAINT `FK_auction_id` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`auction_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bids`
--

LOCK TABLES `bids` WRITE;
/*!40000 ALTER TABLE `bids` DISABLE KEYS */;
INSERT INTO `bids` VALUES (1,6,'admin','2019-04-18 19:02:42',1300),(2,6,'admin','2019-04-18 19:02:48',1400),(3,6,'admin','2019-04-18 19:02:51',22200),(4,6,'admin','2019-04-18 19:02:54',22201),(5,7,'admin','2019-04-18 19:02:58',2),(6,7,'admin','2019-04-18 19:03:01',32);
/*!40000 ALTER TABLE `bids` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `max_bids_view`
--

DROP TABLE IF EXISTS `max_bids_view`;
/*!50001 DROP VIEW IF EXISTS `max_bids_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `max_bids_view` AS SELECT 
 1 AS `bid_id`,
 1 AS `auction_id`,
 1 AS `username`,
 1 AS `bid_time`,
 1 AS `bid_value`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `ratings_by_user_view`
--

DROP TABLE IF EXISTS `ratings_by_user_view`;
/*!50001 DROP VIEW IF EXISTS `ratings_by_user_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `ratings_by_user_view` AS SELECT 
 1 AS `username`,
 1 AS `rating`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user_bans`
--

DROP TABLE IF EXISTS `user_bans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_bans` (
  `banned_user` varchar(45) NOT NULL,
  `ban_time` datetime NOT NULL,
  `ban_reason` varchar(100) NOT NULL,
  `administrator` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`banned_user`),
  UNIQUE KEY `username_UNIQUE` (`banned_user`),
  KEY `administrator_idx` (`administrator`),
  CONSTRAINT `FK_administrator` FOREIGN KEY (`administrator`) REFERENCES `users` (`username`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_banned_user` FOREIGN KEY (`banned_user`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_bans`
--

LOCK TABLES `user_bans` WRITE;
/*!40000 ALTER TABLE `user_bans` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_bans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_ranks`
--

DROP TABLE IF EXISTS `user_ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_ranks` (
  `rank_id` int(11) NOT NULL,
  `rank_title` varchar(45) NOT NULL,
  PRIMARY KEY (`rank_id`),
  UNIQUE KEY `rank_id_UNIQUE` (`rank_id`),
  UNIQUE KEY `rank_title_UNIQUE` (`rank_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_ranks`
--

LOCK TABLES `user_ranks` WRITE;
/*!40000 ALTER TABLE `user_ranks` DISABLE KEYS */;
INSERT INTO `user_ranks` VALUES (2,'Administrator'),(1,'Moderator'),(0,'User');
/*!40000 ALTER TABLE `user_ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_ratings`
--

DROP TABLE IF EXISTS `user_ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_ratings` (
  `rated_user` varchar(45) NOT NULL,
  `rating_user` varchar(45) NOT NULL,
  `rating` int(11) NOT NULL,
  `rating_time` datetime NOT NULL,
  PRIMARY KEY (`rated_user`,`rating_user`),
  KEY `FK_RATED_USER_idx` (`rating_user`),
  CONSTRAINT `FK_RATED_USER` FOREIGN KEY (`rated_user`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_RATING_USER` FOREIGN KEY (`rating_user`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_ratings`
--

LOCK TABLES `user_ratings` WRITE;
/*!40000 ALTER TABLE `user_ratings` DISABLE KEYS */;
INSERT INTO `user_ratings` VALUES ('admin1','aki',4,'2019-04-28 19:44:11'),('balsa_knez','aki',3,'2019-04-28 19:37:56');
/*!40000 ALTER TABLE `user_ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `state` varchar(45) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `profile_picture` varchar(100) DEFAULT NULL,
  `user_rank` int(11) NOT NULL DEFAULT '0',
  `banned` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `e-mail_UNIQUE` (`email`),
  KEY `FK_USER_RANK_idx` (`user_rank`),
  CONSTRAINT `FK_user_rank` FOREIGN KEY (`user_rank`) REFERENCES `user_ranks` (`rank_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','admin','Nebojsa','Savic','1997-06-13','male','Serbia','53535353','nebojsasavic6@gmail.com',NULL,2,0,'2019-04-13 17:44:16'),('admin1','$2y$10$ZizgYPZZK3MYMPwhav2LEOwOCRY46b/umUGdiWdWOYi9.NU58YmIa','admin','admin','2019-04-11','Male','serbia','sadsada1231','adminski@gmail.com',NULL,2,0,'2019-04-26 04:17:37'),('aki','$2y$10$oR3F5J5.z1uFly8gTju.WugYNz1k61fQROZLN2SBvFfyR87RBdCoi','Aleksa','Vujovic','2003-05-30','Male','serbia','066 1111111','aki@yanedx.ru','hero.jpg',2,0,'2019-04-28 09:22:23'),('balsa_knez','$2y$10$bdVDD.AARYo2mt3dIDArUu43TrtZ.Nw.V4QQh9MNZL3pjzrcZzR0e','Balsa','Knezevic','2019-04-11','Male','serbia','12312131','balsaknez@gmail.com','IMG_4178.JPG',0,0,'2019-04-21 19:39:36'),('cyber','$2y$10$zZ6NyfT2PaBvtsY5vAM1nuv7oiNwjtFWiVarVlrh0Bg7ZXRhuT3Ci','Nebojsa','Savic','2019-04-03','Male','serbia','1231231','1nebojsa9753@gmail.com','IMG_4178.JPG',0,0,'2019-04-19 17:11:40'),('filip_998','123123131','Filip','Tanic','2019-04-18','Male','serbia','12312131','fafasa@sadasda.com','',0,0,'2019-04-18 22:04:34'),('miha','miki','miha','obrad','1997-05-28','Male','serbia','066 012345','miki@gmail.com','lav.jpg',0,0,'2019-04-26 20:19:52'),('mmarkov','$2y$10$/k/5xj6589wb6yFOEL9NU.ADr5Te8iKX3gCL5yF.gxrxkulc1w0eS','Milica','Markov','2019-04-20','Female','serbia','12313131','mm@mmm.mmm','IMG_4178.JPG',0,0,'2019-04-20 18:13:49'),('mmm','123123123','asdsa','asdada','2019-04-19','Male','serbia','12412414','mmm@mmm.cmm',NULL,0,0,'2019-04-18 23:11:22'),('nnsavi231112','123123123','Nebojsa','Savic','2019-04-12','Male','serbia','sadsadsadsa','mmm@mmm22.cmm','IMG_4178.JPG',0,0,'2019-04-18 23:22:30'),('nnsavic','12312313','Nebojsa','Savic','2019-04-05','Male','serbia','124124141','nebojsa9753@gmail.com','',0,0,'0000-00-00 00:00:00'),('nnsavic1','1231231','Nebojsa','Savic','2019-04-05','Male','serbia','124124141','nebojsa97513@gmail.com','',0,0,'2019-04-18 21:34:05'),('nnsavic2123123','1231231','Nebojsa','Savic','2019-04-13','Male','serbia','1231231','nebojsasav123ic62@gmail.com',NULL,0,0,'2019-04-18 23:05:55'),('nnsavic21232131123123','$2y$10$L0oFQUEB0R8HXjC4WwM3RujJNVzV/Djz5J58r.i9lZcv.tQslMQrK','sadada','asdsadsa','2019-04-12','Male','serbia','12412414','nebojsasa213123vic6@gmail.com1','21148285_677805502418857_1351162169_n.jpg',0,0,'2019-04-18 23:55:34'),('nnsavic213','1231313','Nebojsa','Savic','2019-04-12','Male','serbia','12312131','nebojs2asav2ic62@gmail.com','DSC_0381.JPG',0,0,'2019-04-18 22:07:04'),('nsavic','$2y$10$BFGCUNAGLOSUEGhFmuFVc.K26SpFZa0GHYg0lou4vaM5u9q8KqCu.','Nebojsa','Savic','2019-04-11','Male','serbia','12412414','nebojsa@nebojsa.com','IMG_4178.JPG',1,0,'2019-04-19 00:08:45'),('nsavic123','$2y$10$X.oBNSfUPImk2fNhjUIL7uc0zGWetGcXn23YfVSfVB9xHHQPmATCG','Nebojsa','Savic','2019-05-01','Male','serbia','1231231','nebojs213a9753@gmail.com',NULL,0,0,'2019-04-19 18:02:16'),('sn160078d','1232131','Nebojsa','Savic','2019-04-14','Male','serbia','12412414','nebojsa972513@gmail.com','',0,0,'2019-04-18 21:54:14'),('sn160078d2','1231313','Nebojsa','Savic','2019-04-14','Male','serbia','12412414','nebojsa9725213@gmail.com','',0,0,'2019-04-18 21:54:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'auction_house_db'
--

--
-- Final view structure for view `auctions_info_view`
--

/*!50001 DROP VIEW IF EXISTS `auctions_info_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `auctions_info_view` AS select `a`.`auction_id` AS `auction_id`,`a`.`auction_name` AS `auction_name`,`a`.`auction_description` AS `auction_description`,`a`.`auction_owner` AS `auction_owner`,`a`.`category` AS `category`,`a`.`start_time` AS `start_time`,`a`.`end_time` AS `end_time`,`a`.`duration` AS `duration`,`a`.`starting_price` AS `starting_price`,`a`.`item_condition` AS `item_condition`,`a`.`auction_pictures` AS `auction_pictures`,`a`.`create_time` AS `create_time`,`a`.`auction_state` AS `auction_state`,count(`b`.`bid_id`) AS `bids_count`,max(`b`.`bid_value`) AS `max_bid` from (`auctions` `a` left join `bids` `b` on((`a`.`auction_id` = `b`.`auction_id`))) group by `a`.`auction_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `max_bids_view`
--

/*!50001 DROP VIEW IF EXISTS `max_bids_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `max_bids_view` AS select `b`.`bid_id` AS `bid_id`,`b`.`auction_id` AS `auction_id`,`b`.`username` AS `username`,`b`.`bid_time` AS `bid_time`,`b`.`bid_value` AS `bid_value` from (`auctions_info_view` `a` join `bids` `b`) where ((`a`.`auction_id` = `b`.`auction_id`) and (`a`.`max_bid` = `b`.`bid_value`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `ratings_by_user_view`
--

/*!50001 DROP VIEW IF EXISTS `ratings_by_user_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `ratings_by_user_view` AS select `u`.`username` AS `username`,round(avg(`r`.`rating`),2) AS `rating` from (`user_ratings` `r` join `users` `u`) where (`u`.`username` = `r`.`rated_user`) group by `u`.`username` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-30  0:44:51
