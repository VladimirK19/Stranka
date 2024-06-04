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

$Glasses_edit = new Edit();

$id = "";
$name = "";
$image = "";
$price = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location:/stranka/glasses_admin.php");
        exit;
    }

    $id = $_GET["id"];

    $row = $Glasses_edit->getGlassesById($id);

    if (!$row) {
        header("location:/stranka/glasses_admin.php");
        exit;
    }
    $name = $row["name"];
    $image = $row["image"];
    $price = $row["price"];
} else {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $image = $_POST["image"];
    $price = $_POST["price"];

    do {
        if (empty($id) || empty($name) || empty($image) || empty($price)) {
            $errorMessage = "All fields are required";
            break;
        }

        if ($Glasses_edit->updateGlasses($id, $name, $image, $price)) {
            $successMessage = "Client updated correctly";
            header("location:/stranka/glasses_admin.php");
            exit;
        } else {
            $errorMessage = "Invalid query";
            break;
        }

    } while (false);
}
