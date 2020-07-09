-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2020 at 07:28 PM
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
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL DEFAULT '',
  `created_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `user_id`, `school_id`, `teacher_id`, `class_name`, `created_date`) VALUES
(1, 2, 3, 12, 'Ramji', '2020-07-05'),
(2, 2, 1, 20, 'cvxcvxc', '2020-07-05');

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
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objectives`
--

INSERT INTO `objectives` (`id`, `testpaper_id`, `question`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `status`) VALUES
(1, 2, 'dfdsfsdf', 'a', 'b', 'd', 'e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `school_session` varchar(30) NOT NULL DEFAULT '',
  `image` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `user_id`, `school_name`, `school_session`, `image`, `date`) VALUES
(1, 1, 'School1', '2022-23', '688561.jpg', '2020-06-30'),
(2, 2, 'School2', '2022-23', '427015.png', '2020-06-30'),
(3, 2, 'School34', '2022-23', '427015.png', '2020-06-30'),
(4, 2, 'sm shool', '2022-23', '85571hat.png', '2020-07-02'),
(5, 2, 'tnic', '2022-23', '87546clock.png', '2020-07-05'),
(6, 28, 'Anshu School Ayodhya', '2024-25', '5129987546clock.png', '2020-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `school_member`
--

CREATE TABLE `school_member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `created_at` varchar(20) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `school_id`, `created_at`) VALUES
(1, 1, '2020-07-05'),
(2, 1, '2020-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `create_date`) VALUES
(1, 'English', '2020-06-03'),
(2, 'Hindi', '2020-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `role` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `school_id`, `teacher_id`, `role`) VALUES
(4, 3, 18, '3'),
(2, 3, 12, '3'),
(5, 4, 19, '3'),
(6, 1, 20, '3'),
(7, 1, 21, '3'),
(8, 2, 22, '3'),
(9, 2, 23, '3'),
(10, 2, 24, '3'),
(11, 2, 25, '3'),
(12, 2, 26, '3'),
(13, 2, 27, '3'),
(14, 6, 29, '3'),
(15, 6, 30, '3');

-- --------------------------------------------------------

--
-- Table structure for table `testpapers`
--

CREATE TABLE `testpapers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `title` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testpapers`
--

INSERT INTO `testpapers` (`id`, `user_id`, `subject_id`, `title`, `status`) VALUES
(1, 1, 1, 'Three Floor House Design', 0),
(2, 1, 1, 'mechanical', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `join_date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `mobile`, `image`, `join_date`) VALUES
(2, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, NULL, '2019-5-29'),
(6, '2', 'sanjivc@jjs.com', '123', 3, '23423434', '', '2020-07-01'),
(7, '2', 'sanjifsdfvc@jjs.com', 'dsfsdf', 3, 'ffffffff', '', '2020-07-01'),
(8, '2', 'sanjifsdsdffvc@jjs.com', 'dsfds', 3, '23423434', '', '2020-07-01'),
(9, '2', 'sanjifsdsdffvc@jjs.com', 'dsfds', 3, '23423434', '', '2020-07-01'),
(10, '3', 'sanjidsfvc@jjs.com', '123', 3, '23423434', '', '2020-07-01'),
(11, 'ess_ganganagar', 'sanjivc@jjs.com', '123', 3, '23423434', '', '2020-07-02'),
(12, 'ess_patiala', 'sanjifsdsdffvc@jjs.com', '123', 3, '23423434', '', '2020-07-02'),
(23, 'fds', 'sdsfjivc@jjs.com', '44', 3, '434', '', '2020-07-05'),
(22, 'fds', 'sdsfjivc@jjs.com', '44', 3, '434', NULL, '2020-07-05'),
(21, 'dsfsd', 'sansdfdsc@jjs.com', '123', 3, '5343432', '', '2020-07-05'),
(20, 'dsfsd', 'sansdfdsc@jjs.com', '123', 3, '5343432', NULL, '2020-07-05'),
(19, 'sss', 'ss@ss.ss', '222', 3, '222222222', '', '2020-07-02'),
(18, 'ess_patialaq', 'sanjifsdfvc@jjs.com', '123', 3, '2342343423', '', '2020-07-02'),
(24, 'df', 'safd@jjs.com', '2222', 3, '234rwe', NULL, '2020-07-05'),
(25, 'df', 'safd@jjs.com', '2222', 3, '234rwe', '', '2020-07-05'),
(26, 'ess_ganganagarfd', 'fdfvc@jjs.com', '4', 3, '23423434', NULL, '2020-07-05'),
(27, 'ess_ganganagarfd', 'fdfvc@jjs.com', '4', 3, '23423434', '', '2020-07-05'),
(28, 'anshu founder', 'anshu@gmail.com', '202cb962ac59075b964b07152d234b70', 2, '9115646334', NULL, '2020-07-09'),
(29, 'xzZX', 'dfddg@gg.fff', '202cb962ac59075b964b07152d234b70', 3, '9115646334', '', '2020-07-09'),
(30, 'ans teacher', 'ans@gm.com', '202cb962ac59075b964b07152d234b70', 3, '9115646334', '', '2020-07-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
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
-- Indexes for table `school_member`
--
ALTER TABLE `school_member`
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
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school_member`
--
ALTER TABLE `school_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `testpapers`
--
ALTER TABLE `testpapers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
