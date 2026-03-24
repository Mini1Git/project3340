-- Active: 1755301077799@@127.0.0.1@3306@grillow
-- inserting with restaurants--
INSERT INTO Restaurant_Vendor(business_name, admin, email, phone_number, address, rating, image_path, cuisine_name)
VALUES
    ("Be Desi", "Nazifa Tahsin", "bedesi123@gmail.com", "+1 0126872198", "234 Wyandot, Windsor", 4.2, "images/indianfood.jpg", "Indian"),
    ("McDongal's", "Wilson Tran", "mcdonald@gmail.com", "+1 7987987551", "8436 University Ave, Windsor", 3.5, "images/fastfood.jpg", "Fast food"),
    ("Sushi Yum", "Liana Bell", "sushiyum64@gmail.com", "+1 7904665523", "646 Campbell Ave, Windsor", 4.4, "images/sushi.jpg", "Japanese"),
    ("Italiana", "Kayden Ions", "italiana@gmail.com", "+1 6768667465", "287 Jenkins Ave, Windsor", 4.7, "images/italiana.jpg", "Italian"),
    ('Mexican Uncle', 'Luis Recardo', 'mexiunc23@gmail.com', '+1 2289419476', '456 Kennedy St, Windsor', 4.2, 'images/mexican uncle.jpg', 'Mexican'),
    ('Punjabi Tadka', 'Harmit Singh', 'punjabitad23@hotmail.com', '+1 7843532742', '232 Jenntte Ave, Windsor', 4.7, 'images/punjabi-tadka.jpg', 'Indian')
;

INSERT INTO Restaurant_Vendor(business_name, admin, email, phone_number, address, rating, cuisine_name) 
VALUES 
    ("Pizza Palace", "Bill", "pizza@gmail.com", "+1 5192223344", "456 Ouellette Ave, Windsor", 4.2, "Italian"),
    ("Sushi World", "Bob", "sushi@gmail.com", "+1 5195558899", "789 Riverside Dr, Windsor", 4.7, "Japanese"),
    ("Taco Fiesta", "Carlos", "taco@gmail.com", "+1 5198882233", "321 Tecumseh Rd, Windsor", 4.3, "Mexican"),
    ("Burger Hub", "Jake", "burger@gmail.com", "+1 5194441122", "654 University Ave, Windsor", 3.9, "Fast food"),
    ("Green Bowl", "Sarah", "green@gmail.com", "+1 5197776655", "987 Walker Rd, Windsor", 4.6, "Healthy"),
    ("Dragon Express", "Joe", "dragon@gmail.com", "+1 5191112233", "159 Howard Ave, Windsor", 4.1, "Chinese"),
    ("BBQ House", "Chris Johnson", "bbq@gmail.com", "+1 5199990000", "753 Dougall Ave, Windsor", 4.4, "BBQ"),
    ("Sweet Treats", "Emily Davis", "dessert@gmail.com", "+1 5196667777", "852 Erie St, Windsor", 4.8, "Dessert");
-- for restaurant 1
INSERT INTO Product (vendor_id, product_name, description, price, instock) 
VALUES 
(1, 'Butter Chicken', 'Creamy tomato-based curry with tender chicken', 14.99, 1),
(1, 'Chicken Biryani', 'Fragrant basmati rice with spiced chicken', 13.99, 1),
(1, 'Paneer Tikka', 'Grilled cottage cheese with spices and vegetables', 11.99, 1),
(1, 'Garlic Naan', 'Soft flatbread topped with garlic and butter', 3.99, 0),
(1, 'Chana Masala', 'Chickpeas cooked in a spicy tomato gravy', 10.99, 1),
(1, 'Lamb Rogan Josh', 'Slow-cooked lamb in a rich, spiced curry', 15.99, 1),
(1, 'Samosa', 'Crispy pastry filled with spiced potatoes and peas', 4.99, 1),
(1, 'Tandoori Chicken', 'Marinated chicken roasted in a tandoor oven', 13.49, 1),
(1, 'Palak Paneer', 'Spinach curry with cubes of paneer cheese', 11.49, 1),
(1, 'Mango Lassi', 'Sweet yogurt-based mango drink', 4.49, 0);


-- for restaurant 2
INSERT INTO Product (vendor_id, product_name, description, price, instock) 
VALUES 
(2, 'Classic Burger', 'Beef patty with lettuce, tomato, and cheese', 6.99, 1),
(2, 'Cheeseburger', 'Juicy beef burger with melted cheese', 7.49, 1),
(2, 'Chicken Nuggets', 'Crispy breaded chicken bites', 5.99, 0),
(2, 'French Fries', 'Golden crispy potato fries', 3.49, 0),
(2, 'Double Burger', 'Two beef patties with cheese and toppings', 8.99, 1),
(2, 'Chicken Sandwich', 'Fried chicken breast with mayo and lettuce', 6.99, 1),
(2, 'Milkshake', 'Creamy vanilla, chocolate, or strawberry shake', 4.99, 0),
(2, 'Soft Drink', 'Carbonated soda beverage', 2.49, 1),
(2, 'Onion Rings', 'Crispy battered onion rings', 3.99, 1),
(2, 'Fish Burger', 'Breaded fish fillet with tartar sauce', 7.99, 0);

-- for restaurant 3
INSERT INTO Product (vendor_id, product_name, description, price, instock) 
VALUES 
(3, 'Salmon Flower Sushi (2 pcs)', 'Two pieces of sushi rice topped with salmon, shaped like a flower', 7.99, 1),
(3, 'Spicy Salmon Sushi (2 pcs)', 'Seaweed wrap fresh salmon with spicy mayo, served in two pieces', 5.95, 1),
(3, 'Fire Dragon Roll (8 pcs)', 'Shrimp, avocado, and cucumber topped with spicy crab', 14.95, 1),
(3, 'Golden Dragon', 'Shrimp Tempura, Cream Cheese & Cucumber, topped w/ Tempura Sweet Potato & house Sauces', 17.98, 1),
(3, 'Rainbow Sushi', 'Crab & Cucumber, topped w/ Tuna, Salmon, Red Snapper & Avocado', 20.30, 1),
(3, 'Shrimp California Roll', 'Shrimp wrapped in a delicate California-style roll', 10.00, 1),
(3, 'Shrimp Tempura Roll', 'Crisp shrimp in a delicate roll', 10.00, 1),
(3, 'Red Snapper', 'Fresh red snapper wrapped in a delicate roll', 11.00, 1),
(3, 'Smoked Salmon Roll', 'Smoked salmon wrapped in a delicate roll', 11.00, 0),
(3, 'BBQ Eel Roll', 'Eel and BBQ sauce wrapped in a roll', 11.00, 0)
;

-- for restaurant 4
INSERT INTO Product (vendor_id, product_name, description, price, instock) 
VALUES 
(4, 'Signature Fettuccini Alfredo', 'Fettuccini noodles smothered in our house made Alfredo sauce, topped with Parmesan cheese and parsley flakes', 20.49, 1), 
(4, 'Signature Chicken Parmesan with Penne Marinara Pasta (28 oz serving tray)', '1 piece of chicken parmesan smothered in marinara sauce and melted mozzarella cheese. Served with a penne pasta in our marinara sauce. Topped with fresh parmesan and parsley flakes', 19.99, 1), 
(4, '16" Large Cheese Pizza (16 inch)', 'Hand tossed stone baked 16 inch pizza. Made with our signature house made marinara pizza sauce', 19.99, 1), 
(4, 'Gnocchi in a Blush Meat Sauce', 'Small potato dumplings made fresh and served in our house blush sauce. Topped with parmesan cheese and parsley flakes', 16.99, 1), 
(4, 'Lasagna', 'Made fresh and layered with our house meat sauce and mozzarella cheese. Topped with fresh parmesan cheese', 19.99, 1), 
(4, '12" Medium cheese pizza (12 inch)', 'Hand tossed stone baked 12 inch pizza. Made with our signature house marinara pizza sauce and the finest mozzarella cheese', 15.99, 0), 
(4, 'Stuffed crust 16\'inch cheese pizza (16 inch)', 'Hand tossed stone baked 16" cheese pizza and made with our house pizza sauce. Each crust edge is curled up and stuffed with mozzarella cheese and painted with our garlic butter', 25.99, 1),  
(4, 'Spaghetti marinara', 'Spaghetti tossed in our house marinara sauce nd topped with fresh parmesan and parsley flakes', 15.99, 1), 
(4, 'Family Dinner for 4 with Penne and chicken Parmesan (family size)', 'Comes with one large tray of our penne marinara pasta, 4 pcs of Chicken Parmesan, one large tray of Cesar Salad, Garlic bread, and 4 pops', 70.00, 1), 
(4, 'Creamy Chicken Cesar 16" Pizza (XL 16 inch)', 'Made with creamy garlic sauce, mozzarella cheese, chicken, mushroom and green olives. Painted with garlic butter and fresh parmesan cheese', 29.99, 0)
;

-- more restaurant
INSERT INTO Restaurant_Vendor(business_name, admin, email, phone_number, address, rating, image_path, cuisine_name)
VALUES
('Mexican Uncle', 'Luis Recardo', 'mexiunc23@gmail.com', '+1 2289419476', '456 Kennedy St, Windsor', 4.2, 'images/mexican uncle.jpg', 'Mexican'),
('Punjabi Tadka', 'Harmit Singh', 'punjabitad23@hotmail.com', '+1 7843532742', '232 Jenntte Ave, Windsor', 4.7, 'images/punjabi-tadka.jpg', 'Indian')
;

-- for restaurant 5 (did not run yet)
-- INSERT INTO Product (vendor_id, product_name, description, price, instock) 
-- VALUES
-- (5, 'Chips with Salsa and Guacamole', 'Crispy Tortilla chips served with tangy and spicy Salsa and Guacamole', 5.99)
-- ;
