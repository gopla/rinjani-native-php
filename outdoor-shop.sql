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

-- Dumping structure for table outdoor_shop.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT NULL,
  `grandtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_trans`),
  KEY `FK_transactions_users` (`id_user`),
  CONSTRAINT `FK_transactions_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.transactions: ~12 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id_trans`, `date`, `id_user`, `grandtotal`) VALUES
	(12, '2019-05-09 22:13:57', 2, 360000),
	(14, '2019-05-09 22:16:00', 3, 17500000),
	(15, '2019-05-09 22:43:43', 3, 1950000),
	(16, '2019-05-09 22:45:33', 3, 2300000),
	(17, '2019-05-09 22:47:27', 2, 185000),
	(18, '2019-05-10 08:09:00', 3, 700000),
	(19, '2019-05-10 08:15:31', 1, 825000),
	(21, '2019-05-13 18:19:31', 2, 12350000),
	(23, '2019-05-13 18:32:02', 3, 5200000),
	(24, '2019-05-13 22:01:30', 4, 3375000),
	(25, '2019-05-13 22:05:05', 1, 370000),
	(26, '2019-05-14 14:34:07', 1, 350000);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
