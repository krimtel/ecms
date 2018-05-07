-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 07:17 AM
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
(4, 'hello123', '2001-05-18 10:06:02', '2004-05-18 03:02:01', '::1', 1, 1),
(5, 'hello 321', '2001-05-18 10:06:27', '2004-05-18 03:01:49', '::1', 1, 0),
(6, 'हिंदी', '2001-05-18 03:35:25', '2004-05-18 03:01:39', '::1', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

CREATE TABLE `layout` (
  `id` int(11) NOT NULL,
  `layout_name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` (`id`, `layout_name`, `status`) VALUES
(1, 'one column', 1),
(2, 'two column', 1),
(3, 'three column', 1);

-- --------------------------------------------------------

--
-- Table structure for table `layout_sections`
--

CREATE TABLE `layout_sections` (
  `id` bigint(255) NOT NULL,
  `layout_id` int(11) NOT NULL,
  `section_name` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layout_sections`
--

INSERT INTO `layout_sections` (`id`, `layout_id`, `section_name`, `status`) VALUES
(1, 1, 'main_content', 1),
(2, 2, 'left_content', 1),
(3, 2, 'main_content', 1),
(4, 3, 'left_content', 1),
(5, 3, 'main_content', 1),
(6, 3, 'right_content', 1);

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
  `external_link` tinyint(1) DEFAULT '0',
  `cms_url` varchar(500) DEFAULT NULL,
  `ip` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_slug`, `title`, `p_id`, `sort`, `external_link`, `cms_url`, `ip`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'HOME', 'HOME', 0, 1, NULL, NULL, '::1', '0000-00-00 00:00:00', 1, '2003-05-18 11:43:41', 3, 1),
(2, 'NATIONAL AGRICULTURE MARKET', 'NATIONAL AGRICULTURE MARKET', 0, 2, NULL, NULL, '::1', '0000-00-00 00:00:00', 1, '2003-05-18 11:49:08', 3, 1),
(3, ' ABOUT NAM', ' ABOUT NAM', 2, 3, 0, '', '::1', '0000-00-00 00:00:00', 1, '2003-05-18 11:50:19', 3, 1),
(4, 'About', 'About', 0, 20, NULL, NULL, '::1', '0000-00-00 00:00:00', 1, '2003-05-18 11:56:44', 3, 1),
(5, 'USEFUL LINKS', 'USEFUL LINKS', 2, 6, 0, '', '::1', '2003-05-18 07:27:37', 3, '2003-05-18 11:53:36', 3, 1),
(6, 'APPROVED COMMODITIES', 'APPROVED COMMODITIES', 8, 9, 0, '', '::1', '2003-05-18 07:35:12', 3, '2003-05-18 11:54:32', 3, 1),
(7, 'KEY STAKEHOLDERS', 'KEY STAKEHOLDERS', 2, 4, 0, '', '::1', '2003-05-18 07:39:26', 3, '2003-05-18 11:50:51', 3, 1),
(8, 'FARMER', 'FARMER', 0, 8, NULL, NULL, '::1', '2003-05-18 07:46:41', 3, '2003-05-18 11:54:03', 3, 1),
(9, 'IMPLEMENTATION PROGRESS', 'IMPLEMENTATION PROGRESS', 2, 5, 0, '', '::1', '2003-05-18 11:52:53', 3, '0000-00-00 00:00:00', 3, 1),
(10, 'COMMODITY QUALITY PARAMETERS', 'COMMODITY QUALITY PARAMETERS', 8, 10, 0, '', '::1', '2003-05-18 11:55:23', 3, '0000-00-00 00:00:00', 3, 1),
(11, 'ENROLLED MANDIS', 'ENROLLED MANDIS', 8, 11, 0, '', '::1', '2003-05-18 11:55:50', 3, '0000-00-00 00:00:00', 3, 1),
(12, 'TRADER', 'TRADER', 0, 12, NULL, NULL, '::1', '2003-05-18 11:56:25', 3, '0000-00-00 00:00:00', 3, 1);

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
(1, 1, 1, 'HOME', '2018-04-23 00:00:00', 1, '2003-05-18 11:43:41', 3, 0, 1),
(2, 2, 1, 'HOME', '2018-04-23 00:00:00', 1, '0000-00-00 00:00:00', 3, 0, 1),
(3, 1, 2, 'NATIONAL AGRICULTURE MARKET', '2018-04-23 00:00:00', 1, '2003-05-18 11:49:08', 3, 0, 1),
(4, 2, 2, 'होम 1', '2018-04-23 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, 1),
(5, 1, 3, ' ABOUT NAM', '2018-04-23 00:00:00', 1, '2003-05-18 11:50:19', 3, 0, 1),
(6, 2, 3, 'होम 2', '2018-04-23 00:00:00', 1, '0000-00-00 00:00:00', 0, 0, 1),
(7, 1, 5, 'USEFUL LINKS', '2003-05-18 07:27:37', 3, '2003-05-18 11:53:36', 3, 0, 1),
(8, 1, 6, 'APPROVED COMMODITIES', '2003-05-18 07:35:12', 3, '2003-05-18 11:54:32', 3, 0, 1),
(9, 1, 7, 'KEY STAKEHOLDERS', '2003-05-18 07:39:26', 3, '2003-05-18 11:50:51', 3, 0, 1),
(10, 1, 8, 'FARMER', '2003-05-18 07:46:41', 3, '2003-05-18 11:54:03', 3, 0, 1),
(11, 1, 9, 'IMPLEMENTATION PROGRESS', '2003-05-18 11:52:53', 3, '0000-00-00 00:00:00', 3, 0, 1),
(12, 1, 10, 'COMMODITY QUALITY PARAMETERS', '2003-05-18 11:55:23', 3, '0000-00-00 00:00:00', 3, 0, 1),
(13, 1, 11, 'ENROLLED MANDIS', '2003-05-18 11:55:50', 3, '0000-00-00 00:00:00', 3, 0, 1),
(14, 1, 12, 'TRADER', '2003-05-18 11:56:25', 3, '0000-00-00 00:00:00', 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(255) NOT NULL,
  `news_contect` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `news_contect`, `created_at`, `created_by`, `sort`, `updated_at`, `updated_by`, `publish`, `status`) VALUES
(1, '<p>sfdsf</p>', '2004-05-18 10:22:25', 3, 1, '2005-05-18 09:47:37', 1, 1, 1),
(3, '<p>welcome</p>', '2005-05-18 09:42:28', 1, 2, '0000-00-00 00:00:00', NULL, 1, 1),
(4, '<p>welc</p>', '2005-05-18 09:45:30', 1, 4, '0000-00-00 00:00:00', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_item`
--

CREATE TABLE `news_item` (
  `id` bigint(255) NOT NULL,
  `news_id` bigint(255) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `news_contect` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_item`
--

INSERT INTO `news_item` (`id`, `news_id`, `lang_id`, `news_contect`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 1, 1, '<p>sfdsf 123 4 23</p>', '2004-05-18 10:22:25', 3, '2005-05-18 09:47:37', 1, 1),
(2, 1, 2, '<p>sfdsf 123 43 rahul</p>', '2005-05-18 09:00:39', 4, '2005-05-18 09:20:27', 4, 0),
(7, 1, 2, '<p>sfdsf 123 4 hello welcome</p>', '2005-05-18 09:26:06', 4, '2005-05-18 09:27:19', 4, 1),
(10, 3, 1, '<p>welcome</p>', '2005-05-18 09:42:28', 1, '0000-00-00 00:00:00', NULL, 1),
(11, 4, 1, '<p>welc</p>', '2005-05-18 09:45:30', 1, '0000-00-00 00:00:00', NULL, 1),
(18, 3, 2, '<p>welcome hello</p>', '2005-05-18 04:39:15', 4, '2005-05-18 04:40:25', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `p_id` bigint(255) NOT NULL,
  `page_layout` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page_components`
--

CREATE TABLE `page_components` (
  `id` bigint(255) NOT NULL,
  `page_id` bigint(255) NOT NULL,
  `section_id` bigint(255) NOT NULL,
  `widget_id` bigint(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page_item`
--

CREATE TABLE `page_item` (
  `id` bigint(255) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `page_id` bigint(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `meta_tag` text,
  `keywords` text,
  `created_at` datetime NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `ip` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
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
  `phone` varchar(20) DEFAULT NULL,
  `language` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `language`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1525587162, 1, 'Admin', 'istrator', 'ADMIN', '0', 1),
(2, '::1', 'kayya@gmail.com', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'kayya@gmail.com', NULL, NULL, NULL, NULL, 1520933902, 1525431987, 1, 'chowa', 'yadav', 'kayya', '9770866241', 1),
(3, '::1', 'parent@gmail.com', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'krimtel@gmail.com', NULL, NULL, NULL, NULL, 1520933902, 1525263669, 1, 'chowa', 'yadav', 'kayya', '9770866241', NULL),
(4, '::1', 'rahul@gmail.com', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', NULL, 'rahul@gmail.com', NULL, NULL, NULL, NULL, 1520933902, 1525530578, 1, 'chowa', 'yadav', 'kayya', '9770866241', 2);

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
(1, 1, 2),
(3, 2, 3),
(4, 3, 2),
(5, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `w_id` bigint(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`w_id`, `name`, `created_at`, `created_by`, `status`) VALUES
(1, 'home page main content', '0000-00-00 00:00:00', 1, 1),
(2, '', '2018-04-11 00:00:00', 1, 1),
(9, 'new', '2006-05-18 08:20:43', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `widget_item`
--

CREATE TABLE `widget_item` (
  `id` bigint(255) NOT NULL,
  `widget_id` bigint(255) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) UNSIGNED NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `ip` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `widget_item`
--

INSERT INTO `widget_item` (`id`, `widget_id`, `lang_id`, `content`, `created_at`, `created_by`, `updated_at`, `updated_by`, `ip`, `status`) VALUES
(4, 9, 1, '<p>wel</p>\r\n', '2006-05-18 08:20:43', 1, '0000-00-00 00:00:00', NULL, '::1', 1);

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
-- Indexes for table `layout`
--
ALTER TABLE `layout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layout_sections`
--
ALTER TABLE `layout_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `layout_id` (`layout_id`);

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `news_item`
--
ALTER TABLE `news_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`),
  ADD KEY `lang_id` (`lang_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `page_layout` (`page_layout`);

--
-- Indexes for table `page_components`
--
ALTER TABLE `page_components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_id` (`page_id`),
  ADD KEY `section_id` (`section_id`),
  ADD KEY `widget_id` (`widget_id`);

--
-- Indexes for table `page_item`
--
ALTER TABLE `page_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `page_id` (`page_id`);

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
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `widget_item`
--
ALTER TABLE `widget_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `widget_id` (`widget_id`),
  ADD KEY `lang_id` (`lang_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

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
-- AUTO_INCREMENT for table `layout`
--
ALTER TABLE `layout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `layout_sections`
--
ALTER TABLE `layout_sections`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `m_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `news_item`
--
ALTER TABLE `news_item`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `p_id` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_components`
--
ALTER TABLE `page_components`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_item`
--
ALTER TABLE `page_item`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `w_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `widget_item`
--
ALTER TABLE `widget_item`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`last_update_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `layout_sections`
--
ALTER TABLE `layout_sections`
  ADD CONSTRAINT `layout_sections_ibfk_1` FOREIGN KEY (`layout_id`) REFERENCES `layout` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `news_item`
--
ALTER TABLE `news_item`
  ADD CONSTRAINT `news_item_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_item_ibfk_2` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_item_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_ibfk_1` FOREIGN KEY (`page_layout`) REFERENCES `layout` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `page_item`
--
ALTER TABLE `page_item`
  ADD CONSTRAINT `page_item_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `pages` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `page_item_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `page_item_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `widgets`
--
ALTER TABLE `widgets`
  ADD CONSTRAINT `widgets_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `widget_item`
--
ALTER TABLE `widget_item`
  ADD CONSTRAINT `widget_item_ibfk_1` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`w_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `widget_item_ibfk_2` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `widget_item_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `widget_item_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
