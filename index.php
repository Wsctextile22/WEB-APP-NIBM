<?php 
echo '<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <nav class="nav">
            <div class="container">
                <div class="logo">
                    <div class="logo-details">
      
                        <img class="logo_design" src="./images/wsc-modified.png" alt="logo">
                    
                
                  </div>                </div>
                <div id="mainListDiv" class="main_list">
                    <ul class="navlinks">
                        <li><a href="attendence.php">Attendence</a></li>
                        <li><a href="registration.php">Admin</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </div>
                <span class="navTrigger">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
            </div>
        </nav>
        
        <section class="home">
        </section>
        <div style="height: 100px">
            <h2 class="myH2">© 2022 WSC Textiles & Apparrels.</h2>

        </div>
        
        <!-- Jquery needed -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/scripts.js"></script>
        
        <!-- Function used to shrink nav bar removing paddings and adding black background -->
        <script>
            $(window).scroll(function() {
                if ($(document).scrollTop() > 50) {
                    $(\'.nav\').addClass(\'affix\');
                    console.log("OK");
                } else {
                    $(\'.nav\').removeClass(\'affix\');
                }
            });
        </script>
    </body>
</html>'; 
?>