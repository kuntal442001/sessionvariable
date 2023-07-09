<?php
    session_start();

    if($_SESSION['email_id']){
        echo "you are logged in";
    }
    else{
        header("Location: index.php");
    }
?>