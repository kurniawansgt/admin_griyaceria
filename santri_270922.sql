/*
SQLyog Ultimate
MySQL - 10.4.11-MariaDB : Database - admin_gc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `santri` */

CREATE TABLE `santri` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tahunajaran` varchar(20) DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `nisn` varchar(20) DEFAULT NULL,
  `nikkk` varchar(20) DEFAULT NULL,
  `noaktelahir` varchar(20) DEFAULT NULL,
  `namasantri` varchar(50) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `tmptlahir` varchar(20) DEFAULT NULL,
  `namaayah` varchar(50) DEFAULT NULL,
  `namaibu` varchar(50) DEFAULT NULL,
  `almttinggal` text DEFAULT NULL,
  `nohandphone` varchar(50) DEFAULT NULL,
  `statussantri` int(1) DEFAULT 1 COMMENT '1=Aktif,0=TidakAktif',
  `kelassantri` varchar(10) DEFAULT NULL,
  `fotodiri` varchar(200) DEFAULT NULL,
  `kartukeluarga` varchar(200) DEFAULT NULL,
  `ijazah_sd` varchar(200) DEFAULT NULL,
  `ijazah_smp` varchar(200) DEFAULT NULL,
  `ijazah_sma` varchar(200) DEFAULT NULL,
  `insertedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `insertedBy` varchar(20) DEFAULT NULL,
  `updatedDate` datetime DEFAULT NULL,
  `updatedBy` varchar(20) DEFAULT NULL,
  `lastIP` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `santri` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
