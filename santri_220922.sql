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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `santri` */

insert  into `santri`(`id`,`tahunajaran`,`nis`,`nisn`,`nikkk`,`noaktelahir`,`namasantri`,`tgllahir`,`tmptlahir`,`namaayah`,`namaibu`,`almttinggal`,`nohandphone`,`statussantri`,`kelassantri`,`fotodiri`,`kartukeluarga`,`ijazah_sd`,`ijazah_smp`,`ijazah_sma`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`,`lastIP`) values (1,'2021/2022','GC212203001','0092806190','151601031','770/UMUM/2009','YUSUF ABDULLAH AZZAM','2009-01-17','BEKASI','JUWOTO','MULYATUN','Kavling Buwek, Blok H11 No. 2\r\nRT/RW: 007/037, Wanasari, Cibitung\r\nKabupaten Bekasi - 17520','',1,'KLS-002',NULL,NULL,NULL,NULL,NULL,'2022-09-21 11:31:12','Admin',NULL,NULL,'127.0.0.1');
insert  into `santri`(`id`,`tahunajaran`,`nis`,`nisn`,`nikkk`,`noaktelahir`,`namasantri`,`tgllahir`,`tmptlahir`,`namaayah`,`namaibu`,`almttinggal`,`nohandphone`,`statussantri`,`kelassantri`,`fotodiri`,`kartukeluarga`,`ijazah_sd`,`ijazah_smp`,`ijazah_sma`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`,`lastIP`) values (2,'2020/2021','GC202102002','0028300540','3216062209070007','3897/IST/2008','MUHAMMAD FATHI ZANZABIL','2007-09-22','BEKASI','EDISON','EVI SUGIARTI','Vila Bekasi Indah I, Blok B16 No. 12\r\nRT/RW: 012/012, Mangun Jaya, Tambun Selatan\r\nKabupaten Bekasi - 17520','',1,'KLS-003',NULL,NULL,NULL,NULL,NULL,'2022-09-21 11:32:32','Admin',NULL,NULL,'127.0.0.1');
insert  into `santri`(`id`,`tahunajaran`,`nis`,`nisn`,`nikkk`,`noaktelahir`,`namasantri`,`tgllahir`,`tmptlahir`,`namaayah`,`namaibu`,`almttinggal`,`nohandphone`,`statussantri`,`kelassantri`,`fotodiri`,`kartukeluarga`,`ijazah_sd`,`ijazah_smp`,`ijazah_sma`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`,`lastIP`) values (3,'2020/2021','GC202102001','0085937300','3216222510080001','6510/ISTIMEWA/2009','HAFIZH MUHAMMAD IRSYAD','2008-10-25','BEKASI','DIDIT WIDIYANTO','SASMIYATI','Puri Persada Indah, Blok F17\r\nRT/RW: 006/012, Sindangmulya, Cibarusah\r\nKabupaten Bekasi - 17343','',1,'KLS-003',NULL,NULL,NULL,NULL,NULL,'2022-09-20 08:16:31','Admin',NULL,NULL,'127.0.0.1');
insert  into `santri`(`id`,`tahunajaran`,`nis`,`nisn`,`nikkk`,`noaktelahir`,`namasantri`,`tgllahir`,`tmptlahir`,`namaayah`,`namaibu`,`almttinggal`,`nohandphone`,`statussantri`,`kelassantri`,`fotodiri`,`kartukeluarga`,`ijazah_sd`,`ijazah_smp`,`ijazah_sma`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`,`lastIP`) values (4,'2022/2023','GC222304001','3102150096','3275112101100006','3275-LT-02022012-006','FATHURROCHMAN IZZUDDIN','2010-01-21','BEKASI','UJANG SUWARDI','SUNEKI','Bekasi Timur Regensi \r\nCluster Citrine, Blok C8 No. 27, RT/RW: 001/020\r\nCimuning, Mustika Jaya, Kota Bekasi 17155','',1,'KLS-001',NULL,NULL,NULL,NULL,NULL,'2022-09-21 10:05:58','Admin',NULL,NULL,'127.0.0.1');
insert  into `santri`(`id`,`tahunajaran`,`nis`,`nisn`,`nikkk`,`noaktelahir`,`namasantri`,`tgllahir`,`tmptlahir`,`namaayah`,`namaibu`,`almttinggal`,`nohandphone`,`statussantri`,`kelassantri`,`fotodiri`,`kartukeluarga`,`ijazah_sd`,`ijazah_smp`,`ijazah_sma`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`,`lastIP`) values (5,'2021/2022','GC212203002','0091510910','151601030','30225/ISTIMEWA/2010','MUHAMMAD FIKRI ABDILLAH','2009-02-06','BEKASI','KASTIYAR MUHAMMAD ISTAD','MUROISUL AMINAH','Kavling H. Safei, Kampung Buwek\r\nRT/RW: 008/002, Sumber Jaya, Tambun Selatan\r\nKabupaten Bekasi - 17519\r\n','',1,'KLS-002',NULL,NULL,NULL,NULL,NULL,'2022-09-21 10:05:09','Admin',NULL,NULL,'127.0.0.1');
insert  into `santri`(`id`,`tahunajaran`,`nis`,`nisn`,`nikkk`,`noaktelahir`,`namasantri`,`tgllahir`,`tmptlahir`,`namaayah`,`namaibu`,`almttinggal`,`nohandphone`,`statussantri`,`kelassantri`,`fotodiri`,`kartukeluarga`,`ijazah_sd`,`ijazah_smp`,`ijazah_sma`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`,`lastIP`) values (6,'2021/2022','GC212203003','0096971124','3275021411090011','5016/I/JB/2010','NOVEL GHULAM MUSTHOFA','2009-11-14','BEKASI','HERIZON SUL','SITI MARWIYAH','Cinere Agung Residence Blok F12\r\nRT/RW: 007/010, Meruyung, Limo\r\nKota Depok - 16515','',1,'KLS-002',NULL,NULL,NULL,NULL,NULL,'2022-09-21 10:38:57','Admin',NULL,NULL,'127.0.0.1');
insert  into `santri`(`id`,`tahunajaran`,`nis`,`nisn`,`nikkk`,`noaktelahir`,`namasantri`,`tgllahir`,`tmptlahir`,`namaayah`,`namaibu`,`almttinggal`,`nohandphone`,`statussantri`,`kelassantri`,`fotodiri`,`kartukeluarga`,`ijazah_sd`,`ijazah_smp`,`ijazah_sma`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`,`lastIP`) values (7,'2021/2022','GC212203004','0087367456','-','6220040607','ZOFFY MELZA ALFATH VAHLEFFY','2008-11-11','BEKASI','WAHYU BUDITANOTO','YULIAN SAFITRI','KP SAWAH BOGO\r\nRT/RW:001/013, Setia Darma, Tambun Selatan\r\nKabupaten Bekasi - 17513','',1,'KLS-002',NULL,NULL,NULL,NULL,NULL,'2022-09-21 10:38:32','Admin',NULL,NULL,'127.0.0.1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
