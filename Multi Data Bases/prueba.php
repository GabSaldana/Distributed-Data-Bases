<?php
    
    session_start();
    echo "HOME";
    
    $user=  $_SESSION['login_user'];
    $id=$_SESSION['login_id'];
    echo $user;
    echo $id;
    
?>
