CREATE DATABASE registration
USE registration;


CREATE TABLE `user` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    dob DATE NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phoneno VARCHAR(15) NOT NULL
);

