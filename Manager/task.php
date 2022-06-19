<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks Management</title>
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css>
</head>
<body>

<div class = "container my-5">
    <h2 class="blue-text" style="color: blue;">List of Tasks</h2>
    <i class='bx bxs-add-to-queue bx-tada bx-lg' style='color:#0d6efd' ></i>
    <a class="btn btn-outline-primary" href="/Manager/createTask.php" role="button">Create New Task</a>
    
    <br>
    <br>
    <div class="table-responsive">
    <table class="table table-bordered table-striped table-dark table-hover thead-dark">
        <thead>
            <tr>
                <th>Task ID</th>
                <th>Task Name</th>               
                <th>Details</th>
                <th>Raw Materials</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Task Priority</th>               
                <th>Supervisor_id</th>
                <th>Manager ID</th>
                <th>Action</th>
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
                $sql = "SELECT * FROM task";
                $result = $connection->query($sql);

                if(!$result){
                    die("Invalid query:".$connection->error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                <td>$row[task_id]</td>
                <td>$row[task_name]</td>
                <td>$row[task_details]</td>
                <td>$row[raw_materials]</td>
                <td>$row[start_date]</td>
                <td>$row[end_date]</td>
                <td>$row[task_priority]</td>
                <td>$row[supervisor_id]</td>
                <td>$row[manager_id]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/Manager/editTask.php?task_id=$row[task_id]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='/Manager/deleteTask.php?task_id=$row[task_id]'>Delete</a>
                </td>
            </tr>
            ";

                }
            ?>
            
        </tbody>

    </table>
    </div>
</div>    
    
</body>
</html>