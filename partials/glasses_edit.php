<?php
require_once("connection.php");

$id="";
$name="";
$image="";
$price="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["id"])){
        header("location:/stranka/glasses_admin.php");
        exit;
    }

    $id=$_GET["id"];

    $sql="SELECT *FROM glasses WHERE id=$id";
    $result =$connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row){
        header("location:/stranka/glasses_admin.php");
        exit;    
    }
    $name=$row["name"];
    $image=$row["image"];
    $price=$row["price"];
}
else{
    $id=$_POST["id"];
    $name=$_POST["name"];
    $image=$_POST["image"];
    $price=$_POST["price"];

    do{
        if( empty($id)||empty($name)||empty($image)||empty($price) ){
            $errorMessage ="All fields are required";
            break;
        }

        $sql="UPDATE glasses SET name='$name',image='$image',price='$price' WHERE id=$id";
        $result =$connection->query($sql);

        if(!$result){
            $errorMessage ="Invalid query" . $connection->error;
            break;
        }
        
        $successMessage ="Client updated correctly";

        header("location:/stranka/glasses_admin.php");

    }while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container my-5">
        <h2>New product</h2>

        <?php
        if(!empty($errorMessage)){
            echo"
            <div class='alert alert-warning alert-dismissible fade show'role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
        ?>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Image</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="image" value="<?php echo $image;?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="price" value="<?php echo $price;?>">
                </div>
            </div>


            <?php
               if(!empty($successMessage)){
                echo"
                <div class='row mb-3'
                    <div class='offset-sm3 col-sm6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }

            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary"href="/stranka/glasses_admin.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>