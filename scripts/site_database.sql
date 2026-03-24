-- Active: 1755301077799@@127.0.0.1@3306@grillow
-- creating the database 
CREATE DATABASE Grillow;
-- Customer table consisting of a composite key with username, email, and phone_number.
-- Six total fields to allow for the creation of an account and references within the other tables
CREATE TABLE Customer(
    user_id INT AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone_number VARCHAR(20),
    address VARCHAR(255),
    -- Password must also not be null given that a user account can only exists with a password
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY(user_id)
);

-- Table for the restaurant vendors. 
-- Contains nine total fields to allow for the reference of other tables and for contact purposes.
CREATE TABLE Restaurant_Vendor(
    restaurant_id INT AUTO_INCREMENT,
    business_name VARCHAR(100),
    -- Administrators name
    admin VARCHAR(100) NOT NULL,
    -- Email address of administrator / restaurant
    email VARCHAR(100) NOT NULL UNIQUE,
    -- Phone number of restaurant
    phone_number VARCHAR(20) NOT NULL,
    -- Address of restaurant
    address VARCHAR(255) NOT NULL,
    -- Rating can be null in this case if there are zero ratings for a vendor
    rating FLOAT,
    -- Card image (directory) to display, if the vendor doesn't input their own, the image will be replaced by a default
    image_path text DEFAULT "images/placeholder/placeholder.svg",
    -- Restaurant must be a type of cusine
    cuisine_name VARCHAR(255) NOT NULL,
    -- Restaurant id is the primary key for each restaurant
    PRIMARY KEY(restaurant_id)
);

-- Product table for the restaurants different products
-- Contains six different fields
CREATE TABLE Product(
    product_id INT AUTO_INCREMENT,
    vendor_id INT(11) NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    instock TINYINT(1) NOT NULL,
    -- The vendor id comes directly from the restaurant table
    FOREIGN KEY (vendor_id) REFERENCES Restaurant_Vendor(restaurant_id),
    -- Primary key is the product id given that each item is unique
    PRIMARY KEY (product_id)
);

-- Customer order table contains five fields. 
CREATE TABLE Customer_Order(
    -- Order ids will All be unique as a primary key
    order_id INT AUTO_INCREMENT,
    -- Customer id consists of a foreign key from the customer table. This foreign key references the username field
    customer_id INT NOT NULL,
    -- Date will never be null as it is kept track of by the system
    order_date DATE NOT NULL,
    -- Order must come with a price even when 0
    total_price DECIMAL(12, 2) NOT NULL,
    -- Order status is either true or false. True when fulfilled, false when unfulfilled
    order_status TINYINT(1) NOT NULL,
    FOREIGN KEY (customer_id) REFERENCES Customer(user_id),
    PRIMARY KEY(order_id)
);

-- Each order will contain an order item which exists here on the Order Item table
CREATE TABLE Order_Item(
    -- Order id and product id together will create a composite key
    order_id INT(11) NOT NULL,
    product_id INT(11) NOT NULL,
    -- The price of a single item
    unit_price DECIMAL(10, 2) NOT NULL,
    -- The quantity of this item
    quantity INT(11) NOT NULL,
    -- The price given the quantity of this item
    subtotal DECIMAL(12, 2) NOT NULL,
    FOREIGN KEY(order_id) REFERENCES Customer_Order(order_id),
    FOREIGN KEY(product_id) REFERENCES Product(product_id),
    PRIMARY KEY (order_id, product_id)
);

-- The payment table consists of all payment information by the user
CREATE TABLE Payment(
    -- The primary key for the payment
    payment_id INT AUTO_INCREMENT,
    order_id INT(11) NOT NULL,
    -- The payment method (credit, debit, cash, paypal, etc.)
    method VARCHAR(50) NOT NULL,
    -- The total amount of the order
    amount DECIMAL(12, 2) NOT NULL,
    -- The date of the payment
    payment_date DATE NOT NULL,
    -- If the payment was fulfilled or not
    payment_status TINYINT(1) NOT NULL,
    PRIMARY KEY (payment_id),
    FOREIGN KEY(order_id) REFERENCES Customer_Order(order_id)

);