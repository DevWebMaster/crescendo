#
# TABLE STRUCTURE FOR: ci_activity_log
#

DROP TABLE IF EXISTS `ci_activity_log`;

CREATE TABLE `ci_activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_id` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `ci_activity_log` (`id`, `activity_id`, `user_id`, `admin_id`, `created_at`) VALUES (1, 1, 0, 25, '2019-11-27 06:00:00');
INSERT INTO `ci_activity_log` (`id`, `activity_id`, `user_id`, `admin_id`, `created_at`) VALUES (2, 2, 0, 26, '2019-11-27 06:00:00');
INSERT INTO `ci_activity_log` (`id`, `activity_id`, `user_id`, `admin_id`, `created_at`) VALUES (3, 1, 0, 31, '2019-11-25 09:33:27');
INSERT INTO `ci_activity_log` (`id`, `activity_id`, `user_id`, `admin_id`, `created_at`) VALUES (4, 5, 0, 31, '2019-11-25 09:40:35');
INSERT INTO `ci_activity_log` (`id`, `activity_id`, `user_id`, `admin_id`, `created_at`) VALUES (5, 7, 0, 31, '2019-11-26 09:19:45');
INSERT INTO `ci_activity_log` (`id`, `activity_id`, `user_id`, `admin_id`, `created_at`) VALUES (6, 7, 0, 31, '2019-11-26 09:41:48');
INSERT INTO `ci_activity_log` (`id`, `activity_id`, `user_id`, `admin_id`, `created_at`) VALUES (7, 7, 0, 31, '2019-11-26 09:42:50');
INSERT INTO `ci_activity_log` (`id`, `activity_id`, `user_id`, `admin_id`, `created_at`) VALUES (8, 7, 0, 31, '2019-11-26 09:43:42');
INSERT INTO `ci_activity_log` (`id`, `activity_id`, `user_id`, `admin_id`, `created_at`) VALUES (9, 2, 0, 1, '2020-07-26 06:28:50');


#
# TABLE STRUCTURE FOR: ci_countries
#

DROP TABLE IF EXISTS `ci_countries`;

CREATE TABLE `ci_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `phonecode` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8;

INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (1, 'US', 'United States', 'united-states', 1, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (2, 'CA', 'Canada', 'canada', 1, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (3, 'DZ', 'Algeria', 'algeria', 213, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (4, 'AS', 'American Samoa', 'american-samoa', 1684, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (5, 'AD', 'Andorra', 'andorra', 376, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (6, 'AO', 'Angola', 'angola', 244, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (7, 'AI', 'Anguilla', 'anguilla', 1264, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (8, 'AQ', 'Antarctica', 'antarctica', 0, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (9, 'AG', 'Antigua And Barbuda', 'antigua-and-barbuda', 1268, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (10, 'AR', 'Argentina', 'argentina', 54, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (11, 'AM', 'Armenia', 'armenia', 374, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (12, 'AW', 'Aruba', 'aruba', 297, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (13, 'AU', 'Australia', 'australia', 61, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (14, 'AT', 'Austria', 'austria', 43, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (15, 'AZ', 'Azerbaijan', 'azerbaijan', 994, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (16, 'BS', 'Bahamas The', 'bahamas-the', 1242, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (17, 'BH', 'Bahrain', 'bahrain', 973, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (18, 'BD', 'Bangladesh', 'bangladesh', 880, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (19, 'BB', 'Barbados', 'barbados', 1246, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (20, 'BY', 'Belarus', 'belarus', 375, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (21, 'BE', 'Belgium', 'belgium', 32, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (22, 'BZ', 'Belize', 'belize', 501, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (23, 'BJ', 'Benin', 'benin', 229, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (24, 'BM', 'Bermuda', 'bermuda', 1441, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (25, 'BT', 'Bhutan', 'bhutan', 975, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (26, 'BO', 'Bolivia', 'bolivia', 591, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (27, 'BA', 'Bosnia and Herzegovina', 'bosnia-and-herzegovina', 387, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (28, 'BW', 'Botswana', 'botswana', 267, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (29, 'BV', 'Bouvet Island', 'bouvet-island', 0, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (30, 'BR', 'Brazil', 'brazil', 55, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (31, 'IO', 'British Indian Ocean Territory', 'british-indian-ocean-territory', 246, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (32, 'BN', 'Brunei', 'brunei', 673, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (33, 'BG', 'Bulgaria', 'bulgaria', 359, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (34, 'BF', 'Burkina Faso', 'burkina-faso', 226, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (35, 'BI', 'Burundi', 'burundi', 257, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (36, 'KH', 'Cambodia', 'cambodia', 855, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (37, 'CM', 'Cameroon', 'cameroon', 237, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (39, 'CV', 'Cape Verde', 'cape-verde', 238, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (40, 'KY', 'Cayman Islands', 'cayman-islands', 1345, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (41, 'CF', 'Central African Republic', 'central-african-republic', 236, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (42, 'TD', 'Chad', 'chad', 235, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (43, 'CL', 'Chile', 'chile', 56, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (44, 'CN', 'China', 'china', 86, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (45, 'CX', 'Christmas Island', 'christmas-island', 61, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (46, 'CC', 'Cocos (Keeling) Islands', 'cocos-keeling-islands', 672, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (47, 'CO', 'Colombia', 'colombia', 57, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (48, 'KM', 'Comoros', 'comoros', 269, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (49, 'CG', 'Republic Of The Congo', 'republic-of-the-congo', 242, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (50, 'CD', 'Democratic Republic Of The Congo', 'democratic-republic-of-the-congo', 242, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (51, 'CK', 'Cook Islands', 'cook-islands', 682, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (52, 'CR', 'Costa Rica', 'costa-rica', 506, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 'cote-divoire-ivory-coast', 225, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (54, 'HR', 'Croatia (Hrvatska)', 'croatia-hrvatska', 385, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (55, 'CU', 'Cuba', 'cuba', 53, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (56, 'CY', 'Cyprus', 'cyprus', 357, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (57, 'CZ', 'Czech Republic', 'czech-republic', 420, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (58, 'DK', 'Denmark', 'denmark', 45, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (59, 'DJ', 'Djibouti', 'djibouti', 253, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (60, 'DM', 'Dominica', 'dominica', 1767, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (61, 'DO', 'Dominican Republic', 'dominican-republic', 1809, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (62, 'TP', 'East Timor', 'east-timor', 670, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (63, 'EC', 'Ecuador', 'ecuador', 593, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (64, 'EG', 'Egypt', 'egypt', 20, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (65, 'SV', 'El Salvador', 'el-salvador', 503, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (66, 'GQ', 'Equatorial Guinea', 'equatorial-guinea', 240, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (67, 'ER', 'Eritrea', 'eritrea', 291, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (68, 'EE', 'Estonia', 'estonia', 372, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (69, 'ET', 'Ethiopia', 'ethiopia', 251, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (70, 'XA', 'External Territories of Australia', 'external-territories-of-australia', 61, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (71, 'FK', 'Falkland Islands', 'falkland-islands', 500, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (72, 'FO', 'Faroe Islands', 'faroe-islands', 298, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (73, 'FJ', 'Fiji Islands', 'fiji-islands', 679, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (74, 'FI', 'Finland', 'finland', 358, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (75, 'FR', 'France', 'france', 33, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (76, 'GF', 'French Guiana', 'french-guiana', 594, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (77, 'PF', 'French Polynesia', 'french-polynesia', 689, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (78, 'TF', 'French Southern Territories', 'french-southern-territories', 0, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (79, 'GA', 'Gabon', 'gabon', 241, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (80, 'GM', 'Gambia The', 'gambia-the', 220, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (81, 'GE', 'Georgia', 'georgia', 995, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (82, 'DE', 'Germany', 'germany', 49, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (83, 'GH', 'Ghana', 'ghana', 233, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (84, 'GI', 'Gibraltar', 'gibraltar', 350, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (85, 'GR', 'Greece', 'greece', 30, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (86, 'GL', 'Greenland', 'greenland', 299, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (87, 'GD', 'Grenada', 'grenada', 1473, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (88, 'GP', 'Guadeloupe', 'guadeloupe', 590, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (89, 'GU', 'Guam', 'guam', 1671, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (90, 'GT', 'Guatemala', 'guatemala', 502, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (91, 'XU', 'Guernsey and Alderney', 'guernsey-and-alderney', 44, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (92, 'GN', 'Guinea', 'guinea', 224, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (93, 'GW', 'Guinea-Bissau', 'guineabissau', 245, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (94, 'GY', 'Guyana', 'guyana', 592, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (95, 'HT', 'Haiti', 'haiti', 509, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (96, 'HM', 'Heard and McDonald Islands', 'heard-and-mcdonald-islands', 0, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (97, 'HN', 'Honduras', 'honduras', 504, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (98, 'HK', 'Hong Kong S.A.R.', 'hong-kong-sar', 852, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (99, 'HU', 'Hungary', 'hungary', 36, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (100, 'IS', 'Iceland', 'iceland', 354, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (101, 'IN', 'India', 'india', 91, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (102, 'ID', 'Indonesia', 'indonesia', 62, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (103, 'IR', 'Iran', 'iran', 98, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (104, 'IQ', 'Iraq', 'iraq', 964, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (105, 'IE', 'Ireland', 'ireland', 353, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (106, 'IL', 'Israel', 'israel', 972, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (107, 'IT', 'Italy', 'italy', 39, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (108, 'JM', 'Jamaica', 'jamaica', 1876, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (109, 'JP', 'Japan', 'japan', 81, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (110, 'XJ', 'Jersey', 'jersey', 44, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (111, 'JO', 'Jordan', 'jordan', 962, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (112, 'KZ', 'Kazakhstan', 'kazakhstan', 7, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (113, 'KE', 'Kenya', 'kenya', 254, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (114, 'KI', 'Kiribati', 'kiribati', 686, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (115, 'KP', 'Korea North', 'korea-north', 850, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (116, 'KR', 'Korea South', 'korea-south', 82, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (117, 'KW', 'Kuwait', 'kuwait', 965, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (118, 'KG', 'Kyrgyzstan', 'kyrgyzstan', 996, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (119, 'LA', 'Laos', 'laos', 856, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (120, 'LV', 'Latvia', 'latvia', 371, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (121, 'LB', 'Lebanon', 'lebanon', 961, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (122, 'LS', 'Lesotho', 'lesotho', 266, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (123, 'LR', 'Liberia', 'liberia', 231, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (124, 'LY', 'Libya', 'libya', 218, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (125, 'LI', 'Liechtenstein', 'liechtenstein', 423, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (126, 'LT', 'Lithuania', 'lithuania', 370, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (127, 'LU', 'Luxembourg', 'luxembourg', 352, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (128, 'MO', 'Macau S.A.R.', 'macau-sar', 853, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (129, 'MK', 'Macedonia', 'macedonia', 389, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (130, 'MG', 'Madagascar', 'madagascar', 261, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (131, 'MW', 'Malawi', 'malawi', 265, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (132, 'MY', 'Malaysia', 'malaysia', 60, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (133, 'MV', 'Maldives', 'maldives', 960, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (134, 'ML', 'Mali', 'mali', 223, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (135, 'MT', 'Malta', 'malta', 356, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (136, 'XM', 'Man (Isle of)', 'man-isle-of', 44, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (137, 'MH', 'Marshall Islands', 'marshall-islands', 692, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (138, 'MQ', 'Martinique', 'martinique', 596, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (139, 'MR', 'Mauritania', 'mauritania', 222, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (140, 'MU', 'Mauritius', 'mauritius', 230, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (141, 'YT', 'Mayotte', 'mayotte', 269, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (142, 'MX', 'Mexico', 'mexico', 52, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (143, 'FM', 'Micronesia', 'micronesia', 691, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (144, 'MD', 'Moldova', 'moldova', 373, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (145, 'MC', 'Monaco', 'monaco', 377, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (146, 'MN', 'Mongolia', 'mongolia', 976, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (147, 'MS', 'Montserrat', 'montserrat', 1664, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (148, 'MA', 'Morocco', 'morocco', 212, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (149, 'MZ', 'Mozambique', 'mozambique', 258, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (150, 'MM', 'Myanmar', 'myanmar', 95, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (151, 'NA', 'Namibia', 'namibia', 264, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (152, 'NR', 'Nauru', 'nauru', 674, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (153, 'NP', 'Nepal', 'nepal', 977, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (154, 'AN', 'Netherlands Antilles', 'netherlands-antilles', 599, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (155, 'NL', 'Netherlands The', 'netherlands-the', 31, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (156, 'NC', 'New Caledonia', 'new-caledonia', 687, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (157, 'NZ', 'New Zealand', 'new-zealand', 64, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (158, 'NI', 'Nicaragua', 'nicaragua', 505, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (159, 'NE', 'Niger', 'niger', 227, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (160, 'NG', 'Nigeria', 'nigeria', 234, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (161, 'NU', 'Niue', 'niue', 683, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (162, 'NF', 'Norfolk Island', 'norfolk-island', 672, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (163, 'MP', 'Northern Mariana Islands', 'northern-mariana-islands', 1670, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (164, 'NO', 'Norway', 'norway', 47, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (165, 'OM', 'Oman', 'oman', 968, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (166, 'PK', 'Pakistan', 'pakistan', 92, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (167, 'PW', 'Palau', 'palau', 680, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (168, 'PS', 'Palestinian Territory Occupied', 'palestinian-territory-occupied', 970, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (169, 'PA', 'Panama', 'panama', 507, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (170, 'PG', 'Papua new Guinea', 'papua-new-guinea', 675, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (171, 'PY', 'Paraguay', 'paraguay', 595, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (172, 'PE', 'Peru', 'peru', 51, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (173, 'PH', 'Philippines', 'philippines', 63, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (174, 'PN', 'Pitcairn Island', 'pitcairn-island', 0, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (175, 'PL', 'Poland', 'poland', 48, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (176, 'PT', 'Portugal', 'portugal', 351, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (177, 'PR', 'Puerto Rico', 'puerto-rico', 1787, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (178, 'QA', 'Qatar', 'qatar', 974, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (179, 'RE', 'Reunion', 'reunion', 262, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (180, 'RO', 'Romania', 'romania', 40, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (181, 'RU', 'Russia', 'russia', 70, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (182, 'RW', 'Rwanda', 'rwanda', 250, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (183, 'SH', 'Saint Helena', 'saint-helena', 290, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (184, 'KN', 'Saint Kitts And Nevis', 'saint-kitts-and-nevis', 1869, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (185, 'LC', 'Saint Lucia', 'saint-lucia', 1758, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (186, 'PM', 'Saint Pierre and Miquelon', 'saint-pierre-and-miquelon', 508, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (187, 'VC', 'Saint Vincent And The Grenadines', 'saint-vincent-and-the-grenadines', 1784, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (188, 'WS', 'Samoa', 'samoa', 684, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (189, 'SM', 'San Marino', 'san-marino', 378, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (190, 'ST', 'Sao Tome and Principe', 'sao-tome-and-principe', 239, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (191, 'SA', 'Saudi Arabia', 'saudi-arabia', 966, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (192, 'SN', 'Senegal', 'senegal', 221, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (193, 'RS', 'Serbia', 'serbia', 381, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (194, 'SC', 'Seychelles', 'seychelles', 248, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (195, 'SL', 'Sierra Leone', 'sierra-leone', 232, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (196, 'SG', 'Singapore', 'singapore', 65, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (197, 'SK', 'Slovakia', 'slovakia', 421, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (198, 'SI', 'Slovenia', 'slovenia', 386, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (199, 'XG', 'Smaller Territories of the UK', 'smaller-territories-of-the-uk', 44, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (200, 'SB', 'Solomon Islands', 'solomon-islands', 677, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (201, 'SO', 'Somalia', 'somalia', 252, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (202, 'ZA', 'South Africa', 'south-africa', 27, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (203, 'GS', 'South Georgia', 'south-georgia', 0, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (204, 'SS', 'South Sudan', 'south-sudan', 211, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (205, 'ES', 'Spain', 'spain', 34, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (206, 'LK', 'Sri Lanka', 'sri-lanka', 94, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (207, 'SD', 'Sudan', 'sudan', 249, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (208, 'SR', 'Suriname', 'suriname', 597, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (209, 'SJ', 'Svalbard And Jan Mayen Islands', 'svalbard-and-jan-mayen-islands', 47, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (210, 'SZ', 'Swaziland', 'swaziland', 268, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (211, 'SE', 'Sweden', 'sweden', 46, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (212, 'CH', 'Switzerland', 'switzerland', 41, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (213, 'SY', 'Syria', 'syria', 963, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (214, 'TW', 'Taiwan', 'taiwan', 886, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (215, 'TJ', 'Tajikistan', 'tajikistan', 992, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (216, 'TZ', 'Tanzania', 'tanzania', 255, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (217, 'TH', 'Thailand', 'thailand', 66, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (218, 'TG', 'Togo', 'togo', 228, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (219, 'TK', 'Tokelau', 'tokelau', 690, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (220, 'TO', 'Tonga', 'tonga', 676, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (221, 'TT', 'Trinidad And Tobago', 'trinidad-and-tobago', 1868, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (222, 'TN', 'Tunisia', 'tunisia', 216, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (223, 'TR', 'Turkey', 'turkey', 90, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (224, 'TM', 'Turkmenistan', 'turkmenistan', 7370, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (225, 'TC', 'Turks And Caicos Islands', 'turks-and-caicos-islands', 1649, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (226, 'TV', 'Tuvalu', 'tuvalu', 688, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (227, 'UG', 'Uganda', 'uganda', 256, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (228, 'UA', 'Ukraine', 'ukraine', 380, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (229, 'AE', 'United Arab Emirates', 'united-arab-emirates', 971, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (230, 'GB', 'United Kingdom', 'united-kingdom', 44, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (232, 'UM', 'United States Minor Outlying Islands', 'united-states-minor-outlying-islands', 1, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (233, 'UY', 'Uruguay', 'uruguay', 598, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (234, 'UZ', 'Uzbekistan', 'uzbekistan', 998, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (235, 'VU', 'Vanuatu', 'vanuatu', 678, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (236, 'VA', 'Vatican City State (Holy See)', 'vatican-city-state-holy-see', 39, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (237, 'VE', 'Venezuela', 'venezuela', 58, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (238, 'VN', 'Vietnam', 'vietnam', 84, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (239, 'VG', 'Virgin Islands (British)', 'virgin-islands-british', 1284, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (240, 'VI', 'Virgin Islands (US)', 'virgin-islands-us', 1340, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (241, 'WF', 'Wallis And Futuna Islands', 'wallis-and-futuna-islands', 681, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (242, 'EH', 'Western Sahara', 'western-sahara', 212, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (243, 'YE', 'Yemen', 'yemen', 967, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (244, 'YU', 'Yugoslavia', 'yugoslavia', 38, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (245, 'ZM', 'Zambia', 'zambia', 260, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (246, 'ZW', 'Zimbabwe', 'zimbabwe', 263, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (247, 'AF', 'Afghanistan', 'afghanistan', 93, 1);
INSERT INTO `ci_countries` (`id`, `sortname`, `name`, `slug`, `phonecode`, `status`) VALUES (248, 'AL', 'Albania', 'albania', 355, 1);


#
# TABLE STRUCTURE FOR: ci_email_template_variables
#

DROP TABLE IF EXISTS `ci_email_template_variables`;

CREATE TABLE `ci_email_template_variables` (
  `id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `variable_name` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ci_email_template_variables` (`id`, `template_id`, `variable_name`) VALUES (1, 1, '{FULLNAME}');
INSERT INTO `ci_email_template_variables` (`id`, `template_id`, `variable_name`) VALUES (2, 1, '{VERIFICATION_LINK}');
INSERT INTO `ci_email_template_variables` (`id`, `template_id`, `variable_name`) VALUES (3, 2, '{RESET_LINK}');
INSERT INTO `ci_email_template_variables` (`id`, `template_id`, `variable_name`) VALUES (4, 2, '{FULLNAME}');


#
# TABLE STRUCTURE FOR: ci_email_templates
#

DROP TABLE IF EXISTS `ci_email_templates`;

CREATE TABLE `ci_email_templates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ci_email_templates` (`id`, `name`, `slug`, `subject`, `body`, `last_update`) VALUES (1, 'Email Verification', 'email-verification', 'Activate Your Account', '<p></p>\n\n<p>Hi  <b>{FULLNAME}</b>,<br><br></p><p>Welcome to LightAdmin!<br>Active your account with the link above and start your Career.</p><p>To verify your email, please click the link below:<br> {VERIFICATION_LINK}</p><p>\n\n</p><div><b>Regards,</b></div><div><b>Team</b></div>\n\n<p></p>', '2019-11-26 18:06:39');
INSERT INTO `ci_email_templates` (`id`, `name`, `slug`, `subject`, `body`, `last_update`) VALUES (2, 'Forget Password', 'forget-password', 'Recover your password', '<p>\n\n</p><p>Hi  <b>{FULLNAME}</b>,<br><br></p><p>Welcome to LightAdmin!<br></p><p>We have received a request to reset your password. If you did not initiate this request, you can simply ignore this message and no action will be taken.</p><p><br>To reset your password, please click the link below:<br> {RESET_LINK}</p>\n\n<p></p>', '2019-11-26 17:44:41');
INSERT INTO `ci_email_templates` (`id`, `name`, `slug`, `subject`, `body`, `last_update`) VALUES (3, 'General Notification', '', 'aaaaa', '<p>asdfasdfasdfasd </p>', '2019-08-26 02:42:47');


#
# TABLE STRUCTURE FOR: ci_language
#

DROP TABLE IF EXISTS `ci_language`;

CREATE TABLE `ci_language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_name` varchar(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `ci_language` (`id`, `name`, `short_name`, `status`, `created_at`) VALUES (2, 'English', 'en', 1, '2019-09-16 01:13:17');
INSERT INTO `ci_language` (`id`, `name`, `short_name`, `status`, `created_at`) VALUES (3, 'French', 'fr', 1, '2019-09-16 08:11:08');


#
# TABLE STRUCTURE FOR: ci_uploaded_files
#

DROP TABLE IF EXISTS `ci_uploaded_files`;

CREATE TABLE `ci_uploaded_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

INSERT INTO `ci_uploaded_files` (`id`, `name`, `created_at`) VALUES (81, 'uploads/0fe0382a27bbc4336939a4dd4b3acee2.jpg', '2019-11-26 21:07:49');


#
# TABLE STRUCTURE FOR: failed_jobs
#

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: gb_general_settings
#

DROP TABLE IF EXISTS `gb_general_settings`;

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
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `gb_general_settings` (`id`, `favicon`, `logo`, `application_name`, `timezone`, `currency`, `default_language`, `copyright`, `email_from`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `facebook_link`, `twitter_link`, `google_link`, `youtube_link`, `linkedin_link`, `instagram_link`, `recaptcha_secret_key`, `recaptcha_site_key`, `recaptcha_lang`, `created_date`, `updated_date`) VALUES (1, 'assets/img/favicon.ico', 'assets/img/dc48701e5a6a300744b873b63f772101.png', 'Crescendo', 'America/Adak', 'USD', 2, 'Copyright © 2021 Crescendo System All rights reserved.', 'info@infinityglobal.com', 'smtp.domain.com', 567, 'info@domain.com', '123456789', 'https://facebook.com', 'https://twitter.com', 'https://google.com', 'https://youtube.com', 'https://linkedin.com', 'https://instagram.com', '', '', 'en', '2019-12-02 08:12:26', '2019-12-02 08:12:26');


#
# TABLE STRUCTURE FOR: gb_menu
#

DROP TABLE IF EXISTS `gb_menu`;

CREATE TABLE `gb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `controller_name` varchar(255) DEFAULT NULL,
  `fa_icon` varchar(64) DEFAULT NULL,
  `sort_order` int(4) NOT NULL,
  `rec_status` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=951 DEFAULT CHARSET=latin1;

INSERT INTO `gb_menu` (`id`, `module_name`, `controller_name`, `fa_icon`, `sort_order`, `rec_status`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (100, 'Local Admin', 'localadmin', 'fa-user-o', 200, 1, 4, '2021-08-03 00:00:00', 0, '2021-08-03 00:00:00', 0);
INSERT INTO `gb_menu` (`id`, `module_name`, `controller_name`, `fa_icon`, `sort_order`, `rec_status`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (200, 'Auditions', 'auditions', 'fa-folder-o', 500, 1, 0, '2020-07-28 00:07:14', 0, '2020-07-28 00:07:14', 0);
INSERT INTO `gb_menu` (`id`, `module_name`, `controller_name`, `fa_icon`, `sort_order`, `rec_status`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (300, 'Recitals', 'recital', 'fa-tasks', 600, 1, 2, '2020-07-28 00:07:14', 0, '2020-07-28 00:07:14', 0);
INSERT INTO `gb_menu` (`id`, `module_name`, `controller_name`, `fa_icon`, `sort_order`, `rec_status`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (400, 'Applications', 'applications', 'fa-floppy-o', 700, 1, 0, '2020-07-28 00:07:14', 0, '2020-07-28 00:07:14', 0);
INSERT INTO `gb_menu` (`id`, `module_name`, `controller_name`, `fa_icon`, `sort_order`, `rec_status`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (500, 'Apply for Auditions', 'applyauditions', 'fa-folder-o', 800, 1, 1, '2021-07-09 00:00:00', 0, '2021-07-09 00:00:00', 0);
INSERT INTO `gb_menu` (`id`, `module_name`, `controller_name`, `fa_icon`, `sort_order`, `rec_status`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (600, 'Active Applications', 'activeapplication', 'fa-floppy-o', 900, 1, 1, '2021-07-09 00:00:00', 0, '2021-07-09 00:00:00', 0);
INSERT INTO `gb_menu` (`id`, `module_name`, `controller_name`, `fa_icon`, `sort_order`, `rec_status`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (700, 'Recital History', 'recitalhistory', 'fa-history', 950, 1, 1, '2021-07-09 00:00:00', 0, '2021-07-09 00:00:00', 0);
INSERT INTO `gb_menu` (`id`, `module_name`, `controller_name`, `fa_icon`, `sort_order`, `rec_status`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (800, 'Audition Center', 'audition_location', 'fa-map-marker', 300, 1, 4, '2021-07-19 00:00:00', 0, '2021-07-19 00:00:00', 0);
INSERT INTO `gb_menu` (`id`, `module_name`, `controller_name`, `fa_icon`, `sort_order`, `rec_status`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (900, 'Recital Venue', 'recital_location', 'fa-map-marker', 400, 1, 4, '2021-09-06 00:00:00', 0, '2021-09-06 00:00:00', 0);
INSERT INTO `gb_menu` (`id`, `module_name`, `controller_name`, `fa_icon`, `sort_order`, `rec_status`, `role`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (950, 'Backup DB', 'backup_db', 'fa-refresh', 100, 1, 4, '2021-09-18 00:00:00', 0, '2021-09-18 00:00:00', 0);


#
# TABLE STRUCTURE FOR: gb_menu_submenu
#

DROP TABLE IF EXISTS `gb_menu_submenu`;

CREATE TABLE `gb_menu_submenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(64) DEFAULT NULL,
  `fa_icon` varchar(64) DEFAULT NULL,
  `sort_order` int(4) NOT NULL,
  `rec_status` tinyint(1) NOT NULL,
  `permission` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=921 DEFAULT CHARSET=latin1;

INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (201, 200, 'Little Mozarts', 'auditions/index', '', 203, 1, 0, '2020-11-25 00:00:00', 0, '2020-11-25 00:00:00', 0);
INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (202, 200, 'Crescendo', 'auditions/crescendo_list', '', 202, 1, 0, '2020-11-25 00:00:00', 0, '2020-11-25 00:00:00', 0);
INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (301, 300, 'Little Mozarts', 'recital/index', '', 303, 1, 0, '2020-08-18 15:47:32', 0, '2020-08-18 15:47:32', 0);
INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (302, 300, 'Crescendo', 'recital/crescendo_list', '', 302, 1, 0, '2020-08-18 15:47:32', 0, '2020-08-18 15:47:32', 0);
INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (402, 400, 'Little Mozarts', 'applications/index', '', 404, 1, 0, '2021-04-04 00:00:00', 0, '2021-04-04 00:00:00', 0);
INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (403, 400, 'Crescendo', 'applications/crescendo', NULL, 403, 1, 0, '2021-04-04 00:00:00', 0, '2021-04-04 00:00:00', 0);
INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (501, 500, 'Little Mozarts', 'applyauditions/index', '', 503, 1, 0, '2021-07-13 00:00:00', 0, '2021-07-13 00:00:00', 0);
INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (502, 500, 'Crescendo', 'applyauditions/crescendo', '', 502, 1, 0, '2021-07-13 00:00:00', 0, '2021-07-13 00:00:00', 0);
INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (601, 600, 'Little Mozarts', 'activeapplication/index', NULL, 603, 1, 0, '2021-07-14 00:00:00', 0, '2021-07-14 00:00:00', 0);
INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (602, 600, 'Crescendo', 'activeapplication/crescendo', NULL, 602, 1, 0, '2021-07-14 00:00:00', 0, '2021-07-14 00:00:00', 0);
INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (701, 700, 'Little Mozarts', 'recitalhistory/index', NULL, 703, 1, 0, '2021-07-14 00:00:00', 0, '2021-07-14 00:00:00', 0);
INSERT INTO `gb_menu_submenu` (`id`, `parent`, `name`, `link`, `fa_icon`, `sort_order`, `rec_status`, `permission`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (702, 700, 'Crescendo', 'recitalhistory/crescendo', NULL, 702, 1, 0, '2021-07-14 00:00:00', 0, '2021-07-14 00:00:00', 0);


#
# TABLE STRUCTURE FOR: gb_module
#

DROP TABLE IF EXISTS `gb_module`;

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

INSERT INTO `gb_module` (`module_id`, `module_name`, `controller_name`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, 'admin', 'admin', 1, '2020-07-26 22:55:55', 0, '2020-07-26 22:55:55', 0);
INSERT INTO `gb_module` (`module_id`, `module_name`, `controller_name`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (2, 'role', 'role', 1, '2020-07-26 22:55:55', 0, '2020-07-26 22:55:55', 0);


#
# TABLE STRUCTURE FOR: gb_roles
#

DROP TABLE IF EXISTS `gb_roles`;

CREATE TABLE `gb_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rec_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `gb_roles` (`id`, `title`, `description`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, 'Super Admin', '', 1, '2020-07-26 01:31:41', 0, '2020-07-26 01:31:41', 0);
INSERT INTO `gb_roles` (`id`, `title`, `description`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (2, 'Local Admin', '', 1, '2020-07-26 01:31:41', 0, '2020-07-26 01:31:41', 0);
INSERT INTO `gb_roles` (`id`, `title`, `description`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (3, 'Teacher', '', 1, '2020-07-26 01:31:41', 0, '2020-07-26 01:31:41', 0);
INSERT INTO `gb_roles` (`id`, `title`, `description`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (4, 'Student', '', 1, '2020-07-26 01:31:41', 0, '2020-07-26 01:31:41', 0);
INSERT INTO `gb_roles` (`id`, `title`, `description`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (5, 'Parent', '', 1, '2020-07-26 01:31:41', 0, '2020-07-26 01:31:41', 0);


#
# TABLE STRUCTURE FOR: gb_roles_rel_module
#

DROP TABLE IF EXISTS `gb_roles_rel_module`;

CREATE TABLE `gb_roles_rel_module` (
  `roles_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `rec_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `gb_roles_rel_module` (`roles_id`, `module_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, 1, 1, '2020-07-26 22:57:08', 0, '2020-07-26 22:57:08', 0);
INSERT INTO `gb_roles_rel_module` (`roles_id`, `module_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, 2, 1, '2020-07-26 22:57:08', 0, '2020-07-26 22:57:08', 0);
INSERT INTO `gb_roles_rel_module` (`roles_id`, `module_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (2, 1, 1, '2020-07-26 22:57:08', 0, '2020-07-26 22:57:08', 0);
INSERT INTO `gb_roles_rel_module` (`roles_id`, `module_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (2, 2, 1, '2020-07-26 22:57:08', 0, '2020-07-26 22:57:08', 0);


#
# TABLE STRUCTURE FOR: gb_roles_rel_permissions
#

DROP TABLE IF EXISTS `gb_roles_rel_permissions`;

CREATE TABLE `gb_roles_rel_permissions` (
  `roles_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `rec_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `gb_roles_rel_permissions` (`roles_id`, `permission_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, 1001, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0);
INSERT INTO `gb_roles_rel_permissions` (`roles_id`, `permission_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, 1003, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0);
INSERT INTO `gb_roles_rel_permissions` (`roles_id`, `permission_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, 9001, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0);
INSERT INTO `gb_roles_rel_permissions` (`roles_id`, `permission_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, 9003, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0);
INSERT INTO `gb_roles_rel_permissions` (`roles_id`, `permission_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (2, 1001, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0);
INSERT INTO `gb_roles_rel_permissions` (`roles_id`, `permission_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (2, 1003, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0);
INSERT INTO `gb_roles_rel_permissions` (`roles_id`, `permission_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (2, 9001, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0);
INSERT INTO `gb_roles_rel_permissions` (`roles_id`, `permission_id`, `rec_status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (2, 9003, 1, '2020-07-26 22:01:11', 0, '2020-07-26 22:01:11', 0);


#
# TABLE STRUCTURE FOR: migrations
#

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);


#
# TABLE STRUCTURE FOR: password_resets
#

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

#
# TABLE STRUCTURE FOR: tbl_applications
#

DROP TABLE IF EXISTS `tbl_applications`;

CREATE TABLE `tbl_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audition_type` int(11) NOT NULL COMMENT '1:little_morarts, 2:crescendo, 3:recital_little_morarts, 4:recital_crescendo',
  `audition_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `studying_year` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `instrument` int(11) NOT NULL,
  `other_instrument` varchar(255) DEFAULT NULL,
  `performance_type` varchar(255) NOT NULL,
  `performance_price` varchar(255) NOT NULL,
  `co_performers` varchar(255) DEFAULT NULL,
  `co_instrument` int(1) DEFAULT NULL,
  `co_other_instrument` varchar(255) DEFAULT NULL,
  `co_performers2` varchar(255) DEFAULT NULL,
  `co_instrument2` int(11) DEFAULT NULL,
  `co_other_instrument2` varchar(255) DEFAULT NULL,
  `co_performers3` varchar(255) DEFAULT NULL,
  `co_instrument3` int(11) DEFAULT NULL,
  `co_other_instrument3` varchar(255) DEFAULT NULL,
  `co_performers4` varchar(255) DEFAULT NULL,
  `co_instrument4` int(11) DEFAULT NULL,
  `co_other_instrument4` varchar(255) DEFAULT NULL,
  `co_extra_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `composer` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_country_id` int(11) NOT NULL,
  `teacher_address` varchar(255) NOT NULL,
  `teacher_mobile` varchar(255) DEFAULT NULL,
  `payment_type` tinyint(1) NOT NULL COMMENT '1:paypal, 2:ordercheck',
  `transaction_id` varchar(255) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `payment_code` varchar(255) DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `paid_amount` int(11) NOT NULL,
  `islate` tinyint(1) NOT NULL DEFAULT 0,
  `late_fee` varchar(255) DEFAULT NULL,
  `special_request` tinyint(1) NOT NULL DEFAULT 0,
  `request_time` varchar(255) DEFAULT NULL,
  `request_reason` varchar(255) DEFAULT NULL,
  `request_answer` varchar(255) DEFAULT NULL,
  `confirm_payment` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1:paid, 0:unpaid',
  `score` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `evaluation` varchar(255) DEFAULT NULL,
  `isonline` tinyint(1) NOT NULL DEFAULT 0,
  `video_link` varchar(255) DEFAULT NULL,
  `is_ticket` tinyint(1) NOT NULL DEFAULT 0,
  `ticket_quantity` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `request_photo` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT 0,
  `role_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (4, 1, 1, 'morgan', 'morgan@gmail.com', 1, 'asdasd', '123123', '2021-07-14', 0, 0, 0, 2, NULL, '1', '50', 'ddfgds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'aaaa', 'sssss', '6', 'teacher1', 'teacher@gmail.com', 1, 'sdfg12', '234546456', 1, '123qwe', '2021-07-16', '', 1, 0, 0, NULL, 0, '2', NULL, '', 0, '7.5', 'sdfsdfsdf', '', 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-07-16 08:45:54', 4, '2021-08-25 15:01:43', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (5, 1, 1, 'malcom stuward', '', 1, 'asdasd', '123123', '2017-06-13', 0, 0, 0, 1, NULL, '1', '50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '23', 'dfgsdfg', '', 1, 'sdfg', 'ertert', 1, 'adfsa23423', '2021-07-21', '', 1, 0, 0, NULL, 0, '2', NULL, '', 0, '9', 'very good', 'anna_crescendo_2021_202107281627483112.pdf', 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-07-22 00:31:43', 1, '2021-07-28 05:38:32', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (6, 1, 1, 'chen', 'chen@gmail.com', 1, 'ggggg', '234234234', '2021-07-21', 0, 0, 0, 1, NULL, '1', '50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'sssss', '12', 'localadmin1', 'localadmin1@gmail.com', 1, 'sdfg12123', '32453453', 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '', NULL, '', 0, '5', 'iopuiop', NULL, 0, '', 0, NULL, 0, 0, '2', 0, 2, '2021-07-22 07:22:06', 2, '2021-07-27 22:03:15', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (7, 1, 1, 'student1', 'student1@gmail.com', 1, 'asdasdasd', '123345', '2021-07-20', 0, 0, 0, 1, NULL, '2', '70', 'dolmae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'betheeven', 'sonata 19999', '15', 'dolpari', 'dolpari@gmail.com', 1, 'dfggggggggg', '435234', 2, '', '0000-00-00', 'tttttttttttt4444444444', 1, 0, 0, NULL, 0, '', NULL, '', 0, '5', 'very good', 'anna_little_mozart_2021_202107281627483349.pdf', 0, '', 0, NULL, 0, 0, 'c8c41c4a18675a74e01c8a20e8a0f662', 0, 0, '2021-07-22 07:34:11', 4, '2021-07-28 05:42:29', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (8, 1, 3, 'harimu', 'harimu@gmail.com', 1, 'gggggw123', '2342342342', '2021-08-18', 0, 0, 0, 2, NULL, '1', '50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mozart 18', 'sonata 19', '8', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 1, 'adfsa23423', '2021-08-02', '', 1, 0, 0, NULL, 0, '', NULL, '', 0, '7', 'yyyy', '', 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-03 03:33:24', 1, '2021-08-13 12:51:34', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (9, 2, 1, 'dol head', 'dol@gmail.com', 1, 'asdasdasd123', '4332123', '2021-08-02', 0, 0, 0, 31, 'dfdfdf', '2', '100', 'dolmae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sadf2222', 'dfgdfg2222', '5', 'super', 'super@gmail.com', 1, 'qweqwe', '11112222', 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 1, '1', 'handicap', '', 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-03 04:20:35', 1, '2021-08-03 06:02:43', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (10, 1, 1, 'maaa', 'maaa@gmail.com', 1, 'ggggg', '123345', '2025-02-13', 0, 0, 0, 1, '', '1', '50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '34', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '', NULL, '', 0, '6', 'very good', '', 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-04 02:27:07', 1, '2021-08-14 01:21:12', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (11, 1, 3, 'qqq', 'qqq@gmail.com', 1, 'asdasd', '123123', '2022-03-15', 0, 0, 0, 1, '', '1', '50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '22', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '', NULL, '', 0, '8', '88888', 'Stage poster-32x40 -01-09-2018_202108141628936500.pdf', 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-04 02:29:02', 1, '2021-08-14 01:21:40', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (12, 1, 3, 'ssdsd', 'sdsd', 1, 'asdasd', '123123', '2025-02-25', 0, 0, 0, 1, '', '1', '50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '21', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '', NULL, '', 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-04 02:30:19', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (13, 1, 3, 'chen11', 'chen11@gmail.com', 1, 'asdasd', '123123', '2002-02-15', 0, 0, 0, 1, '', '1', '50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '3', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, '', '0000-00-00', 'tttttttttttt4444444444', 1, 0, 0, NULL, 0, '', NULL, '', 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-04 02:32:18', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (14, 1, 3, 'chen11', 'chen11@gmail.com', 1, 'asdasd', '123123', '2025-12-02', 0, 0, 0, 1, '', '1', '50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '3', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, '', '0000-00-00', 'tttttttttttt4444444444', 1, 0, 0, NULL, 0, '', NULL, '', 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-04 02:32:46', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (15, 1, 3, 'chen11', 'chen11@gmail.com', 1, 'asdasd', '123123', '2025-12-05', 0, 0, 0, 1, '', '1', '50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '3', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 1, '123qwe', '0222-02-25', 'tttttttttttt4444444444', 1, 0, 0, NULL, 0, '', NULL, '', 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-04 02:40:52', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (16, 1, 3, 'www', 'www@gmail.com', 1, 'asdasd', '123123', '2021-08-13', 0, 0, 0, 1, '', '1', '50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '33', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '', NULL, '', 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-04 02:44:23', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (17, 1, 1, 'ttt', 'ttt@gmail.com', 1, 'ggggg', '123123', '2021-08-19', 0, 0, 0, 1, '', '1', '50', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '6', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, '', '0000-00-00', 'tttttttttttt4444444444', 1, 0, 0, NULL, 1, '2', 'handicap', '', 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-04 03:37:45', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (18, 1, 1, 'student1', 'student1@gmail.com', 1, 'asd', '123123', '2021-08-13', 0, 3, 1, 1, '', '1', '50', '', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '4', 'dolpari1', 'dolpari1@gmail.com', 1, 'sdfg12123', '32453453', 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'c8c41c4a18675a74e01c8a20e8a0f662', 0, 0, '2021-08-05 14:26:56', 4, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (19, 3, 1, 'morgan', 'morgan@gmail.com', 1, 'asdasd', '123123', '2016-06-13', 0, 4, 1, 1, '', '1', '50', '', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '6', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, '4', 'iopuiop', '', 0, '', 0, 30, 300, 0, 'super', 0, 0, '2021-08-13 11:58:03', 1, '2021-08-13 12:54:49', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (20, 1, 1, 'y123', 'y123@gmail.com', 1, 'asdasd', '123345', '2021-08-10', 0, 3, 2, 31, 'dfdfdf', '5', '200', 'co1', 31, 'wewewe', 'co2', 31, 'wewe2', 'co3', 1, '', 'co4', 17, '', '', 'qwesdf', 'dfgdfg', '8', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-26 11:50:50', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (24, 1, 1, 'sssss', 'morgan32@gmail.com', 1, 'asdasd', '123123', '0000-00-00', 0, 4, 0, 1, '', '1', '50', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '6', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, NULL, NULL, NULL, 0, 0, 0, '', 0, '1', '', NULL, 0, '4', 'iopuiop', NULL, 0, '', 0, NULL, 300, 0, '', 0, 0, '2021-08-29 16:20:12', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (25, 1, 3, 'test122', 'test232@gmail.com', 1, 'ssss', '234', '0000-00-00', 0, 44, 0, 31, 'giutar', '1', '60', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdf', 'lkj', '5', 'super', 'super@gmail.com', 1, 'sdfs', '888', 2, NULL, NULL, NULL, 0, 0, 0, '', 1, '1', '', NULL, 0, '', '', NULL, 0, '', 0, NULL, 0, 0, '', 0, 0, '2021-08-29 16:20:12', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (26, 2, 1, 'sssss', 'morgan32@gmail.com', 1, 'asdasd', '123123', '0000-00-00', 0, 4, 0, 1, '', '1', '50', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '6', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, NULL, NULL, NULL, 0, 0, 0, '', 0, '1', '', NULL, 0, '4', 'iopuiop', NULL, 0, '', 0, NULL, 300, 0, '', 0, 0, '2021-08-29 16:55:20', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (27, 2, 2, 'test122', 'test232@gmail.com', 1, 'ssss', '234', '0000-00-00', 0, 44, 0, 31, 'giutar', '1', '60', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdf', 'lkj', '5', 'super', 'super@gmail.com', 1, 'sdfs', '888', 2, NULL, NULL, NULL, 0, 0, 0, '', 1, '1', '', NULL, 0, '', '', NULL, 0, '', 0, NULL, 0, 0, '', 0, 0, '2021-08-29 16:55:20', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (28, 4, 1, 'sssss', 'morgan32@gmail.com', 1, 'asdasd', '123123', '0000-00-00', 0, 4, 0, 1, '', '1', '50', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '6', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, NULL, NULL, NULL, 0, 0, 0, '', 0, '1', '', NULL, 0, '4', 'iopuiop', NULL, 0, '', 0, NULL, 300, 0, '', 0, 0, '2021-08-29 17:09:26', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (29, 4, 1, 'test122', 'test232@gmail.com', 1, 'ssss', '234', '0000-00-00', 0, 44, 0, 31, 'giutar', '1', '60', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdf', 'lkj', '5', 'super', 'super@gmail.com', 1, 'sdfs', '888', 2, NULL, NULL, NULL, 0, 0, 0, '', 1, '1', '', NULL, 0, '', '', NULL, 0, '', 0, NULL, 0, 0, '', 0, 0, '2021-08-29 17:09:26', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (30, 3, 1, 'sssss', 'morgan32@gmail.com', 1, 'asdasd', '123123', '0000-00-00', 0, 4, 0, 1, '', '1', '50', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '6', 'super', 'super@gmail.com', 1, 'qweqwe', '1111', 2, NULL, NULL, NULL, 0, 0, 0, '', 0, '1', '', NULL, 0, '4', 'iopuiop', NULL, 0, '', 0, NULL, 300, 0, '', 0, 0, '2021-08-29 17:16:07', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (31, 3, 3, 'test122', 'test232@gmail.com', 1, 'ssss', '234', '0000-00-00', 0, 44, 0, 31, 'giutar', '1', '60', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdf', 'lkj', '5', 'super', 'super@gmail.com', 1, 'sdfs', '888', 2, NULL, NULL, NULL, 0, 0, 0, '', 1, '1', '', NULL, 0, '30', 'iopuiop', '', 0, '', 0, NULL, 0, 0, '', 0, 0, '2021-08-29 17:16:07', 1, '2021-09-15 15:42:09', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (32, 3, 1, 'maaa', 'maaa@gmail.com', 1, 'asdasd', '123123', '2021-08-03', 0, 2, 1, 1, '', '1', '50', '', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'dfgdfg', '5', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, '5.5', 'iopuiop', '', 0, '', 0, 30, 2150, 0, 'super', 0, 0, '2021-08-30 15:26:39', 1, '2021-09-15 15:42:24', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (33, 2, 1, 'iop', 'iop@gmail.com', 1, 'asdasd', '123123', '2021-08-10', 7, 4, 4, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', '', 1, '', '', 'qwesdf', 'dfgdfg', '8', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-30 15:38:14', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (34, 2, 1, 'ghj', 'ghj', 1, 'ghj', '123123', '2021-08-02', 7, 4, 4, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', '', 1, '', '', 'qwesdf', 'dfgdfg', '5', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-30 15:40:08', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (35, 2, 1, 'dfg', 'dfg', 1, 'asdasd', '55555', '2021-08-03', 8, 4, 4, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', '', 1, '', '', 'qwesdf', 'dfgdfg', '6', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-30 15:41:06', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (36, 2, 1, 'maaa', 'maaa@gmail.com', 1, 'asdasd', '123123', '2021-08-07', 8, 2, 2, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', '', 1, '', '', 'qwesdf', 'dfgdfg', '5', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-30 15:53:42', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (37, 2, 1, 'maaa', 'maaa@gmail.com', 1, 'asdasd', '123123', '2021-08-01', 8, 5, 5, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', '', 1, '', '', 'qwesdf', 'dfgdfg', '5', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-30 15:55:04', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (38, 1, 1, 'maaa', 'maaa@gmail.com', 1, 'ggggg', '123123', '2021-08-03', 8, 5, 1, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', '', 1, '', '', 'qwesdf', 'dfgdfg', '6', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-30 15:57:30', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (39, 1, 1, 'maaa', 'maaa@gmail.com', 1, 'asdasd', '123123', '2021-08-02', 9, 5, 1, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', '', 1, '', '', 'qwesdf', 'dfgdfg', '7', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-30 15:59:28', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (40, 3, 1, 'popopo', 'popopo', 1, 'asdasd', '123123', '2021-08-04', 8, 5, 1, 1, '', '4', '400', 'co1', 2, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'qwesdf', 'sdf', '5', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, 0, 50, 0, 'super', 0, 0, '2021-08-31 11:12:16', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (41, 1, 3, 'uuuuuu', 'uuuuuu', 1, 'ggggg', '123123', '2021-08-05', 7, 4, 1, 1, '', '3', '200', 'co1', 1, '', 'co2', 1, '', '', 1, '', NULL, NULL, NULL, '', 'qwesdf', 'dfgdfg', '7', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-08-31 11:14:28', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (42, 3, 2, 'maaa', 'maaa@gmail.com', 1, 'asdasd', '123123', '2021-09-10', 5, 2, 1, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', NULL, NULL, NULL, '', 'qwesdf', 'dfgdfg', '5', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 1, 30, 750, 0, 'super', 0, 0, '2021-09-01 22:14:58', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (43, 2, 1, 'maaa', 'maaa@gmail.com', 1, 'asdasd', '123123', '2021-09-10', 8, 5, 5, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', NULL, NULL, NULL, '', 'qwesdf', 'dfgdfg', '5', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-09-01 22:15:39', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (44, 1, 1, 'tttt4', 'tttt', 1, 'ggggg', '123123', '2021-09-23', 6, 3, 1, 1, '', '4', '200', 'co1', 1, '', 'co2', 1, '', 'co3', 1, '', 'co4', 31, 'rrrr', '', 'sadf', 'dfgdfg', '7', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-09-01 22:44:48', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (45, 1, 1, 'bb', 'bb', 1, 'asdasd', '123123', '2021-08-30', 8, 5, 1, 1, '', '4', '200', 'co1', 17, '', 'co2', 11, '', 'co3', 1, '', 'co4', 31, 'rrrr', '', 'qwesdf', 'dfgdfg', '5', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'tttttttttttt4444444444', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-09-01 23:19:27', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (46, 1, 1, 'bb', 'bb', 1, 'asdasd', '123123', '2021-08-30', 8, 5, 1, 1, '', '4', '200', 'co1', 17, '', 'co2', 11, '', 'co3', 1, '', 'co4', 31, 'rrrr', '', 'qwesdf', 'dfgdfg', '5', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'tttttttttttt4444444444', 1, 0, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-09-01 23:21:39', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (47, 1, 1, 'maaa', 'maaa@gmail.com', 1, 'asdasd', '123123', '2021-08-30', 0, 5, 1, 1, '', '4', '200', 'co1', 3, '', 'co2', 8, '', 'co3', 1, '', 'co4', 1, '', '[{\"co_performer\":\"co4\",\"co_instrument\":\"1\",\"co_other_instrument\":\"\"},{\"co_performer\":\"co5\",\"co_instrument\":\"1\",\"co_other_instrument\":\"\"},{\"co_performer\":\"co6\",\"co_instrument\":\"1\",\"co_other_instrument\":\"rrrr\"},{\"co_performer\":\"co7\",\"co_instrument\":\"31\",\"co_other_instrument\":\"rrr\"}]', 'qwesdf', 'dfgdfg', '6', 'super', 'super@gmail.com', 1, '', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 0, 0, NULL, 0, '1', '', NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 0, '2021-09-02 01:02:08', 1, '2021-09-02 16:54:26', 1);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (48, 1, 4, 'maaattt', 'maaattt@gmail.com', 1, 'asdasd', '123123', '2021-09-01', 7, 3, 1, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', NULL, NULL, NULL, '[]', 'qwesdf', 'dfgdfg', '5', 'localadmin2', 'localadmin2@gmail.com', 1, 'asdasd', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 100, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, '5', 0, 2, '2021-09-09 21:55:58', 5, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (49, 1, 3, 'bbe', 'bbe', 1, 'ggggg', '123123', '2021-09-01', 7, 5, 1, 1, '', '2', '100', 'co1', 1, '', '', 1, '', '', 1, '', NULL, NULL, NULL, '[]', 'qwesdf', 'dfgdfg', '5', 'super', 'super@gmail.com', 1, 'qweqwe', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 5, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'super', 0, 1, '2021-09-14 07:26:20', 1, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (50, 1, 1, 'student1', 'student1@gmail.com', 1, 'asd', '123123', '2021-09-08', 8, 5, 1, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', NULL, NULL, NULL, '[]', 'qwesdf', 'dfgdfg', '6', 'teacher1', 'teacher@gmail.com', 1, 'sdfg', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 50, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, 'c8c41c4a18675a74e01c8a20e8a0f662', 0, 4, '2021-09-15 15:49:32', 4, NULL, NULL);
INSERT INTO `tbl_applications` (`id`, `audition_type`, `audition_id`, `student_name`, `student_email`, `country_id`, `address`, `mobile_no`, `birthday`, `age`, `studying_year`, `level`, `instrument`, `other_instrument`, `performance_type`, `performance_price`, `co_performers`, `co_instrument`, `co_other_instrument`, `co_performers2`, `co_instrument2`, `co_other_instrument2`, `co_performers3`, `co_instrument3`, `co_other_instrument3`, `co_performers4`, `co_instrument4`, `co_other_instrument4`, `co_extra_data`, `composer`, `title`, `duration`, `teacher`, `teacher_email`, `teacher_country_id`, `teacher_address`, `teacher_mobile`, `payment_type`, `transaction_id`, `transaction_date`, `payment_code`, `is_paid`, `paid_amount`, `islate`, `late_fee`, `special_request`, `request_time`, `request_reason`, `request_answer`, `confirm_payment`, `score`, `place`, `evaluation`, `isonline`, `video_link`, `is_ticket`, `ticket_quantity`, `total_price`, `request_photo`, `token`, `is_delete`, `role_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (51, 1, 3, 'maaa', 'maaa@gmail.com', 1, 'asdasd', '123123', '2021-09-20', 8, 5, 1, 1, '', '1', '50', '', 1, '', '', 1, '', '', 1, '', NULL, NULL, NULL, '[]', 'qwesdf', 'dfgdfg', '6', 'teacher1', 'teacher1@gmail.com', 1, 'qwe', NULL, 2, '', '0000-00-00', 'wewww22342342', 1, 60, 0, NULL, 0, '1', NULL, NULL, 0, NULL, NULL, NULL, 0, '', 0, NULL, 0, 0, '006f52e9102a8d3be2fe5614f42ba989', 0, 3, '2021-09-15 15:50:17', 3, NULL, NULL);


#
# TABLE STRUCTURE FOR: tbl_backup_db
#

DROP TABLE IF EXISTS `tbl_backup_db`;

CREATE TABLE `tbl_backup_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: tbl_crescendo
#

DROP TABLE IF EXISTS `tbl_crescendo`;

CREATE TABLE `tbl_crescendo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local_admin` int(11) NOT NULL,
  `audition_name` varchar(255) NOT NULL,
  `audition_location` varchar(255) NOT NULL,
  `audition_date` date NOT NULL,
  `fee_solo` varchar(255) DEFAULT NULL,
  `fee_duet` varchar(255) DEFAULT NULL,
  `fee_trio` varchar(255) DEFAULT NULL,
  `fee_ensemble` varchar(255) DEFAULT NULL,
  `audition_deadline` date NOT NULL,
  `late_fee` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `remain_duration` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_crescendo` (`id`, `local_admin`, `audition_name`, `audition_location`, `audition_date`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `late_fee`, `duration`, `remain_duration`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (1, 2, 'crescendo 1', '2', '2021-07-13', '50', '100', '200', '400', '2021-07-17', '60', '100', '95', 1, 0, '2021-07-12 22:35:26', '2021-08-31 10:16:48');
INSERT INTO `tbl_crescendo` (`id`, `local_admin`, `audition_name`, `audition_location`, `audition_date`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `late_fee`, `duration`, `remain_duration`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (2, 2, 'test crescendo', '4', '2021-08-10', '50', '100', '200', '500', '2021-08-26', '55', '200', '200', 2, 1, '2021-08-02 23:20:49', '2021-08-02 23:21:07');


#
# TABLE STRUCTURE FOR: tbl_instruments
#

DROP TABLE IF EXISTS `tbl_instruments`;

CREATE TABLE `tbl_instruments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (1, 'Piano');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (2, 'Voice');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (3, 'Violin');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (4, 'Viola');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (5, 'Cello');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (6, 'Double bass');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (7, 'Harp');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (8, 'Guitar');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (9, 'Flute');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (10, 'Clarinet');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (11, 'Oboe');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (12, 'Bassoon');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (13, 'Saxophone');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (14, 'Trumpet');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (15, 'French horn');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (16, 'Trombone');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (17, 'Tuba');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (18, 'Acordion');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (19, 'Banjo');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (20, 'Fiddle');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (21, 'Harmonica');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (22, 'Ukulele');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (23, 'Guzheng');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (24, 'Pipa');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (25, 'Guqin');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (26, 'Dizi');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (27, 'Balalaika');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (28, 'Domra');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (29, 'Gusli');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (30, 'Recorder');
INSERT INTO `tbl_instruments` (`id`, `name`) VALUES (31, 'Other');


#
# TABLE STRUCTURE FOR: tbl_little_morarts
#

DROP TABLE IF EXISTS `tbl_little_morarts`;

CREATE TABLE `tbl_little_morarts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `local_admin` int(11) NOT NULL,
  `audition_name` varchar(255) NOT NULL,
  `audition_location` varchar(255) NOT NULL,
  `audition_date` date NOT NULL,
  `fee_solo` varchar(255) DEFAULT NULL,
  `fee_duet` varchar(255) DEFAULT NULL,
  `fee_trio` varchar(255) DEFAULT NULL,
  `fee_ensemble` varchar(255) DEFAULT NULL,
  `audition_deadline` date NOT NULL,
  `late_fee` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `remain_duration` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_little_morarts` (`id`, `local_admin`, `audition_name`, `audition_location`, `audition_date`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `late_fee`, `duration`, `remain_duration`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (1, 2, 'hhhasd', '1', '2021-07-14', '50', '70', '100', '200', '2021-07-15', '50', '120', '30', 2, 0, '2021-07-12 03:00:58', '2021-07-19 23:53:37');
INSERT INTO `tbl_little_morarts` (`id`, `local_admin`, `audition_name`, `audition_location`, `audition_date`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `late_fee`, `duration`, `remain_duration`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (3, 2, 'test audition', '5', '2021-08-12', '50', '100', '200', '500', '2021-08-25', '55', '100', '7', 2, 0, '2021-08-03 03:03:44', NULL);
INSERT INTO `tbl_little_morarts` (`id`, `local_admin`, `audition_name`, `audition_location`, `audition_date`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `late_fee`, `duration`, `remain_duration`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (4, 5, 'cvcv', '1', '2021-09-01', '50', '100', '200', '500', '2021-09-11', '50', '', '', 1, 0, '2021-08-31 08:56:03', '2021-08-31 08:56:19');


#
# TABLE STRUCTURE FOR: tbl_local_admin
#

DROP TABLE IF EXISTS `tbl_local_admin`;

CREATE TABLE `tbl_local_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `admin_role_id` tinyint(1) NOT NULL DEFAULT 2,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_verify` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` tinyint(1) NOT NULL DEFAULT 1,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_local_admin` (`id`, `name`, `email`, `address`, `mobile_no`, `note`, `admin_role_id`, `is_active`, `is_verify`, `is_admin`, `is_super`, `created_at`, `updated_at`) VALUES (2, 'localadmin1', 'localadmin1@gmail.com', 'wwwwwwwwwww', '159326', 'sdfsfsdf', 2, 1, 1, 1, 0, '2021-08-03 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `tbl_local_admin` (`id`, `name`, `email`, `address`, `mobile_no`, `note`, `admin_role_id`, `is_active`, `is_verify`, `is_admin`, `is_super`, `created_at`, `updated_at`) VALUES (5, 'localadmin2', 'localadmin2@gmail.com', 'asdasd', '213423234', NULL, 2, 1, 1, 1, 0, '2021-08-03 00:00:00', '2021-08-03 00:00:00');


#
# TABLE STRUCTURE FOR: tbl_locations
#

DROP TABLE IF EXISTS `tbl_locations`;

CREATE TABLE `tbl_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_locations` (`id`, `location`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, 'Caldwell University (NJ)', '0000-00-00 00:00:00', 0, NULL, NULL);
INSERT INTO `tbl_locations` (`id`, `location`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (2, 'Westminster Conservatory (NJ)', '0000-00-00 00:00:00', 0, '2021-07-19 09:15:52', 1);
INSERT INTO `tbl_locations` (`id`, `location`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (3, 'Sharon Music Academy (MA)', '0000-00-00 00:00:00', 0, NULL, NULL);
INSERT INTO `tbl_locations` (`id`, `location`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (4, 'Pacific Institute of Music (CA)', '0000-00-00 00:00:00', 0, NULL, NULL);
INSERT INTO `tbl_locations` (`id`, `location`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (5, 'Chopin Academy (WA)', '0000-00-00 00:00:00', 0, NULL, NULL);
INSERT INTO `tbl_locations` (`id`, `location`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (6, 'cvbcvb', '2021-07-19 08:47:22', 1, '2021-08-12 00:24:16', 1);


#
# TABLE STRUCTURE FOR: tbl_recital_crescendo
#

DROP TABLE IF EXISTS `tbl_recital_crescendo`;

CREATE TABLE `tbl_recital_crescendo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audition_name` varchar(255) NOT NULL,
  `audition_location` varchar(255) NOT NULL,
  `audition_date` date NOT NULL,
  `audition_time1` time NOT NULL,
  `audition_time2` time DEFAULT NULL,
  `audition_time3` time DEFAULT NULL,
  `fee_solo` varchar(255) DEFAULT NULL,
  `fee_duet` varchar(255) DEFAULT NULL,
  `fee_trio` varchar(255) DEFAULT NULL,
  `fee_ensemble` varchar(255) DEFAULT NULL,
  `audition_deadline` date NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `discounted_quantity` int(11) DEFAULT 0,
  `late_fee` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `remain_duration` varchar(255) NOT NULL,
  `prize` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_recital_crescendo` (`id`, `audition_name`, `audition_location`, `audition_date`, `audition_time1`, `audition_time2`, `audition_time3`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `ticket_price`, `discounted_price`, `discounted_quantity`, `late_fee`, `duration`, `remain_duration`, `prize`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (1, 'bnmbnm5', '1', '2021-07-21', '00:00:00', NULL, NULL, '50', '150', '250', '450', '2021-07-30', 40, 20, 100, '50', '198', '198', NULL, 2, 0, '2021-07-12 23:06:13', '2021-09-06 15:47:00');
INSERT INTO `tbl_recital_crescendo` (`id`, `audition_name`, `audition_location`, `audition_date`, `audition_time1`, `audition_time2`, `audition_time3`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `ticket_price`, `discounted_price`, `discounted_quantity`, `late_fee`, `duration`, `remain_duration`, `prize`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (2, 'gggggggggggg', '1', '2021-09-02', '10:00:00', '14:00:00', NULL, '50', '100', '200', '500', '2021-09-10', 50, 10, 20, '50', '60', '60', NULL, 1, 0, '2021-08-31 09:47:22', NULL);


#
# TABLE STRUCTURE FOR: tbl_recital_little_morarts
#

DROP TABLE IF EXISTS `tbl_recital_little_morarts`;

CREATE TABLE `tbl_recital_little_morarts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audition_name` varchar(255) NOT NULL,
  `audition_location` varchar(255) NOT NULL,
  `audition_date` date NOT NULL,
  `audition_time1` time NOT NULL,
  `audition_time2` time DEFAULT NULL,
  `audition_time3` time DEFAULT NULL,
  `fee_solo` varchar(255) DEFAULT NULL,
  `fee_duet` varchar(255) DEFAULT NULL,
  `fee_trio` varchar(255) DEFAULT NULL,
  `fee_ensemble` varchar(255) DEFAULT NULL,
  `audition_deadline` date NOT NULL,
  `ticket_price` int(11) NOT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `discounted_quantity` int(11) DEFAULT 0,
  `late_fee` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `remain_duration` varchar(255) NOT NULL,
  `prize` varchar(255) DEFAULT NULL,
  `is_active` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_recital_little_morarts` (`id`, `audition_name`, `audition_location`, `audition_date`, `audition_time1`, `audition_time2`, `audition_time3`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `ticket_price`, `discounted_price`, `discounted_quantity`, `late_fee`, `duration`, `remain_duration`, `prize`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (1, 'hhhxxx', '5', '2021-07-14', '00:00:00', NULL, NULL, '50', '100', '200', '400', '2021-07-15', 100, 10, 10, '23', '120', '110', '', 2, 0, '2021-07-12 23:02:54', '2021-08-25 09:53:28');
INSERT INTO `tbl_recital_little_morarts` (`id`, `audition_name`, `audition_location`, `audition_date`, `audition_time1`, `audition_time2`, `audition_time3`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `ticket_price`, `discounted_price`, `discounted_quantity`, `late_fee`, `duration`, `remain_duration`, `prize`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (2, 'recital little mozarts 2', '1', '2021-08-20', '10:00:00', NULL, NULL, '50', '150', '250', '550', '2021-08-30', 50, 10, 20, '200', '100', '95', NULL, 2, 0, '2021-08-03 00:14:38', '2021-08-31 11:20:53');
INSERT INTO `tbl_recital_little_morarts` (`id`, `audition_name`, `audition_location`, `audition_date`, `audition_time1`, `audition_time2`, `audition_time3`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `ticket_price`, `discounted_price`, `discounted_quantity`, `late_fee`, `duration`, `remain_duration`, `prize`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (3, 'test recital', '1', '2021-08-27', '00:00:00', NULL, NULL, '50', '100', '200', '400', '2021-08-28', 50, 20, 100, '50', '120', '120', 'gold', 1, 0, '2021-08-05 10:54:24', '2021-09-06 15:46:06');
INSERT INTO `tbl_recital_little_morarts` (`id`, `audition_name`, `audition_location`, `audition_date`, `audition_time1`, `audition_time2`, `audition_time3`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `ticket_price`, `discounted_price`, `discounted_quantity`, `late_fee`, `duration`, `remain_duration`, `prize`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (4, 'kkkkk', '1', '2021-09-02', '14:00:00', NULL, NULL, '50', '100', '200', '500', '2021-09-10', 50, 10, 30, '50', '5', '5', NULL, 1, 0, '2021-08-31 09:17:31', NULL);
INSERT INTO `tbl_recital_little_morarts` (`id`, `audition_name`, `audition_location`, `audition_date`, `audition_time1`, `audition_time2`, `audition_time3`, `fee_solo`, `fee_duet`, `fee_trio`, `fee_ensemble`, `audition_deadline`, `ticket_price`, `discounted_price`, `discounted_quantity`, `late_fee`, `duration`, `remain_duration`, `prize`, `is_active`, `is_delete`, `created_at`, `updated_at`) VALUES (5, 'gggggg', '1', '2021-09-02', '10:00:00', NULL, NULL, '50', '100', '200', '500', '2021-09-11', 50, 20, 20, '50', '55', '55', NULL, 1, 0, '2021-08-31 09:38:12', NULL);


#
# TABLE STRUCTURE FOR: tbl_recital_locations
#

DROP TABLE IF EXISTS `tbl_recital_locations`;

CREATE TABLE `tbl_recital_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `tbl_recital_locations` (`id`, `location`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES (1, 'Beograd, Serbia1', '2021-09-06 05:22:52', 1, '2021-09-06 05:23:00', 1);


#
# TABLE STRUCTURE FOR: tbl_relations
#

DROP TABLE IF EXISTS `tbl_relations`;

CREATE TABLE `tbl_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: tbl_users
#

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `country` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `admin_role_id` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verify` tinyint(4) NOT NULL DEFAULT 0,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

INSERT INTO `tbl_users` (`id`, `username`, `country`, `email`, `mobile_no`, `password`, `address`, `birthday`, `admin_role_id`, `is_active`, `is_verify`, `is_admin`, `is_super`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES (3, 'teacher1', 158, 'teacher1@gmail.com', 'qwe', '$2y$10$alGzNUPGFo5Q.Fbqn.eqge3hHrZTdDXoGHgiS/S76s7SAU8TesWbW', 'qwe', NULL, 3, 1, 1, 1, 0, '006f52e9102a8d3be2fe5614f42ba989', '', '', '2021-07-07 00:00:00', '2021-07-07 00:00:00');
INSERT INTO `tbl_users` (`id`, `username`, `country`, `email`, `mobile_no`, `password`, `address`, `birthday`, `admin_role_id`, `is_active`, `is_verify`, `is_admin`, `is_super`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES (1, 'super', 3, 'super@gmail.com', '1111', '$2y$10$alGzNUPGFo5Q.Fbqn.eqge3hHrZTdDXoGHgiS/S76s7SAU8TesWbW', 'qweqwe', NULL, 1, 1, 1, 1, 1, 'super', 'b476828992f393a09339cf6270d30aa8', '', '2021-07-08 00:00:00', '2021-07-08 00:00:00');
INSERT INTO `tbl_users` (`id`, `username`, `country`, `email`, `mobile_no`, `password`, `address`, `birthday`, `admin_role_id`, `is_active`, `is_verify`, `is_admin`, `is_super`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES (4, 'student1', 1, 'student1@gmail.com', '123123', '$2y$10$zElLOXcQWkSBeBekjZMHTOa5uJ83yckjd99xG0RgGM0pZpVMRqK5C', 'asd', '2021-07-09', 4, 1, 1, 1, 0, 'c8c41c4a18675a74e01c8a20e8a0f662', '', '', '2021-07-09 00:00:00', '2021-07-09 00:00:00');
INSERT INTO `tbl_users` (`id`, `username`, `country`, `email`, `mobile_no`, `password`, `address`, `birthday`, `admin_role_id`, `is_active`, `is_verify`, `is_admin`, `is_super`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES (43, 'John smith', 1, 'john@gmail.com', '2134233222', '$2y$10$dy5w209Bsr4xVBYEDbDfiupO53429jQXjGL0SoTvUsyFTo0eJZ9r2', 'new york city', NULL, 3, 1, 1, 1, 0, '443cb001c138b2561a0d90720d6ce111', '', '', '2021-08-05 00:00:00', '2021-08-05 00:00:00');
INSERT INTO `tbl_users` (`id`, `username`, `country`, `email`, `mobile_no`, `password`, `address`, `birthday`, `admin_role_id`, `is_active`, `is_verify`, `is_admin`, `is_super`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES (44, 'test user', 1, 'testuser@gmail.com', '123123123123', '$2y$10$AkhWr6jsD9Dgs7AGGVQLzObeNaYBIXGC0BCqSJEbqLS4xV8x1ClJ6', 'test address', NULL, 3, 1, 1, 1, 0, '58e4d44e550d0f7ee0a23d6b02d9b0db', '', '', '2021-08-05 00:00:00', '2021-08-05 00:00:00');


