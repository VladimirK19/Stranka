<?php
require_once("connection.php");

class Product extends Database {
    public $db;

    public function __construct() {
        $this->db = $this->connect();
    }

    public function addProduct($name, $image, $price) {
        $errorMessage = "";
        $successMessage = "";

        do {
            if (empty($name) || empty($image) || empty($price)) {
                $errorMessage = "All fields are required";
                break;
            }

            $sql = "INSERT INTO glasses (name, image, price) VALUES (:name, :image, :price)";
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([
                ':name' => $name,
                ':image' => $image,
                ':price' => $price
            ]);

            if (!$result) {
                $errorMessage = "Invalid query: " . implode(" ", $stmt->errorInfo());
                break;
            }

            $successMessage = "Product added successfully";
        } while (false);

        return [
            'errorMessage' => $errorMessage,
            'successMessage' => $successMessage
        ];
    }

    public function deleteProduct($id) {
        $errorMessage = "";
        $successMessage = "";

        do {
            if (empty($id)) {
                $errorMessage = "Product ID is required";
                break;
            }

            $sql = "DELETE FROM glasses WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute([':id' => $id]);

            if (!$result) {
                $errorMessage = "Invalid query: " . implode(" ", $stmt->errorInfo());
                break;
            }

            $successMessage = "Product deleted successfully";
        } while (false);

        return [
            'errorMessage' => $errorMessage,
            'successMessage' => $successMessage
        ];
    }
}
?>