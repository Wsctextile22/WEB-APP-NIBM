<?php 
echo '<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="forgetpassword.css">
    </head>
    <body>
       
        <div class="container padding-bottom-3x mb-2 mt-5">
            <div class="row justify-content-center">
              <div class="col-lg-8 col-md-10">
                <div class="forgot">
                    
                    <h2>Forgot your password?</h2>
                <p>Change your password in three easy steps. This will help you to secure your password!</p>
                <ol class="list-unstyled">
                  <li><span class="text-primary text-medium">1. </span>Enter your email address below.</li>
                  <li><span class="text-primary text-medium">2. </span>Our system will send you a temporary link</li>
                  <li><span class="text-primary text-medium">3. </span>Use the link to reset your password</li>
                </ol>
      
                </div>	
                
                <form class="card mt-4">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="email-for-pass">Enter your email address</label>
                      <input class="form-control" type="text" id="email-for-pass" required=""><small class="form-text text-muted">Enter the email address you used during the registration. Then we\'ll email a link to this address.</small>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button class="btn btn-success" type="submit">Get New Password</button>
                    <a class="btn btn-danger" href="login.php">Back to Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
    </body>
</html>'; 
?>