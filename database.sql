
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`username`, `password`, `name`) VALUES
('admin', 'password123', 'ผู้ดูแลระบบ');

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_code` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `employees` (`emp_code`, `fullname`, `department`, `position`, `salary`) VALUES
('EMP001', 'สมชาย ใจดี', 'ไอที', 'นักพัฒนาระบบ', 35000.00),
('EMP002', 'สมหญิง รักงาน', 'บัญชี', 'พนักงานบัญชี', 28000.00);

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_code` varchar(20) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`prod_code`, `name`, `price`, `stock`) VALUES
('PRD001', 'Laptop Dell XPS 13', 45000.00, 15),
('PRD002', 'Wireless Mouse Logitech', 850.00, 50);
