-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: toyjoy_local
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `age_labels`
--

DROP TABLE IF EXISTS `age_labels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `age_labels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `age_labels_code_unique` (`code`),
  KEY `age_labels_status_index` (`status`),
  KEY `age_labels_sort_order_index` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `age_labels`
--

LOCK TABLES `age_labels` WRITE;
/*!40000 ALTER TABLE `age_labels` DISABLE KEYS */;
/*!40000 ALTER TABLE `age_labels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `approval_records`
--

DROP TABLE IF EXISTS `approval_records`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `approval_records` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `source_type` varchar(255) NOT NULL,
  `source_id` varchar(255) NOT NULL,
  `source_version` varchar(255) DEFAULT NULL,
  `source_hash` varchar(255) DEFAULT NULL,
  `requested_action` varchar(255) NOT NULL,
  `approval_state` varchar(255) NOT NULL,
  `requester_id` bigint(20) unsigned NOT NULL,
  `approver_id` bigint(20) unsigned DEFAULT NULL,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `reason_code` varchar(255) DEFAULT NULL,
  `reason_text` text DEFAULT NULL,
  `decision_note` text DEFAULT NULL,
  `limit_context` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`limit_context`)),
  `request_id` varchar(255) DEFAULT NULL,
  `idempotency_key` varchar(255) DEFAULT NULL,
  `pending_key` char(64) DEFAULT NULL,
  `requested_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `decided_at` timestamp NULL DEFAULT NULL,
  `withdrawn_at` timestamp NULL DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `approval_records_idempotency_key_unique` (`idempotency_key`),
  UNIQUE KEY `approval_records_pending_key_unique` (`pending_key`),
  KEY `approval_records_store_id_foreign` (`store_id`),
  KEY `approval_records_source_type_source_id_requested_action_index` (`source_type`,`source_id`,`requested_action`),
  KEY `approval_records_approval_state_requested_at_index` (`approval_state`,`requested_at`),
  KEY `approval_records_requester_id_approval_state_index` (`requester_id`,`approval_state`),
  KEY `approval_records_approver_id_approval_state_index` (`approver_id`,`approval_state`),
  KEY `approval_records_branch_id_store_id_approval_state_index` (`branch_id`,`store_id`,`approval_state`),
  KEY `approval_records_source_type_index` (`source_type`),
  KEY `approval_records_approval_state_index` (`approval_state`),
  KEY `approval_records_request_id_index` (`request_id`),
  KEY `approval_records_expires_at_index` (`expires_at`),
  CONSTRAINT `approval_records_approver_id_foreign` FOREIGN KEY (`approver_id`) REFERENCES `users` (`id`),
  CONSTRAINT `approval_records_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `approval_records_requester_id_foreign` FOREIGN KEY (`requester_id`) REFERENCES `users` (`id`),
  CONSTRAINT `approval_records_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approval_records`
--

LOCK TABLES `approval_records` WRITE;
/*!40000 ALTER TABLE `approval_records` DISABLE KEYS */;
/*!40000 ALTER TABLE `approval_records` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attachments`
--

DROP TABLE IF EXISTS `attachments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachments` (
  `id` char(36) NOT NULL,
  `source_type` varchar(255) DEFAULT NULL,
  `source_id` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) NOT NULL,
  `original_filename` varchar(255) NOT NULL,
  `storage_filename` varchar(255) NOT NULL,
  `storage_disk` varchar(255) NOT NULL,
  `storage_path` varchar(255) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  `detected_mime_type` varchar(255) NOT NULL,
  `extension` varchar(20) NOT NULL,
  `size_bytes` bigint(20) unsigned NOT NULL,
  `sha256` char(64) NOT NULL,
  `uploaded_by` bigint(20) unsigned DEFAULT NULL,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `visibility` varchar(255) NOT NULL DEFAULT 'private',
  `status` varchar(255) NOT NULL,
  `request_id` varchar(255) DEFAULT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `retention_until` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `attachments_store_id_foreign` (`store_id`),
  KEY `attachments_source_type_source_id_index` (`source_type`,`source_id`),
  KEY `attachments_purpose_status_index` (`purpose`,`status`),
  KEY `attachments_uploaded_by_created_at_index` (`uploaded_by`,`created_at`),
  KEY `attachments_branch_id_store_id_status_index` (`branch_id`,`store_id`,`status`),
  KEY `attachments_sha256_index` (`sha256`),
  KEY `attachments_status_index` (`status`),
  KEY `attachments_request_id_index` (`request_id`),
  KEY `attachments_retention_until_index` (`retention_until`),
  KEY `attachments_expires_at_index` (`expires_at`),
  KEY `attachments_deleted_at_index` (`deleted_at`),
  CONSTRAINT `attachments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `attachments_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  CONSTRAINT `attachments_uploaded_by_foreign` FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachments`
--

LOCK TABLES `attachments` WRITE;
/*!40000 ALTER TABLE `attachments` DISABLE KEYS */;
/*!40000 ALTER TABLE `attachments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `audit_logs`
--

DROP TABLE IF EXISTS `audit_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audit_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `event_id` char(36) NOT NULL,
  `legacy_source_key` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  `actor_id` bigint(20) unsigned DEFAULT NULL,
  `actor_name` varchar(255) DEFAULT NULL,
  `source_type` varchar(255) DEFAULT NULL,
  `source_id` varchar(255) DEFAULT NULL,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `reason_code` varchar(255) DEFAULT NULL,
  `reason_text` text DEFAULT NULL,
  `before_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`before_values`)),
  `after_values` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`after_values`)),
  `changed_fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`changed_fields`)),
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `request_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `audit_logs_event_id_unique` (`event_id`),
  UNIQUE KEY `audit_logs_legacy_source_key_unique` (`legacy_source_key`),
  KEY `audit_logs_branch_id_store_id_created_at_index` (`branch_id`,`store_id`,`created_at`),
  KEY `audit_logs_source_type_source_id_created_at_index` (`source_type`,`source_id`,`created_at`),
  KEY `audit_logs_category_index` (`category`),
  KEY `audit_logs_event_index` (`event`),
  KEY `audit_logs_actor_id_index` (`actor_id`),
  KEY `audit_logs_source_type_index` (`source_type`),
  KEY `audit_logs_source_id_index` (`source_id`),
  KEY `audit_logs_branch_id_index` (`branch_id`),
  KEY `audit_logs_store_id_index` (`store_id`),
  KEY `audit_logs_request_id_index` (`request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audit_logs`
--

LOCK TABLES `audit_logs` WRITE;
/*!40000 ALTER TABLE `audit_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `audit_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barcode_sequences`
--

DROP TABLE IF EXISTS `barcode_sequences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barcode_sequences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(4) NOT NULL,
  `next_serial` int(10) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode_sequences_supplier_code_unique` (`supplier_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barcode_sequences`
--

LOCK TABLES `barcode_sequences` WRITE;
/*!40000 ALTER TABLE `barcode_sequences` DISABLE KEYS */;
/*!40000 ALTER TABLE `barcode_sequences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barcodes`
--

DROP TABLE IF EXISTS `barcodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barcodes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `barcode` varchar(64) NOT NULL,
  `source` varchar(20) NOT NULL,
  `supplier_code` varchar(4) DEFAULT NULL,
  `serial_value` int(10) unsigned DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `allocation_key` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcodes_barcode_unique` (`barcode`),
  UNIQUE KEY `barcodes_allocation_key_unique` (`allocation_key`),
  KEY `barcodes_product_id_status_index` (`product_id`,`status`),
  KEY `barcodes_source_supplier_code_serial_value_index` (`source`,`supplier_code`,`serial_value`),
  CONSTRAINT `barcodes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barcodes`
--

LOCK TABLES `barcodes` WRITE;
/*!40000 ALTER TABLE `barcodes` DISABLE KEYS */;
/*!40000 ALTER TABLE `barcodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_selling_stores`
--

DROP TABLE IF EXISTS `branch_selling_stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_selling_stores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` bigint(20) unsigned NOT NULL,
  `store_id` bigint(20) unsigned NOT NULL,
  `effective_from` timestamp NULL DEFAULT NULL,
  `effective_to` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `approval_notes` text DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branch_selling_stores_store_id_foreign` (`store_id`),
  KEY `branch_selling_stores_created_by_foreign` (`created_by`),
  KEY `branch_selling_stores_branch_id_status_effective_from_index` (`branch_id`,`status`,`effective_from`),
  CONSTRAINT `branch_selling_stores_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `branch_selling_stores_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `branch_selling_stores_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_selling_stores`
--

LOCK TABLES `branch_selling_stores` WRITE;
/*!40000 ALTER TABLE `branch_selling_stores` DISABLE KEYS */;
/*!40000 ALTER TABLE `branch_selling_stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) unsigned DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `timezone` varchar(255) NOT NULL DEFAULT 'UTC',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `policy_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `branches_code_unique` (`code`),
  KEY `branches_company_id_status_index` (`company_id`,`status`),
  CONSTRAINT `branches_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_code_unique` (`code`),
  KEY `brands_created_by_foreign` (`created_by`),
  KEY `brands_updated_by_foreign` (`updated_by`),
  KEY `brands_status_code_index` (`status`,`code`),
  CONSTRAINT `brands_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `brands_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('toy-joy-cache-47f9ee56a249fc52b854ff6f4461030b','i:1;',1787220208),('toy-joy-cache-47f9ee56a249fc52b854ff6f4461030b:timer','i:1787220208;',1787220208);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cash_drawers`
--

DROP TABLE IF EXISTS `cash_drawers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cash_drawers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) unsigned DEFAULT NULL,
  `branch_id` bigint(20) unsigned NOT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `assigned_user_id` bigint(20) unsigned DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `policy_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cash_drawers_branch_id_code_unique` (`branch_id`,`code`),
  KEY `cash_drawers_store_id_foreign` (`store_id`),
  KEY `cash_drawers_assigned_user_id_foreign` (`assigned_user_id`),
  KEY `cash_drawers_scope_status_index` (`company_id`,`branch_id`,`store_id`,`assigned_user_id`,`status`),
  CONSTRAINT `cash_drawers_assigned_user_id_foreign` FOREIGN KEY (`assigned_user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `cash_drawers_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cash_drawers_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL,
  CONSTRAINT `cash_drawers_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cash_drawers`
--

LOCK TABLES `cash_drawers` WRITE;
/*!40000 ALTER TABLE `cash_drawers` DISABLE KEYS */;
/*!40000 ALTER TABLE `cash_drawers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_code_unique` (`code`),
  KEY `categories_created_by_foreign` (`created_by`),
  KEY `categories_updated_by_foreign` (`updated_by`),
  KEY `categories_parent_id_status_sort_order_index` (`parent_id`,`status`,`sort_order`),
  KEY `categories_status_code_index` (`status`,`code`),
  CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `categories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `characters`
--

DROP TABLE IF EXISTS `characters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `characters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `characters_code_unique` (`code`),
  KEY `characters_status_index` (`status`),
  KEY `characters_sort_order_index` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `characters`
--

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;
/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colours`
--

DROP TABLE IF EXISTS `colours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colours` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `colours_code_unique` (`code`),
  KEY `colours_status_index` (`status`),
  KEY `colours_sort_order_index` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colours`
--

LOCK TABLES `colours` WRITE;
/*!40000 ALTER TABLE `colours` DISABLE KEYS */;
/*!40000 ALTER TABLE `colours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT 'TBD',
  `name_ar` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `legal_name` varchar(255) DEFAULT NULL,
  `tax_number` varchar(255) DEFAULT NULL,
  `commercial_registration` varchar(255) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT 'TBD',
  `currency_symbol` varchar(255) DEFAULT 'TBD',
  `timezone` varchar(255) DEFAULT 'UTC',
  `locale_default` varchar(255) DEFAULT 'ar',
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `policy_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_children`
--

DROP TABLE IF EXISTS `customer_children`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_children` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `public_id` char(36) NOT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `name_ar` varchar(190) NOT NULL,
  `name_en` varchar(190) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `purpose` varchar(80) NOT NULL,
  `consent_status` varchar(30) NOT NULL DEFAULT 'granted',
  `consent_wording_version` varchar(80) DEFAULT NULL,
  `consent_wording_text` text DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'active',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `created_branch_id` bigint(20) unsigned DEFAULT NULL,
  `created_store_id` bigint(20) unsigned DEFAULT NULL,
  `lock_version` int(10) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_children_public_id_unique` (`public_id`),
  KEY `customer_children_created_by_foreign` (`created_by`),
  KEY `customer_children_updated_by_foreign` (`updated_by`),
  KEY `customer_children_created_branch_id_foreign` (`created_branch_id`),
  KEY `customer_children_created_store_id_foreign` (`created_store_id`),
  KEY `customer_children_customer_id_status_index` (`customer_id`,`status`),
  KEY `customer_children_purpose_birth_date_index` (`purpose`,`birth_date`),
  CONSTRAINT `customer_children_created_branch_id_foreign` FOREIGN KEY (`created_branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customer_children_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customer_children_created_store_id_foreign` FOREIGN KEY (`created_store_id`) REFERENCES `stores` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customer_children_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer_children_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_children`
--

LOCK TABLES `customer_children` WRITE;
/*!40000 ALTER TABLE `customer_children` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_children` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_consents`
--

DROP TABLE IF EXISTS `customer_consents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_consents` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `purpose` varchar(80) NOT NULL,
  `status` varchar(30) NOT NULL,
  `captured_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `captured_by` bigint(20) unsigned DEFAULT NULL,
  `source` varchar(50) NOT NULL,
  `wording_version` varchar(80) NOT NULL,
  `wording_text` text NOT NULL,
  `retention_until` timestamp NULL DEFAULT NULL,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `idempotency_key` varchar(190) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_consents_idempotency_key_unique` (`idempotency_key`),
  KEY `customer_consents_captured_by_foreign` (`captured_by`),
  KEY `customer_consents_store_id_foreign` (`store_id`),
  KEY `customer_consents_customer_id_purpose_captured_at_index` (`customer_id`,`purpose`,`captured_at`),
  KEY `customer_consents_branch_id_store_id_index` (`branch_id`,`store_id`),
  CONSTRAINT `customer_consents_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customer_consents_captured_by_foreign` FOREIGN KEY (`captured_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customer_consents_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer_consents_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_consents`
--

LOCK TABLES `customer_consents` WRITE;
/*!40000 ALTER TABLE `customer_consents` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_consents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_groups`
--

DROP TABLE IF EXISTS `customer_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) unsigned NOT NULL,
  `parent_id` bigint(20) unsigned DEFAULT NULL,
  `name_ar` varchar(190) NOT NULL,
  `name_en` varchar(190) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'active',
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `lock_version` int(10) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_group_company_name_ar_unique` (`company_id`,`name_ar`),
  UNIQUE KEY `customer_group_company_name_en_unique` (`company_id`,`name_en`),
  KEY `customer_groups_parent_id_foreign` (`parent_id`),
  KEY `customer_groups_created_by_foreign` (`created_by`),
  KEY `customer_groups_updated_by_foreign` (`updated_by`),
  KEY `customer_groups_company_id_parent_id_status_index` (`company_id`,`parent_id`,`status`),
  CONSTRAINT `customer_groups_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  CONSTRAINT `customer_groups_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customer_groups_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `customer_groups` (`id`),
  CONSTRAINT `customer_groups_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_groups`
--

LOCK TABLES `customer_groups` WRITE;
/*!40000 ALTER TABLE `customer_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_merge_events`
--

DROP TABLE IF EXISTS `customer_merge_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_merge_events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `duplicate_customer_id` bigint(20) unsigned NOT NULL,
  `survivor_customer_id` bigint(20) unsigned NOT NULL,
  `reason` text NOT NULL,
  `merged_by` bigint(20) unsigned NOT NULL,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `idempotency_key` varchar(190) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_merge_events_idempotency_key_unique` (`idempotency_key`),
  KEY `customer_merge_events_survivor_customer_id_foreign` (`survivor_customer_id`),
  KEY `customer_merge_events_merged_by_foreign` (`merged_by`),
  KEY `customer_merge_events_branch_id_foreign` (`branch_id`),
  KEY `customer_merge_events_store_id_foreign` (`store_id`),
  KEY `customer_merge_history_index` (`duplicate_customer_id`,`survivor_customer_id`),
  CONSTRAINT `customer_merge_events_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `customer_merge_events_duplicate_customer_id_foreign` FOREIGN KEY (`duplicate_customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `customer_merge_events_merged_by_foreign` FOREIGN KEY (`merged_by`) REFERENCES `users` (`id`),
  CONSTRAINT `customer_merge_events_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  CONSTRAINT `customer_merge_events_survivor_customer_id_foreign` FOREIGN KEY (`survivor_customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_merge_events`
--

LOCK TABLES `customer_merge_events` WRITE;
/*!40000 ALTER TABLE `customer_merge_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_merge_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_scopes`
--

DROP TABLE IF EXISTS `customer_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_scopes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned NOT NULL,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_scope_identity_unique` (`customer_id`,`branch_id`,`store_id`),
  KEY `customer_scopes_store_id_foreign` (`store_id`),
  KEY `customer_scopes_created_by_foreign` (`created_by`),
  KEY `customer_scopes_branch_id_store_id_index` (`branch_id`,`store_id`),
  CONSTRAINT `customer_scopes_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer_scopes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customer_scopes_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer_scopes_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_scopes`
--

LOCK TABLES `customer_scopes` WRITE;
/*!40000 ALTER TABLE `customer_scopes` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `public_id` char(36) NOT NULL,
  `phone_normalized` varchar(64) NOT NULL,
  `phone_display` varchar(64) NOT NULL,
  `name_ar` varchar(190) NOT NULL,
  `name_en` varchar(190) NOT NULL,
  `email` varchar(190) DEFAULT NULL,
  `secondary_phone` varchar(64) DEFAULT NULL,
  `address_ar` text DEFAULT NULL,
  `address_en` text DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'active',
  `merged_into_id` bigint(20) unsigned DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `created_branch_id` bigint(20) unsigned DEFAULT NULL,
  `created_store_id` bigint(20) unsigned DEFAULT NULL,
  `idempotency_key` varchar(190) NOT NULL,
  `lock_version` int(10) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_public_id_unique` (`public_id`),
  UNIQUE KEY `customers_phone_normalized_unique` (`phone_normalized`),
  UNIQUE KEY `customers_idempotency_key_unique` (`idempotency_key`),
  KEY `customers_created_by_foreign` (`created_by`),
  KEY `customers_updated_by_foreign` (`updated_by`),
  KEY `customers_created_branch_id_foreign` (`created_branch_id`),
  KEY `customers_created_store_id_foreign` (`created_store_id`),
  KEY `customers_status_created_at_index` (`status`,`created_at`),
  KEY `customers_name_ar_name_en_index` (`name_ar`,`name_en`),
  KEY `customers_merged_into_id_index` (`merged_into_id`),
  CONSTRAINT `customers_created_branch_id_foreign` FOREIGN KEY (`created_branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customers_created_store_id_foreign` FOREIGN KEY (`created_store_id`) REFERENCES `stores` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customers_merged_into_id_foreign` FOREIGN KEY (`merged_into_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `customers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `document_sequences`
--

DROP TABLE IF EXISTS `document_sequences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `document_sequences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `document_type` varchar(255) NOT NULL,
  `prefix` varchar(255) DEFAULT NULL,
  `suffix` varchar(255) DEFAULT NULL,
  `padding_length` int(11) NOT NULL DEFAULT 6,
  `next_value` bigint(20) NOT NULL DEFAULT 1,
  `reset_rule` varchar(255) DEFAULT 'never',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `lock_version` int(11) NOT NULL DEFAULT 1,
  `policy_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `document_sequences`
--

LOCK TABLES `document_sequences` WRITE;
/*!40000 ALTER TABLE `document_sequences` DISABLE KEYS */;
/*!40000 ALTER TABLE `document_sequences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
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
-- Table structure for table `financial_setting_versions`
--

DROP TABLE IF EXISTS `financial_setting_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `financial_setting_versions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  `value_type` varchar(30) NOT NULL,
  `effective_from` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `effective_to` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `approval_record_id` bigint(20) unsigned DEFAULT NULL,
  `version` int(10) unsigned NOT NULL,
  `locked_at` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `financial_setting_versions_key_version_unique` (`key`,`version`),
  KEY `financial_setting_versions_created_by_foreign` (`created_by`),
  KEY `financial_setting_versions_key_effective_from_index` (`key`,`effective_from`),
  KEY `financial_setting_versions_key_effective_to_index` (`key`,`effective_to`),
  KEY `financial_setting_versions_approval_record_id_index` (`approval_record_id`),
  CONSTRAINT `financial_setting_versions_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financial_setting_versions`
--

LOCK TABLES `financial_setting_versions` WRITE;
/*!40000 ALTER TABLE `financial_setting_versions` DISABLE KEYS */;
/*!40000 ALTER TABLE `financial_setting_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `genders_code_unique` (`code`),
  KEY `genders_status_index` (`status`),
  KEY `genders_sort_order_index` (`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loyalty_adjustments`
--

DROP TABLE IF EXISTS `loyalty_adjustments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loyalty_adjustments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `public_id` char(36) NOT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `activity` varchar(30) NOT NULL DEFAULT 'retail',
  `points` bigint(20) NOT NULL,
  `reason` text NOT NULL,
  `source_reference` varchar(190) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'pending',
  `requested_by` bigint(20) unsigned NOT NULL,
  `approved_by` bigint(20) unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `approval_record_id` bigint(20) unsigned DEFAULT NULL,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `idempotency_key` varchar(190) NOT NULL,
  `lock_version` int(10) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loyalty_adjustments_public_id_unique` (`public_id`),
  UNIQUE KEY `loyalty_adjustments_idempotency_key_unique` (`idempotency_key`),
  KEY `loyalty_adjustments_requested_by_foreign` (`requested_by`),
  KEY `loyalty_adjustments_approved_by_foreign` (`approved_by`),
  KEY `loyalty_adjustments_approval_record_id_foreign` (`approval_record_id`),
  KEY `loyalty_adjustments_store_id_foreign` (`store_id`),
  KEY `loyalty_adjustments_customer_id_status_created_at_index` (`customer_id`,`status`,`created_at`),
  KEY `loyalty_adjustments_branch_id_store_id_status_index` (`branch_id`,`store_id`,`status`),
  CONSTRAINT `loyalty_adjustments_approval_record_id_foreign` FOREIGN KEY (`approval_record_id`) REFERENCES `approval_records` (`id`),
  CONSTRAINT `loyalty_adjustments_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`),
  CONSTRAINT `loyalty_adjustments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `loyalty_adjustments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `loyalty_adjustments_requested_by_foreign` FOREIGN KEY (`requested_by`) REFERENCES `users` (`id`),
  CONSTRAINT `loyalty_adjustments_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loyalty_adjustments`
--

LOCK TABLES `loyalty_adjustments` WRITE;
/*!40000 ALTER TABLE `loyalty_adjustments` DISABLE KEYS */;
/*!40000 ALTER TABLE `loyalty_adjustments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loyalty_ledger`
--

DROP TABLE IF EXISTS `loyalty_ledger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loyalty_ledger` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `public_id` char(36) NOT NULL,
  `customer_id` bigint(20) unsigned NOT NULL,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `activity` varchar(30) NOT NULL,
  `event_type` varchar(40) NOT NULL,
  `points` bigint(20) NOT NULL,
  `balance_before` bigint(20) NOT NULL,
  `balance_after` bigint(20) NOT NULL,
  `effective_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expires_at` timestamp NULL DEFAULT NULL,
  `source_type` varchar(120) DEFAULT NULL,
  `source_id` varchar(120) DEFAULT NULL,
  `source_reference` varchar(190) DEFAULT NULL,
  `rule_key` varchar(120) DEFAULT NULL,
  `rule_version` varchar(80) DEFAULT NULL,
  `reason` varchar(190) DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `approval_record_id` bigint(20) unsigned DEFAULT NULL,
  `idempotency_key` varchar(190) NOT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `loyalty_ledger_public_id_unique` (`public_id`),
  UNIQUE KEY `loyalty_ledger_idempotency_key_unique` (`idempotency_key`),
  KEY `loyalty_ledger_store_id_foreign` (`store_id`),
  KEY `loyalty_ledger_created_by_foreign` (`created_by`),
  KEY `loyalty_ledger_approval_record_id_foreign` (`approval_record_id`),
  KEY `loyalty_ledger_customer_id_effective_at_index` (`customer_id`,`effective_at`),
  KEY `loyalty_ledger_customer_id_expires_at_event_type_index` (`customer_id`,`expires_at`,`event_type`),
  KEY `loyalty_ledger_source_type_source_id_index` (`source_type`,`source_id`),
  KEY `loyalty_ledger_branch_id_store_id_effective_at_index` (`branch_id`,`store_id`,`effective_at`),
  CONSTRAINT `loyalty_ledger_approval_record_id_foreign` FOREIGN KEY (`approval_record_id`) REFERENCES `approval_records` (`id`) ON DELETE SET NULL,
  CONSTRAINT `loyalty_ledger_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `loyalty_ledger_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `loyalty_ledger_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `loyalty_ledger_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loyalty_ledger`
--

LOCK TABLES `loyalty_ledger` WRITE;
/*!40000 ALTER TABLE `loyalty_ledger` DISABLE KEYS */;
/*!40000 ALTER TABLE `loyalty_ledger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loyalty_point_allocations`
--

DROP TABLE IF EXISTS `loyalty_point_allocations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `loyalty_point_allocations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `debit_ledger_id` bigint(20) unsigned NOT NULL,
  `earn_ledger_id` bigint(20) unsigned NOT NULL,
  `points` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `loyalty_allocation_pair_unique` (`debit_ledger_id`,`earn_ledger_id`),
  KEY `loyalty_point_allocations_earn_ledger_id_created_at_index` (`earn_ledger_id`,`created_at`),
  CONSTRAINT `loyalty_point_allocations_debit_ledger_id_foreign` FOREIGN KEY (`debit_ledger_id`) REFERENCES `loyalty_ledger` (`id`) ON DELETE CASCADE,
  CONSTRAINT `loyalty_point_allocations_earn_ledger_id_foreign` FOREIGN KEY (`earn_ledger_id`) REFERENCES `loyalty_ledger` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loyalty_point_allocations`
--

LOCK TABLES `loyalty_point_allocations` WRITE;
/*!40000 ALTER TABLE `loyalty_point_allocations` DISABLE KEYS */;
/*!40000 ALTER TABLE `loyalty_point_allocations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2024_01_01_000000_create_passkeys_table',1),(5,'2025_08_14_170933_add_two_factor_columns_to_users_table',1),(6,'2026_08_03_000000_add_username_and_super_admin_to_users_table',1),(7,'2026_08_03_000001_create_companies_table',1),(8,'2026_08_03_000002_create_payment_methods_table',1),(9,'2026_08_03_000003_create_tax_settings_table',1),(10,'2026_08_03_000004_create_document_sequences_table',1),(11,'2026_08_03_000005_create_printer_configurations_table',1),(12,'2026_08_03_000006_create_settings_audit_logs_table',1),(13,'2026_08_03_000007_add_unique_document_type_to_document_sequences_table',1),(14,'2026_08_03_000008_create_branches_table',1),(15,'2026_08_03_000009_create_stores_table',1),(16,'2026_08_03_000010_create_branch_selling_stores_table',1),(17,'2026_08_03_000011_create_cash_drawers_table',1),(18,'2026_08_03_000012_create_authorization_baseline_tables',1),(19,'2026_08_03_000013_create_audit_logs_table',1),(20,'2026_08_03_000014_add_legacy_source_key_to_audit_logs_table',1),(21,'2026_08_03_000015_create_approval_records_table',1),(22,'2026_08_03_000016_create_attachments_table',1),(23,'2026_08_04_000017_create_catalog_identity_tables',1),(24,'2026_08_04_000018_extend_products_for_product_cards',1),(25,'2026_08_04_000019_create_product_import_batches',1),(26,'2026_08_04_000020_create_user_ui_preferences_table',1),(27,'2026_08_04_000021_create_suppliers_and_product_suppliers_tables',1),(28,'2026_08_05_000022_create_purchase_orders_tables',1),(29,'2026_08_06_000023_add_purchase_order_approval_fields',1),(30,'2026_08_06_000024_create_purchase_invoice_and_inventory_ledger_tables',1),(31,'2026_08_06_000025_create_financial_setting_versions_table',1),(32,'2026_08_06_000026_extend_purchase_invoices_for_lifecycle',1),(33,'2026_08_10_000049_add_status_to_users_table',2),(34,'2026_08_20_000070_add_scope_to_printer_configurations_table',3),(35,'2026_08_20_000080_create_catalog_lookup_masters',4),(36,'2026_08_20_000081_expand_product_master_fields',5),(37,'2026_08_20_000082_create_supplier_import_tables',6),(38,'2026_08_20_000091_add_product_web_seo_fields',7),(39,'2026_08_20_000092_create_translation_overrides_table',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passkeys`
--

DROP TABLE IF EXISTS `passkeys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passkeys` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `credential_id` varchar(255) NOT NULL,
  `credential` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`credential`)),
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `passkeys_credential_id_unique` (`credential_id`),
  KEY `passkeys_user_id_index` (`user_id`),
  CONSTRAINT `passkeys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passkeys`
--

LOCK TABLES `passkeys` WRITE;
/*!40000 ALTER TABLE `passkeys` DISABLE KEYS */;
/*!40000 ALTER TABLE `passkeys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_methods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'manual',
  `requires_evidence` tinyint(1) NOT NULL DEFAULT 0,
  `offline_eligible` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `policy_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payment_methods_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_methods`
--

LOCK TABLES `payment_methods` WRITE;
/*!40000 ALTER TABLE `payment_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `sensitivity` varchar(255) NOT NULL DEFAULT 'normal',
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=1601 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1201,'manage-settings','company_settings','manage','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1202,'manage-branches-stores','branches_stores','manage','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1203,'view-authorization-baseline','authorization','view','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1204,'manage-authorization','authorization','manage','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1205,'view-platform-status','platform','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1206,'view-ui-showcase','platform','view_patterns','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1207,'company_settings.view','company_settings','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1208,'company_settings.create','company_settings','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1209,'company_settings.edit','company_settings','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1210,'company_settings.submit','company_settings','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1211,'company_settings.logical_delete','company_settings','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1212,'company_settings.print','company_settings','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1213,'company_settings.approve','company_settings','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1214,'company_settings.reject','company_settings','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1215,'company_settings.export','company_settings','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1216,'company_settings.reverse','company_settings','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1217,'company_settings.cancel','company_settings','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1218,'company_settings.override','company_settings','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1219,'branches_stores.view','branches_stores','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1220,'branches_stores.create','branches_stores','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1221,'branches_stores.edit','branches_stores','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1222,'branches_stores.submit','branches_stores','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1223,'branches_stores.logical_delete','branches_stores','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1224,'branches_stores.print','branches_stores','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1225,'branches_stores.approve','branches_stores','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1226,'branches_stores.reject','branches_stores','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1227,'branches_stores.export','branches_stores','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1228,'branches_stores.reverse','branches_stores','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1229,'branches_stores.cancel','branches_stores','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1230,'branches_stores.override','branches_stores','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1231,'drawers_payments_tax_numbering_printers.view','drawers_payments_tax_numbering_printers','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1232,'drawers_payments_tax_numbering_printers.create','drawers_payments_tax_numbering_printers','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1233,'drawers_payments_tax_numbering_printers.edit','drawers_payments_tax_numbering_printers','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1234,'drawers_payments_tax_numbering_printers.submit','drawers_payments_tax_numbering_printers','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1235,'drawers_payments_tax_numbering_printers.logical_delete','drawers_payments_tax_numbering_printers','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1236,'drawers_payments_tax_numbering_printers.print','drawers_payments_tax_numbering_printers','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1237,'drawers_payments_tax_numbering_printers.approve','drawers_payments_tax_numbering_printers','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1238,'drawers_payments_tax_numbering_printers.reject','drawers_payments_tax_numbering_printers','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1239,'drawers_payments_tax_numbering_printers.export','drawers_payments_tax_numbering_printers','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1240,'drawers_payments_tax_numbering_printers.reverse','drawers_payments_tax_numbering_printers','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1241,'drawers_payments_tax_numbering_printers.cancel','drawers_payments_tax_numbering_printers','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1242,'drawers_payments_tax_numbering_printers.override','drawers_payments_tax_numbering_printers','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1243,'users_roles_permissions.view','users_roles_permissions','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1244,'users_roles_permissions.create','users_roles_permissions','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1245,'users_roles_permissions.edit','users_roles_permissions','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1246,'users_roles_permissions.submit','users_roles_permissions','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1247,'users_roles_permissions.logical_delete','users_roles_permissions','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1248,'users_roles_permissions.print','users_roles_permissions','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1249,'users_roles_permissions.approve','users_roles_permissions','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1250,'users_roles_permissions.reject','users_roles_permissions','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1251,'users_roles_permissions.export','users_roles_permissions','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1252,'users_roles_permissions.reverse','users_roles_permissions','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1253,'users_roles_permissions.cancel','users_roles_permissions','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1254,'users_roles_permissions.override','users_roles_permissions','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1255,'products_categories_brands.view','products_categories_brands','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1256,'products_categories_brands.create','products_categories_brands','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1257,'products_categories_brands.edit','products_categories_brands','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1258,'products_categories_brands.submit','products_categories_brands','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1259,'products_categories_brands.logical_delete','products_categories_brands','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1260,'products_categories_brands.print','products_categories_brands','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1261,'products_categories_brands.approve','products_categories_brands','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1262,'products_categories_brands.reject','products_categories_brands','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1263,'products_categories_brands.export','products_categories_brands','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1264,'products_categories_brands.reverse','products_categories_brands','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1265,'products_categories_brands.cancel','products_categories_brands','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1266,'products_categories_brands.override','products_categories_brands','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1267,'suppliers.view','suppliers','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1268,'suppliers.create','suppliers','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1269,'suppliers.edit','suppliers','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1270,'suppliers.submit','suppliers','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1271,'suppliers.logical_delete','suppliers','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1272,'suppliers.print','suppliers','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1273,'suppliers.approve','suppliers','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1274,'suppliers.reject','suppliers','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1275,'suppliers.export','suppliers','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1276,'suppliers.reverse','suppliers','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1277,'suppliers.cancel','suppliers','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1278,'suppliers.override','suppliers','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1279,'purchase_orders.view','purchase_orders','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1280,'purchase_orders.create','purchase_orders','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1281,'purchase_orders.edit','purchase_orders','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1282,'purchase_orders.submit','purchase_orders','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1283,'purchase_orders.logical_delete','purchase_orders','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1284,'purchase_orders.print','purchase_orders','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1285,'purchase_orders.approve','purchase_orders','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1286,'purchase_orders.reject','purchase_orders','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1287,'purchase_orders.export','purchase_orders','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1288,'purchase_orders.reverse','purchase_orders','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1289,'purchase_orders.cancel','purchase_orders','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1290,'purchase_orders.override','purchase_orders','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1291,'purchase_invoices_supplier_returns.view','purchase_invoices_supplier_returns','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1292,'purchase_invoices_supplier_returns.create','purchase_invoices_supplier_returns','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1293,'purchase_invoices_supplier_returns.edit','purchase_invoices_supplier_returns','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1294,'purchase_invoices_supplier_returns.submit','purchase_invoices_supplier_returns','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1295,'purchase_invoices_supplier_returns.logical_delete','purchase_invoices_supplier_returns','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1296,'purchase_invoices_supplier_returns.print','purchase_invoices_supplier_returns','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1297,'purchase_invoices_supplier_returns.approve','purchase_invoices_supplier_returns','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1298,'purchase_invoices_supplier_returns.reject','purchase_invoices_supplier_returns','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1299,'purchase_invoices_supplier_returns.export','purchase_invoices_supplier_returns','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1300,'purchase_invoices_supplier_returns.reverse','purchase_invoices_supplier_returns','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1301,'purchase_invoices_supplier_returns.cancel','purchase_invoices_supplier_returns','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1302,'purchase_invoices_supplier_returns.override','purchase_invoices_supplier_returns','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1303,'purchase_returns.view','purchase_returns','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1304,'purchase_returns.create','purchase_returns','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1305,'purchase_returns.edit','purchase_returns','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1306,'purchase_returns.submit','purchase_returns','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1307,'purchase_returns.logical_delete','purchase_returns','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1308,'purchase_returns.print','purchase_returns','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1309,'purchase_returns.approve','purchase_returns','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1310,'purchase_returns.reject','purchase_returns','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1311,'purchase_returns.export','purchase_returns','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1312,'purchase_returns.reverse','purchase_returns','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1313,'purchase_returns.cancel','purchase_returns','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1314,'purchase_returns.override','purchase_returns','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1315,'pricing_labels.view','pricing_labels','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1316,'pricing_labels.create','pricing_labels','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1317,'pricing_labels.edit','pricing_labels','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1318,'pricing_labels.submit','pricing_labels','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1319,'pricing_labels.logical_delete','pricing_labels','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1320,'pricing_labels.print','pricing_labels','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1321,'pricing_labels.approve','pricing_labels','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1322,'pricing_labels.reject','pricing_labels','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1323,'pricing_labels.export','pricing_labels','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1324,'pricing_labels.reverse','pricing_labels','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1325,'pricing_labels.cancel','pricing_labels','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1326,'pricing_labels.override','pricing_labels','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1327,'inventory_stock_card.view','inventory_stock_card','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1328,'inventory_stock_card.create','inventory_stock_card','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1329,'inventory_stock_card.edit','inventory_stock_card','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1330,'inventory_stock_card.submit','inventory_stock_card','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1331,'inventory_stock_card.logical_delete','inventory_stock_card','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1332,'inventory_stock_card.print','inventory_stock_card','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1333,'inventory_stock_card.approve','inventory_stock_card','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1334,'inventory_stock_card.reject','inventory_stock_card','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1335,'inventory_stock_card.export','inventory_stock_card','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1336,'inventory_stock_card.reverse','inventory_stock_card','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1337,'inventory_stock_card.cancel','inventory_stock_card','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1338,'inventory_stock_card.override','inventory_stock_card','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1339,'transfers.view','transfers','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1340,'transfers.create','transfers','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1341,'transfers.edit','transfers','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1342,'transfers.submit','transfers','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1343,'transfers.logical_delete','transfers','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1344,'transfers.print','transfers','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1345,'transfers.approve','transfers','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1346,'transfers.reject','transfers','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1347,'transfers.export','transfers','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1348,'transfers.reverse','transfers','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1349,'transfers.cancel','transfers','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1350,'transfers.override','transfers','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1351,'stock_counts.view','stock_counts','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1352,'stock_counts.create','stock_counts','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1353,'stock_counts.edit','stock_counts','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1354,'stock_counts.submit','stock_counts','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1355,'stock_counts.logical_delete','stock_counts','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1356,'stock_counts.print','stock_counts','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1357,'stock_counts.approve','stock_counts','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1358,'stock_counts.reject','stock_counts','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1359,'stock_counts.export','stock_counts','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1360,'stock_counts.reverse','stock_counts','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1361,'stock_counts.cancel','stock_counts','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1362,'stock_counts.override','stock_counts','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1363,'pos_sales.view','pos_sales','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1364,'pos_sales.create','pos_sales','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1365,'pos_sales.edit','pos_sales','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1366,'pos_sales.submit','pos_sales','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1367,'pos_sales.logical_delete','pos_sales','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1368,'pos_sales.print','pos_sales','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1369,'pos_sales.approve','pos_sales','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1370,'pos_sales.reject','pos_sales','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1371,'pos_sales.export','pos_sales','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1372,'pos_sales.reverse','pos_sales','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1373,'pos_sales.cancel','pos_sales','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1374,'pos_sales.override','pos_sales','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1375,'suspended_sales.view','suspended_sales','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1376,'suspended_sales.create','suspended_sales','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1377,'suspended_sales.edit','suspended_sales','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1378,'suspended_sales.submit','suspended_sales','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1379,'suspended_sales.logical_delete','suspended_sales','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1380,'suspended_sales.print','suspended_sales','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1381,'suspended_sales.approve','suspended_sales','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1382,'suspended_sales.reject','suspended_sales','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1383,'suspended_sales.export','suspended_sales','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1384,'suspended_sales.reverse','suspended_sales','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1385,'suspended_sales.cancel','suspended_sales','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1386,'suspended_sales.override','suspended_sales','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1387,'shifts_cash_movements.view','shifts_cash_movements','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1388,'shifts_cash_movements.create','shifts_cash_movements','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1389,'shifts_cash_movements.edit','shifts_cash_movements','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1390,'shifts_cash_movements.submit','shifts_cash_movements','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1391,'shifts_cash_movements.logical_delete','shifts_cash_movements','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1392,'shifts_cash_movements.print','shifts_cash_movements','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1393,'shifts_cash_movements.approve','shifts_cash_movements','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1394,'shifts_cash_movements.reject','shifts_cash_movements','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1395,'shifts_cash_movements.export','shifts_cash_movements','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1396,'shifts_cash_movements.reverse','shifts_cash_movements','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1397,'shifts_cash_movements.cancel','shifts_cash_movements','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1398,'shifts_cash_movements.override','shifts_cash_movements','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1399,'customers_children.view','customers_children','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1400,'customers_children.create','customers_children','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1401,'customers_children.edit','customers_children','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1402,'customers_children.submit','customers_children','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1403,'customers_children.logical_delete','customers_children','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1404,'customers_children.print','customers_children','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1405,'customers_children.approve','customers_children','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1406,'customers_children.reject','customers_children','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1407,'customers_children.export','customers_children','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1408,'customers_children.reverse','customers_children','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1409,'customers_children.cancel','customers_children','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1410,'customers_children.override','customers_children','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1411,'loyalty.view','loyalty','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1412,'loyalty.create','loyalty','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1413,'loyalty.edit','loyalty','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1414,'loyalty.submit','loyalty','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1415,'loyalty.logical_delete','loyalty','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1416,'loyalty.print','loyalty','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1417,'loyalty.approve','loyalty','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1418,'loyalty.reject','loyalty','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1419,'loyalty.export','loyalty','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1420,'loyalty.reverse','loyalty','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1421,'loyalty.cancel','loyalty','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1422,'loyalty.override','loyalty','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1423,'product_wallet.view','product_wallet','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1424,'product_wallet.create','product_wallet','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1425,'product_wallet.edit','product_wallet','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1426,'product_wallet.submit','product_wallet','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1427,'product_wallet.logical_delete','product_wallet','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1428,'product_wallet.print','product_wallet','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1429,'product_wallet.approve','product_wallet','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1430,'product_wallet.reject','product_wallet','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1431,'product_wallet.export','product_wallet','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1432,'product_wallet.reverse','product_wallet','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1433,'product_wallet.cancel','product_wallet','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1434,'product_wallet.override','product_wallet','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1435,'party_wallet.view','party_wallet','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1436,'party_wallet.create','party_wallet','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1437,'party_wallet.edit','party_wallet','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1438,'party_wallet.submit','party_wallet','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1439,'party_wallet.logical_delete','party_wallet','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1440,'party_wallet.print','party_wallet','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1441,'party_wallet.approve','party_wallet','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1442,'party_wallet.reject','party_wallet','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1443,'party_wallet.export','party_wallet','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1444,'party_wallet.reverse','party_wallet','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1445,'party_wallet.cancel','party_wallet','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1446,'party_wallet.override','party_wallet','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1447,'returns_exchanges_gift_instruments.view','returns_exchanges_gift_instruments','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1448,'returns_exchanges_gift_instruments.create','returns_exchanges_gift_instruments','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1449,'returns_exchanges_gift_instruments.edit','returns_exchanges_gift_instruments','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1450,'returns_exchanges_gift_instruments.submit','returns_exchanges_gift_instruments','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1451,'returns_exchanges_gift_instruments.logical_delete','returns_exchanges_gift_instruments','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1452,'returns_exchanges_gift_instruments.print','returns_exchanges_gift_instruments','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1453,'returns_exchanges_gift_instruments.approve','returns_exchanges_gift_instruments','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1454,'returns_exchanges_gift_instruments.reject','returns_exchanges_gift_instruments','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1455,'returns_exchanges_gift_instruments.export','returns_exchanges_gift_instruments','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1456,'returns_exchanges_gift_instruments.reverse','returns_exchanges_gift_instruments','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1457,'returns_exchanges_gift_instruments.cancel','returns_exchanges_gift_instruments','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1458,'returns_exchanges_gift_instruments.override','returns_exchanges_gift_instruments','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1459,'party_bookings_invoices.view','party_bookings_invoices','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1460,'party_bookings_invoices.create','party_bookings_invoices','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1461,'party_bookings_invoices.edit','party_bookings_invoices','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1462,'party_bookings_invoices.submit','party_bookings_invoices','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1463,'party_bookings_invoices.logical_delete','party_bookings_invoices','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1464,'party_bookings_invoices.print','party_bookings_invoices','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1465,'party_bookings_invoices.approve','party_bookings_invoices','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1466,'party_bookings_invoices.reject','party_bookings_invoices','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1467,'party_bookings_invoices.export','party_bookings_invoices','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1468,'party_bookings_invoices.reverse','party_bookings_invoices','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1469,'party_bookings_invoices.cancel','party_bookings_invoices','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1470,'party_bookings_invoices.override','party_bookings_invoices','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1471,'party_operating_orders_consumables.view','party_operating_orders_consumables','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1472,'party_operating_orders_consumables.create','party_operating_orders_consumables','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1473,'party_operating_orders_consumables.edit','party_operating_orders_consumables','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1474,'party_operating_orders_consumables.submit','party_operating_orders_consumables','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1475,'party_operating_orders_consumables.logical_delete','party_operating_orders_consumables','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1476,'party_operating_orders_consumables.print','party_operating_orders_consumables','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1477,'party_operating_orders_consumables.approve','party_operating_orders_consumables','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1478,'party_operating_orders_consumables.reject','party_operating_orders_consumables','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1479,'party_operating_orders_consumables.export','party_operating_orders_consumables','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1480,'party_operating_orders_consumables.reverse','party_operating_orders_consumables','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1481,'party_operating_orders_consumables.cancel','party_operating_orders_consumables','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1482,'party_operating_orders_consumables.override','party_operating_orders_consumables','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1483,'rental_assets.view','rental_assets','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1484,'rental_assets.create','rental_assets','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1485,'rental_assets.edit','rental_assets','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1486,'rental_assets.submit','rental_assets','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1487,'rental_assets.logical_delete','rental_assets','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1488,'rental_assets.print','rental_assets','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1489,'rental_assets.approve','rental_assets','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1490,'rental_assets.reject','rental_assets','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1491,'rental_assets.export','rental_assets','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1492,'rental_assets.reverse','rental_assets','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1493,'rental_assets.cancel','rental_assets','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1494,'rental_assets.override','rental_assets','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1495,'quotations.view','quotations','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1496,'quotations.create','quotations','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1497,'quotations.edit','quotations','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1498,'quotations.submit','quotations','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1499,'quotations.logical_delete','quotations','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1500,'quotations.print','quotations','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1501,'quotations.approve','quotations','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1502,'quotations.reject','quotations','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1503,'quotations.export','quotations','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1504,'quotations.reverse','quotations','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1505,'quotations.cancel','quotations','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1506,'quotations.override','quotations','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1507,'dashboard_reports.view','dashboard_reports','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1508,'dashboard_reports.create','dashboard_reports','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1509,'dashboard_reports.edit','dashboard_reports','edit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1510,'dashboard_reports.submit','dashboard_reports','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1511,'dashboard_reports.logical_delete','dashboard_reports','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1512,'dashboard_reports.print','dashboard_reports','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1513,'dashboard_reports.approve','dashboard_reports','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1514,'dashboard_reports.reject','dashboard_reports','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1515,'dashboard_reports.export','dashboard_reports','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1516,'dashboard_reports.reverse','dashboard_reports','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1517,'dashboard_reports.cancel','dashboard_reports','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1518,'dashboard_reports.override','dashboard_reports','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1519,'audit_logs.view','audit_logs','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1520,'audit_logs.create','audit_logs','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1521,'audit_logs.edit','audit_logs','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1522,'audit_logs.submit','audit_logs','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1523,'audit_logs.logical_delete','audit_logs','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1524,'audit_logs.print','audit_logs','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1525,'audit_logs.approve','audit_logs','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1526,'audit_logs.reject','audit_logs','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1527,'audit_logs.export','audit_logs','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1528,'audit_logs.reverse','audit_logs','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1529,'audit_logs.cancel','audit_logs','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1530,'audit_logs.override','audit_logs','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1531,'offline_queue_conflicts.view','offline_queue_conflicts','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1532,'offline_queue_conflicts.create','offline_queue_conflicts','create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1533,'offline_queue_conflicts.edit','offline_queue_conflicts','edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1534,'offline_queue_conflicts.submit','offline_queue_conflicts','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1535,'offline_queue_conflicts.logical_delete','offline_queue_conflicts','logical_delete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1536,'offline_queue_conflicts.print','offline_queue_conflicts','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1537,'offline_queue_conflicts.approve','offline_queue_conflicts','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1538,'offline_queue_conflicts.reject','offline_queue_conflicts','reject','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1539,'offline_queue_conflicts.export','offline_queue_conflicts','export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1540,'offline_queue_conflicts.reverse','offline_queue_conflicts','reverse','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1541,'offline_queue_conflicts.cancel','offline_queue_conflicts','cancel','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1542,'offline_queue_conflicts.override','offline_queue_conflicts','override','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1543,'purchase_returns.approve_over_limit','purchase_returns','approve_over_limit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1544,'suppliers.preferred_change','suppliers','preferred_change','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1545,'inventory_stock_card.cost_view','inventory_stock_card','cost_view','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1546,'transfers.dispatch','transfers','dispatch','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1547,'transfers.receive','transfers','receive','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1548,'transfers.difference','transfers','difference','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1549,'stock_counts.reconcile','stock_counts','reconcile','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1550,'pos_sales.apply_tax','pos_sales','apply_tax','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1551,'pos_sales.apply_discount','pos_sales','apply_discount','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1552,'pos_sales.discount_approve','pos_sales','discount_approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1553,'pos_sales.open_price','pos_sales','open_price','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1554,'pos_sales.open_price_approve','pos_sales','open_price_approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1555,'pos_sales.payment_view','pos_sales','payment_view','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1556,'pos_sales.payment_create','pos_sales','payment_create','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1557,'pos_sales.payment_evidence_upload','pos_sales','payment_evidence_upload','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1558,'pos_sales.payment_evidence_view','pos_sales','payment_evidence_view','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1559,'product_wallet.settle','product_wallet','settle','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1560,'product_wallet.adjust','product_wallet','adjust','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1561,'party_wallet.settle','party_wallet','settle','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1562,'party_wallet.adjust','party_wallet','adjust','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1563,'gift_receipts.view','gift_receipts','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1564,'gift_receipts.issue','gift_receipts','issue','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1565,'gift_receipts.print','gift_receipts','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1566,'gift_receipts.reprint','gift_receipts','reprint','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1567,'gift_receipts.validate','gift_receipts','validate','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1568,'returns.view','returns','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1569,'returns.create','returns','create','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1570,'returns.submit','returns','submit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1571,'returns.approve','returns','approve','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1572,'returns.complete','returns','complete','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1573,'returns.print','returns','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1574,'gift_cards.view','gift_cards','view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1575,'gift_cards.print','gift_cards','print','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1576,'gift_cards.issue','gift_cards','issue','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1577,'gift_cards.redeem','gift_cards','redeem','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1578,'gift_cards.void','gift_cards','void','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1579,'gift_cards.expire','gift_cards','expire','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1580,'rental_assets.reserve','rental_assets','reserve','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1581,'rental_assets.checkout','rental_assets','checkout','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1582,'rental_assets.return','rental_assets','return','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1583,'rental_assets.inspect','rental_assets','inspect','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1584,'rental_assets.status','rental_assets','status','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1585,'rental_assets.cost_view','rental_assets','cost_view','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1586,'rental_assets.cost_edit','rental_assets','cost_edit','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1587,'quotations.issue','quotations','issue','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1588,'quotations.share','quotations','share','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1589,'dashboard_reports.export_xlsx','dashboard_reports','export_xlsx','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1590,'dashboard_reports.export_pdf','dashboard_reports','export_pdf','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1591,'customers.view','customers_children','customer_view','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1592,'customers.create','customers_children','customer_create','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1593,'customers.edit','customers_children','customer_edit','normal','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1594,'customers.sensitive','customers_children','customer_sensitive','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1595,'customers.merge','customers_children','customer_merge','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1596,'customers.export','customers_children','customer_export','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1597,'loyalty.earn','loyalty','earn','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1598,'loyalty.redeem','loyalty','redeem','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1599,'loyalty.adjust','loyalty','adjust','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(1600,'loyalty.expire','loyalty','expire','sensitive','active','2026-08-20 06:46:47','2026-08-20 06:46:47');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `printer_configurations`
--

DROP TABLE IF EXISTS `printer_configurations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `printer_configurations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `printer_type` varchar(255) NOT NULL DEFAULT 'thermal',
  `paper_size` varchar(255) NOT NULL DEFAULT '80mm',
  `template_name` varchar(255) NOT NULL DEFAULT 'default_thermal',
  `connection_type` varchar(255) NOT NULL DEFAULT 'network',
  `ip_address` varchar(255) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `printer_configurations_store_id_foreign` (`store_id`),
  KEY `printer_scope_default_index` (`branch_id`,`store_id`,`is_default`,`status`),
  CONSTRAINT `printer_configurations_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL,
  CONSTRAINT `printer_configurations_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `printer_configurations`
--

LOCK TABLES `printer_configurations` WRITE;
/*!40000 ALTER TABLE `printer_configurations` DISABLE KEYS */;
/*!40000 ALTER TABLE `printer_configurations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_ages`
--

DROP TABLE IF EXISTS `product_ages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_ages` (
  `product_id` bigint(20) unsigned NOT NULL,
  `age_label_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `product_ages_product_id_age_label_id_unique` (`product_id`,`age_label_id`),
  KEY `product_ages_age_label_id_foreign` (`age_label_id`),
  CONSTRAINT `product_ages_age_label_id_foreign` FOREIGN KEY (`age_label_id`) REFERENCES `age_labels` (`id`),
  CONSTRAINT `product_ages_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_ages`
--

LOCK TABLES `product_ages` WRITE;
/*!40000 ALTER TABLE `product_ages` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_ages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_characters`
--

DROP TABLE IF EXISTS `product_characters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_characters` (
  `product_id` bigint(20) unsigned NOT NULL,
  `character_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `product_characters_product_id_character_id_unique` (`product_id`,`character_id`),
  KEY `product_characters_character_id_foreign` (`character_id`),
  CONSTRAINT `product_characters_character_id_foreign` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`),
  CONSTRAINT `product_characters_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_characters`
--

LOCK TABLES `product_characters` WRITE;
/*!40000 ALTER TABLE `product_characters` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_characters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_colours`
--

DROP TABLE IF EXISTS `product_colours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_colours` (
  `product_id` bigint(20) unsigned NOT NULL,
  `colour_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `product_colours_product_id_colour_id_unique` (`product_id`,`colour_id`),
  KEY `product_colours_colour_id_foreign` (`colour_id`),
  CONSTRAINT `product_colours_colour_id_foreign` FOREIGN KEY (`colour_id`) REFERENCES `colours` (`id`),
  CONSTRAINT `product_colours_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_colours`
--

LOCK TABLES `product_colours` WRITE;
/*!40000 ALTER TABLE `product_colours` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_colours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_family_option_groups`
--

DROP TABLE IF EXISTS `product_family_option_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_family_option_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `product_option_group_id` bigint(20) unsigned NOT NULL,
  `sort_order` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_family_group_unique` (`product_id`,`product_option_group_id`),
  UNIQUE KEY `product_family_group_order_unique` (`product_id`,`sort_order`),
  KEY `product_family_option_groups_product_option_group_id_foreign` (`product_option_group_id`),
  CONSTRAINT `product_family_option_groups_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_family_option_groups_product_option_group_id_foreign` FOREIGN KEY (`product_option_group_id`) REFERENCES `product_option_groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_family_option_groups`
--

LOCK TABLES `product_family_option_groups` WRITE;
/*!40000 ALTER TABLE `product_family_option_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_family_option_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_family_option_values`
--

DROP TABLE IF EXISTS `product_family_option_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_family_option_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `product_option_value_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_family_value_unique` (`product_id`,`product_option_value_id`),
  KEY `product_family_option_values_product_option_value_id_foreign` (`product_option_value_id`),
  CONSTRAINT `product_family_option_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_family_option_values_product_option_value_id_foreign` FOREIGN KEY (`product_option_value_id`) REFERENCES `product_option_values` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_family_option_values`
--

LOCK TABLES `product_family_option_values` WRITE;
/*!40000 ALTER TABLE `product_family_option_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_family_option_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_genders`
--

DROP TABLE IF EXISTS `product_genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_genders` (
  `product_id` bigint(20) unsigned NOT NULL,
  `gender_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `product_genders_product_id_gender_id_unique` (`product_id`,`gender_id`),
  KEY `product_genders_gender_id_foreign` (`gender_id`),
  CONSTRAINT `product_genders_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`),
  CONSTRAINT `product_genders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_genders`
--

LOCK TABLES `product_genders` WRITE;
/*!40000 ALTER TABLE `product_genders` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `attachment_id` char(36) NOT NULL,
  `role` varchar(20) NOT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_images_product_id_attachment_id_unique` (`product_id`,`attachment_id`),
  KEY `product_images_attachment_id_foreign` (`attachment_id`),
  KEY `product_images_product_id_status_role_sort_order_index` (`product_id`,`status`,`role`,`sort_order`),
  CONSTRAINT `product_images_attachment_id_foreign` FOREIGN KEY (`attachment_id`) REFERENCES `attachments` (`id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_import_batches`
--

DROP TABLE IF EXISTS `product_import_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_import_batches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` bigint(20) unsigned NOT NULL,
  `original_filename` varchar(255) NOT NULL,
  `storage_path` varchar(255) NOT NULL,
  `mime_type` varchar(150) DEFAULT NULL,
  `size_bytes` bigint(20) unsigned NOT NULL DEFAULT 0,
  `sha256` char(64) NOT NULL,
  `mode` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'staged',
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`headers`)),
  `total_rows` int(10) unsigned NOT NULL DEFAULT 0,
  `valid_rows` int(10) unsigned NOT NULL DEFAULT 0,
  `invalid_rows` int(10) unsigned NOT NULL DEFAULT 0,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_import_batches_created_by_sha256_unique` (`created_by`,`sha256`),
  KEY `product_import_batches_status_created_at_index` (`status`,`created_at`),
  CONSTRAINT `product_import_batches_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_import_batches`
--

LOCK TABLES `product_import_batches` WRITE;
/*!40000 ALTER TABLE `product_import_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_import_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_import_rows`
--

DROP TABLE IF EXISTS `product_import_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_import_rows` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_import_batch_id` bigint(20) unsigned NOT NULL,
  `row_number` int(10) unsigned NOT NULL,
  `raw_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`raw_data`)),
  `mapped_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`mapped_data`)),
  `errors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`errors`)),
  `status` varchar(20) NOT NULL DEFAULT 'invalid',
  `product_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_import_rows_product_import_batch_id_row_number_unique` (`product_import_batch_id`,`row_number`),
  KEY `product_import_rows_product_id_foreign` (`product_id`),
  KEY `product_import_rows_product_import_batch_id_status_index` (`product_import_batch_id`,`status`),
  CONSTRAINT `product_import_rows_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  CONSTRAINT `product_import_rows_product_import_batch_id_foreign` FOREIGN KEY (`product_import_batch_id`) REFERENCES `product_import_batches` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_import_rows`
--

LOCK TABLES `product_import_rows` WRITE;
/*!40000 ALTER TABLE `product_import_rows` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_import_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_option_groups`
--

DROP TABLE IF EXISTS `product_option_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_option_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_option_groups_code_unique` (`code`),
  KEY `product_option_groups_status_sort_order_index` (`status`,`sort_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_option_groups`
--

LOCK TABLES `product_option_groups` WRITE;
/*!40000 ALTER TABLE `product_option_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_option_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_option_values`
--

DROP TABLE IF EXISTS `product_option_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_option_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_option_group_id` bigint(20) unsigned NOT NULL,
  `code` varchar(50) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `colour_swatch` varchar(9) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_option_values_group_code_unique` (`product_option_group_id`,`code`),
  KEY `product_option_values_group_status_index` (`product_option_group_id`,`status`,`sort_order`),
  CONSTRAINT `product_option_values_product_option_group_id_foreign` FOREIGN KEY (`product_option_group_id`) REFERENCES `product_option_groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_option_values`
--

LOCK TABLES `product_option_values` WRITE;
/*!40000 ALTER TABLE `product_option_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_option_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_suppliers`
--

DROP TABLE IF EXISTS `product_suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `supplier_id` bigint(20) unsigned NOT NULL,
  `supplier_item_code` varchar(100) DEFAULT NULL,
  `is_preferred` tinyint(1) NOT NULL DEFAULT 0,
  `last_purchase_price` decimal(15,4) DEFAULT NULL,
  `last_purchase_date` timestamp NULL DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_suppliers_product_id_supplier_id_unique` (`product_id`,`supplier_id`),
  KEY `product_suppliers_created_by_foreign` (`created_by`),
  KEY `product_suppliers_updated_by_foreign` (`updated_by`),
  KEY `product_suppliers_supplier_id_product_id_index` (`supplier_id`,`product_id`),
  KEY `product_suppliers_product_id_is_preferred_index` (`product_id`,`is_preferred`),
  CONSTRAINT `product_suppliers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `product_suppliers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_suppliers_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  CONSTRAINT `product_suppliers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_suppliers`
--

LOCK TABLES `product_suppliers` WRITE;
/*!40000 ALTER TABLE `product_suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_variant_values`
--

DROP TABLE IF EXISTS `product_variant_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_variant_values` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `product_option_group_id` bigint(20) unsigned NOT NULL,
  `product_option_value_id` bigint(20) unsigned NOT NULL,
  `sort_order` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_variant_group_unique` (`product_id`,`product_option_group_id`),
  UNIQUE KEY `product_variant_value_unique` (`product_id`,`product_option_value_id`),
  KEY `product_variant_values_product_option_group_id_foreign` (`product_option_group_id`),
  KEY `product_variant_values_product_option_value_id_product_id_index` (`product_option_value_id`,`product_id`),
  CONSTRAINT `product_variant_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_variant_values_product_option_group_id_foreign` FOREIGN KEY (`product_option_group_id`) REFERENCES `product_option_groups` (`id`),
  CONSTRAINT `product_variant_values_product_option_value_id_foreign` FOREIGN KEY (`product_option_value_id`) REFERENCES `product_option_values` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_variant_values`
--

LOCK TABLES `product_variant_values` WRITE;
/*!40000 ALTER TABLE `product_variant_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_variant_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_code` varchar(50) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `brand_id` bigint(20) unsigned DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `barcode_mode` varchar(20) NOT NULL DEFAULT 'none',
  `lock_version` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `model_number` varchar(100) DEFAULT NULL,
  `product_type` varchar(20) NOT NULL DEFAULT 'standard',
  `has_variations` tinyint(1) NOT NULL DEFAULT 0,
  `parent_product_id` bigint(20) unsigned DEFAULT NULL,
  `variant_signature` varchar(500) DEFAULT NULL,
  `variant_sort_order` int(10) unsigned DEFAULT NULL,
  `unit_of_measure` varchar(50) DEFAULT NULL,
  `average_cost` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `reorder_threshold` decimal(12,3) DEFAULT NULL,
  `dimension_length` decimal(10,3) DEFAULT NULL,
  `dimension_width` decimal(10,3) DEFAULT NULL,
  `dimension_height` decimal(10,3) DEFAULT NULL,
  `dimension_unit` varchar(20) DEFAULT NULL,
  `weight` decimal(10,3) DEFAULT NULL,
  `target_age` varchar(100) DEFAULT NULL,
  `age_label_id` bigint(20) unsigned DEFAULT NULL,
  `suitable_gender` varchar(30) DEFAULT NULL,
  `gender_id` bigint(20) unsigned DEFAULT NULL,
  `colour` varchar(100) DEFAULT NULL,
  `colour_id` bigint(20) unsigned DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `character` varchar(100) DEFAULT NULL,
  `character_id` bigint(20) unsigned DEFAULT NULL,
  `key_points_ar` text DEFAULT NULL,
  `key_points_en` text DEFAULT NULL,
  `keywords_ar` text DEFAULT NULL,
  `keywords_en` text DEFAULT NULL,
  `fractional_quantity` tinyint(1) NOT NULL DEFAULT 0,
  `battery_required` tinyint(1) NOT NULL DEFAULT 0,
  `battery_details` varchar(255) DEFAULT NULL,
  `short_description_ar` text DEFAULT NULL,
  `short_description_en` text DEFAULT NULL,
  `full_description_ar` longtext DEFAULT NULL,
  `full_description_en` longtext DEFAULT NULL,
  `meta_title_ar` varchar(255) DEFAULT NULL,
  `meta_title_en` varchar(255) DEFAULT NULL,
  `meta_description_ar` text DEFAULT NULL,
  `meta_description_en` text DEFAULT NULL,
  `seo_slug` varchar(255) DEFAULT NULL,
  `publish_visibility` varchar(30) DEFAULT NULL,
  `sort_order` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_item_code_unique` (`item_code`),
  UNIQUE KEY `products_family_variant_signature_unique` (`parent_product_id`,`variant_signature`),
  UNIQUE KEY `products_seo_slug_unique` (`seo_slug`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_status_category_id_index` (`status`,`category_id`),
  KEY `products_status_brand_id_index` (`status`,`brand_id`),
  KEY `products_name_ar_status_index` (`name_ar`,`status`),
  KEY `products_name_en_status_index` (`name_en`,`status`),
  KEY `products_product_type_status_index` (`product_type`,`status`),
  KEY `products_target_age_status_index` (`target_age`,`status`),
  KEY `products_suitable_gender_status_index` (`suitable_gender`,`status`),
  KEY `products_product_type_index` (`product_type`),
  KEY `products_colour_index` (`colour`),
  KEY `products_size_index` (`size`),
  KEY `products_character_index` (`character`),
  KEY `products_family_variants_index` (`parent_product_id`,`status`,`variant_sort_order`),
  KEY `products_family_status_index` (`has_variations`,`status`),
  KEY `products_age_label_id_foreign` (`age_label_id`),
  KEY `products_character_id_foreign` (`character_id`),
  KEY `products_colour_id_foreign` (`colour_id`),
  KEY `products_gender_id_foreign` (`gender_id`),
  CONSTRAINT `products_age_label_id_foreign` FOREIGN KEY (`age_label_id`) REFERENCES `age_labels` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_character_id_foreign` FOREIGN KEY (`character_id`) REFERENCES `characters` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_colour_id_foreign` FOREIGN KEY (`colour_id`) REFERENCES `colours` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE SET NULL,
  CONSTRAINT `products_parent_product_id_foreign` FOREIGN KEY (`parent_product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_invoice_import_batches`
--

DROP TABLE IF EXISTS `purchase_invoice_import_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_invoice_import_batches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` bigint(20) unsigned NOT NULL,
  `original_filename` varchar(255) NOT NULL,
  `storage_path` varchar(500) NOT NULL,
  `mime_type` varchar(150) DEFAULT NULL,
  `size_bytes` bigint(20) unsigned NOT NULL DEFAULT 0,
  `sha256` varchar(64) NOT NULL,
  `mode` varchar(30) NOT NULL DEFAULT 'create_only',
  `status` varchar(30) NOT NULL DEFAULT 'staging',
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`headers`)),
  `total_rows` int(10) unsigned NOT NULL DEFAULT 0,
  `valid_rows` int(10) unsigned NOT NULL DEFAULT 0,
  `invalid_rows` int(10) unsigned NOT NULL DEFAULT 0,
  `retry_of_id` bigint(20) unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `purchase_invoice_import_batches_created_by_sha256_unique` (`created_by`,`sha256`),
  KEY `purchase_invoice_import_batches_retry_of_id_foreign` (`retry_of_id`),
  KEY `invoice_import_creator_status_index` (`created_by`,`status`,`created_at`),
  CONSTRAINT `purchase_invoice_import_batches_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  CONSTRAINT `purchase_invoice_import_batches_retry_of_id_foreign` FOREIGN KEY (`retry_of_id`) REFERENCES `purchase_invoice_import_batches` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_invoice_import_batches`
--

LOCK TABLES `purchase_invoice_import_batches` WRITE;
/*!40000 ALTER TABLE `purchase_invoice_import_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_invoice_import_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_invoice_import_rows`
--

DROP TABLE IF EXISTS `purchase_invoice_import_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_invoice_import_rows` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_invoice_import_batch_id` bigint(20) unsigned NOT NULL,
  `row_number` int(10) unsigned NOT NULL,
  `raw_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`raw_data`)),
  `mapped_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`mapped_data`)),
  `errors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`errors`)),
  `status` varchar(30) NOT NULL DEFAULT 'invalid',
  `purchase_invoice_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_import_rows_batch_fk` (`purchase_invoice_import_batch_id`),
  KEY `purchase_invoice_import_rows_purchase_invoice_id_foreign` (`purchase_invoice_id`),
  CONSTRAINT `invoice_import_rows_batch_fk` FOREIGN KEY (`purchase_invoice_import_batch_id`) REFERENCES `purchase_invoice_import_batches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchase_invoice_import_rows_purchase_invoice_id_foreign` FOREIGN KEY (`purchase_invoice_id`) REFERENCES `purchase_invoices` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_invoice_import_rows`
--

LOCK TABLES `purchase_invoice_import_rows` WRITE;
/*!40000 ALTER TABLE `purchase_invoice_import_rows` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_invoice_import_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_invoice_lines`
--

DROP TABLE IF EXISTS `purchase_invoice_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_invoice_lines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_invoice_id` bigint(20) unsigned NOT NULL,
  `purchase_order_line_id` bigint(20) unsigned DEFAULT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `quantity` decimal(20,6) NOT NULL,
  `quantity_received` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `unit_cost` decimal(19,4) NOT NULL,
  `discount_type` varchar(20) DEFAULT NULL,
  `discount_value` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `tax_amount` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `discount_amount` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `tax_rate` decimal(9,4) NOT NULL DEFAULT 0.0000,
  `tax_code` varchar(50) DEFAULT NULL,
  `subtotal` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `line_total` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_invoice_lines_product_id_foreign` (`product_id`),
  KEY `purchase_invoice_lines_purchase_order_line_id_index` (`purchase_order_line_id`),
  KEY `purchase_invoice_lines_purchase_invoice_id_product_id_index` (`purchase_invoice_id`,`product_id`),
  CONSTRAINT `purchase_invoice_lines_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `purchase_invoice_lines_purchase_invoice_id_foreign` FOREIGN KEY (`purchase_invoice_id`) REFERENCES `purchase_invoices` (`id`),
  CONSTRAINT `purchase_invoice_lines_purchase_order_line_id_foreign` FOREIGN KEY (`purchase_order_line_id`) REFERENCES `purchase_order_lines` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_invoice_lines`
--

LOCK TABLES `purchase_invoice_lines` WRITE;
/*!40000 ALTER TABLE `purchase_invoice_lines` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_invoice_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_invoices`
--

DROP TABLE IF EXISTS `purchase_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_invoices` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(50) DEFAULT NULL,
  `supplier_id` bigint(20) unsigned NOT NULL,
  `purchase_order_id` bigint(20) unsigned DEFAULT NULL,
  `store_id` bigint(20) unsigned NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `currency_code` varchar(3) DEFAULT NULL,
  `supplier_reference` varchar(100) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'draft',
  `subtotal` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `tax_amount` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `discount_amount` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `total_amount` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `notes` text DEFAULT NULL,
  `lock_version` bigint(20) unsigned NOT NULL DEFAULT 0,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `source_type` varchar(100) DEFAULT NULL,
  `source_id` bigint(20) unsigned DEFAULT NULL,
  `idempotency_key` varchar(100) NOT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `approved_by` bigint(20) unsigned DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `submitted_by` bigint(20) unsigned DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `rejected_by` bigint(20) unsigned DEFAULT NULL,
  `rejection_reason` text DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `cancelled_by` bigint(20) unsigned DEFAULT NULL,
  `cancel_reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `purchase_invoices_idempotency_key_unique` (`idempotency_key`),
  UNIQUE KEY `purchase_invoices_invoice_number_unique` (`invoice_number`),
  KEY `purchase_invoices_approved_by_foreign` (`approved_by`),
  KEY `purchase_invoices_supplier_id_status_index` (`supplier_id`,`status`),
  KEY `purchase_invoices_store_id_status_created_at_index` (`store_id`,`status`,`created_at`),
  KEY `purchase_invoices_purchase_order_id_status_index` (`purchase_order_id`,`status`),
  KEY `purchase_invoices_created_by_foreign` (`created_by`),
  KEY `purchase_invoices_updated_by_foreign` (`updated_by`),
  KEY `purchase_invoices_submitted_by_foreign` (`submitted_by`),
  KEY `purchase_invoices_rejected_by_foreign` (`rejected_by`),
  KEY `purchase_invoices_cancelled_by_foreign` (`cancelled_by`),
  KEY `purchase_invoices_supplier_id_supplier_reference_status_index` (`supplier_id`,`supplier_reference`,`status`),
  KEY `purchase_invoices_source_type_source_id_index` (`source_type`,`source_id`),
  CONSTRAINT `purchase_invoices_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `purchase_invoices_cancelled_by_foreign` FOREIGN KEY (`cancelled_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `purchase_invoices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `purchase_invoices_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`),
  CONSTRAINT `purchase_invoices_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `purchase_invoices_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  CONSTRAINT `purchase_invoices_submitted_by_foreign` FOREIGN KEY (`submitted_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `purchase_invoices_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  CONSTRAINT `purchase_invoices_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_invoices`
--

LOCK TABLES `purchase_invoices` WRITE;
/*!40000 ALTER TABLE `purchase_invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_order_lines`
--

DROP TABLE IF EXISTS `purchase_order_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_order_lines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `purchase_order_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `line_number` int(10) unsigned NOT NULL,
  `quantity_ordered` decimal(15,4) NOT NULL,
  `quantity_received` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `unit_cost` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `subtotal` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `notes` text DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `purchase_order_lines_purchase_order_id_line_number_unique` (`purchase_order_id`,`line_number`),
  KEY `purchase_order_lines_created_by_foreign` (`created_by`),
  KEY `purchase_order_lines_updated_by_foreign` (`updated_by`),
  KEY `purchase_order_lines_purchase_order_id_product_id_index` (`purchase_order_id`,`product_id`),
  KEY `purchase_order_lines_product_id_index` (`product_id`),
  CONSTRAINT `purchase_order_lines_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `purchase_order_lines_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `purchase_order_lines_purchase_order_id_foreign` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchase_order_lines_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_order_lines`
--

LOCK TABLES `purchase_order_lines` WRITE;
/*!40000 ALTER TABLE `purchase_order_lines` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_order_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_orders`
--

DROP TABLE IF EXISTS `purchase_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `po_number` varchar(50) NOT NULL,
  `supplier_id` bigint(20) unsigned NOT NULL,
  `store_id` bigint(20) unsigned DEFAULT NULL,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'draft',
  `order_date` date NOT NULL,
  `expected_delivery_date` date DEFAULT NULL,
  `payment_terms` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `cancel_reason` text DEFAULT NULL,
  `subtotal` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `tax_amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `total_amount` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `lock_version` int(10) unsigned NOT NULL DEFAULT 0,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `submitted_by` bigint(20) unsigned DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `approved_by` bigint(20) unsigned DEFAULT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `cancelled_by` bigint(20) unsigned DEFAULT NULL,
  `closed_at` timestamp NULL DEFAULT NULL,
  `closed_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `purchase_orders_po_number_unique` (`po_number`),
  KEY `purchase_orders_branch_id_foreign` (`branch_id`),
  KEY `purchase_orders_created_by_foreign` (`created_by`),
  KEY `purchase_orders_updated_by_foreign` (`updated_by`),
  KEY `purchase_orders_submitted_by_foreign` (`submitted_by`),
  KEY `purchase_orders_cancelled_by_foreign` (`cancelled_by`),
  KEY `purchase_orders_closed_by_foreign` (`closed_by`),
  KEY `purchase_orders_supplier_id_status_index` (`supplier_id`,`status`),
  KEY `purchase_orders_status_order_date_index` (`status`,`order_date`),
  KEY `purchase_orders_store_id_status_index` (`store_id`,`status`),
  KEY `purchase_orders_approved_by_foreign` (`approved_by`),
  KEY `purchase_orders_status_approved_at_index` (`status`,`approved_at`),
  CONSTRAINT `purchase_orders_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `purchase_orders_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`),
  CONSTRAINT `purchase_orders_cancelled_by_foreign` FOREIGN KEY (`cancelled_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `purchase_orders_closed_by_foreign` FOREIGN KEY (`closed_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `purchase_orders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `purchase_orders_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`),
  CONSTRAINT `purchase_orders_submitted_by_foreign` FOREIGN KEY (`submitted_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `purchase_orders_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  CONSTRAINT `purchase_orders_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_orders`
--

LOCK TABLES `purchase_orders` WRITE;
/*!40000 ALTER TABLE `purchase_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_permissions_role_id_permission_id_unique` (`role_id`,`permission_id`),
  KEY `role_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1645 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` VALUES (1234,28,1525,NULL,NULL),(1235,28,1529,NULL,NULL),(1236,28,1520,NULL,NULL),(1237,28,1521,NULL,NULL),(1238,28,1527,NULL,NULL),(1239,28,1523,NULL,NULL),(1240,28,1530,NULL,NULL),(1241,28,1524,NULL,NULL),(1242,28,1526,NULL,NULL),(1243,28,1528,NULL,NULL),(1244,28,1522,NULL,NULL),(1245,28,1519,NULL,NULL),(1246,28,1225,NULL,NULL),(1247,28,1229,NULL,NULL),(1248,28,1220,NULL,NULL),(1249,28,1221,NULL,NULL),(1250,28,1227,NULL,NULL),(1251,28,1223,NULL,NULL),(1252,28,1230,NULL,NULL),(1253,28,1224,NULL,NULL),(1254,28,1226,NULL,NULL),(1255,28,1228,NULL,NULL),(1256,28,1222,NULL,NULL),(1257,28,1219,NULL,NULL),(1258,28,1213,NULL,NULL),(1259,28,1217,NULL,NULL),(1260,28,1208,NULL,NULL),(1261,28,1209,NULL,NULL),(1262,28,1215,NULL,NULL),(1263,28,1211,NULL,NULL),(1264,28,1218,NULL,NULL),(1265,28,1212,NULL,NULL),(1266,28,1214,NULL,NULL),(1267,28,1216,NULL,NULL),(1268,28,1210,NULL,NULL),(1269,28,1207,NULL,NULL),(1270,28,1405,NULL,NULL),(1271,28,1409,NULL,NULL),(1272,28,1400,NULL,NULL),(1273,28,1401,NULL,NULL),(1274,28,1407,NULL,NULL),(1275,28,1403,NULL,NULL),(1276,28,1410,NULL,NULL),(1277,28,1404,NULL,NULL),(1278,28,1406,NULL,NULL),(1279,28,1408,NULL,NULL),(1280,28,1402,NULL,NULL),(1281,28,1399,NULL,NULL),(1282,28,1592,NULL,NULL),(1283,28,1593,NULL,NULL),(1284,28,1596,NULL,NULL),(1285,28,1595,NULL,NULL),(1286,28,1594,NULL,NULL),(1287,28,1591,NULL,NULL),(1288,28,1513,NULL,NULL),(1289,28,1517,NULL,NULL),(1290,28,1508,NULL,NULL),(1291,28,1509,NULL,NULL),(1292,28,1515,NULL,NULL),(1293,28,1590,NULL,NULL),(1294,28,1589,NULL,NULL),(1295,28,1511,NULL,NULL),(1296,28,1518,NULL,NULL),(1297,28,1512,NULL,NULL),(1298,28,1514,NULL,NULL),(1299,28,1516,NULL,NULL),(1300,28,1510,NULL,NULL),(1301,28,1507,NULL,NULL),(1302,28,1237,NULL,NULL),(1303,28,1241,NULL,NULL),(1304,28,1232,NULL,NULL),(1305,28,1233,NULL,NULL),(1306,28,1239,NULL,NULL),(1307,28,1235,NULL,NULL),(1308,28,1242,NULL,NULL),(1309,28,1236,NULL,NULL),(1310,28,1238,NULL,NULL),(1311,28,1240,NULL,NULL),(1312,28,1234,NULL,NULL),(1313,28,1231,NULL,NULL),(1314,28,1579,NULL,NULL),(1315,28,1576,NULL,NULL),(1316,28,1575,NULL,NULL),(1317,28,1577,NULL,NULL),(1318,28,1574,NULL,NULL),(1319,28,1578,NULL,NULL),(1320,28,1564,NULL,NULL),(1321,28,1565,NULL,NULL),(1322,28,1566,NULL,NULL),(1323,28,1567,NULL,NULL),(1324,28,1563,NULL,NULL),(1325,28,1333,NULL,NULL),(1326,28,1337,NULL,NULL),(1327,28,1545,NULL,NULL),(1328,28,1328,NULL,NULL),(1329,28,1329,NULL,NULL),(1330,28,1335,NULL,NULL),(1331,28,1331,NULL,NULL),(1332,28,1338,NULL,NULL),(1333,28,1332,NULL,NULL),(1334,28,1334,NULL,NULL),(1335,28,1336,NULL,NULL),(1336,28,1330,NULL,NULL),(1337,28,1327,NULL,NULL),(1338,28,1599,NULL,NULL),(1339,28,1417,NULL,NULL),(1340,28,1421,NULL,NULL),(1341,28,1412,NULL,NULL),(1342,28,1597,NULL,NULL),(1343,28,1413,NULL,NULL),(1344,28,1600,NULL,NULL),(1345,28,1419,NULL,NULL),(1346,28,1415,NULL,NULL),(1347,28,1422,NULL,NULL),(1348,28,1416,NULL,NULL),(1349,28,1598,NULL,NULL),(1350,28,1418,NULL,NULL),(1351,28,1420,NULL,NULL),(1352,28,1414,NULL,NULL),(1353,28,1411,NULL,NULL),(1354,28,1204,NULL,NULL),(1355,28,1202,NULL,NULL),(1356,28,1201,NULL,NULL),(1357,28,1537,NULL,NULL),(1358,28,1541,NULL,NULL),(1359,28,1532,NULL,NULL),(1360,28,1533,NULL,NULL),(1361,28,1539,NULL,NULL),(1362,28,1535,NULL,NULL),(1363,28,1542,NULL,NULL),(1364,28,1536,NULL,NULL),(1365,28,1538,NULL,NULL),(1366,28,1540,NULL,NULL),(1367,28,1534,NULL,NULL),(1368,28,1531,NULL,NULL),(1369,28,1465,NULL,NULL),(1370,28,1469,NULL,NULL),(1371,28,1460,NULL,NULL),(1372,28,1461,NULL,NULL),(1373,28,1467,NULL,NULL),(1374,28,1463,NULL,NULL),(1375,28,1470,NULL,NULL),(1376,28,1464,NULL,NULL),(1377,28,1466,NULL,NULL),(1378,28,1468,NULL,NULL),(1379,28,1462,NULL,NULL),(1380,28,1459,NULL,NULL),(1381,28,1477,NULL,NULL),(1382,28,1481,NULL,NULL),(1383,28,1472,NULL,NULL),(1384,28,1473,NULL,NULL),(1385,28,1479,NULL,NULL),(1386,28,1475,NULL,NULL),(1387,28,1482,NULL,NULL),(1388,28,1476,NULL,NULL),(1389,28,1478,NULL,NULL),(1390,28,1480,NULL,NULL),(1391,28,1474,NULL,NULL),(1392,28,1471,NULL,NULL),(1393,28,1562,NULL,NULL),(1394,28,1441,NULL,NULL),(1395,28,1445,NULL,NULL),(1396,28,1436,NULL,NULL),(1397,28,1437,NULL,NULL),(1398,28,1443,NULL,NULL),(1399,28,1439,NULL,NULL),(1400,28,1446,NULL,NULL),(1401,28,1440,NULL,NULL),(1402,28,1442,NULL,NULL),(1403,28,1444,NULL,NULL),(1404,28,1561,NULL,NULL),(1405,28,1438,NULL,NULL),(1406,28,1435,NULL,NULL),(1407,28,1551,NULL,NULL),(1408,28,1550,NULL,NULL),(1409,28,1369,NULL,NULL),(1410,28,1373,NULL,NULL),(1411,28,1364,NULL,NULL),(1412,28,1552,NULL,NULL),(1413,28,1365,NULL,NULL),(1414,28,1371,NULL,NULL),(1415,28,1367,NULL,NULL),(1416,28,1553,NULL,NULL),(1417,28,1554,NULL,NULL),(1418,28,1374,NULL,NULL),(1419,28,1556,NULL,NULL),(1420,28,1557,NULL,NULL),(1421,28,1558,NULL,NULL),(1422,28,1555,NULL,NULL),(1423,28,1368,NULL,NULL),(1424,28,1370,NULL,NULL),(1425,28,1372,NULL,NULL),(1426,28,1366,NULL,NULL),(1427,28,1363,NULL,NULL),(1428,28,1321,NULL,NULL),(1429,28,1325,NULL,NULL),(1430,28,1316,NULL,NULL),(1431,28,1317,NULL,NULL),(1432,28,1323,NULL,NULL),(1433,28,1319,NULL,NULL),(1434,28,1326,NULL,NULL),(1435,28,1320,NULL,NULL),(1436,28,1322,NULL,NULL),(1437,28,1324,NULL,NULL),(1438,28,1318,NULL,NULL),(1439,28,1315,NULL,NULL),(1440,28,1560,NULL,NULL),(1441,28,1429,NULL,NULL),(1442,28,1433,NULL,NULL),(1443,28,1424,NULL,NULL),(1444,28,1425,NULL,NULL),(1445,28,1431,NULL,NULL),(1446,28,1427,NULL,NULL),(1447,28,1434,NULL,NULL),(1448,28,1428,NULL,NULL),(1449,28,1430,NULL,NULL),(1450,28,1432,NULL,NULL),(1451,28,1559,NULL,NULL),(1452,28,1426,NULL,NULL),(1453,28,1423,NULL,NULL),(1454,28,1261,NULL,NULL),(1455,28,1265,NULL,NULL),(1456,28,1256,NULL,NULL),(1457,28,1257,NULL,NULL),(1458,28,1263,NULL,NULL),(1459,28,1259,NULL,NULL),(1460,28,1266,NULL,NULL),(1461,28,1260,NULL,NULL),(1462,28,1262,NULL,NULL),(1463,28,1264,NULL,NULL),(1464,28,1258,NULL,NULL),(1465,28,1255,NULL,NULL),(1466,28,1297,NULL,NULL),(1467,28,1301,NULL,NULL),(1468,28,1292,NULL,NULL),(1469,28,1293,NULL,NULL),(1470,28,1299,NULL,NULL),(1471,28,1295,NULL,NULL),(1472,28,1302,NULL,NULL),(1473,28,1296,NULL,NULL),(1474,28,1298,NULL,NULL),(1475,28,1300,NULL,NULL),(1476,28,1294,NULL,NULL),(1477,28,1291,NULL,NULL),(1478,28,1285,NULL,NULL),(1479,28,1289,NULL,NULL),(1480,28,1280,NULL,NULL),(1481,28,1281,NULL,NULL),(1482,28,1287,NULL,NULL),(1483,28,1283,NULL,NULL),(1484,28,1290,NULL,NULL),(1485,28,1284,NULL,NULL),(1486,28,1286,NULL,NULL),(1487,28,1288,NULL,NULL),(1488,28,1282,NULL,NULL),(1489,28,1279,NULL,NULL),(1490,28,1309,NULL,NULL),(1491,28,1543,NULL,NULL),(1492,28,1313,NULL,NULL),(1493,28,1304,NULL,NULL),(1494,28,1305,NULL,NULL),(1495,28,1311,NULL,NULL),(1496,28,1307,NULL,NULL),(1497,28,1314,NULL,NULL),(1498,28,1308,NULL,NULL),(1499,28,1310,NULL,NULL),(1500,28,1312,NULL,NULL),(1501,28,1306,NULL,NULL),(1502,28,1303,NULL,NULL),(1503,28,1501,NULL,NULL),(1504,28,1505,NULL,NULL),(1505,28,1496,NULL,NULL),(1506,28,1497,NULL,NULL),(1507,28,1503,NULL,NULL),(1508,28,1587,NULL,NULL),(1509,28,1499,NULL,NULL),(1510,28,1506,NULL,NULL),(1511,28,1500,NULL,NULL),(1512,28,1502,NULL,NULL),(1513,28,1504,NULL,NULL),(1514,28,1588,NULL,NULL),(1515,28,1498,NULL,NULL),(1516,28,1495,NULL,NULL),(1517,28,1489,NULL,NULL),(1518,28,1493,NULL,NULL),(1519,28,1581,NULL,NULL),(1520,28,1586,NULL,NULL),(1521,28,1585,NULL,NULL),(1522,28,1484,NULL,NULL),(1523,28,1485,NULL,NULL),(1524,28,1491,NULL,NULL),(1525,28,1583,NULL,NULL),(1526,28,1487,NULL,NULL),(1527,28,1494,NULL,NULL),(1528,28,1488,NULL,NULL),(1529,28,1490,NULL,NULL),(1530,28,1580,NULL,NULL),(1531,28,1582,NULL,NULL),(1532,28,1492,NULL,NULL),(1533,28,1584,NULL,NULL),(1534,28,1486,NULL,NULL),(1535,28,1483,NULL,NULL),(1536,28,1453,NULL,NULL),(1537,28,1457,NULL,NULL),(1538,28,1448,NULL,NULL),(1539,28,1449,NULL,NULL),(1540,28,1455,NULL,NULL),(1541,28,1451,NULL,NULL),(1542,28,1458,NULL,NULL),(1543,28,1452,NULL,NULL),(1544,28,1454,NULL,NULL),(1545,28,1456,NULL,NULL),(1546,28,1450,NULL,NULL),(1547,28,1447,NULL,NULL),(1548,28,1571,NULL,NULL),(1549,28,1572,NULL,NULL),(1550,28,1569,NULL,NULL),(1551,28,1573,NULL,NULL),(1552,28,1570,NULL,NULL),(1553,28,1568,NULL,NULL),(1554,28,1393,NULL,NULL),(1555,28,1397,NULL,NULL),(1556,28,1388,NULL,NULL),(1557,28,1389,NULL,NULL),(1558,28,1395,NULL,NULL),(1559,28,1391,NULL,NULL),(1560,28,1398,NULL,NULL),(1561,28,1392,NULL,NULL),(1562,28,1394,NULL,NULL),(1563,28,1396,NULL,NULL),(1564,28,1390,NULL,NULL),(1565,28,1387,NULL,NULL),(1566,28,1357,NULL,NULL),(1567,28,1361,NULL,NULL),(1568,28,1352,NULL,NULL),(1569,28,1353,NULL,NULL),(1570,28,1359,NULL,NULL),(1571,28,1355,NULL,NULL),(1572,28,1362,NULL,NULL),(1573,28,1356,NULL,NULL),(1574,28,1549,NULL,NULL),(1575,28,1358,NULL,NULL),(1576,28,1360,NULL,NULL),(1577,28,1354,NULL,NULL),(1578,28,1351,NULL,NULL),(1579,28,1273,NULL,NULL),(1580,28,1277,NULL,NULL),(1581,28,1268,NULL,NULL),(1582,28,1269,NULL,NULL),(1583,28,1275,NULL,NULL),(1584,28,1271,NULL,NULL),(1585,28,1278,NULL,NULL),(1586,28,1544,NULL,NULL),(1587,28,1272,NULL,NULL),(1588,28,1274,NULL,NULL),(1589,28,1276,NULL,NULL),(1590,28,1270,NULL,NULL),(1591,28,1267,NULL,NULL),(1592,28,1381,NULL,NULL),(1593,28,1385,NULL,NULL),(1594,28,1376,NULL,NULL),(1595,28,1377,NULL,NULL),(1596,28,1383,NULL,NULL),(1597,28,1379,NULL,NULL),(1598,28,1386,NULL,NULL),(1599,28,1380,NULL,NULL),(1600,28,1382,NULL,NULL),(1601,28,1384,NULL,NULL),(1602,28,1378,NULL,NULL),(1603,28,1375,NULL,NULL),(1604,28,1345,NULL,NULL),(1605,28,1349,NULL,NULL),(1606,28,1340,NULL,NULL),(1607,28,1548,NULL,NULL),(1608,28,1546,NULL,NULL),(1609,28,1341,NULL,NULL),(1610,28,1347,NULL,NULL),(1611,28,1343,NULL,NULL),(1612,28,1350,NULL,NULL),(1613,28,1344,NULL,NULL),(1614,28,1547,NULL,NULL),(1615,28,1346,NULL,NULL),(1616,28,1348,NULL,NULL),(1617,28,1342,NULL,NULL),(1618,28,1339,NULL,NULL),(1619,28,1249,NULL,NULL),(1620,28,1253,NULL,NULL),(1621,28,1244,NULL,NULL),(1622,28,1245,NULL,NULL),(1623,28,1251,NULL,NULL),(1624,28,1247,NULL,NULL),(1625,28,1254,NULL,NULL),(1626,28,1248,NULL,NULL),(1627,28,1250,NULL,NULL),(1628,28,1252,NULL,NULL),(1629,28,1246,NULL,NULL),(1630,28,1243,NULL,NULL),(1631,28,1203,NULL,NULL),(1632,28,1205,NULL,NULL),(1633,28,1206,NULL,NULL),(1634,29,1219,NULL,NULL),(1635,29,1363,NULL,NULL),(1636,30,1364,NULL,NULL),(1637,30,1368,NULL,NULL),(1638,30,1363,NULL,NULL),(1639,31,1268,NULL,NULL),(1640,31,1269,NULL,NULL),(1641,31,1544,NULL,NULL),(1642,31,1267,NULL,NULL),(1643,36,1519,NULL,NULL),(1644,36,1507,NULL,NULL);
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_user_user_id_role_id_unique` (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (2,2,28,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `description_ar` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (28,'system-administrator','مسؤول النظام','System Administrator',NULL,NULL,'active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(29,'branch-manager','مدير الفرع','Branch Manager',NULL,NULL,'active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(30,'cashier','أمين الصندوق','Cashier',NULL,NULL,'active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(31,'purchasing-officer','مسؤول المشتريات','Purchasing Officer',NULL,NULL,'active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(32,'warehouse-manager','مدير المستودع','Warehouse Manager',NULL,NULL,'active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(33,'pricing-officer','مسؤول التسعير','Pricing Officer',NULL,NULL,'active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(34,'party-manager','مدير الحفلات','Party Manager',NULL,NULL,'active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(35,'stock-counter','مراقب المخزون','Stock Counter',NULL,NULL,'active','2026-08-20 06:46:47','2026-08-20 06:46:47'),(36,'accountant-reviewer','المحاسب / المراجع','Accountant / Reviewer',NULL,NULL,'active','2026-08-20 06:46:47','2026-08-20 06:46:47');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
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
INSERT INTO `sessions` VALUES ('98Iqh2G6BqUgSqUFOvqCJRHIIjvRLowZiKCoZT7b',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJBWDl3Z0xpNUNqMEJHVmtQVjgzaW1RTXFNQ0J1WTV0R0Y5MDRFbXh3IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1787219312),('DtKrii4Q3TiCnmnmzNBSNeX8ivtRzoeG5ogwjpzj',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJBa0FMSG9mbklDY0k0TWdLMktucmpGenpvaFdSZ1hCaHBEWnpiY3BHIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==',1787219451),('epRc8qRiq4hVUSN6hbDc6CUgTfXa3eY7LlHG7SGP',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJEV0YzQ28xNDVFcFhNd0VwSkVoUVRIZVY5WVppRDRheFVERFpSc0luIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOnsiaW50ZW5kZWQiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvY2F0YWxvZ1wvcHJvZHVjdHNcL2NyZWF0ZSJ9fQ==',1787220070),('IAWlHjlsOpQUtSmBKYm31ZQPjzOYbZ1Twp0X6fuw',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJCUEpIOGhQWU42REV3blV5Y25zdGxSTVVqdFJmUmowdUowYk5PYjdaIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2NhbGUiOiJhciJ9',1787217865),('ojCQccQOXK62EqXnK1YW5UBYa2o1Au309OYYWnh0',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiIwS3JzcTNGNXJjeE9VZ0RVRGdIZ0k0bTYxRlh6dGpyQXdrMUozSHo2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1787219372),('QKnCepImVJLcV2ayjU43t7LdZBY0t8pUTLS3G0aS',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJ5UVpMWWdkSHd3OFYwUm9oS1k5TVd3bWNwOXhHeWlvWjZhcU1Fb3h5IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJwYXNza2V5Ijp7InZlcmlmaWNhdGlvbl9vcHRpb25zIjoie1wiY2hhbGxlbmdlXCI6XCJwZkR0d044RFJ6dHFDWU1mZEFZcW5TeTZ3SndSMlFIc2I4RUpuYm5zbmNzXCIsXCJ0aW1lb3V0XCI6NjAwMDAsXCJycElkXCI6XCJsb2NhbGhvc3RcIixcImFsbG93Q3JlZGVudGlhbHNcIjpbXSxcInVzZXJWZXJpZmljYXRpb25cIjpcInJlcXVpcmVkXCJ9In19',1787218898),('TCoQNNdVUI3hJ3vePRQ2xRxy457mlCHJU9SYtKND',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiIwQ0p3UklqRFppeVhrdG5vV2NpV3lua1lWdU5PVHp0dlZBRlhmNTRIIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2NhdGFsb2dcL3Byb2R1Y3RzIn0sIl9wcmV2aW91cyI6eyJ1cmwiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvbG9naW4iLCJyb3V0ZSI6ImxvZ2luIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1787219766),('WrJQJnSJLcjMsupUqupg7s8mDlMDxAdYwy63GACh',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Microsoft Windows 10.0.26200; en-US) PowerShell/7.6.4','eyJfdG9rZW4iOiJrZHNmM25Mb29WczZsMVd1WVRTU0VsN1g1WjY3YXRJM1puY0kxVUJFIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwOTlcL2Rhc2hib2FyZCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwOTlcL2Rhc2hib2FyZCIsInJvdXRlIjoiZGFzaGJvYXJkIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1787219799),('WZYuPbh09ztA04UHW4S2PNViH6wSXJG5V9391LrZ',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiI2U0tnZUh5Wmt6NGlrUnlvck40QjdhTG52NHZtTmxuVXRERW9qS3lyIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoyfQ==',1787220357),('xAOTcSHkMGxf2XPnVHfSJwShyULwNy0TxybJEUu6',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJLOFZoYjBBQ1BKc3hVZkpFZGVYOXF5ODVwZjFpWDZ6dk5GUmFkdE1XIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2luaXRpYWwtc2V0dXAifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9sb2dpbiIsInJvdXRlIjoibG9naW4ifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1787215178),('Zk96RV6mfvopH82fA0t3YahmNfoTnns0Ocaz9UYK',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Microsoft Windows 10.0.26200; en-US) PowerShell/7.6.4','eyJfdG9rZW4iOiJmcVNReHc5bXJJVklyaVNobVRZMk94azZVb3BRaGlPZlF3clpWOVFCIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2luaXRpYWwtc2V0dXAifSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9pbml0aWFsLXNldHVwIiwicm91dGUiOiJpbml0aWFsLXNldHVwIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1787215037),('zmXwf8WVS0XO2thxqUfplZ1MYTalA8ON2vDnVpJG',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Microsoft Windows 10.0.26200; en-US) PowerShell/7.6.4','eyJfdG9rZW4iOiJYQjk2ZlpMQXdXSkQxQlBNc0l1NVFHZ0JtUlNHM2lBTnhvZWRkT2QzIiwidXJsIjp7ImludGVuZGVkIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2Rhc2hib2FyZCJ9LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2Rhc2hib2FyZCIsInJvdXRlIjoiZGFzaGJvYXJkIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1787220300),('znKAlUz7d4als7rfyE7UQJYAqJ3XMkF27R3AgEDe',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJyY05sdnRQaE1mRHBnTG9DMmtzS0ttYjI4MHVJZGtSaWhyMlgwbmFJIiwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjIsIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9kYXNoYm9hcmQiLCJyb3V0ZSI6ImRhc2hib2FyZCJ9fQ==',1787219424);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings_audit_logs`
--

DROP TABLE IF EXISTS `settings_audit_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings_audit_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `correlation_id` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `setting_type` varchar(255) NOT NULL,
  `setting_id` bigint(20) unsigned DEFAULT NULL,
  `changes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`changes`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `settings_audit_logs_user_id_foreign` (`user_id`),
  CONSTRAINT `settings_audit_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings_audit_logs`
--

LOCK TABLES `settings_audit_logs` WRITE;
/*!40000 ALTER TABLE `settings_audit_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings_audit_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_balances`
--

DROP TABLE IF EXISTS `stock_balances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_balances` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `store_id` bigint(20) unsigned NOT NULL,
  `on_hand` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `reserved` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `in_transit` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `average_cost` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `total_value` decimal(19,4) NOT NULL DEFAULT 0.0000,
  `version` bigint(20) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stock_balances_product_id_store_id_unique` (`product_id`,`store_id`),
  KEY `stock_balances_store_id_on_hand_index` (`store_id`,`on_hand`),
  KEY `stock_balances_product_id_store_id_average_cost_index` (`product_id`,`store_id`,`average_cost`),
  CONSTRAINT `stock_balances_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `stock_balances_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_balances`
--

LOCK TABLES `stock_balances` WRITE;
/*!40000 ALTER TABLE `stock_balances` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_balances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_movements`
--

DROP TABLE IF EXISTS `stock_movements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_movements` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `store_id` bigint(20) unsigned NOT NULL,
  `movement_type` varchar(40) NOT NULL,
  `quantity` decimal(20,6) NOT NULL,
  `unit_cost` decimal(19,4) DEFAULT NULL,
  `total_cost` decimal(19,4) DEFAULT NULL,
  `consumed_cost` decimal(19,4) DEFAULT NULL,
  `source_type` varchar(100) DEFAULT NULL,
  `source_id` bigint(20) unsigned DEFAULT NULL,
  `source_line_id` bigint(20) unsigned DEFAULT NULL,
  `idempotency_key` varchar(100) NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reversal_of_id` bigint(20) unsigned DEFAULT NULL,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stock_movements_idempotency_key_unique` (`idempotency_key`),
  KEY `stock_movements_reversal_of_id_foreign` (`reversal_of_id`),
  KEY `stock_movements_created_by_foreign` (`created_by`),
  KEY `stock_movements_product_id_store_id_posted_at_index` (`product_id`,`store_id`,`posted_at`),
  KEY `stock_movements_store_id_movement_type_posted_at_index` (`store_id`,`movement_type`,`posted_at`),
  KEY `stock_movements_source_type_source_id_source_line_id_index` (`source_type`,`source_id`,`source_line_id`),
  KEY `stock_movements_cost_lookup_index` (`product_id`,`store_id`,`posted_at`,`quantity`,`unit_cost`),
  CONSTRAINT `stock_movements_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `stock_movements_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `stock_movements_reversal_of_id_foreign` FOREIGN KEY (`reversal_of_id`) REFERENCES `stock_movements` (`id`),
  CONSTRAINT `stock_movements_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_movements`
--

LOCK TABLES `stock_movements` WRITE;
/*!40000 ALTER TABLE `stock_movements` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_movements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_period_snapshots`
--

DROP TABLE IF EXISTS `stock_period_snapshots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_period_snapshots` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) unsigned NOT NULL,
  `store_id` bigint(20) unsigned NOT NULL,
  `period_start` date NOT NULL,
  `period_end` date NOT NULL,
  `quantity` decimal(20,6) NOT NULL,
  `value` decimal(19,4) NOT NULL,
  `generated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_immutable` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stock_period_product_store_period_unique` (`product_id`,`store_id`,`period_start`,`period_end`),
  KEY `stock_period_snapshots_store_id_period_start_period_end_index` (`store_id`,`period_start`,`period_end`),
  CONSTRAINT `stock_period_snapshots_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `stock_period_snapshots_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_period_snapshots`
--

LOCK TABLES `stock_period_snapshots` WRITE;
/*!40000 ALTER TABLE `stock_period_snapshots` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_period_snapshots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) unsigned DEFAULT NULL,
  `branch_id` bigint(20) unsigned DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'selling',
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `allows_negative_stock` tinyint(1) NOT NULL DEFAULT 0,
  `policy_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stores_code_unique` (`code`),
  KEY `stores_branch_id_foreign` (`branch_id`),
  KEY `stores_company_id_branch_id_type_status_index` (`company_id`,`branch_id`,`type`,`status`),
  CONSTRAINT `stores_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE SET NULL,
  CONSTRAINT `stores_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores` DISABLE KEYS */;
/*!40000 ALTER TABLE `stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier_import_batches`
--

DROP TABLE IF EXISTS `supplier_import_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier_import_batches` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_by` bigint(20) unsigned NOT NULL,
  `original_filename` varchar(255) NOT NULL,
  `storage_path` varchar(255) NOT NULL,
  `sha256` varchar(64) NOT NULL,
  `mode` varchar(30) NOT NULL,
  `status` varchar(40) NOT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`headers`)),
  `column_mapping` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`column_mapping`)),
  `total_rows` int(10) unsigned NOT NULL DEFAULT 0,
  `valid_rows` int(10) unsigned NOT NULL DEFAULT 0,
  `invalid_rows` int(10) unsigned NOT NULL DEFAULT 0,
  `approved_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_import_batches_created_by_sha256_index` (`created_by`,`sha256`),
  CONSTRAINT `supplier_import_batches_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_import_batches`
--

LOCK TABLES `supplier_import_batches` WRITE;
/*!40000 ALTER TABLE `supplier_import_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `supplier_import_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier_import_rows`
--

DROP TABLE IF EXISTS `supplier_import_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier_import_rows` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_import_batch_id` bigint(20) unsigned NOT NULL,
  `row_number` int(10) unsigned NOT NULL,
  `raw_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`raw_data`)),
  `mapped_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`mapped_data`)),
  `errors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`errors`)),
  `status` varchar(30) NOT NULL,
  `supplier_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `supplier_import_rows_supplier_id_foreign` (`supplier_id`),
  KEY `supplier_import_rows_supplier_import_batch_id_status_index` (`supplier_import_batch_id`,`status`),
  CONSTRAINT `supplier_import_rows_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE SET NULL,
  CONSTRAINT `supplier_import_rows_supplier_import_batch_id_foreign` FOREIGN KEY (`supplier_import_batch_id`) REFERENCES `supplier_import_batches` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_import_rows`
--

LOCK TABLES `supplier_import_rows` WRITE;
/*!40000 ALTER TABLE `supplier_import_rows` DISABLE KEYS */;
/*!40000 ALTER TABLE `supplier_import_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `tax_number` varchar(50) DEFAULT NULL,
  `payment_terms` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `lock_version` int(10) unsigned NOT NULL DEFAULT 0,
  `created_by` bigint(20) unsigned DEFAULT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `suppliers_code_unique` (`code`),
  KEY `suppliers_created_by_foreign` (`created_by`),
  KEY `suppliers_updated_by_foreign` (`updated_by`),
  KEY `suppliers_status_code_index` (`status`,`code`),
  KEY `suppliers_name_ar_status_index` (`name_ar`,`status`),
  KEY `suppliers_name_en_status_index` (`name_en`,`status`),
  CONSTRAINT `suppliers_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `suppliers_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tax_settings`
--

DROP TABLE IF EXISTS `tax_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tax_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `rate` decimal(5,2) DEFAULT NULL,
  `is_tax_inclusive` tinyint(1) NOT NULL DEFAULT 0,
  `tax_number` varchar(255) DEFAULT NULL,
  `effective_from` timestamp NULL DEFAULT NULL,
  `effective_to` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `policy_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tax_settings_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tax_settings`
--

LOCK TABLES `tax_settings` WRITE;
/*!40000 ALTER TABLE `tax_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `tax_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translation_overrides`
--

DROP TABLE IF EXISTS `translation_overrides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translation_overrides` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(2) NOT NULL,
  `group` varchar(120) NOT NULL,
  `translation_key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `updated_by` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translation_overrides_locale_group_translation_key_unique` (`locale`,`group`,`translation_key`),
  KEY `translation_overrides_updated_by_foreign` (`updated_by`),
  CONSTRAINT `translation_overrides_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translation_overrides`
--

LOCK TABLES `translation_overrides` WRITE;
/*!40000 ALTER TABLE `translation_overrides` DISABLE KEYS */;
/*!40000 ALTER TABLE `translation_overrides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_branch_scopes`
--

DROP TABLE IF EXISTS `user_branch_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_branch_scopes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `branch_id` bigint(20) unsigned NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_branch_scopes_user_id_branch_id_unique` (`user_id`,`branch_id`),
  KEY `user_branch_scopes_branch_id_foreign` (`branch_id`),
  CONSTRAINT `user_branch_scopes_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_branch_scopes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_branch_scopes`
--

LOCK TABLES `user_branch_scopes` WRITE;
/*!40000 ALTER TABLE `user_branch_scopes` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_branch_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_store_scopes`
--

DROP TABLE IF EXISTS `user_store_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_store_scopes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `store_id` bigint(20) unsigned NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_store_scopes_user_id_store_id_unique` (`user_id`,`store_id`),
  KEY `user_store_scopes_store_id_foreign` (`store_id`),
  CONSTRAINT `user_store_scopes_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_store_scopes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_store_scopes`
--

LOCK TABLES `user_store_scopes` WRITE;
/*!40000 ALTER TABLE `user_store_scopes` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_store_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_ui_preferences`
--

DROP TABLE IF EXISTS `user_ui_preferences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_ui_preferences` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `appearance` varchar(255) NOT NULL DEFAULT 'system',
  `accent_color` varchar(255) NOT NULL DEFAULT 'teal',
  `sidebar_mode` varchar(255) NOT NULL DEFAULT 'expanded',
  `navbar_mode` varchar(255) NOT NULL DEFAULT 'sticky',
  `content_width` varchar(255) NOT NULL DEFAULT 'wide',
  `table_density` varchar(255) NOT NULL DEFAULT 'comfortable',
  `font_scale` varchar(255) NOT NULL DEFAULT 'normal',
  `reduced_motion` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_ui_preferences_user_id_unique` (`user_id`),
  CONSTRAINT `user_ui_preferences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_ui_preferences`
--

LOCK TABLES `user_ui_preferences` WRITE;
/*!40000 ALTER TABLE `user_ui_preferences` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_ui_preferences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_status_index` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Local System Administrator','local.system-administrator','local.system-administrator@example.test','active','2026-08-20 09:47:00','$2y$12$ZeYeEx.YyRKWOg9OWwGqxOHApdkUQ9JJbkZB3AzFSKY9BooFtq5oe',1,NULL,NULL,NULL,NULL,'2026-08-20 09:47:00','2026-08-20 09:47:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'toyjoy_local'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-20 13:22:52
