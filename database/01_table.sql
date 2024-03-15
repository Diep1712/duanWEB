DROP DATABASE IF EXISTS `team_2_shop` ;
CREATE DATABASE `team_2_shop`;
use `team_2_shop`;
CREATE TABLE `admin` (
    `admin_id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `role` TINYINT not null,
    `create_by` VARCHAR(50),
    `is_active` BOOLEAN DEFAULT true,
    `is_deleted` BOOLEAN DEFAULT FALSE,
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `category_news` (
    `category_news_id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(200) not null,
    `create_by` VARCHAR(50),
    `is_deleted` BOOLEAN DEFAULT FALSE,	
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE `news` (
    `news_id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(50) NOT NULL,
    `category_news_id` INT NOT NULL,
    `admin_id` INT NOT NULL,
    `content` text not null,
    `img` VARCHAR(500) not null,
    `create_by` VARCHAR(50),
    `is_deleted` BOOLEAN DEFAULT FALSE,
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`category_news_id`)
        REFERENCES `category_news` (`category_news_id`),
    FOREIGN KEY (`admin_id`)
        REFERENCES `admin` (`admin_id`)
);
CREATE TABLE `customer` (
    `customer_id` INT PRIMARY KEY AUTO_INCREMENT,
    `full_name` varchar(50) not null,
    `user_name` VARCHAR(50) NOT NULL unique,
    `gender` ENUM('-1', '0', '1') not null,
    `age` INT ,
    `phone_number` VARCHAR(32) NOT NULL,
    `mail` VARCHAR(50) ,
    `address` VARCHAR(200),
    `password` VARCHAR(50) not null,
    `create_by` VARCHAR(50),
    `is_active` BOOLEAN DEFAULT TRUE,
    `is_deleted` BOOLEAN DEFAULT FALSE,
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);
select *from customer;
CREATE TABLE `category_product` (
    `category_product_id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) not null,
    `create_by` VARCHAR(50),
    `is_deleted` BOOLEAN DEFAULT FALSE,
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);
insert into `category_product`(`name`) value ('Nam'),('Nữ'),('Thủ công'),('Quà sinh nhật');

CREATE TABLE `product` (
    `product_id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) not null,
    `description` varchar(500) not null,
    `img` varchar(500) not null,
    `price` DOUBLE not null check(price>0),
    `quantity` int not null check(quantity>=0),
    `create_by` VARCHAR(50),
    `is_deleted` BOOLEAN DEFAULT FALSE,
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE `cart` (
    `cart_id` INT PRIMARY KEY AUTO_INCREMENT,
    `customer_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `quantity` INT NOT NULL,
   `create_by` VARCHAR(50),
    `is_deleted` BOOLEAN DEFAULT FALSE,
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`customer_id`) REFERENCES `customer`(`customer_id`),
        FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`)
);


CREATE TABLE `category_product_detail` (
    `category_product_detail` INT PRIMARY KEY AUTO_INCREMENT,
    `category_product_id` INT NOT NULL,
    `product_id` INT NOT NULL,
  
    `create_by` VARCHAR(50),
    `is_deleted` BOOLEAN DEFAULT FALSE,
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`category_product_id`)
        REFERENCES `category_product` (`category_product_id`),
    FOREIGN KEY (`product_id`)
        REFERENCES `product` (`product_id`)
);
-- insert into `order`(`customer_id`,`full_name`,`phone_number`,`address`,`value_order`,`order_status_price`) value 
-- (1,'hiepne','21412341234','ha nam',1000,1);-- 

CREATE TABLE `order` (
    `order_id` INT PRIMARY KEY AUTO_INCREMENT,
    `customer_id` int not null,
    `admin_id` int not null default 1,
    `value_order` double not null,
    `order_status` ENUM('-1', '0', '1') default '0',-- trạng thái đã hủy chờ xác nhận xác nhận
    `order_status_price` boolean,
    `delivery_time` datetime, -- thời gian nhận hàng
    `create_by` VARCHAR(50),
    `is_deleted` BOOLEAN DEFAULT FALSE,
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `address` varchar(500),
    `phone_number` varchar(50),
    `full_name` varchar(50),
    FOREIGN KEY (`customer_id`) REFERENCES `customer`(`customer_id`),
    FOREIGN KEY (`admin_id`) REFERENCES `admin`(`admin_id`)
);

CREATE TABLE `order_detail` (
    `order_detail_id` INT PRIMARY KEY AUTO_INCREMENT,
    `order_id` int not null,
    `product_id` int not null,
    `price` double check(price>=0),
    `quantity` int not null default 1 check(quantity>=0),
    `value` double not null default (price * quantity) check(value>=0),
    `create_by` VARCHAR(50),
    `is_deleted` BOOLEAN DEFAULT FALSE,
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
     FOREIGN KEY (`order_id`) REFERENCES `order`(`order_id`),
	 FOREIGN KEY (`product_id`) REFERENCES `product`(`product_id`)
);
select*from order_detail;



CREATE TABLE `feedback` (
    `feedback_id` INT PRIMARY KEY AUTO_INCREMENT,
    `customer_id` INT NOT NULL,
    `order_detail_id` INT NOT NULL,
    `rating` TINYINT not null,
    `content` VARCHAR(500) NOT NULL,
    `status` enum('-1','0','1') default 1,
    `create_by` VARCHAR(50),
    `is_deleted` BOOLEAN DEFAULT FALSE,
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`customer_id`)
        REFERENCES `customer` (`customer_id`),
    FOREIGN KEY (`order_detail_id`)
        REFERENCES `order_detail` (`order_detail_id`)
);


CREATE TABLE `shop_info` (
    `shop_info_id` INT PRIMARY KEY DEFAULT 1,
    `name` VARCHAR(150) not null,
    `address` VARCHAR(150) NOT NULL,
    `phone` CHAR(20) NOT NULL,
    `mail` VARCHAR(30) NOT NULL,
    `introduce` VARCHAR(500),
    `facebook_link` VARCHAR(255) NOT NULL,
    `create_by` VARCHAR(50),
    `is_deleted` BOOLEAN DEFAULT FALSE,
    `create_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);
