-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 07:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verify` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`, `created_at`, `verify`) VALUES
(1, 'Rajesh Khanal', 'admin@pcampus.edu.np', '12345678', '2022-06-08 05:01:41', 1),
(2, 'Bidhan Ghimire', 'bidhan@pcampus.edu.np', '12345678', '2022-01-07 10:03:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `status` enum('approved','pending','deleted') NOT NULL DEFAULT 'pending',
  `cus_id` int(11) NOT NULL,
  `int_id` int(11) NOT NULL,
  `workstatus` varchar(111) NOT NULL DEFAULT 'not interning',
  `applied` int(11) NOT NULL DEFAULT 0,
  `applied_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `status`, `cus_id`, `int_id`, `workstatus`, `applied`, `applied_at`) VALUES
(163, 'approved', 39, 97, 'not interning', 1, '2022-06-19'),
(164, 'approved', 40, 96, 'interning', 1, '2022-06-22'),
(166, 'approved', 39, 108, 'not interning', 1, '2022-06-23'),
(167, 'approved', 39, 109, 'not interning', 1, '2022-06-23'),
(170, 'approved', 42, 109, 'not interning', 1, '2022-06-23'),
(171, 'approved', 39, 110, 'not interning', 1, '2022-06-23'),
(172, 'approved', 39, 111, 'not interning', 1, '2021-06-07'),
(173, 'approved', 45, 107, 'not interning', 1, '2022-06-24'),
(174, 'approved', 1, 1, 'interning', 1, '2022-06-24'),
(176, 'approved', 2, 1, 'not interning', 1, '2022-06-24'),
(177, 'approved', 2, 2, 'interning', 1, '2022-06-24'),
(181, 'approved', 47, 115, 'interning', 1, '2022-08-24'),
(182, 'approved', 3, 115, 'interning', 1, '2022-08-25'),
(183, 'approved', 1, 115, 'interning', 1, '2022-08-25'),
(184, 'approved', 1, 116, 'interning', 1, '2022-08-25'),
(185, 'approved', 1, 117, 'not interning', 1, '2022-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address1` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` text NOT NULL,
  `deleted` int(50) NOT NULL DEFAULT 0,
  `otp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `password`, `address1`, `city`, `phone`, `deleted`, `otp`) VALUES
(1, 'Rajesh Khanal', '076bct099.rajesh@pcampus.edu.np', '12345678', 'Nawalparasi', 'Daldale', '9863244500', 0, 0),
(2, 'Saugat Poudel', '075bct101.saugat@pcampus.edu.np', '12345678', 'Lekhnath', 'Pokhara', '9762869449', 0, 0),
(3, 'Bidhan Ghimire', '076bct015.bidhan@pcampus.edu.np', '12345678', 'Nawalparasi', 'Gaindakot', '9847627633', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employer_account`
--

CREATE TABLE `employer_account` (
  `employer_id` int(11) NOT NULL,
  `employer_name` varchar(40) NOT NULL,
  `location` varchar(100) NOT NULL,
  `about_company` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer_account`
--

INSERT INTO `employer_account` (`employer_id`, `employer_name`, `location`, `about_company`) VALUES
(21, 'Versisk Nepal', 'Hattisar,Kathmandu,Nepal', 'Verisk Nepal is an IT support and software development company for risk analysis that operates a subsidiary of IOS, a risk analysis business. The company has also been looking after a foreign customer in Nepal since 2009, who focuses on software projects and business processes. This company does the design, development, testing, and maintenance of applications for customers. Verisk Nepal works with more than 300 professionals.\r\n\r\nVerisk Company is full of experts when it comes to handling and managing large amounts of data. They use both ORACLE and MSSQL and also use the OLTP and OLAP approach. With the increasing need for scalability, they also work with distributed processing architectures such as Hadoop and other MPP database systems such as Greenplum and Vertica. In addition, they pursue technologies related to entity resolution and text mining. Verisk Information Technologies is Nepal’s leading IT company on our list.\r\n\r\nVerisk Information Technologies is a software research and development center in a safe location in the Kathmandu Valley in Hattisar, Kathmandu, Nepal. Verisk Information Technology Company is a leader and trendsetter in the software industry in Nepal. It is a publicly-traded company that is listed on the NASDAQ stock exchange as VRSK. Verisk Analytics provides risk assessment and decision analysis services that help customers better understand and manage their own risk.'),
(22, 'Leapfrog Technology', 'Kathmandu,Nepal', 'Leapfrog Technology Inc. is one of the leading Nepalese company working in the field of artificial intelligence and healthcare. This company was founded in 2010. Leapfrog Technology Inc helps grow your business with the help of an AI solution. If you are looking for a digital healthcare product, Leapfrog may be the best option. Its mission is to be the best and most trusted technology services company to execute your digital vision.\r\n\r\nThey have instilled a culture of service, inclusion, and improvement of our people by constantly validating our own skills, programming, and processes measured by how happy you are. Leapfrog Technology is an established software development company with a vision to create world-class software and become a role model in Nepal.'),
(23, 'F1Soft International Pvt. Limited', 'Kathmandu,Nepal', 'F1Soft Nepal is Nepal’s leading fintech company serving over 90% of the country’s banks and financial institutions. Established in 2004, this company employs more than 200 people. F1Soft has worked in the field of software development and IT services since 2004. This company mainly focuses on the development of banking transactions such as mobile banking system, Internet banking system, tab banking system, Card Management System, and other digital systems.\r\n\r\nEsewa, a digital wallet and online payment system is the subsidiary company of F1Soft. Last year also saw the F1soft International group of companies enter the remittance industry by introducing its new subsidiary eSewa Money Transfer. Likewise, Banks and Financial Institutions were also targeted by new products such as MeroBachat and FoneCredit. They are a diversified Digital Financial Services (DFS) holding company with more than 16 years of operating experience in various iterations.\r\n\r\nThey have invested over a decade in DFS product and service innovation and are proud to have developed Nepal’s first online payment gateway and digital wallet. They are the pioneers in mobile banking and a trusted technology partner for more than 50 Nepalese banks and financial institutions.'),
(24, 'Worldlink Communications', 'Kathmandu,Nepal', 'WorldLink is the largest Internet and network service provider in Nepal and one of the leading IT companies. Founded in September 1995 with the objective of providing Internet and IT services by its current president and CEO, Dileep Agrawal. WorldLink began providing store-and-forward email services over a dial-up link to the Internet in the US in March 1997, WorldLink.\r\n\r\nThey believe in the quality of their work; our experience and knowledge allow us to offer personalized and professional solutions for your clients. They offer solutions that adapt to the different needs and budgets of current and potential clients.'),
(28, 'Google.org', 'USA', 'Google.org'),
(29, 'Amrit IT solution', 'Kathmandu', 'Hi we are testing the software');

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `id` int(11) NOT NULL,
  `employer_id` int(11) NOT NULL,
  `category` text NOT NULL,
  `postedOn` date NOT NULL DEFAULT current_timestamp(),
  `applyBy` date NOT NULL DEFAULT current_timestamp(),
  `aboutInternship` text NOT NULL DEFAULT 'Not Mentioned',
  `perks` text NOT NULL,
  `duration` int(100) NOT NULL,
  `stipend` varchar(100) NOT NULL DEFAULT 'Not Mentioned',
  `positions` int(11) NOT NULL,
  `whoCanApply` text NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT 0,
  `deleted` tinyint(4) NOT NULL DEFAULT 0,
  `interview_date` date DEFAULT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`id`, `employer_id`, `category`, `postedOn`, `applyBy`, `aboutInternship`, `perks`, `duration`, `stipend`, `positions`, `whoCanApply`, `featured`, `deleted`, `interview_date`, `url`) VALUES
(115, 21, 'Python Developer', '2022-08-03', '2022-08-23', 'Internship provides you an in-depth knowledge on Python Programming.  This internship enables the students to understand and learn the current trend in the job market. Students will  prefer internships to  build their profile for their jobs and also for their higher studies. Our company provides both offline and online internship for python. internship on python imparts technical and programming skills on the below list of python areas such as,\r\n\r\n \r\n\r\nPython Basics –  Python Programming, Python Installation\r\nPython Operations –  How to use python\r\nPython Machine Learning  – Machine learning with Python Programming , Algorithms& its implementation\r\nPython Data Science  – Data Science with Python Programming , Algorithms& its implementation\r\nPython Advanced  – OOPS , Class / Object python programs , Exception Handling in python\r\nPython Project – Step by step procedure in implementing python programming', 'Attractive salary and working environment', 3, '10000', 3, 'Anyone who is interested', 0, 0, '2022-08-23', ''),
(116, 22, 'Senior Full Stack Node/React JS Developer', '2022-08-25', '2022-08-30', 'At Leapfrog, our mission is to be a role model technology company. We want to be trusted partners, world-class engineers, and creative innovators for our clients. We have built well-crafted impactful software solutions for many industries and ecosystems.\r\n\r\nWe are looking for a Senior Engineer to join our engineering team. In this role, you will have the responsibility to understand and solve complex business and technical problems. ', 'Attractive salary and working environment', 4, '60000', 3, 'Anyone', 0, 0, '2022-08-30', 'https://www.lftechnology.com/'),
(117, 28, 'Database Engineer', '2022-08-25', '2022-08-26', 'This is the internship for database engineer in the reputed company google. You do not need to have any experience for this internship. Basic knowledge in the respective field is sufficient', 'Attractive salary and other facilities', 6, '20000', 4, 'Anyone who is interested', 0, 0, '2022-08-30', 'https://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_location`
--

CREATE TABLE `student_location` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `duration` varchar(20) DEFAULT NULL,
  `added_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_location`
--

INSERT INTO `student_location` (`id`, `name`, `email`, `company`, `address`, `category`, `duration`, `added_at`) VALUES
(59, 'Bidhan Ghimire', '076bct015.bidhan@pcampus.edu.np', 'Versisk Nepal', 'Hattisar,Kathmandu,Nepal', 'Python Developer', '3', '2022-08-25'),
(60, 'Rajesh Khanal', '076bct099.rajesh@pcampus.edu.np', 'Versisk Nepal', 'Hattisar,Kathmandu,Nepal', 'Python Developer', '3', '2022-08-25'),
(61, 'Rajesh Khanal', '076bct099.rajesh@pcampus.edu.np', 'Leapfrog Technology', 'Kathmandu,Nepal', 'Senior Full Stack Node/React JS Developer', '4', '2022-08-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `permission`, `join_date`, `last_login`) VALUES
(1, 'Sumeet Sharma', 'sksksharma0@gmail.com', 'password', 'admin,editor', '2018-10-06 01:00:34', '2018-10-03 09:12:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employer_account`
--
ALTER TABLE `employer_account`
  ADD PRIMARY KEY (`employer_id`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_location`
--
ALTER TABLE `student_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `employer_account`
--
ALTER TABLE `employer_account`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `student_location`
--
ALTER TABLE `student_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
