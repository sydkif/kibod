-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for kibod
CREATE DATABASE IF NOT EXISTS `kibod` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `kibod`;

-- Dumping structure for table kibod.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `product` json DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  CONSTRAINT `FK_cart_user` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table kibod.cart: ~10 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT IGNORE INTO `cart` (`id`, `username`, `product`) VALUES
	(1, 'sos', '[]'),
	(2, 'budu', '[{"27": {"qty": "1", "name": "K6 RGB Backlit Blue Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-blue-with-type-C-RGB-white-backlight_3d876bd9-1dbb-468f-b0de-6d6a2c98e2ba_540x.jpg?v=1621238767", "price": "69"}}]'),
	(3, 'air', '[]'),
	(8, 'qwe', '[]'),
	(9, 'salah', '[{"23": {"qty": "1", "name": "K8 RGB Backlit Brown Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-brown_1800x1800.jpg?v=1622187479", "price": "74"}}, {"24": {"qty": "1", "name": "K8 RGB Backlit Blue Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-blue_1800x1800.jpg?v=1622187417", "price": "74"}}]'),
	(10, 'Dinjerus', '[]'),
	(11, 'nutcurry', '[{"21": {"qty": "1", "name": "K8 RGB Backlit Blue Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-blue_1800x1800.jpg?v=1622187417", "price": "74"}}]'),
	(12, 'john', '[]'),
	(13, 'qwer', '[]'),
	(14, 'Norman', '[]');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table kibod.order_history
CREATE TABLE IF NOT EXISTS `order_history` (
  `order_id` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(50) DEFAULT NULL,
  `products` json DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `FK__user` (`username`),
  CONSTRAINT `FK__user` FOREIGN KEY (`username`) REFERENCES `user` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kibod.order_history: ~8 rows (approximately)
/*!40000 ALTER TABLE `order_history` DISABLE KEYS */;
INSERT IGNORE INTO `order_history` (`order_id`, `username`, `products`, `date_created`) VALUES
	('1641827913931', 'sos', '[{"34": {"qty": "1", "name": "K12 Non Backlit Brown Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-wireless-mechanical-keyboard-Non-backlit-version-for-Mac-Windows-Keychron-mechanical-switch-brown_1800x1800.jpg?v=1618315916", "price": "59"}}]', '2022-01-11 00:39:38'),
	('1641828044789', 'sos', '[{"28": {"qty": "1", "name": "K6 RGB Backlit Red Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-red-with-type-C-RGB-white-backlight_7f5684b8-e1be-4a8c-a0b7-3d0d8c22535b_1800x1800.jpg?v=1621238767", "price": "69"}}]', '2022-01-11 00:39:39'),
	('164182895284', 'john', '[{"30": {"qty": "1", "name": "K6 RGB Backlit Blue Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-blue-with-type-C-RGB-white-backlight_3d876bd9-1dbb-468f-b0de-6d6a2c98e2ba_540x.jpg?v=1621238767", "price": "69"}}]', '2022-01-11 00:39:40'),
	('1641829046668', 'qwer', '[{"34": {"qty": "1", "name": "K12 Non Backlit Brown Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-wireless-mechanical-keyboard-Non-backlit-version-for-Mac-Windows-Keychron-mechanical-switch-brown_1800x1800.jpg?v=1618315916", "price": "59"}}]', '2022-01-11 00:39:40'),
	('1641829347864', 'sos', '[{"34": {"qty": "1", "name": "K12 Non Backlit Brown Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-wireless-mechanical-keyboard-Non-backlit-version-for-Mac-Windows-Keychron-mechanical-switch-brown_1800x1800.jpg?v=1618315916", "price": "59"}}]', '2022-01-11 00:39:41'),
	('1641829402898', 'budu', '[{"27": {"qty": "1", "name": "K6 RGB Backlit Blue Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-blue-with-type-C-RGB-white-backlight_3d876bd9-1dbb-468f-b0de-6d6a2c98e2ba_540x.jpg?v=1621238767", "price": "69"}}, {"29": {"qty": "1", "name": "K6 RGB Backlit Brown Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-brown-with-type-C-RGB-white-backlight_1dd97347-734b-42a8-830c-9fc4cb879f9b_1800x1800.jpg?v=1621238767", "price": "69"}}, {"9": {"qty": "1", "name": "K10 RGB Backlit Blue Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-blue-switches-mac-windows-layout_1800x1800.jpg?v=1631097816", "price": "84"}}, {"10": {"qty": "1", "name": "K10 RGB Backlit Red Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-red-switches-mac-windows-layout_1800x1800.jpg?v=1631097814", "price": "84"}}, {"22": {"qty": "1", "name": "K8 RGB Backlit Red Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-red_1800x1800.jpg?v=1622187281", "price": "74"}}, {"26": {"qty": "1", "name": "K8 RGB Backlit Brown Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-brown_1800x1800.jpg?v=1622187479", "price": "74"}}]', '2022-01-11 00:39:41'),
	('1641831513150', 'Norman', '[{"33": {"qty": "1", "name": "K12 Non Backlit Blue Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-wireless-mechanical-keyboard-Non-backlit-version-for-Mac-Windows-Keychron-mechanical-switch-blue_1800x1800.jpg?v=1618315905", "price": "59"}}, {"35": {"qty": "1", "name": "K12 Non Backlit Red Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-wireless-mechanical-keyboard-Non-backlit-version-for-Mac-Windows-Keychron-mechanical-switch-red_1800x1800.jpg?v=1618315894", "price": "59"}}]', '2022-01-11 00:39:42'),
	('1641832154491', 'sos', '[{"34": {"qty": "1", "name": "K12 Non Backlit Brown Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-wireless-mechanical-keyboard-Non-backlit-version-for-Mac-Windows-Keychron-mechanical-switch-brown_1800x1800.jpg?v=1618315916", "price": "59"}}, {"9": {"qty": "3", "name": "K10 RGB Backlit Blue Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-blue-switches-mac-windows-layout_1800x1800.jpg?v=1631097816", "price": "84"}}, {"14": {"qty": "1", "name": "K10 RGB Backlit Brown Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-brown-switches-mac-windows-layout_1800x1800.jpg?v=1631097814", "price": "84"}}, {"12": {"qty": "2", "name": "K10 RGB Backlit Blue Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-blue-switches-mac-windows-layout_1800x1800.jpg?v=1631097816", "price": "84"}}]', '2022-01-11 00:39:42'),
	('1641833867584', 'budu', '[{"28": {"qty": "1", "name": "K6 RGB Backlit Red Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-red-with-type-C-RGB-white-backlight_7f5684b8-e1be-4a8c-a0b7-3d0d8c22535b_1800x1800.jpg?v=1621238767", "price": "69"}}, {"22": {"qty": "1", "name": "K8 RGB Backlit Red Switch", "image": "https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-red_1800x1800.jpg?v=1622187281", "price": "74"}}]', '2022-01-11 00:57:47');
/*!40000 ALTER TABLE `order_history` ENABLE KEYS */;

-- Dumping structure for table kibod.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table kibod.product: ~32 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT IGNORE INTO `product` (`id`, `type`, `name`, `image`, `price`, `date_created`, `date_update`) VALUES
	(9, 'full', 'K10 RGB Backlit Blue Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-blue-switches-mac-windows-layout_1800x1800.jpg?v=1631097816', 84, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(10, 'full', 'K10 RGB Backlit Red Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-red-switches-mac-windows-layout_1800x1800.jpg?v=1631097814', 84, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(11, 'full', 'K10 RGB Backlit Brown Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-brown-switches-mac-windows-layout_1800x1800.jpg?v=1631097814', 84, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(12, 'full', 'K10 RGB Backlit Blue Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-blue-switches-mac-windows-layout_1800x1800.jpg?v=1631097816', 84, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(13, 'full', 'K10 RGB Backlit Red Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-red-switches-mac-windows-layout_1800x1800.jpg?v=1631097814', 84, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(14, 'full', 'K10 RGB Backlit Brown Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/keychron-k10--full-size-wired-wireless-mechanical-keyboard-white-rgb-backlight-gateron-brown-switches-mac-windows-layout_1800x1800.jpg?v=1631097814', 84, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(15, '75', 'K2 RGB Backlit Blue Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K2-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-blue-with-type-C-RGB-white-backlight_7247ac65-e246-451e-b367-cd6c5b6411be_1800x1800.jpg?v=1621223999', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(16, '75', 'K2 RGB Backlit Red Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K2-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-red-with-type-C-RGB-white-backlight_9cb9d3e6-a5ac-4ac5-becb-079c7103ed2f_1800x1800.jpg?v=1621223999', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(17, '75', 'K2 RGB Backlit Brown Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K2-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-brown-with-type-C-RGB-white-backlight_53059406-af50-40d8-8566-c3b5f1e85a62_1800x1800.jpg?v=1621223999', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(18, '75', 'K2 RGB Backlit Blue Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K2-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-blue-with-type-C-RGB-white-backlight_7247ac65-e246-451e-b367-cd6c5b6411be_1800x1800.jpg?v=1621223999', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(19, '75', 'K2 RGB Backlit Red Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K2-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-red-with-type-C-RGB-white-backlight_9cb9d3e6-a5ac-4ac5-becb-079c7103ed2f_1800x1800.jpg?v=1621223999', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(20, '75', 'K2 RGB Backlit Brown Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K2-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-brown-with-type-C-RGB-white-backlight_53059406-af50-40d8-8566-c3b5f1e85a62_1800x1800.jpg?v=1621223999', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(21, 'tkl', 'K8 RGB Backlit Blue Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-blue_1800x1800.jpg?v=1622187417', 74, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(22, 'tkl', 'K8 RGB Backlit Red Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-red_1800x1800.jpg?v=1622187281', 74, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(23, 'tkl', 'K8 RGB Backlit Brown Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-brown_1800x1800.jpg?v=1622187479', 74, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(24, 'tkl', 'K8 RGB Backlit Blue Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-blue_1800x1800.jpg?v=1622187417', 74, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(25, 'tkl', 'K8 RGB Backlit Red Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-red_1800x1800.jpg?v=1622187281', 74, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(26, 'tkl', 'K8 RGB Backlit Brown Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K8-tenkeyless-wireless-mechanical-keyboard-for-Mac-Windows-iOS-RGB-white-backlight-with-Gateron-switch-brown_1800x1800.jpg?v=1622187479', 74, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(27, '65', 'K6 RGB Backlit Blue Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-blue-with-type-C-RGB-white-backlight_3d876bd9-1dbb-468f-b0de-6d6a2c98e2ba_540x.jpg?v=1621238767', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(28, '65', 'K6 RGB Backlit Red Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-red-with-type-C-RGB-white-backlight_7f5684b8-e1be-4a8c-a0b7-3d0d8c22535b_1800x1800.jpg?v=1621238767', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(29, '65', 'K6 RGB Backlit Brown Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-brown-with-type-C-RGB-white-backlight_1dd97347-734b-42a8-830c-9fc4cb879f9b_1800x1800.jpg?v=1621238767', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(30, '65', 'K6 RGB Backlit Blue Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-blue-with-type-C-RGB-white-backlight_3d876bd9-1dbb-468f-b0de-6d6a2c98e2ba_540x.jpg?v=1621238767', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(31, '65', 'K6 RGB Backlit Red Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-red-with-type-C-RGB-white-backlight_7f5684b8-e1be-4a8c-a0b7-3d0d8c22535b_1800x1800.jpg?v=1621238767', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(32, '65', 'K6 RGB Backlit Brown Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K6-hot-swappable-compact-65-percent-wireless-mechanical-keyboard-for-Mac-Windows-iOS-Gateron-switch-brown-with-type-C-RGB-white-backlight_1dd97347-734b-42a8-830c-9fc4cb879f9b_1800x1800.jpg?v=1621238767', 69, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(33, '60', 'K12 Non Backlit Blue Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-wireless-mechanical-keyboard-Non-backlit-version-for-Mac-Windows-Keychron-mechanical-switch-blue_1800x1800.jpg?v=1618315905', 59, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(34, '60', 'K12 Non Backlit Brown Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-wireless-mechanical-keyboard-Non-backlit-version-for-Mac-Windows-Keychron-mechanical-switch-brown_1800x1800.jpg?v=1618315916', 59, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(35, '60', 'K12 Non Backlit Red Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-wireless-mechanical-keyboard-Non-backlit-version-for-Mac-Windows-Keychron-mechanical-switch-red_1800x1800.jpg?v=1618315894', 59, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(36, '60', 'K12 RGB Backlit Blue Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-hot-swappable-wireless-mechanical-keyboard-Mac-Windows-White-RGB-backlight-Gateron-mechanical-switch-blue_1800x1800.jpg?v=1618315419', 89, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(37, '60', 'K12 RGB Backlit Brown Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-hot-swappable-wireless-mechanical-keyboard-Mac-Windows-White-RGB-backlight-Gateron-mechanical-switch-brown_1800x1800.jpg?v=1618315419', 89, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(38, '60', 'K12 RGB Backlit Red Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-hot-swappable-wireless-mechanical-keyboard-Mac-Windows-White-RGB-backlight-Gateron-mechanical-switch-red_1800x1800.jpg?v=1618315419', 89, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(39, '60', 'K12 RGB Backlit Banana Optical Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-hot-swappable-wireless-mechanical-keyboard-Mac-Windows-White-RGB-backlight-Keychron-Lava-optical-switch-banana_1800x1800.jpg?v=1618315419', 79, '2022-01-04 01:28:24', '2022-01-04 01:28:24'),
	(40, '60', 'K12 RGB Backlit Mint Optical Switch', 'https://cdn.shopify.com/s/files/1/0059/0630/1017/products/Keychron-K12-60percent-compact-hot-swappable-wireless-mechanical-keyboard-Mac-Windows-White-RGB-backlight-Keychron-Lava-optical-switch-mint_1800x1800.jpg?v=1618315419', 79, '2022-01-04 01:28:24', '2022-01-04 01:28:24');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table kibod.user
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table kibod.user: ~12 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT IGNORE INTO `user` (`username`, `password`, `email`, `fname`, `lname`, `address`, `phone`) VALUES
	('', '', '', '', '', '', ''),
	('admin', '123', NULL, NULL, NULL, NULL, NULL),
	('air', '123', NULL, NULL, NULL, NULL, NULL),
	('budu', '123', 'budu@gmail.com', 'John', 'Doe', ' asdasdasdasdasdasd asd', '+10139356443'),
	('Dinjerus', 'monokai', 'ahmedizzuddin99@gmail.com', 'Ken', 'BOii', 'Testadress', '0187746692'),
	('john', '123123123', 'johndoe@gmail.com', 'John', 'Doe', 'null', '+60139356443'),
	('Norman', 'Norman123', 'norman@gmail.com', 'Norman', 'Hakim', 'Johor', '0123456789'),
	('nutcurry', '123', 'nut@gmail.com', 'Din', 'Sumpit', 'Jangan sampai din sumpit', '01666666666'),
	('qwe', '123', 'qwe@gmail.com', 'qwe', 'qwe', 'qwe', '123'),
	('qwer', '123123123', 'qwer@gmail.com', 'John', 'Doe', 'null', '+60139356443'),
	('salah', '123', 'salah@gmail.com', 'salah', 'din', 'belakang rumah ihsan', '0123456789'),
	('sos', '123', 'sos@gmail.com', 'Sos', 'Cili', '4733 lorem ipsum dolor set amer', '013XXXXXXX');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
