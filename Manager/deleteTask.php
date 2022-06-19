<?php

if(isset($_GET["task_id"])){
    $task_id = $_GET["task_id"];

    $servername = "localhost";
    $username = "root";
    $password ="";
    $database = "wsctextiles";

    //create connection
    $connection = new mysqli($servername,$username,$password,$database);

    $sql = "DELETE FROM task WHERE task_id=$task_id";
    $connection->query($sql);
}
header("location: /Manager/task.php");
exit;

?>