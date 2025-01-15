CREATE DATABASE LibraryDB;

USE LibraryDB;

CREATE TABLE books (
    accession_number INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    authors VARCHAR(255) NOT NULL,
    edition VARCHAR(100),
    publisher VARCHAR(255)
);
