-- inserting with restaurants--
INSERT INTO restaurant_vendor(business_name, admin, email, phone_number, address, rating, image_path, cuisine_name)
VALUES
    ("Be Desi", "Nazifa Tahsin", "bedesi123@gmail.com", "+1 0126872198", "234 Wyandot, Windsor", 4.2, "images/indianfood.jpg", "Indian"),
    ("McDongal's", "Wilson Tran", "mcdonald@gmail.com", "+1 7987987551", "8436 University Ave, Windsor", 3.5, "images/fastfood.jpg", "Fast food"),
    ("Sushi Yum", "Liana Bell", "sushiyum64@gmail.com", "+1 7904665523", "646 Campbell Ave, Windsor", 4.4, "images/sushi.jpg", "Japanese"),
    ("Italiana", "Kayden Ions", "italiana@gmail.com", "+1 6768667465", "287 Jenkins Ave, Windsor", 4.7, "images/italiana.jpg", "Italian")
;

INSERT INTO product (vendor_id, product_name, description, price, instock) 
VALUES 
(1, 'Butter Chicken', 'Creamy tomato-based curry with tender chicken', 14.99, 50),
(1, 'Chicken Biryani', 'Fragrant basmati rice with spiced chicken', 13.99, 40),
(1, 'Paneer Tikka', 'Grilled cottage cheese with spices and vegetables', 11.99, 35),
(1, 'Garlic Naan', 'Soft flatbread topped with garlic and butter', 3.99, 100),
(1, 'Chana Masala', 'Chickpeas cooked in a spicy tomato gravy', 10.99, 45),
(1, 'Lamb Rogan Josh', 'Slow-cooked lamb in a rich, spiced curry', 15.99, 30),
(1, 'Samosa', 'Crispy pastry filled with spiced potatoes and peas', 4.99, 60),
(1, 'Tandoori Chicken', 'Marinated chicken roasted in a tandoor oven', 13.49, 25),
(1, 'Palak Paneer', 'Spinach curry with cubes of paneer cheese', 11.49, 40),
(1, 'Mango Lassi', 'Sweet yogurt-based mango drink', 4.49, 70);

INSERT INTO product (vendor_id, product_name, description, price, instock) 
VALUES 
(2, 'Classic Burger', 'Beef patty with lettuce, tomato, and cheese', 6.99, 80),
(2, 'Cheeseburger', 'Juicy beef burger with melted cheese', 7.49, 75),
(2, 'Chicken Nuggets', 'Crispy breaded chicken bites', 5.99, 100),
(2, 'French Fries', 'Golden crispy potato fries', 3.49, 120),
(2, 'Double Burger', 'Two beef patties with cheese and toppings', 8.99, 60),
(2, 'Chicken Sandwich', 'Fried chicken breast with mayo and lettuce', 6.99, 70),
(2, 'Milkshake', 'Creamy vanilla, chocolate, or strawberry shake', 4.99, 50),
(2, 'Soft Drink', 'Carbonated soda beverage', 2.49, 150),
(2, 'Onion Rings', 'Crispy battered onion rings', 3.99, 90),
(2, 'Fish Burger', 'Breaded fish fillet with tartar sauce', 7.99, 40);