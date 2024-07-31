<?php

if(!isset($_SESSION['name'])){
    $_SESSION['message']="Need to Login for the access";
    header('location:../frontend/login.php');
    exit(0);

}



?>