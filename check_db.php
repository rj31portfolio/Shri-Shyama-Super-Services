<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/database.php';

$database = new Database();
$db = $database->getConnection();

try {
    // Check if machines table exists
    $stmt = $db->query("SHOW TABLES LIKE 'machines'");
    $machinesExists = $stmt->rowCount() > 0;
    echo "Machines table exists: " . ($machinesExists ? "Yes" : "No") . "<br>";

    if ($machinesExists) {
        // Show machines table structure
        $stmt = $db->query("DESCRIBE machines");
        echo "<h3>Machines Table Structure:</h3>";
        echo "<pre>";
        print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
        echo "</pre>";
    }

    // Check if categories table exists
    $stmt = $db->query("SHOW TABLES LIKE 'categories'");
    $categoriesExists = $stmt->rowCount() > 0;
    echo "Categories table exists: " . ($categoriesExists ? "Yes" : "No") . "<br>";

    if ($categoriesExists) {
        // Show categories table structure
        $stmt = $db->query("DESCRIBE categories");
        echo "<h3>Categories Table Structure:</h3>";
        echo "<pre>";
        print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
        echo "</pre>";

        // Show categories count
        $stmt = $db->query("SELECT COUNT(*) as count FROM categories");
        $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        echo "Number of categories: " . $count . "<br>";

        if ($count > 0) {
            // Show all categories
            $stmt = $db->query("SELECT * FROM categories");
            echo "<h3>Available Categories:</h3>";
            echo "<pre>";
            print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
            echo "</pre>";
        }
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
