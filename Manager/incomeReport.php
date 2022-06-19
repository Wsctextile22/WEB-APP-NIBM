<?php
    $servername = "localhost";
    $username = "root";
    $password ="";
    $database = "wsctextiles";

    //create connection
    $connection = new mysqli($servername,$username,$password,$database);

   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css>
    <title>Product Income Report</title>
    
</head>
<body>
<div class = "container my-5">

        <div class ="text-center mt-5 mb-4">
            <h1 style="background-color:powderblue;">WSC Textiles(pvt) Ltd</h1> 
            <h2>Income Report</h2>
            <p>Pending and rejected products won't be fetched!</p>
            
        </div>

    <br>
    <br>
    <table class="table table-bordered table-striped table-dark table-hover">
        <thead >
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>               
                <th>Quantity</th>
                <th>Cost Per Unit</th>
                <th>Total Cost</th>
                
            </tr>
        </thead>  
        <tbody>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "wsctextiles";
                
                //create connection
                $connection = new mysqli($servername,$username,$password,$database);

                //check connection
                if($connection->connect_error) {
                    die("Connection Failed:".$connection->connect_error);
                }

                //read all row from database table
                $sql = "SELECT distinct product_id,product_name,quantity,cost_per_unit,total_cost
                FROM product WHERE product_status='CONFIRMED' ORDER BY product_name ";
                $result = $connection->query($sql);

                if(!$result){
                    die("Invalid query:".$connection->error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                <td>$row[product_id]</td>
                <td>$row[product_name]</td>
                <td>$row[quantity]</td>
                <td>$row[cost_per_unit]</td>
                <td>$row[total_cost]</td>
                
            </tr>
            ";

                }
            ?>
            
        </tbody>

    </table>
</div> 
</body>
</html>