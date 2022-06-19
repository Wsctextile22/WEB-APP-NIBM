<?php
session_start();
include("db.php");


$firstname =  $_POST["firstname"];
$lastname =  $_POST["lastname"];
$email = $_POST["email"];
$mobile_number =  $_POST["mobile_number"];
$telephone_number = $_POST["telephone_number"];
$address_number =  $_POST["address_number"];
$street =  $_POST["street"];
$district =  $_POST["district"];
$province =  $_POST["province"];

echo"
<!DOCTYPE HTML>
<html>
	<head>
		<title>Scotbooks</title>
		<meta charset='utf-8' />
		<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no' />
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>

	</head>
	
	<body class='is-preload'>
		<!-- Wrapper -->
			<div id='wrapper'>

				<!-- Header -->
				<header id='header'>
					<div class='inner'>

						<!-- Logo -->
							<a href='index.php' class='logo'>
									<span class='fa fa-book'></span> <span class='title'>Scotbooks</span>
								</a>

						";


   
 
			//SQL query to update user details
			$accountid = $_SESSION['accountid'];
            $SQL= "UPDATE account SET firstname='.$firstname.',lastname='.$lastname.',mobile_number='.$mobile_number.',`telephone_number='.$telephone_number.',email='.$email.',address_number='.$address_number.',street='.$street.',district='.$district.',province='.$province.' WHERE account_id = '$accountid'";
            $exeSQL=mysqli_query($conn, $SQL);
            $exeError=mysqli_errno($conn);
           
            if($exeError=="0")
            {
                echo "<h2 align='center'><b>Details uploaded sucessfully!</b></h2>";
                header("Location: supervisorProfile.php");
            }
			
            else
            {
                echo "<h2 align='center'><b>Details uploaded failed!</b></h2>";
                header("Location: supervisorProfile.php");
            }
echo "</body>";
?>