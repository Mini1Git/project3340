-- Active: 1774042082208@@127.0.0.1@3306@grillow
-- inserting with restaurants--
INSERT INTO Customer(user_id, name, email, phone_number, address, password) VALUES
    (1, 'Liana', 'bell23@uwindsor.ca', '+1 519-555-0001', '123 Garden Lane', 'password1!'),
    (2, 'Wilson', 'wilsontran@uwindsor.ca', '+1 519-555-0002', '456 Peach St', 'password2!'),
    (3, 'Nazifa', 'nazifatahsin@uwindsor.ca', '+1 519-555-0003', '789 Wyandotte St', 'password3!'),
    (4, 'Kayden', 'kaydenions@uwindsor.ca', '+1 519-555-0004', '287 Jenkins Ave', 'password4!'),
    (5, 'Sophie', 'soph@gmail.com', '+1 226-555-0001', '1000 George St', 'password5!'),
    (6, 'George', 'george@gmail.com', '+1 226-555-0002', '356 Crescent Ct', 'password6!'),
    (7, 'Ellie', 'ellie@gmail.com', '+1 226-555-0003', '342 Apple Blvd', 'password7!'),
    (8, 'Jack', 'jack@gmail.com', '+1 226-555-0004', '876 Tecumseh St', 'password8!'),
    (9, 'Isaiah', 'isaiah@gmail.com', '+1 519-555-0005', '223 University St', 'password9!')
;

INSERT INTO Customer_Order (order_id, customer_id, order_date, total_price, order_status) VALUES
-- Liana (Cust 1)
    (1, 1, '2026-03-01', 24.48, 1), 
    (2, 1, '2026-03-05', 9.98, 1), 
    (3, 1, '2026-03-10', 6.50, 1), 
    (4, 1, '2026-03-15', 17.49, 1),
    (37, 1, '2026-03-06', 46.49, 1), 
    (38, 1, '2026-03-11', 19.50, 1), 
    (39, 1, '2026-03-16', 17.00, 1), 
    (40, 1, '2026-03-21', 14.99, 1),
    -- Wilson (Cust 2)
    (5, 2, '2026-03-02', 12.49, 1), 
    (6, 2, '2026-03-06', 11.50, 1), 
    (7, 2, '2026-03-11', 22.00, 1), 
    (8, 2, '2026-03-16', 8.50, 1),
    -- Nazifa (Cust 3)
    (9, 3, '2026-03-03', 17.00, 1), 
    (10, 3, '2026-03-07', 12.00, 1), 
    (11, 3, '2026-03-12', 11.00, 1), 
    (12, 3, '2026-03-17', 13.99, 1),
    -- Kayden (Cust 4)
    (13, 4, '2026-03-04', 11.49, 1), 
    (14, 4, '2026-03-08', 26.99, 1), 
    (15, 4, '2026-03-13', 18.00, 1), 
    (16, 4, '2026-03-18', 6.50, 1),
    -- Sophie (Cust 5)

    (17, 5, '2026-03-01', 30.00, 1), 
    (18, 5, '2026-03-05', 15.00, 1), 
    (19, 5, '2026-03-10', 12.50, 1), 
    (20, 5, '2026-03-15', 12.99, 1),
    -- George (Cust 6)
    (21, 6, '2026-03-02', 19.50, 1), 
    (22, 6, '2026-03-06', 11.50, 1), 
    (23, 6, '2026-03-11', 9.99, 1), 
    (24, 6, '2026-03-16', 5.25, 1),
    -- Ellie (Cust 7)
    (25, 7, '2026-03-03', 21.00, 1), 
    (26, 7, '2026-03-07', 13.99, 1), 
    (27, 7, '2026-03-12', 17.97, 1), 
    (28, 7, '2026-03-17', 7.50, 1),
    -- Jack (Cust 8)
    (29, 8, '2026-03-04', 26.99, 1), 
    (30, 8, '2026-03-08', 19.50, 1), 
    (31, 8, '2026-03-13', 14.99, 1), 
    (32, 8, '2026-03-18', 12.00, 1),
    -- Isaiah (Cust 9)
    (33, 9, '2026-03-05', 11.50, 1), 
    (34, 9, '2026-03-10', 10.99, 1), 
    (35, 9, '2026-03-15', 10.49, 1), 
    (36, 9, '2026-03-20', 11.00, 1)
;

INSERT INTO Order_Item (order_id, product_id, unit_price, quantity, subtotal) VALUES
    -- Order 1 (The Hungry Bunny): 1 Bowl + 1 Taco
    (1, 110101, 12.99, 1, 12.99), (1, 110102, 11.49, 1, 11.49),
    -- Order 2 (The Tippy Teapot): 2 London Fogs
    (2, 110501, 4.99, 2, 9.98),
    -- Order 3 (The Cozy Crumb): 1 Sourdough Loaf
    (3, 111301, 6.50, 1, 6.50),
    -- Order 4 (Flutterby Fries): 1 Burger + 1 Fries
    (4, 111610, 12.50, 1, 12.50), (4, 111601, 4.99, 1, 4.99),
    -- Order 5 (Paws & Pancakes): Bear Claw Waffles
    (5, 110402, 12.49, 1, 12.49),
    -- Order 6 (Moonbeam): Moon Panini
    (6, 110308, 11.50, 1, 11.50),
    -- Order 7 (Cloud Nine): Box of Macarons
    (7, 111504, 22.00, 1, 22.00),
    -- Order 8 (Berry Bliss): Blueberry Blast
    (8, 110801, 8.50, 1, 8.50),
    -- Order 9 (Skyki): Hot Chicken
    (9, 111003, 17.00, 1, 17.00),
    -- Order 10 (Sprinkle Sparkle): Box of Macarons
    (10, 110202, 12.00, 1, 12.00),
    -- Order 11 (Cool Cat): 5 Stack Pancakes
    (11, 110706, 11.00, 1, 11.00),
    -- Order 12 (Paws & Pancakes): Breakfast Burrito
    (12, 110405, 13.99, 1, 13.99),
    -- Order 13 (The Hungry Bunny): Carrot Tacos
    (13, 110102, 11.49, 1, 11.49),
    -- Order 14 (Skyki): Skyki Ribs
    (14, 111001, 26.99, 1, 26.99),
    -- Order 15 (Cloud Nine): Assorted Candy (Quantity 3)
    (15, 111509, 6.00, 3, 18.00),
    -- Order 16 (Velvet Vanilla): Velvet Milkshake
    (16, 111208, 6.50, 1, 6.50),
    -- Order 17 (Dancing Donut): Assorted 12-pack
    (17, 110901, 2.50, 12, 30.00),
    -- Order 18 (Cloud Nine): Cotton Cloud Candy (Quantity 3)
    (18, 111501, 5.00, 3, 15.00),
    -- Order 19 (Sunny Side Up): French Toast
    (19, 111104, 12.50, 1, 12.50),
    -- Order 20 (The Hungry Bunny): Garden Green Bowl
    (20, 110101, 12.99, 1, 12.99),
    -- Order 21 (Skyki): Brisket
    (21, 111002, 19.50, 1, 19.50),
    -- Order 22 (Sunny Side Up): Morning Burrito
    (22, 111102, 11.50, 1, 11.50),
    -- Order 23 (Sunny Side Up): The Sunny Classic
    (23, 111101, 9.99, 1, 9.99),
    -- Order 24 (Moonbeam): Midnight Mocha
    (24, 110301, 5.25, 1, 5.25),
    -- Order 25 (Flutterby Fries): Burger + Loaded Fries
    (25, 111610, 12.50, 1, 12.50), (25, 111603, 8.50, 1, 8.50),
    -- Order 26 (Flutterby Fries): Wings & Fries Combo
    (26, 111604, 13.99, 1, 13.99),
    -- Order 27 (Giggling Gelato): 3 Pistachio Dreams
    (27, 110601, 5.99, 3, 17.97),
    -- Order 28 (Velvet Vanilla): Panna Cotta
    (28, 111209, 7.50, 1, 7.50),
    -- Order 29 (Skyki): Skyki Ribs
    (29, 111001, 26.99, 1, 26.99),
    -- Order 30 (Skyki): Brisket
    (30, 111002, 19.50, 1, 19.50),
    -- Order 31 (Skyki): Pulled Pork
    (31, 111004, 14.99, 1, 14.99),
    -- Order 32 (Sprinkle Sparkle): Rainbow Macarons
    (32, 110202, 12.00, 1, 12.00),
    -- Order 33 (Sunny Side Up): Morning Burrito
    (33, 111102, 11.50, 1, 11.50),
    -- Order 34 (Sunny Side Up): Avocado Toast
    (34, 111103, 10.99, 1, 10.99),
    -- Order 35 (Sunny Side Up): Hash Browns + Slider
    (35, 111106, 5.99, 1, 5.99), (35, 111110, 4.50, 1, 4.50),
    -- Order 36 (Sunny Side Up): Belgian Morning
    (36, 111108, 11.00, 1, 11.00),
    -- Order 37 (Skyki): Ribs + Brisket
    (37, 111001, 26.99, 1, 26.99), (37, 111002, 19.50, 1, 19.50),
    -- Order 38 (Skyki): Brisket
    (38, 111002, 19.50, 1, 19.50),
    -- Order 39 (Skyki): Hot Chicken
    (39, 111003, 17.00, 1, 17.00),
    -- Order 40 (Skyki): Pulled Pork
    (40, 111004, 14.99, 1, 14.99)
;

INSERT INTO Payment (payment_id, order_id, method, amount, payment_date, payment_status) VALUES
    (1, 'Credit', 24.48, '2026-03-01', 1), 
    (2, 'Debit', 9.98, '2026-03-05', 1), 
    (3, 'PayPal', 6.50, '2026-03-10', 1), 
    (4, 'Cash', 17.49, '2026-03-15', 1),
    (5, 'Credit', 12.49, '2026-03-02', 1), 
    (6, 'Debit', 11.50, '2026-03-06', 1), 
    (7, 'PayPal', 22.00, '2026-03-11', 1), 
    (8, 'Cash', 8.50, '2026-03-16', 1),
    (9, 'Credit', 17.00, '2026-03-03', 1), 
    (10, 'Debit', 12.00, '2026-03-07', 1), 
    (11, 'PayPal', 11.00, '2026-03-12', 1), 
    (12, 'Cash', 13.99, '2026-03-17', 1),
    (13, 'Credit', 11.49, '2026-03-04', 1), 
    (14, 'Debit', 26.99, '2026-03-08', 1), 
    (15, 'PayPal', 18.00, '2026-03-13', 1), 
    (16, 'Cash', 6.50, '2026-03-18', 1),
    (17, 'Credit', 30.00, '2026-03-01', 1), 
    (18, 'Debit', 15.00, '2026-03-05', 1), 
    (19, 'PayPal', 12.50, '2026-03-10', 1), 
    (20, 'Cash', 12.99, '2026-03-15', 1),
    (21, 'Credit', 19.50, '2026-03-02', 1), 
    (22, 'Debit', 11.50, '2026-03-06', 1), 
    (23, 'PayPal', 9.99, '2026-03-11', 1), 
    (24, 'Cash', 5.25, '2026-03-16', 1),
    (25, 'Credit', 21.00, '2026-03-03', 1), 
    (26, 'Debit', 13.99, '2026-03-07', 1), 
    (27, 'PayPal', 17.97, '2026-03-12', 1), 
    (28, 'Cash', 7.50, '2026-03-17', 1),
    (29, 'Credit', 26.99, '2026-03-04', 1), 
    (30, 'Debit', 19.50, '2026-03-08', 1), 
    (31, 'PayPal', 14.99, '2026-03-13', 1), 
    (32, 'Cash', 12.00, '2026-03-18', 1),
    (33, 'Credit', 11.50, '2026-03-05', 1), 
    (34, 'Debit', 10.99, '2026-03-10', 1), 
    (35, 'PayPal', 10.49, '2026-03-15', 1), 
    (36, 'Cash', 11.00, '2026-03-20', 1),
    (37, 'Credit', 46.49, '2026-03-06', 1), 
    (38, 'Debit', 19.50, '2026-03-11', 1), 
    (39, 'PayPal', 17.00, '2026-03-16', 1), 
    (40, 'Cash', 14.99, '2026-03-21', 1)
;