-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for outdoor_shop
CREATE DATABASE IF NOT EXISTS `outdoor_shop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `outdoor_shop`;

-- Dumping structure for table outdoor_shop.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id_user` int(11) DEFAULT NULL,
  `id_products` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  KEY `FK_cart_products` (`id_products`),
  KEY `FK_cart_users` (`id_user`),
  CONSTRAINT `FK_cart_products` FOREIGN KEY (`id_products`) REFERENCES `products` (`id_products`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_cart_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `description` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  PRIMARY KEY (`id_products`),
  KEY `FK_products_categories` (`id_categories`),
  CONSTRAINT `FK_products_categories` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id_categories`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.products: ~34 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id_products`, `id_categories`, `name`, `price`, `stock`, `description`, `img`) VALUES
	(2, 1, 'Consina Centurion 50', 650000, 9, 'Tas larang', 'centurion50-BL2X-800x800.jpg'),
	(4, 1, 'Osprey Aether Pro 70L - Grey M', 3000000, 20, 'Tas larang njir.', 'aether_pro_70_grey_01.jpg'),
	(5, 1, 'Bodypack Prodiger Suspense Laptop Backpack - Green', 350000, 6, 'Tas apik rodok murah', '2872bitn_1.jpg'),
	(6, 4, 'Caterpillar Men Induction Waterproof Composite Toe Work Boot ', 650000, 30, 'Sepatu', 'CATM-P90923-030519-S18-032.jpg'),
	(7, 3, 'Consina Tent Kingdom 8', 3000000, 4, 'Tenda gede', 'tenda-kingdom-800x800.jpg'),
	(8, 5, 'Consina Jacket Maverick', 185000, 18, 'Jaket apik', 'maverick-DGY3-800x800.jpg'),
	(9, 1, 'Consina Trivia Lightblue', 175000, 36, 'Tas biru muda', 'trivia-BL6-800x800.jpg'),
	(10, 3, 'Eiger Baluran 2P Tent - Orange', 17500000, 4, 'Tenda larang tapi apik, tapi larang', '910004588002_4.jpg'),
	(11, 5, 'Eiger Triple Jacket - Navy', 600000, 24, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'j53410ln_1.jpg'),
	(12, 4, 'Eiger 1989 Dauerhaft Shoes - Black', 850000, 20, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras semper dolor a consequat ornare. Praesent posuere turpis et dolor imperdiet, eget fringilla sem ultricies. Fusce vitae facilisis tortor. Ut ullamcorper ex risus, eget vestibulum eros venenatis a. Mauris nisl dui, porta eu finibus et, ultricies vel eros. Nulla nec dolor in augue ultricies finibus sit amet ut lorem. Vestibulum tempus ante ex, scelerisque scelerisque augue bibendum sed. Pellentesque sapien magna, sollicitudin sed commodo sed, interdum vitae ex. Donec lobortis nisl purus, vel dignissim lectus placerat in. In hac habitasse platea dictumst. Morbi sed nisl tempor, viverra turpis sit amet, commodo ligula. Aenean sit amet efficitur est, quis commodo lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla molestie leo in augue tempor, vel fermentum sapien finibus. Curabitur tristique at lacus eget bibendum. Nam ullamcorper sem non enim condimentum pretium. ', '910003752h-1.jpg'),
	(13, 5, 'Jaket Pink', 1600000, 26, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', '9fix.jpg'),
	(14, 5, 'PATAGONIA HIKING JACKET WOMEN-Orchid', 1250000, 8, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', 'PATAGONIA JACKET HIKING WOMEN (ORCHID).jpg'),
	(15, 5, 'PATAGONIA HIKING JACKET WOMEN-Pink', 1600000, 10, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', 'PATAGONIA JACKET HIKING WOMEN (PINK).jpg'),
	(16, 5, 'PATAGONIA HIKING JACKET WOMEN-Tosca', 1700000, 9, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', 'PATAGONIA JACKET HIKING WOMEN (TOSCA).jpg'),
	(17, 1, 'BACK RHINOS-Red Blue', 1800000, 5, 'arrier yang sesuai untuk penggunaan di daerah dengan iklim tropis. Dengan bahan polyester yang cepat kering saat terkena air, carrier ini dilengkapi juga dengan raincover sebagai perlindungan dari hujan. Produk ini juga banyak digunakan para pemula karena selain berkualitas, harganya pun cukup ekonomis.\r\n\r\nPada carrier ini terdapat beberapa kantong, yakni kompartemen utama, kantong di bagian punggung dalam, dua kantong di bagian sisi, dan kantong pada hip belt. Meski tidak memiliki adjustable back system, tetapi back system-nya memiliki fungsi tropic air flow yang menyejukkan punggung saat Anda memakai carrier ini.', 'BACK RHINOS (RED-BLUE).jpg'),
	(18, 1, 'EXTRATERRESIAL BACK-Blue', 1870000, 5, 'memiliki reputasi baik sebagai carrier yang tahan lama dan memiliki kualitas back system yang baik. Back system carrier ini dibuat menggunakan teknologi Wind Tunnel yang mengurangi kontak antara punggung Anda dengan bagian belakang carrier sehingga tidak terasa panas saat digunakan.\r\n\r\nCarrier ini juga memiliki fungsi hydration compatible, yaitu kantong di bagian atas carrier yang bisa digunakan untuk menyimpan air minum dan memudahkan Anda saat ingin meminum air. Oleh karena itulah carrier ini kami rekomendasikan untuk Anda yang mudah haus saat sedang mendaki gunung.', 'EXTRATERRESSIAL BLUE.jpg'),
	(19, 1, 'JACK WOLFSKIN TREKKING BACK-Black', 2500000, 4, 'Dirancang untuk membawa beban berat bahkan hingga 20 kg, untuk perjalanan mendaki gunung yang panjang. Back system-nya menggunakan X-Transition yang tidak bisa disetel, berupa rangka batang aluminium berbentuk X yang sangat nyaman saat digunakan. Carrier ini memiliki dua kompartemen besar yang terpisah dan 9 kantong tambahan yang membuat Anda memiliki banyak pilihan saat sedang packing. Cocok untuk Anda bawa berkemah di hutan selama 3-7 hari karena selain sebagai carrier, bagian head carrier-nya bisa Anda jadikan daypack juga!', 'JACK WOLFSKIN TREKKING BACK (BLACK).jpg'),
	(20, 1, 'OSPREY AETHER PRO-Tosca', 1200000, 11, 'Selain sangat ringan dan nyaman saat digunakan, backpack ini juga memiliki 8 kantong fungsional, termasuk kantong pada hip belt yang dapat digunakan untuk menyimpan kamera atau energy bar. Carrier ini juga memiliki kantong khusus sleeping bag dengan bukaan terpisah sehingga lebih praktis dan mudah digunakan. Sistem harness OPTIFIT miliknya akan membuat semakin pas dengan bentuk tubuh Anda dan membuatnya nyaman digunakan untuk waktu lama, cocok untuk pendaki gunung profesional!', 'OSPREY AETHER PRO (TOSCA).jpg'),
	(21, 1, 'WOMEN BACKPACK-Pink Purple', 800000, 20, 'Backpack ini merupakan solusi bagi Anda yang mengutamakan kenyamanan meskipun sedang mendaki dengan beban yang berat. Carrier ini dilengkapi sistem Anti-Gravity di bagian punggung, berbahan mesh dengan breathability baik, dan memiliki rangka berbahan metal yang kokoh. Dengan fitur-fitur tersebut, beban berat yang Anda bawa akan terasa berkurang hingga setengahnya sehingga Anda tetap nyaman. Apalagi, tali bahu dan hip belt-nya terbuat dari bahan yang sangat empuk. Carrier ini juga dilengkapi banyak kantong tambahan di bagian depan untuk Anda menyimpan camilan atau handphone.', 'WOMEN BACKPACK (PINK-PURPLE).jpg'),
	(22, 1, 'WOLFSKIN BACK FIT PERFECT-Tosca', 3000000, 7, 'Produk selanjutnya pilihan kami ini memiliki kompartemen utama yang besar, memungkinkan Anda untuk memuat banyak barang di dalamnya. Ditujukan untuk para pengguna wanita, carrier ini memiliki VariFit-Slide back system yang dapat disesuaikan dengan panjang torso Anda. Kemudian, adanya sistem Aircontact membuat carrier bisa berdekatan dengan tubuh pengguna sehingga lebih nyaman digunakan. Di bagian depan carrier pun terdapat ritsleting untuk memudahkan Anda mengambil benda di dasar carrier dari kompartemen utama. Dengan bahan yang waterproof, carrier Anda pun akan semakin terlindungi dari air.', 'WOLFSKIN BACK PERFECT (TOSCA).jpg'),
	(23, 4, 'HIKING SHOES-Sandy Brown', 2200000, 8, 'Hiking Shoes ini sudah terkenal di dunia hiking sebagai produsen sepatu yang tahan lama dan nyaman di kaki. Salah satunya  yang menggunakan teknologi MDT rubber outsole di bagian bawahnya sehingga mampu menyeimbangkan cengkraman di medan yang sulit sekalipun dan menjaga kestabilan kaki dengan baik. Material mesh juga membuat sepatu ini semakin nyaman Anda gunakan. Bahan suede-nya tidak hanya memberi sirkulasi udara yang baik, tetapi juga membuat sepatu ini pas di kaki. Dipadukan dengan ghillie lacing system, produk ini adalah pilihan tepat bila Anda mencari sepatu trekking yang sangat lekat di kaki.', 'HIKING SHOES (SANDY BROWN).jpg'),
	(24, 4, 'TRAIL RUNNING SHOES WOMEN-Pink Floral White', 2300000, 5, 'Merupakan sepatu light trekking low cut dengan desain yang sporty, bahannya sintetis, dan baik dalam menjaga sirkulasi udara. Produsen juga memberikan teknologi Traxion pada sol yang dapat memberikan daya cengkram mumpuni di berbagai macam trek outdoor. Bobotnya yang ringan sangat membantu untuk Anda bermanuver ketika melakukan perjalanan. Di bagian jari-jari depannya pun terdapat pelindung untuk benturan atau menahan pijakan ketika berjinjit. Bila Anda mencari sepatu trekking yang tidak hanya terlihat sporty, tetapi juga memungkinkan Anda untuk berpijak dengan firm, produk ini pilihannya.', 'TRAIL RUNNING SHOES WOMEN (PINK-FLORAL WHITE).jpg'),
	(25, 4, 'MID WEIGHT BOOT-Dark Brown', 5000000, 2, 'Mid Weight Boot ini mengakomodasi Anda untuk dapat berjalan di medan apa pun. Termasuk kategori trekking mid cut, sepatu ini tahan terhadap air dan memiliki sirkulasi udara yang baik dengan adanya teknologi Texapore O2+ sehingga Anda tidak perlu takut kaki gerah. Ini adalah sepatu trekking yang cukup ringan, tetapi siap bertarung di medan yang keras. Sepatu ini cocok Anda gunakan saat ingin trekking dalam jangka waktu lama karena selain bisa menempuh medan apa pun, busa di bagian insole-nya juga sangat nyaman di kaki.', 'MID WEIGHT BOOT (BROWN).jpg'),
	(26, 4, 'HIKING SHOES WOMEN-Pink Grey', 3400000, 10, 'Dibuat untuk Anda yang menggemari trekking khususnya olahraga rock climbing atau ingin kaki Anda tetap kuat dan bertenaga saat menjelajah. Bahan vibram pada outsole-nya pun akan membuat kaki Anda terlindungi dengan baik sehingga tidak mudah lelah. Tidak hanya itu, grip di outsole-nya memungkinkan sepatu ini mencengkram permukaan dengan baik. Desain sepatu ini pun stylish dan bisa digunakan berbagai kalangan, mulai dari remaja hingga orang tua sekalipun. Produk ini tergolong tahan lama dan cukup waterproof dengan adanya konstruksi plate shank, booties construction, plus waterproof membrane. ', 'HIKING SHOES WOMEN (PINK-GREY).jpg'),
	(27, 4, 'HIKING SHOES-Black Grey', 2800000, 8, 'Masuk dalam kategori mid cut trekking shoes, sepatu ini cocok digunakan untuk medan yang berat, tidak rata atau bebatuan, dan kurang cocok untuk jalanan beraspal. Dari segi harga, Consina Ascend sangat ekonomis. Solnya pun terbilang keras dan solid sehingga bisa Anda andalkan untuk perjalanan jarak jauh. Bagian luarnya yang keras akan tahan terhadap benturan dan melindungi kaki Anda. Untuk penampilan, sepatu ini juga terbilang keren dan juga menyediakan warna-warna bervariasi untuk sepatu ini. Salah satu alternatif sepatu trekking jarak jauh yang oke di kantong untuk Anda yang ingin berhemat!', 'HIKING SHOES (BLUE-GREY).jpg'),
	(28, 3, 'DOME FIT-Orange Red', 6000000, 10, 'Sebagai salah satu jenis tenda yang paling banyak digunakan oleh para petualang, tenda kubah atau dome adalah salah satu jenis tenda yang paling populer. Memiliki ciri khas pada bentuk melengkung pada tiang-tiang penyangganya, tenda jenis ini cocok sekali untuk lo bawa ke spot petualangan yang tidak memiliki cuaca ekstrim. Keunggulan dari tenda ini adalah mudah mendirikannya, bentuk depan yang bagus, jumlah penyangga yang lebih dari tiga, dan juga memiliki harga yang paling murah dari yang paling sering digunakan. Sayangnya, tenda ini tidak bertahan lama di cuaca angin kencang dan salju.', 'DOME FIT (ORANGE RED).jpg'),
	(29, 3, 'DOME PRO-White Brown', 4500000, 10, 'Sebagai salah satu jenis tenda yang paling banyak digunakan oleh para petualang, tenda kubah atau dome adalah salah satu jenis tenda yang paling populer. Memiliki ciri khas pada bentuk melengkung pada tiang-tiang penyangganya, tenda jenis ini cocok sekali untuk lo bawa ke spot petualangan yang tidak memiliki cuaca ekstrim.\r\n\r\nKeunggulan dari tenda ini adalah mudah mendirikannya, bentuk depan yang bagus, jumlah penyangga yang lebih dari tiga, dan juga memiliki harga yang paling murah dari yang paling sering digunakan. Sayangnya, tenda ini tidak bertahan lama di cuaca angin kencang dan salju.', 'DOME PRO (WHITE-BROWN).jpg'),
	(30, 3, 'PERFECT DOME PRO-Sandy Brown', 6000000, 5, 'Sebagai salah satu jenis tenda yang paling banyak digunakan oleh para petualang, tenda kubah atau dome yang lebih komples ini adalah salah satu jenis tenda yang paling populer. Memiliki ciri khas pada bentuk melengkung pada tiang-tiang penyangganya, tenda jenis ini cocok sekali untuk lo bawa ke spot petualangan yang tidak memiliki cuaca ekstrim. Keunggulan dari tenda ini adalah mudah mendirikannya, bentuk depan yang bagus, jumlah penyangga yang lebih dari tiga, dan juga memiliki harga yang paling murah dari yang paling sering digunakan. Sayangnya, tenda ini tidak bertahan lama di cuaca angin kencang dan salju.', 'PERFECT DOME PRO (SANDY BROWN).jpg'),
	(31, 3, 'SLIDING DOME PRO-Black Range', 7000000, 7, 'Sebagai salah satu jenis tenda yang paling banyak digunakan oleh para petualang, tenda kubah atau dome adalah salah satu jenis tenda yang paling populer. Memiliki ciri khas pada bentuk melengkung pada tiang-tiang penyangganya, tenda jenis ini cocok sekali untuk lo bawa ke spot petualangan yang tidak memiliki cuaca ekstrim. Keunggulan dari tenda ini adalah mudah mendirikannya, bentuk depan yang bagus dengan posisi sisi depan berbentuk sliding secara horizontal, jumlah penyangga yang lebih dari tiga, dan juga memiliki harga yang paling murah dari yang paling sering digunakan. Sayangnya, tenda ini tidak bertahan lama di cuaca angin kencang dan salju.', 'SLIDING DOME PRO (BLACK-RANGE).jpg'),
	(32, 3, 'COMPLEX DOME-Blue Grey', 10000000, 2, 'Sebagai salah satu jenis tenda yang paling banyak digunakan oleh para petualang, tenda kubah atau dome adalah salah satu jenis tenda yang paling populer yang memiliki luas tenda sangat besar sehingga dapat memuat lebih banyak orang. Memiliki ciri khas pada bentuk melengkung pada tiang-tiang penyangganya, tenda jenis ini cocok sekali untuk lo bawa ke spot petualangan yang tidak memiliki cuaca ekstrim. Keunggulan dari tenda ini adalah mudah mendirikannya, bentuk depan yang bagus, jumlah penyangga yang lebih dari tiga, dan juga memiliki harga yang paling murah dari yang paling sering digunakan. ', 'COMPLEX DOME (BLUE-GREY).jpg'),
	(96, 5, 'PATAGONIA HIKING JACKET-Black Yellow', 1500000, 15, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', 'PATAGONIA HIKING JACKET (BLACK-YELLOW).jpg'),
	(97, 5, 'PATAGONIA HIKING JACKET-Black Grey', 1000000, 12, 'Memiliki ciri khas karet di pergelangan tangannya, memiliki hoodie dan kerah sehingga cocok bagi yang sering menghabiskan waktu di daerah yang berhawa dingin atau para pengendara motor. Jacket ini didesain secara khusus sehingga mampu menjaga suhu tubuh tetap normal dan merasa hangat meskipun kondisi cuaca sedang tidak bersahabat atau kondisi cuaca yang ekstrim seperti angin besar hingga suhu yang dingin.', 'PATAGONIA HIKING JACKET (BLACK-GREY).jpg'),
	(98, 5, 'DOWN HIKING JACKET-Olive Green', 900000, 10, 'Jaket yang berisi bulu halus dari angsa atau bebek. Bulu-bulu halus yang biasanya berasal dari bagian dada dan sayap ini, disebut down, memiliki sifat unik. Kelembutannya, dalam jumlah besar, membentuk kantong-kantong udara yang bisa menyimpan panas udara dan menahannya di dalam kantong-kantong tersebut. Ini akan membuat pemakai down jacket tetap hangat. Jaket down ini memiliki fill power  yang baik digunakan untuk kegiatan outdoor.', 'DOWN HIKING JACKET (OLIVE GREEN).jpg'),
	(99, 5, 'DOWN HIKING JACKET-Black', 800000, 15, 'Jaket yang berisi bulu halus dari angsa atau bebek. Bulu-bulu halus yang biasanya berasal dari bagian dada dan sayap ini, disebut down, memiliki sifat unik. Kelembutannya, dalam jumlah besar, membentuk kantong-kantong udara yang bisa menyimpan panas udara dan menahannya di dalam kantong-kantong tersebut. Ini akan membuat pemakai down jacket tetap hangat. ', 'DOWN HIKING JACKET (BLACK).jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.shipment
CREATE TABLE IF NOT EXISTS `shipment` (
  `id_shipment` int(11) NOT NULL AUTO_INCREMENT,
  `id_trans` int(11) DEFAULT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_shipment`),
  KEY `FK_shipment_transactions` (`id_trans`),
  CONSTRAINT `FK_shipment_transactions` FOREIGN KEY (`id_trans`) REFERENCES `transactions` (`id_trans`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.shipment: ~6 rows (approximately)
/*!40000 ALTER TABLE `shipment` DISABLE KEYS */;
INSERT INTO `shipment` (`id_shipment`, `id_trans`, `fullname`, `address`, `phone`) VALUES
	(1, 21, 'April', 'Cedek', '089123456765'),
	(2, 23, 'Tri Ardiansyah', 'Adoh', '089998776554'),
	(3, 24, 'Fernanda Dwi Iswidianggi', 'Jl. Mentaraman Gg. 4, Talok, Turen', '082257229842'),
	(4, 25, 'Tri Ardiansyah', 'Bojonegoro', '082299887766'),
	(5, 26, 'Erry Anggi Nanda Gautama', 'Kediri', '089123456765'),
	(6, 27, 'Fernanda Dwi Iswidianggi', 'Jl. Mentaraman Gg. 4, Talok, Turen, Malang', '082257229842'),
	(7, 28, 'Naufal Yudhistira', 'Surabaya', '082287229812');
/*!40000 ALTER TABLE `shipment` ENABLE KEYS */;

-- Dumping structure for table outdoor_shop.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `id_user` int(11) DEFAULT NULL,
  `grandtotal` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  PRIMARY KEY (`id_trans`),
  KEY `FK_transactions_users` (`id_user`),
  CONSTRAINT `FK_transactions_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.transactions: ~13 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id_trans`, `date`, `id_user`, `grandtotal`, `status`) VALUES
	(12, '2019-05-09 22:13:57', 2, 360000, 1),
	(14, '2019-05-09 22:16:00', 3, 17500000, 1),
	(15, '2019-05-09 22:43:43', 3, 1950000, 1),
	(16, '2019-05-09 22:45:33', 3, 2300000, 1),
	(17, '2019-05-09 22:47:27', 2, 185000, 1),
	(18, '2019-05-10 08:09:00', 3, 700000, 1),
	(19, '2019-05-10 08:15:31', 1, 825000, 1),
	(21, '2019-05-13 18:19:31', 2, 12350000, 0),
	(23, '2019-05-13 18:32:02', 3, 5200000, 0),
	(24, '2019-05-13 22:01:30', 4, 3375000, 0),
	(25, '2019-05-13 22:05:05', 1, 370000, 0),
	(26, '2019-05-14 14:34:07', 1, 350000, 0),
	(27, '2019-05-15 21:33:41', 4, 1785000, 0),
	(28, '2022-03-17 11:43:49', 4, 175000, 1);
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

-- Dumping data for table outdoor_shop.transactions_detail: ~22 rows (approximately)
/*!40000 ALTER TABLE `transactions_detail` DISABLE KEYS */;
INSERT INTO `transactions_detail` (`id_trans`, `id_products`, `price`, `qty`, `subtotal`) VALUES
	(12, 9, 175000, 1, 175000),
	(12, 8, 185000, 1, 185000),
	(14, 10, 17500000, 1, 17500000),
	(15, 2, 650000, 2, 1300000),
	(15, 6, 650000, 1, 650000),
	(16, 5, 350000, 1, 350000),
	(16, 6, 650000, 3, 1950000),
	(17, 8, 185000, 1, 185000),
	(18, 5, 350000, 2, 700000),
	(19, 9, 175000, 1, 175000),
	(19, 6, 650000, 1, 650000),
	(21, 2, 650000, 6, 3900000),
	(21, 12, 850000, 2, 1700000),
	(23, 7, 3000000, 1, 3000000),
	(23, 11, 600000, 1, 600000),
	(23, 13, 1600000, 1, 1600000),
	(24, 9, 175000, 1, 175000),
	(24, 13, 1600000, 2, 3200000),
	(25, 8, 185000, 2, 370000),
	(26, 5, 350000, 1, 350000),
	(27, 13, 1600000, 1, 1600000),
	(27, 8, 185000, 1, 185000),
	(28, 9, 175000, 1, 175000);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table outdoor_shop.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `fullname`, `email`, `username`, `password`, `role`) VALUES
	(1, 'Aprilia Putri A', 'april@here.com', 'april', '9e3895cedfa93fc7d6f63cb00ad91d1b', 'admin'),
	(2, 'M. Yuki Miftakhurrizqi', 'myukim@here.com', 'yuki', '202cb962ac59075b964b07152d234b70', 'user'),
	(3, 'Tri Ardiansyah', 'triard@here.com', 'triard', '202cb962ac59075b964b07152d234b70', 'user'),
	(4, 'Fernanda Dwi Iswidianggi', 'fern@here.com', 'fer', '202cb962ac59075b964b07152d234b70', 'user'),
	(11, 'Tokiwa Sougo', 'zio@here.com', 'wagamaou', '202cb962ac59075b964b07152d234b70', 'user'),
	(12, 'Kazuraba Kouta', 'dewabuah@here.com', 'gaimdancer', '9e3895cedfa93fc7d6f63cb00ad91d1b', 'user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
