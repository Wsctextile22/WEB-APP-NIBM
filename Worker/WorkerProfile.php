<?php 

include("db.php");
session_start();
// $workerID = $_GET['workerID'];

echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="worker_Profile.css">
    
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
              <a href="Worker_Dashboard.php" class="">
                <i class=\'bx bx-grid-alt\' ></i>
                <span class="links_name">Overview</span>
              </a>
            </li>
            <li>
              <a class="active">
                <i class=\'bx bx-user\' ></i>
                <span class="links_name">Profile</span>
              </a>
            </li>
            <li>
              <a href="WorkerrTasks.php">
                <i class=\'bx bx-list-ul\' ></i>
                <span class="links_name">Tasks</span>
              </a>
            </li>
          
          </ul>
      </div>
      <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class=\'bx bx-menu sidebarBtn\'></i>
          <span class="dashboard">Profile</span>
        </div>
      </nav>
      <div class="home-content">
        <div class="overview-boxes">
        <div class="container">
        <div class="container">
        <header>Profile</header>';
        
        if(!(isset($_SESSION['usertype']) and isset($_SESSION['accountid'])))
                {
                  echo'failed';
                }
                else{
                  $accountid=$_SESSION['accountid'];
                  $SQL = "select * from account where account_id='$accountid'  ";
                  $exeSQL = mysqli_query($conn,$SQL) or die(mysqli_error($conn));
                  while($array=mysqli_fetch_array($exeSQL)){
          echo'
        <form action="supervisorProfile_update.php">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Fisrt Name</label>
                            <input type="text" name="firstname" value='.$array['firstname'].'  required>
                        </div>
                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" name="lastname" value='.$array['lastname'].'  required>
                        </div>
                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" value='.$array['dob'].'  required>
                        </div>

                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" value='.$array['email'].'  required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="text" name="mobile_number" value='.$array['mobile_number'].'  required>
                        </div>
                        <div class="input-field">
                            <label>Telephone Number</label>
                            <input type="text" name="telephone_number" value='.$array['telephone_number'].'  required>
                        </div>
                        <div class="input-field">
                            <label>Gender</label>
                            <input type="text" name="gender" value='.$array['gender'].'  required>
                        </div>
                        <div class="input-field">
                            <label>Usertype</label>
                            <input type="text" name="usertype" value='.$array['usertype'].'  required>
                        </div>

                        <div class="input-field">
                            <label>NIC</label>
                            <input type="text" name="nic" value='.$array['nic'].'  required>
                        </div>
                        <div class="details address">
                        <span class="title">Address Details</span>
    
                        <div class="fields">
                            <div class="input-field">
                                <label>Address Type</label>
                                <input type="text" name="address_number" value='.$array['address_number'].'  required>
                            </div>
    
                            <div class="input-field">
                                <label>Street</label>
                                <input type="text" name="street" value='.$array['street'].'  required>
                            </div>
    
                            <div class="input-field">
                                <label>District</label>
                                <input type="text" name="district" value='.$array['district'].'  required>
                            </div>
    
                            <div class="input-field">
                                <label>Province</label>
                                <input type="text" name="province" value='.$array['province'].'  required>
                            </div>

                            <button class="sumbit">
                                <span class="btnText">Update</span>
                                
                            </button>
                            </div>
                       
                    </div>
                      
                    </div>
                </div>

                
            </div>

           
        </form>';
                  }}
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