-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2020 at 04:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
    AUTOCOMMIT = 0;

START TRANSACTION;

SET
    time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `emusic_db`
--

CREATE DATABASE IF NOT EXISTS `emusic_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `emusic_db`;

-- --------------------------------------------------------
--
-- Table structure for table `cart`
--
DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
    `cart_item_id` int(11) NOT NULL,
    `music_id` int(11) DEFAULT NULL,
    `user_id` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `favorite_music`
--
DROP TABLE IF EXISTS `favorite_music`;

CREATE TABLE `favorite_music` (
    `fav_music_id` int(11) NOT NULL,
    `music_id` int(11) DEFAULT NULL,
    `user_id` int(11) DEFAULT NULL,
    `status` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `music`
--
DROP TABLE IF EXISTS `music`;

CREATE TABLE `music` (
    `music_id` int(11) NOT NULL,
    `music_title` varchar(50) DEFAULT NULL,
    `music_file` varchar(255) DEFAULT NULL,
    `music_image` varchar(255) DEFAULT NULL,
    `music_category` int(11) DEFAULT NULL,
    `price` int(11) DEFAULT NULL,
    `discount_price` int(11) DEFAULT NULL,
    `status` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `music`
--
INSERT INTO
    `music` (
        `music_id`,
        `music_title`,
        `music_file`,
        `music_image`,
        `music_category`,
        `price`,
        `discount_price`,
        `status`
    )
VALUES
    (
        23,
        'Sci-Fi Adventure',
        '1588519018-cinematic.mp3',
        '1588508321-Sci-Fi Adventure.jpg',
        9,
        0,
        0,
        1
    ),
    (
        24,
        'Cinematic Background Tension',
        '1588519023-cinematic.mp3',
        '1588508362-Cinematic Background Tension.jpg',
        9,
        1000,
        800,
        1
    ),
    (
        27,
        'Early One Morning',
        '1588519030-folk.mp3',
        '1588508546-Early One Morning.jpg',
        10,
        0,
        0,
        1
    ),
    (
        29,
        'Kalinka',
        '1588519037-folk.mp3',
        '1588508596-Kalinka.jpg',
        10,
        0,
        0,
        1
    ),
    (
        30,
        'senorita',
        '1588519057-pop.mp3',
        '1588508741-senorita.jpg',
        11,
        130,
        50,
        1
    ),
    (
        32,
        'dont start now',
        '1588519047-pop.mp3',
        '1588509139-dont start now.jpg',
        11,
        70,
        0,
        1
    ),
    (
        35,
        'one more time',
        '1588516658-electronica.mp3',
        '1589040787-demo.jpg',
        12,
        100,
        80,
        1
    ),
    (
        37,
        'wake me up',
        '1588519070-electronica.mp3',
        '1588509433-wake me up.jpg',
        12,
        1200,
        900,
        1
    ),
    (
        45,
        'belive it',
        '1588516677-urban.mp3',
        '1589040811-1588509433-wake me up.jpg',
        14,
        100,
        80,
        1
    ),
    (
        46,
        'No guidance',
        '1588516683-urban.mp3',
        '1589040802-1588508546-Early One Morning.jpg',
        14,
        0,
        0,
        1
    );

-- --------------------------------------------------------
--
-- Table structure for table `music_category`
--
DROP TABLE IF EXISTS `music_category`;

CREATE TABLE `music_category` (
    `cat_id` int(11) NOT NULL,
    `cat_name` varchar(50) DEFAULT NULL,
    `status` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `music_category`
--
INSERT INTO
    `music_category` (`cat_id`, `cat_name`, `status`)
VALUES
    (9, 'Cinematic', 1),
    (10, 'Folk', 1),
    (11, 'Pop', 1),
    (12, 'Electronica', 1),
    (14, 'Urban', 1);

-- --------------------------------------------------------
--
-- Table structure for table `music_permission`
--
DROP TABLE IF EXISTS `music_permission`;

CREATE TABLE `music_permission` (
    `music_permission_id` int(11) NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `music_id` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `music_reviews`
--
DROP TABLE IF EXISTS `music_reviews`;

CREATE TABLE `music_reviews` (
    `review_id` int(11) NOT NULL,
    `review_txt` varchar(255) DEFAULT NULL,
    `music_id` int(11) DEFAULT NULL,
    `user_id` int(11) DEFAULT NULL,
    `status` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `orders`
--
DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
    `order_id` int(11) NOT NULL,
    `user_id` int(11) DEFAULT NULL,
    `owner` varchar(100) NOT NULL,
    `cvv` varchar(10) NOT NULL,
    `card_number` varchar(50) NOT NULL,
    `year` varchar(20) NOT NULL,
    `month` varchar(20) NOT NULL,
    `amount` int(11) NOT NULL,
    `status` int(11) NOT NULL,
    `cr_date` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `order_items`
--
DROP TABLE IF EXISTS `order_items`;

CREATE TABLE `order_items` (
    `order_item_id` int(11) NOT NULL,
    `order_id` int(11) DEFAULT NULL,
    `music_id` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    `user_id` int(11) NOT NULL,
    `user_name` varchar(50) DEFAULT NULL,
    `user_type` int(11) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `password` varchar(255) DEFAULT NULL,
    `user_image` varchar(100) NOT NULL,
    `status` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `users`
--
INSERT INTO
    `users` (
        `user_id`,
        `user_name`,
        `user_type`,
        `email`,
        `password`,
        `user_image`,
        `status`
    )
VALUES
    (
        6,
        'Faisal',
        1,
        'Admin@admin.com',
        'TVRJeg==',
        '1587733567-4.jpg',
        1
    );

-- --------------------------------------------------------
--
-- Table structure for table `user_type`
--
DROP TABLE IF EXISTS `user_type`;

CREATE TABLE `user_type` (
    `user_type_id` int(11) NOT NULL,
    `user_type_title` varchar(20) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `user_type`
--
INSERT INTO
    `user_type` (`user_type_id`, `user_type_title`)
VALUES
    (1, 'Admin'),
    (2, 'User');

--
-- Indexes for dumped tables
--
--
-- Indexes for table `cart`
--
ALTER TABLE
    `cart`
ADD
    PRIMARY KEY (`cart_item_id`),
ADD
    KEY `music_id` (`music_id`),
ADD
    KEY `user_id` (`user_id`);

--
-- Indexes for table `favorite_music`
--
ALTER TABLE
    `favorite_music`
ADD
    PRIMARY KEY (`fav_music_id`),
ADD
    KEY `music_id` (`music_id`),
ADD
    KEY `user_id` (`user_id`);

--
-- Indexes for table `music`
--
ALTER TABLE
    `music`
ADD
    PRIMARY KEY (`music_id`),
ADD
    KEY `music_category` (`music_category`);

--
-- Indexes for table `music_category`
--
ALTER TABLE
    `music_category`
ADD
    PRIMARY KEY (`cat_id`);

--
-- Indexes for table `music_permission`
--
ALTER TABLE
    `music_permission`
ADD
    PRIMARY KEY (`music_permission_id`),
ADD
    KEY `music_id` (`music_id`),
ADD
    KEY `user_id` (`user_id`);

--
-- Indexes for table `music_reviews`
--
ALTER TABLE
    `music_reviews`
ADD
    PRIMARY KEY (`review_id`),
ADD
    KEY `music_id` (`music_id`),
ADD
    KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE
    `orders`
ADD
    PRIMARY KEY (`order_id`),
ADD
    KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE
    `order_items`
ADD
    PRIMARY KEY (`order_item_id`),
ADD
    KEY `music_id` (`music_id`),
ADD
    KEY `order_id` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE
    `users`
ADD
    PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE
    `user_type`
ADD
    PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE
    `cart`
MODIFY
    `cart_item_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 23;

--
-- AUTO_INCREMENT for table `favorite_music`
--
ALTER TABLE
    `favorite_music`
MODIFY
    `fav_music_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 20;

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE
    `music`
MODIFY
    `music_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 47;

--
-- AUTO_INCREMENT for table `music_category`
--
ALTER TABLE
    `music_category`
MODIFY
    `cat_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 15;

--
-- AUTO_INCREMENT for table `music_permission`
--
ALTER TABLE
    `music_permission`
MODIFY
    `music_permission_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 11;

--
-- AUTO_INCREMENT for table `music_reviews`
--
ALTER TABLE
    `music_reviews`
MODIFY
    `review_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE
    `orders`
MODIFY
    `order_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 16;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE
    `order_items`
MODIFY
    `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE
    `users`
MODIFY
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 20;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE
    `user_type`
MODIFY
    `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 3;

--
-- Constraints for dumped tables
--
--
-- Constraints for table `cart`
--
ALTER TABLE
    `cart`
ADD
    CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`),
ADD
    CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `favorite_music`
--
ALTER TABLE
    `favorite_music`
ADD
    CONSTRAINT `favorite_music_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`) ON DELETE CASCADE,
ADD
    CONSTRAINT `favorite_music_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `music`
--
ALTER TABLE
    `music`
ADD
    CONSTRAINT `music_ibfk_1` FOREIGN KEY (`music_category`) REFERENCES `music_category` (`cat_id`) ON DELETE CASCADE;

--
-- Constraints for table `music_permission`
--
ALTER TABLE
    `music_permission`
ADD
    CONSTRAINT `music_permission_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`) ON DELETE CASCADE,
ADD
    CONSTRAINT `music_permission_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `music_reviews`
--
ALTER TABLE
    `music_reviews`
ADD
    CONSTRAINT `music_reviews_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`) ON DELETE CASCADE,
ADD
    CONSTRAINT `music_reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE
    `orders`
ADD
    CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE
    `order_items`
ADD
    CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`music_id`) REFERENCES `music` (`music_id`) ON DELETE CASCADE,
ADD
    CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;
