CREATE DATABASE  IF NOT EXISTS `auction_house_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `auction_house_db`;
-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: auction_house_db
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
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
 SET character_set_client = utf8mb4 ;
CREATE TABLE `auction_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `category_id_UNIQUE` (`category_id`),
  UNIQUE KEY `category_name_UNIQUE` (`category_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `auctions`
--

DROP TABLE IF EXISTS `auctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `auctions` (
  `auction_id` int(11) NOT NULL AUTO_INCREMENT,
  `auction_name` varchar(45) NOT NULL,
  `auction_description` varchar(1000) NOT NULL DEFAULT '',
  `auction_owner` varchar(45) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `auctions_info_view`
--

DROP TABLE IF EXISTS `auctions_info_view`;
/*!50001 DROP VIEW IF EXISTS `auctions_info_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `auctions_info_view` AS SELECT 
 1 AS `auction_id`,
 1 AS `auction_name`,
 1 AS `category`,
 1 AS `start_time`,
 1 AS `end_time`,
 1 AS `duration`,
 1 AS `starting_price`,
 1 AS `item_condition`,
 1 AS `auction_description`,
 1 AS `auction_pictures`,
 1 AS `auction_owner`,
 1 AS `auction_state`,
 1 AS `bid_username`,
 1 AS `highest_bid`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `bids`
--

DROP TABLE IF EXISTS `bids`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_bans`
--

DROP TABLE IF EXISTS `user_bans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_ranks`
--

DROP TABLE IF EXISTS `user_ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user_ranks` (
  `rank_id` int(11) NOT NULL,
  `rank_title` varchar(45) NOT NULL,
  PRIMARY KEY (`rank_id`),
  UNIQUE KEY `rank_id_UNIQUE` (`rank_id`),
  UNIQUE KEY `rank_title_UNIQUE` (`rank_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `user_ratings`
--

DROP TABLE IF EXISTS `user_ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user_ratings` (
  `rated_user` varchar(45) NOT NULL,
  `rating_user` varchar(45) NOT NULL,
  `rating` int(11) NOT NULL,
  `rating_time` datetime NOT NULL,
  PRIMARY KEY (`rated_user`,`rating_user`),
  UNIQUE KEY `rated_user_UNIQUE` (`rated_user`),
  UNIQUE KEY `rating_user_UNIQUE` (`rating_user`),
  CONSTRAINT `FK_RATED_USER` FOREIGN KEY (`rated_user`) REFERENCES `users` (`username`),
  CONSTRAINT `FK_RATING_USER` FOREIGN KEY (`rating_user`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
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
  CONSTRAINT `FK_user_rank` FOREIGN KEY (`user_rank`) REFERENCES `user_ranks` (`rank_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Final view structure for view `auctions_info_view`
--

/*!50001 DROP VIEW IF EXISTS `auctions_info_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `auctions_info_view` AS select `a`.`auction_id` AS `auction_id`,`a`.`auction_name` AS `auction_name`,`a`.`category` AS `category`,`a`.`start_time` AS `start_time`,`a`.`end_time` AS `end_time`,`a`.`duration` AS `duration`,`a`.`starting_price` AS `starting_price`,`a`.`item_condition` AS `item_condition`,`a`.`auction_description` AS `auction_description`,`a`.`auction_pictures` AS `auction_pictures`,`a`.`auction_owner` AS `auction_owner`,`a`.`auction_state` AS `auction_state`,`b`.`username` AS `bid_username`,max(`b`.`bid_value`) AS `highest_bid` from (`auctions` `a` join `bids` `b` on((`b`.`auction_id` = `a`.`auction_id`))) */;
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

-- Dump completed on 2019-04-18  0:20:21
