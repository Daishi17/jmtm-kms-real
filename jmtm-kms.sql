

DROP TABLE IF EXISTS `detail_bua`;

CREATE TABLE `detail_bua` (
  `id_detail_bua` int(11) NOT NULL AUTO_INCREMENT,
  `id_bua` int(11) DEFAULT NULL,
  `nama_uraian_lv4` varchar(255) DEFAULT NULL,
  `id_adendum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail_bua`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_bua` */

/*Table structure for table `detail_capex` */

DROP TABLE IF EXISTS `detail_capex`;

CREATE TABLE `detail_capex` (
  `id_detail_capex` int(11) NOT NULL AUTO_INCREMENT,
  `id_capex` int(11) DEFAULT NULL,
  `nama_uraian_lv4` varchar(255) DEFAULT NULL,
  `id_adendum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail_capex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_capex` */

/*Table structure for table `detail_opex` */

DROP TABLE IF EXISTS `detail_opex`;

CREATE TABLE `detail_opex` (
  `id_detail_opex` int(11) NOT NULL AUTO_INCREMENT,
  `id_opex` int(11) DEFAULT NULL,
  `nama_uraian_lv4` varchar(255) DEFAULT NULL,
  `id_adendum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail_opex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_opex` */

/*Table structure for table `detail_role` */

DROP TABLE IF EXISTS `detail_role`;



/*Table structure for table `detail_sdm` */

DROP TABLE IF EXISTS `detail_sdm`;

CREATE TABLE `detail_sdm` (
  `id_detail_sdm` int(11) NOT NULL AUTO_INCREMENT,
  `id_sdm` int(11) DEFAULT NULL,
  `nama_uraian_lv4` varchar(255) DEFAULT NULL,
  `id_adendum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail_sdm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_sdm` */

/*Table structure for table `mst_area` */

DROP TABLE IF EXISTS `mst_area`;

CREATE TABLE `mst_area` (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `nama_area` varchar(255) NOT NULL,
  PRIMARY KEY (`id_area`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_area` */

insert  into `mst_area`(`id_area`,`nama_area`) values 
(1,'Jagorawi'),
(2,'JTC'),
(3,'JORR'),
(4,'Purbaleunyi'),
(5,'Japek'),
(6,'Palikanci'),
(7,'Semarang'),
(8,'Surabaya'),
(9,'Balmera'),
(10,'Bali'),
(11,'Balikpapan'),
(12,'Manado');

/*Table structure for table `mst_kontrak` */

DROP TABLE IF EXISTS `mst_kontrak`;

CREATE TABLE `mst_kontrak` (
  `id_kontrak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kontrak` varchar(255) DEFAULT NULL,
  `no_kontrak` varchar(255) DEFAULT NULL,
  `tahun_anggaran` date DEFAULT NULL,
  `nilai_kontrak_awal` double DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_detail_role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_kontrak`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_kontrak` */

insert  into `mst_kontrak`(`id_kontrak`,`nama_kontrak`,`no_kontrak`,`tahun_anggaran`,`nilai_kontrak_awal`,`status`,`id_detail_role`) values 
(1,'Kontrak Manajemen Pemenuhan SPM Ruas Jakarta-Cikampek','JMTMVIIX/K/A','2022-11-11',20000000,1,1);

/*Table structure for table `mst_owner` */

DROP TABLE IF EXISTS `mst_owner`;

CREATE TABLE `mst_owner` (
  `id_owner` int(11) NOT NULL AUTO_INCREMENT,
  `nama_owner` varchar(255) DEFAULT NULL,
  `nama_owner2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_owner`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_owner` */

insert  into `mst_owner`(`id_owner`,`nama_owner`,`nama_owner2`) values 
(1,'JMT','JMT'),
(2,'JKC','JMT'),
(3,'MLJ','JMT'),
(4,'JTT','JTT'),
(5,'JJC','JTT'),
(6,'JNK','JTT'),
(7,'JSN','JTT'),
(8,'JSB','JTT'),
(9,'JPT','JTT'),
(10,'JSM','JTT'),
(11,'JGP','JTT'),
(12,'JNT','JNT'),
(13,'JMKT','JNT'),
(14,'JBT','JNT'),
(15,'JBS','JNT'),
(16,'JMB','JNT');

/*Table structure for table `mst_role` */

DROP TABLE IF EXISTS `mst_role`;

CREATE TABLE `mst_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_role` */

insert  into `mst_role`(`id_role`,`nama_role`) values 
(1,'Direksi'),
(2,'Operasi 1'),
(3,'Operasi 2'),
(4,'Operasi 3'),
(5,'Area'),
(6,'Owner'),
(7,'Finance'),
(8,'Corplan'),
(9,'Audit'),
(10,'Admin Super');

/*Table structure for table `mst_ruas_kontrak` */

DROP TABLE IF EXISTS `mst_ruas_kontrak`;

CREATE TABLE `mst_ruas_kontrak` (
  `id_ruas_kontrak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ruas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_ruas_kontrak`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_ruas_kontrak` */

insert  into `mst_ruas_kontrak`(`id_ruas_kontrak`,`nama_ruas`) values 
(1,'Jagorawi'),
(2,'JTC'),
(3,'JKC'),
(4,'JORR'),
(5,'MLJ'),
(6,'Purbaleunyi'),
(7,'Japek'),
(8,'JJC'),
(9,'Palikanci'),
(10,'Semarang'),
(11,'JNK'),
(12,'JSN'),
(13,'JSB'),
(14,'Surabaya'),
(15,'JPT'),
(16,'JSM'),
(17,'JGP'),
(18,'Balmera'),
(19,'JMKT'),
(20,'JBT'),
(21,'JBS'),
(22,'JMB');

/*Table structure for table `mst_user` */

DROP TABLE IF EXISTS `mst_user`;

CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` text,
  `id_detail_role` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_created` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_user` */

insert  into `mst_user`(`id_user`,`username`,`password`,`nama_user`,`nip`,`email`,`telepon`,`alamat`,`id_detail_role`,`status`,`user_created`,`created_at`) values 
(2,'operasi1','operasi1','operasi1','12312','operasi1@gmail.com','123123123','operasi1',1,1,NULL,NULL);

/*Table structure for table `mst_vendor` */

DROP TABLE IF EXISTS `mst_vendor`;

CREATE TABLE `mst_vendor` (
  `id_vendor` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_vendor` varchar(255) DEFAULT NULL,
  `nama_vendor` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat_vendor` varchar(255) DEFAULT NULL,
  `user_created` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_vendor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_vendor` */

/*Table structure for table `table_adendum` */

DROP TABLE IF EXISTS `table_adendum`;

CREATE TABLE `table_adendum` (
  `id_adendum` int(11) NOT NULL AUTO_INCREMENT,
  `no_adendum` int(11) DEFAULT NULL,
  `jumlah` double DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_kontrak` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_adendum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_adendum` */

/*Table structure for table `table_bua` */

DROP TABLE IF EXISTS `table_bua`;

CREATE TABLE `table_bua` (
  `id_bua` int(11) NOT NULL AUTO_INCREMENT,
  `id_kontrak` int(11) DEFAULT NULL,
  `nama_uraian_lv3` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_bua`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_bua` */

insert  into `table_bua`(`id_bua`,`id_kontrak`,`nama_uraian_lv3`,`date_created`) values 
(3,1,'Biaya Umum & Administrasi','2022-11-13 01:01:00');

/*Table structure for table `table_capex` */

DROP TABLE IF EXISTS `table_capex`;

CREATE TABLE `table_capex` (
  `id_capex` int(11) NOT NULL AUTO_INCREMENT,
  `id_kontrak` int(11) DEFAULT NULL,
  `nama_uraian_lv3` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_capex`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_capex` */

insert  into `table_capex`(`id_capex`,`id_kontrak`,`nama_uraian_lv3`,`date_created`) values 
(2,1,'Pemeliharaan Periodik','2022-11-13 00:29:00'),
(3,1,'Peningkatan Kapasitas','2022-11-13 00:32:00'),
(4,1,'Sarkapja Operasional','2022-11-13 00:32:00');

/*Table structure for table `table_opex` */

DROP TABLE IF EXISTS `table_opex`;

CREATE TABLE `table_opex` (
  `id_opex` int(11) NOT NULL AUTO_INCREMENT,
  `id_kontrak` int(11) DEFAULT NULL,
  `nama_uraian_lv3` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_opex`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_opex` */

insert  into `table_opex`(`id_opex`,`id_kontrak`,`nama_uraian_lv3`,`date_created`) values 
(1,1,'OPEX PEMELIHARAAN','2022-11-13 00:51:00'),
(2,1,'OPEX PEMELIHARAAN SARANA PELENGKAP JALAN TOL','2022-11-13 00:51:00'),
(3,1,'OPEX PERENCANAAN PROGRAM','2022-11-13 00:51:00');

/*Table structure for table `table_sdm` */

DROP TABLE IF EXISTS `table_sdm`;

CREATE TABLE `table_sdm` (
  `id_sdm` int(11) NOT NULL AUTO_INCREMENT,
  `id_kontrak` int(11) DEFAULT NULL,
  `nama_uraian_lv3` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_sdm`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `table_sdm` */

insert  into `table_sdm`(`id_sdm`,`id_kontrak`,`nama_uraian_lv3`,`date_created`) values 
(1,1,'Gaji Karyawan','2022-11-13 01:05:00');


CREATE TABLE `detail_role` (
  `id_detail_role` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_ruas_kontrak` int(11) NOT NULL,
  `id_owner` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_role`),
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_role` */

insert  into `detail_role`(`id_detail_role`,`id_role`,`id_area`,`id_ruas_kontrak`,`id_owner`) values 
(1,2,1,1,1),
(2,2,2,2,1),
(3,2,2,3,2),
(4,2,3,4,1),
(5,2,3,5,3),
(6,2,4,6,1),
(7,3,5,7,4),
(8,3,5,8,5),
(9,3,6,9,4),
(10,3,7,10,4),
(11,3,7,11,6),
(12,3,7,12,7),
(13,3,7,13,8),
(14,3,8,14,4),
(15,3,8,15,9),
(16,3,8,16,10),
(17,3,8,17,11),
(18,4,9,18,12),
(19,4,9,19,13),
(20,4,10,20,14),
(21,4,11,21,15),
(22,4,12,22,16),
(27,1,0,0,0),
(28,10,0,0,0),
(29,7,0,0,0),
(30,9,0,0,0),
(31,8,0,0,0),
(32,6,0,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
