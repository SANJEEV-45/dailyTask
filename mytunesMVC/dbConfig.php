<?php
 $username = "root";
 $localhost = "localhost";
 $passkey = "admin@123";
 $database = "RBAC";
 
 //Creating the connection to connect the database
 $connection = mysqli_connect($localhost, $username, $passkey, $database);
 
 if(!$connection){
   echo "Connection failed :" . mysqli_connect_error();
   exit();
 }
?>