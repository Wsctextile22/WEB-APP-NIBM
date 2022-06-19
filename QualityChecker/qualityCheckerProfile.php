
<?php


$First_name='';
$Last_name='';
$NIC='';
$DOB='';
// $Address='';
$Mobile='';
$Email='';
// $Country='';
$district='';
$Login='';




 //Create a connection
 $con=mysqli_connect("localhost:3306","root","");
 mysqli_select_db($con,"wsctextiles");

  //Perform SQL Operation
  $sql = "SELECT * FROM account WHERE account_id='4'";
  
  $result = mysqli_query($con,$sql);
  
  if($row = mysqli_fetch_array($result))

  {
$id=$row[0];
$First_name= $row[1];
$Last_name=$row[2];
$NIC= $row[3];
$DOB= $row[4];
// $Address= $row[6];
$Mobile= $row[10];
$Email= $row[5];
$Country=$row[14];
$district=$row[8];
$Login=$row[14];


                           
  }
  else
  {
    echo "No data found.";
  }

 if(isset($_POST["btnUpdate"]))
 {

 $First_name=$_POST['first_name'];
 $Last_name=$_POST['last_name'];
 $NIC=$_POST['nic'];
 $DOB=$_POST['DOB'];
//  $Address=$_POST['address'];
 $Mobile=$_POST['Mobile'];
 $district=$_POST['district'];
//  $Email=$_POST['Email'];
//  $Country=$_POST['country'];
 
 
    
     //Perform SQL Operation
     $sql ="UPDATE `account` SET `firstname`='$First_name',lastname='$Last_name',nic='$NIC',dob='$DOB',telephone_number='$Mobile',district='$district' WHERE  account_id='$id'";

     $ret = mysqli_query($con,$sql);
     if($ret=="Yes")
      {
     echo "Updated Successfully";

      }
      else
      {
        echo "Updated Failed";
      }
    }

      //Disconnect from the server
      mysqli_close($con);

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="qualityCheckerDashboard.css">
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
          <a href="qualityCheckerDashboard.php" class="">
            <i class='bx bx-grid-alt' ></i>
            <span class="links_name">Overview</span>
          </a>
        </li>
        <li>
          <a class="active">
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
          <a href="workers_list.php">
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
  
       
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Profile</span>
      </div>
    
    </nav>

    <div class="home-content">
      <div class="overview-boxes">
       
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>My Page Title</title>
  <meta name="description" content="My Page Description">
  <link rel="stylesheet" type="text/css" href="qualityCheckerProfileDetails.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"/>
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <form name="qc"method="post" action="#">
  <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"><?php echo $Login?></span><span class="text-black-50"><?php echo $Email; ?></span><span> </span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
               
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">First Name</label><input type="text" required name="first_name" class="form-control" placeholder="first name" value="<?php echo $First_name; ?>"></div>
                    <div class="col-md-6"><label class="labels">Last Name</label><input type="text" required name="last_name"class="form-control" value="<?php echo $Last_name; ?>" placeholder="surname"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"name="Mobile" required class="form-control" placeholder="enter phone number" value="<?php echo $Mobile; ?>"></div>
                    <!-- <div class="col-md-12"><label class="labels">Address Line</label><input type="text"name="address" class="form-control" placeholder="enter address line 1" value="<?php echo $Address; ?>"></div> -->
                    <!-- <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div> -->
                   
                    <div class="col-md-12"><label class="labels">District</label><input type="text" class="form-control" name="district" required placeholder="enter District" value="<?php echo $district; ?>"></div>
                    <!-- <div class="col-md-12"><label class="labels">Country</label><input type="text" class="form-control"name="country" placeholder="enter Country" value="<?php echo $Country; ?>"></div> -->
                    <!-- <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control"name="Email"placeholder="enter email" value="<?php echo $Email; ?>"></div> -->
                    <!-- <div class="col-md-12"><label class="labels">login Name</label><input type="text" class="form-control"name="login" placeholder="enter login name" value="<?php echo $Login; ?>"></div> -->
                    <div class="col-md-12"><label class="labels">NIC</label><input type="text" class="form-control"name="nic" readonly  placeholder="enter NIC" value="<?php echo $NIC; ?>"></div>
                     <div class="col-md-12"><label class="labels">DOB</label><input type="date" class="form-control"name="DOB"  required placeholder="DOB" value="<?php echo $DOB; ?>"></div>
                </div>

                <div class="row mt-3">
                    <!-- <div class="col-md-6"><label class="labels">Salary</label><input type="text" class="form-control" placeholder="country" value=""></div> -->
                    <!-- <div class="col-md-6"><label class="labels">Account Type</label><input type="text" class="form-control" value="" placeholder="state"></div> -->
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="btnUpdate" type="submit">Save Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div> -->
        </div>
    </div>
</div>
</div>
</div>
</form>
</body>
</html>
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

