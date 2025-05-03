-- Create enquiries table
CREATE TABLE IF NOT EXISTS `enquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `machine_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('new','read','replied') NOT NULL DEFAULT 'new',
  PRIMARY KEY (`id`),
  KEY `machine_id` (`machine_id`),
  CONSTRAINT `enquiries_ibfk_1` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
