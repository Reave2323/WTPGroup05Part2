-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2026 at 01:23 PM
-- Server version: 12.2.2-MariaDB
-- PHP Version: 8.5.6

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
-- Table structure for table `Eoi`
--

CREATE TABLE IF NOT EXISTS `Eoi` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `reference_number` int(5) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `addr` text NOT NULL,
  `country_state` varchar(15) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `other_skills` text DEFAULT NULL,
  `post_date` timestamp NULL DEFAULT current_timestamp(),
  `Status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `Eoi`
--

TRUNCATE TABLE `Eoi`;
--
-- Dumping data for table `Eoi`
--

INSERT INTO `Eoi` (`id`, `reference_number`, `fname`, `lname`, `dob`, `email`, `phone`, `gender`, `addr`, `country_state`, `skills`, `other_skills`, `post_date`, `Status`) VALUES
(11, 30027, 'Moss', 'Whitehal', '11/07/2007', '106507235@student.swin.edu.au', 480189325, 'Male', '9 wakup street, Hawthorne, 3005', 'VIC', 'HTML, JIRA, CSS, Javascript, PHP, MySQL, Communication, ProblemSolvingSkills', 'TEST MANAGER PORTAL DISPLAY', '2026-05-26 10:31:17', 1),
(12, 30027, 'Quandail', 'Dingle', '28/01/1923', 'someone@gmail.com', 482321459, 'Male', '1 Dingell Street, Quandaltown, 1002', 'ACT', 'HTML, JIRA, CSS, Javascript, PHP, MySQL, Communication, ProblemSolvingSkills', 'I can dingelberry', '2026-05-26 12:23:24', 1),
(13, 30027, 'Quandail', 'Dingle', '28/01/1923', 'someone@gmail.com', 482321459, 'Male', '1 Dingell Street, Quandaltown, 1002', 'ACT', 'HTML, JIRA, CSS, Javascript, PHP, MySQL, Communication, ProblemSolvingSkills', 'I can dingelberry\r\nWith Phone Number Validation', '2026-05-26 12:59:21', 1),
(14, 30027, 'Quandail', 'Dingle', '28/01/1927', 'someone@gmail.com', 48232145, 'Male', '1 Dingell Street, Quandaltown, 1002', 'ACT', 'HTML, JIRA, CSS, Javascript, PHP, MySQL, Communication, ProblemSolvingSkills', 'I can dingelberry\r\nWith Phone Number Validation', '2026-05-26 13:08:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobslisting`
--

CREATE TABLE IF NOT EXISTS `jobslisting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_name` varchar(100) NOT NULL,
  `reference_number` int(11) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `job_description` text NOT NULL,
  `key_responsibilities` text NOT NULL,
  `essential_requirements` text NOT NULL,
  `preferred_requirements` text NOT NULL,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `jobslisting`
--

TRUNCATE TABLE `jobslisting`;
--
-- Dumping data for table `jobslisting`
--

INSERT INTO `jobslisting` (`id`, `job_name`, `reference_number`, `job_type`, `location`, `salary`, `job_description`, `key_responsibilities`, `essential_requirements`, `preferred_requirements`, `category`) VALUES
(7, 'Back End Developer', 30027, 'Full-time', 'Hybrid', '$87,000 + Superannuation', 'Help FakeShop build and maintain a strong server-side logic, databases, and core functionality that keeps our online shop running smoothly. You will work behind the scenes to ensure that our website, customer accounts, systems, and ordering process all works properly.', 'Streamline the backend integrations of FakeShop and ensure that database entries are kept up to date and dont fall behind. Ensuring that databases are backed up along a schedule that ensures that entries arent at risk of being lost. Ensuring correct sanitisation standards in MySQL to ensure databases are secure from attacks such as SQL-Injection.', 'Understand MySQL. Be able to search for possible security risks such as SQL-Injection. Be committed to a full 24/7 call in for emergencies and be able to work from anywhere in the world. 5 Years experience required.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Back End Development'),
(8, 'Database Engineer', 30029, 'Full-time', 'Hybrid', '$87,000 + Superannuation', 'Help FakeShop manage and improve the data systems that run our online store, keep track of our inventory, and handle customer service. In this job, you will make sure that our internal systems, product data, sales records, and customer information are all correct, safe, and always available.', 'Streamline the backend integrations of FakeShop and ensure that database entries are kept up to date and dont fall behind. Ensuring that databases are backed up along a schedule that ensures that entries arent at risk of being lost. Ensuring correct sanitisation standards in MySQL to ensure databases are secure from attacks such as SQL-Injection.', 'Understand MySQL. Be able to search for possible security risks such as SQL-Injection. Be committed to a full 24/7 call in for emergencies and be able to work from anywhere in the world. 5 Years experience required.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Back End Development'),
(9, 'API Developer', 30032, 'Full-time', 'Hybrid', '$87,000 + Superannuation', 'FakeShop is currently seeking an API Developer to assist in the enhancement of our systems internal communication. In this position, you will be responsible for the development and maintenance of the APIs that facilitate the connection between our online store, inventory tools, payment systems, and customer features.', 'Streamline the backend integrations of FakeShop and ensure that database entries are kept up to date and dont fall behind. Ensuring that databases are backed up along a schedule that ensures that entries arent at risk of being lost. Ensuring correct sanitisation standards in MySQL to ensure databases are secure from attacks such as SQL-Injection.', 'Understand MySQL. Be able to search for possible security risks such as SQL-Injection. Be committed to a full 24/7 call in for emergencies and be able to work from anywhere in the world. 5 Years experience required.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Back End Development'),
(10, 'User Interface Designer', 10015, 'Full-time', 'Hybrid', '$75,000 + Superannuation', 'FakeShop looks for a User Interface (UI) Designer to assist in the development of a modern, user-friendly, and aesthetically pleasing online shopping experience. As a designer, you will ensure that all elements of our website and digital tools are user-friendly, visually appealing, and consistent with our brand.', 'Enhancing user experience and creating engaging web design.', 'Comfort in using CSS in a react framework. Be able to understand basic backend frameworks to ensure functionality between front end and backend elements. Minimum 10 years experience. Good communication skills. Ability to work independently and in small teams.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Front End Development'),
(11, 'Front End Developer', 10025, 'Full-time', 'Hybrid', '$75,000 + Superannuation', 'FakeShop is now seeking a Front-End Developer to assist in the development of user-friendly, modern, and seamless shopping experiences for our customers. In this role, you will build the parts of our website that shoppers see and interact with, from product pages to checkout flows.', 'Enhancing user experience and creating engaging web design.', 'Comfort in using CSS in a react framework. Be able to understand basic backend frameworks to ensure functionality between front end and backend elements. Minimum 10 years experience. Good communication skills. Ability to work independently and in small teams.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Front End Development'),
(12, 'Front End Software Engineer', 10026, 'Full-time', 'Hybrid', '$75,000 + Superannuation', 'Assist FakeShop in the development of a user-friendly, modern, and seamless purchasing experience for our Customers. In this role, you will build the parts of our website that shoppers see and interact with, from the product pages to checkout flows.', 'Enhancing user experience and creating engaging web design.', 'Comfort in using CSS in a react framework. Be able to understand basic backend frameworks to ensure functionality between front end and backend elements. Minimum 10 years experience. Good communication skills. Ability to work independently and in small teams.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Front End Development'),
(13, 'Customer Support', 20001, 'Full-time', 'Remote', '$75,000 + Superannuation', 'Listening to customers questions and concerns and providing answers or responses.', 'Listening to customers questions and concerns and providing answers or responses.', 'Strong communication skills. Patience is always key. Knowledge of the company (Dont worry you will learn). Problem solving skills.', '1 Year Experience. Adaptability.', 'Servicing Customers');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `User ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`User ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Truncate table before insert `users`
--

TRUNCATE TABLE `users`;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User ID`, `Username`, `Password`, `is_admin`, `is_active`) VALUES
(1, 'admin', '$2y$12$yhH/yTmjJqPkN0UfsgCeXOi426RdVKolgNjGJP6Jv7SQSobX2FJfa', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
