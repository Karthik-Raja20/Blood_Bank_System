---------------------------------------------Note--------------------------------
-- Run this query to insert a static and temporary blood inventary 
-- INSERT INTO bloodstock (blood_type, units)
-- VALUES 
--     ('A+', 10),
--     ('A-', 8),
--     ('B+', 12),
--     ('B-', 5),
--     ('AB+', 6),
--     ('AB-', 3),
--     ('O+', 15),
--     ('O-', 7),
--     ('A+', 4),
--     ('O+', 9);







CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    blood_type VARCHAR(3) NOT NULL,
    role ENUM('Donor', 'Patient') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);





CREATE TABLE IF NOT EXISTS donors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    age INT NOT NULL,
    blood_type VARCHAR(3) NOT NULL,
    medical_history TEXT,
    medications TEXT,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




CREATE TABLE bloodstock (
    id INT AUTO_INCREMENT PRIMARY KEY,
    blood_type VARCHAR(3) NOT NULL,
    units INT NOT NULL,
    last_updated DATE DEFAULT CURRENT_DATE
);


CREATE TABLE blood_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    blood_type VARCHAR(5),
    quantity DECIMAL(4,2),
    required_date DATE,
    reason TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




