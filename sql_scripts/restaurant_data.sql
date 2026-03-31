-- Active: 1755301077799@@127.0.0.1@3306@grillow
-- inserting with restaurants--
INSERT INTO Restaurant_Vendor(restaurant_id, business_name, admin, email, phone_number, address, rating, image_path, cuisine_name)
VALUES
    (1, "Be Desi", "Nazifa Tahsin", "bedesi123@gmail.com", "+1 0126872198", "234 Wyandot, Windsor", 4.2, "images/indianfood.jpg", "Indian"),
    (2, "McDongal's", "Wilson Tran", "mcdonald@gmail.com", "+1 7987987551", "8436 University Ave, Windsor", 3.5, "images/fastfood.jpg", "Fast food"),
    (3, "Sushi Yum", "Liana Bell", "sushiyum64@gmail.com", "+1 7904665523", "646 Campbell Ave, Windsor", 4.4, "images/sushi.jpg", "Japanese"),
    (4, "Italiana", "Kayden Ions", "italiana@gmail.com", "+1 6768667465", "287 Jenkins Ave, Windsor", 4.7, "images/italiana.jpg", "Italian"),
    (13, 'Mexican Uncle', 'Luis Recardo', 'mexiunc23@gmail.com', '+1 2289419476', '456 Kennedy St, Windsor', 4.2, 'images/mexican uncle.jpg', 'Mexican'),
    (14, 'Punjabi Tadka', 'Harmit Singh', 'punjabitad23@hotmail.com', '+1 7843532742', '232 Jenntte Ave, Windsor', 4.7, 'images/punjabi-tadka.jpg', 'Indian')
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

-- restaurant inserts (liana)
INSERT INTO Restaurant_Vendor(restaurant_id, business_name, admin, email, phone_number, address, rating, image_path, cuisine_name)
VALUES
    (1101, "The Hungry Bunny", "Yoshi Bell", "HungryBunny@grillow.com", "+1 519-555-0001", "123 Garden Lane, Windsor", 4.8, "images/hungrybunny.jpg", "Vegan"),
    (1102, "Sprinkle Sparkle Cafe", "Luna Lovegood", "sprinkles@grillow.com", "+1 519-555-0002", "456 Peach St, Windsor", 4.9, "images/sprinkle.jpg", "Dessert"),
    (1103, "Moonbeam", "Ellie Night", "moonbeam@grillow.com", "+1 519-555-0003", "789 Wyandotte St, Windsor", 4.5, "images/moonbeam.jpg", "Cafe"),
    (1104, "Paws & Pancakes", "Charlie Barker", "paws@grillow.com", "+1 519-555-0004", "101 Georgie St, Windsor", 4.2, "images/paws.jpg", "Breakfast"),
    (1105, "The Tippy Teapot", "Melanie Traws", "teapot@grillow.com", "+1 519-555-0005", "202 Tecumseh Rd, Windsor", 4.6, "images/teapot.jpg", "Cafe"),
    (1106, "Giggling Gelato", "Supra Colda", "gelato@grillow.com", "+1 519-555-0006", "303 Riverside Rd, Windsor", 4.7, "images/gelato.jpg", "Italian"),
    (1107, "Cool Cat cafe", "Jack Cat", "whiskers@grillow.com", "+1 519-555-0007", "404 Meow St, Windsor", 4.3, "images/coolcat.jpg", "Breakfast"),
    (1108, "Berry Bliss Bistro", "Ruby Ronda", "berry@grillow.com", "+1 519-555-0008", "505 Strawberry Ave, Windsor", 4.4, "images/berry.jpg", "Smoothies"),
    (1109, "The Dancing Donut", "Donny Glaze", "donut@grillow.com", "+1 519-555-0009", "606 Sprinkles Dr, Windsor", 4.8, "images/donut.jpg", "Bakery"),
    (1110, "Skyki Steakhouse", "Oliver Belte", "skyki@grillow.com", "+1 519-555-0010", "707 Galaxy Way, Windsor", 4.1, "images/steak.jpg", "BBQ"),
    (1111, "Sunny Side Up", "Ray Tenns", "sunny@grillow.com", "+1 519-555-0011", "808 Walker Rd, Windsor", 4.5, "images/sunny.jpg", "Breakfast"),
    (1112, "Velvet Vanilla", "Steph Sweet", "velvet@grillow.com", "+1 519-555-0012", "909 Silk Rd, Windsor", 4.9, "images/velvet.jpg", "Dessert"),
    (1113, "The Cozy Crumb", "Baker Brown", "crumb@grillow.com", "+1 519-555-0013", "111 Muffin Top, Windsor", 4.6, "images/crumb.jpg", "Bakery"),
    (1114, "Bubble Bunny Tea", "Rocky Grant", "bubblebunny@grillow.com", "+1 519-555-0015", "333 Carrot Ave, Windsor", 4.4, "images/bubble.jpg", "Beverages"),
    (1115, "Cloud Nine Confections", "Skyler Blue", "cloudnine@grillow.com", "+1 519-555-0019", "777 California St, Windsor ", 4.9, "images/cloud.jpg ", "Dessert "),
    (1116,"Flutterby Fries","Mariposa Flaia","flutterby@grillow.com","+1 519-555-0020","888 Devonshire Rd, Windsor ", 4.2,"images/flutter.jpg ","Fast food ")
;


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



-- for restaurant 5 (did not run yet)
-- INSERT INTO Product (vendor_id, product_name, description, price, instock) 
-- VALUES
-- (5, 'Chips with Salsa and Guacamole', 'Crispy Tortilla chips served with tangy and spicy Salsa and Guacamole', 5.99)
-- ;


--restaurants (liana) products
-- 1. The Hungry Bunny (Vegan)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(110101, 1101, 'Garden Green Bowl', 'Kale, quinoa, roasted chickpeas, and tahini dressing', 12.99, 1),
(110102, 1101, 'Carrot Tacos', 'Spiced walnut meat with fresh carrot slaw', 11.49, 1),
(110103, 1101, 'Vegan Burger', 'Beet and black bean patty with avocado smash', 14.50, 1),
(110104, 1101, 'Hoppin’ Hummus', 'Roasted red pepper hummus with cucumber slices', 7.99, 1),
(110105, 1101, 'Zucchini Noodles', 'Spiralized zucchini with hemp seed pesto', 13.00, 1),
(110106, 1101, 'Sweet Potato Wedges', 'Crispy baked wedges with vegan garlic aioli', 6.49, 1),
(110107, 1101, 'Quinoa Power Salad', 'Tri-color quinoa with cranberries and almonds', 11.99, 0),
(110108, 1101, 'Mushroom Medley', 'Sautéed forest mushrooms on sourdough toast', 12.49, 1),
(110109, 1101, 'Lentil Lava Soup', 'Hearty spiced red lentil and coconut soup', 8.50, 1),
(110110, 1101, 'Vegan Wrap', 'Spinach tortilla with sprouts, tofu, and peppers', 10.99, 1);

-- 2. Sprinkle Sparkle Cafe (Dessert)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(110201, 1102, 'Glitter Cupcake', 'Vanilla bean cake with edible silver glitter', 4.50, 1),
(110202, 1102, 'Rainbow Macarons', 'Box of 6 assorted fruit-flavored macarons', 12.00, 1),
(110203, 1102, 'Sparkle Brownie', 'Double chocolate brownie with gold leaf flakes', 5.25, 1),
(110204, 1102, 'Starlight Tart', 'Lemon curd tart topped with meringue stars', 6.50, 0),
(110205, 1102, 'Confetti Cake Slice', 'Three-layer funfetti cake with buttercream', 7.99, 1),
(110206, 1102, 'Pink Velvet Latte', 'Beetroot-infused white chocolate espresso', 5.50, 1),
(110207, 1102, 'Fairy Bread Pudding', 'Warm brioche with sprinkles and vanilla sauce', 8.25, 1),
(110208, 1102, 'Cherry Berry Cheesecake', 'Classic NY style with a shimmering berry glaze', 9.00, 1),
(110209, 1102, 'Dark Star Cookies', 'Star-shaped shortbread dipped in chocolate', 3.99, 1),
(110210, 1102, 'Sugar Plum Pastry', 'Flaky danish filled with plum compote', 4.75, 1);

-- 3. Moonbeam (Cafe)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(110301, 1103, 'Midnight Mocha', 'Dark chocolate latte with a hint of sea salt', 5.25, 1),
(110302, 1103, 'Lunar Croissant', 'Buttery crescent roll with almond filling', 4.25, 1),
(110303, 1103, 'Crescent Scone', 'Lavender and honey infused buttermilk scone', 3.75, 1),
(110304, 1103, 'Twilight Tea', 'Butterfly pea flower tea with lemon and honey', 4.50, 1),
(110305, 1103, 'Sun-Gazer Espresso', 'Double shot of our Ethiopian roast', 3.25, 1),
(110306, 1103, 'Cloud Foam Cold Brew', 'Steeped for 20 hours with salted cream foam', 5.75, 0),
(110307, 1103, 'Star-Dust Bagel', 'Toasted bagel with cinnamon sugar cream cheese', 4.99, 1),
(110308, 1103, 'Moon Panini', 'Roasted turkey, brie, and cranberry mayo', 11.50, 1),
(110309, 1103, 'Out of the world Oatmeal', 'Steel-cut oats with flax seeds and maple', 6.99, 1),
(110310, 1103, 'Moonbeam Matcha', 'Highest grade matcha with oat milk', 5.99, 1);

-- 4. Paws & Pancakes (Breakfast)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(110401, 1104, 'The  Platter', 'Mini pancakes, scrambled eggs, and bacon', 10.99, 1),
(110402, 1104, 'Bear Claw Waffles', 'Belgian waffles with chocolate drizzle claws', 12.49, 1),
(110403, 1104, 'Golden French Toast', 'Thick-cut brioche French toast with honey', 11.00, 1),
(110404, 1104, 'Granola Bowl', 'Granola, Greek yogurt, and fresh berries', 8.50, 1),
(110405, 1104, 'Breakfast Burrito', 'Giant tortilla stuffed with sausage and hash', 13.99, 1),
(110406, 1104, 'Lazy Omelet', 'Fluffy 3-egg omelet with spinach and feta', 12.00, 1),
(110407, 1104, 'Pawsome Benedict', 'Poached eggs on ham and English muffins', 14.50, 0),
(110408, 1104, 'Barking Biscuits', 'Warm buttermilk biscuits with sausage gravy', 9.99, 1),
(110409, 1104, 'Cool Crepes', 'Thin crepes with Nutella and strawberries', 11.25, 1),
(110410, 1104, 'Happy Hash', 'Crispy potatoes with peppers and onions', 5.50, 1);

-- 5. The Tippy Teapot (Cafe)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(110501, 1105, 'London Fog', 'Earl Grey tea with vanilla and steamed milk', 4.99, 1),
(110502, 1105, 'Chamomile Calm', 'Organic chamomile flowers with honey', 3.50, 1),
(110503, 1105, 'Spiced Chai Latte', 'Traditional black tea with aromatic spices', 5.25, 1),
(110504, 1105, 'Cucumber Sandwiches', 'Dainty crustless sandwiches with herb butter and seasonings', 8.99, 1),
(110505, 1105, 'Earl Grey Shortbread', 'Buttery cookies infused with tea leaves', 4.00, 1),
(110506, 1105, 'Peppermint Perk', 'Cooling peppermint tea, served hot or iced', 3.50, 1),
(110507, 1105, 'Royal Afternoon Tea', 'Tiered tower of sweets and savories', 24.99, 0),
(110508, 1105, 'Rose Petal Latte', 'Floral espresso drink with dried rose buds', 5.99, 1),
(110509, 1105, 'Devonshire Cream Tea', 'Scones served with clotted cream and jam', 9.50, 1),
(110510, 1105, 'Jasmine Pearl Tea', 'Hand-rolled jasmine tea pearls', 5.50, 1);

-- 6. Giggling Gelato (Italian)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(110601, 1106, 'Pistachio Dream', 'Authentic roasted Sicilian pistachio gelato', 5.99, 1),
(110602, 1106, 'Stracciatella Swirl', 'Milk gelato with thin chocolate shavings', 5.50, 1),
(110603, 1106, 'Lemon Sorbetto', 'Zesty and refreshing dairy-free lemon ice', 4.99, 1),
(110604, 1106, 'Tiramisu Treat', 'Espresso-soaked cake layered with gelato', 7.50, 1),
(110605, 1106, 'Blood Orange Sorbet', 'Deep red orange citrus burst', 5.25, 1),
(110606, 1106, 'Hazelnut Heaven', 'Creamy hazelnut with toasted nut pieces', 5.99, 1),
(110607, 1106, 'Gelato Brioche', 'Sicilian style sweet bun stuffed with gelato', 8.00, 0),
(110608, 1106, 'Affogato', 'Espresso poured over vanilla bean gelato', 6.50, 1),
(110609, 1106, 'Dark Cherry Chunk', 'Sweet cream with whole Amarena cherries', 5.75, 1),
(110610, 1106, 'Sea Salt Caramel', 'Rich burnt sugar with flakes of salt', 5.50, 1);

-- 7. Cool Cat cafe (Breakfast)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(110701, 1107, 'Catnip Cold Brew', 'Strong brew with a hint of mint syrup', 5.50, 1),
(110702, 1107, 'The Lions Share', 'Double steak, three eggs, and hash browns', 16.99, 1),
(110703, 1107, 'Meow-ffin', 'Jumbo blueberry muffin with sugar crumble', 3.95, 1),
(110704, 1107, 'Tabby Toast', 'Avocado toast with a "striped" honey glaze', 10.50, 1),
(110705, 1107, 'Calico Quiche', 'Three-cheese and vegetable egg tart', 9.99, 1),
(110706, 1107, 'Stacked Pancakes', 'Stack of 5 thin pancakes with maple', 11.00, 1),
(110707, 1107, 'Burrito Wrap', 'Tortilla type of your choice, with scrambled eggs, beans, and spicy salsa', 12.00, 0),
(110708, 1107, 'Cinna-French Toast', 'Cinnamon swirl bread with whipped cream', 11.50, 1),
(110709, 1107, 'Baking Biscuits', 'Cheddar and chive drop biscuits', 4.50, 1),
(110710, 1107, 'Black Americano', 'Pure bold black espresso and water', 3.25, 1);

-- 8. Berry Bliss Bistro (Smoothies)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(110801, 1108, 'Blueberry Blast', 'Wild blueberries, banana, and almond milk', 8.50, 1),
(110802, 1108, 'Strawberry Sunset', 'Strawberries, mango, and orange juice', 8.50, 1),
(110803, 1108, 'Green Goddess', 'Spinach, pineapple, green apple, and ginger', 9.00, 1),
(110804, 1108, 'Acai Bowl', 'Frozen acai topped with granola and honey', 11.99, 1),
(110805, 1108, 'Tropical Tour', 'Coconut milk, papaya, and passion fruit', 8.75, 1),
(110806, 1108, 'Protein Punch', 'Chocolate protein, PB, and banana', 9.50, 0),
(110807, 1108, 'Dragon Fruit Delight', 'Pitaya, raspberries, and lime', 9.25, 1),
(110808, 1108, 'Kale Kool', 'Kale, cucumber, lemon, and agave', 8.99, 1),
(110809, 1108, 'Golden Glow', 'Turmeric, mango, and carrot juice', 8.50, 1),
(110810, 1108, 'Raspberry Rush', 'Tart raspberries and Greek yogurt', 8.25, 1);

-- 9. The Dancing Donut (Bakery)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(110901, 1109, 'Glazed', 'Classic yeast donut with a shiny glaze', 2.50, 1),
(110902, 1109, 'Boston', 'Custard filled with chocolate ganache', 3.25, 1),
(110903, 1109, 'Jelly', 'Raspberry jam filled with powdered sugar', 3.00, 1),
(110904, 1109, 'Maple', 'Maple bacon long john donut', 3.99, 1),
(110905, 1109, 'Sprinkle', 'Pink frosting with colorful sprinkles', 2.75, 1),
(110906, 1109, 'Cinnamon', 'Cake donut tossed in cinnamon sugar', 2.50, 1),
(110907, 1109, 'Apple Fritter', 'Chunks of apple with heavy glaze', 4.50, 0),
(110908, 1109, 'Assorted Donut Party', 'Assorted pack of 12 donuts', 6.00, 1),
(110909, 1109, 'Classic Chocolate', 'Chocolate dough with chocolate icing, and chocolate filling', 3.75, 1),
(110910, 1109, 'Espresso', 'Coffee flavored dough with caramel and vanilla swirls', 3.25, 1);

-- 10. Skyki Steakhouse (BBQ)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(111001, 1110, 'Skyki Ribs', 'Full rack of hickory-smoked baby back ribs', 26.99, 1),
(111002, 1110, 'Brisket', '12-hour slow smoked beef brisket slices', 19.50, 1),
(111003, 1110, 'Hot Chicken', 'Half chicken basted in spicy BBQ sauce', 17.00, 1),
(111004, 1110, 'Pulled Pork', 'Shredded pork shoulder on a brioche bun', 14.99, 1),
(111005, 1110, 'Famous Mac & Cheese', 'Loaded with smoked gouda and bacon', 8.50, 1),
(111006, 1110, 'Iron Skillet Cornbread', 'Served warm with honey butter', 6.00, 1),
(111008, 1110, 'Burnt End Bites', 'The best crispy bits of the brisket', 12.00, 0),
(111009, 1110, 'Skyki Slaw', 'Purple cabbage with a tangy vinegar base', 4.50, 1),
(111010, 1110, 'Smoked Sausage Link', 'Spicy jalapeño cheddar pork sausage', 7.99, 1),
(111011, 1110, 'Full BBQ Fries', 'Thick cut fries with house BBQ seasoning', 5.50, 1);

-- 11. Sunny Side Up (Breakfast)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(111101, 1111, 'The Sunny Classic', 'Two eggs, toast, and your choice of meat', 9.99, 1),
(111102, 1111, 'Morning Burrito', 'Eggs, chorizo, and melted cheese', 11.50, 1),
(111103, 1111, 'Avocado Toast', 'Mashed avocado with a sunny side up egg', 10.99, 1),
(111104, 1111, 'French Toast', 'Thick slices with mascarpone and berries', 12.50, 1),
(111105, 1111, 'Morning Mix Muffins', 'Carrot, apple, and walnut spice muffin', 3.50, 1),
(111106, 1111, 'Hash Brown Haystack', 'Crispy hash browns with melted cheddar', 5.99, 1),
(111107, 1111, 'Shakshuka Skillet', 'Poached eggs in a spicy tomato sauce', 13.99, 0),
(111108, 1111, 'Belgian Morning', 'Waffles with fresh fruit and maple syrup', 11.00, 1),
(111109, 1111, 'Yogurt Parfait', 'Low-fat yogurt with crunchy granola', 7.50, 1),
(111110, 1111, 'Breakfast Slider', 'Egg and cheese on a mini pretzel bun', 4.50, 1);

-- 12. Velvet Vanilla (Dessert)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(111201, 1112, 'Velvet Vanilla Bean Cake', 'Madagascar vanilla cake with white frosting', 7.99, 1),
(111202, 1112, 'Vanilla Bean Eclairs', 'Eclairs filled with vanilla pastry cream', 5.50, 1),
(111203, 1112, 'Vanilla Slide Sundae', 'Vanilla gelato with salted caramel and nuts', 8.50, 1),
(111204, 1112, 'White Chocolate Mousse', 'Light and airy mousse with raspberries', 6.99, 1),
(111205, 1112, 'Pure Vanilla Fudge', 'Traditional creamy white fudge', 4.50, 1),
(111206, 1112, 'Crème Brûlée', 'Vanilla custard with a burnt sugar top', 9.00, 1),
(111207, 1112, 'Snowball Cookies', 'Walnut shortbread rolled in sugar', 4.00, 0),
(111208, 1112, 'Velvet Milkshake', 'Thick blended vanilla bean ice cream', 6.50, 1),
(111209, 1112, 'Panna Cotta', 'Italian cooked cream with vanilla bean', 7.50, 1),
(111210, 1112, 'Vanilla Bean Macaron', 'Single delicate vanilla macaron', 2.25, 1);

-- 13. The Cozy Crumb (Bakery)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(111301, 1113, 'Warm Hearth Loaf', 'Freshly baked sourdough bread', 6.50, 1),
(111302, 1113, 'Cozy Cinnamon Roll', 'Hand-rolled with cream cheese frosting', 4.95, 1),
(111303, 1113, 'Grandma’s Cookie Box', 'Assortment of 6 chocolate chip cookies', 9.00, 1),
(111304, 1113, 'The Crumb Cake', 'New York style Cheesecake with extra extra crumbs', 5.50, 1),
(111305, 1113, 'Rustic Apple Galette', 'Free-form tart with cinnamon apples', 7.25, 1),
(111306, 1113, 'Savory Scone', 'Buttermilk scone with fresh herbs', 3.75, 1),
(111307, 1113, 'Banana Walnut Bread', 'Moist loaf slice with toasted nuts', 3.50, 0),
(111308, 1113, 'Pumpkin Spice Muffin', 'Seasonal favourite with pumpkin seeds', 3.95, 1),
(111309, 1113, 'Baguette', 'Classic crispy French bread', 4.00, 1),
(111310, 1113, 'Apricot Jam Tart', 'Shortcrust pastry with apricot filling', 4.50, 1);

-- 14. Bubble Bunny Tea (Beverages)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(111401, 1114, 'Classic Milk Tea', 'Black tea with tapioca pearls', 5.99, 1),
(111402, 1114, 'Taro Hop', 'Purple taro root milk tea with pearls', 6.50, 1),
(111403, 1114, 'Strawberry Slush', 'Frozen strawberries with lychee jelly', 6.75, 1),
(111404, 1114, 'Matcha', 'Green tea latte with red bean topping', 6.50, 1),
(111405, 1114, 'Brown Sugar Boba', 'Fresh milk with tiger sugar syrup', 6.99, 1),
(111406, 1114, 'Mango Green Tea', 'Refreshing jasmine tea with mango bits', 5.75, 1),
(111407, 1114, 'Passion Fruit Fizz', 'Sparkling tea with popping boba', 6.25, 0),
(111408, 1114, 'Peach Oolong', 'Light oolong tea with fresh peach', 5.99, 1),
(111409, 1114, 'Wintermelon Tea', 'Traditional sweet melon tea', 5.50, 1),
(111410, 1114, 'Honeydew Milk Tea', 'Creamy honeydew with green tea base', 6.50, 1);

-- 15. Cloud Nine Confections (Dessert)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(111501, 1115, 'Cotton Cloud Candy', 'Hand-spun organic sugar cloud', 5.00, 1),
(111502, 1115, 'Marshmallow Pillow', 'Gourmet vanilla bean marshmallows', 3.50, 1),
(111503, 1115, 'Floating Pavlova', 'Meringue cake with whipped cream', 9.00, 1),
(111504, 1115, 'Heavenly Macaron Set', 'Box of 12 cloud-shaped cookies', 22.00, 1),
(111505, 1115, 'Angel Food Cake', 'Lightest sponge cake with strawberries', 7.50, 1),
(111506, 1115, 'Sky-Blue Truffle', 'White chocolate with blueberry ganache', 2.50, 1),
(111507, 1115, 'Thunderbolt Brownie', 'Dark chocolate with popping candy', 5.50, 0),
(111508, 1115, 'Raindrop Cake', 'Clear jelly cake with soybean powder', 8.00, 1),
(111509, 1115, 'Assorted Candy', 'Fill your cup with any combination of candy', 6.00, 1),
(111510, 1115, 'Silver Lining Cupcake', 'Champagne flavored cake with silver pearls', 5.25, 1);

-- 16. Flutterby Fries (Fast food)
INSERT INTO Product (product_id, vendor_id, product_name, description, price, instock) 
VALUES 
(111601, 1116, 'Classic Flutter Fries', 'Salted shoestring fries with house dip', 4.99, 1),
(111602, 1116, 'Sweet Potato', 'Crinkle-cut sweet potato fries', 5.99, 1),
(111603, 1116, 'Loaded Fries', 'Topped with cheese, bacon, and chives', 8.50, 1),
(111604, 1116, 'Wings & Fries Combo', '6 crispy wings and a side of fries', 13.99, 1),
(111605, 1116, 'Truffle Fluffle', 'Fries tossed in truffle oil and parmesan', 7.50, 1),
(111606, 1116, 'Spicy Fries', 'Cajun seasoned fries with spicy mayo', 5.50, 1),
(111607, 1116, 'Poutine', 'Fries with cheese curds and brown gravy', 9.00, 0),
(111608, 1116, 'Garlic Knot Fries', 'Fries tossed in garlic butter and parsley', 6.00, 1),
(111609, 1116, 'Chili Cheese Fries', 'Smothered in beef chili and cheddar', 8.99, 1),
(111610, 1116, 'The Flutterby Burger', 'Beef patty with a side of extra fries', 12.50, 1);