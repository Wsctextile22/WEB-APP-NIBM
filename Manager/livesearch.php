<?php
include("config.php");
if(isset($_POST['input'])){
    $input=$_POST['input'];
    $query="SELECT * FROM  account WHERE firstname LIKE '{$input}%' OR lastname LIKE '{$input}%' OR
                address_number LIKE '{$input}%' OR usertype LIKE '{$input}%' 
                OR email LIKE '{$input}%' OR district LIKE '{$input}%'  OR province LIKE '{$input}%' ";

    $result = mysqli_query($connection,$query);

    if(mysqli_num_rows($result)>0){?>

    <table class="table table-bordered table-striped table-dark table-hover mt-4">
        <thead>
            <tr>
                <th>Account ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>NIC</th>
                <th>DOB</th>
                <th>Email</th>
                <th>Address No</th>
                <th>Street</th>
                <th>District</th>
                <th>Province</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>User Type</th>    
                <th>User Name</th>
                <th>Password</th>
                
            </tr>
        </thead>
        <tbody>
            <?php

                while($row=mysqli_fetch_assoc($result)){
                    $account_id=$row['account_id'];
                    $firstname=$row['firstname'];
                    $lastname=$row['lastname'];
                    $nic=$row['nic'];
                    $dob=$row['dob'];
                    $email=$row['email'];
                    $address_number=$row['address_number'];
                    $street=$row['street'];
                    $district=$row['district'];
                    $province=$row['province'];
                    $gender=$row['gender'];
                    $mobile_number=$row['mobile_number'];
                    $usertype=$row['usertype'];
                    $username=$row['username']; 
                    $password=$row['password'];
                  
                    

                    ?>

                    <tr>
                        <td><?php echo $account_id; ?></td>
                        <td><?php echo $firstname; ?></td>
                        <td><?php echo $lastname; ?></td>
                        <td><?php echo $nic; ?></td>
                        <td><?php echo $dob; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $address_number; ?></td>
                        <td><?php echo $street; ?></td>
                        
                        <td><?php echo $district; ?></td>
                        <td><?php echo $province; ?></td>
                        <td><?php echo $gender; ?></td>
                        <td><?php echo $mobile_number; ?></td>
                        <td><?php echo $usertype; ?></td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $password; ?></td>
                        
                        
                        
                    </tr>
                    <?php
                }

                ?>

           
        </tbody>
    </table>

    <?php

    }else{
        echo"<h6 class='text-danger text-center mt-3'>No Data Found</h6>";
    }
}

?>