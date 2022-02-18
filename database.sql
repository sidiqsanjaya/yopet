/*
SQLyog Enterprise
MySQL - 5.7.24 : Database - rpl2_v
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `comment` */

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` varchar(11) DEFAULT NULL,
  `id_post_adopt` varchar(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `content_comment` text,
  `date_comment` datetime DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_user` (`id_user`),
  KEY `id_forum` (`id_forum`),
  KEY `id_post_adopt` (`id_post_adopt`),
  CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_ibfk_4` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_ibfk_5` FOREIGN KEY (`id_post_adopt`) REFERENCES `post_adopt` (`id_post_adopt`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `comment` */

/*Table structure for table `forum` */

CREATE TABLE `forum` (
  `id_forum` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content_post` text NOT NULL,
  `date_post` datetime NOT NULL,
  PRIMARY KEY (`id_forum`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `forum` */

/*Table structure for table `multiple_photo_post` */

CREATE TABLE `multiple_photo_post` (
  `id_multiple_photo_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_post_adopt` varchar(11) DEFAULT NULL,
  `photo_img_post` text,
  PRIMARY KEY (`id_multiple_photo_post`),
  KEY `id_post_adopt` (`id_post_adopt`),
  CONSTRAINT `multiple_photo_post_ibfk_1` FOREIGN KEY (`id_post_adopt`) REFERENCES `post_adopt` (`id_post_adopt`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `multiple_photo_post` */

insert  into `multiple_photo_post`(`id_multiple_photo_post`,`id_post_adopt`,`photo_img_post`) values 
(40,'68f7afa','view/img/68f7afa174277560_297501488426347_4718764925351016275_n.jpg'),
(47,'b8dd9a6','view/img/b8dd9a6img_raw_34915788raw.jpg');

/*Table structure for table `post_adopt` */

CREATE TABLE `post_adopt` (
  `id_post_adopt` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title_post_adopt` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date_post` datetime NOT NULL,
  `animal_age` int(11) NOT NULL,
  `animal_size` int(11) NOT NULL,
  `animal_gender` enum('male','female') NOT NULL,
  `status_adopt` enum('done','undone') NOT NULL DEFAULT 'undone',
  `category_animal` enum('Anjing','Mamalia','Sugar Glider','Insect','Poultry','Turtle','Cat','Other') DEFAULT NULL,
  PRIMARY KEY (`id_post_adopt`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `post_adopt_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `post_adopt` */

insert  into `post_adopt`(`id_post_adopt`,`id_user`,`title_post_adopt`,`description`,`date_post`,`animal_age`,`animal_size`,`animal_gender`,`status_adopt`,`category_animal`) values 
('68f7afa',2,'rakun','loredipsim','2022-02-16 19:39:12',50,30,'female','undone','Insect'),
('b8dd9a6',2,'vilager','jual hewa berupa villager di minecraft','2022-02-18 16:24:35',2,3,'male','undone','Sugar Glider');

/*Table structure for table `user` */

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `number_phone` decimal(15,0) DEFAULT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user',
  `city` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_user`,`email`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`email`,`password`,`fullname`,`create_at`,`gender`,`number_phone`,`level`,`city`) values 
(1,'sidiqbakti','sidiqbakti@gmail.com','asasa','sidiq bakti','2022-02-15 00:00:00','M',82279282908,'user',NULL),
(2,'sidiqsanjaya','sidiqsanjaya@gmail.com','c93721fa02c3bd6e504b8890e98ea94c','sidiq sanjaya','2022-02-15 18:29:29',NULL,82279282908,'user','bengkulu'),
(3,'sidiqsanjayabakti','sidiqsanjayabakti@gmail.com','c93721fa02c3bd6e504b8890e98ea94c','siddiq sanjaya bakti','2022-02-15 22:28:08',NULL,82279282908,'user',NULL),
(4,'juliaditsyahputra','juliadit@gmail.com','c93721fa02c3bd6e504b8890e98ea94c','juliadit syahputra','2022-02-17 19:57:01',NULL,81324569422,'user',''),
(5,'resaend','resa@gmail.com','c93721fa02c3bd6e504b8890e98ea94c','resa endrawan','2022-02-17 19:59:04',NULL,85155245688,'user','cikampek');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
