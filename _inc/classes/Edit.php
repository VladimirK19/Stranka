<?php
require_once("connection.php");

class Edit extends Database {
    public function getGlassesById($id) {
        $sql = "SELECT * FROM glasses WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateGlasses($id, $name, $image, $price) {
        $sql = "UPDATE glasses SET name=:name, image=:image, price=:price WHERE id=:id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}
