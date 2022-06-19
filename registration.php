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
        <link rel="stylesheet" href="registration.css">
    </head>
    <body>

        <section>
        <div class="home-content">
      <div class="overview-boxes">
        <div class="container">
          <header>Registrations</header>

          <form method="post" action="registration_process.php">
              <div class="form first">
                  <div class="details personal">


                      <div class="fields">
                          <div class="input-field">
                              <label>Fisrt Name</label>
                              <input type="text" name="firstname" placeholder="Enter your first name" required>
                          </div>
                          <div class="input-field">
                              <label>Last Name</label>
                              <input type="text" name="lastname" placeholder="Enter your last name" required>
                          </div>
                          <div class="input-field">
                              <label>Date of Birth</label>
                              <input type="date" name="dob" placeholder="Enter birth date" required>
                          </div>

                          <div class="input-field">
                              <label>Email</label>
                              <input type="text" name="email" placeholder="Enter your email" required>
                          </div>

                          <div class="input-field">
                              <label>Telephone Number</label>
                              <input type="text" name="telephone_number" placeholder="Enter telephone number" required>
                          </div>
                          <div class="input-field">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile_number" placeholder="Enter mobile number" required>
                          </div>
                          <div class="input-field">
                              <label>Gender</label>
                              <input type="text" name="gender" placeholder="Enter gender number" required>
                          </div>
                          <div class="input-field">
                              <label>NIC</label>
                              <input type="text" name="nic" placeholder="Enter NIC number" required>
                          </div>

                          <div class="input-field">
                              <label>Employee type</label>
                              <select class="form-select" name="usertype" class="form-control form-control-lg">
                                    <option value="">Select employee type</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Supervisor">Supervisor</option>
                                    <option value="Worker">Worker</option>
                                    <option value="Quality_checker">Quality checker</option>
                               </select>
                          </div>
                      </div>
                  </div>

                  <div class="details ID">
                      <span class="title">User credentials</span>

                      <div class="fields">
                          <div class="input-field">
                              <label>username</label>
                              <input type="text" name="username" placeholder="Enter username" required>
                          </div>

                          <div class="input-field">
                              <label>password</label>
                              <input type="password" name="password" placeholder="Enter password" required>
                          </div>

                          <div class="input-field">
                              <label>Confirm password</label>
                              <input type="password" name="confirm_password" placeholder="Enter confirm password" required>
                          </div>
                      </div>

                      <button class="nextBtn">
                          <span class="btnText">Next</span>
                          <i class="uil uil-navigator"></i>
                      </button>
                  </div>
              </div>

              <div class="form second">
                  <div class="details address">
                      <span class="title">Address Details</span>

                      <div class="fields">
                          <div class="input-field">
                              <label>Address Number</label>
                              <input type="text" name="address_number" placeholder="Permanent or Temporary" required>
                          </div>
                          <div class="input-field">
                            <label>Street</label>
                            <input type="text" name="street" placeholder="Enter your street" required>
                          </div>
                          <div class="input-field">
                              <label>District</label>
                              <input type="text" name="district" placeholder="Enter your state" required>
                          </div>
                          <div class="input-field">
                              <label>Province</label>
                              <input type="text" name="province" placeholder="Enter your district" required>
                          </div>
                      </div>
                  </div>

                  <div class="details family">

                      <div class="buttons">
                          <div class="backBtn">
                              <i class="uil uil-navigator"></i>
                              <span class="btnText">Back</span>
                          </div>
                          <input type="submit" value="Register" class="btn btn-success"/>
                      </div>
                  </div>
              </div>
          </form>
      </div>

      </div>


    </div>
          </section>
          <script>
   const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");


nextBtn.addEventListener("click", ()=> {
    allInput.forEach(input => {
        if(input.value != ""){
            form.classList.add(\'secActive\');
        }else{
            form.classList.remove(\'secActive\');
        }
    })
})

backBtn.addEventListener("click", () => form.classList.remove(\'secActive\'));

 </script>
    </body>
</html>';
?>