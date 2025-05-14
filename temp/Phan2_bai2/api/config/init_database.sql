-- Tạo database
CREATE DATABASE IF NOT EXISTS lab03;

-- Sử dụng database
USE lab03;

-- Tạo bảng products
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(40) NOT NULL CHECK (LENGTH(name) >= 5),
    description TEXT CHECK (LENGTH(description) <= 5000),
    price DECIMAL(10, 2) NOT NULL CHECK (price >= 0),
    image VARCHAR(255)
);

-- Chèn dữ liệu mẫu
INSERT INTO products (name, description, price, image) VALUES
('Laptop Acer Nitro 5', 'Gaming laptop with powerful graphics card and processor. Perfect for gaming and content creation.', 899.99, 'https://example.com/images/acer-nitro.jpg'),
('Samsung Galaxy S21', 'Flagship smartphone with high-end camera system and stunning display.', 799.99, 'https://example.com/images/galaxy-s21.jpg'),
('Sony PlayStation 5', 'Next-generation gaming console with ray tracing and ultra-high-speed SSD.', 499.99, 'https://example.com/images/ps5.jpg'),
('Mechanical Keyboard', 'RGB mechanical keyboard with tactile feedback for gaming and typing enthusiasts.', 129.99, 'https://example.com/images/mech-keyboard.jpg'),
('Wireless Headphones', 'Noise-cancelling wireless headphones with 30 hours of battery life.', 249.99, 'https://example.com/images/headphones.jpg');