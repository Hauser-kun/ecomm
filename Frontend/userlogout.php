<?php
session_start();

unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['login']);
session_destroy();

header('location:userlogin.php');
$_SESSION['message']="Logout Sucessfull";

?>