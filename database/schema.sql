-- NestUp Database Schema

CREATE DATABASE IF NOT EXISTS nestup;
USE nestup;

-- USERS TABLE
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('student', 'owner', 'admin') DEFAULT 'student',
    status ENUM('active', 'blocked', 'pending') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- HOSTELS TABLE
CREATE TABLE IF NOT EXISTS hostels (
    id INT AUTO_INCREMENT PRIMARY KEY,
    owner_id INT,
    name VARCHAR(255) NOT NULL,
    address TEXT NOT NULL,
    city VARCHAR(100) NOT NULL,
    university_near VARCHAR(255),
    distance_km DECIMAL(4,2),
    price_per_month DECIMAL(10,2),
    main_image VARCHAR(255),
    description TEXT,
    facilities TEXT, -- JSON or comma-separated: wifi,ac,food,etc.
    status ENUM('pending', 'verified', 'rejected', 'suspended') DEFAULT 'pending',
    rating DECIMAL(3,2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (owner_id) REFERENCES users(id) ON DELETE SET NULL
);

-- REVIEWS TABLE
CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hostel_id INT,
    user_id INT,
    rating INT CHECK (rating BETWEEN 1 AND 5),
    comment TEXT,
    status ENUM('visible', 'hidden', 'flagged') DEFAULT 'visible',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (hostel_id) REFERENCES hostels(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- SEED DATA (Optional)
INSERT INTO users (name, email, password, role) VALUES 
('Admin User', 'admin@nestup.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'), -- password: password
('John Owner', 'owner@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'owner'),
('Sarah Student', 'sarah@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'student');

INSERT INTO hostels (owner_id, name, address, city, university_near, distance_km, price_per_month, status, rating) VALUES 
(2, 'Al-Noor Boys Hostel', 'Plot 4, Canal Bank', 'Lahore', 'FAST NUCES', 0.3, 8000.00, 'verified', 4.7),
(2, 'Green View Hostel', 'Garden Town', 'Lahore', 'UET Lahore', 0.8, 6500.00, 'pending', 0.0),
(2, 'City Boys Hostel', 'Barkat Market', 'Lahore', 'Punjab University', 1.2, 5000.00, 'verified', 3.9);

INSERT INTO reviews (hostel_id, user_id, rating, comment) VALUES 
(1, 3, 5, 'Great hostel with amazing mess food! Highly recommended.'),
(3, 3, 4, 'Good value for money, but WiFi can be slow sometimes.');
