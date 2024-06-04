<?php
include_once("connection.php");

class Glasses_Display extends Database {
    public function getGlasses() {
        $sql = "SELECT image, name, price FROM glasses";
        $result = $this->connect()->query($sql);

        if ($result->rowCount() > 0) {
            // Output data of each row
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $this->displayProductBox($row["name"], $row["price"], $row["image"]);
            }
        } else {
            echo "0 results";
        }
    }

    // Function to display a product box
    function displayProductBox($name, $price, $image_url) {
        echo '
        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
            <div class="glasses_box">
                <figure><img src="' . $image_url . '" alt="' . $name . '"></figure>
                <h3><span class="blu">$</span>' . $price . '</h3>
                <p>' . $name . '</p>
            </div>
        </div>';
    }
}
?>
