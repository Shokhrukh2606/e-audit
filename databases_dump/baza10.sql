-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: audit
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `audit_comp_info`
--

DROP TABLE IF EXISTS `audit_comp_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audit_comp_info` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `audit_comp_name` text NOT NULL,
  `audit_comp_gov_reg_num` text NOT NULL,
  `audit_comp_gov_reg_date` date NOT NULL,
  `audit_comp_inn` varchar(9) NOT NULL,
  `audit_comp_oked` varchar(5) NOT NULL,
  `audit_comp_lic` text NOT NULL,
  `audit_comp_lic_date` date NOT NULL,
  `audit_comp_bank_name` text NOT NULL,
  `audit_comp_bank_acc` varchar(20) NOT NULL,
  `audit_comp_bank_mfo` text NOT NULL,
  `audit_comp_director_name` text NOT NULL,
  `audit_comp_director_cert_num` text NOT NULL,
  `audit_comp_director_cert_date` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_comp_info`
--

LOCK TABLES `audit_comp_info` WRITE;
/*!40000 ALTER TABLE `audit_comp_info` DISABLE KEYS */;
INSERT INTO `audit_comp_info` VALUES (1,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22',1);
/*!40000 ALTER TABLE `audit_comp_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blanks`
--

DROP TABLE IF EXISTS `blanks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blanks` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `conclusion_id` int unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `assigned_date` timestamp NULL DEFAULT NULL,
  `brak_upload` text,
  `is_brak` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `conclusion_id` (`conclusion_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `blanks_ibfk_1` FOREIGN KEY (`conclusion_id`) REFERENCES `conclusions` (`id`),
  CONSTRAINT `blanks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blanks`
--

LOCK TABLES `blanks` WRITE;
/*!40000 ALTER TABLE `blanks` DISABLE KEYS */;
INSERT INTO `blanks` VALUES (1,4,29,'2020-12-15 12:25:20','2020-12-15 17:25:33',NULL,0),(2,4,32,'2020-12-15 12:25:20','2020-12-15 17:30:15',NULL,0),(3,4,NULL,'2020-12-15 12:25:20',NULL,NULL,0),(4,4,NULL,'2020-12-15 12:25:20',NULL,NULL,0),(5,4,NULL,'2020-12-15 12:25:20',NULL,NULL,0),(6,4,NULL,'2020-12-15 12:25:20',NULL,NULL,0),(7,4,NULL,'2020-12-15 12:25:20',NULL,NULL,0),(8,4,NULL,'2020-12-15 12:25:20',NULL,NULL,0),(9,4,NULL,'2020-12-15 12:25:20',NULL,NULL,0),(10,4,NULL,'2020-12-15 12:25:20',NULL,NULL,0);
/*!40000 ALTER TABLE `blanks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cashbacks`
--

DROP TABLE IF EXISTS `cashbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cashbacks` (
  `id` int unsigned NOT NULL,
  `user_id` bigint NOT NULL,
  `amount` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cashbacks`
--

LOCK TABLES `cashbacks` WRITE;
/*!40000 ALTER TABLE `cashbacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cashbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `certificates` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ru` varchar(128) DEFAULT NULL,
  `uz` varchar(128) NOT NULL,
  `oz` varchar(128) NOT NULL,
  `file_path` text,
  `status` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificates`
--

LOCK TABLES `certificates` WRITE;
/*!40000 ALTER TABLE `certificates` DISABLE KEYS */;
INSERT INTO `certificates` VALUES (1,'Auditorlik faoliyatini amalga oshirish uchun sertifikat','Auditorlik faoliyatini amalga oshirish uchun sertifikat','Auditorlik faoliyatini amalga oshirish uchun sertifikat','certificates/1/1608075307Sertifikat.png',1),(2,'Professional auditorlik faoliyati sug\'urtasi','Professional auditorlik faoliyati sug\'urtasi','Professional auditorlik faoliyati sug\'urtasi','certificates/2/1608075327polis.png',1),(3,'Yuridik shaxsni davlat ro\'yhatidan o\'tkazish to\'g\'risida','Yuridik shaxsni davlat ro\'yhatidan o\'tkazish to\'g\'risida','Yuridik shaxsni davlat ro\'yhatidan o\'tkazish to\'g\'risida','certificates/3/1608075360litsenziya.png',1),(4,'Auditor malaka sertifikati','Auditor malaka sertifikati','Auditor malaka sertifikati','certificates/4/1608075372auditor.png',1);
/*!40000 ALTER TABLE `certificates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conclusions`
--

DROP TABLE IF EXISTS `conclusions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conclusions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `auditor_id` bigint unsigned DEFAULT NULL,
  `agent_id` bigint unsigned DEFAULT NULL,
  `customer_id` bigint unsigned DEFAULT NULL,
  `audit_comp_name` text NOT NULL,
  `audit_comp_gov_reg_num` text NOT NULL,
  `audit_comp_gov_reg_date` text NOT NULL,
  `audit_comp_inn` varchar(9) NOT NULL,
  `audit_comp_oked` varchar(5) NOT NULL,
  `audit_comp_lic` text NOT NULL,
  `audit_comp_lic_date` text NOT NULL,
  `audit_comp_bank_name` text NOT NULL,
  `audit_comp_bank_acc` varchar(20) NOT NULL,
  `audit_comp_bank_mfo` varchar(5) NOT NULL,
  `audit_comp_director_name` text NOT NULL,
  `audit_comp_director_cert_num` text NOT NULL,
  `audit_comp_director_cert_date` text NOT NULL,
  `conclusion_base` text NOT NULL,
  `qr_hash` text,
  `status` tinyint NOT NULL DEFAULT '1',
  `A2` decimal(15,2) DEFAULT NULL COMMENT 'текущие (оборотные) активы (производственные запасы, готовая продукция, денежные средства, дебиторская задолженность и др.) (раздел II актива баланса, строка - 390)',
  `P2` decimal(15,2) DEFAULT NULL COMMENT 'Обязательства (раздел II – пассива баланса, строка -  770)',
  `DO` decimal(15,2) DEFAULT NULL COMMENT ' долгосрочные обязательства (строка – 490 бухгалтерского баланса)',
  `A1` decimal(15,2) DEFAULT NULL COMMENT 'олгосрочные активы (основные средства, нематериальные активы, капитальные вложения и др; раздел I актива баланса, строка 130);',
  `P1` decimal(15,2) DEFAULT NULL COMMENT 'источники собственных средств (уставный капитал, резервный капитал, добавленный капитал, нераспределенная прибыль и др; итог раздела I пассива баланса, строка 480); ',
  `DEK2` decimal(15,2) DEFAULT NULL COMMENT 'долгосрочные займы и кредиты, направленные на приобретение долгосрочных активов (расчетным путем из строк 570 и 580 бухгалтерского баланса).',
  `PUDN` decimal(15,2) DEFAULT NULL COMMENT 'прибыль до налогообложения (графа 5, строка 240), или убыток – со знаком  минус (графа 6, строка 240 формы № 2 «Отчет о финансовых результатах»);',
  `P` decimal(15,2) DEFAULT NULL COMMENT 'всего расходы (по форме « № 2 «Отчет о финансовых результатах» - сумма строк (стр. 020, «графа 6» + стр. 040 «графа 6» + стр. 170 «графа 6 + стр. «графа 6» ))',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_coefficent` enum('with_coef','no_coef') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_id` (`agent_id`),
  KEY `auditor_id` (`auditor_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `conclusions_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`),
  CONSTRAINT `conclusions_ibfk_2` FOREIGN KEY (`auditor_id`) REFERENCES `users` (`id`),
  CONSTRAINT `conclusions_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conclusions`
--

LOCK TABLES `conclusions` WRITE;
/*!40000 ALTER TABLE `conclusions` DISABLE KEYS */;
INSERT INTO `conclusions` VALUES (13,4,NULL,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','smth','dd1e92813c89c899c18b7dbaddd34cb6',4,2.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-12 15:12:31','no_coef'),(15,4,NULL,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','Money','9932b6f8e0e0fd53817ff22c4b594bcd',5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-12 18:02:26','with_coef'),(17,NULL,8,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','Money','12ad98cc00842c3a38a57703cb081f91',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-12 20:11:49','no_coef'),(18,NULL,8,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','Money','21de31d9fc0cafa0be6f15001e6b5aaf',2,4.00,2.00,1.00,1.00,3.00,2.00,3.00,2.00,'2020-12-12 21:06:29','with_coef'),(19,NULL,8,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','Money','781f36ce9def34633af72bb4d890819c',2,4.00,3.00,2.00,1.00,3.00,2.00,2.00,1.00,'2020-12-12 21:09:34','with_coef'),(20,NULL,8,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','4','7056c122de7751f3ba62e050d36cfc45',3,3.00,2.00,1.00,1.00,3.00,2.00,2.00,1.00,'2020-12-12 21:14:39','with_coef'),(23,NULL,8,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','Money','d85224c988de0f0f6dd6229efc506ed1',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-12 21:27:02','no_coef'),(24,NULL,8,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','Money','1b498704b0c538abf635a87e36a14ca0',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-12 21:38:29','no_coef'),(25,NULL,8,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','Money','c89842b32553f1376530f6faf3462c84',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-12 21:38:48','no_coef'),(26,43,NULL,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','Money','98aaae714c19e5b18f9193aed5e3b5fd',5,3.00,2.00,1.00,1.00,3.00,2.00,2.00,1.00,'2020-12-12 23:18:51','with_coef'),(27,NULL,8,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','Money','5416a8a27e559164a8156824beef6a7c',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-12 23:34:12','no_coef'),(28,4,NULL,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','1','4b84dc760c21b7ce8e8710b9362b0246',5,1.00,1.00,0.20,1.00,1.00,1.00,1.00,1.00,'2020-12-15 10:34:49','with_coef'),(29,4,NULL,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','test','d1de9acd8f642715a32a2b8af3bb7508',5,1.00,1.00,0.20,1.00,1.00,1.00,1.00,1.00,'2020-12-15 11:28:54','with_coef'),(30,NULL,8,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','test','f20e55a23b3e808dda717f840dde51a7',2,1.00,1.00,0.20,1.00,1.00,1.00,1.00,1.00,'2020-12-15 12:03:16','with_coef'),(31,NULL,8,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','test','5da232053369f6cdef401113ad9f224e',2,1.00,1.00,0.20,1.00,1.00,1.00,1.00,1.00,'2020-12-15 12:05:05','with_coef'),(32,4,NULL,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','test','420b02a78b1b75c9cabaeca5f5f3b54e',5,1.00,1.00,0.20,1.00,1.00,1.00,1.00,1.00,'2020-12-15 12:29:05','with_coef'),(33,4,NULL,NULL,'Himoya Audit MCHJ','12d21212d','2020-12-04','121212121','12344','121asas','2020-12-14','SQB','12344321123443211234','12211','Sadullaev B','AA1212','2020-12-22','Money','f4e6b38f59fed014f015b9c1d70eedbc',5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-12-16 08:21:13','with_coef');
/*!40000 ALTER TABLE `conclusions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contracts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `conclusion_id` int unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `conclusion_id` (`conclusion_id`),
  CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`conclusion_id`) REFERENCES `conclusions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contracts`
--

LOCK TABLES `contracts` WRITE;
/*!40000 ALTER TABLE `contracts` DISABLE KEYS */;
INSERT INTO `contracts` VALUES (2,7,13,'2020-12-12 22:25:05'),(5,8,25,'2020-12-12 22:25:05'),(6,7,26,'2020-12-12 23:18:52'),(7,8,27,'2020-12-12 23:34:12'),(8,7,28,'2020-12-15 10:34:49'),(9,7,29,'2020-12-15 11:28:54'),(10,7,32,'2020-12-15 12:29:05'),(11,7,33,'2020-12-16 08:21:13');
/*!40000 ALTER TABLE `contracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cust_comp_info`
--

DROP TABLE IF EXISTS `cust_comp_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cust_comp_info` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `lang` enum('uz','ru') NOT NULL,
  `conclusion_id` int unsigned DEFAULT NULL,
  `order_id` int unsigned DEFAULT NULL,
  `template_id` int unsigned NOT NULL,
  `cust_comp_name` text NOT NULL,
  `cust_comp_registered_by` text,
  `cust_comp_gov_reg_num` text,
  `cust_comp_gov_registration_copy` text NOT NULL,
  `cust_comp_gov_reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `cust_comp_address` text,
  `cust_comp_bank_name` text,
  `cust_comp_bank_acc` varchar(20) DEFAULT NULL,
  `cust_comp_bank_mfo` varchar(5) DEFAULT NULL,
  `cust_comp_inn` varchar(9) NOT NULL,
  `cust_comp_oked` varchar(5) DEFAULT NULL,
  `cust_comp_director_name` text,
  `cust_comp_director_passport_copy` text NOT NULL,
  `cust_comp_activity` text,
  `custom_fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `year` int NOT NULL,
  `quarter_start` tinyint NOT NULL,
  `quarter_finish` tinyint NOT NULL,
  `contract_name` text,
  `contract_passport_serie` text,
  `contract_where_given` text,
  `contract_address` text,
  `contract_company_name` text,
  `contract_company_inn` text,
  `contract_type` enum('yur','fiz') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `conclusion_id` (`conclusion_id`),
  UNIQUE KEY `order_id` (`order_id`),
  KEY `template_id` (`template_id`),
  CONSTRAINT `cust_comp_info_ibfk_1` FOREIGN KEY (`conclusion_id`) REFERENCES `conclusions` (`id`),
  CONSTRAINT `cust_comp_info_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cust_comp_info_ibfk_3` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cust_comp_info`
--

LOCK TABLES `cust_comp_info` WRITE;
/*!40000 ALTER TABLE `cust_comp_info` DISABLE KEYS */;
INSERT INTO `cust_comp_info` VALUES (7,'uz',13,12,1,'Datagrid LLC',NULL,NULL,'orders/12/1607782661ccicust_comp_gov_registration_copyScreenshot from 2020-11-06 01-52-46.png','2020-12-12 14:17:41',NULL,NULL,NULL,NULL,'123456789',NULL,NULL,'orders/12/1607782661ccicust_comp_director_passport_copyScreenshot from 2020-11-05 00-40-40.png',NULL,'{\"form_1\":\"orders\\/12\\/1607782661form_1view_list.xlsx\",\"form_2\":\"orders\\/12\\/1607782661form_2view_list.xlsx\"}',2020,1,4,'Abdumalik','123456','Tashkent','Piskent',NULL,NULL,'fiz'),(8,'uz',15,13,1,'Datagrid LLC',NULL,NULL,'orders/13/1607794568ccicust_comp_gov_registration_copyScreenshot from 2020-11-05 01-03-54.png','2020-12-12 17:36:08','Toshkent viloyati Piskent tumani','SQB','12331233321123','12345','123456789','54321','Abduganiev Abdumalik','orders/13/1607794568ccicust_comp_director_passport_copyScreenshot from 2020-11-05 00-40-40.png',NULL,'{\"form_1\":\"orders\\/13\\/1607794568form_1Screenshot from 2020-11-06 01-52-46.png\",\"form_2\":\"orders\\/13\\/1607794568form_2Screenshot from 2020-11-06 01-53-56.png\"}',2020,1,4,NULL,NULL,NULL,NULL,'Firma','123456789','yur'),(9,'uz',17,NULL,1,'Datagrid LLC',NULL,NULL,'cust_info//1607803909ccicust_comp_gov_registration_copyScreenshot from 2020-11-06 01-54-10.png','2020-12-12 20:11:49',NULL,NULL,NULL,NULL,'123456789',NULL,NULL,'cust_info//1607803909ccicust_comp_director_passport_copyScreenshot from 2020-11-05 00-40-40.png',NULL,'{\"form_1\":\"cust_info\\/17\\/1607803909view_list.xlsx\",\"form_2\":\"cust_info\\/17\\/1607803909view_list.xlsx\"}',10,1,1,NULL,NULL,NULL,NULL,NULL,NULL,'yur'),(10,'uz',18,NULL,1,'Datagrid LLC',NULL,NULL,'cust_info//1607807189ccicust_comp_gov_registration_copy1607778669ccicust_comp_gov_registration_copyScreenshot from 2020-11-23 20-03-52(1).png','2020-12-12 21:06:29',NULL,NULL,NULL,NULL,'123456789',NULL,NULL,'cust_info//1607807189ccicust_comp_director_passport_copy1607778669ccicust_comp_gov_registration_copyScreenshot from 2020-11-23 20-03-52.png',NULL,'{\"form_1\":\"cust_info\\/18\\/1607807189view_list.xlsx\",\"form_2\":\"cust_info\\/18\\/1607807189view_list.xlsx\"}',10,1,4,NULL,NULL,NULL,NULL,NULL,NULL,'yur'),(11,'uz',19,NULL,1,'Datagrid LLC',NULL,NULL,'cust_info//1607807375ccicust_comp_gov_registration_copyScreenshot from 2020-11-06 01-51-17.png','2020-12-12 21:09:35',NULL,NULL,NULL,NULL,'123456789',NULL,NULL,'cust_info//1607807375ccicust_comp_director_passport_copyScreenshot from 2020-11-06 01-51-12.png',NULL,'{\"form_1\":\"cust_info\\/19\\/1607807375view_list.xlsx\",\"form_2\":\"cust_info\\/19\\/1607807375view_list.xlsx\"}',10,1,4,NULL,NULL,NULL,NULL,NULL,NULL,'yur'),(12,'uz',20,NULL,1,'Datagrid LLC',NULL,NULL,'cust_info//1607807679ccicust_comp_gov_registration_copyScreenshot from 2020-11-06 01-51-12.png','2020-12-12 21:14:39',NULL,NULL,NULL,NULL,'123456789',NULL,NULL,'cust_info//1607807679ccicust_comp_director_passport_copyScreenshot from 2020-11-04 01-52-51.png',NULL,'{\"form_1\":\"cust_info\\/20\\/1607807679view_list.xlsx\",\"form_2\":\"cust_info\\/20\\/1607807679view_list.xlsx\"}',10,1,4,NULL,NULL,NULL,NULL,NULL,NULL,'yur'),(15,'uz',23,NULL,1,'Datagrid LLC',NULL,NULL,'cust_info//1607808422ccicust_comp_gov_registration_copyScreenshot from 2020-11-06 01-52-46.png','2020-12-12 21:27:02',NULL,NULL,NULL,NULL,'123456789',NULL,NULL,'cust_info//1607808422ccicust_comp_director_passport_copyScreenshot from 2020-11-04 01-52-51.png',NULL,'{\"form_1\":\"cust_info\\/23\\/1607808422view_list.xlsx\",\"form_2\":\"cust_info\\/23\\/1607808422view_list.xlsx\"}',10,1,4,NULL,NULL,NULL,NULL,NULL,NULL,'yur'),(16,'uz',24,NULL,1,'Datagrid LLC',NULL,NULL,'cust_info//1607809109ccicust_comp_gov_registration_copyScreenshot from 2020-11-05 01-03-54.png','2020-12-12 21:38:29',NULL,NULL,NULL,NULL,'123456789',NULL,NULL,'cust_info//1607809109ccicust_comp_director_passport_copyScreenshot from 2020-10-25 17-37-40.png',NULL,'{\"form_1\":\"cust_info\\/24\\/1607809109view_list.xlsx\",\"form_2\":\"cust_info\\/24\\/1607809109view_list.xlsx\"}',10,1,4,NULL,NULL,NULL,NULL,NULL,NULL,'yur'),(17,'uz',25,NULL,1,'Datagrid LLC',NULL,NULL,'cust_info//1607809128ccicust_comp_gov_registration_copyScreenshot from 2020-11-05 01-03-54.png','2020-12-12 21:38:48',NULL,NULL,NULL,NULL,'123456789',NULL,NULL,'cust_info//1607809128ccicust_comp_director_passport_copyScreenshot from 2020-10-25 17-37-40.png',NULL,'{\"form_1\":\"cust_info\\/25\\/1607809128view_list.xlsx\",\"form_2\":\"cust_info\\/25\\/1607809128view_list.xlsx\"}',10,1,4,NULL,NULL,NULL,NULL,NULL,NULL,'yur'),(18,'uz',26,14,1,'Datagrid LLC',NULL,NULL,'orders/14/1607814241ccicust_comp_gov_registration_copyScreenshot from 2020-11-06 01-51-12.png','2020-12-12 23:04:01',NULL,NULL,NULL,NULL,'123456789',NULL,NULL,'orders/14/1607814241ccicust_comp_director_passport_copyScreenshot from 2020-10-22 16-42-41.png',NULL,'{\"form_1\":\"orders\\/14\\/1607814241form_1view_list.xlsx\",\"form_2\":\"orders\\/14\\/1607814241form_2view_list.xlsx\"}',2019,1,4,'Abdumalik','123456','Piskent','Piskent',NULL,NULL,'fiz'),(19,'ru',27,NULL,1,'Datagrid LLC',NULL,NULL,'cust_info//1607816052ccicust_comp_gov_registration_copyScreenshot from 2020-11-06 01-51-12.png','2020-12-12 23:34:12',NULL,NULL,NULL,NULL,'123456789',NULL,NULL,'cust_info//1607816052ccicust_comp_director_passport_copyScreenshot from 2020-11-05 01-03-54.png',NULL,'{\"form_1\":\"cust_info\\/27\\/1607816052view_list.xlsx\",\"form_2\":\"cust_info\\/27\\/1607816052view_list.xlsx\"}',10,1,4,NULL,NULL,NULL,NULL,NULL,NULL,'yur'),(20,'uz',NULL,15,1,'Intex',NULL,NULL,'orders/15/1608026213ccicust_comp_gov_registration_copy1607808002litsenziya.png','2020-12-15 09:56:53',NULL,NULL,NULL,NULL,'123123123',NULL,NULL,'orders/15/1608026213ccicust_comp_director_passport_copy1607808002litsenziya.png',NULL,'{\"form_1\":\"orders\\/15\\/1608026213form_11607808002litsenziya.png\",\"form_2\":\"orders\\/15\\/1608026213form_21607808002litsenziya.png\"}',2020,1,4,'Jamshid','II12312312','Toshkent IIB','Yunusobod',NULL,NULL,'fiz'),(21,'uz',28,16,1,'Intex',NULL,NULL,'orders/16/1608026866ccicust_comp_gov_registration_copy1607808002litsenziya.png','2020-12-15 10:07:46',NULL,NULL,NULL,NULL,'123123123',NULL,NULL,'orders/16/1608026866ccicust_comp_director_passport_copy1607808002litsenziya.png',NULL,'{\"form_1\":\"orders\\/16\\/1608026866form_11607808002litsenziya.png\",\"form_2\":\"orders\\/16\\/1608026866form_21607808002litsenziya.png\"}',2020,1,4,'Jamshid','AA12312312','Yunusobod IIB','Tashkent city',NULL,NULL,'fiz'),(22,'uz',29,17,1,'Inter Rohat',NULL,NULL,'orders/17/1608030809ccicust_comp_gov_registration_copy1607808002litsenziya.png','2020-12-15 11:13:29',NULL,NULL,NULL,NULL,'123123123',NULL,NULL,'orders/17/1608030809ccicust_comp_director_passport_copy1607808002litsenziya.png',NULL,'{\"form_1\":\"orders\\/17\\/1608030809form_11607808002litsenziya.png\",\"form_2\":\"orders\\/17\\/1608030809form_21607808002litsenziya.png\"}',2020,1,4,'Jamshid','AA12312312','Yunusobod IIB','Tashkent city',NULL,NULL,'fiz'),(30,'uz',33,29,1,'Datagrid LLC',NULL,NULL,'orders/29/1608106782ccicust_comp_gov_registration_copy1607778669ccicust_comp_gov_registration_copyScreenshot from 2020-11-23 20-03-52(1).png','2020-12-16 08:19:42',NULL,NULL,NULL,NULL,'123456789',NULL,NULL,'orders/29/1608106782ccicust_comp_director_passport_copy1607778669ccicust_comp_gov_registration_copyScreenshot from 2020-11-23 20-03-52(1).png',NULL,'{\"form_1\":\"orders\\/29\\/1608106782form_1view_list.xlsx\",\"form_2\":\"orders\\/29\\/1608106782form_2view_list.xlsx\"}',2020,1,4,'Abdumalik','123456','Piskent','Piskent',NULL,NULL,'fiz');
/*!40000 ALTER TABLE `cust_comp_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cust_info_use_case_map`
--

DROP TABLE IF EXISTS `cust_info_use_case_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cust_info_use_case_map` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `cust_info_id` int unsigned NOT NULL,
  `use_case_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `use_case_id` (`use_case_id`),
  KEY `cust_info_use_case_map_ibfk_1` (`cust_info_id`),
  CONSTRAINT `cust_info_use_case_map_ibfk_1` FOREIGN KEY (`cust_info_id`) REFERENCES `cust_comp_info` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cust_info_use_case_map_ibfk_2` FOREIGN KEY (`use_case_id`) REFERENCES `use_cases` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cust_info_use_case_map`
--

LOCK TABLES `cust_info_use_case_map` WRITE;
/*!40000 ALTER TABLE `cust_info_use_case_map` DISABLE KEYS */;
INSERT INTO `cust_info_use_case_map` VALUES (4,30,1),(5,30,2);
/*!40000 ALTER TABLE `cust_info_use_case_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documents` (
  `id` int unsigned NOT NULL,
  `cust_info_id` int unsigned NOT NULL,
  `name` text NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cust_info_id` (`cust_info_id`),
  CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`cust_info_id`) REFERENCES `cust_comp_info` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documents`
--

LOCK TABLES `documents` WRITE;
/*!40000 ALTER TABLE `documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `documents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(15,2) NOT NULL,
  `service_id` int unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `conclusion_id` int unsigned DEFAULT NULL,
  `status` enum('waiting','confirmed','inprocess') NOT NULL DEFAULT 'waiting',
  `closed_with` enum('transaction','bill') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `due_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `conclusion_id` (`conclusion_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `invoices_ibfk_3` FOREIGN KEY (`conclusion_id`) REFERENCES `conclusions` (`id`),
  CONSTRAINT `invoices_ibfk_4` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (2,500.00,1,7,15,'inprocess',NULL,'2020-12-12 19:50:33',NULL),(3,1.00,1,8,17,'waiting',NULL,'2020-12-12 20:50:28',NULL),(4,1.00,1,8,20,'waiting',NULL,'2020-12-12 21:18:05',NULL),(8,1100.00,1,7,28,'waiting',NULL,'2020-12-15 11:18:16',NULL),(9,1100.00,1,7,29,'inprocess',NULL,'2020-12-15 11:30:50',NULL),(10,1100.00,1,7,32,'waiting',NULL,'2020-12-15 12:30:22',NULL);
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `auditor_id` bigint unsigned DEFAULT NULL,
  `phone` varchar(12) NOT NULL,
  `address_to_deliver` text NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `message` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `auditor_id` (`auditor_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`auditor_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (12,7,4,'998978775028','Toshkent viloyati Piskent tuman',8,'Xulosa yoqmadi','2020-12-12 14:17:41'),(13,7,4,'998978775028','Toshkent viloyati Piskent tuman',7,NULL,'2020-12-12 17:36:07'),(14,7,43,'998978775028','Toshkent viloyati Piskent tuman',7,NULL,'2020-12-12 23:04:01'),(15,7,4,'998971112233','Yunusobod',4,NULL,'2020-12-15 09:56:53'),(16,7,4,'998971112233','13-block 1-house 18-flat',7,NULL,'2020-12-15 10:07:46'),(17,7,4,'998971112233','Nazarbek',7,NULL,'2020-12-15 11:13:29'),(29,7,4,'998978775028','Toshkent viloyati Piskent tuman',7,NULL,'2020-12-16 08:19:42');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `service_name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `price` float NOT NULL,
  `template_id` int unsigned NOT NULL,
  `user_groups` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `template_id` (`template_id`),
  KEY `user_groups` (`user_groups`),
  CONSTRAINT `services_ibfk_1` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`),
  CONSTRAINT `services_ibfk_2` FOREIGN KEY (`user_groups`) REFERENCES `user_groups` (`id`),
  CONSTRAINT `services_chk_1` CHECK (json_valid(`service_name`))
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'{\"uz\":\"80chi standard bo\'yicha xulosa\",\"ru\":\"zaklyucheniya po standardu 80\"}',1100,1,4),(3,'{\"uz\":\"80chi standard bo\'yicha xulosa\",\"ru\":\"zaklyucheniya po standardu 80\"}',1100,1,3);
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('1Ap1bU8Oahaojbeqwrber35LsE4Me45Iv5QlxB9P',NULL,'91.241.19.84','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRG1CY21WcXdYanV0VkMySVRnanJZREk2RzVNYU4yMmpaaUF2eHdHdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTQ6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My8/YT1mZXRjaCZjb250ZW50PSUzQ3BocCUzRWRpZSUyOCU0MG1kNSUyOEhlbGxvVGhpbmtDTUYlMjklMjklM0MlMkZwaHAlM0UiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608314081),('3L3mzqeKBdNI68ssrYFiouBMKwb0QN0pdFdC2ttp',NULL,'118.123.247.233','Mozilla/5.0 (Windows; U; Windows NT 6.0;en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkFzbjN1Nm55TzBQemtVM3laOUNZbjNnaUhWcGtPTzcyeFRSWjdBNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My9UUC9wdWJsaWMvaW5kZXgucGhwL2xvZ2luP2w9dXoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608278078),('6VI1NXn2CBwaxIIe6KXfuITHhdl8P13p5pR4byDb',NULL,'167.99.245.91','Mozilla/5.0 zgrab/0.x','YTozOntzOjY6Il90b2tlbiI7czo0MDoibVBZMWlTdzFmQktjVjVCcXpjeHkybHBxcmpza2tZaWlpVE1NZDdJVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608319439),('7nEit7Mo9XYbeMLpVVDRAr4oYGKjeLWn1yzOQNm5',NULL,'162.142.125.53','','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNW9SbXhFc3pwN0g0SGpwNHg1S2lKOE9KSVdQcjdDSXpxdVRvOFV1TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608316296),('AjmI2m6dDq5O74gL9SpCys5mUNcr6jHGYXHGIgWP',NULL,'198.20.124.218','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiR3RmVE1aNlBBS2xBc3VHRUhRT0wzUzdyTlIyRDF0Nk5hNDBEZ0ZPYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608329224),('C2EhAHi1gJZ3CSWByAHxFTFWAUs30noKGLBbODKR',NULL,'118.123.247.233','Mozilla/5.0 (Windows; U; Windows NT 6.0;en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjdkbXBmYXlrZVFBbjZQak93Y1psMXU5dW5iYnNzUmMxMXo3RGxGUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My9UUC9wdWJsaWMvaW5kZXgucGhwL2xvZ2luP2w9dXoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608278079),('dTUKvyFJDDrGLnqxPMYqDVAutwlyJajdbwhTIgYz',NULL,'91.241.19.84','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUTZDenZYcGxIVjVZRE9xMmp3dFBXNmNINWltMDRjbTJwZ3BvWGRrdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My9sb2dpbj9sPXV6Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1608314082),('EiKB5ncwlf3AYeiDIu3jyxPWfjs6gmvJ93OYBnDT',NULL,'91.241.19.84','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFdVaG1vNTFjS2hldW11cEJoZ3VDQkJKRXBMUHBkUXNVcUlXRm95ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My8/WERFQlVHX1NFU1NJT05fU1RBUlQ9cGhwc3Rvcm0iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608314081),('fKWJOlSZuI2xc9qEG1ftxKN6MAJa4dJzVyZXht5X',NULL,'45.95.169.227','Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:76.0) Gecko/20100101 Firefox/76.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoicVB5bTFBVGVMdXVld2lBcW9GWEZrN3NLcldTNUEzWkp6VDA4TTh6RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608280527),('G11cqsjOhpDuvRq1avF1RQkQuHacgk7J7F7rFmJd',NULL,'200.73.127.7','Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaEtJVU1veG9zUEs2VzNtVzVtM0FmZ3BOZHlQelBxZkNOMnJLTzRmaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608277803),('gqQmz8vRx6YrmMf0d5KCzgMWzyBw2FEHXxOY2qOm',NULL,'167.99.245.91','Mozilla/5.0 zgrab/0.x','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFpna3hjb3Vua3ZBelJEU1V6UDR6WklRZUE4S05JV1pHVGphamJjTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My9sb2dpbj9sPXV6Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1608319439),('HoafyY9OyLL7uSpUkXHgYMZVNELiYheojKu2zgec',NULL,'91.241.19.84','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUll2MmVEYTIyVXprdUxudjVFWjRvTkJlekF1WHdkdVhZOXpLSzE3dCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDk6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My9wdWJsaWMvaW5kZXgucGhwL2xvZ2luP2w9dXoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608314083),('HQP7JkpRhkCMq8X5DBwd0qEkRG1iaPQCvigOeEU6',NULL,'118.123.247.233','Mozilla/5.0 (Windows; U; Windows NT 6.0;en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6)','YTozOntzOjY6Il90b2tlbiI7czo0MDoidWdsUWQ5aHlFa2tQOExmVWx1VnlJZnV2ZGY0QWF3SUxGcktnbnAxVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTU0OiJodHRwOi8vMTA0LjI0OC4xNDMuOTMvVFAvcHVibGljL2luZGV4LnBocD9mdW5jdGlvbj1jYWxsX3VzZXJfZnVuY19hcnJheSZzPWluZGV4JTJGJTVDdGhpbmslNUNhcHAlMkZpbnZva2VmdW5jdGlvbiZ2YXJzJTVCMCU1RD1waHBpbmZvJnZhcnMlNUIxJTVEJTVCMCU1RD0xIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1608278078),('HuNJqQg9zfvrGWIcYdvlvS20OUwpfbCef4CmrZFx',NULL,'131.100.83.237','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/601.7.7 (KHTML, like Gecko) Version/9.1.2 Safari/601.7.7','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXphNE40cVZ4TnFBcEtaaHpJQjA0YTQ4NHBRRU0zWTB1dTVCTUxZeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608287225),('HYBazYBvfNWEFCIlhPRLZYL2brLPe1obnW4NSjW5',NULL,'85.172.10.110','masscan/1.0 (https://github.com/robertdavidgraham/masscan)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGxRRHE5YVFIaGlQVjJEMHhnVGlZTWdUOUwzZUg0a0ljb1F0dDRqUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly8xMjcuMC4xLjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608303890),('IHM4I5oyPTIEj0iXH8gAz8N7zkh72VNRSJI8vsEo',NULL,'118.123.247.233','Mozilla/5.0 (Windows; U; Windows NT 6.0;en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ0hmc0FSRGpXM0xGYklEZDlCN3V4WGwxcmZoWlZMREdYZVlvdkhFcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608278080),('irEv2ykK6RtEggoolxVZMDvUvfTkX64EEnAEG953',NULL,'194.246.113.230','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoicVByY0NCUjVDaGhLRUJpVEpLVWlYOHZMUjVvaVcyVVdlRjBYU3VmTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608331084),('jtHRUybRHxNhLjx1udnXjJHeUCO9bcFBGAlFUvLx',30,'213.230.77.238','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36','YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVTNJQnlRZHFhbmE2ckFiTjRzWEt2bHJ4RG4wMHU0SklUUXFZUVFaUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9lLWF1ZGl0LnV6L3V6L2FkbWluL29yZGVycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjMwO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWWZ2M3RtdnNSVERrRUxqQzQzOFo3dUcuQ01iejh4Z01scGZqVWdGdlZNLjMweFNLWnA5N1MiO30=',1608319243),('KbWa77nXFlXvruL9SjaDzHp2KSdyv4EgilUywgUQ',NULL,'198.20.124.218','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.113 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNW41RzFLbTJJM09EbG4zQ0pLRmxOZmRkaEhXZGY4UUkwcTVMcUs5WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My9sb2dpbj9sPXV6Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1608329224),('KFLY3Ny8Lp5Btv06U8Rern7HbExQDHMBrds6oNvz',NULL,'196.52.43.53','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3602.2 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZHdERGp0WHpGcFNRdWxUcVh0a3ViYmFQbXNlZXhlaUVvTjB6eEd0SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608266109),('L0H0GwQhPg1q4QR0toDLCcRNG9Lqhwu6u2pqWm11',NULL,'51.254.75.176','masscan/1.0 (https://github.com/robertdavidgraham/masscan)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiSENVNVJEbXFYNGhDV1pReDlVWjZPb2J3NU1HaXRTdmV0ZjU2aGlEciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly8xMjcuMC4xLjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608327222),('LT0ToYgV94mLrIpeYjcKy4G8bFmTTL2Tny0OhZnT',NULL,'196.52.43.131','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3602.2 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMjRTaXhyWEpXaTB5WDVnejU0VE1IeTJZRUpuc3RvYks5anAxY2VvdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly8xMjcuMC4xLjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608326833),('M1HgeDT1auc0Ak8Ky1xmSjLxR53UofzVWK37o2uJ',NULL,'118.123.247.233','Mozilla/5.0 (Windows; U; Windows NT 6.0;en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGFGalFzdmFHZlFscEZackdvNVE4SDlSOHBRR1dSclBsWEFYRWo3NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My9sb2dpbj9sPXV6Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1608278080),('M4j1t4r3iZwtcQIIChL5a0nGBg9osBrN6N04yeNX',NULL,'162.142.125.53','Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiY09SWDRNME9mRG90UDdLUXdOVHVPOWtVaDQweDNVY1h3OE5EQlZ3ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608316296),('nRiLM9dHiLeh1Ruyqkj93G9ICfkkjBx3smziv0zS',NULL,'91.241.19.84','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ2ZYZk1nOTAzcDUyRXU0aW9RNW94U1JSNnJXTXEwT3lXNEkxMEFaNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My9sb2dpbj9sPXV6Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1608314082),('NYj84ZuW9LZLK3faIXWqKdpCGqKBxlxGkYJbB0jY',NULL,'118.123.247.233','Mozilla/5.0 (Windows; U; Windows NT 6.0;en-US; rv:1.9.2) Gecko/20100115 Firefox/3.6)','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTWI1NWplUGFySzNHbnVxWGk0S3hrcUdvNHNMMXhDSW0wZVRHTW95UyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My9UUC9wdWJsaWMvaW5kZXgucGhwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1608278077),('OYm8n8vnkv7mwtf3VO3ejjvMVn2R9WMGKRk47f5f',NULL,'196.52.43.53','Go http package','YTozOntzOjY6Il90b2tlbiI7czo0MDoieGI3aTZRZjFQNUhiTUVVeVdIa1NXZFl5eFhoaXZINjFBd05CYUdQeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My9sb2dpbj9sPXV6Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1608266109),('tXJxTX4g2ux6oIrtA7Xb4ReXG8xsVBcBV647UfAl',NULL,'162.142.125.53','Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)','YTozOntzOjY6Il90b2tlbiI7czo0MDoibjcyM2VHOUpoNXhBdk5Zek54QVZ0NGtqaDJTQVhKdno4Y2J3Qk15NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMDQuMjQ4LjE0My45My9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608316296),('WK6qdKexFoLvU08tcvmxm9KM2lWLWFhljj0R9LDW',NULL,'59.126.177.25','Mozilla/5.0','YTozOntzOjY6Il90b2tlbiI7czo0MDoic1lQMVhpZGFranNMMm9xQVJsbGc0Q3N5YU1ybXZBNkpUNEdqcmhVYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY6Imh0dHA6Ly8xMjcuMC4wLjEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1608265681),('yoRYXW6hHxHvyg3cnWop3BIIgooCmQA4vatozVdU',NULL,'86.122.207.215','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/52.0.2743.116 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXZsRDFxU3VFcGx4U2ZJNkFyRGtaVndiQ25uR0w3T2tEVklxSTlVSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608261732),('YxalUbEzRskJWFMkIHhjE42JueH9IGzOc6sHzX6S',NULL,'194.53.179.251','Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMEk5dkhNb2dKc2F6WkpSZHVxNmdzSzlHVHdQeUpycDFJazduU3dtZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMDQuMjQ4LjE0My45MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608261653),('yxaYGsxcutOAof1oT7iTGgEIOMxZqfXYAPy1gdsR',NULL,'91.241.19.84','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWt4UHhObmxNbXlndDZMVmdzRnlibW9hdGVaZkNWSVpuYlVSTDl6VCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTY0OiJodHRwOi8vMTA0LjI0OC4xNDMuOTMvcHVibGljL2luZGV4LnBocD9mdW5jdGlvbj1jYWxsX3VzZXJfZnVuY19hcnJheSZzPSUyRkluZGV4JTJGJTVDdGhpbmslNUNhcHAlMkZpbnZva2VmdW5jdGlvbiZ2YXJzJTVCMCU1RD1tZDUmdmFycyU1QjElNUQlNUIwJTVEPUhlbGxvVGhpbmtQSFAyMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1608314082);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `alias` varchar(128) NOT NULL,
  `ru` varchar(128) NOT NULL,
  `oz` varchar(128) NOT NULL,
  `uz` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=267 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'list_services','Сервисы','Servislar','Сервислар'),(2,'title','Hазвание','Nomi','Номи'),(3,'price','Цена','Narxi','Нархи'),(4,'yearly','Годовой','Yillik','Йиллик'),(5,'payment_type','Тип платежа','To\'lov turi','Тўлов тури'),(6,'perechislenie','Банковский перевод','Pul o\'tkazish','Пул ўтказиш'),(7,'others','click, payme или наличными','click, payme yoki naxt','click, payme ёки нахт'),(8,'check_all','Выбрать все','Barchasini belgilash','Барчасини белгилаш'),(9,'cust_comp_gov_registration_copy','Копия свидетельства компании','Korxona guvohnomasining nusxasi','Корхона гувоҳномасининг нусхаси'),(10,'cust_comp_director_passport_copy','Копия паспорта директора','Direktor passport nusxasi','Директор паспорт нусхаси'),(11,'quantity','Количество','Miqdori','Миқдори'),(12,'audit_comp_name','Название аудиторской компании','Auditorlik Kompaniyasi nomi','Аудиторлик Компанияси номи'),(13,'audit_comp_gov_reg_date','Дата регистрации Аудиторской компании','Auditorlik Kompaniyasi ro\'yhatdan o\'tgan sanasi','Аудиторлик Компанияси рўйҳатдан ўтган санаси'),(14,'audit_comp_oked','ОКEД','OKED','ОКEД'),(15,'audit_comp_lic_date','Дата выдачи Сертификатa','Sertifikat berilgan sana','Сертификат берилган сана'),(16,'audit_comp_bank_acc','Банковский счет','Bank hisob raqami','Банк ҳисоб рақами'),(17,'audit_comp_director_name','Ф.И.О Директорa','Direktor F.I.O.','Директор Ф.И.О.'),(18,'audit_comp_director_cert_date','Дата выдачи лицензии директора','Direktor litsenziyasi berilgan sanasi','Директор лицензияси берилган санаси'),(19,'audit_comp_gov_reg_num','Номер регистрации аудиторской компании','Auditorlik Kompaniyasi ro\'yhatdan o\'tgan raqami','Аудиторлик Компанияси рўйҳатдан ўтган рақами'),(20,'audit_comp_inn','ИНН Компании','Kompaniya INNsi','Компания ИННси'),(21,'audit_comp_lic','Номер лицензии компании','Kompaniya litsenziya raqami','Компания лицензия рақами'),(22,'audit_comp_director_cert_num','Номер лицензии директора аудиторской компании','Audit kompaniyasi direktori litsenziya raqami','Аудит компанияси директори лицензия рақами рақами'),(23,'audit_comp_bank_name','Hазвание банка','Bank nomi','Банк номи'),(24,'audit_comp_bank_mfo','МФО','MFO','МФО'),(25,'audit_comp_info','Реквизиты аудиторской компании','Auditorlik Kompaniyasi ma\'lumotlari','Аудиторлик Компанияси маъумотлари'),(26,'create_blanks','Создать бланк','Blanka yaratish','Бланка Яратиш'),(27,'assign_blanks','Назначить бланк','Blankani biriktirirsh','Бланкани бириктирирш'),(28,'please_try_again','Пожалуйста, попробуйте еще раз','Iltimos yana urinib ko\'ring','Илтимос яна уриниб кўринг'),(29,'passport_number','Серия и номер паспорта','Passport seriyasi va nomeri','Пасспорт серияси ва номериг'),(30,'region','Область','Viloyat','Вилоят'),(31,'year','Год','Yil','Йил'),(32,'quarter_start','Начальный квартал','Boshlang\'ich kvartal','Бошланғич квартал'),(33,'quarter_finish','Завершающий квартал','Tugallovchi kvartal','Тугалловчи квартал'),(34,'reject','Отклонить','Inkor qilish','Инкор қилиш'),(35,'cust_comp_name','Имя компания','Kompaniya nomi','Компания номи'),(36,'finished','Законченныe','Bajarilgan buyurtmalar','Бажарилган буюртмалар'),(37,'draft','Сохранить','Saqlash','Сақлаш'),(38,'rejected','Отклоненные','Inkor etilgan','Инкор этилган'),(39,'sent','посланный','Jo\'natilgan','Жўнатилган'),(40,'sentToAdmin','отправлено админу','adminga jo\'natilgan','админга жўнатилган'),(41,'accept_and_pay','Принять и оплатить','Qabul qilish va to\'lash','Қабул қилиш ва тўлаш'),(42,'pay','ОПЛАТИТЬ','To\'lash','Тўлаш'),(43,'already_accepted','Вы уже приняли заключение','Siz allaqachon xulosani qabul qilgansiz','Сиз аллақачон хулосани қабул қилгансиз'),(44,'accepted','принято','qabul qilingan','қабул қилинган'),(45,'cancel','назад','Ortga qaytish','Ортга қайтиш'),(46,'fucking_reason','Причина','Sabab','Сабаб'),(47,'type_fucking_reason','Введите причину, по которой вы отклоняете заключение.','Iltimos, xulosani rad etish sababini yozing.','Илтимос, хулосани рад этиш сабабини ёзинг.'),(48,'anything','anything','anything','anything'),(49,'welcome','Добро пожаловать','Xush kelibsiz','Хуш келибсиз'),(50,'registered','Уже зарегистрированы?','Siz ro\'yxatdan o\'tganmisiz?','Сиз рўйхатдан ўтганмисиз?'),(51,'login','Войти','Kirish','Кириш'),(52,'user','Клиент','Mijoz','Мижоз'),(53,'customer','Клиент','Mijoz','Мижоз'),(54,'agent','Агент','Agent','Агент'),(55,'asUser','Зарегистрируйтесь как клиент','Mijoz sifatida ro\'yhatdan o\'tish','Мижоз сифатида рўйҳатдан ўтиш'),(56,'createUser','Создать пользователя','Foydalanuvchi yaratish','Фойдаланувчи яратиш'),(57,'name','Имя','Ism','Исм'),(58,'surname','Фамилия','Familiya','Фамилия'),(59,'patronymic','Отчество','Otangizni ismi','Отангизни исми'),(60,'userPatronymic','Отчество','Otansining ismi','Отасининг исми'),(61,'phoneNumber','Телефонный номер','Telefon raqamingiz','Телефон рақамингиз'),(62,'verificationCode','Ваш проверочный код','Tasdiqlash kodi','Тасдиқлаш коди'),(63,'sendConfirmation','Отправить подтверждение','Tasdiqlash uchun yuborish','Тасдиқлаш учун юбориш'),(64,'anotherPhoneNumber','Номер телефона','Telefon raqami','Телефон рақами'),(65,'phone','Номер телефона','Telefon raqami','Телефон рақами'),(66,'password','Парол','Parol','Парол'),(67,'register','Регистрация','Ro\'yxatdan o\'tish','Рўйхатдан ўтиш'),(68,'restorePassword','Восстановить пароль','Parolni tiklash','Паролни тиклаш'),(69,'asAgent','Зарегистрируйтесь как клиент','Mijoz sifatida ro\'yhatdan o\'tish','Мижоз сифатида рўйҳатдан ўтиш'),(70,'passportCopy','Паспорт копия','Pasport nusxasi','Паспорт нусхаси'),(71,'upload','Загрузить','Yuklash','Юклаш'),(72,'inn','ИНН','INN','ИНН'),(73,'cust_comp_inn','Предприятие ИНН','Korxona INNsi','Korxona INNsi'),(74,'auditCompInn','ИНН аудиторской компании','Auditorlik korxonasining INNsi','Аудиторлик корхонасининг ИННси'),(75,'custCompInn','ИНН компании клиента','Mijoz korxonasining INNsi','Мижоз корхонасининг ИННси'),(76,'auditCompOked','ОКЭД аудиторской компании','Auditorlik korxonasining OKEDi','Аудиторлик корхонасининг ОКEДи'),(77,'custCompOked','ОКЭД компании клиента','Mijoz korxonasining OKEDi','Мижоз корхонасининг ОКEДи'),(78,'auditCompLicense','Номер Лицензии Аудиторской Компании','Audit korxonasining litsenziya raqami','Аудит корхонасининг лицензия рақами'),(79,'auditCompLicenseDate','Дата регистрации лицензии аудиторской компании','Audit korxonasining litsenziyasi ro\'yxatdan o\'tgan sanasi','Аудит корхонасининг лицензияси рўйхатдан ўтган санаси'),(80,'auditCompName','Наименование аудиторской компании','Audit korxonasining nomi','Аудит корхонасининг номи'),(81,'auditCompBank','Наименование банка аудиторской компании','Audit korxonasining bank nomi','Аудит корхонасининг банк номи'),(82,'custCompBank','Название банка компании клиента','Mijoz korxonasining bank nomi','Мижоз корхонасининг банк номи'),(83,'auditCompBankAccount','Банковский счет аудиторской компании','Audit korxonasining bank hisob raqami','Аудит корхонасининг банк ҳисоб рақами'),(84,'auditCompBankMfo','МФО Банка аудиторской компании','Audit korxonasining bank MFOsi','Аудит корхонасининг банк МФОси'),(85,'custCompBankMfo','Банковский МФО компании клиента','Mijoz korxonasining bank MFOsi','Мижоз корхонасининг банк МФОси'),(86,'auditCompDirector','Ф.И.О директора аудиторской компании','Audit korxonasining direkotori F.I.Osi','Аудит корхонасининг дирекотори Ф.И.Оси'),(87,'auditCompDirectorLicenseNum','Номер сертификата директора аудиторской компании','Audit korxonasi direkotorining sertifikat raqami','Аудит корхонаси дирекоторининг сертификат рақами'),(88,'auditCompDirectorLicenseDate','Дата сертификата директора аудиторской компании','Audit korxonasi direkotorining sertifikat berilgan sanasi','Аудит корхонаси дирекоторининг сертификат берилган санаси'),(89,'custCompDirector','Ф.И.О Директора Компании Клиента','Mijoz korxonasining direkotori F.I.Osi','Мижоз корхонасининг дирекотори Ф.И.Оси'),(90,'custCompActivity','Деятельность Компании-Заказчика','Mijoz kompaniyasining faoliyati','Мижоз компаниясининг фаолияти'),(91,'requiredDocs','Необходимые документы','Kerakli hujjatlar','Керакли ҳужжатлар'),(92,'auditCompGovNumber','Государственный Регистрационный Номер Аудиторской Компании','Auditorlik korxonasining davlat ro\'yxatidan o\'tgan raqami','Аудиторлик корхонасининг давлат рўйхатидан ўтган рақами'),(93,'sertificateNumber','Номер сертификата','Sertifikat raqami','Сертификат рақами'),(94,'sertificateSerie','Серия сертификата','Sertifikat seriyasi','Сертификат серияси'),(95,'city','Регион','Shaxar','Шахар'),(96,'district','Район','Tuman','Туман'),(97,'address','Адрес','Manzil','Манзил'),(98,'address_to_deliver','Адрес','Manzil','Манзил'),(99,'cust_comp_address','Адрес','Manzil','Манзил'),(100,'deliverAddress','Адрес для доставки','Yetkazib berish manzili','Етказиб бериш манзили'),(101,'custCompAddress','Адрес Компании Клиента','Mijoz korxonasi manzili','Мижоз корхонаси манзили'),(102,'agree','Согласен','Roziman','Розиман'),(103,'htmlLang','ru','uz','uz'),(104,'lang','Язык','Til','Тил'),(105,'users','Пользователи','Foydalanuvchilar','Фойдаланувчилар'),(106,'orders','Заказы','Buyurtmalar','Буюртмалар'),(107,'order','Заказ','Buyurtma','Буюртма'),(108,'conclusions','Заключении','Xulosalar','Хулосалар'),(109,'newConclusion','Создать Заключении','Xulosa yaratish','Хулоса яратиш'),(110,'conclusion','Заключение','Xulosa','Хулоса'),(111,'adminPanel','Панель администратора','Administrator paneli','Администратор панели'),(112,'logout','Выйти','Chiqish','Чиқиш'),(113,'mchj','OOO','MCHJ','МЧЖ'),(114,'sidebarBg','Фон боковой панели','Yon panel foni','Ён панел фони'),(115,'light','Белый','Oq','Оқ'),(116,'dark','Темно','Qora','Қора'),(117,'fio','Ф.И.О','F.I.O','Ф.И.О'),(118,'role','Роль','Rol','Рол'),(119,'admin','Aдмин','Admin','Aдмин'),(120,'auditor','Аудитор','Auditor','Аудитор'),(121,'search','Поиск','Qidiruv','Қидирув'),(122,'create','Создать','Yaratish','Яратиш'),(123,'id','Ид','ID','Ид'),(124,'fund','СУММА ДЕНЕГ','PUL MIQDORI','ПУЛ МИҚДОРИ'),(125,'show','ПОКАЗАТЬ','Ko\'rish','Кўриш'),(126,'showConclusion','ПОСМОТРЕТЬ ЗАКЛЮЧЕНИЕ','Xulosani ko\'rish','Хулосани кўриш'),(127,'standartNumber','СТАНДАРТНЫЙ НОМЕР ШАБЛОНА','SHABLON STANDART RAQAMI','ШАБЛОН СТАНДАРТ РАҚАМИ'),(128,'message','сообщение','xabar','xaбaр'),(129,'status','СТАТУС','HOLATI','ҲОЛАТИ'),(130,'active','Активный','Faol','Фаол'),(131,'inactive','Неактивный','Nofaol','Нофаол'),(132,'userAgrement','Условия использования политика конфиденциальности','Sistemadan foydalanish shartlari','Системадан фойдаланиш шартлари'),(133,'enterCode','Пожалуйста, введите проверочный код','Iltimos, tasdiqlash kodini kiriting','Илтимос, тасдиқлаш кодини киритинг'),(134,'cust_comp_activity','Директор предприятие','Korxona direktori','Корхона директори'),(135,'createdDate','ДАТА СОЗДАНИЯ','Yaratilgan sanasi','Яратилган санаси'),(136,'created','Создан','Yaratilgan','Яратилган'),(137,'created_at','ДАТА СОЗДАНИЯ','Yaratilgan sanasi','Яратилган санаси'),(138,'bill','Счет','Hisob','Ҳисоб'),(139,'myConclusions','Мои заключены','Mening Xulosalarim','Мени хулосаларим'),(140,'auditorPanel','ПАНЕЛЬ аудиторa','Auditor paneli','Аудитор панели'),(141,'agentPanel','Агент панель','Agent paneli','Агент панели'),(142,'customerPanel','Панель клиента','Mijoz paneli','Мижоз панели'),(143,'useCases','ВАРИАНТ ИСПОЛЬЗОВАНИЯ','Foydalanish turi','Фойдаланиш тури'),(144,'date','ДАТА','Sana','Сана'),(145,'activity','ДЕЙСТВИЯ','Operatsiyalar','Операциялар'),(146,'send','Отправить','Jo\'natish','Жўнатиш'),(147,'myOrders','Мои заказы','Mening buyurtmalarim','Менинг буюртмаларим'),(148,'template','ШАБЛОН','Shablon','ШАБЛОН'),(149,'templateNum','Номер шаблона','Shablon raqami','Шаблон рақами'),(150,'forWhat','Для чего?','Nima uchun?','Нима учун?'),(151,'for','Для','Nima uchun','Нима учун'),(152,'details','Подробности','Tafsilotlar','Тафсилотлар'),(153,'orderDetails','Информация о заказе','Buyurtma haqida ma\'lumot','Буюртма ҳақида маълумот'),(154,'clientInfo','Информация о клиенте','Mijoz haqida ma\'lumot','Мижоз ҳақида маълумот'),(155,'passportSeries','Паспортная серия','Pasport seriya','Паспорт серия'),(156,'cust_comp_gov_reg_date','Дата регистрации','Ro\'yxatdan o\'tgan sanasi','Рўйхатдан ўтган санаси'),(157,'cust_comp_bank_name','Банк','Bank','Банк'),(158,'cust_comp_bank_acc','Банковский счет компании клиента','Mijoz korxonasining bank hisobvarag\'i','Мижоз корхонасининг банк ҳисобварағи'),(159,'cust_comp_bank_mfo','Банк МФО','Bank MFO','Банк МФО'),(160,'cust_comp_oked','ОКЕД','OKED','ОКЕД'),(161,'cust_comp_director_name','Директор предприятие','Korxona direktori','Корхона директори'),(162,'write_conc_for_this','Напишите заключение на основании этого приказа','Ushbu buyurtma asosida xulosa yozish','Ушбу буюртма асосида хулоса ёзинг'),(163,'cust_comp_gov_reg_num','Государственный регистрационный номер компании заказчика','Mijoz korxonasining davlat ro\'yxatidan o\'tkgan raqami','Мижоз корхонасининг давлат рўйхатидан ўткган рақами'),(164,'Форма 1','Форма 1','Forma 1','Форма 1'),(165,'Форма 2','Форма 2','Forma 2','Форма 2'),(166,'Forma 1','Форма 1','Forma 1','Форма 1'),(167,'Forma 2','Форма 2','Forma 2','Форма 2'),(168,'newOrder','Новый заказ','Yangi buyurtma','Янги буюртма'),(169,'newPassword','Новый пароль','Yangi parol','Янги парол'),(170,'typeNewPassword','Введите новый пароль','Yangi parolni kiriting','Янги паролни киритинг'),(171,'basicInfo','Базовая информация','Asosiy malumotlar','Асосий малумотлар'),(172,'structuredPhone','Номер телефона, в виде 998971112233, без знака +','998971112233 shaklidagi telefon raqami, + belgisiz','998971112233 шаклидаги телефон рақами, + белгисиз'),(173,'sentOrder','Отправленные заказы','Jo\'natilgan buyurtma','Жўнатилган буюртма'),(174,'draftOrder','Черновики','Qoralamalar','Қораламалар'),(175,'recievedOrder','Полученные заключения','Qabul qlingan xulosalar','Қабул қлинган хулосалар'),(176,'rejectedOrders','Отклоненные заключения','Inkor qilingan xulosalar','Инкор қилинган хулосалар'),(177,'assign','Назначать','Biriktirmoq','Бириктирмоқ'),(178,'fillData','Пожалуйста, заполните данные пользователя','Iltimos, foydalanuvchi ma\'lumotlarini to\'ldiring','Илтимос, фойдаланувчи маълумотларини тўлдиринг'),(179,'certificateDate','Дата сертификата','Sertifikat berilgan sanasi','Сертификат берилган санаси'),(180,'addressLine','Улица / дом (квартира)','Ko\'cha / uy (kvartira)','Кўча / уй (квартира)'),(181,'save','Сохранить','Saqlash','Сақлаш'),(182,'select','Выбрать','Tanlash ','Танлаш'),(183,'selectTemplate','Пожалуйста, выберите шаблон','Iltimos, Shablonni tanlang','Илтимос, Шаблонни танланг'),(184,'templateUseCase','Пожалуйста, выберите вариант использования:','Iltimos, foydalanish turini tanlang:','Илтимос, фойдаланиш турини танланг:'),(185,'Tender','Тендер','Tender','Тендер'),(186,'Тендер','Тендер','Tender','Тендер'),(187,'Kredit','Кредит','Kredit','Кредит'),(188,'editProfile','Редактировать профиль','Profilni tahrirlash','Профилни таҳрирлаш'),(189,'moliyaviy hisobot bo\'yicha fikr','Заключение по финансовой отчетности','Moliyaviy hisobot bo\'yicha fikr','Молиявий ҳисобот бўйича фикр'),(190,'continue','Продолжать','Davom etish','Давом этиш'),(191,'mail','Адрес электронной почты','Elektron pochta manzili','Электрон почта манзили'),(192,'uz','Узбекский','O\'zbek','Ўзбек'),(193,'ru','Русский','Ruscha','Русча'),(194,'companyName','Наименование Компания','Korxona Nomi','Корхона Номи'),(195,'govRegDate','Дата государственной регистрации аудиторской компании','Auditorlik korxonasining davlat ro\'yxatidan o\'tkazilgan sanasi','Аудиторлик корхонасининг давлат рўйхатидан ўтказилган санаси'),(196,'userCompGovRegDate','Дата государственной регистрации компании заказчика','Mijoz korxonasining davlat ro\'yxatidan o\'tkazilgan sanasi','Мижоз корхонасининг давлат рўйхатидан ўтказилган санаси'),(197,'basicConclusions','Базовая заключения','Asosiy xulosa','Асосий хулоса'),(198,'next','Следующий','Keyingi','Кейинги'),(199,'previous','Предыдущий','Orqaga','Орқага'),(200,'saveDraft','Сохранить как черновик','Qoralama sifatida saqlash','Қоралама сифатида сақлаш'),(201,'saveAndSubmit','Сохранить и отправить','Saqlang va yuboring','Сақланг ва юборинг'),(202,'submit','Отправить','Jo\'natish','Жўнатиш'),(203,'custInfo','Информация о клиенте','Mijoz malumotlari','Мижоз малумотлари'),(204,'custCompInfo','Информация о компании клиента','Mijoz korxonasi haqida malumot','Мижоз корхонаси ҳақида малумот'),(205,'profile','Профиль','Profil','Профил'),(206,'cust_comp_registered_by','Зарегистрировано компанией (кто, что)','Kompaniya (kim, nima) tomonidan ro\'yhatga olingan ','Компания (ким, нима) томонидан рўйхатга олинган'),(207,'long_term_liabilities','Долгосрочные обязательства','Uzoq muddatli majburiyatlar','Узоқ муддатли мажбуриятлар'),(208,'current_actives','Текущие (оборотные) активы','Joriy (aylanma) aktivlar','Жорий (айланма) активлар'),(209,'current_obligation','Обязательства','Majburiyatlar','Мажбуриятлар'),(210,'long_term_actives','Долгосрочные активы','Uzoq muddatli aktivlar','Узоқ муддатли активлар'),(211,'sources_of_own_funds','Источники собственных средств','O\'z mablag\'lari manbalari','Ўз маблағлари манбалари'),(212,'long_term_loans','Долгосрочные займы и кредиты','Uzoq muddatli kreditlar va kreditlar','Узоқ муддатли кредитлар ва кредитлар'),(213,'user_funds','На счету: ','Hisobingizda: ','Ҳисобингизда: '),(214,'fill_balance',' Пополнить счет','Hisobingizni to\'ldiring','Ҳисобингизни тўлдиринг'),(215,'min_sum',' Минимальная сумма','Minimal summa','Минимал сумма'),(216,'max_sum','Максимальная сумма','Maksimal summa','Максимал сумма'),(217,'max_balance',' Максимальный баланс','Maksimal balans miqdori','Максимал баланс миқдори'),(218,'sum','сум','so\'m','сум'),(219,'available_systems','Доступные платежные системы для пополнения балансового счета','Balansni to\'ldirish uchun mavjud bo\'lgan to\'lov tizimlari','Балансни тўлдириш учун мавжуд бўлган тўлов тизимлари'),(220,'your_id','Ваш ID','Sizning ID','Сизнинг ИД'),(221,'conclusion_base','Основание заключения','Hulosa asosi','Ҳулоса асоси'),(222,'conclusions_on_order','Заключении по заказу','Buyurtma bo\'yicha hulosalar','Буюртма бўйича ҳулосалар'),(223,'assign_blank','Печатать на бланке','Blankaga chop etish','Бланкага чоп этиш'),(224,'no_blanks','У вас не осталось бланков','Sizda blankalar qolmadi','Сизда бланкалар қолмади'),(225,'close','Закрыть','Yopmoq','Ёпмоқ'),(226,'print_again','Перепечатать на бланк','Qayta chop etish','Қайта чоп этиш'),(227,'breaking_blank','Забраковать бланк','Blankani braklash','Бланкани браклаш'),(228,'aleady_active','Уже активен','Аллақачон фаол','Allaqachon faol'),(229,'Assign','Назначить','Biriktirish','Бириктириш'),(230,'edit','Редактировать','O\'zgartirish','Ўзгартириш'),(231,'Available Blanks','Доступные бланки','Mavjud blankalar','Мавжуд бланкалар'),(232,'show_user_c','Просмотр пользовательских выводов','Foydalanuvchi xulosalarini ko\'rish','Фойдаланувчи хулосаларини кўриш'),(233,'show_user_t','Просмотр пользовательских транзакций','Foydalanuvchi tranzaksiyalarini ko\'rish','Фойдаланувчи транзаксияларини кўриш'),(234,'add_funds','Пополнение баланса пользователя','Foydalanuvchi balansini to\'ldirish','Фойдаланувчи балансини тўлдириш'),(235,'list_blanks','Список бланки','Blankalar ro\'yhati','Бланкалар рўйҳати'),(236,'list_settings','Настройки','Sozlamalar','Созламалар'),(237,'contracts','Контракты','Shartnomalar','Шартномалар'),(238,'invoices','Счет-фактура','Taqdimnomalar','Тақдимномалар'),(239,'certificates','Сертификаты','Sertifikatlar','Сертификатлар'),(240,'rejected_blanks','Отмененные бланки','Bekor qilingan blankalar','Бекор қилинган бланкалар'),(241,'finish','Утверждение и завершение','Tasdiqlash va tugatish','Тасдиқлаш ва тугатиш'),(242,'Agent, Auditor','Агент, Аудитор','Agent, Auditor','Агент, Аудитор'),(243,'User type','Тип пользователя','Foydalanuvchi turi','Фойдаланувчи тури'),(244,'sent_to_admin','Отправлено администратору','Administratorga yuborilgan','Администраторга юборилган'),(245,'conclusion_id','Заключения id','Xulosa id','Хулоса ид'),(246,'print','Печать','Chop etish','Чоп етиш'),(247,'certificates_list','Список сертификатов','Sertifikatlar ro\'yhati','Сертификатлар рўйҳати'),(248,'sent','Отправлено','Yuborilgan','Юборилган'),(249,'update','Редактировать','O\'zgartirish','Ўзгартириш'),(250,'waiting_admin_accept','Администратор должен принять','Administrator tasdiqlashi kerak','Администратор тасдиқлаши керак'),(251,'resend','Повторно отправлять','Qayta yuborish','Қайта юбориш'),(252,'Payment System','Платежная Система','Тўлов Тизими','To\'lov tizimi'),(253,'Perform Time','Время Выполнения','Amalga oshirilgan vaqti','Амалга оширилган вақти'),(254,'initialized_conclusions','Вновь введенные выводы','Yangi kiritilgan xulosalar','Янги киритилган хулосалар'),(255,'sent_conclusions','Присланные выводы','Yuborilgan xulosalar','Юборилган хулосалар'),(256,'received_conclusions','Полученные выводы','Келиб тушган хулосалар','Kelib tushgan xulosalar'),(257,'received_admin_conclusions','Выводы, сделанные администратором','Admin tomonidan yuborilgan xulosalar','Admin томонидан юборилган хулосалар'),(258,'action','Действия','Amallar','Амаллар'),(259,'resent','Отправить снова','Qayta yuborish','Қайта юбориш'),(260,'done','Уже опубликовано','Allaqachon chop etilgan','Аллақачон чоп етилган'),(261,'confirmed','Проверено','Tasdiqlangan','Тасдиқланган'),(262,'finished','Законченный','Tugatilgan','Тугатилган'),(263,'in_progress','В процессе','Jarayonda','Жараёнда'),(264,'download','Скачать','Yuklab olish','Юклаб олиш'),(265,'finished_conclusions','Полностью завершенные выводы','To\'liq tugallangan xulosalar','Тўлиқ тугалланган хулосалар'),(266,'rejected_conclusions','Отверг выводы','Rad etilgan xulosalar','Рад етилган хулосалар');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `templates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `standart_num` text NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `templates_chk_1` CHECK (json_valid(`name`)),
  CONSTRAINT `templates_chk_2` CHECK (json_valid(`fields`))
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates`
--

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
INSERT INTO `templates` VALUES (1,'{\"uz\":\"«Махсус саволни текшириш натижалари бўйича                 аудитор ҳисоботи» АФМС\", \"ru\": \"\"}','[\r\n  {\r\n    \"label\":{\"uz\":\"Forma 1\",\"ru\":\"Форма 1\"},\r\n    \"description\":{\"uz\":\"Balanslar varaqasi\",\"ru\":\"Бухгалтерский баланс\"},\r\n    \"name\":\"form_1\",\r\n    \"tag\":\"input\",\r\n    \"type\":\"file\",\r\n    \"allowed_types\":\".xls,.xlsx,.pdf,.png,.jpg\",\r\n    \"mime_types\":\"xls,xlsx,pdf,png,jpg\"\r\n  },\r\n  {\r\n    \"label\":{\"uz\":\"Forma 2\",\"ru\":\"Форма 2\"},\r\n    \"description\":{\"uz\":\"Отчет о финансовых результатах\",\"ru\":\"Daromad jadvali\"},\r\n    \"name\":\"form_2\",\r\n    \"tag\":\"input\",\r\n    \"type\":\"file\",\r\n    \"allowed_types\":\".xls,.xlsx,.pdf,.png,.jpg\",\r\n    \"mime_types\":\"xls,xlsx,pdf,png,jpg\"\r\n  }\r\n]','80');
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int unsigned DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `payment_system` enum('click','payme','paynet','funds') DEFAULT NULL,
  `system_transaction_id` text NOT NULL,
  `state` enum('waiting','rejected','confirmed','cancelled','cancelled_after_confirmed') NOT NULL DEFAULT 'waiting',
  `error_code` tinyint DEFAULT NULL,
  `system_create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reason` text,
  `cancel_time` timestamp NULL DEFAULT NULL,
  `perform_time` timestamp NULL DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `bill_id` (`invoice_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,10,NULL,'payme','5fd8b0fc4ac2e2cf772c4c9a','confirmed',1,'2020-12-15 12:50:34',NULL,NULL,'2020-12-15 12:50:34',NULL,'2020-12-15 12:50:04'),(2,10,NULL,'payme','5fd8b31b4ac2e2cf772c4ca1','confirmed',1,'2020-12-15 12:59:23',NULL,NULL,'2020-12-15 12:59:23',NULL,'2020-12-15 12:59:07'),(3,10,NULL,'payme','5fd8baeb4ac2e2cf772c4ca6','confirmed',1,'2020-12-15 13:32:34',NULL,NULL,'2020-12-15 13:32:34',NULL,'2020-12-15 13:32:27'),(4,10,NULL,'payme','5fd8bd634ac2e2cf772c4cab','confirmed',1,'2020-12-15 13:43:07',NULL,NULL,'2020-12-15 13:43:07',NULL,'2020-12-15 13:42:59'),(5,10,NULL,'payme','5fd8be454ac2e2cf772c4cb0','confirmed',1,'2020-12-15 13:47:02',NULL,NULL,'2020-12-15 13:47:02',NULL,'2020-12-15 13:46:45'),(6,10,NULL,'payme','5fd8c2314ac2e2cf772c4cba','cancelled_after_confirmed',1,'2020-12-15 14:03:50','5','2020-12-15 14:03:50','2020-12-15 14:03:41',NULL,'2020-12-15 14:03:29'),(7,10,NULL,'payme','5fd8c4a24ac2e2cf772c4cc2','cancelled_after_confirmed',1,'2020-12-15 14:14:09','5','2020-12-15 14:14:09','2020-12-15 14:14:02',NULL,'2020-12-15 14:13:55'),(8,10,NULL,'payme','5fd98f024ac2e2cf772c4cec','cancelled_after_confirmed',1,'2020-12-16 04:37:32','5','2020-12-16 04:37:32','2020-12-16 04:37:28',NULL,'2020-12-16 04:37:23'),(9,2,NULL,'payme','5fd9d09d4ac2e2cf772c4d51','cancelled',1,'2020-12-16 09:17:24','3','2020-12-16 09:17:24',NULL,NULL,'2020-12-16 09:17:18');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `use_cases`
--

DROP TABLE IF EXISTS `use_cases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `use_cases` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `template_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `template_id` (`template_id`),
  CONSTRAINT `use_cases_ibfk_1` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`),
  CONSTRAINT `use_cases_chk_1` CHECK (json_valid(`title`))
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `use_cases`
--

LOCK TABLES `use_cases` WRITE;
/*!40000 ALTER TABLE `use_cases` DISABLE KEYS */;
INSERT INTO `use_cases` VALUES (1,'{\"uz\":\"Tender\",\"ru\":\"Тендер\"}',1),(2,'{\"uz\":\"Kredit\",\"ru\":\"Кредит\"}',1);
/*!40000 ALTER TABLE `use_cases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_groups`
--

LOCK TABLES `user_groups` WRITE;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;
INSERT INTO `user_groups` VALUES (1,'admin'),(2,'auditor'),(3,'agent'),(4,'customer');
/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `funds` float NOT NULL DEFAULT '0',
  `group_id` int unsigned NOT NULL,
  `phone` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `inn` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_number` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_copy` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cert_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cert_date` timestamp NULL DEFAULT NULL,
  `region` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `district` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone_number` (`phone`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `user_groups` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Torres Anais Andersen','Anais','Torres','Andersen',200000,2,'998903380866','123123123','test',NULL,'123321',NULL,NULL,NULL,NULL,'$2y$10$MCQbnlID3mJVd7xV2CVHqOzukJgwz4mvGxc7e9YuV29FkFpw.RFK2',NULL,NULL,NULL,NULL,NULL,'active','2020-10-22 03:02:15','2020-11-19 15:33:47'),(7,'Ritchie Guy Dunn','Guy','Ritchie','Dunn',0,4,'998977777777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'$2y$10$neD4G0HA1pikaS73pL9uzOwDM0cjvANWCnyN1ag7nyIB5LI7YmGPy',NULL,NULL,NULL,NULL,NULL,'active','2020-11-05 18:08:53','2020-11-29 16:02:26'),(8,'Park Helen Andersen','Helen','Park','Andersen',0,3,'998901112233','123456789','AA1111111','agents/WKo7Jn3ObUmmb37vJMi3ydfbkGCe5MW0ONdDMx9i.png',NULL,'2020-11-09 19:00:00','Tashkent','London','11 Brighton Beach','$2y$10$H.xxMnCBJ.s1ngw05rzRMe3l/yglJpN5REdUX5R4sqJ/sWiV6c1Be',NULL,NULL,NULL,NULL,NULL,'active','2020-11-05 18:14:10','2020-11-05 18:14:10'),(30,'Abduganiev Abdumalik Atxam o\'g\'li','Abdumalik','Abduganiev','Atxam o\'g\'li',0,1,'998978775028',NULL,NULL,'agents/MCGTt4Cs2uM4W1odnXkQ7AClrzzTtr05qvSV8WyU.txt','1234556','2020-11-02 19:00:00','Toshkent','Piskent','Navoi 23','$2y$10$Yfv3tmvsRTDkELjC438Z7uG.CMbz8xgMlpfjUgFvVM.30xSKZp97S',NULL,NULL,'nrOmLeaj3HBvRlA77l8l981jFB5nCBqGCIFKsVGfEwhkhj00HPFkGYPsCx3q',NULL,NULL,'inactive','2020-11-16 19:28:15','2020-11-27 22:39:03'),(43,'Sadayev Nurislom Chor o\'g\'li','Nurislom','Sadayev','Chor o\'g\'li',0,2,'998909729900',NULL,'AB6136163',NULL,'cwcwc',NULL,'Танлаш','Танлаш','89-uy','$2y$10$XuNmaaOjwrBTvzfh4chCY.ZRibiGR3K54CWyW6i0dy.loVAxnWtr2',NULL,NULL,NULL,NULL,NULL,'active','2020-12-12 18:08:48','2020-12-12 18:11:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallet_records`
--

DROP TABLE IF EXISTS `wallet_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wallet_records` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `amount` float NOT NULL,
  `payment_sys` enum('payme','click','paynet','bank_transfer','cash') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `wallet_records_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallet_records`
--

LOCK TABLES `wallet_records` WRITE;
/*!40000 ALTER TABLE `wallet_records` DISABLE KEYS */;
/*!40000 ALTER TABLE `wallet_records` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-18 23:18:57
