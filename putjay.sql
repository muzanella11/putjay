/*
MySQL Data Transfer
Source Host: localhost
Source Database: putjay
Target Host: localhost
Target Database: putjay
Date: 1/12/2016 1:30:00 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin
-- ----------------------------
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status_admin` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_items` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_order` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_order` datetime NOT NULL,
  PRIMARY KEY (`id_cart`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for items
-- ----------------------------
CREATE TABLE `items` (
  `id_items` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `status_promo` enum('0','1') DEFAULT '0',
  `date_create` datetime DEFAULT NULL,
  `date_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id_items`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) NOT NULL,
  `date_create` datetime NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for user
-- ----------------------------
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `saldo` varchar(255) DEFAULT NULL,
  `status_online` enum('0','1') NOT NULL DEFAULT '0',
  `date_join` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'galaubae', 'a@b.c', 'sayang123', 'Andre si Bocah Galau', '0');
INSERT INTO `admin` VALUES ('2', 'admin', 'admin@admin.admin', 'admin123', 'Admin', '1');
INSERT INTO `cart` VALUES ('1', '2', '2', 'hihi', 'hhhhhhhhahasjdhjd', '123456', '2', '246912', '2016-01-10 19:31:15');
INSERT INTO `items` VALUES ('1', 'hahaha', '1', '123456', null, 'haahahhahahahahaha', '1', '2015-05-11 13:58:19', null);
INSERT INTO `items` VALUES ('2', 'hihi', '2', '123456', null, 'hhhhhhhhahasjdhjd', '0', '2015-05-11 16:34:42', null);
INSERT INTO `items` VALUES ('3', 'Stupid phone', '7', '99999999999', null, 'Ponsel termahal di dunia', '1', '2015-05-11 17:39:06', null);
INSERT INTO `items` VALUES ('4', 'ganteng', '3', '12345678', null, 'hahahahahaha', '0', '2015-05-11 21:08:14', null);
INSERT INTO `items` VALUES ('5', 'Barang bagus', '5', '8888888', null, 'barang baguuusss', '1', '2015-05-12 09:48:44', null);
INSERT INTO `items` VALUES ('6', 'Mac book Pro', '5', '1000000', null, 'hahaha', '1', '2016-01-10 19:06:58', null);
INSERT INTO `items` VALUES ('7', 'Kasur empuk', '4', '1000000', null, 'huhuhuhuhahaha', '0', '2016-01-11 00:36:19', null);
INSERT INTO `user` VALUES ('1', 'Nurfirliana Muzanella', 'ganteng@ganteng.com', 'gantengbinggow', 'sayang123', null, '0', '2015-05-12 19:37:52');
INSERT INTO `user` VALUES ('2', 'Long dick', 'longdick@mydick.com', 'longdick', 'sayang123', null, '1', '2015-05-12 19:43:43');
