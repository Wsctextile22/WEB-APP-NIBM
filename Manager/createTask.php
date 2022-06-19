<?php

    $servername = "localhost";
    $username = "root";
    $password ="";
    $database = "wsctextiles";

    //create connection
    $connection = new mysqli($servername,$username,$password,$database);


    $task_name="";
    $task_details="";
    $raw_materials="";
    $start_date="";
    $end_date="";
    $task_priority="";
    $supervisor_id="";
    $manager_id="";
   

    $errorMessage="";
    $successMessage = "";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $task_name=$_POST["task_name"];
        $task_details=$_POST["task_details"];
        $raw_materials=$_POST["raw_materials"];
        $start_date=$_POST["start_date"];
        $end_date=$_POST["end_date"];
        $task_priority=$_POST["task_priority"];
        $supervisor_id=$_POST["supervisor_id"];
        $manager_id=$_POST["manager_id"];
        

        do{
            if(empty($task_name)||empty($task_details)||empty($raw_materials)||empty($start_date)||empty($end_date)||
            empty($task_priority)||empty($supervisor_id)||empty($manager_id))
            {
                $errorMessage = "All fields are required!";
                break;
            }

          //add task to DB
            $sql = "INSERT INTO task (task_name,task_details,raw_materials,start_date,end_date,task_priority,supervisor_id,manager_id)
                    VALUES ('$task_name','$task_details','$raw_materials','$start_date','$end_date','$task_priority','$supervisor_id','$manager_id')";
            $result=$connection->query($sql);

            if(!$result){
                $errorMessage = "Invalid Query:" .$connection->error;
                break;
            }


            
            $task_name="";
            $task_details="";
            $raw_materials="";
            $start_date="";
            $end_date="";
            $task_priority="";
            $supervisor_id="";
            $manager_id="";
                
            $successMessage = "Task created successfully!";

            header("location: /Manager/task.php");
            exit;
          

        }while(false);
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Tasks</title>
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class ="container my-5">
        <h2>Create New Task</h2>

        <?php
          if(!empty($errorMessage)){
            echo"
            <div class ='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type ='button' class = 'btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
          }  

        ?>


        <form method = "post">
        <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Task Name</label>
                <div class="col-sm-6">
                    <input type="text" class = "form-control" name="task_name" value="<?php echo $task_name; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Task Details</label>
                <div class="col-sm-6">
                    <input type="text" class = "form-control" name="task_details" value="<?php echo $task_details; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Raw Materials</label>
                <div class="col-sm-6">
                    <input type="text" class = "form-control" name="raw_materials" value="<?php echo $raw_materials; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Start Date</label>
                <div class="col-sm-6">
                    <input type="date" class = "form-control" name="start_date" value="<?php echo $start_date; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">End Date</label>
                <div class="col-sm-6">
                    <input type="date" class = "form-control" name="end_date" value="<?php echo $end_date; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Task Priority</label>
                <div class="col-sm-6">
                    <input type="text" class = "form-control" name="task_priority" value="<?php echo $task_priority; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Supervisor ID</label>
                <div class="col-sm-6">
                    <input type="text" class = "form-control" name="supervisor_id" value="<?php echo $supervisor_id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class ="col-sm-3 col-form-label">Manager ID</label>
                <div class="col-sm-6">
                    <input type="text" class = "form-control" name="manager_id" value="<?php echo $manager_id; ?>">
                </div>
            </div>

            <?php
          if(!empty($successMessage)){
            echo"
            <div class = 'row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
                 <div class ='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>$successMessage</strong>
                    <button type ='button' class = 'btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 </div>
            </div>
            </div>
            ";
          }  

        ?>
            <div class = "row mb-3">
                <div class = "offset-sm-3 col-sm-3 d-grid">
                    <button type ="submit" class = "btn btn-outline-success">Submit</button>
                </div>
                <div class = "col-sm-3 d-grid">
                    <a class = "btn btn-outline-secondary" href=" /Manager/task.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    
</body>
</html>