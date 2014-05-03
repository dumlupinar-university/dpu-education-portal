-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2014 at 01:12 AM
-- Server version: 5.1.70-log
-- PHP Version: 5.5.10-pl0-gentoo

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `CI_Education_Portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyingscreditslogs`
--

CREATE TABLE IF NOT EXISTS `buyingscreditslogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `coursecomments`
--

CREATE TABLE IF NOT EXISTS `coursecomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `course` (`course`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `teacher` int(11) NOT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `teacher` (`teacher`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `teacher`, `picture`, `status`) VALUES
(1, 'C', 3, 'resim34.png', 1),
(2, 'C++', 3, 'resim38.png', 0),
(3, 'Pyhton', 7, 'abc.png', 0),
(4, 'Java', 7, 'mat.png', 0),
(5, 'PHP', 3, 'burbir', 0),
(6, 'AutoCAD', 7, 'bende', 0),
(7, 'Spanish', 3, 'oldu.png', 0),
(8, 'Machine Learning', 8, 'maclearnpic.png', 0),
(10, 'css', 9, 'indir.jpg', 0),
(11, 'css2', 9, '0', 0),
(12, 'css3', 9, 'indir.jpg', 0),
(13, 'css4', 9, '9jpg', 0),
(14, 'css5', 9, '9.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coursescredits`
--

CREATE TABLE IF NOT EXISTS `coursescredits` (
  `course` int(11) NOT NULL,
  `creditforthree` float NOT NULL,
  `creditforsix` float NOT NULL,
  `creditforyear` float NOT NULL,
  `updateddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coursescredits`
--

INSERT INTO `coursescredits` (`course`, `creditforthree`, `creditforsix`, `creditforyear`, `updateddate`) VALUES
(1, 3, 5, 8, '2014-04-29 20:15:57'),
(2, 2, 3, 4, '2014-04-29 20:15:57'),
(3, 11, 14, 17, '2014-04-29 20:16:19'),
(4, 45, 67, 91, '2014-04-29 20:16:19'),
(5, 6, 8, 12, '2014-04-29 20:21:55'),
(6, 21, 31, 41, '2014-04-29 20:22:07'),
(7, 2, 3, 5, '2014-04-23 07:02:51'),
(8, 15, 25, 45, '2014-04-29 18:43:13'),
(10, 3, 4, 5, '2014-05-02 19:05:23'),
(11, 3, 4, 5, '2014-05-02 19:20:07'),
(12, 3, 4, 5, '2014-05-02 19:21:45'),
(13, 3, 4, 5, '2014-05-02 19:24:17'),
(14, 3, 4, 5, '2014-05-02 19:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `coursesinfos`
--

CREATE TABLE IF NOT EXISTS `coursesinfos` (
  `course` int(11) NOT NULL,
  `description` text NOT NULL,
  `createddate` timestamp NULL DEFAULT NULL,
  `updateddate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coursesinfos`
--

INSERT INTO `coursesinfos` (`course`, `description`, `createddate`, `updateddate`) VALUES
(1, 'This course provides all the informations to write C code', '2014-04-13 21:00:00', '2014-04-29 20:13:37'),
(2, 'This course provides all the informations to write C++ code\n\nPre requierements\nUnderstanding C programming Language', '2014-04-14 21:00:00', '2014-04-29 20:13:37'),
(3, 'This is a new age of PYTHONNN \n\nMaybe the best scripting and programming Language', '2014-04-15 21:00:00', '2014-04-29 20:15:09'),
(4, 'This is the new generation of the programming Languages. It is a platform indepented architecture..', '2014-04-24 21:00:00', '2014-04-29 20:15:09'),
(5, 'This is a internet programming lanuage. Todays most popular language is PHP  !', '2014-04-26 21:00:00', '2014-04-29 20:21:25'),
(6, 'AutoCad is so important for animation', '2014-04-27 21:00:00', '2014-04-29 20:21:25'),
(7, 'This course aims to teach how to speak spanish better with a native speaker', '0000-00-00 00:00:00', '2014-04-23 07:02:51'),
(8, 'This course provide all documentations for machine Learning', '0000-00-00 00:00:00', '2014-04-29 18:43:13'),
(10, 'sdfsdfsdf', '0000-00-00 00:00:00', '2014-05-02 19:05:23'),
(11, '', '0000-00-00 00:00:00', '2014-05-02 19:20:07'),
(12, 'sdaffa', '0000-00-00 00:00:00', '2014-05-02 19:21:45'),
(13, 'adsfasdfsdf', '0000-00-00 00:00:00', '2014-05-02 19:24:17'),
(14, 'daf', '0000-00-00 00:00:00', '2014-05-02 19:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `coursespoints`
--

CREATE TABLE IF NOT EXISTS `coursespoints` (
  `course` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `point` int(2) NOT NULL,
  KEY `course` (`course`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE IF NOT EXISTS `lectures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `key` varchar(25) NOT NULL,
  `status` int(1) DEFAULT '0',
  `createddate` timestamp NULL DEFAULT NULL,
  `updateddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `course` (`course`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`id`, `course`, `name`, `key`, `status`, `createddate`, `updateddate`, `description`) VALUES
(1, 4, 'giris video1', '', 0, NULL, '0000-00-00 00:00:00', 'bu giris videosudur'),
(2, 5, 'giris video 2', '', 0, NULL, '0000-00-00 00:00:00', 'bu giris videosudur'),
(3, 1, '0', '', 0, '2014-05-12 21:00:00', '0000-00-00 00:00:00', NULL),
(4, 1, 'furkan', 'oEic86pFMA9DxQ2G.', 0, NULL, '2014-05-02 23:41:15', 'deneme videosu'),
(5, 1, 'ikinci', 'Rrgdc01nWdgRptha.', 0, NULL, '2014-05-02 23:41:51', 'deenme iki'),
(6, 1, 'ucuncu', 'cEgzWvSGLSjRQAeP.mp4', 0, NULL, '2014-05-02 23:42:41', 'ucuncu deneme'),
(7, 1, 'dorduncu demee', 'pAcmgDBDNFcXMfGz.mp4', 0, NULL, '2014-05-02 23:44:53', 'sondeneme'),
(8, 1, 'derse giris', '20140128_111137.mp4', 0, NULL, '2014-05-02 23:49:19', 'basliyoruz'),
(9, 1, 'artıkyeterrrrr', '9BYKqB0pSvjX99Hk.mp4', 0, NULL, '2014-05-03 00:13:12', 'yeterr');

-- --------------------------------------------------------

--
-- Table structure for table `lecturesattachments`
--

CREATE TABLE IF NOT EXISTS `lecturesattachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `status` int(1) DEFAULT '0',
  `createddate` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `video` (`video`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loginlogs`
--

CREATE TABLE IF NOT EXISTS `loginlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `spendingscreditslogs`
--

CREATE TABLE IF NOT EXISTS `spendingscreditslogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teacherspoints`
--

CREATE TABLE IF NOT EXISTS `teacherspoints` (
  `teacher` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `point` int(2) NOT NULL,
  KEY `teacher` (`teacher`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `authority` int(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `authority`) VALUES
(1, 'frkn.ayar@gmail.com', 'bdc6a9d55a26ee383a9b5e7bf8e42c83', 'Furkan', 'Ayar', 3),
(2, 'possitivepower@gmail.com', '415ae98ff912c66eff863bc2d05656af', 'Deniz', 'Çetin', 1),
(3, 'ekrm@gmail.com', '22144a9164fddbec9813d5d838cb1c1f', 'Ekrem', 'Danli', 2),
(4, 'barmer@gmail.com', '95c6e6873a1ac44779e6f8a32c7375fb', 'Barış', 'Mercan', 1),
(5, 'aposarikaya@gmail.com', 'd93ec75bca4b7ef88df5a6c591654422', 'Abdullah', 'Sarıkaya', 1),
(6, 'burcukatirci@gmail.com', 'b4044e7ffeec47c12d87ce4ce803bcaa', 'Burcu', 'Katırcı', 1),
(7, 'mervesozer@gmail.com', 'e2c12942c11f3de5c965610c2fb75eda', 'Merve', 'Sözer', 2),
(8, 'tugayozturk@gmail.com', 'f8358d4d3fcf2f824a49926fff7989ed', 'Tugay', 'Öztürk', 2),
(9, 'oktayaydin@outlook.com.tr', 'eea0f105e38ae7cd6e124054d64cee9e', 'oktay', 'aydın', 2),
(14, 'oktaaydin6464@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'oktay', 'aydın', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usersactivationcodes`
--

CREATE TABLE IF NOT EXISTS `usersactivationcodes` (
  `email` varchar(25) NOT NULL,
  `activation_code` varchar(16) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersactivationcodes`
--

INSERT INTO `usersactivationcodes` (`email`, `activation_code`) VALUES
('oktaaydin6464@gmail.com', 'jFJxD9FjXdSxW5GE');

-- --------------------------------------------------------

--
-- Table structure for table `userscourses`
--

CREATE TABLE IF NOT EXISTS `userscourses` (
  `user` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `buyingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `validate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `user` (`user`),
  KEY `course` (`course`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userscourses`
--

INSERT INTO `userscourses` (`user`, `course`, `buyingdate`, `validate`) VALUES
(4, 4, '2014-04-26 22:35:59', '0000-00-00 00:00:00'),
(3, 5, '2014-04-26 22:35:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `userscredits`
--

CREATE TABLE IF NOT EXISTS `userscredits` (
  `user` int(11) NOT NULL,
  `credit` float DEFAULT '0',
  `creditlastchangedate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `user_2` (`user`),
  KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usersinfos`
--

CREATE TABLE IF NOT EXISTS `usersinfos` (
  `user` int(11) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `address` text,
  `photo` varchar(50) DEFAULT NULL,
  `cv` varchar(50) DEFAULT NULL,
  `description` text,
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userslogins`
--

CREATE TABLE IF NOT EXISTS `userslogins` (
  `user` int(11) NOT NULL,
  `registerdate` timestamp NULL DEFAULT NULL,
  `lastlogindate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyingscreditslogs`
--
ALTER TABLE `buyingscreditslogs`
  ADD CONSTRAINT `buyingscreditslogs_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `coursecomments`
--
ALTER TABLE `coursecomments`
  ADD CONSTRAINT `coursecomments_ibfk_1` FOREIGN KEY (`course`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `coursecomments_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacher`) REFERENCES `users` (`id`);

--
-- Constraints for table `coursescredits`
--
ALTER TABLE `coursescredits`
  ADD CONSTRAINT `coursescredits_ibfk_1` FOREIGN KEY (`course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `coursesinfos`
--
ALTER TABLE `coursesinfos`
  ADD CONSTRAINT `coursesinfos_ibfk_1` FOREIGN KEY (`course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `coursespoints`
--
ALTER TABLE `coursespoints`
  ADD CONSTRAINT `coursespoints_ibfk_1` FOREIGN KEY (`course`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `coursespoints_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `lectures`
--
ALTER TABLE `lectures`
  ADD CONSTRAINT `lectures_ibfk_1` FOREIGN KEY (`course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `lecturesattachments`
--
ALTER TABLE `lecturesattachments`
  ADD CONSTRAINT `lecturesattachments_ibfk_1` FOREIGN KEY (`video`) REFERENCES `lectures` (`id`);

--
-- Constraints for table `loginlogs`
--
ALTER TABLE `loginlogs`
  ADD CONSTRAINT `loginlogs_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `spendingscreditslogs`
--
ALTER TABLE `spendingscreditslogs`
  ADD CONSTRAINT `spendingscreditslogs_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `teacherspoints`
--
ALTER TABLE `teacherspoints`
  ADD CONSTRAINT `teacherspoints_ibfk_1` FOREIGN KEY (`teacher`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `teacherspoints_ibfk_2` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `usersactivationcodes`
--
ALTER TABLE `usersactivationcodes`
  ADD CONSTRAINT `usersactivationcodes_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`);

--
-- Constraints for table `userscourses`
--
ALTER TABLE `userscourses`
  ADD CONSTRAINT `userscourses_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `userscourses_ibfk_2` FOREIGN KEY (`course`) REFERENCES `courses` (`id`);

--
-- Constraints for table `userscredits`
--
ALTER TABLE `userscredits`
  ADD CONSTRAINT `userscredits_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `usersinfos`
--
ALTER TABLE `usersinfos`
  ADD CONSTRAINT `usersinfos_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

--
-- Constraints for table `userslogins`
--
ALTER TABLE `userslogins`
  ADD CONSTRAINT `userslogins_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
