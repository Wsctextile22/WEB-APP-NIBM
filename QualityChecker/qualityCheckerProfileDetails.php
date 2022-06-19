
<?php


$First_name='';
$Last_name='';
$NIC='';
$DOB='';
// $Address='';
$Mobile='';
$Email='';
// $Country='';
$City='';
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
$City=$row[9];
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
 $City=$_POST['city'];
//  $Email=$_POST['Email'];
//  $Country=$_POST['country'];
 
 
    
     //Perform SQL Operation
     $sql ="UPDATE `account` SET `firstname`='$First_name',lastname='$Last_name',nic='$NIC',dob='$DOB',telephone_number='$Mobile',`district`='$City' WHERE  account_id='$id'";

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

