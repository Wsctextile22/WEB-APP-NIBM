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
            <h2>Attendance Report</h2>
         
            
        </div>

    <br>
    <br>
    <table class="table table-bordered table-striped table-dark table-hover">
        <thead >
            <tr>
                <th>Attendance ID</th>
                <th>Account ID</th>               
                <th>Check-in Time</th>
                <th>Check-out Time</th>
                
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
                $sql = "SELECT distinct *
                        FROM attendance ORDER BY date_time_in";
                $result = $connection->query($sql);

                if(!$result){
                    die("Invalid query:".$connection->error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                <td>$row[attendance_id]</td>
                <td>$row[account_id]</td>
                
                <td>$row[date_time_in]</td>
                <td>$row[date_time_out]</td>
                
            </tr>
            ";

                }
            ?>
            
        </tbody>

    </table>
</div> 
</body>
</html>