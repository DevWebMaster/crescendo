-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 12:36 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crescendo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_activity_log`
--

CREATE TABLE `ci_activity_log` (
  `id` int(11) NOT NULL,
  `activity_id` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_activity_log`
--

INSERT INTO `ci_activity_log` (`id`, `activity_id`, `user_id`, `admin_id`, `created_at`) VALUES
(1, 1, 0, 25, '2019-11-27 06:00:00'),
(2, 2, 0, 26, '2019-11-27 06:00:00'),
(3, 1, 0, 31, '2019-11-25 09:33:27'),
(4, 5, 0, 31, '2019-11-25 09:40:35'),
(5, 7, 0, 31, '2019-11-26 09:19:45'),
(6, 7, 0, 31, '2019-11-26 09:41:48'),
(7, 7, 0, 31, '2019-11-26 09:42:50'),
(8, 7, 0, 31, '2019-11-26 09:43:42'),
(9, 2, 0, 1, '2020-07-26 06:28:50');

-- --------------------------------------------------------

--
-- Table structure for table `ci_countries`
--

CREATE TABLE `ci_countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `phonecode` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_countries`
--

INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES
(1, 'US', 'United States', 'united-states', 1, 1),
(2, 'CA', 'Canada', 'canada', 1, 1),
(3, 'DZ', 'Algeria', 'algeria', 213, 1),
(4, 'AS', 'American Samoa', 'american-samoa', 1684, 1),
(5, 'AD', 'Andorra', 'andorra', 376, 1),
(6, 'AO', 'Angola', 'angola', 244, 1),
(7, 'AI', 'Anguilla', 'anguilla', 1264, 1),
(8, 'AQ', 'Antarctica', 'antarctica', 0, 1),
(9, 'AG', 'Antigua And Barbuda', 'antigua-and-barbuda', 1268, 1),
(10, 'AR', 'Argentina', 'argentina', 54, 1),
(11, 'AM', 'Armenia', 'armenia', 374, 1),
(12, 'AW', 'Aruba', 'aruba', 297, 1),
(13, 'AU', 'Australia', 'australia', 61, 1),
(14, 'AT', 'Austria', 'austria', 43, 1),
(15, 'AZ', 'Azerbaijan', 'azerbaijan', 994, 1),
(16, 'BS', 'Bahamas The', 'bahamas-the', 1242, 1),
(17, 'BH', 'Bahrain', 'bahrain', 973, 1),
(18, 'BD', 'Bangladesh', 'bangladesh', 880, 1),
(19, 'BB', 'Barbados', 'barbados', 1246, 1),
(20, 'BY', 'Belarus', 'belarus', 375, 1),
(21, 'BE', 'Belgium', 'belgium', 32, 1),
(22, 'BZ', 'Belize', 'belize', 501, 1),
(23, 'BJ', 'Benin', 'benin', 229, 1),
(24, 'BM', 'Bermuda', 'bermuda', 1441, 1),
(25, 'BT', 'Bhutan', 'bhutan', 975, 1),
(26, 'BO', 'Bolivia', 'bolivia', 591, 1),
(27, 'BA', 'Bosnia and Herzegovina', 'bosnia-and-herzegovina', 387, 1),
(28, 'BW', 'Botswana', 'botswana', 267, 1),
(29, 'BV', 'Bouvet Island', 'bouvet-island', 0, 1),
(30, 'BR', 'Brazil', 'brazil', 55, 1),
(31, 'IO', 'British Indian Ocean Territory', 'british-indian-ocean-territory', 246, 1),
(32, 'BN', 'Brunei', 'brunei', 673, 1),
(33, 'BG', 'Bulgaria', 'bulgaria', 359, 1),
(34, 'BF', 'Burkina Faso', 'burkina-faso', 226, 1),
(35, 'BI', 'Burundi', 'burundi', 257, 1),
(36, 'KH', 'Cambodia', 'cambodia', 855, 1),
(37, 'CM', 'Cameroon', 'cameroon', 237, 1),
(39, 'CV', 'Cape Verde', 'cape-verde', 238, 1),
(40, 'KY', 'Cayman Islands', 'cayman-islands', 1345, 1),
(41, 'CF', 'Central African Republic', 'central-african-republic', 236, 1),
(42, 'TD', 'Chad', 'chad', 235, 1),
(43, 'CL', 'Chile', 'chile', 56, 1),
(44, 'CN', 'China', 'china', 86, 1),
(45, 'CX', 'Christmas Island', 'christmas-island', 61, 1),
(46, 'CC', 'Cocos (Keeling) Islands', 'cocos-keeling-islands', 672, 1),
(47, 'CO', 'Colombia', 'colombia', 57, 1),
(48, 'KM', 'Comoros', 'comoros', 269, 1),
(49, 'CG', 'Republic Of The Congo', 'republic-of-the-congo', 242, 1),
(50, 'CD', 'Democratic Republic Of The Congo', 'democratic-republic-of-the-congo', 242, 1),
(51, 'CK', 'Cook Islands', 'cook-islands', 682, 1),
(52, 'CR', 'Costa Rica', 'costa-rica', 506, 1),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 'cote-divoire-ivory-coast', 225, 1),
(54, 'HR', 'Croatia (Hrvatska)', 'croatia-hrvatska', 385, 1),
(55, 'CU', 'Cuba', 'cuba', 53, 1),
(56, 'CY', 'Cyprus', 'cyprus', 357, 1),
(57, 'CZ', 'Czech Republic', 'czech-republic', 420, 1),
(58, 'DK', 'Denmark', 'denmark', 45, 1),
(59, 'DJ', 'Djibouti', 'djibouti', 253, 1),
(60, 'DM', 'Dominica', 'dominica', 1767, 1),
(61, 'DO', 'Dominican Republic', 'dominican-republic', 1809, 1),
(62, 'TP', 'East Timor', 'east-timor', 670, 1),
(63, 'EC', 'Ecuador', 'ecuador', 593, 1),
(64, 'EG', 'Egypt', 'egypt', 20, 1),
(65, 'SV', 'El Salvador', 'el-salvador', 503, 1),
(66, 'GQ', 'Equatorial Guinea', 'equatorial-guinea', 240, 1),
(67, 'ER', 'Eritrea', 'eritrea', 291, 1),
(68, 'EE', 'Estonia', 'estonia', 372, 1),
(69, 'ET', 'Ethiopia', 'ethiopia', 251, 1),
(70, 'XA', 'External Territories of Australia', 'external-territories-of-australia', 61, 1),
(71, 'FK', 'Falkland Islands', 'falkland-islands', 500, 1),
(72, 'FO', 'Faroe Islands', 'faroe-islands', 298, 1),
(73, 'FJ', 'Fiji Islands', 'fiji-islands', 679, 1),
(74, 'FI', 'Finland', 'finland', 358, 1),
(75, 'FR', 'France', 'france', 33, 1),
(76, 'GF', 'French Guiana', 'french-guiana', 594, 1),
(77, 'PF', 'French Polynesia', 'french-polynesia', 689, 1),
(78, 'TF', 'French Southern Territories', 'french-southern-territories', 0, 1),
(79, 'GA', 'Gabon', 'gabon', 241, 1),
(80, 'GM', 'Gambia The', 'gambia-the', 220, 1),
(81, 'GE', 'Georgia', 'georgia', 995, 1),
(82, 'DE', 'Germany', 'germany', 49, 1),
(83, 'GH', 'Ghana', 'ghana', 233, 1),
(84, 'GI', 'Gibraltar', 'gibraltar', 350, 1),
(85, 'GR', 'Greece', 'greece', 30, 1),
(86, 'GL', 'Greenland', 'greenland', 299, 1),
(87, 'GD', 'Grenada', 'grenada', 1473, 1),
(88, 'GP', 'Guadeloupe', 'guadeloupe', 590, 1),
(89, 'GU', 'Guam', 'guam', 1671, 1),
(90, 'GT', 'Guatemala', 'guatemala', 502, 1),
(91, 'XU', 'Guernsey and Alderney', 'guernsey-and-alderney', 44, 1),
(92, 'GN', 'Guinea', 'guinea', 224, 1),
(93, 'GW', 'Guinea-Bissau', 'guineabissau', 245, 1),
(94, 'GY', 'Guyana', 'guyana', 592, 1),
(95, 'HT', 'Haiti', 'haiti', 509, 1),
(96, 'HM', 'Heard and McDonald Islands', 'heard-and-mcdonald-islands', 0, 1),
(97, 'HN', 'Honduras', 'honduras', 504, 1),
(98, 'HK', 'Hong Kong S.A.R.', 'hong-kong-sar', 852, 1),
(99, 'HU', 'Hungary', 'hungary', 36, 1),
(100, 'IS', 'Iceland', 'iceland', 354, 1),
(101, 'IN', 'India', 'india', 91, 1),
(102, 'ID', 'Indonesia', 'indonesia', 62, 1),
(103, 'IR', 'Iran', 'iran', 98, 1),
(104, 'IQ', 'Iraq', 'iraq', 964, 1),
(105, 'IE', 'Ireland', 'ireland', 353, 1),
(106, 'IL', 'Israel', 'israel', 972, 1),
(107, 'IT', 'Italy', 'italy', 39, 1),
(108, 'JM', 'Jamaica', 'jamaica', 1876, 1),
(109, 'JP', 'Japan', 'japan', 81, 1),
(110, 'XJ', 'Jersey', 'jersey', 44, 1),
(111, 'JO', 'Jordan', 'jordan', 962, 1),
(112, 'KZ', 'Kazakhstan', 'kazakhstan', 7, 1),
(113, 'KE', 'Kenya', 'kenya', 254, 1),
(114, 'KI', 'Kiribati', 'kiribati', 686, 1),
(115, 'KP', 'Korea North', 'korea-north', 850, 1),
(116, 'KR', 'Korea South', 'korea-south', 82, 1),
(117, 'KW', 'Kuwait', 'kuwait', 965, 1),
(118, 'KG', 'Kyrgyzstan', 'kyrgyzstan', 996, 1),
(119, 'LA', 'Laos', 'laos', 856, 1),
(120, 'LV', 'Latvia', 'latvia', 371, 1),
(121, 'LB', 'Lebanon', 'lebanon', 961, 1),
(122, 'LS', 'Lesotho', 'lesotho', 266, 1),
(123, 'LR', 'Liberia', 'liberia', 231, 1),
(124, 'LY', 'Libya', 'libya', 218, 1),
(125, 'LI', 'Liechtenstein', 'liechtenstein', 423, 1),
(126, 'LT', 'Lithuania', 'lithuania', 370, 1),
(127, 'LU', 'Luxembourg', 'luxembourg', 352, 1),
(128, 'MO', 'Macau S.A.R.', 'macau-sar', 853, 1),
(129, 'MK', 'Macedonia', 'macedonia', 389, 1),
(130, 'MG', 'Madagascar', 'madagascar', 261, 1),
(131, 'MW', 'Malawi', 'malawi', 265, 1),
(132, 'MY', 'Malaysia', 'malaysia', 60, 1),
(133, 'MV', 'Maldives', 'maldives', 960, 1),
(134, 'ML', 'Mali', 'mali', 223, 1),
(135, 'MT', 'Malta', 'malta', 356, 1),
(136, 'XM', 'Man (Isle of)', 'man-isle-of', 44, 1),
(137, 'MH', 'Marshall Islands', 'marshall-islands', 692, 1),
(138, 'MQ', 'Martinique', 'martinique', 596, 1),
(139, 'MR', 'Mauritania', 'mauritania', 222, 1),
(140, 'MU', 'Mauritius', 'mauritius', 230, 1),
(141, 'YT', 'Mayotte', 'mayotte', 269, 1),
(142, 'MX', 'Mexico', 'mexico', 52, 1),
(143, 'FM', 'Micronesia', 'micronesia', 691, 1),
(144, 'MD', 'Moldova', 'moldova', 373, 1),
(145, 'MC', 'Monaco', 'monaco', 377, 1),
(146, 'MN', 'Mongolia', 'mongolia', 976, 1),
(147, 'MS', 'Montserrat', 'montserrat', 1664, 1),
(148, 'MA', 'Morocco', 'morocco', 212, 1),
(149, 'MZ', 'Mozambique', 'mozambique', 258, 1),
(150, 'MM', 'Myanmar', 'myanmar', 95, 1),
(151, 'NA', 'Namibia', 'namibia', 264, 1),
(152, 'NR', 'Nauru', 'nauru', 674, 1),
(153, 'NP', 'Nepal', 'nepal', 977, 1),
(154, 'AN', 'Netherlands Antilles', 'netherlands-antilles', 599, 1),
(155, 'NL', 'Netherlands The', 'netherlands-the', 31, 1),
(156, 'NC', 'New Caledonia', 'new-caledonia', 687, 1),
(157, 'NZ', 'New Zealand', 'new-zealand', 64, 1),
(158, 'NI', 'Nicaragua', 'nicaragua', 505, 1),
(159, 'NE', 'Niger', 'niger', 227, 1),
(160, 'NG', 'Nigeria', 'nigeria', 234, 1),
(161, 'NU', 'Niue', 'niue', 683, 1),
(162, 'NF', 'Norfolk Island', 'norfolk-island', 672, 1),
(163, 'MP', 'Northern Mariana Islands', 'northern-mariana-islands', 1670, 1),
(164, 'NO', 'Norway', 'norway', 47, 1),
(165, 'OM', 'Oman', 'oman', 968, 1),
(166, 'PK', 'Pakistan', 'pakistan', 92, 1),
(167, 'PW', 'Palau', 'palau', 680, 1),
(168, 'PS', 'Palestinian Territory Occupied', 'palestinian-territory-occupied', 970, 1),
(169, 'PA', 'Panama', 'panama', 507, 1),
(170, 'PG', 'Papua new Guinea', 'papua-new-guinea', 675, 1),
(171, 'PY', 'Paraguay', 'paraguay', 595, 1),
(172, 'PE', 'Peru', 'peru', 51, 1),
(173, 'PH', 'Philippines', 'philippines', 63, 1),
(174, 'PN', 'Pitcairn Island', 'pitcairn-island', 0, 1),
(175, 'PL', 'Poland', 'poland', 48, 1),
(176, 'PT', 'Portugal', 'portugal', 351, 1),
(177, 'PR', 'Puerto Rico', 'puerto-rico', 1787, 1),
(178, 'QA', 'Qatar', 'qatar', 974, 1),
(179, 'RE', 'Reunion', 'reunion', 262, 1),
(180, 'RO', 'Romania', 'romania', 40, 1),
(181, 'RU', 'Russia', 'russia', 70, 1),
(182, 'RW', 'Rwanda', 'rwanda', 250, 1),
(183, 'SH', 'Saint Helena', 'saint-helena', 290, 1),
(184, 'KN', 'Saint Kitts And Nevis', 'saint-kitts-and-nevis', 1869, 1),
(185, 'LC', 'Saint Lucia', 'saint-lucia', 1758, 1),
(186, 'PM', 'Saint Pierre and Miquelon', 'saint-pierre-and-miquelon', 508, 1),
(187, 'VC', 'Saint Vincent And The Grenadines', 'saint-vincent-and-the-grenadines', 1784, 1),
(188, 'WS', 'Samoa', 'samoa', 684, 1),
(189, 'SM', 'San Marino', 'san-marino', 378, 1),
(190, 'ST', 'Sao Tome and Principe', 'sao-tome-and-principe', 239, 1),
(191, 'SA', 'Saudi Arabia', 'saudi-arabia', 966, 1),
(192, 'SN', 'Senegal', 'senegal', 221, 1),
(193, 'RS', 'Serbia', 'serbia', 381, 1),
(194, 'SC', 'Seychelles', 'seychelles', 248, 1),
(195, 'SL', 'Sierra Leone', 'sierra-leone', 232, 1),
(196, 'SG', 'Singapore', 'singapore', 65, 1),
(197, 'SK', 'Slovakia', 'slovakia', 421, 1),
(198, 'SI', 'Slovenia', 'slovenia', 386, 1),
(199, 'XG', 'Smaller Territories of the UK', 'smaller-territories-of-the-uk', 44, 1),
(200, 'SB', 'Solomon Islands', 'solomon-islands', 677, 1),
(201, 'SO', 'Somalia', 'somalia', 252, 1),
(202, 'ZA', 'South Africa', 'south-africa', 27, 1),
(203, 'GS', 'South Georgia', 'south-georgia', 0, 1),
(204, 'SS', 'South Sudan', 'south-sudan', 211, 1),
(205, 'ES', 'Spain', 'spain', 34, 1),
(206, 'LK', 'Sri Lanka', 'sri-lanka', 94, 1),
(207, 'SD', 'Sudan', 'sudan', 249, 1),
(208, 'SR', 'Suriname', 'suriname', 597, 1),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 'svalbard-and-jan-mayen-islands', 47, 1),
(210, 'SZ', 'Swaziland', 'swaziland', 268, 1),
(211, 'SE', 'Sweden', 'sweden', 46, 1),
(212, 'CH', 'Switzerland', 'switzerland', 41, 1),
(213, 'SY', 'Syria', 'syria', 963, 1),
(214, 'TW', 'Taiwan', 'taiwan', 886, 1),
(215, 'TJ', 'Tajikistan', 'tajikistan', 992, 1),
(216, 'TZ', 'Tanzania', 'tanzania', 255, 1),
(217, 'TH', 'Thailand', 'thailand', 66, 1),
(218, 'TG', 'Togo', 'togo', 228, 1),
(219, 'TK', 'Tokelau', 'tokelau', 690, 1),
(220, 'TO', 'Tonga', 'tonga', 676, 1),
(221, 'TT', 'Trinidad And Tobago', 'trinidad-and-tobago', 1868, 1),
(222, 'TN', 'Tunisia', 'tunisia', 216, 1),
(223, 'TR', 'Turkey', 'turkey', 90, 1),
(224, 'TM', 'Turkmenistan', 'turkmenistan', 7370, 1),
(225, 'TC', 'Turks And Caicos Islands', 'turks-and-caicos-islands', 1649, 1),
(226, 'TV', 'Tuvalu', 'tuvalu', 688, 1),
(227, 'UG', 'Uganda', 'uganda', 256, 1),
(228, 'UA', 'Ukraine', 'ukraine', 380, 1),
(229, 'AE', 'United Arab Emirates', 'united-arab-emirates', 971, 1),
(230, 'GB', 'United Kingdom', 'united-kingdom', 44, 1),
(232, 'UM', 'United States Minor Outlying Islands', 'united-states-minor-outlying-islands', 1, 1),
(233, 'UY', 'Uruguay', 'uruguay', 598, 1),
(234, 'UZ', 'Uzbekistan', 'uzbekistan', 998, 1),
(235, 'VU', 'Vanuatu', 'vanuatu', 678, 1),
(236, 'VA', 'Vatican City State (Holy See)', 'vatican-city-state-holy-see', 39, 1),
(237, 'VE', 'Venezuela', 'venezuela', 58, 1),
(238, 'VN', 'Vietnam', 'vietnam', 84, 1),
(239, 'VG', 'Virgin Islands (British)', 'virgin-islands-british', 1284, 1),
(240, 'VI', 'Virgin Islands (US)', 'virgin-islands-us', 1340, 1),
(241, 'WF', 'Wallis And Futuna Islands', 'wallis-and-futuna-islands', 681, 1),
(242, 'EH', 'Western Sahara', 'western-sahara', 212, 1),
(243, 'YE', 'Yemen', 'yemen', 967, 1),
(244, 'YU', 'Yugoslavia', 'yugoslavia', 38, 1),
(245, 'ZM', 'Zambia', 'zambia', 260, 1),
(246, 'ZW', 'Zimbabwe', 'zimbabwe', 263, 1),
(247, 'AF', 'Afghanistan', 'afghanistan', 93, 1),
(248, 'AL', 'Albania', 'albania', 355, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_language`
--

CREATE TABLE `ci_language` (
  `id` int(11) NOT NULL,
  `name` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_language`
--

INSERT INTO `ci_language` (`id`, `name`, `short_name`, `status`, `created_at`) VALUES
(2, 'English', 'en', 1, '2019-09-16 01:13:17'),
(3, 'French', 'fr', 1, '2019-09-16 08:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `ci_uploaded_files`
--

CREATE TABLE `ci_uploaded_files` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_uploaded_files`
--

INSERT INTO `ci_uploaded_files` (`id`, `name`, `created_at`) VALUES
(81, 'uploads/0fe0382a27bbc4336939a4dd4b3acee2.jpg', '2019-11-26 21:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gb_admin`
--

CREATE TABLE `gb_admin` (
  `id` int(11) NOT NULL,
  `admin_role_id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(32) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_verify` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gb_admin`
--

INSERT INTO `gb_admin` (`id`, `admin_role_id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `image`, `password`, `last_login`, `is_verify`, `is_admin`, `is_active`, `is_super`, `token`, `password_reset_code`, `last_ip`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'super', 'Super', 'Admin', 'super@gmail.com', '12312312312', '', '$2y$10$GimEcQXH0wCdvM9RR1HiqOKDUN/HyikQarnU8KQL50FwJqdzEb.Nu', '2020-11-27 00:00:00', 1, 1, 1, 1, '', '', '', '2020-11-27 00:00:00', 1, '2020-11-27 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gb_customer_mast`
--

CREATE TABLE `gb_customer_mast` (
  `id` int(11) NOT NULL,
  `customer_code` varchar(16) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `addr1` varchar(128) CHARACTER SET utf8 NOT NULL,
  `addr2` varchar(128) CHARACTER SET utf8 NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `zipcode` varchar(8) DEFAULT NULL,
  `contact` varchar(32) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `customer_level_id` int(6) DEFAULT NULL,
  `customer_status_id` int(6) DEFAULT NULL,
  `billing_addr1_1` varchar(128) CHARACTER SET utf8 NOT NULL,
  `billing_addr2_1` varchar(128) CHARACTER SET utf8 NOT NULL,
  `billing_city_id_1` int(11) DEFAULT NULL,
  `billing_state_id_1` int(11) DEFAULT NULL,
  `billing_country_id_1` int(11) DEFAULT NULL,
  `billing_zipcode_1` varchar(8) DEFAULT NULL,
  `billing_addr1_2` varchar(128) CHARACTER SET utf8 NOT NULL,
  `billing_addr2_2` varchar(128) CHARACTER SET utf8 NOT NULL,
  `billing_city_id_2` int(11) DEFAULT NULL,
  `billing_state_id_2` int(11) DEFAULT NULL,
  `billing_country_id_2` int(11) DEFAULT NULL,
  `billing_zipcode_2` varchar(8) DEFAULT NULL,
  `shipping_addr1_1` varchar(128) CHARACTER SET utf8 NOT NULL,
  `shipping_addr2_1` varchar(128) CHARACTER SET utf8 NOT NULL,
  `shipping_city_id_1` int(11) DEFAULT NULL,
  `shipping_state_id_1` int(11) DEFAULT NULL,
  `shipping_country_id_1` int(11) DEFAULT NULL,
  `shipping_zipcode_1` varchar(8) DEFAULT NULL,
  `shipping_addr1_2` varchar(128) CHARACTER SET utf8 NOT NULL,
  `shipping_addr2_2` varchar(128) CHARACTER SET utf8 NOT NULL,
  `shipping_city_id_2` int(11) DEFAULT NULL,
  `shipping_state_id_2` int(11) DEFAULT NULL,
  `shipping_country_id_2` int(11) DEFAULT NULL,
  `shipping_zipcode_2` varchar(8) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gb_customer_mast`
--

INSERT INTO `gb_customer_mast` (`id`, `customer_code`, `name`, `addr1`, `addr2`, `city_id`, `state_id`, `country_id`, `zipcode`, `contact`, `website`, `customer_level_id`, `customer_status_id`, `billing_addr1_1`, `billing_addr2_1`, `billing_city_id_1`, `billing_state_id_1`, `billing_country_id_1`, `billing_zipcode_1`, `billing_addr1_2`, `billing_addr2_2`, `billing_city_id_2`, `billing_state_id_2`, `billing_country_id_2`, `billing_zipcode_2`, `shipping_addr1_1`, `shipping_addr2_1`, `shipping_city_id_1`, `shipping_state_id_1`, `shipping_country_id_1`, `shipping_zipcode_1`, `shipping_addr1_2`, `shipping_addr2_2`, `shipping_city_id_2`, `shipping_state_id_2`, `shipping_country_id_2`, `shipping_zipcode_2`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'CN000001', 'Customer 1', 'NO123', 'Ta Tong Street', 3, 4, 88, '53100', '03-12345678', 'www.china.cn', 1, 1, 'No.1 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.3 Jalan 1/21B', '', 3, 3, 4, '53101', 'No.5 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.7 Jalan 1/21B', '', 1, 1, 3, '53100', '2020-09-12 17:12:42', 1, '2020-09-12 17:12:42', 1),
(2, 'ALLJOY0001', 'Sen Lin', 'RM. 503, 5TH FLOOR, BLDG. B, JIANYE HIGH TECH INDUSTRIAL PARK', 'BANTIAN ST, LONGGANG DIST.', 3, 4, 88, '53100', '03-12345678', 'http://www.alljoylogistics.com', 3, 1, 'No.1 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.3 Jalan 1/21B', '', 3, 3, 4, '53101', 'No.5 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.7 Jalan 1/21B', '', 1, 1, 3, '53100', '2020-09-12 17:12:42', 1, '2020-09-12 17:12:42', 1),
(3, 'TEST0001', 'test acount', 'test account address', 'test account address', 3, 4, 88, '53100', '03-12345678', 'http://test.com', 5, 1, 'No.1 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.3 Jalan 1/21B', '', 3, 3, 4, '53101', 'No.5 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.7 Jalan 1/21B', '', 1, 1, 3, '53100', '2020-09-12 17:12:42', 1, '2020-09-12 17:12:42', 1),
(10, 'LEVEL0', 'test acount', 'test account address', 'test account address', 3, 4, 88, '53100', '03-12345678', 'http://test.com', 1, 1, 'No.1 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.3 Jalan 1/21B', '', 3, 3, 4, '53101', 'No.5 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.7 Jalan 1/21B', '', 1, 1, 3, '53100', '2020-09-12 17:12:42', 1, '2020-09-12 17:12:42', 1),
(11, 'LEVEL1', 'test acount', 'test account address', 'test account address', 3, 4, 88, '53100', '03-12345678', 'http://test.com', 2, 1, 'No.1 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.3 Jalan 1/21B', '', 3, 3, 4, '53101', 'No.5 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.7 Jalan 1/21B', '', 1, 1, 3, '53100', '2020-09-12 17:12:42', 1, '2020-09-12 17:12:42', 1),
(12, 'LEVEL2', 'test acount', 'test account address', 'test account address', 3, 4, 88, '53100', '03-12345678', 'http://test.com', 3, 1, 'No.1 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.3 Jalan 1/21B', '', 3, 3, 4, '53101', 'No.5 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.7 Jalan 1/21B', '', 1, 1, 3, '53100', '2020-09-12 17:12:42', 1, '2020-09-12 17:12:42', 1),
(13, 'LEVEL3', 'test acount', 'test account address', 'test account address', 3, 4, 88, '53100', '03-12345678', 'http://test.com', 4, 1, 'No.1 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.3 Jalan 1/21B', '', 3, 3, 4, '53101', 'No.5 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.7 Jalan 1/21B', '', 1, 1, 3, '53100', '2020-09-12 17:12:42', 1, '2020-09-12 17:12:42', 1),
(14, 'LEVEL4', 'test acount', 'test account address', 'test account address', 3, 4, 88, '53100', '03-12345678', 'http://test.com', 5, 1, 'No.1 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.3 Jalan 1/21B', '', 3, 3, 4, '53101', 'No.5 Jalan 1/21B', '', 1, 1, 3, '53100', 'No.7 Jalan 1/21B', '', 1, 1, 3, '53100', '2020-09-12 17:12:42', 1, '2020-09-12 17:12:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gb_general_settings`
--

CREATE TABLE `gb_general_settings` (
  `id` int(11) NOT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `application_name` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `default_language` int(11) NOT NULL,
  `copyright` tinytext DEFAULT NULL,
  `email_from` varchar(100) NOT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` int(11) DEFAULT NULL,
  `smtp_user` varchar(50) DEFAULT NULL,
  `smtp_pass` varchar(50) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `google_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `recaptcha_secret_key` varchar(255) DEFAULT NULL,
  `recaptcha_site_key` varchar(255) DEFAULT NULL,
  `recaptcha_lang` varchar(50) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gb_general_settings`
--

INSERT INTO `gb_general_settings` (`id`, `favicon`, `logo`, `application_name`, `timezone`, `currency`, `default_language`, `copyright`, `email_from`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `facebook_link`, `twitter_link`, `google_link`, `youtube_link`, `linkedin_link`, `instagram_link`, `recaptcha_secret_key`, `recaptcha_site_key`, `recaptcha_lang`, `created_date`, `updated_date`) VALUES
(1, 'assets/img/favicon.ico', 'assets/img/dc48701e5a6a300744b873b63f772101.png', 'Crescendo', 'America/Adak', 'USD', 2, 'Copyright © 2020 Kitchen Planner Dashboard System All rights reserved.', 'info@infinityglobal.com', 'smtp.domain.com', 567, 'info@domain.com', '123456789', 'https://facebook.com', 'https://twitter.com', 'https://google.com', 'https://youtube.com', 'https://linkedin.com', 'https://instagram.com', '', '', 'en', '2019-12-02 08:12:26', '2019-12-02 08:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `gb_menu`
--

CREATE TABLE `gb_menu` (
  `id` int(11) NOT NULL,
  `module_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `controller_name` varchar(255) DEFAULT NULL,
  `fa_icon` varchar(64) DEFAULT NULL,
  `sort_order` int(4) NOT NULL,
  `rec_status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gb_menu`
--

INSERT INTO `gb_menu` (`id`, `module_name`, `controller_name`, `fa_icon`, `sort_order`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(100, 'Accounts', 'dashboard', 'fa-cog', 100, 1, '2020-07-28 00:07:14', 0, '2020-07-28 00:07:14', 0),
(200, 'Auditions', 'category', 'fa-folder-o', 200, 1, '2020-07-28 00:07:14', 0, '2020-07-28 00:07:14', 0),
(300, 'Recitals', 'sub_category', 'fa-tasks', 300, 1, '2020-07-28 00:07:14', 0, '2020-07-28 00:07:14', 0),
(400, 'Applications', 'sub_sub_category', 'fa-floppy-o', 400, 1, '2020-07-28 00:07:14', 0, '2020-07-28 00:07:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_menu_submenu`
--

CREATE TABLE `gb_menu_submenu` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(64) DEFAULT NULL,
  `fa_icon` varchar(64) DEFAULT NULL,
  `sort_order` int(4) NOT NULL,
  `rec_status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gb_menu_submenu`
--

INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(101, 100, 'Student', 'accounts/index', NULL, 101, 1, '2021-07-07 00:00:00', 0, '2021-07-07 00:00:00', 0),
(102, 100, 'Teacher', 'accounts/teacher', NULL, 102, 1, '2021-07-07 00:00:00', 0, '2021-07-07 00:00:00', 0),
(103, 100, 'Parent', 'accounts/parent', NULL, 103, 1, '2021-07-07 00:00:00', 0, '2021-07-07 00:00:00', 0),
(104, 100, 'Local Admin', 'accounts/local_admin', NULL, 104, 1, '2021-07-07 00:00:00', 0, '2021-07-07 00:00:00', 0),
(201, 200, 'Little Morarts', 'auditions/index', '', 201, 1, '2020-11-25 00:00:00', 0, '2020-11-25 00:00:00', 0),
(202, 200, 'Crescendo', 'auditions/crescendo', '', 202, 1, '2020-11-25 00:00:00', 0, '2020-11-25 00:00:00', 0),
(203, 200, 'Create a new audition', 'auditions/create', NULL, 203, 1, '2021-07-07 00:00:00', 0, '2021-07-07 00:00:00', 0),
(301, 300, 'Little Morarts', 'recitals/index', '', 301, 1, '2020-08-18 15:47:32', 0, '2020-08-18 15:47:32', 0),
(302, 300, 'Crescendo', 'recitals/crescendo', '', 302, 1, '2020-08-18 15:47:32', 0, '2020-08-18 15:47:32', 0),
(303, 300, 'Create', 'recitals/create', NULL, 303, 1, '2021-07-07 00:00:00', 0, '2021-07-07 00:00:00', 0),
(402, 400, 'Little Morarts', 'application/index', '', 402, 1, '2021-04-04 00:00:00', 0, '2021-04-04 00:00:00', 0),
(403, 400, 'Crescendo', 'application/cerscendo', NULL, 403, 1, '2021-04-04 00:00:00', 0, '2021-04-04 00:00:00', 0),
(404, 400, 'Music Competition', 'application/music_competition', NULL, 0, 1, '2021-07-07 00:00:00', 0, '2021-07-07 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_module`
--

CREATE TABLE `gb_module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `controller_name` varchar(255) DEFAULT NULL,
  `rec_status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gb_module`
--

INSERT INTO `gb_module` (`module_id`, `module_name`, `controller_name`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'admin', 'admin', 1, '2020-07-26 22:55:55', 0, '2020-07-26 22:55:55', 0),
(2, 'role', 'role', 1, '2020-07-26 22:55:55', 0, '2020-07-26 22:55:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_roles`
--

CREATE TABLE `gb_roles` (
  `id` int(11) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rec_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gb_roles`
--

INSERT INTO `gb_roles` (`id`, `title`, `description`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Super Admin', '', 1, '2020-07-26 01:31:41', 0, '2020-07-26 01:31:41', 0),
(2, 'Local Admin', '', 1, '2020-07-26 01:31:41', 0, '2020-07-26 01:31:41', 0),
(3, 'Teacher', '', 1, '2020-07-26 01:31:41', 0, '2020-07-26 01:31:41', 0),
(4, 'Student', '', 1, '2020-07-26 01:31:41', 0, '2020-07-26 01:31:41', 0),
(5, 'Parent', '', 1, '2020-07-26 01:31:41', 0, '2020-07-26 01:31:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_roles_rel_module`
--

CREATE TABLE `gb_roles_rel_module` (
  `roles_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `rec_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gb_roles_rel_module`
--

INSERT INTO `gb_roles_rel_module` (`roles_id`, `module_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 1, '2020-07-26 22:57:08', 0, '2020-07-26 22:57:08', 0),
(1, 2, 1, '2020-07-26 22:57:08', 0, '2020-07-26 22:57:08', 0),
(2, 1, 1, '2020-07-26 22:57:08', 0, '2020-07-26 22:57:08', 0),
(2, 2, 1, '2020-07-26 22:57:08', 0, '2020-07-26 22:57:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gb_roles_rel_permissions`
--

CREATE TABLE `gb_roles_rel_permissions` (
  `roles_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `rec_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gb_roles_rel_permissions`
--

INSERT INTO `gb_roles_rel_permissions` (`roles_id`, `permission_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1001, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0),
(1, 1003, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0),
(1, 9001, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0),
(1, 9003, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0),
(2, 1001, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0),
(2, 1003, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0),
(2, 9001, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0),
(2, 9003, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_benefits`
--

CREATE TABLE `tbl_benefits` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_benefits`
--

INSERT INTO `tbl_benefits` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(12, 'Microwaveable', 'Screenshot_3.png', 1, '2021-04-28 00:14:37', '2021-04-28 00:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Cups', 'Screenshot_4.png', 1, '2021-04-28 00:01:37', '2021-04-28 00:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

CREATE TABLE `tbl_material` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `sub_sub_category_id` int(11) DEFAULT NULL,
  `sustainability_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `benefit_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `material_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `idea_for` varchar(255) NOT NULL,
  `item_code` varchar(5) NOT NULL,
  `short_desc` varchar(255) NOT NULL,
  `pieces` varchar(255) NOT NULL,
  `s_unit` int(11) NOT NULL,
  `size_oz` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `has_lid` int(1) NOT NULL DEFAULT 0,
  `is_lid` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE `tbl_request` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `business_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `order_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_items`
--

CREATE TABLE `tbl_request_items` (
  `id` bigint(10) NOT NULL,
  `request_id` bigint(10) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `product_id` bigint(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` varchar(255) NOT NULL,
  `custom_print` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`id`, `category_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(24, 20, 'Hot Drink Cups', '', '2021-04-29 03:16:50', '2021-04-29 03:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_sub_category`
--

CREATE TABLE `tbl_sub_sub_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_sub_category`
--

INSERT INTO `tbl_sub_sub_category` (`id`, `category_id`, `sub_category_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(11, 20, 24, '1 Compartment', '', '2021-04-29 03:17:58', '2021-04-29 03:17:58'),
(12, 20, 24, '3 Compartment', '', '2021-04-29 03:34:33', '2021-04-29 03:34:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sustainability`
--

CREATE TABLE `tbl_sustainability` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `country` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `admin_role_id` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verify` tinyint(4) NOT NULL DEFAULT 0,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `country`, `email`, `mobile_no`, `password`, `address`, `admin_role_id`, `is_active`, `is_verify`, `is_admin`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(3, 'admin', 0, 'admin@admin.com', '12345', '$2y$10$qlAzDhBEqkKwP3OykqA7N.ZQk6T67fxD9RHfdv3zToxa9Mtwu9C/e', '27 new jersey - Level 58 - CA 444 \r\nUnited State ', 1, 1, 1, 1, '', '', '', '2017-09-29 10:09:44', '2017-12-14 10:12:41'),
(32, 'user', 0, 'user@user.com', '44897866462', '$2y$10$sU5msVdifYie7cZbCEnyku6hLH8Sef0VCHqO9UIOg6rsBsDtsLcyS', '', 1, 1, 1, 0, '352fe25daf686bdb4edca223c921acea', '', '', '2018-04-24 07:04:07', '2019-01-26 03:01:30'),
(33, 'john123', 0, 'johnsmith@gmail.com', '445889654656', '$2y$10$CcBiQrcW597s5muOP2blhOev48gzBv2VvAVp83NsXbLo7cZM7tjGm', 'USA', 7, 1, 0, 0, '', '', '', '2018-04-25 06:04:25', '2019-01-24 04:01:33'),
(38, 'john', 0, 'johnsmith@gmail.com', '123456', '$2y$10$5wXvKkhMTEatZ7aUHE/RU.lQbeXdURME8Br9Noxn802epBPoFz7wu', 'asdfdasfdsfds', 1, 1, 0, 0, '', '', '', '2019-07-15 09:07:24', '2019-07-15 09:07:24'),
(39, 'techesprit', 0, 'zain@gmail.com', '03004596000', '$2y$10$F14///ug4J6WNd0selNJguZ2ib4ugER8u4n09Z787nz2g6j4gJZva', '111asdfasd', 1, 1, 0, 0, '', '', '', '2019-11-25 00:00:00', '2019-11-25 00:00:00'),
(40, 'techesprit', 0, 'zain@gmail.com', '03004596000', '$2y$10$UbljVrMhHmqRYhJBumzmVOfXYmaOeZRMAEkBn0uF68Nj3VL4ACiHC', '111asdfasd', 1, 1, 0, 0, '', '', '', '2019-11-25 00:00:00', '2019-11-25 00:00:00'),
(41, 'qwe', 158, 'qwe@qwe.com', 'qwe', '$2y$10$WMtL8mBl4.7Q/wwCgiAV2OjGqwXBBR0u.7ApS5u7ahL.20kxVw1K6', 'qwe', 3, 1, 1, 0, '006f52e9102a8d3be2fe5614f42ba989', '', '', '2021-07-07 00:00:00', '2021-07-07 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_activity_log`
--
ALTER TABLE `ci_activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_countries`
--
ALTER TABLE `ci_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_language`
--
ALTER TABLE `ci_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_uploaded_files`
--
ALTER TABLE `ci_uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gb_admin`
--
ALTER TABLE `gb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gb_customer_mast`
--
ALTER TABLE `gb_customer_mast`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_code` (`customer_code`);

--
-- Indexes for table `gb_general_settings`
--
ALTER TABLE `gb_general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gb_menu`
--
ALTER TABLE `gb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gb_menu_submenu`
--
ALTER TABLE `gb_menu_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gb_roles`
--
ALTER TABLE `gb_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_benefits`
--
ALTER TABLE `tbl_benefits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request_items`
--
ALTER TABLE `tbl_request_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_sub_category`
--
ALTER TABLE `tbl_sub_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sustainability`
--
ALTER TABLE `tbl_sustainability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_activity_log`
--
ALTER TABLE `ci_activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ci_countries`
--
ALTER TABLE `ci_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `ci_language`
--
ALTER TABLE `ci_language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ci_uploaded_files`
--
ALTER TABLE `ci_uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gb_admin`
--
ALTER TABLE `gb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gb_customer_mast`
--
ALTER TABLE `gb_customer_mast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gb_menu`
--
ALTER TABLE `gb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=901;

--
-- AUTO_INCREMENT for table `gb_menu_submenu`
--
ALTER TABLE `gb_menu_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=921;

--
-- AUTO_INCREMENT for table `gb_roles`
--
ALTER TABLE `gb_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_benefits`
--
ALTER TABLE `tbl_benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_request_items`
--
ALTER TABLE `tbl_request_items`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_sub_sub_category`
--
ALTER TABLE `tbl_sub_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_sustainability`
--
ALTER TABLE `tbl_sustainability`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
