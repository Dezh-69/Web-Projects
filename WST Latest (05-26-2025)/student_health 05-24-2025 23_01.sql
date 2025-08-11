-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 05:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `log_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `time_done` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`log_id`, `user_id`, `time_done`, `remark`) VALUES
(1, 'USER-0006', '2025-05-16 00:16:09', 'Took Pre-Test'),
(2, 'USER-0006', '2025-05-16 04:16:19', 'Took Post-Test'),
(3, 'USER-0006', '2025-05-17 00:16:25', 'Took Post-Test'),
(4, 'USER-0006', '2025-05-18 04:16:35', 'Took Post-Test'),
(5, 'USER-0006', '2025-05-19 02:16:40', 'Took Post-Test'),
(7, 'USER-0006', '2025-05-20 02:17:09', 'Took Post-Test'),
(8, 'USER-0006', '2025-05-21 02:17:02', 'Took Post-Test'),
(9, 'USER-0006', '2025-05-22 09:17:02', 'Took Post-Test'),
(10, 'USER-0006', '2025-05-23 09:17:02', 'Took Post-Test'),
(11, 'USER-0006', '2025-05-24 09:17:02', 'Took Post-Test'),
(12, 'USER-0007', '2025-05-24 13:45:07', 'Logged In'),
(13, 'USER-0007', '2025-05-24 13:53:46', 'Logged In'),
(14, 'USER-0007', '2025-05-24 13:53:50', 'Logged In'),
(15, 'USER-0007', '2025-05-24 13:55:44', 'Logged In'),
(16, 'USER-0007', '2025-05-24 13:55:50', 'Logged In'),
(17, 'USER-0007', '2025-05-24 13:55:55', 'Logged Out'),
(22, 'USER-0007', '2025-05-24 13:56:30', 'Logged In'),
(23, 'USER-0007', '2025-05-24 13:56:54', 'Logged Out'),
(24, 'USER-0007', '2025-05-24 13:58:01', 'Logged In'),
(25, 'USER-0007', '2025-05-24 14:28:49', 'Took Post-Test'),
(26, 'USER-0007', '2025-05-24 14:36:44', 'Logged Out'),
(27, 'USER-0007', '2025-05-24 14:37:20', 'Logged In'),
(28, 'USER-0007', '2025-05-24 14:42:43', 'Logged In'),
(29, 'USER-0007', '2025-05-24 14:53:33', 'Took Post-Test');

-- --------------------------------------------------------

--
-- Table structure for table `fitness_test`
--

CREATE TABLE `fitness_test` (
  `test_id` int(11) NOT NULL,
  `student_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `test-type` enum('pre-test','post-test') NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `body_mass_index` decimal(5,2) NOT NULL,
  `max_volume_of_oxygen` decimal(5,2) NOT NULL,
  `flexibility` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `agility` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `endurance` int(11) NOT NULL,
  `date-taken` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fitness_test`
--

INSERT INTO `fitness_test` (`test_id`, `student_id`, `test-type`, `height`, `weight`, `body_mass_index`, `max_volume_of_oxygen`, `flexibility`, `strength`, `agility`, `speed`, `endurance`, `date-taken`) VALUES
(1, 'ST-0001', 'pre-test', 1.71, 65.20, 22.40, 45.60, 3, 2, 3, 2, 3, '2025-01-15'),
(2, 'ST-0002', 'pre-test', 1.65, 55.10, 20.20, 42.30, 2, 3, 2, 3, 2, '2025-01-15'),
(3, 'ST-0003', 'pre-test', 1.76, 70.50, 22.80, 48.50, 3, 3, 3, 3, 3, '2025-01-15'),
(4, 'ST-0004', 'pre-test', 1.60, 50.80, 19.80, 40.20, 2, 2, 2, 2, 2, '2025-01-15'),
(5, 'ST-0005', 'pre-test', 1.80, 75.00, 23.10, 50.00, 4, 3, 4, 3, 4, '2025-01-15'),
(6, 'ST-0001', 'post-test', 1.71, 64.50, 22.10, 48.20, 4, 3, 4, 3, 4, '2025-05-15'),
(7, 'ST-0002', 'post-test', 1.65, 54.80, 20.00, 45.80, 3, 4, 3, 4, 3, '2025-05-15'),
(8, 'ST-0003', 'post-test', 1.76, 69.80, 22.50, 50.20, 4, 4, 4, 4, 4, '2025-05-15'),
(9, 'ST-0004', 'post-test', 1.61, 50.50, 19.60, 43.50, 3, 3, 3, 3, 3, '2025-05-15'),
(10, 'ST-0005', 'post-test', 1.81, 74.50, 22.90, 52.50, 4, 4, 4, 4, 4, '2025-05-15'),
(11, 'ST-0021', 'pre-test', 1.68, 62.50, 22.10, 44.50, 3, 3, 3, 3, 3, '2025-01-16'),
(12, 'ST-0022', 'pre-test', 1.62, 54.30, 20.80, 42.10, 2, 2, 2, 2, 2, '2025-01-16'),
(13, 'ST-0023', 'pre-test', 1.72, 67.80, 22.90, 47.60, 3, 3, 3, 3, 3, '2025-01-16'),
(14, 'ST-0024', 'pre-test', 1.58, 52.00, 20.80, 41.20, 2, 3, 2, 3, 2, '2025-01-16'),
(15, 'ST-0025', 'pre-test', 1.80, 73.50, 22.60, 49.50, 4, 4, 4, 4, 4, '2025-01-16'),
(16, 'ST-0021', 'post-test', 1.68, 61.90, 21.90, 47.20, 4, 4, 4, 4, 4, '2025-05-16'),
(17, 'ST-0022', 'post-test', 1.62, 53.90, 20.50, 44.80, 3, 3, 3, 3, 3, '2025-05-16'),
(18, 'ST-0023', 'post-test', 1.72, 67.00, 22.60, 50.10, 4, 4, 4, 4, 4, '2025-05-16'),
(19, 'ST-0024', 'post-test', 1.58, 51.50, 20.60, 43.00, 3, 3, 3, 3, 3, '2025-05-16'),
(20, 'ST-0025', 'post-test', 1.81, 72.80, 22.30, 52.00, 4, 4, 4, 4, 4, '2025-05-16'),
(21, 'ST-0006', 'pre-test', 1.69, 64.00, 22.40, 44.00, 3, 2, 3, 3, 2, '2025-01-16'),
(22, 'ST-0007', 'pre-test', 1.62, 56.00, 21.30, 41.50, 2, 3, 2, 2, 2, '2025-01-16'),
(23, 'ST-0008', 'pre-test', 1.77, 72.50, 23.10, 46.80, 3, 3, 3, 2, 3, '2025-01-16'),
(24, 'ST-0009', 'pre-test', 1.59, 51.00, 20.20, 39.90, 2, 2, 2, 3, 2, '2025-01-16'),
(25, 'ST-0010', 'pre-test', 1.81, 76.00, 23.20, 50.50, 4, 3, 4, 4, 4, '2025-01-16'),
(26, 'ST-0011', 'pre-test', 1.60, 52.00, 20.30, 40.50, 2, 2, 2, 2, 2, '2025-01-16'),
(27, 'ST-0012', 'pre-test', 1.72, 69.00, 23.30, 47.00, 3, 2, 3, 3, 3, '2025-01-16'),
(28, 'ST-0013', 'pre-test', 1.63, 57.50, 21.60, 43.10, 2, 3, 2, 2, 3, '2025-01-16'),
(29, 'ST-0014', 'pre-test', 1.78, 74.00, 23.30, 48.20, 3, 3, 3, 3, 3, '2025-01-16'),
(30, 'ST-0015', 'pre-test', 1.59, 50.50, 20.10, 39.50, 2, 2, 2, 2, 2, '2025-01-16'),
(31, 'ST-0016', 'pre-test', 1.70, 65.00, 22.50, 45.00, 3, 3, 3, 3, 3, '2025-01-16'),
(32, 'ST-0017', 'pre-test', 1.64, 58.00, 21.60, 42.00, 2, 3, 2, 2, 2, '2025-01-16'),
(33, 'ST-0018', 'pre-test', 1.74, 70.00, 23.10, 46.00, 3, 3, 3, 3, 3, '2025-01-16'),
(34, 'ST-0019', 'pre-test', 1.60, 53.00, 20.70, 41.00, 2, 2, 2, 2, 2, '2025-01-16'),
(35, 'ST-0020', 'pre-test', 1.82, 78.00, 23.50, 51.00, 4, 4, 4, 4, 4, '2025-01-16'),
(36, 'ST-0006', 'post-test', 1.69, 63.20, 22.10, 46.00, 4, 3, 4, 4, 3, '2025-05-16'),
(37, 'ST-0007', 'post-test', 1.62, 55.50, 21.10, 43.00, 3, 3, 3, 3, 3, '2025-05-16'),
(38, 'ST-0008', 'post-test', 1.77, 71.80, 22.90, 49.00, 4, 4, 4, 4, 4, '2025-05-16'),
(39, 'ST-0009', 'post-test', 1.59, 50.50, 20.00, 42.00, 3, 3, 3, 3, 3, '2025-05-16'),
(40, 'ST-0010', 'post-test', 1.81, 75.50, 23.00, 52.00, 4, 4, 4, 4, 4, '2025-05-16'),
(41, 'ST-0011', 'post-test', 1.60, 51.50, 20.10, 43.00, 3, 3, 3, 3, 3, '2025-05-16'),
(42, 'ST-0012', 'post-test', 1.72, 68.50, 23.10, 49.00, 4, 3, 4, 4, 4, '2025-05-16'),
(43, 'ST-0013', 'post-test', 1.63, 57.00, 21.40, 45.00, 3, 3, 3, 3, 3, '2025-05-16'),
(44, 'ST-0014', 'post-test', 1.78, 73.50, 23.10, 50.00, 4, 4, 4, 4, 4, '2025-05-16'),
(45, 'ST-0015', 'post-test', 1.59, 50.00, 19.90, 42.00, 3, 3, 3, 3, 3, '2025-05-16'),
(46, 'ST-0016', 'post-test', 1.70, 64.50, 22.30, 47.00, 4, 4, 4, 4, 4, '2025-05-16'),
(47, 'ST-0017', 'post-test', 1.64, 57.50, 21.30, 44.00, 3, 3, 3, 3, 3, '2025-05-16'),
(48, 'ST-0018', 'post-test', 1.74, 69.50, 22.90, 48.50, 4, 4, 4, 4, 4, '2025-05-16'),
(49, 'ST-0019', 'post-test', 1.60, 52.50, 20.50, 43.00, 3, 3, 3, 3, 3, '2025-05-16'),
(50, 'ST-0020', 'post-test', 1.82, 77.20, 23.30, 53.00, 4, 4, 4, 4, 4, '2025-05-16'),
(51, 'ST-0002', 'post-test', 1.65, 64.00, 23.51, 48.38, 3, 4, 3, 4, 3, '2025-05-24'),
(52, 'ST-0002', 'post-test', 1.65, 64.00, 23.51, 48.38, 3, 4, 3, 4, 3, '2025-05-24'),
(53, 'ST-0002', 'post-test', 1.65, 65.00, 23.88, 48.30, 3, 4, 3, 4, 3, '2025-05-24'),
(54, 'ST-0002', 'post-test', 1.65, 65.00, 23.88, 48.30, 3, 4, 3, 4, 3, '2025-05-24'),
(55, 'ST-0002', 'post-test', 1.65, 65.00, 23.88, 48.30, 3, 4, 3, 4, 3, '2025-05-24');

--
-- Triggers `fitness_test`
--
DELIMITER $$
CREATE TRIGGER `generate_test_id` BEFORE INSERT ON `fitness_test` FOR EACH ROW BEGIN
    DECLARE max_num INT DEFAULT 0;
    
    -- Find the maximum existing test number
    SELECT IFNULL(MAX(CAST(SUBSTRING(test_id, 6) AS UNSIGNED)), 0) INTO max_num
    FROM `fitness_test`
    WHERE test_id LIKE 'TEST-%';
    
    -- Set the new test_id in TEST-0001 format
    SET NEW.test_id = CONCAT('TEST-', LPAD(max_num + 1, 4, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `program_id` varchar(20) NOT NULL,
  `program_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`program_id`, `program_name`) VALUES
('BLIS', 'Bachelor of Library and Information Science'),
('BSIS', 'Bachelor of Science in Information Systems'),
('BSIT', 'Bachelor of Science in Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` varchar(10) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
('ROLE-0001', 'student'),
('ROLE-0002', 'teacher');

--
-- Triggers `role`
--
DELIMITER $$
CREATE TRIGGER `generate_role_id` BEFORE INSERT ON `role` FOR EACH ROW BEGIN
    DECLARE max_num INT DEFAULT 0;
    
    -- Find the maximum existing number
    SELECT IFNULL(MAX(CAST(SUBSTRING(role_id, 6) AS UNSIGNED)), 0) INTO max_num
    FROM `role`
    WHERE role_id LIKE 'ROLE-%';
    
    -- Set the new role_id in ROLE-0001 format
    SET NEW.role_id = CONCAT('ROLE-', LPAD(max_num + 1, 4, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_value` int(11) NOT NULL,
  `score_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`score_value`, `score_name`) VALUES
(1, 'Poor'),
(2, 'Fair'),
(3, 'Satisfactory'),
(4, 'Excellent');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` varchar(3) NOT NULL,
  `program_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `program_id`) VALUES
('1A', 'BLIS'),
('1A', 'BSIS'),
('1A', 'BSIT'),
('1B', 'BLIS'),
('1B', 'BSIS'),
('1B', 'BSIT'),
('2A', 'BLIS'),
('2A', 'BSIS'),
('2A', 'BSIT'),
('2B', 'BLIS'),
('2B', 'BSIS'),
('2B', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `student_sex` enum('Male','Female') NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_id`, `first_name`, `last_name`, `student_sex`, `age`) VALUES
('ST-0001', 'USER-0006', 'John', 'Doe', 'Male', 18),
('ST-0002', 'USER-0007', 'Jane', 'Smith', 'Female', 19),
('ST-0003', 'USER-0008', 'Michael', 'Johnson', 'Male', 20),
('ST-0004', 'USER-0009', 'Emily', 'Williams', 'Female', 18),
('ST-0005', 'USER-0010', 'David', 'Brown', 'Male', 19),
('ST-0006', 'USER-0011', 'Sarah', 'Jones', 'Female', 20),
('ST-0007', 'USER-0012', 'Robert', 'Garcia', 'Male', 18),
('ST-0008', 'USER-0013', 'Jennifer', 'Miller', 'Female', 19),
('ST-0009', 'USER-0014', 'William', 'Davis', 'Male', 20),
('ST-0010', 'USER-0015', 'Jessica', 'Rodriguez', 'Female', 18),
('ST-0011', 'USER-0016', 'Richard', 'Martinez', 'Male', 19),
('ST-0012', 'USER-0017', 'Lisa', 'Hernandez', 'Female', 20),
('ST-0013', 'USER-0018', 'Joseph', 'Lopez', 'Male', 18),
('ST-0014', 'USER-0019', 'Michelle', 'Gonzalez', 'Female', 19),
('ST-0015', 'USER-0020', 'Thomas', 'Wilson', 'Male', 20),
('ST-0016', 'USER-0021', 'Amanda', 'Anderson', 'Female', 18),
('ST-0017', 'USER-0022', 'Daniel', 'Thomas', 'Male', 19),
('ST-0018', 'USER-0023', 'Melissa', 'Taylor', 'Female', 20),
('ST-0019', 'USER-0024', 'Matthew', 'Moore', 'Male', 18),
('ST-0020', 'USER-0025', 'Stephanie', 'Jackson', 'Female', 19),
('ST-0021', 'USER-0026', 'Brandon', 'Lee', 'Male', 18),
('ST-0022', 'USER-0027', 'Olivia', 'Perez', 'Female', 19),
('ST-0023', 'USER-0028', 'Nathan', 'Kim', 'Male', 20),
('ST-0024', 'USER-0029', 'Sophia', 'Nguyen', 'Female', 18),
('ST-0025', 'USER-0030', 'Eric', 'Clark', 'Male', 19),
('ST-0026', 'USER-0031', 'Natalie', 'Wright', 'Female', 20),
('ST-0027', 'USER-0032', 'Tyler', 'Scott', 'Male', 18),
('ST-0028', 'USER-0033', 'Chloe', 'Adams', 'Female', 19),
('ST-0029', 'USER-0034', 'Ethan', 'Baker', 'Male', 20),
('ST-0030', 'USER-0035', 'Grace', 'Torres', 'Female', 18);

--
-- Triggers `student`
--
DELIMITER $$
CREATE TRIGGER `generate_student_id` BEFORE INSERT ON `student` FOR EACH ROW BEGIN
    DECLARE max_id INT DEFAULT 0;
    
    SELECT IFNULL(MAX(CAST(SUBSTRING(student_id, 5) AS UNSIGNED)), 0) INTO max_id
    FROM student;
    
    SET NEW.student_id = CONCAT('ST-', LPAD(max_id + 1, 4, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_section`
--

CREATE TABLE `student_section` (
  `student_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `section_id` varchar(3) NOT NULL,
  `program_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_section`
--

INSERT INTO `student_section` (`student_id`, `section_id`, `program_id`) VALUES
('ST-0001', '1A', 'BSIT'),
('ST-0002', '1A', 'BSIT'),
('ST-0003', '1B', 'BSIT'),
('ST-0004', '1B', 'BSIT'),
('ST-0005', '2A', 'BSIT'),
('ST-0006', '2A', 'BSIT'),
('ST-0007', '2B', 'BSIT'),
('ST-0008', '2B', 'BSIT'),
('ST-0009', '1A', 'BSIS'),
('ST-0010', '1A', 'BSIS'),
('ST-0011', '1B', 'BSIS'),
('ST-0012', '1B', 'BSIS'),
('ST-0013', '2A', 'BSIS'),
('ST-0014', '2A', 'BSIS'),
('ST-0015', '2B', 'BSIS'),
('ST-0016', '2B', 'BSIS'),
('ST-0017', '1A', 'BLIS'),
('ST-0018', '1A', 'BLIS'),
('ST-0019', '1B', 'BLIS'),
('ST-0020', '1B', 'BLIS'),
('ST-0021', '2A', 'BSIT'),
('ST-0022', '2A', 'BSIT'),
('ST-0023', '2B', 'BSIT'),
('ST-0024', '2B', 'BSIT'),
('ST-0025', '2A', 'BSIT'),
('ST-0026', '2A', 'BSIT'),
('ST-0027', '2B', 'BSIT'),
('ST-0028', '2B', 'BSIT'),
('ST-0029', '2A', 'BSIS'),
('ST-0030', '2A', 'BSIS');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `user_id`, `first_name`, `last_name`) VALUES
('TC-0001', 'USER-0001', 'Maria', 'Santos'),
('TC-0002', 'USER-0002', 'Juan', 'Cruz'),
('TC-0003', 'USER-0003', 'Lourdes', 'Reyes'),
('TC-0004', 'USER-0004', 'Antonio', 'Gonzales'),
('TC-0005', 'USER-0005', 'Carmen', 'Dela Cruz');

--
-- Triggers `teacher`
--
DELIMITER $$
CREATE TRIGGER `generate_teacher_id` BEFORE INSERT ON `teacher` FOR EACH ROW BEGIN
    DECLARE max_id INT DEFAULT 0;
    
    SELECT IFNULL(MAX(CAST(SUBSTRING(teacher_id, 5) AS UNSIGNED)), 0) INTO max_id
    FROM teacher;
    
    SET NEW.teacher_id = CONCAT('TC-', LPAD(max_id + 1, 4, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(20) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `role`) VALUES
('USER-0001', 'teacher1', 'ROLE-0002'),
('USER-0002', 'teacher2', 'ROLE-0002'),
('USER-0003', 'teacher3', 'ROLE-0002'),
('USER-0004', 'teacher4', 'ROLE-0002'),
('USER-0005', 'teacher5', 'ROLE-0002'),
('USER-0006', 'student1', 'ROLE-0001'),
('USER-0007', 'student2', 'ROLE-0001'),
('USER-0008', 'student3', 'ROLE-0001'),
('USER-0009', 'student4', 'ROLE-0001'),
('USER-0010', 'student5', 'ROLE-0001'),
('USER-0011', 'student6', 'ROLE-0001'),
('USER-0012', 'student7', 'ROLE-0001'),
('USER-0013', 'student8', 'ROLE-0001'),
('USER-0014', 'student9', 'ROLE-0001'),
('USER-0015', 'student10', 'ROLE-0001'),
('USER-0016', 'student11', 'ROLE-0001'),
('USER-0017', 'student12', 'ROLE-0001'),
('USER-0018', 'student13', 'ROLE-0001'),
('USER-0019', 'student14', 'ROLE-0001'),
('USER-0020', 'student15', 'ROLE-0001'),
('USER-0021', 'student16', 'ROLE-0001'),
('USER-0022', 'student17', 'ROLE-0001'),
('USER-0023', 'student18', 'ROLE-0001'),
('USER-0024', 'student19', 'ROLE-0001'),
('USER-0025', 'student20', 'ROLE-0001'),
('USER-0026', 'student21', 'ROLE-0001'),
('USER-0027', 'student22', 'ROLE-0001'),
('USER-0028', 'student23', 'ROLE-0001'),
('USER-0029', 'student24', 'ROLE-0001'),
('USER-0030', 'student25', 'ROLE-0001'),
('USER-0031', 'student26', 'ROLE-0001'),
('USER-0032', 'student27', 'ROLE-0001'),
('USER-0033', 'student28', 'ROLE-0001'),
('USER-0034', 'student29', 'ROLE-0001'),
('USER-0035', 'student30', 'ROLE-0001'),
('USER-0036', 'student21', 'ROLE-0001'),
('USER-0037', 'student22', 'ROLE-0001'),
('USER-0038', 'student23', 'ROLE-0001'),
('USER-0039', 'student24', 'ROLE-0001'),
('USER-0040', 'student25', 'ROLE-0001'),
('USER-0041', 'student26', 'ROLE-0001'),
('USER-0042', 'student27', 'ROLE-0001'),
('USER-0043', 'student28', 'ROLE-0001'),
('USER-0044', 'student29', 'ROLE-0001'),
('USER-0045', 'student30', 'ROLE-0001');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `generate_user_id` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
    DECLARE max_num INT DEFAULT 0;
    
    -- Find the maximum existing number
    SELECT IFNULL(MAX(CAST(SUBSTRING(user_id, 6) AS UNSIGNED)), 0) INTO max_num
    FROM `user`
    WHERE user_id LIKE 'USER-%';
    
    -- Set the new user_id in USER-0001 format
    SET NEW.user_id = CONCAT('USER-', LPAD(max_num + 1, 4, '0'));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `fitness_test`
--
ALTER TABLE `fitness_test`
  ADD PRIMARY KEY (`test_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `strength` (`strength`),
  ADD KEY `agility` (`agility`),
  ADD KEY `speed` (`speed`),
  ADD KEY `endurance` (`endurance`),
  ADD KEY `criterion` (`flexibility`,`strength`,`agility`,`speed`,`endurance`) USING BTREE;

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_value`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`,`program_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student_section`
--
ALTER TABLE `student_section`
  ADD KEY `section_id` (`section_id`,`program_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `fitness_test`
--
ALTER TABLE `fitness_test`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `activity_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `fitness_test`
--
ALTER TABLE `fitness_test`
  ADD CONSTRAINT `fitness_test_ibfk_1` FOREIGN KEY (`flexibility`) REFERENCES `score` (`score_value`),
  ADD CONSTRAINT `fitness_test_ibfk_2` FOREIGN KEY (`strength`) REFERENCES `score` (`score_value`),
  ADD CONSTRAINT `fitness_test_ibfk_3` FOREIGN KEY (`agility`) REFERENCES `score` (`score_value`),
  ADD CONSTRAINT `fitness_test_ibfk_4` FOREIGN KEY (`speed`) REFERENCES `score` (`score_value`),
  ADD CONSTRAINT `fitness_test_ibfk_5` FOREIGN KEY (`endurance`) REFERENCES `score` (`score_value`),
  ADD CONSTRAINT `fitness_test_ibfk_6` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `program` (`program_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `student_section`
--
ALTER TABLE `student_section`
  ADD CONSTRAINT `student_section_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_section_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`),
  ADD CONSTRAINT `student_section_ibfk_3` FOREIGN KEY (`program_id`) REFERENCES `section` (`program_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
