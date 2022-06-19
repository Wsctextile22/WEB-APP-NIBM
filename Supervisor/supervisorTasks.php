<?php 

include('../db.php');




echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="supervisorTasks.css">
    <link href=\'https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css\' rel=\'stylesheet\'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      
          <img class="logo_design" src="../images/wsc-modified.png" alt="logo">
      
      <span class="logo_name">WSC</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="supervisorDashboard.php" class="">
            <i class=\'bx bx-grid-alt\' ></i>
            <span class="links_name">Overview</span>
          </a>
        </li>
        <li>
          <a href="supervisorProfile.php" class="">
            <i class=\'bx bx-user\' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a class="active">
            <i class=\'bx bx-list-ul\' ></i>
            <span class="links_name">Tasks</span>
          </a>
        </li>
        <li>
          <a href="supervisorWorkers.php" class="">
            <i class=\'bx bx-group\' ></i>
            <span class="links_name">Workers</span>
          </a>
        </li>
        
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class=\'bx bx-menu sidebarBtn\'></i>
        <span class="dashboard">Tasks</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">';
      $SQL="select * from task where status='done'";
      $exeSQL=mysqli_query($conn, $SQL);
      $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
      $taskCompleted = mysqli_num_rows($exeSQL);

      //pending task
      $SQL="select * from task where status='pending'";
      $exeSQL=mysqli_query($conn, $SQL);
      $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
      $taskPending = mysqli_num_rows($exeSQL);

      //progress
      $SQL="select * from task where status='progress'";
      $exeSQL=mysqli_query($conn, $SQL);
      $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
      $taskProgress = mysqli_num_rows($exeSQL);
      

      $SQL="SELECT task_name,start_date,end_date FROM task";
      $exeSQL=mysqli_query($conn, $SQL);
      $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
      //$taskDetails = mysqli_num_rows($exeSQL);

        echo'
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Completed</div>
            <div class="number">'.$taskCompleted.'</div>
          </div>
          <i class=\'bx bx-check-square cart\'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Pending</div>
            <div class="number">'.$taskPending.'</div>
          </div>
          <i class=\'bx bxs-calendar-exclamation cart two\' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic"> On Progress</div>
            <div class="number">'.$taskProgress.'</div>
          </div>
          <i class=\'bx bxs-alarm-exclamation cart three\' ></i>
        </div>
       
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent completed task</div>
          <div class="sales-details">
            <p class="details">
              <p class="topic">Task name</p>
              
            </p>
            <p class="details">
            <p class="topic">Start date</p>
            
          </p>
          <p class="details">
            <p class="topic"> End date </p>
            
          </p>
          </div>'
          ;
          while($array=mysqli_fetch_array($exeSQL)){
            echo '
            <div style="margin-top:20px;" class="sales-details">
            <p class="details">
              <p style="margin-left:16px;" class="topic">'.$array['task_name'].'</p>
            
            </p>
            <p class="details">
              <p style="margin-left:100px;;"  class="topic">'.$array['start_date'].'</p>
            
            </p>
            <p class="details">
            <p style="margin-left:180px;"  class="topic" >'.$array['end_date'].'</p>
          </p>
          </div>
            ';
          }
        echo'
        </div>
        <div class="top-sales box">
          <div class="title">Top Performing Worker</div>
          ';
          $SQL="SELECT account.account_id, account.firstname,account.lastname from worker INNER JOIN account ON worker.account_id=account.account_id WHERE worker.worker_id=(SELECT worker_id FROM task WHERE status='done' GROUP BY worker_id ORDER BY COUNT(*) DESC LIMIT 1)";
        $exeSQL=mysqli_query($conn, $SQL);
        $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
        while($arrayu=mysqli_fetch_array($exeSQL)){
          echo '
          <div class="sales-details">
            <ul class="details">
              <li style="margin-left:16px;" class="topic">'.$arrayu['firstname'].' '.$arrayu['lastname'].'</li>
            
            </ul>
          </div>
          '
          ;
        }
        echo'
         
        </div>
      </div>
    </div>
  </section>

  <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

</body>
</html>

'; 
?>