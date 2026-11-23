-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2026 at 03:14 PM
-- Server version: 10.11.16-MariaDB
-- PHP Version: 8.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartcity_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `job_ref` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  `salary` varchar(100) NOT NULL,
  `reports_to` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `responsibilities` text NOT NULL,
  `essential_req` text NOT NULL,
  `preferable_req` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_ref`, `title`, `summary`, `salary`, `reports_to`, `location`, `responsibilities`, `essential_req`, `preferable_req`) VALUES
(1, 'FS001', 'Senior Full-Stack Engineer', 'Architect and deploy real-time transit telematics interfaces and microservices using React, Node.js, and high-performance WebSocket streams.', 'AUD 7,000 - 10,000 per month, depending on experience', 'Head of Smart Transit & Urban Mobility', 'Melbourne / Remote (Hybrid)', 'Architect responsive telematics dashboards for municipal transit operators using React.\nBuild high-throughput microservices for real-time vehicle GPS tracking with Node.js.\nIntegrate WebSocket streams for live passenger information systems.\nReview code and mentor junior full-stack developers in spatial data handling.\nWork closely with city planners and product owners to translate requirements into features.', 'Bachelor\'s degree in Computer Science, Software Engineering or related field.\n5+ years of professional full-stack web development experience.\nStrong proficiency in JavaScript (ES6+), React, and Node.js.\nExperience handling real-time data streaming and WebSockets.', 'Experience with TypeScript and GIS mapping libraries (Leaflet / Mapbox).\nFamiliarity with containerised deployment via Docker and Kubernetes.\nPrior work in intelligent transportation or telematics systems.'),
(2, 'DO017', 'DevOps & Cloud Architect', 'Engineer secure, fault-tolerant cloud infrastructures and automated CI/CD pipelines governing critical smart grid SCADA and urban services data.', 'AUD 8,000 - 11,500 per month, depending on experience', 'Head of Critical Infrastructure & Security', 'Melbourne / Remote (Hybrid)', 'Design and maintain automated CI/CD pipelines for smart grid and urban data services.\nArchitect fault-tolerant cloud infrastructure on AWS/GCP using Terraform (IaC).\nOperate and scale high-availability Kubernetes clusters for critical SCADA telemetry.\nEnforce strict zero-trust security controls across municipal cloud endpoints.\nLead incident response and post-incident reviews for high-reliability infrastructure.', 'Bachelor\'s degree in Computer Science, IT or a related field.\n5+ years of experience in DevOps, Cloud Engineering, or Systems Architecture.\nHands-on expertise with Docker, Kubernetes, Terraform, and Linux administration.\nStrong knowledge of cloud network security and encryption standards.', 'AWS or GCP Solutions Architect / DevOps Professional certification.\nExperience with Grafana, Prometheus, and IoT telemetry monitoring tools.\nUnderstanding of industrial SCADA systems or smart utility networks.'),
(3, 'DT023', 'Smart City IoT & Data Engineer', 'Develop streaming data pipelines for municipal sensor fleets, microgrid battery storage systems, and urban digital twin visualization dashboards.', 'AUD 7,500 - 11,000 per month, depending on experience', 'Head of Energy & Environmental Analytics', 'Melbourne / Remote', 'Build streaming data pipelines ingesting telemetry from thousands of municipal IoT sensors.\nDevelop data models for microgrid battery storage optimization and energy analytics.\nIntegrate spatial data APIs with 3D urban digital twin visualization dashboards.\nMonitor sensor data quality and automate automated anomaly detection workflows.\nCollaborate with environmental scientists and city councils on carbon-reduction metrics.', 'Bachelor\'s or Master\'s degree in Data Engineering, Computer Science or related field.\n3+ years of professional experience in data engineering or IoT systems.\nStrong Python skills and hands-on experience with Apache Kafka, Spark, or SQL.\nExperience building robust ETL pipelines and handling time-series data.', 'Familiarity with MQTT, CoAP, or edge computing protocols.\nExperience with Digital Twin software platforms or 3D geospatial rendering.\nKnowledge of renewable energy systems and smart grid data structures.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD UNIQUE KEY `job_ref` (`job_ref`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- database ()