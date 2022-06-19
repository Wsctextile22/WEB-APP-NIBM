


<?php


//Create a connection
$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"wsctextiles");

 //Perform SQL Operation
 $sql = "SELECT * FROM account WHERE usertype='Quality_checker'";

 
 $result = mysqli_query($con,$sql);
 
 if($row = mysqli_fetch_array($result))

 {
$firstname= $row[1];
$lastname=$row[2];                        
 }
 else
 {
   echo "No data found.";
 }


 $query = "SELECT * FROM `product`";
 $result = mysqli_query($con, $query);
      
    if ($result)
    {
        // it return number of rows in the table.
        $total = mysqli_num_rows($result);
        // close the result.
        mysqli_free_result($result);
    }

    $query = "SELECT * FROM `product` WHERE product_status='CONFIRMED'";
    $result = mysqli_query($con, $query);
         
       if ($result)
       {
           // it return number of rows in the table.
           $confirm = mysqli_num_rows($result);
           // close the result.
           mysqli_free_result($result);
       }
       $query = "SELECT * FROM `product` WHERE product_status='REJECTED'";
       $result = mysqli_query($con, $query);
            
          if ($result)
          {
              // it return number of rows in the table.
              $REJECTED = mysqli_num_rows($result);
              // close the result.
              mysqli_free_result($result);
          }
          $query = "SELECT * FROM `product` WHERE product_status='PENDING'";
          $result = mysqli_query($con, $query);
               
             if ($result)
             {
                 // it return number of rows in the table.
                 $PENDING = mysqli_num_rows($result);
                 // close the result.
                 mysqli_free_result($result);
             }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="qualityCheckerDashboard.css"/>
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
          <a class="active">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Overview</span>
          </a>
        </li>
        <li>
          <a href="qualityCheckerProfile.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Profile</span>
          </a>
        </li>
        <li>
          <a href="cammera-barcode.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Quality Check</span>
          </a>
        </li>
        <li>
          <a href="./workers-list.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Workers</span>
          </a>
        </li>
        <li>
          <a href="add-product-quality.php">
            <i class='bx bx-user' ></i>
            <span class="links_name">Production Details</span>
          </a>
        </li>
     
    
        <li class="log_out">
          <a href="../logout.php">
            <i class='bx bx-log-out'></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Quality Checker Dashboard</span>
      </div>
      <div class="profile-details">
        
        <span class="admin_name"><?php echo "$firstname $lastname"?></span>
        <i class='bx bx-chevron-down' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Total Products</div>
            <div class="number"><?php echo "$total"?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
            </div>
          </div>
          <i class='bx bx-cart-alt cart'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Confirm Products</div>
            <div class="number"><?php echo "$confirm"?></div>
            <div class="indicator">
              <i class='bx bx-up-arrow-alt'></i>
            </div>
          </div>
          <i class='bx bxs-cart-add cart two' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Pending Products</div>
            <div class="number"><?php echo "$PENDING"?></div>
            <div class="indicator">
              <i class='bx bxs-arrow-from-bottom'></i>
            </div>
          </div>
          <i class='bx bx-cart cart three' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Rejected Products</div>
            <div class="number"><?php echo "$REJECTED"?></div>
            <div class="indicator">
              <i class='bx bx-down-arrow-alt down'></i>
            </div>
          </div>
          <i class='bx bxs-cart-download cart four' ></i>
        </div>
      </div>

      <div class="sales-boxes">
        <div class="recent-sales box">
          <div class="title">Recent Production</div>
          <div class="sales-details">
            <ul class="details">
              <li class="topic">Date</li>
              
            </ul>
            <ul class="details">
            <li class="topic">Customer</li>
            
          </ul>
          <ul class="details">
            
          </ul>
          <ul class="details">
            <li class="topic">Status</li>
            
          </ul>
          </div>
          <div class="button">
            <a href="#">See All</a>
          </div>
        </div>
        <div class="top-sales box">
          <div class="title">Top Manufactured Product</div>
         
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