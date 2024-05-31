<?php
require_once("connection.php");         //Fetch products from the database
if(isset($_GET["id"])){
    $id=$_GET["id"];

 $sql="DELETE FROM glasses WHERE id=$id";
 $connection->query($sql);
}
 header("location:/stranka/glasses_admin.php");
        exit;
?>