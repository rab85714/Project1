CREATE DATABASE IF NOT EXISTS restaurant;

USE restaurant;

CREATE TABLE IF NOT EXISTS menuItem (
  id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  price decimal(10,2) NOT NULL,
  description varchar(255),
  inStock tinyint(1) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS user (
  id int(11) NOT NULL AUTO_INCREMENT,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  firstName varchar(255) NOT NULL,
  lastName varchar(255) NOT NULL,
  phone varchar(255) NOT NULL,
  isAdmin tinyint(1) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS cart (
  id int(11) NOT NULL,
  itemId int(11) NOT NULL,
  PRIMARY KEY(id) references user(id),
  FOREIGN KEY(itemId) references menuItem(id)
);

CREATE TABLE IF NOT EXISTS orderhistory (
 id int(11) NOT NULL,
 itemId int(11) NOT NULL,
 dop varchar(255) NOT NULL,
 PRIMARY KEY(id),
 FOREIGN KEY(id) references user(id),
 FOREIGN KEY(itemId) references menuItem(id)
);

INSERT INTO user VALUES
(1, 'admin@mail.com', 'password', 'Master', 'Admin', '555-555-5555', 1),
(2, 'user1@mail.com', 'pwd1', 'Average', 'Joe', '555-666-6666', 0);

INSERT INTO menuItem VALUES
(1, 'Pasta', 12.00, 'Angel hair pasta with freshly churned butter and salt', 0)
(2, 'Pizza', 13.00, 'Gluten free, dairy free, red dye free, fun free pizza', 1)
