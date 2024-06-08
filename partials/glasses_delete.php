<?php
include('../_inc/classes/product.php');

$product = new Product();
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $product->deleteProduct($id);
    header("Location: /stranka/glasses_admin.php");
    exit;

    if(!empty($result['errorMessage'])) {
        echo "Error: " . $result['errorMessage'];
    } else {
        header("Location: /stranka/index.php");
        exit();
    }
} else {
    echo "Error: Product ID is missing.";
}
?>