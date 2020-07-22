-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2019 at 07:38 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iffatjar_blog_farisa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `catName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `catName`) VALUES
(3, 'WordPress'),
(4, 'CSS'),
(6, 'JavaScript');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `id` int(11) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `note`) VALUES
(1, 'Copyright Farisa | 2018');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`id`, `name`, `body`) VALUES
(1, 'About', '&lt;p&gt;&lt;span&gt;&amp;nbsp;University or UU is a private university at Uttara, in Dhaka, Bangladesh. UU has eight campuses in a one-kilometer radius in Uttara and is based in the satellite upscale town in Dhaka North.&lt;/span&gt;&lt;span&gt;&amp;nbsp;&lt;/span&gt;&lt;/p&gt;'),
(3, 'Farisa', '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(12, 2, 'JAVA title here', '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae. Nunc ex ne</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae. Nunc ex ne</span></p>', 'uploads/9339aae270.jpg', 'Admin', 'html', '2018-08-10 09:29:39'),
(14, 3, 'PHP', '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae. Nunc ex ne</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae. Nunc ex ne</span></p>', 'uploads/26423256d1.jpg', 'kunal', 'java', '2018-08-10 09:31:33'),
(16, 7, 'javascript title', '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae.&nbsp;</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae.&nbsp;</span></p>', 'uploads/5547f7c6b9.jpg', 'Admin', 'java', '2018-08-15 06:36:29'),
(18, 4, 'football', '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae. Nunc ex ne</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae. Nunc ex ne</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae. Nunc ex ne</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae. Nunc ex ne</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae. Nunc ex ne</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis pellentesque orci a dictum. Donec interdum risus eu orci porta imperdiet. Sed dapibus lectus vel suscipit commodo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec sed lorem ut turpis pellentesque pulvinar sed ut metus. Sed imperdiet ultrices sapien, consectetur elementum justo semper vitae. Nunc ex ne</span></p>', 'uploads/fdc62339bf.jpg', 'Admin', 'wordpress', '2018-09-25 14:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'http://facebook.com/blog', 'http://twitter.com/blog', 'http://linkedin.com/blog', 'http://google.com/blog');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(2, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE `title_slogan` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Faris Blog', 'Welcome to  blog', 'uploads/logo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
