<?php 

include('../db.php');
session_start();

echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="supervisorDashboard.css">
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
          <a class="active">
            <i class=\'bx bx-grid-alt\' ></i>
            <span class="links_name">Overview</span>
          </a>
        </li>
        <li>
          <a href="supervisorProfile.php">
            <i class=\'bx bx-user\' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="supervisorTasks.php">
            <i class=\'bx bx-list-ul\' ></i>
            <span class="links_name">Tasks</span>
          </a>
        </li>
        <li>
          <a href="supervisorWorkers.php">
            <i class=\'bx bx-group\' ></i>
            <span class="links_name">Workers</span>
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

    $SQL='select * from account where usertype="Supervisor"';
    $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
    while($array = mysqli_fetch_array($exeSQL)) {
      echo '<nav>
      <div class="sidebar-button">
        <i class=\'bx bx-menu sidebarBtn\'></i>
        <span class="dashboard">Supervisor Dashboard</span>
      </div>
      <div class="profile-details">
        <span class="admin_name">'.$array['firstname'].'  '.$array['lastname'].'</span>
      </div>
    </nav>' ;
    }
    echo'
    <div class="home-content">
      <div class="overview-boxes">';
      $SQL="select * from product where product_status='CONFIRMED'";
      $exeSQL=mysqli_query($conn, $SQL);
      $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
      $productsCompleted = mysqli_num_rows($exeSQL);

      //pending 
      $SQL="select * from product where product_status='PENDING'";
      $exeSQL=mysqli_query($conn, $SQL);
      $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
      $productsPending = mysqli_num_rows($exeSQL);

      //progress
      $SQL="select * from product where product_status='progress'";
      $exeSQL=mysqli_query($conn, $SQL);
      $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
      $productsProgress = mysqli_num_rows($exeSQL);

      //progress
      $SQL="select * from product where product_status='rejected'";
      $exeSQL=mysqli_query($conn, $SQL);
      $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
      $productsRejected = mysqli_num_rows($exeSQL);

      $SQL="SELECT product_name,quantity,cost_per_unit FROM `product` WHERE product_status = 'CONFIRMED'";
      $exeSQL=mysqli_query($conn, $SQL);
      $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));

     
      
      echo'

        <div class="box">
          <div class="right-side">
            <div class="box-topic">Completed products</div>
            <div class="number">'.$productsCompleted.'</div>
          </div>
          <i class=\'bx bx-basket cart\'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Pending products</div>
            <div class="number">'.$productsPending.'</div>
          </div>
          <i class=\'bx bx-bar-chart-square cart two\' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic"> On progress</div>
            <div class="number">'.$productsProgress.'</div>
          </div>
          <i class=\'bx bxs-album cart three\' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Rejected</div>
            <div class="number">'.$productsRejected.'</div>
          </div>
          <i class=\'bx bxs-exit cart four\' ></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Production</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Name</li>
              
            </ul>
            <ul class="details">
            <li class="topic">Quantity</li>
            
          </ul>
          <ul class="details">
            <li class="topic"> Cost per unit</li>
            
          </ul>
          </div>'
          ;
          while($array=mysqli_fetch_array($exeSQL)){
            echo '
            <div class="sales-details">
            <ul class="details">
              <li style="margin-left:16px;" class="topic">'.$array['product_name'].'</li>
            
            </ul>
            <ul class="details">
              <li style="margin-left:100px;;"  class="topic">'.$array['quantity'].'</li>
            
            </ul>
            <ul class="details">
            <li style="margin-left:180px;"  class="topic" >'.$array['cost_per_unit'].'</li>
          </ul>
          <ul class="details">
            
          </ul>
         
          </div>
            ';
          }
        echo'
        </div>
        <div class="top-sales box">';
        $SQL="SELECT product_name,quantity FROM `product` WHERE product_status='CONFIRMED' and quantity ORDER BY quantity DESC LIMIT 1";
        $exeSQL=mysqli_query($conn, $SQL);
        $exeSQL=mysqli_query($conn,$SQL) or die(mysqli_error($conn));
        while($arrayu=mysqli_fetch_array($exeSQL)){
          echo '
          <div class="title">Top Manufactured Product</div>
          <p>'.$arrayu['product_name'].' '.' - '.' '.$arrayu['quantity'].'</p>'
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

'; ?>