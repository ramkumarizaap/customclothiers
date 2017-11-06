-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 12:13 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customclothiers`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_master`
--

CREATE TABLE `appointment_master` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_phone` varchar(255) NOT NULL,
  `a_timings` varchar(255) NOT NULL,
  `a_address` text NOT NULL,
  `a_comments` text NOT NULL,
  `srid` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_master`
--

INSERT INTO `appointment_master` (`a_id`, `a_name`, `a_email`, `a_phone`, `a_timings`, `a_address`, `a_comments`, `srid`, `created_date`, `last_updated`) VALUES
(1, 'testing', 'gavaskarizaap@gmail.com', '1234567890', '05/25/2016 11:00 am', 'chennai', '', 11, '2016-05-23 09:25:06', '0000-00-00 00:00:00'),
(2, 'gavaskarram', 'gavaskarizaap@gmail.com', '1234567890', '06/22/2016 11:00 am', 'Chennai', '', 11, '2016-06-04 16:16:12', '0000-00-00 00:00:00'),
(3, 'gavaskarr', 'itgavaskar@gmail.com', '1221211212', '06/23/2016 11:00 am', 'chennai', 'valasaravakkam', 11, '2016-06-13 07:50:56', '0000-00-00 00:00:00'),
(4, 'gavaskarr', '', '', ' ', '', '', 1, '2016-06-13 07:51:54', '0000-00-00 00:00:00'),
(5, 'gavaskarr', 'itgavaskar@gmail.com', '1221211212', '06/22/2016 12:30 pm', 'chennai', '', 1, '2016-06-13 07:53:24', '0000-00-00 00:00:00'),
(6, 'Steven Schwartz', 'stevenschwartz01@gmail.com', '9176890044', '05/18/2017 11:00 am', '7961 Mountain Oaks Dr SLC UT 84121', 'Measurement only with Kabba', 1, '2017-05-03 12:08:57', '0000-00-00 00:00:00'),
(7, 'Jadon Hartsuff', 'jhartsuff@gmail.com', '2022300616', '08/24/2017 11:00 am', '1325 18th St NW #509', 'to (finally) pick up black shirt', 15, '2017-08-21 11:44:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `banner_master`
--

CREATE TABLE `banner_master` (
  `b_id` int(11) NOT NULL,
  `banner_title` text NOT NULL,
  `banner_desc` text NOT NULL,
  `banner_img` text NOT NULL,
  `banner_status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_master`
--

INSERT INTO `banner_master` (`b_id`, `banner_title`, `banner_desc`, `banner_img`, `banner_status`, `created_date`, `last_updated`) VALUES
(1, 'Welcome to Custom Clothiers!', '<p class=\"strong-header\"><span style=\"font-size: 14pt; font-family: arial, helvetica, sans-serif;\">Excellent Quality and Fashionable Trends</span></p>', 'uploads/banner/1_1454423194_blazer.jpg', 0, '2016-01-28 02:57:11', '2016-10-09 17:18:25'),
(2, 'RAY OF LIGHT', '<p><span style=\"color: #1a1a1a; font-family: \'PT Sans\', sans-serif; font-size: 16px; line-height: 21px; text-align: center;\">Exciting Fashionable Custom Clothing</span></p>', 'uploads/banner/1_1453993077_coat.jpg', 0, '2016-01-28 14:57:57', '2016-02-02 14:26:22'),
(3, 'Exciting Fashionable Custom Clothing', '<p><span style=\"font-family: arial, helvetica, sans-serif; font-size: 14pt;\">Express Your Personality!</span></p>', 'uploads/banner/3_1498798552_Photo Oct 01, 12 44 27 PM (1) copy.jpg', 0, '2016-01-28 14:58:19', '2017-06-29 21:55:52'),
(4, 'Real Customers - No Models!', '<p><span style=\"color: #ffffff;\">We design clothing that highlights real customers instead of photoshop models!</span></p>', 'uploads/banner/1_1490992055_banner_2.png', 1, '2017-03-31 13:27:35', '2017-03-31 13:29:19'),
(5, 'Welcome to Custom Clothiers!', '<p style=\"text-align: center;\"><span style=\"color: #ffffff;\">Clothing that highlights real customers!</span></p>', 'uploads/banner/1_1490992095_paulsyers.png', 1, '2017-03-31 13:28:16', '2017-06-29 21:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `campaign_id` int(11) NOT NULL,
  `campaign_name` varchar(255) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`campaign_id`, `campaign_name`, `create_date`) VALUES
(1, 'Test Campaign', '2017-09-13');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_member`
--

CREATE TABLE `campaign_member` (
  `campaign_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `current_newsletter_id` int(11) NOT NULL,
  `join_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campaign_member`
--

INSERT INTO `campaign_member` (`campaign_id`, `member_id`, `current_newsletter_id`, `join_time`) VALUES
(1, 1, 1, 1451125984);

-- --------------------------------------------------------

--
-- Table structure for table `campaign_newsletter`
--

CREATE TABLE `campaign_newsletter` (
  `campaign_id` int(11) NOT NULL,
  `newsletter_id` int(11) NOT NULL,
  `send_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campaign_newsletter`
--

INSERT INTO `campaign_newsletter` (`campaign_id`, `newsletter_id`, `send_time`) VALUES
(1, 1, 864000);

-- --------------------------------------------------------

--
-- Table structure for table `carousel_master`
--

CREATE TABLE `carousel_master` (
  `cm_id` int(11) NOT NULL,
  `c_heading` text NOT NULL,
  `c_heading2` text NOT NULL,
  `c_img` text NOT NULL,
  `c_desc` text NOT NULL,
  `c_link` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carousel_master`
--

INSERT INTO `carousel_master` (`cm_id`, `c_heading`, `c_heading2`, `c_img`, `c_desc`, `c_link`, `status`, `created_date`, `last_updated`) VALUES
(2, 'How it works', '', 'assets/carousel/Cover.JPG', '<p><strong>Premium Fabrics,</strong></p>\r\n<p><strong>Modern Style and Precise Craftsmanship</strong></p>', 'http://www.customclothiers.com/how-it-works/', 0, '2016-02-29 16:19:33', '2017-07-11 22:13:16'),
(3, 'DC Custom Clothiers', '', 'assets/carousel/1_1460155440_DC Showroom.JPG', '<p><strong>2001 L St.&nbsp;NW</strong></p>\r\n<p><strong>Suite 500</strong></p>\r\n<p><strong>Washington, DC 20036</strong></p>\r\n<p><strong>202-506-8052</strong></p>', 'http://www.dccustomclothiers.com', 0, '2016-02-29 16:21:51', '2017-03-28 11:43:52'),
(4, 'Baltimore Custom Clothiers', '', 'assets/carousel/BCC.JPG', '<p><strong>616 Water Street</strong></p>\r\n<p><strong>Suite&nbsp;332</strong></p>\r\n<p><strong>Baltimore, MD 21202</strong></p>\r\n<p><strong>410-234-8973</strong></p>', 'http://www.BaltimoreCustomClothiers.com', 0, '2016-02-29 16:23:14', '2017-03-28 11:44:04'),
(5, 'Philly Custom Clothiers', '', 'assets/carousel/1601 walnut.jpg', '<p><strong>1601 Walnut Street</strong></p>\r\n<p><strong>Suite 502</strong></p>\r\n<p><strong>Philadelphia, PA&nbsp;19102</strong></p>\r\n<p><strong>215-995-3086</strong></p>', 'www.PhiladelphiaCustomClothiers.com', 0, '2017-03-28 11:37:52', '2017-03-28 11:45:04'),
(6, 'Chicago Custom Clothiers', '', 'assets/carousel/chicago.JPG', '<p><strong>645 N Michigan Ave</strong></p>\r\n<p><strong>Suite&nbsp;1010</strong></p>\r\n<p><strong>Chicago, IL&nbsp;60611</strong></p>\r\n<p><strong>312-775-2650</strong></p>', 'www.ChicagoCustomClothiers.com', 0, '2017-03-28 11:42:52', '0000-00-00 00:00:00'),
(13, 'Our Story', '', 'assets/carousel/L1005279.png', '<p><strong>Our simple approach of caring, amazing quality and simple pricing. &nbsp;</strong></p>', 'http://customclothiers.com/our-story/', 0, '2017-07-12 22:54:46', '0000-00-00 00:00:00'),
(15, 'How it Works', '', 'assets/carousel/How it Work.jpg', '<p><strong>Premium Fabrics,</strong></p>\r\n<p><strong>Modern Style and Precise Craftsmanship.&nbsp;</strong></p>', 'http://www.customclothiers.com/how-it-works/', 0, '2017-07-12 23:29:22', '2017-07-13 00:02:39'),
(16, 'Chicago, IL', 'Custom Clothiers', 'assets/carousel/Chicago.jpg', '<p><strong>645 N Michigan Ave</strong></p>\r\n<p><strong>Suite&nbsp;1010</strong></p>\r\n<p><strong>Chicago, IL&nbsp;60611</strong></p>\r\n<p><strong>312-775-2650&nbsp;</strong></p>', 'http://www.ChicagoCustomClothiers.com', 1, '2017-07-12 23:30:44', '2017-08-22 00:15:13'),
(17, 'Philadelphia, PA', 'Custom Clothiers', 'assets/carousel/Philadelphia.jpg', '<p><strong>1601 Walnut Street</strong></p>\r\n<p><strong>Suite 502</strong></p>\r\n<p><strong>Philadelphia, PA&nbsp;19102</strong></p>\r\n<p><strong>215-995-3086&nbsp;</strong></p>', 'http://www.PhiladelphiaCustomClothiers.com', 1, '2017-07-12 23:56:28', '2017-08-22 00:15:47'),
(18, 'Baltimore, MD', 'Custom Clothiers', 'assets/carousel/Baltimore.jpg', '<p><strong>616 Water Street</strong></p>\r\n<p><strong>Suite&nbsp;332</strong></p>\r\n<p><strong>Baltimore, MD 21202</strong></p>\r\n<p><strong>410-234-8973</strong></p>', 'http://www.BaltimoreCustomClothiers.com', 1, '2017-07-12 23:57:37', '2017-08-22 00:16:54'),
(19, 'Washington, DC', 'Custom Clothiers', 'assets/carousel/Washington 2.jpg', '<p><strong>2001 L St.&nbsp;NW</strong></p>\r\n<p><strong>Suite 500</strong></p>\r\n<p><strong>Washington, DC 20036</strong></p>\r\n<p><strong>202-506-8052&nbsp;</strong></p>', 'http://www.dccustomclothiers.com', 1, '2017-07-12 23:58:56', '2017-08-22 00:16:38'),
(20, 'Atlanta Custom Clothiers', '', 'assets/carousel/Atlanta.jpg', '<p><strong>Fall of 2017</strong></p>', 'AtlantaCustomClothiers.com', 0, '2017-07-20 08:17:56', '2017-07-20 08:26:01'),
(21, 'New York Custom Clothiers', '', 'assets/carousel/new york.jpg', '<p><strong>Spring of 2018</strong></p>', 'NYCustomClothiers.com', 0, '2017-07-20 08:18:21', '2017-07-20 08:22:32'),
(22, 'Houston Custom Clothiers', '', 'assets/carousel/Houston.jpg', '<p><strong>Summer of 2018</strong></p>', 'HoustonCustomClothiers.com', 0, '2017-07-20 08:19:41', '2017-07-20 08:20:08'),
(23, 'San Jose Custom Clothiers', '', 'assets/carousel/sf.jpg', '<p><strong>Fall of 2018</strong></p>', 'sanfranciscocustomclothiers.com', 0, '2017-07-20 08:21:28', '2017-07-20 08:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `cart_master`
--

CREATE TABLE `cart_master` (
  `c_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sessid` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`cat_id`, `cat_name`, `created_date`, `last_updated`) VALUES
(1, 'Shop', '2016-02-02 06:02:06', '0000-00-00 00:00:00'),
(2, 'About', '2016-02-02 06:03:00', '0000-00-00 00:00:00'),
(3, 'Reviews', '2016-02-02 06:03:30', '0000-00-00 00:00:00'),
(4, 'Promo', '2016-02-02 06:04:06', '0000-00-00 00:00:00'),
(5, 'Wedding', '2016-02-20 15:13:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact_master`
--

CREATE TABLE `contact_master` (
  `cm_id` int(11) NOT NULL,
  `cm_email` text NOT NULL,
  `cm_phone` text NOT NULL,
  `cm_fax` text NOT NULL,
  `cm_street1` text NOT NULL,
  `cm_street2` text NOT NULL,
  `cm_city` text NOT NULL,
  `cm_state` text NOT NULL,
  `cm_zipcode` text NOT NULL,
  `cm_country` text NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_master`
--

INSERT INTO `contact_master` (`cm_id`, `cm_email`, `cm_phone`, `cm_fax`, `cm_street1`, `cm_street2`, `cm_city`, `cm_state`, `cm_zipcode`, `cm_country`, `created_date`, `last_updated`) VALUES
(1, 'support@customclothiers.com', '202-506-8052', '2025068052', '2001 L Street NW', 'Suite 500', 'Washington', 'DC', '20036', 'USA', '0000-00-00 00:00:00', '2016-06-15 03:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `co_id` int(11) NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `date_inserted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`co_id`, `country_name`, `date_inserted`) VALUES
(1, 'United Kingdom', '2015-12-07 15:50:25'),
(2, 'United States', '2015-12-07 15:50:25'),
(3, 'Afghanistan', '2015-12-07 15:50:25'),
(4, 'Aland Islands', '2015-12-07 15:50:25'),
(5, 'Albania', '2015-12-07 15:50:25'),
(6, 'Algeria', '2015-12-07 15:50:25'),
(7, 'American Samoa', '2015-12-07 15:50:26'),
(8, 'Andorra', '2015-12-07 15:50:26'),
(9, 'Angola', '2015-12-07 15:50:26'),
(10, 'Anguilla', '2015-12-07 15:50:26'),
(11, 'Antarctica', '2015-12-07 15:50:26'),
(12, 'Antigua and Barbuda', '2015-12-07 15:50:26'),
(13, 'Argentina', '2015-12-07 15:50:26'),
(14, 'Armenia', '2015-12-07 15:50:26'),
(15, 'Aruba', '2015-12-07 15:50:26'),
(16, 'Australia', '2015-12-07 15:50:26'),
(17, 'Austria', '2015-12-07 15:50:26'),
(18, 'Azerbaijan', '2015-12-07 15:50:26'),
(19, 'Bahamas', '2015-12-07 15:50:26'),
(20, 'Bahrain', '2015-12-07 15:50:26'),
(21, 'Bangladesh', '2015-12-07 15:50:26'),
(22, 'Barbados', '2015-12-07 15:50:26'),
(23, 'Belarus', '2015-12-07 15:50:26'),
(24, 'Belgium', '2015-12-07 15:50:26'),
(25, 'Belize', '2015-12-07 15:50:26'),
(26, 'Benin', '2015-12-07 15:50:26'),
(27, 'Bermuda', '2015-12-07 15:50:26'),
(28, 'Bhutan', '2015-12-07 15:50:26'),
(29, 'Bolivia, Plurinational State of', '2015-12-07 15:50:27'),
(30, 'Bonaire, Sint Eustatius and Saba', '2015-12-07 15:50:27'),
(31, 'Bosnia and Herzegovina', '2015-12-07 15:50:27'),
(32, 'Botswana', '2015-12-07 15:50:27'),
(33, 'Bouvet Island', '2015-12-07 15:50:27'),
(34, 'Brazil', '2015-12-07 15:50:27'),
(35, 'British Indian Ocean Territory', '2015-12-07 15:50:27'),
(36, 'Brunei Darussalam', '2015-12-07 15:50:27'),
(37, 'Bulgaria', '2015-12-07 15:50:27'),
(38, 'Burkina Faso', '2015-12-07 15:50:27'),
(39, 'Burundi', '2015-12-07 15:50:27'),
(40, 'Cambodia', '2015-12-07 15:50:27'),
(41, 'Cameroon', '2015-12-07 15:50:27'),
(42, 'Canada', '2015-12-07 15:50:27'),
(43, 'Cape Verde', '2015-12-07 15:50:27'),
(44, 'Cayman Islands', '2015-12-07 15:50:27'),
(45, 'Central African Republic', '2015-12-07 15:50:27'),
(46, 'Chad', '2015-12-07 15:50:27'),
(47, 'Chile', '2015-12-07 15:50:27'),
(48, 'China', '2015-12-07 15:50:27'),
(49, 'Christmas Island', '2015-12-07 15:50:27'),
(50, 'Cocos (Keeling) Islands', '2015-12-07 15:50:27'),
(51, 'Colombia', '2015-12-07 15:50:27'),
(52, 'Comoros', '2015-12-07 15:50:28'),
(53, 'Congo', '2015-12-07 15:50:28'),
(54, 'Congo, The Democratic Republic of The', '2015-12-07 15:50:28'),
(55, 'Cook Islands', '2015-12-07 15:50:28'),
(56, 'Costa Rica', '2015-12-07 15:50:28'),
(57, 'Croatia', '2015-12-07 15:50:28'),
(58, 'Cuba', '2015-12-07 15:50:28'),
(59, 'Curacao', '2015-12-07 15:50:28'),
(60, 'Cyprus', '2015-12-07 15:50:28'),
(61, 'Czech Republic', '2015-12-07 15:50:28'),
(62, 'Denmark', '2015-12-07 15:50:28'),
(63, 'Djibouti', '2015-12-07 15:50:28'),
(64, 'Dominica', '2015-12-07 15:50:28'),
(65, 'Dominican Republic', '2015-12-07 15:50:28'),
(66, 'Ecuador', '2015-12-07 15:50:28'),
(67, 'Egypt', '2015-12-07 15:50:28'),
(68, 'El Salvador', '2015-12-07 15:50:28'),
(69, 'Equatorial Guinea', '2015-12-07 15:50:28'),
(70, 'Eritrea', '2015-12-07 15:50:28'),
(71, 'Estonia', '2015-12-07 15:50:28'),
(72, 'Ethiopia', '2015-12-07 15:50:28'),
(73, 'Falkland Islands (Malvinas)', '2015-12-07 15:50:29'),
(74, 'Faroe Islands', '2015-12-07 15:50:29'),
(75, 'Fiji', '2015-12-07 15:50:29'),
(76, 'Finland', '2015-12-07 15:50:29'),
(77, 'France', '2015-12-07 15:50:29'),
(78, 'French Guiana', '2015-12-07 15:50:29'),
(79, 'French Polynesia', '2015-12-07 15:50:29'),
(80, 'French Southern Territories', '2015-12-07 15:50:29'),
(81, 'Gabon', '2015-12-07 15:50:29'),
(82, 'Gambia', '2015-12-07 15:50:29'),
(83, 'Georgia', '2015-12-07 15:50:29'),
(84, 'Germany', '2015-12-07 15:50:29'),
(85, 'Ghana', '2015-12-07 15:50:29'),
(86, 'Gibraltar', '2015-12-07 15:50:29'),
(87, 'Greece', '2015-12-07 15:50:29'),
(88, 'Greenland', '2015-12-07 15:50:29'),
(89, 'Grenada', '2015-12-07 15:50:29'),
(90, 'Guadeloupe', '2015-12-07 15:50:29'),
(91, 'Guam', '2015-12-07 15:50:29'),
(92, 'Guatemala', '2015-12-07 15:50:29'),
(93, 'Guernsey', '2015-12-07 15:50:29'),
(94, 'Guinea', '2015-12-07 15:50:29'),
(95, 'Guinea-bissau', '2015-12-07 15:50:30'),
(96, 'Guyana', '2015-12-07 15:50:30'),
(97, 'Haiti', '2015-12-07 15:50:30'),
(98, 'Heard Island and Mcdonald Islands', '2015-12-07 15:50:30'),
(99, 'Holy See (Vatican City State)', '2015-12-07 15:50:30'),
(100, 'Honduras', '2015-12-07 15:50:30'),
(101, 'Hong Kong', '2015-12-07 15:50:30'),
(102, 'Hungary', '2015-12-07 15:50:30'),
(103, 'Iceland', '2015-12-07 15:50:30'),
(104, 'India', '2015-12-07 15:50:30'),
(105, 'Indonesia', '2015-12-07 15:50:30'),
(106, 'Iran, Islamic Republic of', '2015-12-07 15:50:30'),
(107, 'Iraq', '2015-12-07 15:50:30'),
(108, 'Ireland', '2015-12-07 15:50:30'),
(109, 'Isle of Man', '2015-12-07 15:50:30'),
(110, 'Israel', '2015-12-07 15:50:30'),
(111, 'Italy', '2015-12-07 15:50:30'),
(112, 'Jamaica', '2015-12-07 15:50:30'),
(113, 'Japan', '2015-12-07 15:50:30'),
(114, 'Jersey', '2015-12-07 15:50:30'),
(115, 'Jordan', '2015-12-07 15:50:30'),
(116, 'Kazakhstan', '2015-12-07 15:50:31'),
(117, 'Kenya', '2015-12-07 15:50:31'),
(118, 'Kiribati', '2015-12-07 15:50:31'),
(119, 'Korea, Republic of', '2015-12-07 15:50:31'),
(120, 'Kuwait', '2015-12-07 15:50:31'),
(121, 'Kyrgyzstan', '2015-12-07 15:50:31'),
(122, 'Latvia', '2015-12-07 15:50:31'),
(123, 'Lebanon', '2015-12-07 15:50:31'),
(124, 'Lesotho', '2015-12-07 15:50:31'),
(125, 'Liberia', '2015-12-07 15:50:31'),
(126, 'Libya', '2015-12-07 15:50:31'),
(127, 'Liechtenstein', '2015-12-07 15:50:31'),
(128, 'Lithuania', '2015-12-07 15:50:31'),
(129, 'Luxembourg', '2015-12-07 15:50:31'),
(130, 'Macao', '2015-12-07 15:50:31'),
(131, 'Macedonia, The Former Yugoslav Republic of', '2015-12-07 15:50:31'),
(132, 'Madagascar', '2015-12-07 15:50:31'),
(133, 'Malawi', '2015-12-07 15:50:31'),
(134, 'Malaysia', '2015-12-07 15:50:31'),
(135, 'Maldives', '2015-12-07 15:50:31'),
(136, 'Mali', '2015-12-07 15:50:31'),
(137, 'Malta', '2015-12-07 15:50:32'),
(138, 'Marshall Islands', '2015-12-07 15:50:32'),
(139, 'Martinique', '2015-12-07 15:50:32'),
(140, 'Mauritania', '2015-12-07 15:50:32'),
(141, 'Mauritius', '2015-12-07 15:50:32'),
(142, 'Mayotte', '2015-12-07 15:50:32'),
(143, 'Mexico', '2015-12-07 15:50:32'),
(144, 'Micronesia, Federated States of', '2015-12-07 15:50:32'),
(145, 'Moldova, Republic of', '2015-12-07 15:50:32'),
(146, 'Monaco', '2015-12-07 15:50:32'),
(147, 'Mongolia', '2015-12-07 15:50:32'),
(148, 'Montenegro', '2015-12-07 15:50:32'),
(149, 'Montserrat', '2015-12-07 15:50:32'),
(150, 'Morocco', '2015-12-07 15:50:32'),
(151, 'Mozambique', '2015-12-07 15:50:32'),
(152, 'Myanmar', '2015-12-07 15:50:32'),
(153, 'Namibia', '2015-12-07 15:50:32'),
(154, 'Nauru', '2015-12-07 15:50:32'),
(155, 'Nepal', '2015-12-07 15:50:32'),
(156, 'Netherlands', '2015-12-07 15:50:32'),
(157, 'New Caledonia', '2015-12-07 15:50:32'),
(158, 'New Zealand', '2015-12-07 15:50:33'),
(159, 'Nicaragua', '2015-12-07 15:50:33'),
(160, 'Niger', '2015-12-07 15:50:33'),
(161, 'Nigeria', '2015-12-07 15:50:33'),
(162, 'Niue', '2015-12-07 15:50:33'),
(163, 'Norfolk Island', '2015-12-07 15:50:33'),
(164, 'Northern Mariana Islands', '2015-12-07 15:50:33'),
(165, 'Norway', '2015-12-07 15:50:33'),
(166, 'Oman', '2015-12-07 15:50:33'),
(167, 'Pakistan', '2015-12-07 15:50:33'),
(168, 'Palau', '2015-12-07 15:50:33'),
(169, 'Palestinian Territory, Occupied', '2015-12-07 15:50:33'),
(170, 'Panama', '2015-12-07 15:50:33'),
(171, 'Papua New Guinea', '2015-12-07 15:50:33'),
(172, 'Paraguay', '2015-12-07 15:50:33'),
(173, 'Peru', '2015-12-07 15:50:33'),
(174, 'Philippines', '2015-12-07 15:50:33'),
(175, 'Pitcairn', '2015-12-07 15:50:33'),
(176, 'Poland', '2015-12-07 15:50:33'),
(177, 'Portugal', '2015-12-07 15:50:33'),
(178, 'Puerto Rico', '2015-12-07 15:50:33'),
(179, 'Qatar', '2015-12-07 15:50:33'),
(180, 'Reunion', '2015-12-07 15:50:34'),
(181, 'Romania', '2015-12-07 15:50:34'),
(182, 'Russian Federation', '2015-12-07 15:50:34'),
(183, 'Rwanda', '2015-12-07 15:50:34'),
(184, 'Saint Barthelemy', '2015-12-07 15:50:34'),
(185, 'Saint Helena, Ascension and Tristan da Cunha', '2015-12-07 15:50:34'),
(186, 'Saint Kitts and Nevis', '2015-12-07 15:50:34'),
(187, 'Saint Lucia', '2015-12-07 15:50:34'),
(188, 'Saint Martin (French part)', '2015-12-07 15:50:34'),
(189, 'Saint Pierre and Miquelon', '2015-12-07 15:50:34'),
(190, 'Saint Vincent and The Grenadines', '2015-12-07 15:50:34'),
(191, 'Samoa', '2015-12-07 15:50:34'),
(192, 'San Marino', '2015-12-07 15:50:34'),
(193, 'Sao Tome and Principe', '2015-12-07 15:50:34'),
(194, 'Saudi Arabia', '2015-12-07 15:50:34'),
(195, 'Senegal', '2015-12-07 15:50:34'),
(196, 'Serbia', '2015-12-07 15:50:34'),
(197, 'Seychelles', '2015-12-07 15:50:34'),
(198, 'Sierra Leone', '2015-12-07 15:50:34'),
(199, 'Singapore', '2015-12-07 15:50:35'),
(200, 'Sint Maarten (Dutch part)', '2015-12-07 15:50:35'),
(201, 'Slovakia', '2015-12-07 15:50:35'),
(202, 'Slovenia', '2015-12-07 15:50:35'),
(203, 'Solomon Islands', '2015-12-07 15:50:35'),
(204, 'Somalia', '2015-12-07 15:50:35'),
(205, 'South Africa', '2015-12-07 15:50:35'),
(206, 'South Georgia and The South Sandwich Islands', '2015-12-07 15:50:35'),
(207, 'South Sudan', '2015-12-07 15:50:35'),
(208, 'Spain', '2015-12-07 15:50:35'),
(209, 'Sri Lanka', '2015-12-07 15:50:35'),
(210, 'Sudan', '2015-12-07 15:50:35'),
(211, 'Suriname', '2015-12-07 15:50:35'),
(212, 'Svalbard and Jan Mayen', '2015-12-07 15:50:35'),
(213, 'Swaziland', '2015-12-07 15:50:35'),
(214, 'Sweden', '2015-12-07 15:50:35'),
(215, 'Switzerland', '2015-12-07 15:50:36'),
(216, 'Syrian Arab Republic', '2015-12-07 15:50:36'),
(217, 'Taiwan, Province of China', '2015-12-07 15:50:36'),
(218, 'Tajikistan', '2015-12-07 15:50:36'),
(219, 'Tanzania, United Republic of', '2015-12-07 15:50:36'),
(220, 'Thailand', '2015-12-07 15:50:36'),
(221, 'Timor-leste', '2015-12-07 15:50:36'),
(222, 'Togo', '2015-12-07 15:50:36'),
(223, 'Tokelau', '2015-12-07 15:50:36'),
(224, 'Tonga', '2015-12-07 15:50:36'),
(225, 'Trinidad and Tobago', '2015-12-07 15:50:36'),
(226, 'Tunisia', '2015-12-07 15:50:36'),
(227, 'Turkey', '2015-12-07 15:50:36'),
(228, 'Turkmenistan', '2015-12-07 15:50:36'),
(229, 'Turks and Caicos Islands', '2015-12-07 15:50:36'),
(230, 'Tuvalu', '2015-12-07 15:50:36'),
(231, 'Uganda', '2015-12-07 15:50:37'),
(232, 'Ukraine', '2015-12-07 15:50:37'),
(233, 'United Arab Emirates', '2015-12-07 15:50:37'),
(234, 'United Kingdom', '2015-12-07 15:50:37'),
(235, 'United States', '2015-12-07 15:50:37'),
(236, 'United States Minor Outlying Islands', '2015-12-07 15:50:37'),
(237, 'Uruguay', '2015-12-07 15:50:37'),
(238, 'Uzbekistan', '2015-12-07 15:50:37'),
(239, 'Vanuatu', '2015-12-07 15:50:37'),
(240, 'Venezuela, Bolivarian Republic of', '2015-12-07 15:50:37'),
(241, 'Viet Nam', '2015-12-07 15:50:37'),
(242, 'Virgin Islands, British', '2015-12-07 15:50:37'),
(243, 'Virgin Islands, U.S.', '2015-12-07 15:50:37'),
(244, 'Wallis and Futuna', '2015-12-07 15:50:37'),
(245, 'Western Sahara', '2015-12-07 15:50:37'),
(246, 'Yemen', '2015-12-07 15:50:37'),
(247, 'Zambia', '2015-12-07 15:50:37'),
(248, 'Zimbabwe', '2015-12-07 15:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_applied`
--

CREATE TABLE `coupon_applied` (
  `ca_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sess_id` varchar(255) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `couponid` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `coupon_type` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_applied`
--

INSERT INTO `coupon_applied` (`ca_id`, `userid`, `sess_id`, `orderid`, `couponid`, `code`, `coupon_type`, `value`, `status`) VALUES
(24, 2, '', 'CC00000028', 26, 'as7', 'Discount', '10', 1),
(25, 2, '', 'CC00000029', 27, 'as9', '$', '100.00', 1),
(26, 2, '', 'CC00000030', 28, 'as10', 'Discount', '10', 1),
(29, 0, '98bc7f5fa3cc8fe7e02f3ec018c48bd3', 'CC00000039', 30, 'as121', '$', '100.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `custom_color_master`
--

CREATE TABLE `custom_color_master` (
  `cc_id` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL,
  `style_id` int(11) NOT NULL,
  `color_value` text NOT NULL,
  `color_name` text NOT NULL,
  `color_img` text NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_color_master`
--

INSERT INTO `custom_color_master` (`cc_id`, `subcatid`, `style_id`, `color_value`, `color_name`, `color_img`, `created_date`, `last_updated`) VALUES
(1, 2, 8, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-24 16:57:45', '2016-03-31 12:11:33'),
(5, 2, 2, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Yellow,Raspberry,Violet,Light Brown,Green,Red,Orange,Purple,ZBlack', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 06:51:32', '2016-05-23 12:29:06'),
(6, 2, 4, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 06:59:12', '2016-03-31 11:15:45'),
(7, 2, 3, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 07:01:16', '2016-03-31 11:15:45'),
(8, 2, 5, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 07:04:57', '2016-03-31 11:15:45'),
(9, 2, 6, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 07:11:03', '2016-03-31 11:15:45'),
(10, 2, 7, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 07:15:53', '2016-03-31 11:15:45'),
(12, 2, 9, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 13:08:28', '2016-03-31 12:10:31'),
(13, 2, 10, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 13:11:20', '2016-03-31 11:15:45'),
(19, 2, 2, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 14:32:26', '2016-03-31 11:15:45'),
(20, 2, 3, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 15:00:18', '2016-03-31 11:15:45'),
(21, 1, 4, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 15:10:40', '2016-03-31 12:00:00'),
(22, 1, 5, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 15:13:46', '2016-03-31 12:00:38'),
(23, 1, 6, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 15:17:18', '2016-03-31 12:00:54'),
(24, 1, 7, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-02-26 15:19:51', '2016-03-31 12:01:11'),
(25, 2, 9, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8,', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg,assets/custom_colors/1459423131_Koala.jpg', '2016-02-29 07:04:26', '2016-03-31 11:18:51'),
(28, 2, 7, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg', '2016-03-21 10:38:45', '2016-03-31 11:15:45'),
(31, 2, 9, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8,', 'assets/custom_colors/1459419483_1456499626_9.jpg,assets/custom_colors/1459419483_1456499626_18.jpg,assets/custom_colors/1459419483_1456499626_32.jpg,assets/custom_colors/1459419483_1456499626_31.jpg,assets/custom_colors/1459419483_1456499626_19.jpg,assets/custom_colors/1459419534_1456499626_25.jpg,assets/custom_colors/1459419534_1456499626_31.jpg,assets/custom_colors/1459419534_1456499626_32.jpg,assets/custom_colors/1459419534_1456499626_17.jpg,assets/custom_colors/1459423131_Koala.jpg', '2016-03-31 10:18:03', '2016-03-31 11:18:51'),
(34, 2, 1, '#000000', '', 'assets/custom_colors/1459424755_Tulips.jpg', '2016-03-31 10:45:11', '2016-03-31 11:47:24'),
(37, 1, 3, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7', 'assets/custom_colors/1459425860_1456499626_9.jpg,assets/custom_colors/1459425860_1456499626_12.jpg,assets/custom_colors/1459425860_1456499626_13.jpg,assets/custom_colors/1459425860_1456499626_14.jpg,assets/custom_colors/1459425860_1456499626_16.jpg,assets/custom_colors/1459425860_1456499626_17.jpg,assets/custom_colors/1459425860_1456499626_18.jpg,assets/custom_colors/1459425860_1456499626_19.jpg', '2016-03-31 12:04:20', '0000-00-00 00:00:00'),
(38, 1, 1, '#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000,#000000', 'Color,Color1,Color2,Color3,Color4,Color5,Color6,Color7,Color8,Color9,Color10,Color11', 'assets/custom_colors/1459425985_1456499626_9.jpg,assets/custom_colors/1459425985_1456499626_12.jpg,assets/custom_colors/1459425985_1456499626_13.jpg,assets/custom_colors/1459425985_1456499626_14.jpg,assets/custom_colors/1459425985_1456499626_16.jpg,assets/custom_colors/1459425985_1456499626_17.jpg,assets/custom_colors/1459425985_1456499626_18.jpg,assets/custom_colors/1459425985_1456499626_18.jpg,assets/custom_colors/1459425985_1456499626_19.jpg,assets/custom_colors/1459425985_1456499626_31.jpg,assets/custom_colors/1459425985_1456499626_31.jpg,assets/custom_colors/1459425985_1456499626_32.jpg', '2016-03-31 12:06:25', '0000-00-00 00:00:00'),
(39, 1, 2, '#000000,#000000,#000000,#000000,#000000,#000000', 'Color12,Color1,Color2,Color3,Color4,Color5', 'assets/custom_colors/1459426039_1456499626_17.jpg,assets/custom_colors/1459426039_1456499626_19.jpg,assets/custom_colors/1459426039_1456499626_17.jpg,assets/custom_colors/1459426039_1456499626_16.jpg,assets/custom_colors/1459426039_1456499626_32.jpg,assets/custom_colors/1459426039_1456499626_31.jpg', '2016-03-31 12:07:19', '2016-05-25 02:24:18'),
(40, 6, 1, '#000000,#cc6666,#662f2f,#634343,#8a2323', 'Color1,Color2,Color3,Color4,Color5', 'assets/custom_colors/1476969542_1456313265_9.jpg,assets/custom_colors/1476969542_1456313265_12.jpg,assets/custom_colors/1476969542_1456313265_13.jpg,assets/custom_colors/1476969542_1456313265_14.jpg,assets/custom_colors/1476969542_1456313265_25.jpg', '2016-10-20 06:19:02', '0000-00-00 00:00:00'),
(41, 6, 2, '#000000,#cf8888,#853030,#b06666', 'Color1,Color2,Color3,Color4', 'assets/custom_colors/1476969620_1459425985_1456499626_9.jpg,assets/custom_colors/1476969620_1456313265_13.jpg,assets/custom_colors/1476969620_1456313265_12.jpg,assets/custom_colors/1476969620_1456313265_13.jpg', '2016-10-20 06:20:20', '0000-00-00 00:00:00'),
(42, 6, 3, '#000000,#9c4b4b,#9e1d1d,#a82f2f', 'Color1,Color2,Color3,Color4', 'assets/custom_colors/1476969664_1456313265_15.jpg,assets/custom_colors/1476969664_1456313265_13.jpg,assets/custom_colors/1476969664_1456313265_17.jpg,assets/custom_colors/1476969664_1456313265_31.jpg', '2016-10-20 06:21:04', '0000-00-00 00:00:00'),
(43, 6, 7, '#000000,#cf9595,#ba3737,#c24040', 'Color1,Color2,Color3,Color4', 'assets/custom_colors/1476969702_1456313265_9.jpg,assets/custom_colors/1476969702_1456313265_13.jpg,assets/custom_colors/1476969702_1456313265_12.jpg,assets/custom_colors/1476969702_1456313265_13.jpg', '2016-10-20 06:21:42', '0000-00-00 00:00:00'),
(44, 6, 6, '#000000,#d17d7d,#bd4c4c,#c73737', 'Color1,Color2,Color3,Color4', 'assets/custom_colors/1476969749_1456313265_13.jpg,assets/custom_colors/1476969749_1456492436_18.jpg,assets/custom_colors/1476969749_1476807340_1456313265_15.jpg,assets/custom_colors/1476969749_1476807340_1456313265_13.jpg', '2016-10-20 06:22:29', '0000-00-00 00:00:00'),
(45, 6, 6, '#000000,#c27878,#bd5353,#d1aeae', 'Color1,Color2,Color3,Color4', 'assets/custom_colors/1476969787_1456313265_12.jpg,assets/custom_colors/1476969787_1456313265_13.jpg,assets/custom_colors/1476969787_1456313265_12.jpg,assets/custom_colors/1476969787_1456313265_13.jpg', '2016-10-20 06:23:07', '0000-00-00 00:00:00'),
(46, 6, 5, '#000000,#b56a6a,#6b4444,#944e4e', 'Color1,Color2,Color3,Color4', 'assets/custom_colors/1476973052_1456313265_9.jpg,assets/custom_colors/1476973052_1456313265_12.jpg,assets/custom_colors/1476973052_1456313265_13.jpg,assets/custom_colors/1476973052_1456313265_14.jpg', '2016-10-20 07:17:32', '0000-00-00 00:00:00'),
(47, 1, 9, '#000000,#000000', 'Burgundy ,Silver', 'assets/custom_colors/1502835826_5179#.jpg,assets/custom_colors/1502835829_5145#.jpg', '2017-08-15 15:17:53', '2017-08-15 15:23:49'),
(48, 5, 11, '#000000', 'Hordley', 'assets/custom_colors/1508499336_57_big.jpg', '2017-10-20 17:05:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `code_name` text NOT NULL,
  `discount_type` text NOT NULL,
  `discount_amount` decimal(11,2) NOT NULL,
  `discount_percentage` text NOT NULL,
  `orders_on` text NOT NULL,
  `over_amount` decimal(11,2) NOT NULL,
  `product_name` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `code_name`, `discount_type`, `discount_amount`, `discount_percentage`, `orders_on`, `over_amount`, `product_name`, `start_date`, `end_date`, `date`) VALUES
(2, 'COD1', '$', '100.00', '', 'All', '0.00', '', '2016-05-23 00:00:00', '2016-05-24 00:00:00', '2016-05-23 23:59:08'),
(8, 'sa5', '$', '100.00', '', 'All', '0.00', '', '2016-06-07 00:00:00', '2016-07-09 00:00:00', '2016-06-07 12:19:03'),
(11, 'sa8', '$', '100.00', '', 'All', '0.00', '', '2016-06-07 00:00:00', '2016-06-09 00:00:00', '2016-06-07 00:55:14'),
(28, 'as10', 'Discount', '0.00', '10', 'All', '0.00', '', '2016-06-15 00:00:00', '2016-06-17 00:00:00', '2016-06-15 20:53:04'),
(35, 'Test4', '$', '25.00', '', 'All', '0.00', '', '2016-11-01 00:00:00', '2016-12-08 00:00:00', '2016-11-01 18:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_master`
--

CREATE TABLE `fabric_master` (
  `fab_id` int(11) NOT NULL,
  `fab_rand` varchar(255) NOT NULL,
  `fab_name` varchar(255) NOT NULL,
  `fab_desc` text NOT NULL,
  `fab_img` text NOT NULL,
  `fab_price` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `catid` int(11) NOT NULL,
  `default_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fabric_master`
--

INSERT INTO `fabric_master` (`fab_id`, `fab_rand`, `fab_name`, `fab_desc`, `fab_img`, `fab_price`, `created_date`, `last_updated`, `catid`, `default_img`) VALUES
(1, '141', 'Sicilian Grey', '<p>100% wool - 285gr/m2 - Year round&nbsp;</p>', 'assets/dimg/fabric/141_normal.jpg', '12', '2016-01-28 11:51:38', '2016-05-19 12:17:31', 1, 'assets/dimg/fabric/default/141_normal.jpg'),
(2, '894', 'Oberon', '<p>WOOL</p>', 'assets/dimg/fabric/894_normal.jpg', '10', '2016-01-28 11:52:15', '2016-02-17 15:49:15', 1, 'assets/dimg/fabric/default/894_1455014113_normal.jpeg'),
(3, '1340', 'Ohana', '<p>COTTON</p>', 'assets/dimg/fabric/1340_normal.jpg', '10', '2016-02-03 14:53:30', '2016-02-16 13:28:48', 2, 'assets/dimg/fabric/default/1340_1455609293_normal.jpeg'),
(4, '187', 'Charcoal', '<p>WOOL</p>', 'assets/dimg/fabric/187_normal.jpeg', '200', '2016-02-07 02:09:18', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/187_1455014113_normal.jpeg'),
(5, '591', 'Charcoal', '<p>superfine 150s</p>', 'assets/dimg/fabric/591_normal.jpg', '200', '2016-02-07 02:09:18', '2016-05-27 20:05:36', 3, 'assets/dimg/fabric/default/591_normal.jpg'),
(6, '996', 'Charcoal', '<p>superfine 150s</p>', 'assets/dimg/fabric/996_normal.jpg', '200', '2016-02-07 02:09:18', '2016-06-07 16:53:39', 4, ''),
(7, '991', 'Test', '<p>Test</p>', 'assets/dimg/fabric/991_normal.jpeg', '12', '2016-02-17 15:48:33', '2016-03-01 18:58:09', 8, 'assets/dimg/fabric/default/991_normal_0.jpeg'),
(8, '558', 'Sicilian Grey', '<p>100% wool - 285gr/m2 - Year round&nbsp;</p>', 'assets/dimg/fabric/558_normal.jpg', '12', '2016-02-25 19:53:15', '2016-05-19 12:00:45', 4, 'assets/dimg/fabric/default/558_normal_0.jpeg'),
(15, '876', 'Woollen', '<p>Woollen Materials</p>', 'assets/dimg/fabric/876_normal.jpg', '85', '2016-02-27 12:36:28', '2016-06-10 19:47:58', 1, 'assets/dimg/fabric/default/876_1456556972_normal.jpeg'),
(23, '964', 'sample Fabric', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry.</p>', 'assets/dimg/fabric/964_normal.jpg', '12', '2016-03-21 17:09:37', '2016-06-10 19:48:20', 1, 'assets/dimg/fabric/default/658_normal_0.jpg'),
(24, '488', 'In-Store Fabric Selection', '<p>In-store selection</p>', 'assets/dimg/fabric/488_normal.jpg', '0', '2016-04-16 00:07:19', '2016-05-14 15:18:18', 1, 'assets/dimg/fabric/default/488_normal_0.jpg'),
(25, '855', 'In-Store Fabric Selection', '<p>In-store selection</p>', 'assets/dimg/fabric/855_normal.jpg', '0', '2016-04-16 00:07:19', '2017-05-02 09:14:27', 2, 'assets/dimg/fabric/default/855_normal_1.jpg'),
(26, '698', 'In-Store Fabric Selection', '<p>In-store selection</p>', 'assets/dimg/fabric/698_normal.jpg', '0', '2016-04-16 00:07:19', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/698_normal_2.jpg'),
(27, '636', 'In-Store Fabric Selection', '<p>In-store selection</p>', 'assets/dimg/fabric/636_normal.jpg', '0', '2016-04-16 00:07:19', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/636_normal_3.jpg'),
(32, '687', 'red', '<p>red</p>', 'assets/dimg/fabric/687_normal.jpg', '0', '2016-05-18 06:01:04', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/687_normal_1.jpg'),
(34, '368', 'red', '<p>red</p>', 'assets/dimg/fabric/368_normal.jpg', '20', '2016-05-18 06:01:55', '2016-05-18 13:16:05', 1, 'assets/dimg/fabric/default/368_normal_0.jpg'),
(36, '272', 'red', '<p>red</p>', 'assets/dimg/fabric/272_normal.jpg', '0', '2016-05-18 06:01:55', '2016-06-07 16:52:06', 4, 'assets/dimg/fabric/default/272_normal_2.jpg'),
(37, '327', 'Testings', '<p>Testings123dvfsdf</p>', 'assets/dimg/fabric/327_normal.jpg', '12', '2016-05-19 11:48:35', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/327_normal_0.jpg'),
(38, '612', 'Sicilian Grey', '<p>100% wool - 285gr/m2 - Year round</p>', 'assets/dimg/fabric/612_normal.jpg', '0', '2016-05-19 12:18:18', '2016-05-24 19:30:32', 3, 'assets/dimg/fabric/default/612_normal_0.jpg'),
(39, '109', 'Clear Blue', '<p>Superfine 180\'s - solid clear rich blues</p>', 'assets/dimg/fabric/109_normal.jpg', '12', '2016-05-24 19:33:35', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/109_normal_0.jpg'),
(40, '318', 'Blue - Sample', '<p>Testing this Blue Fabricsuit1</p>', 'assets/dimg/fabric/318_normal.jpg', '10', '2016-05-24 23:37:39', '2016-05-27 20:16:47', 1, 'assets/dimg/fabric/default/318_normal_0.jpg'),
(41, '218', 'Blue - Sample', '<p>Testing this Blue Fabric blazer</p>', 'assets/dimg/fabric/218_normal.jpg', '10', '2016-05-24 23:37:39', '2016-05-27 20:17:14', 3, 'assets/dimg/fabric/default/218_normal_1.jpg'),
(42, '159', 'Blue Sample', '<p>Blue Sample1</p>', 'assets/dimg/fabric/159_normal.jpg', '12', '2016-10-20 18:11:21', '2017-09-15 15:59:01', 5, 'assets/dimg/fabric/default/159_normal_0.jpg'),
(43, '244', 'Clear Blue', '<p>Clear Blue1</p>', 'assets/dimg/fabric/244_normal.jpg', '15', '2016-10-20 18:12:10', '0000-00-00 00:00:00', 6, 'assets/dimg/fabric/default/244_normal_0.jpg'),
(44, '949', 'In-Store Fabric Selection', '<p>In-Store Fabric Selection11</p>', 'assets/dimg/fabric/949_normal.jpg', '0', '2016-10-20 18:13:08', '0000-00-00 00:00:00', 6, 'assets/dimg/fabric/default/949_normal_0.jpg'),
(45, '749', 'Fabric 6930238', '<p>Superfine 180\'s. Premium quality. Best of the best</p>', 'assets/dimg/fabric/749_normal.jpg', '0', '2016-12-03 02:58:44', '2017-05-02 09:03:56', 1, 'assets/dimg/fabric/default/749_normal_0.jpg'),
(46, '905', 'Fabric 6930238', '<p>Superfine 180\'s. Premium quality. Best of the best</p>', 'assets/dimg/fabric/749_normal.jpg', '0', '2016-12-03 02:58:44', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/905_normal_1.jpg'),
(47, '699', 'Fabric 6930238', '<p>Superfine 180\'s. Premium quality. Best of the best</p>', 'assets/dimg/fabric/699_normal.jpg', '0', '2016-12-03 02:58:44', '2016-12-03 03:04:59', 4, 'assets/dimg/fabric/default/699_normal.jpg'),
(48, '178', 'C268623', '<p>Premium Fabric for Custom Shirts</p>', 'assets/dimg/fabric/178_normal.jpg', '75', '2017-04-14 00:28:03', '0000-00-00 00:00:00', 2, 'assets/dimg/fabric/default/178_normal_0.jpg'),
(49, '395', 'Dark Silver Pin Stripe', '<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>', 'assets/dimg/fabric/395_normal.png', '0', '2017-05-02 08:59:53', '2017-06-28 10:37:58', 1, 'assets/dimg/fabric/default/395_normal_0.png'),
(50, '850', 'Black', '<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>', 'assets/dimg/fabric/850_normal.png', '0', '2017-05-02 09:01:43', '2017-06-28 10:36:51', 1, 'assets/dimg/fabric/default/850_normal_0.png'),
(51, '309', 'Crystal', '<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>', 'assets/dimg/fabric/309_normal.png', '0', '2017-05-02 09:03:18', '2017-06-28 10:35:07', 1, 'assets/dimg/fabric/default/309_normal_0.png'),
(52, '632', 'Mildberry Purple', '<ul>\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>', 'assets/dimg/fabric/632_normal.png', '0', '2017-05-02 09:05:47', '2017-06-28 10:32:03', 1, 'assets/dimg/fabric/default/632_normal_0.png'),
(53, '161', 'Mildberry Purple', '<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>', 'assets/dimg/fabric/632_normal.png', '0', '2017-05-02 09:05:47', '2017-06-28 10:32:37', 3, 'assets/dimg/fabric/default/161_normal_1.png'),
(54, '155', 'Violet', '<ul>\r\n<li>\r\n<div class=\"product-add-cta\">&nbsp;Premium collection, our highest quality fabrics.</div>\r\n</li>\r\n<li>Dry Clean Only</li>\r\n</ul>', 'assets/dimg/fabric/155_normal.png', '0', '2017-05-02 09:07:21', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/155_normal_0.png'),
(55, '403', 'Violet', '<ul>\r\n<li>\r\n<div class=\"product-add-cta\">&nbsp;Premium collection, our highest quality fabrics.</div>\r\n</li>\r\n<li>Dry Clean Only</li>\r\n</ul>', 'assets/dimg/fabric/155_normal.png', '0', '2017-05-02 09:07:21', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/403_normal_1.png'),
(56, '631', 'Redskins Burgundy', '<ul>\r\n<li>\r\n<div class=\"product-add-cta\">&nbsp;Premium collection, our highest quality fabrics.</div>\r\n</li>\r\n<li>Dry Clean Only</li>\r\n</ul>', 'assets/dimg/fabric/631_normal.png', '0', '2017-05-02 09:08:37', '2017-06-28 10:19:25', 1, 'assets/dimg/fabric/default/631_normal_0.png'),
(57, '114', 'Redskins Burgundy', '<ul>\r\n<li>\r\n<div class=\"product-add-cta\">&nbsp;Premium collection, our highest quality fabrics.</div>\r\n</li>\r\n<li>Dry Clean Only</li>\r\n</ul>', 'assets/dimg/fabric/631_normal.png', '0', '2017-05-02 09:08:37', '2017-06-28 10:22:02', 3, 'assets/dimg/fabric/default/114_normal_1.png'),
(58, '848', 'Mustang Red', '<ul>\r\n<li>\r\n<div class=\"product-add-cta\">&nbsp;Premium collection, our highest quality fabrics.</div>\r\n</li>\r\n<li>Dry Clean Only</li>\r\n</ul>', 'assets/dimg/fabric/848_normal.png', '0', '2017-05-02 09:09:54', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/848_normal_0.png'),
(59, '811', 'Mustang Red', '<ul>\r\n<li>\r\n<div class=\"product-add-cta\">&nbsp;Premium collection, our highest quality fabrics.</div>\r\n</li>\r\n<li>Dry Clean Only</li>\r\n</ul>', 'assets/dimg/fabric/848_normal.png', '0', '2017-05-02 09:09:54', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/811_normal_1.png'),
(60, '892', 'Shark Blue', '<ul>\r\n<li>\r\n<div class=\"product-add-cta\">&nbsp;Premium collection, our highest quality fabrics.</div>\r\n</li>\r\n<li>Dry Clean Only</li>\r\n<li></li>\r\n</ul>', 'assets/dimg/fabric/892_normal.png', '0', '2017-05-02 09:10:49', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/892_normal_0.png'),
(61, '597', 'Shark Blue', '<ul>\r\n<li>\r\n<div class=\"product-add-cta\">&nbsp;Premium collection, our highest quality fabrics.</div>\r\n</li>\r\n<li>Dry Clean Only</li>\r\n<li></li>\r\n</ul>', 'assets/dimg/fabric/892_normal.png', '0', '2017-05-02 09:10:49', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/597_normal_1.png'),
(62, '580', 'Royal Blue', '<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>', 'assets/dimg/fabric/580_normal.png', '0', '2017-05-02 09:11:55', '2017-06-28 10:38:23', 1, 'assets/dimg/fabric/default/580_normal_0.png'),
(63, '113', 'Royal Blue', '<ul>\r\n<li>\r\n<div class=\"product-add-cta\">&nbsp;Premium collection, our highest quality fabrics.</div>\r\n</li>\r\n<li>Dry Clean Only</li>\r\n</ul>', 'assets/dimg/fabric/580_normal.png', '0', '2017-05-02 09:11:55', '2017-06-28 10:38:34', 3, 'assets/dimg/fabric/default/113_normal_1.png'),
(64, '463', 'Shark Blue', '<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>', 'assets/dimg/fabric/463_normal.png', '0', '2017-06-26 11:01:54', '2017-06-26 11:02:11', 4, 'assets/dimg/fabric/default/463_normal_0.png'),
(65, '649', 'Dusk Gray', '<p>&nbsp;</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/649_normal.png', '589', '2017-06-28 11:09:33', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/649_normal_0.png'),
(66, '553', 'Dusk Gray', '<p>&nbsp;</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/649_normal.png', '589', '2017-06-28 11:09:33', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/553_normal_1.png'),
(67, '558', 'Dusk Gray', '<p>&nbsp;</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/649_normal.png', '589', '2017-06-28 11:09:33', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/558_normal_2.png'),
(68, '562', 'Dark Sand Windowpane', '<p>&nbsp;</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/562_normal.png', '589', '2017-06-28 11:17:45', '2017-06-28 11:18:08', 3, 'assets/dimg/fabric/default/562_normal_0.png'),
(69, '501', 'Dark Sand Windowpane', '<p>Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stiched collars and lapels, workable&nbsp;buttonwholes and lightweight shoulder pads.</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp;&nbsp;</p>\r\n<p><strong>Custom Made&nbsp;</strong></p>\r\n<p><strong>Based on your measurement profile.</strong></p>', 'assets/dimg/fabric/562_normal.png', '589', '2017-06-28 11:17:45', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/501_normal_1.png'),
(70, '881', 'Dark Sand Windowpane', '<p>Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stiched collars and lapels, workable&nbsp;buttonwholes and lightweight shoulder pads.</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp;&nbsp;</p>\r\n<p><strong>Custom Made&nbsp;</strong></p>\r\n<p><strong>Based on your measurement profile.</strong></p>', 'assets/dimg/fabric/562_normal.png', '589', '2017-06-28 11:17:45', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/881_normal_2.png'),
(71, '765', 'Sea Blue Plaid', '<p>&nbsp;</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/765_normal.png', '589', '2017-06-28 11:21:16', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/765_normal_0.png'),
(72, '337', 'Sea Blue Plaid', '<p>&nbsp;</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/765_normal.png', '589', '2017-06-28 11:21:16', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/337_normal_1.png'),
(73, '786', 'Sea Blue Plaid', '<p>&nbsp;</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp;&nbsp;</p>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/765_normal.png', '589', '2017-06-28 11:21:16', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/786_normal_2.png'),
(74, '952', 'Violet Red Plaid', '<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp; &nbsp;</p>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/952_normal.png', '589', '2017-06-28 11:23:11', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/952_normal_0.png'),
(75, '262', 'Violet Red Plaid', '<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp; &nbsp;</p>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/952_normal.png', '589', '2017-06-28 11:23:11', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/262_normal_1.png'),
(76, '903', 'Violet Red Plaid', '<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp; &nbsp;</p>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/952_normal.png', '589', '2017-06-28 11:23:11', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/903_normal_2.png'),
(77, '248', 'Sand', '<p>&nbsp;</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only. &nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/248_normal.png', '589', '2017-06-28 11:25:30', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/248_normal_0.png'),
(78, '934', 'Sand', '<p>&nbsp;</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only. &nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/248_normal.png', '589', '2017-06-28 11:25:30', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/934_normal_1.png'),
(79, '603', 'Sand', '<p>&nbsp;</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only. &nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>', 'assets/dimg/fabric/248_normal.png', '589', '2017-06-28 11:25:30', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/603_normal_2.png'),
(80, '300', 'Orange and Deep Blue Check Suit', '<p class=\"p1\">&nbsp;</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p1\">&nbsp;</p>\r\n<p class=\"p1\"><strong>&nbsp;</strong></p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/300_normal.png', '589', '2017-07-03 09:31:40', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/300_normal_0.png'),
(81, '808', 'Orange and Deep Blue Check Suit', '<p class=\"p1\">&nbsp;</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p1\">&nbsp;</p>\r\n<p class=\"p1\"><strong>&nbsp;</strong></p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/300_normal.png', '589', '2017-07-03 09:31:40', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/808_normal_1.png'),
(82, '655', 'Orange and Deep Blue Check Suit', '<p class=\"p1\">&nbsp;</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p1\">&nbsp;</p>\r\n<p class=\"p1\"><strong>&nbsp;</strong></p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/300_normal.png', '589', '2017-07-03 09:31:40', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/655_normal_2.png'),
(83, '132', 'Ocean Blue Check Suit', '<p class=\"p1\">&nbsp;</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p1\">&nbsp;</p>\r\n<p class=\"p1\"><strong>&nbsp;</strong></p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/132_normal.png', '589', '2017-07-03 09:37:28', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/132_normal_0.png'),
(84, '767', 'Ocean Blue Check Suit', '<p class=\"p1\">&nbsp;</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p1\">&nbsp;</p>\r\n<p class=\"p1\"><strong>&nbsp;</strong></p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/132_normal.png', '589', '2017-07-03 09:37:28', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/767_normal_1.png'),
(85, '379', 'Ocean Blue Check Suit', '<p class=\"p1\">&nbsp;</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p1\">&nbsp;</p>\r\n<p class=\"p1\"><strong>&nbsp;</strong></p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/132_normal.png', '589', '2017-07-03 09:37:28', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/379_normal_2.png'),
(86, '786', 'Forest Green', '<p class=\"p1\">&nbsp;Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stiched collars and lapels, workable&nbsp;buttonwholes and lightweight shoulder pads.</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><strong>Custom Made&nbsp;</strong></p>\r\n<p class=\"p1\"><strong>Based on your measurement profile.&nbsp;</strong></p>', 'assets/dimg/fabric/786_normal.png', '589', '2017-07-06 10:26:20', '2017-07-06 10:29:13', 1, 'assets/dimg/fabric/default/786_normal.png'),
(87, '591', 'Space Gray Windowpane', '<p class=\"p1\">&nbsp;</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/591_normal.png', '589', '2017-07-06 11:39:09', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/591_normal_0.png'),
(88, '164', 'Space Gray Windowpane', '<p class=\"p1\">&nbsp;</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/591_normal.png', '589', '2017-07-06 11:39:09', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/164_normal_1.png'),
(89, '245', 'Space Gray Windowpane', '<p class=\"p1\">&nbsp;</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/591_normal.png', '589', '2017-07-06 11:39:09', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/245_normal_2.png'),
(90, '570', 'Black Pin Stripe', '<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/570_normal.jpg', '539', '2017-08-20 04:26:16', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/570_normal_0.jpg'),
(91, '173', 'Black Pin Stripe', '<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/570_normal.jpg', '539', '2017-08-20 04:26:16', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/173_normal_1.jpg'),
(92, '848', 'Black Pin Stripe', '<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/570_normal.jpg', '539', '2017-08-20 04:26:16', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/848_normal_2.jpg'),
(93, '355', 'Jet Black', '<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/355_normal.jpg', '539', '2017-08-20 04:37:30', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/355_normal_0.jpg'),
(94, '159', 'Jet Black', '<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/355_normal.jpg', '539', '2017-08-20 04:37:30', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/159_normal_1.jpg'),
(95, '937', 'Jet Black', '<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p2\">&nbsp;</p>', 'assets/dimg/fabric/355_normal.jpg', '539', '2017-08-20 04:37:30', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/937_normal_2.jpg'),
(96, '763', 'Burgundy', '<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>', 'assets/dimg/fabric/763_normal.jpg', '539', '2017-08-20 05:10:00', '0000-00-00 00:00:00', 1, 'assets/dimg/fabric/default/763_normal_0.jpg'),
(97, '427', 'Burgundy', '<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>', 'assets/dimg/fabric/763_normal.jpg', '539', '2017-08-20 05:10:00', '0000-00-00 00:00:00', 4, 'assets/dimg/fabric/default/427_normal_1.jpg'),
(98, '192', 'Burgundy', '<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.&nbsp;</li>\r\n</ul>', 'assets/dimg/fabric/763_normal.jpg', '539', '2017-08-20 05:10:00', '0000-00-00 00:00:00', 3, 'assets/dimg/fabric/default/192_normal_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_pricing`
--

CREATE TABLE `fabric_pricing` (
  `fab_p_id` int(11) NOT NULL,
  `fabid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL,
  `fab_cost` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faqs_master`
--

CREATE TABLE `faqs_master` (
  `f_id` int(11) NOT NULL,
  `f_title` text NOT NULL,
  `f_desc` text NOT NULL,
  `f_status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs_master`
--

INSERT INTO `faqs_master` (`f_id`, `f_title`, `f_desc`, `f_status`, `created_date`, `last_updated`) VALUES
(1, 'How much is shipping?', '<p>Free shipping. Enjoy!</p>\r\n<p>&nbsp;</p>', 0, '2015-12-24 15:06:00', '0000-00-00 00:00:00'),
(2, 'Do I have to pay sales tax?', '<p>Currently, we are responsible for collecting sales tax in the state of Maryland and the District of Columbia (DC). No sales tax will be collected for any of the other states.</p>', 0, '2015-12-24 14:00:00', '0000-00-00 00:00:00'),
(3, 'How long should I expect to wait for my custom bespoke clothing?', '<p>Our master tailors will have your custom bespoke clothing&nbsp;ready in 4&nbsp;to 5 weeks.</p>', 0, '2015-12-24 16:00:00', '0000-00-00 00:00:00'),
(4, 'What is your Return Policy', '<p>There are no refunds for custom clothing orders. Remakes and credit is available for future orders. It\'s a case by case. Please reach out to support@customclothiers.com about your order.</p>', 0, '2015-12-24 16:00:00', '0000-00-00 00:00:00'),
(5, 'Can I track my shipment?', '<p>Simply login to track your order</p>', 0, '2015-12-24 16:00:00', '0000-00-00 00:00:00'),
(6, 'What if my clothing needs alternations?', '<p>Simply stop by one of our showrooms for alternation services. For online order, we will offer up to $75 alternation credit once you\'ve completed our alternation forms. You can stop by any local alternation shop and get the necessary changes fixed.</p>', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'How do I contact you?', '<p>Simply click on our \"Contact Us\" link and you will find our telephone number and email.</p>', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'How do I get measured?', '<p>You can stop by any of our showrooms or a local tailor&nbsp;to have them measure you. The typically cost is $10-15. We will offer a $20 credit card&nbsp;refund after&nbsp;you\'ve receive your first order in good standing. For credit refunds, simply email support@customclothiers.com with your order number and we\'ll send $20 back to your credit card.</p>', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Do you offer Group Discounts?', '<p>Yes, for groups 6 or more. Custom Clothiers services a lot of wedding parties each year. It\'s best to contact our local showroom or by emailing support@customclothiers.com with your name and number so we can reach out.</p>', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'How is the quality of your fabrics?', '<p>Many of our competitors use low quality fabric blends.&nbsp;Custom Clothiers&nbsp;only offer premium fabric products. Our suit fabrics are 100% wool Superfine 150\'s and 180\'s and our shirts are typically 100% cotton.&nbsp;</p>', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_master`
--

CREATE TABLE `gallery_master` (
  `w_id` int(11) NOT NULL,
  `w_title` text NOT NULL,
  `w_image` text NOT NULL,
  `w_desc` text NOT NULL,
  `block` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_master`
--

INSERT INTO `gallery_master` (`w_id`, `w_title`, `w_image`, `w_desc`, `block`, `created_date`, `last_updated`) VALUES
(2, 'Our Custom Suitss', 'uploads/whyus/1508351495_suit photostock.JPG', '<p><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">All&nbsp;Custom Clothiers suits are tailored using a half-canvas construction. This method improves the drape &amp; durability of the suit.&nbsp;Our&nbsp;suits are tailored from the finest clothes produced in&nbsp;Italy, England, and Asia.<br /><br /><br /></span></p>', 0, '2017-09-15 01:27:18', '2017-10-20 16:05:34'),
(3, 'Our Custom Shirts', 'uploads/whyus/1508352486_14788316070.png', '<p><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">All&nbsp;Custom Clothiers shirts are tailored using a premium cotton material. We offer many different weaves Broadcloth, Twill, Pinpoint Oxford, Royal Oxford, Oxford, Chambray, Dobby, End-on-End, Melange, Poplin, and Herringbone.&nbsp;Design to fit perfectly.&nbsp;</span></p>', 0, '2017-10-18 22:45:51', '2017-10-19 00:18:06'),
(4, 'Hassle Free Ordering', 'uploads/whyus/1508347221_free shipping.jpg', '<p><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">Free shipping and returns at our local showroom</span></p>', 1, '2017-10-18 22:50:21', '2017-10-18 22:50:53'),
(5, 'Perfect Fit Guarantee', 'uploads/whyus/1508348269_measuring-tape-953422__340.jpg', '<p><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">Our Perfect Fit Guarantee ensures that we will make any adjustments or remake any custom-made suits and shirts to ensure that it fits you perfectly.</span></p>', 0, '2017-10-18 22:58:09', '2017-10-18 23:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `gift_card_applied`
--

CREATE TABLE `gift_card_applied` (
  `gca_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sess_id` varchar(255) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `gcid` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_card_applied`
--

INSERT INTO `gift_card_applied` (`gca_id`, `userid`, `sess_id`, `orderid`, `gcid`, `code`, `amount`, `status`) VALUES
(4, 2, '0', 'CC00000001', 4, 'GC11055391170550', '40.00', 1),
(11, 2, '0', 'CC00000010', 31, 'GC110694582756143', '30.00', 1),
(17, 2, '0', 'CC00000020', 33, 'GC110916312203276', '30.00', 1),
(37, 2, '0', 'CC00000028', 27, 'GC21144086198881', '21.00', 1),
(38, 2, '0', 'CC00000029', 90, 'GC75216271381825', '75.00', 1),
(39, 2, '0', 'CC00000030', 96, 'GC21252904574386', '21.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gift_card_master`
--

CREATE TABLE `gift_card_master` (
  `gc_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sess_id` varchar(255) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `gift_code` varchar(255) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `balance` decimal(11,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `gift_type` varchar(255) NOT NULL,
  `recipient_name` varchar(255) NOT NULL,
  `recipient_mail` varchar(255) NOT NULL,
  `recipient_address` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `used` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_card_master`
--

INSERT INTO `gift_card_master` (`gc_id`, `userid`, `sess_id`, `orderid`, `gift_code`, `amount`, `balance`, `quantity`, `gift_type`, `recipient_name`, `recipient_mail`, `recipient_address`, `status`, `used`, `created_date`, `last_updated`) VALUES
(15, 2, '0', 'CC00000001', 'GC30675249735824', '30.00', '30.00', 1, 'myself', '', '', '', 1, 0, '2016-06-07 02:46:29', '0000-00-00 00:00:00'),
(39, 0, '1ec40a62a0acba458ec486d1e3bb79bf', 'CC00000012', 'GC100769932823255', '100.00', '100.00', 1, 'someone', 'jdf', '', '', 0, 0, '2016-06-12 18:49:17', '0000-00-00 00:00:00'),
(96, 2, '0', 'CC00000029', 'GC21252904574386', '21.00', '0.00', 1, 'myself', '', '', '', 1, 0, '2016-06-15 08:16:10', '0000-00-00 00:00:00'),
(97, 2, '0', 'CC00000030', 'GC13414133032318', '13.00', '13.00', 1, 'myself', '', '', '', 1, 0, '2016-06-15 08:22:28', '0000-00-00 00:00:00'),
(98, 2, '0', 'CC00000030', 'GC13560376175679', '13.00', '13.00', 1, 'myself', '', '', '', 1, 0, '2016-06-15 08:22:28', '0000-00-00 00:00:00'),
(99, 0, '465daa72cc87e1965bb0bf2d450b3fef', 'CC00000037', 'GC100896979094948', '100.00', '100.00', 1, 'someone', '', 'joehuang@hotmail.com', '', 0, 0, '2016-08-08 13:43:18', '0000-00-00 00:00:00'),
(108, 1, '0', '0', 'GC12152962071821', '12.00', '12.00', 1, 'myself', '', '', '', 1, 0, '2016-11-01 05:51:04', '0000-00-00 00:00:00'),
(109, 50, '0', 'CC00000093', 'GC25165384937077', '25.00', '25.00', 1, 'someone', '', 'vinkler.zp@gmail.com', '', 0, 0, '2017-07-20 06:43:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `public` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`group_id`, `group_name`, `public`) VALUES
(1, 'General e-Newsletter', 1),
(2, 'Employees', 0),
(3, 'Vendors', 0),
(4, 'Users', 0);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `link_id` int(11) NOT NULL,
  `link_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `link_open`
--

CREATE TABLE `link_open` (
  `link_open_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `send_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `measurement_profile_fields`
--

CREATE TABLE `measurement_profile_fields` (
  `mpf_id` int(11) NOT NULL,
  `labelname` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement_profile_fields`
--

INSERT INTO `measurement_profile_fields` (`mpf_id`, `labelname`, `status`, `created_date`, `last_updated`) VALUES
(1, 'Full Shoulder Width', 1, '2016-02-01 16:44:21', '2016-02-28 16:08:08'),
(2, 'Right Sleeve', 1, '2016-02-01 16:44:32', '2016-02-28 16:08:25'),
(3, 'Left Sleeve', 1, '2016-02-01 16:44:39', '2016-02-28 16:08:41'),
(4, 'Full Chest', 1, '2016-02-01 16:44:48', '2016-02-28 16:08:54'),
(5, 'Upper Waist/Stomach', 1, '2016-02-01 16:44:57', '2016-02-28 16:09:07'),
(6, 'Lower Waist/Stomach', 1, '2016-02-01 16:45:04', '2016-02-28 16:09:18'),
(7, 'Hips/Seat', 1, '2016-02-01 16:45:21', '2016-02-28 16:09:32'),
(8, 'Bicep', 1, '2016-02-01 16:45:28', '2016-02-28 16:09:42'),
(10, 'Shirt Length', 1, '2016-02-01 16:45:41', '2016-02-28 16:10:06'),
(11, 'Neck', 1, '2016-02-01 16:45:50', '2016-02-28 16:10:22'),
(12, 'Right Cuff / Wrist', 1, '2016-02-01 16:45:58', '2016-05-23 12:47:15'),
(13, 'Left Cuff / Wrist', 1, '2016-02-01 16:46:03', '2016-05-23 12:47:25'),
(14, 'Jacket Length', 1, '2016-02-01 16:46:09', '2016-05-23 12:47:02'),
(15, 'Pants Waist', 1, '2016-02-01 16:46:14', '2016-05-23 12:47:40'),
(16, 'Pants Hips', 1, '2016-02-01 16:46:19', '2016-05-23 12:47:53'),
(17, 'Crotch', 1, '2016-02-01 16:46:26', '2016-05-23 12:48:05'),
(18, 'Thigh', 1, '2016-02-01 16:46:36', '2016-05-23 12:48:22'),
(22, 'Pants Length', 1, '2016-02-29 07:14:49', '2016-05-23 12:48:33'),
(24, 'Leg Opening', 1, '2016-05-14 05:36:49', '2016-05-23 12:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_profile_master`
--

CREATE TABLE `measurement_profile_master` (
  `mp_id` int(11) NOT NULL,
  `mp_userid` int(11) NOT NULL,
  `mp_name` varchar(255) NOT NULL,
  `mp_height` varchar(255) NOT NULL,
  `mp_weight` varchar(255) NOT NULL,
  `mp_chest` varchar(255) NOT NULL,
  `mp_abdomen` varchar(255) NOT NULL,
  `mp_buttocks` varchar(255) NOT NULL,
  `mp_hips` varchar(255) NOT NULL,
  `coat_length` varchar(255) NOT NULL,
  `torso_length` varchar(255) NOT NULL,
  `dress_length` varchar(255) NOT NULL,
  `sleeve_length` varchar(255) NOT NULL,
  `shoulder_width` varchar(255) NOT NULL,
  `neck` varchar(255) NOT NULL,
  `chest_around` varchar(255) NOT NULL,
  `stomach` varchar(255) NOT NULL,
  `breast_point` varchar(255) NOT NULL,
  `waist_point` varchar(255) NOT NULL,
  `pant_length` varchar(255) NOT NULL,
  `skirt_length` varchar(255) NOT NULL,
  `hips` varchar(255) NOT NULL,
  `waist` varchar(255) NOT NULL,
  `rise` varchar(255) NOT NULL,
  `thigh` varchar(255) NOT NULL,
  `bicep_around` varchar(255) NOT NULL,
  `pant_waist` varchar(255) NOT NULL,
  `skirt_position` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement_profile_master`
--

INSERT INTO `measurement_profile_master` (`mp_id`, `mp_userid`, `mp_name`, `mp_height`, `mp_weight`, `mp_chest`, `mp_abdomen`, `mp_buttocks`, `mp_hips`, `coat_length`, `torso_length`, `dress_length`, `sleeve_length`, `shoulder_width`, `neck`, `chest_around`, `stomach`, `breast_point`, `waist_point`, `pant_length`, `skirt_length`, `hips`, `waist`, `rise`, `thigh`, `bicep_around`, `pant_waist`, `skirt_position`, `gender`, `status`, `created_date`, `last_updated`) VALUES
(1, 9, 'Ram', '4 feet 8 inches', '150 lb', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'gavaskar', '4 feet 5 inches', '88 lb', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 0, '0000-00-00 00:00:00', '2016-05-26 23:59:30'),
(3, 19, 'gavaskar', '4', '45', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Male', 0, '2016-05-23 04:23:11', '0000-00-00 00:00:00'),
(4, 36, 'gavaskar', '4', '5', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Male', 0, '2016-05-23 08:23:32', '0000-00-00 00:00:00'),
(5, 39, 'gavaskar', '4', '5', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Male', 0, '2016-05-23 08:28:18', '0000-00-00 00:00:00'),
(6, 3, 'gas', '4', '56', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Male', 0, '2016-06-07 03:38:42', '0000-00-00 00:00:00'),
(7, 46, 'gaas', '4', '66', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Male', 0, '2016-06-07 03:41:24', '0000-00-00 00:00:00'),
(8, 2, 'zzz', '160cm', '50 kg', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 47, 'Joe', '84', '140', 'normal', 'normal', 'normal', 'small', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Male', 0, '2016-09-11 08:31:40', '0000-00-00 00:00:00'),
(10, 48, 'CHARLES PEACOCK', '6', '', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Male', 0, '2016-09-17 10:26:35', '0000-00-00 00:00:00'),
(11, 8, 'Joe', '5\'5', '132', 'small', 'small', 'normal', 'normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Male', 0, '2016-10-08 16:21:45', '0000-00-00 00:00:00'),
(12, 32, 'G', '5 feet 4 inches', '200 lb', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'male', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_profile_value`
--

CREATE TABLE `measurement_profile_value` (
  `mpv_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `mpid` int(11) NOT NULL,
  `mpfid` int(11) NOT NULL,
  `mpf_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `measurement_profile_value`
--

INSERT INTO `measurement_profile_value` (`mpv_id`, `userid`, `mpid`, `mpfid`, `mpf_value`) VALUES
(1, 9, 1, 24, '17'),
(2, 9, 1, 22, '40.5'),
(3, 9, 1, 18, '27'),
(4, 9, 1, 17, '29'),
(5, 9, 1, 16, '43'),
(6, 9, 1, 15, '40'),
(7, 9, 1, 14, '31'),
(8, 9, 1, 13, '8'),
(9, 9, 1, 12, '8'),
(10, 9, 1, 11, '42'),
(11, 9, 1, 10, '30.5'),
(12, 9, 1, 9, '0'),
(13, 9, 1, 8, '14.5'),
(14, 9, 1, 7, '45'),
(15, 9, 1, 6, '42.5'),
(16, 9, 1, 5, '41.5'),
(17, 9, 1, 4, '44.5'),
(18, 9, 1, 3, '25.1'),
(19, 9, 1, 2, '25.1'),
(20, 9, 1, 1, '18.5'),
(21, 2, 2, 24, '17'),
(22, 2, 2, 22, '40.5'),
(23, 2, 2, 18, '27'),
(24, 2, 2, 17, '29'),
(25, 2, 2, 16, '43'),
(26, 2, 2, 15, '40'),
(27, 2, 2, 14, '31'),
(28, 2, 2, 13, '8'),
(29, 2, 2, 12, '8'),
(30, 2, 2, 11, '42'),
(31, 2, 2, 10, '30.5'),
(32, 2, 2, 9, '0'),
(33, 2, 2, 8, '14.5'),
(34, 2, 2, 7, '45'),
(35, 2, 2, 6, '42.5'),
(36, 2, 2, 5, '41.5'),
(37, 2, 2, 4, '44.5'),
(38, 2, 2, 3, '25.1'),
(39, 2, 2, 2, '25.1'),
(40, 2, 2, 1, '18.5'),
(41, 19, 3, 1, '18.5'),
(42, 19, 3, 2, '25.1'),
(43, 19, 3, 3, '25.1'),
(44, 19, 3, 4, '44.5'),
(45, 19, 3, 5, '41.5'),
(46, 19, 3, 6, '42.5'),
(47, 19, 3, 7, '45'),
(48, 19, 3, 8, '14.5'),
(49, 19, 3, 9, '0'),
(50, 19, 3, 10, '30.5'),
(51, 19, 3, 11, '42'),
(52, 19, 3, 12, '8'),
(53, 19, 3, 13, '8'),
(54, 19, 3, 14, '31'),
(55, 19, 3, 15, '40'),
(56, 19, 3, 16, '43'),
(57, 19, 3, 17, '29'),
(58, 19, 3, 18, '27'),
(59, 19, 3, 22, '40.5'),
(60, 19, 3, 23, '0'),
(61, 19, 3, 24, '17'),
(62, 36, 4, 1, '18.5'),
(63, 36, 4, 2, '25.1'),
(64, 36, 4, 3, '25.1'),
(65, 36, 4, 4, '44.5'),
(66, 36, 4, 5, '41.5'),
(67, 36, 4, 6, '42.5'),
(68, 36, 4, 7, '45'),
(69, 36, 4, 8, '14.5'),
(70, 36, 4, 9, '0'),
(71, 36, 4, 10, '30.5'),
(72, 36, 4, 11, '42'),
(73, 36, 4, 12, '8'),
(74, 36, 4, 13, '8'),
(75, 36, 4, 14, '31'),
(76, 36, 4, 15, '40'),
(77, 36, 4, 16, '43'),
(78, 36, 4, 17, '29'),
(79, 36, 4, 18, '27'),
(80, 36, 4, 22, '40.5'),
(81, 36, 4, 23, '0'),
(82, 36, 4, 24, '17'),
(83, 39, 5, 1, '18.5'),
(84, 39, 5, 2, '25.1'),
(85, 39, 5, 3, '25.1'),
(86, 39, 5, 4, '44.5'),
(87, 39, 5, 5, '41.5'),
(88, 39, 5, 6, '42.5'),
(89, 39, 5, 7, '45'),
(90, 39, 5, 8, '14.5'),
(91, 39, 5, 9, '0'),
(92, 39, 5, 10, '30.5'),
(93, 39, 5, 11, '42'),
(94, 39, 5, 12, '8'),
(95, 39, 5, 13, '8'),
(96, 39, 5, 14, '31'),
(97, 39, 5, 15, '40'),
(98, 39, 5, 16, '43'),
(99, 39, 5, 17, '29'),
(100, 39, 5, 18, '27'),
(101, 39, 5, 22, '40.5'),
(102, 39, 5, 23, '0'),
(103, 39, 5, 24, '17'),
(104, 3, 6, 1, '18.5'),
(105, 3, 6, 2, '25.1'),
(106, 3, 6, 3, '25.1'),
(107, 3, 6, 4, '44.5'),
(108, 3, 6, 5, '41.5'),
(109, 3, 6, 6, '42.5'),
(110, 3, 6, 7, '45'),
(111, 3, 6, 8, '14.5'),
(112, 3, 6, 10, '30.5'),
(113, 3, 6, 11, '42'),
(114, 3, 6, 12, '8'),
(115, 3, 6, 13, '8'),
(116, 3, 6, 14, '31'),
(117, 3, 6, 15, '40'),
(118, 3, 6, 16, '43'),
(119, 3, 6, 17, '29'),
(120, 3, 6, 18, '27'),
(121, 3, 6, 22, '40.5'),
(122, 3, 6, 24, '17'),
(123, 46, 7, 1, '18.5'),
(124, 46, 7, 2, '25.1'),
(125, 46, 7, 3, '25.1'),
(126, 46, 7, 4, '44.5'),
(127, 46, 7, 5, '41.5'),
(128, 46, 7, 6, '42.5'),
(129, 46, 7, 7, '45'),
(130, 46, 7, 8, '14.5'),
(131, 46, 7, 10, '30.5'),
(132, 46, 7, 11, '42'),
(133, 46, 7, 12, '8'),
(134, 46, 7, 13, '8'),
(135, 46, 7, 14, '31'),
(136, 46, 7, 15, '40'),
(137, 46, 7, 16, '43'),
(138, 46, 7, 17, '29'),
(139, 46, 7, 18, '27'),
(140, 46, 7, 22, '40.5'),
(141, 46, 7, 24, '17'),
(142, 2, 8, 24, '17'),
(143, 2, 8, 22, '40.5'),
(144, 2, 8, 18, '27'),
(145, 2, 8, 17, '29'),
(146, 2, 8, 16, '43'),
(147, 2, 8, 15, '40'),
(148, 2, 8, 14, '31'),
(149, 2, 8, 13, '8'),
(150, 2, 8, 12, '8'),
(151, 2, 8, 11, '42'),
(152, 2, 8, 10, '30.5'),
(153, 2, 8, 8, '14.5'),
(154, 2, 8, 7, '45'),
(155, 2, 8, 6, '42.5'),
(156, 2, 8, 5, '41.5'),
(157, 2, 8, 4, '44.5'),
(158, 2, 8, 3, '25.1'),
(159, 2, 8, 2, '25.1'),
(160, 2, 8, 1, '18.5'),
(161, 47, 9, 1, '18.5'),
(162, 47, 9, 2, '25.1'),
(163, 47, 9, 3, '25.1'),
(164, 47, 9, 4, '44.5'),
(165, 47, 9, 5, '41.5'),
(166, 47, 9, 6, '42.5'),
(167, 47, 9, 7, '45'),
(168, 47, 9, 8, '14.5'),
(169, 47, 9, 10, '30.5'),
(170, 47, 9, 11, '42'),
(171, 47, 9, 12, '8'),
(172, 47, 9, 13, '8'),
(173, 47, 9, 14, '31'),
(174, 47, 9, 15, '40'),
(175, 47, 9, 16, '43'),
(176, 47, 9, 17, '29'),
(177, 47, 9, 18, '27'),
(178, 47, 9, 22, '40.5'),
(179, 47, 9, 24, '17'),
(180, 47, 9, 30, '0'),
(181, 48, 10, 1, '18.5'),
(182, 48, 10, 2, '25.1'),
(183, 48, 10, 3, '25.1'),
(184, 48, 10, 4, '44.5'),
(185, 48, 10, 5, '41.5'),
(186, 48, 10, 6, '42.5'),
(187, 48, 10, 7, '45'),
(188, 48, 10, 8, '14.5'),
(189, 48, 10, 10, '30.5'),
(190, 48, 10, 11, '42'),
(191, 48, 10, 12, '8'),
(192, 48, 10, 13, '8'),
(193, 48, 10, 14, '31'),
(194, 48, 10, 15, '40'),
(195, 48, 10, 16, '43'),
(196, 48, 10, 17, '29'),
(197, 48, 10, 18, '27'),
(198, 48, 10, 22, '40.5'),
(199, 48, 10, 24, '17'),
(200, 8, 11, 1, '17'),
(201, 8, 11, 2, '24.5'),
(202, 8, 11, 3, '24.5'),
(203, 8, 11, 4, '36'),
(204, 8, 11, 5, '31'),
(205, 8, 11, 6, '32'),
(206, 8, 11, 7, '36'),
(207, 8, 11, 8, '11.5'),
(208, 8, 11, 10, '28'),
(209, 8, 11, 11, '40'),
(210, 8, 11, 12, '7'),
(211, 8, 11, 13, '7'),
(212, 8, 11, 14, '28'),
(213, 8, 11, 15, '31.5'),
(214, 8, 11, 16, '36'),
(215, 8, 11, 17, '24'),
(216, 8, 11, 18, '21'),
(217, 8, 11, 22, '37'),
(218, 8, 11, 24, '14'),
(219, 32, 12, 24, '0'),
(220, 32, 12, 22, '1'),
(221, 32, 12, 18, '1'),
(222, 32, 12, 17, '1'),
(223, 32, 12, 16, '1'),
(224, 32, 12, 15, '1'),
(225, 32, 12, 14, '1'),
(226, 32, 12, 13, '1'),
(227, 32, 12, 12, '1'),
(228, 32, 12, 11, '1'),
(229, 32, 12, 10, '0'),
(230, 32, 12, 8, '1'),
(231, 32, 12, 7, '1'),
(232, 32, 12, 6, '1'),
(233, 32, 12, 5, '1'),
(234, 32, 12, 4, '1'),
(235, 32, 12, 3, '1'),
(236, 32, 12, 2, '1'),
(237, 32, 12, 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `join_date` date NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `unsubscribe_date` date NOT NULL,
  `unsubscribe_send_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `first_name`, `last_name`, `email`, `join_date`, `ip_address`, `unsubscribe_date`, `unsubscribe_send_id`) VALUES
(1, 'Ramkumar', '', 'ramkumar.izaap@gmail.com', '2017-09-13', '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_field`
--

CREATE TABLE `member_field` (
  `member_field_id` int(11) NOT NULL,
  `field_name` varchar(255) NOT NULL,
  `field_type` varchar(20) NOT NULL,
  `required` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_field_value`
--

CREATE TABLE `member_field_value` (
  `member_id` int(11) NOT NULL,
  `member_field_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_group`
--

CREATE TABLE `member_group` (
  `member_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_group`
--

INSERT INTO `member_group` (`member_id`, `group_id`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `newsletter_id` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `template` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `from_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `from_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bounce_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `create_date`, `template`, `subject`, `from_name`, `from_email`, `content`, `bounce_email`) VALUES
(1, '2016-05-11', 'dark', 'May Newsletter', 'Newsletter', 'noreply@otkootoor.com', '<table style=\"width: 100%;\" border=\"0\">\r\n<tbody>\r\n<tr>\r\n<td valign=\"top\">\r\n<p>Hi {FIRST_NAME}, <br /> Welcome to our May Newsletter!</p>\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width=\"200\" valign=\"top\"><strong>Latest News:</strong> \r\n<ul>\r\n<li>Item</li>\r\n<li>Item</li>\r\n<li>Item</li>\r\n<li>Item</li>\r\n</ul>\r\n<strong>Links:</strong> \r\n<ul>\r\n<li>Our Website</li>\r\n<li>Contact Us</li>\r\n</ul>\r\n<strong>Contact Details:</strong> \r\n<ul>\r\n<li>Phone: 55 5555 5555</li>\r\n<li>Email: info@website.com</li>\r\n<li>Website: website.com</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', 'newsletter@otkootoor.com'),
(7, '2017-09-13', 'dark', 'September Newsletter', 'Newsletter', 'noreply@otkootoor.com', '<table style=\"width: 100%;\" border=\"0\">\r\n<tbody>\r\n<tr>\r\n<td valign=\"top\">\r\n<p>Hi {FIRST_NAME}, <br /> Welcome to our September Newsletter!</p>\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width=\"200\" valign=\"top\"><strong>Latest News:</strong> \r\n<ul>\r\n<li>Item</li>\r\n<li>Item</li>\r\n<li>Item</li>\r\n<li>Item</li>\r\n</ul>\r\n<strong>Links:</strong> \r\n<ul>\r\n<li>Our Website</li>\r\n<li>Contact Us</li>\r\n</ul>\r\n<strong>Contact Details:</strong> \r\n<ul>\r\n<li>Phone: 55 5555 5555</li>\r\n<li>Email: info@website.com</li>\r\n<li>Website: website.com</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', 'newsletter@otkootoor.com'),
(8, '2017-09-14', 'blue', 'September Newsletter', 'Newsletter', 'noreply@otkootoor.com', '<table style=\"width: 100%;\" border=\"0\">\r\n<tbody>\r\n<tr>\r\n<td valign=\"top\">\r\n<p>Hi {FIRST_NAME}, <br /> Welcome to our September Newsletter!</p>\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width=\"200\" valign=\"top\"><strong>Latest News:</strong> \r\n<ul>\r\n<li>Item</li>\r\n<li>Item</li>\r\n<li>Item</li>\r\n<li>Item</li>\r\n</ul>\r\n<strong>Links:</strong> \r\n<ul>\r\n<li>Our Website</li>\r\n<li>Contact Us</li>\r\n</ul>\r\n<strong>Contact Details:</strong> \r\n<ul>\r\n<li>Phone: 55 5555 5555</li>\r\n<li>Email: info@website.com</li>\r\n<li>Website: website.com</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>', 'newsletter@otkootoor.com');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_member`
--

CREATE TABLE `newsletter_member` (
  `send_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `sent_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `open_time` int(11) NOT NULL,
  `bounce_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_history_master`
--

CREATE TABLE `order_history_master` (
  `oh_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `pay_type` varchar(25) NOT NULL,
  `tot_amount` decimal(20,2) NOT NULL,
  `shipping_cost` text NOT NULL,
  `tax` int(11) NOT NULL,
  `discount` decimal(11,2) NOT NULL,
  `notes` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `oh_date` date NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_history_master`
--

INSERT INTO `order_history_master` (`oh_id`, `userid`, `orderid`, `pay_type`, `tot_amount`, `shipping_cost`, `tax`, `discount`, `notes`, `attachment`, `oh_date`, `created_date`) VALUES
(1, 2, 'CC00000001', 'Cash on Delivery', '0.00', '0', 10, '0.00', '', '', '2016-06-07', '2016-06-07 02:56:17'),
(9, 2, 'CC00000010', 'Cash on Delivery', '0.00', '0', 10, '0.00', '', '', '2016-06-07', '2016-06-07 07:19:12'),
(11, 2, 'CC00000014', 'In-Store-Credit', '679.90', '10', 10, '0.00', '', '', '2016-06-14', '2016-06-14 06:33:43'),
(13, 2, 'CC00000016', 'Cash on Delivery', '57.30', '10', 10, '0.00', '', '', '2016-06-14', '2016-06-14 06:36:50'),
(17, 2, 'CC00000020', 'Cash on Delivery', '10.00', '10', 10, '0.00', '', '', '2016-06-15', '2016-06-15 02:55:43'),
(22, 2, 'CC00000025', 'In-Store-Credit', '616.10', '10', 10, '0.00', '', '', '2016-06-15', '2016-06-15 07:22:49'),
(23, 2, 'CC00000026', 'In-Store-Credit', '616.10', '10', 10, '0.00', '', '', '2016-06-15', '2016-06-15 07:32:50'),
(25, 2, 'CC00000028', 'Cash on Delivery', '564.40', '10', 10, '0.00', '', '', '2016-06-15', '2016-06-15 08:15:04'),
(26, 2, 'CC00000029', 'In-Store-Credit', '433.50', '10', 10, '12.00', '', '', '2016-06-15', '2016-06-15 08:21:30'),
(27, 2, 'CC00000030', 'In-Store-Credit', '687.16', '10', 10, '0.00', '', '', '2016-06-15', '2016-06-15 08:24:58'),
(30, 8, 'CC00000038', 'In-Store-Credit', '847.40', '10', 6, '0.00', '', '', '2016-10-08', '2016-10-08 16:22:36'),
(37, 2, 'CC00000058', 'In-Store-Credit', '1047.30', '10', 10, '0.00', '', '', '2016-11-02', '2016-11-02 09:19:35'),
(40, 2, 'CC00000061', 'Cash on Delivery', '602.90', '10', 10, '0.00', '', '', '2016-11-08', '2016-11-08 06:49:43'),
(41, 2, 'CC00000062', 'Cash on Delivery', '685.40', '10', 10, '0.00', '', '', '2016-11-21', '2016-11-21 05:12:09'),
(54, 8, 'CC00000076', 'In-Store-Credit', '89.50', '10', 6, '0.00', '', '', '2016-12-02', '2016-12-02 11:55:32'),
(55, 8, 'CC00000081', 'In-Store-Credit', '89.50', '10', 6, '0.00', 'i wan t', '', '2017-02-11', '2017-02-11 15:53:44'),
(56, 9, 'CC00000085', 'Paypal', '592.90', '0', 10, '0.00', '', '', '2017-03-28', '2017-03-28 22:23:26'),
(57, 9, 'CC00000088', 'Paypal', '267.30', '0', 10, '0.00', '', '', '2017-04-03', '2017-04-03 01:12:10'),
(58, 9, 'CC00000089', 'Paypal', '77.00', '0', 10, '0.00', '', '', '2017-04-03', '2017-04-03 01:17:30'),
(59, 8, 'CC00000090', 'Paypal', '2.12', '0', 6, '0.00', '', '', '2017-04-06', '2017-04-06 13:07:19'),
(60, 8, 'CC00000092', 'In-Store-Credit', '79.50', '0', 6, '0.00', '', '', '2017-08-15', '2017-08-15 15:28:01'),
(61, 8, 'CC00000092', 'In-Store-Credit', '79.50', '0', 6, '0.00', '', '', '2017-08-15', '2017-08-15 15:28:03'),
(62, 8, 'CC00000097', 'In-Store-Credit', '1226.42', '0', 6, '0.00', '', '', '2017-08-17', '2017-08-17 06:14:53'),
(63, 8, 'CC00000102', 'In-Store-Credit', '79.50', '0', 6, '0.00', 'dsfcdsqf', '', '2017-09-02', '2017-09-02 10:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `order_id_generate`
--

CREATE TABLE `order_id_generate` (
  `oig_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_id_generate`
--

INSERT INTO `order_id_generate` (`oig_id`, `order_id`, `created_date`, `last_updated`) VALUES
(1, 'CC00000001', '2016-06-07 02:21:06', '2016-06-07 02:21:06'),
(2, 'CC00000002', '2016-06-07 02:57:44', '2016-06-07 02:57:44'),
(3, 'CC00000003', '2016-06-07 03:04:43', '2016-06-07 03:04:43'),
(4, 'CC00000004', '2016-06-07 03:15:12', '2016-06-07 03:15:12'),
(5, 'CC00000005', '2016-06-07 03:29:51', '2016-06-07 03:29:51'),
(6, 'CC00000006', '2016-06-07 03:34:39', '2016-06-07 03:34:39'),
(7, 'CC00000007', '2016-06-07 03:37:29', '2016-06-07 03:37:29'),
(8, 'CC00000008', '2016-06-07 03:40:51', '2016-06-07 03:40:51'),
(9, 'CC00000009', '2016-06-07 03:43:34', '2016-06-07 03:43:34'),
(18, 'CC00000014', '2016-06-14 06:22:57', '2016-06-14 06:22:57'),
(12, 'CC00000011', '2016-06-09 08:40:30', '2016-06-09 08:40:30'),
(14, 'CC00000012', '2016-06-12 18:49:17', '2016-06-12 18:49:17'),
(15, 'CC00000013', '2016-06-12 23:24:47', '2016-06-12 23:24:47'),
(20, 'CC00000015', '2016-06-14 06:34:05', '2016-06-14 06:34:05'),
(22, 'CC00000016', '2016-06-14 06:36:00', '2016-06-14 06:36:00'),
(24, 'CC00000017', '2016-06-14 06:37:15', '2016-06-14 06:37:15'),
(26, 'CC00000018', '2016-06-14 06:55:47', '2016-06-14 06:55:47'),
(27, 'CC00000019', '2016-06-14 07:00:25', '2016-06-14 07:00:25'),
(28, 'CC00000020', '2016-06-15 01:02:08', '2016-06-15 01:02:08'),
(35, 'CC00000021', '2016-06-15 04:34:07', '2016-06-15 04:34:07'),
(54, 'CC00000022', '2016-06-15 06:31:15', '2016-06-15 06:31:15'),
(55, 'CC00000023', '2016-06-15 07:14:46', '2016-06-15 07:14:46'),
(56, 'CC00000024', '2016-06-15 07:15:18', '2016-06-15 07:15:18'),
(57, 'CC00000025', '2016-06-15 07:22:27', '2016-06-15 07:22:27'),
(58, 'CC00000026', '2016-06-15 07:32:40', '2016-06-15 07:32:40'),
(59, 'CC00000027', '2016-06-15 07:38:31', '2016-06-15 07:38:31'),
(60, 'CC00000028', '2016-06-15 08:11:28', '2016-06-15 08:11:28'),
(61, 'CC00000029', '2016-06-15 08:15:37', '2016-06-15 08:15:37'),
(62, 'CC00000030', '2016-06-15 08:22:08', '2016-06-15 08:22:08'),
(63, 'CC00000031', '2016-06-15 08:26:24', '2016-06-15 08:26:24'),
(67, 'CC00000034', '2016-06-28 06:31:02', '2016-06-28 06:31:02'),
(65, 'CC00000033', '2016-06-16 04:03:46', '2016-06-16 04:03:46'),
(68, 'CC00000035', '2016-07-12 06:35:44', '2016-07-12 06:35:44'),
(69, 'CC00000036', '2016-07-15 23:31:02', '2016-07-15 23:31:02'),
(70, 'CC00000037', '2016-08-08 13:43:18', '2016-08-08 13:43:18'),
(71, 'CC00000038', '2016-08-27 14:04:30', '2016-08-27 14:04:30'),
(72, 'CC00000039', '2016-09-06 03:49:32', '2016-09-06 03:49:32'),
(73, 'CC00000040', '2016-09-11 08:30:11', '2016-09-11 08:30:11'),
(75, 'CC00000041', '2016-10-19 05:12:56', '2016-10-19 05:12:56'),
(76, 'CC00000042', '2016-10-20 04:56:36', '2016-10-20 04:56:36'),
(77, 'CC00000043', '2016-10-20 06:46:33', '2016-10-20 06:46:33'),
(78, 'CC00000044', '2016-10-20 06:52:52', '2016-10-20 06:52:52'),
(79, 'CC00000045', '2016-10-20 06:57:25', '2016-10-20 06:57:25'),
(80, 'CC00000046', '2016-10-20 07:05:56', '2016-10-20 07:05:56'),
(81, 'CC00000047', '2016-10-20 07:14:14', '2016-10-20 07:14:14'),
(82, 'CC00000048', '2016-10-20 07:25:51', '2016-10-20 07:25:51'),
(83, 'CC00000049', '2016-10-20 07:35:36', '2016-10-20 07:35:36'),
(84, 'CC00000050', '2016-10-20 07:39:34', '2016-10-20 07:39:34'),
(86, 'CC00000051', '2016-10-21 03:15:14', '2016-10-21 03:15:14'),
(87, 'CC00000052', '2016-10-21 03:59:17', '2016-10-21 03:59:17'),
(90, 'CC00000053', '2016-11-01 05:27:29', '2016-11-01 05:27:29'),
(91, 'CC00000054', '2016-11-01 05:36:12', '2016-11-01 05:36:12'),
(92, 'CC00000055', '2016-11-01 05:48:22', '2016-11-01 05:48:22'),
(93, 'CC00000056', '2016-11-01 06:03:42', '2016-11-01 06:03:42'),
(94, 'CC00000057', '2016-11-01 06:25:50', '2016-11-01 06:25:50'),
(95, 'CC00000058', '2016-11-02 09:18:02', '2016-11-02 09:18:02'),
(96, 'CC00000059', '2016-11-02 09:20:06', '2016-11-02 09:20:06'),
(97, 'CC00000060', '2016-11-02 09:25:55', '2016-11-02 09:25:55'),
(98, 'CC00000061', '2016-11-08 06:49:02', '2016-11-08 06:49:02'),
(99, 'CC00000062', '2016-11-21 00:49:59', '2016-11-21 00:49:59'),
(100, 'CC00000063', '2016-11-21 06:10:05', '2016-11-21 06:10:05'),
(101, 'CC00000064', '2016-11-21 06:12:59', '2016-11-21 06:12:59'),
(102, 'CC00000065', '2016-11-21 06:14:36', '2016-11-21 06:14:36'),
(103, 'CC00000066', '2016-11-21 06:17:01', '2016-11-21 06:17:01'),
(104, 'CC00000067', '2016-11-21 06:22:06', '2016-11-21 06:22:06'),
(105, 'CC00000068', '2016-11-21 06:25:03', '2016-11-21 06:25:03'),
(106, 'CC00000069', '2016-11-21 06:32:26', '2016-11-21 06:32:26'),
(107, 'CC00000070', '2016-11-21 06:35:11', '2016-11-21 06:35:11'),
(108, 'CC00000071', '2016-11-21 06:36:22', '2016-11-21 06:36:22'),
(109, 'CC00000072', '2016-11-21 06:37:58', '2016-11-21 06:37:58'),
(110, 'CC00000073', '2016-11-21 06:43:37', '2016-11-21 06:43:37'),
(111, 'CC00000074', '2016-11-21 07:07:16', '2016-11-21 07:07:16'),
(112, 'CC00000075', '2016-11-21 07:10:10', '2016-11-21 07:10:10'),
(113, 'CC00000076', '2016-12-02 11:55:12', '2016-12-02 11:55:12'),
(114, 'CC00000077', '2016-12-02 14:33:57', '2016-12-02 14:33:57'),
(115, 'CC00000078', '2016-12-20 14:23:36', '2016-12-20 14:23:36'),
(116, 'CC00000079', '2017-01-10 11:58:59', '2017-01-10 11:58:59'),
(117, 'CC00000080', '2017-01-15 17:32:06', '2017-01-15 17:32:06'),
(118, 'CC00000081', '2017-02-11 15:53:22', '2017-02-11 15:53:22'),
(119, 'CC00000082', '2017-02-12 19:29:22', '2017-02-12 19:29:22'),
(120, 'CC00000083', '2017-03-23 08:01:14', '2017-03-23 08:01:14'),
(121, 'CC00000084', '2017-03-28 07:38:35', '2017-03-28 07:38:35'),
(122, 'CC00000085', '2017-03-28 22:06:04', '2017-03-28 22:06:04'),
(125, 'CC00000088', '2017-04-03 00:31:30', '2017-04-03 00:31:30'),
(124, 'CC00000087', '2017-03-30 03:01:26', '2017-03-30 03:01:26'),
(126, 'CC00000089', '2017-04-03 01:16:18', '2017-04-03 01:16:18'),
(131, 'CC00000090', '2017-04-06 21:04:21', '2017-04-06 21:04:21'),
(132, 'CC00000091', '2017-04-13 12:22:20', '2017-04-13 12:22:20'),
(134, 'CC00000092', '2017-07-13 22:35:52', '2017-07-13 22:35:52'),
(136, 'CC00000093', '2017-07-20 06:43:15', '2017-07-20 06:43:15'),
(137, 'CC00000094', '2017-07-21 11:00:26', '2017-07-21 11:00:26'),
(138, 'CC00000095', '2017-07-26 06:32:32', '2017-07-26 06:32:32'),
(139, 'CC00000096', '2017-08-14 04:31:23', '2017-08-14 04:31:23'),
(140, 'CC00000097', '2017-08-15 15:32:22', '2017-08-15 15:32:22'),
(142, 'CC00000098', '2017-08-16 00:30:47', '2017-08-16 00:30:47'),
(145, 'CC00000101', '2017-08-23 10:24:56', '2017-08-23 10:24:56'),
(144, 'CC00000100', '2017-08-17 04:02:51', '2017-08-17 04:02:51'),
(146, 'CC00000102', '2017-09-02 10:55:19', '2017-09-02 10:55:19'),
(147, 'CC00000103', '2017-09-13 00:08:40', '2017-09-13 00:08:40'),
(148, 'CC00000104', '2017-09-14 22:42:08', '2017-09-14 22:42:08'),
(149, 'CC00000105', '2017-10-19 11:03:57', '2017-10-19 11:03:57'),
(150, 'CC00000106', '2017-10-20 01:09:14', '2017-10-20 01:09:14'),
(151, 'CC00000107', '2017-10-23 12:36:57', '2017-10-23 12:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `om_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `pid` int(11) NOT NULL COMMENT 'product_master table p_id',
  `userid` int(11) NOT NULL,
  `sess_id` varchar(255) NOT NULL,
  `mpid` int(11) NOT NULL COMMENT 'measurement_profile table mp_id',
  `subcatid` int(11) NOT NULL,
  `p_type` text NOT NULL,
  `om_quantity` int(11) NOT NULL,
  `om_price` decimal(11,2) NOT NULL,
  `om_style` text NOT NULL,
  `om_fab` text NOT NULL,
  `om_accents` text NOT NULL,
  `om_status` int(11) NOT NULL DEFAULT '1',
  `order_status` varchar(255) NOT NULL,
  `ship_id` int(11) NOT NULL,
  `carrier_name` varchar(255) NOT NULL,
  `placed_by` int(11) NOT NULL,
  `track_id` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`om_id`, `order_id`, `pid`, `userid`, `sess_id`, `mpid`, `subcatid`, `p_type`, `om_quantity`, `om_price`, `om_style`, `om_fab`, `om_accents`, `om_status`, `order_status`, `ship_id`, `carrier_name`, `placed_by`, `track_id`, `notes`, `created_date`, `last_updated`) VALUES
(34, 'CC00000009', 2, 46, '', 0, 1, '', 1, '539.00', '', '', '', 1, 'Processing', 0, '', 1, '', '', '2016-06-07 10:43:34', '2016-06-07 10:43:34'),
(40, 'CC00000011', 32, 0, 'a85d345d0ccd6e6e210e4dda96c93377', 0, 5, '', 1, '25.00', '', '', '', 1, 'Processing', 0, '', 0, '', '', '2016-06-09 15:40:30', '2016-06-09 15:40:30'),
(55, 'CC00000014', 2, 2, '0', 2, 1, '', 1, '539.00', '', '', '', 0, 'Processing', 1, '', 0, '', '', '2016-06-14 13:22:57', '2016-06-14 06:33:43'),
(56, 'CC00000014', 34, 2, '', 2, 3, '', 1, '70.00', '', '', '', 0, 'Processing', 1, '', 0, '', '', '2016-06-14 13:23:08', '2016-06-14 06:33:43'),
(121, 'CC00000025', 2, 2, '', 8, 1, 'suits', 1, '551.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 12,fabric_id: 141,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 1, '', 1, '', '', '2016-06-15 14:22:27', '2016-06-15 07:22:49'),
(122, 'CC00000026', 2, 2, '', 8, 1, 'suits', 1, '551.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 12,fabric_id: 141,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 1, '', 1, '', '', '2016-06-15 14:32:40', '2016-06-15 07:32:50'),
(125, 'CC00000028', 2, 2, '0', 2, 1, '', 1, '539.00', '', '', '', 0, 'Processing', 1, '', 0, '', '', '2016-06-15 15:11:28', '2016-06-15 15:11:28'),
(127, 'CC00000029', 2, 2, '', 8, 1, 'suits', 1, '551.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 12,fabric_id: 141,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 1, '', 1, '', '', '2016-06-15 15:15:37', '2016-06-15 08:21:29'),
(130, 'CC00000030', 4, 2, '', 2, 4, '', 2, '70.00', '', '', '', 0, 'Processing', 1, '', 1, '', '', '2016-06-15 03:22:10', '2016-06-15 08:24:57'),
(133, 'CC00000033', 2, 0, 'f065b098c5a0e6ceb60829c87d7a4ff5', 0, 1, '', 1, '539.00', '', '', '', 1, 'Processing', 0, '', 0, '', '', '2016-06-16 11:03:46', '2016-06-16 11:03:46'),
(136, 'CC00000034', 2, 0, '60e5de18a53839aa1519f6104f79672b', 0, 1, '', 1, '539.00', '', '', '', 1, 'Processing', 0, '', 0, '', '', '2016-06-28 13:31:02', '2016-06-28 13:31:02'),
(137, 'CC00000035', 2, 0, 'd617f1a2db96d3682ddd6bf1f7ca9b0f', 0, 1, '', 1, '539.00', '', '', '', 1, 'Processing', 0, '', 0, '', '', '2016-07-12 13:35:44', '2016-07-12 13:35:44'),
(138, 'CC00000036', 1, 0, 'c3b0e8ceac2677739e661529d29c6506', 0, 2, 'shirts', 1, '85.00', '{shirt_sleeve: short,shirt_fit: loose,shirt_neck: 1,shirt_neck_no_interfacing: 1,shirt_neck_buttons: 2,shirt_cuffs: ,shirt_chest_pocket: 1,shirt_chest_pocket_type: 1,shirt_button_close: 3,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 10,fabric_id: 1340,fabric_name:}', '{font_price: ,font_family: ,initials_jacket: ,monogram_color: ,neck_styling: ,neck_lining_price: 0,collar_neck_color: ,cuff_styling: ,cuff_lining_price: 0,cuff_color: ,type_of_elbow: ,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-07-16 06:31:02', '2016-07-16 06:31:02'),
(141, 'CC00000039', 2, 0, '98bc7f5fa3cc8fe7e02f3ec018c48bd3', 0, 1, '', 1, '539.00', '', '', '', 1, 'Processing', 0, '', 0, '', '', '2016-09-06 10:49:32', '2016-09-06 10:49:32'),
(142, 'CC00000039', 1, 0, '98bc7f5fa3cc8fe7e02f3ec018c48bd3', 0, 2, '', 1, '75.00', '', '', '', 1, 'Processing', 0, '', 0, '', '', '2016-09-06 10:50:25', '2016-09-06 10:50:25'),
(146, 'CC00000038', 1, 8, '', 11, 2, 'shirts', 1, '95.00', '{shirt_sleeve: long,shirt_fit: fit,shirt_neck: 2,shirt_neck_no_interfacing: 0,shirt_neck_buttons: 1,shirt_cuffs: 1,shirt_chest_pocket: 0,shirt_chest_pocket_type: ,shirt_button_close: 3,shirt_cut: straight,shirt_pleats: 2}', '{fabric_price: 0,fabric_id: 855,fabric_name:CCL26-1548}', '{font_price: ,font_family: Arial,initials_jacket: JW,monogram_color: Color2,neck_styling: inner_fabric,neck_lining_price: 10,collar_neck_color: Color2,cuff_styling: inner_fabric,cuff_lining_price: 10,cuff_color: Color2,type_of_elbow: ,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 3, '', 1, '', '', '2016-10-08 23:09:04', '2016-11-01 12:46:37'),
(155, 'CC00000041', 2, 0, '40ca769b96fb9432e371b5a7bebd551c', 0, 1, 'suits', 1, '549.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 10,fabric_id: 894,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: standard_button,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-19 12:12:56', '2016-10-19 12:14:28'),
(156, 'CC00000041', 2, 0, '40ca769b96fb9432e371b5a7bebd551c', 0, 1, 'suits', 1, '551.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 12,fabric_id: 141,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-19 12:41:39', '2016-10-19 12:41:39'),
(157, 'CC00000042', 2, 0, 'd8c84e8f79a8b38de606be2bfcd94245', 0, 1, 'suits', 1, '561.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 12,fabric_id: 141,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: 0,jacket_lining_id: 123,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_yes,elbow_price: 10,elbow_type: Color,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 11:56:36', '2016-10-20 11:57:10'),
(158, 'CC00000042', 2, 0, 'd8c84e8f79a8b38de606be2bfcd94245', 0, 1, 'suits', 1, '904.00', '{suit_type: man_suit3,waistcoat_price: 150,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,waistcoat_style: simple,waistcoat_buttons: 5,waistcoat_chest_pocket: 1,waistcoat_pockets: 2,waistcoat_pockets_num: 2,waistcoat_bottom: cut,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 200,fabric_id: 187,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: 0,jacket_lining_id: 123,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: standard_button,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: color_by_default,type_of_elbow: elbow_yes,elbow_price: 10,elbow_type: Color1,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: no_pocket,type_of_colored_button_holes: both_placket_and_cuffs,lapel_color: Color1,button_holes_price: 5,colored_thread_type: Color1,colored_holes_type: Color1}', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 13:24:09', '2016-10-20 13:26:08'),
(159, 'CC00000042', 1, 0, 'd8c84e8f79a8b38de606be2bfcd94245', 0, 2, 'shirts', 1, '85.00', '{shirt_sleeve: short,shirt_fit: loose,shirt_neck: 1,shirt_neck_no_interfacing: 1,shirt_neck_buttons: 2,shirt_cuffs: ,shirt_chest_pocket: 1,shirt_chest_pocket_type: 1,shirt_button_close: 3,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 10,fabric_id: 1340,fabric_name:}', '{font_price: ,font_family: ,initials_jacket: ,monogram_color: ,neck_styling: ,neck_lining_price: 0,collar_neck_color: ,cuff_styling: ,cuff_lining_price: 0,cuff_color: ,type_of_elbow: ,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 13:25:05', '2016-10-20 13:25:05'),
(160, 'CC00000042', 43, 0, 'd8c84e8f79a8b38de606be2bfcd94245', 0, 6, 'coat', 1, '97.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: zipper,coat_closure_type_zipper: hide,coat_closure_type_boton: standard,coat_pockets: 0,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 12,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: ,jacket_lining_id: 123,font_price: ,font_family: Monotype Corsiva,initials_jacket: gavaskar,monogram_color: Color2,type_of_neck: custom_color,neck_lining_price: ,neck_lining_type: Color1,type_of_elbow: elbow_no,elbow_price: 10,elbow_type: elbow_no,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: Color2,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 13:39:43', '2016-10-20 13:39:43'),
(161, 'CC00000043', 43, 0, '74e8b4481cb340457f177b88643b81cb', 0, 6, 'coat', 1, '105.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: zipper,coat_closure_type_zipper: hide,coat_closure_type_boton: standard,coat_pockets: 0,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 15,fabric_id: 244,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: ,jacket_lining_id: 123,font_price: ,font_family: Monotype Corsiva,initials_jacket: gavaskar,monogram_color: Color2,type_of_neck: custom_color,neck_lining_price: ,neck_lining_type: Color2,type_of_elbow: elbow_yes,elbow_price: 10,elbow_type: Color2,type_of_colored_button_holes: both_placket_and_cuffs,lapel_color: Color2,button_holes_price: 5,colored_thread_type: Color2,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 13:46:33', '2016-10-20 13:47:38'),
(162, 'CC00000043', 43, 0, '74e8b4481cb340457f177b88643b81cb', 0, 6, 'coat', 1, '87.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: boton,coat_closure_type_zipper: standard,coat_closure_type_boton: standard,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 12,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: ,jacket_lining_id: ,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: Color1,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 13:48:05', '2016-10-20 13:48:05'),
(163, 'CC00000044', 43, 0, 'f11aa3d9d928c98b80d3e993723419d4', 0, 6, 'coat', 1, '87.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: boton,coat_closure_type_zipper: standard,coat_closure_type_boton: standard,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 12,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: ,jacket_lining_id: ,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: Color1,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 13:52:52', '2016-10-20 13:52:52'),
(164, 'CC00000044', 2, 0, 'f11aa3d9d928c98b80d3e993723419d4', 0, 1, 'suits', 1, '739.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 200,fabric_id: 187,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 13:53:37', '2016-10-20 13:53:51'),
(165, 'CC00000044', 43, 0, 'f11aa3d9d928c98b80d3e993723419d4', 0, 6, 'coat', 1, '102.00', '{coat_style: simple,coat_neck: standup,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: zipper,coat_closure_type_zipper: hide,coat_closure_type_boton: standard,coat_pockets: 0,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 12,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: ,jacket_lining_id: 123,font_price: ,font_family: Monotype Corsiva,initials_jacket: gavaskar,monogram_color: Color2,type_of_neck: custom_color,neck_lining_price: ,neck_lining_type: Color2,type_of_elbow: elbow_yes,elbow_price: 10,elbow_type: Color2,type_of_colored_button_holes: both_placket_and_cuffs,lapel_color: Color2,button_holes_price: 5,colored_thread_type: Color2,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 13:54:44', '2016-10-20 13:54:44'),
(166, 'CC00000045', 43, 0, '1967476a52a12cd1d71ac3675cd74da8', 0, 6, 'coat', 1, '102.00', '{coat_style: simple,coat_neck: standup,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: zipper,coat_closure_type_zipper: hide,coat_closure_type_boton: standard,coat_pockets: 0,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 12,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: ,jacket_lining_id: 123,font_price: ,font_family: Monotype Corsiva,initials_jacket: gavaskar,monogram_color: Color2,type_of_neck: custom_color,neck_lining_price: ,neck_lining_type: Color2,type_of_elbow: elbow_yes,elbow_price: 10,elbow_type: Color2,type_of_colored_button_holes: both_placket_and_cuffs,lapel_color: Color2,button_holes_price: 5,colored_thread_type: Color2,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 13:57:25', '2016-10-20 13:57:25'),
(167, 'CC00000046', 43, 0, '1ea9986fd6d8dfc2d9374ebca4608b4a', 0, 6, 'coat', 1, '87.00', '{coat_style: simple,coat_neck: standup,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: zipper,coat_closure_type_zipper: hide,coat_closure_type_boton: standard,coat_pockets: 0,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 12,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: ,jacket_lining_id: ,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: Color1,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 14:05:56', '2016-10-20 14:05:56'),
(168, 'CC00000047', 43, 0, '6810192f3b6737af282186a837559c91', 0, 6, 'coat', 1, '87.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: boton,coat_closure_type_zipper: standard,coat_closure_type_boton: standard,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 12,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: ,jacket_lining_id: ,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: Color1,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 14:14:14', '2016-10-20 14:14:14'),
(169, 'CC00000048', 2, 0, '406e103037def4ed4a33c99e56808a7c', 0, 1, 'suits', 1, '551.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 12,fabric_id: 141,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 14:25:51', '2016-10-20 14:25:51'),
(170, 'CC00000048', 43, 0, '406e103037def4ed4a33c99e56808a7c', 0, 6, 'coat', 1, '105.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: boton,coat_closure_type_zipper: standard,coat_closure_type_boton: standard,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 15,fabric_id: 15,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: ,jacket_lining_id: 123,font_price: ,font_family: Monotype Corsiva,initials_jacket: gavaskar,monogram_color: Color2,type_of_neck: custom_color,neck_lining_price: ,neck_lining_type: Color2,type_of_elbow: elbow_yes,elbow_price: 10,elbow_type: Color2,type_of_colored_button_holes: both_placket_and_cuffs,lapel_color: Color2,button_holes_price: 5,colored_thread_type: Color2,colored_holes_type: Color2}', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 14:28:35', '2016-10-20 14:29:14'),
(171, 'CC00000048', 43, 0, '406e103037def4ed4a33c99e56808a7c', 0, 6, 'coat', 1, '87.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: boton,coat_closure_type_zipper: standard,coat_closure_type_boton: standard,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 12,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: ,jacket_lining_id: ,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: Color1,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 14:29:55', '2016-10-20 14:29:55'),
(172, 'CC00000048', 43, 0, '406e103037def4ed4a33c99e56808a7c', 0, 6, 'coat', 1, '87.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: boton,coat_closure_type_zipper: standard,coat_closure_type_boton: standard,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 12,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: ,jacket_lining_id: ,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: Color1,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 14:33:06', '2016-10-20 14:33:06'),
(173, 'CC00000049', 2, 0, '192aab6034a8fc6f5d82fd6dc90e740f', 0, 1, 'suits', 1, '551.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 12,fabric_id: 141,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 14:35:36', '2016-10-20 14:35:36'),
(174, 'CC00000049', 43, 0, '192aab6034a8fc6f5d82fd6dc90e740f', 0, 6, 'coat', 1, '87.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: boton,coat_closure_type_zipper: standard,coat_closure_type_boton: standard,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 12,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: ,jacket_lining_id: ,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: Color1,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 14:35:55', '2016-10-20 14:35:55'),
(175, 'CC00000050', 43, 0, '8f9552d9020d7467a42605fbacf64874', 0, 6, 'coat', 1, '90.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: boton,coat_closure_type_zipper: standard,coat_closure_type_boton: standard,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 15,fabric_id: 244,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: ,jacket_lining_id: ,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: Color1,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 14:39:34', '2016-10-20 14:39:34'),
(177, 'CC00000043', 43, 0, '74e8b4481cb340457f177b88643b81cb', 0, 6, 'coat', 1, '87.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: boton,coat_closure_type_zipper: standard,coat_closure_type_boton: standard,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 159,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: ,jacket_lining_id: ,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: Color1,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: elbow_no,type_of_colored_button_holes: ,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-20 14:49:52', '2016-10-20 14:49:52'),
(182, 'CC00000051', 43, 0, 'ec884ff32f55fa5b2e97cfb75a6c1153', 0, 6, 'coat', 1, '90.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: short,coat_fit: 0,coat_closure: zipper,coat_closure_type_zipper: hide,coat_closure_type_boton: standard,coat_pockets: 0,coat_pockets_type: 6,coat_chest_pocket: 0,coat_belt: sewing,coat_backcut: 1,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 15,fabric_id: 244,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: ,jacket_lining_id: 123,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: Color1,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-21 10:15:14', '2016-10-21 10:15:14'),
(183, 'CC00000052', 43, 0, 'ffd057039b6d99328fe1fe2ab0c2d99e', 0, 6, 'coat', 1, '87.00', '{coat_style: crossed,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: zipper,coat_closure_type_zipper: standard,coat_closure_type_boton: 0,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 159,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: ,jacket_lining_id: ,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: Color1,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-21 10:59:17', '2016-10-21 10:59:17'),
(184, 'CC00000052', 43, 0, 'ffd057039b6d99328fe1fe2ab0c2d99e', 0, 6, 'coat', 1, '90.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: boton,coat_closure_type_zipper: standard,coat_closure_type_boton: standard,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 15,fabric_id: 244,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: ,jacket_lining_id: 123,font_price: ,font_family: Monotype Corsiva,initials_jacket: gavaskar,monogram_color: Color2,type_of_neck: custom_color,neck_lining_price: ,neck_lining_type: Color2,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: elbow_no,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-10-21 11:56:26', '2016-10-21 11:58:17'),
(212, 'CC00000058', 1, 2, '', 8, 2, 'shirts', 1, '85.00', '{shirt_sleeve: short,shirt_fit: loose,shirt_neck: 1,shirt_neck_no_interfacing: 1,shirt_neck_buttons: 2,shirt_cuffs: ,shirt_chest_pocket: 1,shirt_chest_pocket_type: 1,shirt_button_close: 3,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 10,fabric_id: 1340,fabric_name:}', '{font_price: ,font_family: ,initials_jacket: ,monogram_color: ,neck_styling: ,neck_lining_price: 0,collar_neck_color: ,cuff_styling: ,cuff_lining_price: 0,cuff_color: ,type_of_elbow: ,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 1, '', 1, '', '', '2016-11-02 16:18:02', '2016-11-02 09:19:35'),
(213, 'CC00000058', 2, 2, '', 8, 1, 'suits', 1, '551.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 12,fabric_id: 141,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 1, '', 1, '', '', '2016-11-02 16:18:13', '2016-11-02 09:19:35'),
(214, 'CC00000058', 4, 2, '', 2, 4, 'trousers', 1, '82.00', '{pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0}', '{fabric_price: 12,fabric_id: 558,fabric_name:}', '', 0, 'Processing', 1, '', 1, '', '', '2016-11-02 16:18:25', '2016-11-02 09:19:35'),
(215, 'CC00000058', 21, 2, '', 2, 1, 'suits', 1, '225.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 200,fabric_id: 187,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 1, '', 1, '', '', '2016-11-02 16:18:38', '2016-11-02 09:19:35'),
(218, 'CC00000061', 2, 2, '0', 2, 1, '', 1, '539.00', '', '', '', 0, 'Processing', 1, '', 0, '', '', '2016-11-08 13:49:02', '2016-11-08 13:49:02'),
(219, 'CC00000062', 1, 2, '', 2, 2, 'shirts', 1, '75.00', '{shirt_sleeve: short,shirt_fit: loose,shirt_neck: 1,shirt_neck_no_interfacing: 1,shirt_neck_buttons: 2,shirt_cuffs: ,shirt_chest_pocket: 1,shirt_chest_pocket_type: 1,shirt_button_close: 3,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 0,fabric_id: 855,fabric_name:12}', '{font_price: ,font_family: ,initials_jacket: ,monogram_color: ,neck_styling: ,neck_lining_price: 0,collar_neck_color: ,cuff_styling: ,cuff_lining_price: 0,cuff_color: ,type_of_elbow: ,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 1, '', 0, '', '', '2016-11-21 07:49:59', '2016-11-21 09:23:49'),
(220, 'CC00000062', 2, 2, '0', 2, 1, '', 1, '539.00', '', '', '', 0, 'Processing', 1, '', 0, '', '', '2016-11-21 12:10:32', '2016-11-21 12:10:32'),
(237, 'CC00000075', 4, 2, '', 8, 4, '', 1, '70.00', '', '', '', 1, 'Processing', 0, '', 1, '', '', '2016-11-21 14:10:10', '2016-11-21 14:10:10'),
(238, 'CC00000075', 2, 2, '0', 2, 1, 'suits', 1, '551.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 12,fabric_id: 141,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2016-11-21 14:31:58', '2016-11-21 14:31:58'),
(239, 'CC00000076', 55, 8, '', 11, 2, 'shirts', 1, '75.00', '{shirt_sleeve: long,shirt_fit: fit,shirt_neck: 1,shirt_neck_no_interfacing: 1,shirt_neck_buttons: 1,shirt_cuffs: 1,shirt_chest_pocket: 0,shirt_chest_pocket_type: ,shirt_button_close: 3,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 0,fabric_id: 855,fabric_name:adfadgr}', '{font_price: ,font_family:  Arial ,initials_jacket: adf,monogram_color: Color,neck_styling: ,neck_lining_price: 0,collar_neck_color: ,cuff_styling: ,cuff_lining_price: 0,cuff_color: ,type_of_elbow: ,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 3, '', 1, '', '', '2016-12-02 18:55:12', '2016-12-02 11:55:32'),
(240, 'CC00000077', 57, 0, '515ea16f86a8a0716b801f1f557e2137', 0, 4, 'trousers', 1, '150.00', '{pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0}', '{fabric_price: 0,fabric_id: 699,fabric_name:}', '', 1, 'Processing', 0, '', 0, '', '', '2016-12-02 21:33:57', '2016-12-02 21:35:23'),
(241, 'CC00000078', 6, 0, '56bc290385eb1cfe13386b2688660b35', 0, 1, '', 1, '550.00', '', '', '', 1, 'Processing', 0, '', 0, '', '', '2016-12-20 21:23:36', '2016-12-20 21:23:36'),
(242, 'CC00000079', 38, 0, '2c428646557dc8c09ee8ea8ee826b569', 0, 1, 'suits', 1, '211.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2a,jacket_vent: 2,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 10,fabric_id: 318,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: 0,jacket_lining_id: 123,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: standard_button,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-01-10 18:58:59', '2017-01-10 18:58:59'),
(243, 'CC00000080', 37, 0, 'de6dc8376715b40d100ab0a6923d89b5', 0, 3, 'blazers', 1, '398.00', '{jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 4,jacket_sleeve_buttonholes: 0}', '{fabric_price: 10,fabric_id: 218,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: 0,jacket_lining_id: 123,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: custom_color,neck_lining_price: ,neck_lining_type: Color1,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-01-16 00:32:06', '2017-01-16 00:32:06'),
(244, 'CC00000081', 1, 8, '', 11, 2, 'shirts', 1, '75.00', '{shirt_sleeve: long,shirt_fit: fit,shirt_neck: 1,shirt_neck_no_interfacing: 1,shirt_neck_buttons: 2,shirt_cuffs: 1,shirt_chest_pocket: 1,shirt_chest_pocket_type: 1,shirt_button_close: 3,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 0,fabric_id: 855,fabric_name:fdyftry}', '{font_price: ,font_family: ,initials_jacket: ,monogram_color: ,neck_styling: ,neck_lining_price: 0,collar_neck_color: ,cuff_styling: ,cuff_lining_price: 0,cuff_color: ,type_of_elbow: ,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'In Production', 3, '', 1, '', '', '2017-02-11 22:53:22', '2017-02-11 15:53:44'),
(245, 'CC00000082', 1, 0, 'dffe6e0336f77c832b87985e96122caf', 0, 2, '', 1, '75.00', '', '', '', 1, 'Processing', 0, '', 0, '', '', '2017-02-13 02:29:22', '2017-02-13 02:29:22'),
(246, 'CC00000083', 56, 0, 'cff22284955e72ca2a3aa43488bbbb33', 0, 3, 'blazers', 1, '429.00', '{jacket_style: simple,jacket_fit: 0,jacket_lapels: standard,jacket_buttons: 1,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 2,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0}', '{fabric_price: 0,fabric_id: 905,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: brass_button,metal_button_price: 20,metal_btn_type: bronze,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_yes,elbow_price: 10,elbow_type: Color7,type_pocket_square: custom_color1,handkerchief_price: 10,pocket_square_type: Color5,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-03-23 15:01:14', '2017-03-23 15:01:14'),
(247, 'CC00000090', 33, 8, '', 0, 5, '', 1, '1.00', '', '', '', 0, 'Ready to Pickup', 3, '', 0, '', '', '2017-03-28 14:38:35', '2017-03-28 14:38:35'),
(248, 'CC00000085', 2, 9, '', 1, 1, '', 1, '539.00', '', '', '', 0, 'Processing', 4, '', 0, '', '', '2017-03-29 05:06:04', '2017-03-29 05:06:04'),
(249, 'CC00000088', 36, 9, '', 1, 1, 'suits', 1, '243.00', '{suit_type: man_suit3,waistcoat_price: 100,jacket_style: simple,jacket_fit: 1,jacket_lapels: peak,jacket_buttons: 3,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2a,jacket_vent: 0,jacket_sleeve_buttons: 2,jacket_sleeve_buttonholes: 0,waistcoat_style: simple,waistcoat_buttons: 5,waistcoat_chest_pocket: 1,waistcoat_pockets: 2,waistcoat_pockets_num: 2,waistcoat_bottom: cut,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 10,fabric_id: 318,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 4, '', 0, '', '', '2017-04-03 07:31:30', '2017-04-03 07:31:30'),
(250, 'CC00000089', 4, 9, '0', 1, 4, '', 1, '70.00', '', '', '', 0, 'Processing', 4, '', 0, '', '', '2017-04-03 08:16:18', '2017-04-03 08:16:18'),
(253, 'CC00000090', 32, 9, '', 0, 5, '', 1, '1.00', '', '', '', 0, 'Ready to Pickup', 3, '', 0, '', '', '2017-04-05 05:24:40', '2017-04-05 05:24:40'),
(255, 'CC00000090', 42, 0, '5b3abaf953801c8ebb461f64fe384f80', 0, 1, 'suits', 1, '773.00', '{suit_type: man_suit3,waistcoat_price: 149,jacket_style: crossed,jacket_fit: 1,jacket_lapels: peak,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 3,jacket_pockets_type: 3,jacket_vent: 2,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,waistcoat_style: crossed,waistcoat_buttons: 4,waistcoat_chest_pocket: 1,waistcoat_pockets: 2,waistcoat_pockets_num: 2,waistcoat_bottom: cut,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 85,fabric_id: 876,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: standard_button,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Ready to Pickup', 0, '', 0, '', '', '2017-04-07 04:04:21', '2017-04-07 04:04:21'),
(256, 'CC00000091', 61, 0, 'be27c5b05dfebbd9e85f4d7a4e101cb0', 0, 2, 'shirts', 1, '75.00', '{shirt_sleeve: long,shirt_fit: fit,shirt_neck: 1,shirt_neck_no_interfacing: 0,shirt_neck_buttons: 1,shirt_cuffs: 1,shirt_chest_pocket: 0,shirt_chest_pocket_type: ,shirt_button_close: 1,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 0,fabric_id: 855,fabric_name:wsdew}', '{font_price: ,font_family:  Arial ,initials_jacket: JW,monogram_color: Color,neck_styling: ,neck_lining_price: 0,collar_neck_color: ,cuff_styling: ,cuff_lining_price: 0,cuff_color: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-04-13 19:22:20', '2017-04-13 19:22:20'),
(260, 'CC00000092', 44, 0, '14l3k3rrtbj569dhao52tu4el6', 0, 2, '', 1, '75.00', '', '', '', 0, 'Processing', 3, '', 0, '', '', '2017-07-14 05:35:52', '2017-08-15 15:28:02'),
(263, 'CC00000094', 2, 0, 'oe41jovijrbfk1t905vvek8tr3', 0, 1, 'suits', 1, '0.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: peak,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 2,jacket_sleeve_buttons: 4,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 2,pants_back_pocket_type: C,pants_cuff: 0,extra_pants:No}', '{fabric_price: 0,fabric_id: 876,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: Arial,initials_jacket: Setter Boyz ,monogram_color: Color,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: standard_button,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-07-21 18:00:26', '2017-07-21 18:00:26'),
(264, 'CC00000095', 2, 0, '5elg3g3jmtpdu4ujab2f8876r4', 0, 1, 'suits', 1, '0.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 0,fabric_id: 964,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-07-26 13:32:32', '2017-07-26 13:32:32'),
(265, 'CC00000096', 14, 0, '8e2d9e255eb49cb7f31f913c4f5c9600', 0, 3, 'blazers', 1, '0.00', '{jacket_style: simple,jacket_fit: 1,jacket_lapels: peak,jacket_buttons: 1,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0}', '{fabric_price: 0,fabric_id: 591,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: 0,font_family: Arial,initials_jacket: Ilw,monogram_color: Color3,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-08-14 11:31:23', '2017-08-14 11:31:23');
INSERT INTO `order_master` (`om_id`, `order_id`, `pid`, `userid`, `sess_id`, `mpid`, `subcatid`, `p_type`, `om_quantity`, `om_price`, `om_style`, `om_fab`, `om_accents`, `om_status`, `order_status`, `ship_id`, `carrier_name`, `placed_by`, `track_id`, `notes`, `created_date`, `last_updated`) VALUES
(266, 'CC00000092', 2, 8, '', 11, 1, 'suits', 1, '0.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 0,fabric_id: 488,fabric_name:84845 }', '{jacket_lining_type: main_custom_color,lining_price: 0,jacket_lining_id: 123,font_price: ,font_family: Monotype Corsiva,initials_jacket: xfcFDSFdsf,monogram_color: Color7,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: custom_color,neck_lining_price: ,neck_lining_type: Color4,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: custom_color1,handkerchief_price: 0,pocket_square_type: Color5,type_of_colored_button_holes: both_placket_and_cuffs,lapel_color: Color3,button_holes_price: 0,colored_thread_type: Color7,colored_holes_type: Color6}', 0, 'Processing', 3, '', 1, '', '', '2017-08-15 22:27:38', '2017-08-15 22:30:32'),
(268, 'CC00000097', 54, 8, '', 11, 3, 'blazers', 1, '588.00', '{jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0}', '{fabric_price: 0,fabric_id: 698,fabric_name:asfdefs}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 3, '', 1, '', '', '2017-08-15 22:34:11', '2017-08-17 06:14:53'),
(273, 'CC00000098', 49, 0, 'b45e43d27a3de507de64b587268d7e09', 0, 2, 'shirts', 1, '0.00', '{shirt_sleeve: long,shirt_fit: fit,shirt_neck: 2,shirt_neck_no_interfacing: 1,shirt_neck_buttons: 2,shirt_cuffs: 4,shirt_chest_pocket: 1,shirt_chest_pocket_type: 1,shirt_button_close: 3,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 0,fabric_id: 855,fabric_name:F}', '{font_price: ,font_family: ,initials_jacket: ,monogram_color: ,neck_styling: inner_fabric,neck_lining_price: 0,collar_neck_color: Color6,cuff_styling: ,cuff_lining_price: 0,cuff_color: ,type_of_elbow: elbow_yes,elbow_price: 0,elbow_type: Color1,type_of_colored_button_holes: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-08-16 07:30:47', '2017-08-16 07:30:47'),
(274, 'CC00000099', 1, 51, '0', 0, 2, 'shirts', 1, '0.00', '{shirt_sleeve: short,shirt_fit: loose,shirt_neck: 1,shirt_neck_no_interfacing: 1,shirt_neck_buttons: 2,shirt_cuffs: ,shirt_chest_pocket: 1,shirt_chest_pocket_type: 1,shirt_button_close: 3,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 0,fabric_id: 855,fabric_name:}', '{font_price: ,font_family: ,initials_jacket: ,monogram_color: ,neck_styling: ,neck_lining_price: 0,collar_neck_color: ,cuff_styling: ,cuff_lining_price: 0,cuff_color: ,type_of_elbow: ,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-08-17 07:17:43', '2017-08-17 07:17:43'),
(275, 'CC00000099', 2, 51, '0', 0, 1, 'suits', 1, '551.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 12,fabric_id: 141,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-08-17 07:23:23', '2017-08-17 07:23:23'),
(276, 'CC00000099', 37, 51, '0', 0, 3, 'blazers', 1, '398.00', '{jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0}', '{fabric_price: 10,fabric_id: 218,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-08-17 07:27:25', '2017-08-17 07:27:25'),
(277, 'CC00000099', 21, 51, '', 0, 1, 'suits', 1, '225.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 200,fabric_id: 187,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: standard_button,metal_button_price: 0,metal_btn_type: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 1, '', '', '2017-08-17 07:28:25', '2017-08-17 07:28:25'),
(278, 'CC00000100', 49, 0, 'e22d7c38450c1e6f2188ba34c9524593', 0, 2, 'shirts', 1, '110.00', '{shirt_sleeve: short,shirt_fit: loose,shirt_neck: 1,shirt_neck_no_interfacing: 1,shirt_neck_buttons: 2,shirt_cuffs: ,shirt_chest_pocket: 1,shirt_chest_pocket_type: 1,shirt_button_close: 3,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 0,fabric_id: 855,fabric_name:Fab}', '{font_price: ,font_family: ,initials_jacket: ,monogram_color: ,neck_styling: inner_fabric,neck_lining_price: 10,collar_neck_color: Color4,cuff_styling: inner_fabric,cuff_lining_price: 10,cuff_color: Color8,type_of_elbow: elbow_yes,elbow_price: 10,elbow_type: Color4,type_of_colored_button_holes: lapel,button_holes_price: 5,colored_thread_type: Color2,colored_holes_type: Color1}', 1, 'Processing', 0, '', 0, '', '', '2017-08-17 11:02:51', '2017-08-17 11:02:51'),
(279, 'CC00000097', 2, 8, '', 11, 1, 'suits', 1, '569.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 0,fabric_id: 488,fabric_name:sdfsf}', '{jacket_lining_type: main_custom_color,lining_price: 0,jacket_lining_id: 123,font_price: ,font_family: Times New Roman,initials_jacket: sdfdsf,monogram_color: Color8,type_of_button: brass_button,metal_button_price: 20,metal_btn_type: brass,type_of_neck: custom_color,neck_lining_price: ,neck_lining_type: Color3,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: custom_color1,handkerchief_price: 10,pocket_square_type: Color5,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 3, '', 1, '', '', '2017-08-17 13:14:11', '2017-08-17 06:14:53'),
(280, 'CC00000101', 78, 0, '6c76519bee65974d8f5e9793b5d768ee', 0, 1, '', 1, '539.00', '', '', '', 1, 'Processing', 0, '', 0, '', '', '2017-08-23 17:24:56', '2017-08-23 17:24:56'),
(281, 'CC00000102', 49, 8, '', 11, 2, 'shirts', 1, '75.00', '{shirt_sleeve: long,shirt_fit: fit,shirt_neck: 5,shirt_neck_no_interfacing: 0,shirt_neck_buttons: 1,shirt_cuffs: 1,shirt_chest_pocket: 0,shirt_chest_pocket_type: ,shirt_button_close: 2,shirt_cut: straight,shirt_pleats: 1}', '{fabric_price: 0,fabric_id: 855,fabric_name:8348}', '{font_price: ,font_family:  Arial ,initials_jacket: kdfjgk,monogram_color: Color5,neck_styling: ,neck_lining_price: 0,collar_neck_color: ,cuff_styling: ,cuff_lining_price: 0,cuff_color: ,type_of_elbow: ,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 0, 'Processing', 3, '', 1, '', '', '2017-09-02 17:55:19', '2017-09-02 10:56:09'),
(282, 'CC00000103', 44, 0, '4bc3cee34e6b579411934ea56dc851c7', 0, 2, 'shirts', 1, '75.00', '{shirt_sleeve: short,shirt_fit: loose,shirt_neck: 1,shirt_neck_no_interfacing: 1,shirt_neck_buttons: 2,shirt_cuffs: ,shirt_chest_pocket: 1,shirt_chest_pocket_type: 1,shirt_button_close: 3,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 0,fabric_id: 855,fabric_name:SDF}', '{font_price: ,font_family: ,initials_jacket: ,monogram_color: ,neck_styling: ,neck_lining_price: 0,collar_neck_color: ,cuff_styling: ,cuff_lining_price: 0,cuff_color: ,type_of_elbow: ,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-09-13 07:08:40', '2017-09-13 07:08:40'),
(283, 'CC00000104', 76, 8, '', 0, 6, '', 1, '589.00', '', '', '', 1, 'Processing', 0, '', 1, '', '', '2017-09-15 05:42:08', '2017-09-15 05:42:08'),
(284, 'CC00000105', 83, 0, '91300400afc7aae248cc85b8f590e842', 0, 3, '', 1, '939.00', '', '', '', 1, 'Processing', 0, '', 0, '', '', '2017-10-19 18:03:57', '2017-10-19 18:03:57'),
(285, 'CC00000106', 42, 0, '9ce20589042365734e4c9cbf0774972a', 0, 1, 'suits', 1, '644.00', '{suit_type: man_suit2,jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0,pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: diagonal,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 0,extra_pants:No}', '{fabric_price: 85,fabric_id: 876,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: brass_button,metal_button_price: 20,metal_btn_type: bronze,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_pocket_square: no_pocket,handkerchief_price: 0,pocket_square_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-10-20 08:09:14', '2017-10-20 08:09:14'),
(286, 'CC00000106', 1, 0, '9ce20589042365734e4c9cbf0774972a', 0, 2, 'shirts', 1, '85.00', '{shirt_sleeve: short,shirt_fit: loose,shirt_neck: 1,shirt_neck_no_interfacing: 1,shirt_neck_buttons: 2,shirt_cuffs: ,shirt_chest_pocket: 1,shirt_chest_pocket_type: 1,shirt_button_close: 3,shirt_cut: classic,shirt_pleats: 0}', '{fabric_price: 0,fabric_id: 855,fabric_name:DD}', '{font_price: ,font_family: ,initials_jacket: ,monogram_color: ,neck_styling: outer_fabric,neck_lining_price: 0,collar_neck_color: ,cuff_styling: outer_fabric,cuff_lining_price: 0,cuff_color: ,type_of_elbow: elbow_yes,elbow_price: 10,elbow_type: Color3,type_of_colored_button_holes: by_default,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-10-20 08:09:55', '2017-10-20 08:09:55'),
(287, 'CC00000106', 37, 0, '9ce20589042365734e4c9cbf0774972a', 0, 3, 'blazers', 1, '443.00', '{jacket_style: simple,jacket_fit: 1,jacket_lapels: standard,jacket_buttons: 2,jacket_chest_pocket: 1,jacket_pockets: 2,jacket_pockets_type: 2,jacket_vent: 1,jacket_sleeve_buttons: 3,jacket_sleeve_buttonholes: 0}', '{fabric_price: 10,fabric_id: 218,fabric_name:}', '{jacket_lining_type: default_jacket,lining_price: 0,jacket_lining_id: ,font_price: ,font_family: ,initials_jacket: ,monogram_color: ,type_of_button: brass_button,metal_button_price: 20,metal_btn_type: gold,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_yes,elbow_price: 10,elbow_type: Color7,type_pocket_square: custom_color1,handkerchief_price: 10,pocket_square_type: Color,type_of_colored_button_holes: both_placket_and_cuffs,lapel_color: ,button_holes_price: 5,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-10-20 08:10:37', '2017-10-20 08:10:37'),
(288, 'CC00000106', 57, 0, '9ce20589042365734e4c9cbf0774972a', 0, 4, 'trousers', 1, '150.00', '{pants_fit: fit,pants_peg: 0,pants_belt: 1,pants_front_pocket: vertical,pants_back_pocket: 1,pants_back_pocket_type: A,pants_cuff: 1}', '{fabric_price: 0,fabric_id: 699,fabric_name:}', '', 1, 'Processing', 0, '', 0, '', '', '2017-10-20 08:11:21', '2017-10-20 08:11:21'),
(289, 'CC00000106', 76, 0, '9ce20589042365734e4c9cbf0774972a', 0, 6, 'coat', 1, '601.00', '{coat_style: simple,coat_neck: classic,coat_neck_flap: close,coat_length: long,coat_fit: 1,coat_closure: boton,coat_closure_type_zipper: standard,coat_closure_type_boton: standard,coat_pockets: 2,coat_pockets_type: 1,coat_chest_pocket: 0,coat_belt: 0,coat_backcut: 0,coat_sleeve: 0,coat_shoulder: 0}', '{fabric_price: 12,fabric_id: 159,fabric_name:}', '{jacket_lining_type: main_custom_color,lining_price: ,jacket_lining_id: 57,font_price: ,font_family: Arial,initials_jacket: ,monogram_color: ,type_of_neck: color_by_default,neck_lining_price: ,neck_lining_type: ,type_of_elbow: elbow_no,elbow_price: 0,elbow_type: ,type_of_colored_button_holes: by_default,lapel_color: ,button_holes_price: 0,colored_thread_type: ,colored_holes_type: }', 1, 'Processing', 0, '', 0, '', '', '2017-10-20 08:14:05', '2017-10-20 08:14:05'),
(290, 'CC00000107', 42, 32, '', 12, 1, '', 1, '539.00', '', '', '', 1, 'Processing', 0, '', 0, '', '', '2017-10-23 09:06:57', '2017-10-23 09:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_received_master`
--

CREATE TABLE `order_received_master` (
  `id` int(10) NOT NULL,
  `ord_title` longtext NOT NULL,
  `ord_image` text NOT NULL,
  `ord_desc` longtext NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_received_master`
--

INSERT INTO `order_received_master` (`id`, `ord_title`, `ord_image`, `ord_desc`, `created_date`, `last_updated`) VALUES
(1, '<p>Thank you for choosing and ordering from Custom Clothiers!</p>', 'uploads/ord-banner-image/1493725356_Ord-received.jpg', '<p>We appreciate your business. Simply log in to track your orders.&nbsp;The typically turnaround is 3-5 weeks.</p>', '2017-05-02 00:00:00', '2017-08-16 03:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `page_content`
--

CREATE TABLE `page_content` (
  `id` int(11) NOT NULL,
  `page_title` text NOT NULL,
  `page_desc` text NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_content`
--

INSERT INTO `page_content` (`id`, `page_title`, `page_desc`, `date`) VALUES
(1, 'Privacy Policy', '<h3>CUSTOM CLOTHIERS&nbsp;PRIVACY POLICY</h3>\r\n<p>This policy describes how Custom Clothiers&nbsp;collects and handles customer information to help us serve our customers better. Personal information is any information that identifies you, such as your name, address, email address, phone number, and previous use of Custom Clothiers products. By visiting our website, you accept the practices outlined in this privacy policy.</p>\r\n<h3>COLLECTING INFORMATION</h3>\r\n<p>Custom Clothiers&nbsp;collects information from you when you create an Custom Clothiers account or update your account, when you book an appointment or fitting with us, shop online or in our showrooms, opt-in to receive our newsletters, participate in giveaways, sweepstakes, contests, promotion or survey, or join our social networking sites. When you create an Custom Clothiers account, we may ask for information such as your name, phone number, email address, city, state and zip code.</p>\r\n<p>Once you create and sign into your account, Custom Clothiers automatically receives information from your browser, such as your IP address, and cookies. Cookies enable our website to recognize you as you move throughout our website and stores your navigational patterns and any items you have placed in your shopping cart. Your web browser also allows us to track statistics such as types of browsers on our website, page views, navigational patterns and high traffic areas. This information does NOT track personally identifiable information about our users.</p>\r\n<p>We may combine your information from our website with information you have provided in our showrooms to ensure that our service to you is relevant and timely.</p>\r\n<h3>PROTECTING INFORMATION</h3>\r\n<p>We limit access to personal information about you to employees who we believe reasonably need to come into contact with that information to provide products or services to you or in order to do their jobs. We have physical, electronic and procedural safeguards that comply with federal regulations to protect personal information about you.</p>\r\n<p>Custom Clothiers does not rent, sell or share your personal information to unaffiliated third parties. Occasionally, we work with trusted partners who work on our behalf to improve our services to you. These partners may have access to your personal information after they have agreed to our confidentiality agreement.</p>\r\n<p>In the case that Custom Clothiers is acquired by or merged with another company, Custom Clothiers may disclose your personal information to a purchaser that agrees to abide by the terms and condition of this privacy policy.</p>\r\n<p>We may disclose information about you if required to do so by law, governmental request, process or court order or based on our good faith belief that there is suspected fraud or situation involving potential threats to the safety of any person or violation of the Custom Clothiers&nbsp;terms of use.</p>\r\n<h3>MARKETING COMMUNICATIONS</h3>\r\n<p>In addition to using your personal information to improve and enhance your experience with Custom Clothiers, we use information to better target our marketing to your behavioral preferences. If you create an account on our website, you will be required to provide your email address and you may automatically be added to our email list and receive marketing or promotional information from us.</p>\r\n<p>If you do not wish to receive Custom Clothiers marketing emails, you may opt out by clicking on the unsubscribe link found at the bottom of all Custom Clothiers marketing emails. Please be aware that it can take up to 10 business days to remove you from our marketing email lists.</p>\r\n<p>Please note that if even if you unsubscribe to our marketing email list, you will still receive servicing emails such as notifications of upcoming appointments, order confirmation and shipment status.</p>\r\n<h3>NOTIFICATION OF CHANGES</h3>\r\n<p>Custom Clothiers is committed to protecting your privacy and may update this policy from time to time. Changes will be updated on our website with the date of the most recent update. We will notify you about significant changes to our privacy policy by sending a notice to the primary email address on your account.</p>\r\n<p>If you have any questions or concerns regarding our privacy policy, please send an email message to<a href=\"mailto:customerservice@altonlane.com\">customerservice@customclothiers.com</a>.</p>', '2015-11-06 10:51:09'),
(3, 'Our Story', '<article id=\"post-46\" class=\"post-46 post type-post status-publish format-standard hentry category-uncategorized\"><header class=\"entry-header\"><header class=\"entry-header\"><header class=\"entry-header\"><header class=\"entry-header\">\r\n<h2 class=\"entry-title\" style=\"text-align: center;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 24pt; color: #000080;\">THE CUSTOM CLOTHIERS EXPERIENCE</span></h2>\r\n</header>\r\n<h2 class=\"entry-title\" style=\"text-align: center;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">&nbsp;<span style=\"font-size: 14pt;\">Enjoy the unique experience of having a custom suit made especially for you.</span></span></h2>\r\n<p style=\"text-align: center;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">&nbsp;</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 18pt;\">We aren&rsquo;t your mom &amp; pop tailors. We were people just like you looking for something nice and simple: a place to buy a perfectly fitted bespoke custom suit that didn&rsquo;t cost an arm and a leg.</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 18pt;\">After years of settling for clothing that were always over-priced and unspectacular, we decided to create the brand we always seemed to be looking for ourselves.</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 18pt;\">Our approach is simple: Quality is the most important thing. Our clothing has to be awesome so we wanted only the finest quality fabrics. And finally, try our best to offer it at the best&nbsp;possible price.</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 18pt;\">The custom suits and shirts you see today at our store and on our site is the culmination of our dream. Please let us know what you think and we&rsquo;ll do what we can to make it happen.</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 18pt;\">Thank you for choosing us!</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 18pt;\">&nbsp;</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 18pt;\"><span style=\"font-family: arial, helvetica, sans-serif;\">-&nbsp;Cofounders of Custom Clothiers</span></span></p>\r\n</header></header><header class=\"entry-header\">\r\n<h2 class=\"entry-title\" style=\"text-align: center;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">&nbsp;</span></h2>\r\n</header></header></article>\r\n<article id=\"post-40\" class=\"post-40 post type-post status-publish format-standard hentry category-annoucements\">\r\n<div class=\"entry-content\">&nbsp;</div>\r\n</article>\r\n<article id=\"post-50\" class=\"post-50 post type-post status-publish format-standard hentry category-uncategorized\"></article>', '2015-11-06 12:54:11'),
(4, 'Terms & Conditions', '<p>Please carefully read the following Terms of Use before using the Custom Clothiers.com Web site (the \"Site\"). By accessing this Site, you agree to be bound by these Terms of Use. These Terms of Use may be updated from time to time. Accordingly, you should check the date of the Terms of Use (which appear at the end of this document) and review any changes since the last version. If at any time you do not agree to these Terms of Use, please do not use this Site. This Web site is operated by Custom Clotheirs, LLC. Throughout the site, the terms \"we\", \"us\" and \"our\" refer to CUSTOM CLOTHIERS. CUSTOM CLOTHIERS offers this Web site, including all information, tools and services available from this site, to you, the user, conditioned upon your acceptance of all the terms, conditions, policies and notices stated here. Your continued use of this site constitutes your agreement to these Terms of Use.</p>\r\n<h3>ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION ON THIS SITE</h3>\r\n<p>We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk. This site may contain certain historical information. Historical information necessarily is not current and is provided for your reference only. We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on the site. You agree that it is your responsibility to monitor changes to the site.</p>\r\n<h3>ORDERS, PROHIBITION ON RESELLING, AND PRICE</h3>\r\n<p>The information on this site does not constitute a binding offer to sell products described on the site or to make such products available in your area. We reserve the right at any time after receipt of your order to accept or decline your order, or any portion thereof, in our sole discretion, even after your receipt of an order confirmation or after your credit card has been charged. You may not purchase any item from this site for resale by you or any other person, and you may not resell any item purchased from this site. The prices displayed on the site are quoted in U.S. dollars and are intended to be valid and effective only in the United States. In the event a product is listed at an incorrect price, we have the right to refuse or cancel orders placed for the product listed at the incorrect price, regardless of whether the order has been confirmed or your credit card charged. If your credit card has already been charged for the purchase and your order is canceled, we will issue a credit to your credit card account.</p>\r\n<h3>PRODUCT INFORMATION</h3>\r\n<p>Select product can be found in our full price stores in the United States while supplies last. In some cases, merchandise displayed for sale on the site may not be available in stores. The particular technical specifications and settings of your computer and its display could affect the accuracy of its display of the colors of products offered on the site.</p>\r\n<h3>USE OF MATERIAL ON THE SITE</h3>\r\n<p>All content on this site (including, without limitation, text, design, graphics, logos, icons, images, audio clips, downloads, interfaces, code and software, as well as the selection and arrangement thereof), is the exclusive property of and owned by CUSTOM CLOTHIERS, its licensors or its content providers and is protected by copyright, trademark and other applicable laws. You may access, copy, download and print the material contained on the site for your personal and non-commercial use, provided you do not modify or delete any copyright, trademark or other proprietary notice that appears on the material you access, copy, download or print. Any other use of content on the site, including but not limited to the modification, distribution, transmission, performance, broadcast, publication, uploading, licensing, reverse engineering, transfer or sale of, or the creation of derivative works from, any material, information, software, products or services obtained from the site, or use of the site for purposes competitive to CUSTOM CLOTHIERS, is expressly prohibited. CUSTOM CLOTHIERS reserves the right to refuse or cancel any person\'s registration for this site, remove any person from this site or prohibit any person from using this site for any reason whatsoever. CUSTOM CLOTHIERS, or its licensors or content providers, retain full and complete title to the material provided on the site, including all associated intellectual property rights, and provide this material to you under a license that is revocable at any time in CUSTOM CLOTHIERS\'s sole discretion. CUSTOM CLOTHIERS neither warrants nor represents that your use of materials on this site will not infringe rights of third parties not affiliated with CUSTOM CLOTHIERS. You may not use contact information provided on the site for unauthorized purposes, including marketing. You may not use any hardware or software intended to damage or interfere with the proper working of the site or to surreptitiously intercept any system, data or personal information from the site. You agree not to interrupt or attempt to interrupt the operation of the site in any way. CUSTOM CLOTHIERS reserves the right, in its sole discretion, to limit or terminate your access to or use of the site at any time without notice. You are personally liable for any orders that you place or charges or other liabilities that you incur prior to termination. Termination of your access or use will not waive or affect any other right or relief to which CUSTOM CLOTHIERS may be entitled, at law or in equity.</p>\r\n<h3>MATERIAL YOU SUBMIT</h3>\r\n<p>You acknowledge that you are responsible for any material you may submit via the site, including the legality, reliability, appropriateness, originality and copyright of any such material. You may not upload to, distribute or otherwise publish through this site any content that (i) is false, fraudulent, libelous, defamatory, obscene, threatening, invasive of privacy or publicity rights, infringing on intellectual property rights, abusive, illegal or otherwise objectionable; (ii) may constitute or encourage a criminal offense, violate the rights of any party or otherwise give rise to liability or violate any law; or (iii) may contain software viruses, political campaigning, chain letters, mass mailings, or any form of spam. You may not use a false email address or other identifying information, impersonate any person or entity or otherwise mislead as to the origin of any content. You may not upload commercial content onto the site. If you do submit material, and unless we indicate otherwise, you grant CUSTOM CLOTHIERS and its affiliates a nonexclusive, royalty-free, perpetual, irrevocable and fully sublicensable right to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute and display such material throughout the world in any media. You grant CUSTOM CLOTHIERS and its affiliates the right to use the name you submit in connection with such material, if they so choose. All personal information provided via this site will be handled in accordance with the site?s online Privacy Notice. You represent and warrant that you own or otherwise control all the rights to the content you post; that the content is accurate; that use of the content you supply does not violate any provision herein and will not cause injury to any person or entity; and that you will indemnify CUSTOM CLOTHIERS for all claims resulting from content you supply.</p>\r\n<h3>CONDUCT ON THE SITE</h3>\r\n<p>Some features that may be available on this site require registration. By registering at and in consideration of your use of the site you agree to provide true, accurate, current and complete information about yourself. Some features on this site require use of a password. You are responsible for protecting your password. You agree that you will be responsible for any and all statements made, and acts or omissions that occur, through the use of your password. If you have any reason to believe or become aware of any loss, theft or unauthorized use of your password, notify CUSTOM CLOTHIERS immediately. CUSTOM CLOTHIERS may assume that any comunications CUSTOM CLOTHIERS receives under your password have been made by you unless CUSTOM CLOTHIERS receives notice otherwise. You or third parties acting on your behalf are not allowed to frame this site or use our proprietary marks as meta tags, without our written consent. You may not use frames or utilize framing techniques or technology to enclose any content included on the site without CUSTOM CLOTHIERS\'s&nbsp;express written consent. Further, you may not utilize any site content in any meta tags or any other \"hidden text\" techniques or technologies without CUSTOM CLOTHIERS\'s express written consent.</p>\r\n<h3>LINKS</h3>\r\n<p>This site may contain links to other Web sites, some of which are operated&nbsp;by CUSTOM CLOTHIERS or its affiliates and others of which are operated by third parties. These links are provided as a convenience to you and as an additional avenue of access to the information contained therein. We have not necessarily reviewed all the information on those other sites and are not responsible for the content of those or any other sites or any products or services that may be offered through those or any other sites. Inclusion of links to other sites should not be viewed as an endorsement of the content of linked sites. Different terms and conditions may apply to your use of any linked sites. CUSTOM CLOTHIERS is not responsible for any losses, damages or other liabilities incurred as a result of your use of any linked sites.</p>\r\n<h3>TRADEMARKS AND COPYRIGHTS</h3>\r\n<p>Trademarks, logos and service marks displayed on this site are registered and unregistered trademarks of Custom Clothiers, LLC and their licensors or content providers, or other third parties. All of these trademarks, logos and service marks are the property of their respective owners. Nothing on this site shall be construed as granting, by implication, estoppel, or otherwise, any license or right to use any trademark, logo or service mark displayed on the site without the owner\'s prior written permission, except as otherwise described herein. CUSTOM CLOTHIERS reserves all rights not expressly granted in and to the site and its content. This site and all of its content, including but not limited to text, design, graphics, interfaces and code, and the selection and arrangement thereof, is protected as a compilation under the copyright laws of the United States and other countries.</p>\r\n<h3>DISCLAIMERS</h3>\r\n<p>YOUR USE OF THIS SITE IS AT YOUR SOLE RISK. THE SITE IS PROVIDED ON AN \"AS IS\" AND \"AS AVAILABLE\" BASIS. WE RESERVE THE RIGHT TO RESTRICT OR TERMINATE YOUR ACCESS TO THE SITE OR ANY FEATURE OR PART THEREOF AT ANY TIME. CUSTOM CLOTHIERS EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE AND ANY WARRANTIES THAT MATERIALS ON THE SITE ARE NONINFRINGING, AS WELL AS WARRANTIES IMPLIED FROM A COURSE OF PERFORMANCE OR COURSE OF DEALING; THAT ACCESS TO THE SITE WILL BE UNINTERRUPTED OR ERROR-FREE; THAT THE SITE WILL BE SECURE; THAT THE SITE OR THE SERVER THAT MAKES THE SITE AVAILABLE WILL BE VIRUS-FREE; OR THAT INFORMATION ON THE SITE WILL BE COMPLETE, ACCURATE OR TIMELY. IF YOU DOWNLOAD ANY MATERIALS FROM THIS SITE, YOU DO SO AT YOUR OWN DISCRETION AND RISK. YOU WILL BE SOLELY RESPONSIBLE FOR ANY DAMAGE TO YOUR COMPUTER SYSTEM OR LOSS OF DATA THAT RESULTS FROM THE DOWNLOAD OF ANY SUCH MATERIALS. NO ADVICE OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM CUSTOM CLOTHIERS OR THROUGH OR FROM THE SITE SHALL CREATE ANY WARRANTY OF ANY KIND. CUSTOM CLOTHIERS DOES NOT MAKE ANY WARRANTIES OR REPRESENTATIONS REGARDING THE USE OF THE MATERIALS ON THIS SITE IN TERMS OF THEIR COMPLETENESS, CORRECTNESS, ACCURACY, ADEQUACY, USEFULNESS, TIMELINESS, RELIABILITY OR OTHERWISE.</p>\r\n<p>IN CERTAIN JURISDICTIONS, THE LAW MAY NOT PERMIT THE DISCLAIMER OF WARRANTIES, SO THE ABOVE DISCLAIMER MAY NOT APPLY TO YOU.</p>\r\n<h3>LIMITATION OF LIABILITY</h3>\r\n<p>YOU ACKNOWLEDGE AND AGREE THAT YOU ASSUME FULL RESPONSIBILITY FOR YOUR USE OF THE SITE. YOU ACKNOWLEDGE AND AGREE THAT ANY INFORMATION YOU SEND OR RECEIVE DURING YOUR USE OF THE SITE MAY NOT BE SECURE AND MAY BE INTERCEPTED BY UNAUTHORIZED PARTIES. YOU ACKNOWLEDGE AND AGREE THAT YOUR USE OF THE SITE IS AT YOUR OWN RISK AND THAT THE SITE IS MADE AVAILABLE TO YOU AT NO CHARGE. RECOGNIZING SUCH, YOU ACKNOWLEDGE AND AGREE THAT, TO THE FULLEST EXTENT PERMITTED BY APPLICABLE LAW, NEITHER CUSTOM CLOTHIERS NOR ITS AFFILIATES, SUPPLIERS OR THIRD PARTY CONTENT PROVIDERS WILL BE LIABLE FOR ANY DIRECT, INDIRECT, PUNITIVE, EXEMPLARY, INCIDENTAL, SPECIAL, CONSEQUENTIAL OR OTHER DAMAGES ARISING OUT OF OR IN ANY WAY RELATED TO THE SITE, OR ANY OTHER SITE YOU ACCESS THROUGH A LINK FROM THIS SITE OR FROM ANY ACTIONS WE TAKE OR FAIL TO TAKE AS A RESULT OF COMMUNICATIONS YOU SEND TO US, OR THE DELAY OR INABILITY TO USE THE SITE, OR FOR ANY INFORMATION, PRODUCTS OR SERVICES ADVERTISED IN OR OBTAINED THROUGH THE SITE, CUSTOM CLOTHIERS\'s&nbsp;REMOVAL OR DELETION OF ANY MATERIALS SUBMITTED OR POSTED ON ITS SITE, OR OTHERWISE ARISING OUT OF THE USE OF THE SITE, WHETHER BASED ON CONTRACT, TORT, STRICT LIABILITY OR OTHERWISE, EVEN IF CUSTOM CLOTHIERS, ITS AFFILIATES OR ANY OF ITS SUPPLIERS HAS BEEN ADVISED OF THE POSSIBILITY OF DAMAGES. THIS DISCLAIMER APPLIES, WITHOUT LIMITATION, TO ANY DAMAGES OR INJURY ARISING FROM ANY FAILURE OF PERFORMANCE, ERROR, OMISSION, INTERRUPTION, DELETION, DEFECTS, DELAY IN OPERATION OR TRANSMISSION, COMPUTER VIRUSES, FILE CORRUPTION, COMMUNICATION-LINE FAILURE, NETWORK OR SYSTEM OUTAGE, YOUR LOSS OF PROFITS, OR THEFT, DESTRUCTION, UNAUTHORIZED ACCESS TO, ALTERATION OF, LOSS OR USE OF ANY RECORD OR DATA, AND ANY OTHER TANGIBLE OR INTANGIBLE LOSS. YOU SPECIFICALLY ACKNOWLEDGE AND AGREE THAT NEITHER CUSTOM CLOTHIERS NOR ITS SUPPLIERS SHALL BE LIABLE FOR ANY DEFAMATORY, OFFENSIVE OR ILLEGAL CONDUCT OF ANY USER OF THE SITE. YOUR SOLE AND EXCLUSIVE REMEDY FOR ANY OF THE ABOVE CLAIMS OR ANY DISPUTE WITH CUSTOM CLOTHIERS IS TO DISCONTINUE YOUR USE OF THE SITE. YOU AND CUSTOM CLOTHIERS AGREE THAT ANY CAUSE OF ACTION ARISING OUT OF OR RELATED TO THE SITE MUST COMMENCE WITHIN ONE (1) YEAR AFTER THE CAUSE OF ACTION ACCRUES OR THE CAUSE OF ACTION IS PERMANENTLY BARRED. BECAUSE SOME JURISDICTIONS DO NOT ALLOW LIMITATIONS ON HOW LONG AN IMPLIED WARRANTY LASTS, OR THE EXCLUSION OR LIMITATION OF LIABILITY FOR CONSEQUENTIAL OR INCIDENTAL DAMAGES, ALL OR A PORTION OF THE ABOVE LIMITATION MAY NOT APPLY TO YOU.</p>\r\n<h3>INDEMNIFICATION</h3>\r\n<p>You agree to indemnify, defend and hold harmless CUSTOM CLOTHIERS and its affiliates and their officers, directors, employees, contractors, agents, licensors, service providers, subcontractors and suppliers from and against any and all losses, liabilities, expenses, damages and costs, including reasonable attorneys? fees and court costs, arising or resulting from your use of the site and any violation of these Terms of Use. If you cause a technical disruption of the site or the systems transmitting the site to you or others, you agree to be responsible for any and all losses, liabilities, expenses, damages and costs, including reasonable attorneys? fees and court costs, arising or resulting from that disruption. CUSTOM CLOTHIERS reserves the right, at its own expense, to assume exclusive defense and control of any matter otherwise subject to indemnification by you and, in such case, you agree to cooperate with CUSTOM CLOTHIERS in the defense of such matter.</p>\r\n<h3>JURISDICTION AND APPLICABLE LAW</h3>\r\n<p>The laws of the State of Maryland&nbsp;govern these Terms of Use and your use of the site, and you irrevocably consent to the jurisdiction of the courts located in the County of Montgomery&nbsp;for any action arising out of or relating to these Terms of Use. We recognize that it is possible for you to obtain access to this site from any jurisdiction in the world, but we have no practical ability to prevent such access. This site has been designed to comply with the laws of the State of Maryland&nbsp;and of the United States. If any material on this site, or your use of the site, is contrary to the laws of the place where you are when you access it, the site is not intended for you, and we ask you not to use the site. You are responsible for informing yourself of the laws of your jurisdiction and complying with them.</p>\r\n<h3>CHANGES TO THESE TERMS OF USE</h3>\r\n<p>We reserve the right, in our sole discretion, to change these Terms of Use at any time by posting revised terms on the site. It is your responsibility to check periodically for any changes we may make to these Terms of Use. Your continued use of this site following the posting of changes to these Terms of Use or other policies means you accept the changes.</p>\r\n<p>In the event we make material changes to the Terms of Use, notice of these changes will be posted on the homepage of this Web site and the revised Terms of Use will take effect thirty days after their publication on this site.</p>\r\n<p>&nbsp;</p>\r\n<h3>ENTIRE AGREEMENT AND ADMISSIBILITY</h3>\r\n<p>This agreement and any policies or operating rules posted on this site constitute the entire agreement and understanding between you and CUSTOM CLOTHIERS with respect to the subject matter thereof and supersede all prior or contemporaneous communications and proposals, whether oral or written, between the parties with respect to such subject matter. A printed version of these Terms of Use shall be admissible in judicial or administrative proceedings based on or relating to use of the site to the same extent and subject to the same conditions as other business documents and records originally generated and maintained in printed form.</p>\r\n<p>&nbsp;</p>\r\n<h3>SEVERABILITY</h3>\r\n<p>If any provision of this agreement is unlawful, void or unenforceable, the remaining provisions of the agreement will remain in place.</p>', '2015-11-06 12:54:30'),
(5, 'About Us', '<div class=\"col-md-12 col-sm-12 space-left-30\">\r\n<p><span style=\"font-size: 24pt; color: #808080;\"><strong>Who we are</strong></span></p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-size: 14pt;\"><strong>Our mission</strong> is to bring high quality custom fashionable men&rsquo;s wear to the Washington, DC &nbsp;Metro area at a very reasonable price. We are available to leverage our expertise and our partner custom tailor store overseas&nbsp;with over 30 years of experience to the Washington, DC &nbsp;Metro area.</span></p>\r\n<p><span style=\"font-size: 14pt;\">With our custom clothing<strong>&nbsp;</strong>you are guaranteed to find the fabrics, styles, and colors that you absolutely love. Our&nbsp;custom suits and shirts&nbsp;are&nbsp;personally hand-stitch to fit you perfectly. To match this great quality of work, our service is second to none because of our extensive knowledge of the clothes that we&rsquo;re manufacturing. We strive to bring you the best customer service and send you on your way satisfied and excited about your new business wardrobe. We offer custom tailored men&rsquo;s suits and many other delightful products that you&rsquo;ll ultimately fall in love with. Our fantastic products are affordable and we only offer quality materials. &nbsp;We refuse to offer lower end fabrics unlike our competitors. We have a huge selection of available options for you to choose from to make your next outfit a truly special one.</span><br /><br /></p>\r\n<p><span style=\"font-size: 14pt;\">Ordering a custom suit involves getting measured by a tailor, who then creates a pattern specific to your body. He or she uses that pattern to cut the fabric and then sews the suit by hand. Custom tailoring is often referred to as &ldquo;bespoke,&rdquo; an old tailoring term meaning that a certain fabric has been &ldquo;spoken for&rdquo; by a customer and is therefore no longer for sale.</span><br /><br /></p>\r\n<p><span style=\"font-size: 14pt;\">What makes a bespoke suit different from one bought at a department store may be imperceptible at first glance: It&rsquo;s all in the fit and the details. Just about every man looks better in clothing that was made just for him, because custom tailoring takes into consideration the asymmetry of the wearer&rsquo;s body. Most men have one shoulder or hip that&rsquo;s higher than the other, or one arm or leg that&rsquo;s longer, for example. If your weight fluctuates wildly, however, custom-made may be a bad investment.</span><br /><br /></p>\r\n<p><span style=\"font-size: 14pt;\">From the advent of civilization, man has been in situations where he is judged by his clothes first before his merits are assessed. A man needs to look his very best, more so in this competitive and professional world. No limited off-the-shelf set of clothing can offer this range of style, detail and contouring that is gratis with the personal service of&nbsp;Custom Clothiers.</span><br /><br /></p>\r\n<p><span style=\"font-size: 14pt;\">We offer an extensive wardrobe with the latest in styles, textures and colors to do justice to your fine taste and personality. Welcome to the custom tailoring experience of Custom Clothiers. Let your clothes speak for you and let your confidence guide you to achieve success in your every endeavor.</span></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;<img src=\"http://customclothiers.com/assets/editor/Untitled-4_1.jpg\" alt=\"\" width=\"1700\" height=\"700\" /></p>\r\n</div>', NULL),
(6, 'Promo', '<p style=\"text-align: center;\"><span style=\"font-size: 36pt; font-family: arial, helvetica, sans-serif;\">CustomClothiers.com </span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 36pt; font-family: arial, helvetica, sans-serif;\">is currently under construction.&nbsp;</span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">Simply email support@customclothiers.com with your name, email, and phone number</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">for a $50 Gift Certificate</span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">We look forward to making it an easier online experience for you.</span></p>', NULL),
(7, 'Careers', '<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\">We&rsquo;re looking to hire Professional Clothiers in our showrooms and commission-based Stylists. </span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\">We&rsquo;re looking for experience individuals who will put our&nbsp;customer first and can assist them with their custom clothing&nbsp;needs.</span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\">Competitive Compensation. Looking for Professional Clothiers for</span><br /><span style=\"font-size: 14pt;\">Baltimore, MD | Washington, DC | Mclean, VA</span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\">Flexible schedule. High commission compensation. Looking for&nbsp;Stylists<br /><span style=\"font-size: 14pt;\">across the country in the USA.</span><br /></span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\">Please apply by sending your resume to:</span><br /><span style=\"font-size: 14pt;\">careers@customclothiers.com</span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\">Contact our corporate office at</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\">Custom Clothiers</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\">2001 L Street NW</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\">Suite 500</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\">Washington, DC 20036</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 14pt;\">Tel: 202-506-8052</span></p>', '2015-11-06 12:54:11'),
(8, 'Why Us', '<p><span style=\"font-size: 18pt;\">We&rsquo;re Joe, Franky and Kabba, co-founders of Custom Clothiers.<br /><br /></span></p>\r\n<p><span style=\"font-size: 18pt;\">We aren&rsquo;t your mom &amp; pop tailors. We were people just like you looking for something nice and simple: a place to buy a perfectly fitted bespoke custom suit that didn&rsquo;t cost an arm and a leg.<br /><br /></span></p>\r\n<p><span style=\"font-size: 18pt;\">After years of settling for clothing that were always over-priced and unspectacular, we decided to create the brand we always seemed to be looking for ourselves.<br /><br /></span></p>\r\n<p><span style=\"font-size: 18pt;\">Our approach is simple: Quality is the most important thing. Our clothing has to be awesome so we wanted only the finest quality fabrics. And finally, try our best to offer it at the best&nbsp;possible price.<br /><br /></span></p>\r\n<p><span style=\"font-size: 18pt;\">The custom suits and shirts you see today at our store and on our site is the culmination of our dream. Please let us know what you think and we&rsquo;ll do what we can to make it happen.<br /><br /></span></p>\r\n<p><span style=\"font-size: 18pt;\">Thank you for choosing us!</span></p>\r\n<p><span style=\"font-size: 18pt; font-family: symbol;\"><br /><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: 24pt;\">Joe, Franky and Kabba&nbsp;</span></span></p>\r\n<p><span style=\"font-size: 18pt;\">Cofounders, Custom Clothiers</span></p>', '2015-11-06 12:54:11'),
(9, '', '', NULL),
(10, 'Franchise', '', '2015-11-06 12:54:11'),
(11, 'Wedding', '<div class=\"col-md-12 col-sm-12 space-left-30\">\r\n<p style=\"text-align: justify;\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more.</p>\r\n<p style=\"text-align: justify;\">Rrecently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>&nbsp;S</strong>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p style=\"text-align: justify;\">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more.</p>\r\n<p style=\"text-align: justify;\">Rrecently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>&nbsp;S</strong>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p style=\"text-align: justify;\">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more.</p>\r\n<p style=\"text-align: justify;\">Rrecently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<strong>&nbsp;S</strong>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>\r\n<p style=\"text-align: justify;\">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n</div>', NULL),
(12, 'Press', '<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><img src=\"http://customclothiers.com/assets/editor/temp_quote.JPG\" alt=\"\" width=\"824\" height=\"139\" />&nbsp;</p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 24pt; color: #000080; font-family: \'book antiqua\', palatino, serif;\">VOTED BEST TAILOR BY EXPERTISE &amp; AS SEEN IN&nbsp;</span><span style=\"font-size: 24pt; color: #000080; font-family: \'book antiqua\', palatino, serif;\">NBC, FOX, CBS</span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\"><img src=\"/assets/editor/media8.png\" alt=\"\" width=\"272\" height=\"126\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"/assets/editor/media2.png\" alt=\"\" width=\"364\" height=\"99\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"/assets/editor/media4.png\" alt=\"\" width=\"221\" height=\"100\" /></p>\r\n<p style=\"text-align: center;\"><img src=\"/assets/editor/media1.png\" alt=\"\" width=\"225\" height=\"225\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"/assets/editor/media5.png\" alt=\"\" width=\"390\" height=\"129\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src=\"/assets/editor/media7.png\" alt=\"\" width=\"183\" height=\"183\" /></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp; &nbsp; &nbsp;<img src=\"/assets/editor/media3.png\" alt=\"\" width=\"199\" height=\"177\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src=\"/assets/editor/media6.jpg\" alt=\"\" width=\"225\" height=\"225\" />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<img src=\"/assets/editor/GW.JPG\" alt=\"\" width=\"334\" height=\"167\" /></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://www.dccustomclothiers.com/wp-content/uploads/2016/08/expertise.png\" alt=\"\" width=\"280\" height=\"223\" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><span style=\"font-size: 18pt;\">&nbsp;</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 24pt;\">&nbsp;For all PRESS inquiries, please email press@customclothiers.com</span></p>\r\n<p>&nbsp;</p>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_information`
--

CREATE TABLE `payment_information` (
  `pi_id` int(11) NOT NULL,
  `paypal_id` varchar(255) NOT NULL,
  `payment_mode` int(11) NOT NULL,
  `cash_on_delivery` int(11) NOT NULL,
  `in_store_credit` int(11) NOT NULL,
  `shipping_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_information`
--

INSERT INTO `payment_information` (`pi_id`, `paypal_id`, `payment_mode`, `cash_on_delivery`, `in_store_credit`, `shipping_cost`) VALUES
(1, 'support@customclothiers.com', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_master`
--

CREATE TABLE `payment_master` (
  `pm_id` int(11) NOT NULL,
  `orderid` varchar(255) NOT NULL,
  `trans_id` varchar(255) NOT NULL,
  `amount` decimal(11,2) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_master`
--

INSERT INTO `payment_master` (`pm_id`, `orderid`, `trans_id`, `amount`, `payment_type`, `status`, `userid`, `date`, `created_date`) VALUES
(1, 'CC00000001', '', '0.00', 'Cash on Delivery', 'Completed', 2, '0000-00-00', '2016-06-07 09:56:17'),
(2, 'CC00000002', '', '0.00', 'Cash on Delivery', 'Completed', 2, '2016-06-07', '2016-06-07 10:00:45'),
(3, 'CC00000003', '', '55.00', 'Cash on Delivery', 'Completed', 2, '2016-06-07', '2016-06-07 10:08:16'),
(4, '', '', '0.00', '', 'Completed', 0, '0000-00-00', '2016-06-07 10:25:42'),
(5, 'CC00000004', '13540370775756a2044b6a40.92432457', '0.00', 'In-Store Credit', 'Completed', 2, '2016-06-07', '2016-06-07 03:29:24'),
(6, 'CC00000004', '', '0.00', '', 'Completed', 2, '0000-00-00', '2016-06-07 10:29:24'),
(7, 'CC00000005', '307679055756a2ebb065e4.79461468', '75.00', 'In-Store Credit', 'Completed', 2, '2016-06-07', '2016-06-07 03:33:15'),
(8, 'CC00000005', '', '82.50', '', 'Completed', 2, '0000-00-00', '2016-06-07 10:33:15'),
(9, 'CC00000006', '9501846405756a3d0319205.94753052', '0.00', 'In-Store Credit', 'Completed', 2, '2016-06-07', '2016-06-07 03:37:04'),
(10, 'CC00000006', '', '0.00', '', 'Completed', 2, '0000-00-00', '2016-06-07 10:37:04'),
(11, 'CC00000007', '10873100445756a45d4db334.07952553', '597.00', 'In-Store Credit', 'Completed', 3, '2016-06-07', '2016-06-07 03:39:25'),
(12, 'CC00000007', '', '632.82', '', 'Completed', 3, '0000-00-00', '2016-06-07 10:39:25'),
(13, 'CC00000008', '13870129055756a50e87fb55.44387686', '1605.00', 'In-Store Credit', 'Completed', 46, '2016-06-07', '2016-06-07 03:42:22'),
(14, 'CC00000008', '', '1605.00', '', 'Completed', 46, '0000-00-00', '2016-06-07 10:42:22'),
(15, 'CC00000010', '', '0.00', 'Cash on Delivery', 'Completed', 2, '0000-00-00', '2016-06-07 14:19:12'),
(16, 'CC00000013', '', '10.00', 'Cash on Delivery', 'Completed', 9, '2016-06-13', '2016-06-13 06:57:42'),
(17, 'CC00000014', '1410484873576007b74b4e01.74512774', '619.00', 'In-Store Credit', 'Completed', 2, '2016-06-14', '2016-06-14 06:33:43'),
(18, 'CC00000014', '', '679.90', '', 'Completed', 2, '0000-00-00', '2016-06-14 13:33:43'),
(19, 'CC00000015', '', '1235.40', 'Cash on Delivery', 'Completed', 2, '2016-06-14', '2016-06-14 13:35:48'),
(20, 'CC00000016', '', '57.30', 'Cash on Delivery', 'Completed', 2, '0000-00-00', '2016-06-14 13:36:50'),
(21, 'CC00000017', '1146665555576009e7f19f96.36474730', '622.00', 'In-Store Credit', 'Completed', 2, '2016-06-14', '2016-06-14 06:43:03'),
(22, 'CC00000017', '', '596.30', '', 'Completed', 2, '0000-00-00', '2016-06-14 13:43:03'),
(23, 'CC00000018', '', '566.60', 'Cash on Delivery', 'Completed', 2, '2016-06-14', '2016-06-14 13:59:27'),
(24, 'CC00000019', '', '1788.70', 'Cash on Delivery', 'Completed', 2, '2016-06-14', '2016-06-14 14:00:53'),
(25, 'CC00000020', '', '10.00', 'Cash on Delivery', 'Completed', 2, '0000-00-00', '2016-06-15 09:55:43'),
(26, 'CC00000021', '170376821257613f9c0c25e3.12555185', '1250.00', 'In-Store Credit', 'Completed', 2, '2016-06-15', '2016-06-15 04:44:28'),
(27, 'CC00000021', '', '1374.00', '', 'Completed', 2, '0000-00-00', '2016-06-15 11:44:28'),
(28, 'CC00000022', '', '472.00', 'Cash on Delivery', 'Completed', 2, '2016-06-15', '2016-06-15 13:48:36'),
(29, 'CC00000023', '', '602.90', 'Cash on Delivery', 'Completed', 2, '2016-06-15', '2016-06-15 14:15:00'),
(30, 'CC00000024', '62881757157616300bbc6a2.71424832', '561.00', 'In-Store Credit', 'Completed', 2, '2016-06-15', '2016-06-15 07:15:28'),
(31, 'CC00000024', '', '616.10', '', 'Completed', 2, '0000-00-00', '2016-06-15 14:15:28'),
(32, 'CC00000025', '352217406576164b9065d16.20513402', '561.00', 'In-Store Credit', 'Completed', 2, '2016-06-15', '2016-06-15 07:22:49'),
(33, 'CC00000025', '', '616.10', '', 'Completed', 2, '0000-00-00', '2016-06-15 14:22:49'),
(34, 'CC00000026', '14121471157616712c502d3.86126578', '561.00', 'In-Store Credit', 'Completed', 2, '2016-06-15', '2016-06-15 07:32:50'),
(35, 'CC00000026', '', '616.10', '', 'Completed', 2, '0000-00-00', '2016-06-15 14:32:50'),
(36, 'CC00000027', '', '1129.80', 'Cash on Delivery', 'Completed', 2, '2016-06-15', '2016-06-15 15:10:13'),
(37, 'CC00000028', '', '564.40', 'Cash on Delivery', 'Completed', 2, '2016-06-15', '2016-06-15 15:15:04'),
(38, 'CC00000029', '161666943657617279bcd832.19434569', '598.00', 'In-Store Credit', 'Completed', 2, '2016-06-15', '2016-06-15 08:21:29'),
(39, 'CC00000029', '', '546.80', '', 'Completed', 2, '0000-00-00', '2016-06-15 15:21:29'),
(40, 'CC00000030', '133439447657617349cee532.99158043', '624.00', 'In-Store Credit', 'Completed', 2, '2016-06-15', '2016-06-15 08:24:57'),
(41, 'CC00000030', '', '687.16', '', 'Completed', 2, '0000-00-00', '2016-06-15 15:24:57'),
(42, 'CC00000031', '836142524576173d60f2a19.43259086', '549.00', 'In-Store Credit', 'Completed', 2, '2016-06-15', '2016-06-15 08:27:18'),
(43, 'CC00000031', '', '592.90', '', 'Completed', 2, '0000-00-00', '2016-06-15 15:27:18'),
(44, '<br />\n<b>Notice</b>:  Undefined variable: oid in <b>D:xampp1htdocspaypal-recurring-2011-04-21index1.php</b> on line <b>16</b><br />\n', '3JG68168RR1036431', '10.00', 'Paypal', 'Completed', 0, '2016-06-17', '2016-06-17 07:12:08'),
(45, '<br />\n<b>Notice</b>:  Undefined variable: oid in <b>D:xampp1htdocspaypal-recurring-2011-04-21index1.php</b> on line <b>16</b><br />\n', '3JG68168RR1036431', '10.00', 'Paypal', 'Completed', 0, '2016-06-17', '2016-06-17 07:12:26'),
(46, 'CC00000040', '66527254257d57914d9dba3.75689402', '562.00', 'In-Store Credit', 'Completed', 47, '2016-09-11', '2016-09-11 08:32:36'),
(47, 'CC00000040', '', '595.12', '', 'Completed', 47, '0000-00-00', '2016-09-11 15:32:36'),
(48, 'CC00000038', '37322701857f97fbc045e62.11503757', '800.00', 'In-Store Credit', 'Completed', 8, '2016-10-08', '2016-10-08 16:22:36'),
(49, 'CC00000038', '', '847.40', '', 'Completed', 8, '0000-00-00', '2016-10-08 23:22:36'),
(50, 'CC00000032', '7045266415817596de1a636.83690095', '1071.00', 'In-Store Credit', 'Completed', 2, '2016-10-31', '2016-10-31 07:47:09'),
(51, 'CC00000032', '', '1071.00', '', 'Completed', 2, '0000-00-00', '2016-10-31 14:47:09'),
(52, 'CC00000053', '10857140458188b945f69f5.40445005', '1042.00', 'In-Store Credit', 'Completed', 2, '2016-11-01', '2016-11-01 05:33:24'),
(53, 'CC00000053', '', '1053.00', '', 'Completed', 2, '0000-00-00', '2016-11-01 12:33:24'),
(54, 'CC00000054', '199122565158188cd8188031.73058481', '1253.00', 'In-Store Credit', 'Completed', 2, '2016-11-01', '2016-11-01 05:38:48'),
(55, 'CC00000054', '', '1349.80', '', 'Completed', 2, '0000-00-00', '2016-11-01 12:38:48'),
(56, 'CC00000055', '', '1013.20', 'Cash on Delivery', 'Completed', 2, '2016-11-01', '2016-11-01 12:52:30'),
(57, 'CC00000056', '18022530265818932ad7f8f7.30541788', '774.00', 'In-Store Credit', 'Completed', 2, '2016-11-01', '2016-11-01 06:05:46'),
(58, 'CC00000056', '', '822.90', '', 'Completed', 2, '0000-00-00', '2016-11-01 13:05:46'),
(59, 'CC00000057', '', '607.30', 'Cash on Delivery', 'Completed', 2, '2016-11-01', '2016-11-01 13:26:12'),
(60, 'CC00000058', '720841394581a1217741983.69189078', '953.00', 'In-Store Credit', 'Completed', 2, '2016-11-02', '2016-11-02 09:19:35'),
(61, 'CC00000058', '', '1047.30', '', 'Completed', 2, '0000-00-00', '2016-11-02 16:19:35'),
(62, 'CC00000059', '443896012581a1246e7c8d4.22493175', '80.00', 'In-Store Credit', 'Completed', 2, '2016-11-02', '2016-11-02 09:20:22'),
(63, 'CC00000059', '', '87.00', '', 'Completed', 2, '0000-00-00', '2016-11-02 16:20:22'),
(64, 'CC00000060', '316033860581a13a40af147.10021231', '80.00', 'In-Store Credit', 'Completed', 2, '2016-11-02', '2016-11-02 09:26:12'),
(65, 'CC00000060', '', '87.00', '', 'Completed', 2, '0000-00-00', '2016-11-02 16:26:12'),
(66, 'CC00000061', '', '602.90', 'Cash on Delivery', 'Completed', 2, '2016-11-08', '2016-11-08 13:49:43'),
(67, 'CC00000062', '', '685.40', 'Cash on Delivery', 'Completed', 2, '2016-11-21', '2016-11-21 12:12:08'),
(68, 'CC00000063', '', '616.10', 'Cash on Delivery', 'Completed', 2, '2016-11-21', '2016-11-21 13:10:41'),
(69, 'CC00000064', '', '602.90', 'Cash on Delivery', 'Completed', 2, '2016-11-21', '2016-11-21 13:13:27'),
(70, 'CC00000065', '', '92.50', 'Cash on Delivery', 'Completed', 2, '2016-11-21', '2016-11-21 13:15:22'),
(71, 'CC00000066', '', '1289.30', 'Cash on Delivery', 'Completed', 2, '2016-11-21', '2016-11-21 13:18:37'),
(72, 'CC00000067', '12681710965832f548d68c21.36234100', '561.00', 'In-Store Credit', 'Completed', 2, '2016-11-21', '2016-11-21 06:23:20'),
(73, 'CC00000067', '', '616.10', '', 'Completed', 2, '0000-00-00', '2016-11-21 13:23:20'),
(74, 'CC00000068', '1322245555832f5fe5f39e9.79249290', '85.00', 'In-Store Credit', 'Completed', 2, '2016-11-21', '2016-11-21 06:26:22'),
(75, 'CC00000068', '', '92.50', '', 'Completed', 2, '0000-00-00', '2016-11-21 13:26:22'),
(76, 'CC00000069', '', '1209.00', 'Cash on Delivery', 'Completed', 2, '2016-11-21', '2016-11-21 13:34:50'),
(77, 'CC00000070', '', '602.90', 'Cash on Delivery', 'Completed', 2, '2016-11-21', '2016-11-21 13:35:33'),
(78, 'CC00000071', '14391836245832f889a573d4.11222468', '85.00', 'In-Store Credit', 'Completed', 2, '2016-11-21', '2016-11-21 06:37:13'),
(79, 'CC00000071', '', '92.50', '', 'Completed', 2, '0000-00-00', '2016-11-21 13:37:13'),
(80, 'CC00000072', '10919563255832f8d7ec9f32.35659896', '80.00', 'In-Store Credit', 'Completed', 2, '2016-11-21', '2016-11-21 06:38:31'),
(81, 'CC00000072', '', '87.00', '', 'Completed', 2, '0000-00-00', '2016-11-21 13:38:31'),
(82, 'CC00000073', '1860351115832fa4b09daa9.33287978', '160.00', 'In-Store Credit', 'Completed', 2, '2016-11-21', '2016-11-21 06:44:43'),
(83, 'CC00000073', '', '175.00', '', 'Completed', 2, '0000-00-00', '2016-11-21 13:44:43'),
(84, 'CC00000074', '212196179958330025586f21.26033159', '624.00', 'In-Store Credit', 'Completed', 2, '2016-11-21', '2016-11-21 07:09:41'),
(85, 'CC00000074', '', '685.40', '', 'Completed', 2, '0000-00-00', '2016-11-21 14:09:41'),
(86, 'CC00000076', '12025023725841c3a4522c81.96404267', '85.00', 'In-Store Credit', 'Completed', 8, '2016-12-02', '2016-12-02 11:55:32'),
(87, 'CC00000076', '', '89.50', '', 'Completed', 8, '0000-00-00', '2016-12-02 18:55:32'),
(88, 'CC00000081', '723948859589f95f8c899a3.62437602', '85.00', 'In-Store Credit', 'Completed', 8, '2017-02-11', '2017-02-11 15:53:44'),
(89, 'CC00000081', '', '89.50', '', 'Completed', 8, '0000-00-00', '2017-02-11 22:53:44'),
(90, 'CC00000085', '97D73877H02140838', '592.90', 'Paypal', 'Completed', 9, '2017-03-29', '2017-03-29 05:23:26'),
(91, 'CC00000088', '18J14586BD519673N', '267.30', 'Paypal', 'Completed', 9, '2017-04-03', '2017-04-03 08:12:10'),
(92, 'CC00000089', '9J24754652602373Y', '77.00', 'Paypal', 'Completed', 9, '2017-04-03', '2017-04-03 08:17:30'),
(93, 'CC00000090', '89A65404WH130332F', '2.12', 'Paypal', 'Completed', 8, '2017-04-06', '2017-04-06 20:07:19'),
(94, 'CC00000092', '58399851959937570ee3514.73369545', '75.00', 'In-Store Credit', 'Completed', 8, '2017-08-15', '2017-08-15 15:28:00'),
(95, 'CC00000092', '', '79.50', '', 'Completed', 8, '0000-00-00', '2017-08-15 22:28:00'),
(96, 'CC00000092', '72431336159937572d65333.62199099', '75.00', 'In-Store Credit', 'Completed', 8, '2017-08-15', '2017-08-15 15:28:02'),
(97, 'CC00000092', '', '79.50', '', 'Completed', 8, '0000-00-00', '2017-08-15 22:28:02'),
(98, 'CC00000097', '1249767797599596cdbad4e4.91512920', '1157.00', 'In-Store Credit', 'Completed', 8, '2017-08-17', '2017-08-17 06:14:53'),
(99, 'CC00000097', '', '1226.42', '', 'Completed', 8, '0000-00-00', '2017-08-17 13:14:53'),
(100, 'CC00000102', '5278169359aaf0b9afa251.97590651', '75.00', 'In-Store Credit', 'Completed', 8, '2017-09-02', '2017-09-02 10:56:09'),
(101, 'CC00000102', '', '79.50', '', 'Completed', 8, '0000-00-00', '2017-09-02 17:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `p_img_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `p_img` text NOT NULL,
  `alt` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`p_img_id`, `pid`, `p_img`, `alt`, `created_date`, `last_updated`) VALUES
(3, 3, 'uploads/products/14544226700.jpeg', 0, NULL, '0000-00-00 00:00:00'),
(4, 4, 'uploads/products/14544226810.jpeg', 0, NULL, '0000-00-00 00:00:00'),
(5, 5, 'uploads/products/14547885520.jpeg', 0, '2016-02-07 01:25:52', '0000-00-00 00:00:00'),
(8, 7, 'uploads/products/14563939850.jpeg', 0, '2016-02-25 15:23:05', '0000-00-00 00:00:00'),
(9, 8, 'uploads/products/14563941610.jpeg', 0, '2016-02-25 15:26:01', '0000-00-00 00:00:00'),
(10, 8, 'uploads/products/14563941621.jpeg', 0, '2016-02-25 15:26:01', '0000-00-00 00:00:00'),
(11, 8, 'uploads/products/14563941622.jpeg', 0, '2016-02-25 15:26:01', '0000-00-00 00:00:00'),
(12, 9, 'uploads/products/14564055820.jpeg', 0, '2016-02-25 18:36:22', '0000-00-00 00:00:00'),
(13, 10, 'uploads/products/14564057130.jpeg', 0, '2016-02-25 18:38:33', '0000-00-00 00:00:00'),
(14, 10, 'uploads/products/14564057131.jpeg', 0, '2016-02-25 18:38:33', '0000-00-00 00:00:00'),
(15, 12, 'uploads/products/14564806430.jpeg', 0, '2016-02-26 15:27:23', '0000-00-00 00:00:00'),
(16, 8, 'uploads/products/14564808330.jpeg', 0, NULL, '0000-00-00 00:00:00'),
(17, 13, 'uploads/products/14564893650.jpeg', 0, '2016-02-26 17:52:45', '0000-00-00 00:00:00'),
(18, 14, 'uploads/products/14566768460.jpeg', 0, '2016-02-28 21:57:26', '0000-00-00 00:00:00'),
(19, 15, 'uploads/products/14567268560.jpeg', 0, '2016-02-29 11:50:56', '0000-00-00 00:00:00'),
(20, 16, 'uploads/products/14567275410.jpeg', 0, '2016-02-29 12:02:21', '0000-00-00 00:00:00'),
(21, 17, 'uploads/products/14568120040.jpg', 0, '2016-03-01 11:30:04', '0000-00-00 00:00:00'),
(22, 18, 'uploads/products/14568121010.jpg', 0, '2016-03-01 11:31:41', '0000-00-00 00:00:00'),
(23, 19, 'uploads/products/14568318840.jpg', 0, '2016-03-01 17:01:24', '0000-00-00 00:00:00'),
(24, 20, 'uploads/products/14568322570.jpg', 0, '2016-03-01 17:07:37', '0000-00-00 00:00:00'),
(25, 21, 'uploads/products/14575211560.jpg', 0, '2016-03-09 16:29:16', '0000-00-00 00:00:00'),
(26, 23, 'uploads/products/14585544080.jpg', 0, '2016-03-21 15:30:08', '0000-00-00 00:00:00'),
(27, 24, 'uploads/products/14586517540.jpg', 0, '2016-03-22 18:32:34', '0000-00-00 00:00:00'),
(28, 25, 'uploads/products/14586521150.jpg', 0, '2016-03-22 18:38:35', '0000-00-00 00:00:00'),
(29, 26, 'uploads/products/14632273320.jpg', 0, '2016-05-14 17:32:12', '0000-00-00 00:00:00'),
(30, 27, 'uploads/products/14635255170.jpg', 0, '2016-05-18 04:21:57', '0000-00-00 00:00:00'),
(31, 28, 'uploads/products/14635311650.jpg', 0, '2016-05-18 05:56:05', '0000-00-00 00:00:00'),
(32, 29, 'uploads/products/14635316190.jpg', 0, '2016-05-18 06:03:39', '0000-00-00 00:00:00'),
(33, 30, 'uploads/products/14635322280.jpg', 0, '2016-05-18 06:13:48', '0000-00-00 00:00:00'),
(37, 34, 'uploads/products/14640976340.jpg', 0, '2016-05-24 19:17:14', '0000-00-00 00:00:00'),
(38, 35, 'uploads/products/14641133420.jpg', 0, '2016-05-24 23:39:02', '0000-00-00 00:00:00'),
(42, 39, 'uploads/products/14643548410.jpg', 0, '2016-05-27 18:44:01', '0000-00-00 00:00:00'),
(45, 31, 'uploads/products/14655552690.jpg', 0, NULL, '0000-00-00 00:00:00'),
(46, 38, 'uploads/products/14655553090.jpg', 0, NULL, '0000-00-00 00:00:00'),
(47, 36, 'uploads/products/14655553980.jpg', 0, NULL, '0000-00-00 00:00:00'),
(50, 2, 'uploads/products/14655637360.jpg', 0, NULL, '0000-00-00 00:00:00'),
(51, 6, 'uploads/products/14655642620.png', 0, NULL, '0000-00-00 00:00:00'),
(52, 37, 'uploads/products/14655647630.jpg', 0, NULL, '0000-00-00 00:00:00'),
(53, 33, 'uploads/products/14655675300.jpg', 0, NULL, '0000-00-00 00:00:00'),
(54, 32, 'uploads/products/14655675880.jpg', 0, NULL, '0000-00-00 00:00:00'),
(55, 40, 'uploads/products/14655744200.jpg', 0, '2016-06-10 21:30:20', '0000-00-00 00:00:00'),
(56, 40, 'uploads/products/14655745210.jpg', 0, NULL, '0000-00-00 00:00:00'),
(63, 43, 'uploads/products/14769677790.jpg', 0, '2016-10-20 18:19:39', '0000-00-00 00:00:00'),
(66, 41, 'uploads/products/14788297770.png', 0, NULL, '0000-00-00 00:00:00'),
(67, 41, 'uploads/products/14788297791.png', 0, NULL, '0000-00-00 00:00:00'),
(68, 44, 'uploads/products/14788302750.png', 0, '2016-11-11 07:41:15', '0000-00-00 00:00:00'),
(69, 44, 'uploads/products/14788302761.png', 0, '2016-11-11 07:41:15', '0000-00-00 00:00:00'),
(70, 45, 'uploads/products/14788307810.png', 0, '2016-11-11 07:49:41', '0000-00-00 00:00:00'),
(71, 45, 'uploads/products/14788307811.png', 0, '2016-11-11 07:49:41', '0000-00-00 00:00:00'),
(72, 46, 'uploads/products/14788308280.png', 0, '2016-11-11 07:50:28', '0000-00-00 00:00:00'),
(73, 46, 'uploads/products/14788308301.png', 0, '2016-11-11 07:50:28', '0000-00-00 00:00:00'),
(74, 47, 'uploads/products/14788309270.png', 0, '2016-11-11 07:52:07', '0000-00-00 00:00:00'),
(75, 47, 'uploads/products/14788309281.png', 0, '2016-11-11 07:52:07', '0000-00-00 00:00:00'),
(76, 48, 'uploads/products/14788310260.png', 0, '2016-11-11 07:53:46', '0000-00-00 00:00:00'),
(77, 48, 'uploads/products/14788310261.png', 0, '2016-11-11 07:53:46', '0000-00-00 00:00:00'),
(78, 49, 'uploads/products/14788311290.png', 0, '2016-11-11 07:55:29', '0000-00-00 00:00:00'),
(79, 49, 'uploads/products/14788311291.png', 0, '2016-11-11 07:55:29', '0000-00-00 00:00:00'),
(80, 1, 'uploads/products/14788315180.png', 0, NULL, '0000-00-00 00:00:00'),
(81, 1, 'uploads/products/14788315181.png', 0, NULL, '0000-00-00 00:00:00'),
(82, 50, 'uploads/products/14788316070.png', 0, '2016-11-11 08:03:27', '0000-00-00 00:00:00'),
(83, 50, 'uploads/products/14788316071.png', 0, '2016-11-11 08:03:27', '0000-00-00 00:00:00'),
(84, 51, 'uploads/products/14788318330.png', 0, '2016-11-11 08:07:13', '0000-00-00 00:00:00'),
(85, 51, 'uploads/products/14788318331.png', 0, '2016-11-11 08:07:13', '0000-00-00 00:00:00'),
(86, 52, 'uploads/products/14788319540.png', 0, '2016-11-11 08:09:14', '0000-00-00 00:00:00'),
(87, 52, 'uploads/products/14788319551.png', 0, '2016-11-11 08:09:14', '0000-00-00 00:00:00'),
(90, 53, 'uploads/products/14788322150.png', 0, NULL, '0000-00-00 00:00:00'),
(91, 53, 'uploads/products/14788322151.png', 0, NULL, '0000-00-00 00:00:00'),
(92, 54, 'uploads/products/14796183240.jpg', 0, '2016-11-20 10:35:24', '0000-00-00 00:00:00'),
(93, 55, 'uploads/products/14807048010.jpg', 0, '2016-12-03 00:23:21', '0000-00-00 00:00:00'),
(94, 56, 'uploads/products/14807143020.jpg', 0, '2016-12-03 03:01:42', '0000-00-00 00:00:00'),
(95, 57, 'uploads/products/14807143900.jpg', 0, '2016-12-03 03:03:10', '0000-00-00 00:00:00'),
(96, 58, 'uploads/products/14907094550.jpg', 0, '2017-03-28 19:27:35', '0000-00-00 00:00:00'),
(97, 59, 'uploads/products/14908561880.jpg', 0, '2017-03-30 12:13:08', '0000-00-00 00:00:00'),
(98, 60, 'uploads/products/14908703730.jpg', 0, '2017-03-30 16:09:33', '0000-00-00 00:00:00'),
(102, 62, 'uploads/products/14921100430.jpg', 0, NULL, '0000-00-00 00:00:00'),
(103, 61, 'uploads/products/14921104570.jpg', 0, NULL, '0000-00-00 00:00:00'),
(104, 63, 'uploads/products/14986250690.png', 0, '2017-06-28 10:14:29', '0000-00-00 00:00:00'),
(105, 64, 'uploads/products/14986253140.png', 0, '2017-06-28 10:18:34', '0000-00-00 00:00:00'),
(106, 65, 'uploads/products/14986256920.png', 0, '2017-06-28 10:24:52', '0000-00-00 00:00:00'),
(107, 66, 'uploads/products/14986260430.png', 0, '2017-06-28 10:30:43', '0000-00-00 00:00:00'),
(108, 67, 'uploads/products/14986262440.png', 0, '2017-06-28 10:34:04', '0000-00-00 00:00:00'),
(109, 68, 'uploads/products/14986263940.png', 0, '2017-06-28 10:36:34', '0000-00-00 00:00:00'),
(110, 69, 'uploads/products/14986267000.png', 0, '2017-06-28 10:41:40', '0000-00-00 00:00:00'),
(111, 70, 'uploads/products/14986268030.png', 0, '2017-06-28 10:43:23', '0000-00-00 00:00:00'),
(112, 71, 'uploads/products/14986284680.png', 0, '2017-06-28 11:11:08', '0000-00-00 00:00:00'),
(113, 72, 'uploads/products/14986294260.png', 0, '2017-06-28 11:27:06', '0000-00-00 00:00:00'),
(117, 42, 'uploads/products/14986297153.png', 0, NULL, '0000-00-00 00:00:00'),
(118, 73, 'uploads/products/14990539590.png', 0, '2017-07-03 09:22:39', '0000-00-00 00:00:00'),
(130, 75, 'uploads/products/14993215070.jpg', 0, '2017-07-06 11:41:47', '0000-00-00 00:00:00'),
(131, 75, 'uploads/products/14993215071.jpg', 0, '2017-07-06 11:41:47', '0000-00-00 00:00:00'),
(132, 75, 'uploads/products/14993215072.jpg', 0, '2017-07-06 11:41:47', '0000-00-00 00:00:00'),
(133, 75, 'uploads/products/14993215073.jpg', 0, '2017-07-06 11:41:47', '0000-00-00 00:00:00'),
(134, 75, 'uploads/products/14993215074.jpg', 0, '2017-07-06 11:41:47', '0000-00-00 00:00:00'),
(135, 76, 'uploads/products/14994012520.jpg', 0, '2017-07-07 09:50:52', '0000-00-00 00:00:00'),
(136, 76, 'uploads/products/14994012521.jpg', 0, '2017-07-07 09:50:52', '0000-00-00 00:00:00'),
(137, 76, 'uploads/products/14994012522.jpg', 0, '2017-07-07 09:50:52', '0000-00-00 00:00:00'),
(138, 76, 'uploads/products/14994012533.jpg', 0, '2017-07-07 09:50:52', '0000-00-00 00:00:00'),
(139, 77, 'uploads/products/15024240430.jpg', 0, '2017-08-11 09:30:43', '0000-00-00 00:00:00'),
(143, 78, 'uploads/products/15031847550.jpg', 0, NULL, '0000-00-00 00:00:00'),
(144, 78, 'uploads/products/15031847551.jpg', 0, NULL, '0000-00-00 00:00:00'),
(145, 78, 'uploads/products/15031847552.jpg', 0, NULL, '0000-00-00 00:00:00'),
(146, 78, 'uploads/products/15031847553.jpg', 0, NULL, '0000-00-00 00:00:00'),
(147, 78, 'uploads/products/15031847554.jpg', 0, NULL, '0000-00-00 00:00:00'),
(148, 79, 'uploads/products/15031861140.jpg', 0, '2017-08-20 05:11:54', '0000-00-00 00:00:00'),
(149, 79, 'uploads/products/15031861141.jpg', 0, '2017-08-20 05:11:54', '0000-00-00 00:00:00'),
(150, 79, 'uploads/products/15031861142.jpg', 0, '2017-08-20 05:11:54', '0000-00-00 00:00:00'),
(151, 79, 'uploads/products/15031861143.jpg', 0, '2017-08-20 05:11:54', '0000-00-00 00:00:00'),
(152, 79, 'uploads/products/15031861144.jpg', 0, '2017-08-20 05:11:54', '0000-00-00 00:00:00'),
(153, 74, 'uploads/products/15031863430.jpg', 0, NULL, '0000-00-00 00:00:00'),
(154, 74, 'uploads/products/15031863431.jpg', 0, NULL, '0000-00-00 00:00:00'),
(155, 74, 'uploads/products/15031863432.jpg', 0, NULL, '0000-00-00 00:00:00'),
(156, 74, 'uploads/products/15031863433.jpg', 0, NULL, '0000-00-00 00:00:00'),
(157, 74, 'uploads/products/15031863434.jpg', 0, NULL, '0000-00-00 00:00:00'),
(158, 80, 'uploads/products/15031875060.jpg', 0, '2017-08-20 05:35:06', '0000-00-00 00:00:00'),
(159, 80, 'uploads/products/15031875061.jpg', 0, '2017-08-20 05:35:06', '0000-00-00 00:00:00'),
(160, 80, 'uploads/products/15031875062.jpg', 0, '2017-08-20 05:35:06', '0000-00-00 00:00:00'),
(161, 80, 'uploads/products/15031875063.jpg', 0, '2017-08-20 05:35:06', '0000-00-00 00:00:00'),
(167, 81, 'uploads/products/15031878890.jpg', 0, NULL, '0000-00-00 00:00:00'),
(168, 81, 'uploads/products/15031878891.jpg', 0, NULL, '0000-00-00 00:00:00'),
(169, 81, 'uploads/products/15031878892.jpg', 0, NULL, '0000-00-00 00:00:00'),
(170, 81, 'uploads/products/15031878893.jpg', 0, NULL, '0000-00-00 00:00:00'),
(171, 81, 'uploads/products/15031878894.jpg', 0, NULL, '0000-00-00 00:00:00'),
(172, 82, 'uploads/products/15031885230.jpg', 0, '2017-08-20 05:52:03', '0000-00-00 00:00:00'),
(173, 82, 'uploads/products/15031885231.jpg', 0, '2017-08-20 05:52:03', '0000-00-00 00:00:00'),
(174, 82, 'uploads/products/15031885232.jpg', 0, '2017-08-20 05:52:03', '0000-00-00 00:00:00'),
(175, 82, 'uploads/products/15031885233.jpg', 0, '2017-08-20 05:52:03', '0000-00-00 00:00:00'),
(176, 82, 'uploads/products/15031885234.jpg', 0, '2017-08-20 05:52:03', '0000-00-00 00:00:00'),
(177, 83, 'uploads/products/15062216190.jpg', 0, '2017-09-24 08:23:39', '0000-00-00 00:00:00'),
(178, 83, 'uploads/products/15062216191.jpg', 0, '2017-09-24 08:23:39', '0000-00-00 00:00:00'),
(179, 83, 'uploads/products/15062224980.jpg', 0, NULL, '0000-00-00 00:00:00'),
(180, 83, 'uploads/products/15062224981.jpg', 0, NULL, '0000-00-00 00:00:00'),
(181, 83, 'uploads/products/15062224992.jpg', 0, NULL, '0000-00-00 00:00:00'),
(182, 83, 'uploads/products/15062224993.jpg', 0, NULL, '0000-00-00 00:00:00'),
(183, 83, 'uploads/products/15062224994.jpg', 0, NULL, '0000-00-00 00:00:00'),
(184, 84, 'uploads/products/15063718590.jpg', 0, '2017-09-26 02:07:39', '0000-00-00 00:00:00'),
(185, 84, 'uploads/products/15063718591.jpg', 0, '2017-09-26 02:07:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `p_id` int(11) NOT NULL,
  `p_rand` varchar(255) NOT NULL,
  `p_name` text NOT NULL,
  `p_description` text NOT NULL,
  `p_info` text NOT NULL,
  `p_price` decimal(11,2) NOT NULL,
  `waist_price` int(11) NOT NULL,
  `extra_pant` int(11) NOT NULL DEFAULT '0',
  `p_status` int(11) NOT NULL DEFAULT '1',
  `p_default_style` text NOT NULL,
  `featured` int(11) NOT NULL,
  `highlighted` int(11) NOT NULL,
  `highlighted_img` text NOT NULL,
  `catid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL,
  `fabid` text NOT NULL,
  `frontend` int(11) NOT NULL,
  `backend` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`p_id`, `p_rand`, `p_name`, `p_description`, `p_info`, `p_price`, `waist_price`, `extra_pant`, `p_status`, `p_default_style`, `featured`, `highlighted`, `highlighted_img`, `catid`, `subcatid`, `fabid`, `frontend`, `backend`, `created_date`, `last_updated`) VALUES
(1, 'CUS4590', 'Custom Tailored Shirt: Aqua', '<p>Custom Tailored Shirt</p>', '<p>Custom Tailored Shirt</p>', '75.00', 0, 0, 1, '{0:0}', 1, 1, '', 1, 2, '25', 1, 1, '2016-01-28 15:13:24', '2016-11-10 19:31:58'),
(7, 'TES1683', 'Test', '<p>Test</p>', '<p>Testing purpose</p>', '234.00', 0, 0, 1, '{0:0}', 1, 1, '', 1, 0, '', 0, 0, '2016-02-25 15:23:05', '0000-00-00 00:00:00'),
(9, 'TES6345', 'Test', '<p>Test</p>', '<p>Test</p>', '34.00', 0, 0, 1, '{0:0}', 1, 0, '', 1, 0, '4', 0, 1, '2016-02-25 18:36:22', '0000-00-00 00:00:00'),
(11, '6191', '', '', '', '0.00', 0, 0, 1, '{0:0}', 0, 0, '', 0, 0, '', 0, 0, '2016-02-25 19:33:42', '0000-00-00 00:00:00'),
(33, 'CUF4582', 'Cufflinks', '<p>Modern Style Cuff Links</p>', '<p>With actual premium wood and stainless steel</p>', '1.00', 0, 0, 0, '{fit:regular fit,pleats:double pleats,pants_fastening:displaced,side_pockets:rounded,back_pockets:2 back pockets,pant_cuffs:with pant cuffs}', 1, 1, '', 1, 4, '64', 1, 1, '2016-05-24 00:42:01', '2017-10-19 10:46:27'),
(34, 'COR1928', 'Corduroy Blazer', '<p>Corduroy Blazer</p>', '<p>Corduroy Blazer</p>', '70.00', 0, 0, 0, '{0:0}', 0, 1, '', 1, 3, '32,38', 1, 1, '2016-05-24 19:17:14', '2016-05-27 07:01:04'),
(37, 'SAM3405', 'Sample', '<p>adfadfdsf</p>', '<p>adfasdf</p>', '388.00', 0, 0, 1, '{0:0}', 0, 1, '', 1, 3, '41', 1, 1, '2016-05-24 23:48:36', '2016-06-10 06:20:01'),
(41, 'WHI4117', 'Custom Tailored Shirt: Light Blue', '<p>Classic and great for everyday business and causal wear</p>', '<p>100% cotton shirt. Best material possible. Wrinkle resistance.</p>', '75.00', 0, 0, 1, '{0:0}', 1, 1, '', 1, 2, '25', 1, 1, '2016-06-23 18:24:15', '2016-11-10 19:16:07'),
(42, 'WIN8540', 'Window Pane Suit', '<p>Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stiched collars and lapels, workable&nbsp;buttonwholes and lightweight shoulder pads.</p>\r\n<ul class=\"product-details-list\">\r\n<li>Premium collection, our highest quality fabrics.</li>\r\n<li>Super 150s, high quality fabric designed for regular wear.</li>\r\n<li>Dry clean only.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong>Custom Made&nbsp;</strong></p>\r\n<p><strong>Based on your measurement profile.</strong></p>', '<p>Custom Made</p>\r\n<p>Based on your measurement profile.</p>', '539.00', 150, 150, 1, '{0:0}', 1, 1, '', 1, 1, '15', 1, 0, '2016-09-27 23:33:11', '2017-06-27 23:02:58'),
(44, 'CUS1212', 'Custom Tailored Shirt: Blue Watershed', '<p>Premium blue with slight patterns</p>', '<p>100% Cotton shirt</p>', '75.00', 0, 0, 1, '{0:0}', 1, 1, '', 1, 2, '25', 1, 1, '2016-11-11 07:41:15', '2016-11-10 19:15:43'),
(45, 'CUS6910', 'Custom Tailored Shirt1', '<p>Customald;f</p>', '<p>adsfasdasfds</p>', '75.00', 0, 0, 1, '{fit:slim fit,collar_style:kent collar,collar_lining:soft,collar_buttons:1,chestpocket:no pockets,placket:french,bottom:square,pleats:no pleats,sleeves:long}', 0, 1, '', 1, 2, '25', 1, 1, '2016-11-11 07:49:41', '0000-00-00 00:00:00'),
(46, 'CUS3767', 'Custom Tailored Shirt2', '<p>dsfadf</p>', '<p>adfsfdsf</p>', '75.00', 0, 0, 1, '{fit:slim fit,collar_style:cutaway collar,collar_lining:soft,collar_buttons:1,chestpocket:no pockets,placket:french,bottom:tail,pleats:no pleats,sleeves:long}', 0, 1, '', 1, 2, '25', 1, 1, '2016-11-11 07:50:28', '0000-00-00 00:00:00'),
(47, 'CUS6382', 'Custom Tailored Shirt3', '<p>adfdsf</p>', '<p>adfdsf</p>', '75.00', 0, 0, 1, '{fit:slim fit,collar_style:kent collar,collar_lining:soft,collar_buttons:1,chestpocket:no pockets,placket:french,bottom:square,pleats:side folds,sleeves:long}', 0, 1, '', 1, 2, '25', 1, 1, '2016-11-11 07:52:07', '0000-00-00 00:00:00'),
(48, 'CUS2071', 'Custom Tailored Shirt4', '<p>adfdg</p>', '<p>adfgdfasg</p>', '75.00', 0, 0, 1, '{fit:loose,collar_style:rounded collar,collar_lining:soft,collar_buttons:2,chestpocket:2 breast pocket,placket:standard,bottom:square,pleats:side folds,sleeves:short}', 0, 1, '', 1, 2, '25', 1, 1, '2016-11-11 07:53:46', '0000-00-00 00:00:00'),
(49, 'CUS5030', 'Custom Tailored Shirt5', '<p>afagfdg</p>', '<p>afgdfsgf</p>', '75.00', 0, 0, 1, '{fit:loose,collar_style:rounded collar,collar_lining:soft,collar_buttons:2,chestpocket:2 breast pocket,placket:standard,bottom:square,pleats:side folds,sleeves:short}', 0, 1, '', 1, 2, '25', 1, 1, '2016-11-11 07:55:29', '0000-00-00 00:00:00'),
(50, 'CUS2052', 'Custom Tailored Shirt6', '<p>afdsfd</p>', '<p>dfgdfssgfsg</p>', '75.00', 0, 0, 1, '{fit:loose,collar_style:rounded collar,collar_lining:soft,collar_buttons:2,chestpocket:2 breast pocket,placket:standard,bottom:square,pleats:side folds,sleeves:short}', 0, 1, '', 1, 2, '25', 1, 1, '2016-11-11 08:03:27', '0000-00-00 00:00:00'),
(51, 'CUS3108', 'Custom Tailored Shirt7', '<p>fdafgadfssg</p>', '<p>sfdsgdfsgs</p>', '75.00', 0, 0, 1, '{fit:loose,collar_style:rounded collar,collar_lining:soft,collar_buttons:2,chestpocket:2 breast pocket,placket:standard,bottom:square,pleats:side folds,sleeves:short}', 0, 1, '', 1, 2, '25', 1, 1, '2016-11-11 08:07:13', '0000-00-00 00:00:00'),
(52, 'CUS4890', 'Custom Tailored Shirt8', '<p>dsfadfadffg</p>', '<p>asfdsf</p>', '75.00', 0, 0, 1, '{fit:loose,collar_style:rounded collar,collar_lining:soft,collar_buttons:2,chestpocket:2 breast pocket,placket:standard,bottom:square,pleats:side folds,sleeves:short}', 0, 1, '', 1, 2, '25', 1, 1, '2016-11-11 08:09:14', '0000-00-00 00:00:00'),
(53, 'CUS3990', 'Custom Tailored Shirt9', '<p>adfdffg</p>', '<p>assgdfsg</p>', '75.00', 0, 0, 1, '{0:0}', 0, 1, '', 1, 2, '25', 1, 1, '2016-11-11 08:12:12', '2016-11-10 19:44:14'),
(54, 'CUS5717', 'Custom Tailored Suit', '<p>aadfgardgfg</p>', '<p>adsfafdsf</p>', '588.00', 0, 0, 1, '{style:asian,fit:slim fit,jacket_lapels:peak,number_of_buttons:4,breast_pocket:no,hip_pockets:3 pockets,back_style:side vents,sleeve_buttons:4,button_holes:fake}', 0, 0, '', 1, 3, '26', 0, 1, '2016-11-20 10:35:24', '0000-00-00 00:00:00'),
(55, 'CUS6096', 'Custom Tailored Shirts Sample Fixes', '<p>asdfadsf</p>', '<p>adfadsfsd</p>', '75.00', 0, 0, 1, '{fit:loose,collar_style:rounded collar,collar_lining:soft,collar_buttons:2,chestpocket:2 breast pocket,placket:standard,bottom:square,pleats:side folds,sleeves:short}', 0, 0, '', 1, 2, '25', 0, 1, '2016-12-03 00:23:21', '0000-00-00 00:00:00'),
(56, 'PRE1372', 'Premium Custom Tailored Blazers', '<p>Fabric 6930238. Superfine 180\'s Premium Quality.</p>', '<p>Soft and comfortable</p>', '389.00', 0, 0, 1, '{style:single breasted,fit:slim fit,jacket_lapels:peak,number_of_buttons:2,breast_pocket:yes,hip_pockets:2 pockets,back_style:side vents,sleeve_buttons:4,button_holes:real (functional buttons)}', 0, 1, '', 1, 3, '46', 1, 1, '2016-12-03 03:01:42', '0000-00-00 00:00:00'),
(57, 'PRE9688', 'Premium Custom Tailored Pants', '<p>Superfine 180\'s. Excellent Quality and comfort.</p>', '<p>Excellent and top choice.&nbsp;</p>', '150.00', 0, 0, 1, '{fit:slim fit,pleats:no pleats,pants_fastening:displaced,side_pockets:rounded,back_pockets:2 back pockets,pant_cuffs:no pant cuff}', 0, 1, '', 1, 4, '47', 1, 1, '2016-12-03 03:03:10', '0000-00-00 00:00:00'),
(61, 'PRE7595', 'Premium Tailored Shirt: White with Blue Stripes', '<p>very durable&nbsp;</p>', '<p>great for everyday wear&nbsp;</p>', '75.00', 0, 0, 1, '{0:0}', 0, 1, '', 1, 2, '25', 1, 1, '2017-04-14 00:24:24', '2017-04-13 12:07:53'),
(62, 'PRE9168', 'Premium Custom Shirt: Solid White with Purple Stripe', '<p>Solid bright white with a blend of purple stripe</p>', '<p>very durable</p>', '75.00', 0, 0, 1, '{0:0}', 0, 1, '', 1, 2, '48', 1, 1, '2017-04-14 00:29:29', '2017-04-14 11:07:17'),
(74, 'FOR6271', 'Forest Green Custom Suit', '<p class=\"p1\">Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stitched collars and lapels, workable&nbsp;button wholes and lightweight shoulder pads.</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><strong>Custom Made&nbsp;</strong></p>\r\n<p class=\"p1\"><strong>Based on your measurement profile.</strong></p>\r\n<p class=\"p2\">&nbsp;</p>', '<p>Custom Made</p>\r\n<p>Based on your measurement profile</p>', '589.00', 150, 150, 1, '{0:0}', 0, 1, '', 1, 1, '86', 1, 1, '2017-07-06 10:20:44', '2017-08-19 17:05:25'),
(76, 'DAR8455', 'Dark Gray Coat', '<p class=\"p1\">Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stitched collars and lapels, workable&nbsp;button wholes and lightweight shoulder pads.</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><strong>Custom Made&nbsp;</strong></p>\r\n<p class=\"p1\"><strong>Based on your measurement profile.</strong></p>\r\n<p class=\"p2\">&nbsp;</p>', '<p>Custom Made</p>\r\n<p>Based on your measurement profile.&nbsp;</p>', '589.00', 0, 0, 1, '{0:0}', 1, 1, '', 1, 5, '42', 1, 1, '2017-07-07 09:50:52', '2017-09-15 03:31:06'),
(77, 'CUS4864', 'Custom Tailored Shirt: Sky Blue', '<p class=\"p1\">Custom Clothiers shirts are built with top quality fabrics and experienced construction. All our shirts are carefully tailored for greater comfortability&nbsp;and custom shape for your body. All of our shirts are customizable with the following monograms, pockets, white collar &amp; cuffs, french cuffs.</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><strong>Custom Made&nbsp;</strong></p>\r\n<p class=\"p1\"><strong>Based on your measurement profile.</strong></p>\r\n<p class=\"p2\">&nbsp;</p>', '<p>&nbsp;&nbsp;</p>\r\n<p class=\"p1\">Custom Clothiers shirts are built with top quality fabrics and experienced construction. All our shirts are carefully tailored for greater comfortability&nbsp;and custom shape for your body. All of our shirts are customizable with the following monograms, pockets, white collar &amp; cuffs, french cuffs.</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><strong>Custom Made&nbsp;</strong></p>\r\n<p class=\"p1\"><strong>Based on your measurement profile.</strong></p>\r\n<p class=\"p2\">&nbsp;</p>', '75.00', 0, 0, 1, '{fit:slim fit,collar_style:long collar,collar_lining:soft,collar_buttons:2,chestpocket:no pockets,placket:standard,bottom:square,pleats:no pleats,sleeves:long}', 0, 1, '', 1, 2, '25', 1, 1, '2017-08-11 09:30:43', '0000-00-00 00:00:00'),
(78, 'JET8838', 'Jet Black Custom Suit', '<p class=\"p1\">Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stitched collars and lapels, workable&nbsp;button wholes and lightweight shoulder pads.</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><strong>Custom Made&nbsp;</strong></p>\r\n<p class=\"p1\"><strong>Based on your measurement profile.</strong></p>', '<p>Custom Made</p>\r\n<p>Based on your measurement profile</p>', '539.00', 149, 150, 1, '{0:0}', 0, 1, '', 1, 1, '93', 1, 1, '2017-08-20 04:45:21', '2017-08-19 16:19:15'),
(79, 'BUR1008', 'Burgundy Custom Suit', '<p class=\"p1\">Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stitched collars and lapels, workable&nbsp;button wholes and lightweight shoulder pads.</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><strong>Custom Made&nbsp;</strong></p>\r\n<p class=\"p1\"><strong>Based on your measurement profile.</strong></p>', '<p>Custom Made</p>\r\n<p>Based on your measurement profile</p>', '539.00', 149, 150, 1, '{type:2 piece suit,style:double breasted,fit:slim fit,jacket_lapels:peak,number_of_buttons:3,breast_pocket:yes,hip_pockets:2 pockets,back_style:side vents,sleeve_buttons:4,button_holes:real (functional buttons),shirts-buttons:,extra_pants:no,fit:slim fit,pleats:no pleats,pants_fastening:displaced,side_pockets:diagonal,back_pockets:2 back pockets,pant_cuffs:no pant cuff}', 0, 1, '', 1, 1, '96', 1, 1, '2017-08-20 05:11:54', '0000-00-00 00:00:00'),
(80, 'GOL2966', 'Gold Dust Custom Suit', '<p class=\"p1\">Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stitched collars and lapels, workable&nbsp;button wholes and lightweight shoulder pads.</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><strong>Custom Made&nbsp;</strong></p>\r\n<p class=\"p1\"><strong>Based on your measurement profile.</strong></p>', '<p>Custom Made</p>\r\n<p>Based on your measurement profile.</p>', '539.00', 149, 150, 1, '{type:2 piece suit,style:double breasted,fit:slim fit,jacket_lapels:peak,number_of_buttons:3,breast_pocket:yes,hip_pockets:2 pockets,back_style:side vents,sleeve_buttons:4,button_holes:real (functional buttons),shirts-buttons:,extra_pants:no,fit:slim fit,pleats:no pleats,pants_fastening:displaced,side_pockets:diagonal,back_pockets:2 back pockets,pant_cuffs:no pant cuff}', 0, 1, '', 1, 1, '77', 1, 1, '2017-08-20 05:35:06', '0000-00-00 00:00:00'),
(81, 'BLA6094', 'Black Pin Stripe Custom Suit', '<p class=\"p1\">Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stitched collars and lapels, workable&nbsp;button wholes and lightweight shoulder pads.</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><strong>Custom Made&nbsp;</strong></p>\r\n<p class=\"p1\"><strong>Based on your measurement profile.</strong></p>\r\n<p class=\"p1\">Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stitched collars and lapels, workable&nbsp;button wholes and lightweight shoulder pads.</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><strong>Custom Made&nbsp;</strong></p>\r\n<p class=\"p1\"><strong>Based on your measurement profile.</strong></p>', '<p>Custom Made</p>\r\n<p>Based on your measurement profile.</p>', '539.00', 149, 150, 1, '{0:0}', 0, 1, '', 1, 1, '90', 1, 1, '2017-08-20 05:40:05', '2017-08-19 17:11:29'),
(82, 'SPA9123', 'Gray Windowpane Custom Suit', '<section id=\"Content\">\r\n<div class=\"container\">\r\n<article class=\"row shop-product-single\">\r\n<div class=\"col-md-7 space-left-20\">\r\n<div class=\"tabs\">\r\n<div class=\"tab-content\">\r\n<div id=\"description\" class=\"tab-pane fade in active\">\r\n<div class=\"table table-condensed\">\r\n<p class=\"p1\">Custom Clothiers suits are built with top quality fabrics and experienced construction. All our suit jackets are half canvassed, for greater comfortability&nbsp;and tailored&nbsp;shape for your body. Each jacket also features pad stitched collars and lapels, workable&nbsp;button wholes and lightweight shoulder pads.</p>\r\n<ul class=\"ul1\">\r\n<li class=\"li1\">Premium collection, our highest quality fabrics.</li>\r\n<li class=\"li1\">Super 150s -180s, high quality fabric designed for regular wear.</li>\r\n<li class=\"li1\">Dry clean only.</li>\r\n</ul>\r\n<p class=\"p2\">&nbsp;</p>\r\n<p class=\"p1\"><strong>Custom Made&nbsp;</strong></p>\r\n<p class=\"p1\"><strong>Based on your measurement profile.</strong></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</article>\r\n</div>\r\n</section>\r\n<div class=\"custom-footer\">&nbsp;</div>', '<section id=\"Content\">\r\n<div class=\"container\">\r\n<article class=\"row shop-product-single\">\r\n<div class=\"col-md-7 space-left-20\">\r\n<div class=\"tabs\">\r\n<div class=\"tab-content\">\r\n<div id=\"info\" class=\"tab-pane fade active in\">\r\n<div class=\"table table-condensed\">\r\n<p>Custom Made</p>\r\n<p>Based on your measurement profile.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</article>\r\n</div>\r\n</section>\r\n<div class=\"custom-footer\">&nbsp;</div>', '739.00', 149, 150, 1, '{0:0}', 0, 1, '', 1, 1, '87', 1, 1, '2017-08-20 05:52:03', '2017-08-19 17:22:48'),
(83, 'EXE2444', 'Executive Charcoal Gray', '<p>100% wool. Top Tier Fabric.&nbsp;</p>', '<p>Customize to your styling or buy our preselection options</p>', '939.00', 0, 0, 1, '{0:0}', 1, 1, '', 1, 3, '5', 1, 1, '2017-09-24 08:23:39', '2017-09-23 20:08:18'),
(84, 'EXE4851', 'Executive White Shirt', '<p>100% Cotton. Premium Executive White Shirt</p>\r\n<p>&nbsp;</p>\r\n<p>5456432213</p>', '<p>Standard Collar</p>\r\n<p>No Pockets</p>\r\n<p>1 Button Cuff</p>', '75.00', 0, 0, 1, '{fit:slim fit,collar_style:kent collar,collar_lining:soft,collar_buttons:1,chestpocket:no pockets,placket:standard,bottom:square,pleats:no pleats,sleeves:long}', 1, 1, '', 1, 2, '25', 1, 1, '2017-09-26 02:07:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `property_style_details`
--

CREATE TABLE `property_style_details` (
  `psd_id` int(11) NOT NULL,
  `psid` int(11) NOT NULL COMMENT 'property_style table ps_id',
  `subcatid` text NOT NULL,
  `psd_value` text NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_style_details`
--

INSERT INTO `property_style_details` (`psd_id`, `psid`, `subcatid`, `psd_value`, `created_date`, `last_updated`) VALUES
(1, 1, '1', '2 piece suit', '2016-02-12 11:07:07', '2016-05-23 19:14:27'),
(2, 1, '1', '3 piece suit', '2016-02-12 11:07:30', '0000-00-00 00:00:00'),
(3, 2, '1,3', 'Single Breasted', '2016-02-12 11:08:16', '2016-03-09 17:15:04'),
(4, 2, '1,3', 'Double Breasted', '2016-02-12 11:09:16', '0000-00-00 00:00:00'),
(5, 2, '1,3', 'Asian', '2016-02-12 11:09:40', '0000-00-00 00:00:00'),
(6, 3, '1,3', 'Classic Fit', '2016-02-12 11:10:09', '0000-00-00 00:00:00'),
(7, 3, '1,2,3,4', 'Slim Fit', '2016-02-12 11:10:27', '0000-00-00 00:00:00'),
(8, 4, '1,3', 'Notch', '2016-02-12 11:10:48', '0000-00-00 00:00:00'),
(9, 4, '1,3', 'Peak', '2016-02-12 11:11:03', '0000-00-00 00:00:00'),
(10, 5, '1,3', '1', '2016-02-12 11:11:40', '0000-00-00 00:00:00'),
(11, 5, '1,2,3', '2', '2016-02-12 11:11:56', '0000-00-00 00:00:00'),
(12, 5, '1,3', '3', '2016-02-12 11:12:20', '0000-00-00 00:00:00'),
(13, 5, '1,3', '4', '2016-02-12 11:12:41', '0000-00-00 00:00:00'),
(14, 6, '1,3', 'Yes', '2016-02-12 11:13:05', '0000-00-00 00:00:00'),
(15, 6, '1,3', 'No', '2016-02-12 11:13:21', '0000-00-00 00:00:00'),
(16, 7, '1,3', 'No Pockets', '2016-02-12 11:13:54', '0000-00-00 00:00:00'),
(17, 7, '1,3', '2 Pockets', '2016-02-12 11:14:16', '0000-00-00 00:00:00'),
(18, 7, '1,3', '3 Pockets', '2016-02-12 11:14:34', '0000-00-00 00:00:00'),
(19, 8, '1,3', 'Ventless', '2016-02-12 11:15:19', '0000-00-00 00:00:00'),
(20, 8, '1,3', 'Center Vent', '2016-02-12 11:15:36', '0000-00-00 00:00:00'),
(21, 8, '1,3', 'Side Vents', '2016-02-12 11:15:50', '0000-00-00 00:00:00'),
(22, 9, '1,3', 'No Buttons', '2016-02-12 11:16:18', '0000-00-00 00:00:00'),
(23, 9, '1,3', '2', '2016-02-12 11:16:40', '0000-00-00 00:00:00'),
(24, 9, '1,3', '3', '2016-02-12 11:17:01', '0000-00-00 00:00:00'),
(25, 9, '1,3', '4', '2016-02-12 11:17:18', '0000-00-00 00:00:00'),
(26, 10, '1,3', 'Real (Functional Buttons)', '2016-02-12 11:18:06', '0000-00-00 00:00:00'),
(27, 10, '1,3', 'Fake', '2016-02-12 11:18:48', '0000-00-00 00:00:00'),
(28, 22, '2', 'Long', '2016-02-12 11:23:26', '0000-00-00 00:00:00'),
(29, 22, '2', 'Short', '2016-02-12 11:23:55', '0000-00-00 00:00:00'),
(30, 3, '2', 'Normal', '2016-02-12 11:24:18', '0000-00-00 00:00:00'),
(31, 3, '2', 'Loose', '2016-02-12 11:24:31', '0000-00-00 00:00:00'),
(32, 11, '2', 'Kent Collar', '2016-02-12 11:24:59', '0000-00-00 00:00:00'),
(33, 11, '2', 'Cutaway Collar', '2016-02-12 11:25:26', '0000-00-00 00:00:00'),
(34, 11, '2', 'Long Collar', '2016-02-12 11:25:45', '0000-00-00 00:00:00'),
(35, 11, '2', 'Button Down', '2016-02-12 11:29:31', '0000-00-00 00:00:00'),
(36, 11, '2', 'Rounded Collar', '2016-02-12 11:30:01', '0000-00-00 00:00:00'),
(37, 12, '2', 'Soft', '2016-02-12 11:30:16', '0000-00-00 00:00:00'),
(38, 13, '2', '1', '2016-02-12 11:31:15', '0000-00-00 00:00:00'),
(39, 13, '2', '2', '2016-02-12 11:31:28', '0000-00-00 00:00:00'),
(40, 14, '2', 'No Pockets', '2016-02-12 11:31:52', '0000-00-00 00:00:00'),
(41, 14, '2', '1 Breast Pocket', '2016-02-12 11:32:12', '2016-02-12 11:32:25'),
(42, 14, '2', '2 Breast Pocket', '2016-02-12 11:32:45', '0000-00-00 00:00:00'),
(43, 15, '2', 'French', '2016-02-12 11:33:12', '0000-00-00 00:00:00'),
(44, 15, '2', 'Hidden Buttons', '2016-02-12 11:33:28', '0000-00-00 00:00:00'),
(45, 15, '2', 'Standard', '2016-02-12 11:33:43', '0000-00-00 00:00:00'),
(46, 16, '2', 'Tail', '2016-02-12 11:33:59', '0000-00-00 00:00:00'),
(47, 16, '2', 'Square', '2016-02-12 11:34:14', '0000-00-00 00:00:00'),
(48, 17, '2,4', 'No Pleats', '2016-02-12 11:34:39', '0000-00-00 00:00:00'),
(49, 17, '2', 'Box Pleat', '2016-02-12 11:34:54', '0000-00-00 00:00:00'),
(50, 17, '2', 'Side Folds', '2016-02-12 11:35:14', '0000-00-00 00:00:00'),
(51, 17, '4', 'Pleated', '2016-02-12 11:35:32', '0000-00-00 00:00:00'),
(52, 17, '4', 'Double Pleats', '2016-02-12 11:35:47', '0000-00-00 00:00:00'),
(53, 18, '4', 'Centered', '2016-02-12 11:36:10', '0000-00-00 00:00:00'),
(54, 18, '4', 'Displaced', '2016-02-12 11:36:28', '0000-00-00 00:00:00'),
(55, 19, '4', 'Diagonal', '2016-02-12 11:36:46', '0000-00-00 00:00:00'),
(56, 19, '4', 'Vertical', '2016-02-12 11:37:04', '0000-00-00 00:00:00'),
(57, 19, '4', 'Rounded', '2016-02-12 11:37:28', '0000-00-00 00:00:00'),
(58, 20, '4', 'No Pockets', '2016-02-12 11:37:51', '0000-00-00 00:00:00'),
(59, 20, '4', '1 Back Pocket', '2016-02-12 11:38:12', '0000-00-00 00:00:00'),
(60, 20, '4', '2 Back Pockets', '2016-02-12 11:38:28', '0000-00-00 00:00:00'),
(61, 21, '4', 'No Pant Cuff', '2016-02-12 11:38:54', '0000-00-00 00:00:00'),
(62, 21, '4', 'With Pant Cuffs', '2016-02-12 11:39:12', '2016-02-12 11:39:26'),
(63, 3, '4', 'Regular Fit', '2016-02-12 11:55:57', '0000-00-00 00:00:00'),
(65, 25, '2', 'Button style', '2016-02-29 12:17:45', '0000-00-00 00:00:00'),
(66, 26, '1', 'Yes', '2016-05-19 18:21:48', '0000-00-00 00:00:00'),
(67, 26, '1', 'No', '2016-05-19 18:22:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `property_style_master`
--

CREATE TABLE `property_style_master` (
  `ps_id` int(11) NOT NULL,
  `subcatid` text NOT NULL,
  `ps_label` text NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_style_master`
--

INSERT INTO `property_style_master` (`ps_id`, `subcatid`, `ps_label`, `created_date`, `last_updated`) VALUES
(1, '1', 'Type', '2016-02-12 10:56:28', '2016-06-04 21:42:01'),
(2, '1,3', 'Style', '2016-02-12 10:56:57', '0000-00-00 00:00:00'),
(3, '1,2,3,4', 'Fit', '2016-02-12 10:57:20', '0000-00-00 00:00:00'),
(4, '1,3', 'Jacket Lapels', '2016-02-12 10:57:41', '0000-00-00 00:00:00'),
(5, '1,3', 'Number of Buttons', '2016-02-12 10:58:15', '0000-00-00 00:00:00'),
(6, '1,3', 'Breast Pocket', '2016-02-12 10:58:31', '2016-03-09 17:14:39'),
(7, '1,3', 'Hip Pockets', '2016-02-12 10:58:56', '0000-00-00 00:00:00'),
(8, '1,3', 'Back Style', '2016-02-12 11:00:37', '0000-00-00 00:00:00'),
(9, '1,3', 'Sleeve Buttons', '2016-02-12 11:01:09', '0000-00-00 00:00:00'),
(10, '1,3', 'Button Holes', '2016-02-12 11:01:37', '0000-00-00 00:00:00'),
(11, '2', 'Collar Style', '2016-02-12 11:03:14', '0000-00-00 00:00:00'),
(12, '2', 'Collar Lining', '2016-02-12 11:03:35', '0000-00-00 00:00:00'),
(13, '2', 'Collar Buttons', '2016-02-12 11:03:51', '0000-00-00 00:00:00'),
(14, '2', 'Chestpocket', '2016-02-12 11:04:07', '0000-00-00 00:00:00'),
(15, '2', 'Placket', '2016-02-12 11:04:14', '0000-00-00 00:00:00'),
(16, '2', 'Bottom', '2016-02-12 11:04:35', '0000-00-00 00:00:00'),
(17, '2,4', 'Pleats', '2016-02-12 11:04:53', '0000-00-00 00:00:00'),
(18, '4', 'Pants Fastening', '2016-02-12 11:05:48', '0000-00-00 00:00:00'),
(19, '4', 'Side Pockets', '2016-02-12 11:06:02', '0000-00-00 00:00:00'),
(20, '4', 'Back Pockets', '2016-02-12 11:06:16', '0000-00-00 00:00:00'),
(21, '4', 'Pant Cuffs', '2016-02-12 11:06:42', '0000-00-00 00:00:00'),
(22, '2', 'Sleeves', '2016-02-12 11:22:57', '0000-00-00 00:00:00'),
(25, '1', 'Shirts-Buttons', '2016-02-29 12:09:31', '2016-02-29 12:11:13'),
(26, '1', 'Extra Pants', '2016-05-19 18:21:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quote_master`
--

CREATE TABLE `quote_master` (
  `qid` int(11) NOT NULL,
  `q_text` text NOT NULL,
  `q_name` text NOT NULL,
  `q_mail` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote_master`
--

INSERT INTO `quote_master` (`qid`, `q_text`, `q_name`, `q_mail`, `status`, `created_date`, `last_updated`) VALUES
(4, 'All the suits I buy have to be tailored, no matter what. But it\'s not just because of my height; it\'s because I\'ve been skating for so long. My waist is very small, but my legs are just huge.', 'Apolo Ohno', '', 1, '2016-03-23 07:06:50', '2016-04-20 19:08:16'),
(6, 'A man in a well tailored suit will always shine brighter than a guy in an off-the-rack suit.', 'Michael Kors', '', 1, '2016-05-14 06:01:57', '0000-00-00 00:00:00'),
(7, 'Clothing is a form of self-expression. Highlight your personality and exude confidence with your custom bespoke clothing.', 'Joe C. Wong, CEO & Founder of Custom Clothiers', '', 1, '2016-05-14 06:02:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `refund_order_master`
--

CREATE TABLE `refund_order_master` (
  `id` int(10) NOT NULL,
  `order_id` varchar(45) NOT NULL,
  `refund_amount` decimal(11,2) NOT NULL,
  `created_date` varchar(45) NOT NULL,
  `last_updated` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refund_order_master`
--

INSERT INTO `refund_order_master` (`id`, `order_id`, `refund_amount`, `created_date`, `last_updated`) VALUES
(1, 'CC00000032', '12.00', '2016-11-01 15:58:01', '2016-11-01 15:58:01'),
(2, 'CC00000008', '12.00', '2016-11-01 19:01:19', '2016-11-01 19:01:19'),
(3, 'CC00000057', '12.00', '2016-11-01 19:07:04', '2016-11-01 19:07:04'),
(4, 'CC00000056', '862.50', '2016-11-02 04:07:27', '2016-11-02 04:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `r_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `subcatid` int(11) NOT NULL,
  `score` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`r_id`, `pid`, `catid`, `subcatid`, `score`, `name`, `email`, `city`, `state`, `title`, `description`, `status`, `created_date`, `last_updated`) VALUES
(1, 0, 1, 1, '5', 'Linda', '', 'Hyattsville', 'Maryland', 'Perfect Suit', '<p>Really happy that the custom suit and shirt for my fiance came back perfect. They did an exceptional job with helping us choose from the many styling and fabric options. It was a fun experience.</p>', 1, '2016-05-14 12:45:19', '0000-00-00 00:00:00'),
(2, 0, 1, 2, '5', 'Griffin', '', 'DC', 'Washington DC', 'I\'ll be ordering a suit next.', '<p>I\'ll be ordering a suit next. Kabba contacted the community college I work for, offering to present a workshop for our students and give them a discount on purchases. It was risky because I didn\'t know his work or his presentation skills, but he knocked it out of the park. It was one of the most highly rated events of our program for the year, and students left knowing how to present their best while staying true to their style and not breaking the bank. While we were planning the workshop, I ordered a custom shirt so I would be able to vouch for his customer service and products. I can never find a good fit. I\'ve got a gut and I\'m on the short side, so buying shirts with just two measurements isn\'t enough. The shirt came out great! The fabric is beautiful, it fits perfectly, and I just scheduled to get measured for a suit.</p>', 1, '2016-05-17 20:41:41', '0000-00-00 00:00:00'),
(3, 0, 1, 2, '5', 'Matt', '', 'DC', 'Washington DC', 'Came out Great!', '<p>I just got my first custom shirt in from DC3 and it came out great. As someone with relatively large biceps and broad shoulders but an otherwise slim frame, it\'s hard to find shirts that fit well. The fit of this shirt was perfect. Additionally, just in case, Kabba offers a 30 day warranty period if I decide I need any adjustments. Not only that, but when designing the shirt, there were hundreds of different swatches to choose from. An overall very pleasant experience.</p>', 1, '2016-05-17 20:42:15', '0000-00-00 00:00:00'),
(4, 0, 1, 1, '5', 'Andrew', '', 'Washington', 'District of Columbia', 'High-Quality Suit that fits me perfectly', '<p>I tried DC Custom Clothiers because I was intrigued by their special offer. But what really \"hooked\" me was their service. Kabba, the Creative Director, immediately understood what I was looking for and gave me wonderful advice and assistance. I just got my first suit and shirts. They look amazing. Kabba took a lot of time to make sure I was completely satisfied. I now have a great, high-quality suit that fits me perfectly. I am looking forward to getting another one soon!</p>', 1, '2016-05-19 13:47:08', '0000-00-00 00:00:00'),
(5, 0, 1, 1, '5', 'Chris', '', 'DC', 'District of Columbia', 'Thank You Kabba from the DC3 Showroom', 'I have worked with Kabba at a previous company, and I can say he has brought his professionalism and expertise with him to his new one. I was fortunate enough to buy a suit and shirt this time, but unfortunately needed it quickly for a cruise. After taking careful measurements and walking/counseling me through the many options they had, I was able to pick out a handsome gray 3 piece. Even better, Kabba informed me of the suits arrival and worked with me to get an early pick up. Thanks to his ability to measure twice and cut once, my suit and shirt fit like a glove on the first try. I was off to the Caribbean with my new clothes in no time! Looking forward to doing more business with DC3 in the future.', 1, '2016-05-26 18:34:43', '0000-00-00 00:00:00'),
(6, 0, 1, 1, '5', 'Paul M', '', 'Fort Washington', 'Maryland', 'Great Job', '<p>My wife bought a gift certificate for me for a custom suit and dress shirt from Custom Clothiers. &nbsp;I\'m normally an off the rack shopper and have been for many years. &nbsp;That being the case, the experience at DC Custom clothiers as excellent! &nbsp;The space was comfortable and tasteful. &nbsp;Taking measurements and fabric selection took about a 1/2 hour and their clothier&nbsp;offered great insight as to what would look best on me (things an off the rack shopper wouldn\'t know!)<br /><br />The suit was ready in 3 weeks and is great. &nbsp;There is a nice selection of ties and accessories and, again their clothier&nbsp;was a capable guide in selecting a good look for me. &nbsp;I was very satisfied with the service and the product. &nbsp;The prices were reasonable for made to order clothing.<br /><br />Great job custom clothiers!<br /><br />Paul and Vania McBean</p>', 1, '2016-06-15 07:52:11', '0000-00-00 00:00:00'),
(7, 0, 1, 1, '5', 'Morris M', '', 'Alexandria', 'Virginia', 'Good service and Excellent Fit', '<p>Very good service and excellent fit. &nbsp;Will be going back for another suit in the near future.<br /><br />Morris M</p>', 1, '2016-06-15 08:00:54', '0000-00-00 00:00:00'),
(8, 32, 1, 5, '5', 'Auvin', '', 'CHENNAI', 'Louisiana', 'MISC PRODUCTS', '<p>Their ties and acessories are great buys for the price.</p>', 1, '2016-06-15 08:59:52', '0000-00-00 00:00:00'),
(9, 0, 1, 5, '5', 'Gavaskar', '', 'Kansas City', 'Kansas', 'Miscellanoues products', '<p>Was in the DC area. Had the consultation in their showroom and requested that they shipped it to me. Not knowing how it would turn out and being so far away, but after 4 weeks I received my package. I was very happy with how it looks (didn\'t really remember what I choice so there were so many selections) and it fitted great on me.</p>', 1, '2016-06-15 09:08:17', '0000-00-00 00:00:00'),
(10, 0, 1, 2, '5', 'Michael', '', 'Springfield', 'Virginia', 'My goal is to never buy off the rack again!', 'Excellent service and excellent quality.  Finally, bespoke clothing at affordable prices has come to DC!\r\n\r\nPreviously, I had been using online shops that took in all of your measurements and created made-to-order suits and shirts.  While the fit was better than off the rack, it was never quite right.  In minutes, Kabba knew exactly what needed to change in order to get that perfect fit.  I started my journey with a bespoke 3-piece suit and shirt.  After getting some much needed fashion advice from Kabba in designing a suit that would stand out, I placed the order.  In about four weeks, my suit was ready for fitting and pickup.  Not surprisingly, the suit and shirt were a perfect fit!\r\n\r\n My goal is to never buy off the rack again!', 1, '2016-07-14 18:54:48', '0000-00-00 00:00:00'),
(11, 0, 1, 1, '5', 'Joe', '', 'Baltimore', 'Maryland', 'Amazing', 'Just got my suit back after waiting 3 weeks. Fit perfectly and looks amazing. Couldn\'t be happier.', 1, '2016-08-08 20:41:41', '0000-00-00 00:00:00'),
(12, 0, 1, 1, '5', 'Ahmeed', '', 'Arlington', 'Virginia', 'Love Them!', '<p>Never thought for it could fit so nicely. It was 100% perfect when I first tried it on - at least to me. There was two small things that they saw that I would have never noticed. They made the adjustments and it was 100% Perfect AGAIN.</p>', 1, '2016-08-31 23:02:51', '0000-00-00 00:00:00'),
(13, 0, 1, 2, '5', 'Josh', '', 'Reston', 'Virginia', 'Amazing Shirts for the Price', 'Purchased 6 shirts and they fitted so well on me. Quality was excellent. Way better bang for my buck versus other custom shops.', 1, '2016-10-09 15:51:59', '0000-00-00 00:00:00'),
(14, 43, 1, 6, '5', 'gavaskar', '', 'chennai', 'Texas', 'Coat Review', '<p>Good</p>', 1, '2016-10-20 16:01:38', '0000-00-00 00:00:00'),
(15, 0, 1, 1, '5', 'Janet', '', 'Hunt Valley', 'Maryland', 'Fantastic Gift', 'Had my husband stop by their local showroom to be measured so I could design the perfect suit for him. After 3 weeks, we received it and couldn\'t be happier.', 1, '2016-11-03 19:00:46', '0000-00-00 00:00:00'),
(16, 0, 1, 1, '5', 'Jaimeson', '', 'Burke', 'Virginia', 'Truly Amazing!', 'Not a lot of options where I am. For a custom suits, I was quoted $1500+ until I found Custom Clothiers. Received my suit which was 99% perfect and requested for some minor adjustments (just the way I like it) and it came back 100% perfect. Well worth the wait and definitely great service.', 1, '2016-11-22 02:42:23', '0000-00-00 00:00:00'),
(17, 0, 1, 1, '5', 'Josh', '', 'P', 'Maryland', 'Best Bang for your buck!', 'after trying several places and being quotes $1,000+ that I finally found their Baltimore store. Got exactly what I wanted and a few minor adjustments it was perfect at half the prices of others.', 1, '2017-02-11 18:57:13', '0000-00-00 00:00:00'),
(18, 0, 1, 2, '5', 'DJjk', '', 'sdf', 'Colorado', 'Love their Shirts!', 'I\'ve been ordering every few weeks for a few more shirts. They\'re fantastic for work and everyday wear. Been receiving great comments.', 1, '2017-02-20 01:08:29', '0000-00-00 00:00:00'),
(19, 4, 1, 4, '3', 'Xyz', '', 'Chennai', 'Pennsylvania', 'Alert!!', 'alert(\'This is cool\');', 0, '2017-04-05 06:07:19', '0000-00-00 00:00:00'),
(20, 6, 1, 1, '5', 'Xa Lo', '', 'Chennai', 'Alabama', 'Sample test', 'alert(\'Wow this! You can\'t see any reviews here\');', 0, '2017-04-05 06:08:41', '0000-00-00 00:00:00'),
(21, 2, 1, 1, '5', 'lkdsfa', '', 'adfadf', 'Delaware', 'dafdf', 'afdadfd', 0, '2017-10-19 15:47:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `send`
--

CREATE TABLE `send` (
  `send_id` int(11) NOT NULL,
  `start_time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `finish_time` int(11) NOT NULL,
  `newsletter_id` int(11) NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `template_html` text NOT NULL,
  `full_html` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seo_master`
--

CREATE TABLE `seo_master` (
  `sm_id` int(11) NOT NULL,
  `sm_page` text NOT NULL,
  `sm_page_title` text NOT NULL,
  `sm_keyword` text NOT NULL,
  `sm_description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seo_master`
--

INSERT INTO `seo_master` (`sm_id`, `sm_page`, `sm_page_title`, `sm_keyword`, `sm_description`, `created_date`, `last_updated`) VALUES
(1, 'home', 'Custom Clothiers | Best Tailored Custom Suits and Shirts', 'google-site-verification', 'p5ervV-751_wEm6-c2ICakem4sJPGyg7A7rxMuRopwg', '2016-01-18 11:44:11', '2017-10-20 14:14:33'),
(2, 'contact-us', 'Contact Us  -  Custom Clothiers - Custom Clothing For Men', 'Contact', 'Contact', '2016-01-18 06:04:11', '2016-05-12 13:36:11'),
(3, 'faqs', 'FAQs  - Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-19 07:49:26', '2016-05-11 11:34:26'),
(4, 'about-us', 'About Us -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-19 07:50:00', '2016-05-12 13:36:04'),
(5, 'login', 'Login  - Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 07:52:29', '2016-05-11 11:34:07'),
(6, 'Shop', 'Products  - Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:28:49', '2016-05-11 11:33:51'),
(7, 'signup', 'Signup  - Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:29:18', '2016-05-11 11:34:17'),
(8, 'track-my-order', 'Track My Order  - Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:30:26', '2016-05-12 13:34:42'),
(9, 'privacy-policy', 'Privacy Policy  - Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:30:49', '2016-05-12 13:34:50'),
(10, 'terms-and-conditions', 'Terms and Conditions  - Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:31:16', '2016-05-12 13:34:59'),
(11, 'our-story', 'Our Story -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:31:43', '2016-05-12 13:35:08'),
(12, 'press', 'Press -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:33:53', '2016-05-12 13:35:39'),
(13, 'forgot-password', 'Forgot Password - Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:34:09', '2016-05-12 13:35:47'),
(14, 'how-it-works', 'How It Works  -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:34:30', '2016-05-12 13:35:57'),
(15, 'appointments', 'Appointments - Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:35:20', '2016-05-12 13:36:17'),
(16, 'careers', 'Careers -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:36:22', '2016-05-12 13:36:24'),
(17, 'customize', 'Customize - Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:39:53', '2016-05-12 13:36:32'),
(18, 'shopping-cart', 'Cart -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:41:46', '2016-05-12 13:36:41'),
(19, 'checkout', 'Checkout -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:41:58', '2016-05-12 13:36:50'),
(20, 'order-received', 'Order Received -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:43:35', '2016-05-12 13:37:01'),
(21, 'account-information', 'Account Information  - Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:46:26', '2016-05-12 13:37:34'),
(22, 'my-orders', 'My Orders -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:46:39', '2016-05-12 13:37:52'),
(23, 'my-measurements', 'My Measurements  -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:46:57', '2016-05-12 13:38:10'),
(24, 'address-book', 'Address Book -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:47:14', '2016-05-12 13:38:27'),
(25, 'why-us', 'Why Us  -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:31:43', '2017-08-31 02:56:32'),
(26, 'reviews', 'Reviews -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:31:43', '2016-05-12 13:38:38'),
(27, 'promo', 'Promo -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:31:43', '2016-05-12 13:37:11'),
(28, 'gift-card', 'Gift Card -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:31:43', '2016-05-12 13:38:48'),
(29, 'gallery', 'Gallery -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:31:43', '2017-10-20 16:19:20'),
(30, 'wedding', 'Wedding -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:31:43', '2016-05-12 13:39:10'),
(31, 'add-profile', 'Add Profile -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-01-20 23:31:43', '2016-06-15 03:24:14'),
(32, 'view-orders', 'View Order  -  Custom Clothiers - Custom Clothing For Men', '', '', '2016-05-09 11:37:30', '2016-05-12 13:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `key` varchar(255) NOT NULL,
  `val` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`key`, `val`) VALUES
('bounce_email', 'newsletter@otkootoor.com'),
('default_template', 'dark'),
('from_email', 'noreply@otkootoor.com'),
('from_name', 'Newsletter'),
('password', 'admin'),
('username', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `sa_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `sa_firstname` varchar(255) NOT NULL,
  `sa_lastname` varchar(255) NOT NULL,
  `sa_address1` varchar(255) NOT NULL,
  `sa_address2` text NOT NULL,
  `sa_city` varchar(255) NOT NULL,
  `sa_province` varchar(255) NOT NULL,
  `sa_country` varchar(255) NOT NULL,
  `sa_zipcode` varchar(255) NOT NULL,
  `sa_telephone` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`sa_id`, `userid`, `sa_firstname`, `sa_lastname`, `sa_address1`, `sa_address2`, `sa_city`, `sa_province`, `sa_country`, `sa_zipcode`, `sa_telephone`, `created_date`, `last_updated`) VALUES
(1, 2, 'gavaskar', 'ram', 'chennai123', '', 'chennai123', 'Kansas', 'Afghanistan', '600040', '', '2016-05-13 14:14:31', '2016-11-21 12:18:26'),
(2, 3, 'Test', 'Test', 'Test', '', 'Test', 'Alabama', 'United States', '600040', '', NULL, '0000-00-00 00:00:00'),
(3, 8, 'Joe', 'Wong', '11017 Daybreak Ct', '', 'Rockville', 'Maryland', 'United States', '20852', '', '2016-05-18 01:15:12', '0000-00-00 00:00:00'),
(4, 9, 'Ram', 'S', 'Test', '', 'Test', 'Alabama', 'India', '123213', '', NULL, '2016-06-13 06:57:38'),
(5, 19, 'gavaskar', 'ram', 'chennai', '', 'chennai', 'Kentucky', 'Bahrain', '600040', '', NULL, '0000-00-00 00:00:00'),
(6, 36, 'gavaskar', 'ram', 'cehnnai', '', 'chennai', 'Maine', 'Bahrain', '600040', '', NULL, '0000-00-00 00:00:00'),
(7, 39, 'gavaskar', 'dsfsdf', 'dsfsdaf', '', 'sdfsdf', 'Maine', 'Bangladesh', '600040', '', NULL, '0000-00-00 00:00:00'),
(8, 0, 'gavaskar', 'ram', 'chennai', '', 'chennai', 'Alabama', 'Bangladesh', '600050', '', NULL, '0000-00-00 00:00:00'),
(9, 46, 'gavas', 'ram', 'dsfasdf', '', 'sadfasdf', 'Louisiana', 'Bangladesh', '345345', '', NULL, '0000-00-00 00:00:00'),
(10, 47, 'Joe', 'Wong', '11017 Daybreak Ct', '', 'Rockville', 'Maryland', 'United States', '20852', '', NULL, '0000-00-00 00:00:00'),
(11, 2, 'gavaskar1', 'ram1', 'chennai1231', '', 'chennai1231', 'Alaska', 'Aland Islands', '600041', '', NULL, '2016-11-21 13:10:36'),
(12, 2, 'gavaskar11', 'ram11', 'chennai12311', '', 'chennai12311', 'Arizona', 'Albania', '600042', '', NULL, '2016-11-21 13:13:23'),
(13, 2, 'gavaskar11', 'ram11', 'chennai12311', '', 'chennai12311', 'Arizona', 'American Samoa', '600042', '', NULL, '2016-11-21 13:18:00'),
(14, 2, 'gavaskar111', 'ram111', 'chennai123111', '', 'chennai123111', 'New York', 'Anguilla', '600043', '', NULL, '0000-00-00 00:00:00'),
(15, 2, 'gavaskar11', 'ram11', 'chennai12311', '', 'chennai12311', 'Arizona', 'American Samoa', '600042', '', NULL, '2016-11-21 13:28:41'),
(16, 2, 'gavaskar11', 'ram11', 'chennai12311', '', 'chennai12311', 'Arizona', 'American Samoa', '600042', '', NULL, '2016-11-21 13:31:36'),
(17, 2, 'gavaskar11', 'ram11', 'chennai12311', '', 'chennai12311', 'Arizona', 'American Samoa', '600042', '', NULL, '2016-11-21 13:31:42'),
(18, 2, 'gavaskar11', 'ram11', 'chennai12311', '', 'chennai12311', 'Arizona', 'American Samoa', '600042', '', NULL, '2016-11-21 13:32:13'),
(19, 2, 'gavaskar11', 'ram11', 'chennai12311', '', 'chennai12311', 'Arizona', 'Andorra', '600042', '', NULL, '2016-11-21 13:34:47'),
(20, 2, 'gavaskar11', 'ram11', 'chennai12311', '', 'chennai12311', 'Arizona', 'Algeria', '600042', '', NULL, '0000-00-00 00:00:00'),
(21, 50, 'Beth', 'Brennan', '423 Hicks st3H', '', 'Brooklyn', 'New York', 'United States', '11201', '', NULL, '2017-07-20 13:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_master`
--

CREATE TABLE `shipping_master` (
  `sm_id` int(11) NOT NULL,
  `sm_country` int(11) NOT NULL,
  `sm_state` int(11) NOT NULL,
  `sm_zip` int(11) NOT NULL,
  `sm_price` decimal(11,2) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `showroom_master`
--

CREATE TABLE `showroom_master` (
  `sr_id` int(11) NOT NULL,
  `sr_title` text NOT NULL,
  `sr_email` varchar(255) NOT NULL,
  `sr_image` text NOT NULL,
  `sr_address` text NOT NULL,
  `sr_monday` text NOT NULL,
  `sr_tuesday` text NOT NULL,
  `sr_wednesday` text NOT NULL,
  `sr_thursday` text NOT NULL,
  `sr_friday` text NOT NULL,
  `sr_saturday` text NOT NULL,
  `sr_sunday` text NOT NULL,
  `block` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `showroom_master`
--

INSERT INTO `showroom_master` (`sr_id`, `sr_title`, `sr_email`, `sr_image`, `sr_address`, `sr_monday`, `sr_tuesday`, `sr_wednesday`, `sr_thursday`, `sr_friday`, `sr_saturday`, `sr_sunday`, `block`, `created_date`, `last_updated`) VALUES
(1, 'DC Custom Clothiers', 'support@dccustomclothiers.com', 'uploads/showrooms/1_1463673964_1_1460155440_DC Showroom.JPG', '<p>2001 L Street NW</p>\r\n<p>Suite 500</p>\r\n<p>Washington, DC &nbsp;20036</p>', 'Closed', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 4:30 PM', '10:30 AM - 4:00 PM', 1, '2016-02-07 01:47:51', '2017-03-29 02:19:52'),
(11, 'Baltimore Custom Clothiers', 'support@baltimorecustomclothiers.com', 'uploads/showrooms/11_1490794657_BCC (1).JPG', '<p>616 Water Street<br />Suite 332<br />Baltimore, MD 21202</p>', 'Closed', 'Closed', '11:00 AM - 4:00 PM', '11:00 AM - 7:00 PM', '11:00 AM - 4:00 PM', '11:00 AM - 4:00 PM', '11:00 AM - 4:00 PM', 1, '2016-03-01 18:24:41', '2017-03-29 19:17:37'),
(12, 'Chicago Custom Clothiers', 'support@chicagocustomclothiers.com', 'uploads/showrooms/_1490734343_chicago.JPG', '<p>645 N Michigan Ave<br />Suite 1010<br />Chicago, IL 60611<br />Tel:&nbsp;312-775-2650</p>', 'Closed', '', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 5:00 PM', '12:00 AM', 1, '2017-03-29 02:22:23', '0000-00-00 00:00:00'),
(13, 'Philadelphia Custom Clothiers', 'support@philadelphiacustomclothiers.com', 'uploads/showrooms/_1490795218_1601 walnut.jpg', '<p>1601 Walnut Street<br />Suite 502<br />Philadelphia, PA 19102<br />215-995-3086</p>', 'Closed', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 5:00 PM', 'Closed', 0, '2017-03-29 19:16:58', '2017-08-30 18:28:39'),
(14, 'Chicago Showroom', 'support@chicagocustomclothiers.com', 'uploads/showrooms/_1499922036_Chicago.jpg', '<p>645 N Michigan Ave<br />Suite 1010<br />Chicago, IL 60611<br />Tel:&nbsp;312-775-2650</p>', 'Closed', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 AM', '10:30 AM - 5:00 AM', 'Closed', 0, '2017-07-13 10:30:36', '2017-08-30 18:28:18'),
(15, 'DC Custom Clothiers', 'support@dccustomclothoers.com', 'uploads/showrooms/_1499924733_Washington DC.jpg', '<p>2001 L Street NW</p>\r\n<p>Suite 500</p>\r\n<p>Washington, DC &nbsp;20036&nbsp;</p>', 'Closed', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 4:30 PM', '10:30 AM - 4:00 PM', 0, '2017-07-13 11:15:33', '2017-07-13 11:17:33'),
(16, 'Baltimore Showroom', 'support@baltimorecustomclothiers.com', 'uploads/showrooms/_1499925010_Baltimore.jpg', '<p>616 Water Street<br />Suite 332<br />Baltimore, MD 21202</p>', 'Closed', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '10:30 AM - 7:00 PM', '11:00 AM - 7:00 PM', '10:00 AM - 4:00 PM', 'Closed', 0, '2017-07-13 11:20:10', '2017-08-30 18:29:41'),
(17, 'Atlanta Custom Clothiers', 'support@customclothiers.com', 'uploads/showrooms/_1500563651_Atlanta.jpg', '<p>Spring of 2018</p>', 'Closed', '', 'Closed', 'Closed', 'Closed', 'Closed', '', 1, '2017-07-20 20:44:11', '0000-00-00 00:00:00'),
(18, 'New York Custom Clothiers', 'support@customclothiers.com', 'uploads/showrooms/_1500563727_new york.jpg', '<p>Spring of 2018</p>', 'Closed', '', 'Closed', 'Closed', 'Closed', 'Closed', '', 1, '2017-07-20 20:45:27', '0000-00-00 00:00:00'),
(19, 'Houston Custom Clothiers', 'support@customclothiers.com', 'uploads/showrooms/_1500563786_Houston.jpg', '<p>Summer of 2018</p>', 'Closed', '', 'Closed', 'Closed', 'Closed', 'Closed', '', 1, '2017-07-20 20:46:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `s_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `countryid` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`s_id`, `state_name`, `countryid`, `created_date`) VALUES
(1, 'Alabama', 2, '2016-03-14 12:13:37'),
(2, 'Alaska', 2, '2016-03-14 12:13:37'),
(3, 'Arizona', 2, '2016-03-14 12:13:37'),
(4, 'Arkansas', 2, '2016-03-14 12:13:37'),
(5, 'California', 2, '2016-03-14 12:13:37'),
(6, 'Colorado', 2, '2016-03-14 12:13:37'),
(7, 'Connecticut', 2, '2016-03-14 12:13:37'),
(8, 'Delaware', 2, '2016-03-14 12:13:37'),
(9, 'Florida', 2, '2016-03-14 12:13:37'),
(10, 'Georgia', 2, '2016-03-14 12:13:37'),
(11, 'Hawaii', 2, '2016-03-14 12:13:37'),
(12, 'Idaho', 2, '2016-03-14 12:13:37'),
(13, 'Illinois', 2, '2016-03-14 12:13:37'),
(14, 'Iowa', 2, '2016-03-14 12:13:37'),
(15, 'Kansas', 2, '2016-03-14 12:13:37'),
(16, 'Kentucky', 2, '2016-03-14 12:13:37'),
(17, 'Louisiana', 2, '2016-03-14 12:13:37'),
(18, 'Maine', 2, '2016-03-14 12:13:37'),
(19, 'Massachusetts', 2, '2016-03-14 12:13:37'),
(20, 'Michigan', 2, '2016-03-14 12:13:37'),
(21, 'Minnesota', 2, '2016-03-14 12:13:37'),
(22, 'Mississippi', 2, '2016-03-14 12:13:37'),
(23, 'Missouri', 2, '2016-03-14 12:13:37'),
(24, 'Montana', 2, '2016-03-14 12:13:37'),
(25, 'Nebraska', 2, '2016-03-14 12:13:37'),
(26, 'Nevada', 2, '2016-03-14 12:13:37'),
(27, 'New Hampshire', 2, '2016-03-14 12:13:37'),
(28, 'New Jersey', 2, '2016-03-14 12:13:37'),
(29, 'New Mexico', 2, '2016-03-14 12:13:37'),
(30, 'New York', 2, '2016-03-14 12:13:37'),
(31, 'North Carolina', 2, '2016-03-14 12:13:37'),
(32, 'North Dakota', 2, '2016-03-14 12:13:37'),
(33, 'Ohio', 2, '2016-03-14 12:13:37'),
(34, 'Oklahoma', 2, '2016-03-14 12:13:37'),
(35, 'Oregon', 2, '2016-03-14 12:13:37'),
(36, 'Pennsylvania', 2, '2016-03-14 12:13:37'),
(37, 'Rhode Island', 2, '2016-03-14 12:13:37'),
(38, 'South Carolina', 2, '2016-03-14 12:13:37'),
(39, 'South Dakota', 2, '2016-03-14 12:13:37'),
(40, 'Tennessee', 2, '2016-03-14 12:13:37'),
(41, 'Texas', 2, '2016-03-14 12:13:37'),
(42, 'Utah', 2, '2016-03-14 12:13:37'),
(43, 'Vermont', 2, '2016-03-14 12:13:37'),
(44, 'Virginia', 2, '2016-03-14 12:13:37'),
(45, 'District of Columbia', 2, '2016-03-14 12:13:37'),
(46, 'West Virginia', 2, '2016-03-14 12:13:37'),
(47, 'Wisconsin', 2, '2016-03-14 12:13:37'),
(48, 'Wyoming', 2, '2016-03-14 12:13:37'),
(49, 'Maryland', 2, '2016-04-07 00:00:00'),
(50, 'Washington', 2, '2016-04-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_master`
--

CREATE TABLE `sub_category_master` (
  `sub_cat_id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `sub_cat_name` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category_master`
--

INSERT INTO `sub_category_master` (`sub_cat_id`, `catid`, `sub_cat_name`, `created_date`, `last_updated`) VALUES
(1, 1, 'Suits', '2016-02-02 07:16:04', '2016-02-02 07:16:04'),
(2, 1, 'Shirts', '2016-02-02 07:11:59', '2016-02-02 07:11:59'),
(3, 1, 'Blazers', '2016-02-02 07:12:11', '2016-02-02 07:12:11'),
(4, 1, 'Trousers', '2016-02-02 07:12:41', '2016-02-02 07:12:41'),
(5, 1, 'Coat', '2016-02-02 07:13:05', '2016-02-02 07:13:29'),
(6, 1, 'Misc', '2016-10-20 07:12:41', '2016-10-20 07:12:41'),
(7, 1, 'Gift Card', '2016-02-02 07:13:29', '2016-02-02 07:13:29'),
(8, 2, 'Our Story', '2016-02-02 07:15:00', '2016-02-02 07:15:21'),
(9, 2, 'Why Us', '2016-02-02 07:15:21', '2016-02-02 07:15:21'),
(10, 2, 'How It Works', '2016-02-01 05:18:25', '2016-02-01 05:18:25'),
(11, 2, 'Press', '2016-02-01 05:18:25', '2016-02-01 05:18:25'),
(12, 2, 'Gallery', '2016-05-18 04:48:08', '2016-05-18 04:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `sync`
--

CREATE TABLE `sync` (
  `sync_id` int(11) NOT NULL,
  `sync_name` varchar(50) NOT NULL,
  `edit_url` varchar(255) NOT NULL,
  `db_username` varchar(40) NOT NULL,
  `db_password` varchar(40) NOT NULL,
  `db_host` varchar(40) NOT NULL,
  `db_name` varchar(40) NOT NULL,
  `db_table` varchar(40) NOT NULL,
  `db_table_key` varchar(40) NOT NULL,
  `db_table_email_key` varchar(40) NOT NULL,
  `db_table_fname_key` varchar(40) NOT NULL,
  `db_table_lname_key` varchar(40) NOT NULL,
  `last_sync` int(11) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sync_group`
--

CREATE TABLE `sync_group` (
  `sync_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sync_member`
--

CREATE TABLE `sync_member` (
  `sync_id` int(11) NOT NULL,
  `sync_unique_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tax_master`
--

CREATE TABLE `tax_master` (
  `t_id` int(11) NOT NULL,
  `t_state` varchar(255) NOT NULL,
  `t_percent` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax_master`
--

INSERT INTO `tax_master` (`t_id`, `t_state`, `t_percent`, `status`, `created_date`, `last_updated`) VALUES
(1, 'Alabama', '10', 0, '2016-03-10 14:18:58', '0000-00-00 00:00:00'),
(2, 'Connecticut', '0', 0, '2016-03-22 18:14:00', '0000-00-00 00:00:00'),
(3, 'Arizona', '0', 0, '2016-03-26 11:36:46', '0000-00-00 00:00:00'),
(10, 'Maryland', '6', 0, '2016-05-08 02:26:21', '0000-00-00 00:00:00'),
(4, 'Ohio', '0', 0, '2016-03-26 14:46:47', '0000-00-00 00:00:00'),
(5, 'Illinois', '0', 0, '2016-03-26 14:47:24', '0000-00-00 00:00:00'),
(6, 'Hawaii', '0', 0, '2016-03-28 06:10:04', '0000-00-00 00:00:00'),
(7, 'West Virginia', '0', 0, '2016-03-30 00:58:14', '0000-00-00 00:00:00'),
(8, '', '', 0, '2016-03-30 00:58:59', '0000-00-00 00:00:00'),
(9, 'Arkansas', '0', 0, '2016-05-07 12:20:48', '0000-00-00 00:00:00'),
(11, 'District of Columbia', '5.75', 0, '2016-05-08 02:26:31', '0000-00-00 00:00:00'),
(12, 'Maine', '0', 0, '2016-05-10 06:39:23', '0000-00-00 00:00:00'),
(13, 'Alaska', '10', 0, '2016-05-10 06:40:17', '0000-00-00 00:00:00'),
(14, 'Nevada', '7.75', 0, '2016-05-10 06:40:32', '0000-00-00 00:00:00'),
(15, 'Wisconsin', '0', 0, '2016-05-10 06:40:53', '0000-00-00 00:00:00'),
(16, 'Rhode Island', '0', 0, '2016-05-10 06:41:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `track_master`
--

CREATE TABLE `track_master` (
  `t_id` int(11) NOT NULL,
  `t_shirts` int(11) NOT NULL,
  `t_blazers` int(11) NOT NULL,
  `t_suits` int(11) NOT NULL,
  `t_trousers` int(11) NOT NULL,
  `t_date` date NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track_master`
--

INSERT INTO `track_master` (`t_id`, `t_shirts`, `t_blazers`, `t_suits`, `t_trousers`, `t_date`, `created_date`, `last_updated`) VALUES
(1, 1, 0, 8, 0, '2016-05-13', '2016-05-13 14:14:35', '2016-05-13 14:27:23'),
(2, 0, 0, 3, 0, '2016-05-14', '2016-05-14 10:24:03', '2016-05-14 11:15:10'),
(3, 0, 1, 1, 0, '2016-05-18', '2016-05-18 07:29:20', '2016-05-18 07:29:20'),
(4, 0, 0, 1, 0, '2016-05-22', '2016-05-22 07:58:58', '0000-00-00 00:00:00'),
(5, 12, 7, 43, 1, '2016-05-23', '2016-05-23 08:58:46', '2016-05-23 19:21:41'),
(6, 0, 0, 4, 0, '2016-05-25', '2016-05-25 07:07:51', '2016-05-25 07:07:51'),
(7, 2, 0, 0, 0, '2016-05-26', '2016-05-26 08:21:41', '2016-05-26 08:21:41'),
(8, 1, 0, 9, 1, '2016-06-04', '2016-06-04 14:58:16', '2016-06-04 15:02:59'),
(9, 1, 0, 10, 1, '2016-06-06', '2016-06-06 09:33:34', '2016-06-06 14:22:30'),
(10, 0, 0, 3, 7, '2016-06-07', '2016-06-07 06:38:14', '2016-06-07 10:08:16'),
(11, 0, 0, 6, 0, '2016-06-14', '2016-06-14 13:35:49', '2016-06-14 14:00:54'),
(12, 0, 0, 5, 0, '2016-06-15', '2016-06-15 13:48:39', '2016-06-15 15:15:04'),
(13, 1, 1, 2, 1, '2016-11-01', '2016-11-01 12:52:30', '2016-11-01 13:26:12'),
(14, 0, 0, 1, 0, '2016-11-08', '2016-11-08 13:49:43', '0000-00-00 00:00:00'),
(15, 2, 0, 8, 0, '2016-11-21', '2016-11-21 12:12:09', '2016-11-21 13:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'assets/images/user.png',
  `img2` varchar(255) NOT NULL DEFAULT 'assets/images/user.png',
  `img3` varchar(255) NOT NULL DEFAULT 'assets/images/user.png',
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `user_type` int(11) NOT NULL,
  `hash_token` varchar(255) NOT NULL,
  `block` int(11) NOT NULL DEFAULT '1',
  `last_login_time` datetime NOT NULL,
  `current_login_time` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `firstname`, `lastname`, `username`, `mobile`, `email`, `password`, `img`, `img2`, `img3`, `address1`, `address2`, `city`, `province`, `country`, `zipcode`, `user_type`, `hash_token`, `block`, `last_login_time`, `current_login_time`, `created_date`, `last_updated`) VALUES
(1, 'Admin', 'Admin', 'admin', '1234567890', 'joe@customclothiers.com', 'admin', 'assets/images/user.png', 'assets/images/user.png', 'assets/images/user.png', '', '', '', '', '', '', 1, '', 0, '2017-10-20 01:20:25', '2017-11-06 16:38:01', '2016-05-13 17:38:19', '2017-08-16 10:21:43'),
(4, 'test', '', 'vendor', '1234567890', '', 'vendor', 'assets/images/user.png', 'assets/images/user.png', 'assets/images/user.png', 'chennai', '', 'chennai', 'Maryland', 'Bangladesh', '600040', 3, '', 0, '2016-11-07 23:00:07', '2016-11-07 23:16:20', '2016-05-14 18:26:00', '2016-10-31 16:15:26'),
(6, 'xcvxcv', '', 'employee', '1234567890', '', 'password', 'assets/images/user.png', 'assets/images/user.png', 'assets/images/user.png', 'xcvxc', '', 'xcvxcv', 'Maryland', 'Bahrain', '600040', 4, '', 1, '0000-00-00 00:00:00', '2016-05-14 06:09:31', '2016-05-14 18:36:11', '2016-05-14 18:39:15'),
(7, 'employee', '', 'employee', '3434333', '', 'employee', 'assets/images/user.png', 'assets/images/user.png', 'assets/images/user.png', '838 aksk', '', 'kask', 'Alaska', 'United States', '03030', 4, '', 0, '2016-11-02 08:39:58', '2017-04-14 11:11:06', '2016-05-18 06:28:47', '2016-10-31 17:27:05'),
(8, 'Joe', 'W', 'JoeW23174', '3494949', 'fwfan81@gmail.com', 'test', '', '', '', '8484 lasls', '', 'slld', 'Maryland', 'United States', '54564', 2, '19153744296dd30028475f0e02ace7ed', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-05-17 18:07:36', '0000-00-00 00:00:00'),
(30, 'dsfsd', '', 'asasd', '446456', 'asdasd@dgdg.sdfssf', '123456', 'assets/images/user.png', 'assets/images/user.png', 'assets/images/user.png', 'sdfsdf', '', 'sdfsdf', 'Alabama', 'United States', '454464', 3, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-05-23 18:49:07', '2016-05-23 18:49:19'),
(32, 'testing1', '', 'user1', '12345678901', 'gavas@gmail.com', 'employee', 'assets/images/user.png', 'assets/images/user.png', 'assets/images/user.png', 'chennai1', '', 'chennai1', 'Louisiana', 'Bahamas', '6000401', 4, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-05-23 19:11:20', '2016-06-15 16:36:31'),
(33, 'testing1', '', 'kent1', '12321212121', 'gavas111111@gmail.com', 'kent1', 'assets/images/user.png', 'assets/images/user.png', 'assets/images/user.png', 'chennai1', '', 'chennai1', 'Kansas', 'Bahrain', '6000401', 3, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-05-23 19:12:39', '2016-06-15 16:35:07'),
(48, 'Charles', 'Peacock', '', '4105221632', 'charles.a.peacock@gmail.com', '123456', '', '', '', 'PO BOX 6058', '', 'BALTIMORE', 'Maryland', 'United States', '21231', 2, '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2016-09-17 16:51:54', '2016-09-17 16:51:54'),
(49, 'Ahmad George', '', 'admin', '3015373449', 'ahmad@customclothiers.com', 'admin', 'assets/images/user.png', 'assets/images/user.png', 'assets/images/user.png', '15307 Doveheart lane', '', 'Bowie', 'Maryland', 'United States', '20721', 4, '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-06-28 11:38:21', '0000-00-00 00:00:00'),
(50, 'Beth', 'Brennan', 'BetBre91049', '3478868026', 'BethBrennan@taholo.com', 'Beth123', 'assets/images/user.png', 'assets/images/user.png', 'assets/images/user.png', '423 Hicks st3H', '', 'Brooklyn', 'New York', 'United States', '11201', 2, '37c6adaa57daa5a34608303e4050da12', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-07-20 03:10:51', '2017-07-20 13:46:54'),
(51, 'Izaap', 'Technologies', 'IzaTec65040', '1256542123', 'gavaskarizaap@gmail.com', 'gavaskar', 'assets/images/user.png', 'assets/images/user.png', 'assets/images/user.png', '', '', '', '', '', '', 2, '8b7d056b10b6bc95e4b0a3a039395ddc', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017-08-17 07:15:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_banner_master`
--

CREATE TABLE `wedding_banner_master` (
  `w_id` int(11) NOT NULL,
  `w_image` text NOT NULL,
  `block` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding_banner_master`
--

INSERT INTO `wedding_banner_master` (`w_id`, `w_image`, `block`, `created_date`, `last_updated`) VALUES
(7, 'uploads/wedding_banner/1462653089_dad-663202_1920.jpg', 1, '2016-03-02 12:29:41', '2016-05-08 02:01:29'),
(8, 'uploads/wedding_banner/1462653115_in-love-1071325_1920.jpg', 1, '2016-03-02 12:29:52', '2016-05-08 02:01:55'),
(9, 'uploads/wedding_banner/1462658204_resized6.jpg', 1, '2016-03-02 12:30:34', '2016-05-08 03:26:44'),
(10, 'uploads/wedding_banner/1462653141_photo-1445117627052-274425469152.jpg', 1, '2016-03-02 12:31:16', '2016-05-08 02:02:21'),
(11, 'uploads/wedding_banner/1462653154_groom-848059_1920.jpg', 1, '2016-03-02 12:32:08', '2016-05-08 02:02:34'),
(12, 'uploads/wedding_banner/1462653169_wedding-1255520.jpg', 1, '2016-03-02 12:32:32', '2016-05-08 02:02:49'),
(13, 'uploads/wedding_banner/1462653186_bride-458119.jpg', 1, '2016-03-02 12:33:01', '2016-05-08 02:03:06'),
(14, 'uploads/wedding_banner/1462658007_resized4.jpg', 1, '2016-03-02 12:33:18', '2016-05-08 03:23:27'),
(15, 'uploads/wedding_banner/1462658093_resized5.jpg', 1, '2016-03-02 12:33:48', '2016-05-08 03:24:53'),
(16, 'uploads/wedding_banner/1462658330_resized7.jpg', 1, '2016-03-02 12:34:38', '2016-05-08 03:28:50'),
(17, 'uploads/wedding_banner/1462653264_wedding-1255520.jpg', 1, '2016-03-02 12:34:56', '2016-05-08 02:04:24'),
(18, 'uploads/wedding_banner/1462658145_resized3.jpg', 1, '2016-03-02 12:35:15', '2016-05-08 03:25:45'),
(20, 'uploads/wedding_banner/1462653321_groom-848059_1920.jpg', 1, '2016-03-02 12:36:24', '2016-05-08 02:05:21'),
(21, 'uploads/wedding_banner/1462657675_resized.jpg', 1, '2016-03-02 12:36:40', '2016-05-08 03:17:55'),
(22, 'uploads/wedding_banner/1462657597_wedding-458139 resized.jpg', 1, '2016-03-02 12:36:55', '2016-05-08 03:16:37'),
(23, 'uploads/wedding_banner/1500493791_Webp.net-resizeimage.jpg', 1, '2017-06-26 09:46:38', '2017-07-20 01:19:51');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_master`
--

CREATE TABLE `wedding_master` (
  `w_id` int(11) NOT NULL,
  `w_title` text NOT NULL,
  `w_image` text NOT NULL,
  `w_desc` text NOT NULL,
  `block` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wedding_master`
--

INSERT INTO `wedding_master` (`w_id`, `w_title`, `w_image`, `w_desc`, `block`, `created_date`, `last_updated`) VALUES
(1, 'CHOOSE YOUR SHOWROOM', 'uploads/wedding/1502172387_wedding7.jpg', '<div class=\"content\"><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">Free consultation with a professional stylist. The stylist will share insights on the latest trends and help custom design the attire to&nbsp;your wedding theme.</span></div>', 0, '2016-03-10 13:57:33', '2017-10-19 00:27:05'),
(2, 'LEAVE THE PLANNING TO US', 'uploads/wedding/1498452310_Untitled design (55).png', '<p><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif; color: #000000;\">Custom Clothiers can help you design the perfect wedding suit or tuxedo. Orders are trackable online so you and your groomsmen\'s can make sure that everyone looks their best on your big day.</span></p>', 0, '2016-03-30 06:03:06', '2017-10-19 00:25:41'),
(7, 'CUSTOM CLOTHIERS COLLECTION', 'uploads/wedding/1501563019_Wedding 5.jpg', '<p style=\"text-align: center;\"><span style=\"font-size: 12pt; color: #000000; font-family: arial, helvetica, sans-serif;\">Purchase&nbsp;a fashionable custom&nbsp;fitted suit or tuexedo to highlight you on your special wedding day.</span></p>', 0, '2017-06-26 10:20:30', '2017-10-19 00:23:47'),
(8, 'CUSTOM CLOTHIERS ON WEDDINGWIRE', 'uploads/wedding/1498453065_Untitled design (56).png', '<p style=\"text-align: center;\"><span style=\"font-size: 12pt; color: #000000; font-family: arial, helvetica, sans-serif;\">Custom Clothiers was featured on WeddingWire as one of the Top Tuxedo\'s, Men\'s Formal Wear &amp; Attire&nbsp;in the Washington, DC metro area.&nbsp;Local couples want local vendors. Custom Clothiers is glad to be part of your special day.<br /><br /></span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 12pt; color: #000000; font-family: arial, helvetica, sans-serif;\">Thank you for choosing us!</span></p>', 0, '2017-06-26 10:27:45', '2017-10-19 00:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `whyus_master`
--

CREATE TABLE `whyus_master` (
  `w_id` int(11) NOT NULL,
  `w_title` text NOT NULL,
  `w_image` text NOT NULL,
  `w_desc` text NOT NULL,
  `block` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `whyus_master`
--

INSERT INTO `whyus_master` (`w_id`, `w_title`, `w_image`, `w_desc`, `block`, `created_date`, `last_updated`) VALUES
(1, 'The Custom Clothiers Experience', 'uploads/whyus/1508351632_man-2140606__340.jpg', '<article id=\"post-46\" class=\"post-46 post type-post status-publish format-standard hentry category-uncategorized\">\r\n<div class=\"entry-content\">\r\n<p style=\"text-align: center;\"><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">Complementary appointment with our Professional Stylist&nbsp;in Baltimore, MD | Chicago, IL | Philadelphia, PA | Washington, DC</span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">Your stylist will complete your 26-point fit measurement profile, fitting notes and preferences, and 3 profile photos that will be utilized by our Master Tailors to create your custom clothes.</span></p>\r\n</div>\r\n</article>\r\n<article id=\"post-40\" class=\"post-40 post type-post status-publish format-standard hentry category-annoucements\">\r\n<div class=\"entry-content\">\r\n<p style=\"text-align: center;\"><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">Your stylist will provide you with insights on the latest styling trends.</span></p>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n</div>\r\n</article>', 0, '2017-09-13 20:00:27', '2017-10-19 00:03:52'),
(2, 'Our Custom Suits', 'uploads/whyus/1508351495_suit photostock.JPG', '<p><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">All&nbsp;Custom Clothiers suits are tailored using a half-canvas construction. This method improves the drape &amp; durability of the suit.&nbsp;Our&nbsp;suits are tailored from the finest clothes produced in&nbsp;Italy, England, and Asia.<br /><br /><br /></span></p>', 0, '2017-09-15 01:27:18', '2017-10-19 00:28:23'),
(3, 'Our Custom Shirts', 'uploads/whyus/1508352486_14788316070.png', '<p><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">All&nbsp;Custom Clothiers shirts are tailored using a premium cotton material. We offer many different weaves Broadcloth, Twill, Pinpoint Oxford, Royal Oxford, Oxford, Chambray, Dobby, End-on-End, Melange, Poplin, and Herringbone.&nbsp;Design to fit perfectly.&nbsp;</span></p>', 0, '2017-10-18 22:45:51', '2017-10-19 00:18:06'),
(4, 'Hassle Free Ordering', 'uploads/whyus/1508347221_free shipping.jpg', '<p><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">Free shipping and returns at our local showroom</span></p>', 1, '2017-10-18 22:50:21', '2017-10-18 22:50:53'),
(5, 'Perfect Fit Guarantee', 'uploads/whyus/1508348269_measuring-tape-953422__340.jpg', '<p><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif;\">Our Perfect Fit Guarantee ensures that we will make any adjustments or remake any custom-made suits and shirts to ensure that it fits you perfectly.</span></p>', 0, '2017-10-18 22:58:09', '2017-10-18 23:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_master`
--

CREATE TABLE `wishlist_master` (
  `w_id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `p_style` text NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `works_master`
--

CREATE TABLE `works_master` (
  `w_id` int(11) NOT NULL,
  `w_title` text NOT NULL,
  `w_image` text NOT NULL,
  `w_desc` text NOT NULL,
  `block` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `works_master`
--

INSERT INTO `works_master` (`w_id`, `w_title`, `w_image`, `w_desc`, `block`, `created_date`, `last_updated`) VALUES
(1, 'ACCOUNT SETUP', 'uploads/works/1508350168_man-2140606__340.jpg', '<p class=\"italic\"><span style=\"font-size: 12pt;\"><span style=\"font-family: arial, helvetica, sans-serif;\">Visit our showroom&nbsp;so our stylist can complete your 26-point fit measurement profile, fitting notes and preferences, and 3 profile photos</span>&nbsp;</span></p>', 0, '0000-00-00 00:00:00', '2017-10-19 00:00:41'),
(2, 'ONLINE ORDERING', 'uploads/works/1508350215_images1.png', '<p class=\"italic\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Simply login and select the clothing, fabric, and accent selection.&nbsp;</span></p>', 0, '2015-12-24 16:56:12', '2017-10-18 23:40:15'),
(4, 'CUSTOM MADE', 'uploads/works/1508350495_suit photostock.JPG', '<p class=\"italic\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Your suit will be delivered right to your door in 3 to 5 weeks at no extra charge.</span></p>', 0, '2015-12-24 16:56:56', '2017-10-19 00:00:23'),
(5, 'PERFECT FIT GUARANTEE', 'uploads/works/1508350111_images.jpg', '<p class=\"italic\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\">Need to make some adjustments for a perfect fit? Stop in one of our showroom. If not, we have you covered&nbsp;up to $25 per shirt and $75 per suit reimbursement. Free remakes if necessary.</span></p>', 0, '2015-12-24 16:57:14', '2017-10-18 23:38:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_master`
--
ALTER TABLE `appointment_master`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `banner_master`
--
ALTER TABLE `banner_master`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`campaign_id`);

--
-- Indexes for table `campaign_member`
--
ALTER TABLE `campaign_member`
  ADD PRIMARY KEY (`campaign_id`,`member_id`);

--
-- Indexes for table `campaign_newsletter`
--
ALTER TABLE `campaign_newsletter`
  ADD PRIMARY KEY (`campaign_id`,`newsletter_id`);

--
-- Indexes for table `carousel_master`
--
ALTER TABLE `carousel_master`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `cart_master`
--
ALTER TABLE `cart_master`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_master`
--
ALTER TABLE `contact_master`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `coupon_applied`
--
ALTER TABLE `coupon_applied`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `custom_color_master`
--
ALTER TABLE `custom_color_master`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabric_master`
--
ALTER TABLE `fabric_master`
  ADD PRIMARY KEY (`fab_id`);

--
-- Indexes for table `fabric_pricing`
--
ALTER TABLE `fabric_pricing`
  ADD PRIMARY KEY (`fab_p_id`);

--
-- Indexes for table `faqs_master`
--
ALTER TABLE `faqs_master`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `gallery_master`
--
ALTER TABLE `gallery_master`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `gift_card_applied`
--
ALTER TABLE `gift_card_applied`
  ADD PRIMARY KEY (`gca_id`);

--
-- Indexes for table `gift_card_master`
--
ALTER TABLE `gift_card_master`
  ADD PRIMARY KEY (`gc_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `link_open`
--
ALTER TABLE `link_open`
  ADD PRIMARY KEY (`link_open_id`);

--
-- Indexes for table `measurement_profile_fields`
--
ALTER TABLE `measurement_profile_fields`
  ADD PRIMARY KEY (`mpf_id`);

--
-- Indexes for table `measurement_profile_master`
--
ALTER TABLE `measurement_profile_master`
  ADD PRIMARY KEY (`mp_id`);

--
-- Indexes for table `measurement_profile_value`
--
ALTER TABLE `measurement_profile_value`
  ADD PRIMARY KEY (`mpv_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `member_field`
--
ALTER TABLE `member_field`
  ADD PRIMARY KEY (`member_field_id`);

--
-- Indexes for table `member_field_value`
--
ALTER TABLE `member_field_value`
  ADD PRIMARY KEY (`member_id`,`member_field_id`);

--
-- Indexes for table `member_group`
--
ALTER TABLE `member_group`
  ADD PRIMARY KEY (`member_id`,`group_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`newsletter_id`);

--
-- Indexes for table `newsletter_member`
--
ALTER TABLE `newsletter_member`
  ADD PRIMARY KEY (`send_id`,`member_id`),
  ADD KEY `open_time` (`open_time`);

--
-- Indexes for table `order_history_master`
--
ALTER TABLE `order_history_master`
  ADD PRIMARY KEY (`oh_id`);

--
-- Indexes for table `order_id_generate`
--
ALTER TABLE `order_id_generate`
  ADD PRIMARY KEY (`oig_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`om_id`);

--
-- Indexes for table `order_received_master`
--
ALTER TABLE `order_received_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_content`
--
ALTER TABLE `page_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_information`
--
ALTER TABLE `payment_information`
  ADD PRIMARY KEY (`pi_id`);

--
-- Indexes for table `payment_master`
--
ALTER TABLE `payment_master`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`p_img_id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `property_style_details`
--
ALTER TABLE `property_style_details`
  ADD PRIMARY KEY (`psd_id`);

--
-- Indexes for table `property_style_master`
--
ALTER TABLE `property_style_master`
  ADD PRIMARY KEY (`ps_id`);

--
-- Indexes for table `quote_master`
--
ALTER TABLE `quote_master`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `refund_order_master`
--
ALTER TABLE `refund_order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `send`
--
ALTER TABLE `send`
  ADD PRIMARY KEY (`send_id`),
  ADD KEY `newsletter_id` (`newsletter_id`);

--
-- Indexes for table `seo_master`
--
ALTER TABLE `seo_master`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`sa_id`);

--
-- Indexes for table `shipping_master`
--
ALTER TABLE `shipping_master`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `showroom_master`
--
ALTER TABLE `showroom_master`
  ADD PRIMARY KEY (`sr_id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sub_category_master`
--
ALTER TABLE `sub_category_master`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `sync`
--
ALTER TABLE `sync`
  ADD PRIMARY KEY (`sync_id`);

--
-- Indexes for table `sync_group`
--
ALTER TABLE `sync_group`
  ADD PRIMARY KEY (`sync_id`,`group_id`);

--
-- Indexes for table `sync_member`
--
ALTER TABLE `sync_member`
  ADD PRIMARY KEY (`sync_id`,`sync_unique_id`,`member_id`),
  ADD KEY `sync_id` (`sync_id`),
  ADD KEY `sync_unique_id` (`sync_unique_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `tax_master`
--
ALTER TABLE `tax_master`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `track_master`
--
ALTER TABLE `track_master`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wedding_banner_master`
--
ALTER TABLE `wedding_banner_master`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `wedding_master`
--
ALTER TABLE `wedding_master`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `whyus_master`
--
ALTER TABLE `whyus_master`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `wishlist_master`
--
ALTER TABLE `wishlist_master`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `works_master`
--
ALTER TABLE `works_master`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_master`
--
ALTER TABLE `appointment_master`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `banner_master`
--
ALTER TABLE `banner_master`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `carousel_master`
--
ALTER TABLE `carousel_master`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `cart_master`
--
ALTER TABLE `cart_master`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact_master`
--
ALTER TABLE `contact_master`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT for table `coupon_applied`
--
ALTER TABLE `coupon_applied`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `custom_color_master`
--
ALTER TABLE `custom_color_master`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `fabric_master`
--
ALTER TABLE `fabric_master`
  MODIFY `fab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `fabric_pricing`
--
ALTER TABLE `fabric_pricing`
  MODIFY `fab_p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faqs_master`
--
ALTER TABLE `faqs_master`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gallery_master`
--
ALTER TABLE `gallery_master`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gift_card_applied`
--
ALTER TABLE `gift_card_applied`
  MODIFY `gca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `gift_card_master`
--
ALTER TABLE `gift_card_master`
  MODIFY `gc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `link_open`
--
ALTER TABLE `link_open`
  MODIFY `link_open_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `measurement_profile_fields`
--
ALTER TABLE `measurement_profile_fields`
  MODIFY `mpf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `measurement_profile_master`
--
ALTER TABLE `measurement_profile_master`
  MODIFY `mp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `measurement_profile_value`
--
ALTER TABLE `measurement_profile_value`
  MODIFY `mpv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `member_field`
--
ALTER TABLE `member_field`
  MODIFY `member_field_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order_history_master`
--
ALTER TABLE `order_history_master`
  MODIFY `oh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `order_id_generate`
--
ALTER TABLE `order_id_generate`
  MODIFY `oig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `om_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=291;
--
-- AUTO_INCREMENT for table `order_received_master`
--
ALTER TABLE `order_received_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `page_content`
--
ALTER TABLE `page_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payment_information`
--
ALTER TABLE `payment_information`
  MODIFY `pi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `payment_master`
--
ALTER TABLE `payment_master`
  MODIFY `pm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `p_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `property_style_details`
--
ALTER TABLE `property_style_details`
  MODIFY `psd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `property_style_master`
--
ALTER TABLE `property_style_master`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `quote_master`
--
ALTER TABLE `quote_master`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `refund_order_master`
--
ALTER TABLE `refund_order_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `send`
--
ALTER TABLE `send`
  MODIFY `send_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `seo_master`
--
ALTER TABLE `seo_master`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `sa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `shipping_master`
--
ALTER TABLE `shipping_master`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `showroom_master`
--
ALTER TABLE `showroom_master`
  MODIFY `sr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `sub_category_master`
--
ALTER TABLE `sub_category_master`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sync`
--
ALTER TABLE `sync`
  MODIFY `sync_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tax_master`
--
ALTER TABLE `tax_master`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `track_master`
--
ALTER TABLE `track_master`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `wedding_banner_master`
--
ALTER TABLE `wedding_banner_master`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `wedding_master`
--
ALTER TABLE `wedding_master`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `whyus_master`
--
ALTER TABLE `whyus_master`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `wishlist_master`
--
ALTER TABLE `wishlist_master`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `works_master`
--
ALTER TABLE `works_master`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
