-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2026 at 02:34 PM
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
-- Database: `jobslist_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobslisting`
--

CREATE TABLE `jobslisting` (
  `id` int(11) NOT NULL,
  `job_name` varchar(100) NOT NULL,
  `reference_number` int(11) NOT NULL,
  `job_type` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `job_description` text NOT NULL,
  `key_responsibilities` text NOT NULL,
  `essential_requirements` text NOT NULL,
  `preferred_requirements` text NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobslisting`
--

INSERT INTO `jobslisting` (`id`, `job_name`, `reference_number`, `job_type`, `location`, `salary`, `job_description`, `key_responsibilities`, `essential_requirements`, `preferred_requirements`, `category`) VALUES
(7, 'Back End Developer', 30027, 'Full-time', 'Hybrid', '$87,000 + Superannuation', 'Help FakeShop build and maintain a strong server-side logic, databases, and core functionality that keeps our online shop running smoothly. You will work behind the scenes to ensure that our website, customer accounts, systems, and ordering process all works properly.', 'Streamline the backend integrations of FakeShop and ensure that database entries are kept up to date and dont fall behind. Ensuring that databases are backed up along a schedule that ensures that entries arent at risk of being lost. Ensuring correct sanitisation standards in MySQL to ensure databases are secure from attacks such as SQL-Injection.', 'Understand MySQL. Be able to search for possible security risks such as SQL-Injection. Be committed to a full 24/7 call in for emergencies and be able to work from anywhere in the world. 5 Years experience required.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Back End Development'),
(8, 'Database Engineer', 30029, 'Full-time', 'Hybrid', '$87,000 + Superannuation', 'Help FakeShop manage and improve the data systems that run our online store, keep track of our inventory, and handle customer service. In this job, you will make sure that our internal systems, product data, sales records, and customer information are all correct, safe, and always available.', 'Streamline the backend integrations of FakeShop and ensure that database entries are kept up to date and dont fall behind. Ensuring that databases are backed up along a schedule that ensures that entries arent at risk of being lost. Ensuring correct sanitisation standards in MySQL to ensure databases are secure from attacks such as SQL-Injection.', 'Understand MySQL. Be able to search for possible security risks such as SQL-Injection. Be committed to a full 24/7 call in for emergencies and be able to work from anywhere in the world. 5 Years experience required.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Back End Development'),
(9, 'API Developer', 30032, 'Full-time', 'Hybrid', '$87,000 + Superannuation', 'FakeShop is currently seeking an API Developer to assist in the enhancement of our systems internal communication. In this position, you will be responsible for the development and maintenance of the APIs that facilitate the connection between our online store, inventory tools, payment systems, and customer features.', 'Streamline the backend integrations of FakeShop and ensure that database entries are kept up to date and dont fall behind. Ensuring that databases are backed up along a schedule that ensures that entries arent at risk of being lost. Ensuring correct sanitisation standards in MySQL to ensure databases are secure from attacks such as SQL-Injection.', 'Understand MySQL. Be able to search for possible security risks such as SQL-Injection. Be committed to a full 24/7 call in for emergencies and be able to work from anywhere in the world. 5 Years experience required.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Back End Development'),
(10, 'User Interface Designer', 10015, 'Full-time', 'Hybrid', '$75,000 + Superannuation', 'FakeShop looks for a User Interface (UI) Designer to assist in the development of a modern, user-friendly, and aesthetically pleasing online shopping experience. As a designer, you will ensure that all elements of our website and digital tools are user-friendly, visually appealing, and consistent with our brand.', 'Enhancing user experience and creating engaging web design.', 'Comfort in using CSS in a react framework. Be able to understand basic backend frameworks to ensure functionality between front end and backend elements. Minimum 10 years experience. Good communication skills. Ability to work independently and in small teams.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Front End Development'),
(11, 'Front End Developer', 10025, 'Full-time', 'Hybrid', '$75,000 + Superannuation', 'FakeShop is now seeking a Front-End Developer to assist in the development of user-friendly, modern, and seamless shopping experiences for our customers. In this role, you will build the parts of our website that shoppers see and interact with, from product pages to checkout flows.', 'Enhancing user experience and creating engaging web design.', 'Comfort in using CSS in a react framework. Be able to understand basic backend frameworks to ensure functionality between front end and backend elements. Minimum 10 years experience. Good communication skills. Ability to work independently and in small teams.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Front End Development'),
(12, 'Front End Software Engineer', 10025, 'Full-time', 'Hybrid', '$75,000 + Superannuation', 'Assist FakeShop in the development of a user-friendly, modern, and seamless purchasing experience for our Customers. In this role, you will build the parts of our website that shoppers see and interact with, from the product pages to checkout flows.', 'Enhancing user experience and creating engaging web design.', 'Comfort in using CSS in a react framework. Be able to understand basic backend frameworks to ensure functionality between front end and backend elements. Minimum 10 years experience. Good communication skills. Ability to work independently and in small teams.', 'Have used Jira as a project management tool. Be able to work overtime to complete work on time. Although this is primarily a remote position, it would be nice if you would be able to come into the office in Melbourne CBD at least once a week for group meetings/fun get togethers.', 'Front End Development'),
(13, 'Customer Support', 20001, 'Full-time', 'Remote', '$75,000 + Superannuation', 'Listening to customers questions and concerns and providing answers or responses.', 'Listening to customers questions and concerns and providing answers or responses.', 'Strong communication skills. Patience is always key. Knowledge of the company (Dont worry you will learn). Problem solving skills.', '1 Year Experience. Adaptability.', 'Servicing Customers');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobslisting`
--
ALTER TABLE `jobslisting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobslisting`
--
ALTER TABLE `jobslisting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
