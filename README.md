To use my sql database

Step 1:
    Open phpMyAdmin
    In your browser, go to:
    http://localhost/phpmyadmin

Step 2:
    Open the SQL Tab
    At the top menu, click the "SQL" tab.

Step 3:
    Paste the following SQL code into the textbox:

    -- Create the database if it doesn't exist
    CREATE DATABASE IF NOT EXISTS soniqueo_db;

    -- Switch to the database
    USE soniqueo_db;

    -- Create users table
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- Create orders table
    CREATE TABLE IF NOT EXISTS orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id VARCHAR(20) NOT NULL,
    quantity INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    -- Foreign key linking to users table
    FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
);
