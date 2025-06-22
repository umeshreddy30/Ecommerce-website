USE ecommerce2;

-- First, clear the existing products table
TRUNCATE TABLE products;

-- Insert unique products with their images
INSERT INTO products (name, price, description, image) VALUES
('Smartphone X', 699.99, 'Latest smartphone with advanced features and high-resolution camera', 'product1.jpg'),
('Laptop Pro', 1299.99, 'Powerful laptop for professionals with high performance', 'product2.webp'),
('Wireless Headphones', 199.99, 'Premium noise-cancelling wireless headphones', 'product3.jpg'),
('Smart Watch', 299.99, 'Feature-rich smartwatch with health monitoring', 'smart watch.jpg'),
('Gaming Console', 499.99, 'Next-gen gaming console with 4K support', 'gaming console.jpg'),
('4K Smart TV', 899.99, '55-inch 4K Ultra HD Smart TV with HDR', '4k smart tv.jpg'),
('Wireless Earbuds', 149.99, 'True wireless earbuds with noise cancellation', 'wireless ear buds.jpg'),
('Digital Camera', 799.99, 'Professional DSLR camera with 4K video', 'digital camera.jpg'),
('Gaming Laptop', 1499.99, 'High-performance gaming laptop with RTX graphics', 'gaming laptop.jpg'),
('Tablet Pro', 649.99, 'Premium tablet with stylus support', 'tablet pro.jpg'),
('Smart Speaker', 129.99, 'Voice-controlled smart speaker with premium sound', 'smart speaker.jpg'),
('Fitness Tracker', 89.99, 'Advanced fitness tracker with heart rate monitor', 'fitness tracker.jpg'),
('Drone', 599.99, '4K camera drone with GPS and auto-follow', 'drone.jpg'); 