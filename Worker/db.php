<?php 
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'wsctextiles';

    $conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if (!$conn) {
        die('Could not connect to database: ' . mysqli_connect_error($conn));
    }
    mysqli_select_db($conn,$dbname);
?>