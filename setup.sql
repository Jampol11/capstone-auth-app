-- Capstone Authentication Database Setup
-- Run this script to create the capstone_db database and users table

CREATE DATABASE IF NOT EXISTS capstone_db;

USE capstone_db;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Optional: Insert a test user (remove in production)
-- INSERT INTO users (firstname, lastname, email, password) VALUES ('Test', 'User', 'test@example.com', '$2y$10$examplehashedpassword');

-- Verify table creation
DESCRIBE users;