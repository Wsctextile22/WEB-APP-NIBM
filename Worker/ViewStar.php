<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="WorkerTasks.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
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
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Overview</span>
          </a>
        </li>
        <li>
          <a href="Worker_Dashboard" class="">
            <i class='bx bx-user' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="supervisorProfile.php" class="">
            <i class='bx bx-group' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>       
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
        <h1>View Star</h1><br><br>
                <table >
                    <thead>
                        <tr>
                            <th>Supervisor ID &nbsp;&nbsp;&nbsp; &nbsp; </th>
                            <th>Point  &nbsp;&nbsp;&nbsp; &nbsp; </th>
                            <!-- <th>Status</th> -->

                        </tr>
                    </thead>
                    <tbody>
                   <?php
            include("db.php");
              //$con = mysqli_connect($host,$uname,$pwd);
              //mysqli_select_db($con, $db_name);
              $sql= "SELECT `supervisor`.`Start_Date`,`supervisor`.`Supervisor_id`,`supervisor`.`End_Date`,`account`.`First_name`FROM  `supervisor`
              INNER JOIN `account` ON `supervisor`.`Acc_Id`=`account`.`Account_id`
              WHERE `supervisor`.`Supervisor_id`=1";

              $result = mysqli_query($conn, $sql);

              while( $row = mysqli_fetch_array($result))
              {
                $Name=$row['First_name'];
              $star = $row['Supervisor_id'];
              $Start_Date=$row['Start_Date'];
              $End_Date=$row['End_Date'];
              //$days =$End_Date->diff($Start_Date)->format('%a');
              // $rates = '';
              // $stars = floor($rates);
          
              // $rates = '';
              // $j = 0;
              // for ($i = 0; $i < 5; $i++) {
              //   for ($j; $j < $stars; $j++) {
              //     $rates .= '<span class="fa fa-star"></span>';
              //     $i++;
              //   }
              //   if ($i < 5) {
              //     $rates .= '<span class="fa fa-star-o"></span>';
              //   }
              // }

              
            
             
              
             // $row = array_unique($row);

                  // if($Status==0){$statusValue='Pending';}
                  // else if($Status==1){$statusValue='Complete';}
                  // else if($Status==2){$statusValue='Reject';}

               

               ?> 
                  <tr>
                        
                    <td><?php echo $Name ?>&nbsp;&nbsp;&nbsp;</td>
                        <td><?php  echo $star
                      //  // $Star=$Start_Date - $End_Date;
                      //   echo $days_between ; ?>&nbsp;&nbsp;&nbsp; </td>

                        <!-- <td><?php //echo $statusValue; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
                        <!-- <td>
                            <div class="button">
                             <a href="#">Accept</a>
                             </div> 
                        </td> -->
                    </tr>
                    <?php } ?>
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

