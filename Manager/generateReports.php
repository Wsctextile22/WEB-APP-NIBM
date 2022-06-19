<?php 

include('config.php');
session_start();

echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="managerDashboard.css">
    <link href=\'https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css\' rel=\'stylesheet\'>
    <link rel="stylesheet" href=https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css>
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
        <a href="managerDashboard.php">
        <i class=\'bx bx-grid-alt\'></i>
        <span class="links_name">Overview</span>
      </a>
    </li>
    <li>
      <a href="managerProfile.php">
        <i class=\'bx bx-user\'></i>
        <span class="links_name">Profile</span>
      </a>
    </li>
    <li>
      <a href="empData.php">
        <i class=\'bx bxs-user-check\'></i>
        <span class="links_name">Employees</span>
      </a>
    </li>
    <li>
      <a href="task.php">
        <i class=\'bx bx-edit\'></i>
        <span class="links_name">Manage Tasks</span>
      </a>
    </li>
    <li>
        <a class="active">
        <i class=\'bx bxs-report\'></i>
        <span class="links_name">Generate Reports</span>
      </a>
    </li>
    <li>
      <a href="sendEmail.php">
        <i class=\'bx bxs-envelope\'></i>
        <span class="links_name">Mailing</span>
      </a>
    </li>

    <li class="log_out">
      <a href="file:///C:/Users/DELL/Desktop/login.html">
        <i class=\'bx bx-log-out\'></i>
        <span class="links_name">Log out</span>
      </a>
    </li>
  </ul>
</div>
<section class="home-section">

    <nav>
      <div class="sidebar-button">
        <i class=\'bx bx-menu sidebarBtn\'></i>
        <span class="dashboard"> Generate Reports</span>
      </div>
    
    </nav>

    <div class="home-content">
        
         <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Daily Production</div>
            <input type="button" class="btn btn-info" value="Generate">
          </div>
          <i class=\'bx bx-closet bx-tada bx-lg\' style=\'color:#ff3737\'  ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Monthly Summary</div>
            <input type="button" class="btn btn-info" value="Generate">
          </div>
          <i class=\'bx bx-notepad bx-flashing bx-rotate-90 bx-lg\' style=\'color:#ff3737\' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Attendance</div>
            <button class="btn btn-info" onclick="document.location=\'attendanceReport.php\'">Generate</button>
          </div>
          <i class=\'bx bxs-user-pin bx-burst\' style=\'color:#ff3737\' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Production Income</div>
            <button class="btn btn-info" onclick="document.location=\'incomeReport.php\'">Generate</button>
            
          </div>
          <i class=\'bx bx-bar-chart-alt bx-flashing\' style=\'color:#ff3737\' ></i>
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