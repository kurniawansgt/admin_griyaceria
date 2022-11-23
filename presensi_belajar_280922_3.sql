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
/*Table structure for table `presensi_belajar` */

CREATE TABLE `presensi_belajar` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `presensi_date` datetime DEFAULT NULL,
  `nis` varchar(20) DEFAULT NULL,
  `kode_kelas` varchar(10) DEFAULT NULL,
  `kode_mapel` varchar(10) DEFAULT NULL,
  `presensi_sts` char(2) DEFAULT NULL COMMENT 'H=Hadir,I=Ijin,S=Sakit,A=Absen',
  `inserted_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `inserted_by` varchar(30) DEFAULT NULL,
  `ip_last` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

/*Data for the table `presensi_belajar` */

insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (1,'2022-09-28 10:50:01','GC212203001','KLS-002','MPL-001','H','2022-09-28 10:50:01','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (2,'2022-09-28 10:50:01','GC212203002','KLS-002','MPL-001','H','2022-09-28 10:50:01','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (3,'2022-09-28 10:50:01','GC212203003','KLS-002','MPL-001','I','2022-09-28 10:50:01','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (4,'2022-09-28 10:50:01','GC212203004','KLS-002','MPL-001','H','2022-09-28 10:50:01','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (5,'2022-09-28 10:50:01','GC212203005','KLS-002','MPL-001','S','2022-09-28 10:50:01','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (6,'2022-09-28 10:50:01','GC212203006','KLS-002','MPL-001','H','2022-09-28 10:50:01','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (7,'2022-09-28 10:50:01','GC212203007','KLS-002','MPL-001','H','2022-09-28 10:50:01','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (8,'2022-09-28 10:50:01','GC212203008','KLS-002','MPL-001','S','2022-09-28 10:50:01','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (9,'2022-09-28 10:50:01','GC212203009','KLS-002','MPL-001','H','2022-09-28 10:50:01','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (17,'2022-09-28 10:51:07','GC202102004','KLS-003','MPL-003','A','2022-09-28 10:51:07','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (16,'2022-09-28 10:51:07','GC202102003','KLS-003','MPL-003','H','2022-09-28 10:51:07','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (15,'2022-09-28 10:51:07','GC202102002','KLS-003','MPL-003','S','2022-09-28 10:51:07','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (14,'2022-09-28 10:51:07','GC202102001','KLS-003','MPL-003','H','2022-09-28 10:51:07','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (25,'2022-09-28 10:53:11','GC202102004','KLS-003','MPL-001','H','2022-09-28 10:53:11','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (24,'2022-09-28 10:53:11','GC202102003','KLS-003','MPL-001','H','2022-09-28 10:53:11','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (23,'2022-09-28 10:53:11','GC202102002','KLS-003','MPL-001','S','2022-09-28 10:53:11','Dedy Djarman','127.0.0.1');
insert  into `presensi_belajar`(`id`,`presensi_date`,`nis`,`kode_kelas`,`kode_mapel`,`presensi_sts`,`inserted_date`,`inserted_by`,`ip_last`) values (22,'2022-09-28 10:53:11','GC202102001','KLS-003','MPL-001','H','2022-09-28 10:53:11','Dedy Djarman','127.0.0.1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
