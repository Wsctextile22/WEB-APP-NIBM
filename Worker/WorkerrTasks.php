<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="WorkerTasks.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
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
          <a href="Worker_Dashboard.php" class="">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Overview</span>
          </a>
        </li>
        <li>
          <a href="WorkerProfile.php" class="">
            <i class='bx bx-user' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <!-- <li>
          <a href="Production.php" class="">
            <i class='bx bx-group' ></i>
            <span class="links_name">Production</span>
          </a>
        </li>        -->
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Tasks</span>
      </div>   
    </nav>
    <div class="home-content">
      <div class="overview-boxes">      
      </div>
    <div class="sales-boxes">
      <div class="recent-sales box">
        <h1>Task Shedule</h1><br><br>
                <table  class="table table-bordered table-striped table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Task Name &nbsp;&nbsp;&nbsp; &nbsp; </th>
                            <th>Start Date &nbsp;&nbsp;&nbsp; &nbsp; </th>
                            <th>End Date &nbsp;&nbsp;&nbsp; &nbsp; </th>
                            <th>Product Material &nbsp;&nbsp;&nbsp; &nbsp; </th>
                            <th>Product Details&nbsp;&nbsp;&nbsp; &nbsp;</th>
                            <!-- <th>Status</th> -->

                        </tr>
                    </thead>
                    <tbody>
                   <?php
            include("db.php");;
              //$con = mysqli_connect($host,$uname,$pwd);
              //mysqli_select_db($con, $db_name);
              $sql ="SELECT `task`.`task_name`,`task`.`task_details`,`task`.`raw_materials`,`task`.`start_date`,`task`.`end_date` FROM `task` 
              INNER JOIN worker_task on `task`.`task_id`=`worker_task`.`task_id`
              WHERE `worker_task`.`worker_id`=3";

              $result = mysqli_query($conn, $sql);
              $statusValue='';
             // if (mysqli_num_rows($result ) > 0) {
              while( $row = mysqli_fetch_array($result))
              {
              $Task_Name = $row['task_name'];
              $Product_Type=$row['task_details'];
              $Product_Qty=$row['raw_materials'];
              $Start_Date=$row['start_date'];
              $End_Date=$row['end_date'];
            
             
              
             // $row = array_unique($row);

                  // if($Status==0){$statusValue='Pending';}
                  // else if($Status==1){$statusValue='Complete';}
                  // else if($Status==2){$statusValue='Reject';}

               

               ?> 
                  <tr>
                        
                    <td><?php echo $Task_Name;?>&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $Start_Date; ?>&nbsp;&nbsp;&nbsp; </td>
                        <td><?php echo $End_Date;?>&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $Product_Qty; ?>&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo  $Product_Type; ?>&nbsp;&nbsp;&nbsp;</td>
                        <!-- <td><?php //echo $statusValue; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
                        <!-- <td>
                            <div class="button">
                             <a href="#">Accept</a>
                             </div> 
                        </td> -->
                    </tr>
                    <?php }
                   // } ?>
                    </tbody>
                </table>

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

