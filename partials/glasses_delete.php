<?php
// Include the Product class file
include('../_inc/classes/product.php');

// Create a new Product object
// Usage example:
$product = new Product();
// Check if the 'id' parameter is set in the URL
if(isset($_GET['id'])) {
    // Get the id from the URL
    $id = $_GET['id'];

    // Call the deleteProduct function with the id
    $result = $product->deleteProduct($id);
    header("Location: /stranka/glasses_admin.php");
    exit;

    // Check the result of the deletion
    if(!empty($result['errorMessage'])) {
        // If there's an error, display it
        echo "Error: " . $result['errorMessage'];
    } else {
        // If successful, redirect back to the products page
        header("Location: /stranka/index.php");
        exit();
    }
} else {
    // If 'id' parameter is not set, display an error
    echo "Error: Product ID is missing.";
}
?>