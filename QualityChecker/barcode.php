<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}
</style>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body onload="window.print();">
	<div style="margin-left: 5%">
		<?php


$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"wsctextiles");

include 'barcode128.php';

$qty=$_POST['qty'];
$mat=$_POST['mat'];
$color=$_POST['color'];


		


		for($i=1;$i<=$_POST['qty'];$i++){
			// echo "<p class='inline'>".bar128(stripcslashes($_POST['pid']))."</p>&nbsp&nbsp&nbsp&nbsp";
			echo "<p class='inline'><span ><b>$mat</b></span>".bar128(stripcslashes($_POST['pid']))."</p>&nbsp&nbsp&nbsp&nbsp";
		}

		?>
	</div>
    <div class="d-flex justify-content-center">
    <a href="add-product-quality.php" class="btn btn-info"> Go Back</a>
    </div>
</body>
</html>


<?php

$con=mysqli_connect("localhost:3306","root","");
mysqli_select_db($con,"wsctextiles");


if(isset($_POST['btn_confirmed']))
{
    $product_id=$_POST['pid'];


    $query="UPDATE `product` SET `product_status`='CONFIRMED' WHERE product_id='$product_id'";
    //  echo "$query";
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
?>