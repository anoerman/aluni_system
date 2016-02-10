/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.47-0ubuntu0.14.04.1 : Database - alumnus_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`alumnus_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `alumnus_db`;

/*Table structure for table `aluni_m_city` */

DROP TABLE IF EXISTS `aluni_m_city`;

CREATE TABLE `aluni_m_city` (
  `province_id` int(4) NOT NULL,
  `city_id` int(4) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(50) NOT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=499 DEFAULT CHARSET=latin1;

/*Data for the table `aluni_m_city` */

insert  into `aluni_m_city`(`province_id`,`city_id`,`city_name`,`active`,`created_date`) values (1,1,'Kabupaten Aceh Barat','yes','2016-01-20 14:00:38'),(1,2,'Kabupaten Aceh Barat Daya','yes','2016-01-20 14:00:38'),(1,3,'Kabupaten Aceh Besar','yes','2016-01-20 14:00:38'),(1,4,'Kabupaten Aceh Jaya','yes','2016-01-20 14:00:38'),(1,5,'Kabupaten Aceh Selatan','yes','2016-01-20 14:00:38'),(1,6,'Kabupaten Aceh Singkil','yes','2016-01-20 14:00:38'),(1,7,'Kabupaten Aceh Tamiang','yes','2016-01-20 14:00:38'),(1,8,'Kabupaten Aceh Tengah','yes','2016-01-20 14:00:38'),(1,9,'Kabupaten Aceh Tenggara','yes','2016-01-20 14:00:38'),(1,10,'Kabupaten Aceh Timur','yes','2016-01-20 14:00:38'),(1,11,'Kabupaten Aceh Utara','yes','2016-01-20 14:00:38'),(1,12,'Kabupaten Bener Meriah','yes','2016-01-20 14:00:38'),(1,13,'Kabupaten Bireuen','yes','2016-01-20 14:00:38'),(1,14,'Kabupaten Gayo Lues','yes','2016-01-20 14:00:38'),(1,15,'Kabupaten Nagan Raya','yes','2016-01-20 14:00:38'),(1,16,'Kabupaten Pidie','yes','2016-01-20 14:00:38'),(1,17,'Kabupaten Pidie Jaya','yes','2016-01-20 14:00:38'),(1,18,'Kabupaten Simeulue','yes','2016-01-20 14:00:38'),(1,19,'Kota Banda Aceh','yes','2016-01-20 14:00:38'),(1,20,'Kota Langsa','yes','2016-01-20 14:00:38'),(1,21,'Kota Lhokseumawe','yes','2016-01-20 14:00:38'),(1,22,'Kota Sabang','yes','2016-01-20 14:00:38'),(1,23,'Kota Subulussalam','yes','2016-01-20 14:00:38'),(2,24,'Kabupaten Asahan','yes','2016-01-20 14:06:24'),(2,25,'Kabupaten Batubara','yes','2016-01-20 14:06:24'),(2,26,'Kabupaten Dairi','yes','2016-01-20 14:06:24'),(2,27,'Kabupaten Deli Serdang','yes','2016-01-20 14:06:24'),(2,28,'Kabupaten Humbang Hasundutan','yes','2016-01-20 14:06:24'),(2,29,'Kabupaten Karo','yes','2016-01-20 14:06:24'),(2,30,'Kabupaten Labuhanbatu','yes','2016-01-20 14:06:24'),(2,31,'Kabupaten Labuhanbatu Selatan','yes','2016-01-20 14:06:24'),(2,32,'Kabupaten Labuhanbatu Utara','yes','2016-01-20 14:06:24'),(2,33,'Kabupaten Langkat','yes','2016-01-20 14:06:24'),(2,34,'Kabupaten Mandailing Natal','yes','2016-01-20 14:06:24'),(2,35,'Kabupaten Nias','yes','2016-01-20 14:06:24'),(2,36,'Kabupaten Nias Barat','yes','2016-01-20 14:06:24'),(2,37,'Kabupaten Nias Selatan','yes','2016-01-20 14:06:24'),(2,38,'Kabupaten Nias Utara','yes','2016-01-20 14:06:24'),(2,39,'Kabupaten Padang Lawas','yes','2016-01-20 14:06:24'),(2,40,'Kabupaten Padang Lawas Utara','yes','2016-01-20 14:06:24'),(2,41,'Kabupaten Pakpak Bharat','yes','2016-01-20 14:06:24'),(2,42,'Kabupaten Samosir','yes','2016-01-20 14:06:24'),(2,43,'Kabupaten Serdang Bedagai','yes','2016-01-20 14:06:24'),(2,44,'Kabupaten Simalungun','yes','2016-01-20 14:06:24'),(2,45,'Kabupaten Tapanuli Selatan','yes','2016-01-20 14:06:24'),(2,46,'Kabupaten Tapanuli Tengah','yes','2016-01-20 14:06:24'),(2,47,'Kabupaten Tapanuli Utara','yes','2016-01-20 14:06:24'),(2,48,'Kabupaten Toba Samosir','yes','2016-01-20 14:06:24'),(2,49,'Kota Binjai','yes','2016-01-20 14:06:24'),(2,50,'Kota Gunungsitoli','yes','2016-01-20 14:06:24'),(2,51,'Kota Medan','yes','2016-01-20 14:06:24'),(2,52,'Kota Padangsidempuan','yes','2016-01-20 14:06:24'),(2,53,'Kota Pematangsiantar','yes','2016-01-20 14:06:24'),(2,54,'Kota Sibolga','yes','2016-01-20 14:06:24'),(2,55,'Kota Tanjungbalai','yes','2016-01-20 14:06:24'),(2,56,'Kota Tebing Tinggi','yes','2016-01-20 14:06:24'),(3,57,'Kabupaten Agam','yes','2016-01-20 14:08:24'),(3,58,'Kabupaten Dharmasraya','yes','2016-01-20 14:08:24'),(3,59,'Kabupaten Kepulauan Mentawai','yes','2016-01-20 14:08:24'),(3,60,'Kabupaten Lima Puluh Kota','yes','2016-01-20 14:08:24'),(3,61,'Kabupaten Padang Pariaman','yes','2016-01-20 14:08:24'),(3,62,'Kabupaten Pasaman','yes','2016-01-20 14:08:24'),(3,63,'Kabupaten Pasaman Barat','yes','2016-01-20 14:08:24'),(3,64,'Kabupaten Pesisir Selatan','yes','2016-01-20 14:08:24'),(3,65,'Kabupaten Sijunjung','yes','2016-01-20 14:08:24'),(3,66,'Kabupaten Solok','yes','2016-01-20 14:08:24'),(3,67,'Kabupaten Solok Selatan','yes','2016-01-20 14:08:24'),(3,68,'Kabupaten Tanah Datar','yes','2016-01-20 14:08:24'),(3,69,'Kota Bukittinggi','yes','2016-01-20 14:08:24'),(3,70,'Kota Padang','yes','2016-01-20 14:08:24'),(3,71,'Kota Padangpanjang','yes','2016-01-20 14:08:24'),(3,72,'Kota Pariaman','yes','2016-01-20 14:08:24'),(3,73,'Kota Payakumbuh','yes','2016-01-20 14:08:24'),(3,74,'Kota Sawahlunto','yes','2016-01-20 14:08:24'),(3,75,'Kota Solok','yes','2016-01-20 14:08:24'),(4,76,'Kabupaten Bengkalis','yes','2016-01-20 14:10:36'),(4,77,'Kabupaten Indragiri Hilir','yes','2016-01-20 14:10:36'),(4,78,'Kabupaten Indragiri Hulu','yes','2016-01-20 14:10:36'),(4,79,'Kabupaten Kampar','yes','2016-01-20 14:10:36'),(4,80,'Kabupaten Kuantan Singingi','yes','2016-01-20 14:10:36'),(4,81,'Kabupaten Pelalawan','yes','2016-01-20 14:10:36'),(4,82,'Kabupaten Rokan Hilir','yes','2016-01-20 14:10:36'),(4,83,'Kabupaten Rokan Hulu','yes','2016-01-20 14:10:36'),(4,84,'Kabupaten Siak','yes','2016-01-20 14:10:36'),(4,85,'Kabupaten Kepulauan Meranti','yes','2016-01-20 14:10:36'),(4,86,'Kota Dumai','yes','2016-01-20 14:10:36'),(4,87,'Kota Pekanbaru','yes','2016-01-20 14:10:36'),(5,88,'Kabupaten Bintan','yes','2016-01-20 14:11:35'),(5,89,'Kabupaten Karimun','yes','2016-01-20 14:11:35'),(5,90,'Kabupaten Kepulauan Anambas','yes','2016-01-20 14:11:35'),(5,91,'Kabupaten Lingga','yes','2016-01-20 14:11:35'),(5,92,'Kabupaten Natuna','yes','2016-01-20 14:11:35'),(5,93,'Kota Batam','yes','2016-01-20 14:11:35'),(5,94,'Kota Tanjung Pinang','yes','2016-01-20 14:11:35'),(6,95,'Kabupaten Batanghari','yes','2016-01-20 14:12:32'),(6,96,'Kabupaten Bungo','yes','2016-01-20 14:12:32'),(6,97,'Kabupaten Kerinci','yes','2016-01-20 14:12:32'),(6,98,'Kabupaten Merangin','yes','2016-01-20 14:12:32'),(6,99,'Kabupaten Muaro Jambi','yes','2016-01-20 14:12:32'),(6,100,'Kabupaten Sarolangun','yes','2016-01-20 14:12:32'),(6,101,'Kabupaten Tanjung Jabung Barat','yes','2016-01-20 14:12:32'),(6,102,'Kabupaten Tanjung Jabung Timur','yes','2016-01-20 14:12:32'),(6,103,'Kabupaten Tebo','yes','2016-01-20 14:12:32'),(6,104,'Kota Jambi','yes','2016-01-20 14:12:32'),(6,105,'Kota Sungai Penuh','yes','2016-01-20 14:12:32'),(7,106,'Kabupaten Bengkulu Selatan','yes','2016-01-20 14:13:37'),(7,107,'Kabupaten Bengkulu Tengah','yes','2016-01-20 14:13:37'),(7,108,'Kabupaten Bengkulu Utara','yes','2016-01-20 14:13:37'),(7,109,'Kabupaten Kaur','yes','2016-01-20 14:13:37'),(7,110,'Kabupaten Kepahiang','yes','2016-01-20 14:13:37'),(7,111,'Kabupaten Lebong','yes','2016-01-20 14:13:37'),(7,112,'Kabupaten Mukomuko','yes','2016-01-20 14:13:37'),(7,113,'Kabupaten Rejang Lebong','yes','2016-01-20 14:13:37'),(7,114,'Kabupaten Seluma','yes','2016-01-20 14:13:37'),(7,115,'Kota Bengkulu','yes','2016-01-20 14:13:37'),(8,116,'Kabupaten Banyuasin','yes','2016-01-20 14:14:50'),(8,117,'Kabupaten Empat Lawang','yes','2016-01-20 14:14:50'),(8,118,'Kabupaten Lahat','yes','2016-01-20 14:14:50'),(8,119,'Kabupaten Muara Enim','yes','2016-01-20 14:14:50'),(8,120,'Kabupaten Musi Banyuasin','yes','2016-01-20 14:14:50'),(8,121,'Kabupaten Musi Rawas','yes','2016-01-20 14:14:50'),(8,122,'Kabupaten Ogan Ilir','yes','2016-01-20 14:14:50'),(8,123,'Kabupaten Ogan Komering Ilir','yes','2016-01-20 14:14:50'),(8,124,'Kabupaten Ogan Komering Ulu','yes','2016-01-20 14:14:50'),(8,125,'Kabupaten Ogan Komering Ulu Selatan','yes','2016-01-20 14:14:50'),(8,126,'Kabupaten Ogan Komering Ulu Timur','yes','2016-01-20 14:14:50'),(8,127,'Kota Lubuklinggau','yes','2016-01-20 14:14:50'),(8,128,'Kota Pagar Alam','yes','2016-01-20 14:14:50'),(8,129,'Kota Palembang','yes','2016-01-20 14:14:50'),(8,130,'Kota Prabumulih','yes','2016-01-20 14:14:50'),(9,131,'Kabupaten Bangka','yes','2016-01-20 14:15:52'),(9,132,'Kabupaten Bangka Barat','yes','2016-01-20 14:15:52'),(9,133,'Kabupaten Bangka Selatan','yes','2016-01-20 14:15:52'),(9,134,'Kabupaten Bangka Tengah','yes','2016-01-20 14:15:52'),(9,135,'Kabupaten Belitung','yes','2016-01-20 14:15:52'),(9,136,'Kabupaten Belitung Timur','yes','2016-01-20 14:15:52'),(9,137,'Kota Pangkal Pinang','yes','2016-01-20 14:15:52'),(10,138,'Kabupaten Lampung Barat','yes','2016-01-20 14:17:02'),(10,139,'Kabupaten Lampung Selatan','yes','2016-01-20 14:17:02'),(10,140,'Kabupaten Lampung Tengah','yes','2016-01-20 14:17:02'),(10,141,'Kabupaten Lampung Timur','yes','2016-01-20 14:17:02'),(10,142,'Kabupaten Lampung Utara','yes','2016-01-20 14:17:02'),(10,143,'Kabupaten Mesuji','yes','2016-01-20 14:17:02'),(10,144,'Kabupaten Pesawaran','yes','2016-01-20 14:17:02'),(10,145,'Kabupaten Pringsewu','yes','2016-01-20 14:17:02'),(10,146,'Kabupaten Tanggamus','yes','2016-01-20 14:17:02'),(10,147,'Kabupaten Tulang Bawang','yes','2016-01-20 14:17:02'),(10,148,'Kabupaten Tulang Bawang Barat','yes','2016-01-20 14:17:02'),(10,149,'Kabupaten Way Kanan','yes','2016-01-20 14:17:02'),(10,150,'Kota Bandar Lampung','yes','2016-01-20 14:17:02'),(10,151,'Kota Metro','yes','2016-01-20 14:17:02'),(11,152,'Kabupaten Tangerang','yes','2016-01-20 14:19:56'),(11,153,'Kabupaten Serang','yes','2016-01-20 14:19:56'),(11,154,'Kabupaten Lebak','yes','2016-01-20 14:19:56'),(11,155,'Kabupaten Pandeglang','yes','2016-01-20 14:19:56'),(11,156,'Kota Tangerang','yes','2016-01-20 14:19:56'),(11,157,'Kota Serang','yes','2016-01-20 14:19:56'),(11,158,'Kota Cilegon','yes','2016-01-20 14:19:56'),(11,159,'Kota Tangerang Selatan','yes','2016-01-20 14:19:56'),(12,160,'Kabupaten Bandung','yes','2016-01-20 14:21:04'),(12,161,'Kabupaten Bandung Barat','yes','2016-01-20 14:21:04'),(12,162,'Kabupaten Bekasi','yes','2016-01-20 14:21:04'),(12,163,'Kabupaten Bogor','yes','2016-01-20 14:21:04'),(12,164,'Kabupaten Ciamis','yes','2016-01-20 14:21:04'),(12,165,'Kabupaten Cianjur','yes','2016-01-20 14:21:04'),(12,166,'Kabupaten Cirebon','yes','2016-01-20 14:21:04'),(12,167,'Kabupaten Garut','yes','2016-01-20 14:21:04'),(12,168,'Kabupaten Indramayu','yes','2016-01-20 14:21:04'),(12,169,'Kabupaten Karawang','yes','2016-01-20 14:21:04'),(12,170,'Kabupaten Kuningan','yes','2016-01-20 14:21:04'),(12,171,'Kabupaten Majalengka','yes','2016-01-20 14:21:04'),(12,172,'Kabupaten Purwakarta','yes','2016-01-20 14:21:04'),(12,173,'Kabupaten Subang','yes','2016-01-20 14:21:04'),(12,174,'Kabupaten Sukabumi','yes','2016-01-20 14:21:04'),(12,175,'Kabupaten Sumedang','yes','2016-01-20 14:21:04'),(12,176,'Kabupaten Tasikmalaya','yes','2016-01-20 14:21:04'),(12,177,'Kota Bandung','yes','2016-01-20 14:21:04'),(12,178,'Kota Banjar','yes','2016-01-20 14:21:04'),(12,179,'Kota Bekasi','yes','2016-01-20 14:21:04'),(12,180,'Kota Bogor','yes','2016-01-20 14:21:04'),(12,181,'Kota Cimahi','yes','2016-01-20 14:21:04'),(12,182,'Kota Cirebon','yes','2016-01-20 14:21:04'),(12,183,'Kota Depok','yes','2016-01-20 14:21:04'),(12,184,'Kota Sukabumi','yes','2016-01-20 14:21:04'),(12,185,'Kota Tasikmalaya','yes','2016-01-20 14:21:04'),(13,186,'Kabupaten Administrasi Kepulauan Seribu','yes','2016-01-20 14:22:02'),(13,187,'Kota Administrasi Jakarta Barat','yes','2016-01-20 14:22:02'),(13,188,'Kota Administrasi Jakarta Pusat','yes','2016-01-20 14:22:02'),(13,189,'Kota Administrasi Jakarta Selatan','yes','2016-01-20 14:22:02'),(13,190,'Kota Administrasi Jakarta Timur','yes','2016-01-20 14:22:02'),(13,191,'Kota Administrasi Jakarta Utara','yes','2016-01-20 14:22:02'),(14,192,'Kabupaten Banjarnegara','yes','2016-01-20 14:23:27'),(14,193,'Kabupaten Banyumas','yes','2016-01-20 14:23:27'),(14,194,'Kabupaten Batang','yes','2016-01-20 14:23:27'),(14,195,'Kabupaten Blora','yes','2016-01-20 14:23:27'),(14,196,'Kabupaten Boyolali','yes','2016-01-20 14:23:27'),(14,197,'Kabupaten Brebes','yes','2016-01-20 14:23:27'),(14,198,'Kabupaten Cilacap','yes','2016-01-20 14:23:27'),(14,199,'Kabupaten Demak','yes','2016-01-20 14:23:27'),(14,200,'Kabupaten Grobogan','yes','2016-01-20 14:23:27'),(14,201,'Kabupaten Jepara','yes','2016-01-20 14:23:27'),(14,202,'Kabupaten Karanganyar','yes','2016-01-20 14:23:27'),(14,203,'Kabupaten Kebumen','yes','2016-01-20 14:23:27'),(14,204,'Kabupaten Kendal','yes','2016-01-20 14:23:27'),(14,205,'Kabupaten Klaten','yes','2016-01-20 14:23:27'),(14,206,'Kabupaten Kudus','yes','2016-01-20 14:23:27'),(14,207,'Kabupaten Magelang','yes','2016-01-20 14:23:27'),(14,208,'Kabupaten Pati','yes','2016-01-20 14:23:27'),(14,209,'Kabupaten Pekalongan','yes','2016-01-20 14:23:27'),(14,210,'Kabupaten Pemalang','yes','2016-01-20 14:23:27'),(14,211,'Kabupaten Purbalingga','yes','2016-01-20 14:23:27'),(14,212,'Kabupaten Purworejo','yes','2016-01-20 14:23:27'),(14,213,'Kabupaten Rembang','yes','2016-01-20 14:23:27'),(14,214,'Kabupaten Semarang','yes','2016-01-20 14:23:27'),(14,215,'Kabupaten Sragen','yes','2016-01-20 14:23:27'),(14,216,'Kabupaten Sukoharjo','yes','2016-01-20 14:23:27'),(14,217,'Kabupaten Tegal','yes','2016-01-20 14:23:27'),(14,218,'Kabupaten Temanggung','yes','2016-01-20 14:23:27'),(14,219,'Kabupaten Wonogiri','yes','2016-01-20 14:23:27'),(14,220,'Kabupaten Wonosobo','yes','2016-01-20 14:23:27'),(14,221,'Kota Magelang','yes','2016-01-20 14:23:27'),(14,222,'Kota Pekalongan','yes','2016-01-20 14:23:27'),(14,223,'Kota Salatiga','yes','2016-01-20 14:23:27'),(14,224,'Kota Semarang','yes','2016-01-20 14:23:27'),(14,225,'Kota Surakarta','yes','2016-01-20 14:23:27'),(14,226,'Kota Tegal','yes','2016-01-20 14:23:27'),(15,227,'Kabupaten Bangkalan','yes','2016-01-20 14:25:05'),(15,228,'Kabupaten Banyuwangi','yes','2016-01-20 14:25:05'),(15,229,'Kabupaten Blitar','yes','2016-01-20 14:25:05'),(15,230,'Kabupaten Bojonegoro','yes','2016-01-20 14:25:05'),(15,231,'Kabupaten Bondowoso','yes','2016-01-20 14:25:05'),(15,232,'Kabupaten Gresik','yes','2016-01-20 14:25:05'),(15,233,'Kabupaten Jember','yes','2016-01-20 14:25:05'),(15,234,'Kabupaten Jombang','yes','2016-01-20 14:25:05'),(15,235,'Kabupaten Kediri','yes','2016-01-20 14:25:05'),(15,236,'Kabupaten Lamongan','yes','2016-01-20 14:25:05'),(15,237,'Kabupaten Lumajang','yes','2016-01-20 14:25:05'),(15,238,'Kabupaten Madiun','yes','2016-01-20 14:25:05'),(15,239,'Kabupaten Magetan','yes','2016-01-20 14:25:05'),(15,240,'Kabupaten Malang','yes','2016-01-20 14:25:05'),(15,241,'Kabupaten Mojokerto','yes','2016-01-20 14:25:05'),(15,242,'Kabupaten Nganjuk','yes','2016-01-20 14:25:05'),(15,243,'Kabupaten Ngawi','yes','2016-01-20 14:25:05'),(15,244,'Kabupaten Pacitan','yes','2016-01-20 14:25:05'),(15,245,'Kabupaten Pamekasan','yes','2016-01-20 14:25:05'),(15,246,'Kabupaten Pasuruan','yes','2016-01-20 14:25:05'),(15,247,'Kabupaten Ponorogo','yes','2016-01-20 14:25:05'),(15,248,'Kabupaten Probolinggo','yes','2016-01-20 14:25:05'),(15,249,'Kabupaten Sampang','yes','2016-01-20 14:25:05'),(15,250,'Kabupaten Sidoarjo','yes','2016-01-20 14:25:05'),(15,251,'Kabupaten Situbondo','yes','2016-01-20 14:25:05'),(15,252,'Kabupaten Sumenep','yes','2016-01-20 14:25:05'),(15,253,'Kabupaten Trenggalek','yes','2016-01-20 14:25:05'),(15,254,'Kabupaten Tuban','yes','2016-01-20 14:25:05'),(15,255,'Kabupaten Tulungagung','yes','2016-01-20 14:25:05'),(15,256,'Kota Batu','yes','2016-01-20 14:25:05'),(15,257,'Kota Blitar','yes','2016-01-20 14:25:05'),(15,258,'Kota Kediri','yes','2016-01-20 14:25:05'),(15,259,'Kota Madiun','yes','2016-01-20 14:25:05'),(15,260,'Kota Malang','yes','2016-01-20 14:25:05'),(15,261,'Kota Mojokerto','yes','2016-01-20 14:25:05'),(15,262,'Kota Pasuruan','yes','2016-01-20 14:25:05'),(15,263,'Kota Probolinggo','yes','2016-01-20 14:25:05'),(15,264,'Kota Surabaya','yes','2016-01-20 14:25:05'),(16,265,'Kabupaten Bantul','yes','2016-01-20 14:26:07'),(16,266,'Kabupaten Gunung Kidul','yes','2016-01-20 14:26:07'),(16,267,'Kabupaten Kulon Progo','yes','2016-01-20 14:26:07'),(16,268,'Kabupaten Sleman','yes','2016-01-20 14:26:07'),(16,269,'Kota Yogyakarta','yes','2016-01-20 14:26:07'),(17,270,'Kabupaten Badung','yes','2016-01-20 14:27:00'),(17,271,'Kabupaten Bangli','yes','2016-01-20 14:27:00'),(17,272,'Kabupaten Buleleng','yes','2016-01-20 14:27:00'),(17,273,'Kabupaten Gianyar','yes','2016-01-20 14:27:00'),(17,274,'Kabupaten Jembrana','yes','2016-01-20 14:27:00'),(17,275,'Kabupaten Karangasem','yes','2016-01-20 14:27:00'),(17,276,'Kabupaten Klungkung','yes','2016-01-20 14:27:00'),(17,277,'Kabupaten Tabanan','yes','2016-01-20 14:27:00'),(17,278,'Kota Denpasar','yes','2016-01-20 14:27:00'),(18,279,'Kabupaten Bima','yes','2016-01-20 14:27:49'),(18,280,'Kabupaten Dompu','yes','2016-01-20 14:27:49'),(18,281,'Kabupaten Lombok Barat','yes','2016-01-20 14:27:49'),(18,282,'Kabupaten Lombok Tengah','yes','2016-01-20 14:27:49'),(18,283,'Kabupaten Lombok Timur','yes','2016-01-20 14:27:49'),(18,284,'Kabupaten Lombok Utara','yes','2016-01-20 14:27:49'),(18,285,'Kabupaten Sumbawa','yes','2016-01-20 14:27:49'),(18,286,'Kabupaten Sumbawa Barat','yes','2016-01-20 14:27:49'),(18,287,'Kota Bima','yes','2016-01-20 14:27:49'),(18,288,'Kota Mataram','yes','2016-01-20 14:27:49'),(19,289,'Kabupaten Alor','yes','2016-01-20 14:28:44'),(19,290,'Kabupaten Belu','yes','2016-01-20 14:28:44'),(19,291,'Kabupaten Ende','yes','2016-01-20 14:28:44'),(19,292,'Kabupaten Flores Timur','yes','2016-01-20 14:28:44'),(19,293,'Kabupaten Kupang','yes','2016-01-20 14:28:44'),(19,294,'Kabupaten Lembata','yes','2016-01-20 14:28:44'),(19,295,'Kabupaten Manggarai','yes','2016-01-20 14:28:44'),(19,296,'Kabupaten Manggarai Barat','yes','2016-01-20 14:28:44'),(19,297,'Kabupaten Manggarai Timur','yes','2016-01-20 14:28:44'),(19,298,'Kabupaten Ngada','yes','2016-01-20 14:28:44'),(19,299,'Kabupaten Nagekeo','yes','2016-01-20 14:28:44'),(19,300,'Kabupaten Rote Ndao','yes','2016-01-20 14:28:44'),(19,301,'Kabupaten Sabu Raijua','yes','2016-01-20 14:28:44'),(19,302,'Kabupaten Sikka','yes','2016-01-20 14:28:44'),(19,303,'Kabupaten Sumba Barat','yes','2016-01-20 14:28:44'),(19,304,'Kabupaten Sumba Barat Daya','yes','2016-01-20 14:28:44'),(19,305,'Kabupaten Sumba Tengah','yes','2016-01-20 14:28:44'),(19,306,'Kabupaten Sumba Timur','yes','2016-01-20 14:28:44'),(19,307,'Kabupaten Timor Tengah Selatan','yes','2016-01-20 14:28:44'),(19,308,'Kabupaten Timor Tengah Utara','yes','2016-01-20 14:28:44'),(19,309,'Kota Kupang','yes','2016-01-20 14:28:44'),(20,310,'Kabupaten Bengkayang','yes','2016-01-20 14:29:44'),(20,311,'Kabupaten Kapuas Hulu','yes','2016-01-20 14:29:44'),(20,312,'Kabupaten Kayong Utara','yes','2016-01-20 14:29:44'),(20,313,'Kabupaten Ketapang','yes','2016-01-20 14:29:44'),(20,314,'Kabupaten Kubu Raya','yes','2016-01-20 14:29:44'),(20,315,'Kabupaten Landak','yes','2016-01-20 14:29:44'),(20,316,'Kabupaten Melawi','yes','2016-01-20 14:29:44'),(20,317,'Kabupaten Pontianak','yes','2016-01-20 14:29:44'),(20,318,'Kabupaten Sambas','yes','2016-01-20 14:29:44'),(20,319,'Kabupaten Sanggau','yes','2016-01-20 14:29:44'),(20,320,'Kabupaten Sekadau','yes','2016-01-20 14:29:44'),(20,321,'Kabupaten Sintang','yes','2016-01-20 14:29:44'),(20,322,'Kota Pontianak','yes','2016-01-20 14:29:44'),(20,323,'Kota Singkawang','yes','2016-01-20 14:29:44'),(21,324,'Kabupaten Balangan','yes','2016-01-20 14:30:35'),(21,325,'Kabupaten Banjar','yes','2016-01-20 14:30:35'),(21,326,'Kabupaten Barito Kuala','yes','2016-01-20 14:30:35'),(21,327,'Kabupaten Hulu Sungai Selatan','yes','2016-01-20 14:30:35'),(21,328,'Kabupaten Hulu Sungai Tengah','yes','2016-01-20 14:30:35'),(21,329,'Kabupaten Hulu Sungai Utara','yes','2016-01-20 14:30:35'),(21,330,'Kabupaten Kotabaru','yes','2016-01-20 14:30:35'),(21,331,'Kabupaten Tabalong','yes','2016-01-20 14:30:35'),(21,332,'Kabupaten Tanah Bumbu','yes','2016-01-20 14:30:35'),(21,333,'Kabupaten Tanah Laut','yes','2016-01-20 14:30:35'),(21,334,'Kabupaten Tapin','yes','2016-01-20 14:30:35'),(21,335,'Kota Banjarbaru','yes','2016-01-20 14:30:35'),(21,336,'Kota Banjarmasin','yes','2016-01-20 14:30:35'),(22,337,'Kabupaten Barito Selatan','yes','2016-01-20 14:31:24'),(22,338,'Kabupaten Barito Timur','yes','2016-01-20 14:31:24'),(22,339,'Kabupaten Barito Utara','yes','2016-01-20 14:31:24'),(22,340,'Kabupaten Gunung Mas','yes','2016-01-20 14:31:24'),(22,341,'Kabupaten Kapuas','yes','2016-01-20 14:31:24'),(22,342,'Kabupaten Katingan','yes','2016-01-20 14:31:24'),(22,343,'Kabupaten Kotawaringin Barat','yes','2016-01-20 14:31:24'),(22,344,'Kabupaten Kotawaringin Timur','yes','2016-01-20 14:31:24'),(22,345,'Kabupaten Lamandau','yes','2016-01-20 14:31:24'),(22,346,'Kabupaten Murung Raya','yes','2016-01-20 14:31:24'),(22,347,'Kabupaten Pulang Pisau','yes','2016-01-20 14:31:24'),(22,348,'Kabupaten Sukamara','yes','2016-01-20 14:31:24'),(22,349,'Kabupaten Seruyan','yes','2016-01-20 14:31:24'),(22,350,'Kota Palangka Raya','yes','2016-01-20 14:31:24'),(23,351,'Kabupaten Berau','yes','2016-01-20 14:32:17'),(24,352,'Kabupaten Bulungan','yes','2016-01-20 14:32:17'),(23,353,'Kabupaten Kutai Barat','yes','2016-01-20 14:32:17'),(23,354,'Kabupaten Kutai Kartanegara','yes','2016-01-20 14:32:17'),(23,355,'Kabupaten Kutai Timur','yes','2016-01-20 14:32:17'),(24,356,'Kabupaten Malinau','yes','2016-01-20 14:32:17'),(24,357,'Kabupaten Nunukan','yes','2016-01-20 14:32:17'),(23,358,'Kabupaten Paser','yes','2016-01-20 14:32:17'),(23,359,'Kabupaten Penajam Paser Utara','yes','2016-01-20 14:32:17'),(24,360,'Kabupaten Tana Tidung','yes','2016-01-20 14:32:17'),(23,361,'Kota Balikpapan','yes','2016-01-20 14:32:17'),(23,362,'Kota Bontang','yes','2016-01-20 14:32:17'),(23,363,'Kota Samarinda','yes','2016-01-20 14:32:17'),(24,364,'Kota Tarakan','yes','2016-01-20 14:32:17'),(23,365,'Kabupaten Mahakam Ulu','yes','2016-01-20 14:32:17'),(25,366,'Kabupaten Boalemo','yes','2016-01-20 14:37:44'),(25,367,'Kabupaten Bone Bolango','yes','2016-01-20 14:37:44'),(25,368,'Kabupaten Gorontalo','yes','2016-01-20 14:37:44'),(25,369,'Kabupaten Gorontalo Utara','yes','2016-01-20 14:37:44'),(25,370,'Kabupaten Pohuwato','yes','2016-01-20 14:37:44'),(25,371,'Kota Gorontalo','yes','2016-01-20 14:37:44'),(26,372,'Kabupaten Bantaeng','yes','2016-01-20 14:38:34'),(26,373,'Kabupaten Barru','yes','2016-01-20 14:38:34'),(26,374,'Kabupaten Bone','yes','2016-01-20 14:38:34'),(26,375,'Kabupaten Bulukumba','yes','2016-01-20 14:38:34'),(26,376,'Kabupaten Enrekang','yes','2016-01-20 14:38:34'),(26,377,'Kabupaten Gowa','yes','2016-01-20 14:38:34'),(26,378,'Kabupaten Jeneponto','yes','2016-01-20 14:38:34'),(26,379,'Kabupaten Kepulauan Selayar','yes','2016-01-20 14:38:34'),(26,380,'Kabupaten Luwu','yes','2016-01-20 14:38:34'),(26,381,'Kabupaten Luwu Timur','yes','2016-01-20 14:38:34'),(26,382,'Kabupaten Luwu Utara','yes','2016-01-20 14:38:34'),(26,383,'Kabupaten Maros','yes','2016-01-20 14:38:34'),(26,384,'Kabupaten Pangkajene dan Kepulauan','yes','2016-01-20 14:38:34'),(26,385,'Kabupaten Pinrang','yes','2016-01-20 14:38:34'),(26,386,'Kabupaten Sidenreng Rappang','yes','2016-01-20 14:38:34'),(26,387,'Kabupaten Sinjai','yes','2016-01-20 14:38:34'),(26,388,'Kabupaten Soppeng','yes','2016-01-20 14:38:34'),(26,389,'Kabupaten Takalar','yes','2016-01-20 14:38:34'),(26,390,'Kabupaten Tana Toraja','yes','2016-01-20 14:38:34'),(26,391,'Kabupaten Toraja Utara','yes','2016-01-20 14:38:34'),(26,392,'Kabupaten Wajo','yes','2016-01-20 14:38:34'),(26,393,'Kota Makassar','yes','2016-01-20 14:38:34'),(26,394,'Kota Palopo','yes','2016-01-20 14:38:34'),(26,395,'Kota Parepare','yes','2016-01-20 14:38:34'),(27,396,'Kabupaten Bombana','yes','2016-01-20 14:39:30'),(27,397,'Kabupaten Buton','yes','2016-01-20 14:39:30'),(27,398,'Kabupaten Buton Utara','yes','2016-01-20 14:39:30'),(27,399,'Kabupaten Kolaka','yes','2016-01-20 14:39:30'),(27,400,'Kabupaten Kolaka Utara','yes','2016-01-20 14:39:30'),(27,401,'Kabupaten Konawe','yes','2016-01-20 14:39:30'),(27,402,'Kabupaten Konawe Selatan','yes','2016-01-20 14:39:30'),(27,403,'Kabupaten Konawe Utara','yes','2016-01-20 14:39:30'),(27,404,'Kabupaten Muna','yes','2016-01-20 14:39:30'),(27,405,'Kabupaten Wakatobi','yes','2016-01-20 14:39:30'),(27,406,'Kota Bau-Bau','yes','2016-01-20 14:39:30'),(27,407,'Kota Kendari','yes','2016-01-20 14:39:30'),(28,408,'Kabupaten Banggai','yes','2016-01-20 14:40:26'),(28,409,'Kabupaten Banggai Kepulauan','yes','2016-01-20 14:40:26'),(28,410,'Kabupaten Buol','yes','2016-01-20 14:40:26'),(28,411,'Kabupaten Donggala','yes','2016-01-20 14:40:26'),(28,412,'Kabupaten Morowali','yes','2016-01-20 14:40:26'),(28,413,'Kabupaten Parigi Moutong','yes','2016-01-20 14:40:26'),(28,414,'Kabupaten Poso','yes','2016-01-20 14:40:26'),(28,415,'Kabupaten Tojo Una-Una','yes','2016-01-20 14:40:26'),(28,416,'Kabupaten Toli-Toli','yes','2016-01-20 14:40:26'),(28,417,'Kabupaten Sigi','yes','2016-01-20 14:40:26'),(28,418,'Kota Palu','yes','2016-01-20 14:40:26'),(29,419,'Kabupaten Bolaang Mongondow','yes','2016-01-20 14:41:20'),(29,420,'Kabupaten Bolaang Mongondow Selatan','yes','2016-01-20 14:41:20'),(29,421,'Kabupaten Bolaang Mongondow Timur','yes','2016-01-20 14:41:20'),(29,422,'Kabupaten Bolaang Mongondow Utara','yes','2016-01-20 14:41:20'),(29,423,'Kabupaten Kepulauan Sangihe','yes','2016-01-20 14:41:20'),(29,424,'Kabupaten Kepulauan Siau Tagulandang Biaro','yes','2016-01-20 14:41:20'),(29,425,'Kabupaten Kepulauan Talaud','yes','2016-01-20 14:41:20'),(29,426,'Kabupaten Minahasa','yes','2016-01-20 14:41:20'),(29,427,'Kabupaten Minahasa Selatan','yes','2016-01-20 14:41:20'),(29,428,'Kabupaten Minahasa Tenggara','yes','2016-01-20 14:41:20'),(29,429,'Kabupaten Minahasa Utara','yes','2016-01-20 14:41:20'),(29,430,'Kota Bitung','yes','2016-01-20 14:41:20'),(29,431,'Kota Kotamobagu','yes','2016-01-20 14:41:20'),(29,432,'Kota Manado','yes','2016-01-20 14:41:20'),(29,433,'Kota Tomohon','yes','2016-01-20 14:41:20'),(30,434,'Kabupaten Majene','yes','2016-01-20 14:42:02'),(30,435,'Kabupaten Mamasa','yes','2016-01-20 14:42:02'),(30,436,'Kabupaten Mamuju','yes','2016-01-20 14:42:02'),(30,437,'Kabupaten Mamuju Utara','yes','2016-01-20 14:42:02'),(30,438,'Kabupaten Polewali Mandar','yes','2016-01-20 14:42:02'),(31,439,'Kabupaten Buru','yes','2016-01-20 14:42:50'),(31,440,'Kabupaten Buru Selatan','yes','2016-01-20 14:42:50'),(31,441,'Kabupaten Kepulauan Aru','yes','2016-01-20 14:42:50'),(31,442,'Kabupaten Maluku Barat Daya','yes','2016-01-20 14:42:50'),(31,443,'Kabupaten Maluku Tengah','yes','2016-01-20 14:42:50'),(31,444,'Kabupaten Maluku Tenggara','yes','2016-01-20 14:42:50'),(31,445,'Kabupaten Maluku Tenggara Barat','yes','2016-01-20 14:42:50'),(31,446,'Kabupaten Seram Bagian Barat','yes','2016-01-20 14:42:50'),(31,447,'Kabupaten Seram Bagian Timur','yes','2016-01-20 14:42:50'),(31,448,'Kota Ambon','yes','2016-01-20 14:42:50'),(31,449,'Kota Tual','yes','2016-01-20 14:42:50'),(32,450,'Kabupaten Halmahera Barat','yes','2016-01-20 14:43:38'),(32,451,'Kabupaten Halmahera Tengah','yes','2016-01-20 14:43:38'),(32,452,'Kabupaten Halmahera Utara','yes','2016-01-20 14:43:38'),(32,453,'Kabupaten Halmahera Selatan','yes','2016-01-20 14:43:38'),(32,454,'Kabupaten Kepulauan Sula','yes','2016-01-20 14:43:38'),(32,455,'Kabupaten Halmahera Timur','yes','2016-01-20 14:43:38'),(32,456,'Kabupaten Pulau Morotai','yes','2016-01-20 14:43:38'),(32,457,'Kota Ternate','yes','2016-01-20 14:43:38'),(32,458,'Kota Tidore Kepulauan','yes','2016-01-20 14:43:38'),(33,459,'Kabupaten Asmat','yes','2016-01-20 14:44:25'),(33,460,'Kabupaten Biak Numfor','yes','2016-01-20 14:44:25'),(33,461,'Kabupaten Boven Digoel','yes','2016-01-20 14:44:25'),(33,462,'Kabupaten Deiyai','yes','2016-01-20 14:44:25'),(33,463,'Kabupaten Dogiyai','yes','2016-01-20 14:44:25'),(33,464,'Kabupaten Intan Jaya','yes','2016-01-20 14:44:25'),(33,465,'Kabupaten Jayapura','yes','2016-01-20 14:44:25'),(33,466,'Kabupaten Jayawijaya','yes','2016-01-20 14:44:25'),(33,467,'Kabupaten Keerom','yes','2016-01-20 14:44:25'),(33,468,'Kabupaten Kepulauan Yapen','yes','2016-01-20 14:44:25'),(33,469,'Kabupaten Lanny Jaya','yes','2016-01-20 14:44:25'),(33,470,'Kabupaten Mamberamo Raya','yes','2016-01-20 14:44:25'),(33,471,'Kabupaten Mamberamo Tengah','yes','2016-01-20 14:44:25'),(33,472,'Kabupaten Mappi','yes','2016-01-20 14:44:25'),(33,473,'Kabupaten Merauke','yes','2016-01-20 14:44:25'),(33,474,'Kabupaten Mimika','yes','2016-01-20 14:44:25'),(33,475,'Kabupaten Nabire','yes','2016-01-20 14:44:25'),(33,476,'Kabupaten Nduga','yes','2016-01-20 14:44:25'),(33,477,'Kabupaten Paniai','yes','2016-01-20 14:44:25'),(33,478,'Kabupaten Pegunungan Bintang','yes','2016-01-20 14:44:25'),(33,479,'Kabupaten Puncak','yes','2016-01-20 14:44:25'),(33,480,'Kabupaten Puncak Jaya','yes','2016-01-20 14:44:25'),(33,481,'Kabupaten Sarmi','yes','2016-01-20 14:44:25'),(33,482,'Kabupaten Supiori','yes','2016-01-20 14:44:25'),(33,483,'Kabupaten Tolikara','yes','2016-01-20 14:44:25'),(33,484,'Kabupaten Waropen','yes','2016-01-20 14:44:25'),(33,485,'Kabupaten Yahukimo','yes','2016-01-20 14:44:25'),(33,486,'Kabupaten Yalimo','yes','2016-01-20 14:44:25'),(33,487,'Kota Jayapura','yes','2016-01-20 14:44:25'),(34,488,'Kabupaten Fakfak','yes','2016-01-20 14:45:26'),(34,489,'Kabupaten Kaimana','yes','2016-01-20 14:45:26'),(34,490,'Kabupaten Manokwari','yes','2016-01-20 14:45:26'),(34,491,'Kabupaten Maybrat','yes','2016-01-20 14:45:26'),(34,492,'Kabupaten Raja Ampat','yes','2016-01-20 14:45:26'),(34,493,'Kabupaten Sorong','yes','2016-01-20 14:45:26'),(34,494,'Kabupaten Sorong Selatan','yes','2016-01-20 14:45:26'),(34,495,'Kabupaten Tambrauw','yes','2016-01-20 14:45:26'),(34,496,'Kabupaten Teluk Bintuni','yes','2016-01-20 14:45:26'),(34,497,'Kabupaten Teluk Wondama','yes','2016-01-20 14:45:26'),(34,498,'Kota Sorong','yes','2016-01-20 14:45:26');

/*Table structure for table `aluni_m_modules` */

DROP TABLE IF EXISTS `aluni_m_modules`;

CREATE TABLE `aluni_m_modules` (
  `module_id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `module_name` varchar(30) NOT NULL,
  `module_description` text,
  `module_type` enum('system','common') NOT NULL DEFAULT 'common',
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `aluni_m_modules` */

insert  into `aluni_m_modules`(`module_id`,`module_name`,`module_description`,`module_type`,`active`,`created_date`) values (001,'System Setting','System setting management such as system name, description, location etc.','system','yes','2016-01-28 09:30:31'),(002,'User Management','User management Module','system','yes','2016-01-28 09:31:23'),(003,'Tambah Data Member','Tambah data member ke dalam sistem database','common','yes','2016-01-28 09:39:25'),(004,'Ubah Data Member','Ubah data member yang telah ada','common','yes','2016-01-28 09:39:52'),(005,'Pembuatan Laporan','Pembuatan laporan','common','yes','2016-01-28 09:54:42');

/*Table structure for table `aluni_m_province` */

DROP TABLE IF EXISTS `aluni_m_province`;

CREATE TABLE `aluni_m_province` (
  `province_id` int(4) NOT NULL AUTO_INCREMENT,
  `province_name` varchar(50) NOT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `aluni_m_province` */

insert  into `aluni_m_province`(`province_id`,`province_name`,`active`,`created_date`) values (1,'Aceh','yes','2016-01-20 13:33:10'),(2,'Sumatera Utara','yes','2016-01-20 13:33:10'),(3,'Sumatera Barat','yes','2016-01-20 13:33:10'),(4,'Riau','yes','2016-01-20 13:33:10'),(5,'Kepulauan Riau','yes','2016-01-20 13:33:10'),(6,'Jambi','yes','2016-01-20 13:33:10'),(7,'Bengkulu','yes','2016-01-20 13:33:10'),(8,'Sumatera Selatan','yes','2016-01-20 13:33:10'),(9,'Kepulauan Bangka Belitung','yes','2016-01-20 13:33:10'),(10,'Lampung','yes','2016-01-20 13:33:10'),(11,'Banten','yes','2016-01-20 13:33:10'),(12,'Jawa Barat','yes','2016-01-20 13:33:10'),(13,'DKI Jakarta','yes','2016-01-20 13:33:10'),(14,'Jawa Tengah','yes','2016-01-20 13:33:10'),(15,'Jawa Timur','yes','2016-01-20 13:33:10'),(16,'Daerah Istimewa Yogyakarta','yes','2016-01-20 13:33:10'),(17,'Bali','yes','2016-01-20 13:33:10'),(18,'Nusa Tenggara Barat','yes','2016-01-20 13:33:10'),(19,'Nusa Tenggara Timur','yes','2016-01-20 13:33:10'),(20,'Kalimantan Barat','yes','2016-01-20 13:33:10'),(21,'Kalimantan Selatan','yes','2016-01-20 13:33:10'),(22,'Kalimantan Tengah','yes','2016-01-20 13:33:10'),(23,'Kalimantan Timur','yes','2016-01-20 13:33:10'),(24,'Kalimantan Utara','yes','2016-01-20 13:33:10'),(25,'Gorontalo','yes','2016-01-20 13:33:10'),(26,'Sulawesi Selatan','yes','2016-01-20 13:33:10'),(27,'Sulawesi Tenggara','yes','2016-01-20 13:33:10'),(28,'Sulawesi Tengah','yes','2016-01-20 13:33:10'),(29,'Sulawesi Utara','yes','2016-01-20 13:33:10'),(30,'Sulawesi Barat','yes','2016-01-20 13:33:10'),(31,'Maluku','yes','2016-01-20 13:33:10'),(32,'Maluku Utara','yes','2016-01-20 13:33:10'),(33,'Papua','yes','2016-01-20 13:33:10'),(34,'Papua Barat','yes','2016-01-20 13:33:10');

/*Table structure for table `aluni_member_academic_info` */

DROP TABLE IF EXISTS `aluni_member_academic_info`;

CREATE TABLE `aluni_member_academic_info` (
  `member_id` int(12) NOT NULL,
  `generation` varchar(50) DEFAULT NULL COMMENT 'Angkatan',
  `year_entry` int(4) NOT NULL,
  `year_out` int(4) DEFAULT NULL,
  `last_class` varchar(100) DEFAULT NULL,
  `notes` text,
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aluni_member_academic_info` */

insert  into `aluni_member_academic_info`(`member_id`,`generation`,`year_entry`,`year_out`,`last_class`,`notes`,`created_by`,`created_date`,`updated_by`,`updated_date`,`revision`) values (1,'XIII',2010,2014,'IK 301','','admin','2016-02-04 12:12:41','admin','2016-02-04 12:13:39',0);

/*Table structure for table `aluni_member_basic_info` */

DROP TABLE IF EXISTS `aluni_member_basic_info`;

CREATE TABLE `aluni_member_basic_info` (
  `member_id` int(12) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `place_of_birth` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `photo` blob,
  `province_id` int(4) NOT NULL,
  `city_id` int(4) NOT NULL,
  `address` text,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `aluni_member_basic_info` */

insert  into `aluni_member_basic_info`(`member_id`,`fullname`,`nickname`,`gender`,`place_of_birth`,`date_of_birth`,`photo`,`province_id`,`city_id`,`address`,`active`,`created_by`,`created_date`,`updated_by`,`updated_date`,`revision`) values (1,'Noerman Agustiyan','Anoerman','male','Kota Administrasi Jakarta Selatan','1992-08-25','1_photo.jpeg',12,183,'<p>Paspampres</p>','yes','admin','2016-02-04 12:12:41','admin','2016-02-04 12:13:39',0);

/*Table structure for table `aluni_member_contact_info` */

DROP TABLE IF EXISTS `aluni_member_contact_info`;

CREATE TABLE `aluni_member_contact_info` (
  `member_id` int(12) NOT NULL,
  `home_number` varchar(15) DEFAULT NULL,
  `phone_number_1` varchar(15) DEFAULT NULL,
  `phone_number_2` varchar(15) DEFAULT NULL,
  `blackberry_pin` varchar(10) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `website_address` varchar(50) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aluni_member_contact_info` */

insert  into `aluni_member_contact_info`(`member_id`,`home_number`,`phone_number_1`,`phone_number_2`,`blackberry_pin`,`email_address`,`website_address`,`facebook`,`twitter`,`created_by`,`created_date`,`updated_by`,`updated_date`,`revision`) values (1,'','085716188720','','','00@goo.com','','','','admin','2016-02-04 12:12:41','admin','2016-02-04 12:13:39',0);

/*Table structure for table `aluni_member_family_info` */

DROP TABLE IF EXISTS `aluni_member_family_info`;

CREATE TABLE `aluni_member_family_info` (
  `member_id` int(12) NOT NULL COMMENT 'FK member_basic_info',
  `partner_name` varchar(100) DEFAULT NULL COMMENT 'Suami atau istri',
  `childrens` varchar(100) DEFAULT NULL COMMENT 'Array : anak',
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aluni_member_family_info` */

insert  into `aluni_member_family_info`(`member_id`,`partner_name`,`childrens`,`created_by`,`created_date`,`updated_by`,`updated_date`,`revision`) values (1,'','||||','admin','2016-02-04 12:12:41','admin','2016-02-04 12:13:39',0);

/*Table structure for table `aluni_member_parent_info` */

DROP TABLE IF EXISTS `aluni_member_parent_info`;

CREATE TABLE `aluni_member_parent_info` (
  `member_id` int(12) NOT NULL COMMENT 'FK member_basic_info',
  `father_name` varchar(100) DEFAULT NULL COMMENT 'Ayah',
  `mother_name` varchar(100) DEFAULT NULL COMMENT 'Ibu',
  `guardian_name` varchar(100) DEFAULT NULL COMMENT 'Wali (jika ada)',
  `province_id` int(4) DEFAULT NULL,
  `city_id` int(4) DEFAULT NULL,
  `parent_address` text,
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aluni_member_parent_info` */

insert  into `aluni_member_parent_info`(`member_id`,`father_name`,`mother_name`,`guardian_name`,`province_id`,`city_id`,`parent_address`,`created_by`,`created_date`,`updated_by`,`updated_date`,`revision`) values (1,'Basri','Nurmah','',12,183,'<p>Paspampres</p>','admin','2016-02-04 12:12:41','admin','2016-02-04 12:13:39',0);

/*Table structure for table `aluni_sessions` */

DROP TABLE IF EXISTS `aluni_sessions`;

CREATE TABLE `aluni_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aluni_sessions` */

insert  into `aluni_sessions`(`id`,`ip_address`,`timestamp`,`data`) values ('268eb63d174df0128fa015ab4c10b600ec9d81e0','::1',1454554653,'__ci_last_regenerate|i:1454554653;'),('5e0bae06aa04d22e174b53b397b149d187a04475','::1',1454557341,'__ci_last_regenerate|i:1454557341;'),('d15c0443b5167edf472377eea6846b5677595c2a','::1',1454560484,'__ci_last_regenerate|i:1454560184;username|s:5:\"admin\";first_name|s:5:\"Super\";last_name|s:4:\"User\";privileges|s:1:\"*\";date_signin|s:19:\"04/02/2016 11:29:48\";'),('b81854b47fb6d766ad5eaaffae001196eae1d9d0','::1',1454560485,'__ci_last_regenerate|i:1454560485;username|s:5:\"admin\";first_name|s:5:\"Super\";last_name|s:4:\"User\";privileges|s:1:\"*\";date_signin|s:19:\"04/02/2016 11:29:48\";'),('55d11a850a3626f51fe0e49117dedf9ffa393d6a','::1',1454562828,'__ci_last_regenerate|i:1454562687;username|s:5:\"admin\";first_name|s:5:\"Super\";last_name|s:4:\"User\";privileges|s:1:\"*\";date_signin|s:19:\"04/02/2016 11:29:48\";'),('08339cb54406a749c86363bd9d6235164f2bbe5b','::1',1454633096,'__ci_last_regenerate|i:1454633096;'),('00e5815a624395f642764b50342fefe14e9e2ad7','::1',1454636093,'__ci_last_regenerate|i:1454636093;'),('f10f6c0e4ca84aaa43cb6054fd829309454cae62','::1',1454638351,'__ci_last_regenerate|i:1454638288;username|s:5:\"admin\";first_name|s:5:\"Super\";last_name|s:4:\"User\";privileges|s:1:\"*\";date_signin|s:19:\"05/02/2016 09:11:32\";'),('a1f866216e0429739241c3ab997a61f46abd1189','::1',1454639428,'__ci_last_regenerate|i:1454639413;username|s:5:\"admin\";first_name|s:5:\"Super\";last_name|s:4:\"User\";privileges|s:1:\"*\";date_signin|s:19:\"05/02/2016 09:11:32\";'),('af182d0b2377ed090f793ead6aadbf5bbddd37a2','::1',1454645498,'__ci_last_regenerate|i:1454645243;username|s:5:\"admin\";first_name|s:5:\"Super\";last_name|s:4:\"User\";privileges|s:1:\"*\";date_signin|s:19:\"05/02/2016 09:11:32\";'),('f6642bfffe4f20910edf9d11257237b3266fb309','::1',1454646083,'__ci_last_regenerate|i:1454646083;'),('59bba14e53fccab88b277dcb257e7bccf0381eac','::1',1454664402,'__ci_last_regenerate|i:1454664344;username|s:5:\"admin\";first_name|s:5:\"Super\";last_name|s:4:\"User\";privileges|s:1:\"*\";date_signin|s:19:\"05/02/2016 16:26:42\";'),('e802c7676889ae8a7169bd59e75c1f4600edbe1f','::1',1454720566,'__ci_last_regenerate|i:1454720566;'),('dcdf811aaff49a8d691ef30fa6843e7e5aa8f1ca','::1',1454988957,'__ci_last_regenerate|i:1454988957;'),('ee2a307b7b61dc4aec6a92be724780f770fae045','::1',1455089110,'__ci_last_regenerate|i:1455089110;');

/*Table structure for table `aluni_settings` */

DROP TABLE IF EXISTS `aluni_settings`;

CREATE TABLE `aluni_settings` (
  `setting_id` int(4) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(20) NOT NULL,
  `setting_value` text NOT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `descriptions` text,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `aluni_settings` */

insert  into `aluni_settings`(`setting_id`,`setting_name`,`setting_value`,`active`,`descriptions`,`created_date`) values (1,'system_name','Alumni DB','yes','Nama instansi pengguna','2016-01-20 14:57:58'),(2,'system_location','<p>Lokasi Sistem</p>','yes','Lokasi instansi pengguna sistem','2016-01-20 15:03:35'),(3,'system_description','<p>Sebuah aplikasi yang digunakan untuk mengatur data anggota dari sebuah instansi atau organisasi. Anda dapat membuat laporan dari data anggota yang telah ada di dalam database.</p>','yes','Keterangan sistem','2016-01-28 09:06:29');

/*Table structure for table `aluni_user_password_status` */

DROP TABLE IF EXISTS `aluni_user_password_status`;

CREATE TABLE `aluni_user_password_status` (
  `member_id` int(12) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` enum('unchanged','changed') NOT NULL DEFAULT 'unchanged',
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aluni_user_password_status` */

insert  into `aluni_user_password_status`(`member_id`,`username`,`password`,`status`,`created_by`,`created_date`,`updated_by`,`updated_date`) values (1,'anoerman','b03442e2','unchanged','admin','2016-02-04 12:12:41','admin','2016-02-04 12:12:41');

/*Table structure for table `aluni_user_privileges` */

DROP TABLE IF EXISTS `aluni_user_privileges`;

CREATE TABLE `aluni_user_privileges` (
  `username` varchar(30) NOT NULL,
  `privileges` text,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aluni_user_privileges` */

insert  into `aluni_user_privileges`(`username`,`privileges`,`created_date`) values ('admin','*','2016-01-28 10:04:05'),('anoerman','','2016-02-04 12:12:41');

/*Table structure for table `aluni_users` */

DROP TABLE IF EXISTS `aluni_users`;

CREATE TABLE `aluni_users` (
  `username` varchar(30) NOT NULL COMMENT 'Unique Username',
  `password` varchar(128) NOT NULL COMMENT 'SHA512',
  `salt` varchar(64) NOT NULL COMMENT 'Random String SHA256',
  `level` enum('user','admin','super_user') NOT NULL DEFAULT 'user' COMMENT 'User Level',
  `active` enum('yes','no') NOT NULL DEFAULT 'yes' COMMENT 'User Active Status',
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `photo` text COMMENT 'User Photo Profile - Set default if empty',
  `member_id` int(12) DEFAULT NULL COMMENT 'Member id - only member',
  `created_by` varchar(30) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(30) NOT NULL,
  `updated_date` datetime NOT NULL,
  `revision` tinyint(3) NOT NULL DEFAULT '0' COMMENT 'Total Profile Changes/Revision',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `aluni_users` */

insert  into `aluni_users`(`username`,`password`,`salt`,`level`,`active`,`first_name`,`last_name`,`photo`,`member_id`,`created_by`,`created_date`,`updated_by`,`updated_date`,`revision`) values ('admin','24ce1033bdfe226997340a7104d79eeb43a54a27c101da24a5eb465c90a10800d6f8671346158f0ecf2efb4f1440f45e9c16fbc3e45d3e53e2bb94839781e95f','1f78147ac76487d519cdf84a31df14b84948c6a01f763b522df896c75a5d7e4f','super_user','yes','Super','User','',NULL,'admin','2015-12-02 11:26:49','admin','2016-01-28 18:21:11',0),('anoerman','60bc986abae509207534beac7fddf835dfcbbe5801f69a05c09ea7fddaf19dd4f75b4e06ba4a3b370f3d71cd2ded333fb3c915d5c017f965db649d68d3d7348d','a1eaa6f201dae0751d177f2fc2c6b8eb9c64d7ed9980c11270eec6d675492632','user','yes','Noerman Agustiyan',NULL,NULL,1,'admin','2016-02-04 12:12:41','admin','2016-02-04 12:12:41',0);

/*Table structure for table `aluni_member_data_all` */

DROP TABLE IF EXISTS `aluni_member_data_all`;

/*!50001 DROP VIEW IF EXISTS `aluni_member_data_all` */;
/*!50001 DROP TABLE IF EXISTS `aluni_member_data_all` */;

/*!50001 CREATE TABLE  `aluni_member_data_all`(
 `member_id` int(12) ,
 `fullname` varchar(100) ,
 `nickname` varchar(50) ,
 `gender` enum('male','female') ,
 `active` enum('yes','no') ,
 `place_of_birth` varchar(50) ,
 `date_of_birth` date ,
 `photo` blob ,
 `province_id` int(4) ,
 `member_province` varchar(50) ,
 `city_id` int(4) ,
 `member_city` varchar(50) ,
 `address` text ,
 `partner_name` varchar(100) ,
 `childrens` varchar(100) ,
 `father_name` varchar(100) ,
 `mother_name` varchar(100) ,
 `guardian_name` varchar(100) ,
 `parent_province` varchar(50) ,
 `parent_city` varchar(50) ,
 `parent_address` text ,
 `home_number` varchar(15) ,
 `phone_number_1` varchar(15) ,
 `phone_number_2` varchar(15) ,
 `blackberry_pin` varchar(10) ,
 `email_address` varchar(50) ,
 `website_address` varchar(50) ,
 `facebook` varchar(150) ,
 `twitter` varchar(50) ,
 `generation` varchar(50) ,
 `year_entry` int(4) ,
 `year_out` int(4) ,
 `last_class` varchar(100) ,
 `academic_notes` text 
)*/;

/*Table structure for table `aluni_member_data_basic` */

DROP TABLE IF EXISTS `aluni_member_data_basic`;

/*!50001 DROP VIEW IF EXISTS `aluni_member_data_basic` */;
/*!50001 DROP TABLE IF EXISTS `aluni_member_data_basic` */;

/*!50001 CREATE TABLE  `aluni_member_data_basic`(
 `member_id` int(12) ,
 `fullname` varchar(100) ,
 `nickname` varchar(50) ,
 `place_of_birth` varchar(50) ,
 `date_of_birth` date ,
 `photo` blob ,
 `province_name` varchar(50) ,
 `city_name` varchar(50) ,
 `address` text 
)*/;

/*Table structure for table `aluni_member_data_parent` */

DROP TABLE IF EXISTS `aluni_member_data_parent`;

/*!50001 DROP VIEW IF EXISTS `aluni_member_data_parent` */;
/*!50001 DROP TABLE IF EXISTS `aluni_member_data_parent` */;

/*!50001 CREATE TABLE  `aluni_member_data_parent`(
 `father_name` varchar(100) ,
 `mother_name` varchar(100) ,
 `guardian_name` varchar(100) ,
 `parent_province_name` varchar(50) ,
 `parent_city_name` varchar(50) ,
 `parent_address` text 
)*/;

/*View structure for view aluni_member_data_all */

/*!50001 DROP TABLE IF EXISTS `aluni_member_data_all` */;
/*!50001 DROP VIEW IF EXISTS `aluni_member_data_all` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aluni_member_data_all` AS select `ab`.`member_id` AS `member_id`,`ab`.`fullname` AS `fullname`,`ab`.`nickname` AS `nickname`,`ab`.`gender` AS `gender`,`ab`.`active` AS `active`,`ab`.`place_of_birth` AS `place_of_birth`,`ab`.`date_of_birth` AS `date_of_birth`,`ab`.`photo` AS `photo`,`ab`.`province_id` AS `province_id`,(select `aluni_m_province`.`province_name` from `aluni_m_province` where (`aluni_m_province`.`province_id` = `ab`.`province_id`)) AS `member_province`,`ab`.`city_id` AS `city_id`,(select `aluni_m_city`.`city_name` from `aluni_m_city` where (`aluni_m_city`.`city_id` = `ab`.`city_id`)) AS `member_city`,`ab`.`address` AS `address`,`af`.`partner_name` AS `partner_name`,`af`.`childrens` AS `childrens`,`ap`.`father_name` AS `father_name`,`ap`.`mother_name` AS `mother_name`,`ap`.`guardian_name` AS `guardian_name`,(select `aluni_m_province`.`province_name` from `aluni_m_province` where (`aluni_m_province`.`province_id` = `ap`.`province_id`)) AS `parent_province`,(select `aluni_m_city`.`city_name` from `aluni_m_city` where (`aluni_m_city`.`city_id` = `ap`.`city_id`)) AS `parent_city`,`ap`.`parent_address` AS `parent_address`,`ac`.`home_number` AS `home_number`,`ac`.`phone_number_1` AS `phone_number_1`,`ac`.`phone_number_2` AS `phone_number_2`,`ac`.`blackberry_pin` AS `blackberry_pin`,`ac`.`email_address` AS `email_address`,`ac`.`website_address` AS `website_address`,`ac`.`facebook` AS `facebook`,`ac`.`twitter` AS `twitter`,`aa`.`generation` AS `generation`,`aa`.`year_entry` AS `year_entry`,`aa`.`year_out` AS `year_out`,`aa`.`last_class` AS `last_class`,`aa`.`notes` AS `academic_notes` from ((((`aluni_member_basic_info` `ab` join `aluni_member_parent_info` `ap` on((`ab`.`member_id` = `ap`.`member_id`))) join `aluni_member_contact_info` `ac` on((`ab`.`member_id` = `ac`.`member_id`))) join `aluni_member_academic_info` `aa` on((`ab`.`member_id` = `aa`.`member_id`))) join `aluni_member_family_info` `af` on((`ab`.`member_id` = `af`.`member_id`))) order by `ab`.`active` */;

/*View structure for view aluni_member_data_basic */

/*!50001 DROP TABLE IF EXISTS `aluni_member_data_basic` */;
/*!50001 DROP VIEW IF EXISTS `aluni_member_data_basic` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aluni_member_data_basic` AS select `ab`.`member_id` AS `member_id`,`ab`.`fullname` AS `fullname`,`ab`.`nickname` AS `nickname`,`ab`.`place_of_birth` AS `place_of_birth`,`ab`.`date_of_birth` AS `date_of_birth`,`ab`.`photo` AS `photo`,`mp`.`province_name` AS `province_name`,`mc`.`city_name` AS `city_name`,`ab`.`address` AS `address` from ((`aluni_member_basic_info` `ab` left join `aluni_m_province` `mp` on((`ab`.`province_id` = `mp`.`province_id`))) left join `aluni_m_city` `mc` on((`ab`.`city_id` = `mc`.`city_id`))) where (`ab`.`active` = 'yes') */;

/*View structure for view aluni_member_data_parent */

/*!50001 DROP TABLE IF EXISTS `aluni_member_data_parent` */;
/*!50001 DROP VIEW IF EXISTS `aluni_member_data_parent` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `aluni_member_data_parent` AS select `ap`.`father_name` AS `father_name`,`ap`.`mother_name` AS `mother_name`,`ap`.`guardian_name` AS `guardian_name`,`mp`.`province_name` AS `parent_province_name`,`mc`.`city_name` AS `parent_city_name`,`ap`.`parent_address` AS `parent_address` from ((`aluni_member_parent_info` `ap` left join `aluni_m_province` `mp` on((`ap`.`province_id` = `mp`.`province_id`))) left join `aluni_m_city` `mc` on((`ap`.`city_id` = `mc`.`city_id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
