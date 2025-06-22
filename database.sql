-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS ecommerce2;
USE ecommerce2;

-- Create products table
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    image VARCHAR(255)
);

-- Insert sample products
INSERT INTO products (name, price, description, image) VALUES
('Smartphone X', 699.99, 'Latest smartphone with advanced features and high-resolution camera', 'smartphone.jpg'),
('Laptop Pro', 1299.99, 'Powerful laptop for professionals with high performance', 'laptop.jpg'),
('Wireless Headphones', 199.99, 'Premium noise-cancelling wireless headphones', 'headphones.jpg'),
('Smart Watch', 299.99, 'Feature-rich smartwatch with health monitoring', 'smartwatch.jpg'),
('Gaming Console', 499.99, 'Next-gen gaming console with 4K support', 'console.jpg'); 