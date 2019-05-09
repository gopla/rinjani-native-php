-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.35-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table outdoor_shop.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id_products` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  KEY `FK_cart_products` (`id_products`),
  CONSTRAINT `FK_cart_products` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.cart: ~0 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categories` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_categories`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id_categories`, `name`) VALUES
	(1, 'Backpack'),
	(3, 'Tent'),
	(4, 'Shoes'),
	(5, 'Jacket');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id_products` int(11) NOT NULL AUTO_INCREMENT,
  `id_categories` int(11) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `description` text,
  `img` text,
  PRIMARY KEY (`id_products`),
  KEY `FK_products_categories` (`id_categories`),
  CONSTRAINT `FK_products_categories` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.products: ~8 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id_products`, `id_categories`, `name`, `price`, `stock`, `description`, `img`) VALUES
	(2, 1, 'Consina Centurion 50', 650000, 30, 'Tas larang', 'centurion50-BL2X-800x800.jpg'),
	(4, 1, 'Osprey Aether Pro 70L - Grey M', 3000000, 20, 'Tas larang njir.', 'aether_pro_70_grey_01.jpg'),
	(5, 1, 'Bodypack Prodiger Suspense Laptop Backpack - Green', 350000, 10, 'Tas apik rodok murah', '2872bitn_1.jpg'),
	(6, 4, 'Caterpillar Men Induction Waterproof Composite Toe Work Boot ', 650000, 35, 'Sepatu', 'CATM-P90923-030519-S18-032.jpg'),
	(7, 3, 'Consina Tent Kingdom 8', 3000000, 5, 'Tenda gede', 'tenda-kingdom-800x800.jpg'),
	(8, 5, 'Consina Jacket Maverick', 185000, 25, 'Jaket apik', 'maverick-DGY3-800x800.jpg'),
	(9, 1, 'Consina Trivia Lightblue', 175000, 50, 'Tas biru muda', 'trivia-BL6-800x800.jpg'),
	(10, 3, 'Eiger Baluran 2P Tent - Orange', 17500000, 5, 'Tenda larang tapi apik, tapi larang', '910004588002_4.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `grandtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_trans`),
  KEY `FK_transactions_users` (`id_user`),
  CONSTRAINT `FK_transactions_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.transactions: ~0 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.transactions_detail
CREATE TABLE IF NOT EXISTS `transactions_detail` (
  `id_trans` int(11) DEFAULT NULL,
  `id_products` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  KEY `FK_transactions_detail_transactions` (`id_trans`),
  KEY `FK_transactions_detail_products` (`id_products`),
  CONSTRAINT `FK_transactions_detail_products` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_transactions_detail_transactions` FOREIGN KEY (`id_trans`) REFERENCES `transactions` (`id_trans`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.transactions_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `transactions_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `transactions_detail` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(70) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `fullname`, `email`, `username`, `password`, `role`) VALUES
	(1, 'Aprilia Putri A', 'april@here.com', 'april', '9e3895cedfa93fc7d6f63cb00ad91d1b', 'admin'),
	(2, 'M. Yuki Miftakhurrizqi', 'myukim@here.com', 'yuki', '202cb962ac59075b964b07152d234b70', 'user'),
	(3, 'Tri Ardiansyah', 'triard@here.com', 'triard', '202cb962ac59075b964b07152d234b70', 'user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
