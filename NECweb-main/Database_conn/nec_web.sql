-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.2:3307
-- Generation Time: Mar 24, 2023 at 08:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nec_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `enrollment_number` varchar(255) NOT NULL,
  `attendance` char(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `session` varchar(255) NOT NULL,
  `semester` int(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`enrollment_number`, `attendance`, `date`, `session`, `semester`, `faculty_id`) VALUES
('AI201006', '', '2023-03-04 02:21:07', 'Dec-22 to May-23', 6, '1s'),
('AI201025', '', '2023-03-04 02:21:07', 'Dec-22 to May-23', 6, '1s'),
('AI201062', '', '2023-03-04 02:22:19', 'Dec-22 to May-23', 6, '1s'),
('CE201035', '', '2023-03-04 02:22:19', 'Dec-22 to May-23', 6, '1s'),
('CS201006', '', '2023-03-04 02:23:36', 'Dec-22 to May-23', 6, '1s'),
('CS201013', '', '2023-03-04 02:23:36', 'Dec-22 to May-23', 6, '1s'),
('CS211012', '', '2023-03-04 02:24:45', 'Dec-22 to May-23', 4, '1s'),
('CS211045', '', '2023-03-04 02:15:16', 'Dec-22 to May-23', 4, '1s'),
('EC211041', '', '2023-03-04 02:15:16', 'Dec-22 to May-23', 4, '1s'),
('EE211063', '', '2023-03-04 02:16:25', 'Dec-22 to May-23', 4, '1s'),
('EE211069', '', '2023-03-04 02:16:25', 'Dec-22 to May-23', 4, '1s'),
('ET201039', '', '2023-03-04 02:17:48', 'Dec-22 to May-23', 6, '1s'),
('ET211041', '', '2023-03-04 02:17:48', 'Dec-22 to May-23', 4, '1s'),
('IT201018', '', '2023-03-04 02:19:36', 'Dec-22 to May-23', 6, '1s'),
('IT201058', '', '2023-03-04 02:24:45', 'Dec-22 to May-23', 6, '1s'),
('IT211048', '', '2023-03-04 02:31:27', 'Dec-22 to May-23', 4, '1s'),
('MC201012', '', '2023-03-04 02:31:27', 'Dec-22 to May-23', 6, '1s'),
('MC211013', '', '2023-03-04 02:34:18', 'Dec-22 to May-23', 4, '1s'),
('MC211059', '', '2023-03-04 02:34:18', 'Dec-22 to May-23', 4, '1s'),
('MC211085', '', '2023-03-04 02:34:47', 'Dec-22 to May-23', 4, '1s');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `mentor_dept` varchar(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `mentor_dept`, `faculty_id`) VALUES
('201', 'Software Development', 'DATA RESOURCE', '1s'),
('301', 'Adobe Photoshop', 'Mechanical Dept.', '1s');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` date NOT NULL,
  `contact` int(14) NOT NULL,
  `department` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `email`, `password`, `name`, `gender`, `age`, `contact`, `department`, `image`) VALUES
('1s', 'atul@gmail.com', 'atul', 'Atul Chauhan', 'M', '1990-04-17', 78450000, 'DATA RESOURCES', 'atul.jpeg'),
('2s', 'atulkumar@gmail.com', 'atulkumar', 'Atul Kumar Ray', 'male', '2023-03-01', 985478456, 'MAC', 'AtulKumar.jpeg'),
('3s', 'prabhakar@gmail.com', 'prabhakar', 'Prabhakar Sharma', 'male', '0000-00-00', 854965451, 'MAC', 'Prabhkar.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_verification`
--

CREATE TABLE `faculty_verification` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  `otp_expiry` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `enrollment_number` varchar(255) NOT NULL,
  `semester` int(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `assessment_marks` int(255) NOT NULL,
  `attendance_marks` int(255) NOT NULL,
  `feedback_marks` int(255) NOT NULL,
  `total_marks` int(255) DEFAULT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`enrollment_number`, `semester`, `session`, `assessment_marks`, `attendance_marks`, `feedback_marks`, `total_marks`, `faculty_id`, `course_id`) VALUES
('AI201006', 6, 'Dec-22 to May-23', 0, 0, 0, 45, '1s', '201'),
('AI201025', 6, 'Dec-22 to May-23', 0, 0, 0, 44, '1s', '301'),
('AI201062', 6, 'Dec-22 to May-23', 0, 0, 0, 42, '1s', '201'),
('CE201035', 6, 'Dec-22 to May-23', 0, 0, 0, 39, '1s', '301'),
('CS201006', 6, 'Dec-22 to May-23', 0, 0, 0, 40, '1s', '201'),
('CS201013', 6, 'Dec-22 to May-23', 0, 0, 0, 49, '1s', '301'),
('CS211012', 4, 'Dec-22 to May-23', 0, 0, 0, 35, '1s', '301'),
('CS211045', 4, 'Dec-22 to May-23', 0, 0, 0, 29, '1s', '201'),
('EC2110041', 4, 'Dec-22 to May-23', 0, 0, 0, 38, '1s', '301'),
('EE211063', 4, 'Dec-22 to May-23', 0, 0, 0, 50, '1s', '201'),
('EE211069', 4, 'Dec-22 to May-23', 0, 0, 0, 48, '1s', '301'),
('ET201039', 6, 'Dec-22 to May-23', 0, 0, 0, 48, '1s', '201'),
('ET211041', 4, 'Dec-22 to May-23', 0, 0, 0, 47, '1s', '201'),
('IT201018', 6, 'Dec-22 to May-23', 0, 0, 0, 47, '1s', '301'),
('IT201058', 6, 'Dec-22 to May-23', 0, 0, 0, 46, '1s', '201'),
('IT211048', 4, 'Dec-22 to May-23', 0, 0, 0, 50, '1s', '201'),
('MC201012', 6, 'Dec-22 to May-23', 0, 0, 0, 45, '1s', '301'),
('MC211013', 4, 'Dec-22 to May-23', 0, 0, 0, 47, '1s', '301'),
('MC211059', 4, 'Dec-22 to May-23', 0, 0, 0, 47, '1s', '201'),
('MC211085', 4, 'Dec-22 to May-23', 0, 0, 0, 25, '1s', '301');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `enrollment_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `semester` int(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `faculty_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`enrollment_number`, `name`, `email`, `password`, `semester`, `session`, `faculty_id`) VALUES
('AI201006', 'Amit ', 'amit@gmail.com', 'amit', 6, 'Dec-22 to May-23', '1s'),
('AI201025', 'Anand Gupta', 'anand@gmail.com', 'anand', 6, 'Dec-22 to May-23', '1s'),
('AI201062', 'Deepak Yadav', 'deepak@gmail.com', 'deepak', 6, 'Dec-22 to May-23', '1s'),
('CE201035', 'Ayushman Khurana', 'ayushman@gmail.com', 'ayushman', 6, 'Dec-22 to May-23', '1s'),
('CS201006', 'Anjali Parmar', 'amjali@gmail.com', 'anjali', 6, 'Dec-22 to May-23', '1s'),
('CS201013', 'Anurag Dubey', 'anurag@gmail.com', 'anurag', 6, 'Dec-22 to May-23', '1s'),
('CS211012', 'Abhikar Neekhra', 'abhikar@gmail.com', 'abhikar', 4, 'Dec-22 to May-23', '1s'),
('CS211045', 'Poornika Sharma ', 'poornika@gmail.com', 'poornika', 4, 'Dec-2022 to May-2023', '1s'),
('EC211041', 'Harshit Shrivas', 'harshit@gmail.com', 'harshit', 4, 'Dec-22 to May-23', '1s'),
('EE211063', 'Kapil Sharma', 'kapil@gmail.com', 'kapil', 4, 'Dec-22 to May-23', '1s'),
('EE211069', 'Kani Luthra', 'kani@gmail.com', 'kani', 4, 'Dec-22 to May-23', '1s'),
('ET201039', 'Amrata Gupta', 'amrata@gmail.com', 'amrata', 6, 'Dec-22 to May-23', '1s'),
('ET211041', 'Harsh Shrivastava', 'harsh@gmail.com', 'harsh', 4, 'Dec-22 to May-23', '1s'),
('IT201018', 'Manju Jain', 'manju@gmail.com', 'manju', 6, 'Dec-22 to May-23', '1s'),
('IT201058', 'Saurabh Mishra', 'saurabh@gmail.com', 'saurabh', 6, 'Dec-22 to May-23', '1s'),
('IT211048', 'Rajat Sharma', 'rajat@gmail.com', 'rajat', 4, 'Dec-22 to May-23', '1s'),
('MC201012', 'Ayushi Jain', 'ayushi@gmail.com', 'ayushi', 6, 'Dec-22 to May-23', '1s'),
('MC211013', 'Anuj Rathor', 'anuj@gmail.com', 'anuj', 4, 'Dec-22 to May-23', '1s'),
('MC211059', 'Shivam Singh', 'shivam@gmail.com', 'shivam', 4, 'Dec-22 to May-23', '1s'),
('MC211085', 'Harish Chandra', 'harish@gmail.com', 'harish', 4, 'Dec-22 to May-23', '1s');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`enrollment_number`,`date`),
  ADD KEY `foreign_key` (`faculty_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `foreign key` (`faculty_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `faculty_verification`
--
ALTER TABLE `faculty_verification`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`enrollment_number`,`semester`,`session`),
  ADD KEY `faculty__id` (`faculty_id`),
  ADD KEY `foreign__key` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`enrollment_number`,`session`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `foreign_key` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `faculty__id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `foreign__key` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
