-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 08:23 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `school_id`, `teacher_id`, `subject_id`, `paper_id`, `class`, `date`, `status`) VALUES
(1, 1, 3, 1, 3, 1, '2020-07-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `created_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `user_id`, `school_id`, `teacher_id`, `subject_id`, `class_name`, `created_date`) VALUES
(1, 2, 1, 3, 1, '1', '2020-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `created_date` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `user_id`, `class_name`, `created_date`) VALUES
(1, 2, 'dd', '2020-07-17 17:06:07'),
(2, 2, 'sss', '2020-07-17 17:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `founder`
--

CREATE TABLE `founder` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `founder`
--

INSERT INTO `founder` (`id`, `user_id`, `school_id`, `created_date`) VALUES
(1, 28, 1, '2020-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `objectives`
--

CREATE TABLE `objectives` (
  `id` int(11) NOT NULL,
  `testpaper_id` int(11) NOT NULL,
  `question` longtext NOT NULL,
  `opt_a` varchar(255) NOT NULL,
  `opt_b` varchar(255) NOT NULL,
  `opt_c` varchar(255) NOT NULL,
  `opt_d` varchar(255) NOT NULL,
  `ans` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objectives`
--

INSERT INTO `objectives` (`id`, `testpaper_id`, `question`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `ans`, `status`) VALUES
(1, 2, 'dfdsfsdf', 'a', 'b', 'd', 'e', '', 0),
(2, 3, 'Who is Neta Subash Chandra Bosh?', 'a', 'b', 'c', 'd', 'a', 1),
(3, 3, 'What is Noun?', 'a', 'b', 'c', 'd', 'c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_session` varchar(30) NOT NULL DEFAULT '',
  `image` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `user_id`, `school_name`, `school_session`, `image`, `date`) VALUES
(1, 2, 'samar', '2020-21', '7858314156community.jpg', '2020-07-11'),
(3, 6, 'Sanji School', '2021-22', '4808712july.jpg', '2020-07-13'),
(4, NULL, 'Anshu School Ayodhya', '2023-24', '6345612july.jpg', '2020-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_sid` int(11) NOT NULL,
  `classes_id` int(11) NOT NULL,
  `created_at` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `role`, `school_id`, `user_sid`, `classes_id`, `created_at`) VALUES
(3, 4, 1, 10, 2, '2020-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subject_name` varchar(200) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `user_id`, `subject_name`, `create_date`) VALUES
(1, 2, 'English', '2020-07-11'),
(2, 2, 'Hindi', '2020-07-11'),
(3, 2, 'Math', '2020-07-11'),
(4, 2, 'dd', '2020-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `school_id`, `class_id`, `subject_id`, `teacher_id`, `role`) VALUES
(2, 1, 1, 2, 7, '3'),
(3, 1, 2, 3, 8, '3');

-- --------------------------------------------------------

--
-- Table structure for table `testpapers`
--

CREATE TABLE `testpapers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testpapers`
--

INSERT INTO `testpapers` (`id`, `user_id`, `subject_id`, `class`, `title`, `status`) VALUES
(1, 1, 1, 0, 'Three Floor House Design', 0),
(2, 1, 1, 0, 'mechanical', 0),
(3, 3, 1, 1, 'mechanical', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(11) NOT NULL COMMENT '1:Superadmin 2:founder 3:teacher',
  `mobile` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `class` int(11) DEFAULT NULL,
  `join_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `mobile`, `image`, `class`, `join_date`) VALUES
(1, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '9616499322', NULL, 0, ''),
(2, 'founder2', 'founder1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '8090680425', NULL, 0, '2020-07-13'),
(3, 'samer teacher', 't@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '3', '09616499322', '8816427032community.jpg', 0, '2020-07-11'),
(4, 'student', 's@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '4', '09616499322', '2879085571hat.png', 1, '2020-07-11'),
(6, 'asr_accounts', 'sanjiv@essglobal.com', 'd41d8cd98f00b204e9800998ecf8427e', '2', '9115646334', NULL, 0, '2020-07-13'),
(7, 'tecg', 'sanjiv@csdsd.com', '202cb962ac59075b964b07152d234b70', '3', '9115646334', '12275thumb-07.jpg', NULL, '2020-07-17'),
(8, 'dsdsada', 'sanjiv@asdas.com', '202cb962ac59075b964b07152d234b70', '3', '80906804251', '53727thumb-04.jpg', NULL, '2020-07-17'),
(10, 'xzczc', 'sanjiv@xzxz.com', '202cb962ac59075b964b07152d234b70', '4', '911345343434', '76230thumb-06.jpg', 6, '2020-07-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `founder`
--
ALTER TABLE `founder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `objectives`
--
ALTER TABLE `objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testpapers`
--
ALTER TABLE `testpapers`
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
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `founder`
--
ALTER TABLE `founder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `objectives`
--
ALTER TABLE `objectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testpapers`
--
ALTER TABLE `testpapers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
