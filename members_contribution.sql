-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2026 at 05:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `members contribution`
--

CREATE TABLE IF NOT EXISTS `members contribution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_name` varchar(50) NOT NULL,
  `project_part` varchar(20) NOT NULL,
  `contribution_text` text NOT NULL,
  `quote_text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `members contribution`
--

TRUNCATE TABLE `members contribution`;
--
-- Dumping data for table `members contribution`
--

INSERT INTO `members contribution` (`id`, `member_name`, `project_part`, `contribution_text`, `quote_text`) VALUES
(3, 'Moss Whitehall', 'Project 1', 'Helped to organise the group structure and contributed to content planning.', 'This project helped me improve my teamwork and web development skills.'),
(4, 'Moss Whitehall', 'Project 2', 'Supported content refinement and helped finalise assigned sections.', 'Working with the group helped turn ideas into a finished website.'),
(5, 'Kanavpreet Multani', 'Project 1', 'Worked on the About page structure, content, and styling.', 'Working together has helped us turn our ideas into reality.'),
(6, 'Kanavpreet Multani', 'Project 2', 'Helped improve the member display section and final refinements.', 'This project gave me the chance to turn ideas into a real website.'),
(7, 'Vichetra Sam An', 'Project 1', 'Contributed to planning, website content, and collaboration.', 'This project helped me build confidence in designing and developing a website.'),
(8, 'Vichetra Sam An', 'Project 2', 'Helped finalise the project and supported content completion.', 'Working on FakeShop helped me improve my coding and teamwork.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
