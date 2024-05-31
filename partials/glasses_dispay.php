
<?php
 require_once("connection.php");
$sql = "SELECT image, name, price FROM glasses";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        displayProductBox($row["name"], $row["price"], $row["image"]);
    }
} else {
    echo "0 results";
}

// Function to display a product box
$connection->close();
function displayProductBox($name, $price, $image_url) {
   echo '
       <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
       <div class="glasses_box">
       <figure><img src="' . htmlspecialchars($image_url) . '" alt="' . htmlspecialchars($name) . '></figure>
       <h3><span class="blu">$</span>' . htmlspecialchars($price) . '</h3>
       <p>' . htmlspecialchars($name) . '</p>
       </div>
       </div>';
      }
   
?>
