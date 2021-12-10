CREATE DATABASE IF NOT EXISTS restaurant;

USE restaurant;

CREATE TABLE IF NOT EXISTS menuItem (
  id int(11) NOT NULL,
  name varchar(255) NOT NULL,
  price double NOT NULL,
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
  quantity int(11) NOT NULL,
  FOREIGN KEY(id) references user(id),
  FOREIGN KEY(itemId) references menuItem(id)
);

CREATE TABLE IF NOT EXISTS orderhistory (
 id int(11) NOT NULL,
 cartTotal int(11) NOT NULL,
 locationName varchar(255) NOT NULL,
 dop varchar(255) NOT NULL,
 FOREIGN KEY(id) references user(id),
 FOREIGN KEY(locationName) references locations(name)
);

CREATE TABLE IF NOT EXISTS locations (
 id int(11) NOT NULL AUTO_INCREMENT,
 name varchar(255) NOT NULL,
 streetNumber int(11) NOT NULL,
 streetName varchar(255) NOT NULL,
 city varchar(255) NOT NULL,
 state varchar(255) NOT NULL,
 zipCode int(255) NOT NULL,
 PRIMARY KEY(id)
);

INSERT IGNORE INTO locations VALUES
(1, 'Athens Location', 605, 'Clayton Street', 'Athens', 'GA', 30601),
(2, 'Atlanta Location', 2, 'Muffin Man Way', 'Atlanta', 'GA', 30338);

INSERT IGNORE INTO user VALUES
(1, 'admin@mail.com', 'password', 'Master', 'Admin', '555-555-5555', 1),
(2, 'user1@mail.com', 'pwd1', 'Average', 'Joe', '555-666-6666', 0);

INSERT IGNORE INTO menuItem VALUES
(1, 'Bread Sticks', 9.99, 'As many as you can eat! Comes with a side of our house red sauce', 1),
(2, 'Housemade Focaccia Bread', 7.99, 'Gluten free with spinach & smoked gouda sauce', 1),
(3, 'Small Caesar Salad', 8.99, 'Exactly what you would expect', 1),
(4, 'Pasta Margherita', 15.99, 'Penne with tomato basil red onion garlic and fresh mozzarella', 1),
(5, 'Pesto Pasta', 13.99, 'Chefs Favorite!', 1),
(6, 'Tortelloni & Grilled Chicken Sausage', 18.99, 'Red peppers and spicy mascarpone cream sauce ', 1),
(7, 'Salted Caramel Budino', 9.99, 'Creme fraiche and maldon sea salt', 1),
(8, 'Italian Butter Cake', 9.99, 'Whipped lemon creme fraiche and cinnamon crumble on top', 1);
