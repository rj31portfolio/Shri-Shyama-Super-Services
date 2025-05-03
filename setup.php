<?php
$host = "localhost";
$username = "root";
$password = "";

try {
    // Create connection
    $conn = new PDO("mysql:host=$host", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS machinedeal_db";
    $conn->exec($sql);
    echo "Database created successfully<br>";

    // Select the database
    $conn->exec("USE machinedeal_db");

    // Create categories table
    $sql = "CREATE TABLE IF NOT EXISTS categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "Categories table created successfully<br>";

    // Create machines table
    $sql = "CREATE TABLE IF NOT EXISTS machines (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        image_path VARCHAR(255),
        category_id INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (category_id) REFERENCES categories(id)
    )";
    $conn->exec($sql);
    echo "Machines table created successfully<br>";

    // Create about table
    $sql = "CREATE TABLE IF NOT EXISTS about (
        id INT AUTO_INCREMENT PRIMARY KEY,
        description TEXT,
        image_path VARCHAR(255),
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);
    echo "About table created successfully<br>";

    // Create upload directories
    $directories = [
        '../uploads',
        '../uploads/machines',
        '../uploads/about'
    ];

    foreach ($directories as $dir) {
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
            echo "Directory $dir created successfully<br>";
        }
    }

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
