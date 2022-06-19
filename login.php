<?php 
session_start();

echo '<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <section class="vh-100">
            <div class="container py-5 h-100">
              <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                  <img src="images/istockphoto-533833660-612x612.jpg"
                    class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                  <form method="post" action="login_process.php">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form1Example13">Username</label>
                      <input type="text" name="username" id="form1Example13" class="form-control form-control-lg" />
                    </div>
          
                    <div class="form-outline-b4 mb-4">
                    <label class="form-label" for="form1Example13">Select employee type</label>
                        <select class="form-select" name="usertype" class="form-control form-control-lg">
                            <option value="">Select employee type</option>
                            <option value="Manager">Manager</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Worker">Worker</option>
                            <option value="Quality checker">Quality checker</option>
                        </select>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                    <label class="form-label" for="form1Example23">Password</label>
                      <input type="password" id="form1Example23" name="password" class="form-control form-control-lg" />
                    </div>
          
                    <div class="d-flex justify-content-around align-items-center mb-4">
                      <!-- Checkbox -->
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                        <label class="form-check-label" for="form1Example3"> Remember me </label>
                      </div>
                      <a href="forgetpassword.html">Forgot password?</a>
                    </div>
          
                    <!-- Submit button -->
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>
                    <a class="btn btn-danger btn-lg btn-block" href="index.php"> Cancel </a>
                  </form>
                </div>
              </div>
            </div>
          </section>
    </body>
</html>';
?>