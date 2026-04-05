# Project3340

Group Name: __'The Cheese Group'__
App Name: __'Grillow'__
App Description: A food delivery app.

## Group Members

- Wilson Tran
- Liana Bell
- Nazifa Tahsin
- Kayden Ions

## Google Doc Design Document

[Our Shared Document](https://docs.google.com/document/d/1_kI17sUta9oh6Pqrc_Lg_VRuLf6k7XWfQJOQ6VlU-WQ/edit?usp=sharing)

## Requirements

Languages: HTML, CSS, JavaScript, PHP

## Todo List

- [X] _Discuss_ with group about __common interests__ to more easily identify _business case_.
  - [X] _Develop_ a word document to _compile_ information.
  - [X] _Discuss_ ways to combine ideas or go with one via __survey__.
  - [ ] ~~_Identify_ __strengths and weaknesses__ of each group member to more accurately decide the next steps.~~

- [X] _Design a Simple Logo:_ Each group member can submit a logo to their individual branches.

- [X] _Optional Task:_ __Design wireframes__ for each page, each person can choose which pages to design based on their UI/UX design skills.

- [X] _Develop_ a __common design__ using design tools or HTML and CSS and present each to the group. This includes the colour theme, forms, navigation system, link styles and anything else you can think of. Check each box if you have finished a design.

## Updates

- __17/01/2026, Changes made:__
  - Kayden: Did some formatting to the _readme.md_ document. Justification behind this was to incorporate a todo list and a list of updates on specific dates for documentation purposes. Feel free to give constructive criticisms on the formatting.
- __23/01/2026, Changes made:__ Made some progress in our group meeting. Decided on making a delivery app and naming it 'Grillow'. Talked about our next steps and then updated the readme formatting.

## Comments

If there are any comments or concerns, please use the group discord, the github functions such as the issues tab, or mark it down here with the formatting as follows:

    - DD/MM/YYYY, Comment:
    - Name: Description of comment or issue.

## List of pages

WE need at least 15 pages

| Dynamic or Static | Page        | Designed | Implemented in front-end | Dynamically Implemented |
|  --------------   | ----------- | -------- | ------------------------ | ----------------------- |
|  Dynamic          | Home        | Yes      | Yes                      | Yes                     |
|  Dynamic          | Cart        | ~~No~~   | Yes                      | Yes                     |
|  Dynamic          | Orders      | Yes      | Yes                      | Yes                     |
|  Dynamic          |Order Details| No       | Yes                      | Yes                     |
|  Dynamic          | Favourites  | ~~No~~   | Yes                      | Yes                     |
|  Dynamic          | Browse      | Yes      | Yes                      | Yes                     |
|  Dynamic          | Partner     | Yes      | Yes                      | Yes                     |
|  Dynamic          | Drive w/ us | ~~No~~   | Yes                      | Yes                     |
|  Dynamic          | Restaurant  | ~~No~~   | Yes                      | Yes                     |
|  Dynamic          | Inventory   | ~~No~~   | Yes                      | Yes                     |
|  Dynamic          | Food menu   | Yes      | Yes                      | Yes                     |
|  Dynamic          | Checkout    | Yes      | Yes                      | Yes                     |
|  Dynamic          | Sign up     | Yes      | Yes                      | Yes                     |
|  Dynamic          | Sign in     | Yes      | Yes                      | Yes                     |
|  Dynamic          | Forgot pass | ~~No~~   | Yes                      | Sort of                 |
|  Dynamic          |Server Status| ~~No~~   | Yes                      | Yes                     |
|  Dynamic          | Admin Panel | ~~No~~   | Yes                      | Yes                     |
|  Static           | Help        | ~~No~~   | Yes                      |                         |
|  Static           | About us    | ~~No~~   | Yes                      |                         |
|  Static           | Demo        | ~~No~~   | Yes                      |                         |
|  Static           | Contact us  | ~~No~~   | Yes                      |                         |
|  Static           | Business    | ~~No~~   | Yes                      |                         |

|  Total Planned | Dynamic | Static |
| -------------- | ------- | ------ |
| 22             | 17      | 5      |

|                         | Total Finished | Dynamic | Static |
| ----------------------- | -------------- | ------- | ------ |
| Implemented (front-end) | 22             | 17      | 5      |
| Implemented (back-end)  | 17             | 17      |        |

## Project Description

Grillow is a fully functional food delivery web application designed for the Windsor area. It allows users to browse local restaurants, add items to a cart, place orders, and track them. Admins can manage products, users, and site themes. The app features user authentication, dynamic content via PHP/MySQL, responsive design, and multimedia elements like images and videos.

### Key Features

- User registration/login with profiles
- Browse restaurants and menus
- Shopping cart and order placement
- Order history and favorites
- Admin panel for product/user management
- 3 customizable site themes
- Responsive design (desktop/mobile)
- SEO-optimized with meta tags
- Interactive wiki help system

## Technologies Used

- _Frontend_: HTML5, CSS3, JavaScript
- _Backend_: PHP
- _Database_: MySQL
- _Other_: FontAwesome icons, XAMPP for local dev

## Configuration

Grillow uses a single shared configuration file for database credentials:

- `config.php` contains `$host`, `$dbName`, `$dbUser`, and `$dbPass`
- Update this file when moving between local and live environments
- This avoids repeating credentials in every PHP file

## Installation Instructions

To set up Grillow on a new server (for example, myweb.cs.uwindsor.ca or local XAMPP):

1. __Prerequisites:__
   - Web server with PHP 7+ and MySQL (e.g., XAMPP, Apache)
   - Git or file upload access for the code

2. __Clone the Repository:__
   - `git clone https://github.com/Mini1Git/project3340.git`
   - `cd project3340`

3. __Set Up the Database:__

   - Open phpMyAdmin or MySQL command line
   - Create a new database named `grillow` (or use the name provided by your host)
   - Import SQL files from `sql_scripts/` in this order:
     - `site_database.sql` (creates tables)
     - `restaurant_data.sql` (adds sample data)
     - `order_data.sql` (optional for testing)

4. __Configure the App:__

   - Open `config.php`
   - Update database values to match your environment:
     - `$host`
     - `$dbName`
     - `$dbUser`
     - `$dbPass`
   - On myweb, the database name and username may include your account prefix
   - Example for local XAMPP:
     ```php
     $host = "localhost";
     $dbName = "grillow";
     $dbUser = "root";
     $dbPass = "";
     ```

5. __Deploy the Files:__

   - Place the project folder in the web root (for XAMPP: `htdocs/project3340`)
   - Upload the same folder structure to myweb if deploying live
   - Ensure `images/`, `videos/`, `stylesheets/`, `scripts/`, and `server/` are included

6.__Run the App:__

   - Start Apache and MySQL (XAMPP local)
   - Open `http://localhost/project3340/home/index.php`
   - For live hosting, use your myweb URL

## Creating an Admin Account

If you need admin access for testing or deployment:

1. Register a normal user via `signup.php`
2. Open phpMyAdmin and find the new row in `Customer`
3. Change `role` from `user` to `admin`
4. Ensure `is_disabled` is `0`
5. Log in and visit `user/admin.php`

## Deployment Notes for myweb.cs.uwindsor.ca

- Use the database credentials provided by your myweb account
- Set `config.php` with the correct host, database name, username, and password
- Upload the full `project3340` folder to your myweb public_html or equivalent directory
- Verify the site using your live URL after upload

## Usage

- __For Users:__ Register/login, browse restaurants, add items to cart, checkout, and track orders
- __For Admins:__ Use `user/admin.php` to manage users, edit restaurant products, and update site settings
- __Help:__ Use the wiki pages under `info/` for user training and instructions

## Database Schema Overview

- __Customer:__ User accounts and login information
- __Restaurant_Vendor:__ Restaurant and vendor details
- __Product:__ Menu items and prices
- __Customer_Order:__ Order summary records
- __Order_Item:__ Order line items and quantities
- __Payment:__ Payment records for each order

See `sql_scripts/site_database.sql` for the full schema.

## Live Demo

https://ions.myweb.cs.uwindsor.ca/COMP3340/project3340/home/index.php
