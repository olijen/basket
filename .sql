CREATE DATABASE IF NOT EXISTS mvc;

USE mvc;

CREATE TABLE IF NOT EXISTS books (
id INT AUTO_INCREMENT,
author VARCHAR(20),
title VARCHAR(20),
pubyear INT,
price INT,
PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS basket (
id INT AUTO_INCREMENT,
customer VARCHAR(32),
time INT(10),
book INT,
quantity INT,
PRIMARY KEY(id),
FOREIGN KEY(book) REFERENCES books(id),
UNIQUE(book)
);