<?php
require_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

try {
    // Add short_description column to machines table
    $sql = "ALTER TABLE machines ADD COLUMN IF NOT EXISTS short_description TEXT AFTER description";
    $db->exec($sql);
    echo "Added short_description column to machines table<br>";

    // Create enquiries table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS enquiries (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        message TEXT NOT NULL,
        machine_id INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (machine_id) REFERENCES machines(id)
    )";
    $db->exec($sql);
    echo "Created enquiries table<br>";

    echo "Database updated successfully!";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
