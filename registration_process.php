<?php
session_start();
include("db.php");


$firstname =  $_POST["firstname"];
$lastname =  $_POST["lastname"];
$email = $_POST["email"];
$dob =  $_POST["dob"];
$nic =  $_POST["nic"];
$mobile_number =  $_POST["mobile_number"];
$telephone_number =  $_POST["telephone_number"];
$gender =  $_POST["gender"];
$usertype =  $_POST["usertype"];
$username =  $_POST["username"];
$password =  $_POST["password"];
$confirm_password =  $_POST["confirm_password"];
$address_number =  $_POST["address_number"];
$street =  $_POST["street"];
$district =  $_POST["district"];
$province =  $_POST["province"];

echo"
<!DOCTYPE HTML>
<html>
	<head>
		<title>WSC</title>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no' />
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
        <link rel='stylesheet' href='registration_process.css'>
	</head>
	
	<body class='is-preload'>
		<!-- Wrapper -->
			<div id='wrapper'>

				<!-- Header -->
				<header id='header'>
					<div class='inner'>

						<!-- Logo -->
						

						";


    if($password != $confirm_password)
    {	 
		//if the entered 2 passwords are not equal to each other display error message
        echo "<h2 align='center'><b>Your registration process is failed!</b></h2>";
        echo "<h3 align='center'>Entered passwords are not matching!! </h3> "; 
        echo "<h2 align='center'>Try again &nbsp;&nbsp;&nbsp;&nbsp;<button class='btn btn-primary'><a href='registration.php'>signUp</a></button>";
    }
    else
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))     
        {
			//SQL query to store entered user details

            if($usertype=='Manager') {
                $SQL="INSERT INTO account (firstname, lastname,email,nic,dob,mobile_number,telephone_number,gender,usertype,username,password,confirm_password,address_number,street,district,province)
                VALUES ('$firstname',' $lastname', '$email','$nic', '$dob','$mobile_number','$telephone_number','$gender','$usertype','$username','$password', '$confirm_password','$address_number','$street','$district','$province')";
                $SQL1= "INSERT INTO manager(account_id,start_date,end_date) VALUES (LAST_INSERT_ID(),'2022-05-06','2022-06-05')";
            }else if ($usertype=='Supervisor') {
                $SQL="INSERT INTO account (firstname, lastname,email,nic,dob,mobile_number,telephone_number,gender,usertype,username,password,confirm_password,address_number,street,district,province)
                VALUES ('$firstname',' $lastname', '$email','$nic', '$dob','$mobile_number','$telephone_number','$gender','$usertype','$username','$password', '$confirm_password','$address_number','$street','$district','$province')";
                 $SQL1= "INSERT INTO supervisor(account_id,start_date,end_date) VALUES (LAST_INSERT_ID(),'2022-05-06','2022-06-05')";

            }else if ($usertype=='Quality_checker') {
                $SQL="INSERT INTO account (firstname, lastname,email,nic,dob,mobile_number,telephone_number,gender,usertype,username,password,confirm_password,address_number,street,district,province)
                VALUES ('$firstname',' $lastname', '$email','$nic', '$dob','$mobile_number','$telephone_number','$gender','$usertype','$username','$password', '$confirm_password','$address_number','$street','$district','$province')";
                $SQL1= "INSERT INTO quality_checker(account_id,start_date,end_date) VALUES (LAST_INSERT_ID(),'2022-05-06','2022-06-05')";

            }else {
                $SQL="INSERT INTO account (firstname, lastname,email,nic,dob,mobile_number,telephone_number,gender,usertype,username,password,confirm_password,address_number,street,district,province)
                VALUES ('$firstname',' $lastname', '$email','$nic', '$dob','$mobile_number','$telephone_number','$gender','$usertype','$username','$password', '$confirm_password','$address_number','$street','$district','$province')";
                $SQL1= "INSERT INTO worker(account_id,supervisor_id,start_date,end_date) VALUES (LAST_INSERT_ID(),1,'2022-05-06','2022-06-05')";

            }
           
            $exeSQL=mysqli_query($conn, $SQL);
            $exeError=mysqli_errno($conn);
           
            if($exeError=="0")
            {
                $exeSQL1=mysqli_query($conn, $SQL1);
                $exeError1=mysqli_errno($conn);
                if($exeError1 == "0") {
                    echo 'fool';
                }
                echo "<h2 align='center'><b>Registration process is Complete!</b></h2>";
                echo "<h3 align='center'><button class='btn btn-success'><a href='login.php'>LogIn</a></button>";
                
            }
			
            else
            {
               //check wheather the entered Email is already exists
                if($exeError=="1062")
                {
                //if the entered Email is already exists, display error message
                echo "<h2 align='center'><b>Your registrationprocess is failed!</b></h2>";
                echo "<h3 align='center'>Entered email is already exsits!! </h3> "; 
                echo "<h2 align='center'>Try again &nbsp;&nbsp;&nbsp;&nbsp;<button class='btn btn-primary'><a href='registration.php'>signUp</a></button>";
                }
                
                else if($exeError=="1064")
                {
                    echo "<h2 align='center'><b>Your registration process is failed!</b></h2>";
                    echo "<h3 align='center'>Contains invalid characters </h3> "; 
                    echo "<h2 align='center'>Try again &nbsp;&nbsp;&nbsp;&nbsp; <button class='btn btn-primary'><a href='registration.php'>signUp</a><button>";
                }
            }
        }
        else
        {
            echo "<h2 align='center'><b>Your registration is failed!</b></h2>";
            echo "<h3 align='center'>Your email is invalid!! </h3> "; 
            echo "<h2 align='center'>Try again &nbsp;&nbsp;&nbsp;&nbsp; <button class='btn btn-primary'><a href='registration.php'>signUp</a></button>";
        }
    }



echo "</body>";
?>