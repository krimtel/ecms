-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 01:12 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enam`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'developer', 'superadmin'),
(2, 'admin', 'admin'),
(3, 'subadmin', 'subadmin');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `l_id` int(11) NOT NULL,
  `l_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `ip` varchar(200) NOT NULL,
  `last_update_by` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`l_id`, `l_name`, `created_at`, `updated_at`, `ip`, `last_update_by`, `status`) VALUES
(1, 'English', '0000-00-00 00:00:00', '2001-05-18 09:50:17', '::1', 1, 1),
(2, 'Hindi', '0000-00-00 00:00:00', '2001-05-18 09:49:49', '::1', 1, 1),
(3, 'hello', '2001-05-18 10:04:03', '0000-00-00 00:00:00', '::1', 1, 1),
(4, 'hello123', '2001-05-18 10:06:02', '2001-05-18 10:23:26', '::1', 1, 1),
(5, 'hello 321', '2001-05-18 10:06:27', '2001-05-18 10:22:04', '::1', 1, 1),
(6, 'हिंदी', '2001-05-18 03:35:25', '0000-00-00 00:00:00', '::1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` bigint(255) NOT NULL,
  `menu_slug` varchar(200) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `p_id` bigint(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `external_link` tinyint(1) NOT NULL DEFAULT '0',
  `cms_url` bigint(255) DEFAULT NULL,
  `ip` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_slug`, `title`, `p_id`, `sort`, `external_link`, `cms_url`, `ip`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'Home', 'Home', 0, 1, 0, NULL, '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0, 1),
(2, 'Home1', 'Home1', 1, 2, 0, NULL, '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0, 1),
(3, 'Home2', 'Home2', 1, 3, 0, NULL, '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0, 1),
(4, 'about', 'About', 0, 4, 0, NULL, '', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `m_id` bigint(255) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `menu_id` bigint(255) NOT NULL,
  `menu_name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) UNSIGNED NOT NULL,
  `ip` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`m_id`, `lang_id`, `menu_id`, `menu_name`, `created_at`, `created_by`, `updated_at`, `updated_by`, `ip`, `status`) VALUES
(1, 1, 1, 'Home', '2018-04-23 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, 1),
(2, 2, 1, 'होम', '2018-04-23 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, 1),
(3, 1, 2, 'home 1', '2018-04-23 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, 1),
(4, 2, 2, 'होम 1', '2018-04-23 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, 1),
(5, 1, 3, 'home 2', '2018-04-23 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, 1),
(6, 2, 3, 'होम 2', '2018-04-23 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `p_id` bigint(255) NOT NULL,
  `page_title` varchar(200) NOT NULL,
  `page_model` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` bigint(255) NOT NULL,
  `page_id` text NOT NULL,
  `section_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `idRoutes` int(11) NOT NULL,
  `Order` int(11) NOT NULL,
  `Url` varchar(250) NOT NULL,
  `Url_Variable` varchar(20) NOT NULL,
  `Class` text NOT NULL,
  `Method` text NOT NULL,
  `Variable` text NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `sid` bigint(255) NOT NULL,
  `widget_id` bigint(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`sid`, `widget_id`, `title`, `sort`, `created_at`, `created_by`, `status`) VALUES
(1, 2, 'home page slider no 1', 0, '2018-04-02 00:00:00', 1, 1),
(2, 2, 'home page slider no 2', 1, '2018-04-02 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider_item`
--

CREATE TABLE `slider_item` (
  `s_id` bigint(255) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `slider_id` bigint(255) NOT NULL,
  `slider_image` varchar(1000) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_item`
--

INSERT INTO `slider_item` (`s_id`, `lang_id`, `slider_id`, `slider_image`, `created_at`, `created_by`, `status`) VALUES
(1, 1, 1, '1eng.jpg', '2018-04-10 00:00:00', 1, 1),
(2, 2, 1, '1hindi.jpg', '2018-04-10 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1525238095, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'kayya@gmail.com', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'kayya@gmail.com', NULL, NULL, NULL, NULL, 1520933902, 1524482628, 1, 'chowa', 'yadav', 'kayya', '9770866241'),
(3, '::1', 'parent@gmail.com', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'parent@gmail.com', NULL, NULL, NULL, NULL, 1520933902, 1523080625, 1, 'chowa', 'yadav', 'kayya', '9770866241'),
(4, '::1', 'rahul', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'parent@gmail.com', NULL, NULL, NULL, NULL, 1520933902, 1523080625, 1, 'chowa', 'yadav', 'kayya', '9770866241');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 2, 3),
(4, 3, 2),
(5, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_language`
--

CREATE TABLE `users_language` (
  `id` bigint(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `lang_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `ip` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_language`
--

INSERT INTO `users_language` (`id`, `user_id`, `lang_id`, `created_at`, `updated_at`, `updated_by`, `ip`, `status`) VALUES
(1, 2, 1, '0000-00-00 00:00:00', '2001-05-18 03:34:55', 1, '', 1),
(6, 4, 4, '2002-05-18 04:56:06', '2002-05-18 07:01:31', 1, '::1', 0),
(7, 4, 4, '2002-05-18 04:58:32', '2002-05-18 07:01:31', 1, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `w_id` bigint(255) NOT NULL,
  `module` varchar(200) NOT NULL,
  `name` varchar(500) NOT NULL,
  `show_pages` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`w_id`, `module`, `name`, `show_pages`, `created_at`, `created_by`, `status`) VALUES
(1, 'menu', 'main menu', 'ALL', '0000-00-00 00:00:00', 1, 1),
(2, 'slider', 'main slider', 'home', '2018-04-11 00:00:00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `last_update_by` (`last_update_by`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `lang_id` (`lang_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `page_model` (`page_model`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`idRoutes`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `widget_id` (`widget_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `slider_item`
--
ALTER TABLE `slider_item`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `slider_id` (`slider_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_language`
--
ALTER TABLE `users_language`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lang_id` (`lang_id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `m_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `p_id` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `idRoutes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sid` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slider_item`
--
ALTER TABLE `slider_item`
  MODIFY `s_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_language`
--
ALTER TABLE `users_language`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `w_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`last_update_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD CONSTRAINT `menu_item_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_item_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_item_ibfk_3` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users_language`
--
ALTER TABLE `users_language`
  ADD CONSTRAINT `users_language_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_language_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_language_ibfk_3` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `widgets`
--
ALTER TABLE `widgets`
  ADD CONSTRAINT `widgets_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
