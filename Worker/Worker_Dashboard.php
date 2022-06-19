<?php 

include('db.php');
session_start();

echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="WorkerDashboard.css">
    <link href=\'https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css\' rel=\'stylesheet\'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<div class="sidebar">
<div class="logo-details">
  
      <img class="logo_design" src="file:///C:/Users/DELL/Desktop/images/wsc-modified.png" alt="logo">
  
  <span class="logo_name">WSC</span>
</div>

  <ul class="nav-links">
    <li>
      <a class="active">
        <i class=\'bx bx-grid-alt\'></i>
        <span class="links_name">Overview</span>
      </a>
      <li>
      <a href="WorkerProfile.php" class="">
        <i class=\'bx bx-user\' ></i>
        <span class="links_name">Profile</span>
      </a>
    </li>
    <li>
    <a href="WorkerrTasks.php">
      <i class=\'bx bx-user\'></i>
      <span class="links_name">Task</span>
    </a>
  </li>

    <li class="log_out">
    <a href="../logout.php">
        <i class=\'bx bx-log-out\'></i>
        <span class="links_name">Log out</span>
      </a>
    </li>
  </ul>
</div>
<section class="home-section">
';



$SQL='select * from account where usertype="Worker"';
    $exeSQL=mysqli_query( $conn ,$SQL) or die(mysqli_error( $conn ));
    while($array = mysqli_fetch_array($exeSQL)) {
      echo '<nav>
      <div class="sidebar-button">
        <i class=\'bx bx-menu sidebarBtn\'></i>
        <span class="dashboard">Worker Dashboard</span>
      </div>
      <div class="profile-details">
        <span class="admin_name">'.$array['firstname'].'  '.$array['lastname'].'</span>
      </div>
      </nav>';
    }
    $query1 = "SELECT * FROM `task`";
    echo "$query1";
    $result1 = mysqli_query( $conn , $query1);   

      if ($result1)
      {
          // it return number of rows in the table.
          $total = mysqli_num_rows($result1);
          echo "$total";
          // close the result.
          mysqli_free_result($result1);
      }
      $query2 = "SELECT * FROM task WHERE status='done' ";
    echo "$query2";
    $result2 = mysqli_query( $conn , $query2);
        
      if ($result2)
      {
          // it return number of rows in the table.
          $total2 = mysqli_num_rows($result2);
          echo "$total2";
          // close the result.
          mysqli_free_result($result2);
      }
      $query3 = "SELECT * FROM task WHERE status='done' ";
      echo "$query3";
      $result3 = mysqli_query( $conn , $query3);
          
        if ($result3)
        {
            // it return number of rows in the table.
            $total3 = mysqli_num_rows($result3);
            echo "$total3";
            // close the result.
            mysqli_free_result($result3);
        }
 echo'
<div class="home-content">
  <div class="overview-boxes">
    <div class="box">
      <div class="right-side">
        <div class=\'box-topic\'>Total Tasks</div>
        <div class="number">
        
        '.$total.'
        
        </div>
        <div class="indicator">
        
          <i class=\'bx bx-up-arrow-alt\'></i>
        </div>
      </div>
      
      
    </div>
    <div class="box">
      <div class="right-side">
        <div class=\'box-topic\'>Completed</div>
        <div class="number">
         '.$total2.'
        </div>
        <div class="indicator">
          <i class=\'bx bx-up-arrow-alt\'></i>
        </div>
      </div>
      
    </div>
    <div class="box">
      <div class="right-side">
        <div class=\'box-topic\'>Pending</div>
        <div class="number">
        '.$total3.'
        </div>
        <div class="indicator">
          <i class=\'bx bxs-arrow-from-bottom\'></i>
        </div>
      </div>
      
    </div>
    
  </div>

  <div class="sales-boxes">
    <div class="recent-sales box">
      <div class="title">Recently Added Tasks</div>
      <div class="sales-details">
        <ul class="details">
          <li class="topic">Task ID</li>
          1
        </ul>
        <ul class="details">
        <li class="topic">Task Name</li>
        Jobs
      </ul>
      <ul class="details">
        
      </ul>
      <ul class="details">
        <li class="topic">Start Date</li>
        
      </ul>
      </div>
      <div class="button">
        <a href="WorkerrTasks.php">See All</a>
      </div>
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

'; ?>