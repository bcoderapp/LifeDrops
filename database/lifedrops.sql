CREATE TABLE donors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    blood_group ENUM('A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-') NOT NULL,
    area VARCHAR(100) NOT NULL,
    contact_no VARCHAR(15) NOT NULL,
    alt_contact_no VARCHAR(15)
);
