-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2023 at 12:14 AM
-- Server version: 5.6.51-log
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `PID` varchar(20) NOT NULL,
  `email` varchar(256) NOT NULL,
  `user` varchar(256) NOT NULL,
  `category` varchar(256) NOT NULL,
  `date` varchar(32) NOT NULL,
  `time` varchar(10) NOT NULL,
  `thumbnail` varchar(64) DEFAULT NULL,
  `file` varchar(64) DEFAULT NULL,
  `content` varchar(2048) NOT NULL,
  `status` varchar(6) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PID`, `email`, `user`, `category`, `date`, `time`, `thumbnail`, `file`, `content`, `status`) VALUES
('PID20230510005930739', 'admin@gmail.com', 'Prasant Chandra Poddar', 'Software Development', 'Tuesday, May 9, 2023', '00:59', './thumbnail/PID20230510005930739.jpg', ' ./files/PID20230510005930739.jpg', 'Software development refers to the process of designing, creating, testing, and maintaining software applications. It involves the use of various programming languages, frameworks, tools, and methodologies to create software that meets the needs of its users.\r\n\r\nThe software development process typically starts with gathering requirements from stakeholders, followed by designing the architecture and user interface of the software. Developers then write code, test the software to identify and fix bugs, and deploy it to production.\r\n\r\nThere are various approaches to software development, including the Waterfall model, Agile development, and DevOps. Each approach has its own advantages and disadvantages, and the choice of approach depends on the specific needs of the project.\r\n\r\nSoftware development plays a crucial role in modern society, as software applications are used in almost every industry and aspect of life. From business software to mobile apps, from video games to social media platforms, software development is essential to meet the ever-growing demands of users.', 'Posted'),
('PID20230510010531727', 'admin@gmail.com', 'Prasant Chandra Poddar', 'Android Development', 'Tuesday, May 9, 2023', '01:05', './thumbnail/PID20230510010531727.png', ' ./files/PID20230510010531727.jpg', 'Android development refers to the process of creating mobile applications for the Android operating system. Android is one of the most popular mobile operating systems in the world, with a market share of over 70%.\r\n\r\nAndroid development involves the use of the Java programming language and the Android Software Development Kit (SDK). Developers use these tools to create applications that can run on various Android devices, including smartphones, tablets, and smartwatches.\r\n\r\nThe Android development process starts with designing the user interface and the architecture of the application. Developers then write code, test the application on various devices and emulators, and deploy it to the Google Play Store.\r\n\r\nAndroid development also involves integrating various features and functionalities into the application, such as location-based services, push notifications, and in-app purchases. Developers can use various frameworks and libraries, such as React Native and Kotlin, to streamline the development process and create more robust applications.\r\n\r\nAndroid development is a rapidly growing field, with millions of applications available on the Google Play Store. As the use of mobile devices continues to grow, Android development will remain an essential skill for software developers.', 'Posted'),
('PID20230510041732827', 'prasantpoddar27@gmail.com', 'Ankit', 'Code Hunt', 'Wednesday, May 10, 2023', '04:17', './thumbnail/PID20230510041732827.png', ' ./files/PID20230510041732827.jpg', 'Code Event!', 'Posted'),
('PID20230517152353552', 'kumarbrajeah455@gmail.com', 'Brajesh Kumar', 'Dev Ops', 'Wednesday, May 17, 2023', '15:23', './thumbnail/PID20230517152353552.jpg', ' ./files/PID20230517152353552.webp', 'DevOps is a software development approach that combines development (Dev) and operations (Ops) teams to improve collaboration and efficiency throughout the software development lifecycle. It emphasizes close collaboration, communication, and integration between developers and operations personnel to streamline the process of building, testing, deploying, and maintaining software systems.\r\n\r\nThe main goal of DevOps is to enable faster and more reliable software delivery by breaking down the traditional silos between development and operations teams. It promotes a culture of automation, continuous integration, continuous delivery, and continuous monitoring.', 'Posted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(13) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `name`, `phone`) VALUES
('admin@gmail.com', '0000', 'Prasant Chandra Poddar', '78704844283'),
('cvavadsfvasdvasdva@gmail.com', '1234', 'Brajfsdh Kumar', '7832598745'),
('prasantdfasdf7@gmail.com', '2507', 'sadfdsaf dfsadf', '7845123657');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
