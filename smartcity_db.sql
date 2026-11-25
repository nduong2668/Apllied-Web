-- phpMyAdmin SQL Dump
-- Database: `smartcity_db`

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

CREATE DATABASE IF NOT EXISTS `smartcity_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `smartcity_db`;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_ref` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  `salary` varchar(100) NOT NULL,
  `reports_to` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `responsibilities` text NOT NULL,
  `essential_req` text NOT NULL,
  `preferable_req` text NOT NULL,
  PRIMARY KEY (`job_id`),
  UNIQUE KEY `job_ref` (`job_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_ref`, `title`, `summary`, `salary`, `reports_to`, `location`, `responsibilities`, `essential_req`, `preferable_req`) VALUES
(1, 'FS001', 'Senior Full-Stack Engineer', 'Architect and deploy real-time transit telematics interfaces and microservices using React, Node.js, and high-performance WebSocket streams.', 'AUD 7,000 - 10,000 per month, depending on experience', 'Head of Smart Transit & Urban Mobility', 'Melbourne / Remote (Hybrid)', 'Architect responsive telematics dashboards for municipal transit operators using React.\nBuild high-throughput microservices for real-time vehicle GPS tracking with Node.js.\nIntegrate WebSocket streams for live passenger information systems.\nReview code and mentor junior full-stack developers in spatial data handling.\nWork closely with city planners and product owners to translate requirements into features.', 'Bachelor\'s degree in Computer Science, Software Engineering or related field.\n5+ years of professional full-stack web development experience.\nStrong proficiency in JavaScript (ES6+), React, and Node.js.\nExperience handling real-time data streaming and WebSockets.', 'Experience with TypeScript and GIS mapping libraries (Leaflet / Mapbox).\nFamiliarity with containerised deployment via Docker and Kubernetes.\nPrior work in intelligent transportation or telematics systems.'),
(2, 'DO017', 'DevOps & Cloud Architect', 'Engineer secure, fault-tolerant cloud infrastructures and automated CI/CD pipelines governing critical smart grid SCADA and urban services data.', 'AUD 8,000 - 11,500 per month, depending on experience', 'Head of Critical Infrastructure & Security', 'Melbourne / Remote (Hybrid)', 'Design and maintain automated CI/CD pipelines for smart grid and urban data services.\nArchitect fault-tolerant cloud infrastructure on AWS/GCP using Terraform (IaC).\nOperate and scale high-availability Kubernetes clusters for critical SCADA telemetry.\nEnforce strict zero-trust security controls across municipal cloud endpoints.\nLead incident response and post-incident reviews for high-reliability infrastructure.', 'Bachelor\'s degree in Computer Science, IT or a related field.\n5+ years of experience in DevOps, Cloud Engineering, or Systems Architecture.\nHands-on expertise with Docker, Kubernetes, Terraform, and Linux administration.\nStrong knowledge of cloud network security and encryption standards.', 'AWS or GCP Solutions Architect / DevOps Professional certification.\nExperience with Grafana, Prometheus, and IoT telemetry monitoring tools.\nUnderstanding of industrial SCADA systems or smart utility networks.'),
(3, 'DT023', 'Smart City IoT & Data Engineer', 'Develop streaming data pipelines for municipal sensor fleets, microgrid battery storage systems, and urban digital twin visualization dashboards.', 'AUD 7,500 - 11,000 per month, depending on experience', 'Head of Energy & Environmental Analytics', 'Melbourne / Remote', 'Build streaming data pipelines ingesting telemetry from thousands of municipal IoT sensors.\nDevelop data models for microgrid battery storage optimization and energy analytics.\nIntegrate spatial data APIs with 3D urban digital twin visualization dashboards.\nMonitor sensor data quality and automate automated anomaly detection workflows.\nCollaborate with environmental scientists and city councils on carbon-reduction metrics.', 'Bachelor\'s or Master\'s degree in Data Engineering, Computer Science or related field.\n3+ years of professional experience in data engineering or IoT systems.\nStrong Python skills and hands-on experience with Apache Kafka, Spark, or SQL.\nExperience building robust ETL pipelines and handling time-series data.', 'Familiarity with MQTT, CoAP, or edge computing protocols.\nExperience with Digital Twin software platforms or 3D geospatial rendering.\nKnowledge of renewable energy systems and smart grid data structures.');

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
-- (GenAI assistance - Google Gemini: EOI table schema for apply.php)
--

DROP TABLE IF EXISTS `eoi`;
CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL AUTO_INCREMENT,
  `job_ref` varchar(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('female','male','other') NOT NULL,
  `street_address` varchar(40) NOT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` enum('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
  `postcode` char(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `skills` varchar(255) NOT NULL DEFAULT '',
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') NOT NULL DEFAULT 'New',
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`EOInumber`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping sample data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_ref`, `first_name`, `last_name`, `dob`, `gender`, `street_address`, `suburb`, `state`, `postcode`, `email`, `phone`, `skills`, `other_skills`, `status`) VALUES
(1, 'FS001', 'Duong', 'Nguyen', '2005-04-18', 'male', '114 Special Street', 'Melbourne', 'VIC', '3000', 'duong.nguyen@example.com', '0412 345 678', 'IoT Telemetry, GIS Mapping, Cloud and Edge Computing', 'TypeScript, WebSocket transit dashboards, Leaflet spatial visualisations', 'New'),
(2, 'DO017', 'Sarah', 'Connor', '1996-09-12', 'female', '45 Harbour Road', 'Sydney', 'NSW', '2000', 'sarah.connor@example.com', '0423456789', 'SCADA, Cloud and Edge Computing', 'Terraform IaC, Kubernetes high-availability clusters, Prometheus monitoring', 'Current'),
(3, 'DT023', 'Alex', 'Tran', '1999-11-25', 'other', '18 Mitchell Street', 'Darwin', 'NT', '0800', 'alex.tran@example.com', '08 8901 2345', 'IoT Telemetry, Python Data Science', 'Apache Kafka streaming pipelines and MQTT microgrid sensor fleets', 'Final');

COMMIT;
