/*
SQLyog Ultimate
MySQL - 5.6.21 : Database - admin_gc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `jadwal_mengajar` */
DROP TABLE jadwal_mengajar;
CREATE TABLE `jadwal_mengajar` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `kodepengajar` VARCHAR(30) DEFAULT NULL,
  `kodepelajaran` VARCHAR(20) DEFAULT NULL,
  `haripelajaran` VARCHAR(10) DEFAULT NULL,
  `tahunpelajaran` INT(4) DEFAULT NULL,
  `statusaktif` INT(1) DEFAULT '1' COMMENT '1=Aktif, 0=TidakAktif',
  `insertedDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `insertedBy` VARCHAR(30) DEFAULT NULL,
  `updatedDate` DATETIME DEFAULT NULL,
  `updatedBy` VARCHAR(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MYISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `jadwal_mengajar` */

insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (1,'GC-2020/2021-017','MPL-010','Jum\'at',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (2,'GC-2020/2021-018','MPL-012','Jum\'at',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (3,'GC-2020/2021-012','MPL-012','Kamis',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (4,'GC-2020/2021-013','MPL-005','Kamis',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (5,'GC-2020/2021-014','MPL-004','Kamis',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (6,'GC-2020/2021-016','MPL-012','Kamis',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (7,'GC-2020/2021-003','MPL-001','Rabu',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (8,'GC-2020/2021-008','MPL-015','Rabu',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (9,'GC-2020/2021-017','MPL-006','Rabu',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (10,'GC-2021/2022-004','MPL-001','Rabu',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (11,'GC-2021/2022-004','MPL-003','Rabu',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (12,'GC-2020/2021-005','MPL-001','Sabtu',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (13,'GC-2020/2021-013','MPL-005','Sabtu',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (14,'GC-2020/2021-016','MPL-012','Sabtu',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (15,'GC-2020/2021-017','MPL-010','Sabtu',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (16,'GC-2020/2021-019','MPL-012','Sabtu',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (17,'GC-2021/2022-004','MPL-011','Sabtu',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (18,'GC-2020/2021-010','MPL-013','Selasa',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (19,'GC-2020/2021-010','MPL-013','Selasa',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (20,'GC-2020/2021-012','MPL-012','Selasa',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (21,'GC-2020/2021-017','MPL-006','Selasa',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (22,'GC-2021/2022-004','MPL-003','Selasa',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (23,'GC-2020/2021-008','MPL-015','Senin',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (24,'GC-2020/2021-018','MPL-012','Senin',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);
insert  into `jadwal_mengajar`(`id`,`kodepengajar`,`kodepelajaran`,`haripelajaran`,`tahunpelajaran`,`statusaktif`,`insertedDate`,`insertedBy`,`updatedDate`,`updatedBy`) values (25,'GC-2021/2022-001','MPL-004','Senin',2022,1,'2022-09-19 15:34:39','Admin',NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
