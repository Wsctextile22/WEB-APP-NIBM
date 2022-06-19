<?php 
    session_start();
    include("db.php");

        $username = $_POST['username'];
        $password = $_POST['password'];
        $usertype = $_POST['usertype'];

    if ((empty($username) or empty($usertype) or empty($password))) {
        
        echo "<h2 align='center'><b>Login failed!</b></h2><br>";
        echo "<h3 align='center'>Login form is incomplete</h3><br>";
        echo '<!DOCTYPE html>
        <!-- Created By CodingNepal - www.codingnepalweb.com -->
        <html lang="en" dir="ltr">
          <head>
            <meta charset="UTF-8">
           <!--- <title>Alert Box | CodingLab </title>----->
            <link rel="stylesheet" href="login_process.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
           </head>
        <body>
            <div class="container">
              <input type="checkbox" id="check">
              <label class="show_button" for="check">Try Again</label>
              <div class="background"></div>
              <div class="alert_box">
                <div class="icon">
                  <i class="fa fa-exclamation-triangle"></i>
                </div>
                <h3>Please enter credentials to login?</h3>
                <div class="flex-direction rows">
                <div>
                    <a class="btn btn-success" href="login.php"> Ok </a>
                    <a class="btn btn-danger" href="index.php"> Cancel </a>
                </div>
               
                </div>
              </div>
            </div>
        </body>
        </html>
        ';
    } else
    {
        //SQL query to retrieve the user records
        $SQL="select account_id,email,password,usertype,username from account where username='$username'";
        $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
        $arrayu=mysqli_fetch_array($exeSQL);
        $nbrecs = mysqli_num_rows($exeSQL);

        //display error if there are no record which is equal to the entered email
        if(mysqli_num_rows($exeSQL) ==0)
        {
            echo "<h2 align='center'><b>Logn failed!</b></h2><br>";
            echo "<h3 align='center'>Sorry, We can't recognise your username!!</h3><br>";
            echo '<!DOCTYPE html>
            <!-- Created By CodingNepal - www.codingnepalweb.com -->
            <html lang="en" dir="ltr">
              <head>
                <meta charset="UTF-8">
               <!--- <title>Alert Box | CodingLab </title>----->
                <link rel="stylesheet" href="login_process.css">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
               </head>
            <body>
                <div class="container">
                  <input type="checkbox" id="check">
                  <label class="show_button" for="check">Try Again</label>
                  <div class="background"></div>
                  <div class="alert_box">
                    <div class="icon">
                      <i class="fas fa-exclamation"></i>
                    </div>
                    <header>Please check your username and try again?</header>
                    <div class="flex-direction rows">
                    <div>
                        <a class="btn btn-success" href="login.php"> Ok </a>
                        <a class="btn btn-danger" href="index.php"> Cancel </a>
                    </div>
                   
                    </div>
                  </div>
                </div>
            </body>
            </html>
            ';
            echo "<h3 align='center'>Do not have an account? <br> <button><a href='signup.php'>SignUp</a></button>";
        }
        else
        {
            //if password is incorrect
            if($arrayu['password']!=$password)
            {
                echo "<h2 align='center'><b>Login failed!</b></h2><br>";
                echo "<h3 align='center'>Sorry, Your password is incorrect!!</h3><br>";
                echo '<!DOCTYPE html>
                <!-- Created By CodingNepal - www.codingnepalweb.com -->
                <html lang="en" dir="ltr">
                <head>
                    <meta charset="UTF-8">
                <!--- <title>Alert Box | CodingLab </title>----->
                    <link rel="stylesheet" href="login_process.css">
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
                </head>
                <body>
                    <div class="container">
                    <input type="checkbox" id="check">
                    <label class="show_button" for="check">Try Again</label>
                    <div class="background"></div>
                    <div class="alert_box">
                        <div class="icon">
                        <i class="fas fa-exclamation"></i>
                        </div>
                        <header>Please check your password and try again?</header>
                        <div class="flex-direction rows">
                        <div>
                            <a class="btn btn-success" href="login.php"> Ok </a>
                            <a class="btn btn-danger" href="index.php"> Cancel </a>
                        </div>
                    
                        </div>
                    </div>
                    </div>
                </body>
                </html>
                ';  
            }
            else 
            {
                
               
               
                if ($usertype == "Manager") {
                    
                    $_SESSION['usertype'] = $usertype;
                    $_SESSION['accountid']=$arrayu['account_id'];
                    header("Location: ./Manager/managerDashboard.php");
                } else if ($usertype == "Supervisor") {
                
                    $_SESSION['usertype'] = $usertype;
                    $_SESSION['accountid']=$arrayu['account_id'];
                    header("Location: ./Supervisor/supervisorDashboard.php");

                }else if ($usertype == "Worker") {
                
                    $_SESSION['usertype'] = $usertype;
                    $_SESSION['accountid']=$arrayu['account_id'];
                    header("Location: ./Worker/Worker_Dashboard.php");
                } else {
                    $_SESSION['usertype'] = $usertype;
                    $_SESSION['accountid']=$arrayu['account_id'];
                    header("Location: ./QualityChecker/qualityCheckerDashboard.php");
                }
           
            
            //if the login process is successful, display message
           // echo "<h1 align='center'><strong>Inavlid Login type!!</strong></h1>";
           // echo "<h2 align='center'><i>Welcome, " .$arrayu['usertype']."  ".$arrayu['username']." </i></h2>";
           // echo "<h3 align='center'><strong><button><a href='.login.php'>Back to login</a></button></strong></h1><br>";
           // $_SESSION['username']=$arrayu['usertype']." ".$arrayu['username']; 
           // $_SESSION['account_id']=$arrayu['account_id'];
               
                    
            
            }
        }

    }
?>