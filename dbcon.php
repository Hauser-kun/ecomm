<?php
session_start();
$conn=mysqli_connect('localhost','root','','unknown_project');

if(!$conn){
    die("Connection fail".mysqli_connect_error() );
    
}


?>