<?php

    $servername = "localhost";
    $username = "root";
    $password ="";
    $database = "wsctextiles";

    //create connection
    $connection = new mysqli($servername,$username,$password,$database);

    if(!$connection){
        echo "Connection Failed!".mysqli_connect_error();
    }
?>