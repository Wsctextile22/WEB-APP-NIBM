<?php
    session_start();

    if (isset($_SESSION['manager'])) {
        unset($_SESSION['manager']);
        //unset($_SESSION['accountid']);
        session_destroy();
        header("Location: login.php");
    } elseif($_SESSION['supervisor']) {
        unset($_SESSION['supervisor']);
        //unset($_SESSION['accountid']);
        session_destroy();
        header("Location: login.php");
    } elseif ($_SESSION['worker']){
        unset($_SESSION['worker']);
        //unset($_SESSION['accountid']);
        session_destroy();
        header("Location: login.php");
    } else {
        unset($_SESSION['worker']);
        header("Location: login.php");
       // unset($_SESSION['accountid']);
        session_destroy();
    }
?>