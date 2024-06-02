<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        include_once("partials/connection.php");
        ?>
</head>
<body>
    <div class="container my-5">
        <h2>List of products</h2>
        <a class="btn btn-primary" href="/stranka/index.php" role="button">Home</a>
        <a class="btn btn-primary" href="/stranka/partials/glasses_create.php" role="button">New product</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
        <?php
        $sql="SELECT * FROM glasses";

        $result = $connection->query($sql);
        if(!$result){
            die("Invalid query:".$connection->connection_error);
        }

        while($row=$result->fetch_assoc()){
            echo"
            <tr>
    
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[image]</td>
                <td>$row[price]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/stranka/partials/glasses_edit.php?id=$row[id]' >Edit</a>
                    <a class='btn btn-danger btn-sm' href='/stranka/partials/glasses_delete.php?id=$row[id]' >Delete</a>
                </td>
            </tr>
            ";
        }
        ?>
        </tbody>
        </table>
    </div>

</body>
</html>

