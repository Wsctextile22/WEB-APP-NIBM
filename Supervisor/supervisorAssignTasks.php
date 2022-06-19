<?php 

session_start();

$workerID=$_GET['workerID'];

echo '<!DOCTYPE html> 
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="supervisorAssignTasks.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Tasks</div>
    <div class="content">
      <form method="post" action="taskAssigned.php?workerID='.$workerID.'">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Task Name</span>
            <input type="text" name="task_name" placeholder="Enter task name" required>
          </div>
          <div class="input-box">
            <span class="details">Tast details</span>
            <input type="text" name="task_details" placeholder="Enter task details" required>
            
          </div>
          <div class="input-box">
            <span class="details">Raw materials</span>
            <input type="text" name="raw_materials" required>
          </div>
          <div class="input-box">
            <span class="details">Start date</span>
            <input type="date" name="start_date" required>
          </div>
          
          <div class="input-box">
            <span class="details">End date</span>
            <input type="date" name="end_date" required>
          </div>
          <div class="input-box">
            <span class="details">Task priority</span>
            <input type="text" name="task_priority" placeholder="Enter priority type" required>
          </div>
        </div> 
        <div class="button">
          <input type="submit" value="Assign task">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
';
?>