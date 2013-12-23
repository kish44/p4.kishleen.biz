-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2013 at 08:23 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kishleen_p4_kishleen_biz`
--
CREATE DATABASE IF NOT EXISTS `kishleen_p4_kishleen_biz` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kishleen_p4_kishleen_biz`;

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `venue` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `valid` text NOT NULL,
  `type` text NOT NULL,
  `result` text NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`post_id`, `created`, `modified`, `user_id`, `venue`, `address`, `lat`, `lng`, `valid`, `type`, `result`) VALUES
(31, 1387747876, 1387747876, 37, 'tandoor', '684 Old Bethpage Road, Old Bethpage, NY 11804, USA', 40.766266, -73.455963, '', '', ''),
(32, 1387813279, 1387813279, 37, '', '', 0.000000, 0.000000, '', '', ''),
(33, 1387814477, 1387814477, 37, '', '', 0.000000, 0.000000, '', '', ''),
(34, 1387814490, 1387814490, 37, '', '', 0.000000, 0.000000, '', '', ''),
(35, 1387814566, 1387814566, 37, '', '7', 0.000000, 0.000000, '', '', ''),
(36, 1387814577, 1387814577, 37, '', '70 tulip', 0.000000, 0.000000, '', '', ''),
(37, 1387814685, 1387814685, 37, '', '', 0.000000, 0.000000, '', '', ''),
(38, 1387814702, 1387814702, 37, '', '', 0.000000, 0.000000, '', '', ''),
(39, 1387814752, 1387814752, 37, '', '', 0.000000, 0.000000, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login` int(11) NOT NULL,
  `timezone` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `timezone`, `first_name`, `last_name`, `email`) VALUES
(37, 1383763645, 1383763645, '6e078a2b470469d2da6b102d35f8ffefd2b953a2', '66c7ce482658d1693f8dc316e774526071e8b48e', 0, '', 'k', 'k', 'k'),
(38, 1383763691, 1383763691, '574d6f9f0bd072d57c693d6e49b3de6ca778b915', '9cd3e2e17ed7ff148984a3c7996ce0af582aaddc', 0, '', 'l', 'l', 'l'),
(39, 1383764402, 1383764402, 'b6c2298fb2eea7b80e0a4ba72ec0bbd14d88abc8', '66c7ce482658d1693f8dc316e774526071e8b48e', 0, '', 'k', 'k', 'k'),
(40, 1383764468, 1383764468, 'ae5966406dec2f531728a019b2e43ca02199658f', 'be60db20c6be9ab1cf2dfc33b1e043eff1acec14', 0, '', 'L', 'L', 'L'),
(41, 1383764675, 1383764675, '9f159329d1187c98fe57c4a9cd8cd9396861daa4', 'ecb66beb8caf7151f77945f84b815f78eb3f3b8c', 0, '', 'kish', 'kish', 'webgrph@gmail.com'),
(42, 1383764699, 1383764699, '0f7fcb4281b9c5b3126f676dc8812d910d8f5cb7', 'eb6acfef34518ba72261e259ce50c0c9413d14d3', 0, '', 'lom', 'lom', 'webgrph@gmail.com'),
(43, 1383765026, 1383765026, '1b81e4e545664fa4efb3bb3251d8e62a4824b2c0', 'acef3f9df9b4f8ee64e05308e017c9632125b10c', 0, '', 'lol', 'lol', 'lol'),
(44, 1383765103, 1383765103, '7a6553cd9e028faa123f1a3d7714ad8760ae46d7', '44f2b9eb235ae3a1e0c2198b2e2af1b77805a128', 0, '', 'op', 'op', 'op'),
(45, 1383765664, 1383765664, '65dad3193ff83f0022ec6cf9c3fb19211302c64f', '34f14151898cce55f01f9210b4eade35242c5616', 0, '', 'jk', 'jk', 'jk'),
(46, 1383766060, 1383766060, '9de0e4d0b2f3206d9467237c0aec28d5afc1210c', 'eb00d01fe1d8d9d1f63e53d16350bc1fd75107fc', 0, '', 'the', 'anim', 'theanim111@gmail.com'),
(47, 1387320168, 1387320168, 'e69b7a3a59098d4292f455c995efa3f08ef3bd53', '1fbd73851fa3799c4a122414f9ff729233dd882a', 0, '', 'kk', 'kk', 'theanim191@gmail.com'),
(48, 1387816118, 1387816118, 'fdd135eeef8a348cdcb4a8fe14e64ffa8a41ebf8', '37a6783c02035477a78e9828f0c4148e900c7b40', 0, '', 'i', 'i', 'bgrph@gmail.com'),
(49, 1387816175, 1387816175, '14285c98581feebfff6a4bcbc53d5a692e94c177', '37a6783c02035477a78e9828f0c4148e900c7b40', 0, '', 'i', 'i', 'grph@gmail.com'),
(50, 1387816288, 1387816288, 'c2e651d29fe6d43ef44d9d5f5af816dc5bc88dfb', '9b92c3309821cde9e8c2e80908faaad81c981b00', 0, '', 'u', 'u', 'ud@gmail.com'),
(51, 1387818923, 1387818923, 'bebb0099816c00ae1a30988514a6c6d6f6d22c6f', '5406f47331015b499562bafba30e2eaa5849db40', 0, '', 'o', 'o', 'o@gmail.com'),
(52, 1387818989, 1387818989, 'fa87a636532ef7f9b4f4cbdc5c8dfbe5fbe215f8', '7a5383454222b45623ba7ebcf9b0e7bf14bc4baf', 0, '', 'p', 'p', 'p@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users_users`
--

CREATE TABLE IF NOT EXISTS `users_users` (
  `user_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'FK Follower',
  `user_id_followed` int(11) NOT NULL COMMENT 'Followed',
  PRIMARY KEY (`user_user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users_users`
--

INSERT INTO `users_users` (`user_user_id`, `created`, `user_id`, `user_id_followed`) VALUES
(8, 1383763645, 37, 37),
(9, 1383763691, 38, 38),
(10, 1383765026, 43, 43),
(11, 1383765103, 44, 44),
(12, 1383765664, 45, 45),
(13, 1383766060, 46, 46),
(14, 1387320168, 47, 47),
(15, 1387320223, 47, 38),
(16, 1387816118, 48, 48),
(17, 1387816175, 49, 49),
(18, 1387816288, 50, 50),
(19, 1387818924, 51, 51),
(20, 1387818989, 52, 52);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `markers`
--
ALTER TABLE `markers`
  ADD CONSTRAINT `markers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_users`
--
ALTER TABLE `users_users`
  ADD CONSTRAINT `users_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
