<?php
class Database {
    private $host = "localhost";
    private $db_name = "viralqls_machines";
    private $username = "viralqls_machines_deal";
    private $password = "Raju@1008";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>
