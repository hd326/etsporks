CREATE TABLE products (
product_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
product_cat INT NOT NULL,
product_brand INT NOT NULL,
product_title VARCHAR (255),
product_price INT NOT NULL,
product_desc text (300),
product_image text (100),
product_keywords text (100),
);

CREATE TABLE categories (
cat_id INT NOT NULL AUTO_INCREMENT PRIMARY KEYY,
cat_title text (100),
);

CREATE TABLE cart (
id INT(10) NOT NULL,
p_id INT(10) NOT NULL,
ip_add VARCHAR(250) NOT NULL,
user_id INT(10),
product_title VARCHAR(300),
product_image TEXT,
qty INT(100),
price INT(100),
total_amount INT(100)
);

CREATE TABLE brands (
brand_id INT(100),
brand_title TEXT(200),
);

CREATE TABLE user_info (
user_id INT(10),
first_name VARCHAR(300),
last_name VARCHAR(100),
email VARCHAR (300),
password VARCHAR (100),
mobile VARCHAR(10),
address1 VARCHAR (300),
address2 VARCHAR (200)
);