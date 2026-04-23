-- This creates your table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(50) DEFAULT 'student'
);

INSERT INTO users (name, email, password, role) 
VALUES ('Ahmad Student', 'student@university.edu.pk', '$2y$10$wN9F4kG2hZ9.G.h.U1.u2.p.q/q.q.q.q.q.q.q.q.q.q.q.q.q.q.q', 'student'); 