<?php 
session_start();
include("../db.php");

$workerID = $_GET['workerID'];

$task_name =  $_POST["task_name"];
$task_details =  $_POST["task_details"];
$start_date =  $_POST["start_date"];
$end_date =  $_POST["end_date"];
$task_priority =  $_POST["task_priority"];
$raw_materials= $_POST["raw_materials"];

echo"
<!DOCTYPE HTML>
<html>
	<head>
		<title>WSC</title>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no' />
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <link rel='stylesheet' href='registration_process.css'>
	</head>
						

						";

			//SQL query to store entered user details
            $SQL="INSERT INTO task (task_name,task_details,task_priority,raw_materials,start_date,end_date,supervisor_id,manager_id)
			VALUES (' $task_name', '$task_details','$raw_materials','$task_priority', '$start_date','$end_date',1,1)";
            $SQL1= "INSERT INTO worker_task(worker_id,task_id) VALUES ($workerID,LAST_INSERT_ID())";
            $exeSQL=mysqli_query($conn, $SQL);
            $exeError=mysqli_errno($conn);
           
            if($exeError=="0")
            {
                $exeSQL1=mysqli_query($conn, $SQL1);
                $exeError1=mysqli_errno($conn);
                echo "<h2 align='center'><b>Task assigned successfully!</b></h2>";
                echo "<h3 align='center'><a href='supervisorWorkers.php' class='btn btn-success'>Go Back</a>";
            }

echo "</body>";
?>