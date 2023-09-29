/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : desa_nambak

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 29/09/2023 21:08:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account`  (
  `id_account` int NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `payment_trems` decimal(65, 0) NULL DEFAULT NULL,
  `id_price` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `credit_limit` decimal(65, 0) NULL DEFAULT NULL,
  `max_nota` decimal(65, 0) NULL DEFAULT NULL,
  `bank` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `atas_nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_rek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cabang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_date` time NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `update_date` date NULL DEFAULT NULL,
  `update_time` time NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_account`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of account
-- ----------------------------

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address`  (
  `id_address` int NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `propinsi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kota` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kecamatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kelurahan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_pos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `latitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `longitude` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `update_date` date NULL DEFAULT NULL,
  `update_time` time NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  `created_date` date NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_address`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of address
-- ----------------------------

-- ----------------------------
-- Table structure for attachment
-- ----------------------------
DROP TABLE IF EXISTS `attachment`;
CREATE TABLE `attachment`  (
  `id_att` int NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `files` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` date NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `update_date` time NULL DEFAULT NULL,
  `update_time` time NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_att`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of attachment
-- ----------------------------

-- ----------------------------
-- Table structure for contact_person
-- ----------------------------
DROP TABLE IF EXISTS `contact_person`;
CREATE TABLE `contact_person`  (
  `id_contact` int NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_depan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_belakang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `telepon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mobile_phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `remarks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_date` date NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `update_date` date NULL DEFAULT NULL,
  `update_time` time NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_contact`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of contact_person
-- ----------------------------

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alpha_2` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alpha_3` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 897 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES (4, 'Afghanistan', 'af', 'afg');
INSERT INTO `countries` VALUES (8, 'Albania', 'al', 'alb');
INSERT INTO `countries` VALUES (12, 'Algeria', 'dz', 'dza');
INSERT INTO `countries` VALUES (20, 'Andorra', 'ad', 'and');
INSERT INTO `countries` VALUES (24, 'Angola', 'ao', 'ago');
INSERT INTO `countries` VALUES (28, 'Antigua and Barbuda', 'ag', 'atg');
INSERT INTO `countries` VALUES (32, 'Argentina', 'ar', 'arg');
INSERT INTO `countries` VALUES (51, 'Armenia', 'am', 'arm');
INSERT INTO `countries` VALUES (36, 'Australia', 'au', 'aus');
INSERT INTO `countries` VALUES (40, 'Austria', 'at', 'aut');
INSERT INTO `countries` VALUES (31, 'Azerbaijan', 'az', 'aze');
INSERT INTO `countries` VALUES (44, 'Bahamas', 'bs', 'bhs');
INSERT INTO `countries` VALUES (48, 'Bahrain', 'bh', 'bhr');
INSERT INTO `countries` VALUES (50, 'Bangladesh', 'bd', 'bgd');
INSERT INTO `countries` VALUES (52, 'Barbados', 'bb', 'brb');
INSERT INTO `countries` VALUES (112, 'Belarus', 'by', 'blr');
INSERT INTO `countries` VALUES (56, 'Belgium', 'be', 'bel');
INSERT INTO `countries` VALUES (84, 'Belize', 'bz', 'blz');
INSERT INTO `countries` VALUES (204, 'Benin', 'bj', 'ben');
INSERT INTO `countries` VALUES (64, 'Bhutan', 'bt', 'btn');
INSERT INTO `countries` VALUES (68, 'Bolivia (Plurinational State of)', 'bo', 'bol');
INSERT INTO `countries` VALUES (70, 'Bosnia and Herzegovina', 'ba', 'bih');
INSERT INTO `countries` VALUES (72, 'Botswana', 'bw', 'bwa');
INSERT INTO `countries` VALUES (76, 'Brazil', 'br', 'bra');
INSERT INTO `countries` VALUES (96, 'Brunei Darussalam', 'bn', 'brn');
INSERT INTO `countries` VALUES (100, 'Bulgaria', 'bg', 'bgr');
INSERT INTO `countries` VALUES (854, 'Burkina Faso', 'bf', 'bfa');
INSERT INTO `countries` VALUES (108, 'Burundi', 'bi', 'bdi');
INSERT INTO `countries` VALUES (132, 'Cabo Verde', 'cv', 'cpv');
INSERT INTO `countries` VALUES (116, 'Cambodia', 'kh', 'khm');
INSERT INTO `countries` VALUES (120, 'Cameroon', 'cm', 'cmr');
INSERT INTO `countries` VALUES (124, 'Canada', 'ca', 'can');
INSERT INTO `countries` VALUES (140, 'Central African Republic', 'cf', 'caf');
INSERT INTO `countries` VALUES (148, 'Chad', 'td', 'tcd');
INSERT INTO `countries` VALUES (152, 'Chile', 'cl', 'chl');
INSERT INTO `countries` VALUES (156, 'China', 'cn', 'chn');
INSERT INTO `countries` VALUES (170, 'Colombia', 'co', 'col');
INSERT INTO `countries` VALUES (174, 'Comoros', 'km', 'com');
INSERT INTO `countries` VALUES (178, 'Congo', 'cg', 'cog');
INSERT INTO `countries` VALUES (180, 'Congo, Democratic Republic of the', 'cd', 'cod');
INSERT INTO `countries` VALUES (188, 'Costa Rica', 'cr', 'cri');
INSERT INTO `countries` VALUES (384, 'Cote dIvoire', 'ci', 'civ');
INSERT INTO `countries` VALUES (191, 'Croatia', 'hr', 'hrv');
INSERT INTO `countries` VALUES (196, 'Cyprus', 'cy', 'cyp');
INSERT INTO `countries` VALUES (203, 'Czechia', 'cz', 'cze');
INSERT INTO `countries` VALUES (208, 'Denmark', 'dk', 'dnk');
INSERT INTO `countries` VALUES (262, 'Djibouti', 'dj', 'dji');
INSERT INTO `countries` VALUES (212, 'Dominica', 'dm', 'dma');
INSERT INTO `countries` VALUES (214, 'Dominican Republic', 'do', 'dom');
INSERT INTO `countries` VALUES (218, 'Ecuador', 'ec', 'ecu');
INSERT INTO `countries` VALUES (818, 'Egypt', 'eg', 'egy');
INSERT INTO `countries` VALUES (222, 'El Salvador', 'sv', 'slv');
INSERT INTO `countries` VALUES (232, 'Eritrea', 'er', 'eri');
INSERT INTO `countries` VALUES (233, 'Estonia', 'ee', 'est');
INSERT INTO `countries` VALUES (748, 'Eswatini', 'sz', 'swz');
INSERT INTO `countries` VALUES (231, 'Ethiopia', 'et', 'eth');
INSERT INTO `countries` VALUES (242, 'Fiji', 'fj', 'fji');
INSERT INTO `countries` VALUES (246, 'Finland', 'fi', 'fin');
INSERT INTO `countries` VALUES (250, 'France', 'fr', 'fra');
INSERT INTO `countries` VALUES (266, 'Gabon', 'ga', 'gab');
INSERT INTO `countries` VALUES (270, 'Gambia', 'gm', 'gmb');
INSERT INTO `countries` VALUES (268, 'Georgia', 'ge', 'geo');
INSERT INTO `countries` VALUES (276, 'Germany', 'de', 'deu');
INSERT INTO `countries` VALUES (288, 'Ghana', 'gh', 'gha');
INSERT INTO `countries` VALUES (300, 'Greece', 'gr', 'grc');
INSERT INTO `countries` VALUES (308, 'Grenada', 'gd', 'grd');
INSERT INTO `countries` VALUES (320, 'Guatemala', 'gt', 'gtm');
INSERT INTO `countries` VALUES (324, 'Guinea', 'gn', 'gin');
INSERT INTO `countries` VALUES (624, 'Guinea-Bissau', 'gw', 'gnb');
INSERT INTO `countries` VALUES (328, 'Guyana', 'gy', 'guy');
INSERT INTO `countries` VALUES (332, 'Haiti', 'ht', 'hti');
INSERT INTO `countries` VALUES (340, 'Honduras', 'hn', 'hnd');
INSERT INTO `countries` VALUES (348, 'Hungary', 'hu', 'hun');
INSERT INTO `countries` VALUES (352, 'Iceland', 'is', 'isl');
INSERT INTO `countries` VALUES (356, 'India', 'in', 'ind');
INSERT INTO `countries` VALUES (360, 'Indonesia', 'id', 'idn');
INSERT INTO `countries` VALUES (368, 'Iraq', 'iq', 'irq');
INSERT INTO `countries` VALUES (372, 'Ireland', 'ie', 'irl');
INSERT INTO `countries` VALUES (376, 'Israel', 'il', 'isr');
INSERT INTO `countries` VALUES (380, 'Italy', 'it', 'ita');
INSERT INTO `countries` VALUES (388, 'Jamaica', 'jm', 'jam');
INSERT INTO `countries` VALUES (392, 'Japan', 'jp', 'jpn');
INSERT INTO `countries` VALUES (400, 'Jordan', 'jo', 'jor');
INSERT INTO `countries` VALUES (398, 'Kazakhstan', 'kz', 'kaz');
INSERT INTO `countries` VALUES (404, 'Kenya', 'ke', 'ken');
INSERT INTO `countries` VALUES (296, 'Kiribati', 'ki', 'kir');
INSERT INTO `countries` VALUES (410, 'South Korea', 'kr', 'kor');
INSERT INTO `countries` VALUES (414, 'Kuwait', 'kw', 'kwt');
INSERT INTO `countries` VALUES (417, 'Kyrgyzstan', 'kg', 'kgz');
INSERT INTO `countries` VALUES (418, 'Lao Peoples Democratic Republic', 'la', 'lao');
INSERT INTO `countries` VALUES (428, 'Latvia', 'lv', 'lva');
INSERT INTO `countries` VALUES (422, 'Lebanon', 'lb', 'lbn');
INSERT INTO `countries` VALUES (426, 'Lesotho', 'ls', 'lso');
INSERT INTO `countries` VALUES (430, 'Liberia', 'lr', 'lbr');
INSERT INTO `countries` VALUES (434, 'Libya', 'ly', 'lby');
INSERT INTO `countries` VALUES (438, 'Liechtenstein', 'li', 'lie');
INSERT INTO `countries` VALUES (440, 'Lithuania', 'lt', 'ltu');
INSERT INTO `countries` VALUES (442, 'Luxembourg', 'lu', 'lux');
INSERT INTO `countries` VALUES (450, 'Madagascar', 'mg', 'mdg');
INSERT INTO `countries` VALUES (454, 'Malawi', 'mw', 'mwi');
INSERT INTO `countries` VALUES (458, 'Malaysia', 'my', 'mys');
INSERT INTO `countries` VALUES (462, 'Maldives', 'mv', 'mdv');
INSERT INTO `countries` VALUES (466, 'Mali', 'ml', 'mli');
INSERT INTO `countries` VALUES (470, 'Malta', 'mt', 'mlt');
INSERT INTO `countries` VALUES (584, 'Marshall Islands', 'mh', 'mhl');
INSERT INTO `countries` VALUES (478, 'Mauritania', 'mr', 'mrt');
INSERT INTO `countries` VALUES (480, 'Mauritius', 'mu', 'mus');
INSERT INTO `countries` VALUES (484, 'Mexico', 'mx', 'mex');
INSERT INTO `countries` VALUES (583, 'Micronesia', 'fm', 'fsm');
INSERT INTO `countries` VALUES (498, 'Moldova', 'md', 'mda');
INSERT INTO `countries` VALUES (492, 'Monaco', 'mc', 'mco');
INSERT INTO `countries` VALUES (496, 'Mongolia', 'mn', 'mng');
INSERT INTO `countries` VALUES (499, 'Montenegro', 'me', 'mne');
INSERT INTO `countries` VALUES (504, 'Morocco', 'ma', 'mar');
INSERT INTO `countries` VALUES (508, 'Mozambique', 'mz', 'moz');
INSERT INTO `countries` VALUES (104, 'Myanmar', 'mm', 'mmr');
INSERT INTO `countries` VALUES (516, 'Namibia', 'na', 'nam');
INSERT INTO `countries` VALUES (524, 'Nepal', 'np', 'npl');
INSERT INTO `countries` VALUES (528, 'Netherlands', 'nl', 'nld');
INSERT INTO `countries` VALUES (554, 'New Zealand', 'nz', 'nzl');
INSERT INTO `countries` VALUES (558, 'Nicaragua', 'ni', 'nic');
INSERT INTO `countries` VALUES (562, 'Niger', 'ne', 'ner');
INSERT INTO `countries` VALUES (566, 'Nigeria', 'ng', 'nga');
INSERT INTO `countries` VALUES (807, 'North Macedonia', 'mk', 'mkd');
INSERT INTO `countries` VALUES (578, 'Norway', 'no', 'nor');
INSERT INTO `countries` VALUES (512, 'Oman', 'om', 'omn');
INSERT INTO `countries` VALUES (586, 'Pakistan', 'pk', 'pak');
INSERT INTO `countries` VALUES (585, 'Palau', 'pw', 'plw');
INSERT INTO `countries` VALUES (591, 'Panama', 'pa', 'pan');
INSERT INTO `countries` VALUES (598, 'Papua New Guinea', 'pg', 'png');
INSERT INTO `countries` VALUES (600, 'Paraguay', 'py', 'pry');
INSERT INTO `countries` VALUES (604, 'Peru', 'pe', 'per');
INSERT INTO `countries` VALUES (608, 'Philippines', 'ph', 'phl');
INSERT INTO `countries` VALUES (616, 'Poland', 'pl', 'pol');
INSERT INTO `countries` VALUES (620, 'Portugal', 'pt', 'prt');
INSERT INTO `countries` VALUES (634, 'Qatar', 'qa', 'qat');
INSERT INTO `countries` VALUES (642, 'Romania', 'ro', 'rou');
INSERT INTO `countries` VALUES (643, 'Russian Federation', 'ru', 'rus');
INSERT INTO `countries` VALUES (646, 'Rwanda', 'rw', 'rwa');
INSERT INTO `countries` VALUES (659, 'Saint Kitts and Nevis', 'kn', 'kna');
INSERT INTO `countries` VALUES (662, 'Saint Lucia', 'lc', 'lca');
INSERT INTO `countries` VALUES (670, 'Saint Vincent and the Grenadines', 'vc', 'vct');
INSERT INTO `countries` VALUES (882, 'Samoa', 'ws', 'wsm');
INSERT INTO `countries` VALUES (674, 'San Marino', 'sm', 'smr');
INSERT INTO `countries` VALUES (678, 'Sao Tome and Principe', 'st', 'stp');
INSERT INTO `countries` VALUES (682, 'Saudi Arabia', 'sa', 'sau');
INSERT INTO `countries` VALUES (686, 'Senegal', 'sn', 'sen');
INSERT INTO `countries` VALUES (688, 'Serbia', 'rs', 'srb');
INSERT INTO `countries` VALUES (690, 'Seychelles', 'sc', 'syc');
INSERT INTO `countries` VALUES (694, 'Sierra Leone', 'sl', 'sle');
INSERT INTO `countries` VALUES (702, 'Singapore', 'sg', 'sgp');
INSERT INTO `countries` VALUES (703, 'Slovakia', 'sk', 'svk');
INSERT INTO `countries` VALUES (705, 'Slovenia', 'si', 'svn');
INSERT INTO `countries` VALUES (90, 'Solomon Islands', 'sb', 'slb');
INSERT INTO `countries` VALUES (710, 'South Africa', 'za', 'zaf');
INSERT INTO `countries` VALUES (144, 'Sri Lanka', 'lk', 'lka');
INSERT INTO `countries` VALUES (729, 'Sudan', 'sd', 'sdn');
INSERT INTO `countries` VALUES (740, 'Suriname', 'sr', 'sur');
INSERT INTO `countries` VALUES (752, 'Sweden', 'se', 'swe');
INSERT INTO `countries` VALUES (756, 'Switzerland', 'ch', 'che');
INSERT INTO `countries` VALUES (760, 'Syrian Arab Republic', 'sy', 'syr');
INSERT INTO `countries` VALUES (762, 'Tajikistan', 'tj', 'tjk');
INSERT INTO `countries` VALUES (834, 'Tanzania, United Republic of', 'tz', 'tza');
INSERT INTO `countries` VALUES (764, 'Thailand', 'th', 'tha');
INSERT INTO `countries` VALUES (626, 'Timor-Leste', 'tl', 'tls');
INSERT INTO `countries` VALUES (768, 'Togo', 'tg', 'tgo');
INSERT INTO `countries` VALUES (776, 'Tonga', 'to', 'ton');
INSERT INTO `countries` VALUES (780, 'Trinidad and Tobago', 'tt', 'tto');
INSERT INTO `countries` VALUES (788, 'Tunisia', 'tn', 'tun');
INSERT INTO `countries` VALUES (792, 'Turkey', 'tr', 'tur');
INSERT INTO `countries` VALUES (795, 'Turkmenistan', 'tm', 'tkm');
INSERT INTO `countries` VALUES (798, 'Tuvalu', 'tv', 'tuv');
INSERT INTO `countries` VALUES (800, 'Uganda', 'ug', 'uga');
INSERT INTO `countries` VALUES (804, 'Ukraine', 'ua', 'ukr');
INSERT INTO `countries` VALUES (784, 'United Arab Emirates', 'ae', 'are');
INSERT INTO `countries` VALUES (826, 'United Kingdom of Great Britain and Northern Ireland', 'gb', 'gbr');
INSERT INTO `countries` VALUES (840, 'United States of America', 'us', 'usa');
INSERT INTO `countries` VALUES (858, 'Uruguay', 'uy', 'ury');
INSERT INTO `countries` VALUES (860, 'Uzbekistan', 'uz', 'uzb');
INSERT INTO `countries` VALUES (548, 'Vanuatu', 'vu', 'vut');
INSERT INTO `countries` VALUES (862, 'Venezuela (Bolivarian Republic of)', 've', 'ven');
INSERT INTO `countries` VALUES (704, 'Viet Nam', 'vn', 'vnm');
INSERT INTO `countries` VALUES (887, 'Yemen', 'ye', 'yem');
INSERT INTO `countries` VALUES (894, 'Zambia', 'zm', 'zmb');
INSERT INTO `countries` VALUES (716, 'Zimbabwe', 'zw', 'zwe');
INSERT INTO `countries` VALUES (341, 'Hong Kong', 'hk', 'hkg');

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `filenames` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES (1, '[\"166391963766.jpg\",\"166391963759.jpg\"]', '2', '2022-09-23 07:53:57', '2022-09-23 07:53:57');
INSERT INTO `files` VALUES (2, '[\"166392091193.jpg\"]', '2', '2022-09-23 08:15:11', '2022-09-23 08:15:11');
INSERT INTO `files` VALUES (3, '[\"166487304010.png\",\"166487304048.png\",\"166487304035.png\",\"166487304047.jpg\"]', '44', '2022-10-04 08:44:00', '2022-10-04 08:44:00');
INSERT INTO `files` VALUES (4, '[\"166633614346.png\",\"166633614375.png\",\"166633614377.png\",\"166633614399.jpg\"]', '20', '2022-10-21 07:09:03', '2022-10-21 07:09:03');
INSERT INTO `files` VALUES (5, '[\"166633624568.png\",\"166633624580.png\",\"166633624562.png\",\"166633624596.jpg\"]', '134', '2022-10-21 07:10:45', '2022-10-21 07:10:45');
INSERT INTO `files` VALUES (6, '[\"167419532980.png\",\"167419532983.jpg\",\"167419532920.jpg\",\"16741953291.jpg\"]', '122', '2023-01-20 06:15:29', '2023-01-20 06:15:29');
INSERT INTO `files` VALUES (7, '[\"167419540361.png\",\"167419540371.jpg\",\"167419540350.jpg\",\"167419540378.jpg\"]', '120', '2023-01-20 06:16:43', '2023-01-20 06:16:43');
INSERT INTO `files` VALUES (8, '[\"16741954363.png\",\"167419543673.jpg\",\"167419543682.jpg\"]', '121', '2023-01-20 06:17:16', '2023-01-20 06:17:16');

-- ----------------------------
-- Table structure for general_informations
-- ----------------------------
DROP TABLE IF EXISTS `general_informations`;
CREATE TABLE `general_informations`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type_usaha` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_usaha` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telepon` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mobile_phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `web_site` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_npwp` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_npwp` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_npwp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` date NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `update_date` date NULL DEFAULT NULL,
  `update_time` time NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of general_informations
-- ----------------------------

-- ----------------------------
-- Table structure for jenis_toko
-- ----------------------------
DROP TABLE IF EXISTS `jenis_toko`;
CREATE TABLE `jenis_toko`  (
  `id_jenis_toko` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_jenis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` date NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `update_date` date NULL DEFAULT NULL,
  `update_time` time NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_toko`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jenis_toko
-- ----------------------------

-- ----------------------------
-- Table structure for legal
-- ----------------------------
DROP TABLE IF EXISTS `legal`;
CREATE TABLE `legal`  (
  `id_leg` int NOT NULL AUTO_INCREMENT,
  `id_customer` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_berdiri` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_siup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_tlp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `remarks` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_date` date NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `update_date` date NULL DEFAULT NULL,
  `update_time` time NULL DEFAULT NULL,
  `update_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_leg`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of legal
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2022_09_16_060614_create_permission_tables', 2);
INSERT INTO `migrations` VALUES (5, '2022_09_27_022547_create_sliders_table', 3);
INSERT INTO `migrations` VALUES (6, '2022_09_27_024419_modify_sliders_table', 3);
INSERT INTO `migrations` VALUES (7, '2022_09_27_065213_add_image_column_sliders', 3);
INSERT INTO `migrations` VALUES (8, '2022_12_06_034153_add_column_order_migration', 3);
INSERT INTO `migrations` VALUES (9, '2022_12_15_021613_add_column_type_text_sliders', 4);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of model_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id` ASC, `model_type` ASC) USING BTREE,
  CONSTRAINT `model_has_roles_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 1);
INSERT INTO `model_has_roles` VALUES (1, 'App\\Models\\User', 3);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 2);
INSERT INTO `model_has_roles` VALUES (2, 'App\\Models\\User', 3);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 4);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 5);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 6);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 7);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 8);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 9);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 10);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 11);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 12);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 13);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 14);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 15);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 16);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 17);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 18);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 19);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 20);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 21);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 22);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 23);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 24);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 25);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 26);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 27);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 28);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 29);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 30);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 31);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 32);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 33);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 34);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 35);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 36);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 37);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 38);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 39);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 40);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 41);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 42);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 43);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 44);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 45);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 46);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 47);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 48);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 49);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 50);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 51);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 52);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 53);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 54);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 55);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 56);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 57);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 58);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 59);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 60);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 61);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 62);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 63);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 64);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 65);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 66);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 67);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 68);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 69);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 70);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 71);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 72);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 73);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 74);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 75);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 76);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 77);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 78);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 79);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 80);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 81);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 82);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 83);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 84);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 85);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 86);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 87);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 88);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 89);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 90);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 91);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 92);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 93);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 94);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 95);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 96);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 97);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 98);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 99);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 100);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 101);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 102);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 103);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 104);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 105);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 106);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 107);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 108);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 109);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 110);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 111);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 112);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 113);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 114);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 115);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 116);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 117);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 118);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 119);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 120);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 121);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 122);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 123);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 124);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 125);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 126);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 127);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 128);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 129);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 130);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 131);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 132);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 133);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 134);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 135);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 136);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 137);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 138);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 139);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 140);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 141);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 142);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 143);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 144);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 145);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 146);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 147);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 148);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 149);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 150);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 151);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 152);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 153);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 154);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 155);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 156);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 157);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 158);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 159);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 160);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 161);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 162);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 163);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 164);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 165);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 166);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 167);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 168);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 169);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 170);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 171);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 172);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 173);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 174);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 175);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 176);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 177);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 178);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 179);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 180);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 181);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 182);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 183);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 184);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 185);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 186);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 187);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 188);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 189);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 190);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 191);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 192);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 193);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 194);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 195);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 196);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 197);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 198);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 199);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 200);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 201);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 202);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 203);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 204);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 205);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 206);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 207);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 208);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 209);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 210);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 211);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 212);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 213);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 214);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 215);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 216);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 217);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 218);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 219);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 220);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 221);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 222);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 223);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 224);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 225);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 226);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 227);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 228);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 229);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 230);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 231);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 232);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 233);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 234);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 235);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 236);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 237);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 238);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 239);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 240);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 241);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 242);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 243);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 244);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 245);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 246);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 248);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 249);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 250);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 251);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 252);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 253);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 254);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 255);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 256);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 257);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 258);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 259);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 260);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 261);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 262);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 263);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 264);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 265);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 266);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 267);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 268);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 269);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 270);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 271);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 272);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 273);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 274);
INSERT INTO `model_has_roles` VALUES (3, 'App\\Models\\User', 275);

-- ----------------------------
-- Table structure for news
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `video` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `quote_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `quote_author` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `author` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `images_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `blog_category_id_foreign`(`category_id` ASC) USING BTREE,
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `news_category` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES (1, 'Rasakan Mantap Pedasnya Sambal Korek ', 'Setelah memesan Nasi Ayam Geprek, Tahu Isi atau Nasi Ayam Laos pilihan Anda, saatnya melengkapinya dengan sambal khas yang pedas dan meningkatkan kepuasan bersantap! Ini dia Sambal Korek, salah satu sambal yang dipilih karena pedasnya yang hot hot hot! \r\n\r\nBahannya yang sederhana membuat sensasi Sambal Korek justru terfokus pada rasa pedas dari cabai merah yang jumlahnya bisa sampai puluhan! Ditambah dengan basuhan minyak hangat dan bawang merah yang harum, semangkuk kecil Sambal Korek biasanya sudah cukup untuk menemani serangkaian main course yang Anda pesan. Habiskan Sambal Korek untuk rasa pedas yang sempurna. Tapi kalau tidak kuat pedas, hati-hatilah, karena sambal satu ini bisa membuat Anda memesan minum lebih banyak dari biasanya. Rangkaian sajian sambal Nusantara kini bisa Anda pesan dari kami. Selera pedas yang menambah selera. ', 'Setelah memesan Nasi Ayam Geprek, Tahu Isi atau Nasi Ayam Laos pilihan Anda, saatnya melengkapinya dengan sambal khas yang pedas dan meningkatkan kepuasan bersantap! Ini dia Sambal Korek, salah satu sambal yang dipilih karena pedasnya yang hot hot hot! \r\n\r\nBahannya yang sederhana membuat sensasi Sambal Korek justru terfokus pada rasa pedas dari cabai merah yang jumlahnya bisa sampai puluhan! Ditambah dengan basuhan minyak hangat dan bawang merah yang harum, semangkuk kecil Sambal Korek biasanya sudah cukup untuk menemani serangkaian main course yang Anda pesan. Habiskan Sambal Korek untuk rasa pedas yang sempurna. Tapi kalau tidak kuat pedas, hati-hatilah, karena sambal satu ini bisa membuat Anda memesan minum lebih banyak dari biasanya. Rangkaian sajian sambal Nusantara kini bisa Anda pesan dari kami. Selera pedas yang menambah selera. ', 'standard', 'news1.png', NULL, NULL, NULL, 'SuryoAtmojo', 'saftware', 'published', 'post_2038', 1, 7, '2022-12-01 00:00:54', '2022-12-08 02:06:34');
INSERT INTO `news` VALUES (2, 'Pastel Renyah dengan isian istimewa ', 'Kamu paling suka bagian apanya? Ujungnya yang keriting, tengahnya yang empuk, atau justru isiannya? Wah, ide-ide menikmati Pastel ada banyak ya. Yang pasti, sajian satu ini selalu dicari sebagai penggugah selera makan yang, tentu saja, juga nikmat dimakan sebagai jajanan ringan. Kombinasi kulit renyah dan isian wortel dan kentang atau umbi, bihun dan isian lainnya membuat Pastel komplit sebagai appetizer yang selalu dicari.\r\n\r\nSudah lama Pastel melengkapi sajian tradisi Indonesia. Karena itu juga rasanya bisa diterima siapa pun, bahannya juga ada di mana pun. Sebagai pelengkap sajiannya, ada aneka saus kental, saus encer, bisa juga dengan cabai, atau yang khas Jawa Timur, saus petis. Nah, bagaimana pun cara menikmatinya, Pastel selalu ada di menu jajanan kesukaan kita semua. Pastelku, pastelmu, pastel untuk semua. ', 'Kamu paling suka bagian apanya? Ujungnya yang keriting, tengahnya yang empuk, atau justru isiannya? Wah, ide-ide menikmati Pastel ada banyak ya. Yang pasti, sajian satu ini selalu dicari sebagai penggugah selera makan yang, tentu saja, juga nikmat dimakan sebagai jajanan ringan. Kombinasi kulit renyah dan isian wortel dan kentang atau umbi, bihun dan isian lainnya membuat Pastel komplit sebagai appetizer yang selalu dicari.\r\n\r\nSudah lama Pastel melengkapi sajian tradisi Indonesia. Karena itu juga rasanya bisa diterima siapa pun, bahannya juga ada di mana pun. Sebagai pelengkap sajiannya, ada aneka saus kental, saus encer, bisa juga dengan cabai, atau yang khas Jawa Timur, saus petis. Nah, bagaimana pun cara menikmatinya, Pastel selalu ada di menu jajanan kesukaan kita semua. Pastelku, pastelmu, pastel untuk semua. ', 'standard', 'news2.png', NULL, NULL, NULL, 'Suryo Atmojo', 'excel', 'published', 'post_1073', 7, 7, '2022-12-18 00:00:54', '2023-01-06 07:47:42');
INSERT INTO `news` VALUES (3, 'Nikmatnya Sarapan Nasi Pecel Sayur', 'Mengandung sayur daunan hijau, taoge, kacang, kemangi dan timun, Nasi Pecel Sayur punya banyak kandungan nutrisi vitamin dan mineral yang menggolongkannya ke kelompok makanan sehat di Indonesia. Terlebih lagi, lauk pelengkapnya yang kaya protein semakin mengukuhkan posisi Nasi Pecel Sayur di daftar makanan sehat paling populer di Indonesia saat ini. Tapi, mengapa semua kandungan itu disebut menyehatkan?\r\n\r\n\r\nTaoge sendiri merupakan produk turunan dari kacang hijau yang dari sananya terkenal kaya nutrisi. Kandungan vitamin E-nya yang tinggi membuat taoge baik untuk daya tahan dan regenerasi sel-sel, serta kesehatan reproduksi. Sementara itu, macam sayurannya seperti daun dan kacang panjang mengandung asam folat yang baik untuk otak, vitamin C sampai K. Dengan komposisi kaya nutrisi ini, memang layak bila Nasi Pecel Sayur disemati predikat superfood atau makanan berefek baik bagi kesehatan dan produktivitas.', 'Mengandung sayur daunan hijau, taoge, kacang, kemangi dan timun, Nasi Pecel Sayur punya banyak kandungan nutrisi vitamin dan mineral yang menggolongkannya ke kelompok makanan sehat di Indonesia. Terlebih lagi, lauk pelengkapnya yang kaya protein semakin mengukuhkan posisi Nasi Pecel Sayur di daftar makanan sehat paling populer di Indonesia saat ini. Tapi, mengapa semua kandungan itu disebut menyehatkan?\r\n\r\n\r\nTaoge sendiri merupakan produk turunan dari kacang hijau yang dari sananya terkenal kaya nutrisi. Kandungan vitamin E-nya yang tinggi membuat taoge baik untuk daya tahan dan regenerasi sel-sel, serta kesehatan reproduksi. Sementara itu, macam sayurannya seperti daun dan kacang panjang mengandung asam folat yang baik untuk otak, vitamin C sampai K. Dengan komposisi kaya nutrisi ini, memang layak bila Nasi Pecel Sayur disemati predikat superfood atau makanan berefek baik bagi kesehatan dan produktivitas.', 'standard', 'news3.png', NULL, NULL, NULL, 'Suryo Atmojo', 'cordova', 'published', 'post_5384', 4, 6, '2022-12-18 00:00:54', '2022-12-23 01:11:23');
INSERT INTO `news` VALUES (4, 'Gulai Kambing Yang Lezat Nan Berempah', 'Sudah sejak dulu Gulai Kambing disukai oleh banyak orang, dari anak-anak hingga dewasa. Apa lagi kalau bukan rasanya yang kaya, kuahnya yang kental berempah, juga tentu, empuk dagingnya yang bikin puas. Sebagai salah satu cita rasa Minangkabau yang sudah diterima di banyak daerah bahkan luar negeri, Gulai Kambing sering kali dipilih untuk momen-momen tertentu di mana semua orang bisa menikmati makanan yang berempah dan terasa lezat tak terbantahkan.\r\n\r\nSama enaknya dengan gulai ayam ataupun daging sapi, Gulai Kambing punya karakter sendiri, karena, pertama: tekstur dan rasa dagingnya khas kambing, kedua: keseluruhan rasanya lebih hangat dan memuaskan. Meski begitu, tidak semua orang pandai mengolah daging kambing dan rempah menjadi semangkok sajian gulai yang pas. anda harus mencoba dan merasakan sendiri, Gulai Kambing variasi apa yang paling cocok dengan selera anda?', 'Sudah sejak dulu Gulai Kambing disukai oleh banyak orang, dari anak-anak hingga dewasa. Apa lagi kalau bukan rasanya yang kaya, kuahnya yang kental berempah, juga tentu, empuk dagingnya yang bikin puas. Sebagai salah satu cita rasa Minangkabau yang sudah diterima di banyak daerah bahkan luar negeri, Gulai Kambing sering kali dipilih untuk momen-momen tertentu di mana semua orang bisa menikmati makanan yang berempah dan terasa lezat tak terbantahkan.\r\n\r\nSama enaknya dengan gulai ayam ataupun daging sapi, Gulai Kambing punya karakter sendiri, karena, pertama: tekstur dan rasa dagingnya khas kambing, kedua: keseluruhan rasanya lebih hangat dan memuaskan. Meski begitu, tidak semua orang pandai mengolah daging kambing dan rempah menjadi semangkok sajian gulai yang pas. anda harus mencoba dan merasakan sendiri, Gulai Kambing variasi apa yang paling cocok dengan selera anda?', 'quote', 'news4.png', NULL, 'In the design process, my gut instinct is my best critic. I just wished I would always listen to it!', 'John Smith', 'Creabox', 'lorem-ipsum-4', 'pending', 'post_6737', 3, 2, '2022-12-18 00:00:54', '2022-12-23 01:11:23');
INSERT INTO `news` VALUES (5, 'Gurih dan Kental Cerita Soto Betawi Asli', 'Mencoba kuliner asli Betawi belumlah lengkap jika tidak mencicipi Nasi Soto Betawi yang legendaris itu. Konon sudah muncul sejak 1970-an, Nasi Soto Betawi menjadi berbeda karena berkuah santan, isiannya didominasi daging sapi dan jeroan, dengan bumbu khas yang sarat dengan nilai-nilai luhur kuliner betawi seperti daun jeruk, pala, kapulaga, ketumbar dan jintan. Selain itu, penyajiannya pun senantiasa kaya dengan nasi dan kuah sotonya disajikan terpisah, Pelengkap lain yang selalu ada: jeruk purut, irisan tomat dan juga tentu saja emping melinjo.\r\n\r\nMenyantap semangkuk Nasi Soto Betawi memang akan sangat mengenyangkan. Nah cocoknya lagi, acara makan Soto-nya diisi dengan kebersamaan keluarga, rekan-rekan atau kolega yang merindukan rasa yang sama. Walau kini wajah ibu kota sudah banyak berubah, cerita khazanah kuliner legenda pasti akan selalu jadi bahan perbincangan yang menarik. Nasi Soto Betawi kini sudah jadi kekayaan tidak cuma untuk Jakarta, tetapi Indonesia. Karena rasa kuliner merupakan bahasa universal, dan Nasi Soto Betawi telah menyampaikan kental ceritanya hampir ke seluruh penjuru negeri.', '<p>Mencoba kuliner asli Betawi belumlah lengkap jika tidak mencicipi Nasi Soto Betawi yang legendaris itu. Konon sudah muncul sejak 1970-an, Nasi Soto Betawi menjadi berbeda karena berkuah santan, isiannya didominasi daging sapi dan jeroan, dengan bumbu khas yang sarat dengan nilai-nilai luhur kuliner betawi seperti daun jeruk, pala, kapulaga, ketumbar dan jintan. Selain itu, penyajiannya pun senantiasa kaya dengan nasi dan kuah sotonya disajikan terpisah, Pelengkap lain yang selalu ada: jeruk purut, irisan tomat dan juga tentu saja emping melinjo. Menyantap semangkuk Nasi Soto Betawi memang akan sangat mengenyangkan. Nah cocoknya lagi, acara makan Soto-nya diisi dengan kebersamaan keluarga, rekan-rekan atau kolega yang merindukan rasa yang sama. Walau kini wajah ibu kota sudah banyak berubah, cerita khazanah kuliner legenda pasti akan selalu jadi bahan perbincangan yang menarik. Nasi Soto Betawi kini sudah jadi kekayaan tidak cuma untuk Jakarta, tetapi Indonesia. Karena rasa kuliner merupakan bahasa universal, dan Nasi Soto Betawi telah menyampaikan kental ceritanya hampir ke seluruh penjuru negeri.</p>', 'video', 'news5.png', '<iframe title=\"vimeo-player\" src=\"https://www.youtube.com/embed/kn-1D5z3-Cs\" width=\"900\" height=\"500\" frameborder=\"0\" allowfullscreen></iframe>', NULL, NULL, 'Creabox', 'lorem-ipsum-5', 'pending', 'post_1166', 8, 1, '2022-12-18 00:00:54', '2023-01-27 04:10:36');
INSERT INTO `news` VALUES (6, 'Sajian Nusantara, Teristimewa Setiap Minggu-nya', 'Pandan Garden mengajak semua orang pencinta krengsengan untuk menikmati waktu istirahat dan bersantai. Sistem pemesanan Menu Spesial PO yang mudah, rasa yang mewah, dan nikmat tiada tara menginspirasi Pandan Garden untuk memberikan yang terbaik!\r\n\r\nTak semua orang menyukai olahan kambing, namun setiap orang hampir dipastikan menyukai olahan ayam. Inilah alasan mengapa menu Nasi Krengsengan Ayam ini dibuat. Hingga artikel ini dipublikasikan, Nasi Krengsengan Ayam adalah menu yang selalu habis slot ordernya di hari pertama Pre-Order dibuka. Masih mau menunggu lagi?', 'Pandan Garden mengajak semua orang pencinta krengsengan untuk menikmati waktu istirahat dan bersantai. Sistem pemesanan Menu Spesial PO yang mudah, rasa yang mewah, dan nikmat tiada tara menginspirasi Pandan Garden untuk memberikan yang terbaik!\r\n\r\nTak semua orang menyukai olahan kambing, namun setiap orang hampir dipastikan menyukai olahan ayam. Inilah alasan mengapa menu Nasi Krengsengan Ayam ini dibuat. Hingga artikel ini dipublikasikan, Nasi Krengsengan Ayam adalah menu yang selalu habis slot ordernya di hari pertama Pre-Order dibuka. Masih mau menunggu lagi?', 'standard', 'news6.png', NULL, '-', NULL, 'Suryo Atmojo', 'pengertian-fungsi-sejarah-dan-versi-microsoft-excel', 'published', 'post_44', 5, 7, '2022-12-23 01:13:39', '2023-01-06 06:01:45');
INSERT INTO `news` VALUES (7, 'Protein Penting dalam Nasi Dory Sambal Matah', 'Sebagaimana porsi rice-bowl yang pas untuk segala usia, Potongan daging Dory-nya besar, cukup untuk seporsi bahkan lebih. Di atasnya, disiram Sambal Matah yang jadi primadona penikmat ikan dan menu berbasis goreng atau hangat seperti ini. Rice Bowl Nasi Dory Sambal Matah jadi komplit karena lauk protein dari Dory dilengkapi dengan porsi pas nasi putih hangat, sambal matah, potongan bawang segar bahkan bawang goreng sebagai variasinya. Inilah mengapa Rice Bowl Nasi Dory ini cocok untuk selera orang Indonesia yang senang dengan sensasi gurih dan pedas sekaligus.\r\n\r\nSaat disantap, yang pertama kali dinikmati sebaiknya adalah daging Dory-nya langsung. Selain krispy di luar, tekstur daging Dory di dalamnya yang putih langsung memberikan sensasi beda dengan yang sering Anda makan. Apalagi saat masih hangat, aroma ikan, rasa lemak dan serat protein dari dagingnya akan sangat terasa khas, berbeda dengan makanan cepat saji yang sering Anda santap. Barulah setelah mencoba kekayaan rasa ini, nutrisi baik dalam ikan Dory akan bersatu dengan sensasi pedas sambal matah yang juga juara. Dipadu dalam semangkuk Rice Bowl yang compatible dengan berbagai acara dan momen, kemudahan menikmati hidangan ini akan semakin terasa, juga kemewahan rasanya yang langka.', 'Sebagaimana porsi rice-bowl yang pas untuk segala usia, Potongan daging Dory-nya besar, cukup untuk seporsi bahkan lebih. Di atasnya, disiram Sambal Matah yang jadi primadona penikmat ikan dan menu berbasis goreng atau hangat seperti ini. Rice Bowl Nasi Dory Sambal Matah jadi komplit karena lauk protein dari Dory dilengkapi dengan porsi pas nasi putih hangat, sambal matah, potongan bawang segar bahkan bawang goreng sebagai variasinya. Inilah mengapa Rice Bowl Nasi Dory ini cocok untuk selera orang Indonesia yang senang dengan sensasi gurih dan pedas sekaligus.\r\n\r\nSaat disantap, yang pertama kali dinikmati sebaiknya adalah daging Dory-nya langsung. Selain krispy di luar, tekstur daging Dory di dalamnya yang putih langsung memberikan sensasi beda dengan yang sering Anda makan. Apalagi saat masih hangat, aroma ikan, rasa lemak dan serat protein dari dagingnya akan sangat terasa khas, berbeda dengan makanan cepat saji yang sering Anda santap. Barulah setelah mencoba kekayaan rasa ini, nutrisi baik dalam ikan Dory akan bersatu dengan sensasi pedas sambal matah yang juga juara. Dipadu dalam semangkuk Rice Bowl yang compatible dengan berbagai acara dan momen, kemudahan menikmati hidangan ini akan semakin terasa, juga kemewahan rasanya yang langka.', 'standard', 'news7.png', NULL, NULL, NULL, 'Suryo Atmojo', 'pengenalan-worksheet-dan-workbook-di-ms-excel', 'published', 'post_5766', 6, 7, '2022-12-23 01:34:41', '2023-01-06 06:12:09');
INSERT INTO `news` VALUES (8, 'Gurihnya Tempe Mendoan Bikin Nambah Terus', 'Banyak disebut sebagai fast food, comfort food ataupun jajan pasar, Tempe Mendoan masuk kategori jajan gurih paling banyak dicari. Isinya yang mengandung kacang kedelai segar yang digoreng bersama balutan tepung bumbu, Tempe Mendoan mengisi keseharian banyak orang sejak pagi, sampai malam hari. Apapun kegiatan ngumpulnya, Tempe Mendoan selalu cocok sebagai camilan. Bentuknya beragam: kotak, segitiga, tidak beraturan. Tapi rasanya senantiasa senada: gurih renyah dan menggugah selera.\r\n\r\nKenapa Tempe Mendoan begitu enak, ya? Tekstur isinya yang empuk dengan kandungan protein nabati asli bisa mengenyangkan perut, sementara bagian luarnya yang dibalut tepung bumbu dan bahan segar lain menghasilkan tekstur crunchy yang membuai lidah. Apakah ini cukup? Ternyata belum. Rasa gurih dari bumbunya sering kali masih menggantung di mulut bahkan setelah gigitan terakhir. Itulah kenapa Tempe Mendoan sering dijadikan appetizer sebelum makanan lebih besar. Atau di beberapa daerah, dimakan bersamaan dengan hidangan utama. Mantap, bukan?', 'Banyak disebut sebagai fast food, comfort food ataupun jajan pasar, Tempe Mendoan masuk kategori jajan gurih paling banyak dicari. Isinya yang mengandung kacang kedelai segar yang digoreng bersama balutan tepung bumbu, Tempe Mendoan mengisi keseharian banyak orang sejak pagi, sampai malam hari. Apapun kegiatan ngumpulnya, Tempe Mendoan selalu cocok sebagai camilan. Bentuknya beragam: kotak, segitiga, tidak beraturan. Tapi rasanya senantiasa senada: gurih renyah dan menggugah selera.\r\n\r\nKenapa Tempe Mendoan begitu enak, ya? Tekstur isinya yang empuk dengan kandungan protein nabati asli bisa mengenyangkan perut, sementara bagian luarnya yang dibalut tepung bumbu dan bahan segar lain menghasilkan tekstur crunchy yang membuai lidah. Apakah ini cukup? Ternyata belum. Rasa gurih dari bumbunya sering kali masih menggantung di mulut bahkan setelah gigitan terakhir. Itulah kenapa Tempe Mendoan sering dijadikan appetizer sebelum makanan lebih besar. Atau di beberapa daerah, dimakan bersamaan dengan hidangan utama. Mantap, bukan?', 'standard', 'news8.png', NULL, NULL, NULL, 'Suryo Atmojo', 'laravel---how-to-get-base-url-in-laravel', 'pending', 'post_1223', 6, 4, '2022-12-26 03:48:38', '2023-01-06 06:12:08');
INSERT INTO `news` VALUES (9, 'Ronde dan Kehangatan Instan yang Dirindukan', 'Ada momen-momen ketika kita ingin waktu berjalan lebih lambat dan pikiran jadi dengan lebih santai, hanya mengobrol dan berbagi pengalaman. Di momen-momen seperti inilah, sering kali terpikir mencari kudapan atau minuman hangat yang bisa menenangkan sampai ke jiwa. Nah, salah satu jajanan khas Jawa Tengah seperti wedang Ronde hadir sebagai hidangan yang pas. Seperti namanya, yang satu ini mengandung ronde, atau bola-bola kenyal yang biasanya terbuat dari tepung beras atau ketan. Satu demi satu disendok, tak terasa cerita mengalir dan mengenang.\r\n\r\nDi tempat asalnya, wedang Ronde sering dihidangkan dari senja untuk melewati malam, dihampar di tempat-tempat wisata atau di mana orang-orang berkumpul menikmati waktu santai bersama. Kadang ditemani lagu-lagu nostalgia atau pengamen-pengamen jalanan. Dalam konsep yang lebih baru, Ronde disajikan hingga ke resto-resto dan ruang tunggu bandar udara. Nuansa tradisinya begitu kental, sebagaimana rasa hangat yang dibawa bersama isiannya.', 'Ada momen-momen ketika kita ingin waktu berjalan lebih lambat dan pikiran jadi dengan lebih santai, hanya mengobrol dan berbagi pengalaman. Di momen-momen seperti inilah, sering kali terpikir mencari kudapan atau minuman hangat yang bisa menenangkan sampai ke jiwa. Nah, salah satu jajanan khas Jawa Tengah seperti wedang Ronde hadir sebagai hidangan yang pas. Seperti namanya, yang satu ini mengandung ronde, atau bola-bola kenyal yang biasanya terbuat dari tepung beras atau ketan. Satu demi satu disendok, tak terasa cerita mengalir dan mengenang.\r\n\r\nDi tempat asalnya, wedang Ronde sering dihidangkan dari senja untuk melewati malam, dihampar di tempat-tempat wisata atau di mana orang-orang berkumpul menikmati waktu santai bersama. Kadang ditemani lagu-lagu nostalgia atau pengamen-pengamen jalanan. Dalam konsep yang lebih baru, Ronde disajikan hingga ke resto-resto dan ruang tunggu bandar udara. Nuansa tradisinya begitu kental, sebagaimana rasa hangat yang dibawa bersama isiannya.', 'standard', 'news9.png', NULL, NULL, NULL, 'Suryo Atmojo', 'cara-print-excel-agar-tidak-terpotong-full-kertas-a4', 'published', 'post_6737', 9, 7, '2023-01-06 08:03:07', '2023-01-06 08:03:07');
INSERT INTO `news` VALUES (10, 'Sajian yang bisa melengkapi agenda bisnis anda!', 'Teruntuk masyarakat Surabaya…Nasi Kare Ayam sudah pasti bukan sajian yang asing. Namun, sedikit dari orang Surabaya yang mengetahui ada olahan kare yang aman dikonsumsi dalam nasi kotak.\r\n\r\nYes, benar sekali. Menu ini hanya tersedia di Pandan Garden! Olahan kare ayam yang bisa dikonsumsi garingan ini terdapat di daftar Menu Spesial PO yang setiap minggunya berganti! Pengiriman dan jumlah pesanan juga bisa diatur loh, jadi meeting kapanpun bukan lagi menjadi masalah orang-orang yang lapar! ', 'Teruntuk masyarakat Surabaya…Nasi Kare Ayam sudah pasti bukan sajian yang asing. Namun, sedikit dari orang Surabaya yang mengetahui ada olahan kare yang aman dikonsumsi dalam nasi kotak.\r\n\r\nYes, benar sekali. Menu ini hanya tersedia di Pandan Garden! Olahan kare ayam yang bisa dikonsumsi garingan ini terdapat di daftar Menu Spesial PO yang setiap minggunya berganti! Pengiriman dan jumlah pesanan juga bisa diatur loh, jadi meeting kapanpun bukan lagi menjadi masalah orang-orang yang lapar! ', 'standard', 'news10.png', NULL, NULL, NULL, 'Suryo Atmojo', 'cara-membuat-grafik-di-word', 'published', 'post_7231', 10, 7, '2023-01-06 08:14:17', '2023-01-06 08:14:17');
INSERT INTO `news` VALUES (11, 'Rasa Warisan dalam Semangkok Soto Ayam', 'Konon, pada abad ke-19 banyak pendatang dari Tiongkok membaur dengan kegiatan ekonomi masyarakat pesisir utara Jawa. Mereka membuka warung-warung dan menjajakan makanan sop keliling yang disebut cau do atau jao to, berupa kuah bumbu yang dilengkapi potong-potongan daging. Popularitas rasa dan bentuknya yang segar membuat kalangan muslim pribumi menyesuaikan daging isian jao to menjadi daging-daging yang lebih diterima banyak kalangan, termasuk daging dan jeroan ayam. Inilah cikal bakal Soto Ayam yang kita kenal sekarang.\r\n\r\nNikmat dan segar rasa warisan Soto Ayam membuatnya jadi sajian favorit semakin banyak orang, lalu membaur dengan selera banyak daerah. Setelah berbagai penyesuaian, rasa Soto Ayam jadi beraneka ragam tergantung daerahnya. Kita mengenal Soto Ayam dari Lamongan, Kudus, berbagai daerah Jawa Tengah, termasuk soto-soto ayam racikan rumah tangga dengan aneka modifikasinya sendiri. Nah, meski variasinya banyak, Soto Ayam tetaplah menyimpan rasa warisan yang senantiasa dicari: kuah segar berempah dengan isian daging yang menggugah selera, selalu. ', 'Konon, pada abad ke-19 banyak pendatang dari Tiongkok membaur dengan kegiatan ekonomi masyarakat pesisir utara Jawa. Mereka membuka warung-warung dan menjajakan makanan sop keliling yang disebut cau do atau jao to, berupa kuah bumbu yang dilengkapi potong-potongan daging. Popularitas rasa dan bentuknya yang segar membuat kalangan muslim pribumi menyesuaikan daging isian jao to menjadi daging-daging yang lebih diterima banyak kalangan, termasuk daging dan jeroan ayam. Inilah cikal bakal Soto Ayam yang kita kenal sekarang.\r\n\r\nNikmat dan segar rasa warisan Soto Ayam membuatnya jadi sajian favorit semakin banyak orang, lalu membaur dengan selera banyak daerah. Setelah berbagai penyesuaian, rasa Soto Ayam jadi beraneka ragam tergantung daerahnya. Kita mengenal Soto Ayam dari Lamongan, Kudus, berbagai daerah Jawa Tengah, termasuk soto-soto ayam racikan rumah tangga dengan aneka modifikasinya sendiri. Nah, meski variasinya banyak, Soto Ayam tetaplah menyimpan rasa warisan yang senantiasa dicari: kuah segar berempah dengan isian daging yang menggugah selera, selalu. ', 'standard', 'news11.png', NULL, NULL, NULL, 'Suryo Atmojo', 'algoritma---searching', 'published', 'post_1459', 11, 1, '2023-01-11 12:52:43', '2023-01-11 12:53:18');
INSERT INTO `news` VALUES (13, 'Complete Laravel 8 Image upload Tutorial with example', 'How To Upload An Image In Laravel 8 single File', '<h2 id=\"create-blade-view\"><strong>Create Blade View</strong></h2>\r\n<p><img class=\"attachment-epcl_single_standard size-epcl_single_standard wp-post-image\" src=\"https://b2589717.smushcdn.com/2589717/wp-content/uploads/2019/12/laravel-950x500.png?lossy=1&amp;strip=1&amp;webp=1\" alt=\"laravel\" width=\"631\" height=\"332\" data-lazy=\"false\" /></p>\r\n<p>Now we&rsquo;ve our routes, controller and model, we need to create blade files to add and display images. For adding the image-</p>\r\n<div class=\"code-toolbar\">\r\n<pre class=\"wp-block-code  language-php\" tabindex=\"0\"><code class=\"  language-php\"><span class=\"token comment\">//add_image.blade.php</span>\r\n<span class=\"token operator\">&lt;</span>div <span class=\"token keyword\">class</span><span class=\"token operator\">=</span><span class=\"token double-quoted-string string\">\"container\"</span><span class=\"token operator\">&gt;</span>\r\n  <span class=\"token operator\">&lt;</span>form method<span class=\"token operator\">=</span><span class=\"token double-quoted-string string\">\"post\"</span> action<span class=\"token operator\">=</span><span class=\"token double-quoted-string string\">\"{{ route(\'images.store\') }}\"</span> \r\n		enctype<span class=\"token operator\">=</span><span class=\"token double-quoted-string string\">\"multipart/form-data\"</span><span class=\"token operator\">&gt;</span>\r\n    @csrf\r\n    <span class=\"token operator\">&lt;</span>div <span class=\"token keyword\">class</span><span class=\"token operator\">=</span><span class=\"token double-quoted-string string\">\"image\"</span><span class=\"token operator\">&gt;</span>\r\n      <span class=\"token operator\">&lt;</span>label<span class=\"token operator\">&gt;</span><span class=\"token operator\">&lt;</span>h4<span class=\"token operator\">&gt;</span>Add image<span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>h4<span class=\"token operator\">&gt;</span><span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>label<span class=\"token operator\">&gt;</span>\r\n      <span class=\"token operator\">&lt;</span>input type<span class=\"token operator\">=</span><span class=\"token double-quoted-string string\">\"file\"</span> <span class=\"token keyword\">class</span><span class=\"token operator\">=</span><span class=\"token double-quoted-string string\">\"form-control\"</span> required name<span class=\"token operator\">=</span><span class=\"token double-quoted-string string\">\"image\"</span><span class=\"token operator\">&gt;</span>\r\n    <span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>div<span class=\"token operator\">&gt;</span>\r\n\r\n    <span class=\"token operator\">&lt;</span>div <span class=\"token keyword\">class</span><span class=\"token operator\">=</span><span class=\"token double-quoted-string string\">\"post_button\"</span><span class=\"token operator\">&gt;</span>\r\n      <span class=\"token operator\">&lt;</span>button type<span class=\"token operator\">=</span><span class=\"token double-quoted-string string\">\"submit\"</span> <span class=\"token keyword\">class</span><span class=\"token operator\">=</span><span class=\"token double-quoted-string string\">\"btn btn-success\"</span><span class=\"token operator\">&gt;</span>Add<span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>button<span class=\"token operator\">&gt;</span>\r\n    <span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>div<span class=\"token operator\">&gt;</span>\r\n  <span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>form<span class=\"token operator\">&gt;</span>\r\n<span class=\"token operator\">&lt;</span><span class=\"token operator\">/</span>div<span class=\"token operator\">&gt;</span></code></pre>\r\n<div class=\"toolbar\">\r\n<div class=\"toolbar-item\">PHP</div>\r\n<div class=\"toolbar-item\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<p>Here is the HTML code for adding data to a database through the form. Inside the form, we have an input field that takes images as files and a submit button for submitting the data. When you are going to upload an image to a database in laravel remember you must have to use (enctype=&rdquo;multipart/form-data&rdquo;). Otherwise, it&rsquo;ll not work. Our, method is &ldquo;post&rdquo; because we&rsquo;re inserting data not getting. Be careful about that. And in the action, we&rsquo;re going to define the route name where we put our data storing functionality.</p>', '', '167479307832.jpg', NULL, NULL, NULL, '', '', '', '', 0, 7, '2023-01-27 03:48:31', '2023-01-27 04:17:58');

-- ----------------------------
-- Table structure for news_category
-- ----------------------------
DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of news_category
-- ----------------------------
INSERT INTO `news_category` VALUES (1, 'Algorithm', 'algorithm', NULL, '2022-12-06 16:23:30');
INSERT INTO `news_category` VALUES (2, 'PHP', 'php', NULL, '2022-12-06 16:23:56');
INSERT INTO `news_category` VALUES (3, 'Codeigniter', 'codeigniter', '2022-12-06 16:24:05', '2022-12-06 16:24:05');
INSERT INTO `news_category` VALUES (4, 'Laravel', 'laravel', '2022-12-06 16:24:12', '2022-12-06 16:24:12');
INSERT INTO `news_category` VALUES (5, 'React Native', 'react-native', '2022-12-06 16:24:24', '2022-12-06 16:24:24');
INSERT INTO `news_category` VALUES (6, 'Cordova', 'cordova', '2022-12-06 16:24:32', '2022-12-06 16:24:32');
INSERT INTO `news_category` VALUES (7, 'Software', 'software', '2022-12-08 01:59:25', '2022-12-08 01:59:25');

-- ----------------------------
-- Table structure for news_image
-- ----------------------------
DROP TABLE IF EXISTS `news_image`;
CREATE TABLE `news_image`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `blog_image_blog_id_foreign`(`blog_id` ASC) USING BTREE,
  CONSTRAINT `news_image_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of news_image
-- ----------------------------
INSERT INTO `news_image` VALUES (1, 'demo/img/blog/gallery_image_9329.jpg', 3, NULL, NULL);
INSERT INTO `news_image` VALUES (2, 'demo/img/blog/gallery_image_7303.jpg', 3, NULL, NULL);
INSERT INTO `news_image` VALUES (3, 'demo/img/blog/gallery_image_4276.jpg', 3, NULL, NULL);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('admin@gmail.com', '', '2023-01-10 04:28:20');
INSERT INTO `password_resets` VALUES ('suryoatm@gmail.com', 'mfPjK8qcCQD5m5lFaQAnQSdL08q16p5jCBnGaGnArzNQV477aQf7DqPId90ihfl5', '2023-01-31 05:07:16');

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, 'role-list', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (2, 'role-create', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (3, 'role-edit', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (4, 'role-delete', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (5, 'product-list', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (6, 'product-create', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (7, 'product-edit', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (8, 'product-delete', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (9, 'permission-list', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (10, 'permission-create', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (11, 'permission-edit', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (12, 'permission-delete', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');
INSERT INTO `permissions` VALUES (13, 'menu-permission', 'web', '2022-09-16 06:38:30', '2022-09-16 06:38:30');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id` ASC) USING BTREE,
  CONSTRAINT `role_has_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (1, 2);
INSERT INTO `role_has_permissions` VALUES (1, 3);
INSERT INTO `role_has_permissions` VALUES (1, 4);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (2, 3);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (3, 3);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (4, 3);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (5, 2);
INSERT INTO `role_has_permissions` VALUES (5, 3);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (6, 3);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (7, 3);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (8, 3);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (9, 3);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (10, 3);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (11, 3);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (12, 3);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (13, 3);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Admin', 'web', '2022-09-16 08:26:44', '2022-09-16 08:26:44');
INSERT INTO `roles` VALUES (2, 'staff', 'web', '2022-09-16 08:36:15', '2022-09-16 08:36:15');
INSERT INTO `roles` VALUES (3, 'member', 'web', '2022-10-13 03:13:07', '2022-10-13 03:13:07');
INSERT INTO `roles` VALUES (4, 'Verifikator', 'web', '2023-02-02 06:31:03', '2023-02-02 06:31:03');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `site_detail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `site_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `site_currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `site_logo_front` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `site_logo_admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stripe_screet_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stripe_publishable_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stripe_webhook_screet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `domain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gst` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES (4, 'Supresso', 'supresso branch singapore', '1', '2', '', '', 'qwerty', 'asdfg', 'zxcvb', 'poiuyt', 'lkjhgf', 8);

-- ----------------------------
-- Table structure for sliders
-- ----------------------------
DROP TABLE IF EXISTS `sliders`;
CREATE TABLE `sliders`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `custom_script` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `below_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_date` date NOT NULL,
  `flag` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_who` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_who` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desktop_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_text_form` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sliders
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_banner
-- ----------------------------
DROP TABLE IF EXISTS `tbl_banner`;
CREATE TABLE `tbl_banner`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_banner
-- ----------------------------
INSERT INTO `tbl_banner` VALUES (2, 'Selamat Datang Di Desa Nambak', '<p>Desa penuh dengan inspirasi</p>', 'Pembuka', '169556255786.jpg', '2023-09-24 13:35:58', '2023-09-24 13:35:58');
INSERT INTO `tbl_banner` VALUES (3, 'Sosialisasi Parenting Bagi Anak', '<p><em>Lorem ipsum </em>is placeholder text commonly used in the graphic, print, and publishing</p>', 'Highlight', '169556279434.jpg', '2023-09-24 13:39:54', '2023-09-24 14:39:36');
INSERT INTO `tbl_banner` VALUES (4, 'Perjanjian Kontrak Dengan UWP', '<p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing</p>', 'Highlight', '169556284594.jpg', '2023-09-24 13:40:45', '2023-09-24 13:40:45');

-- ----------------------------
-- Table structure for tbl_berita
-- ----------------------------
DROP TABLE IF EXISTS `tbl_berita`;
CREATE TABLE `tbl_berita`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isi_berita` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_berita
-- ----------------------------
INSERT INTO `tbl_berita` VALUES (1, 'Berita 1', '<p>Lorem ipsum dolor sit amet<em><strong><u>, consectetur adipiscing elit, </u></strong></em>sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt augue interdum velit euismod in pellentesque massa. Ornare massa eget egestas purus. Diam donec adipiscing tristique risus. Nunc eget lorem dolor sed viverra ipsum nunc. Et ligula ullamcorper malesuada proin libero nunc. Dolor sed viverra ipsum nunc. <span style=\"color:#2ecc71;\">Risus ultricies tristique nulla aliquet enim tortor at auctor. Laoreet id donec ultrices tincidunt arcu non sodales neque sodales. Sit amet dictum sit amet justo donec enim.</span></p>', '1,4', '169582457476.jpg', '2023-09-27 14:22:54', '2023-09-27 14:22:54');
INSERT INTO `tbl_berita` VALUES (2, 'Berita 2', '<p>Aliquam sem fringilla ut <span style=\"color:#e74c3c;\">morbi tincidunt augue interdum.</span> Dolor magna eget est lorem ipsum. Condimentum lacinia quis vel eros <strong>donec ac odio tempor. </strong>Vulputate enim nulla aliquet porttitor. Quam pellentesque nec nam aliquam. Sit amet purus gravida quis blandit turpis. Mauris cursus mattis molestie a. Amet commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Erat nam at lectus urna duis convallis convallis tellus id. Aliquam etiam erat velit scelerisque in. Dignissim diam quis enim lobortis. Imperdiet massa tincidunt nunc pulvinar sapien. Sagittis id consectetur purus ut faucibus pulvinar elementum. Amet mattis vulputate enim nulla aliquet porttitor lacus luctus accumsan. Id porta nibh venenatis cras. Non enim praesent elementum facilisis leo vel fringilla. Est lorem ipsum dolor sit.</p>', '3,5', '169582465112.png', '2023-09-27 14:24:11', '2023-09-27 14:24:11');
INSERT INTO `tbl_berita` VALUES (3, 'Berita 3', '<p>Montes nascetur ridiculus mus mauris. Lectus proin nibh nisl condimentum id venenatis a condimentum. Faucibus nisl tincidunt eget nullam non nisi. Sed odio morbi quis commodo odio aenean sed adipiscing. Leo integer malesuada nunc vel risus commodo viverra. Nunc sed blandit libero volutpat sed cras ornare arcu. Libero enim sed faucibus turpis in eu mi bibendum neque. Tempus egestas sed sed risus pretium quam vulputate. Maecenas ultricies mi eget mauris pharetra et. Eu facilisis sed odio morbi quis commodo odio aenean. Vulputate dignissim suspendisse in est ante in nibh mauris cursus. Sit amet nisl suscipit adipiscing bibendum est. Venenatis a condimentum vitae sapien pellentesque habitant morbi.</p>', '1,2', '169582631356.png', '2023-09-27 21:51:53', '2023-09-27 21:51:53');

-- ----------------------------
-- Table structure for tbl_data_dan_informasi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_data_dan_informasi`;
CREATE TABLE `tbl_data_dan_informasi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isi_data_informasi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_data_dan_informasi
-- ----------------------------
INSERT INTO `tbl_data_dan_informasi` VALUES (1, 'Jumlah Penduduk', 'Jumlah Penduduk Laki-laki', '<p><span style=\"color:#2ecc71;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At consectetur lorem donec massa sapien faucibus et. Justo nec ultrices dui sapien eget. Aliquet risus feugiat in ante metus dictum at tempor. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Auctor elit s</span>ed vulputate mi sit amet. Sit amet aliquam id diam maecenas ultricies mi eget mauris. Tortor dignissim convallis aenean et tortor. Vitae tempus quam pellentesque nec nam aliquam sem. Id interdum <strong>velit laoreet id donec. Duis ultricies lacus sed turpis tincidunt id aliquet risus. Rutrum quisque non tellus orci ac auctor augue mauris. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam.</strong></p>', '2,3', '169590734959.jpg', '2023-09-28 20:22:29', '2023-09-28 20:22:29');
INSERT INTO `tbl_data_dan_informasi` VALUES (4, 'Jumlah Penduduk', 'Jumlah Penduduk Perempuan', '<p><span style=\"color:#27ae60;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At consectetur lorem donec massa sapien faucibus et. Justo nec ultrices dui sapien eget. Aliquet risus feugiat in ante metus dictum at tempor. </span>Mi ipsum<span style=\"color:#c0392b;\"> faucibus vitae aliquet nec ullamcorper</span> sit amet. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Auctor elit sed vulputate mi sit amet. Sit amet aliquam id diam maecenas ultricies mi eget mauris. Tortor dignissim convallis aenean et tortor. Vitae tempus quam pellentesque nec nam aliquam sem. Id interdum velit laoreet id donec. Duis ultricies lacus sed turpis tincidunt id aliquet risus. Rutrum quisque non tellus orci ac auctor augue mauris. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam.</p>', '2,3', '169590942520.png', '2023-09-28 20:57:05', '2023-09-28 20:59:49');
INSERT INTO `tbl_data_dan_informasi` VALUES (5, 'Informasi Reproduksi Perempuan', 'Informasi Reproduksi Perempuan ke 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At consectetur lorem donec massa sapien faucibus et. Justo nec ultrices dui sapien eget. Aliquet risus feugiat in ante metus dictum at tempor. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Auctor elit sed vulputate mi sit amet. Sit amet aliquam id diam maecenas ultricies mi eget mauris. Tortor dignissim convallis aenean et tortor. Vitae tempus quam pellentesque nec nam aliquam sem. Id interdum velit laoreet id donec. Duis ultricies lacus sed turpis tincidunt id aliquet risus. Rutrum quisque non tellus orci ac auctor augue mauris. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam.</p>', '1,3,5', '169591134243.jpg', '2023-09-28 21:29:02', '2023-09-28 21:29:02');
INSERT INTO `tbl_data_dan_informasi` VALUES (6, 'Perkembangan Anak', 'Perkembangan Anak KE 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At consectetur lorem donec massa sapien faucibus et. Justo nec ultrices dui sapien eget. Aliquet risus feugiat in ante metus dictum at tempor. Mi ipsum faucibus vitae aliquet nec ullamcorper sit amet. Cras fermentum odio eu feugiat pretium nibh ipsum consequat. Auctor elit sed vulputate mi sit amet. Sit amet aliquam id diam maecenas ultricies mi eget mauris. Tortor dignissim convallis aenean et tortor. Vitae tempus quam pellentesque nec nam aliquam sem. Id interdum velit laoreet id donec. Duis ultricies lacus sed turpis tincidunt id aliquet risus. Rutrum quisque non tellus orci ac auctor augue mauris. Sed lectus vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt. Feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam.</p>\r\n\r\n<ol>\r\n	<li>JJDJSDS</li>\r\n	<li>ususdushd</li>\r\n	<li>dssdhsio</li>\r\n	<li>sdsidjsdjsi</li>\r\n</ol>\r\n\r\n<p>hhoushdoshdiadhiasdiasdjaois</p>', '5', '169591325686.jpg', '2023-09-28 22:00:56', '2023-09-28 22:00:56');

-- ----------------------------
-- Table structure for tbl_footer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_footer`;
CREATE TABLE `tbl_footer`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prakata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `hari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jam_oprasional` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_footer
-- ----------------------------
INSERT INTO `tbl_footer` VALUES (1, 'Prakata', 'Prakata Footer', '<p>Montes nascetur ridiculus mus mauris. Lectus proin nibh nisl condimentum id venenatis a condimentum. Faucibus nisl tincidunt eget nullam non nisi. Sed odio morbi quis commodo odio aenean sed adipiscing. Leo integer malesuada nunc vel risus commodo viverra. Nunc sed blandit libero volutpat sed cras ornare arcu. Libero enim sed faucibus turpis in eu mi bibendum neque. Tempus egestas sed sed risus pretium quam vulputate. Maecenas ultricies mi eget mauris pharetra et. Eu facilisis sed odio morbi quis commodo odio aenean. Vulputate dignissim suspendisse in est ante in nibh mauris cursus. Sit amet nisl suscipit adipiscing bibendum est. Venenatis a condimentum vitae sapien pellentesque habitant morbi.</p>', NULL, NULL, '2023-09-27 23:48:25', '2023-09-27 23:48:25');
INSERT INTO `tbl_footer` VALUES (2, 'Oprasional', 'oprasional 1', NULL, 'Senin - Rabu', '08:00 - 15:00', '2023-09-28 00:11:08', '2023-09-28 00:11:08');
INSERT INTO `tbl_footer` VALUES (3, 'Oprasional', 'Oprasional 2', NULL, 'Kamis - Jumat', '08:30 - 16:00', '2023-09-28 00:13:32', '2023-09-28 00:13:32');

-- ----------------------------
-- Table structure for tbl_form
-- ----------------------------
DROP TABLE IF EXISTS `tbl_form`;
CREATE TABLE `tbl_form`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_tlp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `aduan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_form
-- ----------------------------
INSERT INTO `tbl_form` VALUES (1, 'tesss', 'sasas', '4432432432', 'dadasdasdas', 'asdasdasdasdasdas', '2023-09-29 00:18:06', '2023-09-29 00:18:06');
INSERT INTO `tbl_form` VALUES (2, 'adsadsa', 'nfghfgh', 'htrhet3453543534', 'fgdfgrhtrh', 'thhgtrhregergregr', '2023-09-29 00:19:20', '2023-09-29 00:19:20');

-- ----------------------------
-- Table structure for tbl_galeri
-- ----------------------------
DROP TABLE IF EXISTS `tbl_galeri`;
CREATE TABLE `tbl_galeri`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_galeri
-- ----------------------------
INSERT INTO `tbl_galeri` VALUES (2, 'Didalam Desa', 'Senam Sehat', '169565126295.jpg', '2023-09-25 14:14:22', '2023-09-25 14:14:22');
INSERT INTO `tbl_galeri` VALUES (3, 'Diluar Desa', 'Turnamen Sepak Bola', '169565128130.jpg', '2023-09-25 14:14:41', '2023-09-25 14:14:41');

-- ----------------------------
-- Table structure for tbl_kontak
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kontak`;
CREATE TABLE `tbl_kontak`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isi_kontak` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_kontak
-- ----------------------------
INSERT INTO `tbl_kontak` VALUES (1, 'Alamat', 'ini alamat desa edit', 'Edit Jl. Suka sama aku nikah sama dia', NULL, '2023-09-21 15:04:06', '2023-09-21 15:19:16');
INSERT INTO `tbl_kontak` VALUES (3, 'Email', 'Email official', 'desanambak@gmail.com', NULL, '2023-09-28 13:38:04', '2023-09-28 13:38:04');
INSERT INTO `tbl_kontak` VALUES (4, 'Telepon', 'Telepon Kami', '0823987*****', NULL, '2023-09-28 13:39:23', '2023-09-28 13:39:23');
INSERT INTO `tbl_kontak` VALUES (5, 'Facebook', 'Facebook', NULL, 'https://www.facebook.com/youtcubs.ananda', '2023-09-28 15:13:56', '2023-09-28 15:13:56');

-- ----------------------------
-- Table structure for tbl_layanan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_layanan`;
CREATE TABLE `tbl_layanan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_layanan
-- ----------------------------
INSERT INTO `tbl_layanan` VALUES (2, 'Foto Kades', 'Foto kades', NULL, '169564815145.png', '2023-09-25 13:14:15', '2023-09-25 13:22:31');
INSERT INTO `tbl_layanan` VALUES (4, 'Layanan', 'Layanan 2', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In vitae turpis massa sed elementum tempus egestas sed.</p>', NULL, '2023-09-25 13:28:07', '2023-09-25 13:28:07');
INSERT INTO `tbl_layanan` VALUES (5, 'Layanan', 'Layanan 3', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In vitae turpis massa sed elementum tempus egestas sed.</p>', NULL, '2023-09-25 13:28:19', '2023-09-25 13:28:19');
INSERT INTO `tbl_layanan` VALUES (6, 'Layanan', 'Layanan 4', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In vitae turpis massa sed elementum tempus egestas sed.</p>', NULL, '2023-09-25 13:28:33', '2023-09-25 13:28:33');
INSERT INTO `tbl_layanan` VALUES (7, 'Layanan', 'Layanan 5', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In vitae turpis massa sed elementum tempus egestas sed.</p>', NULL, '2023-09-25 13:28:45', '2023-09-25 13:28:45');
INSERT INTO `tbl_layanan` VALUES (9, 'Layanan', 'Layanan 6', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In vitae turpis massa sed elementum tempus egestas sed.dsdsdsds</p>', NULL, '2023-09-25 14:06:25', '2023-09-25 14:06:25');

-- ----------------------------
-- Table structure for tbl_tag
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tag`;
CREATE TABLE `tbl_tag`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `link` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_tag
-- ----------------------------
INSERT INTO `tbl_tag` VALUES (1, 'Santri Coding', 'https://santrikoding.com/tutorial-laravel-8-edit-update-data', '2023-09-24 12:46:29', '2023-09-24 12:46:29');
INSERT INTO `tbl_tag` VALUES (2, 'Bootstrap', 'https://getbootstrap.com/docs/5.0/components/modal/', '2023-09-24 12:47:10', '2023-09-24 12:47:10');
INSERT INTO `tbl_tag` VALUES (3, 'Editor Online', 'https://www.shutterstock.com/create/editor/CiQ2N2U1ODgwNC0zNDUyLTQ4YzgtOTFjNC1jYWMyMjI1YjNiYzQ?pageType=home&subpageType=catalog', '2023-09-24 12:47:36', '2023-09-24 12:47:36');
INSERT INTO `tbl_tag` VALUES (4, 'Darmaji', 'https://www.dermaji.desa.id/prestasi/', '2023-09-24 12:48:04', '2023-09-24 12:48:04');
INSERT INTO `tbl_tag` VALUES (5, 'Petani Code', 'https://www.petanikode.com/github-ssh/', '2023-09-24 13:03:32', '2023-09-24 13:03:32');

-- ----------------------------
-- Table structure for tbl_tentang_desa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tentang_desa`;
CREATE TABLE `tbl_tentang_desa`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `judul` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `prakata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `pertanyaan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jawaban` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_tentang_desa
-- ----------------------------
INSERT INTO `tbl_tentang_desa` VALUES (3, 'Moto', 'Moto Desa', NULL, '<p><strong><span style=\"color:#ecf0f1;\">Guyup Rukun Wargane</span></strong></p>', NULL, NULL, NULL, '2023-09-24 15:07:19', '2023-09-25 15:03:59');
INSERT INTO `tbl_tentang_desa` VALUES (4, 'Profil', 'profil desa', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sem integer vitae justo eget magna fermentum iaculis. Ac ut consequat semper viverra nam libero justo laoreet. Commodo sed egestas egestas fringilla phasellus faucibus. Ultrices dui sapien eget mi proin. Id leo in vitae turpis massa sed elementum tempus egestas. Imperdiet dui accumsan sit amet nulla. Nisl suscipit adipiscing bibendum est ultricies integer quis. Pretium fusce id velit ut tortor. A diam maecenas sed enim.</p>\r\n\r\n<p>Fusce ut placerat orci nulla pellentesque dignissim enim sit amet. Scelerisque viverra mauris in aliquam sem fringilla ut morbi tincidunt. Netus et malesuada fames ac turpis egestas sed. Congue mauris rhoncus aenean vel elit. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Tristique sollicitudin nibh sit amet commodo nulla. Pharetra sit amet aliquam id diam maecenas. Velit dignissim sodales ut eu sem integer vitae justo. Aliquet sagittis id consectetur purus ut faucibus pulvinar elementum. Faucibus pulvinar elementum integer enim neque volutpat ac tincidunt. Bibendum at varius vel pharetra. Facilisis sed odio morbi quis commodo. Arcu odio ut sem nulla. Quam pellentesque nec nam aliquam. Nulla facilisi cras fermentum odio eu feugiat pretium nibh. Mauris nunc congue nisi vitae suscipit. At tellus at urna condimentum mattis pellentesque. Adipiscing commodo elit at imperdiet dui accumsan sit amet nulla.</p>', NULL, NULL, '169556817234.jpg', '2023-09-24 15:09:32', '2023-09-24 15:09:32');
INSERT INTO `tbl_tentang_desa` VALUES (5, 'Keunggulan', 'Keunggulan 1', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', NULL, NULL, NULL, '2023-09-24 15:13:37', '2023-09-24 15:36:49');
INSERT INTO `tbl_tentang_desa` VALUES (6, 'Keunggulan', 'keunggulan 2', NULL, '<p>consectetur adipiscing elit</p>', NULL, NULL, NULL, '2023-09-24 15:13:59', '2023-09-24 15:13:59');
INSERT INTO `tbl_tentang_desa` VALUES (7, 'Keunggulan', 'keunggulan 3', NULL, '<p>sed do eiusmod tempor incididunt ut</p>', NULL, NULL, NULL, '2023-09-24 15:15:02', '2023-09-24 15:15:02');
INSERT INTO `tbl_tentang_desa` VALUES (8, 'Keunggulan', 'Keunggulan 4', NULL, '<p>labore et dolore magna aliqua</p>', NULL, NULL, NULL, '2023-09-24 15:15:35', '2023-09-24 15:15:35');
INSERT INTO `tbl_tentang_desa` VALUES (9, 'Prakata Pertanyaan', 'Prakata Pertanyaan', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', NULL, NULL, NULL, NULL, '2023-09-24 15:16:18', '2023-09-24 15:16:18');
INSERT INTO `tbl_tentang_desa` VALUES (10, 'Pertanyaan Umum', 'pertanyaan 1', NULL, NULL, '<p>Lorem ipsum dolor ?</p>', '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata</p>', NULL, '2023-09-24 15:17:24', '2023-09-24 15:17:24');
INSERT INTO `tbl_tentang_desa` VALUES (11, 'Pertanyaan Umum', 'pertanyaan 2', NULL, NULL, '<p>consectetur adipiscing elit?</p>', '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata</p>', NULL, '2023-09-24 15:18:04', '2023-09-24 15:18:28');
INSERT INTO `tbl_tentang_desa` VALUES (12, 'Pertanyaan Umum', 'pertanyaan 3', NULL, NULL, '<p>Ut enim ad minim veniam?</p>', '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidata</p>', NULL, '2023-09-24 15:19:06', '2023-09-24 15:19:06');

-- ----------------------------
-- Table structure for tbl_testimoni
-- ----------------------------
DROP TABLE IF EXISTS `tbl_testimoni`;
CREATE TABLE `tbl_testimoni`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tanggapan` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_testimoni
-- ----------------------------
INSERT INTO `tbl_testimoni` VALUES (1, 'sadsdsd', 'asdasdasd', '', 'adADSXASXASAS', '2023-09-19 15:42:33', '2023-09-19 15:42:33');
INSERT INTO `tbl_testimoni` VALUES (2, 'yuyuyuyu', 'asasddsds', '16951382417.jpg', 'sdasdasdasdasdsad', '2023-09-19 15:44:01', '2023-09-19 15:44:01');
INSERT INTO `tbl_testimoni` VALUES (3, 'ayunda', 'RT/RW 009/009 Ds. Nambak', '169514225534.jpg', 'desa yang sangat asik dan masih asri', '2023-09-19 16:50:55', '2023-09-19 16:50:55');
INSERT INTO `tbl_testimoni` VALUES (4, 'Aji jaya', 'RT/RW 008/009', '169582443033.jpg', 'Ini desa yang sejuk dan bagus penataan desanya', '2023-09-27 14:20:30', '2023-09-27 14:20:30');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Dargombez', 'admin@gmail.com', NULL, '$2y$10$d/zDcHAcZPMi5ynYOXQUFud7692E/9ekSf3CI80z3EcNdiCRwgpDm', NULL, '2022-09-16 08:26:44', '2022-09-16 08:26:44');
INSERT INTO `users` VALUES (2, 'staff', 'dm@indraco.com', NULL, '$2y$10$yPwdRFYrpaRNIzJNv3zLcuhMaq/kBGTVG5EMTBWML1tm69qlLqTlG', NULL, '2022-09-16 08:36:35', '2022-09-16 08:36:35');
INSERT INTO `users` VALUES (3, 'asikin', 'asikin@asik.com', NULL, '$2y$10$AEvwlrJegigHuOMx0xgTZOuIXC8q/2lWSIjQvU1PZzOjibza3YbAq', NULL, '2022-09-16 08:53:02', '2022-09-16 08:53:02');
INSERT INTO `users` VALUES (4, 'Mintul', 'mintul@gmail.com', NULL, '$2y$10$29GHkAfriG13Hu.QT/J0Z.W17wEFEBefiN99PZ0HkFiGBu2MMoUhu', NULL, '2022-10-13 03:13:34', '2022-10-13 03:13:34');
INSERT INTO `users` VALUES (5, 'agus', 'assgiworld@gmail.com', NULL, '$2y$10$g/BmZgk.6m79ysTvwnZ7l.lulJm7cryrnEF1JMWaXiq3/2aohJhPi', NULL, '2022-10-18 06:49:43', '2022-10-20 09:16:33');
INSERT INTO `users` VALUES (6, 'nambak@gmail.com', 'nambak@gmail.com', NULL, '$2y$10$1bvw4J9RXAzIrpLWihJFJOWcoKOMbrTcZsTYC3uE1VdNNfQ6rDLRK', NULL, '2023-08-25 11:36:09', '2023-08-25 11:36:09');
INSERT INTO `users` VALUES (7, 'Admin', 'desanambak@gmail.com', NULL, '$2y$10$d/zDcHAcZPMi5ynYOXQUFud7692E/9ekSf3CI80z3EcNdiCRwgpDm', NULL, '2022-09-16 08:26:44', '2022-09-16 08:26:44');

SET FOREIGN_KEY_CHECKS = 1;
