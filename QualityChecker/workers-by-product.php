<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student CRUD</title>
</head>
<body>
  
    <div class="container mt-4">

      

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Worker Details
                          
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>NIC</th>
                                    <th>Login Name</th>
                                    <th>Supervisor Name</th>
                              
                               
                                </tr>
                            </thead>
                            <tbody>

<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"wsctextiles");

if(isset($_POST['btn_workers']))
{
    $product_id=$_POST['pid'];


    $query = "SELECT*  FROM account JOIN worker ON account.account_id=worker.account_id JOIN worker_product ON worker_product.worker_id = worker.worker_id  where worker_product.product_id='$product_id'";
    // echo $query;
    $ret=mysqli_query($con,$query);


    $query_run = mysqli_query($con, $query);

                         
                           

    if(mysqli_num_rows($query_run) > 0)
    {
       while($worker=mysqli_fetch_array($query_run))
        {
            ?>

<tbody>
                                                <tr>
                                           
                                                <td><?= $worker['firstname']; ?></td>
                                                <td><?= $worker['lastname']; ?></td>
                                                <td><?= $worker['nic']; ?></td>
                                                <td><?= $worker['username']; ?></td>
                                                <td><?= $worker['supervisor_id']; ?></td>
                                           
                                              
                                      
                                               
                                             
                                                 <td>
                                                                             
                                                                                   
                                            
                                              </tbody> 
                                            </tr>
                                            <?php
      }
                                   
    }
    else
    {
        echo "<h5> No Record Found </h5>";
    }
}
?>
</tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
