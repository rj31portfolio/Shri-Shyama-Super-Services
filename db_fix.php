<?php
require_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

try {
    // Drop and recreate machines table
    $sql = "DROP TABLE IF EXISTS machines";
    $db->exec($sql);
    echo "Dropped machines table if exists<br>";

    // Create machines table
    $sql = "CREATE TABLE machines (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        short_description TEXT,
        image_path VARCHAR(255),
        category_id INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (category_id) REFERENCES categories(id)
    )";
    $db->exec($sql);
    echo "Created machines table successfully<br>";

    // Create uploads directory
    $uploads_dir = "uploads/machines";
    if (!file_exists($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
        echo "Created uploads directory<br>";
    }

    echo "Database and directories updated successfully!";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
