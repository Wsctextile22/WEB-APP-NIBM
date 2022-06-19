<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>addproductdetails</title>
</head>
<body>
  
    <div class="container mt-4">

      

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Product Details
                          
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Material</th>
                                    <th>Color</th>
                                    <th>Quantity</th>                    
                                    <th>Status</th>
                                    <th>CONFIRM</th>
                                    <th>REJECT</th>
                                    <th>PENDING</th>
                                    <th>Worker list</th>
                              
                               
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                 

                                    //Create a connection
                                    $con=mysqli_connect("localhost:3306","root","");
                                    mysqli_select_db($con,"wsctextiles");
                    
                                    // $query = "SELECT*FROM product INNER JOIN worker_product ON product.Product_id=worker_product.Pid ";
                                    $query = "SELECT * FROM product ";

                                   // $query = "SELECT * FROM product JOIN worker_product ON product.product_id = worker_product.product_id JOIN worker ON worker.worker_ID = worker_product.worker_id ";



                                    $query_run = mysqli_query($con, $query);

                         
                           

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                       while($product=mysqli_fetch_array($query_run))
                                        {
                                            ?>
                                            <tbody>
                                                <tr>
                                                <td><?= $product['product_id']; ?></td>
                                                <td><?= $product['product_name']; ?></td>
                                                <td><?= $product['size']; ?></td>
                                                <td><?= $product['material']; ?></td>
                                                <td><?= $product['color']; ?></td>
                                                <td><?= $product['quantity']; ?></td>               
                                                <td><?= $product['product_status']; ?></td>
                                           
                                              
                                      
                                               
                                             
                                                 <td>
                                                    <form action= "barcode.php" method="post">
                                                   
                                                    <input type="hidden" name="pid" value="<?php echo $product['product_id'] ?>">
                                                    <input type="hidden" name="qty" value="<?php echo $product['quantity'] ?>">
                                                    <input type="hidden" name="mat" value="<?php echo $product['material'] ?>">
                                                    <input type="hidden" name="color" value="<?php echo $product['color'] ?>">
                                                
                                                    
                                                 <button type="submit" name='btn_confirmed' class="btn btn-success">Confirm</button> 
                                        </td>
                                        <td>
                                        </form>
                                        <form action="#" method="post">
                                                   
                                                   <input type="hidden" name="pid" value="<?php echo $product['product_id'] ?>">
                                                   <button type="submit" name='btn_rejected' class="btn btn-danger">Reject</button> 
                                       
                                        </td>
                                        <td>
                                                </form>
                                        <form action="#" method="post">
                                                   
                                                   <input type="hidden" name="pid" value="<?php echo $product['product_id'] ?>">
                                                   <button type="submit" name='btn_pending' class="btn btn-primary">Pending</button>
                                                   </td>
                                                   
                                                   <td>
                                                   </form>
                                                   <form method='post' action='workers-by-product.php'>
                                                   <input type="hidden" name="pid" value="<?php echo $product['product_id'] ?>">
                                                   <button type="submit" name='btn_workers' class="btn btn-secondary">Workers</button>
                                               </td>

                                        </form>
                                               
                                                                                         
                                                                                   
                                            
                                              </tbody> 
                                            </tr>

                                            <div class="d-flex justify-content-center">
  
                                            <?php

                                       
                                        }
                                   
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                
                                ?>
                                
                            </tbody>
                        </table>
                                    </div>
                </div>
                <div class="d-flex justify-content-center">
    <a href="qualityCheckerDashboard.php" class="btn btn-info"> Go Back</a>
    </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"wsctextiles");

if(isset($_POST['btn_confirmed']))
{
    $product_id=$_POST['pid'];


    $query="UPDATE `product` SET `product_status`='CONFIRMED' WHERE product_id='$product_id'";
    // echo "$query";
    $ret=mysqli_query($con,$query);

    if($ret=="Yes")
    {
echo '<script> alert("Update Status")</script>';
}
else
{
    echo '<script> alert("Not Updated Status")</script>';
}
    
    
}

if(isset($_POST['btn_rejected']))
{
    $product_id=$_POST['pid'];


    $query="UPDATE `product` SET `product_status`='REJECTED' WHERE product_id='$product_id'";
    // echo "$query";
    $ret=mysqli_query($con,$query);

    if($ret=="Yes")
    {
echo '<script> alert("Update Status")</script>';
}
else
{
    echo '<script> alert("Not Updated Status")</script>';
}
   
}

if(isset($_POST['btn_pending']))
{
    $product_id=$_POST['pid'];


    $query="UPDATE `product` SET `product_status`='PENDING' WHERE product_id='$product_id'";
    // echo "$query";
    $ret=mysqli_query($con,$query);

    if($ret=="Yes")
    {
echo '<script> alert("Update Status")</script>';
}
else
{
    echo '<script> alert("Not Updated Status")</script>';
}
    
  
}



mysqli_close($con);


?>