CREATE DATABASE IF NOT EXISTS restaurant;

USE restaurant;

CREATE TABLE 'menuItem' (
  'id' int(11) NOT NULL,
  'name' varchar(255) NOT NULL,
  'price' decimal(10,2) NOT NULL,
  'description' varchar(255),
  'inStock' tinyint(1) NOT NULL,
  PRIMARY KEY('id')
);

CREATE TABLE 'user' (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
);
