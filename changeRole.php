<?php
  include("connection.php");
  if(isset($_POST["change"]))
  { 
    if(!$connection){
        echo "Connection failed : ".mysqli_connect_error();
        exit();
    }
     $id = $_GET["id"];
     $role = $_POST["Role"];
     $query = "UPDATE users SET role = '$role' WHERE id = '$id'";

    if($connection->query($query))
    {
        sleep(1);
        header("Location:Managerdashboard.php");
    }
    else{
      echo "Error deleting user :". $connection->connect_error; 
    }
    $connection->close();
}  
  