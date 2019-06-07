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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auction_categories`
--

LOCK TABLES `auction_categories` WRITE;
/*!40000 ALTER TABLE `auction_categories` DISABLE KEYS */;
INSERT INTO `auction_categories` VALUES (9,'Bikes'),(4,'Books'),(1,'Cars'),(5,'Clothes'),(2,'Computers'),(10,'Equipment'),(6,'Phones'),(3,'Sports'),(8,'Tickets'),(7,'Toys');
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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auctions`
--

LOCK TABLES `auctions` WRITE;
/*!40000 ALTER TABLE `auctions` DISABLE KEYS */;
INSERT INTO `auctions` VALUES (31,'audi 6','Dobro ocuvan audi...','joca',1,'2019-06-07 19:08:43','2019-07-07 19:08:43',30,2000000,'Used','audi1.jpg,audi2.jpg,audi3.jpg','2019-06-07 19:02:13','Active'),(32,'willson','Dva odlicna reketa, donela su mi mnogo pobeda :)','joca',3,NULL,NULL,29,17000,'New','reket.jpg','2019-06-07 19:05:03','Pending confirmation'),(33,'ssd','SSD u odlicnom stanju','bojsa',2,'2019-06-07 19:08:40','2019-06-27 19:08:40',20,5000,'Used','ssd.jpg','2019-06-07 19:06:54','Active'),(34,'Knjiga Ostrvo','Nesvakidasnja knjiga, toplo preporucujem','bojsa',4,'2019-06-07 19:08:38','2019-07-02 19:08:38',25,1000,'New','ostrvo.jpg','2019-06-07 19:08:27','Active');
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bids`
--

LOCK TABLES `bids` WRITE;
/*!40000 ALTER TABLE `bids` DISABLE KEYS */;
INSERT INTO `bids` VALUES (32,31,'bojsa','2019-06-07 19:09:13',2200000),(33,33,'basta98','2019-06-07 19:10:16',10000),(34,34,'basta98','2019-06-07 19:10:37',1500),(35,34,'miha1997','2019-06-07 19:11:19',2000);
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
INSERT INTO `user_ranks` VALUES (2,'Administrator'),(3,'Banned'),(1,'Moderator'),(0,'User');
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
INSERT INTO `user_ratings` VALUES ('alek_car','miha1997',5,'2019-06-07 19:11:35'),('basta98','miha1997',5,'2019-06-07 19:11:45'),('bojsa','basta98',5,'2019-06-07 19:10:24'),('jeca','joca',4,'2019-06-07 19:02:30'),('miha1997','joca',5,'2019-06-07 19:02:45');
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
INSERT INTO `users` VALUES ('alek_car','$2y$10$Y8qqCscuiMiqYgAA9CNyQuriQyy7diWbU9agh5V6ZbOW4LFECKRmy','Aleksandar','Pantic','1998-02-16','Male','Serbia','066 222222','alek@gmail.com','alek.jpg',2,0,'2019-06-07 18:43:30'),('basta98','$2y$10$RHsHkn.6F6y/tWb6rUCo/uauQQOP3EiJV1MTcmiYP6FdQiXvtrDjG','Filip','Tanic','1998-06-10','Male','Serbia','066 121212','fipei@gmail.com','fipe.jpg',1,0,'2019-06-07 18:37:52'),('bojsa','$2y$10$kX/59dfAVsYoqmlAFk4Q9uw.KcoFN0sEmRMts7KpOFc8.5YIRwwLa','Nebojsa','Savic','1997-06-13','Male','Serbia','066 123456','sone@gmail.com','sone.jpg',2,0,'2019-06-07 18:22:31'),('jeca','$2y$10$0tejAU0e9N9mPTGgEb3Oueg1RECJeNTV4N4Pb.QUstNfBQ6zsBm4m','Jelena','Dubak','1997-09-19','Female','Serbia','066 1111112','jelenai@gmail.com','jelena.jpg',0,0,'2019-06-07 18:50:36'),('joca','$2y$10$1USjtyohKfMu/Fj3MgBju.ePGS0tWQBzP8uVKeJ/7XlgY5e6xKeZK','Jovana','Topic','1997-02-26','Female','Serbia','066 111123','jovana@gmail.com','jovana.jpg',0,0,'2019-06-07 18:52:34'),('miha1997','$2y$10$1bGhK7fMkV5hlsKb9U9CIu2lz9gwxA6zDezZGrMinhq94U1cBcgf.','Mihailo','Obradovic','1997-05-28','Male','Serbia','066 1111111','miki@gmail.com','miki.jpg',1,0,'2019-06-07 18:16:32');
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

-- Dump completed on 2019-06-07 23:50:45
