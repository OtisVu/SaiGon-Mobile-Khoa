<?php
class ModelBrand {
    private $conn;

    public function __construct() {
        $this->connectDB();
    }

    private function connectDB() {
        $this->conn = new mysqli('localhost', 'root', '', 'saigon_mobile');
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getAllBrands() {
        $sql = "SELECT * FROM brands";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function getBrandByID($brandID) {
        $sql = "SELECT * FROM brands WHERE BrandID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $brandID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Additional functions for adding, updating, and deleting brands can be added here
}
?>
