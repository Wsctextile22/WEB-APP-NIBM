<?php
session_start();
include("config.php");


$First_name =  $_POST["First_name"];
$Lastname =  $_POST["Lastname"];
$Address =  $_POST["Address"];
$Mobile =  $_POST["Mobile"];
$Email = $_POST["Email"];
$Country = $_POST["Country"];
$City = $_POST["City"];


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
			$Account_id = $_SESSION['Account_id'];
            $SQL= "UPDATE account SET First_name='.$First_name.',Last_name='.$Last_name.',Address='.$Address.',Mobile='.$Mobile.',email='.$email.',Country='.$Country.',City='.$City.'";
            $exeSQL=mysqli_query($connection, $SQL);
            $exeError=mysqli_errno($connection);
           
            if($exeError=="0")
            {
                echo "<h2 align='center'><b>Details uploaded sucessfully!</b></h2>";
                header("Location: managerProfile.php");
            }
			
            else
            {
                echo "<h2 align='center'><b>Details uploaded failed!</b></h2>";
                header("Location: managerProfile.php");
            }
echo "</body>";
?>