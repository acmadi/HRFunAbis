/*

SQLyog Ultimate v8.55 
MySQL - 5.5.16-log : Database - havefun

*********************************************************************

*/



/*!40101 SET NAMES utf8 */;



/*!40101 SET SQL_MODE=''*/;



/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`havefun` /*!40100 DEFAULT CHARACTER SET latin1 */;



USE `yiihavefun`;



/*Table structure for table `have_fun` */



DROP TABLE IF EXISTS `have_fun`;



CREATE TABLE `have_fun` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto increment id',
  `title` varchar(255) NOT NULL COMMENT 'image title',
  `textOnImage` text COMMENT 'simple text written on image',
  `photoDescription` text COMMENT 'photo description to show as from where the photo is taken and copyright etc',
  `imagePath` text NOT NULL COMMENT 'photo stored database path',
  `createDate` datetime NOT NULL COMMENT 'photo uploaded date and time',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;



/*Data for the table `have_fun` */



insert  into `have_fun`(`id`,`title`,`textOnImage`,`photoDescription`,`imagePath`,`createDate`) values (2,'Group punishment','','','1355249781-401918_2902910191687_41893809_n.jpg','2012-12-11 06:16:21'),(3,'Perspective','','','1355250138-148258_10200105229983398_2021612485_n.jpg','2012-12-11 06:22:18'),(4,'Cross Join','','','1355306664-cross join.jpg','2012-12-12 10:04:24'),(5,'babies','','','1355306700-395076_4964833928532_1885681215_n.jpg','2012-12-12 10:05:00'),(6,'Sad story','','','1355306743-283258_4964775927082_1691280961_n.jpg','2012-12-12 10:05:43'),(7,'The manual how to catch a cat','','','1355312454-5924932_700b.jpg','2012-12-12 11:40:54');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;

/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

