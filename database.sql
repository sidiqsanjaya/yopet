/*
SQLyog Enterprise
MySQL - 5.7.24 : Database - rpl2_v
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `comment` */

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_forum` int(11) DEFAULT NULL,
  `id_post_adopt` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `content_comment` text,
  `date_comment` text,
  PRIMARY KEY (`id_comment`),
  KEY `id_forum` (`id_forum`),
  KEY `id_post_adopt` (`id_post_adopt`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_post_adopt`) REFERENCES `post_adopt` (`id_post_adopt`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `forum` */

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content_post` text NOT NULL,
  `date_post` date NOT NULL,
  `category` enum('kesehatan','tatacara') DEFAULT NULL,
  PRIMARY KEY (`id_forum`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `multiple_photo_post` */

CREATE TABLE `multiple_photo_post` (
  `id_multiple_photo_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_post_adopt` int(11) DEFAULT NULL,
  `photo_img_post` text,
  PRIMARY KEY (`id_multiple_photo_post`),
  KEY `id_post_adopt` (`id_post_adopt`),
  CONSTRAINT `multiple_photo_post_ibfk_1` FOREIGN KEY (`id_post_adopt`) REFERENCES `post_adopt` (`id_post_adopt`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `post_adopt` */

CREATE TABLE `post_adopt` (
  `id_post_adopt` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title_post_adopt` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date_post` date NOT NULL,
  `animal_age` int(11) DEFAULT NULL,
  `animal_size` int(11) DEFAULT NULL,
  `animal_gender` enum('male','female') DEFAULT NULL,
  `status_adopt` enum('done','undone') DEFAULT NULL,
  PRIMARY KEY (`id_post_adopt`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `post_adopt_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `level` enum('admiin','user') DEFAULT 'user',
  PRIMARY KEY (`id_user`,`email`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
