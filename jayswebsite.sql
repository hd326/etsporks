-- create and select the database
DROP DATABASE IF EXISTS jayswebsite;
CREATE DATABASE jayswebsite;
USE jayswebsite;

-- create the tables for the database
-- these relate directly to the addresses
CREATE TABLE customers (
  customerID        INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(60)    NOT NULL,
  firstName         VARCHAR(60)    NOT NULL,
  lastName          VARCHAR(60)    NOT NULL,
  shipAddressID     INT                       DEFAULT NULL,
  billingAddressID  INT                       DEFAULT NULL,  
  PRIMARY KEY (customerID),
  UNIQUE INDEX emailAddress (emailAddress)
);

-- made in sql for auto incrementation
-- if it's auto incrementing 
CREATE TABLE addresses (
  addressID         INT            NOT NULL   AUTO_INCREMENT,
  customerID        INT            NOT NULL,
  line1             VARCHAR(60)    NOT NULL,
  line2             VARCHAR(60)               DEFAULT NULL,
  city              VARCHAR(40)    NOT NULL,
  state             VARCHAR(2)     NOT NULL,
  zipCode           VARCHAR(10)    NOT NULL,
  phone             VARCHAR(12)    NOT NULL,
  disabled          TINYINT(1)     NOT NULL   DEFAULT 0,
  PRIMARY KEY (addressID),
  INDEX customerID (customerID)
);


/*
CREATE TABLE orders (
  orderID           INT            NOT NULL   AUTO_INCREMENT,
  customerID        INT            NOT NULL,
  orderDate         DATETIME       NOT NULL,
  shipAmount        DECIMAL(10,2)  NOT NULL,
  taxAmount         DECIMAL(10,2)  NOT NULL,
  shipDate          DATETIME                  DEFAULT NULL,
  shipAddressID     INT            NOT NULL,
  cardType          INT            NOT NULL,
  cardNumber        CHAR(16)       NOT NULL,
  cardExpires       CHAR(7)        NOT NULL,
  billingAddressID  INT            NOT NULL,
  PRIMARY KEY (orderID), 
  INDEX customerID (customerID)
);
*/
CREATE TABLE customers (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    customer_id VARCHAR (255) NOT NULL,
    first_name VARCHAR (255) NOT NULL,
    last_name VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    phone_number VARCHAR (255) NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE transactions (
    order_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    transaction_id VARCHAR(255) NOT NULL,
    customer_id VARCHAR(255) NOT NULL,
    email_phone VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    company VARCHAR(255) NULL,
    address VARCHAR(255) NOT NULL,
    apt VARCHAR(255) NULL,
    city VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    zip VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    mirror VARCHAR(255) NULL,
    brush VARCHAR(255) NULL,
    shipping_method VARCHAR(255) NOT NULL,
    subtotal VARCHAR(20) NOT NULL,
    shipping VARCHAR(20) NOT NULL,
    total VARCHAR(20) NOT NULL
);

CREATE TABLE orderItems (
  itemID            INT            NOT NULL   AUTO_INCREMENT,
  orderID           INT            NOT NULL,
  productID         INT            NOT NULL,
  itemPrice         DECIMAL(10,2)  NOT NULL,
  discountAmount    DECIMAL(10,2)  NOT NULL,
  quantity          INT NOT NULL,
  PRIMARY KEY (itemID), 
  INDEX orderID (orderID), 
  INDEX productID (productID)
);

/*
From RK Tutorial, we have 

Categories: Women, Men

Brands: Sony, HP, Samsung

then we have Products: "", "", ""
*/

CREATE TABLE products (
  productID         INT            NOT NULL   AUTO_INCREMENT,
  categoryID        INT            NOT NULL,
  productCode       VARCHAR(255)    NOT NULL,
  productName       VARCHAR(255)   NOT NULL,
  description       TEXT           NOT NULL,
  listPrice         DECIMAL(10,2)  NOT NULL,
  discountPercent   DECIMAL(10,2)  NOT NULL   DEFAULT 0.00,
  facebookUrl       VARCHAR(255)   NULL,
  twitterUrl        VARCHAR(255)   NULL,
  googleUrl         VARCHAR(255)   NULL,
  email             VARCHAR(255)   NULL,
  pinterestUrl      VARCHAR(255)   NULL,
  tumblrUrl         VARCHAR(255)   NULL,
      
  PRIMARY KEY (productID), 
  INDEX categoryID (categoryID), 
  UNIQUE INDEX productCode (productCode)
);

INSERT INTO products (productID, categoryID, productCode, productName, description, listPrice, discountPercent, facebookUrl, twitterUrl, googleUrl, email, pinterestUrl, tumblrUrl) VALUES
(1, 1, 'get_et_spork2', 'Mirror', 'ET Spork ( Brush Finish )',  '9.00', '0.00', 
 
 'https://www.facebook.com/dialog/share?app_id=186393342238922&display=popup&href=https://etspork.com', 
 
 'http://twitter.com/share?url=https://www.etspork.com', 
 
 'https://plus.google.com/share?url=https://www.etspork.com', 
 
 'mailto: support@etspork.com', 
 
 'https://www.pinterest.com/pin/create/button/?url=http://www.etspork.com&media=https://etspork.com/image/Et1Mirror.jpg',
 
 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=https://etspork.com" data-content="https://www.etspork.com/image/Et1Brush.jpg'),

(2, 1, 'get_et_spork3', 'Brush', 'ET Spork ( Mirror Finish )', '9.00', '0.00', 
 
 'https://www.facebook.com/dialog/share?app_id=186393342238922&display=popup&href=https://etspork.com', 
 
 'http://twitter.com/share?url=https://www.etspork.com', 
 
 'https://plus.google.com/share?url=https://www.etspork.com', 
 
 'mailto: support@etspork.com', 
 
 'https://www.pinterest.com/pin/create/button/?url=http://www.etspork.com&media=https://etspork.com/image/Et1Brush.jpg', 
 
 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=https://etspork.com" data-content="https://www.etspork.com/image/Et1Mirror.jpg');
 
 UPDATE products SET productCode = 'get_et_spork2' WHERE productID = 1;

CREATE TABLE categories (
  categoryID        INT            NOT NULL   AUTO_INCREMENT,
  categoryName      VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE administrators (
  adminID           INT            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(255)   NOT NULL,
  lastName          VARCHAR(255)   NOT NULL,
  PRIMARY KEY (adminID)
);

-- Create a user named mgs_user
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO user
IDENTIFIED BY '';